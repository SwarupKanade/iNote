<?php
$page = "iNote - Dashboard";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
include $DOC_ROOT."/include/connect.php";
$msg = "";
if (isset($_SESSION['Msg'])) {
    $msg = $_SESSION['Msg'];
    unset($_SESSION['Msg']);
}
if (!isset($_SESSION['Email']) || !isset($_SESSION['Password'])) {
	header("Location: ".SITE_ROOT."/dashboard/login.php");
    exit();
}
$email = $_SESSION['Email'];
?>

<!-- Begin page content -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form class="text-center border border-light" action="<?php echo SITE_ROOT.'/dashboard/app.php'?>" method="post">
            <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="titleEdit" name="NoteTitleEdit">
                </div>

                <div class="form-group">
                <label for="desc">Note Description</label>
                <textarea class="form-control" id="descriptionEdit" name="NoteMsgEdit" rows="3"></textarea>
                </div> 
            </div>
            <div class="modal-footer d-block mr-auto">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="edit" name="edit" class="btn btn-info">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<main role="main" class="flex-shrink-0">
    <div class="container my-4">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form">
            <div class="row justify-content-center">
            <h2>Add a Note to iNotes</h2>
                <form action="<?php echo SITE_ROOT.'/dashboard/app.php'?>" method="post">
                <div class="form-group">
                    <label for="NoteTitle">Note Title</label>
                    <input type="text" class="form-control" id="NoteTitle" Name="NoteTitle">
                </div>
                <div class="form-group">
                    <label for="NoteMsg">Note</label>
                    <textarea class="form-control" id="NoteMsg" name="NoteMsg" rows="3"></textarea>
                </div>
                <input class="btn btn-info my-4 btn-block" type="submit" name="add" value="Add Note">
                </form>
                <?php
                if ($msg != "") {
                    echo '
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                    '.$msg.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <table class="display table-responsive" id="NoteTable">
            <thead>
                <tr>
                <th style="width: 5%">S.No</th>
                <th style="width: 28%">Title</th>
                <th style="width: 56%">Description</th>
                <th style="width: 4%">Edit</th>
                <th style="width: 7%">Delete</th>
                </tr>
            </thead>
        <tbody>
            <?php 
            $query3 = "select * from Notes where Email = '$email'";
            $res3=$conn->prepare($query3);
            $res3->execute();
            $sno = 0;
            while($row = $res3->fetch(PDO::FETCH_ASSOC)){
                $sno = $sno + 1;
            ?>
            <tr>
            <th><?php echo $sno ?></th>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['Message']?></td>
            <td>
            <button class="edit btn btn-sm btn-info" id="<?php echo $row['Sr']?>"> Edit</button>
            </td>
            <td>
            <form action="<?php echo SITE_ROOT.'/dashboard/app.php' ?>" method="post">
                <button class="edit btn btn-sm btn-info" type="submit" name="delete">Delete</button>
                <input type="hidden" name="Sr" value="<?php echo $row['Sr']?>">
            </form>
            </td>
            </tr>
            <?php
            } 
            ?>
        </tbody>
        </table>
    </div>

<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        $('#editModal').modal('toggle');
      })
    })
</script>

</main>

<?php
include $DOC_ROOT."/include/footer.php";
?>
