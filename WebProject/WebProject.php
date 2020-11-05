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
    <link rel="stylesheet" href="http://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
        <script src="http://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
        <script src="./L.KML.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="jDBSCAN.js"></script>
<script type="text/javascript" src="require.js"></script>
<script type="text/javascript" src="clustering.js"></script>


</head>




<body>
    <div class="container">
        <header>
            <h1 class="nameheader">City Parking</h1>

            <nav>

                <ul class="navigation" id="nav">
                    <li><a href="#">Αρχική</a></li>
                    <li><a href="#howworks">Πως Λειτουργεί</a></li>
                    <li><a href="#begin">Ας Ξεκινήσουμε</a></li>

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
                    Εισέρχεστε με την ιστοσελίδα .
                </p>
            </li>

            <li>
                <img src="2nd.png" alt="2nd icon">
                <p>
                    Bάζετε την τοποθεσίας σας, επιλέγεται την μέγιστη απόσταστη και την ώρα
                    που θέλετε να βρείτε parking.
                </p>
            </li>
            <li>
                <img src="3rd.png" alt="3rd icon">

                <p>
                    Eμφανίζονται στο
                    χάρτη η περιοχές με τα λιγότερα ποσοστά κατειλημμένων θέσεων.
                </p>

            </li>
        </ul>
    </div>



    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    </form>

    <div class="letsbegin" id="begin">

    <h1>Ας Ξεκινήσουμε</h1>

    <h5>Μετακινήστε το μπλε σημάδι στον χάρτη για να εισάγετε την τοποθεσία που επιθυμείτε να βρείτε parking .</h5>

    <h6>
       <form id="latlong" onclick="othername()">
        <label for="latitude">Γεωγραφικό Πλάτος:</label>
        <input id="latitude" type="text" />
        <label for="longitude">Γεωγραφικό Μήκος:</label>
        <input id="longitude" type="text" />
      </form>
    </h6>

    <h5>Εισάγετε την μέγιστη ακτίνα αναζήτησης (σε μέτρα) :</h5>

    <h6>
    <form id="radiusform" >
     <label for="radius">Ακτίνα:</label>
     <input id="radius" type="number" />
    </form>
    </h6>

    <h5>Είσαγετε την ώρα που επιθυμείτε να βρείτε parking :</h5>

<h6>
<form>
  <label for="Hour2">Ωρα:</label>
  <input id="Hour2" type="text" maxlength="5" value="00:00" class="time-input"/>
  <button id="btn">Βρείτε parking</button>
</form>

