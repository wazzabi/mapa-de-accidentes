<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Wazzabi\AppBundle\Entity\Gravedad;
use Wazzabi\AppBundle\ORM\Migrations\AbstractContainerAwareMigration;

class Version20141206200526 extends AbstractContainerAwareMigration
{
    /**
     * @var array
     */
    private $gravedades = array('Susto', 'Daños materiales', 'Personas Heridas');

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        foreach ($this->gravedades as $gravedad) {
            $this->getEntityManager()->persist($this->crearGravedad($gravedad));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        foreach ($this->gravedades as $gravedad) {
            $this->getEntityManager()->persist($this->obtenerGravedad($gravedad));
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @param string $descripcion
     *
     * @return Gravedad
     */
    private function crearGravedad($descripcion)
    {
        $gravedad = new Gravedad();
        $gravedad->setDescripcion($descripcion);

        return $gravedad;
    }

    private function obtenerGravedad($descripcion)
    {
        return $this->getEntityManager()->getRepository('AppBundle:Gravedad')->findOneBy(
            array('descripcion' => $descripcion)
        );
    }
}
