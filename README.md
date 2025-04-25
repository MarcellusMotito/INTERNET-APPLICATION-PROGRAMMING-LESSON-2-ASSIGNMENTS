# DynamicWeb Application - Running Instructions

This project is a web application built with PHP, HTML, CSS, and JavaScript. It uses MySQL for the database and implements session management with cookies, secure user data handling, and protection against SQL injection.

## Prerequisites

- XAMPP installed on your system (includes Apache and MySQL)
- Basic knowledge of using XAMPP and phpMyAdmin

## Setup Instructions

1. **Place the Project Folder**

   Ensure the entire project folder `(2) LESSON 2 ASSIGNMENTS` is located inside the `htdocs` directory of your XAMPP installation.  
   Example path on Windows:  
   `C:\xampp\htdocs\(2) LESSON 2 ASSIGNMENTS`

2. **Start XAMPP Services**

   Open the XAMPP Control Panel and start the following services:  
   - Apache  
   - MySQL

3. **Create the Database**

   - Open your browser and go to `http://localhost/phpmyadmin`
   - Click on the "SQL" tab
   - Open the `sql.txt` file located in the project folder `(2) LESSON 2 ASSIGNMENTS`
   - Copy the contents of `sql.txt` and paste it into the SQL query box in phpMyAdmin
   - Execute the query to create the database `dynamicweb_db` and the required tables (`users` and `submissions`)

4. **Configure Database Connection**

   The database connection settings are already configured in `db.php` with the following defaults:  
   - Host: `localhost`  
   - Database: `dynamicweb_db`  
   - User: `root`  
   - Password: (empty)  

   If your MySQL credentials differ, update `db.php` accordingly.

5. **Access the Application**

   Open your browser and navigate to:  
   `http://localhost/(2)%20LESSON%202%20ASSIGNMENTS/index.php`  
   (URL encoding for spaces is `%20`)

6. **Using the Application**

   - Use the **Sign Up** form to create a new user account.
   - Use the **Login** form to log in with your credentials.
   - After logging in, you can submit your profile information.
   - Use the **Logout** button to end your session.

## Security Features

- Session management is implemented using PHP sessions and cookies.
- User passwords are securely hashed before storage.
- SQL injection is prevented using prepared statements in the PHP backend.

## Notes

- Ensure that the XAMPP Apache and MySQL services are running whenever you want to use the application.
- If you change the project folder name or location, update the URL accordingly.
- For any issues, check the Apache and MySQL logs in the XAMPP Control Panel.

---

This README provides all necessary steps to run and use the DynamicWeb application on your local machine using XAMPP.
