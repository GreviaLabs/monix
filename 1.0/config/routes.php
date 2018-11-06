<?php 

// $routes = NULL;
// $routes[''] = '';
// $routes['/'] = 'index';
// $routes['/hello'] = 'hello';


// $routes['/'] = 'ModularCtrl@index';
$routes['/'] = 'ModularCtrl@about';
$routes['readme'] = 'ModularCtrl@readme';
$routes['about'] = 'ModularCtrl@about';
$routes['architecture'] = 'ModularCtrl@architecture';
$routes['multi/slug'] = 'ModularCtrl@multislug';
// $routes['/hello'] = 'ModularCtrl@hello';
$routes['hello'] = 'ModularCtrl@hello';
// $routes['/modular/(any)'] = 'ModularCtrl@$1';

// return $routes;
?>