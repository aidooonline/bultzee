 
<?php


//initial query variable




$result = null;
 

$insertuseraccount = null;
 

if( isset($_POST['insertuseraccount']) )
{
  //searchmode
$insertuseraccount = $_POST['insertuseraccount'];
}
 
if($insertuseraccount == 'insertuseraccount'){
  insertuseraccountstypes();
  }

 
 $alltrue = false;

 $__id__ = null;
 $account_number = null;
 $account_type = null;
 $amount = null;
 $name = null;
 $users = null;
 $transaction_id = null;


function insertuseraccountstypes(){
    
    
    if( isset($_POST['__id__']))
    {
        $__id__ = $_POST['__id__'];
        $alltrue = true;
    }else{
        $alltrue = false;
    }

    if( isset($_POST['account_number']))
    {
        $account_number = $_POST['account_number'];
        $alltrue = true;
    }else{
        $alltrue = false;
    }

    if( isset($_POST['account_type']))
    {
        $account_type = $_POST['account_type'];
        $alltrue = true;
    }else{
        $alltrue = false;
    }

    if( isset($_POST['amount']))
    {
        $amount = $_POST['amount'];
        $alltrue = true;
    }else{
        $alltrue = false;
    }

    if( isset($_POST['agentname']))
    {
        $agentname = $_POST['agentname'];
        $alltrue = true;
    }else{
        $alltrue = false;
    }

    if( isset($_POST['users']))
    {
        $users = $_POST['users'];
        $alltrue = true;
    }else{
        $alltrue = false;
    } 
 
  if( isset($_POST['transaction_id']))
    {
        $transaction_id = $_POST['transaction_id'];
        $alltrue = true;
    }else{
        $alltrue = false;
    } 
 
   
  // For Username
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error";
  exit();
}
  

 $mainaccountnumber = $mysqli->query("SELECT primary_account_number FROM nobs_user_account_numbers WHERE account_number = '$account_number'")->fetch_object()->primary_account_number; 
 $customer_name = $mysqli->query("SELECT CONCAT(first_name,' ',surname) as customername FROM nobs_registration WHERE account_number = '$mainaccountnumber'")->fetch_object()->customername; 
 $customer_phone = $mysqli->query("SELECT phone_number FROM nobs_registration WHERE account_number = '$mainaccountnumber'")->fetch_object()->phone_number; 
 
 
 
 $mydatey = date("Y-m-d H:i:s");

  if ($mysqli -> query("INSERT INTO nobs_transactions (__id__, account_number, account_type,created_at,transaction_id,phone_number,det_rep_name_of_transaction,amount,agentname,name_of_transaction,users,is_shown,is_loan,row_version)
     VALUES ('$__id__', '$account_number', '$account_type','$mydatey','$transaction_id','$customer_phone','$customer_name','$amount','$agentname','Deposit','$users',1,0,2)")){
        echo 'Deposit of '. $amount . ' is made to Account Number: ' . $account_number ;
     }
     if ($mysqli -> errno) {
      echo 'ERROR' . $mysqli -> error;
  }
 
  $mysqli -> close();
 }

 
 

?>