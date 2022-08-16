<?php

/**
 * Classe para conexao com DB
 */
class Database
{

    private $database = "carros_db";
    private $username = "root";
    private $password = "usbw";
    private $hostname = "localhost";

    /**
     * Método estabelecendo conexao com DB
     */
    public function conectar()
    {
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        mysqli_set_charset($conn, 'utf8');
        if ($conn) {
            return $conn;
        } else {
            throw new Exception("Nao foi possivel estabelecer conexao com o Banco de daos");
        }
    }
}
