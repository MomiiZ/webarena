

the fighter <?= $name ?> is dead

<br>
Do you want to create a new fighter ?

<br>

<?php echo $this->Html->link(
        'YES',
        array('controller' => 'Arenas', 'action' => 'addFighter'),
        ['class' => 'button']
            );
    ?>

<?php echo $this->Html->link(
        'NO',
        array('controller' => 'Arenas', 'action' => 'fighter'),
        ['class' => 'button']
            );
?>
