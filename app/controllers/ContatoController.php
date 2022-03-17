<?php
namespace app\controllers;
use app\core\Controller;
use app\models\Contato;

class ContatoController extends Controller {
    public function index(){
       $objContato = new Contato();
       $dados["lista"] = $objContato->lista();
       $dados["view"]  = "Contato/index";
       // echo "<pre>";
       //print_r($dados);
       //exit;

       $this->load("template",$dados);



    } 
    public function create(){
        //chamando a view q esta na pasta contato chamada create!
        $dados["view"]  = "Contato/create";
        $this->load("template",$dados);
       
    }

    public function salvar(){

        //criar um objeto do model Contato
        $objContato = new Contato();


        $contato = new \stdClass();
        
        //são artibutos desta pseudoClasse chamada contato
        $contato->nome         = $_POST["nome"];
        $contato->cep          = $_POST["cep"];
        $contato->endereco     = $_POST["endereco"];
        $contato->complemento  = $_POST["complemento"];
        $contato->numero       = $_POST["numero"];
        $contato->bairro       = $_POST["bairro"];
        $contato->cidade       = $_POST["cidade"];
        $contato->estado       = $_POST["estado"];
        $contato->celular      = $_POST["celular"];
        $contato->email        = $_POST["email"];
        $contato->dtnasc       = $_POST["dtnasc"];
        $contato->cpf          = $_POST["cpf"];
        
        //Chamar o metodo inserir() que está no model Contato..
        $objContato->inserir($contato);

        header("location:".URL_BASE."contato");

    }
}