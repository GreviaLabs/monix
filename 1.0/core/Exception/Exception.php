<?php 

// Exception Handler
function exception_handle($code = NULL, $attr = NULL, $_line = NULL)
{
	if (! isset($code)) {
		return exception_handle('EXCEPTION_CODE_NOT_FOUND');
	}
	
	$code = strtoupper($code);
	
	$message = $ex = NULL;
	switch($code)
	{
		// ----------------------------------------------------
		case 'ENV_NOT_FOUND': 
			$message = 'No ENV detected. Please setup .env file in your root directory';
			break;
			
		// ----------------------------------------------------
		case 'DB_CONNECTION_INVALID';
			$message = '';
			break;
		case 'DB_CONNECTION_TIMEOUT';
			$message = '';
			break;
		case 'EXCEPTION_CODE_NOT_FOUND';
			$message = 'Invalid code of exception ';
			break;
		
		// ----------------------------------------------------
		case 'VIEW_FILE_NOT_SET';
			$message = 'Invalid view not set exception ';
			break;
		case 'VIEW_FILE_NOT_FOUND';
			$message = 'Invalid view not found exception ';
			break;
			
		// ----------------------------------------------------
		case 'ROUTES_NOT_CONFIGURED';
			$message = 'Routes not set correctly ';
			break;
		// ----------------------------------------------------
		case 'DATA_NOT_SET';
			$message = 'Data set not set correctly ';
			break;
	}
	$line = $info = NULL;
	if (isset($_line)) $line = $_line; 

    $dbgt = debug_backtrace();
    // debug($dbgt);
	$info =  " in {$dbgt[1]['file']} on line {$dbgt[1]['line']}";
	
	$ex[] = '<html>';
	$ex[] = '<head>';
	$ex[] = '
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?05082018">
		<!-- Bootstrap core CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css?05082018" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css?05082018" rel="stylesheet">
		
		<link href="http://grevialabs.com/public/css/style_default.css?05082018" rel="stylesheet">';
	$ex[] = '';
	$ex[] = '';
	$ex[] = '</head>';
	$ex[] = '<body>';
	$ex[] = '<div class="container">';
	$ex[] = '	<div class="row">';
	$ex[] = '		<div class="col-sm-12" style="padding-top:30px">';
	$ex[] = '			<h3 class="b clrRed">Exception</h3>';
	$ex[] = '			<div class="alert alert-danger">';
	$ex[] = '			<strong>Exception occured !!!</strong><br/>';
	$ex[] = '			Code : <strong>' . $code . ' </strong><br/>';
	
	// Additional message spesific in selected files
	if (isset($attr)) $ex[] = '			File : <strong>' . $attr . ' </strong><br/>';
	
	$ex[] = '			Message: <br/><strong>' . $message . ' </strong>';
	$ex[] = '			Lines: ' . $line . ' ' . HR;
	$ex[] = '			Info: ' . BR . $info . ' ';
	$ex[] = '		</div>';
	$ex[] = '	</div>';
	$ex[] = '</div>';
	$ex[] = '</body>';
	$ex[] = '</html>';
	$str = implode($ex);
	echo $str;die;
}
?>