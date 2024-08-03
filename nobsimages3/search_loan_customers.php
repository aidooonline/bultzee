<?php


//initial query variable

$result = null;
$searchtext = null;

$searchmode = null;

$updatedate = null;

$insertuseraccount = null;

if( isset($_POST['search']) )
{
  $searchtext = ucfirst($_POST['search']);
}
 
if( isset($_POST['searchmode']) )
{
  //searchmode
$searchmode = $_POST['searchmode'];
}


if( isset($_POST['updatedate']) )
{
  //searchmode
$updatedate = $_POST['updatedate'];
}



if( isset($_GET['insertuseraccount']) )
{
  //searchmode
$insertuseraccount = $_GET['insertuseraccount'];
}



if($searchmode == 'searchbyname'){
searchbyname($searchtext);
}

if($searchmode == 'searchbyaccountnumber'){
searchbyaccountnumber($searchtext);
}

if($updatedate == 'update'){
  updatedatestringasdate();
  }



if($insertuseraccount == 'insertuseraccount'){
  insertuseraccountstypes();
  }



function searchbyname($searchtext){
  // For Username
   
 $mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error Connecting to Server: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT id,first_name,surname,account_number,account_type,occupation,residential_address,customer_picture,phone_number FROM nobs_registration WHERE CONCAT(first_name,' ',surname) LIKE  '%$searchtext%'";
//accountid,accountnumber,customerpicture,occupation,residentialaddress,accounttypes
if ($result = $mysqli -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    echo $row[0].'___'. $row[1].'___'.$row[2].'___'.$row[3].'___'.$row[4].'___'.$row[5].'___'.$row[6].'___'.$row[7].'___'.$row[8].'*****';
    
  }
  $result -> free_result();
}

$mysqli -> close();
}


function updatedatestringasdate(){

  // For Username
 $mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error Connecting to Server: " . $mysqli -> connect_error;
  exit();
}

  $sql = "SELECT `__id__`, CAST(`created_at` AS DATETIME) FROM `nobs_agent_records`";

  if ($result = $mysqli -> query($sql)) {
    while ($row = $result -> fetch_row()) {
     

      if ($mysqli -> query("UPDATE nobs_agent_records set created_at2 = '$row[1]', updated = 1 where __id__ = '$row[0]' AND updated = 0")) {
        echo "Table nobs_agent_records updated successfully with ".$row[1]." __ ". $row[0]."<br />";
     }
     if ($mysqli -> errno) {
      echo 'Could not update table:' . $mysqli ->error;
       
     }


    }
    $result -> free_result();
  }
  
  $mysqli -> close();

  
}
 

function insertuseraccountstypes(){

  // For Username
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error Connecting to Server: " . $mysqli -> connect_error;
  exit();
}

  $sql = "SELECT `__id__`, account_types, accounttype_num, created_at, account_number,user FROM `nobs_registration`";

  if ($result = $mysqli -> query($sql)) {
    while ($row = $result -> fetch_row()) {
     
// now take accounttype_num and place into array;
$accounttype_num  =  $row[2];
  
$accounttype_num  = str_replace("[","",$accounttype_num);
$accounttype_num  = str_replace("]","",$accounttype_num);
$accounttype_num  = str_replace('"',"",$accounttype_num);

$accounttypes  =  $row[1];
  
$accounttypes  = str_replace("[","",$accounttypes);
$accounttypes  = str_replace("]","",$accounttypes);
$accounttypes  = str_replace('"',"",$accounttypes);

try {
  // run your code here
  $accounttype_num = explode(",", $accounttype_num);
  $accounttypes = explode(",", $accounttypes);
  
  for($i = 0;$i<=sizeof($accounttype_num)-1;$i++){

    
 
  if ($mysqli -> query("INSERT INTO nobs_user_account_numbers (account_number, account_type, __id__,created_at, primary_account_number,created_by_user)
VALUES ('$accounttype_num[$i]', '$accounttypes[$i]', '$row[0]','$row[3]','$row[4]','$row[5]')")){
        echo "Table nobs_user_account_numbers inserted successfully with ".$accounttypes[$i]." __ ". $accounttype_num[$i]."___". $row[5] ."<br />";
     }
     if ($mysqli -> errno) {
      echo 'Could not update table:' . $mysqli ->error;
       
     }
 
  }
  echo '<br/>';
}
catch (exception $e) {
  //code to handle the exception
}
 
   

    }
    $result -> free_result();
  }
  
  $mysqli -> close();

  
}



function searchbyaccountnumber($searchtext){
// For Account Number
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqSak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error Connecting to Server: " . $mysqli -> connect_error;
  exit();
}

//first search for the primary account number with the provided account number FROM THE TABLE 'nobs_user_account_numbers';

$pnumber = "SELECT primary_account_number FROM nobs_user_account_numbers WHERE account_number LIKE  '$searchtext'";
$primary_account_number ='';


if ($result = $mysqli -> query($pnumber)) {
  while ($row = $result -> fetch_row()) {
    $primary_account_number = $row[0];
  }
  $result -> free_result();

  $sql = "SELECT id,first_name,surname,account_number,account_type,occupation,residential_address,customer_picture,phone_number FROM nobs_registration WHERE account_number LIKE  '$primary_account_number'";
   
  


  if ($result1 = $mysqli -> query($sql)) {
    while ($row = $result1 -> fetch_row()) {
      echo $row[0].'___'. $row[1].'___'.$row[2].'___'.$row[3].'___'.$row[4].'___'.$row[5].'___'.$row[6].'___'.$row[7].'___'.$row[8].'*****';
    }
    $result1 -> free_result();
  }
  
}




  
$mysqli -> close();
}




//$result = mysqli_query($mysqli,"SELECT * nobs_registration table WHERE CONCAT( first_name,  ' ', surname ) LIKE  '%$searchtext%'");
//$row = mysqli_fetch_row($result);
 
 

/*/For Accountnumber
$result = mysqli_query($mysqli,"SELECT SUM(`amount`) as `sum` FROM `nobs_transactions` WHERE account_number = '$accountnumber' AND name_of_transaction = 'Withdraw'");
$row = mysqli_fetch_row($result);
$withdrawal_sum = $row[0];*/

  


//echo $row; //$deposit_sum.'___'.$withdrawal_sum.'___'.$totalAmount;

//$result -> close();

 

?>