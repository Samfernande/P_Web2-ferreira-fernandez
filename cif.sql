drop database if exists db_cif;

create database if not exists db_cif;

create table if not exists db_cif.t_categorie(
    idCategorie int unsigned primary key not null,
    carTitre varchar(50) not null
);

create table if not exists db_cif.t_utilisateur(
    idUtilisateur int unsigned primary key not null,
    utiPseudo varchar(25) not null,
    utiMotDePasse varchar(25) not null,
    utiDate date not null
);

create table if not exists db_cif.t_cif(
    idCif int unsigned primary key not null,
    cifTitre varchar(100) not null,
    cifDescription varchar(1000) not null,
    cifDate date not null,
    fkUtilisateur int unsigned not null,
    fkCategorie int unsigned not null
);

create table if not exists db_cif.t_evaluation(
    idEvaluation int unsigned primary key not null,
    evaNote int unsigned not null,
    fkUtilisateur int unsigned
);

create table if not exists db_cif.t_contenir(
    idContenir int unsigned primary key not null,
    fkEvaluation int unsigned not null,
    fkCif int unsigned not null
);

alter table db_cif.t_cif
    add constraint fk_idUtilisateur_cif foreign key (fkUtilisateur) references db_cif.t_utilisateur(idUtilisateur) on delete cascade on update cascade;

alter table db_cif.t_cif
    add constraint fk_idCategorie_cif foreign key (fkCategorie) references db_cif.t_categorie(idCategorie) on delete cascade on update cascade;

alter table db_cif.t_evaluation
    add constraint fk_idUtilisateur_eval foreign key (fkUtilisateur) references db_cif.t_utilisateur(idUtilisateur) on delete cascade on update cascade;

alter table db_cif.t_contenir
    add constraint fk_idEvaluation_cif foreign key (fkEvaluation) references db_cif.t_evaluation(idEvaluation) on delete cascade on update cascade;

alter table db_cif.t_contenir
    add constraint fk_idCif foreign key (fkCif) references db_cif.t_cif(idCif) on delete cascade on update cascade;


alter table db_cif.t_utilisateur
    add constraint unique_pseudo unique (utiPseudo);