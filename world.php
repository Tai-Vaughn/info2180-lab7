<?php
  $host = getenv('IP');
  $username = 'Giorno';
  $password = 'GoldExperience';
  $dbname = 'world';

  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
  $context = filter_input(INPUT_GET, 'context', FILTER_SANITIZE_STRING);

  if($context !== 'cities'){
  $stmt = $conn->prepare("SELECT * FROM countries Where name LIKE '%$country%' ");
  $stmt->bindParam(':country' , $country , PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $stmt = $conn->prepare("SELECT cities.name, cities.district, cities.population FROM countries 
                            JOIN cities on countries.code = cities.country_code Where countries.name LIKE :country");
    $stmt->bindParam(':country' , $country , PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  //+echo json_encode($results);
 ?>

<?php if($context === 'country'):?>

<table>
    <div>
<thead>
   <th>Country Name</th>
   <th>Continent</th>
   <th>Independence Year</th>
   <th>Head of State</th>
</thead>
<tbody>
    <?php foreach ($results as $row): ?>
 <tr>
     <td> <?= $row['name']?></td>
     <td> <?=$row['continent']?></td>
     <td> <?=$row['independence_year']?></td>
     <td> <?=$row['head_of_state']?></td>
     
 </tr>   
  <?php endforeach; ?>  
    
</tbody>
</div>
</table>

<?php else : ?>

<table>
    <div>
<thead>
   <th>City Name</th>
   <th>District</th>
   <th>Population</th>
   
</thead>
<tbody>
    <?php foreach ($results as $row): ?>
 <tr>
     <td> <?= $row['name']?></td>
     <td> <?=$row['district']?></td>
     <td> <?=$row['population']?></td>
    
     
 </tr>   
  <?php endforeach; ?>  
    
</tbody>
</div>
</table>
<?php endif; ?>


