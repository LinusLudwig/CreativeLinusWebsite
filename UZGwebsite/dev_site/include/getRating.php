<?php 
$url = "https://places.googleapis.com/v1/places/ChIJv5NFq7GOs0cRlz98l_7z40s?fields=rating,userRatingCount&key=AIzaSyC4iioI3U5yCtWUOiR5chWTqbGFzTPKS9A";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response);
header('Content-Type: application/json');
echo json_encode($data);
?>