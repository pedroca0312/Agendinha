<?php

    session_start();

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuarios = file_get_contents('usuarios.json');
    $usuarios = json_decode($usuarios, true);

    $usuario_existe = false;


    foreach ($usuarios as $usuario){

        if ($login == $usuario['login'] AND $senha == $usuario['senha']) {

            $usuario_existe = true;

            $_SESSION['usuario_nome'] = $_POST['nome'];
            $_SESSION['usuario_login'] = $login;
            $_SESSION['usuario_senha'] = $senha;
            $_SESSION['usuario_online'] = true;
            header('Location: index.phtml');


        }
    }

    if ($usuario_existe == false){
        header('Location: login.php');
    }



