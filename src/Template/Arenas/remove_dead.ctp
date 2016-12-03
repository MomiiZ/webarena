

the fighter <?= $name ?> is dead

<br>
Do you want to create a new fighter ?

<br>
<button>
    <?php echo $this->Html->link('YES',
                                 ['controller' => 'Arenas', 'action' => 'addFighter']
                                );
    ?>
</button>

<button>
    <?php echo $this->Html->link('NO',
                                 ['controller' => 'Arenas', 'action' => 'fighter']
                                );
    ?>
</button>

