<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
    
    
    public function index()
    {
        $this->set('myname', "BUI Antoine");
        
        $this->loadModel('Fighters');
        $figterlist=$this->Fighters->find('all');
        //pr($figterlist->toArray());
    
    
        $this->set('users', $this->Fighters->find('all'));
    
    
    
    
    
    
    
        //$hi=$this->Fighters->test();
        //$this->set('hihi',$hi);
        //Send data to view
        $this->set('hihi', $this->Fighters->test());
    }
    
    public function add()
    {
        $this->loadModel('Players');
        $user = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Players->patchEntity($user, $this->request->data);
            if ($this->Players->save($user)) {
                $this->Flash->success(__("Le player a été sauvegardé. Connectez-vous !"));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
        }
        $this->set('user', $user);



    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
        $this->Flash->success('Vous êtes maintenant déconnecté.');
    }


    public function fighter()
    {
        //$this->loadModel('Players');
    }


    public function sight()
    {

    }
    public function player()
    {

    }
   


    public function diary()
    {

    }

    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add','logout');
        
    }

}