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

class FuncionarioMap extends \curso\models\pessoa {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'curso',
            'table' => 'Funcionario',
            'extends' => '\curso\models\pessoa',
            'attributes' => array(
                'idFuncionario' => array('column' => 'idFuncionario','key' => 'primary','idgenerator' => 'seq_funcionario','type' => 'integer'),
                'salario' => array('column' => 'salario','type' => 'numeric(15'),
                'idPessoa' => array('column' => 'idPessoa','key' => 'reference','type' => 'integer'),
            ),
            'associations' => array(
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $idFuncionario;
    /**
     * 
     * @var numeric(15 
     */
    protected $salario;
    /**
     * 
     * @var integer 
     */
    protected $idPessoa;

    /**
     * Associations
     */
    

    /**
     * Getters/Setters
     */
    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function setIdFuncionario($value) {
        $this->idFuncionario = $value;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario($value) {
        $this->salario = $value;
    }

    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function setIdPessoa($value) {
        $this->idPessoa = $value;
    }

    

}
// end - wizard

?>