<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 11/01/2017
 * Time: 17:12
 */

namespace Patrimonio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }
    public function novoAction()
    {
        return new ViewModel();
    }

}