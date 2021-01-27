<?php

use MyApp\Socket;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require dirname( __FILE__ ) .  "/vendor/autoload.php";



$server = IoServer::factory(
   new HttpServer(
      new WsServer(
         new Socket()
      )
   ),
   8080
);

$server->run();

?>