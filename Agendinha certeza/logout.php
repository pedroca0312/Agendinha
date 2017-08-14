<?php

    session_start();

    function sair (){
    session_destroy();
    header('Location: login.php');

    }

    if ($_POST['logout_form'] == "Sair"){
    sair();

    }