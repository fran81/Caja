<?php
class MovimientosController extends AppController {

	var $name = 'Movimientos';

	function index() {
		$this->Movimiento->recursive = 0;
		$this->set('movimientos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid movimiento', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('movimiento', $this->Movimiento->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Movimiento->create();
			if ($this->Movimiento->save($this->data)) {
				$this->Session->setFlash(__('The movimiento has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movimiento could not be saved. Please, try again.', true));
			}
		}
		$operacions = $this->Movimiento->Operacion->find('list');
		$this->set(compact('operacions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid movimiento', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$movimiento = $this->Movimiento->getID($this->Movimiento->save($this->data));
			if ($movimiento) {
				$this->Session->setFlash(__('The movimiento has been saved', true));
				$id_operacion = $this->Movimiento->query("SELECT `id` FROM `operacions`
WHERE `operacions`.`id` = (SELECT `operacion_id` FROM `movimientos`
WHERE `movimientos`.`id` ='". $movimiento."')");
				$this->redirect(array('controller' => 'operacions', 'action' => 'editar',$id_operacion[0]['operacions']['id']));
			} else {
				$this->Session->setFlash(__('The movimiento could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Movimiento->read(null, $id);
		}
		$operacions = $this->Movimiento->Operacion->find('list');
		$this->set(compact('operacions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for movimiento', true));
			$this->redirect(array('action'=>'index'));
		}
		$movimiento = $this->Movimiento->find('first', array('conditions'=>array('Movimiento.id'=>$id)));
//		Debugger::dump($movimiento);
//		yesto();
//		if ($this->Movimiento->Sellado
		$this->Movimiento->Sellado->delete($movimiento['Sellado']['id']);
		if ($this->Movimiento->delete($id)) {
			$this->Session->setFlash(__('Movimiento deleted', true));
			$this->redirect(array('controller' => 'operacions', 'action' => 'editar',$movimiento['Movimiento']['operacion_id']));
		}
		$this->Session->setFlash(__('Movimiento was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function guardar($data) {
		if (!empty($data)) {
			Debugger::dump($data);
			$data['Movimiento']['operacion_id'] = $data['Operacion']['operacion_id'];
			$this->Movimiento->create();
			if ($this->Movimiento->save($data)) {
				$this->Session->setFlash(__('The movimiento has been saved', true));
			} else {
				$this->Session->setFlash(__('The movimiento could not be saved. Please, try again.', true));
			}
		}
	}

}
?>
