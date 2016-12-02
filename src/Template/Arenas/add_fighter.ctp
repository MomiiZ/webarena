
<h1>Create your fighter</h1>

<?php

echo $this->Form->create($create);
echo $this->Form->input('name'); 
echo $this->Form->button('Submit');
echo $this->Form->end();

?>