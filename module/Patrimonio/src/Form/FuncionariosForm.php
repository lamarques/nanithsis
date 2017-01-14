<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 12/01/2017
 * Time: 17:25
 */

namespace Patrimonio\Form;


use Zend\Form\Element\Email;
use Zend\Form\Element\Select;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class FuncionariosForm extends Form
{

    public $tiposDocumentos = [
        ''     => '---Selecione---',
        'CPF' => 'CPF',
        'RG'  => 'RG',
        'CNH' => 'CNH'
    ];


    /**
     * FuncionariosForm constructor.
     */
    public function __construct()
    {
        parent::__construct('funcionarios-form');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add([
            'type' => Text::class,
            'name' => 'nome',
            'attributes' => [
                'id' => 'nome',
                'class' => 'form-control',
                'placeholder' => 'Digite um nome',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Nome',
            ]
        ]);
        $this->add([
            'type' => Text::class,
            'name' => 'nome_meio',
            'attributes' => [
                'id' => 'nome_meio',
                'class' => 'form-control',
                'placeholder' => 'Digite o nome do meio'
            ],
            'options' => [
                'label' => 'Nome do meio',
            ]
        ]);
        $this->add([
            'type' => Text::class,
            'name' => 'sobrenome',
            'attributes' => [
                'id' => 'sobrenome',
                'class' => 'form-control',
                'placeholder' => 'Digite o sobrenome',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Sobrenome',
            ]
        ]);
        $this->add(array(
            'type' => Select::class,
            'name' => 'documento_tipo',
            'attributes' => [
                'id' => 'documento_tipo',
                'class' => 'form-control',
                'placeholder' => 'Selecione um tipo',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Tipo de Documento',
                'value_options' => $this->tiposDocumentos,
            ]
        ));

        $this->add([
            'type' => Text::class,
            'name' => 'documento_numero',
            'attributes' => [
                'id' => 'documento_numero',
                'class' => 'form-control',
                'placeholder' => 'Número do documento',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Número do documento',
            ]
        ]);

        $this->add([
            'type' => Email::class,
            'name' => 'email',
            'attributes' => [
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Digite um e-mail',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'E-mail',
            ]
        ]);

        $this->add([
            'type' => Tel::class,
            'name' => 'telefone',
            'attributes' => [
                'id' => 'telefone',
                'class' => 'form-control',
                'placeholder' => 'Digite um telefone',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Telefone',
            ]
        ]);

        $this->add([
            'type'  => 'submit',
            'name' => 'salvar',
            'attributes' => [
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            ],
        ]);
    }
}