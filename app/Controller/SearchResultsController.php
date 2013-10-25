<?php
App::uses('AppController', 'Controller');
/**
 * SearchResults Controller
 *
 * @property SearchResult $SearchResult
 * @property PaginatorComponent $Paginator
 */
class SearchResultsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->SearchResult->getContacts(2, 'http://www.burnhamlawgroup.com');
		$this->SearchResult->recursive = 0;
		$this->set('searchResults', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SearchResult->exists($id)) {
			throw new NotFoundException(__('Invalid search result'));
		}
		$options = array('conditions' => array('SearchResult.' . $this->SearchResult->primaryKey => $id));
		$this->set('searchResult', $this->SearchResult->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SearchResult->create();
			if ($this->SearchResult->save($this->request->data)) {
				$this->Session->setFlash(__('The search result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search result could not be saved. Please, try again.'));
			}
		}
		$searches = $this->SearchResult->Search->find('list');
		$this->set(compact('searches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SearchResult->exists($id)) {
			throw new NotFoundException(__('Invalid search result'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SearchResult->save($this->request->data)) {
				$this->Session->setFlash(__('The search result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SearchResult.' . $this->SearchResult->primaryKey => $id));
			$this->request->data = $this->SearchResult->find('first', $options);
		}
		$searches = $this->SearchResult->Search->find('list');
		$this->set(compact('searches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SearchResult->id = $id;
		if (!$this->SearchResult->exists()) {
			throw new NotFoundException(__('Invalid search result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SearchResult->delete()) {
			$this->Session->setFlash(__('The search result has been deleted.'));
		} else {
			$this->Session->setFlash(__('The search result could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
