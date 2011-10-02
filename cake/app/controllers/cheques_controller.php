<?php
class ChequesController extends AppController {

	var $name = 'Cheques';
	var $components = array('Fecha', 'ListData');
	var $helpers = array('Fecha');

	function index() {
		$this->Cheque->recursive = 2;
		$this->set('cheques', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cheque', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cheque', $this->Cheque->read(null, $id));
	}

	function add() {

		if (!empty($this->data)) {
			$this->Cheque->create();
			if ($this->Cheque->save($this->data)) {
				$this->Session->setFlash(__('The cheque has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cheque could not be saved. Please, try again.', true));
			}
		}
		$responsables = $this->Cheque->Responsable->find('list');
		$plazas = $this->Cheque->Plaza->find('list');
		$this->set(compact('responsables', 'plazas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cheque', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Cheque']['fecha_cobro'] = $this->Fecha->convertir($this->data['Cheque']['fecha_cobro']);
			Debugger::dump($this->data['Cheque']['fecha_cobro']);
			$this->data['Cheque']['fecha_limite'] = $this->Fecha->convertir($this->data['Cheque']['fecha_limite']);
			$cheque = $this->Cheque->getID($this->Cheque->save($this->data));
			if ($cheque) {
				$this->Session->setFlash(__('The cheque has been saved', true));
				$id_operacion = $this->Cheque->query("SELECT `id` FROM `operacions`
WHERE `operacions`.`id` = (SELECT `operacion_id` FROM `flujos`
WHERE `flujos`.`cheque_id` ='". $cheque."')");
				$this->redirect(array('controller' => 'operacions', 'action' => 'editar',$id_operacion[0]['operacions']['id']));
			} else {
				$this->Session->setFlash(__('The cheque could not be saved. Please, try again.', true));
			}
			ycomoes();
		}
		if (empty($this->data)) {
			$this->data = $this->Cheque->read(null, $id);
		}
		$responsables = $this->Cheque->Responsable->find('list');
		$plazas = $this->Cheque->Plaza->find('list');
		$this->set(compact('responsables', 'plazas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para un cheque', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cheque->delete($id)) {
			$this->Session->setFlash(__('Cheque borrado', true));
//			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cheque was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function cargar() {
		if (!empty($this->data)) {
			$this->Cheque->create();
			$this->data['Cheque']['estado'] = "depositado";
			Debugger::dump($this->data['Cheque']['fecha_cobro']);
			if($this->data['Cheque']['tipo'] != "corriente")
			{
//				$fecha = implode("/", $this->data['Cheque']['fecha_cobro']);
				$fecha = $this->data['Cheque']['fecha_cobro'];
				$this->data['Cheque']['fecha_limite'] = $this->Fecha->sumaDias($fecha,'29');
				if($this->data['Cheque']['tipo'] == "diferido") {
					$this->data['Cheque']['estado'] = "cartera";
				} else {
					$this->data['Cheque']['estado'] = "cartera";
				}
			} 	
			if ($this->Cheque->save($this->data)) {
				$this->Session->setFlash(__('El cheque fue gardado con éxito', true));
//				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cheque no pudo ser guardado.', true));
			}
		}
		$responsables = $this->Cheque->Responsable->find('list');
//		$plazas = $this->Cheque->Plaza->find('list',array('recursive' => 1));
		$this->set(compact('responsables'/**, 'plazas'*/));
		$plaza = $this->ListData->getListData($this->Cheque);
		$this->set('listdata', $plaza);
	}

	function depositar() {

		if (!empty($this->data)) {
			$this->loadModel('Caja');
			krsort($this->data['Cheque']['fecha']);
			$var = implode("-",$this->data['Cheque']['fecha']);
			$cajas = $this->Caja->find('list', array('conditions' => array('Caja.fecha' => $var)));
			if (!empty($cajas)) {				
				$this->loadModel('Operacion');
				$this->Operacion->create();
				if ($this->Operacion->save(array('caja_id' => current($cajas), 'user_id' => '4e0f2d5c-7400-4cc7-9ce0-05e07f56b65b'))) {
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El cheque no pudo ser guardado.', true));
				}
				$this->loadModel('Flujo');
				$i = 1;
				foreach($this->data['Cheque'] as $key => $value) {
					if($value != 0 && $i < count($this->data['Cheque'])) {
						$this->Flujo->create();
						$arreglo = array('operacion_id' => $this->Operacion->id, 'cheque_id' => $this->data['Cheque']['cheque'.$i]);
						if($this->Flujo->save($arreglo)) {
							$this->Cheque->saveField('estado', 'depositado');
						} else {
							$this->Session->setFlash(__('El cheque no pudo ser guardado.', true));
						}
						$i++;
					}
				}
			}
			else {
				$this->redirect(array('controller' => 'Cajas', 'action' => 'crear'));
			}
		}
		$this->Cheque->recursive = 2;
//		$this->paginate = array('limit' => 10);
		$this->set('cheques', $this->paginate("Cheque", array('Cheque.estado' => "cartera")));
	}

	function reingresar($id = null) {
		if (!empty($this->data)) {
			$i = 1;
			$cont = 0;
			$cheque_id = "";
			foreach($this->data['Cheque'] as $key => $value) {
				if(substr($key,0,6) == "cheque" && $value != 0 && $i < count($this->data['Cheque'])) {
					$cont++;
					$cheque_id = $value;
				}
			}
			$cheque = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$cheque_id)));	
			if ($cont != 1) {
				$this->Session->setFlash(__('Debe seleccionar solo un cheque a reingresar.', true));
			}
			$this->Cheque->Rechazo->create();
/*			$arreglo = array(
				'fecha' => $this->Fecha->convertir($this->data['Cheque']['fecha']),
				'motivo' => $this->data['Cheque']['motivo'],
				'comision' => $this->data['Cheque']['comision'],
				'cheque_id' => $aux);*/
			$this->data['Rechazo']['cheque_id'] = $cheque_id;
			$this->data['Flujo']['cheque_id'] = $cheque_id;
			$this->data['Flujo']['tipo'] = 'E';
			$this->loadModel('Operacion');
			$this->Cheque->Rechazo->create();
			if ($this->Cheque->Rechazo->save($this->data)) {
				$this->Cheque->id = $cheque['Cheque']['id'];
				$this->Cheque->saveField('estado','cartera');
				$this->Operacion->create();
				$operacion_id = $this->Operacion->getID($this->Operacion->save($this->data));
				Debugger::dump($operacion_id);
				$this->data['Movimiento']['operacion_id'] = $operacion_id;
				$this->data['Movimiento']['tipo'] = "Reingreso";
				$this->data['Flujo']['operacion_id'] = $operacion_id;
				Debugger::dump($this->data['Movimiento']);
				$this->Operacion->Movimiento->create();
				$this->Operacion->Flujo->create();
				if ($this->Operacion->Movimiento->save($this->data) && $this->Operacion->Flujo->save($this->data)) {
					$this->Session->setFlash(__('El rechazo fue guardado con éxito', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El rechazo no pudo ser guardado.', true));
				}
			}
		}
		$this->loadModel('Operacion');
		$responsables = $this->Operacion->Responsable->find('list');
		$users = $this->Operacion->User->find('list');
		$this->set(compact('users','responsables'));
		$caja = $this->ListData->getListCaja($this->Operacion->Caja, "Activa");
		$this->set('listcaja', $caja);
		$this->Cheque->recursive = 2;		
		$this->paginate = array('limit' => 10);
		$this->set('cheques', $this->paginate("Cheque", array('Cheque.estado' => "depositado")));
	}

	function canjear() {
		$this->autoRender = false;
		$arreglo = array('Flujo' => array('cheque_id'=>$this->data['Cheque']['id'],
			'operacion_id' => $this->data['Operacion']['id']));
		if($this->Cheque->Flujo->save($arreglo)) {
			$this->Cheque->id = $this->data['Cheque']['id'];
			if ($this->Cheque->saveField('estado', 'canjeado')) {
				echo 'cheque guardado';
			}
		} else {
			$this->Session->setFlash(__('El cheque no pudo ser guardado.', true));
		}
	}

}
?>
