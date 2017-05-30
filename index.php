<?php
include('bootstrap.php');

$mysession = new Session();
$mysession->push(array('newvar' => 'ekta'));
$mysession->pull('newvar');

?>

<h1>Welcome to new learning project</h1>
