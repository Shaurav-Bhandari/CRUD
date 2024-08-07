# Vehicle Registration CRUD Application

This is a simple CRUD (Create, Read, Update, Delete) application for managing vehicle registrations. It allows users to register vehicles by providing their details such as first name, last name, password, gender, email, contact, and address. Users can also agree to terms and conditions before registering.

## Installation

### 1. Clone the Repository

Clone or download the repository to your local machine using Git:

```bash
git clone https://github.com/your-username/vehicle-registration-crud.git
```
### 2. Import Database
Before proceeding with this step, ensure that you have MySQL installed on your system and the MySQL command line tools are accessible.

Navigate to the directory where you have cloned or downloaded the repository containing the SQL file (database.sql).

Open a terminal or command prompt and run the following command to import the database structure into your MySQL database:
```bash
mysql -u username -p database_name < database.sql
```
Replace username with your MySQL username and database_name with the name of the database where you want to import the structure. You'll be prompted to enter your MySQL password.

Once the import is successful, the necessary tables for the vehicle registration application will be created in your database.

###3. Configure Database Connection
Now, you need to configure the database connection settings in the db.php file.

Navigate to the project directory and locate the db.php file. Open it in a text editor.

Modify the following variables in the db.php file to match your MySQL database configuration:
```bash
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicle_registration";
```
$servername: The hostname of your MySQL server. Typically, it's localhost if MySQL is running on the same machine.
$username: Your MySQL username.
$password: Your MySQL password. If you don't have a password, leave it as an empty string ("").
$dbname: The name of the MySQL database where you imported the database.sql structure.
Save the changes to the db.php file.

Now, your application is configured to connect to your MySQL database.

### 4. Check PHP Configuration
Ensure that PHP is configured correctly with the MySQLi extension enabled. Check your php.ini file and make sure that extension=mysqli is uncommented.

### 5. Start Web Server
Place the project files in your web server's document root directory (e.g., htdocs for XAMPP).

Start your web server (e.g., Apache) and navigate to the project URL in your web browser.

Your vehicle registration CRUD application should now be ready for use.

### Usage
Access the application in your web browser by navigating to its URL.

Use the registration form to register new vehicles.

View, update, or delete existing vehicle registrations from the list.

### License
This project is licensed under the MIT License.

Feel free to reach out if you have any questions or encounter any issues during the installation process.






