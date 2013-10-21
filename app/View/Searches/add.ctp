<div class="searches form">
<?php echo $this->Form->create('Search'); ?>
	<fieldset>
		<legend><?php echo __('Add Search'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('link');
		echo $this->Form->input('crawled');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Searches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Results'), array('controller' => 'search_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Result'), array('controller' => 'search_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
