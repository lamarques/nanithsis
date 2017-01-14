<?php

namespace Patrimonio\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionarios
 *
 * @ORM\Table(name="funcionarios")
 * @ORM\Entity
 */
class Funcionarios
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
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_meio", type="string", length=255, nullable=true)
     */
    private $nomeMeio;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", length=255, nullable=false)
     */
    private $sobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="documento_tipo", type="string", length=50, nullable=false)
     */
    private $documentoTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="documento_numero", type="string", length=50, nullable=false)
     */
    private $documentoNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=45, nullable=true)
     */
    private $telefone;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNomeMeio()
    {
        return $this->nomeMeio;
    }

    /**
     * @param string $nomeMeio
     */
    public function setNomeMeio($nomeMeio)
    {
        $this->nomeMeio = $nomeMeio;
    }

    /**
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param string $sobrenome
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    /**
     * @return string
     */
    public function getDocumentoTipo()
    {
        return $this->documentoTipo;
    }

    /**
     * @param string $documentoTipo
     */
    public function setDocumentoTipo($documentoTipo)
    {
        $this->documentoTipo = $documentoTipo;
    }

    /**
     * @return string
     */
    public function getDocumentoNumero()
    {
        return $this->documentoNumero;
    }

    /**
     * @param string $documentoNumero
     */
    public function setDocumentoNumero($documentoNumero)
    {
        $this->documentoNumero = $documentoNumero;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @param object $data
     */
    public function setAllData($data)
    {
        if ($data->get('id')) {
            $this->setId($data->get('id'));
        }
        if ($data->get('nome')) {
            $this->setNome($data->get('nome'));
        }
        if ($data->get('nome_meio')) {
            $this->setNomeMeio($data->get('nome_meio'));
        }
        if ($data->get('sobrenome')) {
            $this->setSobrenome($data->get('sobrenome'));
        }
        if ($data->get('documento_tipo')) {
            $this->setDocumentoTipo($data->get('documento_tipo'));
        }
        if ($data->get('documento_numero')) {
            $this->setDocumentoNumero($data->get('documento_numero'));
        }
        if ($data->get('email')) {
            $this->setEmail($data->get('email'));
        }
        if ($data->get('telefone')) {
            $this->setTelefone($data->get('telefone'));
        }
    }


    public function getAllDataFromForm()
    {
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'nomeMeio' => $this->getNomeMeio(),
            'sobrenome' => $this->getSobrenome(),
            'documento_tipo' => $this->getDocumentoTipo(),
            'documento_numero' => $this->getDocumentoNumero(),
            'email' => $this->getEmail(),
            'telefone' => $this->getTelefone(),
        ];
    }
}

