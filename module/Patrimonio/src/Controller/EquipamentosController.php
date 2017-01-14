<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 13/01/2017
 * Time: 13:37
 */

namespace Patrimonio\Controller;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Patrimonio\Entity\Equipamentos;
use Patrimonio\Form\EquipamentosForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EquipamentosController extends AbstractActionController
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $equipamentosRepository;
    /**
     * @var EntityRepository
     */
    private $funcionariosRepository;

    public function __construct(EntityManager $entityManager, EntityRepository $equipamentosRepository, EntityRepository $funcionariosRepository)
    {
        $this->entityManager = $entityManager;
        $this->equipamentosRepository = $equipamentosRepository;
        $this->funcionariosRepository = $funcionariosRepository;
    }

    public function indexAction()
    {
        return new ViewModel([
            'equipamentos' => $this->equipamentosRepository->findAll()
        ]);
    }

    public function novoAction()
    {
        $form =  new EquipamentosForm();
        $funcionarios = $this->funcionariosRepository->findAll();
        $d = ['' => 'Selecione um funcionário'];
        foreach ($funcionarios as $funcionario)
        {
            $i = $funcionario->getID();
            $v = $funcionario->getNome() . ' ' . $funcionario->getNomeMeio() . ' ' . $funcionario->getSobrenome();
            $d[$i] = $v;
        }
        $form->get('funcionarios_id')->setValueOptions($d);
        $request = $this->getRequest();
        $msg = false;
        if($request->isPost())
        {
            $data = $request->getPost();
            $form->setData($data);
            $equipamentos = new Equipamentos();
            $equipamentos->setSigla($data->sigla);
            $equipamentos->setMarca($data->marca);
            $equipamentos->setModelo($data->modelo);
            if(!empty($data->cliente)){
                $equipamentos->setCliente($data->cliente);
            }
            if(!empty($data->local_atual)){
                $equipamentos->setLocalAtual($data->local_atual);
            }
            if(!empty($data->descricao)){
                $equipamentos->setDescricao($data->descricao);
            }
            if(!empty($data->descricao)){
                $equipamentos->setObservacao($data->descricao);
            }
            if(!empty($data->data_aquisicao)){
                $equipamentos->setDataAquisicao($data->data_aquisicao);
            }
            if(!empty($data->identificacao)){
                $equipamentos->setIdentificacao($data->identificacao);
            }
            if(!empty($data->acessorios)){
                $equipamentos->setAcessorios($data->acessorios);
            }
            if(!empty($data->disponivel)){
                $equipamentos->setDisponivel($data->disponivel);
            }
            if(!empty($data->funcionarios_id)){
                $funcionarios = $this->funcionariosRepository->find($data->funcionarios_id);
                $equipamentos->setFuncionarios($funcionarios);
            }
            $this->entityManager->persist($equipamentos);
            $this->entityManager->flush();
            $msg = "Equipamento adicionado com sucesso.";

        }
        return new ViewModel(['form' => $form, 'msg' => $msg]);
    }

    public function visualizarAction()
    {
        $id = $this->params()->fromRoute('id');
        $equipamentos = $this->equipamentosRepository->find($id);
        return new ViewModel(['equipamentos' => $equipamentos]);
    }
}