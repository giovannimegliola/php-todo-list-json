<?php

//leggo il file todo-list.json e lo metto in una variabile come stringa

$filecontent = file_get_contents("todo-list.json");

// var_dump($filecontent);


//decodifico la stringa in un array php
$list = json_decode($filecontent, true);

if(isset($_POST['task'])){
  $newTask = $_POST['task'];
  array_push($list, $newTask);
  file_put_contents('todo-list.json', json_encode($list) );
}

header('Content-Type: application/json');

//stampo la lista in json

echo json_encode($list);
?>