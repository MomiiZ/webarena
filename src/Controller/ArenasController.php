<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use App\Form\FighterForm;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
    
    //TEST DE GIT
    
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
                $this->Flash->success(__("The player has been created,sign in to play !"));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__("Impossible to add the player."));
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
        $this->Flash->success('You are signed out.');
    }


    public function addFighter()
    {
         $create = new FighterForm();
       
            if ($this->request->is('post')) {
                
                $a=$this->request->data;
                
                $this->loadModel('Fighters');
                
                if ($create->execute($this->request->data)) { 
                
                    if($this->Fighters->ifExists($a['name'])){
                           //message flash de la reussite
                            $this->Flash->success('Fighter is created ! ');
                            //va entrer les données du formulaire dans la base de donnée
                            $this->Fighters->putInfo($a['name']);
                            //redirection vers la page de confirmation apres avoir appuyé sur submit
                            $this->redirect(['controller'=>'Arenas','action'=>'confirmation']); 
                    }else{
                             $this->Flash->error('This fighter name already exists'); 
                    }
                } 
                
                else {
                    $this->Flash->error('Some error happend'); 
                }
                
            }
            // Afficher valeur par defaut dans le formulaire
            if ($this->request->is('get')) {
                 $this->request->data['name'] = ''; 
            }
            //envoyer le formulaire au view
            $this->set('create', $create);
    }
    
    public function fighter(){
        
        $this->loadModel('Fighters');
        $allFighter=$this->Fighters->allFighters();
        
        $this->set('allFighter',$allFighter);   
    }

    
    public function confirmation(){
    
        $this->loadModel('Fighters');
        $fighter=$this->Fighters->findBigId();
        
        $this->set('fighter',$fighter);
        
    }
    
    
    //la page pour augmenter les caracteristiques, carac represente quelle caracteristique augmenter !
    public function changeLevel($id,$carac){
        
        $this->loadModel('Fighters');
        
        if($carac==1 && $this->Fighters->showcarac($id)){
            $this->Fighters->addSight($id);
        }
        if($carac==2 && $this->Fighters->showcarac($id)){
            $this->Fighters->addHealth($id);
        }
        if($carac==3 && $this->Fighters->showcarac($id)){
            $this->Fighters->addStrength($id);
        }
        
        $instance=$this->Fighters->get($id);
        $this->set('fighter',$instance);  
        $this->set('show',$this->Fighters->showcarac($id));
    
   
    }
    
    //direction represente le changement du placement du joueur
    public function game($id,$direction){
        
        $this->loadModel('Fighters');
        // va modifier la valeur de placement en fonction de la direction
        
        $this->Fighters->direction($id,$direction);
        
        
        //retourne la vue du joueur donnée en entré
        $list=$this->Fighters->getElementByView($id);
        
        
        
        //renvoie les données au view
        $my=$this->Fighters->get($id);
        $this->set('list',$list);
        $this->set('id',$id);
        $this->set('my',$my);
        
        
    }
    
    //Appelle la fonction qui supprime l'instance, renvoie le nom au ctp
    public function removeDead($id){
        
        $this->loadModel('Fighters');
        
        $name=$this->Fighters->removeDead($id);
        
        $this->set('name',$name);
    }
    
    
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add','logout');
        
    }

}