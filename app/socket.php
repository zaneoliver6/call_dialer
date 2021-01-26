<?php

namespace MyApp;

use Exception;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Socket implements MessageComponentInterface {
   public function __construct()
   {
      $this->clients = new \SplObjectStorage;
   }

   public function onOpen(ConnectionInterface $conn)
   {
      $this->clients->attach($conn);

      echo "New Connection! ({$conn->resourceID})\n";
   }

   public function onMessage(ConnectionInterface $from, $msg)
   {
      foreach($this->clients as $client) {
         if($from->resourceId == $client->resourceId) {
            continue;
         }

         $client->send("Client $from->resourceId said $msg");
      }
   }

   public function onClose(ConnectionInterface $conn)
   {
      
   }

   public function onError(ConnectionInterface $conn, Exception $e)
   {
      
   }
}

?>