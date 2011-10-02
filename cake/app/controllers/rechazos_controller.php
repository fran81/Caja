<?php
class RechazosController extends AppController {

	var $name = 'Rechazos';

	function index() {
		$this->Rechazo->recursive = 0;
		$this->set('rechazos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rechazo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rechazo', $this->Rechazo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Rechazo->create();
			if ($this->Rechazo->save($this->data)) {
				$this->Session->setFlash(__('The rechazo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rechazo could not be saved. Please, try again.', true));
			}
		}
		$cheques = $this->Rechazo->Cheque->find('list');
		$this->set(compact('cheques'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rechazo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rechazo->save($this->data)) {
				$this->Session->setFlash(__('The rechazo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rechazo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rechazo->read(null, $id);
		}
		$cheques = $this->Rechazo->Cheque->find('list');
		$this->set(compact('cheques'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rechazo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Rechazo->delete($id)) {
			$this->Session->setFlash(__('Rechazo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rechazo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>