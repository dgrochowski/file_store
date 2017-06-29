<?php

$pin = isset($_POST['pin']) ? (int) $_POST['pin'] : null;

if ($pin && $pin !== 0) {
    $pinValue = (int) file_get_contents('../pin');
    if ($pin === $pinValue) {
        $_SESSION['login'] = true;
        header('Location: /');
        exit();
    }
}

$error = false;
if (isset($_POST['pin']) && !isset($_SESSION['login'])) {
    $error = true;
}

if (!isset($_SESSION['login'])) {
    echo $twig->render('login.html.twig', [
        'title' => 'File store',
        'subtitle' => 'Logowanie',
        'error' => $error,
    ]);
    exit();
}


