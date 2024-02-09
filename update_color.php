<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'chatroom';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
$color = $_POST['color'];

$user_id = $_SESSION['user_id'];

$sql = "UPDATE `utilisateurs` SET `color` = '$color' WHERE `id_u` = $user_id";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: chat.php');
exit;
?>