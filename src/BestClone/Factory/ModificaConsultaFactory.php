<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 11/2/16
 * Time: 19:32
 */

namespace BestClone\Factory;


use BestClone\DB\DBInterface;
use BestClone\Domain\Consultas\Modificadores\AbstractModificador;
use BestClone\Domain\Consultas\Modificadores\CAutonomas\AddComunidadAutonoma;
use BestClone\Domain\Consultas\Modificadores\CAutonomas\DelAllComunidadAutonoma;
use BestClone\Domain\Consultas\Modificadores\CAutonomas\DelComunidadAutonoma;
use BestClone\Domain\Consultas\Modificadores\Provincias\AddAllProvincia;
use BestClone\Domain\Consultas\Modificadores\Provincias\AddProvincia;
use BestClone\Domain\Consultas\Modificadores\Provincias\DelAllProvincia;
use BestClone\Domain\Consultas\Modificadores\Provincias\DelProvincia;
use Symfony\Component\HttpFoundation\Request;

class ModificaConsultaFactory
{
    /**
     * @var AbstractModificador[]
     */
    private $modificadores = [
        'AddCCAA'    => AddComunidadAutonoma::class,
        'DelCCAA'    => DelComunidadAutonoma::class,
        'DelCCAAAll' => DelAllComunidadAutonoma::class,
        'AddProv'    => AddProvincia::class,
        'AddProvAll' => AddAllProvincia::class,
        'DelProv'    => DelProvincia::class,
        'DelProvAll' => DelAllProvincia::class
    ];

    /**
     * @var DBInterface
     */
    private $db;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param DBInterface $db
     */
    public function __construct(DBInterface $db, \Twig_Environment $twig)
    {
        $this->db = $db;
        $this->twig = $twig;
    }

    /**
     * @param Request $request
     *
     * @return AbstractModificador
     */
    public function getModificador(Request $request)
    {
        $tipo = $request->get('tipo');

        if (!isset($this->modificadores[$tipo])) {
            throw new \InvalidArgumentException("Modificador del tipo {$tipo} no soportado");
        }

        $class = $this->modificadores[$tipo];

        /** @var AbstractModificador $modificador */
        $modificador = new $class($this->db, $this->twig);
        $modificador->setRequest($request);

        return $modificador;
    }

}