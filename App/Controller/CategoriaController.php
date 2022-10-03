<?php

namespace App\Controller;

use App\Model\CategoriaModel;


class CategoriaController extends Controller{

    public static function index(){

        parent::isAuthenticated();

        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View\modules\CategoriaP\ListaCategoria.php';
    }

    public static function form(){

        parent::isAuthenticated();

        $model = new CategoriaModel();

        if(isset($_GET['id']))
            $model = $model->getById((int) $_GET['id']);
        
        include 'View\modules\CategoriaP\FormCategoria.php';
    }

    public static function save(){

        parent::isAuthenticated();

        include 'Model\CategoriaModel.php';

        $model = new CategoriaModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao'];

        $model->save();

        header("Location: /categoria");
    }

    public static function delete(){

        parent::isAuthenticated();
        
        $model = new CategoriaModel();

        $model->delete((int) $_GET['id']);

        header("Location: /categoria");
        
    }
}