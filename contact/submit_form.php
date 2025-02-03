<?php
// Database Configuration
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "xcoders_db";

// Create Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Form Data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert Data into Database
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Display Thank You Message
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Thank You - X Coders</title>
          <style>
            body {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              background-color:rgb(55, 19, 114);
              margin: 0;
              font-family: Arial, sans-serif;
            }
            .thank-you-container {
              text-align: center;
              background: white;
              padding: 30px;
              border-radius: 10px;
              box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
            .btn-home {
              background-color: #007BFF;
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              text-decoration: none;
              font-size: 16px;
            }
            .btn-home:hover {
              background-color: #0056b3;
            }
          </style>
        </head>
        <body>
          <div class='thank-you-container'>
            <h1>Thank You!</h1>
            <p>Your message has been sent successfully. We’ll get back to you soon.</p>
            <a href='../index.html' class='btn-home'>Go to Home</a>
          </div>
        </body>
        </html>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close Database Connection
$conn->close();
?>
