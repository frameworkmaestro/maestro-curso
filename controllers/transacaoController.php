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

class TransacaoController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $transacao= new Transacao($this->data->id);
        $filter->transacao = $this->data->transacao;
        $this->data->query = $transacao->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/transacao/save';
        $this->render();
    }

    public function formObject() {
        $this->data->transacao = Transacao::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $transacao= new Transacao($this->data->id);
        $this->data->transacao = $transacao->getData();
        
        $this->data->action = '@curso/transacao/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $transacao = new Transacao($this->data->id);
        $ok = '>curso/transacao/delete/' . $transacao->getId();
        $cancelar = '>curso/transacao/formObject/' . $transacao->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Transacao [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Transacao();
        $filter->transacao = $this->data->transacao;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $transacao = new Transacao($this->data->transacao);
            $transacao->save();
            $go = '>curso/transacao/formObject/' . $transacao->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $transacao = new Transacao($this->data->id);
            $transacao->delete();
            $go = '>curso/transacao/formFind';
            $this->renderPrompt('information',"Transacao [{$this->data->transacao}] removido.", $go);
    }

}