<?php
$page="iNote - Sign Up";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
include $DOC_ROOT."/include/connect.php";
$error = "";
if (isset($_SESSION['Error'])) {
    $error = $_SESSION['Error'];
    unset($_SESSION['Error']);
}
if (isset($_SESSION['Email']) && isset($_SESSION['Password'])) {
	header("Location: ".SITE_ROOT."/dashboard/index.php");
    exit();
}
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <br>
                    <h2>Sign Up</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form">
            <div class="row justify-content-center">
                <!-- Default form register -->
                <form class="text-center border border-light" action="<?php echo SITE_ROOT.'/dashboard/function.php'?>" method="post">

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" name="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" name="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                    </div>
                </div>

                <!-- E-mail -->
                <input type="email" name="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" name="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>

                <!-- Confirm Password -->
                <input type="password" name="defaultRegisterFormPasswordConfirm" class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit" name="signup" >Sign Up</button>
                
                <!-- Login -->
                <p>Already member?
                    <a href="<?php echo SITE_ROOT."/dashboard/login.php" ?>">Login</a>
                </p>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>
                </p>
                
                <?php
                if ($error != "") {
                    echo '
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> ';
                        echo $error;
                    echo '</div>';
                }
                ?>

                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</main><!-- End #main -->
    

<?php
include $DOC_ROOT."/include/footer.php";
?>
