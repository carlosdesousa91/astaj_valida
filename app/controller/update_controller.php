<?php
require (__DIR__.'/../model/banco.php');
class update_controller{


public function pesquisa($id){
    $editar=new banco();
    $inserir=$editar->pesquisa($id);
    return $inserir;
    
    }
public function update($matricula,$nome,$cpf,$tipo,$beneficiario,$idade,$adesao,$desconto,$total,$nascimento,$faixa,$id){
    $editar=new banco();
    $editar->update($matricula,$nome,$cpf,$tipo,$beneficiario,$idade,$adesao,$desconto,$total,$nascimento,$faixa,$id);
    
    }
}
$o=new update_controller();
$id = filter_input ( INPUT_GET ,'id',FILTER_SANITIZE_NUMBER_INT);
$o->pesquisa($id);
if ( isset( $_POST['editar'])) {
    $o-> update ( $_POST['matricula'],$_POST['nome'],$_POST['cpf'],$_POST['tipo'],$_POST['beneficiario'],$_POST['idade'],$_POST ['adesao'],$_POST['desconto'],$_POST['total'],$_POST['data_nascimento'],$_POST['faixa'],$_POST['id']);
    echo  "<script> console.log('Registro incluído com sucesso!'); document.location='/astaj_valida/listar';</script>" ;
    //header('Location: /astaj_valida/listar');
   
}



