<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();


// queue_declare function( Queue Name, Passive, Durable, Exclusive, Auto-delete)
$channel->queue_declare('queues_2', false, false, false, false);

$msg = new AMQPMessage('Queues 2: Hi Mr, What do you do?.');
$channel->basic_publish($msg, '', 'queues_2');

echo " queues 2 - Sent 'Message!'\n";


$channel->close();
$connection->close();