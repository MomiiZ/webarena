<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Webarena
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
$session = $this->request->session();
$name = $session->read('Auth.User.email');
?>
</head>
<body>
    <div id="fb-root"></div>

    
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">WebArena</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                
                
<?php

$name1 = $this->Html->link(
        $name,
        array('controller' => 'Arenas', 'action' => 'fighter')); 
        
        echo '<li><a>';echo $name1; echo '</a></li>';                   
if (!is_null($this->request->session()->read('Auth.User.email'))) {
   // user is logged 
   
    $events = $this->Html->link(
        'Events',
        array('controller' => 'Arenas', 'action' => 'diary')); 
        
        echo '<li><a>';echo $events; echo '</a></li>';
   
    $logout = $this->Html->link(
        'Logout',
        array('controller' => 'Arenas', 'action' => 'logout')); 
        
        echo '<li><a>';echo $logout; echo '</a></li>';
        
    
   
}
    
 else {
   // the user is not logged in
     
   $Login = $this->Html->link(
        'Login',
        array('controller' => 'Arenas', 'action' => 'login'));
    
    
    $Signup = $this->Html->link(
        'Sign Up',
        array('controller' => 'Arenas', 'action' => 'add'));
 
    echo '<li><a>';echo $Login; echo '</a></li>';
    
    
    echo '<li><a>';echo $Signup; echo '</a></li>';
    
}
    
?>
                
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
<footer>
</footer>
</body>
<?php echo $this->Html->script('facebook'); ?>
</html>
