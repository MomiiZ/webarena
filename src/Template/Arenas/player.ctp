<?php
$session = $this->request->session();
$name = $session->read('Auth.User.email');
?>

<html>

<body>
    <h1 class="text-center">Vos Combattants</h1>
    <p class="text-center">Sur cette page vous pouvez voir l'ensemble de vos combattants avec leurs caractéristiques</p>
    <?php echo $this->Html->link(
        'Add a player',
        array('controller' => 'Arenas', 'action' => 'fighter'),
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
