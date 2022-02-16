<?php

require ('classes/loginHandler.php');

 if (isset($_POST['submit'])) {
    $handler = new loginHandler($_POST);
    $userExists = $handler->checkIfPersonIsInDatabase();

    if ($userExists) {
        header("Location: http://localhost:63342/366dnizakatrem/homePage.php");
    }
 }