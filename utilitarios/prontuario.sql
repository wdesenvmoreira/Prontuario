-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2020 às 17:05
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prontuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL COMMENT 'identificador',
  `id_pessoa` int(11) NOT NULL COMMENT 'Pessoa identificador, Tabela pessoa. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL COMMENT 'identficador',
  `telefone_fixo` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'Telefone Fixo',
  `celular` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'Celular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `telefone_fixo`, `celular`) VALUES
(1, '3243214321', '32988776655');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL COMMENT 'identificador',
  `cep` int(8) NOT NULL,
  `logradouro` varchar(240) COLLATE utf8_bin NOT NULL COMMENT 'logradouro, rua. avenida. via',
  `numero` varchar(5) COLLATE utf8_bin NOT NULL COMMENT 'Numero',
  `complemento` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'Complemento',
  `bairro` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Bairro',
  `cidade` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Cidade',
  `uf` varchar(2) COLLATE utf8_bin NOT NULL COMMENT 'Unidade da Federação. \r\nUtilize EX para exterior',
  `pais` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Pais'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `pais`) VALUES
(1, 36504120, 'Rua Cel. Seba Ramos', '1', 'apt 2', 'Eldorado', 'Ubá', 'MG', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidades` int(11) NOT NULL COMMENT 'identificador.',
  `id_medico` int(11) NOT NULL COMMENT 'identificador medico. \r\nTabela medico',
  `codigo_especialidade` int(11) NOT NULL COMMENT 'Codigo da especialidade no CFM,Conselho Federal Medicina.',
  `descricao_especialidade` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Descrição da especialidade. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id_especialidades`, `id_medico`, `codigo_especialidade`, `descricao_especialidade`) VALUES
