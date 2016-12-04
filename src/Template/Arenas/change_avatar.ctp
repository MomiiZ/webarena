<?php $this->assign('title', "Change avatar");?>

<div class="large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Change avatar</h2>
		
	
	<?php 
echo $this->Form->create($particularRecord, ['enctype' => 'multipart/form-data']);
echo $this->Form->input('upload', ['type' => 'file']);
echo $this->Form->button('Update avatar', ['class' => 'btn btn-lg btn-success1 btn-block padding-t-b-15']);
echo $this->Form->end();       
?>
	
</div>