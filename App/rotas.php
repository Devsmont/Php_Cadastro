<?php

//include 'Controller/PessoaController.php';

use App\Controller\
{
    ProdutoController, 
    PessoaController, 
    CategoriaController
};




$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


    switch($url)
    {
        case '/':
            echo "página inicial";
        break;
    
        case '/pessoa':
            
            PessoaController::index();
        break;
    
        case '/pessoa/form':
            
            PessoaController::form();
        break;
    
        case '/pessoa/save':
            PessoaController::save();
        break;
    
        case '/pessoa/delete':
            PessoaController::delete();
        break;

  

        case '/produto':
            
            ProdutoController::index();
        break;

        case '/produto/form':
            //formulario de pessoas
            ProdutoController::form();
        break;

        case '/produto/save':
            ProdutoController::save();
        break;

        case '/produto/delete':
            ProdutoController::delete();
        break;

    // categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria 

        case '/categoria':
            CategoriaController::index();
        break;

        case '/categoria/form':
            CategoriaController::form();
        break;

        case '/categoria/save':
            CategoriaController::save();
        break;

        case '/categoria/delete':
            CategoriaController::delete();
        break;

        default:
            echo "Erro 404";
        break;
    }