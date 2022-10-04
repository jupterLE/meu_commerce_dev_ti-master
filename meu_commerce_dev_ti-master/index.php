<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="stilo/menu.css">


<?php
session_start();

if (isset($_GET['debug'])) {
    $_SESSION['debug'] = $_GET['debug'];
}

if (isset($_GET['pagina']) && $_GET['pagina'] == 'logout') {
    session_destroy();
    session_start();
    header('Location ?');
}

include_once 'lib/conexao.php';
include_once 'lib/sql.php';
include_once 'lib/autenticar.php';

//limpar sacola
if (isset($_POST['limpar_sacola'])) {
    unset($_SESSION['sacola']);
}
//adicionar a sacola
if (isset($_POST['adicionar_sacola'])) {
    $_SESSION['sacola'][] = $_GET['id'];
}
//remover da sacola
if (isset($_POST['remover_sacola'])) {
    unset($_SESSION['sacola'][$_POST['produto']]);
}

include 'home.php';

if (isset($_SESSION['debug'])) {
    if ($_SESSION['debug'] == true) {
        include 'lib/debug.php';
    }
}