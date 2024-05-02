<?php        
class Account
{
    public $id;
    public $user_name;
    public $email;
    public $pwd;
    public $role;

    function verifyAccount()
    {
        require_once('pdo.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM account WHERE email='$this->email'";
        $res=$pdo->query($req) or print_r($pdo->errorInfo()); 	
        if($res->rowCount()== 0)
            return false;
        return true;
    }
    function getUser()
        {
            require_once('pdo.php');
            $cnx=new connexion();
            $pdo=$cnx->CNXbase();
            $req="SELECT * FROM account WHERE email='$this->email'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo());
            try {
                $data = $res->fetch(PDO::FETCH_ASSOC);
                if ($data)
                    if (password_verify($this->pwd, $data['pwd']))
                        return $data;
            }
            catch (PDOException $e){
                echo "ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine();
            }
        }
    
    function insertAccount()
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $hashed_pwd = password_hash($this->pwd, PASSWORD_DEFAULT);
            $req = "INSERT INTO account (email,pwd,user_name) VALUES ('$this->email','$hashed_pwd','$this->user_name')";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }

    function listAccount()
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "SELECT id,user_name,email,role FROM account";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }
    function updateAccount($id)
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "UPDATE account SET  user_name='$this->user_name', email='$this->email', pwd='$this->pwd' WHERE id=$this->id";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }  

    function updateAccountRole($id, $role)
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "UPDATE account SET  role='$role' WHERE id=$id AND  role!='2'";
            $pdo->exec($req) or print_r($pdo->errorInfo());
        }

    function addToCart($product_id, $quantity)
        {
            require_once('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $check_req = "SELECT * FROM cart WHERE user_id='$this->id' AND product_id='$product_id'";
            $check_res = $pdo->query($check_req) or print_r($pdo->errorInfo());
            if ($check_res->rowCount() > 0) {
                $existing_cart_item = $check_res->fetch(PDO::FETCH_ASSOC);
                $new_quantity = $existing_cart_item['quantity'] + $quantity;
                $update_req = "UPDATE cart SET quantity='$new_quantity' WHERE user_id='$this->id' AND product_id='$product_id'";
                $pdo->exec($update_req) or print_r($pdo->errorInfo());
            } else {
                $req = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$this->id', '$product_id', '$quantity')";
                $pdo->exec($req) or print_r($pdo->errorInfo());
            }
        }
    function getCartContents()
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "SELECT c.*,p.name, p.price,p.discount,p.photo FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id='$this->id'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }
        function getCartProduct($product_id)
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "SELECT c.*,p.name, p.price,p.discount,p.photo FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id='$this->id' AND product_id='$product_id'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }
        function deleteCartProduct($product_id)
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req = "DELETE FROM cart WHERE user_id='$this->id' AND product_id='$product_id'";
            $pdo->exec($req);
        }
    function sellOperation($product_id, $originQuantity ,$sellQuantity)
        {
            require_once ('pdo.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
            $req1 = "DELETE FROM cart WHERE id='$this->id'";
            $req2 = "UPDATE product SET quantity=$originQuantity-$sellQuantity WHERE id=$product_id";
            $pdo->exec($req1) or print_r($pdo->errorInfo());
            $pdo->exec($req2) or print_r($pdo->errorInfo());
        }
}
?>