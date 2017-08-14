<?php
    //pega as informações do arquivo json e os transforma em array
    function pegaContatos(){
    $contatosAuxiliar = file_get_contents('contatos.json');
    $contatosAuxiliar = json_decode($contatosAuxiliar, true);

    return $contatosAuxiliar;
}

    $JsonContatos = pegaContatos();

    //transforma o array em json e os salva no arquivo json
    function Salva($JsonContatos){
        $contatosJson = json_encode($JsonContatos, JSON_PRETTY_PRINT);
        file_put_contents('contatos.json', $contatosJson);

        header("Location: index.phtml");
    }
    //salva  o
    function cadastrar(){

        $JsonContatos = pegaContatos();

        $contato = [
            'id'      =>uniqid(),
            'nome'    =>$_POST['nome'],
            'email'   =>$_POST['email'],
            'telefone'=>$_POST['telefone']
        ];

        array_push($JsonContatos, $contato);

     Salva($JsonContatos);

    }

    function excluirContato($id){

        $JsonContatos = pegaContatos();

        foreach ($JsonContatos as $posicao => $contato){
            if ($id == $contato['id']){

                unset($JsonContatos[$posicao]);

            }
        }

        Salva($JsonContatos);
    }

    function editarContato($id){

        $JsonContatos = pegaContatos();

        foreach ($JsonContatos as $contato){
            if ($contato['id'] == $id){
                return $contato;
            }
        }
    }

    function salvarContatoEditado($id){

        $JsonContatos = pegaContatos();

        foreach ($JsonContatos as $posicao => $contato){
            if ($contato['id'] == $id){

                $JsonContatos[$posicao]['nome'] = $_POST['nome'];
                $JsonContatos[$posicao]['email'] = $_POST['email'];
                $JsonContatos[$posicao]['telefone'] = $_POST['telefone'];

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