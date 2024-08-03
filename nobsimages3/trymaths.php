<?php

$commission_aMount = number_format((4000 * 0.033), 2, '.', '');
$Balance_aMOUNT = number_format((4000 - $commission_aMount), 2, '.', '');
$agent_commission = number_format(($commission_aMount * 0.10), 2, '.', '');


echo '<h1>Commission Amount = '. $commission_aMount . '</h1>';

echo '<h1>Balance Amount = '. $Balance_aMOUNT . '</h1>';

echo '<h1>Agent Commission = '. $agent_commission . '</h1>';
?>