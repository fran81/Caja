<?php
class SelladosController extends AppController {

	var $name = 'Sellados';

	function index() {
		$this->Sellado->recursive = 0;
		$this->set('sellados', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sellado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sellado', $this->Sellado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Sellado->create();
			if ($this->Sellado->save($this->data)) {
				$this->Session->setFlash(__('The sellado has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sellado could not be saved. Please, try again.', true));
			}
		}
		$movimientos = $this->Sellado->Movimiento->find('list');
		$this->set(compact('movimientos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sellado', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Sellado->save($this->data)) {
				$this->Session->setFlash(__('The sellado has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sellado could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Sellado->read(null, $id);
		}
		$movimientos = $this->Sellado->Movimiento->find('list');
		$this->set(compact('movimientos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sellado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Sellado->delete($id)) {
			$this->Session->setFlash(__('Sellado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sellado was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>