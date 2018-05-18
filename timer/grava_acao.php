
<?php
session_start();
// definir no seu código
$dsn = 'mysql:dbname=test;host=localhost:3307';
$pdo = new PDO($dsn, 'root', 'usbw');

//$user_id = $this->session->userdata('id');
$user_id = 1;
$user_id = $_SESSION['id'];


$params = array(':user' => $user_id);
$stt1 = $pdo->prepare('SELECT `action` FROM `timer` WHERE `user_id` = :user ORDER BY `id` DESC LIMIT 1');
$stt1->execute($params);
$newAction = 'start';
if ($stt1->rowCount() && $stt1->fetchColumn() === 'start') {
    $newAction = 'pause';
}
$stt2 = $pdo->prepare('INSERT INTO `timer` (`user_id`, `action`, `timestamp`) VALUES (:user, :action, :time)');
$params[':action'] = $newAction;
$params[':time'] = time();
$stt2->execute($params);
header('Content-Type: application/json');
echo json_encode(array(
   'running' => $newAction === 'start',
)); // para atualizar status, no caso de concorrência