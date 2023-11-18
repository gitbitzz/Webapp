<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $author_id = $_POST['author_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $biography = $_POST['biography'];
    $status = $_POST['status'];

    $hostname = "localhost"; // Replace with your hostname
    $username = "root";      // Replace with your username
    $password = "";          // Replace with your password
    $dbname = "authordb";    // Replace with your database name

    try {
        // Establish the database connection
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query using placeholders
        $stmt = $pdo->prepare("INSERT INTO authorstb (author_id, fullname, email, address, dob, biography, status) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(1, $author_id);
        $stmt->bindParam(2, $fullname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $dob);
        $stmt->bindParam(6, $biography);
        $stmt->bindParam(7, $status);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Successfully Added!";
        } else {
            echo "Error: Failed to insert data.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
