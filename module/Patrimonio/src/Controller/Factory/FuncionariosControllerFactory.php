<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 12/01/2017
 * Time: 15:03
 */

namespace Patrimonio\Controller\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Patrimonio\Controller\FuncionariosController;
use Interop\Container\Exception\ContainerException;
use Patrimonio\Entity\Funcionarios;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class FuncionariosControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(Funcionarios::class);
        return new FuncionariosController($entityManager, $repository);
    }


}