<?php
$page="Home";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
include $DOC_ROOT."/include/connect.php";
$error = "";
if (isset($_SESSION['Email']) && isset($_SESSION['Password'])) {
    header("Location: ".SITE_ROOT."/dashboard/index.php");
    exit();
}
else {
    if (isset($_POST["login"])) {
        $email = $_POST["defaultLoginFormEmail"];
        $pass = $_POST["defaultLoginFormPassword"];
        if($email == ''){
            $error = "Email cannot be empty.";
        } 
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Email format invalid.";
        }
        elseif($pass == ''){
            $error = "Password cannot be empty.";
        }
        else{
            $query = "select Email, Password from Users where Email ='$email'";
            $res = $conn->prepare($query);
            $res->execute();
            if ($res->rowCount() == 1) {
                while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['Email'] == $email && $row['Password'] == md5($pass)){
                        $_SESSION['Email'] = $email;
                        $_SESSION['Password'] = $row['Password'];
                        header("Location: ".SITE_ROOT."/dashboard/index.php");
                        exit();
                    }
                    elseif ($row['Email'] == $email && $row['Password'] != md5($pass)) {
                        $error = "Password Invalid";
                    }
                }
            } elseif ($res->rowCount() == 0) {
                $error = "Not Register";
            }
            else
            {
                $error = "Not Able To Login";
            }
        }
        $_SESSION['Error'] = $error;
        header("Location: ".SITE_ROOT."/dashboard/login.php");
        exit();
    }

    if (isset($_POST["signup"])) {
        $fname = $_POST["defaultRegisterFormFirstName"];
        $lname = $_POST["defaultRegisterFormLastName"];
        $email = $_POST["defaultRegisterFormEmail"];
        $pass = $_POST["defaultRegisterFormPassword"];
        $cpass = $_POST["defaultRegisterFormPasswordConfirm"];
        if ($fname == ''){
            $error = "First Name cannot be empty.";
        }
        elseif($lname == ''){
            $error = "Last Name cannot be empty.";
        } 
        elseif($email == ''){
            $error = "Email cannot be empty.";
        } 
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Email format invalid.";
        }
        elseif($pass == ''){
            $error = "Password cannot be empty.";
        }
        else{
            if ($pass == $cpass) {
                $query = "insert into Users values('$fname','$lname','$email',md5('$cpass'),curdate(),0)";
                $res=$conn->prepare($query);
                if($res->execute()){
                    header("Location: ./login.php");
                    exit();
                }else {
                    $error = "Email Already Exist";
                }
            }
            else{
                $error = "Password Not Match";
            }
        }
        $_SESSION['Error'] = $error;
        header("Location: ".SITE_ROOT."/dashboard/signup.php");
        exit();
    }
}
?>
