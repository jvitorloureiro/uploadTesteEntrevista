<?php

    class Pessoa{
            
        public $nome;
        public $email;
        public $cpf;

        //Construtor de objeto Pessoa
        public function __construct($nome, $email, $cpf){
            $this->nome = $nome;
            $this->email =  $email;
            $this->cpf = $cpf;
        }

        //Imprime os dados contidos em Pessoa
        public function printPessoa(){
            echo $this->nome;
            echo '<br>';
            echo $this->email;
            echo '<br>';
            echo $this->cpf;
            echo '<br>';
        }

        //Verifica se o dado passado como referência é o mesmo que o contido dentro de um item Pessoa
        public function verificaPessoa($cpf){
            if($this->cpf==$cpf)
                return true;
            else
                return false;
        }

    }

    //Criando o array do tipo Pessoa
    $arrayPessoa = array(
        $pessoa = new Pessoa('Guilherme', 'gui@gmail.com', '13355413851'),
        $pessoa = new Pessoa('Pedro', 'pedro@gmail.com', '13355413852'),
        $pessoa = new Pessoa('Joao', 'joao@gmail.com', '13355413853')
    );

    //Imprime todo o array
    function imprimeArray($arrayPessoa){
        echo 'Lista atualizada:<br><br>';

        for($i=0; $i<count($arrayPessoa); $i++){
            $arrayPessoa[$i]->printPessoa();
            echo '<br>';   
        }
        echo '-------------------------------------------------<br>';
    }


    //Adiciona novo item ao array
    function adicionaPessoa($arrayPessoa, $nome, $email, $cpf){
        
        array_push($arrayPessoa, $pessoa = new Pessoa($nome, $email, $cpf));
        return $arrayPessoa;
    }

    /*Função para buscar uma pessoa dentro do array através do cpf
    Output: retorna o índice em que a pessoa com o cpf compatível está*/
    function buscaPessoa ($arrayPessoa, $cpf){
        for($i=0; $i<count($arrayPessoa); $i++){
            if($arrayPessoa[$i]->verificaPessoa($cpf)){
                return $i;
            }
        }
        return '-1';
    }

    function imprimeItemArray($arrayPessoa, $cpf){
        $retornaIndicePessoa = buscaPessoa($arrayPessoa, $cpf);
        if($retornaIndicePessoa != '-1'){
            echo $arrayPessoa[$retornaIndicePessoa]->printPessoa();
        }else{
            echo '<br><br>Pessoa não econtrada!<br><br>';
        }
        echo '-------------------------------------------------<br>';

    }

    /*Função para excluir uma pessoa do array através do cpf
    Output: retorna o array atualizado, sem a Pessoa com o cpf compatível*/
    function excluiItemArray($arrayPessoa, $cpf){
        $retornaIndicePessoa = buscaPessoa($arrayPessoa, $cpf);
        if($retornaIndicePessoa!='-1'){
            echo '<br><br>A Pessoa esta no índice: '.$retornaIndicePessoa.'<br><br>';
            array_splice($arrayPessoa, $retornaIndicePessoa, 1);
        }else{
            echo '<br><br>Pessoa a ser excluída não foi encontrada!<br><br>';
        }
        return $arrayPessoa;
    }

    //Imprime o array inicial, contendo 3 pessoas com nome, cpf e email
    imprimeArray($arrayPessoa);

    //Adiciona uma nova pessoa ao array de Pessoas
    $arrayPessoa = adicionaPessoa($arrayPessoa,'Antonio', 'antonio@gmail.com', '13354444444');

    //Imprime o array atualizado, contendo desta vez 4 pessoas com nome, cpf e email
    imprimeArray($arrayPessoa);

    //Busca uma pessoa na lista pelo cpf e imprime seus dados
    imprimeItemArray($arrayPessoa, '13355413851');

    //Exclui uma Pessoa do array, usando o cpf como identificador (cpf do Pedro)
    $arrayPessoa = excluiItemArray($arrayPessoa,'13355413852');

    //Imprime o array novamente contendo apenas 3 Pessoas, como o original
    imprimeArray($arrayPessoa);

?>