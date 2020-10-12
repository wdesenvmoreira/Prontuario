<?php
    
    require_once'./model/Contact.php';
    
    class ContactController { 


        public static function findOneContact($inf){
           
            try {
               
                $result = Contact::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return  $result;
        }


        public static function createContact($data){

            if (empty($data['celular'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Campo obrigatório sem preencher.'));
            }

            $result = Contact::create($data);

            return $result;
        } 


        public static function updateContact($data){

            if (empty($data['id_contato'])) {
				return false;
            }
            
            if (empty($data['celular'])) {
                return false;
            }


            if (empty($data)) {

                return false;
            }

            try {
                $result = Contact::update($data);

            } catch (\Throwable $th) {
                $result = 'Erro ao incluir contato: '.$th;
            }
           
            return $result;

        } 


        public static function deleteContact($data){

            if (!empty($data['id_contato'])) {

                $result = Contact::delete($data);
                return $result;
                
            }
        } 

    }