<?php
require("../../function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>DATA CATEGORIES</title>
</head>
<body>
    <div class="container py-5 shadow">
        <h1 class="text-center pb-5">DATA CATEGORIES</h1>
        <form action="proses_add_categories.php" method="post" enctype='multipart/form-data'>
            <div class="row mb-3">
                <input type="hidden" name="id">
                <label for="namakategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-4">
                    <input type="text" name="namakategori" class="form-control" id="namakategori">
                </div>
                <div class="me-auto p-2">
                    <button type="submit" class="btn btn-primary" name="submit">Create Data</button>
                </div>
            </div>
</form>