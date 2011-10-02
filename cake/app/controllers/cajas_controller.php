<?php
class CajasController extends AppController {

	var $name = 'Cajas';
	var $components = array('ListData','Fecha');

	function index() {
		$this->Caja->recursive = 0;
		$this->set('cajas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Caja inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('caja', $this->Caja->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Caja->create();
			if ($this->Caja->save($this->data)) {
				$this->Session->setFlash(__('La caja fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La caja no pudo ser guardada', true));
			}
		}
		$cajas = $this->Caja->CajaPadre->find('list');
		$cuentas = $this->Caja->Cuenta->find('list');
		$users = $this->Caja->User->find('list');
		$this->set(compact('cajas', 'cuentas', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Caja inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Caja->save($this->data)) {
				$this->Session->setFlash(__('La caja fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La caja no pudo ser guardada', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Caja->read(null, $id);
		}
		$cajas = $this->ListData->getListCaja($this->Caja->CajaPadre, "Cerrada");
		$this->set('listcaja', $cajas);
		$cuentas = $this->Caja->Cuenta->find('list');
		$users = $this->Caja->User->find('list');
		$this->set(compact('cuentas', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para una caja', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Caja->delete($id)) {
			$this->Session->setFlash(__('Caja borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La caja no fue borrada', true));
		$this->redirect(array('action' => 'index'));
	}

	function crear() {
//		$this->layout = 'caja';
		if (!empty($this->data)) {
			$this->data['Caja']['estado'] = "Creada";
			$this->data['Caja']['fecha'] = $this->Fecha->convertir($this->data['Caja']['fecha']);
			$this->Caja->create();
			if ($this->Caja->save($this->data)) {
				$this->Session->setFlash(__('La caja fue gardada con éxito', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La caja no pudo ser guardada', true));
			}
		}
		$cajas = $this->Caja->CajaPadre->find('list');
		$cuentas = $this->Caja->Cuenta->find('list');
		$users = $this->Caja->User->find('list');
		$this->set(compact('cajas', 'cuentas', 'users'));
	}

	function activarCaja() {
		$this->set('cajas',$this->paginate("Caja", array('Caja.estado' => 'Creada')));
		$cuentas = $this->Caja->Cuenta->find('list');
		$users = $this->Caja->User->find('list');
		$this->set(compact('cajas', 'cuentas', 'users'));
	}

	function activar($id = null) {
		if (empty($this->data)) {
			$this->data = $this->Caja->read(null, $id);
		}
		if ($this->data['Caja']['caja_id'] != null) {
			$this->Caja->id = $id;
			$this->Caja->saveField('estado', 'Activa') ;
//			$this->Caja->id = $id;
			if($this->Caja->saveField('caja_id',$this->data['Caja']['caja_id'])){
				$this->Session->setFlash(__('La caja fue gardada con éxito', true));
			} else {
				$this->Session->setFlash(__('La caja no pudo ser guardada', true));
			}
			$this->Caja->CajaPadre->DetalleRecaudacion->recursive = -1;
			$detalleRecaudacionPadres = $this->Caja->CajaPadre->DetalleRecaudacion->find('all', array('conditions'=>array('DetalleRecaudacion.caja_id'=>$this->data['Caja']['caja_id'])));
			foreach($detalleRecaudacionPadres as $detalle) {
				if ($detalle['DetalleRecaudacion']['saldo_final'] != 0) {
					$nuevoDetalle['DetalleRecaudacion']['tipo'] = $detalle['DetalleRecaudacion']['tipo'];
					$nuevoDetalle['DetalleRecaudacion']['saldo_inicial'] = $detalle['DetalleRecaudacion']['saldo_final'];
					$nuevoDetalle['DetalleRecaudacion']['caja_id'] = $id;
					$this->Caja->CajaPadre->DetalleRecaudacion->create();
					$this->Caja->CajaPadre->DetalleRecaudacion->save($nuevoDetalle);
				}
			}
		}
		$caja = $this->ListData->getListCaja($this->Caja);
		unset($caja[$id]);
		$this->set('listcaja', $caja);
		$cuentas = $this->Caja->Cuenta->find('list');
		$this->set(compact('cuentas'));
	}
	
	function checkCaja() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$fecha = $this->Fecha->convertir($this->data['Caja']['fecha']);
		krsort($fecha);
		$fechaFinal = implode("-", $fecha);
		$consulta = $this->Caja->find('first', array('conditions' => array('Caja.fecha' => $fechaFinal)));
		if ($consulta == false) {
			$respuesta = "ok";
		} else {
			$respuesta = "cancelar";
		}		
		$json = '{"dato":"' . $respuesta . '"}';
		echo $json;
		return;
	}

	function buscaCaja() {
		$this->layout = 'ajax';
		$this->autoRender = false;
		$fecha = $this->Fecha->convertir($this->data['Caja']['fecha']);
		arsort($fecha);
		$fechaFinal = implode("-", $fecha);
		$consulta = $this->Caja->find('first', array('conditions' => array('Caja.fecha' => $fechaFinal)));
	}

	function arquearCaja($id = null) {
		$this->Caja->recursive = 2;
		$caja = $this->Caja->find('first',array('conditions'=>array('Caja.id'=>$id)));
		$this->Caja->Operacion->Flujo->Efectivo->Cotizacion->Moneda->recursive = -1;
		$monedas = $this->Caja->Operacion->Flujo->Efectivo->Cotizacion->Moneda->find('all');
		$totalChequeCorriente = 0;
		$totalChequeDiferidoEntrante = 0;
		$totalChequeDiferidoSaliente = 0;
		$totalEfectivo = array();
		$totalPrestamos = 0;
		$totalVarios = 0;
		$detalles = array();
		$this->data['Caja']['total_aporte'] = 0;
		$this->data['Caja']['total_reemplazo_valor'] = 0;
		$this->data['Caja']['total_cuenta_puente'] = 0;
		$this->data['Caja']['total_moneda_extranjera'] = 0;
		foreach($caja['Operacion'] as $operacion) {
			foreach($operacion['Movimiento'] as $movimiento) {
				if($movimiento['tipo'] == 'Aporte')
					$this->data['Caja']['total_aporte'] += $movimiento['importe'];
				if($movimiento['tipo'] == 'Cuota')
					$totalPrestamos += $movimiento['importe'];
				if($movimiento['tipo'] == 'Vario')
					$totalVarios += $movimiento['importe'];
				if($movimiento['tipo'] == 'Canje')
					$this->data['Caja']['total_reemplazo_valor'];
			}
			$this->Caja->Operacion->Flujo->recursive = 2;
			$detalleFlujos = $this->Caja->Operacion->Flujo->find('all', array('conditions' => array('operacion_id' => $operacion['id'])));
			foreach($monedas as $moneda) {
				if (!isset($totalEfectivo[$moneda['Moneda']['nombre']])) {
					$totalEfectivo[$moneda['Moneda']['nombre']] = array();
					$totalEfectivo[$moneda['Moneda']['nombre']]['importe'] = 0;
					$totalEfectivo[$moneda['Moneda']['nombre']]['id'] = "";
				}
			}
			foreach($detalleFlujos as $flujo){
				if ($flujo['Flujo']['efectivo_id'] != null) {
					foreach($monedas as $moneda) {
						if ($flujo['Efectivo']['Cotizacion']['moneda_id'] == $moneda['Moneda']['id']) {
							(FLOAT)$totalEfectivo[$moneda['Moneda']['nombre']]['importe'] += (FLOAT)$flujo['Efectivo']['importe'];
							$totalEfectivo[$moneda['Moneda']['nombre']]['id'] = $moneda['Moneda']['id'];
						}
					}
				}		
				if ($flujo['Flujo']['tipo'] == 'E') {
					$this->data['Caja']['total_cuenta_puente'] += $flujo['CuentaPuente']['importe'];
				} else if ($flujo['Flujo']['tipo'] == 'S') {
					$this->data['Caja']['total_cuenta_puente'] -= $flujo['CuentaPuente']['importe'];
				}
				if ($flujo['Cheque']['id'] != null) {			
					$this->Caja->Operacion->Flujo->Cheque->Rechazo->recursive = -1;
					$rechazo = $this->Caja->Operacion->Flujo->Cheque->Rechazo->find('first', array('conditions' => array('Rechazo.cheque_id' => $flujo['Cheque']['id'])));
					Debugger::dump($flujo['Cheque']['id']);
					if ($flujo['Flujo']['tipo'] == 'E') {
						if ($flujo['Cheque']['tipo'] == 'diferido' || $flujo['Cheque']['tipo'] == 'canje') {
							$totalChequeDiferidoEntrante += $flujo['Cheque']['importe'];
							$totalChequeDiferidoEntrante += $rechazo['Rechazo']['comision'];
						} else if ($flujo['Cheque']['tipo'] == 'corriente') {
						$totalChequeCorriente += $flujo['Cheque']['importe'];
						Debugger::dump($totalChequeCorriente);
						$totalChequeCorriente += $rechazo['Rechazo']['comision'];
						Debugger::dump($totalChequeCorriente);
						}
					} else if ($flujo['Flujo']['tipo'] == 'S') {
						$totalChequeDiferidoSaliente -= $flujo['Cheque']['importe'];
						$totalChequeDiferdioSaliente -= $rechazo['Rechazo']['comision'];
					}
				}
				
			}
		
		}
		foreach($caja['DetalleRecaudacion'] as $detalleRecaudacion) {
			$detalles[$detalleRecaudacion['tipo']] = $detalleRecaudacion;
		}
		$chequesDif = 0;
		if (!array_key_exists('Diferidos', $detalles)) {
			Debugger::dump($detalles['Diferidos']);
			$chequesDif = $this->Caja->Operacion->Flujo->Cheque->query("SELECT SUM( importe ) as total FROM `cheques` WHERE `estado` = 'cartera'");
			$detalles['Diferidos']['saldo_inicial'] = $chequesDif[0][0]['total'];
		}
		$detalles['Diferidos']['ingreso'] = $totalChequeDiferidoEntrante;
		$detalles['Diferidos']['egreso'] = $totalChequeDiferidoSaliente;
		$detalles['Diferidos']['saldo_final'] = $detalles['Diferidos']['saldo_inicial'] + $totalChequeDiferidoEntrante - $totalChequeDiferidoSaliente;
		$detalles['Corrientes']['ingreso'] = $totalChequeCorriente;
		$detalles['Corrientes']['egreso'] = $totalChequeCorriente;
		$detalles['Corrientes']['saldo_inicial'] = 0;
		$detalles['Corrientes']['saldo_final'] = $detalles['Corrientes']['saldo_inicial'] + $detalles['Corrientes']['ingreso'] - $detalles['Corrientes']['egreso'];
		foreach($totalEfectivo as $key => $efectivo) {
			if (!array_key_exists($key, $detalles))
				$detalles[$key]['saldo_inicial'] = 0;
			$detalles[$key]['ingreso'] = $efectivo['importe'];
			$detalles[$key]['egreso'] = $efectivo['importe'];
			$detalles[$key]['saldo_final'] = $detalles[$key]['saldo_inicial'] + $detalles[$key]['ingreso'] - $detalles[$key]['egreso'];
			if ($efectivo['id'] != $caja['Caja']['moneda_id'])
			$this->data['Caja']['total_moneda_extranjera'] += $efectivo['importe'];
		}
		$this->data['Caja']['fecha'] = $caja['Caja']['fecha'];
		(FLOAT)$this->data['Caja']['total_otro_ingreso'] = $totalPrestamos + $totalVarios;
		$this->data['Caja']['total_ingreso'] = $this->data['Caja']['total_otro_ingreso'] + $this->data['Caja']['total_aporte'];
		Debugger::dump($totalChequeDiferidoSaliente);
		Debugger::dump($totalChequeCorriente);
		$this->data['Caja']['total_deposito_cheque'] = $totalChequeDiferidoSaliente + $totalChequeCorriente;
		$this->data['Caja']['total_deposito_efectivo'] = $this->data['Caja']['total_ingreso'] - $this->data['Caja']['total_moneda_extranjera'] - $this->data['Caja']['total_reemplazo_valor'] - $this->data['Caja']['total_cuenta_puente'];
		$this->data['Caja']['total_egreso'] = $this->data['Caja']['total_deposito_cheque'] + $this->data['Caja']['total_cuenta_puente'] + $this->data['Caja']['total_deposito_efectivo'] + $this->data['Caja']['total_moneda_extranjera'] + $this->data['Caja']['total_reemplazo_valor'];
		$this->set('detalleRecaudacions',$detalles);
	}
}
?>
