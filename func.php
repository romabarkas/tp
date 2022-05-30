Описание кода , вывести количество пицц например вася 3 
<?php
include 'config.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$adress = $_POST['adress'];
$phone = $_POST['phone'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `users`(`name`, `last_name`, `adress`, `phone`) VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $last_name, $adress, $phone]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}


// Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_name = $_POST['edit_name'];
$edit_last_name = $_POST['edit_last_name'];
$edit_adress = $_POST['edit_adress'];
$edit_phone = $_POST['edit_phone'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE users SET name=?, last_name=?, adress=?, phone=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_last_name, $edit_adress, $edit_phone, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}


// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// NUMBER 
if (isset($_POST['number_submit'])) {
   $sqll = "SELECT count(id) FROM users";
   $querys = $pdo->prepare($sqll);
   $querys->execute([$get_id]);
   header('Location: '. $_SERVER['HTTP_REFERER']);
}