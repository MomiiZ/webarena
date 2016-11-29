<?php
$session = $this->request->session();
$name = $session->read('Auth.User.email');
?>
<?php print $name; ?> 
<?php
if (!is_null($this->request->session()->read('Auth.User.email'))) {

   // user is logged 
    echo $this->Html->link(
        'Logout',
        array('controller' => 'Arenas', 'action' => 'logout'),
        ['class' => 'button']
            );
    
} else {
   // the user is not logged in
    echo $this->Html->link(
        'Login',
        array('controller' => 'Arenas', 'action' => 'login'),
        ['class' => 'button']
            );
    
    
    echo $this->Html->link(
        'Sign Up',
        array('controller' => 'Arenas', 'action' => 'add'),
        ['class' => 'button']
            );
    
}
    
?>
<!DOCTYPE html>
<html>
<body>
  <body>
    <h1 class="text-center">Events</h1>
    <p class="text-center">Sur cette page vous pouvez voir l'ensemble des évènemets</p>

    <div class="container">
    <table class="table table-bordered" id="evenements">
	<thead>
   <tr><th>Name</th> <th>Date</th> <th>posX</th> <th>posY</th></tr> </thead>
 <tbody>
    </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#evenements').DataTable({
      "order": [[ 1, "desc" ]]
    });
  } );
</script>  </div>
</body>
<footer>
    <div class="container">
        <p class="text-center"> <strong>Gr-SI5-03-AG</strong> - Antoine BUI , Amarnath SUNDARAM</p>

    </div>
</footer>
</html>