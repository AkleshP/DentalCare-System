
<?php
session_start();


$error = $_SESSION["appointment_error"] ?? "";


$old = $_SESSION["old_Records"] ?? [];

unset(
    $_SESSION["appointment_error"],
    $_SESSION["old_Records"]
);


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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="DentalCare appointment booking">
    <meta name="author" content="Aklesh Prasad">

    <title>DentalCare Appointment Booking System</title>

    <!-- Bootstrap Icons -->
    <link href="addons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <!-- Main Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">

    <style>
    
        #mainNav,
        #mainNav.navbar-shrink {
            background-color: #ffffff !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

       
        #mainNav .navbar-brand,
        #mainNav.navbar-shrink .navbar-brand {
            color: #212529 !important;
        }

  
        #mainNav .navbar-nav .nav-item .nav-link,
        #mainNav.navbar-shrink .navbar-nav .nav-item .nav-link {
            color: #212529 !important;
        }

     
        #mainNav .navbar-nav .nav-item .nav-link:hover,
        #mainNav .navbar-nav .nav-item .nav-link:active,
        #mainNav .navbar-nav .nav-item .nav-link.active {
            color: #f4623a !important;
        }

        /* JavaScript and PHP error messages Not used*/
        .error {
            text-align: center;
            color: red;
            margin-bottom: 1rem;
        }

        .success {
            color: green;
        }

  
        .server-error {
            padding: 12px 15px;
            margin-bottom: 1.5rem;
            border: 1px solid #f5c2c7;
            border-radius: 5px;
            background-color: #f8d7da;
            color: #842029;
        }
    </style>
</head>

<body id="page-top">

    <!-- Appointment Form -->

    <form id="appointmentBooking" action="Confirmation.php" method="POST">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">DentalCare</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" id="navHome" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="navAppointment" href="#appointment">Appointment</a></li>

                    </ul>
                </div>
            </div>
        </nav>


        <!-- Appointment Section -->
        <section class="page-section" id="appointment">
            <div class="container px-4 px-lg-5">
                 <div class="row gx-4 gx-lg-5 justify-content-center">
                     <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">
                            Schedule Your Visit Today!
                        </h2>
                        <hr class="divider">
                        <p class="text-muted mb-5">
                            Ready to book your dental appointment? Complete the form below and we will receive your appointment details.
                        </p>
                    </div>
                </div>

                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- Name  -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder=" " value="<?= escape($old["name"] ?? "") ?>"/>
                            <label for="name">Full name</label>
                        </div>
                        <!-- Email  -->
                        <div class="form-floating mb-3">
                            <input class="form-control"type="text"id="email"name="email"placeholder=" "value="<?= escape($old["email"] ?? "") ?>"/>
                            <label for="email">Email address</label>
                         </div>
                        <!-- Phone  -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder=" " value="<?= escape($old["phone"] ?? "") ?>"/>
                            <label for="phone">Phone number</label>
                        </div>
                        <!-- Service Selection -->
                        <div class="form-floating mb-3">
                            <select class="form-control" id="service" name="service" >
                                <option value="" <?= (($old["service"] ?? "") === "")? "selected" : "" ?>>Select Service</option>
                                <option value="DC" <?= (($old["service"] ?? "") === "DC")? "selected" : "" ?>>Dental Checkup</option>
                                <option value="TC"<?= (($old["service"] ?? "") === "TC")? "selected" : "" ?>>Teeth Cleaning</option>
                                <option value="RCT"<?= (($old["service"] ?? "") === "RCT")? "selected" : "" ?>>Root Canal Treatment</option>
                                <option value="TE"<?= (($old["service"] ?? "") === "TE")? "selected" : "" ?>>Tooth Extraction</option>
                                <option value="TW"<?= (($old["service"] ?? "") === "TW")? "selected" : "" ?>>Teeth Whitening</option>
                                <option value="TF"<?= (($old["service"] ?? "") === "TF")? "selected" : "" ?>>Tooth Filling</option>
                                <option value="BC"<?= (($old["service"] ?? "") === "BC")? "selected" : "" ?>>Braces Consultation</option>
                                <option value="EDC"<?= (($old["service"] ?? "") === "EDC")? "selected" : "" ?>>Emergency Dental Consultation</option>
                            </select>
                            <label for="service">Service</label>
                        </div>
                        <!-- Appointment Date and Time -->
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" id="date" name="date" autocomplete="off" placeholder=" " value="<?= escape($old["date"] ?? "") ?>"/>
                            <label for="date">Date and Time</label>
                        </div>

                        <!-- JavaScript Error Message -->
                       <!--  <div class="d-none"
                             id="submitErrorMessage"
                             role="alert"
                             aria-live="polite">
                        </div>-->

                          <!-- PHP Server-side Error Message -->
                        <?php if ($error !== ""): ?>

                            <div class="server-error" id="message" role="alert">
                                <strong>Unable to book appointment.</strong>
                                <p class="mb-0">
                                    <?= escape($error) ?>
                                </p>
                            </div>

                        <?php endif; ?>

                        <!-- Book Button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Book</button>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </form>


    <!-- Scripts -->
    <script src="addons/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="addons/sb-forms-0.4.1.js"></script>

    <script>
        // Open the date and time picker when clicked
        const dateTimeInput = document.getElementById("date");

        dateTimeInput.addEventListener("click", function () {
            if (typeof this.showPicker === "function") {
                this.showPicker();
            }
        });


        //const appointmentForm = document.getElementById("appointmentBooking");
        //const errorMessage = document.getElementById("submitErrorMessage");

        //appointmentForm.addEventListener("submit", function (event) {
        //    const fullName = document.getElementById("name").value.trim();
        //    const email = document.getElementById("email").value.trim();

        //    const phone = document.getElementById("phone").value.trim();
        //    const service = document.getElementById("service").value;
        //    const appointmentDate = document.getElementById("date").value;

        //    let error = "";

        //    if (fullName === "") {
        //        error = "Please enter your full name.";
        //    }
        //    //else if (email === "" || !email.includes("@") || !email.includes(".")) {
        //    //    error = "Please enter a valid email address.";
        //    //} 
        //    else if (email === "" ||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        //        error = "Please enter a valid email address.";
        //    }
            
        //    else if (!/^\d{7}$/.test(phone)) {
        //        error = "Please enter a valid 7-digit contact number.";
        //    } else if (service === "") {
        //        error = "Please select a service.";
        //    } else if (appointmentDate === "") {
        //        error = "Please select an appointment date and time.";
        //    } else if (new Date(appointmentDate) <= new Date()) {
        //        error = "Please select a future appointment date and time.";
        //    }

        //    if (error !== "") {
        //        event.preventDefault();
        //        errorMessage.textContent = error;
        //        errorMessage.classList.remove("d-none");
        //        errorMessage.className = "error";
        //        return;
        //    }

        //    errorMessage.textContent = "";
        //    errorMessage.classList.add("d-none");
        //});

    </script>

</body>
</html>
