<?php
/**
 * @category   Maestro
 * @package    UFJF
 * @subpackage curso
 * @copyright  Copyright (c) 2003-2013 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version
 * @since
 */

// wizard - code section created by Wizard Module

namespace curso\models\map;

class PessoaMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'curso',
            'table' => 'Pessoa',
            'attributes' => array(
                'idPessoa' => array('column' => 'idPessoa','key' => 'primary','idgenerator' => 'seq_pessoa','type' => 'integer'),
                'nome' => array('column' => 'nome','type' => 'string'),
                'cpf' => array('column' => 'cpf','type' => 'cpf'),
                'dataNascimento' => array('column' => 'dataNascimento','type' => 'date'),
                'foto' => array('column' => 'foto','type' => 'blob'),
                'email' => array('column' => 'email','type' => 'string'),
            ),
            'associations' => array(
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $idPessoa;
    /**
     * 
     * @var string 
     */
    protected $nome;
    /**
     * 
     * @var cpf 
     */
    protected $cpf;
    /**
     * 
     * @var date 
     */
    protected $dataNascimento;
    /**
     * 
     * @var blob 
     */
    protected $foto;
    /**
     * 
     * @var string 
     */
    protected $email;

    /**
     * Associations
     */
    

    /**
     * Getters/Setters
     */
    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function setIdPessoa($value) {
        $this->idPessoa = $value;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($value) {
        $this->nome = $value;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($value) {
        if (!($value instanceof \MCPF)) {
            $value = new \MCPF($value);
        }
        $this->cpf = $value;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($value) {
        if (!($value instanceof \MDate)) {
            $value = new \MDate($value);
        }
        $this->dataNascimento = $value;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($value) {
        $this->foto = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    

}
// end - wizard

?>