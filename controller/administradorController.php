<?php
    
    require_once'./model/Administrador.php';
    
    class AdministradorController { 


        public static function findAllAdministrador (){
            try {
                $inf = ['Todos'];
                $result = Administrador::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
        
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }

        public static function findOneAdministrador($inf){
           
            try {
               
                $result = Administrador::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:$inf[0].' '.$inf[1].' não encontrado.'));
        }


        public static function createAdministrador($data){

            if (empty($data['cpf']) OR empty($data['nome_completo'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Campos obrigatório sem preencher.'));
            }

            $result = Administrador::create($data);

            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao inserir Verifique os campos'));
        } 


 


        public static function deleteAdministrador($data){

            if (empty($data['id_pessoa'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Usuario deve ser informado.'));
            }
            if (!empty($data['id_pessoa'])) {

                $result = Administrador::delete($data);
                echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao excluir. Verifique o usuário.'));
                
            }
        } 

    }