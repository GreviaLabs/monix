<?php 

require_once('config/routes.php');
require_once('config/config.php');

// debug($routes,1);

class Routes extends Monix
{

	public $list_routes; 	// list all routes
	public $debug;
	// public $hmvc_mode;
	// $routes['/'] = 'scrape_form';
	// $routes['/modular/()'] = 'scrape_form';
	// return $routes;
	
	public function __construct($list_routes = NULL, $options = array())
	{
		$this->list_routes = $list_routes;

		// enable debug
        // $this->debug = 1;
        if (isset($_GET['debug'])) $this->debug = 1;
        
		// debug('start Routes'.HR);

		// Set options as internal variable
		if (! empty($options))
		{
			foreach ($options as $ko => $opt) {
				$this->{$ko} = $opt; // crate dynamic properties from $options
			}
		}
	}
	
	/*
	 * Handle routes
	 * 
	*/
	public function handle()
	{
		// set variable for exception handle
		$this_file_path = 'Handler' . DS . 'Routes.php' ;
		if (! isset($this->list_routes)) 
			exception_handle('ROUTES_NOT_CONFIGURED', $this_file_path, LINE);
		
		// $request_url = 'http://' . apache_getenv("HTTP_HOST") . apache_getenv("REQUEST_URI");
		$request_url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		
		// 9 juli ijin 1 hari
		// if from here return : /Applications/AMPPS/www/monix/1.0/core/Handler
		$base_path = str_replace('core' . DS . 'Handler','', __DIR__ );
		$uri_valid = FALSE;

		if ($this->debug) {
			// debug('base_path: ' . $_SERVER['PHP_SELF'].HR);
			// debug('ctrl: ' . $ctrl.HR);
			debug('base_url: ' . base_url().HR);
			debug('base_path: ' . $base_path.HR);
			debug('request_url: ' . $request_url.HR);
		}

        $is_route_found = FALSE;
		if (! empty($this->list_routes))
		{
			foreach ($this->list_routes as $keyuri => $route) 
			{
				if ($this->debug) debug('Load routes: ' . $keyuri . ' => ' . $route . HR);

				$keyuri = base_url().$keyuri;
				// $keyuri = base_url();
                // read home url from routes /
				if ($keyuri == '/' && $request_url == base_url() ) 
				{
					// $include_path = $base_path . 'views/' . $route . '.php';
					// // $include_pathctrl = $base_path . 'views/' . $route . '.php';
					// // $include_pathview = $base_path . 'views/' . $route . '.php';
					// if (file_exists($include_path)) {
					// 	include_once($include_path);
					// 	die;
					// }

					// ----------------------
					// start regular config
					// not hmvc
					// $include_path = $base_path . 'hmvc/' . ;
					// debug($include_path . HR);
					// $ctrl = $keyuri;
					$target = $temp = NULL;

					$temp = explode('@',$route);
					$target['ctrl'] = $temp[0];
					$target['method'] = $temp[1];
					
					// load file controller target
					$include_pathctrl = $base_path . 'controllers' . DS . $target['ctrl'] . '.php';
					if (file_exists($include_pathctrl)) 
					{
                        $is_route_found = TRUE; 
                        include_once($include_pathctrl);

						// create object controller;
						$obj = new $target['ctrl'];
						
						// run method
						if (strpos($target['method'],'$') !== FALSE) {
							// contain $1
						} else {
							$obj->{$target['method']}();
						}
						
						// break;
						// continue;
						die;
                    }
                    else 
                    {
						// debug('exception controller not exist',1);
						exception_handle('CONTROLLER_FILE_NOT_EXIST', $this_file_path);
                        // Exception view not found
                    }

					// end regular config
					// ----------------------

				}

				// read other url
				if ($keyuri == $request_url || strpos($keyuri,$request_url) !== FALSE) 
				{
					// load file
					// debug('load file from hmvc folder' . HR);
					// debug($this->hmvc_mode);

					// check config is hmvc (if yes read structure from hmvc)
					if ($this->hmvc_mode) 
					{
						// ----------------------
						/* STILL DEVELOPMENT */
						// check if file exists
						$target = $temp = NULL;

						$temp = explode('@',$route);
						$target['ctrl'] = $temp[0];
						$target['method'] = $temp[1];
						
						// load file controller target
						$include_pathctrl = $base_path . 'hmvc' . DS . 'controllers' . DS . $target['ctrl'] . '.php';
						if (file_exists($include_pathctrl)) 
						{
							$is_route_found = TRUE;
							
							include_once($include_pathctrl);

							// create object controller;
							$obj = new $target['ctrl'];
							
							// run method
							if (strpos($target['method'],'$') !== FALSE) {
								// contain $1
							} else {
								$obj->{$target['method']}();
							}
							
							// include_once($include_pathview);
							// break;
							// continue;
							die;
						}
						// end hmvc
						// ----------------------
					}
					else 
					{
                        // debug
                        // ----------------------
						// start regular config
						// not hmvc
						// $include_path = $base_path . 'hmvc/' . ;
						// debug($include_path . HR);
                        // $ctrl = $keyuri;
                        // debug('regular architecture' . HR);
						$target = $temp = NULL;

						$temp = explode('@',$route);
						$target['ctrl'] = $temp[0];
						$target['method'] = $temp[1];
						
						// load file controller target
						$include_pathctrl = $base_path . 'controllers' . DS . $target['ctrl'] . '.php';
						if (file_exists($include_pathctrl)) 
						{
							$is_route_found = TRUE;

                            include_once($include_pathctrl);

							// create object controller;
							$obj = new $target['ctrl'];
							
							// run method
							if (strpos($target['method'],'$') !== FALSE) {
								// contain $1
							} else {
                                // check if controller found && method exist
                                if (method_exists($obj, $target['method'])) {
                                    $obj->{$target['method']}();
                                } else {
									// debug('exception controller exist but method invalid',1);
									exception_handle('CONTROLLER_METHOD_NOT_VALID', $this_file_path);
                                }
							}
							
							// break;
							// continue;
							die;
						}
						// end regular config
						// ----------------------
					}
					
					

				}
			}
        }
        
        // Error: Route not found
        if (! $is_route_found) {
            // Exception route not found or throw 404 here ??
            // debug('error routes not found');
            $this->loadView('error.404');
			// exception_handle('ROUTES_NOT_FOUND', $this_file_path, __LINE__);
            // throw new Exception('ayamaaa');
            die;
        }
		
		// echo $request_url;
		
		// debug('core Routes'.HR);
		// debug($request_url.HR);
		// debug( __DIR__ .HR);
		// debug($this->list_routes,1);
		
		// return $this->list_routes;
	}
}

// get var $routes from config
// debug($config);
$routes = new Routes($routes,$config);
$routes->handle();
?>