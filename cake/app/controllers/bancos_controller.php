<?php
class BancosController extends AppController {

	var $name = 'Bancos';
//	var $helpers = array('Js');

	function index() {
		$this->Banco->recursive = 0;
		$this->set('bancos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid banco', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('banco', $this->Banco->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Banco->create();
			if ($this->Banco->save($this->data)) {
				$this->Session->setFlash(__('The banco has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banco could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid banco', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Banco->save($this->data)) {
				$this->Session->setFlash(__('The banco has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banco could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Banco->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for banco', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Banco->delete($id)) {
			$this->Session->setFlash(__('Banco deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Banco was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
