<?php
class CuentasController extends AppController {

	var $name = 'Cuentas';

	function index() {
		$this->Cuenta->recursive = 0;
		$this->set('cuentas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cuenta', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cuenta', $this->Cuenta->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Cuenta->create();
			if ($this->Cuenta->save($this->data)) {
				$this->Session->setFlash(__('The cuenta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuenta could not be saved. Please, try again.', true));
			}
		}
		$bancos = $this->Cuenta->Banco->find('list');
		$this->set(compact('bancos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cuenta', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Cuenta->save($this->data)) {
				$this->Session->setFlash(__('The cuenta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuenta could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Cuenta->read(null, $id);
		}
		$bancos = $this->Cuenta->Banco->find('list');
		$this->set(compact('bancos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cuenta', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cuenta->delete($id)) {
			$this->Session->setFlash(__('Cuenta deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cuenta was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>