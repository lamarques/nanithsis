<?php
/**
 * Created by PhpStorm.
 * User: rogerio.lamarques
 * Date: 13/01/2017
 * Time: 14:23
 */

namespace Patrimonio\Form;


use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Date;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class EquipamentosForm extends Form
{

    public $siglas = [
        '' => '---Selecione---',
        'NB' => 'NB (Notebook)',
        'PC' => 'PC (Computador CPU)',
        'SRV' => 'SRV (Servidor)',
        'MT' => 'MT (Monitor)',
        'IM' => 'IM (Impressora)'
    ];

    public $marcas = [
        '' => '---Selecione---',
        'Dell' => 'Dell',
        'Lenovo' => 'Lenovo',
        'HP' => 'HP',
        'SAMSUNG' => 'SAMSUNG',
        'LG' => 'LG',
        'AOC' => 'AOC',
    ];

    public $funcionarios = [];

    public function __construct()
    {
        parent::__construct('equipamentos-form');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add([
            'type' => Select::class,
            'name' => 'sigla',
            'attributes' => [
                'id' => 'sigla',
                'class' => 'form-control',
                'placeholder' => 'Selecione uma Silga',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Sigla',
                'value_options' => $this->siglas
            ]
        ]);

        $this->add([
            'type' => Select::class,
            'name' => 'marca',
            'attributes' => [
                'id' => 'marca',
                'class' => 'form-control',
                'placeholder' => 'Selecione uma marca',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Marca',
                'value_options' => $this->marcas
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'modelo',
            'attributes' => [
                'id' => 'modelo',
                'class' => 'form-control',
                'placeholder' => 'Digite o modelo',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Modelo',
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'cliente',
            'attributes' => [
                'id' => 'cliente',
                'class' => 'form-control',
                'placeholder' => 'Digite o Cliente',
                'required' => 'required'
            ],
            'options' => [
                'label' => 'Cliente',
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'local_atual',
            'attributes' => [
                'id' => 'local_atual',
                'class' => 'form-control',
                'placeholder' => 'Digite a localização atual',
            ],
            'options' => [
                'label' => 'Localização Atual',
            ]
        ]);

        $this->add([
            'type' => Textarea::class,
            'name' => 'descricao',
            'attributes' => [
                'id' => 'descricao',
                'class' => 'form-control',
                'placeholder' => 'Descrição do equipamento',
            ],
            'options' => [
                'label' => 'Descrição do Equipamento',
            ]
        ]);

        $this->add([
            'type' => Textarea::class,
            'name' => 'observacao',
            'attributes' => [
                'id' => 'observacao',
                'class' => 'form-control',
                'placeholder' => 'Observações',
            ],
            'options' => [
                'label' => 'Observações',
            ]
        ]);

        $this->add([
            'type' => Date::class,
            'name' => 'data_aquisicao',
            'attributes' => [
                'id' => 'data_aquisicao',
                'class' => 'form-control',
                'placeholder' => 'Data de aquisição do equipamento',
            ],
            'options' => [
                'label' => 'Data de aquisição do equipamento',
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'identificacao',
            'attributes' => [
                'id' => 'identificacao',
                'class' => 'form-control'
            ],
            'options' => [
                'label' => 'Etiqueta',
            ]
        ]);

        $this->add([
            'type' => Textarea::class,
            'name' => 'acessorios',
            'attributes' => [
                'id' => 'acessorios',
                'class' => 'form-control',
                'placeholder' => 'Decreva os acessórios',
            ],
            'options' => [
                'label' => 'Acessórios',
            ]
        ]);

        $this->add(array(
            'type' => Checkbox::class,
            'name' => 'disponivel',
            'attributes' => [
                'id' => 'disponivel'
            ],
            'options' => array(
                'label' => 'Equipamentos disponível',
                'use_hidden_element' => true,
                'checked_value' => 'S',
                'unchecked_value' => 'N'
            )
        ));

        $this->add([
            'type' => Select::class,
            'name' => 'funcionarios_id',
            'attributes' => [
                'id' => 'funcionarios_id',
                'class' => 'form-control',
                'placeholder' => 'Selecione um fucnionario',
            ],
            'options' => [
                'label' => 'Funcionário Com Equipamento',
                'value_options' => $this->funcionarios
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