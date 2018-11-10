<?php 

/* HMVC mode
 * this is an architecture using folder hmvc located in root,
 * If set TRUE then system will read from folder hmvc
 * By default, this will be set to FALSE, means system will use mvc in each folder
*/  

// $config['hmvc_mode'] = TRUE;
$config['hmvc_mode'] = FALSE;

/* 
 * Show config mode
 * if set TRUE then will show information on footer about 
 * data config & other to easy debug 
*/
$config['show_config_mode'] = FALSE;

/*
 * Load core component
 */
$config['core'] = array();
?>