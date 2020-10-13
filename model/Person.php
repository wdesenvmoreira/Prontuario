<?php

require_once'BdModel.php';

    class Person extends BDModel {

        public static function create($data)
		{
            $nomecompleto = $data['nome_completo'];
            $cpf = $data['cpf'];
            
            $sql = "INSERT INTO pessoa (nome_completo, cpf) VALUES ('".$nomecompleto."', ".$cpf.")";

            $result = false;
            var_dump($sql);
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
            $nomecompleto = $data['nome_completo'];
            $cpf = $data['cpf'];

            $sql = "UPDATE pessoa set nome_completo = '".$nomecompleto."', cpf = ".$cpf." where id_pessoa = ".$id_pessoa;
            var_dump($sql);
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

            if($data[0] === 'id'){ 
               $sql = "SELECT * FROM pessoa where id_pessoa =".$data[1]; 
            }
            if($data[0] === 'pessoas' && $data[1]==='nome'){
                $sql = "SELECT * FROM pessoa where nome_completo like '%".$data[2]."%' ORDER BY nome_completo ASC"; 
             }
             if($data[0] === 'pessoas' && $data[1] === 'cpf'){
                $sql = "SELECT * FROM pessoa where cpf = '".$data[2]."'" ; 
             }
             if($data[0] === 'Todos'){
                $sql = "SELECT * FROM pessoa ORDER BY nome_completo ASC";
             }

             return Person::findAll($sql);
             
             
            
        }

        public static function lastInsertId(){
            
        }



    }