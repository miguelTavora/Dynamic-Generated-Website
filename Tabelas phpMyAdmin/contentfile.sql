-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jul-2020 às 00:18
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contentfile`
--

CREATE TABLE `contentfile` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `public` int(50) NOT NULL,
  `district` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contentfile`
--

INSERT INTO `contentfile` (`id`, `name`, `image`, `content`, `public`, `district`, `file`) VALUES
('deus', 'Templo Romano', 'templo-romano-evora.jpeg', 'O Templo Romano de Évora, erroneamente conhecido como Templo de Diana, está localizado na cidade de Évora, em Portugal. Faz parte do centro histórico da cidade, o qual foi classificado como Património Mundial pela UNESCO. O templo romano encontra-se class', 0, 'Évora', 'image'),
('deus', 'Santuário de Fátima', 'santuario-de-fatima.jpg', 'O Santuário de Fátima é, por excelência, um local de peregrinação cristã e devoção católica, preservando a memória dos acontecimentos que levaram à sua fundação, nomeadamente as aparições de Nossa Senhora aos três pastorinhos – Lúcia dos Santos, Francisco', 0, 'Leiria', 'image'),
('deus', 'Castelo dos Mouros', 'castelo-mouros.png', 'O Castelo de Sintra, popularmente conhecido como Castelo dos Mouros, localiza-se na vila de Sintra, freguesia de São Pedro de Penaferrim, concelho de Sintra, no distrito de Lisboa, em Portugal. Erguido sobre um maciço rochoso, isolado num dos cumes da ser', 0, 'Lisboa', 'image'),
('deus', 'Castelo de São Jorge', 'castelo-sao-jorge.jpg', 'O Castelo de São Jorge localiza-se na freguesia de Santa Maria Maior (Castelo), na cidade e concelho de Lisboa, em Portugal. As primeiras fortalezas do castelo datam do século 1 A.C. tendo ele sido reconstruído diversas vezes por vários povos e recebido d', 0, 'Lisboa', 'image'),
('deus', 'Cristo Rei', 'cristo-rei.jpg', 'O Santuário Nacional de Cristo Rei ou, simplesmente, Cristo Rei, é um santuário e monumento religioso dedicado ao Sagrado Coração de Jesus localizado na freguesia do Pragal, no concelho de Almada, na Área Metropolitana de Lisboa, em Portugal.', 1, 'Lisboa', 'image'),
('deus', 'Mosteiro dos Jerónimos', 'mosteiro-jeronimos.jpg', 'O Mosteiro de Santa Maria de Belém, mais conhecido como Mosteiro dos Jerónimos, é um mosteiro português da Ordem de São Jerónimo construído no século XVI. Situa-se na freguesia de Belém, na cidade e concelho de Lisboa. Tem, desde 2016, o estatuto de Pante', 0, 'Lisboa', 'image'),
('deus', 'Palácio Nacional de Mafra', 'palacio-mafra.jpg', 'O Convento de Mafra localiza-se no concelho de Mafra, no distrito de Lisboa, em Portugal, a cerca de 25 quilómetros de Lisboa. É composto por um palácio e mosteiro monumental em estilo barroco joanino, na vertente alemã. Os trabalhos da sua construção ini', 0, 'Lisboa', 'image'),
('deus', 'Palácio Nacional da Pena', 'palacio-pena.jpg', 'O Palácio Nacional da Pena, popularmente referido apenas por Palácio da Pena ou Castelo da Pena, localiza-se na vila de Sintra, freguesia de São Pedro de Penaferrim, concelho de Sintra, no distrito de Lisboa, em Portugal. Representa uma das principais exp', 0, 'Lisboa', 'image'),
('deus', 'Torre de Belém', 'torre-belem.jpg', 'A Torre de Belém, oficialmente Torre de São Vicente,[2] é uma fortificação localizada na freguesia de Belém, concelho e distrito de Lisboa, em Portugal. Na margem direita do rio Tejo, onde existiu outrora a praia de Belém, era primitivamente cercada pelas', 0, 'Lisboa', 'image'),
('deus', 'Fundação de Serralves', 'fundacao-serralves.jpg', 'A Fundação de Serralves foi criada em 1989, sendo o resultado de uma parceria entre o Governo Português, instituições públicas, privadas e particulares. A publicação dos seus estatutos e órgãos sociais foi feita no Decreto-Lei n.º 240-A/89, sendo o primei', 0, 'Porto', 'image'),
('deus', 'Palácio de Cristal', 'palacio-cristal.jpg', 'O Palácio de Cristal (1865 — 1951) foi um edifício que existiu no antigo campo da Torre da Marca, na freguesia de Massarelos, na cidade do Porto, em Portugal. Inaugurado em 1865, o Palácio de Cristal original acabou por ser demolido em 1951 para dar lugar', 1, 'Porto', 'image'),
('deus', 'Mosteiro da Batalha', 'mosteiro-batalha.jpg', 'O Mosteiro de Santa Maria da Vitória, mais conhecido como Mosteiro da Batalha, é um mosteiro dominicano situado na vila de Batalha, na região do Centro, província da Beira Litoral, em Portugal, que foi mandado edificar em 1386 pelo rei D. João I de Portug', 0, 'Leiria', 'image'),
('deus', 'Mosteiro de Alcobaça', 'mosteiro-alcobaca.jpg', 'O Mosteiro de Alcobaça, também conhecido como Real Mosteiro de Santa Maria de Alcobaça (o seu nome oficial na Congregação de Alcobaça que chefiava), é um mosteiro hoje situado na cidade de Alcobaça, na região do Centro, em Portugal. É a primeira obra plen', 1, 'Leiria', 'image'),
('deus', 'Convento de Cristo', 'convento-cristo.jpg', 'O Convento de Cristo (século XII – século XVIII) é a denominação atribuída a um conjunto de edificações históricas situado na freguesia de São João Baptista, cidade de Tomar, Portugal. O início da sua construção remonta a 1160 e está intimamente ligado ao', 0, 'Santarém', 'image'),
('deus', 'Castelo de Almourol', 'castelo-almourol.jpg', 'O Castelo de Almourol localiza-se na freguesia de Praia do Ribatejo, concelho de Vila Nova da Barquinha, distrito de Santarém, região do Centro (Região das Beiras), em Portugal, embora a sua localização seja frequentemente atribuída a Tancos, visto ser a ', 0, 'Santarém', 'image'),
('deus', 'Capela dos Ossos', 'capela-ossos.jpg', 'A Capela dos Ossos é um dos mais conhecidos monumentos de Évora, em Portugal. Está situada na Igreja de São Francisco. Foi construída no século XVII por iniciativa de três monges franciscanos que, dentro do espírito da altura (contra-reforma religiosa, de', 0, 'Évora', 'image'),
('deus', 'Museu Calouste Gulbenkian', 'museu-calouste-gulbenkian.jpg', 'O Museu Calouste Gulbenkian está inserido no conjunto que integra o Edifício-sede e parque da Fundação Calouste Gulbenkian (Fundação Calouste Gulbenkian, Lisboa). O projeto do edifício é da autoria dos arquitetos Alberto Pessoa, Pedro Cid e Ruy de Athougu', 1, 'Lisboa', 'image'),
('deus', 'Convento do Carmo', 'convento-carmo.jpg', 'O Convento do Carmo de Lisboa é um antigo convento da Ordem dos Carmelitas da Antiga Observância que se localiza no Largo do Carmo e foi erguido, sobranceiro ao Rossio (Praça de D. Pedro IV), na colina fronteira à do Castelo de São Jorge, na cidade e Dist', 1, 'Lisboa', 'image'),
('deus', 'Castelo de Guimarães', 'castelo-guimaraes.jpg', 'O Castelo de Guimarães localiza-se na freguesia de Oliveira do Castelo, cidade e concelho de Guimarães, no distrito de Braga, em Portugal. Em posição dominante, sobranceiro ao Campo de São Mamede, este monumento encontra-se ligado à fundação do Condado Po', 0, 'Braga', 'image'),
('deus', 'Santuário Jesus do Monte', 'bom-jesus-monte.jpg', 'O Santuário do Bom Jesus do Monte (também referido como Santuário do Bom Jesus de Braga) localiza-se na freguesia de Tenões, na cidade, concelho e distrito de Braga, em Portugal. Fica situado nas proximidades do Santuário de Nossa Senhora do Sameiro. Este', 1, 'Braga', 'image'),
('deus', 'Exemplos Monúmentos', 'mon-lisboa.mp4', 'Lisboa é uma cidade com dezenas de séculos de História. Surpreenda-se pelos seus mais emblemáticos monumentos. Existem variadíssimos tipos de monumentos em Lisboa que atraem todo o tipo de turistas devido a diferentes aspetos caraterísticos.', 0, 'Lisboa', 'video'),
('deus', 'Monumentos mais vistos', 'mon-porto.mp4', 'Cidade Invicta, de beleza austera e simples, o Porto começa a deslumbrar o mundo e a encantar cada vez mais turistas que visitam a capital no Norte de Portugal. Nos últimos anos sucedem-se os prémios. A cidade está mais bonita, muitos edifícios foram recu', 0, 'Porto', 'video'),
('deus', 'Monumentos de exemplo', 'mon-santarem.mp4', 'Localizada no Centro de Portugal e a apenas 80 km de Lisboa, Santarém é uma cidade como poucas no país. Para ser sincero, esta cidade não fazia parte da lista de cidades que eu queria mesmo visitar!\r\nJá tinha visto este sítio algumas vezes (tenho família ', 0, 'Santarém', 'video'),
('deus', 'Exemplos Monúmentos 2', 'mon2-lisboa.mp4', 'Visite o terceiro dos grandes monumentos em Belém, Lisboa e aproveite para subir a uma das melhores vistas sobre a cidade. Conheça esta relevante torre, quer em termos militares, estratégicos e ainda paisagísticos. O Mosteiro dos Jerónimos é um dos mais s', 1, 'Lisboa', 'video'),
('deus', 'Sé Velha', 'se-velha.jpg', 'Constitui um dos edifícios em estilo românico mais importantes do país. A sua construção começou em algum momento depois da Batalha de Ourique (1139), quando Afonso Henriques se declarou rei de Portugal e escolheu Coimbra como capital do reino. Na Sé está', 0, 'Coimbra', 'image');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
