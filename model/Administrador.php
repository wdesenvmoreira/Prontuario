<?php

require_once'BdModel.php';

    class Administrador extends BDModel{

        public static function create($data)
		{
            $nome_completo = $data['nome_completo'];
            $cpf = $data['cpf'];

            $sqlPessoa = "INSERT INTO pessoa (nome_completo, cpf) VALUES ('".$nome_completo."', ".$cpf.")";
            $pessoa = Administrador::execute($sqlPessoa);
            $id_pessoa = null;
            if($pessoa){
                $id_pessoa = Administrador::findLast("SELECT id_pessoa FROM pessoa ORDER BY id_pessoa DESC LIMIT 1");
            }
            

            $sql = "INSERT INTO administradores (id_pessoa) VALUES (".$id_pessoa['id_pessoa'].")";

             var_dump($sql);

            $result = false;
          
            try {
                $result = Administrador::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }

            return $result;
			

        }


        public static function delete($data)
		{
            $id_administradores = $data['id_administradores'];

            $sql = "DELETE from administradores where id_administradores = ".$id_administradores;
            
            $result = false;

            try {
                $result = Administrador::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){
                
            if($data[0] === 'administrador' && $data[1]==='id'){
               $sql = "SELECT administradores.id_administrador,  p.nome_completo, p.cpf FROM administradores where id_administradores =".$data[2]; 
            }
            if($data[0] === 'administrador' && $data[1]==='nome'){
                $sql = "SELECT administradores.id_administrador, p.nome_completo, p.cpf FROM administradores left join pessoa p on(p.id_pessoa = administradores.id_pessoa)
                         where p.nome_completo like %".$data[2]." ORDER BY nome_completo ASC"; 
             }
             if($data[0] === 'Todos'){
                $sql = "SELECT administradores.id_administrador, p.nome_completo, p.cpf FROM administradores left join pessoa p on(p.id_pessoa = administradores.id_pessoa) ORDER BY nome_completo ASC";
             }
             var_dump($sql);
             return Administrador::findAll($sql);
             
             
            
        }



    }