<?php
   use Vonage\Voice\NCCO\NCCO;

   require_once './config.php';
   require_once './vendor/autoload.php';

   $keypair = new \Vonage\Client\Credentials\Keypair(
      file_get_contents(VONAGE_APPLICATION_PRIVATE_KEY_PATH), 
      VONAGE_APPLICATION_ID
   );

   $client = new \Vonage\Client($keypair);

   $outboudCall = new \Vonage\Voice\OutboundCall(
      new \Vonage\Voice\Endpoint\Phone('5016142450'),
      new \Vonage\Voice\Endpoint\Phone('5016706861')
   );

   $ncco = new NCCO();
   $ncco->addAction(
      new \Vonage\Voice\NCCO\Action\Talk('This is a text to speech call from Nexmo')
   );

   $outboudCall->setNCCO($ncco);

   $response = $client->voice()->createOutboundCall($outboudCall);

   var_dump($response);
?>

