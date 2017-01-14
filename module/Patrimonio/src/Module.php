<?php

namespace Patrimonio;

use Patrimonio\Controller\EquipamentosController;
use Patrimonio\Controller\Factory\EquipamentosControllerFactory;
use Patrimonio\Controller\FuncionariosController,
    Patrimonio\Controller\Factory\FuncionariosControllerFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerPluginProviderInterface
{
    const VERSION = '1.0.0dev';

    public function getControllerPluginConfig()
    {
        return [];
    }

    public function getServiceConfig()
    {
        return [];
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                FuncionariosController::class => FuncionariosControllerFactory::class,
                EquipamentosController::class => EquipamentosControllerFactory::class
            ]
        ];
    }
}
