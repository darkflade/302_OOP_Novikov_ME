<?php

$timezone = new DateTimeZone('Europe/Moscow');
$currTimeDate = new DateTime('now', $timezone)->format('d-m-Y H:i:s');
$name = "Новиков Максим Евгеньевич";

echo "$name \n";
echo "--------------------------\n";
echo "Сейчас $currTimeDate";

?>
