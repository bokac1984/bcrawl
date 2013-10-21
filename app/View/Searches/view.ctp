<div class="searches view">
<h2><?php echo __('Search'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($search['Search']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($search['Search']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($search['Search']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crawled'); ?></dt>
		<dd>
			<?php echo h($search['Search']['crawled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($search['User']['id'], array('controller' => 'users', 'action' => 'view', $search['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($search['Search']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($search['Search']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Search'), array('action' => 'edit', $search['Search']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Search'), array('action' => 'delete', $search['Search']['id']), null, __('Are you sure you want to delete # %s?', $search['Search']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Searches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Results'), array('controller' => 'search_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Result'), array('controller' => 'search_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Search Results'); ?></h3>
	<?php if (!empty($search['SearchResult'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Search Id'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Crawled'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($search['SearchResult'] as $searchResult): ?>
		<tr>
			<td><?php echo $searchResult['id']; ?></td>
			<td><?php echo $searchResult['search_id']; ?></td>
			<td><?php echo $searchResult['link']; ?></td>
			<td><?php echo $searchResult['crawled']; ?></td>
			<td><?php echo $searchResult['created']; ?></td>
			<td><?php echo $searchResult['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'search_results', 'action' => 'view', $searchResult['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'search_results', 'action' => 'edit', $searchResult['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'search_results', 'action' => 'delete', $searchResult['id']), null, __('Are you sure you want to delete # %s?', $searchResult['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Search Result'), array('controller' => 'search_results', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
