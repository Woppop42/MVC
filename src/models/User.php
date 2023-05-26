<?php

class User extends Db 
{
    private $id_user;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $password;
    private $delivery_address;
    private $billing_adress;
    private $phone;
    private $verify_account;
    private $billing_address;
    private $token;








    public static function inscription(array $data)
    {
        $pdo = self::getDb();
        $sql = "INSERT INTO User (email, nom, prenom, pseudo, password)
        VALUES (:email, :nom, :prenom, :pseudo, :password)";
        $result = $pdo->prepare($sql);
        $result->execute($data);
    }

    public static function seConnecter(array $data, string $password)
    {
        $pdo = self::getDb();
        $sql = "SELECT * FROM User WHERE pseudo = :pseudo";
        $result = $pdo->prepare($sql);
        $result->execute($data);

        if($result->rowCount() > 0)
        {
            $result->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $result->fetch();
            
            if(password_verify($password, $user->password))
            {
                $_SESSION['pseudo'] = $user->pseudo;
                
            }else
            {
                die();
            }

        }
    }
}