<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$exchangeName = 'my_exchange_1';
$queueName = 'my_queue_1';
$routingKey = 'routing_key_1';

// Declare the exchange and queue
$channel->exchange_declare($exchangeName, 'direct', false, false, false);
$channel->queue_declare($queueName, false, true, false, false);
$channel->queue_bind($queueName, $exchangeName);

// Send a message to the exchange
$messageBody = 'Hello, RabbitMQ!';
$message = new AMQPMessage($messageBody);
$channel->basic_publish($message, $exchangeName, $routingKey);

echo " [x] Sent message: '$messageBody'\n";