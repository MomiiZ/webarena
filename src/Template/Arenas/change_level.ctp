
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
    
    <?php  if($show) {   ?>
    <button>
      <?php echo $this->Html->link('Sight',
                              ['controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,1]
                                );
           ?>  
    </button>
    <button>
      <?php echo $this->Html->link('Health',
                              ['controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,2]
                                );
           ?> 
    </button>
    <button>
      <?php echo $this->Html->link('Strength',
                              ['controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,3]
                                );
           ?> 
    </button>
    <?php   }else {  ?>

        <h3> You need <?= (4-($fighter->xp%4)) ?>  more xp to add caracteristic </h3>
        <br>
    <?php } ?>
</table>


<button>
    <?php echo $this->Html->link('back',
                                 ['controller' => 'Arenas', 'action' => 'fighter', '_full' => true]
                                );
    ?>
</button>

<button>
    <?php echo $this->Html->link('PLAY',
                                 ['controller' => 'Arenas', 'action' => 'game',$fighter->id,0]
                                );
    ?>
</button>