<?php
session_start();

use Cadastro\CRUD\Form;

require_once("../Models/Crud.php");


if (isset($_SESSION['msgUser'])) {
    echo $_SESSION['msgUser'];
    unset($_SESSION['msgUser']);
}
/**else {
    header('Location: ../Views/LoginScreen.php');
} 
 */

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdo</title>
</head>

<body>
    <?php
    $users = new Form;
    $users->showUsers();
    ?>
    <?php foreach ($users->getResult() as $key) : ?>
        <tr>
            <td><?php echo "ID :" . "{$key['idUser']}" . "</br>" ?></td>
            <td><?php echo "NOME :" . "{$key['Full_name']}" . "</br>" ?></td>
            <td><?php echo "EMAIL :" . "{$key['Email']}" . "</br>" ?></td>
            <td><?php echo "CPF :" . "{$key['Identity']}" . "</br>" ?></td>
            <td><?php echo "NASCIMENTO :" . "{$key['Birth']}" . "</br>" ?></td>
            <input type="submit" name="submit" id="submit" value="Excluir"><br>
            <?php if (isset($_POST['excluir'])) {
                $user = new Form();
                $user->deleteUser();
                header('Location: ../Views/Content.php');
            } ?>
        </tr>

    <?php endforeach ?>


</body>

</html>