(1, 1, 1, 'Alergia e Imunologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id_exame` int(11) NOT NULL COMMENT 'identificador',
  `descricao` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Descrição do exame.',
  `resultado` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Resultado do exame',
  `observacao` varchar(400) COLLATE utf8_bin DEFAULT NULL COMMENT 'Observação referente ao exame.',
  `tipo_exame` varchar(200) COLLATE utf8_bin NOT NULL COMMENT 'Tipo do exame',
  `data` date NOT NULL COMMENT 'Data de realização.',
  `id_paciente` int(11) NOT NULL COMMENT 'Paciente do exame.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_paciente`
--

CREATE TABLE `ficha_paciente` (
  `id_ficha_paciente` int(11) NOT NULL COMMENT 'identificação.',
  `id_paciente` int(11) NOT NULL COMMENT 'identificação paciente. Tabela paciente',
  `id_medico` int(11) NOT NULL COMMENT 'identificação medico. Tabela medico',
  `sintomas` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Sintomas paciente.',
  `avaliacao` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Avaliação referida pelo médico. ',
  `prescricao` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'prescricao medica. ',
  `data` date NOT NULL COMMENT 'data da consulta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_paciente_exame`
--

CREATE TABLE `ficha_paciente_exame` (
  `id_ficha_paciente_exame` int(11) NOT NULL COMMENT 'identificador.',
  `id_exame` int(11) NOT NULL COMMENT 'Identificador exame. Tabela Exame.',
  `id_ficha_paciente` int(11) NOT NULL COMMENT 'Identificador ficha Pacente. Tabela ficha_paciente.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_paciente_laudo`
--

CREATE TABLE `ficha_paciente_laudo` (
  `id_ficha_paciente_laudo` int(11) NOT NULL COMMENT 'Identificador.',
  `id_ficha_paciente` int(11) NOT NULL COMMENT 'Identificador paciente. Tabela paciente. ',
  `id_ficlha_laudo` int(11) NOT NULL COMMENT 'Identificador laudo. Tabela laudo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laudo`
--

CREATE TABLE `laudo` (
  `id_laudo` int(11) NOT NULL COMMENT 'identificador.',
  `id_paciente` int(11) NOT NULL COMMENT 'Paciente do laudo.',
  `id_medico` int(11) NOT NULL COMMENT 'Médico do Laudo.',
  `descricao_laudo` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Descrição do laudo. ',
  `resultado` varchar(400) COLLATE utf8_bin NOT NULL COMMENT 'Resultado do laudo.',
  `observacao` varchar(400) COLLATE utf8_bin DEFAULT NULL COMMENT 'Observação do Laudo.',
  `data` date NOT NULL COMMENT 'data de realização.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL COMMENT 'identificador',
  `id_pessoa` int(11) NOT NULL COMMENT 'identificador, tabela pessoa.',
  `crm` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'CRM. Certificado Regional Medicina.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id_medico`, `id_pessoa`, `crm`) VALUES
(1, 3, '111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL COMMENT 'identificador',
  `id_pessoa` int(11) NOT NULL COMMENT 'identificador pessoa. Tabela pessoa',
  `contato` int(11) NOT NULL COMMENT 'contatos. tabela contato',
  `endereco` int(11) NOT NULL COMMENT 'Endereço pessoa. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `id_pessoa`, `contato`, `endereco`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL COMMENT 'identificador',
  `nome_completo` varchar(200) COLLATE utf8_bin NOT NULL,
  `cpf` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome_completo`, `cpf`) VALUES
(2, 'Primeiro Paciente', 10414464036),
(3, 'Segunda Pessoa', 4947935030),
(4, 'Administrador', 5475447071);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL COMMENT 'identificador.',
  `id_pessoa` int(11) NOT NULL COMMENT 'identificador pessoa, Tabela pessoa.',
  `senha` varchar(15) COLLATE utf8_bin NOT NULL COMMENT 'senha',
  `tipo` int(11) NOT NULL COMMENT 'tipo de acesso.\r\n1 - Administrador\r\n2 - Paciente\r\n3 - Médico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `id_pessoa`, `senha`, `tipo`) VALUES
(1, 4, 'rrrr', 3),
(2, 3, '123', 2),
(6, 2, '5432', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidades`),
  ADD KEY `fk_especialidde_medico` (`id_medico`);

--
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id_exame`),
  ADD KEY `fk_exame_paciente` (`id_paciente`);

--
-- Índices para tabela `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  ADD PRIMARY KEY (`id_ficha_paciente`),
  ADD KEY `fk_ficha_paciente_paciente` (`id_paciente`),
  ADD KEY `fk_ficha_paciente_medico` (`id_medico`);

--
-- Índices para tabela `ficha_paciente_exame`
--
ALTER TABLE `ficha_paciente_exame`
  ADD PRIMARY KEY (`id_ficha_paciente_exame`),
  ADD KEY `fk_ficha_paciente_exame_exame` (`id_exame`),
  ADD KEY `fk_ficha_paciente_exame_ficha` (`id_ficha_paciente`);

--
-- Índices para tabela `ficha_paciente_laudo`
--
ALTER TABLE `ficha_paciente_laudo`
  ADD PRIMARY KEY (`id_ficha_paciente_laudo`),
  ADD KEY `fk_ficha_paciente_laudo_laudo` (`id_ficlha_laudo`),
  ADD KEY `fk_ficha_paciente_laudo_paciente` (`id_ficha_paciente`);

--
-- Índices para tabela `laudo`
--
ALTER TABLE `laudo`
  ADD PRIMARY KEY (`id_laudo`),
  ADD KEY `fk_laudo_paciente` (`id_paciente`),
  ADD KEY `fk_laudo_medico` (`id_medico`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `fk_medico_pessoa` (`id_pessoa`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_paciente_contato` (`contato`),
  ADD KEY `fk_paciente_endereco` (`endereco`),
  ADD KEY `fk_paciente_pessoa` (`id_pessoa`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `fk_usuario_pessoa` (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador';

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identficador', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidades` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `id_exame` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador';

--
-- AUTO_INCREMENT de tabela `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  MODIFY `id_ficha_paciente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificação.';

--
-- AUTO_INCREMENT de tabela `ficha_paciente_exame`
--
ALTER TABLE `ficha_paciente_exame`
  MODIFY `id_ficha_paciente_exame` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador.';

--
-- AUTO_INCREMENT de tabela `ficha_paciente_laudo`
--
ALTER TABLE `ficha_paciente_laudo`
  MODIFY `id_ficha_paciente_laudo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador.';

--
-- AUTO_INCREMENT de tabela `laudo`
--
ALTER TABLE `laudo`
  MODIFY `id_laudo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador.';

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador.', AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `fk_especialidde_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `exame`
--
ALTER TABLE `exame`
  ADD CONSTRAINT `fk_exame_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  ADD CONSTRAINT `fk_ficha_paciente_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ficha_paciente_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ficha_paciente_exame`
--
ALTER TABLE `ficha_paciente_exame`
  ADD CONSTRAINT `fk_ficha_paciente_exame_exame` FOREIGN KEY (`id_exame`) REFERENCES `exame` (`id_exame`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ficha_paciente_exame_ficha` FOREIGN KEY (`id_ficha_paciente`) REFERENCES `ficha_paciente` (`id_ficha_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ficha_paciente_laudo`
--
ALTER TABLE `ficha_paciente_laudo`
  ADD CONSTRAINT `fk_ficha_paciente_laudo_laudo` FOREIGN KEY (`id_ficlha_laudo`) REFERENCES `laudo` (`id_laudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ficha_paciente_laudo_paciente` FOREIGN KEY (`id_ficha_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `laudo`
--
ALTER TABLE `laudo`
  ADD CONSTRAINT `fk_laudo_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_laudo_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_contato` FOREIGN KEY (`contato`) REFERENCES `contato` (`id_contato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_paciente_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_paciente_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
