<?php
$mysqli = new mysqli("localhost","banqgego_nobsmicrocredit","oqqsak2004","banqgego_nobsmicrocreditdb");

if ($mysqli -> connect_errno) {
  echo "Error Connecting to Server: " . $mysqli -> connect_error;
  exit();
}

$accountnumber = $_POST['accountnumber'];

// For Deposit
$result = mysqli_query($mysqli,"SELECT SUM(`amount`) as `sum` FROM `nobs_transactions` WHERE account_number = '$accountnumber' AND name_of_transaction = 'Deposit'");
$row = mysqli_fetch_row($result);
$deposit_sum = $row[0];

if($deposit_sum == null){
    $deposit_sum = 0;
}

// For Withdrawals
$result = mysqli_query($mysqli,"SELECT SUM(`amount`) as `sum` FROM `nobs_transactions` WHERE account_number = '$accountnumber' AND name_of_transaction = 'Withdraw'");
$row = mysqli_fetch_row($result);
$withdrawal_sum = $row[0];


if($withdrawal_sum == null){
    $withdrawal_sum = 0;
}

// For Refunds
$result = mysqli_query($mysqli,"SELECT SUM(`amount`) as `sum` FROM `nobs_transactions` WHERE account_number = '$accountnumber' AND name_of_transaction = 'Refund'");
$row = mysqli_fetch_row($result);
$refund_sum = $row[0];


if($refund_sum == null){
    $refund_sum = 0;
}

$totalAmount = number_format(($deposit_sum - $withdrawal_sum)-$refund_sum, 2, '.', '');


echo $deposit_sum.'___'.$withdrawal_sum.'___'.$totalAmount;

$result -> close();

 

$mysqli -> close();
?>