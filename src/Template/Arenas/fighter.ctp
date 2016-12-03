<?php
$session = $this->request->session();
$myemail= $session->read('Auth.User.email');
$myid=$session->read('Auth.User.id');
?>


<html>

<body>
    <h1 class="text-center">Hey <?php echo $myemail;?> ! Vos Combattants</h1>
    <p class="text-center">Sur cette page vous pouvez voir l'ensemble de vos combattants avec leurs caractéristiques</p>



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

<?php echo $this->Html->link(
        'Add a Fighter',
        array('controller' => 'Arenas', 'action' => 'addFighter'),
        ['class' => 'button']
            );
    ?>


</body>
<footer>
    <div class="footer-center">
        <p> <strong>Gr-SI5-03-AG</strong> - Antoine BUI , Amarnath SUNDARAM</p>

    </div>
</footer>
</html>
