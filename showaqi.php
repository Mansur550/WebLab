<?php
// save_selection.php
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedIds = $_POST['selected_ids'] ?? [];

if (count($selectedIds) < 10) {
    die("You must select at least 10 rows.");
}

$placeholders = implode(',', array_fill(0, count($selectedIds), '?'));
$sql = "SELECT * FROM cities WHERE id IN ($placeholders)";
$stmt = $conn->prepare($sql);

$stmt->bind_param(str_repeat('i', count($selectedIds)), ...$selectedIds);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Selected Cities</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Selected City Data</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>City</th>
            <th>Country</th>
            <th>Air Pollution Index</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td><?= htmlspecialchars($row['country']) ?></td>
            <td><?= htmlspecialchars($row['api']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
