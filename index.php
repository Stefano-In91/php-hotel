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

  $filtered_hotels = [];

  $parking = $_GET["parking"];
  $vote = (int)$_GET["vote"];

  if ( !isset($parking) || $parking == "both") {
    foreach($hotels as $hotel) {
      if ( !isset($vote) || (isset($vote) && (int)$hotel["vote"] >= $vote) ) {
        $filtered_hotels[] = $hotel;
      }
    }
  } else {
    foreach( $hotels as $hotel) {
      if($parking == $hotel["parking"] && (!isset($vote) || (int)$hotel["vote"] >= $vote) ) {
        $filtered_hotels[] = $hotel;
      }
    }
  }

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
    <!-- Form di selezione in GET -->
    <header class="m-5">
      <form action="index.php">
        <div class="form-group">
          <label class="mt-1" for="parking">Parcheggio Integrato?</label>
          <select name="parking" id="parking" class="form-control mt-1 mb-1">
            <option value="both">Entrambi</option>
            <option value="1">Si</option>
            <option value="0">No</option>
          </select>
          <label class="mt-1" for="vote">Selezionare voto minimo.</label>
          <select name="vote" id="vote" class="form-control mt-1 mb-1">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <button class="btn btn-dark">Invia</button>
        </div>
      </form>
    </header>
    <!-- Tabella -->
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
          <!-- Inserimento dati php -->
          <?php foreach( $filtered_hotels as $hotel) { ?>
            <tr>
              <th> <?php echo $hotel["name"]; ?></td>
              <td> <?php echo $hotel["description"]; ?></td>
              <td> <?php echo $hotel["parking"] ? "Si" : "No"; ?></td>
              <td> <?php echo $hotel["vote"]; ?></td>
              <td> <?php echo $hotel["distance_to_center"]." km"; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </main>
  </body>
</html>