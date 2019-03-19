<?php

// Inicio (Clientes)
Breadcrumbs::for('Clientes',function($trail){
    $trail->push('Clientes',route('/'));
});
//Crear Cliente
Breadcrumbs::for('Crear',function($trail){
	$trail->parent('Clientes');
    $trail->push('Crear',route('create'));
});
//Detalle del cliente
Breadcrumbs::for('Detalle_Cliente',function($trail,$cliente){
    $trail->parent('Clientes');
    $trail->push('Cliente',route('cliente',$cliente));
});
//Nueva venta
Breadcrumbs::for('Nueva_Venta', function ($trail,$cliente) {
	$trail->parent('Detalle_Cliente',$cliente);
    $trail->push('Nueva venta', route('nuevaVenta',$cliente));
});
//Venta del cliente
Breadcrumbs::for('Venta', function ($trail,$cliente, $venta) {
	$trail->parent('Detalle_Cliente',$cliente);
    $trail->push('Venta', route('detalle', $venta));
});
