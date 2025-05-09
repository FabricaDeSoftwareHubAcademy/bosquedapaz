<?php

include "./app/Models/Env.php";

use app\Models\Env;
$env = Env::load();

header('location: app/client/Views/feira-bosque-da-paz.php');

?>