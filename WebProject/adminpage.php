<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

</head>
<body>
  <div id="leaflet"></div>


  <h1>ΘΑ ΡΘΟΥΜΕ ΣΠΙΤΙ ΣΟΥΥΥ</h1>
<div id="map"></div>
<script type="text/javascript">
       // Make basemap
       //dimiourgia tou xarti



       const map = new L.Map('map', { center: new L.LatLng(40.643012616714856,22.93400457702626), zoom: 11 });
       const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

       map.addLayer(osm);

       var template = '<form id="popup-form">\
         <label for="input-speed">Θέσεις Στάθμευσης:</label>\
         <input id="input-speed" class="popup-input" type="number" />\
         <label for="input-speed">Καμπύλη Ζήτησης:</label>\
         <input id="input-speed" class="popup-input" type="number" />\
         <table class="popup-table">\
           <tr class="popup-table-row">\
             <th class="popup-table-header">Θέσεις Στάθμευσης::</th>\
             <td id="value-arc" class="popup-table-data"></td>\
           </tr>\
           <tr class="popup-table-row">\
             <th class="popup-table-header">Καμπύλη Ζήτησης:</th>\
             <td id="value-speed" class="popup-table-data"></td>\
           </tr>\
         </table>\
         <button id="button-submit" type="button">Save Changes</button>\
       </form>';

       function layerClickHandler (e) {

         var marker = e.target,
             properties = e.target.feature.properties;

         if (marker.hasOwnProperty('_popup')) {
           marker.unbindPopup();
         }

         marker.bindPopup(template);
         marker.openPopup();

         L.DomUtil.get('value-arc').textContent = properties.arc;
         L.DomUtil.get('value-speed').textContent = properties.speed;

         var inputSpeed = L.DomUtil.get('input-speed');
         inputSpeed.value = properties.speed;
         L.DomEvent.addListener(inputSpeed, 'change', function (e) {
           properties.speed = e.target.value;
         });

         var buttonSubmit = L.DomUtil.get('button-submit');
         L.DomEvent.addListener(buttonSubmit, 'click', function (e) {
           marker.closePopup();
         });

       }


   var gdgr=   L.geoJson({
             "type": "FeatureCollection",
             "features": [{
               "type": "Feature",
               "geometry": {
                 "type": "Point",
                 "coordinates": [40.643012616714856,22.93400457702626]

               },
               "properties": {
                 "arc": 321,
                 "speed": 123
               }
             }]
           }, {
             onEachFeature: function (feature, layer) {
               layer.on('click', layerClickHandler);
             }
           }).addTo(map);




       // Load kml file
     /*  fetch('thess.kml')
           .then(res => res.text())
           .then(kmltext => {
               // Create new kml overlay
               const parser = new DOMParser();
               const kml = parser.parseFromString(kmltext, 'text/xml');
               const track = new L.KML(kml);
               map.addLayer(track);
             //  var layers = L.KML.addKML.layers;

             alert(globalVariable.x);
               // Adjust map to show the kml
               const popup = track.bindPopup("fsef");
               const bounds = track.getBounds();
               map.fitBounds(bounds);
           });*/

var coords=[];
var paok=1;
          var latlngs = [
             [40.643012616714856,22.93400457702626],
             [40.64362253212651,22.934564545884665],
             [40.64362940780963,22.934701483452614],
             [40.64273825698915,22.934523984921857],
             [40.643004301797234,22.934003983175426],
             [40.643012616714856,22.93400457702626]];
coords.push(latlngs);
           latlngs2 = [
           [40.59185128190686,   22.960406825952845],
           [40.59238548271374,   22.960949450998065],
           [40.59191010402331,  22.961643957093635],
           [40.591870784359145,  22.961629638774408],
           [40.591827612363524, 22.961598657260453],
           [40.5918068501061,  22.9614896190661],
           [40.59165624467959,  22.960426191242433],
           [40.59185128190686,  22.960406825952845]];
           coords.push(latlngs2);
console.log(latlngs2);
           latlngs3 = [
             [40.6041876647569, 22.954707888974728],
             [40.60424063324161, 22.955564468266548],
             [40.60366407325679, 22.95578343654876],
             [40.60365277429903, 22.955757583533945],
             [40.60356637155229, 22.954870293512474],
             [40.6041876647569, 22.954707888974728]];
             coords.push(latlngs3);

           latlngs4 = [
             [40.622200927740764, 22.968748294966176],
            [40.62225075715167, 22.969101605120393],
             [40.62161792477564, 22.969260028185538],
              [40.62161102908013, 22.9692536068987],
               [40.62156392436959, 22.96891341906224],
               [40.621569318624196, 22.96890160686462],
               [40.622200927740764, 22.968748294966176]];
               coords.push(latlngs4);

           latlngs5 = [
             [40.6241650587999, 22.953017943253073],
            [40.62412138887197, 22.95308708678813],
             [40.62410678359712, 22.953177748450127],
            [40.62403506189301, 22.953036107015656],
             [40.6241650587999, 22.953017943253073]];
             coords.push(latlngs5);

           latlngs6 = [
             [40.607622324463286, 22.95572258143539],
             [40.607618315181924, 22.95601659046266],
             [40.60701979781957, 22.95602969864385],
             [40.60701623895956, 22.956021373591707],
             [40.60700820287522, 22.955745294267356],
             [40.607622324463286, 22.95572258143539]];
             coords.push(latlngs6);

           latlngs7 = [
             [40.64866386280113, 22.929632535959836],
              [40.64867232015146, 22.929783686387218],
               [40.64868977358844, 22.929799281115322],
                [40.648692167096435, 22.92995558233913],
                [40.64838177024176, 22.929973997657196],
                [40.64834003689674, 22.92972858798274],
                [40.64866386280113, 22.929632535959836]];
                coords.push(latlngs7);


   for(i=0;i<coords.length;i++){
       //var forfun=ManipulatePolygons(coords)

   }






