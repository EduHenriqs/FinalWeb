-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2023 às 20:50
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `melb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `descricao`) VALUES
(1, 'Bebidas', 'Refrigerantes, sucos, água, etc.'),
(2, 'Carnes', 'Carnes bovinas, suínas, aves, etc.'),
(3, 'Laticínios', 'Leite, queijo, iogurte, manteiga, etc.'),
(4, 'Padaria', 'Pães, bolos, tortas, etc.'),
(5, 'Hortifruti', 'Frutas, legumes, verduras, etc.'),
(6, 'Limpeza', 'Produtos de limpeza doméstica, como detergentes e desinfetantes.'),
(7, 'Higiene Pessoal', 'Produtos para cuidados pessoais, como shampoo, sabonete, etc.'),
(8, 'Congelados', 'Alimentos congelados, como pizzas, sorvetes, etc.'),
(9, 'Cereais', 'Cereais, granolas, aveia, etc.'),
(10, 'Enlatados', 'Alimentos enlatados, como conservas, molhos, etc.'),
(11, 'Biscoitos', 'Bolachas, cookies, etc.'),
(12, 'Doces', 'Chocolates, balas, doces em geral.'),
(13, 'Bebês', 'Produtos para bebês, como fraldas, mamadeiras, etc.'),
(14, 'Cuidados com Animais', 'Produtos para cuidados com animais de estimação, como ração, coleiras, etc.'),
(15, 'Eletrodomésticos', 'Eletrodomésticos para uso doméstico, como liquidificadores, aspiradores, etc.'),
(16, 'Eletrônicos', 'Produtos eletrônicos, como celulares, TVs, etc.'),
(17, 'Utensílios de Cozinha', 'Panelas, talheres, etc.'),
(18, 'Produtos de Limpeza', 'Produtos de limpeza para a casa, como vassouras, rodos, etc.'),
(19, 'Produtos de Beleza', 'Produtos de beleza, como maquiagem, perfumes, etc.'),
(20, 'Artigos para Escritório', 'Material de escritório, como papel, canetas, etc.'),
(21, 'Artigos Esportivos', 'Artigos esportivos, como bolas, raquetes, etc.'),
(22, 'Ferramentas', 'Ferramentas para uso doméstico, como martelos, chaves de fenda, etc.'),
(23, 'Produtos de Jardinagem', 'Produtos para jardinagem, como sementes, adubos, etc.'),
(24, 'Papelaria', 'Produtos de papelaria, como cadernos, lápis, etc.'),
(25, 'Livros', 'Livros de diferentes gêneros e temas.'),
(26, 'Brinquedos', 'Brinquedos para crianças de diferentes idades.'),
(27, 'Moda', 'Roupas, acessórios, calçados, etc.'),
(28, 'Material de Limpeza', 'Material para limpeza profissional, como detergentes industriais, etc.'),
(29, 'Produtos Químicos', 'Produtos químicos para uso doméstico, como produtos de limpeza para piscinas, inseticidas, etc.'),
(30, 'Suplementos', 'Suplementos alimentares, vitaminas, etc.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `cidade`, `estado`) VALUES
(1, 'Erechim', 'RS'),
(2, 'Passo Fundo', 'RS'),
(3, 'Caxias do Sul', 'RS'),
(4, 'Porto Alegre', 'RS'),
(5, 'Santa Maria', 'RS'),
(6, 'Pelotas', 'RS'),
(7, 'Uruguaiana', 'RS'),
(8, 'Alegrete', 'RS'),
(9, 'Santo  ngelo', 'RS'),
(10, 'Palmeira das Missões', 'RS'),
(11, 'Vacaria', 'RS'),
(12, 'São Lourenço do Sul', 'RS'),
(13, 'São João da Boa Vista', 'RS'),
(14, 'Farroupilha', 'RS'),
(15, 'Santa Cruz do Sul', 'RS'),
(16, 'São Francisco do Sul', 'RS'),
(17, 'Passo de Torres', 'RS'),
(18, 'Lajeado', 'RS'),
(19, 'Bento Gonçalves', 'RS'),
(20, 'Rio Grande', 'RS'),
(21, 'Torres', 'RS'),
(22, 'Canela', 'RS'),
(23, 'São Leopoldo', 'RS'),
(24, 'Novo Hamburgo', 'RS'),
(25, 'Gramado', 'RS'),
(26, 'Cachoeira do Sul', 'RS'),
(27, 'Guaíba', 'RS'),
(28, 'Santa Vitória do Palmar', 'RS'),
(29, 'Tramandaí', 'RS'),
(30, 'Osório', 'RS'),
(31, 'Capão da Canoa', 'RS'),
(32, 'Ijuí', 'RS'),
(33, 'Cruz Alta', 'RS'),
(34, 'Santa Rosa', 'RS'),
(35, 'Paulo Bento', 'RS'),
(36, 'Bagé', 'RS'),
(37, 'São Borja', 'RS'),
(38, 'Itaqui', 'RS'),
(39, 'Barão de Cotegipe', 'RS'),
(40, 'Gaurama', 'RS'),
(41, 'Três Arroios', 'RS'),
(42, 'Florianópolis', 'SC'),
(43, 'Joinville', 'SC'),
(44, 'Blumenau', 'SC'),
(45, 'Itajaí', 'SC'),
(46, 'Chapecó', 'SC'),
(47, 'Criciúma', 'SC'),
(48, 'Tubarão', 'SC'),
(49, 'Brusque', 'SC'),
(50, 'Lages', 'SC'),
(51, 'Concórdia', 'SC'),
(53, 'Seila', 'RO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_enderecos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `dataNasc`, `email`, `id_enderecos`) VALUES
(1, 'Maria Silva', '111.111.111-11', '(54) 99999-1111', '1990-01-01', 'maria.silva@email.com', 21),
(2, 'João Santos', '222.222.222-22', '(54) 99999-2222', '1985-02-02', 'joao.santos@email.com', 22),
(3, 'Pedro Oliveira', '333.333.333-33', '(54) 99999-3333', '1998-03-03', 'pedro.oliveira@email.com', 23),
(4, 'Ana Rodrigues', '444.444.444-44', '(54) 99999-4444', '1992-04-04', 'ana.rodrigues@email.com', 24),
(5, 'Lucas Almeida', '555.555.555-55', '(54) 99999-5555', '1987-05-05', 'lucas.almeida@email.com', 25),
(6, 'Camila Costa', '666.666.666-66', '(54) 99999-6666', '1995-06-06', 'camila.costa@email.com', 26),
(7, 'Eduardo Pereira', '777.777.777-77', '(54) 99999-7777', '1989-07-07', 'eduardo.pereira@email.com', 27),
(8, 'Mariana Fernandes', '888.888.888-88', '(54) 99999-8888', '1991-08-08', 'mariana.fernandes@email.com', 28),
(9, 'Rafael Souza', '999.999.999-99', '(54) 99999-9999', '1993-09-09', 'rafael.souza@email.com', 29),
(10, 'Juliana Lima', '000.000.000-00', '(54) 99999-0000', '1986-10-10', 'juliana.lima@email.com', 30),
(11, 'Fernando Santos', '111.111.111-12', '(54) 99999-1112', '1984-11-11', 'fernando.santos@email.com', 31),
(12, 'Carolina Oliveira', '222.222.222-23', '(54) 99999-2223', '1997-12-12', 'carolina.oliveira@email.com', 32),
(13, 'Roberto Pereira', '333.333.333-34', '(54) 99999-3334', '1988-01-13', 'roberto.pereira@email.com', 33),
(14, 'Patrícia Fernandes', '444.444.444-45', '(54) 99999-4445', '1990-02-14', 'patricia.fernandes@email.com', 34),
(15, 'Guilherme Almeida', '555.555.555-56', '(54) 99999-5556', '1997-08-12', 'guilherme.almeida@email.com', 35),
(16, 'Larissa Costa', '666.666.666-67', '(54) 99999-6667', '1992-03-15', 'larissa.costa@email.com', 36),
(17, 'Alexandre Santos', '777.777.777-78', '(54) 99999-7778', '1986-04-16', 'alexandre.santos@email.com', 37),
(18, 'Helena Rodrigues', '888.888.888-89', '(54) 99999-8889', '1998-05-17', 'helena.rodrigues@email.com', 38),
(19, 'Rodrigo Pereira', '999.999.999-90', '(54) 99999-9990', '1991-06-18', 'rodrigo.pereira@email.com', 39),
(20, 'Amanda Fernandes', '000.000.000-01', '(54) 99999-0001', '1993-07-19', 'amanda.fernandes@email.com', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `recebido` tinyint(1) DEFAULT 0,
  `data_recebido` date DEFAULT NULL,
  `id_fornecedores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `id` int(11) NOT NULL,
  `quantidade` decimal(10,3) NOT NULL DEFAULT 1.000,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `id_produtos` int(11) NOT NULL,
  `id_compras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `rua` varchar(120) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `id_cidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `numero`, `complemento`, `bairro`, `cep`, `id_cidades`) VALUES
