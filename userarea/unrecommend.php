<?php
if (isset($_POST["do_not_recommend"])) {
    $unrecommend_query = "INSERT INTO do_not_recommend (UserID, UnknownUserID)
						  VALUES ('{$_SESSION["UserID"]}', '{$_GET["id"]}')";
    $unrecommend = mysqli_query($conn, $unrecommend_query);
}
?>