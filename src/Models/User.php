<?php

namespace Models;

use Exception;
use PDO;

class User extends Database
{

    private $username;
    private $mail;
    private $password;

    public function getUsername()
    {
        return $this->username;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($value)
    {

        if (empty($value)) throw new Exception("Votre nom d'utilisateur ne peut pas être vide");
        if (strlen($value) < 3 && strlen($value) > 30) throw new Exception("Le nom d'utilisateur doit être entre 3 et 30 lettres");
        if ((preg_match('/^[a-zA-Z0-9]+$/', $value))) throw new Exception("Le nom d'utilisateur ne peut contenir que des lettres ou des chiffres");

        $this->username = htmlspecialchars($value);
    }
    public function setMail($value)
    {
        if (empty($value)) throw new Exception("Vous devez renseignez votre mail");


        $this->mail = htmlspecialchars($value);
    }
    public function setPassword($value)
    {

        if (empty($value)) throw new Exception("Vous devez creer un mot de passe");


        $this->password = htmlspecialchars($value);
    }
    /**
     * registers User in Database
     * @return boolean true if successful, false otherwise
     */
    public function registerUser()
    {
        $queryExecute = $this->db->prepare("INSERT INTO `user`(`username`,`mail`,`password`) 
        VALUES (:username,:mail,:password)");

        $queryExecute->bindValue(":username", $this->username, PDO::PARAM_STR);
        $queryExecute->bindValue(":mail", $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(":password", $this->password, PDO::PARAM_STR);

        return $queryExecute->execute();
    }
}
