<?php

require_once'BdModel.php';

    class Users extends BDModel {

        public static function create($data)
		{
            $id_pessoa = $data['id_pessoa'];
            $senha = $data['senha'];
            $tipo = $data['tipo'];

            $sql = "INSERT INTO usuarios (id_pessoa, senha, tipo) VALUES (".$id_pessoa.", ".$senha.", ".$tipo.")";

            $result = false;

            try {
                $result = Users::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }

            return $result;
			

        }
        public static function update($data)
		{
            $id_usuarios = $data['id_usuarios'];
            $senha = $data['senha'];
            $tipo = $data['tipo'];

            $sql = "UPDATE usuarios set senha = ".$senha.", tipo = ".$tipo." where id_usuarios = ".$id_usuarios;
            
            $result = false;

            try {
                $result = Users::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }

        public static function delete($data)
		{
            $id_usuarios = $data['id_usuarios'];

            $sql = "DELETE from usuarios where id_usuarios = ".$id_usuarios;
            
            $result = false;

            try {
                $result = Users::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){

            if($data[0] === 'id_usuarios'){
               $sql = "SELECT * FROM usuarios where id_usuarios =".$data[1]; 
            }
            if($data[0] === 'id_pessoa'){
                $sql = "SELECT * FROM usuarios where id_pessoa =".$data[1]; 
             }
             if($data[0] === 'Todos'){
                $sql = "SELECT * FROM usuarios ORDER BY id_usuarios ASC";
             }

             return Users::findAll($sql);
             
             
            
        }



    }