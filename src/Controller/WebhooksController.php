<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Webhooks Controller
 *
 * @property \App\Model\Table\WebhooksTable $Webhooks
 */
class WebhooksController extends AppController
{

    /**
     * Update shipment tracking method
     *
     * @return \Cake\Network\Response|null
     */
    public function tracking()
    {
        die(var_dump('here'));
    }
}
