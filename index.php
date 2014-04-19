<?php
chdir(dirname(__DIR__));

include 'vendor/autoload.php';
// Setup autoloading
//$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
//$loader->register();

$request = new Zend\Http\PhpEnvironment\Request();

if ( $HOST = $request->getQuery()->get('host') );
if ( $IP = $request->getQuery()->get('ip') );

if( null !== $HOST && null !== $IP ) {

    $KEYNAME="rndc-key";
    $HASH="IfGSokrUFOqM4gJqnRQB2A==";
    $SERVER="127.0.0.1";
    $ZONE="dynamic.dtux.org";
    $HOST=$HOST.".".$ZONE;

    # Definir comando de update
    $NSUPDATE="nsupdate -y $KEYNAME:$HASH";

    //$EXEC .= " > /tmp/success.txt ";
    $NSPARAMS = "";
    $NSPARAMS .= "server $SERVER".PHP_EOL;
    $NSPARAMS .= "zone $ZONE".PHP_EOL;
    $NSPARAMS .= "update delete $HOST A".PHP_EOL;
    $NSPARAMS .= "update add $HOST 1440 A $IP".PHP_EOL;
    $NSPARAMS .= "send".PHP_EOL;
    $NSFILE = "/tmp/success.txt";

    $WRITEFILE = fopen($NSFILE, 'r+');
    fwrite($WRITEFILE, $NSPARAMS);
    fclose($WRITEFILE);

    $COMMAND =  $NSUPDATE;
    $COMMAND .= " ". $NSFILE;
    system($COMMAND, $R);

}
