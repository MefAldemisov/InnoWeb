<?php
include("../Database.php");
$pdo = new Database;
$pdo->connect("users.db");
$pdo->createTable();
$pdo->showRecords();