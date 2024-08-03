<?php


//initial query variable

$users = '';
$id ='';
$cpic ='';
$status = $statusMsg = ''; 
$image ='';
 

    if( isset($_POST['approved_by']))
    {
        $users = $_POST['approved_by'];
        
    
    } 
    
      if( isset($_POST['id']))
    {
        $id = $_POST['id'];
        
    } 
    
    if(isset($_POST['image'])){
        $image = $_POST['image'];
    }
   
    
    
    
 
   
  // For Username
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error";
  exit();
}
  
 
$mydatey = date("Y-m-d H:i:s");

 if(isset($_POST['id'])){
        
         $status = 'error'; 
       
         
       
         
            // Insert image content into database 
            $insert = $mysqli->query("UPDATE nobs_registration SET user_image = '$image' WHERE id = '$id'"); 
             
            if($insert){ 
                echo "Image Uploaded Successfully";
            }else{ 
                echo "File upload failed, please try again."; 
            }  
       
    
    
    }


 
 
 
   
  $mysqli -> close();

 

 
 

?>