<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$conn = mysqli_connect("localhost", "root", "", "crud");

$id = 0;

$update = false;
$name = '';
$age = '';
$location = '';
$email = '';
$contactnumber = '';

$username = '';
$password = '';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];


    $mysqli->query("INSERT INTO data (name, age, location, email, contactnumber) VALUES ('$name', '$age','$location', '$email','$contactnumber')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";

    header("location: home.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);


    $_SESSION['message'] = "Record has been deleted!";


    header("location: home.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);

    if (!empty($result)) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $age = $row['age'];
        $location = $row['location'];
        $email = $row['email'];
        $contactnumber = $row['contactnumber'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];


    $mysqli->query("UPDATE data SET name='$name', age='$age', location='$location', email='$email', contactnumber='$contactnumber' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated.";
    header("location: home.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    if (count($_POST) > 0) {
        $result = mysqli_query($conn, "SELECT * FROM accounts WHERE USERNAME = '$username' and PASSWORD = '$password'");
        $row  = mysqli_fetch_array($result);
        if (is_array($row)) {
            echo '<script>alert("Log in successful.")</script>';
            header('location: home.php');
        } else {
            $_SESSION['loginMessage'] = "Invalid username or password.";
        }
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    $confirmPassword = $_POST['confirmPASSWORD'];

    $result = mysqli_query($mysqli, "SELECT * FROM accounts WHERE USERNAME = '$username'");
    $count = mysqli_num_rows($result);

    if ($password === $confirmPassword) {
        if ($count > 0) {
            $_SESSION['registerMessage'] = "Username already exists.";
            header("location: register.php");
        } else {
            $mysqli->query("INSERT INTO accounts (USERNAME, PASSWORD) VALUES ('$username','$password')") or die($mysqli->error);

            echo '<script>alert("Registration Successful. Log in now.")</script>';
            header("location: login.php");
        }
    } else {
        $_SESSION['registerMessage'] = "Passwords do not match.";
        header("location: register.php");
    }
}
