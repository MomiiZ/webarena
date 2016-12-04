<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use App\Model\Table\EventsTable;

class FightersTable extends Table
{
        public function test(){
            return "ok";
        }
       
        public function putInfo($name){
            
            $fighters = TableRegistry::get('fighters');
            $query = $fighters->query();
            $query->insert(['name','player_id','level','xp','skill_sight','skill_strength','skill_health','current_health','coordinate_x','coordinate_y'])
                    ->values([
                        'name'=> $name,
                        'player_id' => 3,// a changer avec les varibles de session
                        'level'=>1,
                        'xp'=>0,
                        'skill_sight' => 2,
                        'skill_strength' => 1,
                        'skill_health' => 3,
                        'current_health'=>3,
                        'coordinate_x'=>4,
                        'coordinate_y'=>4,
                    ])
                    ->execute();
            
            //query trouver l'id du fighter $name
            $test;
            $query=$this->find('all');
            $allFighter=$query->toArray();
            foreach($allFighter as $list){
                if($list->name==$name){
                    $test=$list->id;
                }
            }
            
            $this->randomPosition($test);
        }
        
        //mettre un nouveau personnage dans une position aleatoire et vide 
        public function randomPosition($id){
            
            //prendre deux valeurs aleatoire
            //regarde si ces valeurs sont des coordonnes d'un joueur
            //si oui, on refait la boucle
            //si non, on affecte ces coordonée au nouveua joueur 
            do{
                $x=rand(0,14);
                $y=rand(0,9);
                $test=true;
                
                $query=$this->find('all');
                $allFighter=$query->toArray();
                foreach($allFighter as $list){
                    if($list->coordinate_x==$x && $list->coordinate_y==$y){
                        $test=false;
                    }
                }
                
            }while($test==false);
            
            //si toutes les cases sont rempli nous sommes dans une boucle infini
            //on peut creer un compteur si dans le tableau on compte les joueurs et qu'il y en a 10*15
            //on pourra stopper la boucle
            
            $my=$this->get($id);
            $my->coordinate_x=$x;
            $my->coordinate_y=$y;
            
            $event= new EventsTable();
            
            $event->putInfo($my->name." enters in the arena",$my->coordinate_x,$my->coordinate_y);
            
            $this->save($my);
            //cette methode est appelé dans putinfo
        }
        
        
        public function findBigId(){
            //recuperer la table de la base de donnée
            $fighters = TableRegistry::get('fighters');
           
            //recupere la premiere ligne en triant par ordre descendant l'ID
            $fighter=$fighters->find()->order(['id' => 'DESC'])->first();
            
            return ($fighter);
           
        }
        
        public function allFighters(){
            //prendre tout les fighters dans l'ordre ascendant de l'id
            $query=$this->find('all')->order(['id'=> 'ASC']);
            //mettre la requete dans un tableau
            $allFighter=$query->toArray();
            
            return($allFighter);
        }  
        
        //if a name exist when we add a fighter it returns false
        public function ifExists($name){
            
            $test=true;
            $query=$this->find('all');
            $allFighter=$query->toArray();
            foreach($allFighter as $list){
                if($list->name==$name){
                    $test=false;
                }
            }
            return($test);
        }
        
