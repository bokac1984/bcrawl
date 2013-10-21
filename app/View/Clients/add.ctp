<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Add Client'); ?></legend>
	<?php
		echo $this->Form->input('search_result_id');
		echo $this->Form->input('name');
		echo $this->Form->input('website');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('email');
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook');
		echo $this->Form->input('address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Search Results'), array('controller' => 'search_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Result'), array('controller' => 'search_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
