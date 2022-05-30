Описание кода , вывести количество пицц определенного типа , например пперони для заказа кадлого пользователя например вася 3 
<?php
include 'config.php';

$pizza_name = $_POST['pizza_name'];
$gramm = $_POST['gramm'];
$souse = $_POST['souse'];
$price = $_POST['price'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `pizza`(`pizza_name`, `gramm`, `souse`, `price`) VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$pizza_name, $gramm, $souse, $price]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `pizza`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_pizza_name = $_POST['edit_pizza_name'];
$edit_gramm = $_POST['edit_gramm'];
$edit_souse = $_POST['edit_souse'];
$edit_price = $_POST['edit_price'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE pizza SET pizza_name=?, gramm=?, souse=?, price=? WHERE idd=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_pizza_name, $edit_gramm, $edit_souse, $edit_price, $get_idd]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}


// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM pizza WHERE idd=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

