<?php
    
    require_once'./model/Doctor.php';
    
    class DoctorController extends Person{ 


        public static function findAllDoctor (){
            try {
                $inf = ['Todos'];
                $result = Doctor::find($inf);
                
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }

        public static function findOneDoctor($data){
            try {
                
                $result = Doctor::find($data);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }


        public static function createDoctor($data){
            
            $result = Doctor::create($data);
            
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao inserir Verifique os campos'));
        } 


        public static function updateDoctor($data){

            if (empty($data['id_medico'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Medico não informado'));

				return false;
            }

            if (empty($data)) {

                echo  json_encode(array('status' => 'Falha', 'dados' => 'Dados faltando'));
                return false;
            }

            $result = Doctor::update($data);
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao alterar. Verifique os campos'));

        } 


        public static function deleteDoctor($data){

            if (empty($data['id_medico'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Medico deve ser informado.'));
            }
            if (!empty($data['id_medico'])) {

                $result = Doctor::delete($data);
                echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao excluir. Verifique o usuário.'));
                
            }
        } 

        
    }