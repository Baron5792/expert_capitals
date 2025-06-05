<?php
header('Content-Type: application/json');

$apiUrl = 'https://randomuser.me/api/?inc=name&nat=us&results=1';
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data && isset($data['results'][0]['name'])) {
    $name = $data['results'][0]['name'];
    $fullName = $name['first'] . ' ' . $name['last'];
    echo json_encode(['name' => $fullName]);
} else {
    echo json_encode(['name' => 'Unknown User']);
}
?>