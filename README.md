# Feedback System

## Introduction

This is a PHP-based Feedback System that allows users to submit and manage feedback. The project requires setting up a local XAMPP server, creating a database, and running the necessary SQL script to generate tables and dummy data.

## Prerequisites

Before running this project, ensure you have the following installed on your system:

- [XAMPP](https://www.apachefriends.org/index.html) (Apache, MySQL, PHP, and phpMyAdmin)
- A web browser (Google Chrome, Mozilla Firefox, etc.)

## Installation and Setup

Follow these steps to set up and run the project:

### 1. Start the XAMPP Server

1. Open XAMPP Control Panel.
2. Start the **Apache** and **MySQL** modules.

### 2. Create the Database

1. Open your web browser and go to **phpMyAdmin** by navigating to:
   ```
   http://localhost/phpmyadmin/
   ```
2. Click on the **SQL** tab.
3. Run the `feedback.sql` file:
   - Click on "Import" and select the `feedback.sql` file.
   - Click "Go" to execute the SQL script.
   - This will create the database and populate it with dummy data.

### 3. Run the Project

1. Copy the project folder (named `feedback`) to the `htdocs` directory of your XAMPP installation.
   - Typically found at: `C:\xampp\htdocs\`
2. Open your browser and visit:
   ```
   http://localhost/feedback-project/html/Login.php
   ```

## Features

- Users can submit feedback.
- Admins can manage feedback entries.
- Displays feedback entries in a structured format.

## Troubleshooting

- If you encounter database errors, ensure that MySQL is running and that the `feedback.sql` file has been executed successfully.
- If Apache does not start, check if another application is using port **80** (e.g., Skype) and change Apache’s port settings if necessary.
- If changes are not reflected, try clearing your browser cache or restarting the XAMPP server.

## License

This project is open-source and free to use.
