<?php
class EfectivosController extends AppController {

	var $name = 'Efectivos';

	function index() {
		$this->Efectivo->recursive = 0;
		$this->set('efectivos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid efectivo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('efectivo', $this->Efectivo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Efectivo->create();
			if ($this->Efectivo->save($this->data)) {
				$this->Session->setFlash(__('The efectivo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The efectivo could not be saved. Please, try again.', true));
			}
		}
		$monedas = $this->Efectivo->Moneda->find('list');
		$this->set(compact('monedas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid efectivo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$efectivo = $this->Efectivo->getID($this->Efectivo->save($this->data));
			if ($efectivo) {
				$this->Session->setFlash(__('The efectivo has been saved', true));
				$id_operacion = $this->Efectivo->query("SELECT `id` FROM `operacions`
WHERE `operacions`.`id` = (SELECT `operacion_id` FROM `flujos`
WHERE `flujos`.`efectivo_id` ='". $efectivo."')");
				$this->redirect(array('controller' => 'operacions', 'action' => 'editar',$id_operacion[0]['operacions']['id']));
			} else {
				$this->Session->setFlash(__('The efectivo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Efectivo->read(null, $id);
			Debugger::dump($this->data['Cotizacion']);
		}
		$monedas = $this->Efectivo->Cotizacion->Moneda->find('list');
		$this->set(compact('monedas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for efectivo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Efectivo->delete($id)) {
			$this->Session->setFlash(__('Efectivo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Efectivo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
