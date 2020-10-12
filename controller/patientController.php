<?php
    
    require_once'./model/Patient.php';
    
    class PatientController extends Person{ 


        public static function findAllPatient (){
            try {
                $inf = ['Todos'];
                $result = Patient::find($inf);
                
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }

        public static function findOnePatient($id){
            try {
                $inf = ['id_paciente', $id];
                $result = Patient::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }


        public static function createPatient($data){
            
            $result = Patient::create($data);
            
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao inserir Verifique os campos'));
        } 


        public static function updatePatient($data){

            if (empty($data['id_paciente'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Paciente não informado'));

				return false;
            }
            
            if (empty($data['contato'])) {
				echo  json_encode(array('status' => 'Falha', 'dados' => 'Contato não informado'));  
                return false;

            }

            if (empty($data['endereco'])) {
                echo  json_encode(array('status' => 'Falha', 'dados' => 'Endereço não informado'));   
                return false;
            }

            if (empty($data)) {

                echo  json_encode(array('status' => 'Falha', 'dados' => 'Dados faltando'));
                return false;
            }

            $result = Patient::update($data);
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao alterar. Verifique os campos'));

        } 


        public static function deletePatient($data){

            if (empty($data['id_paciente'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Paciente deve ser informado.'));
            }
            if (!empty($data['id_paciente'])) {

                $result = Patient::delete($data);
                echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao excluir. Verifique o usuário.'));
                
            }
        } 

        
    }