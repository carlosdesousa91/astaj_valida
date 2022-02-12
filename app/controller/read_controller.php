<?php
require('app/model/banco.php');

class read_controller{

private $lista;

public function __construct(){

    $this->lista=new banco;
    $this->tabela();
}
public function tabela(){
    $C=$this->lista->read();
    $D=$this->lista->read1();

    foreach ($C as $row) {
    
    echo  "<tr>" ;
    echo  "<th class='col-md-1'>" . $row ['id']. "</th>" ;
    echo  "<th>" . $row ['matricula']. "</th>" ;
    echo  "<td>" . $row ['nome']. "</td>" ;
    echo  "<td>" . $row ['cpf']. "</td>" ;
    echo  "<td>" . $row ['tipo_de_plano']. "</td>" ;
    echo  "<td>" . $row ['beneficiario']. "</td>" ;
    echo  "<td>" . $row ['idade']. "</td>" ;
    echo  "<td>" . date('d/m/Y', strtotime($row['adesao'])). "</td>" ;
    echo  "<td>" . $row ['desconto']. "</td>" ;
    echo  "<td>" . $row ['desconto_total']. "</td>" ;
    echo  "<td>" . date('d/m/Y', strtotime($row['data_nascimento'])). "</td>" ;
    $list=$row ['faixa_etaria'];
    switch ($list) {
        case 1:
            echo "<td>até 18 anos</td>" ;;
            break;
        case 2:
            echo "<td>de 19 até 23 anos</td>";
            break;
        case 3:
            echo "<td>de 24 até 28 anos</td>";
            break;
        case 4:
                echo "<td>de 29 até 33 anos</td>";
            break;
        case 5:
                echo "<td>de 34 até 38 anos</td>";
            break;
        case 6:
                echo "<td>de 39 até 43 anos</td>";
            break;
        case 7:
                echo "<td>de 44 até 48 anos</td>";
            break;
        case 8:
                echo "<td>de 49 até 53 anos</td>";
            break;
        case 9:
                echo "<td>de 54 até 58 anos</td>";
            break; 
        case 10:
                echo "<td>mais de 59 anos</td>";
            break; 

    }
    
     //Data atual
    $dia = date ('d');
    $mes = date ('m');
    $ano = date ('Y');
    //Data do aniversário
    //$data = explode("/",$row['data_nascimento']);
    //$dianasc = $data[0];
    //$mesnasc = $data[1];
    //$anonasc = $data[2];

    //Data do aniversário
    $data = explode("-",$row['data_nascimento']);
    $dianasc = $data[2];
    $mesnasc = $data[1];
    $anonasc = $data[0];

    //Calculando sua idade
    $idade = $ano - $anonasc;
    
    if ($mes <  $mesnasc){

    $idade--;
    }
    elseif($mes==$mesnasc && $dia<=$dianasc){

    $idade--;

    }

    $idade1 = $ano - $anonasc;

    if (empty($row['faixa_etaria'])){
        echo "<td></td>";
    }
    elseif($row['faixa_etaria']==1 && $idade>$D[0]["maximo"]){
        echo "<td class='bg-danger'> Vencido </td>";
    }else{
        //validar atenção
        if($idade==$D[0]["maximo"] && ($mes == ($mesnasc))){
            echo "<td class='bg-warning'>Atenção</td>";
        }else{
            echo "<td class='bg-success'>OK</td>";
        }
    }

    
    echo "<td><a class = 'btn btn-primary' href = '/astaj_valida/editar?id=". 
    $row['id']."'> <i class='fas fa-edit'></i> </a> <a class='btn btn-danger'href='#'" .
    "onClick='delete_user(" . $row['matricula'] . ")'>  <i class='fas fa-trash-alt'></i> </a></td>";
    echo  "</td>" ;
    }
        
           }


}

   