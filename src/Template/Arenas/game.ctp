
<?php  
        $indexed=[];
        foreach($list as $f)
               $indexed[$f->coordinate_x][$f->coordinate_y]=$f;
               
           

?>


<!--AFFICHER LE NOM FIGHTER AVEC SES CARACTERISIQUE AVEC $my -->
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


<table style="border-collapse: separate; border-spacing: 2px; border: solid 10px black; ">
    
  

   <?php for($i=0;$i<15;$i++){

        echo"<tr>";

        for($j=0;$j<10;$j++){
            
            if(abs($j - $my->coordinate_y) + abs($i - $my->coordinate_x) 
                                > $my->skill_sight){
                                echo "<td style='background-color:DarkSlateBlue;'> . </td>";
            }
           
            elseif(isset($indexed[$i][$j])){
              echo "<td style='background-color:SkyBlue;'>" . $indexed[$i][$j]->name . "</td>";
            }
            else{
                echo "<td style='background-color:LightGrey;'>  x  </td>" ;
            }
        }

        echo "</tr>";

    }
    ?>

</table>




    <?php 
        echo $this->Html->link(
                                'My Fighters',
                                array('controller' => 'Arenas', 'action' => 'fighter'),
                                ['class' => 'button']
                                    );
        ?>
