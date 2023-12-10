<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="/img/logoAdmin.png">
    <link rel="stylesheet" href="/css/admin/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <header style="
                position: fixed;
                top: 0;
                left: 0;
                z-index: 99;
                background-color: gray;
            ">