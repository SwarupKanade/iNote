<?php
$page = "iNote - Access Your Note Anytime Anywhere";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6 my-2">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo SITE_ROOT.'/assets/img/1.jpg' ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITE_ROOT.'/assets/img/2.jpg' ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="<?php echo SITE_ROOT.'/assets/img/3.jpg' ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col">
      <h3>The Importance of Note-Making</h3>
      <p>Taking notes is an important part of the life of every student. There are two main reasons why note-taking is important:</p>
      <ol>
        <li>When you are reading or listening, taking notes helps you concentrate. In order to take notes - to write something sensible - you must understand the text. 
        As listening and reading are interactive tasks, taking notes help you make sense of the text. Taking notes does not mean writing down every word you hear; 
        you need to actively decide what is important and how is related to what you have already written.</li>
        <li>Notes help you to maintain a permanent record of what you have read or listened to. This is useful when revising in the future for examinations or other reasons.</li>
        </ol>
      </p>Good notes should be accurate, clear and concise. They should show the organisation of the text, and this should show the relationship between the ideas.</p>
      </div>
    </div>
  </div>
</main>
<?php
include $DOC_ROOT."/include/footer.php";
?>
