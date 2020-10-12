<?php

require_once'BdModel.php';

    class Contact extends BDModel {

        public static function create($data)
		{
            $celular = $data[0];
            $telefone_fixo = $data[1];
            $sql = "INSERT INTO contato (celular, telefone_fixo) VALUES ('".$celular."', '".$telefone_fixo."')";

            $id_contato = false;
            if(!empty($data)){
            try {
                $id_contato = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
        }
            return $result;
			
        }

        public static function update($data)
		{
            $id_contato = $data['id_contato'];
            $celular = $data['celular'];
            $telefone_fixo = $data['telefone_fixo'];

            $sql = "UPDATE contato set celular = '".$celular."', telefone_fixo = ".$telefone_fixo." where id_contato = ".$id_contato;
            
            $result = false;

            try {
                $result = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }

        public static function delete($data)
		{
            $id_contato = $data['id_contato'];

            $sql = "DELETE from contato where id_contato = ".$id_contato;
            
            $result = false;

            try {
                $result = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){
            if($data[0] === 'id'){
               $sql = "SELECT * FROM contato where id_contato =".$data[1]; 
            }

             return Person::findAll($sql);
             
             
            
        }


    }