</h6>
<h5>
<button value="Refresh Page" onClick="window.location.reload();">Είσαγετε μία νέα τοποθεσία</button>
</h5>


  </div>



	<div id="map"></div>
  <div id="admindiv">
  <button id="admin_id" onClick="adminfunc();">Admin</button>
  <input id="pass" type="password" name="pwd">

  </div>
     <script type="text/javascript">

            //--------------------
            //CREATING LEAFLET MAP
            //--------------------

            const map = new L.Map('map', { center: new L.LatLng(40.643012616714856,22.93400457702626), zoom: 11 });
            const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            map.addLayer(osm);


            //------------------------------------------------
            //ACQUIRING LAT / LONG / RADIUS / HOUR FROM USERS
            //------------------------------------------------

            var forcircle=1;
            var forkav=1;

            const eksomiosi = (ev)=>{
                       ev.preventDefault();
                       document.getElementById("Hour2").value
                       document.getElementById("latitude").value
                       document.getElementById("longitude").value
                       document.getElementById("radius").value

                      console.log(latitude.value);
                      console.log(radius.value);
                      console.log(longitude.value);

                       var markos;
                       var telikigrammi;
                      // var polygon;

                       var takis = Hour2.value;
                       var res = takis.substring(0, 2);
                       var UserHour = parseInt(res);

                       var UserLat=latitude.value;
                       var UserLong=longitude.value;
                       var UserRadius=radius.value;

                       var arrformindist=new Array();
                       var arrfordbscan=new Array();

                       //-----------------------------------
                       //RESETTING THE COLORING OF POLYGONS
                       //-----------------------------------

                       for(i in map._layers) {
                                if(map._layers[i]._path != undefined) {
                                    try {
                                        map.removeLayer(map._layers[i]);
                                    }
                                    catch(e) {
                                        console.log("problem with " + e + map._layers[i]);
                                    }
                                }
                            }

                            L.circle([UserLat,UserLong],{radius: UserRadius}).addTo(map);
                            var erdrgwer= new L.marker([UserLat,UserLong]).addTo(map).bindPopup("Η τοποθεσίας σας").openPopup();


                            //----------------------------------------------
                            //CALLING POLYGON COLORING FUNCTION AND DBSCAN
                            //----------------------------------------------


                       for(i=0;i<polygonsCompl.length;i++){
                             var tomap= PolygonsToMap(polygonsCompl[i],i+1,poter.seats[i],poter.population[i],poter.zitisi[i],poter.centr20[i],poter.centr40[i]);
                       }
                        forkav=forkav+1;
                       setTimeout(doSomething, 5);

                       //---------------------------------------------
                       //FUNCTION FOR DBSCAN AND CREATION OF POLYLINE
                       //---------------------------------------------

                       function doSomething() {

                       var dbscan = new DBSCAN();

                       var clusters = dbscan.run(arrfordbscan, 0.0001, 10);

                       if(clusters.length > 0){

                           var biggestCluster = clusters[0];

                           for(i=1;i<clusters.length;i++){

                               if(clusters[i].length > biggestCluster.length){
                                   biggestCluster = clusters[i];
                               }
                           }

                           var clusterPoints = [];
                           var sumx = 0;
                           var sumy = 0;

                           for(i=0;i<biggestCluster.length;i++){
                              var point = arrfordbscan[biggestCluster[i]];
                              clusterPoints.push(point);

                              sumx+=point[0];
                              sumy+=point[1];
                           }

                           console.log('Cluster:', clusterPoints);
                           console.log('Center:', sumx/clusterPoints.length, sumy / clusterPoints.length);
                            markos= new L.marker([sumx/clusterPoints.length,sumy / clusterPoints.length]).addTo(map);
                            var popupmark=markos.bindPopup('Η περιοχή με τις περισσότερες θέσεις parking').openPopup();
                            telikigrammi=new L.polyline([[sumx/clusterPoints.length,sumy / clusterPoints.length],[UserLat,UserLong]]).addTo(map);
                       }
                       else{
                           console.log('No clusters');
                       }
                       }

                       //---------------------------------
                       //FUNCTION FOR COLORING POLYGONS
                       //---------------------------------

                         function PolygonsToMap(create,id,seats,population,zitisi,x,y) {

                         				let latlang=create;
                                 var point;
                                 var bounds;
                                 zitisitemp=zitisi;

                                 var typos = seats-((seats-(population*0.2))*(1-zitisi[UserHour]));
                                 var freeseats=Math.round((seats-(population*0.2))*(1-zitisi[UserHour]));


                             //--------------------------------------------------------------
                             //CALCULATING DISTANCE FROM POLYGONS CENTROIDS TO USERS LAT LANG
                             //---------------------------------------------------------------


                                 var circleLat  = UserLat;
                                 var circleLong = UserLong;

                                 var centrLat = y;
                                 var centrLong = x;

                                 var lat1=circleLat;
                                 var lat2=centrLat;

                                 var lon1=circleLong;
                                 var lon2=centrLong;
                                 var unit="K";

                             if ((lat1 == lat2) && (lon1 == lon2)) {
                                   return 0;
                                 }
                                 else {
                                   var radlat1 = Math.PI * lat1/180;
                                   var radlat2 = Math.PI * lat2/180;
                                   var theta = lon1-lon2;
                                   var radtheta = Math.PI * theta/180;
                                   var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                                   if (dist > 1) {
                                     dist = 1;
                                   }
                                   dist = Math.acos(dist);
                                   dist = dist * 180/Math.PI;
                                   dist = dist * 60 * 1.1515;
                                   if (unit=="K") { dist = dist * 1.609344 *1000}
                                   if (unit=="N") { dist = dist * 0.8684 }

                                 }

                               //------------------------------------------
                               //CREATING POLYGONS WITH THE RIGHT COLORING
                               //------------------------------------------

                               if(dist<UserRadius){
                                   if(typos<59.00){
                                      polygon =new L.polygon(latlang,{color:"green"}).addTo(map);

                                      bounds=polygon.getBounds();
                                      var x_max = bounds.getEast();
                                      var x_min = bounds.getWest();
                                      var y_max = bounds.getSouth();
                                      var y_min = bounds.getNorth();
                                    for(let p = 0; p < freeseats ; p++ ){


                                          var lat = y_min + (Math.random() * (y_max - y_min));
                                          var lng = x_min + (Math.random() * (x_max - x_min));
                                          var markarr=[lat,lng];

                                        arrfordbscan.push(markarr);

                                      }


                                   }
                                   else if((typos>59.00)&&(typos<85.00)){
                                      polygon =new L.polygon(latlang,{color:"yellow"}).addTo(map);

                                      bounds=polygon.getBounds();
                                      var x_max = bounds.getEast();
                                      var x_min = bounds.getWest();
                                      var y_max = bounds.getSouth();
                                      var y_min = bounds.getNorth();
                                    for(let p = 0; p < freeseats ; p++ ){


                                          var lat = y_min + (Math.random() * (y_max - y_min));
                                          var lng = x_min + (Math.random() * (x_max - x_min));
                                          var markarr=[lat,lng];

                                        arrfordbscan.push(markarr);

                                      }

                                   }
                                   else {
                                     polygon =new L.polygon(latlang,{color:"red"}).addTo(map);

                                       bounds=polygon.getBounds();
                                       var x_max = bounds.getEast();
                                       var x_min = bounds.getWest();
                                       var y_max = bounds.getSouth();
                                       var y_min = bounds.getNorth();
                                     for(let p = 0; p < freeseats ; p++ ){


                                           var lat = y_min + (Math.random() * (y_max - y_min));
                                           var lng = x_min + (Math.random() * (x_max - x_min));
                                           var markarr=[lat,lng];

                                         arrfordbscan.push(markarr);

                                       }
                                   }



                                 }
                               }



                       }


                       //----------------------
                      //BUTTON FOR SIMULATION
                      //------------------------

          document.addEventListener('DOMContentLoaded', ()=>{
                document.getElementById('btn').addEventListener('click', eksomiosi);
            });



            //----------------------------------------------------------------------------------
            // ADMIN FUNCTION / POLYGONS APPEAR GREY AND YOU CAN INSERT CUSTOM ZITISI AND SEATS
            //----------------------------------------------------------------------------------


            function adminfunc(){
                if(document.getElementById("pass").value=="admin"){


              for(i in map._layers) {
                       if(map._layers[i]._path != undefined) {
                           try {
                               map.removeLayer(map._layers[i]);
                           }
                           catch(e) {
                               console.log("problem with " + e + map._layers[i]);
                           }
                       }
                   }

              for(i=0;i<polygonsCompl.length;i++){
                    var tomap= PolygonsToMap(polygonsCompl[i],i+1,poter.seats[i],poter.population[i],poter.zitisi[i],poter.centr20[i],poter.centr40[i]);
              }

              function PolygonsToMap(create,id,seats,population,zitisi,x,y) {
                  let latlang=create;
                     polygon =new L.polygon(latlang,{color:"grey"}).addTo(map);

                        //---------------------------------
                        //POPUP FOR EACH POLYGON (HMITELHS)
                        //---------------------------------

                          var template = '<form id="popup-form">\
                        <label for="input_speed">Καινούργια τιμή θέσεων:</label>\
                        <input id="input_speed" class="popup-input" type="number" />\
                        <br /><label for="input-arc">Καινούργια Ζήτηση:</label>\
                        <input id="input-arc" class="popup-input" type="number" />\
                        <table class="popup-table">\
                        <tr class="popup-table-row">\
                        <th class="popup-table-header">Θέσεις:</th>\
                        <td id="value-arc" class="popup-table-data"></td>\
                        </tr>\
                        <tr class="popup-table-row">\
                        <th class="popup-table-header">Ζήτηση:</th>\
                        <td id="value-speed" class="popup-table-data">    </td>\
                        </tr>\
                        </table>\
                        <button id="button-submit" type="button">Save Changes</button>\
                        </form>';

                        polygon.id=id;

                        polygon.bindPopup(template);


                      function onMapClick(e){



                              polygon.bindPopup(template);

                          }
                          map.on('click',onMapClick);

                      }
                    }
                    }

              var input="";
              var kav="";


            //--------------------------------------------------
            //THE DRAGGABLE MARKER FOR ADDING USERS LOCATIONS
            //--------------------------------------------------

                  var marker = L.marker([40.62945757333346,22.954730987548828],{
                  draggable: true
                }).addTo(map).bindPopup('Η τοποθεσίας σας').openPopup();

                var input2=  marker.on('dragend', function (e) {
                    document.getElementById('latitude').value = marker.getLatLng().lat;
                    document.getElementById('longitude').value = marker.getLatLng().lng;
                     input = document.getElementById("latitude").value;
                     kav=input;
                  });

                  console.log(input2);



      //--------------------------------------------------
      //ACQUIRING POPULATION / SEATS / ZITISI / CENTROIDS
      //--------------------------------------------------

          var poter=AjaxCallforZitisi();


          //------------------------------------------------------------------
          // CREATING AN AJAX CALL FOR POPULATION / SEATS / ZITISI / CENTROIDS
          //------------------------------------------------------------------

        function AjaxCallforZitisi(){
              var array ={};
              var polygonsajax=new Array();
              var flag = 'true';
              $.ajax({
                url: "datazitisi.php",
                method: "post",
                async: false,
                data:{flag:JSON.stringify(flag)},
                success: function(data) {
                  array = JSON.parse(data);
                polygonsajax =trimZitisi(array);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  console.log(thrownError);
                }
              });

              return polygonsajax;

        }

        function trimZitisi(myArray,) {
        let zitisi3 = new Array();
        let zitiseis =new Array();
        var population=new Array();
        var centroid_20p=new Array();
        var centroid_40p=new Array();
        var seats = new Array();
        for (var a = 1; a < myArray.length; a++) {
          population.push( myArray[a].population);
          var tiu=population.map(Number);

          centroid_20p.push(myArray[a].centroid_20);
          var centr20toNum=centroid_20p.map(Number);

          centroid_40p.push(myArray[a].centroid_40);
          var centr40toNum=centroid_40p.map(Number);

          seats.push( myArray[a].seats);
          var tius=seats.map(Number);

          var zitisi = myArray[a].zitisi;

          var result = zitisi.split(" ");
          var variefg = result.map(Number);
          zitiseis.push(variefg);
      }(zitisi3)

        return { population:tiu,zitisi:zitiseis , seats:tius ,centr40:centr40toNum , centr20:centr20toNum};

        }

