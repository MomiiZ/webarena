
<?php  
        $indexed=[];
        foreach($list as $f)
               $indexed[$f->coordinate_x][$f->coordinate_y]=$f;
               
           

?>

<table>
    <tr>
                <td><?= $my->name ?></td>
                <td>LEVEL: <?= $my->level     ?></td>
                <td>XP: <?= $my->xp     ?></td>
                <td>health: <?= $my->current_health     ?>/<?= $my->skill_health    ?></td>
                <td>strength: <?= $my->skill_strength     ?></td>
                <td>sight: <?= $my->skill_sight    ?></td>
</tr>
</table>


<?php $direction=0 ?>

<?php echo $this->Html->link('left ',
                                 ['controller' => 'Arenas', 'action' => 'game',$id,1]
                                );
    ?>
<?php echo $this->Html->link('up ',
                                 ['controller' => 'Arenas', 'action' => 'game',$id,2]
                                );
    ?>
<?php echo $this->Html->link('down ',
                                 ['controller' => 'Arenas', 'action' => 'game',$id,3]
                                );
    ?>
<?php echo $this->Html->link('right ',
                                 ['controller' => 'Arenas', 'action' => 'game',$id,4]
                                );
    ?>


<table>
    
  

   <?php for($i=0;$i<15;$i++){

        echo"<tr>";

        for($j=0;$j<10;$j++){
            
            if(abs($j - $my->coordinate_y) + abs($i - $my->coordinate_x) 
                                > $my->skill_sight){
                               echo "<td> . </td>";
            }
           
            elseif(isset($indexed[$i][$j])){
              echo "<td>" . $indexed[$i][$j]->name . "</td>";
            }
            else{
                echo "<td>  x  </td>" ;
            }
        }

        echo "</tr>";

    }
    ?>

</table>


<!--AFFICHER LE NOM FIGHTER AVEC SES CARACTERISIQUE AVEC $my -->


<button>
    <?php echo $this->Html->link('back ',
                                 ['controller' => 'Arenas', 'action' => 'fighter']
                                );
    ?>
</button>


