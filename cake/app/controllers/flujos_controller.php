<?php
class FlujosController extends AppController {

	var $name = 'Flujos';

	function index() {
		$this->Flujo->recursive = 0;
		$this->set('flujos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid flujo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('flujo', $this->Flujo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Flujo->create();
			if ($this->Flujo->save($this->data)) {
				$this->Session->setFlash(__('The flujo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flujo could not be saved. Please, try again.', true));
			}
		}
		$cheques = $this->Flujo->Cheque->find('list');
		$efectivos = $this->Flujo->Efectivo->find('list');
		$operacions = $this->Flujo->Operacion->find('list');
		$cuentaPuentes = $this->Flujo->CuentaPuente->find('list');
		$this->set(compact('cheques', 'efectivos', 'operacions', 'cuentaPuentes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid flujo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Flujo->save($this->data)) {
				$this->Session->setFlash(__('The flujo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flujo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Flujo->read(null, $id);
		}
		$cheques = $this->Flujo->Cheque->find('list');
		$efectivos = $this->Flujo->Efectivo->find('list');
		$operacions = $this->Flujo->Operacion->find('list');
		$cuentaPuentes = $this->Flujo->CuentaPuente->find('list');
		$this->set(compact('cheques', 'efectivos', 'operacions', 'cuentaPuentes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for flujo', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Flujo->recursive = -1;
		$flujo = $this->Flujo->find('first',array('conditions' => array('Flujo.id' => $id)));
		$this->Flujo->delete($id)
		$this->Flujo->Cheque->delete($flujo['Flujo']['cheque_id']);
		$this->Flujo->Efectivo->delete($flujo['Flujo']['efectivo_id']);
		$this->Flujo->CuentaPuente->delete($flujo['Flujo']['cheque_puente_id']);
		$this->Session->setFlash(__('Flujo borrado', true));
		$this->redirect(array('controller'=>'operacions', 'action'=>'editar', $flujo['Flujo']['operacion_id']));
		$this->Session->setFlash(__('Flujo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
