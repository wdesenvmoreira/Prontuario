<?php

require_once'BdModel.php';

    class Doctor extends BDModel {

        public static function create($data)
		{
            
            $crm = $data['crm'];
            $nome_completo = $data['nome_completo'];
            $cpf = $data['cpf'];


            $sqlPessoa = "INSERT INTO pessoa (nome_completo, cpf) VALUES ('".$nome_completo."', ".$cpf.")";
            $pessoa = Person::execute($sqlPessoa);
            $id_pessoa = null;
            if($pessoa){
                $id_pessoa = Person::findLast("SELECT id_pessoa FROM pessoa ORDER BY id_pessoa DESC LIMIT 1");
            }
    

            $sql = "INSERT INTO medico (id_pessoa, crm) VALUES (".$id_pessoa['id_pessoa'].", '".$crm."')";
         
            $id_medico = false;
            
            try {
                $id_medico = Doctor::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $id_medico;

        }
        public static function update($data)
		{
            $id_medico = $data['id_medico'];
            $crm = $data['crm'];
            $nome_completo=['nome_completo'];
            
            $sqlMedico= null;

            $sql = "UPDATE medico set crm = '".$crm."' where id_medico = ".$id_medico;
            if(empty($nome_completo)){
                $sqlMedico =  "Select id_pessoa  from medico left join pessoa p on(p.id_pessoa = medico.id_pessoa) where medico.id_medico=".$id_medico; 
                $id_pessoa = Person::findLast($sqlMedico);

                $sqlPessoa = "UPDATE pessoa set nome_completo = '".$nome_completo."' where id_pessoa = ".$id_pessoa;

            }
            
            $result = false;

            try {
                $result = Person::execute($sql);
                $result = Person::execute($sqlMedico);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }

        public static function delete($data)
		{
            $id_medico = $data['id_medico'];

            $sql = "DELETE from medico where id_medico = ".$id_medico;
            
            $result = false;

            try {
                $result = Person::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){
            if(count($data)===1){
                $sql = "SELECT p.nome_completo, p.cpf, medico.id_medico, medico.id_pessoa, medico.crm
                         FROM medico left join pessoa p on(p.id_pessoa = medico.id_pessoa)"; 
             }   
            if($data[0]==='medico' && $data[1]==='id'){
               $sql = "SELECT p.nome_completo, p.cpf, medico.id_medico, medico.id_pessoa, medico.crm
               FROM medico left join pessoa p on(p.id_pessoa = medico.id_pessoa) where id_medico =".$data[2]; 
            }
            if($data[0]==='medico' && $data[1]==='nome'){
                $sql = "SELECT p.nome_completo, p.cpf, medico.id_medico, medico.id_pessoa, medico.crm
                         FROM medico left join pessoa p on(p.id_pessoa = medico.id_pessoa)
                         where p.nome_completo like '%".$data[2]."%' order by p.nome_completo"; 
             }
             
             return Person::findAll($sql);
             
             
            
        }


    }