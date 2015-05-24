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

class AlunoController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $aluno= new Aluno($this->data->id);
        $filter->matricula = $this->data->matricula;
        $filter->nome = $this->data->nome;
        $this->data->query = $aluno->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/aluno/save';
        $this->render();
    }

    public function formObject() {
        $aluno = Aluno::create($this->data->id);
        $this->data->aluno = $aluno->getData();
        $this->data->aluno->fotoUrl = $aluno->getFoto()->getUrl();
        $this->render();
    }

    public function formUpdate() {
        $aluno= new Aluno($this->data->id);
        $this->data->aluno = $aluno->getData();
        
        $this->data->action = '@curso/aluno/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $aluno = new Aluno($this->data->id);
        $ok = '>curso/aluno/delete/' . $aluno->getId();
        $cancelar = '>curso/aluno/formObject/' . $aluno->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Aluno [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Aluno();
        $filter->matricula = $this->data->matricula;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $aluno = new Aluno($this->data->aluno);
           // $aluno->setFoto(\Mutil::parsefiles('foto', 0));
            $aluno->save();
            $go = '>curso/aluno/formObject/' . $aluno->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $aluno = new Aluno($this->data->id);
            $aluno->delete();
            $go = '>curso/aluno/formFind';
            $this->renderPrompt('information',"Aluno [{$this->data->matricula}] removido.", $go);
    }

}