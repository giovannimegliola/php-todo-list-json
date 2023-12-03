<?php

//leggo il file todo-list.json e lo metto in una variabile come stringa di testo
$filecontent = file_get_contents("todo-list.json");
//var_dump($filecontent);

//decodifico la stringa di testo in un array php
$list = json_decode($filecontent, true);
// var_dump($list)

if(isset($_POST['task'])){
  $newTask = [
    'text' => $_POST['task'],
    'done' => false
  ];
  array_push($list, $newTask);
  file_put_contents('todo-list.json', json_encode($list) );
}

if(isset($_POST['deleteTask'])){
  $index = $_POST ['deleteTask'];
  array_splice($list, $index, 1);
  file_put_contents('todo-list.json', json_encode($list) );
}

header('Content-Type: application/json');

//stampo la lista in formato json
echo json_encode($list);
?>