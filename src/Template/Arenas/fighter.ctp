<html>

<body>
    <h1 class="text-center">Vos Combattants</h1>
    <p class="text-center">Sur cette page vous pouvez voir l'ensemble de vos combattants avec leurs caractéristiques</p>
    <p class="text-center">Cliquez sur le nom de votre combattants pour l'améliorer.</p>
    <h2 class="text-center">Hey <?php echo $myemail;?> !</h2>
     
    <aside class="large-5 medium-5  columns" style="display:block;">
        
         	<h3>Your Avatar</h3>
         	 <?php 
                if (file_exists(WWW_ROOT.'img'. DS . 'avatar' . DS .  $myid.'.jpg'))
                {
                echo $this->Html->image('avatar/'.$myid.'.jpg',array("width"=>"100", "height"=>"100"));

                }else 
                   {
                    echo $this->Html->image('avatar.jpg',array("width"=>"250", "height"=>"250"));
                    }
            ?>

                <a href="./changeAvatar" id="createFighterButton" class="button" onclick="" >Change my Avatar</a>
    </aside>



   



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
                                 ['controller' => 'Arenas', 'action' => 'changeLevel',$fighter->id,0],
                                   ['condition' => $fighter->player_id == $myid]
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

<?php echo $this->Html->link(
        'Add a Fighter',
        array('controller' => 'Arenas', 'action' => 'addFighter'),
        ['class' => 'button']
            );
    ?>

</body>

</html>
