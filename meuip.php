<?php
chdir(dirname(__DIR__));

include 'vendor/autoload.php';
// Setup autoloading
//$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
//$loader->register();

$request = new Zend\Http\PhpEnvironment\Request();
echo $request->getServer('REMOTE_ADDR');

