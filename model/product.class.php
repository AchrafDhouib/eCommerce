<?php
class Product
{
    /* attributs de la classe utilisateur*/

    public $id;
    public $name;
    public $price;
    public $discount;
    public $quantity;
    public $photo;
    public $description;
    /* constructeur de la classe */


    function insertProduct()
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = `INSERT INTO product (name, price, discount, quantity, photo) VALUES
        ('$this->name','$this->price','$this->discount',$this->quantity, '$this->photo', '$this->description')`;
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function listProducts()
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "SELECT * FROM product";
        $res = $pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function getProduct($id)
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "SELECT * FROM product where id=$id";
        $res = $pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function modifyProduct($id)
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = `UPDATE product SET  name='$this->name', price='$this->price', discount='$this->discount', quantity=$this->quantity, photo='$this->photo', description='$this->description' WHERE id=$id`;
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function modifyProductWithoutPhoto($id)
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = `UPDATE product SET  name='$this->name', price='$this->price', discount='$this->discount', quantity=$this->quantity WHERE id=$id`;
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function deleteProduct($id)
    {
        require_once ('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "DELETE FROM product WHERE id='$id'";
        $pdo->exec($req);
    }
} ?>