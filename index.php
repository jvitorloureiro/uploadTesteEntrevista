<?php

class Pessoa{
        
    public $nome;
    public $email;
    public $cpf;

    public function __construct($nome, $email, $cpf){
        $this->nome = $nome;
        $this->email =  $email;
        $this->cpf = $cpf;
    }

    public function printPessoa(){
        echo $this->nome;
        echo '<br>';
        echo $this->email;
        echo '<br>';
        echo $this->cpf;
        echo '<br>';
    }

    public function verificaPessoa($cpf){
        if($this->cpf==$cpf)
            return true;
        else
            return false;
    }

}

//Criando o array do tipo Pessoa
$arr = array(
    $pessoa = new Pessoa('Guilherme', 'gui@gmail.com', '13355413855'),
    $pessoa = new Pessoa('Pedro', 'pedro@gmail.com', '13355413855'),
    $pessoa = new Pessoa('Joao', 'joao@gmail.com', '13355413855')
);

//Imprime todo o array
function imprimeArr($arr){
    echo 'Lista atualizada:<br>';

    for($i=0; $i<count($arr); $i++){
        $arr[$i]->printPessoa();
        echo '<br>';   
    }
    echo '-------------------------------------------------<br>';
}


//Adiciona novo item ao array
function adicionaPessoa($arr, $nome, $email, $cpf){
    
    array_push($arr, $pessoa = new Pessoa($nome, $email, $cpf));
    return $arr;
}

//Função para buscar uma pessoa dentro do array através do cpf
function buscaPessoa ($arr, $cpf){
    for($i=0; $i<count($arr); $i++){
        if($arr[$i]->verificaPessoa($cpf)){
            return $i;
        }
    }
}

//Função para excluir uma pessoa do array através do cpf
function excluiPessoa($arr, $cpf){
    $retornaIndicePessoa = buscaPessoa($arr, $cpf);
    echo '<br><br>a pessoa esta no indice: '.$retornaIndicePessoa.'<br><br>';
    unset($arr[$retornaIndicePessoa]);

    return $arr;
}

imprimeArr($arr);

$arr = adicionaPessoa($arr,'Antonio', 'ant@gmail.com', '44444');

imprimeArr($arr);

$arr = excluiPessoa($arr,'44444');

imprimeArr($arr);