<?php

require_once'BdModel.php';
require_once'Contact.php';
require_once'Person.php';

    class Patient extends BDModel {

        public static function create($data)
		{
            $celular = $data['celular'];
            $telefone_fixo = $data['telefone_fixo'];

            $logradouro = $data['logradouro'];
            $numero = $data['numero'];
            $complemento = $data['complemento'];
            $bairro = $data['bairro'];
            $cep = $data['cep'];
            $cidade = $data['cidade'];
            $uf = $data['uf'];
            $pais = $data['pais'];

            $nome_completo = $data['nome_completo'];
            $cpf = $data['cpf'];
            
            
            $sqlContato = "INSERT INTO contato (celular, telefone_fixo) VALUES ('".$celular."', '".$telefone_fixo."')";
            $returnContato = Contact::execute($sqlContato);
            $contato = null;
            
            if($returnContato){
                $contato = Address::findLast("SELECT id_contato FROM contato ORDER BY id_contato DESC LIMIT 1");
            }
            

            
            $sqlEndereco = "INSERT INTO endereco (logradouro, numero, complemento, bairro, cep, cidade, uf, pais) 
            VALUES ('".$logradouro."', '".$numero."', '".$complemento."', '".$bairro."', ".$cep.", '".$cidade."', '".$uf."', '".$pais."')";
            $end = Address::execute($sqlEndereco);
            $endereco = null;

            if($end){
                $endereco = Address::findLast("SELECT id FROM endereco ORDER BY id DESC LIMIT 1");
            }
            

            $sqlPessoa = "INSERT INTO pessoa (nome_completo, cpf) VALUES ('".$nome_completo."', ".$cpf.")";
            $pessoa = Person::execute($sqlPessoa);
            $id_pessoa = null;
            if($pessoa){
                $id_pessoa = Person::findLast("SELECT id_pessoa FROM pessoa ORDER BY id_pessoa DESC LIMIT 1");
            }
    

            $sqlPaciente = "INSERT INTO paciente (id_pessoa, contato, endereco) VALUES (".$id_pessoa['id_pessoa'].", ".$contato['id_contato'].", ".$endereco['id'].")";
            $paciente = Patient::execute($sqlPaciente);
            $id_paciente = null;
            if($paciente){
                $id_paciente = Patient::findLast("SELECT id_paciente FROM paciente ORDER BY id_paciente DESC LIMIT 1");
            }
            

            return $id_paciente;
			

        }
        public static function update($data)
		{
            $id_paciente = $data['id_paciente'];
            $contato = $data['contato'];
            $endereco = $data['endereco'];

            $sql = "UPDATE paciente set contato = '".$contato."', endereco = ".$endereco." where id_paciente = ".$id_paciente;
            var_dump($sql);
            $result = false;

            try {
                $result = Patient::execute($sql);
            } catch (\Throwable $th) {
                return $th;
            }
            return $result;
        }

        public static function delete($data)
		{
            $id_paciente = $data['id_paciente'];

            $sql = "DELETE from paciente where id_paciente = ".$id_paciente;
            
            $result = false;

            try {
                $result = Patient::execute($sql);
            } catch (\Throwable $ith) {
                return $th;
            }
            return $result;
        }
        
        public static function find($data){
            if($data[0] === 'id'){
               $sql = "SELECT * FROM paciente where id_paciente =".$data[1]; 
            }
            if($data[0] === 'nome'){
                $sql = "SELECT pessoa.*, p.nome_completo FROM paciente
                        left join pessoa p on(p.id_pessoa = paciente.id_pessoa)
                        where p.nome_completo like '".$data[1]."%' ORDER BY p.nome_completo ASC"; 
             }
             if($data[0] === 'cpf'){
                $sql = "SELECT cpf FROM paciente
                left join pessoa p on(p.id_pessoa = paciente.id_pessoa)
                where p.cpf = ".$data[1]." ORDER BY nome_completo ASC"; 
             }
             if($data[0] === 'Todos'){
                $sql = "SELECT * FROM paciente";
             }
             
             return Patient::findAll($sql);
             
             
            
        }



    }