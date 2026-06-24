<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
require_once '../config.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $res = $conn->query("SELECT * FROM people WHERE id=$id");
            echo json_encode($res->fetch_assoc());
        } else {
            $res = $conn->query("SELECT * FROM people ORDER BY name");
            $rows = [];
            while ($r = $res->fetch_assoc()) $rows[] = $r;
            echo json_encode($rows);
        }
        break;
    case 'POST':
        $name = $conn->real_escape_string($input['name']);
        $address = $conn->real_escape_string($input['address'] ?? '');
        $mobile = $conn->real_escape_string($input['mobile'] ?? '');
        $conn->query("INSERT INTO people (name, address, mobile) VALUES ('$name','$address','$mobile')");
        echo json_encode(['success' => true, 'id' => $conn->insert_id]);
        break;
    case 'PUT':
        $id = intval($input['id']);
        $name = $conn->real_escape_string($input['name']);
        $address = $conn->real_escape_string($input['address'] ?? '');
        $mobile = $conn->real_escape_string($input['mobile'] ?? '');
        $conn->query("UPDATE people SET name='$name', address='$address', mobile='$mobile' WHERE id=$id");
        echo json_encode(['success' => true]);
        break;
    case 'DELETE':
        $id = intval($_GET['id']);
        $conn->query("DELETE FROM people WHERE id=$id");
        echo json_encode(['success' => true]);
        break;
}
?>