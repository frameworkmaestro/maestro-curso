<?php
/**
 * $_comment
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage $_package
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

Manager::import("curso\models\*");

class SetorController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $setor= new Setor($this->data->id);
        $filter->nome = $this->data->nome;
        $filter->sigla = $this->data->sigla;
        $filter->idSetorPai = $this->data->idSetorPai;
        $this->data->query = $setor->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/setor/save';
        $this->data->tipoSetor = EnumTipoSetor::listAll();
        $this->render();
    }

    public function formObject() {
        $this->data->setor = Setor::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $setor= new Setor($this->data->id);
        $this->data->tipoSetor = EnumTipoSetor::listAll();
        $this->data->setor = $setor->getData();
        $this->data->setor->idSetorPaiDesc = $setor->getSetorPai()->getDescription();
	
        $this->data->action = '@curso/setor/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $setor = new Setor($this->data->id);
        $ok = '>curso/setor/delete/' . $setor->getId();
        $cancelar = '>curso/setor/formObject/' . $setor->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Setor [{$setor->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Setor();
        $filter->nome = $this->data->nome;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $setor = new Setor($this->data->setor);

            if ($this->data->setor->tipoSetor == EnumTipoSetor::EXTERNO){
                if ($this->data->setor->idSetorPai != null){
                    throw new \EControllerException("Setor externo não pode ter setor pai");
                    
                }
            }

            $setor->save();
            $go = '>curso/setor/formObject/' . $setor->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $setor = new Setor($this->data->id);
            $setor->delete();
            $go = '>curso/setor/formFind';
            $this->renderPrompt('information',"Setor [{$this->data->nome}] removido.", $go);
    }

    public function formSetoresSemSetorPai(){
        $setor = Setor::create();
        $this->data->query = $setor->listSetoresSemSetorPai()->asQuery();
        $this->render();
    }

    public function formSetoresFilhos(){
         $setor = Setor::create();
         $this->data->setorPaiQuery = $setor->listByFilter()->asQuery()->chunkResult(0, 2);
         $this->render();
    }

    public function ajaxSetorFilho(){
        $setor = Setor::create();
        $filter->idSetorPai = $this->data->setorPai;
        $this->data->setorFilhoQuery = $setor->listByFilter($filter)->asQuery()->chunkResult(0, 2);
        $this->render();
    }

}