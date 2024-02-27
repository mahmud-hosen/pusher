<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('queues_1', false, false, false, false);

echo "[*] Waiting for messages. To exit press CTRL+C\n\n";

$callback = function ($msg) {
    echo 'MSG: ', $msg->body, "\n";
  };
  
  $channel->basic_consume('queues_1', '', false, true, false, false, $callback);
  
  try {
      $channel->consume();
  } catch (\Throwable $exception) {
      echo $exception->getMessage();
  }