        // return all the list of the fighter that we can see in our skill_sight
        public function getElementByView($fighter_id){
            $my=$this->get($fighter_id);
            $query=$this->find();
            $list=$query->toArray();
            
                    foreach($list as $n=>$fighter){
                        if(abs($fighter->coordinate_y - $my->coordinate_y) 
                         + abs($fighter->coordinate_x - $my->coordinate_x) 
                                > $my->skill_sight){
                                unset($list[$n]);
                        }
                    }
                    
            return $list;
        }
        
        
        //if there is someone next to you .. not allow the move so return false
        public function possibleMove($x,$y,$id){
                
               $result=true;
               $query=$this->find();
               $list=$query->toArray();
               
               
               foreach($list as $n=>$fighter){
                        if($fighter->coordinate_y==$y && $fighter->coordinate_x==$x ){
                            
                            //l'adversaire
                            $o=$this->get($fighter->id);
                            //moi
                            $my=$this->get($id);
                            
                            $event = new EventsTable();
                            
                             //Algorithme d'attaque 
                            if(rand(1,20)>10+$o->level-$my->level){
                                //j'enleve de la vie à l'adversaire, le nombre de ma force
                                $o->current_health-=$my->skill_strength;
                                //je gagne 1 point xp pour la reuissite de l'attaque
                                $my->xp++;
                                
                                $event->putInfo($my->name." attack ".$o->name. " and touch him",
                                                $my->coordinate_x,$my->coordinate_y);
                                
                                // si je tue mon adversaire
                                if($o->current_health<=0){
                                    
                                    $event->putInfo($my->name." attack ".$o->name. " and kill him",$my->coordinate_x,$my->coordinate_y);
                                    
                                     // je recupere en xp le level de mon adversaire 
                                     $my->xp+=$o->level;
                                     //JE TRICHE// 20 est la case poubelle pour deplacer les morts
                                     $o->coordinate_x=20;
                                     $o->coordinate_y=20;
                                   
                                }
                                $this->save($o);
                                $this->save($my);  
                            }
                            
                            else $event->putInfo($my->name." try to attack ".$o->name. ", but don't touch him",$my->coordinate_x,$my->coordinate_y);
                                $result=false;
                        }
               }
               return $result;
        }   
        //change the data of the location of the fighter with moving
        public function direction($id,$direction){
            
            if($direction!=0 ){
                
                    $o=$this->get($id);
            
                  if($direction==1 && $o->coordinate_y>0 && $this->possibleMove($o->coordinate_x,$o->coordinate_y-1,$id) ) $o->coordinate_y--;
                  if($direction==2 && $o->coordinate_x>0 && $this->possibleMove($o->coordinate_x-1,$o->coordinate_y,$id)) $o->coordinate_x--;
                  if($direction==3 && $o->coordinate_x<14 && $this->possibleMove($o->coordinate_x+1,$o->coordinate_y,$id)) $o->coordinate_x++;
                  if($direction==4 && $o->coordinate_y<9 && $this->possibleMove($o->coordinate_x,$o->coordinate_y+1,$id)) $o->coordinate_y++;
            
                $this->save($o);
            }  
        }
        
        
        //Avec le calcul, decide si les boutons doivent etre montré dans la page change level
        public function showcarac($id){
            
            $result=false;
            $o=$this->get($id);
            if(($o->xp)/4 >= $o->level){
                $result=true;
            }
            
            return $result;
        }
        
        //mise a jour de sight dans la base de donnée ainsi que level
        public function addSight($id){
            $o=$this->get($id);
            $o->skill_sight++;
            $o->level++;
            $this->save($o);
            
            $event = new EventsTable();
            
            $event->putInfo($o->name." add one sight, he have now ".$o->skill_sight." sight",$o->coordinate_x,$o->coordinate_y);
            
        }
        
        //mise a jour de health dans la base de donnée ainsi que level
         public function addHealth($id){
            $o=$this->get($id);
            $o->skill_health++;
            $o->current_health=$o->skill_health;
            $o->level++;
            $this->save($o);
             
            $event = new EventsTable();
            
            $event->putInfo($o->name." add one health, he have now ".$o->skill_health." health",$o->coordinate_x,$o->coordinate_y);
             
        }
        
        //mise a jour de strength dans la base de donnée ainsi que level
         public function addStrength($id){
            $o=$this->get($id);
            $o->skill_strength++;
            $o->level++;
            $this->save($o);
             
            $event = new EventsTable();
            
            $event->putInfo($o->name." add one strength, he have now ".$o->skill_strength." strength",$o->coordinate_x,$o->coordinate_y);
        }
        
        //Recupere le nom, supprime l'instance, et envoie le nom au controller
        public function removeDead($id){
            $o=$this->get($id);
            $name=$o->name;
            $supp=$this->delete($o);
            
            return $name;
        }
       
       
}

