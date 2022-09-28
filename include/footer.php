<footer class="footer bg-dark mt-auto py-3">
  <div class="container">
    <span class="text-muted">Copyright © 2020 || All rights reserved. <a style = "text-decoration:none;" href="<?php echo SITE_ROOT.'/privacy-policy.php'; ?>">Privacy Policy</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?php echo SITE_ROOT.'/assets/js/bootstrap.bundle.min.js' ?>"></script>

<script>
var overlay = document.getElementById("overlay");
window.addEventListener('load', function(){
overlay.style.display = 'none';
});

$(document).ready(function () {
$('#NoteTable').DataTable();
});
</script>

<?php 
$conn = null;
?>
</body>
</html>
