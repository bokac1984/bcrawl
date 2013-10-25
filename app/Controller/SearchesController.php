<?php
App::uses('AppController', 'Controller');
/**
 * Searches Controller
 *
 * @property Search $Search
 * @property PaginatorComponent $Paginator
 */
class SearchesController extends AppController {

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
		$this->Search->recursive = 0;
		$this->set('searches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Search->exists($id)) {
			throw new NotFoundException(__('Invalid search'));
		}
		$options = array('conditions' => array('Search.' . $this->Search->primaryKey => $id));
		$this->set('search', $this->Search->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Search->create();
			if ($this->Search->save($this->request->data)) {
				$this->Session->setFlash(__('The search has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.'));
			}
		}
		$users = $this->Search->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Search->exists($id)) {
			throw new NotFoundException(__('Invalid search'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Search->save($this->request->data)) {
				$this->Session->setFlash(__('The search has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Search.' . $this->Search->primaryKey => $id));
			$this->request->data = $this->Search->find('first', $options);
		}
		$users = $this->Search->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Search->id = $id;
		if (!$this->Search->exists()) {
			throw new NotFoundException(__('Invalid search'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Search->delete()) {
			$this->Session->setFlash(__('The search has been deleted.'));
		} else {
			$this->Session->setFlash(__('The search could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
