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

class Usuario extends map\UsuarioMap {

    public static function config() {
        return array(
            'log' => array( login ),
            'validators' => array(
                'idPessoa' => array('notnull'),
                'idSetor' => array('notnull'),
                'login' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getLogin();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('login');
        if ($filter->login){
            $criteria->where("login LIKE '{$filter->login}%'");
        }
        return $criteria;
    }
}

?>