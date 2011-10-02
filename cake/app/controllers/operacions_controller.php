<?php
class OperacionsController extends AppController {

	var $name = 'Operacions';
	var $components = array('ListData','Fecha','Ajax');

	function index() {
		$this->Operacion->recursive = 0;
		$this->set('operacions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid operacion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('operacion', $this->Operacion->read(null, $id));
	}

	function add() {

		if (!empty($this->data)) {
			$this->Operacion->create();
			if ($this->Operacion->save($this->data)) {
				$this->Session->setFlash(__('The operacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operacion could not be saved. Please, try again.', true));
			}
		}
		$responsables = $this->Operacion->Responsable->find('list');
		$cajas = $this->Operacion->Caja->find('list');
		$this->set(compact('responsables', 'cajas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid operacion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Operacion->save($this->data)) {
				$this->Session->setFlash(__('The operacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operacion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Operacion->read(null, $id);
		}
		$responsables = $this->Operacion->Responsable->find('list');
		$cajas = $this->Operacion->Caja->find('list');
		$this->set(compact('responsables', 'cajas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for operacion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Operacion->delete($id)) {
			$this->Session->setFlash(__('Operacion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Operacion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	

	function crearMovimiento() {
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

	function crearFlujo() {
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
		$plaza = $this->ListData->getListData($this->Cheque);
		$this->set('listdata', $plaza);
		$this->set(compact('cheques', 'efectivos', 'operacions', 'cuentaPuentes'));
	}

	function cargar2() {
		if (!empty($this->data)) {
			Debugger::dump($this->data['Operacion']['id']);
			$this->Operacion->id = $this->data['Operacion']['id'];
			if ($this->Cheque->saveField('estado', 'Terminada')) {
				echo 'Operación cerrada';
			}

		}
		$this->Operacion->recursive = 2;
		$responsables = $this->Operacion->Responsable->find('list');
		$users = $this->Operacion->User->find('list');
		$caja = $this->ListData->getListCaja($this->Operacion->Caja, "Activa");
		$this->set('listcaja', $caja);
		$this->loadModel('Cheque');
		$cheques = $this->Cheque->find('list');
		$this->set(compact('responsables', 'users'));
		$plaza = $this->ListData->getListData($this->Cheque);
		$this->set('listdata', $plaza);
	}

	function elegirAccion() {
		$this->loadModel('Moneda');
		$monedas = $this->Moneda->find('list');
		$this->set('monedas', $monedas);
		$this->loadModel('Cheque');
//		$monedas = $this->Cheque->find('list');
//		Debugger::dump($monedas);
		$plaza = $this->ListData->getListData($this->Cheque);
		$this->set('listdata', $plaza);
		$operaciones = $this->Operacion->listaroperacion();
		$this->Cheque->recursive = 2;
		$this->Cheque->paginate = array('limit' => 10);
		$this->set('cheques', $this->paginate("Cheque", array('Cheque.estado' => 'cartera')));
	}

	function crear(){
		$this->autoRender=false;
		$string = $_REQUEST['string'];
		$aux = explode('&', $string);
		$Operacion['Operacion']['responsable_id'] = $aux[0];
		$Operacion['Operacion']['user_id'] = $aux[1];
		$this->Operacion->create();
		if ($this->Operacion->save($Operacion)) {
			$this->Session->setFlash(__('The flujo has been saved', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The flujo could not be saved. Please, try again.', true));
		}
		$this->redirect(array('action' => 'index'));
	}

	function crear2(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		if (!empty($this->data['Operacion']['responsable_id']) && !empty($this->data['Operacion']['caja_id'])) {
			$this->data['Operacion']['estado'] = "Iniciada";
			$this->Operacion->create();
			$id_operacion = $this->Operacion->getID($this->Operacion->save($this->data));
		}
		$json = '{"id":' . '"' . $id_operacion . '"' . '}';
		$this->header('Content-Type: application/json');
		echo $json;
		return;
	}
	function guardarMovimiento() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->data['Movimiento']['operacion_id'] = $this->data['Operacion']['id'];
		$this->Operacion->Movimiento->create();
		$movimiento = $this->Operacion->Movimiento->getID($this->Operacion->Movimiento->save($this->data));
		return $movimiento;
	}

	function buscaCotizacion() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->loadModel('Moneda');
		$resultado = $this->Moneda->Cotizacion->find('first', array(
			'fields' => array('importe','id'),
			'conditions' => array(
				'Cotizacion.moneda_id' => $this->data['Moneda']['id'], 
				'Cotizacion.fecha_hasta' => null)
			)
		);
		$importe = $resultado['Cotizacion']['importe'];
		$id = $resultado['Cotizacion']['id'];
		$json = '{"importe":"' . $importe . '","id":"' . $id . '"}';
		echo $json;
		return;
	}
	
	function guardarEfectivo() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		if ($this->data['Flujo']['operacion_id'] == null) {
			$this->data['Flujo']['operacion_id'] = $this->data['Operacion']['id'];
		}
		if ($this->data['Flujo']['tipo'] == 'S') {
			if ($this->data['Efectivo']['importe'] != null) {
				$this->data['Efectivo']['importe'] = '-'.$this->data['Efectivo']['importe'];
			} else if ($this->data['Cheque']['importe'] != null) {
				$this->data['Cheque']['importe'] = '-'.$this->data['Cheque']['importe'];
			} else {
				$this->data['CuentaPuente']['importe'] = '-'.$this->data['CuentaPuente']['importe'];
			}
		}
		$this->Operacion->Flujo->Efectivo->create();
		$this->data['Flujo']['efectivo_id'] = $this->Operacion->Flujo->Efectivo->getID($this->Operacion->Flujo->Efectivo->save($this->data));
		$this->Operacion->Flujo->save($this->data);
	}

	function guardarCheque() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->data['Flujo']['operacion_id'] = $this->data['Operacion']['id'];
		$this->Operacion->Flujo->Cheque->create();
		$this->data['Cheque']['estado'] = "depositado";
		$this->data['Cheque']['responsable_id'] = $this->data['Operacion']['responsable_id'];
		$this->data['Cheque']['fecha_cobro'] = $this->Fecha->convertir($this->data['Cheque']['fecha_cobro']);
		if($this->data['Cheque']['tipo'] != "corriente")
		{
			$this->data['Cheque']['fecha_limite'] = $this->Fecha->convertir($this->data['Cheque']['fecha_limite']);
			if($this->data['Cheque']['tipo'] == "diferido") {
				$this->data['Cheque']['estado'] = "cartera";
			} else {
				$this->data['Cheque']['estado'] = "cartera";
			}
		} 	
		$this->data['Flujo']['cheque_id'] = $this->Operacion->Flujo->Cheque->getID($this->Operacion->Flujo->Cheque->save($this->data));
		$this->Operacion->Flujo->save($this->data);
	}

	function checkCheque() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$numero = $this->data['Cheque']['numero'];
		$plaza = $this->data['Cheque']['plaza_id'];
		$this->loadModel('Cheque');
		$consulta = $this->Cheque->find('first', array('conditions' => array('Cheque.numero' => $numero),'fields'=>'Plaza.banco_id'));
		$banco = $this->Cheque->Plaza->find('first', array('conditions' => array('Plaza.id'=>$plaza),'fields'=>'Plaza.banco_id'));
		if ($consulta['Plaza']['banco_id'] == $banco['Plaza']['banco_id']) {
			$respuesta = "cancelar";
		} else {
			$respuesta = "ok";
		}		
		$json = '{"dato":"' . $respuesta . '"}';
		echo $json;
		return;
	}

	function checkPuente() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$numero = $this->data['CuentaPuente']['numero'];
		$this->loadModel('CuentaPuente');
		$consulta = $this->CuentaPuente->find('first', array('conditions' => array('CuentaPuente.numero' => $numero)));
		if ($consulta == false) {
			$respuesta = "ok";
		} else {
			$respuesta = "cancelar";
		}
		$json = '{"dato":"' . $respuesta . '"}';
		echo $json;
		return;
	}
	function guardarPuente() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->data['Flujo']['operacion_id'] = $this->data['Operacion']['id'];
		$this->Operacion->Flujo->CuentaPuente->create();
		$this->data['CuentaPuente']['fecha'] = $this->Fecha->convertir($this->data['CuentaPuente']['fecha']);
		$this->data['Flujo']['cuenta_puente_id'] = $this->Operacion->Flujo->CuentaPuente->getID($this->Operacion->Flujo->CuentaPuente->save($this->data));
		$this->Operacion->Flujo->save($this->data);
	}
	
	function guardarSellado() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->data['Sellado']['movimiento_id'] = $this->guardarMovimiento();
		$this->Operacion->Movimiento->Sellado->create();
		$this->Operacion->Movimiento->Sellado->save($this->data);
	}

	function totalOperacion() {
		$id = $_REQUEST['dato'];
		$this->Operacion->recursive = 2;
		$operacion = $this->Operacion->find('first', array('conditions' => array('Operacion.id' => $id)));
		$this->set('operacion',$operacion);
		$this->Operacion->Caja->Moneda->Cotizacion->recursive = -1;
		$cotizacion = $this->Operacion->Caja->Moneda->Cotizacion->find('first', array('conditions' => array('Cotizacion.moneda_id' => $operacion['Caja']['Moneda']['id'], 'fecha_hasta' => null)));
		$this->set('cotizacion',$cotizacion);
	}

	function totalFlujos(){
		$id = $_REQUEST['dato'];
		Debugger::dump($id);
		$flujosEntrantes = $this->Operacion->Flujo->find('all',array(
			'conditions' => array(
				'Flujo.operacion_id' => $id,
				'Flujo.tipo' => 'E'),
			'contain'=> array(
'Cheque.id','Cheque.importe','CuentaPuente.id','CuentaPuente.importe','Efectivo.id','Efectivo.importe', 'Flujo.tipo')));
		$this->set('flujosEntrantes',$flujosEntrantes);
		$flujosSalientes = $this->Operacion->Flujo->find('all',array(
			'conditions' => array(
				'Flujo.operacion_id' => $id,
				'Flujo.tipo' => 'S'),
			'contain'=> array(
'Cheque.id','Cheque.importe','CuentaPuente.id','CuentaPuente.importe','Efectivo.id','Efectivo.importe', 'Flujo.tipo')));
		$this->set('flujosSalientes',$flujosSalientes);
	}

	function editar($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid operacion', true));
			$this->redirect(array('action' => 'index'));
		}
/*		if (!empty($this->data)) {
			if ($this->Operacion->save($this->data)) {
				$this->Session->setFlash(__('The operacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operacion could not be saved. Please, try again.', true));
			}
		}*/
		if (empty($this->data)) {
			$this->data = $this->Operacion->read(null, $id);
		}
//		$this->Operacion->recursive = 2;
//		$flujos = $this->Operacion->Flujo->find('all', array('conditions' => array('operacion_id' == $id)));
		$caja = $this->ListData->getListCaja($this->Operacion);
		$this->set('listcaja', $caja);
		$responsables = $this->Operacion->Responsable->find('list');
		$users = $this->Operacion->User->find('list');
		$this->set(compact('responsables', 'users'));
	}

	function listarOperacion($id = null) {
		$data = $this->Operacion->query(
			"SELECT responsables.apellido as `Apellidos`, operacions.created as `Hora`, operacions.id
			FROM `responsables`, `operacions`
			WHERE `operacions`.`caja_id` = ".$id
		);
		$listoperacions = array();
		$i = 0;
		foreach ($data as $item) {
			$listoperacions[$data[$i]['operacions']['id']] = $data[$i]['responsables']['Apellidos'] . '-' . $data[$i]['operacions']['Hora'];
			$i++;
		}
		return $listoperacions;
	}

	function listar($id = null) {
		$caja = $this->ListData->getListCaja($this->Operacion);
//		Debugger::dump($caja);
		$this->set('listcaja', $caja);
	}

	function listarOperaciones($id = null) {
		$this->paginate = array('limit' => 10);
		$this->set('operaciones', $this->paginate("Operacion", array('Operacion.caja_id' => $id)));
	}
	
	function buscaCotizacionAsignada() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->loadModel('Cotizacion');
		Debugger::Dump($this->data['Cotizacion']['id']);
		$resultado = $this->Cotizacion->find('first', array(
			'fields' => 'importe',
			'conditions' => array(
				'Cotizacion.id' => $this->data['Cotizacion']['id'])
			)
		);
		$salida = $resultado['Cotizacion']['importe'];
		$json = '{"importe":"' . $salida . '"}';
		echo $json;
		return;
	}
	
	function cargarCanje() {
		$this->Operacion->recursive = 2;
		$responsables = $this->Operacion->Responsable->find('list');
		$users = $this->Operacion->User->find('list');
		$caja = $this->ListData->getListCaja($this->Operacion);
		$this->set('listcaja', $caja);
		$this->loadModel('Cheque');
		$cheques = $this->Cheque->find('list');
		$this->set(compact('responsables', 'users'));
		$plaza = $this->ListData->getListData($this->Cheque);
		$this->set('listdata', $plaza);
	}

	function terminarOperacion() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		if (!empty($this->data)) {
			$this->Operacion->id = $this->data['Operacion']['id'];
			if ($this->Operacion->saveField('estado', 'Terminada')) {
				echo 'Operación cerrada';
			}
		}
	}
	
	function cancelar() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		if (!empty($this->data)) {
			$id = $this->data['Operacion']['id'];
			$operacion = $this->Operacion->find('first',array('conditions'=>array('Operacion.id'=>$id)));
			foreach ($operacion['Flujo'] as $flujo) {
				$this->Operacion->Flujo->delete($flujo['id']);
			}
			foreach ($operacion['Movimiento'] as $movimiento) {
				$this->Operacion->Movimiento->delete($movimiento['id']);
			}
			if ($this->Operacion->delete($id)){
				$this->Session->setFlash(__('Operacion deleted', true));
			}
		}
	}
}
?>
