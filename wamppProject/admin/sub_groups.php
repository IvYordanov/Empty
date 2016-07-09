<?php

session_start();
include '../functions.php';
my_adminheader('Под групи');
db_init();
if ($_POST[ng] == 1) {

    $name = addslashes(trim($_POST['group_name']));
    $desc = addslashes(trim($_POST['descs']));
    $catid = (int) $_POST['group'];
    $id = (int) $_POST['edit_id'];
    if (strlen($name) > 4 && $catid > 0) {
 
        $rs = run_q('SELECT *  FROM cat WHERE name ="' . $name . '"AND cat_id !=' . $id);
        if (!mysql_numrows($rs) > 0) {

            if ($id > 0) {
                run_q('UPDATE cat SET name= "' . $name . '",descs="' . $desc . '",group_cat_id='.$catid.' WHERE cat_id=' . $id);
                echo '<h1>Успешно обновяване!</h1>';
            } else {
                run_q('INSERT INTO cat (name,date_added,descs,group_cat_id) VALUES ("' . $name . '",' . time() . ',"' . $desc . '",' . $catid . ')');

                echo '<h1>Записано успешно!</h1>';
            }
        } else {
            echo '<h1>Името съществува!</h1>';
        }
    } else {
        echo 'Недостатъчно дълго име на група!';
    }
}
$rs = run_q('SELECT  gc.name as gcname,c.name,c.descs,c.cat_id FROM group_cat as gc,cat as c WHERE gc.group_cat_id= c.group_cat_id');

echo '<table border="2"><tr><td>Тема</td><td>Име на темата</td><td>Коментари </td><td>Редактирай</td><tr>';
while ($row = mysql_fetch_assoc($rs)) {
    echo '<tr>'
    . '<td>' . $row['gcname'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['descs'] . '</td>
        <td> <a href="sub_groups.php ? mode=edit&id=' . $row ['cat_id'] . '">Редактирай</a></td></tr>';
}
echo '</table>';
if ($_GET ['mode'] == "edit" && $_GET ['id'] > 0) {
    $id = (int) $_GET['id'];
    $rs = run_q('SELECT * FROM cat WHERE cat_id=' . $id);
    $ed_info = mysql_fetch_assoc($rs);
}

$rs = run_q('SELECT * FROM group_cat');

echo '
<form  action="sub_groups.php" method="post">
Тема:<select name="group">';

while ($row = mysql_fetch_assoc($rs)) {
    if ($row ['group_cat_id'] == $ed_info['group_cat_id']) {
    
        echo '<option value="' . $row['group_cat_id'] . '"selected="selected">' . $row['name'] . '</option>';
    } else {
        echo '<option value="' . $row['group_cat_id'] . '">' . $row['name'] . '</option>';
    }
}

echo'</select> 
<br><br><br>
    <table border="0">
        <tr>
            <td> Име на темата:</td><td><input type="text" name="group_name" value="' . $ed_info ['name'] . '"></td><br/><tr>
            <td> Коментари:</td><td><textarea name="descs" rows="5" cols="50">' . $ed_info ['descs'] . '</textarea></td><br/><tr>
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
