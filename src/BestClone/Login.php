<?php

/**
 * Created by PhpStorm.
 * User: javi
 * Date: 4/2/16
 * Time: 0:19
 */
namespace BestClone;

use BestClone\DB\DBInterface;
use BestClone\DB\Mssql;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Login
{
    /**
     * @var Mssql
     */
    private $db;

    /**
     * @var SessionInterface
     */
    private $session;


    public function  __construct(DBInterface $DBInterface = null)
    {
        global $db, $session;
        $this->db = $db;
        $this->session = $session;
    }

    /**
     * @param null|string $user
     * @param null $pass
     *
     * @return bool
     */
    public function login($user = null, $pass = null)
    {
        $SQL = "select ID, Usuario, Contrasena, Nivel From Usuarios where Usuario = :user and Activa = 1";
        $stmt = $this->db->consulta($SQL);
        $stmt->bindParam('user', $user);

        if(!$stmt->execute()) {
            return false;
        }

        if($stmt->rowCount() == 0) {
            return false;
        }

        $datos = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (($user == $datos['Usuario']) && ($pass == md5($datos['Contrasena']))) {
            $this->initSession($datos);
        } else {
            return false;
        }

        return true;
    }

    private function initSession($datos)
    {
        $this->session->set('id', $datos['ID']);
        $this->session->set('user', $datos['Usuario']);
        $this->session->set('pass', md5($datos['Contrasena']));
        $this->session->set('nivel', $datos['Nivel']);
    }

}