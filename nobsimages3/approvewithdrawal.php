 
<?php


//initial query variable

$users = '';
$id ='';
 

    if( isset($_POST['approved_by']))
    {
        $users = $_POST['approved_by'];
        
    
    } 
    
      if( isset($_POST['id']))
    {
        $id = $_POST['id'];
        
    } 
 
   
  // For Username
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error";
  exit();
}
  
 
$mydatey = date("Y-m-d H:i:s");
$sql = "UPDATE nobs_transactions SET withdrawrequest_approved = 1,name_of_transaction ='Withdrawal Request',is_paid = 0, approved_by = '$users',created_at='$mydatey' WHERE id = '$id'";

if ($mysqli->query($sql) === TRUE) {
  echo "Withdrawal approved";
} else {
  echo "Error approving record: " . $mysqli->error;
}

 

 
 
   
  $mysqli -> close();

 

 
 

?>