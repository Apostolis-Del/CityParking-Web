<?php
$conni = mysqli_connect("localhost", "root", "", "polygoncoords");
//$resulti = mysqli_query($conni, "SELECT ST_AsGeoJSON(coordinates) AS paok,population FROM imp_kml");
$resulti = mysqli_query($conni, "SELECT population,seats,zitisi, centroid_40,centroid_20 FROM imp_kml");





if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data[] = array();
while ($row = mysqli_fetch_assoc($resulti))
{

	$data[]=$row;

   // $data[][0] = $row[0];
	//$data[][1] = $row[1];
}

echo json_encode($data);
exit();
