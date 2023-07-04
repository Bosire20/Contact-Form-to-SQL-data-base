

  <?php

      // Database connection details
      $servername = "localhost";
      $username = ""; // Add your database username here
      $password = ""; // Add your database password here
      $dbname = "contact_form_db"; // Replace with the name of your database

      // Establish a connection to the database
      $conn = mysqli_connect("localhost", "root", "", "contact_form_db");

      // Check if the connection was successful
      if ($conn === false) {
          die("ERROR: Could not connect to the database. " . mysqli_connect_error());
      }

      $success = 0; // Variable to track the success status of form submission

      // Check if the form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          // Retrieve the form data
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];

          // Basic form validation
          $errors = array();

          if (empty($name)) {
              $errors[] = "Name is required.";
                }
          if (empty($email)) {
              $errors[] = "Email is required.";
          }
          if (empty($phone)) {
              $errors[] = "Phone Number is required.";
          }
          if (empty($subject)) {
              $errors[] = "Subject is required.";
          }
          if (empty($message)) {
              $errors[] = "Message is required.";
          }

      // If there are no validation errors, proceed with inserting the data into the database
      if (count($errors) === 0) {

          // Escape special characters to prevent SQL injection
          $name = mysqli_real_escape_string($conn, $name);
          $email = mysqli_real_escape_string($conn, $email);
          $phone = mysqli_real_escape_string($conn, $phone);
          $subject = mysqli_real_escape_string($conn, $subject);
          $message = mysqli_real_escape_string($conn, $message);

      // SQL query to insert the form data into the database table
      $sql = "INSERT INTO contactform (name, email, phone, subject, message) VALUES ('$name', '$email','$phone','$subject','$message')";

        // Execute the SQL query and check if it was successful
        if (mysqli_query($conn, $sql)) {
            $success = 1; // Set the success status to 1
            $name = $email = $phone = $subject = $message = ''; // Clear the form fields after successful submission
        } else {
            echo "ERROR: Query execution failed! $sql. " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);

?>

<!-- START OF FORM -->
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Send Contact Form data from html to sql database" />

    <!-- Stylesheet -->
    <link href="style.css" rel="stylesheet" />
    <link href="flaticon-set.css" rel="stylesheet" />

</head>

<body>

    <div class="contact-area default-padding">

        <div class="container">
            <div class="row align-center">
                <div class="col-tact-stye-one col-lg-7 mb-md-50">
                    <div class="contact-form-style-one">

                        <h5 class="sub-title">Sample Contact Form</h5>

                        <h2 class="heading">Please Fill out the form</h2>

                        <!-- Display errors if any -->
                        <?php if (isset($errors) && count($errors) > 0): ?>

                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <?php elseif ($success === 1): ?>


                        <!-- Display success message if form submission was successful -->

                        <div id="successAlert" class="alert alert-success" role="alert">
                            Success! Message Received!
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var successAlert = document.getElementById("successAlert");
                                successAlert.style.display = "block";
                                setTimeout(function() {
                                    successAlert.style.display = "none";
                                }, 3000);
                            });
                        </script>

                        <?php endif; ?>

                        <!-- Contact form -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">

                            <!-- name field -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Your of name" type="text" autocomplete="off" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" />
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact person's name field -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Your Email" type="text" autocomplete="off" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" />
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Institution field -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" type="text" placeholder="Your Phone Number" autocomplete="off" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" />
                                        <span class="alert-error"></span>
                                    </div>
                                </div>

                                <!-- Email field -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="subject" name="subject" placeholder="Subject" type="text" autocomplete="off" value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>" />
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Message field -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="message" name="message" placeholder="Leave Us a Note"><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        <i class="fa fa-paper-plane" style="color: green;"></i> Contact Us
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


        </body>


        </html>