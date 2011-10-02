<?php
class CuentaPuentesController extends AppController {

	var $name = 'CuentaPuentes';
	var $components = array('Fecha');

	function index() {
		$this->CuentaPuente->recursive = 0;
		$this->set('cuentaPuentes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Cuenta Puente inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cuentaPuente', $this->CuentaPuente->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CuentaPuente->create();
			$this->data['CuentaPuente']['fecha'] = $this->Fecha->convertir($this->data['CuentaPuente']['fecha']);
			if ($this->CuentaPuente->save($this->data)) {
				$this->Session->setFlash(__('La cuenta puente fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cuenta puente no pudo ser guardada.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cuenta Puente inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['CuentaPuente']['fecha'] = $this->Fecha->convertir($this->data['CuentaPuente']['fecha']);
			if ($this->CuentaPuente->save($this->data)) {
				$this->Session->setFlash(__('La cuenta puente fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cuenta puente no pudo ser guardada.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CuentaPuente->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para la cuenta puente', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CuentaPuente->delete($id)) {
			$this->Session->setFlash(__('Cuenta puente borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La cuenta puente no fue borrada', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
