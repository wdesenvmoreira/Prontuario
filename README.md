# Prontuario
 Prontuario medico - UNIFAGOC

# Banco MariaDB
 Criação : Importe e execute o arquivo scripts.sql 

# Api
 Api se encontra na pasta prontuario: Desenvolvida em php, necessário clonar dentro da pasta do seu servidor apache. 
 Necessário informar dados do servidor no arquivo config.ini. Base de dados, localhost, usuário e senha. 
 Acesso às api: substitua localhost pelo seu host e modulo por cadas modulo. 
 Modulos: administrador, usuarios, paciente, medico, pessoa, fichapaciente, fichapacientelaudo, fichapacienteexame, exame, laudo,
 contato, endereco, especialidades 
 Exemplos
    Metodo POST
        Inclusão: http://{localhost}/prontuario/{modulo}/incluir
        Deletar:  http://{localhost}/prontuario/{modulo}/deletar  
        Alterar: http://{localhost}/prontuario/{modulo}/alterar,
    Metodo GET
        Localizar todos: http://{localhost}/prontuario/{modulo}/
        Localizar por id: http://{localhost}/prontuario/{modulo}/id/1
        Localizar por nome: http://{localhost}/prontuario/{modulo}/nome/Nome Paciente
        Localizar por cpf: http://{localhost}/prontuario/{modulo}/cpf/79887910054

# Front-End
 Criação: Clone a pasta Prontuario_Front
 npm install
    