<?php
    
    require_once'./model/Address.php';
    
    class AddressController { 


        public static function findOneContact($inf){
           
            try {
               
                $result = Contact::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return  $result;
        }


        public static function createContact($data){

            if (empty($data['cep']) OR empty($data['numero'])) {

			    return false;
            }

            try {
                $result = Addres::create($data);
            } catch (\Throwable $th) {
                return 'Erro ao incluir Endereço: '.$th;
            }
            

            return $result;
        } 


        public static function updateContact($data){

            if (empty($data['id_endereco'])) {
				return false;
            }
            
            if (empty($data['cep'])) {
                return false;
            }


            if (empty($data)) {

                return false;
            }

            try {
                $result = Contact::update($data);

            } catch (\Throwable $th) {
                $result = 'Erro ao alterar endereço: '.$th;
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