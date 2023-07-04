# HTML-form-data-to-sql-database-sql-php-
Collect Data From HTML form to SQL daabase using PHP &amp; SQL

# Contact Form Project

This project provides a simple contact form that allows users to submit their information and store it in a MySQL database. It serves as a starting point for integrating a contact form into a web application.

## Features

- User-friendly contact form
- Server-side form validation
- Storage of form submissions in a MySQL database
- Error and success message handling
- Easy customization and extension

## Technologies Used

- HTML
- CSS
- PHP
- MySQL

## Getting Started

To run this project locally on your machine, follow the steps below:

### Prerequisites

- Web server software such as Apache or Nginx.
- PHP installed on your local machine.
- MySQL database management system.


## Database Setup

Create a MySQL database and run the following SQL code to create the necessary table for the contact form:

```SQL
CREATE TABLE contactform (
  id INT AUTO_INCREMENT PRIMARY KEY,
  company VARCHAR(100),
  name VARCHAR(100) NOT NULL,
  institution VARCHAR(100),
  email VARCHAR(100) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


## Installation

1. Clone this repository to your local machine.
2. Import the `contact_form_db.sql` file into your MySQL database to create the necessary table.
3. Modify the database connection details in the `index.php` file to match your MySQL server configuration.
4. Upload the entire project to your web server.

## Usage

1. Access the form by visiting the URL where you uploaded the project
2. Fill out the contact form with your details and message.
3. Click the "Contact Us" button to submit the form.
4. If there are any validation errors, they will be displayed on the form.
5. If the form submission is successful, a success message will be displayed.
6. The form data will be stored in the MySQL database for future reference.

## Customization

- You can modify the form fields in the `index.php` file to match your specific requirements.
- Adjust the CSS styles in the `style.css` file to change the appearance of the contact form.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).



