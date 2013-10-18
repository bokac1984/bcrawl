<?php
App::uses('AppModel', 'Model');
/**
 * SearchResult Model
 *
 * @property Search $Search
 * @property Client $Client
 */
class SearchResult extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'link';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Search' => array(
			'className' => 'Search',
			'foreignKey' => 'search_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'search_result_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
