<div class="searchResults form">
<?php echo $this->Form->create('SearchResult'); ?>
	<fieldset>
		<legend><?php echo __('Edit Search Result'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('search_id');
		echo $this->Form->input('link');
		echo $this->Form->input('crawled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SearchResult.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SearchResult.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Search Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Searches'), array('controller' => 'searches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search'), array('controller' => 'searches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
