<?php

$options=array("cost"=>4);
$hashpass=password_hash("root",PASSWORD_BCRYPT,$options);

echo $hashpass;

?>