//--------------------------------------------------
//CREATING AN AJAX CALL FOR COORDINATES OF POLYGONS
//--------------------------------------------------

      function AjaxCall(){
      			var array ={};
            var polygonsajax=new Array();
      			var flag = 'true';
      			$.ajax({
      				url: "data.php",
      				method: "post",
              async: false,
      				data:{flag:JSON.stringify(flag)},
      				success: function(data) {
      					array = JSON.parse(data);
      				polygonsajax =trimPolygons(array);
      				},
      				error: function(xhr, ajaxOptions, thrownError) {
      					console.log(thrownError);
      				}
      			});

            return polygonsajax;
      }

      function trimPolygons(myArray) {
      let polygons3 = new Array();
      for (var a = 1; a < myArray.length; a++) {
        var population = myArray[a].population;
        var coordinates = myArray[a].paok;
        var result = coordinates.replace("POLYGON((", "").replace("))", "").split(",");
        let polygons2 = new Array();
                result.forEach(function(item, index) {
                polygons2.push(item.split(" ").map(function(item) {
                	return parseFloat(item);
                }));
          });

      polygons3.push(polygons2);

      }(polygons3)

      return polygons3;

      }

//------------------------
// ACQUIRING THE POLYGONS
//------------------------

    var polygonsCompl= AjaxCall();


    $(document).ready(function(){
      $('#MyButton').click(function(){
         PolygonsToMap();
      });
    });

    var today = new Date();
    var hour=today.getHours();
    var pointarray=new Array();
    var minddist=10000;


      //-------------------------------------------------------------------
      //FUNCTION TO ITERATE AND CREATE POLYGONS FOR THE FRONT PAGE OF USER
      //-------------------------------------------------------------------

