<?php

    class BDModel {
        public static function findAll($sql){
            $con = Connection::getConn();
            // $sql = "SELECT * FROM usuarios ORDER BY id_usuarios ASC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('BDModel')){
                array_push($result, $row);
            }
           
            if (empty($result)){
                return [];

            } 

            return $result;
        }

        // public static function findOne($sql){
        //     $con = Connection::getConn();
        //     // $sql = "SELECT * FROM usuarios where id_usuarios =".$id;
        //     $sql = $con->prepare($sql);
        //     $sql->execute();

        //     $result = array();
          
        //     while ($row = $sql->fetchObject('BDModel')){
        //         $result[] = $row;
        //     }

        //     if (empty($result)){
        //         return [];

        //     } 
        //     return $result;
        // }

        // public static function create($reqBody)
		// {
		// 	$con = Connection::getConn();
		// 	$sql = "INSERT INTO usuarios (id_pessoa, senha, tipo) VALUES (:id_pessoa, :senha, :tipo)";
		// 	$sql = $con->prepare($sql);
		// 	$sql->bindValue(':id_pessoa', $reqBody['id_pessoa']);
		// 	$sql->bindValue(':senha', $reqBody['senha']);
		// 	$sql->bindValue(':tipo', $reqBody['tipo']);
		// 	$sql->execute();

		// 	if ($sql->rowCount()) {
		// 		return true;
		// 	}

		// 	throw new Exception("Falha na inserção");
        // }

        // public static function update($reqBody)
		// {
		// 	$con = Connection::getConn();
		// 	$sql = "UPDATE usuarios set senha = :senha, tipo = :tipo where id_usuarios = :id_usuarios";
		// 	$sql = $con->prepare($sql);
		// 	$sql->bindValue(':id_usuarios', $reqBody['id_usuarios']);
		// 	$sql->bindValue(':senha', $reqBody['senha']);
		// 	$sql->bindValue(':tipo', $reqBody['tipo']);
		// 	$sql->execute();

		// 	if ($sql->rowCount()) {
		// 		return true;
		// 	}

		// 	return false;
        // }

        // public static function delete($reqBody)
		// {
		// 	$con = Connection::getConn();
		// 	$sql = "DELETE from usuarios where id_usuarios = :id_usuarios";
		// 	$sql = $con->prepare($sql);
		// 	$sql->bindValue(':id_usuarios', $reqBody['id_usuarios']);
		// 	$sql->execute();

		// 	if ($sql->rowCount()) {
		// 		return true;
		// 	}
        //     return false;
        // }

        public static function execute($sql)
		{
			$con = Connection::getConn();
			$sql = $con->prepare($sql);
			$sql->execute();

			if ($sql->rowCount()) {
				return true;
			}
            return false;
		
        }
        

    }