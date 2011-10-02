<?php
	echo $this->Html->script(array(
		'jquery/development-bundle/ui/jquery.ui.widget',
		'jquery/development-bundle/ui/jquery.ui.accordion'
	), array('inline' => false));

	$acordion = "$('#acordionAcciones').accordion({collapsible:true,active:false});";
	$this->Js->Buffer($acordion);
?>
<div id="acordionAcciones">
	<h2><a href="#Bancos">Bancos</a></h2>
		<div>
			<ul>
				<li><a href="/cake/bancos/index">inicio</a></li>
				<li><a href="/cake/bancos/add">Cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Cajas">Cajas</a></h2>
		<div>
			<ul>
				<li><a href="/cake/cajas/index">inicio</a></li>
				<li><a href="/cake/cajas/crear">crear</a></li>
				<li><a href="/cake/cajas/activarCaja">activar</a></li>
			</ul>
		</div>
	<h2><a href="#Cheques">Cheques</a></h2>
		<div>
			<ul>
				<li><a href="/cake/cheques/index">inicio</a></li>
				<li><a href="/cake/cheques/depositar">depositar</a></li>
				<li><a href="/cake/cheques/reingresar">reingresar</a></li>
			</ul>
		</div>
	<h2><a href="#Cotizacions">Cotizaciones</a></h2>
		<div>
			<ul>
				<li><a href="/cake/cotizacions/index">inicio</a></li>
				<li><a href="/cake/cotizacions/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Cuenta Puentes">Cuentas Puente</a></h2>
		<div>
			<ul>
				<li><a href="/cake/cuenta_puentes/index">inicio</a></li>
				<li><a href="/cake/cuenta_puentes/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Cuentas">Cuentas</a></h2>
		<div>
			<ul>
				<li><a href="/cake/cuentas/index">inicio</a></li>
				<li><a href="/cake/cuentas/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Grupos">Grupos</a></h2>
		<div>
			<ul>
				<li><a href="/cake/groups/index">inicio</a></li>
				<li><a href="/cake/groups/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Monedas">Monedas</a></h2>
		<div>
			<ul>
				<li><a href="/cake/monedas/index">inicio</a></li>
				<li><a href="/cake/monedas/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Operacions">Operacions</a></h2>
		<div>
			<ul>
				<li><a href="/cake/operacions/index">inicio</a></li>
				<li><a href="/cake/operacions/cargar2">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Plazas">Plazas</a></h2>
		<div>
			<ul>
				<li><a href="/cake/plazas/index">inicio</a></li>
				<li><a href="/cake/plazas/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Responsables">Responsables</a></h2>
		<div>
			<ul>
				<li><a href="/cake/responsables/index">inicio</a></li>
				<li><a href="/cake/responsables/add">cargar</a></li>
			</ul>
		</div>
	<h2><a href="#Sellados">Sellados</a></h2>
		<div>
			<ul>
				<li><a href="/cake/sellados/index">inicio</a></li>
			</ul>
		</div>
	<h2><a href="#Usuarios">Usuarios</a></h2>
		<div>
			<ul>
				<li><a href="/cake/users/index">inicio</a></li>
				<li><a href="/cake/users/add">cargar</a></li>
			</ul>
		</div>
</div>
