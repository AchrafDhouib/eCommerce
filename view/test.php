<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
require_once ".././model/account.class.php";
$us=new Account();
$res=$us->listAccount();
?>

    <table border=1 class="table table-striped">
        <tr>
            <td> ID </td>
            <td> username </td>
            <td> email </td>
        </tr>
        <?php foreach ($res as $row){?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['user_name']?></td>
            <td><?php echo $row['email']?></td>
        </tr> <?php }?>
    </table>
    </div>
    </div>
    </div>

</body>

</html>