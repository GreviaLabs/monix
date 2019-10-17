<?php 

// $routes = NULL;
// $routes[''] = '';
// $routes['/'] = 'index';
// $routes['/hello'] = 'hello';


// $routes['/'] = 'ModularCtrl@index';
$routes['/'] = 'ModularCtrl@index';
$routes['readme'] = 'ModularCtrl@readme';
$routes['about'] = 'ModularCtrl@about';
$routes['architecture'] = 'ModularCtrl@architecture';
$routes['example'] = 'ModularCtrl@example';
$routes['vue'] = 'ModularCtrl@vue';
$routes['order-domain'] = 'ModularCtrl@order_domain';
$routes['multi/slug'] = 'ModularCtrl@multislug';
// $routes['/hello'] = 'ModularCtrl@hello';
$routes['hello'] = 'ModularCtrl@hello';
$routes['tablefixed'] = 'ModularCtrl@tablefixed';
// $routes['/modular/(any)'] = 'ModularCtrl@$1';

// return $routes;
?>