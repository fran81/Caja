<?php
class MonedasController extends AppController {

	var $name = 'Monedas';

	function index() {
		$this->Moneda->recursive = 0;
		$this->set('monedas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid moneda', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('moneda', $this->Moneda->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Moneda->create();
			if ($this->Moneda->save($this->data)) {
				$this->Session->setFlash(__('The moneda has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moneda could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid moneda', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Moneda->save($this->data)) {
				$this->Session->setFlash(__('The moneda has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moneda could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Moneda->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for moneda', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Moneda->delete($id)) {
			$this->Session->setFlash(__('Moneda deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Moneda was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>