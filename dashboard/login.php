<?php
$page="iNote - Login";
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
                    <h2>Login</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form">
            <div class="row justify-content-center">
                <!-- Default form login -->
                <form class="text-center border border-light" action="<?php echo SITE_ROOT.'/dashboard/function.php'?>" method ="post">

                <!-- Email -->
                <input type="email" size="30" name="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" size="30" name="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Forgot password -->
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name ="login">Login</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="<?php echo SITE_ROOT."/dashboard/signup.php" ?>">Register</a>
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
                <!-- Default form login -->
            </div>
        </div>
    </div>
</main><!-- End #main -->
    

<?php
include $DOC_ROOT."/include/footer.php";
?>
