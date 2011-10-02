<?php
class ResponsablesController extends AppController {

	var $name = 'Responsables';

	function index() {
		$this->Responsable->recursive = 0;
		$this->set('responsables', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid responsable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('responsable', $this->Responsable->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Responsable->create();
			if ($this->Responsable->save($this->data)) {
				$this->Session->setFlash(__('The responsable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responsable could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid responsable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Responsable->save($this->data)) {
				$this->Session->setFlash(__('The responsable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responsable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Responsable->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for responsable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Responsable->delete($id)) {
			$this->Session->setFlash(__('Responsable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Responsable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function buscar($texto = null) {
	    	$this->autoRender=false;
			$this->Responsable->recursive = -1;
//			Debugger::dump($texto);
//			Debugger::dump($term);
//			$texto = $this->data['Operacion']['responsable_id'];
	    	$responsables=$this->Responsable->find('all',array('conditions'=>array('Responsable.nombre LIKE'=>'%'.$texto.'%'),'fields'=>array('Responsable.id','Responsable.nombre')));
	    	$i=0;
			$respuesta = array();
	    	foreach($responsables as $responsable){
				$respuesta[$i]['label']=$responsable['Responsable']['nombre'];
		    	$respuesta[$i]['value']=$responsable['Responsable']['id'];
		    	$i++;
			}
	    echo json_encode($respuesta);
	}

}
?>
