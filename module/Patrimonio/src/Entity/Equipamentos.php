<?php

namespace Patrimonio\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipamentos
 *
 * @ORM\Table(name="equipamentos", indexes={@ORM\Index(name="fk_equipamentos_funcionarios_idx", columns={"funcionarios_id"})})
 * @ORM\Entity
 */
class Equipamentos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=45, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=45, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=45, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=45, nullable=false)
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="local_atual", type="string", length=45, nullable=true)
     */
    private $localAtual;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="string", length=255, nullable=true)
     */
    private $observacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_aquisicao", type="date", nullable=true)
     */
    private $dataAquisicao;

    /**
     * @var string
     *
     * @ORM\Column(name="identificacao", type="string", length=45, nullable=true)
     */
    private $identificacao;

    /**
     * @var string
     *
     * @ORM\Column(name="acessorios", type="string", length=255, nullable=true)
     */
    private $acessorios;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponivel", type="string", length=10, nullable=true)
     */
    private $disponivel;

    /**
     * @var \Patrimonio\Entity\Funcionarios
     *
     * @ORM\ManyToOne(targetEntity="Patrimonio\Entity\Funcionarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionarios_id", referencedColumnName="id")
     * })
     */
    private $funcionarios;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param string $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    /**
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param string $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return string
     */
    public function getLocalAtual()
    {
        return $this->localAtual;
    }

    /**
     * @param string $localAtual
     */
    public function setLocalAtual($localAtual)
    {
        $this->localAtual = $localAtual;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param string $observacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

    /**
     * @return \DateTime
     */
    public function getDataAquisicao()
    {
        return $this->dataAquisicao;
    }

    /**
     * @param \DateTime $dataAquisicao
     */
    public function setDataAquisicao($dataAquisicao)
    {
        $this->dataAquisicao = $dataAquisicao;
    }

    /**
     * @return string
     */
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    /**
     * @param string $identificacao
     */
    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
    }

    /**
     * @return string
     */
    public function getAcessorios()
    {
        return $this->acessorios;
    }

    /**
     * @param string $acessorios
     */
    public function setAcessorios($acessorios)
    {
        $this->acessorios = $acessorios;
    }

    /**
     * @return string
     */
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * @param string $disponivel
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;
    }

    /**
     * @return Funcionarios
     */
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    /**
     * @param Funcionarios $funcionarios
     */
    public function setFuncionarios($funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }


}

