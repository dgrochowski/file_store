<?php

$files = scandir('../files/');

$fileKey = isset($_GET['get']) ? (int) $_GET['get'] : null;
if ($fileKey && $fileKey >= 2) {
    $file = sprintf("../files/%s", $files[$fileKey]);
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=".basename($file).";");
    header("Accept-Ranges: bytes");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($file));
    readfile($file);
}

echo $twig->render('app.html.twig', [
    'title' => 'File store',
    'subtitle' => 'Pliki do pobrania',
    'files' => $files,
    'logout' => true,
]);