/*function ManipulatePolygons(coords){

var polygon = L.polygon(coords, {color: 'red'}).addTo(map);

//polygon.on('click', layerClickHandler);



var template = '<form id="popup-form">\
<label for="input-speed">New speed:</label>\
<input id="input-speed" class="popup-input" type="number" />\
<br /><label for="input-kampili">Καμπύλη ζήτησης:</label>\
<input id="input-kampili" class="popup-input" type="number" />\
<table class="popup-table">\
<tr class="popup-table-row">\
<th class="popup-table-header">Arc numer:</th>\
<td id="value-arc" class="popup-table-data"></td>\
</tr>\
<tr class="popup-table-row">\
<th class="popup-table-header">Current speed:</th>\
<td id="value-speed" class="popup-table-data"></td>\
</tr>\
</table>\
<button id="button-submit" type="button">Save Changes</button>\
</form>';

polygon.bindPopup(template);
polygon.openPopup();


var marker = e.target,
properties = e.target.feature.properties;

 if (marker.hasOwnProperty('_popup')) {
 marker.unbindPopup();
 }

 marker.bindPopup(template);
 marker.openPopup();

 L.DomUtil.get('value-arc').textContent = properties.arc;
 L.DomUtil.get('value-speed').textContent = properties.speed;

 var inputSpeed = L.DomUtil.get('input-speed');
 inputSpeed.value = properties.speed;
 L.DomEvent.addListener(inputSpeed, 'change', function (e) {
 properties.speed = e.target.value;
 });

 var buttonSubmit = L.DomUtil.get('button-submit');
 L.DomEvent.addListener(buttonSubmit, 'click', function (e) {
 marker.closePopup();
});




L.geoJson({
 "type": "FeatureCollection",
 "features": [{
   "type": "Feature",
   "geometry": {
     "type": "Polygon",
     "coordinates": coords
   },
   "properties": {
     "arc": 321,
     "speed": 123
   }
 }]
}, {
 onEachFeature: function (feature, layer) {
   layer.on('click', layerClickHandler);
 }
}).addTo(map);
}
*/

// prospatheia metratropis tou array stin katallili morfopoihsh pou xreiazetai gia gia mpei sto L.polygon
var qwer;
   var Arr=[];
   var Arr2=[];
   var Arr3=[];
var tyu;
   var latlang=[];
   var polygons= AjaxCall();
   console.log(polygons);
   var kappa = polygons.join('; ');
   kappa = kappa.replace(/\s+/g, "+");
   Arr = kappa.split(';');

 // console.log(polygons);
   for(i=0;i<Arr.length;i++){
      latlang[i]= Arr[i];
       qwer=latlang[i].toString();
       //console.log(qwer);

       Arr2[i]=qwer.split(',');
       tyu=Arr2[i].toString();
       tyu=tyu.substring(1);
       tyu=tyu.replace(/,/g, '-');
       tyu=tyu.replace(/\+/g,',');
     //  Arr3[i]=tyu.split('-');
       Arr3[i]=tyu;
     //  console.log(tyu);

 //  var latlngs = [[40.60204740202309, 22.95263573950064], [40.60214976231645, 22.953256274494702], [40.60171462581228, 22.953401880720875], [40.601598910612424, 22.9527716535178], [40.60204740202309, 22.95263573950064]];
     //  var  latlngs=L.latLng(latlang);
   //  var polygon =new L.polygon(latlngs,{color:"black",fillColor:"grey"}).addTo(map);

    }
var poi=[];
   // for(i=1;i<Arr3.length;i++){
   // console.log(Arr3[i]);
 //    Arr3[i]=Arr3[i].split('-').map(Number);

   //  var poi=Arr3[i].split('-');
     //console.log(poi);
     //var polygon =new L.polygon(parseFloat(poi),{color:"black",fillColor:"grey"}).addTo(map);
 //  }

//console.log(Arr3);


