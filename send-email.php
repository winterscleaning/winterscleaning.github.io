<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $space_description = htmlspecialchars($_POST['space_description']);

    // Email details
    $to = "winterscleaningmi@gmail.com"; // Your email address
    $subject = "New Cleaning Request from $name";

    // Email content
    $message = "
    <html>
    <head>
        <title>New Cleaning Request</title>
    </head>
    <body>
        <p>You have received a new cleaning request from:</p>
        <table>
            <tr>
                <th>Name:</th>
                <td>$name</td>
            </tr>
            <tr>
                <th>Company:</th>
                <td>$company</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>$phone</td>
            </tr>
            <tr>
                <th>Space Description:</th>
                <td>$space_description</td>
            </tr>
        </table>
    </body>
    </html>
    ";

    // Headers for email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourdomain.com" . "\r\n";  // Set a "From" email (can be your email)

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to the thank-you page after successful email
        header("Location: thank-you.html");
        exit();
    } else {
        echo "There was an error sending your request. Please try again.";
    }
}
?>
