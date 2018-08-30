-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2018 às 13:48
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `NCODCARRINHO` int(11) NOT NULL,
  `NOME_CART` varchar(150) CHARACTER SET utf8 NOT NULL,
  `REF` varchar(150) CHARACTER SET utf8 NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `NCODMERCADORIA` int(11) NOT NULL,
  `NCODUSER` int(11) NOT NULL,
  `IMAGEM` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido_finalizado`
--

CREATE TABLE `itens_pedido_finalizado` (
  `NCODITENS` int(11) NOT NULL,
  `NCODPEDIDO` int(11) NOT NULL,
  `QNT_PEDIDO` int(11) NOT NULL,
  `VALOR_PEDIDO` decimal(10,2) NOT NULL,
  `NCODUSER` int(11) NOT NULL,
  `NCODMERCADORIA` int(11) NOT NULL,
  `NOME_MERC` varchar(150) CHARACTER SET utf8 NOT NULL,
  `REF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `IMAGEM` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE `mercadoria` (
  `NCODMERCADORIA` int(11) NOT NULL,
  `NOME_MERC` varchar(150) CHARACTER SET utf8 NOT NULL,
  `REF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `DESCRICAO` varchar(400) CHARACTER SET utf8 NOT NULL,
  `IMAGEM` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`NCODMERCADORIA`, `NOME_MERC`, `REF`, `VALOR`, `DESCRICAO`, `IMAGEM`) VALUES
(1, 'Smartphone LG X Power Dourado com 16GB', 'LGX', '549.00', 'Otimize as tarefas do seu dia a dia através de um aparelho que possibilita maior facilidade de comunicação onde quer que você esteja e a qualquer momento. Ao comprar o smartphone LG X Power você terá acesso a inúmeros recursos desenvolvidos especialmente para lhe auxiliar em suas atividades profissionais e pessoais.', 'images/produtos/lg-x-power.jpg'),
(2, 'Smartphone Samsung Galaxy J7 Duos Metal Dourado com 16GB', 'J7', '729.00', 'Comprar o smartphone Samsung Galaxy J7 é sinônimo de praticidade, eficiência, qualidade e autonomia. Isso porque ele tem bateria de longa duração, líder da categoria, para você falar mais, se conectar por um período maior, jogar e utilizar aplicativos sem se preocupar com o tempo que resta para o aparelho desligar repentinamente.', 'images/produtos/galaxy-j7.jpg'),
(3, 'Smartphone LG Q6 Dual Chip Android 7.0 32GB', 'LGQ6', '836.10', 'Conheça o LG Q6, o mais novo smartphone com a tela FullVision da LG. A tela FullVision de 5.5\" e resolução Full HD+ e formato 18:9 permite que você tenha melhor visualização dos vídeos e apps favoritos.\r\nO excelente conjunto de câmeras do LG Q6 traz 13MP na câmera principal e 5MP com a selfie grande angular de 100° que já é uma marca registrada da LG. Você pode deixar as suas fotos mais divertidas', 'images/produtos/lg-q6.jpg'),
(4, 'Smartphone Asus Zenfone 4 64GB', 'ZENFONE', '1044.65', 'O novo ZenFone 4 Selfie possui um sistema duplo de câmeras frontais. Juntas, elas são capazes de fotografar muito mais do ambiente, graças à super lente Wide Angle de 120°, e com extrema qualidade de imagem com resolução de 20 MP. Já o modo Retrato, vai dar um acabamento ainda mais profissional e artístico para suas selfies, criando aquele lindo efeito com o fundo desfocado. Mas se a luz não estiv', 'images/produtos/asus-zenfone-4.jpg'),
(5, 'Smartphone Motorola Moto G5s Plus 32GB', 'MOTOG5S', '1149.00', 'Amplie as suas possibilidades de comunicação utilizando um aparelho repleto de funções e recursos para facilitar o seu dia a dia pessoal e profissional. Desenvolvido para estar ao seu lado sempre que for preciso, o smartphone Motorola modelo moto g⁵ˢ Plus XT1802 vem equipado com uma infinidade de soluções incríveis.', 'images/produtos/moto-g5s-plus.jpg'),
(6, 'Smartphone Motorola Moto X4 32GB', 'MOTOX4', '1349.99', 'Quem gosta de tirar fotos ou filmar situações diversas vai perceber, logo de cara, que o Smartphone Motorola Moto X4 XT1900 Preto é especial. Principalmente por ser dotado de um sistema de câmera traseira dupla com recursos exclusivos, sendo uma de 12 MP e outra de 8 MP. E tem mais! Uma câmera frontal de 16 MP de resolução para uma verdadeira super-selfie com variadas funcionalidades e modos criat', 'images/produtos/moto-x4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_finalizado`
--

CREATE TABLE `pedido_finalizado` (
  `NCODPEDIDO` int(11) NOT NULL,
  `VALOR_PEDIDO` decimal(10,2) NOT NULL,
  `QNT_PEDIDO` int(11) NOT NULL,
  `NCODUSER` int(11) NOT NULL,
  `DATA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `NCODUSER` int(11) NOT NULL,
  `NOME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `TEL` bigint(12) NOT NULL,
  `CPF` bigint(11) NOT NULL,
  `ENDERECO` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NUMERO` bigint(10) NOT NULL,
  `CEP` bigint(11) NOT NULL,
  `BAIRRO` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CIDADE` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ESTADO` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PAIS` varchar(100) CHARACTER SET utf8 NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `USER` varchar(100) CHARACTER SET utf8 NOT NULL,
  `SENHA` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NIVEL` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`NCODUSER`, `NOME`, `TEL`, `CPF`, `ENDERECO`, `NUMERO`, `CEP`, `BAIRRO`, `CIDADE`, `ESTADO`, `PAIS`, `EMAIL`, `USER`, `SENHA`, `NIVEL`) VALUES
(1, 'Administrador', 12345678, 12345678910, 'Rua teste', 123, 88010000, 'Centro', 'Florianópolis', 'SC', 'BR', 'adm@email.com', 'adm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`NCODCARRINHO`);

--
-- Indexes for table `itens_pedido_finalizado`
--
ALTER TABLE `itens_pedido_finalizado`
  ADD PRIMARY KEY (`NCODITENS`);

--
-- Indexes for table `mercadoria`
--
ALTER TABLE `mercadoria`
  ADD PRIMARY KEY (`NCODMERCADORIA`);

--
-- Indexes for table `pedido_finalizado`
--
ALTER TABLE `pedido_finalizado`
  ADD PRIMARY KEY (`NCODPEDIDO`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NCODUSER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `NCODCARRINHO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `itens_pedido_finalizado`
--
ALTER TABLE `itens_pedido_finalizado`
  MODIFY `NCODITENS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `mercadoria`
--
ALTER TABLE `mercadoria`
  MODIFY `NCODMERCADORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedido_finalizado`
--
ALTER TABLE `pedido_finalizado`
  MODIFY `NCODPEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `NCODUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;