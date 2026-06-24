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
            $inv = $conn->query("SELECT i.*, p.name as person_name, p.address, p.mobile 
                FROM invoices i LEFT JOIN people p ON i.person_id=p.id WHERE i.id=$id")->fetch_assoc();
            $items_res = $conn->query("SELECT ii.*, it.name as item_name_ref FROM invoice_items ii 
                LEFT JOIN items it ON ii.item_id=it.id WHERE ii.invoice_id=$id");
            $inv['items'] = [];
            while ($r = $items_res->fetch_assoc()) $inv['items'][] = $r;
            echo json_encode($inv);
        } else {
            $res = $conn->query("SELECT i.*, p.name as person_name FROM invoices i 
                LEFT JOIN people p ON i.person_id=p.id ORDER BY i.created_at DESC");
            $rows = [];
            while ($r = $res->fetch_assoc()) $rows[] = $r;
            echo json_encode($rows);
        }
        break;

    case 'POST':
        $person_id = intval($input['person_id']);
        $date = $conn->real_escape_string($input['invoice_date']);
        $subtotal = floatval($input['subtotal']);
        $prev = floatval($input['previous_balance']);
        $total = floatval($input['total_due']);
        $driver = $conn->real_escape_string($input['driver_name'] ?? '');
        $vehicle = $conn->real_escape_string($input['vehicle_number'] ?? '');
        $dmobile = $conn->real_escape_string($input['driver_mobile'] ?? '');

        $conn->query("INSERT INTO invoices (person_id, invoice_date, subtotal, previous_balance, total_due, driver_name, vehicle_number, driver_mobile) 
            VALUES ($person_id, '$date', $subtotal, $prev, $total, '$driver', '$vehicle', '$dmobile')");
        $inv_id = $conn->insert_id;

        foreach ($input['items'] as $item) {
            $iid = intval($item['item_id'] ?? 0);
            $iname = $conn->real_escape_string($item['item_name']);
            $qty = floatval($item['quantity']);
            $rate = floatval($item['rate']);
            $itotal = floatval($item['total']);
            $conn->query("INSERT INTO invoice_items (invoice_id, item_id, item_name, quantity, rate, total) 
                VALUES ($inv_id, " . ($iid ?: 'NULL') . ", '$iname', $qty, $rate, $itotal)");
        }
        echo json_encode(['success' => true, 'id' => $inv_id]);
        break;

    case 'DELETE':
        $id = intval($_GET['id']);
        $conn->query("DELETE FROM invoices WHERE id=$id");
        echo json_encode(['success' => true]);
        break;
}
?>
