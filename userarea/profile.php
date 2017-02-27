<?php require_once("../server/sessions.php"); ?>
<?php require_once("../server/db_connection.php");?>
<?php require_once("../server/functions.php");?>
<?php require_once("../server/validation_upload.php");?>
<?php $page_title="{$_SESSION["FirstName"]}'s Profile"?>
<?php confirm_logged_in(); ?>
<?php include("../includes/header.php"); ?>
<?php include("navbar.php"); ?>

        <h2>Your Profile</h2>
        <div class="row">
            <div class="col-sm-4">
                <?php
                    $pic_result = find_profile_pic($_SESSION["UserID"]);
                    $profile_picture = mysqli_fetch_assoc($pic_result);
                    $profile_picture_src = "img/" . $profile_picture["FileSource"];
                    $uncached_src = $profile_picture_src . "?" . filemtime($profile_picture_src);
                    mysqli_free_result($pic_result);
                ?>

            <img src="<?php echo $uncached_src; ?>" class="img-responsive" alt="Profile picture">
            <?php echo message();?>
            <form action="profile.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>       
            </div>
            <div class="col-sm-8">
              <?php
                $found_user = find_user_by_email($_SESSION["Email"]);
              ?>
              
              First name: <?php echo $found_user["FirstName"]?> <br /><br />
              Last name: <?php echo $found_user["LastName"]?> <br /><br />
              Date of Birth: <?php echo $found_user["DateOfBirth"]?> <br /> <br />
              Location: <?php echo $found_user["CurrentLocation"]?> <br /> <br />
              Email: <?php echo $found_user["Email"]?> <br /> <br />
              Phone Number: <?php echo $found_user["PhoneNumber"]?> <br /> <br />
              <?php 
                    if ($check_id) {
                        echo ("Id : " . $check_id);
                    } 
                ?>
            </div>
        </div>
        <hr />
        <a href="logout.php">Logout</a>

<?php include("../includes/footer.php"); ?>
