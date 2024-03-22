<?php
require_once "header.php";
require_once ".././model/session.php";
Verifier_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="col-md-6 col-xs-12 ">
    <div class="panel panel-info">
      <h1 class='panel-heading'>Liste des étudiants</h1>
      <div class='panel-body'>


        <table border=1 class="table table-striped">
          <tr>
            <td> ID </td>
            <td> Prénom </td>
            <td> Nom </td>
            <td> Sexe </td>
            <td>An_Naissance</td>
            <td> Photo </td>
            <td>Opérations</td>
          </tr>
        </table>
      </div>
    </div>
  </div>


</body>

</html>