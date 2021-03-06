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

class Aluno extends map\AlunoMap {

    public static function config() {
        return array(
            'log' => array( matricula ),
            'validators' => array(
                'matricula' => array('notnull')
            ),
            'converters' => array()
        );
    }

    public function validate() {
        parent::validate();
        // exemplo de validação específica: recusa nascidos em julho..
        $dataNascimento = $this->getDataNascimento();
        if ($dataNascimento) {
            if ($dataNascimento->getMonth() == '07') {
                throw new \EModelException('Nascidos em julho não são aceitos!');
            }
        }
    }
    
    public function getDescription(){
        return $this->getMatricula();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('matricula');
        if ($filter->matricula){
            $criteria->where("matricula LIKE '{$filter->matricula}%'");
        }
        if ($filter->nome){
            $criteria->where("nome LIKE '{$filter->nome}%'");
        }
        return $criteria;
    }
}

?>