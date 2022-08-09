<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'e1ae740b12b367a28285',
    '3d13fc12c383a3292e2b',
    '1456748',
    $options
  );

 echo $name = $_POST['name'];
 echo $email = $_POST['email'];
 $data = array(
    'name' => $name,
    'email' => $email,
 );

  $pusher->trigger('my-channel', 'my-event', $data);
  header("location: index.php");
?>