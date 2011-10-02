<?php
class CotizacionsController extends AppController {

	var $name = 'Cotizacions';
	var $helpers = array('Js');
	var $components = array('Fecha');

	function index() {
		$this->Cotizacion->recursive = 0;
		$this->set('cotizacions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Cotización inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cotizacion', $this->Cotizacion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Cotizacion->create();
			$this->data['Cotizacion']['fecha_desde'] = $this->Fecha->convertir($this->data['Cotizacion']['fecha_desde']);
			$this->data['Cotizacion']['fecha_hasta'] = $this->Fecha->convertir($this->data['Cotizacion']['fecha_hasta']);
			$this->Cotizacion->recursive = -1;
			$cotizacionVieja =$this->Cotizacion->find('first', array('conditions'=>array('fecha_hasta'=>null,'moneda_id'=>$this->data['Cotizacion']['moneda_id'])));
			$fecha_hasta = $this->data['Cotizacion']['fecha_desde'];
			if ($this->Cotizacion->save($this->data)) {
				$this->Cotizacion->id = $cotizacionVieja['Cotizacion']['id'];
				$this->Cotizacion->saveField('fecha_hasta',$fecha_hasta);

				$this->Session->setFlash(__('La cotización fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cotización no pudo ser guardada.', true));
			}
		}
		$monedas = $this->Cotizacion->Moneda->find('list');
		$this->set(compact('monedas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cotizacion inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		$this->data['Cotizacion']['fecha_desde'] = $this->Fecha->convertir($this->data['Cotizacion']['fecha_desde']);
		$this->data['Cotizacion']['fecha_hasta'] = $this->Fecha->convertir($this->data['Cotizacion']['fecha_hasta']);
			if ($this->Cotizacion->save($this->data)) {
				$this->Session->setFlash(__('La cotización fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cotización no pudo ser guardada.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Cotizacion->read(null, $id);
		}
		$monedas = $this->Cotizacion->Moneda->find('list');
		$this->set(compact('monedas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para una cotización', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cotizacion->delete($id)) {
			$this->Session->setFlash(__('Cotización borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La cotización no fue borrada', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
