<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();


// queue_declare function( Queue Name, Passive, Durable, Exclusive, Auto-delete)
$channel->queue_declare('queues_1', false, false, false, false);

$msg = new AMQPMessage('Queues 1: Hello MD, How are you?');
$channel->basic_publish($msg, '', 'queues_1');


echo " Queues 1 - Sent 'Message!'\n";


$channel->close();
$connection->close();