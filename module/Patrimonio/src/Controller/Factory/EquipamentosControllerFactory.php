<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 13/01/2017
 * Time: 13:45
 */

namespace Patrimonio\Controller\Factory;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Patrimonio\Controller\EquipamentosController;
use Patrimonio\Entity\Equipamentos;
use Patrimonio\Entity\Funcionarios;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class EquipamentosControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);
        $equipamentosRepository = $entityManager->getRepository(Equipamentos::class);
        $funcionariosRepository = $entityManager->getRepository(Funcionarios::class);
        return new EquipamentosController($entityManager, $equipamentosRepository, $funcionariosRepository);
    }


}