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

class GrupoController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $grupo= new Grupo($this->data->id);
        $filter->grupo = $this->data->grupo;
        $this->data->query = $grupo->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/grupo/save';
        $this->render();
    }

    public function formObject() {
        $this->data->grupo = Grupo::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $grupo= new Grupo($this->data->id);
        $this->data->grupo = $grupo->getData();
        
        $this->data->action = '@curso/grupo/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $grupo = new Grupo($this->data->id);
        $ok = '>curso/grupo/delete/' . $grupo->getId();
        $cancelar = '>curso/grupo/formObject/' . $grupo->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Grupo [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Grupo();
        $filter->grupo = $this->data->grupo;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $grupo = new Grupo($this->data->grupo);
            $grupo->save();
            $go = '>curso/grupo/formObject/' . $grupo->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $grupo = new Grupo($this->data->id);
            $grupo->delete();
            $go = '>curso/grupo/formFind';
            $this->renderPrompt('information',"Grupo [{$this->data->grupo}] removido.", $go);
    }

}