        <?php

            function descolar(){
                $contatosAuxiliar = file_get_contents('contatos.json'); //armazena os resultados
                $contatosAuxiliar = json_decode($contatosAuxiliar, true); // converte para um array, onde o php entende
                return $contatosAuxiliar;

            }

            //CADASTRO DE USUARIOS
            function cadastrar($nome, $email, $telefone){

                $contatosAuxiliar = descolar();

                $contato = [
                    'id'      => uniqid(), //gerar um id novo e diferente, em todas às vezes que atualizar
                    'nome'    =>$_POST['nome'],
                    'email'   =>$_POST['email'],
                    'telefone'=>$_POST['telefone']
                ];

                array_push($contatosAuxiliar, $contato);
                salvar($contatosAuxiliar);


                /*$contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT); //vizualização melhorada

                file_put_contents('contatos.json',$contatosJson);  //atualiza o conteudo do arquivo

                header('Location: index.phtml'); //redireciona a página */
            }

            //SALVAR
             function salvar($contatosAuxiliar){

                $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);
             file_put_contents('contatos.json', $contatosJson);

            header("Location: index.phtml");
        }


        function buscarContatos($nome){

            $nome = strtoupper($nome);

            $contatos = descolar();

            $contatosEncontrados = [];

            foreach ($contatos as $contato){

                if($nome == strtoupper($contato['nome'])){
                    $contatosEncontrados[] = $contato;
                }
            }

            return $contatosEncontrados;

        }

            //EXCLUIR CONTATOS DA LISTA
            function excluirContato($id){

                $contatosAuxiliar = descolar();

                foreach ($contatosAuxiliar as $posicao => $contato) { //iteração
                    if ($id == $contato['id']) {
                        unset($contatosAuxiliar[$posicao]);
                    }
                }

                salvar($contatosAuxiliar);
            }

            //EDITAR CONTATO CADASTRADO
            function editarContato($id){

                $contatosAuxiliar = descolar();

                foreach ($contatosAuxiliar as $contato){ //iteração
                    if ($contato['id'] == $id){
                        return $contato;
                    }
                }
            }

            //SALVAR CONTATO EDITADO
            function salvarContatoEditado($id, $nome, $email, $telefone){
                $contatosAuxiliar = descolar();

                foreach ($contatosAuxiliar as $posição => $contato){ //iteração
                    if ($contato['id'] == $id){

                        $contatosAuxiliar[$posição]['nome'] = $nome;
                        $contatosAuxiliar[$posição]['email'] = $email;
                        $contatosAuxiliar[$posição]['telefone'] = $telefone;
                        break;
                    }
                }

                salvar($contatosAuxiliar);
            }


        if ($_GET['acao'] == 'cadastrar') {
            cadastrar($_POST['nome'], $_POST['email'], $_POST['telefone']);
        } elseif ($_GET['acao'] == 'excluir'){
            excluirContato($_GET['id']);
        } elseif ($_GET['acao'] == 'editar') {
            SalvarContatoEditado($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone']);
        }elseif ($_GET['acao'] = 'buscar'){
            buscarContatos($_GET['nome']);
        }






































