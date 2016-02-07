<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 6/2/16
 * Time: 19:17
 */

namespace BestClone\Domain\Consultas;

use Symfony\Component\HttpFoundation\Request;


/**
 * Esta clase devuelve el codigo html de una tabla dados los datos de una consulta SQL
 *
 * Class HTMLTableConsultasTransaction
 * @package BestClone\Services
 */
class HTMLTableConsultasTransaction
{
    private $consultasGateway;

    public function __construct(ConsultasGateway $consultasGateway)
    {
        $this->consultasGateway = $consultasGateway;
    }
    //TODO: Lo suyo seria inyectar Twig como dependencia para renderizar la plantilla HTML

    public function generateTables(Request $request)
    {
        $user = $request->get('User');
        $consulta = $request->get('Consulta');

        $tipos = $this
            ->consultasGateway
            ->cargarConsulta($user, $consulta);

        $result = [];

        foreach ($tipos as $tipo => $rowset ) {
            $result[$tipo] = $this->generateTable($rowset, $tipo);
        }

        return $result;

    }

    protected function generateTable($rowset, $tipo)
    {
        $GeneraTabla = "<table class=\"tbl\">\n";
        $GeneraTabla .= " <caption class=\"Titulo\">Elementos seleccionados</caption>";
        // Cabecera con los nombres de la tabla
        $GeneraTabla .= " <tr class=tbl-row>\n";

        foreach($rowset as $campo => $value) {
            $GeneraTabla .= "<td><span> {$campo} </span></td>\n";
        }
        $GeneraTabla .= " </tr>\n";

        $j = 0;

        foreach($rowset as $datos) {

            $j++;
            if ($j % 2) {
                $GeneraTabla .= " <TR class=\"normal\">\n";
            } else {
                $GeneraTabla .= " <TR class=\"alterna\">\n";
            }

            for ($i = 1; $i < count($datos); $i++) {
                if ($JS == 'DelDist') {
                    $GeneraTabla .= "	<TD onclick=\"$JS('$datos[0]$datos[1]$datos[2]', '$datos[1]-$datos[2]');\"> " . htmlentities($datos[$i]) . " </TD>\n";
                    if ($i == 1) {
                        $Seleccion .= $datos[1] . '-' . $datos[2] . ', ';
                    }
                } else {
                    $GeneraTabla .= "	<TD onclick=\"$JS('" . utf8_encode($datos[$indice]) . "', '" . utf8_encode($datos[1]) . "');\"> " . utf8_encode($datos[$i]) . " </TD>\n";

                    if ($i == 1) {
                        $Seleccion .= utf8_encode($datos[1]) . ', ';
                    }
                }
            }
            if (substr($JS, 0, 3) == 'Del') {
                $GeneraTabla .= "	<TD onclick=\"$JS('" . utf8_encode($datos[$indice]) . "', '" . utf8_encode($datos[1]) . "');\"> <img src=\"images/delete.gif\" class=\"Icono\" alt=\"Quitar '" . utf8_encode($datos[1]) . "'\" title=\"Quitar '" . utf8_encode($datos[1]) . "'\"> </TD>\n";
            } else {
                $GeneraTabla .= "	<TD onclick=\"$JS('" . utf8_encode($datos[$indice]) . "', '" . utf8_encode($datos[1]) . "');\"> <img src=\"images/insert.gif\" class=\"Icono\" alt=\"Insertar '" . utf8_encode($datos[1]) . "'\" title=\"Insertar '" . utf8_encode($datos[1]) . "'\"> </TD>\n";
            }

            $GeneraTabla .= " </trd>\n";
        }
        $GeneraTabla .= "</table>\n";

        return $GeneraTabla;
    }

}