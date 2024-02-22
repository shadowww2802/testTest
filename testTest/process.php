<?php
session_start();
include("config.php");

// if(isset($_POST["loginButton"])){

//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $login_query = "SELECT `id`, `email`, `password`, `fname`, `mname`, `lname` FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1 ";
//     $login_result = mysqli_query($con, $login_query);

//     if(mysqli_num_rows($login_result) == 1){
//         $_SESSION['status'] = "Welcome!";
//         $_SESSION['status_code'] = "success";
//         header("Location: index.php");
//         exit();
//     }else{
//         $_SESSION['status'] = "Invalid Username/Password";
//         $_SESSION['status_code'] = "error";
//         header("Location: login.php");
//         exit();
//     }
// }





if (isset($_POST["registerButton"])) {

    $userPassword = $_POST["userPassword"];
    $userRePassword = $_POST['userRePassword'];
    $firstName = $_POST["firstName"];
    $middleName = isset($_POST["middleName"]) ? $_POST['middleName'] : '';
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];


    $check_email_query = "SELECT * FROM users WHERE 'email' = '$email'";
    $email_result = mysqli_query($con, $check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if ($email_count > 0) {
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    if ($userPassword !== $userRePassword) {
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }


    $query = "INSERT INTO `users`(email, userPassword, fistName, middleName, lastName) VALUES ('$email', '$userPassword', '$firstName', '$middleName', '$lastName')";
    $query_result = mysqli_query($con, $query);

    if ($query_result) {
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: login.php");
        exit();
    }
}


if (isset($_POST["loginButton"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT `id`, `email`, `password`, `fname`, `mname`, `lname` FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1 ";
    $login_result = mysqli_query($con, $login_query);

    if ($login_result) {
        if (mysqli_num_rows($login_result) > 0) {
            $data = mysqli_fetch_assoc($login_result);

            $user_id = $data['id'];
            $full_name = $data['fname'] . '' . $data['mname'] . '' . $data['lname'];
            $user_mail = $data['email'];

            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $user_id,
                'user_name' => $full_name,
                'user_email' => $user_email,
            ];

            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['status'] = "Invalid Username/Password";
            $_SESSION['status_code'] = "error";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Error executing the login query" . mysqli_error($con);
        $_SESSION['status_code'] = "success";
        header("Location: login.php");
        exit();
    }
}

if (isset($_POST["insertButton"])) {

    $studentID = $_POST["studentID"];
    $firstName = $_POST["firstName"];
    $middleName = isset($_POST["middleName"]) ? $_POST['middleName'] : '';
    $lastName = $_POST["lastName"];
    $year = $_POST["year"];
    $section = $_POST["section"];



    $query = "INSERT INTO `students`(studentID, fistName, middleName, lastName, year, section) VALUES ('$studentID', '$firstName', '$middleName', '$lastName', '$year', '$section')";
    $query_result = mysqli_query($con, $query);

    if ($query_result) {
        $_SESSION['status'] = "Insert Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
}
