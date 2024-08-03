<?php

$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

$target_dir = "images/user_avatar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$id = $_POST['id'];
//Here we are getting the file extension if you want, you can use this code
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$updatedtime = date("Y/m/d h:i:s a", time());

$table_Members = 'nobs_registration';

if(file_exists($target_file)) {
      chmod($target_file , 0755); //Change the file permissions if allowed
      unlink($target_file); //remove the file
}

$url_api_base = "banqpopulaire.com/nobsimages2/images/";
$new_file_path = $target_file . '.jpg';

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_file_path )) {

                $new_file_path = $url_api_base . $target_file . '.jpg';

                //if you want you can change the user profile image
                $iupdate = $mysqli->query("UPDATE " . $table_Members . " SET user_image ='true',updated_at ='$updatedtime' where id='$id' ");
                if($iupdate){
                    $result = array('result' => '1' ,'msg' => 'Your profile image was updated succesfully...' , 'ipath' => $url_api_base . $new_file_path );
                    echo json_encode($result);
                }else {
                    $result = array('result' => '2' ,'msg' => 'Updating profile image failed...' ,'ipath' => realpath( $new_file_path)  );
                    echo json_encode($result);
                }

                
            } else {
                $result = array('result' => '237' ,'msg' => 'Updating profile image failed...' );
                echo json_encode($result);
            }
  

?>