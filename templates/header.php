<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['HTTP_HOST'] ?>/test2/assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">


    <title><?= isset($page_title) ? $page_title : "Mon site" ?></title>
</head>
<body>




<?php
    // load navbar in all pages
    require ROOTPATH . '/templates/navbar.php'; ?>