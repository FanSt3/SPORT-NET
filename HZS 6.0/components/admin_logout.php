<?php

include "../components/connect.php";

session_start();
session_unset();
session_abort();

include "../admin/admin_login.php"
?>