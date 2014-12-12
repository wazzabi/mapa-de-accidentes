<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Wazzabi\AppBundle\Entity\Interviniente;
use Wazzabi\AppBundle\ORM\Migrations\AbstractContainerAwareMigration;

class Version20141206193437 extends AbstractContainerAwareMigration
{
    private $intervinientes = array('Peatón', 'Auto', 'Bicicleta', 'Otro');

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        foreach ($this->intervinientes as $interviniente) {
            $this->getEntityManager()->persist($this->crearInterviniente($interviniente));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        foreach ($this->intervinientes as $interviniente) {
            $this->getEntityManager()->persist($this->obtenerInterviniente($interviniente));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param string $descripcion
     *
     * @return Interviniente
     */
    private function crearInterviniente($descripcion)
    {
        $interviniente = new Interviniente();
        $interviniente->setDescripcion($descripcion);

        return $interviniente;
    }

    /**
     * @param $descripcion
     *
     * @return Interviniente
     */
    private function obtenerInterviniente($descripcion)
    {
        return $this->getEntityManager()->getRepository('AppBundle:Interviniente')->findOneBy(
            array('descripcion' => $descripcion)
        );
    }
}
