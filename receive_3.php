<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$exchangeName = 'my_exchange_1';
$queueName = 'my_queue_1';
$routingKey = 'routing_key_1';

// Declare the exchange and queue
$channel->exchange_declare($exchangeName, 'direct', false, false, false);
$channel->queue_declare($queueName, false, true, false, false);
$channel->queue_bind($queueName, $exchangeName, $routingKey);

// Callback function to process received messages
$callback = function ($msg) {
    echo 'MSG: ', $msg->body, "\n";
  };
  
$channel->basic_consume($queueName, '', false, true, false, false, $callback);

  try {
      $channel->consume();
  } catch (\Throwable $exception) {
      echo $exception->getMessage();
  }

$channel->close();
$connection->close();