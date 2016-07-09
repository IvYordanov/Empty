<?php 

session_start();
include '../functions.php';
my_adminheader('Групи форуми');
db_init();
if ($_POST[ng] == 1) {
    $name = addslashes(trim($_POST['group_name']));
    $desc = addslashes(trim($_POST['desc']));
    $rs = run_q('SELECT *  FROM group_cat WHERE name = "' . $name . '"');
    if (!mysql_numrows($rs) > 0) {
        $id=(int)$_POST['edit_id'];
    if($id>0){
        run_q('UPDATE group_cat SET name= "'.$name.'",descs="'.$desc.'" WHERE group_cat_id='.$id);
        echo '<h1>Успешно обновяване!</h1>';
        }
else{
            run_q('INSERT INTO group_cat (name,date_added,descs) VALUES ("' . $name . '",' . time() . ',"' . $desc . '")');
        echo '<h1>Записано успешно!</h1>';
}
    } else {
        echo '<h1>Името съществува!</h1>';
    }
}
$rs = run_q('SELECT * FROM group_cat');
echo '<table border="2"><tr><td>Име на темата:</td><td>Описание:</td><td>Редактирай</td><tr>';
while ($row = mysql_fetch_assoc($rs)) {
    echo '<tr><td>' . $row ['name'] . '</td><td>' . $row ['descs'] . '</td>
        <td> <a href="groups.php ? mode=edit&id=' . $row ['group_cat_id'] . '">Редактирай</a></td></tr>';
}
if ($_GET ['mode'] == "edit" && $_GET ['id'] > 0) {
    $id = (int) $_GET['id'];
    $rs = run_q('SELECT * FROM group_cat WHERE group_cat_id=' . $id);
    $ed_info = mysql_fetch_assoc($rs);
}
echo '
<br><br>
<form action="groups.php" method="post">
    <table border="0">
        <tr>
            <td> Име на темата:</td><td><input type="text" name="group_name" value="' . $ed_info ['name'] . '"></td><br/><tr>
            <td> Описание:</td><td><textarea name="desc" rows="5" cols="50">' . $ed_info ['descs'] . '</textarea></td><br/><tr>
            <td> <input type="submit" value="Запиши"></td>
        <input type="hidden" name="ng" value="1">
    </table>
    ';
if ($_GET['mode'] == "edit") {
    echo '<input type="hidden" name="edit_id" value="' . $_GET ['id'] . '">';
}
echo '</table>';
echo'</form>';
footerFunction();

