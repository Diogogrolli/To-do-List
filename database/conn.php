<?php

$hostname= 'localhost';
$database= 'to_do_list';
$username = 'postgress';
$password = '1234';

try {
$pdo = new PDO("pgsql:host=$hostname;dbname=$database", $username, $password);
} catch (PDOEexception $e) {
    echo "Erro: " . $e->getMessage(); 
}