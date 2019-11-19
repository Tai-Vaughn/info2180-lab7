<?php
  $host = getenv('IP');
  $username = 'Giorno';
  $password = 'GoldExperience';
  $dbname = 'world';

  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->prepare("SELECT * FROM countries Where name = :country");
  $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
  $stmt->bindParam(':country' , $country , PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($results);

 ?>

