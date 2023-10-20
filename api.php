<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "annonces_immobiliere";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//   $data = json_decode(file_get_contents("php://input"), true);

//   // Assurez-vous de valider et de nettoyer les données avant de les insérer dans la base de données

//   $surface_m2 = $conn->real_escape_string($data['surface_m2']);
//   $prix_total = $conn->real_escape_string($data['prix_total']);
//   $latitude = $conn->real_escape_string($data['latitude']);
//   $longitude = $conn->real_escape_string($data['longitude']);
//   $photos = $conn->real_escape_string($data['photos']);
//   $code_postal = $conn->real_escape_string($data['code_postal']);
//   $ville = $conn->real_escape_string($data['ville']);
//   $description = $conn->real_escape_string($data['description']);
//   $type = $conn->real_escape_string($data['type']);
//   $typeName = $conn->real_escape_string($data['typeName']);

//   $sql = "INSERT INTO annonces (surface_m2, prix_total, latitude, longitude, photos, code_postal, ville, description, type, typeName)
//           VALUES ('$surface_m2', '$prix_total', '$latitude', '$longitude', '$photos', '$code_postal', '$ville', '$description', '$type', '$typeName')";

//   if ($conn->query($sql) === TRUE) {
//       echo json_encode(array("message" => "New record created successfully"));
//   } else {
//       echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
//   }
// }

// if ($_SERVER["REQUEST_METHOD"] === "PUT") {
//   $data = json_decode(file_get_contents("php://input"), true);

//   // Assurez-vous de valider et de nettoyer les données avant de les mettre à jour dans la base de données

//   $id = $data['id'];
//   $surface_m2 = $conn->real_escape_string($data['surface_m2']);
//   $prix_total = $conn->real_escape_string($data['prix_total']);
//   $latitude = $conn->real_escape_string($data['latitude']);
//   $longitude = $conn->real_escape_string($data['longitude']);
//   $photos = $conn->real_escape_string($data['photos']);
//   $code_postal = $conn->real_escape_string($data['code_postal']);
//   $ville = $conn->real_escape_string($data['ville']);
//   $description = $conn->real_escape_string($data['description']);
//   $type = $conn->real_escape_string($data['type']);
//   $typeName = $conn->real_escape_string($data['typeName']);

//   $sql = "UPDATE annonces SET 
//               surface_m2='$surface_m2',
//               prix_total='$prix_total',
//               latitude='$latitude',
//               longitude='$longitude',
//               photos='$photos',
//               code_postal='$code_postal',
//               ville='$ville',
//               description='$description',
//               type='$type',
//               typeName='$typeName' 
//           WHERE id='$id'";

//   if ($conn->query($sql) === TRUE) {
//       echo json_encode(array("message" => "Record updated successfully"));
//   } else {
//       echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
//   }
// }

// if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
//   $data = json_decode(file_get_contents("php://input"), true);

//   $id = $data['id'];

//   $sql = "DELETE FROM annonces WHERE id='$id'";

//   if ($conn->query($sql) === TRUE) {
//       echo json_encode(array("message" => "Record deleted successfully"));
//   } else {
//       echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
//   }
// }

$sql = "SELECT * FROM annonces";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $data = array();
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);
} else {
  echo "0 results";
}

$conn->close();
?>