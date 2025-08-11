CREATE DATABASE bosquedapaz;
use bosquedapaz;

CREATE TABLE categoria(
	id_categoria INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(200) NOT NULL,
    cor VARCHAR(50) NOT NULL,
    icone VARCHAR(255) NOT NULL,
    status_cat ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    PRIMARY KEY(id_categoria)
);

CREATE TABLE endereco(
	id_endereco INT NOT NULL AUTO_INCREMENT,
    cep CHAR(9) NULL,
    logradouro VARCHAR(150) NULL,
    complemento VARCHAR(150) NULL,
    num_residencia INT NULL,
    bairro VARCHAR(100) NULL,
    cidade VARCHAR(100) NULL,
    estado VARCHAR(100) NULL,
    PRIMARY KEY(id_endereco)
);

CREATE TABLE endereco_evento(
	id_endereco_evento INT NOT NULL AUTO_INCREMENT,
    nome_local VARCHAR(150) NOT NULL,
    cep_evento CHAR(9) NULL,
    logradouro_evento VARCHAR(150) NOT NULL,
    complemento_evento VARCHAR(150) NULL,
    numero_evento INT NOT NULL,
    bairro_evento VARCHAR(100) NOT NULL,
    cidade_evento VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_endereco_evento)
);

CREATE TABLE pessoa_user(
	id_login int not null auto_increment,
	email VARCHAR(200) NULL UNIQUE,
    senha VARCHAR(200) NULL,
	perfil INT DEFAULT 0,
    status_pes ENUM('ativo', 'inativo') NOT NULL DEFAULT 'inativo',
    primeiro_acesso INT DEFAULT '0',
	PRIMARY KEY	(id_login)
);

CREATE TABLE pessoa( 
	id_pessoa INT NOT NULL AUTO_INCREMENT,
    cpf CHAR(11) NULL UNIQUE,
    nome VARCHAR(150) NOT NULL,
    whats CHAR(29) NULL,
    telefone CHAR(16) NULL,
    termos ENUM("Sim", "Não") NOT NULL DEFAULT "Não",
    link_instagram VARCHAR(255) NULL,
    link_facebook VARCHAR(255) NULL,
    link_whats VARCHAR(255) NULL,
    img_perfil VARCHAR(255) NULL,
    id_endereco INT NULL,
    id_login INT NULL,
    PRIMARY KEY(id_pessoa),
    FOREIGN KEY(id_endereco) REFERENCES endereco(id_endereco),
    FOREIGN KEY(id_login) REFERENCES pessoa_user(id_login)
);

CREATE TABLE expositor(
	id_expositor INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    id_categoria INT NOT NULL,
    nome_marca VARCHAR(100) NOT NULL,
    num_barraca INT NULL,
    voltagem VARCHAR(45) NULL,
    energia VARCHAR(10) NULL,
    tipo VARCHAR(255) NULL,
    contato2 CHAR(11) NULL,
    descricao VARCHAR(200) NULL,
    metodos_pgto VARCHAR(50) NULL,
    cor_rua VARCHAR(150) NULL DEFAULT '',
    produto VARCHAR(100) NOT NULL,
    validacao ENUM('aguardando', 'validado', 'recusado') NOT NULL DEFAULT 'aguardando',
    PRIMARY KEY(id_expositor),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa),
    FOREIGN KEY(id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE imagem(
	id_imagem INT NOT NULL AUTO_INCREMENT,
    caminho varchar(255),
    id_expositor int not null,
    PRIMARY KEY(id_imagem),
    FOREIGN KEY(id_expositor) REFERENCES expositor(id_expositor)
);

CREATE TABLE colaborador(
	id_colaborador INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_colaborador),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa)
);

CREATE TABLE artista (
	id_artista INT NOT NULL AUTO_INCREMENT,
	id_pessoa INT NOT NULL,
    email varchar(150) not null,
    tipo_artista VARCHAR(50) NOT NULL,
    nome_artistico VARCHAR(100) NOT NULL,
    linguagem_artistica VARCHAR(100) NOT NULL,
    tempo_apresentacao VARCHAR(50),
    valor_cache FLOAT NOT NULL,
    publico_alvo VARCHAR(50) NOT NULL,
    status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    PRIMARY KEY(id_artista),
    FOREIGN KEY(id_pessoa) REFERENCES pessoa(id_pessoa)
);

