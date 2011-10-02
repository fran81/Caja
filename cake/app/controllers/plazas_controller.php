<?php
class PlazasController extends AppController {

	var $name = 'Plazas';

	function index() {
		$this->Plaza->recursive = 0;
		$this->set('plazas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid plaza', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('plaza', $this->Plaza->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Plaza->create();
			if ($this->Plaza->save($this->data)) {
				$this->Session->setFlash(__('The plaza has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plaza could not be saved. Please, try again.', true));
			}
		}
		$bancos = $this->Plaza->Banco->find('list');
		$this->set(compact('bancos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid plaza', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Plaza->save($this->data)) {
				$this->Session->setFlash(__('The plaza has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plaza could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Plaza->read(null, $id);
		}
		$bancos = $this->Plaza->Banco->find('list');
		$this->set(compact('bancos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for plaza', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Plaza->delete($id)) {
			$this->Session->setFlash(__('Plaza deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Plaza was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>