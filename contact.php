<?php
$page = "iNote - Contact Us";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
$msg = "";
if(isset( $_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  if ($name === ''){
    $msg = "Name cannot be empty.";
  }
  elseif($email === ''){
    $msg = "Email cannot be empty.";
  } 
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $msg = "Email format invalid.";
  }
  elseif($subject === ''){
    $msg = "Subject cannot be empty.";
  }
  elseif($message === ''){
    $msg = "Message cannot be empty.";
  }else{
    $msg = "Email sent!";
  }
}
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <!--Section: Contact v.2-->
    <section class="mb-4">
    <!--Section heading-->
    <div class="col-md-5 mx-auto">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                  <br>
                  <h2>Contact Us</h2>
              </div>
          </div>
      </div>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" method="POST">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-4">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-12">
                            <div class="md-form">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                  <div class="text-center text-md-left">
                <button class="btn btn-info btn-block my-4" name="send">Send</button>
              </div>
            </form>
            <?php
                if ($msg != "") {
                    echo '
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>';
                        echo $msg;
                    echo '</div>
                    ';
                }
                ?>
          </div>
      </div>
    </section>
  </div>
</main>
<?php
include $DOC_ROOT."/include/footer.php";
?>
