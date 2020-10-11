<?php
    
    require_once'./model/Person.php';
    
    class PersonController { 


        public static function findAllPerson (){
            try {
                $inf = ['Todos'];
                $result = Person::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
        
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }

        public static function findOnePerson($inf){
           
            

            try {
               
                $result = Person::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:$inf[0].' '.$inf[1].' não encontrado.'));
        }


        public static function createPerson($data){

            if (empty($data['cpf']) OR empty($data['nome_completo'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Campos obrigatório sem preencher.'));
            }

            $result = Person::create($data);

            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao inserir Verifique os campos'));
        } 


        public static function updatePerson($data){

            if (empty($data['id_pessoa'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Usuário não informado'));

				return false;
            }
            
            if (empty($data['nome_completo'])) {
				echo  json_encode(array('status' => 'Falha', 'dados' => 'nomecompleto não informado'));  
                return false;

            }

            if (empty($data['cpf'])) {echo'cpf',$data['cpf'];
                echo  json_encode(array('status' => 'Falha', 'dados' => 'cpf não informado'));   
                return false;
            }

            if (empty($data)) {

                echo  json_encode(array('status' => 'Falha', 'dados' => 'Dados faltando'));
                return false;
            }

            $result = Person::update($data);
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao alterar. Verifique os campos'));

        } 


        public static function deletePerson($data){

            if (empty($data['id_pessoa'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Usuario deve ser informado.'));
            }
            if (!empty($data['id_pessoa'])) {

                $result = Person::delete($data);
                echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao excluir. Verifique o usuário.'));
                
            }
        } 

    }