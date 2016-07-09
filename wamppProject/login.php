<?php
session_start();
include 'functions.php';
my_header('вход');

if ($_POST['form_login'] == 1) {
    $login = trim($_POST['login_name']);
    $pass = trim($_POST['login_pass']);

    if (strlen($login) > 3 && strlen($pass) > 3) {
        db_init();
        $rs = run_q('SELECT * FROM users WHERE login = "' . addslashes($login) . '" AND password = "' . md5($pass) . '"');

        if (mysql_num_rows($rs) == 1) {
            $row = mysql_fetch_assoc($rs);
            if ($row['active'] == 1) {
                $_SESSION['is_logged'] = true;
                $_SESSION['user_info'] = $row;
                header('Location:index.php');
                exit();
            }
 else {
                echo 'Достъпът ви е спрян!!!';
 }
        } elseif (mysql_num_rows($rs) == 0) {
            $errorname ='Грешно име или парола!';
            
        } else {
            echo '<h1 style="text-align:center" color="red">FATAL ERROR!!!</h1>'; //ЗАПИСВАНЕ НА ДАННИТЕ НА ПОТРЕБИТЕЛЯ.
        }
    }
}
?>

<form action='login.php' method="post">
    <table border="0">
        <tr>
            <td> Потребителско име:</td><td><input type="text" name="login_name"><?php echo $errorname;?></td>
        <tr>
            <td>Парола:</td><td><input type="password" name="login_pass"></td>
        <tr>
            <td colspan="2"><input type="submit" value="Влез">
                <input type="hidden" name="form_login" value="1"></td>

    </table>
</form>
<?php
footerFunction();
