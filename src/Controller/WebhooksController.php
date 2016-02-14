<?php
namespace App\Controller;

use App\Controller\AppController;
use Psr\Log\LogLevel;

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
        $this->log(LogLevel::DEBUG, 'here');
    }
}
