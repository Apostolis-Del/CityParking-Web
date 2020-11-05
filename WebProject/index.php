<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Parking</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Comfortaa&display=swap');
    </style>

    <link rel="stylesheet" href="WebCss.css">
    <!--
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="WebJs.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
     <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        -->
    <link rel="stylesheet" href="http://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
        <script src="http://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
        <script src="./L.KML.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

</head>




<body>
    <div class="container">
        <header>
            <h1 class="nameheader">City Parking</h1>

            <nav>
                <!--   <a href="#" class="hide-desktop">
                   <img src="menuicon.svg" alt="toggle menu" class="menu" id="menu">
                </a> -->

                <ul class="navigation" id="nav">
                    <li><a href="#">Αρχική</a></li>
                    <li><a href="#loginform">Σύνδεση</a></li>
                    <li><a href="#howworks">Πως Λειτουργεί</a></li>
                </ul>

            </nav>
        </header>

        <section>

            <img src="city2.png" class="city">

            <h2 class="header2">
                "Ένας έξυπνος και γρήγορος τρόπος να βρείτε
            </h2>
            <h2 class="formargbot">
                parking μέσα στη πόλη μέσω ευφυών αισθητήρων."
            </h2>
        </section>

    </div>
    <div id="howworks">
        <h2 class="howheader">ΠΩΣ ΛΕΙΤΟΥΡΓΕΙ</h2>
    </div>


    <div class="how">


        <ul>
            <li>
                <img src="1st.png" alt="1st icon">

                <p>
                    Συνδέεστε με την ιστοσελίδα (Σύνδεση ως επισκέπτης).
                </p>
            </li>

            <li>
                <img src="2nd.png" alt="2nd icon">
                <p>
                    Bάζετε την τοποθεσίας σας, επιλέγεται την μέγιστη απόσταστη
                    που θέλετε να βρείτε parking.
                </p>
            </li>
            <li>
                <img src="3rd.png" alt="3rd icon">

                <p>
                    Eμφανίζονται στο
                    χάρτη οι περιοχές με τα λιγότερα ποσοστά στάθμευσης.
                </p>

            </li>
        </ul>
    </div>



    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>



    <?php

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          switch ($_POST['command']) {
          case 'show_file_1':
              include '';
              break;
          case 'show_file_2':
              include 'adminpage.php';
              break;
          }
          exit;
      }

?>
<form method="POST">
    <button name="command" value="show_file_2">admin</button>
</form>


</body>

</html>
