<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 4/2/16
 * Time: 21:02
 */

namespace BestClone;


use BestClone\DB\Mssql;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Init
{
    /**
     * @var Mssql
     */
    private $db;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param Mssql            $db
     * @param SessionInterface $session
     */
    public function __construct(Mssql $db, SessionInterface $session)
    {
        $this->db = $db;
        $this->session = $session;
    }


    /**
     * @return bool
     */
    public function init()
    {
        $user = $this->session->get('id');
        $SQL = "exec spInitTablas :user";
        $stmt = $this->db->prepare($SQL);
        $stmt->bindParam(':user', $user);
        if (!$stmt->execute()) {
            return false;
        }

        return true;
    }

}