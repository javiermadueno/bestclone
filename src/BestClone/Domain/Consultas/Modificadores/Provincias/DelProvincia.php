<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 12/2/16
 * Time: 17:26
 */

namespace BestClone\Domain\Consultas\Modificadores\Provincias;



class DelProvincia extends AbstractModificadorProvincia
{
    protected $commandName = 'DelProv';


    function modify()
    {
        $sql = "exec spDelProv ?, ?, ?, ?";

        $stmt = $this->db->prepare($sql);
        $this->bindValues($stmt);

        if(!$stmt->execute()) {
            throw new \RuntimeException("Error al ejecutar la consulta '{$sql}'. Error: " . print_r($stmt->errorInfo()));
        }

        $this->result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}