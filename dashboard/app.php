<?php
$page = "Home";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
include $DOC_ROOT."/include/connect.php";
$msg = "";
if (!isset($_SESSION['Email']) || !isset($_SESSION['Password'])) {
	header("Location: ".SITE_ROOT."/dashboard/login.php");
    exit();
}
else{
    $email = $_SESSION['Email'];
    if(isset($_POST['add'])){
        $notetitle = $_POST['NoteTitle'];
        $notemsg = $_POST['NoteMsg'];
        if ($notetitle =="") {
            $msg = "Title Cannot be Empty";
        }else {
            $query = "select * from Notes where Email = '$email'";
            $res=$conn->prepare($query);
            $res->execute();
            $no = $res->rowCount();
            $no = $no + 1;
            $query1 = "insert into Notes(Email,Title,Message,CDate) values ('$email','$notetitle','$notemsg',now())";
            $query2 = "update Users set Note = '$no' where Email = '$email'";
            $res1=$conn->prepare($query1);
            $res2=$conn->prepare($query2);
            if($res1->execute() && $res2->execute()){
                $msg = "Note Added Successfully";
            }else {
                $msg = "Unable to Add Note";
            }
        }
        $_SESSION['Msg'] = $msg;
        header("Location: ".SITE_ROOT."/dashboard/index.php");
        exit();
    }

    if(isset($_POST['delete'])){
        $sr = $_POST['Sr'];
        $query = "select * from Notes where Email = '$email'";
        $res=$conn->prepare($query);
        $res->execute();
        $no = $res->rowCount();
        $no = $no - 1;
        $query1 = "delete from Notes where Sr = '$sr'";
        $query2 = "update Users set Note = '$no' where Email = '$email'";
        $res1=$conn->prepare($query1);
        $res2=$conn->prepare($query2);
        if($res1->execute() && $res2->execute()){
            $msg = "Note Deleted Successfully";
        }else {
            $msg = "Unable to Delete Note";
        }
        $_SESSION['Msg'] = $msg;
        header("Location: ".SITE_ROOT."/dashboard/index.php");
        exit();
    }
    
    if(isset($_POST['edit'])){
        $esno = $_POST['snoEdit'];
        $et = $_POST['NoteTitleEdit'];
        $em = $_POST['NoteMsgEdit'];
        $query = "update Notes set Title = '$et', Message = '$em' where Sr = '$esno'";
        $res=$conn->prepare($query);
        if($res->execute()){
            $msg = "Note Updated Successfully";
        }else {
            $msg = "Unable to Update Note";
        }
        $_SESSION['Msg'] = $msg;
        header("Location: ".SITE_ROOT."/dashboard/index.php");
        exit();
    }
}
?>
