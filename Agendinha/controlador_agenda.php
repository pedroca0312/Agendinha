<?php

    function pegaContatos(){
    $contatosAuxiliar = file_get_contents('contatos.json');  //Pegar arquivo "contatos.json";
    $contatosAuxiliar = json_decode($contatosAuxiliar, true);  //retornar o arquivo;

    return $contatosAuxiliar;
}

    $JsonContatos = pegaContatos();  //Pegar arquivo "contatos.json";

        function Salva($JsonContatos){
        $contatosJson = json_encode($JsonContatos, JSON_PRETTY_PRINT);
        file_put_contents('contatos.json', $contatosJson);

        header("Location: index.phtml");
    }

    function cadastrar(){   //função para cadastrar um contato;

        $JsonContatos = pegaContatos();

        $contato = [    //A variável $contato recebe os parâmetros enviados do formulário.

            'id'      =>uniqid(),
            'nome'    =>$_POST['nome'],
            'email'   =>$_POST['email'],
            'telefone'=>$_POST['telefone']   //Array_push pega o $contato e coloca no final do $contatosAuxiliar, que é o arquivo contatos.json;

        array_push($JsonContatos, $contato);

     Salva($JsonContatos);

    }

    function excluirContato($id){ //Função para excluir os contatos;

        $JsonContatos = pegaContatos();    //Para cada contatoAuxiliar, eu pego o dado do contato na posição que está e...;
        foreach ($JsonContatos as $posicao => $contato){    //Se a a variável id do contato é igual a variável id que estou procurando, exclui

                unset($JsonContatos[$posicao]);    //exclui os dados do contato pelo id;

            }
        }

        Salva($JsonContatos);
    }

    function editarContato($id){    //Função para editar o contato;

        $JsonContatos = pegaContatos();   //Pega os contatos;

        foreach ($JsonContatos as $contato){ 
            if ($contato['id'] == $id){
                return $contato;  //retornarbo contato com seus dados (aparece na página editar.php)
            }
        }
    }

    function salvarContatoEditado($id){ //Função para Salvar o contato que foi editado;

        $JsonContatos = pegaContatos();

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];


        foreach ($JsonContatos as $posicao => $contato){  //Para cada contatoAuxiliar, a posição do array contato;
            if ($contato['id'] == $id){

                $JsonContatos[$posicao]['nome'] = $nome
                $JsonContatos[$posicao]['email'] = $email;
                $JsonContatos[$posicao]['telefone'] = $telefone;

                break;/*ing bad*/

            }
        }

        Salva($JsonContatos);

    }

    if ($_GET['acao'] == 'cadastrar'){
        cadastrar();
    }   elseif ($_GET['acao'] == 'excluir') {
        excluirContato($_GET['id']);
    } elseif ($_GET['acao'] == 'editar'){
        salvarContatoEditado($_POST['id']);
    }