<?php

require_once'BdModel.php';

    class Person extends BDModel {

        public static function create($data)
		{
            $nomecompleto = $data['nomecompleto'];
            $cpf = $data['cpf'];

            $sql = "INSERT INTO pessoa (nomecompleto, cpf) VALUES (".$nomecompleto.", ".$cpf.")";

            $result = false;

            try {
                $result = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }

            return $result;
			

        }
        public static function update($data)
		{
            $id_pessoa = $data['id_pessoa'];
            $nomecompleto = $data['nomecompleto'];
            $cpf = $data['cpf'];

            $sql = "UPDATE pessoa set nomecompleto = ".$nomecompleto.", cpf = ".$cpf." where id_pessoa = ".$id_pessoa;
            
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
            $id_pessoa = $data['id_pessoa'];

            $sql = "DELETE from pessoa where id_pessoa = ".$id_pessoa;
            
            $result = false;

            try {
                $result = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){

            if($data[0] === 'id_pessoa'){
               $sql = "SELECT * FROM pessoa where id_pessoa =".$data[1]; 
            }
            if($data[0] === 'nomecompleto'){
                $sql = "SELECT * FROM pessoa where nome_completo like %".$data[1]." ORDER BY nome_completo ASC"; 
             }
             if($data[0] === 'Todos'){
                $sql = "SELECT * FROM pessoa ORDER BY nome_completo ASC";
             }

             return Person::findAll($sql);
             
             
            
        }



    }