var polygon;

        for(i=0;i<polygonsCompl.length;i++){
              var tomap= PolygonsToMap(polygonsCompl[i],i+1,poter.seats[i],poter.population[i],poter.zitisi[i],poter.centr20[i],poter.centr40[i],);
        }



            //function gia eiswgwgi polygown

            function PolygonsToMap(create,id,seats,population,zitisi,x,y) {

            				let latlang=create;
                    var point;
                    var bounds;
                    zitisitemp=zitisi;

                    var typos = seats-((seats-(population*0.2))*(1-zitisi[hour]));

                  //------------------------------------------
                  //CREATING POLYGONS WITH THE RIGHT COLORING
                  //------------------------------------------


                      if(typos<59.00){
                         polygon =new L.polygon(latlang,{color:"green"}).addTo(map);
                         }



                      else if((typos>59.00)&&(typos<85.00)){
                         polygon =new L.polygon(latlang,{color:"yellow"}).addTo(map);
                         }


                      else {
                        polygon =new L.polygon(latlang,{color:"red"}).addTo(map);
                          }




                  }


       </script>

        <?php

        error_reporting(0);
        ini_set('display_errors', 0);


        //------------------------------------
        //FINDING THE CENTROID OF THE POLYGON
        //------------------------------------

        function getCenter($polygon)
        {
            $NumPoints = count($polygon);

            if($polygon[$NumPoints-1] == $polygon[0]){
                $NumPoints--;
            }else{

                $polygon[$NumPoints] = $polygon[0];
            }


            $X = 0;
            $Y = 0;
            For ($pt = 0 ;$pt<= $NumPoints-1;$pt++){
                $factor = $polygon[$pt]['x'] * $polygon[$pt + 1]['y'] - $polygon[$pt + 1]['x'] * $polygon[$pt]['y'];
                $X += ($polygon[$pt]['x'] + $polygon[$pt + 1]['x']) * $factor;
                $Y += ($polygon[$pt]['y'] + $polygon[$pt + 1]['y']) * $factor;
            }

            $polygon_area = ComputeArea($polygon);
            $X = $X / 6 / $polygon_area;
            $Y = $Y / 6 / $polygon_area;

            return array($X, $Y);
        }

