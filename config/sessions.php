<?php
//Creamos una funcion para cuando el usuario no este autenticado, hace el redirect al login
function usuario_autenticado() {
    if(!revisar_usuario() ) {
        header('Location:login.php');
        exit();
    }
}
// Esta funcion revisa que exista la variable de session email, si existe quiere decir que el usuario se autentico con exito
function revisar_usuario() {
    return isset($_SESSION['email']);
}
session_start();
usuario_autenticado();