
<h1> Your fighter is created ! </h1>

The name is : <?php echo $fighter->name;?> <br>
The level is : <?php echo $fighter->level;?> <br> 

<u>The caracteristics:</u> <br><br>

Xp: <?php echo $fighter->xp;?> <br><br>


Sight : <?php echo $fighter->skill_sight;?> <br>
Strength: <?php echo $fighter->skill_strength;?> <br>
Health: <?php echo $fighter->current_health;?>/<?php echo $fighter->skill_health;?> <br>



<?php echo $this->Html->link(
        'Fighters Page',
        array('controller' => 'Arenas', 'action' => 'fighter','_full' => true),
        ['class' => 'button']
            );
    ?>



