    <?php

        function agenda($auxiliar){
            $contatosAuxiliar = file_get_contents('contatos.json'); //armazena os resultados
            $contatosAuxiliar = json_decode($contatosAuxiliar, true); // converte para um array, onde o php entende

        }
        //CADASTRO DE USUARIOS
        function cadastrar(){

            $contatosAuxiliar = file_get_contents('contatos.json');
            $contatosAuxiliar = json_decode($contatosAuxiliar, true);

            $contato = [
                'id'      => uniqid(), //gerar um id novo e diferente, em todas às vezes que atualizar
                'nome'    =>$_POST['nome'],
                'email'   =>$_POST['email'],
                'telefone'=>$_POST['telefone']
            ];

            array_push($contatosAuxiliar, $contato);

            $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT); //vizualização melhorada

            file_put_contents('contatos.json',$contatosJson);  //atualiza o conteudo do arquivo

            header('Location: index.phtml'); //redireciona a página
        }

        function pegarContatos($busca = null){

            $contatosAuxiliar = ;
            $contatosEncontrados = [];

            if ($busca == null OR $busca == "") {
                $contatosEncontrados = $contatosAuxiliar;
            } else {
                foreach ($contatosAuxiliar as $contato) {
                    if (strtolower($contato['nome']) == strtolower($busca)) {
                        $contatosEncontrados[] = $contato;
                    }
                }
            }
            return $contatosEncontrados;
        }
        //EXCLUIR CONTATOS DA LISTA
        function excluirContato($id){

            $contatosAuxiliar = file_get_contents('contatos.json');
            $contatosAuxiliar = json_decode($contatosAuxiliar, true);

            foreach ($contatosAuxiliar as $posicao => $contato) { //iteração
                if ($id == $contato['id']) {
                    unset($contatosAuxiliar[$posicao]);
                }
            }

            $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
            file_put_contents('contatos.json', $contatosJson);

            header('Location: index.phtml');
        }

        //EDITAR CONTATO CADASTRADO
        function editarContato($id){

            $contatosAuxiliar = file_get_contents('contatos.json');
            $contatosAuxiliar = json_decode($contatosAuxiliar, true);

            foreach ($contatosAuxiliar as $contato){ //iteração
                if ($contato['id'] == $id){
                    return $contato;
                }
            }

        }

        //SALVAR CONTATO EDITADO
        function salvarContatoEditado($id){
            $contatosAuxiliar = file_get_contents('contatos.json');
            $contatosAuxiliar = json_decode($contatosAuxiliar, true);

            foreach ($contatosAuxiliar as $posição => $contato){ //iteração
                if ($contato['id'] == $id){

                    $contatosAuxiliar[$posição]['nome'] = $_POST['nome'];
                    $contatosAuxiliar[$posição]['email'] = $_POST['email'];
                    $contatosAuxiliar[$posição]['telefone'] = $_POST['telefone'];
                    break;
                }
            }



            $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
            file_put_contents('contatos.json',$contatosJson);
            header('Location: index.phtml');
        }

            editarContato('5953b7956ba4c');

        if ($_GET['acao'] == 'cadastrar'){
            cadastrar();
        }elseif ($_GET['acao'] == 'Excluir'){
            excluirContato($_GET['id']);
        }else{
            ($_POST['acao'] == 'Editar');
                editarContato($_POST['id']);
            }


        //LOGIN





































