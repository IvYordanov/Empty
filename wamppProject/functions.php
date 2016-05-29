<?php

function my_adminheader() {
    error_reporting(E_ALL ^ E_NOTICE);
    //session_start();


    if ($_SESSION['is_logged'] !== true && $_SESSION['user_info']['type'] != 3) {
        header('Location:../index.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css"  href="../css/index.css" /> 
            <link rel="stylesheet" type="text/css" media="screen" href="../css/superfish.css" /> 
            <link  rel="stylesheet" type="text/css" href="../css/StyleMenu.css" />
            <link  rel="stylesheet" type="text/css" href="../css/styleSwipe.css" />
            <script type="text/javascript" src="../js/jquery1.7.1.min.js"></script>
            <title><?php echo $title; ?></title>
        </head>
        <body>
            <br/>
            <div id="mysite">
                <h1>  <span style="color:#F0FC03">Сайт на Иван Йорданов </span></h1>
            </div>
            <div class="midle"></div>
            <div class="bottom">
                <br/>   <br/>  <br/>       
                <div id="menu-content">
                    <ul id="main-menu">
                        <li><a href="../index.php">Начало</a></li>
                        <li><a href="groups.php">Групи форуми</a></li>
                        <li><a href="../aboutmy.php">За мен</a></li>

                        <li><a href="../logout.php">Изход</a></li>

                    </ul>
                </div>
                <br/>
            </div>
            <div class="main-content">
                <div class="text"> <h3><em> Добре дошъл,
                            <?php
                            echo $_SESSION['user_info']['login'] . '!</em></h3><br>';
                            ?>
                            </div>

                            <hr width="95%" size="5px"/><br/>

                            <div id="top_menu">

                            </div>
                            <?php
                        }

                        function my_header($title) {
                            error_reporting(E_ALL ^ E_NOTICE);
                            session_start();
                            ?>
                            <!DOCTYPE html>
                            <html>
                                <head>
                                    <meta charset="UTF-8">
                                    <link rel="stylesheet" type="text/css"  href="css/index.css" /> 
                                    <link rel="stylesheet" type="text/css" media="screen" href="css/superfish.css" /> 
                                    <link  rel="stylesheet" type="text/css" href="css/StyleMenu.css" />
                                    <link  rel="stylesheet" type="text/css" href="css/styleSwipe.css" />
                                    <script type="text/javascript" src="js/jquery1.7.1.min.js"></script>
                                    <title><?php echo $title; ?></title>
                                </head>
                                <body>
                                    <br/>
                                    <div id="mysite">
                                        <h1>  <span style="color:#F0FC03">Сайт на Иван Йорданов </span></h1>
                                    </div>
                                    <div class="midle"></div>
                                    <div class="bottom">
                                        <br/>   <br/>  <br/>       
                                        <div id="menu-content">
                                            <ul id="main-menu">
                                                <li><a href="index.php">Начало</a></li>
                                                <li><a href="aboutmy.php">За мен</a></li>

                                                <?php
                                                if ($_SESSION['is_logged'] === true) {

                                                    echo '<li><a href="logout.php">Изход</a></li>';
                                                    if ($_SESSION['user_info']['type'] == 3) {
                                                        echo '<li><a href="admin/index.php">Администраторски панел</a></li>';
                                                    }
                                                } else {
                                                    echo '<li><a href="register.php">Регистрирай се! </a> </li> '
                                                    . '<li>  <a href="login.php"> Влез</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="main-content">
                                        <div class="text"> <h3><em> Добре дошъл,
                                                    <?php
                                                    echo $_SESSION['user_info']['login'] . '!</em></h3><br>';
                                                    ?>
                                                    </div>

                                                    <hr width="95%" size="5px"/><br/>

                                                    <div id="top_menu">

                                                    </div>
                                                    <?php
                                                }

                                                function slide() {
                                                    ?>    
                                                    <div id="mySwipe" class="swipe">
                                                        <div class="swipe-wrap">
                                                            <div><img src="img/image-1.jpg" alt="Снимка"></div>
                                                            <div><img src="img/image-2.jpg" alt="Снимка"></div>
                                                            <div><img src="img/image-3.jpg" alt="Снимка"></div>
                                                            <div><img src="img/image-4.jpg" alt="Снимка"></div>
                                                        </div>
                                                    </div>

                                                    <div class="controls">
                                                        <button class="prev">Върни снимката</button>
                                                        <button class="next">Следваща</button>
                                                    </div>
                                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                                                    <script src="js/swipe.js"></script>
                                                    <script src="js/custom.js"></script>
                                                    <script src="js/customSwipe.js"></script>
                                                    <?php
                                                }

                                                function footerFunction() {
                                                    ?>
                                                    </div>
                                                    <div id="footer">
                                                        <h4 style="text-align:center">yordanov.my.contact.bg</h4> 
                                                    </div>
                                                    <?php
                                                    echo ' </body></html>';
                                                }

                                                function db_init() {
                                                    mysql_connect('localhost', 'root', 'qwerty') or die('Няма връзка с сървъра!');
                                                    mysql_select_db('mcf') or die('Немога да избера база данни!');
                                                }

                                                function selectionMenu() {
                                                    if ($_SESSION['is_logged'] == true) {
                                                        
                                                    } else {
                                                        footerFunction();
                                                        ?>
                                                        echo '<script type=text/javascript >window.alert("Влез в системата или се регистрирай!");</script>
                                                        <?php
                                                        exit;
                                                    }
                                                }
                                                