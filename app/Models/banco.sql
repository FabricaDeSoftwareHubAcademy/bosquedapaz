CREATE DATABASE bosquedapaz;
use bosquedapaz;

CREATE TABLE categoria(
	id_categoria INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(200) NOT NULL,
    cor VARCHAR(50) NOT NULL,
    icone VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_categoria)
);

CREATE TABLE endereco(
	id_endereco INT NOT NULL AUTO_INCREMENT,
    cep CHAR(9) NOT NULL,
    logradouro VARCHAR(150) NOT NULL,
    complemento VARCHAR(150) NULL,
    num_residencia INT NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_endereco)
);

CREATE TABLE login(
	id_login INT NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(150) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    perfil CHAR(3) NOT NULL,
    PRIMARY KEY(id_login)
);


CREATE TABLE pessoa( 
	id_pessoa INT NOT NULL AUTO_INCREMENT,
    cpf CHAR(11) NULL UNIQUE,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(200) NULL,
    whats CHAR(11) NULL,
    telefone CHAR(11) NULL,
    link_instagram VARCHAR(255) NULL,
    link_facebook VARCHAR(255) NULL,
    link_whats VARCHAR(255) NULL,
    data_nasc DATE NULL,
    img_perfil VARCHAR(255) NULL,
    id_endereco INT NULL,
    id_login INT NULL,
    PRIMARY KEY(id_pessoa),
    FOREIGN KEY(id_endereco) REFERENCES endereco(id_endereco),
    FOREIGN KEY(id_login) REFERENCES login(id_login)
);

CREATE TABLE imagem(
	id_imagem INT NOT NULL AUTO_INCREMENT,
    imagem1 VARCHAR(255) NOT NULL,
    imagem2 VARCHAR(255) NOT NULL,
    imagem3 VARCHAR(255) NOT NULL,
    imagem4 VARCHAR(255) NOT NULL,
    imagem5 VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_imagem)
);

-- CREATE TABLE tipo_expositor(
-- 	id_tipo INT NOT NULL AUTO_INCREMENT,
--     
-- );


CREATE TABLE expositor(
	id_expositor INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    id_categoria INT NOT NULL,
    id_imagem INT NOT NULL,
    nome_marca VARCHAR(100) NOT NULL,
    num_barraca INT NULL,
    voltagem VARCHAR(45) NULL,
    energia VARCHAR(10) NULL,
    contato2 CHAR(11) NULL,
    descricao VARCHAR(200) NULL,
    metodos_pgto VARCHAR(50) NULL,
    cor_rua VARCHAR(150) NULL DEFAULT '',
    responsavel VARCHAR(150) NULL,
    produto VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_expositor),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa),
    FOREIGN KEY(id_categoria) REFERENCES categoria(id_categoria),
    FOREIGN KEY(id_imagem) REFERENCES imagem(id_imagem)
);

CREATE TABLE colaborador(
	id_colaborador INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    profissao VARCHAR(100) NOT NULL,
    imagem VARCHAR(255) NULL,
    senha VARCHAR(150) NOT NULL,
    PRIMARY KEY(id_colaborador),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa)
);

CREATE TABLE artista(
	id_artista INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    tipo_artista VARCHAR(50) NOT NULL,
    linguagem_artistica VARCHAR(100) NOT NULL,
    tempo_apresentacao TIME NOT NULL,
    valor_cache FLOAT NOT NULL,
    PRIMARY KEY(id_artista),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa)
);

CREATE TABLE evento(
	id_evento INT NOT NULL AUTO_INCREMENT,
    nome_evento VARCHAR(150) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    data_evento DATE NOT NULL,
    banner VARCHAR(255) NOT NULL,
    status BOOLEAN DEFAULT(0),
    PRIMARY KEY(id_evento)
);

CREATE TABLE atracao(
	id_atracao INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    horario DATETIME NOT NULL,
    foto_atracao VARCHAR(255) NOT NULL,
    id_evento INT NOT NULL,
    PRIMARY KEY(id_atracao),
    FOREIGN KEY(id_evento) REFERENCES evento (id_evento)
);


CREATE TABLE desenvolvedor(
	id_desenvolvedor INT NOT NULL AUTO_INCREMENT,
    nome_desenvolvedor VARCHAR(200) NOT NULL,
    link_instagram VARCHAR(200) NOT NULL,
    link_github VARCHAR(200) NOT NULL,
    link_linkedin VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_desenvolvedor)
);

CREATE TABLE parceiro(
	id_parceiro INT NOT NULL AUTO_INCREMENT,
    nome_parceiro VARCHAR(150) NOT NULL,
    telefone CHAR(11) NOT NULL,
    email VARCHAR(150) NOT NULL,
    nome_contato VARCHAR(150) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    cpf_cnpj CHAR(18) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    id_endereco INT NULL,
    PRIMARY KEY(id_parceiro),
    FOREIGN KEY(id_endereco) REFERENCES endereco(id_endereco)
);

CREATE TABLE carrossel(
	id_carrossel INT NOT NULL AUTO_INCREMENT,
	caminho varchar(255),
    posicao int,
    PRIMARY KEY(id_carrossel)
);

CREATE TABLE dadosFeira(
	id_dadosFeira INT NOT NULL AUTO_INCREMENT,
    qtd_visitantes BIGINT NOT NULL,
    qtd_expositores BIGINT NOT NULL,
    qtd_artistas BIGINT NOT NULL,
    qtd_paises BIGINT NOT NULL,
    PRIMARY KEY(id_dadosFeira)
);

CREATE TABLE boleto(
	id_boleto INT NOT NULL AUTO_INCREMENT,
    pdf VARCHAR(255) NOT NULL,
    mes_referencia DATE NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    vencimento DATE NOT NULL,
    id_expositor INT NOT NULL,
    PRIMARY KEY(id_boleto),
    FOREIGN KEY(id_expositor) REFERENCES expositor(id_expositor)
);


insert into carrosel (caminho, posicao) values ("../Public/uploads/uploads-carrosel/img-carrossel-1.png" 1);
insert into carrosel (caminho, posicao) values ("../Public/uploads/uploads-carrosel/img-carrossel-2.png" 2);
insert into carrosel (caminho, posicao) values ("../Public/uploads/uploads-carrosel/img-carrossel-3.png" 3);


insert into imagem values (default,"A","A","A","A","A");

insert into categoria values (default,"BURGERS","ROXO","blablabla");
