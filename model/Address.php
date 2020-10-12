<?php

require_once'BdModel.php';

    class Address extends BDModel {

        public static function create($data)
		{
            $logradouro = $data[0];
            $numero = $data[1];
            $complemento = $data[2];
            $bairro = $data[3];
            $cep = $data[4];
            $cidade = $data[5];
            $uf = $data[6];
            $pais = $data[7];
            $sql = "INSERT INTO endereco (logradouro, numero, complemento, bairro, cep, cidade, uf, pais) 
                    VALUES ('".$logradouro."', '".$numero."', '".$complemento."', '".$bairro."', ".$cep.", '".$cidade."', '".$uf."', '".$pais."')";
            
            $id_endereco = false;
            
            try {
                $id_endereco = Address::execute($sql);
                var_dump($id_endereco);
            } catch (\Throwable $th) {
                return 'Erro ao incluir endereço: '.$th;
            }
            
            return $id_endereco;
			

        }
        public static function update($data)
		{
            $id_endereco = $data['id_endereco'];
            $logradouro = $data['logradouro'];
            $numero = $data['numero'];
            $complemento = $data['complemento'];
            $bairro = $data['bairro'];
            $cep = $data['cep'];
            $cidade = $data['cidade'];
            $uf = $data['uf'];
            $pais = $data['pais'];
            

            $sql = "UPDATE endereco set logradouro = '".$logradouro."', numero = ".$numero." 
                    complemento = '".$complemento."',bairro = '".$bairro."',cep = '".$cep."',
                    cidade = '".$cidade."',uf = '".$uf."',pais = '".$pais."'
                    where id_endereco = ".$id_endereco;
            
            $result = false;

            try {
                $result = Address::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }

        public static function delete($data)
		{
            $id_endereco = $data['id_endereco'];

            $sql = "DELETE from enderesso where id_endereco = ".$id_endereco;
            
            $result = false;

            try {
                $result = Address::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){
            if($data[0] === 'id'){
               $sql = "SELECT * FROM endereco where id =".$data[1]; 
            }

             return Person::findAll($sql);
             
             
            
        }


    }