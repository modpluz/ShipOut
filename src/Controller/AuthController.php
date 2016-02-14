<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Auth Controller
 *
 * @property \App\Model\Table\UsersTable $Auth
 */
class AuthController extends AppController
{
    /**
     * BeforeFilter method
     *
     * @param \Cake\Event\Event $event CakePHP event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow('login');
    }


    /**
     * Login method
     *
     * @return void|\Cake\Network\Response.
     */
    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('Invalid email or password, please try again', ['element' => 'error']);
        }

        $this->set('heading', 'Please Login');
    }


    /**
     * Logout method
     *
     * @return void|\Cake\Network\Response.
     */
    public function logout()
    {
        $this->Flash->set('You have been successfully logged out', ['element' => 'success']);
        return $this->redirect($this->Auth->logout());
    }


}
