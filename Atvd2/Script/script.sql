create schema at02;

create table aluno(
ID int not null auto_increment,
nome varchar(45),
sobrenome varchar(45),
nasc int,
email varchar(45),
senha varchar(45),
primary key (ID)
);

create table autor(
idautor int not null auto_increment,
nomeautor varchar(45),
primary key (idautor)
);

create table livro(
idlivro int not null auto_increment,
titulo varchar(45),
anoPublicacao int,
primary key (idlivro)
);