CREATE TABLE evento (
    id_evento INT NOT NULL AUTO_INCREMENT,
    nome_evento VARCHAR(150) NOT NULL,
    subtitulo_evento VARCHAR(150) NOT NULL,
    descricao_evento VARCHAR(500) NOT NULL,
    data_evento DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fim TIME NOT NULL,
    id_endereco_evento INT NOT NULL,
    banner_evento VARCHAR(255) NOT NULL,
    status BOOLEAN DEFAULT 1,
    PRIMARY KEY (id_evento),
    FOREIGN KEY (id_endereco_evento) REFERENCES endereco_evento(id_endereco_evento)
);

CREATE TABLE atracao(
	id_atracao INT NOT NULL AUTO_INCREMENT,
    nome_atracao VARCHAR(150) NOT NULL,
    descricao_atracao VARCHAR(250) NOT NULL,
    banner_atracao VARCHAR(255) NOT NULL,
    status BOOLEAN DEFAULT(1),
    id_evento INT NOT NULL,
    PRIMARY KEY(id_atracao),  
    FOREIGN KEY(id_evento) REFERENCES evento(id_evento)
);

CREATE TABLE fotos_evento (
    id_foto INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT NOT NULL,
    caminho_foto_evento VARCHAR(255) NOT NULL,
    legenda_foto_evento VARCHAR(255),
    FOREIGN KEY (id_evento) REFERENCES evento(id_evento) ON DELETE CASCADE
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
    status_parceiro ENUM('Ativo', 'Inativo') NOT NULL DEFAULT 'Ativo',
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

CREATE TABLE utilidade_publica (
	id_utilidade_publica INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    descricao TEXT,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    imagem VARCHAR(255),
    status_utilidade CHAR(1) DEFAULT 1,
    PRIMARY KEY(id_utilidade_publica)
);


CREATE VIEW view_expositor AS
SELECT exp.id_expositor, exp.id_pessoa, exp.nome_marca, exp.num_barraca, exp.voltagem, exp.energia, exp.tipo, exp.descricao as descricao_exp, exp.metodos_pgto, exp.cor_rua, exp.validacao, 
pes.nome, pes.cpf, pes.whats, pes.telefone, pes.link_instagram, pes.link_facebook, pes.link_whats, pes.img_perfil, 
cat.id_categoria, cat.descricao, cat.cor, cat.icone,
en.cidade,
log.email, log.status_pes, log.id_login
FROM expositor AS exp 
INNER JOIN categoria AS cat 
ON cat.id_categoria = exp.id_categoria 
INNER JOIN pessoa AS pes 
ON pes.id_pessoa = exp.id_pessoa
INNER JOIN endereco AS en 
ON pes.id_endereco = en.id_endereco
INNER JOIN pessoa_user as log
ON log.id_login = pes.id_login;

CREATE VIEW view_colaborador AS 
SELECT c.cargo, c.id_colaborador, 
p.id_pessoa, p.id_login, p.nome, p.telefone, p.img_perfil,
l.email, l.perfil, l.status_pes
FROM pessoa_user AS l
INNER JOIN pessoa AS p
ON l.id_login = p.id_login
INNER JOIN colaborador AS c
ON p.id_pessoa = c.id_pessoa;

-- Inserts: 
insert into carrossel (caminho, posicao) values 
("../Public/uploads/uploads-carrosel/img-carrossel-1.jpg", 1),
("../Public/uploads/uploads-carrosel/img-carrossel-2.jpg", 2),
("../Public/uploads/uploads-carrosel/img-carrossel-3.jpg", 3);


insert into pessoa_user (email, senha, perfil, status_pes) values ('thiago.almeida@ms.senac.br', "$2y$10$l2Je0M8p1do8QrHMBbnukOYTXxqG/760G8DH5iQuoeLmK.FxMwmFy", 1, 'ativo');

insert into dadosFeira(qtd_visitantes, qtd_expositores, qtd_artistas) values ('60', '566', '345');

alter table boleto modify column mes_referencia varchar(20);
ALTER TABLE boleto ADD COLUMN status_boleto VARCHAR(20) NOT NULL DEFAULT 'Pendente';

DELIMITER //

create trigger trigger_qtd_expositor
after update on expositor
for each row
begin
	update dadosFeira set qtd_expositores = (select count(id_expositor) from expositor where validacao = 'validado') where id_dadosFeira = 1;
end//

create trigger trigger_qtd_artista
after insert on artista
for each row
begin
	update dadosFeira set qtd_artistas = (select count(id_artista) from artista where status = 'ativo') where id_dadosFeira = 1;
end//

DELIMITER ;