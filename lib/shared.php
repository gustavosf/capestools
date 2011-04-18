<?php

function setReporting() {
	if (DEVELOPMENT_ENVIRONMENT == true) {
		error_reporting(E_ALL);
		ini_set('display_errors','On');
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors','Off');
		//ini_set('log_errors', 'On');
		//ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
	}
}

function __autoload($className) {
	if (file_exists(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php');
	} else {
		// Código de erro aqui :)
	}
}

/** GZip Output **/
function gzipOutput() {
    return true;
	// Eventualmente permitir o retorno compactador por GZip

    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ')
        || false !== strpos($ua, 'Opera')) {
        return false;
    }

    $version = (float)substr($ua, 30); 
    return ($version < 6 || ($version == 6  && false === strpos($ua, 'SV1')));
}

// -----------------------------------------------------------------------------------------

gzipOutput() || ob_start("ob_gzhandler");
setReporting();
