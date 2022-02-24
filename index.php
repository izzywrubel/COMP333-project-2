<!--
  COMP 333: Software Engineering
  Sebastian Zimmeck (szimmeck@wesleyan.edu)

  PHP sample script for querying a database with SQL. This script can be run
  from inside the htdocs directory in XAMPP. The script assumes that there is a
  database set up (e.g., via phpMyAdmin) named COMP333_SQL_Tutorial with a
  student_grades table per the sql_tutorial.md.
-->

<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- This is the default encoding type for the Html Form post submission.
  Encoding type tells the browser how the form data should be encoded before
  sending the form data to the server.
  https://www.logicbig.com/quick-info/http/application_x-www-form-urlencoded.html-->
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
  <link rel="stylesheet" href="style.css">
  <title>Music Database Submission Form</title>
</head>

<body>
  <!--
    PHP code for retrieving data from the database.
  -->
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "music-db";
    error_reporting(0);

    // Create server connection.
    // The MySQLi Extension (MySQL Improved) is a relational database driver
    // used in the PHP scripting language to provide an interface with MySQL
    // databases (https://en.wikipedia.org/wiki/MySQLi).
    // Instances of classes are created using `new`.
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check server connection.
    // -> is used to call a method or access a property the instance of a class,
    // in our case the connection conn we created calls the built in connect_error
    // method available to all connections.
    // Note the difference to =>, which is used for arrow functions, a more
    // concise syntax for anonymous functions (which we will also see in JavaScript).
    // See https://stackoverflow.com/questions/14037290/what-does-this-mean-in-php-or/14037320.
    if ($conn->connect_error) {
      // Exit with the error message.
      // . is used to concatenate strings.
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])){
      $out_value_register = "";
      $new_username = $_POST['username'];
      $new_password = $_POST['password'];

      if(!empty($new_username) && !empty($new_password)){
        // If so, prepare SQL query with the data.
        $sql_query = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
        $user_exists = mysqli_query($conn, "SELECT * FROM users WHERE username = ('$new_username')");
        if (mysqli_num_rows($user_exists) > 0) {
            $out_value_register = "Username exists already, please pick a new one.";
        }
        // Send the query and obtain the result.
        // mysqli_query performs a query against the database.
        else {
            $result = mysqli_query($conn, $sql_query);
            $out_value_register = "Successfully registered!";
        }
        // mysqli_fetch_assoc returns an associative array that corresponds to the
        // fetched row or NULL if there are no more rows.
        // Probably does not make much of a difference here, but, e.g., if there are
        // multiple rows returned, you can iterate over those with a loop.
        //$row = mysqli_fetch_assoc($result);
      }
      else {
        $out_value_register = "Please complete all required fields.";
      }
    }

    // `isset` — Function to determine if a variable is declared and is different than null.
    // Generally, check out the PHP documentation. It is really good.
    // E.g., https://www.php.net/manual/en/function.isset.php
    // $_REQUEST is a PHP super global variable which is used to collect data
    // after submitting an HTML form.
    // https://www.w3schools.com/PHP/php_superglobals_request.asp
    // Some predefined variables in PHP are "superglobals", which means that
    // they are always accessible, regardless of scope - and you can access them
    // from any function, class or file without having to do anything special.
    // https://www.w3schools.com/PHP/php_superglobals.asp
    if(isset($_REQUEST["submit"])){
      // Variables for the output and the web form below.
      $out_value = "";
      $u_username = $_GET['username'];
      // The following is the core part of this script where we connect PHP
      // and SQL.
      // Check that the user entered data in the form.
      if(!empty($u_username)){
        // If so, prepare SQL query with the data.
        $sql_query = "SELECT * FROM ratings WHERE username = ('$u_username')";
        // $num_ratings = "SELECT count(*), username FROM ratings";
        // echo gettype($num_ratings);
        // Send the query and obtain the result.
        // mysqli_query performs a query against the database.
        $result = mysqli_query($conn, $sql_query);
        // mysqli_fetch_assoc returns an associative array that corresponds to the
        // fetched row or NULL if there are no more rows.
        // Probably does not make much of a difference here, but, e.g., if there are
        // multiple rows returned, you can iterate over those with a loop.
        //$row = mysqli_fetch_assoc($result);
        foreach($result as $row){
            $out_value = $out_value . $row['song'] . " -> " . $row['rating'] . "\n";
        }
      }
      else {
        $out_value = "Username hasn't rated any songs.";
      }
    }

    $conn->close();
  ?>

  <!--
    HTML code for the form by which the user can query data.
    Note that we are using names (to pass values around in PHP) and not ids
    (which are for CSS styling or JavaScript functionality).
    You can leave the action in the form open
    (https://stackoverflow.com/questions/1131781/is-it-a-good-practice-to-use-an-empty-url-for-a-html-forms-action-attribute-a)
  -->
  <div class="form_container">
      <div class="form_title">
        <h1>music-db</h1>
        <h2>Registration</h2>
      </div>
          <form method="POST" action="">
          Username: <input type="text" name="username" placeholder="Create a Username" /><br>
          Password: <input type="text" name="password" placeholder="Create a Password" /><br>
          <input type="submit" name="submit" value="Register"/><br>
          <p><?php
            if(!empty($out_value_register)){
              echo $out_value_register;
            }
          ?></p>
          </form>
    <div class="form_title_user">
        <h2>Retrieve Songs by Username</h2>
    </div>
      <form method="GET" action="">
      Username: <input type="text" name="username" placeholder="Enter Username" /><br>
      <input type="submit" name="submit" value="Retrieve"/>
      <p><?php
        if(!empty($out_value)){
          echo nl2br($out_value);
        }
      ?></p>
      </form>
  </div>
</body>
</html>
