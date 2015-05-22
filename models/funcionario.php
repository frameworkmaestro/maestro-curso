<?php
/**
 * 
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage curso
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

namespace curso\models;

class Funcionario extends map\FuncionarioMap {

    public static function config() {
        return array(
            'log' => array(  ),
            'validators' => array(
                'idPessoa' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getIdFuncionario();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('idFuncionario');
        if ($filter->idFuncionario){
            $criteria->where("idFuncionario LIKE '{$filter->idFuncionario}%'");
        }
        return $criteria;
    }
}

?>