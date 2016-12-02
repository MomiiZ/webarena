

 <h1>All your fighters !</h1>


<table>

    <tr>
        
        <th>Name </th>
        <th>Level</th>
        <th>XP</th>
        <th>Strength</th>
        <th>Health</th>
        <th>Sight</th>
    </tr>

 <?php foreach ($allFighter as $fighter): ?>
    <tr>
        

        <td> <?php echo $this->Html->link($fighter->name,
                                 ['controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,0]
                                );
            ?>
        </td>


        <td><?= $fighter->level?></td>
        <td><?= $fighter->xp?></td>
        <td><?= $fighter->skill_strength?></td>
        
        <!-- si la vie est negatif, on affiche DEAD -->
        <?php if($fighter->current_health<=0) { ?>
        <td> 
        <?php echo $this->Html->link('DEAD',
                                 ['controller' => 'Arenas', 'action' => 'removeDead',$fighter->id]
                                );
         ?>
         </td>
        <?php }else{ ?>
            <td><?= $fighter->current_health?>/<?= $fighter->skill_health?></td> 
        <?php } ?> 
       
        
        <td><?= $fighter->skill_sight?></td>
    </tr>
 <?php endforeach; ?>
</table>
<br>



<button>
    <?php echo $this->Html->link('add a fighter',
                                 ['controller' => 'Arenas', 'action' => 'addFighter']
                                );
    ?>
</button>

<button>
    <?php echo $this->Html->link('back ',
                                 ['controller' => 'Arenas', 'action' => '']
                                );
    ?>
</button>

