<?php
if (isset($_POST['id'])) {
    $record_id = $_POST['id'];

    // Connect to database
    $conn = new mysqli('localhost', 'root', '', 'gestion-des-annonces-d-une-agence-immobili-re');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete corresponding rows from image table
    $sql = "DELETE FROM image WHERE Announcement_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $record_id);
    $stmt->execute();
    $stmt->close();

    // Delete row from annonce table
    $sql = "DELETE FROM announcement WHERE Announcement_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $record_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to main page
    header("Location:http://localhost/Page%20Membre/Member-Listings.php");

    $conn->close();
}


?>