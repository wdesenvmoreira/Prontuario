<?php

    class BDModel {
        public static function findAll($sql){

            $con = Connection::getConn();
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

		public static function findLast($sql){

			$con = Connection::getConn();
			
            $stm = $con->prepare($sql);
            $stm->execute();
			$find = $stm->fetchAll();
			$result = null;
			foreach ($find as  $value) {
				$result = $value;	
			}

            return $result;
		}


		

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