//-----------------------------------
//HELPER FUNCTION FOR ABOVE FUNCTION
//--------------------------------

function ComputeArea($polygon)
{
    $NumPoints = count($polygon);

    if($polygon[$NumPoints-1] == $polygon[0]){
        $NumPoints--;
    }else{
        //Add the first point at the end of the array.
        $polygon[$NumPoints] = $polygon[0];
    }

    $area = 0;

    for ($i = 0; $i < $NumPoints; $i++) {
      $i1 = ($i + 1) % $NumPoints;
      $area += ($polygon[$i]['y'] + $polygon[$i1]['y']) * ($polygon[$i1]['x'] - $polygon[$i]['x']);
    }

    $area /= 2;
    return $area;
}

            //----------------------
            //CONNECTING TO DATABASE
            //----------------------

                  include 'db_connection.php';
                  $conn = OpenCon();
                  echo "Connected Successfully";

            function itemTrim(&$item) {
                $item = trim($item);
				}

        set_time_limit(300);

              //--------------------
              //LOADING THE XML FILE
              //--------------------

                $xml = simplexml_load_file("thess.kml");
                $placemarks = $xml->Document->Folder->Placemark;
				        $mult_polygons = $xml->Document->Folder->Placemark->Polygon;
                $linear=$xml->Document->Folder->Placemark->Polygon->outerBoundaryIs->LinearRing;


                for ($i = 0; $i < sizeof($placemarks); $i++) {


					               $coordinates = $placemarks[$i]->name;
						             $cor_d  =  explode(' ', $placemarks[$i]->MultiGeometry->Polygon->outerBoundaryIs->LinearRing->coordinates);
						             $qtmp=array();

                          $arrcentr = array();
                          $o=0;

                          //------------------
                          //PARSING COORDINATES
                          //-------------------


                						foreach($cor_d as $value){

                						  $tmp = explode(',',$value);
                						  $ttmp=$tmp[1];
                						  $tmp[1]=$tmp[0];
                						  $tmp[0]=$ttmp;
                						  $qtmp[]=   $tmp[0] . ' ' .$tmp[1];
                              $arrcentr[$o]['x']=$tmp[0];
                              $arrcentr[$o]['y']=$tmp[1];
                              $o=$o+1;
                							}


                  //------------------------------
                  //CALLING THE CENTROID FUNCTION
                  //------------------------------

                          $centroids= getCenter($arrcentr);

                          $sarantari=abs($centroids[0]);
                          $eikosari=abs($centroids[1]);

                //-----------------------------------
                //INSERTING RANDOM AMOUNTS OF ZITISI
                //-----------------------------------

                        if($i<1000){
                            $tempzitisi="0.75 0.55 0.46 0.19 0.2 0.2 0.39 0.55 0.66 0.8 0.95 0.9 0.95 0.9 0.88 0.83 0.7 0.62 0.74 0.8 0.8 0.95 0.92 0.76";
                        }

                        if(($i<2000)&&($i>=1000)){
                          $tempzitisi="0.69 0.71 0.73 0.68 0.69 0.7 0.67 0.55 0.49 0.43 0.34 0.45 0.48 0.53 0.5 0.56 0.73 0.41 0.42 0.48 0.54 0.6 0.72 0.66";
                        }

                        if($i>=2000){
                          $tempzitisi="0.18 0.17 0.21 0.25 0.22 0.17 0.16 0.39 0.54 0.77 0.78 0.83 0.78 0.78 0.8 0.76 0.78 0.79 0.84 0.57 0.38 0.24 0.19 0.23";
                        }



                        //--------------------------------------------------------
                        //TRANSFORMING COORDINATES TO ARRAYS / POSSIBLY NOT NEEDED
                        //---------------------------------------------------------


                        $xy = array_map(function($item) {
                            return ['x' => strtok($item, ','), 'y' => strtok(',')];
                        }, explode(' ', $coordinates));

              					$x_coords = array_column($xy, 'x');

              					$y_coords = array_column($xy, 'y');


                        //------------------------
                        //TRANSFORMING POPULATION
                        //------------------------


                    $html = $placemarks[$i]->description;
                    $string = strip_tags($html);    //remove tags from html string
                    $values = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $string, -1, PREG_SPLIT_NO_EMPTY);


                   if ( ! isset($values[6])) {
                      $values[6] = 0;
                    }

                  //--------------------
                  //PROBABLY NOT NEEDED
                  //---------------------

            				$pop=$values[6];
            				//echo $pop;
            				$ximp=serialize($x_coords);
            				$yimp=serialize($y_coords);

        						$todb= implode(",",$qtmp);
        						$cor_d = json_encode($qtmp);



      //-------------------
			//INSERT TO DATABASE
      //-------------------


				//		$sql = " INSERT INTO imp_kml(coordinates,population,zitisi,centroid_40,centroid_20)
				//		VALUES (ST_GeomFromText('POLYGON(($todb))'),'$pop','$tempzitisi','$sarantari','$eikosari')";



      //--------------
			//DELETE FROM DB
      //--------------


			//		$sql = " DELETE FROM imp_kml";




      //---------------------------
      //DELETE NULLS FROM DATABASE
      //---------------------------


      //$sql="DELETE FROM imp_kml WHERE coordinates IS NULL";





            //------------
            //DELETE QUERYY
            //----------------

    /*  if ($conn->query($sql) === TRUE) {
      							 echo "New record created successfully or deleted successfully";
      							}
      				else {
      						echo "Error: " . $sql . "<br>" . $conn->error;
      					}

*/


				}


                  CloseCon($conn);





         ?>


</body>

</html>
