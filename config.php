<?php

try {
	$pdo = new PDO('mysql:dbname=f0676735_pizza; host=localhost', 'f0676735_pizza', '123');
} catch (PDOException $e) {
	die($e->getMessage());
}