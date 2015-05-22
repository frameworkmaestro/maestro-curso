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

class UsuarioController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $usuario= new Usuario($this->data->id);
        $filter->login = $this->data->login;
        $this->data->query = $usuario->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@curso/usuario/save';
        $this->render();
    }

    public function formObject() {
        $this->data->usuario = Usuario::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $usuario= new Usuario($this->data->id);
        $this->data->usuario = $usuario->getData();
        $this->data->usuario->idPessoaDesc = $usuario->getPessoa()->getDescription();
	$this->data->usuario->idSetorDesc = $usuario->getSetor()->getDescription();
	
        $this->data->action = '@curso/usuario/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $usuario = new Usuario($this->data->id);
        $ok = '>curso/usuario/delete/' . $usuario->getId();
        $cancelar = '>curso/usuario/formObject/' . $usuario->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Usuario [{$model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Usuario();
        $filter->login = $this->data->login;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $usuario = new Usuario($this->data->usuario);
            $usuario->save();
            $go = '>curso/usuario/formObject/' . $usuario->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $usuario = new Usuario($this->data->id);
            $usuario->delete();
            $go = '>curso/usuario/formFind';
            $this->renderPrompt('information',"Usuario [{$this->data->login}] removido.", $go);
    }

}