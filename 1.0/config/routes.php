<?php 

// $routes = NULL;
// $routes[''] = '';
// $routes['/'] = 'index';
// $routes['/hello'] = 'hello';

// $routes['/'] = 'ModularCtrl@index';
$routes['/'] = 'ModularCtrl@readme';
$routes['/hello'] = 'ModularCtrl@hello';
$routes['hello'] = 'ModularCtrl@hello';
$routes['/modular/(any)'] = 'ModularCtrl@$1';

// return $routes;
?>