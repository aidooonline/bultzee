 
<?php


//initial query variable

$rowid = '';
$paidby ='';
 

    if( isset($_POST['myid']))
    {
        $rowid = $_POST['myid'];
        
    
    } 
    
      if( isset($_POST['paidby']))
    {
        $paidby = $_POST['paidby'];
        
    } 
 
  

  // For Username
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error";
  exit();
}
  
 
 
$sql = "UPDATE nobs_transactions SET paid_by = '$paidby', name_of_transaction = 'Withdraw',is_paid=1 WHERE id = '$rowid'";

$withdrawalmsg = $mysqli->query("SELECT paid_withdrawal_msg FROM nobs_transactions WHERE id = '$rowid'")->fetch_object()->paid_withdrawal_msg; 

$checkTransAccType = $mysqli->query("SELECT account_type FROM nobs_transactions WHERE id = '$rowid'")->fetch_object()->account_type; 


if ($mysqli->query($sql) === TRUE) {
  echo $withdrawalmsg;
} else {
  echo "Error paying record: " . $mysqli->error;
}

 
 //======= check if account is REGULAR SUSU ============
 
if($checkTransAccType == 'Regular Susu'){
$query = "SELECT * FROM nobs_transactions WHERE id = '$rowid'";

$result = $mysqli->query($query);

/* fetch associative array */
while ($row = $result->fetch_assoc()) {
   
   $acNUM = $row["account_number"];
   $acTYPE = $row["account_type"];
   $my__id = randString(14);
   $mydatey2 = date("Y-m-d H:i:s");
   $t__id = randString(7);
   
   $commission_aMount = floatval($row["amount"]) * 0.033;
   $Balance_aMOUNT = floatval($row["amount"]) - $commission_aMount;
   $agent_commission = floatval($commission_aMount) * 0.10;
   $agentaccountid = $row["users"];
   
   
   //calculate system commission
   if ($mysqli -> query("INSERT INTO nobs_transactions (__id__, account_number, account_type,created_at,transaction_id,phone_number,det_rep_name_of_transaction,amount,agentname,name_of_transaction,users,is_shown,is_loan)
     VALUES ('$my__id', '$acNUM', '$acTYPE','$mydatey2','$t__id','','','$commission_aMount','','Commission','$agentaccountid',1,0)")){
        
     }
     if ($mysqli -> errno) {
      echo 'ERROR' . $mysqli -> error;
  }
  
  
  //calculate agent commission
  if ($mysqli -> query("INSERT INTO nobs_transactions (__id__, account_number, account_type,created_at,transaction_id,phone_number,det_rep_name_of_transaction,amount,agentname,name_of_transaction,users,is_shown,is_loan)
     VALUES ('$my__id', '$acNUM', '$acTYPE','$mydatey2','$t__id','','','$agent_commission','','Agent Commission','$agentaccountid',1,0)")){
     }
     if ($mysqli -> errno) {
      echo 'ERROR' . $mysqli -> error;
  }
  
  
  
  
  
  
}
  
  ///=====================
   
   
   
}
















$mysqli -> close();
 
 
 
 
 function randString($length) {
    $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $char = str_shuffle($char);
    for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
        $rand .= $char{mt_rand(0, $l)};
    }
    return $rand;
}


?>