(1, 'Rua Paissandu', '123', 'Apto 501', 'Centro', '99700-000', 1),
(2, 'Rua Barão do Rio Branco', '456', 'Sala 202', 'Centro', '99700-010', 1),
(3, 'Rua São Paulo', '789', NULL, 'Centro', '99700-020', 1),
(4, 'Rua Pernambuco', '1010', 'Casa 2', 'Centro', '99700-030', 1),
(5, 'Avenida Sete de Setembro', '1111', 'Loja 3', 'Centro', '99700-040', 1),
(6, 'Rua Paraná', '222', NULL, 'Centro', '99700-050', 1),
(7, 'Rua Amazonas', '333', NULL, 'Centro', '99700-060', 1),
(8, 'Rua Espírito Santo', '444', NULL, 'Centro', '99700-070', 1),
(9, 'Rua Rio de Janeiro', '555', NULL, 'Centro', '99700-080', 1),
(10, 'Rua Minas Gerais', '666', 'Apto 302', 'Centro', '99700-090', 1),
(11, 'Rua Rio Grande do Sul', '777', 'Casa 1', 'Centro', '99700-100', 1),
(12, 'Rua Santa Catarina', '888', NULL, 'Centro', '99700-110', 1),
(13, 'Rua Sergipe', '999', NULL, 'Centro', '99700-120', 1),
(14, 'Rua Bahia', '1010', 'Loja 5', 'Centro', '99700-130', 1),
(15, 'Rua Ceará', '1111', 'Apto 101', 'Centro', '99700-140', 1),
(16, 'Rua Mato Grosso', '1212', NULL, 'Centro', '99700-150', 1),
(17, 'Rua Goiás', '1313', NULL, 'Centro', '99700-160', 1),
(18, 'Rua Tocantins', '1414', NULL, 'Centro', '99700-170', 1),
(19, 'Rua Maranhão', '1515', NULL, 'Centro', '99700-180', 1),
(20, 'Rua Alagoas', '1616', NULL, 'Centro', '99700-190', 1),
(21, 'Rua Acre', '1717', NULL, 'Centro', '99700-200', 1),
(22, 'Rua Rio Branco', '1818', NULL, 'Centro', '99700-210', 1),
(23, 'Rua Rondônia', '1919', NULL, 'Centro', '99700-220', 1),
(24, 'Rua Amapá', '2020', NULL, 'Centro', '99700-230', 1),
(25, 'Rua Pará', '2121', NULL, 'Centro', '99700-240', 1),
(26, 'Rua Paraíba', '2222', NULL, 'Centro', '99700-250', 1),
(27, 'Rua Rio Grande do Norte', '2323', NULL, 'Centro', '99700-260', 1),
(28, 'Rua Espírito Santo', '2424', NULL, 'Centro', '99700-270', 1),
(29, 'Rua Piauí', '2525', NULL, 'Centro', '99700-280', 1),
(30, 'Rua Maranhão', '2626', NULL, 'Centro', '99700-290', 1),
(31, 'Rua Tocantins', '2727', NULL, 'Centro', '99700-300', 1),
(32, 'Rua Bahia', '2828', NULL, 'Centro', '99700-310', 1),
(33, 'Rua Ceará', '2929', NULL, 'Centro', '99700-320', 1),
(34, 'Rua Acre', '3030', NULL, 'Centro', '99700-330', 1),
(35, 'Rua Alagoas', '3131', NULL, 'Centro', '99700-340', 1),
(36, 'Rua Rondônia', '3232', NULL, 'Centro', '99700-350', 1),
(37, 'Rua Amapá', '3333', NULL, 'Centro', '99700-360', 1),
(38, 'Rua Pará', '3434', NULL, 'Centro', '99700-370', 1),
(39, 'Rua Paraíba', '3535', NULL, 'Centro', '99700-380', 1),
(40, 'Rua Rio Grande do Norte', '3636', NULL, 'Centro', '99700-390', 1),
(41, 'Rua Espírito Santo', '3737', NULL, 'Centro', '99700-400', 1),
(42, 'Rua Piauí', '3838', NULL, 'Centro', '99700-410', 1),
(43, 'Rua Maranhão', '3939', NULL, 'Centro', '99700-420', 1),
(44, 'Rua Tocantins', '4040', NULL, 'Centro', '99700-430', 1),
(45, 'Rua Bahia', '4141', NULL, 'Centro', '99700-440', 1),
(46, 'Rua Ceará', '4242', NULL, 'Centro', '99700-450', 1),
(47, 'Rua Acre', '4343', NULL, 'Centro', '99700-460', 1),
(48, 'Rua Alagoas', '4444', NULL, 'Centro', '99700-470', 1),
(49, 'Rua Rondônia', '4545', NULL, 'Centro', '99700-480', 1),
(50, 'Rua Amapá', '4646', NULL, 'Centro', '99700-490', 1),
(51, 'n sei', '15', '', 'bairroso', '516154567', 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `representante` varchar(45) NOT NULL,
  `id_enderecos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `telefone`, `email`, `representante`, `id_enderecos`) VALUES
(1, 'Fornecimentos Inc.', '11.111.111/0001-01', '(54) 99999-1111', 'fornecimentos@email.com', 'João da Silva', 41),
(2, 'Suprimentos Rápidos', '22.222.222/0001-02', '(54) 99999-2222', 'suprimentosrapidos@email.com', 'Maria Santos', 42),
(3, 'Distribuição Eficiente', '33.333.333/0001-03', '(54) 99999-3333', 'distribuicaoeficiente@email.com', 'Pedro Oliveira', 43),
(4, 'Logística Inteligente', '44.444.444/0001-04', '(54) 99999-4444', 'logisticainteligente@email.com', 'Ana Pereira', 44),
(5, 'Comércio Global Ltda.', '55.555.555/0001-05', '(54) 99999-5555', 'comercioglobal@email.com', 'Carlos Costa', 45),
(6, 'Importação Expressa', '66.666.666/0001-06', '(54) 99999-6666', 'importacaoexpressa@email.com', 'Mariana Ferreira', 46),
(7, 'Exportação Veloz', '77.777.777/0001-07', '(54) 99999-7777', 'exportacaoveloz@email.com', 'Rafael Souza', 47),
(8, 'Suprimentos em Foco', '88.888.888/0001-08', '(54) 99999-8888', 'suprimentosfoco@email.com', 'Luiza Lima', 48),
(9, 'Distribuição Ágil Ltda.', '99.999.999/0001-09', '(54) 99999-9999', 'distribuicaoagil@email.com', 'Gustavo Santos', 49),
(10, 'Comércio Moderno S.A.', '10.000.000/0001-10', '(54) 99999-0000', 'comerciomoderno@email.com', 'Patricia Oliveira', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `data_admissao` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `id_enderecos` int(11) NOT NULL,
  `naturalidade` int(11) NOT NULL,
  `nivel_ensino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cargo`, `departamento`, `salario`, `data_admissao`, `cpf`, `rg`, `data_nascimento`, `sexo`, `telefone`, `email`, `senha`, `id_enderecos`, `naturalidade`, `nivel_ensino`) VALUES
(1000, 'O mestre dos magos', 'Chefão', 'Todos', '100000.00', '2021-01-01', '388.542.560-21', '12245679', '1990-01-01', 'M', '(54) 99999-1111', 'theboss@gmaile.com', '$2y$10$wjQ0QBzcaGfPvK3Kv3IUROBtCT2sulWFYqo5OSKGzgzY1FUtPoPwm', 1, 1, 'Ensino Superior Completo'),
(1001, 'João da Silva', 'Caixa', 'Financeiro', '2500.00', '2021-01-01', '111.111.111-11', '12245678', '1990-01-01', 'M', '(54) 99999-1111', 'joao.silva@email.com', '$2y$10$9wb9e4RJBPtzHi.8i1VQHuRwpyi0agsuE0k4.vyB0lId4hy3LJSdS', 1, 1, ''),
(1002, 'Maria Oliveira', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '222.222.222-22', '23456589', '1995-02-15', 'F', '(54) 99999-2222', 'maria.oliveira@email.com', '$2y$10$9RlU9/6sI/PJrBmfwH5FW.HDqzuhVxorAB2T5srUU927KUQVS6gg2', 2, 1, ''),
(1003, 'Pedro Santos', 'Auxiliar de Limpeza', 'Limpeza', '1500.00', '2021-01-01', '333.333.333-33', '34598890', '1985-07-20', 'M', '(54) 99999-3333', 'pedro.santos@email.com', '$2y$10$Qa1GU.13UfkiiLFjbAzns.azs/Nr23oS87SxX6ofPvucLVfCjpjOm', 3, 1, ''),
(1004, 'Luciana Rodrigues', 'Atendente de Padaria', 'Padaria', '1800.00', '2021-01-01', '444.444.444-44', '456795801', '1998-04-10', 'F', '(54) 99999-4444', 'luciana.rodrigues@email.com', '$2y$10$/7SrdCsPeRFAf9FogEznVeXxBSV6t.08ED7QPaQrljHlPA2NNTwEe', 4, 1, ''),
(1005, 'Fernando Almeida', 'Gerente de Loja', 'Gerência', '4500.00', '2021-01-01', '555.555.555-55', '56459012', '1980-11-30', 'M', '(54) 99999-5555', 'fernando.almeida@email.com', '$2y$10$kJxc4W/D8CUCzbMg4zuJB.sYqEoi6JD1d9ZKzgCkYV8ut3LWTSnV2', 5, 1, ''),
(1006, 'Ana Souza', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '666.666.666-66', '67870123', '1992-06-25', 'F', '(54) 99999-6666', 'ana.souza@email.com', '$2y$10$XIcVkAI1hrjRvth.mMk0V.RGuz9pV0CwIncPDd0blBWybaoRYf1oG', 6, 2, ''),
(1007, 'Carlos Santos', 'Auxiliar de Estoque', 'Estoque', '1600.00', '2021-01-01', '777.777.777-77', '78461234', '1997-03-12', 'M', '(54) 99999-7777', 'carlos.santos@email.com', '$2y$10$JQ2LVOqggE/6.9MUFekd9.yrWIcSiSZ4qYsp5368xHcrE3LE31WKG', 7, 1, ''),
(1008, 'Mariana Lima', 'Atendente de Açougue', 'Açougue', '1900.00', '2021-01-01', '888.888.888-88', '89086345', '1996-08-08', 'F', '(54) 99999-8888', 'mariana.lima@email.com', '$2y$10$1xyn3zDA0FSBMFNVCaOxcereE.WW/DGrd1qf3shwAtaINtDKVJoe.', 8, 1, ''),
(1009, 'Rafael Silva', 'Fiscal de Caixa', 'Financeiro', '2200.00', '2021-01-01', '999.999.999-99', '90121456', '1991-09-18', 'M', '(54) 99999-9999', 'rafael.silva@email.com', '$2y$10$2VZlOpCbWmeppa0PEtQWd.UCEa/8GK5Ijl9OEsp.JoC/o02X7SqtK', 9, 1, ''),
(1010, 'Isabela Santos', 'Auxiliar de Limpeza', 'Limpeza', '1500.00', '2021-01-01', '000.000.000-00', '01244567', '1994-12-05', 'F', '(54) 99999-0000', 'isabela.santos@email.com', '$2y$10$1.KJnICySUzZ5jSgz59.guFjAhvt/eb9vMXGohSaaVnO70wG1HGIy', 10, 1, ''),
(1011, 'Antônio Oliveira', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '111.111.111-10', '12367678', '1987-02-10', 'M', '(54) 99999-1111', 'antonio.oliveira@email.com', '$2y$10$dVAxmgNQe3HYcv93rEwCbOBQFb2WJjv1VHDc6Xl5QcpyPan/ktGk6', 11, 1, ''),
(1012, 'Camila Rodrigues', 'Atendente de Padaria', 'Padaria', '1800.00', '2021-01-01', '222.222.222-29', '23428789', '1999-07-15', 'F', '(54) 99999-2222', 'camila.rodrigues@email.com', '$2y$10$MczEbz5MHvP6DHSRoF3stuufqKGq.s2IJCQNl/eIUTYJ5ghGyFP7C', 12, 3, ''),
(1013, 'Gustavo Almeida', 'Gerente de Loja', 'Gerência', '4500.00', '2021-01-01', '333.333.333-38', '34567990', '1982-04-20', 'M', '(54) 99999-3333', 'gustavo.almeida@email.com', '$2y$10$rxqHwbPVCMPFLRpg.KIzjeGz.TCUly9KIpiVS/MkYBNuDK/JpcHrS', 13, 1, ''),
(1014, 'Larissa Souza', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '444.444.444-47', '45646901', '1993-11-28', 'F', '(54) 99999-4444', 'larissa.souza@email.com', '$2y$10$UbXYqBXmDybtxkE4WkPY7uTKKvvEy0a6btZqJgHE.W1buoQwzdPFK', 14, 1, ''),
(1015, 'Marcos Santos', 'Auxiliar de Estoque', 'Estoque', '1600.00', '2021-01-01', '555.555.555-56', '56139012', '1996-08-17', 'M', '(54) 99999-5555', 'marcos.santos@email.com', '$2y$10$mM9Iy8UMMGvIwvRcKVqbbuph7WvJnTjn1pBMjoudeEFGUALhYncWG', 15, 1, ''),
(1016, 'Renata Lima', 'Atendente de Açougue', 'Açougue', '1900.00', '2021-01-01', '666.666.666-65', '67854123', '1988-05-26', 'F', '(54) 99999-6666', 'renata.lima@email.com', '$2y$10$UtYzMaA9TwHM3s7m2CtP1uEARCT15kDjA1Rmbgc/oN2vNsTcwsGVm', 16, 4, ''),
(1017, 'Leandro Silva', 'Açougueiro', 'Açougue', '2200.00', '2021-01-01', '777.777.777-74', '78471234', '1990-10-12', 'M', '(54) 99999-7777', 'leandro.silva@email.com', '$2y$10$AUfDRWoInPqlGdtEWvQYbOvqBfRd/zulPiidYB.1KimElp1yQElFq', 17, 1, ''),
(1018, 'Marina Oliveira', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '888.888.888-83', '89069345', '1992-03-08', 'F', '(54) 99999-8888', 'marina.oliveira@email.com', '$2y$10$DejP04VK15pYjgRnQCTjR.pHSR3Zj.4ZkCILp9A0N2TUoKa/J9vYa', 18, 1, ''),
(1019, 'Paulo Rodrigues', 'Auxiliar de Limpeza', 'Limpeza', '1500.00', '2021-01-01', '999.999.999-92', '90168456', '1995-06-25', 'M', '(54) 99999-9999', 'paulo.rodrigues@email.com', '$2y$10$RYQjzNdIIXVkmCPbG1UJXeBaBbm88p3pK5f4NJ1rB76ztg/m69lpu', 19, 45, ''),
(1020, 'Carla Santos', 'Operador de Caixa', 'Financeiro', '2000.00', '2021-01-01', '000.000.000-01', '01247567', '1989-09-22', 'F', '(54) 99999-0000', 'carla.santos@email.com', '$2y$10$BjnzE74FBn3X1lPSsYlxzOoTdSJmriQFSkehY/zEiSczrrw4tGhfe', 20, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acesso`
--

CREATE TABLE `niveis_acesso` (
  `id` int(11) NOT NULL,
  `id_func` int(5) NOT NULL,
  `acesso_estoque` enum('s','n') DEFAULT NULL,
  `acesso_clientes` enum('s','n') DEFAULT NULL,
  `acesso_funcionarios` enum('s','n') DEFAULT NULL,
  `acesso_vendas` enum('s','n') DEFAULT NULL,
  `acesso_niveis` enum('s','n') DEFAULT NULL,
  `acesso_relatorios` enum('s','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `niveis_acesso`
--

INSERT INTO `niveis_acesso` (`id`, `id_func`, `acesso_estoque`, `acesso_clientes`, `acesso_funcionarios`, `acesso_vendas`, `acesso_niveis`, `acesso_relatorios`) VALUES
(1, 1000, 's', 's', 's', 's', 's', 's'),
(2, 1001, 'n', 'n', 's', 'n', 's', 'n'),
(3, 1002, 's', 's', 'n', 's', 'n', 'n'),
(4, 1003, 'n', 'n', 'n', 'n', 'n', 'n'),
(5, 1004, 's', 'n', 'n', 'n', 's', 'n'),
(6, 1005, 'n', 'n', 's', 'n', 'n', 'n'),
(7, 1006, 's', 's', 'n', 'n', 's', 'n'),
(8, 1007, 's', 'n', 's', 'n', 's', 'n'),
(9, 1008, 'n', 's', 'n', 's', 'n', 'n'),
(10, 1009, 's', 's', 'n', 'n', 's', 'n'),
(11, 1010, 'n', 'n', 's', 's', 'n', 'n'),
(12, 1011, 's', 'n', 's', 's', 's', 'n'),
(13, 1012, 'n', 'n', 's', 's', 's', 'n'),
(14, 1013, 'n', 'n', 's', 'n', 'n', 'n'),
(15, 1014, 's', 'n', 'n', 'n', 'n', 'n'),
(16, 1015, 's', 's', 'n', 'n', 'n', 'n'),
(17, 1016, 'n', 'n', 'n', 's', 's', 'n'),
(18, 1017, 's', 's', 's', 'n', 's', 'n'),
(19, 1018, 'n', 'n', 'n', 'n', 's', 'n'),
(20, 1019, 's', 's', 's', 'n', 's', 'n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `embalagem` varchar(30) DEFAULT NULL,
  `cod_barras` varchar(20) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `unidade` varchar(5) NOT NULL,
  `id_categorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `marca`, `preco_venda`, `embalagem`, `cod_barras`, `estoque`, `unidade`, `id_categorias`) VALUES
(1, 'Refrigerante Coca-Cola', 'Coca-Cola', '15.00', 'Garrafa 2L', '7894900011018', 276, 'un', 1),
(2, 'Suco de Laranja Natural', 'Naturale', '3.49', 'Garrafa 1L', '7891234567890', 286, 'un', 1),
(3, 'Água Mineral sem Gás', 'Crystal', '1.99', 'Garrafa 500ml', '7890124386789', 299, 'un', 1),
(4, 'Carne Bovina Filé Mignon', 'Frigor', '24.99', 'Peça 1kg', '7897654321098', 298, 'kg', 2),
(5, 'Carne Suína Lombo', 'Seara', '19.99', 'Peça 1kg', '7899878943210', 293, 'kg', 2),
(6, 'Frango Empanado', 'Sadia', '12.99', 'Pacote 500g', '7892375678901', 297, 'kg', 2),
(7, 'Leite Integral', 'Nestlé', '2.49', 'Caixa 1L', '7893456762012', 297, 'un', 3),
(8, 'Queijo Mussarela', 'Tirolez', '6.99', 'Pacote 200g', '7894567826123', 295, 'un', 3),
(9, 'Iogurte Natural', 'Danone', '1.99', 'Pote 170g', '7895678191234', 294, 'un', 3),
(10, 'Pão Francês', 'Padaria do Bairro', '0.99', 'Unidade', '7896786712345', 276, 'un', 4),
(11, 'Bolo de Chocolate', 'Confeitaria Delícia', '15.99', 'Unidade', '7897890145456', 300, 'un', 4),
(12, 'Torta de Frango', 'Padaria Central', '22.99', 'Unidade', '7898901564567', 300, 'un', 4),
(13, 'Maçã', 'Frutinha', '1.49', 'Unidade', '7899015845678', 300, 'un', 5),
(14, 'Cenoura', 'Verdinho', '0.99', 'Unidade', '7890125256789', 300, 'un', 5),
(15, 'Alface Crespa', 'Verdão', '1.99', 'Unidade', '7891234167890', 300, 'un', 5),
(16, 'Detergente Líquido', 'Ypê', '2.99', 'Garrafa 500ml', '7892345368901', 298, 'un', 6),
(17, 'Sabonete em Barra', 'Dove', '1.49', 'Unidade', '7893456716012', 300, 'un', 7),
(18, 'Shampoo Anticaspa', 'Head & Shoulders', '9.99', 'Frasco 400ml', '7894567843123', 300, 'un', 7),
(19, 'Pasta de Dente', 'Colgate', '3.49', 'Tubo 90g', '7895678461234', 298, 'un', 7),
(20, 'Papel Higiênico', 'Neve', '7.99', 'Pacote 12 rolos', '7896789012345', 300, 'un', 7),
(21, 'Coca-Cola', 'Coca-Cola', '3.99', 'Lata', '789490001', 300, 'un', 1),
(22, 'Frango inteiro', 'AviPampa', '9.99', 'Embalagem plástica', '789445002', 300, 'un', 2),
(23, 'Queijo cheddar', 'Queijos do Sul', '5.49', 'Pacote', '789494203', 300, 'un', 3),
(24, 'Pão de forma integral', 'Padaria Nutrição', '3.29', 'Pacote', '789495404', 299, 'un', 4),
(25, 'Maçã', 'Frutas do Vale', '1.99', 'Kg', '789496505', 300, 'kg', 5),
(26, 'Sabão em pó', 'LimpezAção', '6.99', 'Caixa', '789497506', 294, 'un', 6),
(27, 'Shampoo', 'Cabelos Incríveis', '8.99', 'Frasco', '789498507', 295, 'un', 7),
(28, 'Pizza de Calabresa', 'Saborosa Pizzas', '12.99', 'Unidade', '789495908', 300, 'un', 8),
(29, 'Granola', 'Natureza Saudável', '4.49', 'Pacote', '789465009', 300, 'un', 9),
(30, 'Molho de Tomate', 'Saboroso Molhos', '2.99', 'Vidro', '789425010', 287, 'un', 10),
(31, 'Bolacha recheada', 'Delícias da Infância', '1.49', 'Pacote', '789415011', 299, 'un', 11),
(32, 'Chocolate ao Leite', 'Chocolates Deliciosos', '4.99', 'Barra', '789453012', 300, 'un', 12),
(33, 'Fralda Pampers', 'Cuidado do Bebê', '19.99', 'Pacote', '789497513', 300, 'un', 13),
(34, 'Ração para cães', 'Pets Felizes', '14.99', 'Pacote', '789498514', 300, 'un', 14),
(35, 'Refrigerante Pepsi', 'PepsiCo', '3.49', 'Lata', '789495915', 299, 'un', 1),
(36, 'Coxas de frango', 'AviFrango', '6.99', 'Embalagem plástica', '789494616', 297, 'un', 2),
(37, 'Sabonete Líquido', 'Dove', '8.99', '250ml', '7891234167891', 299, 'un', 7),
(38, 'Leite em Pó Integral', 'Ninho', '19.99', '800g', '7894561234894', 298, 'kg', 3),
(39, 'Suco de Laranja', 'Del Valle', '4.99', '1L', '7897824234567', 300, 'ml', 1),
(40, 'Carne Moída', 'Friboi', '14.99', '500g', '7899876543210', 295, 'kg', 2),
(41, 'Bolo de Chocolate', 'Padaria do João', '25.99', '1 un', '7896547346543', 300, 'un', 4),
(42, 'Shampoo Anticaspa', 'Head & Shoulders', '12.99', '400ml', '7897897849897', 300, 'ml', 7),
(43, 'Pizza de Calabresa', 'Hut Pizza', '29.99', '500g', '7896543857899', 300, 'un', 8),
(44, 'Aveia em Flocos', 'Quaker', '6.99', '200g', '7891234867891', 300, 'g', 9),
(45, 'Molho de Tomate', 'Predilecta', '2.99', '340g', '7897896791234', 299, 'g', 10),
(46, 'Bolacha Recheada', 'Oreo', '4.99', '90g', '7894561246894', 298, 'g', 11),
(47, 'Chocolate ao Leite', 'Nestlé', '3.99', '80g', '7899876542610', 298, 'g', 12),
(48, 'Fralda Descartável', 'Pampers', '34.99', 'M', '7897897257897', 300, 'un', 13),
(49, 'Ração para Cães', 'Pedigree', '29.99', '1kg', '7896545896543', 298, 'kg', 14),
(50, 'Refrigerante de Guaraná', 'Antarctica', '3.99', '2L', '7891298567891', 299, 'ml', 1),
(51, 'Carne de Frango', 'Sadia', '12.99', '1kg', '78978975597897', 292, 'kg', 2),
(52, 'Pão de Forma Integral', 'Wickbold', '5.99', '500g', '7899874643210', 291, 'g', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `data_venda` datetime NOT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `id_funcionarios` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `data_venda`, `valor_total`, `id_funcionarios`, `id_clientes`) VALUES
(1, '2023-05-17 14:26:49', '7008.89', 1001, 3),
(2, '2023-05-14 14:27:24', '52.93', 1017, 18),
(3, '2023-05-18 15:06:54', '4165.88', 1004, 20),
(4, '2023-05-01 15:08:51', '109.86', 1005, 14),
(5, '2023-04-25 15:09:16', '90.89', 1007, 1),
(6, '2023-04-03 15:09:38', '115.35', 1004, 2),
(7, '2023-04-16 15:10:41', '18.24', 1006, 4),
(8, '2023-03-13 15:11:16', '40.45', 1002, 11),
(9, '2023-05-25 15:11:43', '103.90', 1000, 17),
(10, '2023-05-31 15:12:09', '62.91', 1002, 4),
(11, '2023-04-11 15:12:21', '30.99', 1018, 5),
(12, '2023-02-22 15:12:44', '169.87', 1004, 1),
(13, '2023-02-14 15:14:18', '18.98', 1003, 4),
(14, '2023-02-03 15:29:55', '17.44', 1017, 5),
(15, '2023-02-28 15:30:49', '54.90', 1008, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `id_vendas` int(11) NOT NULL,
  `id_produtos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda_produto`
--

INSERT INTO `venda_produto` (`id`, `quantidade`, `valor_unit`, `valor_total`, `id_vendas`, `id_produtos`) VALUES
(1, 7, '999.00', '6993.00', 1, 1),
(2, 6, '0.99', '5.94', 1, 10),
(3, 5, '1.99', '9.95', 1, 9),
(4, 2, '6.99', '13.98', 2, 8),
(5, 1, '24.99', '24.99', 2, 4),
(6, 4, '3.49', '13.96', 2, 2),
(7, 5, '5.99', '29.95', 3, 52),
(8, 4, '999.00', '3996.00', 3, 1),
(9, 7, '19.99', '139.93', 3, 5),
(10, 2, '15.00', '30.00', 4, 1),
(11, 2, '6.99', '13.98', 4, 8),
(12, 2, '0.99', '1.98', 4, 10),
(13, 3, '2.99', '8.97', 4, 30),
(14, 3, '8.99', '26.97', 4, 27),
(15, 4, '6.99', '27.96', 4, 26),
(16, 1, '24.99', '24.99', 5, 4),
(17, 2, '0.99', '1.98', 5, 10),
(18, 4, '2.99', '11.96', 5, 30),
(19, 4, '12.99', '51.96', 5, 51),
(20, 5, '3.49', '17.45', 6, 2),
(21, 4, '0.99', '3.96', 6, 10),
(22, 3, '14.99', '44.97', 6, 40),
(23, 2, '19.99', '39.98', 6, 38),
(24, 1, '8.99', '8.99', 6, 37),
(25, 1, '1.99', '1.99', 7, 3),
(26, 2, '2.99', '5.98', 7, 30),
(27, 1, '3.29', '3.29', 7, 24),
(28, 1, '2.99', '2.99', 7, 45),
(29, 1, '3.99', '3.99', 7, 50),
(30, 1, '0.99', '0.99', 8, 10),
(31, 1, '1.99', '1.99', 8, 9),
(32, 1, '6.99', '6.99', 8, 8),
(33, 1, '2.49', '2.49', 8, 7),
(34, 1, '12.99', '12.99', 8, 6),
(35, 1, '15.00', '15.00', 8, 1),
(36, 4, '15.00', '60.00', 9, 1),
(37, 2, '0.99', '1.98', 9, 10),
(38, 2, '2.99', '5.98', 9, 30),
(39, 2, '8.99', '17.98', 9, 27),
(40, 2, '4.99', '9.98', 9, 46),
(41, 2, '3.99', '7.98', 9, 47),
(42, 3, '3.49', '10.47', 10, 2),
(43, 3, '6.99', '20.97', 10, 36),
(44, 2, '14.99', '29.98', 10, 40),
(45, 1, '1.49', '1.49', 10, 31),
(46, 2, '15.00', '30.00', 11, 1),
(47, 1, '0.99', '0.99', 11, 10),
(48, 3, '15.00', '45.00', 12, 1),
(49, 3, '0.99', '2.97', 12, 10),
(50, 2, '2.49', '4.98', 12, 7),
(51, 2, '29.99', '59.98', 12, 49),
(52, 3, '5.99', '17.97', 12, 52),
(53, 3, '12.99', '38.97', 12, 51),
(54, 1, '12.99', '12.99', 13, 51),
(55, 1, '5.99', '5.99', 13, 52),
(56, 1, '0.99', '0.99', 14, 10),
(57, 1, '3.49', '3.49', 14, 35),
(58, 2, '2.99', '5.98', 14, 16),
(59, 2, '3.49', '6.98', 14, 19),
(60, 2, '3.49', '6.98', 15, 2),
(61, 2, '0.99', '1.98', 15, 10),
(62, 2, '12.99', '25.98', 15, 6),
(63, 2, '2.99', '5.98', 15, 30),
(64, 2, '6.99', '13.98', 15, 26);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
 

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
 

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
 

--
-- Índices para tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
 
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
 
--
-- Índices para tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT de tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restrições para despejos de tabelas
--
