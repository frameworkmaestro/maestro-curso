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

class FuncionarioController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $funcionario= new Funcionario($this->data->id);
        $filter->idFuncionario = $this->data->idFuncionario;
        $this->data->query = $funcionario->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/funcionario/save';
        $this->render();
    }

    public function formObject() {
        $this->data->funcionario = Funcionario::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $funcionario= new Funcionario($this->data->id);
        $this->data->funcionario = $funcionario->getData();
        
        $this->data->action = '@curso/funcionario/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $funcionario = new Funcionario($this->data->id);
        $ok = '>curso/funcionario/delete/' . $funcionario->getId();
        $cancelar = '>curso/funcionario/formObject/' . $funcionario->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Funcionario [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Funcionario();
        $filter->idFuncionario = $this->data->idFuncionario;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $funcionario = new Funcionario($this->data->funcionario);
            $funcionario->save();
            $go = '>curso/funcionario/formObject/' . $funcionario->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $funcionario = new Funcionario($this->data->id);
            $funcionario->delete();
            $go = '>curso/funcionario/formFind';
            $this->renderPrompt('information',"Funcionario [{$this->data->idFuncionario}] removido.", $go);
    }

}