//ajax call gia na paroume ta dedomena apo tin basi, synchronous
function AjaxCall(){
 var array ={};
 var polygons={};
 var flag = 'true';
 $.ajax({
   url: "data.php",
   method: "post",
   async: false,
   data:{flag:JSON.stringify(flag)},
   success: function(data) {
     array = JSON.parse(data);
     polygons =trimPolygons(array);
   },
   error: function(xhr, ajaxOptions, thrownError) {
     console.log(thrownError);
   }
 });
 return polygons;
}

 function trimPolygons(myArray) {
   //  console.log(myArray);


   let  helper="";
   let  ret="";
   let polygons=new Array();
   let polygons2=new Array();
   for(var a = 1; a < myArray.length; a++) {

       var coordinates = myArray[a].paok;
       var population = myArray[a].population;
     //  console.log(coordinates);
           //	ret = coordinates.replace('{"type": "Polygon", "coordinates": ','');
           //  helper = ret.replace('}','');
           //  helper = helper.replace('[','');
           // helper = helper.replace(']','');
           // result = helper.substring(1, helper.length-1);
           // console.log(coordinates);
           //  result=result.split(',');
           //  result = result.replace(/\s+/g, "+");
           //  result = result.split(',');
           // result +=",";

              result = coordinates.replace('POLYGON((','');
              result = result.replace('))','');
             // result = result.split(',');
             // var digits= result.map(Number);

            //digits= parseFloat(result);
              console.log(result);

             // polygons[a]= result;

           }(result);

       //console.log(polygons);
       //	var arxi="[";
       //	var telos="]";
       //	result = result.slice(0, -1);
       return polygons;

       }
//function gia eiswgwgi polygown
       function PolygonsToMap(create) {
                   let latlang=create;
                   console.log(latlang);
                   map = map2;
                   let polygon =new L.polygon(latlang,{color:"black",fillColor:"grey"}).addTo(map2);
                   }


  </script>
<table>
<tr>
<th>Coords
<th>Pop
</tr>

<tbody id="data"></tbody>
</table>

   <?php

 //syndesi sto database polygoncoords

             include 'db_connection.php';
             $conn = OpenCon();
             echo "Connected Successfully";

       function itemTrim(&$item) {
           $item = trim($item);
   }





         //  $coordinates = array();

           $xml = simplexml_load_file("thess.kml");
           $placemarks = $xml->Document->Folder->Placemark;
   $mult_polygons = $xml->Document->Folder->Placemark->Polygon;

           for ($i = 0; $i < sizeof($placemarks); $i++) {

               /*  $coordinates =  $placemarks[$i]->MultiGeometry->Polygon->outerBoundaryIs->LinearRing->coordinates;

       if ( ! isset($coordinates)) {
                 $coordinates = 0;
               }
             //    echo $coordinates;
                echo "<br>";
                echo "<br>";

      */
         $coordinates = $placemarks[$i]->name;
       $cor_d  =  explode(' ', $placemarks[$i]->MultiGeometry->Polygon->outerBoundaryIs->LinearRing->coordinates);
       $qtmp=array();

       foreach($cor_d as $value){
         $tmp = explode(',',$value);
         $ttmp=$tmp[1];
         $tmp[1]=$tmp[0];
         $tmp[0]=$ttmp;
         $qtmp[]=   $tmp[0] . ' ' .$tmp[1];
         }
         //print_r($qtmp);
         echo "<br/>";
         echo "<br/>";









       //metatropi twn coordinates se arrays gia na xrisimopoihsoume to centroid function

                $xy = array_map(function($item) {
                  return ['x' => strtok($item, ','), 'y' => strtok(',')];
                }, explode(' ', $coordinates));
              //  var_dump($xy[]);

     // var_dump($xy);
      $x_coords = array_column($xy, 'x');
     //print_r($x_coords);
     //echo "<br>";
              //  echo "<br>";
     $y_coords = array_column($xy, 'y');
     //print_r($y_coords);





           //kwdikas gia ta populations

               $html = $placemarks[$i]->description;
               $string = strip_tags($html);    //remove tags from html string
               $values = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $string, -1, PREG_SPLIT_NO_EMPTY);

           //ean ta population den exoun baloun tote ta bazei 0

              if ( ! isset($values[6])) {
                 $values[6] = 0;
               }


           //  echo $values[6];


   $pop=$values[6];
   //echo $pop;
   $ximp=serialize($x_coords);
   $yimp=serialize($y_coords);





       $kavli= implode(",",$qtmp);
        $cor_d = json_encode($qtmp);
       // print_r($kavli);


 //insert to database


     //	$sql = " INSERT INTO imp_kml(coordinates,population)
     //	VALUES (ST_GeomFromText('POLYGON(($kavli))'),'$pop')";


 //delete from database


     //$sql = " DELETE FROM imp_kml";

//echo ean created i deleted successfully

/*if ($conn->query($sql) === TRUE) {
          echo "New record created successfully or deleted successfully";
         }
   else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }

*/
   }




      //ypologismos centroid



     //kleisimo mysql connection


             CloseCon($conn);



    ?>

</body>


</html>
