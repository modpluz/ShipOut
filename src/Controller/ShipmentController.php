<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\BadRequestException;
/**
 * Shipment Controller
 *
 * @property \App\Model\Table\ShipmentTable $Shipment
 */
class ShipmentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $shipments = $this->paginate($this->Shipment);

        $this->set(compact('shipments'));
        $this->set('_serialize', ['shipments']);
    }

    /**
     * Create method
     *
     * @return \Cake\Network\Response|null
     */
    public function create()
    {
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;

            \Shippo::setApiKey(Configure::read('Shippo.private_key'));

            $shipment = [
                'from' => [
                    'object_purpose' => 'PURCHASE',
                    'name' => $data['sender_name'],
                    'company' => $data['sender_company'],
                    'street1' => $data['sender_address'],
                    'city' => $data['sender_city'],
                    'state' => $data['sender_state'],
                    'zip' => $data['sender_postcode'],
                    'country' => $data['sender_country'],
                    'phone' => $data['sender_phone'],
                    'email' => $data['sender_email'],
                ],
                'to' => [
                    'object_purpose' => 'PURCHASE',
                    'name' => $data['receiver_name'],
                    'company' => $data['receiver_company'],
                    'street1' => $data['receiver_address'],
                    'city' => $data['receiver_city'],
                    'state' => $data['receiver_state'],
                    'zip' => $data['receiver_postcode'],
                    'country' => $data['receiver_country'],
                    'phone' => $data['receiver_phone'],
                    'email' => $data['receiver_email'],
                ],
                'parcel' => [
                    'length' => 5,
                    'width' => 5,
                    'height' => 5,
                    'distance_unit' => 'in',
                    'weight' => 2,
                    'mass_unit' => 'lb',
                ],
            ];

            try {
                $shipment = \Shippo_Shipment::create(
                    [
                        'object_purpose' => 'PURCHASE',
                        'address_from' => $shipment['from'],
                        'address_to' => $shipment['to'],
                        'parcel' => $shipment['parcel'],
                        'async' => false,
                    ]
                );

                $this->Flash->success('Shipment created successfully');
                $this->redirect(['_name' => 'Shipment::Rates', 'shipment_id' => $shipment['object_id']]);
            } catch (\Exception $e) {
                die($e->getMessage());
            }

            if (empty($shipment['rates_list'])) {
                throw new BadRequestException('There are no valid rates returned for the specified shipment!');
            }

            $this->set('shipment', $shipment);

        }
    }

    /**
     * Rates for a Shipment
     * @param $shipment_id
     */
    public function rates($shipment_id) {
        if (empty($shipment_id)) {
            throw new BadRequestException('Shipment ID is required to retrieve rates.');
        }

        \Shippo::setApiKey(Configure::read('Shippo.private_key'));
        $shipment_rates = \Shippo_Shipment::get_shipping_rates(['id' => $shipment_id]);
        if (empty($shipment_rates['results'])) {
            $this->Flash->error('We could not find applicable rates for the specified shipment.');
        }

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;

            //create transaction
            try {
                $this->loadModel('Shipment');
                $transaction = \Shippo_Transaction::create(
                    [
                        'rate' => $data["rate_id"],
                        'label_file_type' => "PDF",
                        'async' => false,
                    ]
                );

                $shipment_data = [
                    'shipment_id' => $shipment_id,
                    'rate' => $transaction['rate'],
                    'last_known_status' => $transaction['tracking_status']['status'],
                    'shippo_object_id' => $transaction['object_id'],
                    'tracking_number' => $transaction['tracking_number'],
                ];
                $shipment = $this->Shipment->newEntity($shipment_data);
                $this->Shipment->save($shipment);

                $this->Flash->success('Shipment successfully created');
                $this->redirect(['_name' => 'Shipment::Index']);
            } catch (\Exception $e) {
                die(var_dump($e->getMessage()));
            }
        }

        $this->set('rates', $shipment_rates['results']);
    }

    /**
     * Track method
     *
     * @param string|null $tracking_number Tracking number.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function track($tracking_number = null)
    {
        try {
            $shipment = $this->Shipment->find()->where(['tracking_number' => $tracking_number])->firstOrFail();

            \Shippo::setApiKey(Configure::read('Shippo.private_key'));

            $shipment_data = \Shippo_Shipment::retrieve($shipment->shipment_id);
            if (!empty($shipment_data['address_from'])) {
                $shipment_data['sender'] = \Shippo_Address::retrieve($shipment_data['address_from']);
            }
            if (!empty($shipment_data['address_to'])) {
                $shipment_data['recipient'] = \Shippo_Address::retrieve($shipment_data['address_to']);
            }
            if (!empty($shipment_data['parcel'])) {
                $shipment_data['parcel'] = \Shippo_Parcel::retrieve($shipment_data['parcel']);
            }

            $shipment_data['rate'] = \Shippo_Rate::retrieve($shipment->rate);

//            debug($shipment_data['rate']);
//            exit;

            //tracking info
//            $client = new \GuzzleHttp\Client(['base_url' => Configure::read('Shippo.tracking_url')]);
//            $resp = $client->get('/v1/tracks/' . strtolower($shipment_data['rate']['provider']) . '/' . $shipment->tracking_number . '/');
//            if ($resp->getStatusCode() == 200) {
////                return $resp->json();
//                debug($resp->json());
//            }
//            exit;
//            $tracking = \Shippo_Manifest::




//            debug(var_dump($shipment_data));
        } catch(\Exception $e) {
            die(var_dump($e->getMessage()));
        }


        $this->set(compact('shipment', 'shipment_data'));
        $this->set('_serialize', ['shipment', 'shipment_data']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Shipment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipment = $this->Shipment->get($id);
        if ($this->Shipment->delete($shipment)) {
            $this->Flash->success(__('The shipment has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
