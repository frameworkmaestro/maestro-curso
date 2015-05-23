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

class Setor extends map\SetorMap {

    public static function config() {
        return array(
            'log' => array( sigla ),
            'validators' => array(
                'sigla' => array('notnull'),
                'nome' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getNome();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*,SetorPai.nome as NomeSetorPai')->orderBy('nome');
        if ($filter->nome){
            $criteria->where("nome LIKE '{$filter->nome}%'");
        }
         if ($filter->sigla){
            $criteria->where("sigla LIKE '{$filter->sigla}%'");
        }
        if ($filter->idSetorPai){
            $criteria->where("idSetorPai","=","{$filter->idSetorPai}");
        }
        $criteria->join('setor','setor SetorPai ','setor.idSetorPai=SetorPai.idSetor','left');
        return $criteria;
    }
}

?>