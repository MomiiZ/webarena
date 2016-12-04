<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class EventsTable extends Table
{
    
    public function allEvents(){
        
        $event = TableRegistry::get('events');
        
        $query=$this->find('all');
        $all=$query->toArray();
        
        return($all);
    }
    
    
    public function putInfo($name,$x,$y){
        
        $event = TableRegistry::get('events');
        
        $putdate = new \DateTime();
       
        $query = $event->query();
        
            $query->insert(['name','coordinate_x','coordinate_y','date'])
                    ->values([
                        'name'=> $name,
                        'coordinate_x' => $x,
                        'coordinate_y'=> $y,
                        'date'=>$putdate
                    ])
                    ->execute();
        
            
    }
    
    
    
    
    
}