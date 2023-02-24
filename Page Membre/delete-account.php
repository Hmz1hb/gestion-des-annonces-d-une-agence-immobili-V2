<?php
    session_start();
    $user_id = $_SESSION['id'];

    // Create a PDO connection to the MySQL database
    $conn = new PDO("mysql:host=localhost;dbname=gestion-des-annonces-d-une-agence-immobili-re;port=3306;charset=UTF8", 'root', '');

    // Begin a transaction
    $conn->beginTransaction();

    try {
        // Delete rows from the announcement and image tables first
        $sql = "DELETE a, i
                FROM announcement a
                INNER JOIN image i ON a.Announcement_ID = i.Announcement_ID
                WHERE a.Membre_ID = :user_id";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the user ID parameter
        $stmt->bindParam(':user_id', $user_id);

        // Execute the query
        $stmt->execute();

        // Delete the row from the member table
        $sql = "DELETE FROM member WHERE Membre_ID = :user_id";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the user ID parameter
        $stmt->bindParam(':user_id', $user_id);

        // Execute the query
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        echo "Row deleted successfully.";
    } catch (PDOException $e) {
        // Roll back the transaction on error
        $conn->rollback();
        echo "Error deleting row: " . $e->getMessage();
    }
  
    header("Location:http://localhost/Page%20Membre/logout.php");
?>
