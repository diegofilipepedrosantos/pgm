
<?php
session_start();
// definir no seu código
$dsn = 'mysql:dbname=test;host=localhost:3307';
$pdo = new PDO($dsn, 'root', 'usbw');
//$user_id = $this->session->userdata('id'); 
//$user_id = 1;
$user_id = $_SESSION['id'];


$params = array(':user' => $user_id);
$stt = $pdo->prepare('SELECT `action`, `timestamp` FROM `timer` WHERE `user_id` = :user ORDER BY `id`');



$stt->execute($params);
$tempos = $stt->fetchAll(PDO::FETCH_ASSOC);
$seconds = 0;
$action = 'pause'; // sempre inicia pausado
foreach ($tempos as $tempo) {
    $action = $tempo['action'];
    switch ($action) {
        case 'start':
            $seconds -= $tempo['timestamp'];
            break;
        case 'pause':
            // para evitar erro se a primeira ação for pause
            if ($seconds !== 0) {
                $seconds += $tempo['timestamp'];
            }
            break;
    }
}
if ($action === 'start') {
    $seconds += time();
}
header('Content-Type: application/json');
echo json_encode(array(
    'seconds' => $seconds,
    'running' => $action === 'start',
));