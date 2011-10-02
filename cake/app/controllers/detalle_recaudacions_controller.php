<?php
class DetalleRecaudacionsController extends AppController {

	var $name = 'DetalleRecaudacions';

	function index() {
		$this->DetalleRecaudacion->recursive = 0;
		$this->set('detalleRecaudacions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid detalle recaudacion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('detalleRecaudacion', $this->DetalleRecaudacion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DetalleRecaudacion->create();
			if ($this->DetalleRecaudacion->save($this->data)) {
				$this->Session->setFlash(__('The detalle recaudacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalle recaudacion could not be saved. Please, try again.', true));
			}
		}
		$cajas = $this->DetalleRecaudacion->Caja->find('list');
		$this->set(compact('cajas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid detalle recaudacion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DetalleRecaudacion->save($this->data)) {
				$this->Session->setFlash(__('The detalle recaudacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalle recaudacion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DetalleRecaudacion->read(null, $id);
		}
		$cajas = $this->DetalleRecaudacion->Caja->find('list');
		$this->set(compact('cajas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for detalle recaudacion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DetalleRecaudacion->delete($id)) {
			$this->Session->setFlash(__('Detalle recaudacion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Detalle recaudacion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>