<?php

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require 'phpmailer/src/Exception.php';
    // require 'pfpmailer/src/PHPMailer.php';
    // require 'phpmailer/src/SMTP.php';

    // if(isset($_POST["send"])){
    //     $mail = new PHPMailer(true);

    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'manishibansal4@gmail.com';//your gmail id
    //     $mail->Password = 'bipbejbvmbjccllg';//your gmail app password
    //     $mail->SMTPSecure='ssl';
    //     $mail->Port=465;

    //     $mail->setFrom('manishibansal4@gmail.com');//your gmail

    //     $mail->addAddress($_POST["email"]);

    //     $mail->isHTML(true);

    //     $mail->Subject = $_POST["subject"];
    //     $mail->Body = $_POST["message"];

    //     $mail->send();

    //     echo
    //     "
    //     <script>
    //     alert('sent successfully');
    //     document.location.href = '1.php';
    //     </script>
    //     ";
    // }

    $YourName = $_POST['YourName'];
    $YourPhone = $_POST['YourPhone'];
    $YourMessage = $_POST['YourMessage'];
    $YourWebsite = $_POST['YourWebsite'];
    $YourEmail = $_POST['YourEmail'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if($conn-> connect_error){
        die('connection Failed :' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(YourName, YourPhone, YourMessage, YourWebsite, YourEmail)
        value(?,?,?,?,?)");
        $stmt->bind_param("sisss",$YourName, $YourPhone, $YourMessage, $YourWebsite, $YourEmail);
        $stmt->execute();
        echo "Message Sent Successfully...";
        // header("location: http://localhost/portfolio/AnimaPackage-Html-bmRqA/index.php");
        $stmt->close();
        $conn->close();
    }
    // Send email (replace 'your-email@example.com' with your actual email address)
    $to = 'manishibansal4@gmail.com';
    $subject = 'New Contact Form Submission';
    $message_body = "Name: $YourName\nPhone: $YourPhone\nMessage: $YourMessage\nWebsite: $YourWebsite\n\nEmail:\n$YourMessage";

    mail($to, $subject, $message_body);

    echo "<h2>Thank you for your submission!</h2>";
?>