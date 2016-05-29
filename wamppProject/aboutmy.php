<?php
session_start();
include 'functions.php';

   my_header('За мен');
   selectionMenu();
    $photo = '<br><img src="fotos/photo.JPG" alt="Снимка" class="right"/>';
    echo $photo;
    echo '<h1 style="text-align:center">Здравейте!</h1>';
    footerFunction();





