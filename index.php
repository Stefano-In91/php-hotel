<?php

  $hotels = [
    [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
    ],
    [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
    ],
    [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
    ],
    [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
    ],
    [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
    ],
  ];

  $parking = $_GET["parking"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <header class="m-5">
      <form action="index.php">
        <div class="form-group">
          <label for="parking">Parcheggio Integrato?</label>
          <select name="parking" id="parking" class="form-control mt-2 mb-2">
            <option value="both">Entrambi</option>
            <option value="true">Si</option>
            <option value="false">No</option>
          </select>
          <button class="btn btn-dark">Invia</button>
        </div>
      </form>
    </header>
    <main class="m-5">
      <table class="table table-dark">
        <thead>
          <tr>
            <th>Nome Hotel</th>
            <th>Descrizione</th>
            <th>Parcheggio</th>
            <th>Voto</th>
            <th>Distanza dal Centro</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!isset($parking) || $parking == "both") { 
            for($i=0; $i < count($hotels); $i++) { ?>
              <tr>
                <th> <?php echo $hotels[$i]["name"]; ?></td>
                <td> <?php echo $hotels[$i]["description"]; ?></td>
                <td> <?php echo $hotels[$i]["parking"] ? "Si" : "No"; ?></td>
                <td> <?php echo $hotels[$i]["vote"]; ?></td>
                <td> <?php echo $hotels[$i]["distance_to_center"]." km"; ?></td>
              </tr>
          <?php }} else {
            for($i=0; $i < count($hotels); $i++) {
              if($parking == ($hotels[$i]["parking"] ? "true" : "false")) { ?>
                <tr>
                  <th> <?php echo $hotels[$i]["name"]; ?></td>
                  <td> <?php echo $hotels[$i]["description"]; ?></td>
                  <td> <?php echo $hotels[$i]["parking"] ? "Si" : "No"; ?></td>
                  <td> <?php echo $hotels[$i]["vote"]; ?></td>
                  <td> <?php echo $hotels[$i]["distance_to_center"]." km"; ?></td>
                </tr>            
          <?php }}}?>
        </tbody>
      </table>
    </main>
  </body>
</html>