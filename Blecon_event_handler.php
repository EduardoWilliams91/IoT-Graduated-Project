

Skip to content
Using Sonoma State University Mail with screen readers

Conversations
 
Program Policies
Powered by Google
Last account activity: 2 hours ago
Details
<?php
// Database credentials
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON payload from the POST request
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data) {
    // Extract the relevant fields from the JSON payload
    $timestamp = $conn->real_escape_string($data[0]['time']);
    $device_id = $conn->real_escape_string($data[0]['data']['device_id']);
    $location = $conn->real_escape_string($data[0]['data']['location']);

    // Insert the data into the database
    $sql = "INSERT INTO blecon_events (timestamp, device_id, location)
            VALUES ('$timestamp', '$device_id', '$location')
            ON DUPLICATE KEY UPDATE device_id='$device_id', location='$location'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
}

$conn->close();
?>
Blecon_event_handler.php.txt
Displaying Blecon_event_handler.php.txt.
