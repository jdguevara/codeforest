<?php
include_once 'Dao.php';

/**
 * Created by IntelliJ IDEA.
 * User: jguevara
 * Date: 10/31/18
 * Time: 8:32 PM
 */

session_start();
$dao = new Dao();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($username) || empty($password) || empty($email)) {
    // If all are empty return appropriate message for user
    if (empty($username) && empty($password) && empty($email)) {
        $_SESSION['message'] = "Credentials required.";
        header('Location: signup.php');
        exit;
    }
    // Check which fields are empty and output the correct message
    if (empty($username)) {
        if (empty($email)) {
            $_SESSION['message'] = "Username and Email Required!";
            $_SESSION['password'] = $password;
            header('Location: signup.php');
            exit;
        } elseif (empty($password)) {
            $_SESSION['email'] = $email;
            $_SESSION['message'] = "Username and Password Required!";
            header('Location: signup.php');
            exit;
        }
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['message'] = "Username Required!";
        header('Location: signup.php');
        exit;
    } else if (empty($email)) {
        if (empty($password)) {
            $_SESSION['message'] = "Email and Password Required!";
            $_SESSION['username'] = $username;
            header('Location: signup.php');
            exit;
        }
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['message'] = "Email Required!";
        header('Location: signup.php');
        exit;
    } else if (empty($password)) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = "Password Required!";
        header('Location: signup.php');
        exit;
    }
    header('Location: login.php');
    exit;
}

// Check that our email is appropriate
if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    $_SESSION['message'] = "Email is invalid!";
    header('Location: signup.php');
    exit;
}

// Check for duplicates
if ($dao->checkDuplicateUser($username, $email) == 0) {
    $dao->createUser($username, $email, $password);
    $_SESSION['message'] = 'User Successfully Created!';
    $_SESSION['success'] = 1;
    header('Location: projects.php');
} else {
    $_SESSION['message'] = 'Username taken, please try again';
    $_SESSION['duplicate'] = 1;
    header('Location: signup.php');
}

exit;