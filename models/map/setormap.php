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

class SetorMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'curso',
            'table' => 'Setor',
            'attributes' => array(
                'idSetor' => array('column' => 'idSetor','key' => 'primary','idgenerator' => 'seq_setor','type' => 'integer'),
                'sigla' => array('column' => 'sigla','type' => 'string'),
                'nome' => array('column' => 'nome','type' => 'string'),
                'idSetorPai' => array('column' => 'idSetorPai','key' => 'foreign','type' => 'integer'),
            ),
            'associations' => array(
                'usuarios' => array('toClass' => '\curso\models\usuario', 'cardinality' => 'oneToMany' , 'keys' => 'idSetor:idSetor'), 
                'setorPai' => array('toClass' => '\curso\models\setor', 'cardinality' => 'oneToOne' , 'keys' => 'idSetorPai:idSetor'), 
                'setoresFilhos' => array('toClass' => '\curso\models\setor', 'cardinality' => 'oneToMany' , 'keys' => 'idSetor:idSetorPai'), 
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $idSetor;
    /**
     * 
     * @var string 
     */
    protected $sigla;
    /**
     * 
     * @var string 
     */
    protected $nome;
    /**
     * 
     * @var integer 
     */
    protected $idSetorPai;

    /**
     * Associations
     */
    protected $usuarios;
    protected $setorPai;
    protected $setoresFilhos;
    

    /**
     * Getters/Setters
     */
    public function getIdSetor() {
        return $this->idSetor;
    }

    public function setIdSetor($value) {
        $this->idSetor = $value;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setSigla($value) {
        $this->sigla = $value;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($value) {
        $this->nome = $value;
    }

    public function getIdSetorPai() {
        return $this->idSetorPai;
    }

    public function setIdSetorPai($value) {
        $this->idSetorPai = $value;
    }
    /**
     *
     * @return Association
     */
    public function getUsuarios() {
        if (is_null($this->usuarios)){
            $this->retrieveAssociation("usuarios");
        }
        return  $this->usuarios;
    }
    /**
     *
     * @param Association $value
     */
    public function setUsuarios($value) {
        $this->usuarios = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationUsuarios() {
        $this->retrieveAssociation("usuarios");
    }
    /**
     *
     * @return Association
     */
    public function getSetorPai() {
        if (is_null($this->setorPai)){
            $this->retrieveAssociation("setorPai");
        }
        return  $this->setorPai;
    }
    /**
     *
     * @param Association $value
     */
    public function setSetorPai($value) {
        $this->setorPai = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationSetorPai() {
        $this->retrieveAssociation("setorPai");
    }
    /**
     *
     * @return Association
     */
    public function getSetoresFilhos() {
        if (is_null($this->setoresFilhos)){
            $this->retrieveAssociation("setoresFilhos");
        }
        return  $this->setoresFilhos;
    }
    /**
     *
     * @param Association $value
     */
    public function setSetoresFilhos($value) {
        $this->setoresFilhos = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationSetoresFilhos() {
        $this->retrieveAssociation("setoresFilhos");
    }

    

}
// end - wizard

?>