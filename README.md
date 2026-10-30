
# DentalCare Appointment Booking System

## 1. Project Description

The DentalCare Appointment Booking System is a web-based application designed to make dental appointment scheduling simple and convenient for patients.

The application allows patients to book dental appointments online by providing their personal information, selecting a dental service and choosing their preferred appointment date and time.

After successfully submitting an appointment, the system generates a unique appointment number and displays a confirmation page containing the appointment details.

The system also includes form validation to ensure that patients enter valid information and select a future appointment date and time.

## 2. Application Features

The application includes the following features:

- **Homepage:** Provides an introduction to DentalCare and navigation to the appointment booking page.
- **Appointment Booking:** Allows patients to schedule dental appointments online.
- **Patient Information:** Collects the patient's full name, email address and phone number.
- **Dental Service Selection:** Allows patients to select from eight different dental services.
- **Date and Time Selection:** Allows patients to choose their preferred appointment date and time.
- **Form Validation:** Validates patient information and appointment details using PHP.
- **Duplicate Booking Prevention:** Prevents multiple appointments from being booked for the same date and time slot.
- **Unique Appointment Number:** Automatically generates a unique appointment reference number for each successful booking.
- **Appointment Confirmation:** Displays the submitted appointment details after successful booking.
- **Session Management:** Uses PHP sessions to temporarily store appointment records and validation messages.

## 3. Available Dental Services

The system provides the following dental services:

| Service Code | Service Name |
|---|---|
| DC | Dental Checkup |
| TC | Teeth Cleaning |
| RCT | Root Canal Treatment |
| TE | Tooth Extraction |
| TW | Teeth Whitening |
| TF | Tooth Filling |
| BC | Braces Consultation |
| EDC | Emergency Dental Consultation |

## 4. Technologies Used

The application was developed using the following technologies:

- **HTML5:** Used to structure the web pages.
- **CSS3:** Used to style the application.
- **Bootstrap 5:** Used to create a responsive layout and user interface.
- **Bootstrap Icons:** Used to provide icons where required.
- **JavaScript:** Used to handle interactive functionality including the date and time picker.
- **PHP:** Used for server-side processing, form validation and appointment management.
- **Google Fonts:** Used to improve the typography and appearance of the application.

## 5. Project Directory Structure

The project contains the following files and folders:

```text
DentalCare/
│
├── index.php
├── Appointment.php
├── Confirmation.php
│
├── css/
│   └── styles.css
│
├── js/
│   └── scripts.js
│
├── addons/
│   ├── bootstrap-icons.css
│   ├── bootstrap.bundle.min.js
│   └── sb-forms-0.4.1.js
│
└── README.md
```

## 6. Instructions for Running the Application Locally

Follow the steps below to run the DentalCare Appointment Booking System on a local computer.

### Step 1: Install XAMPP

Download and install XAMPP from the official website:

https://www.apachefriends.org/

XAMPP provides the Apache web server and PHP required to run the application.

### Step 2: Clone or Download the Project

Clone the GitHub repository using the following command:

```bash
git clone https://github.com/your-username/your-repository-name.git
```

Alternatively, download the project as a ZIP file from GitHub and extract it.

### Step 3: Move the Project into the htdocs Folder

Copy the DentalCare project folder into the XAMPP `htdocs` directory.

For example:

```text
C:\xampp\htdocs\DentalCare
```

### Step 4: Start the Apache Server

1. Open the XAMPP Control Panel.
2. Locate Apache.
3. Click the Start button.
4. Ensure that Apache is running successfully.

### Step 5: Open the Application

Open a web browser and enter the following URL:

```text
http://localhost/DentalCare/
```

The DentalCare homepage should now be displayed.

### Step 6: Book an Appointment

1. Click the **Book an Appointment** button on the homepage.
2. Enter your full name.
3. Enter your email address.
4. Enter your phone number.
5. Select a dental service.
6. Choose a future appointment date and time.
7. Click the **Book** button.
8. If all information is valid and the selected time slot is available, the system will successfully submit the appointment.
9. The confirmation page will display the appointment number and booking details.

If any validation errors occur, the system will redirect the patient back to the appointment page and display an appropriate error message.

## 7. Validation and Error Handling

The application performs server-side validation using PHP to ensure that:

- The full name is not empty.
- The email address is in a valid format.
- The phone number contains exactly seven digits.
- A valid dental service is selected.
- An appointment date and time are provided.
- The selected appointment date and time are in the future.
- The selected appointment time slot has not already been booked.

Previously entered information is retained when validation errors occur using PHP sessions.

## 8. Data Storage

The application currently uses PHP sessions to temporarily store appointment records and error messages.

Appointment information is not permanently stored in a database. The records may be lost when the PHP session expires or is cleared.

## 9. Author

**Aklesh Prasad**

## 10. Purpose of the Project

This project was developed for educational purposes as part of my postgraduate unit at the University of Fiji to demonstrate the use of HTML, CSS, Bootstrap, JavaScript and PHP in developing a web-based appointment booking application.