<?php
session_start();

date_default_timezone_set('Pacific/Fiji');


$error = "";
$appointment = null;


if (!isset($_SESSION["appointments"])) { 
    $_SESSION["appointments"] = [];
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: Appointment.php");
    exit;
}


$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$service = $_POST["service"] ?? "";
$date = trim($_POST["date"] ?? "");


$services = [
    "DC"  => "Dental Checkup",
    "TC"  => "Teeth Cleaning",
    "RCT" => "Root Canal Treatment",
    "TE"  => "Tooth Extraction",
    "TW"  => "Teeth Whitening",
    "TF"  => "Tooth Filling",
    "BC"  => "Braces Consultation",
    "EDC" => "Emergency Dental Consultation"
];


if ($name === "") {
    $error = "Please enter your full name.";

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email address.";

} elseif (!preg_match('/^\d{7}$/', $phone)) {
    $error = "Please enter a valid 7-digit phone number.";

} elseif (!isset($services[$service])) {
    $error = "Please select a valid dental service.";

} elseif ($date === "") {
    $error = "Please select an appointment date and time.";

} else {
    
    $dateObject = DateTime::createFromFormat(
        '!Y-m-d\TH:i',
        $date
    );

    $dateErrors = DateTime::getLastErrors();

    if (
        !$dateObject ||
        ($dateErrors !== false &&
            ($dateErrors["warning_count"] > 0 ||
             $dateErrors["error_count"] > 0)) ||
        $dateObject->format('Y-m-d\TH:i') !== $date
    ) {
        $error = "Please enter a valid appointment date and time.";

    } elseif ($dateObject <= new DateTime()) {
        $error = "Please select a future appointment date and time.";

    } else {
        
        $slot = $dateObject->format('Y-m-d\TH:i');

        
        if (isset($_SESSION["appointments"][$slot])) {
            $error = "Sorry, this appointment time is already booked. Please select another time.";

        } else {


        
            $appointmentID = "DC-" .strtoupper(bin2hex(random_bytes(3)));

           
            $appointment = [
                "appointment_id" => $appointmentID,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "service" => $services[$service],
                "date" => $slot
            ];

            
            $_SESSION["appointments"][$slot] = $appointment;
        }
    }
}


if ($error !== "") {
    $_SESSION["appointment_error"] = $error;

    
    $_SESSION["old_Records"] = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "service" => $service,
        "date" => $date
    ];

    header("Location: Appointment.php");
    exit;
}


function escape($value) {
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Confirmation - DentalCare</title>
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
<form>
    <section class="page-section">
        <div class="container px-4 px-lg-5">

            <div class="text-center">

                <h2 class="text-success">
                    Appointment Submitted Successfully!
                </h2>

                <p>
                    Thank you, <?= escape($appointment["name"]) ?>.
                    Your appointment details have been received.
                </p>

                <hr class="divider">

                <h3>Appointment Details</h3>
                <p>
                    <strong>Appointment No:</strong>
                    <?= escape($appointment["appointment_id"]) ?>
                </p>

                <p>
                    <strong>Full Name:</strong>
                    <?= escape($appointment["name"]) ?>
                </p>

                <p>
                    <strong>Email:</strong>
                    <?= escape($appointment["email"]) ?>
                </p>

                <p>
                    <strong>Phone:</strong>
                    <?= escape($appointment["phone"]) ?>
                </p>

                <p>
                    <strong>Service:</strong>
                    <?= escape($appointment["service"]) ?>
                </p>

                <p>
                <p>
                    <strong>Date and Time:</strong>
                    <?= escape(DateTime::createFromFormat('!Y-m-d\TH:i',$appointment["date"])->format('d/m/Y g:i a')) ?>
                </p>

                </p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a class="btn btn-primary btn-xl" id="btnHome" href="index.php">Back to Home</a>

                    <a class="btn btn-secondary btn-xl" id="btnAppointment" href="Appointment.php">Book Another Appointment</a>
                </div>

            </div>

        </div>
    </section>
</form>
</body>
</html>
