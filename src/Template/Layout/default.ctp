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
    <script>
        
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                window.location = 'http://localhost/webarena_group_si5_03_ag/arenas/login';
                }
            }


            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1795323917400371',
                    cookie     : true,  // enable cookies to allow the server to access 
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.8' // use graph api version 2.8
                });

                // Now that we've initialized the JavaScript SDK, we call 
                // FB.getLoginStatus().  This function gets the state of the
                // person visiting this page and can return one of three states to
                // the callback you provide.  They can be:
                //
                // 1. Logged into your app ('connected')
                // 2. Logged into Facebook, but not your app ('not_authorized')
                // 3. Not logged into Facebook and can't tell if they are logged into
                //    your app or not.
                //
                // These three cases are handled in the callback function.

                /*FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });*/

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));


            function login(){
                FB.login(function(response) {
                    statusChangeCallback(response);
                }, {scope: 'public_profile,email'});
                
            }

            function logout() {
                if (typeof response === 'undefined') {
                    window.location = 'http://localhost/webarena_group_si5_03_ag/arenas';
                    
                }
                else{
                    FB.logout(function(response) {
                        // user is now logged out
                    window.location = 'http://localhost/webarena_group_si5_03_ag/arenas';
                    });
                }
            }


</script>
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
   $fighters = $this->Html->link(
        'Your Fighters',
        array('controller' => 'Arenas', 'action' => 'fighter')); 
        
        echo '<li><a>';echo $fighters; echo '</a></li>';
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
    <div class="footer-center">
        <p> <strong>Gr-SI5-03-AG</strong> - Antoine BUI , Amarnath SUNDARAM</p>
        <a href="https://github.com/MomiiZ/webarena/commits/master">GitHub Log (You can find the log file in the source folder)</a>

        
    </div>
</footer>
</body>

</html>
