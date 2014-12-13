<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Wazzabi\AppBundle\Entity\Momento;
use Wazzabi\AppBundle\ORM\Migrations\AbstractContainerAwareMigration;

class Version20141206191008 extends AbstractContainerAwareMigration
{
    /**
     * @var array
     */
    private $momentos = array('Mañana', 'Tarde', 'Noche', 'Madrugada');

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        foreach ($this->momentos as $momento) {
            $this->getEntityManager()->persist($this->crearMomento($momento));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        foreach ($this->momentos as $momento) {
            $this->getEntityManager()->remove($this->obtenerMomento($momento));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param string $descripcion
     *
     * @return Momento
     */
    private function crearMomento($descripcion)
    {
        $momento = new Momento();
        $momento->setDescripcion($descripcion);

        return $momento;
    }

    /**
     * @param $descripcion
     *
     * @return Momento
     */
    private function obtenerMomento($descripcion)
    {
        return $this->getEntityManager()->getRepository('AppBundle:Momento')->findOneBy(
            array('descripcion' => $descripcion)
        );
    }
}
