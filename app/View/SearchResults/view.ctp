<div class="searchResults view">
<h2><?php echo __('Search Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($searchResult['SearchResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Search'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchResult['Search']['name'], array('controller' => 'searches', 'action' => 'view', $searchResult['Search']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($searchResult['SearchResult']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crawled'); ?></dt>
		<dd>
			<?php echo h($searchResult['SearchResult']['crawled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($searchResult['SearchResult']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($searchResult['SearchResult']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Search Result'), array('action' => 'edit', $searchResult['SearchResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Search Result'), array('action' => 'delete', $searchResult['SearchResult']['id']), null, __('Are you sure you want to delete # %s?', $searchResult['SearchResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Searches'), array('controller' => 'searches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search'), array('controller' => 'searches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clients'); ?></h3>
	<?php if (!empty($searchResult['Client'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Search Result Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Twitter'); ?></th>
		<th><?php echo __('Facebook'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($searchResult['Client'] as $client): ?>
		<tr>
			<td><?php echo $client['id']; ?></td>
			<td><?php echo $client['search_result_id']; ?></td>
			<td><?php echo $client['name']; ?></td>
			<td><?php echo $client['website']; ?></td>
			<td><?php echo $client['phone']; ?></td>
			<td><?php echo $client['mobile']; ?></td>
			<td><?php echo $client['email']; ?></td>
			<td><?php echo $client['twitter']; ?></td>
			<td><?php echo $client['facebook']; ?></td>
			<td><?php echo $client['address']; ?></td>
			<td><?php echo $client['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clients', 'action' => 'view', $client['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clients', 'action' => 'edit', $client['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clients', 'action' => 'delete', $client['id']), null, __('Are you sure you want to delete # %s?', $client['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
