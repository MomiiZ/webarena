
<table>

    <tr>
        
        <th>Name </th>
        <th>Level</th>
        <th>XP</th>
        <th>Strength</th>
        <th>Health</th>
        <th>Sight</th>
    </tr>

    <tr>
        <td><?= $fighter->name?></td>
        <td><?= $fighter->level?> </td>
        <td><?= $fighter->xp?></td>
        <td><?= $fighter->skill_strength?></td>
        <td><?= $fighter->current_health?>/<?= $fighter->skill_health?></td>
        <td><?= $fighter->skill_sight?></td>
    </tr>
<br>
    
    <?php  if($show) {  
        echo $this->Html->link(
                                'Sight',
                                array('controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,1),
                                ['class' => 'button']
                                    );
   
        echo $this->Html->link(
                                'Health',
                                array('controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,2),
                                ['class' => 'button']
                                    );
        
        echo $this->Html->link(
                                'Strength',
                                array('controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,3),
                                ['class' => 'button']
                                    );
        
        }else { 
     ?>

        <h3> You need <?= (4-($fighter->xp%4)) ?>  more xp to add caracteristic </h3>
        <br>
    <?php } ?>
</table>

    <?php 
        
        echo $this->Html->link(
                                'Go back',
                                array('controller' => 'Arenas', 'action' => 'fighter'),
                                ['class' => 'button']
                                    );


        echo $this->Html->link(
                                'PLAY !',
                                array('controller' => 'Arenas', 'action' => 'game',$fighter->id,0),
                                ['class' => 'button']
                                    );
?>
