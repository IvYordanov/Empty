<?php

session_start();
include 'functions.php';

my_header('Регистрация');
if (!$_SESSION['is_logged'] == true) {

    if ($_POST['form_submit'] == 1) {
        $login = trim($_POST['login']);
        $pas = trim($_POST['pass']);
        $pas2 = trim($_POST['pass2']);
        $email = trim($_POST['mail']);
        $name = trim($_POST['name']);

        if (strlen($login) < 4) {
            $error_array['login'] = 'Кратко име.Трябва да е поне 4 синвола!';
        }

        if (strlen($pas) < 4) {
            $error_array['pass'] = 'Кратка парола!';
        }

        if ($pas != $pas2) {
            $error_array['pass'] = 'Паролите не въпадат!';
        }

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            $error_array['mail'] = 'Невалиден Email адрес!';
        }

        if (!preg_match("/^[a-zA-Z0-9_]{3,16}$/", $name)) {
            $error_array['name'] = 'Невалидно име!';
        }

        if (!count($error_array) > 0) {
            db_init();
            $sql = 'SELECT COUNT(*) as cnt FROM users WHERE login="' . addslashes($login) . '" OR email="' . addslashes($email) . '"';
            $res = mysql_query($sql);
            $row = mysql_fetch_assoc($res);
            if ($row['cnt'] == 0) {
                mysql_query('INSERT INTO users (user_id,login,password,name,email,date_registerd)
VALUES ("","' . addslashes($login) . '","' . md5($pas) . '","' . addslashes($name) . '","' . addslashes($email) . '",' . time() . ')');
                if (mysql_error()) {
                    echo mysql_error();
                    $error_array['name'] = '<h1>Грешка.Моля опитаите отново!</h1>';
                } else {
                    header('Location: index.php');
                    exit;
                }
            } else {
                $error_array['login'] = 'Потребителско име или Email адреса е зает!';
                $error_array['mail'] = 'Потребителско име или Email адреса е зает!';
            }
        }
    }
    if ($error_array['name']) {
        echo $error_array['name'];
    }
    ?>
    <table border="0">
        <form action="register.php" method="post">

            <tr>   
                <td> <b>Потребителско име:</b></td><td><input type="text" name="login" value="" /></td>
                <?php

                if ($error_array['login']) {
                    echo $error_array['login'];
                }
                ?>
            <tr>
                <td> <b>Парола:</b></td><td><input type="password" name="pass" value="" size="30" /></td>
                <?php

                if ($error_array['pass']) {
                    echo $error_array['pass'];
                }
                ?>
            <tr>
                <td> <b>Повтори паролата:</b></td><td><input type="password" name="pass2" value="" size="30" /></td>
                <?php

                if ($error_array['pass2']) {
                    echo $error_array['pass2'];
                }
                ?>
            <tr>
                <td><b>Емейл адрес:</b></td><td><input type="text" name="mail" value="" /></td>
                <?php

                if ($error_array['mail']) {
                    echo $error_array['mail'];
                }
                ?>
            <tr>
                <td> <b>Име:</b></td><td><input type="text" name="name" value="" /></td>
    <?php

    if ($error_array['name']) {
        echo $error_array['name'];
    }
    ?>
            <tr>
                <td colspan="2">
                    <input type="submit" name="Регистрирай се" value="Регистрирай се" />
                    <input type="hidden" name="form_submit" value="1" />
                </td>
                </table>
        </form>
        <?php

        footerFunction();
    } else {
        header('Location: index.php');
        exit;
    }

            