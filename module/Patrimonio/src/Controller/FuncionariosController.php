<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 12/01/2017
 * Time: 13:17
 */

namespace Patrimonio\Controller;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Patrimonio\Entity\Funcionarios;
use Patrimonio\Form\FuncionariosForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FuncionariosController extends AbstractActionController
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $funcionariosRepository;

    public function __construct(EntityManager $entityManager, EntityRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->funcionariosRepository = $repository;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'funcionarios' => $this->funcionariosRepository->findAll()
        ));
    }

    public function novoAction()
    {
        $form = new FuncionariosForm();
        $request = $this->getRequest();
        $msg = false;
        if($request->isPost())
        {
            $data = $request->getPost();
            $form->setData($data);
            $funcionarios =  new Funcionarios();
            $funcionarios->setAllData($data);

            $this->entityManager->persist($funcionarios);
            $this->entityManager->flush();
            $msg = 'Funcionário adicionado com sucesso';
        }

        return new ViewModel(['form' => $form, 'msg' => $msg]);
    }

    public function editarAction()
    {
        $id = $this->params()->fromRoute('id');
        $form = new FuncionariosForm();
        $request = $this->getRequest();
        $msg = false;
        if($request->isPost())
        {
            $data = $request->getPost();
            $form->setData($data);
            $funcionarios =  new Funcionarios();
            $funcionarios->setAllData($data);
            $funcionarios->setId($id);
            $this->entityManager->merge($funcionarios);
            $this->entityManager->flush();
            $msg = 'Funcionário alterado com sucesso';
        }
        $funcionariosRepository = $this->funcionariosRepository->findOneBy(['id' => $id]);
        return new ViewModel(['form' => $form, 'funcionario' => $funcionariosRepository, 'msg' => $msg]);
    }

    public function excluirAction()
    {
        $id = $this->params()->fromRoute('id');
        $funcionariosRepository = $this->funcionariosRepository->findOneBy(['id' => $id]);
        $this->entityManager->remove($funcionariosRepository);
        $this->entityManager->flush();
        return new ViewModel();
    }

    public function visualizarAction()
    {
        $id = $this->params()->fromRoute('id');
        $funcionariosRepository = $this->funcionariosRepository->findOneBy(['id' => $id]);
        return new ViewModel(['funcionario' => $funcionariosRepository]);
    }

}