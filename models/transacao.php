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

class Transacao extends map\TransacaoMap {

    public static function config() {
        return array(
            'log' => array( transacao ),
            'validators' => array(
                'transacao' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getTransacao();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('transacao');
        if ($filter->transacao){
            $criteria->where("transacao LIKE '{$filter->transacao}%'");
        }
        return $criteria;
    }
}

?>