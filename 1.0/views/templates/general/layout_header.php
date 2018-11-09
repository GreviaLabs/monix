<?php
$env = env();
$base_url = base_url();
// debug($env);
?>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title><?php echo (isset($PAGE_TITLE)) ? $PAGE_TITLE : $env['APP_PAGE_TITLE'] ?></title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="UST7kfmmMcg8EMKJDj4er5NBIy3KFviT6m0BvpLx">
	
	<!-- Package1 Start -->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?05082018">
		<!-- Bootstrap core CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css?05082018" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css?05082018" rel="stylesheet">
		
		<link href="http://www.grevia.com/asset/css/style.css?05082018" rel="stylesheet">
		
	<!-- Package1 End -->
	
</head>
<body>

<div>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">

        <a class="navbar-brand" href="#"><?php echo (isset($APP_NAME)) ? $APP_NAME : $env['APP_NAME'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $base_url ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>about">About<span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>architecture">Architecture<span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>doc">Doc<span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>example">Example curl<span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>vue">Vue<span class="sr-only">(current)</span></a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="<?php echo $base_url ?>ayamgoreng">ayamgoreng<span class="sr-only">(current)</span></a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href=""><span class="sr-only">(current)</span></a></li> -->
            </ul>
            <span class="navbar-text white-text">
                
            </span>
        </div>
    </nav>
</div>

<div style="padding-top:50px"></div>

<div class="container">
    <div class="row">