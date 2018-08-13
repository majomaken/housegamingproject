
Drop DATABASE HGDB;
create DATABASE HGDB;

/*tabla de imagenes donde se relacionan los registros de Avatar con su fuente*/
create table Avatar(
     AvatarId int auto_increment unique,
     AvatarName Varchar(16),
     /*Para llamar una imgen se puede insertar por sql pero el tipo de dato es
     LONGBLOB*/
     AvatarSrc varchar(128),
     AvatarType Varchar(16)
);
/*tabla de usuarios en general*/
/*existen 3 tipos de moderador, coach y users*/
create table `user`(
     UsHGTAG int auto_increment,
     UsFirstname varchar(10) NOT NUll,
     UsSecondname varchar(10) NOT NUll,
     UsLastname varchar(20) NOT NUll,
     UsNickname varchar(20) NOT NUll,
     UsBirthday date NOT NUll,
     UsCity varchar(16) NOT NUll,
     UsEmail varchar(40) NOT NUll,
     UsPassword varchar(16) NOT NUll,
     UsDocType varchar(16) NOT NUll,
     UsDocument varchar(16) NOT NUll,
     UsPhone varchar(16) NOT NUll,
     UsType varchar(8) NOT NUll,
     UsCoins Int,
     UsAvatar int,
     constraint US_register unique (UsHGTAG,UsEmail,UsNickname),
     PRIMARY KEY (UsHGTAG),
     FOREIGN KEY (UsAvatar) REFERENCES Avatar(AvatarId)
);
/*tabla de juegos*/
create table game(
     GameId int auto_increment unique,
     GameName varchar(32) NOT NUll,
     GameServer varchar(16),
     GameApi varchar(32),
     primary key (GameId)
);
/*tabla de los pc*/
/* PcActive es la suma de las sessiones del dia en esse Pc*/
create table Pc(
     PcId int auto_increment unique,
     PcIp varchar(15),
     PcStatus varchar(10),
     PcActive datetime,
     PcUnactive datetime,
     primary key (PcId)
);
/*tabla de cursos de la academia*/
create table course(
     CourseId int auto_increment unique,
     CourseName Varchar(64) NOT NUll,
     CourseClass int(2) NOT NUll,
     CoursePrice int(6) NOT NUll,
     GameId int,
     primary key (CourseId),
     FOREIGN KEY (GameId) REFERENCES game(GameId)
);
/*tabla de matriculas o registros a los cursos*/
create table Enrolment(
     EnrolId int auto_increment unique,
     EnrolPay boolean,
     EnrolAproval boolean,
     UsHGTAG int,
     Hgcoach int,
     CourseId int,
     primary key (EnrolId),
     FOREIGN KEY (Hgcoach) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (UsHGTAG) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (CourseId) REFERENCES course(CourseId)
);
/*tabla para las medallas que se obtienen al pasar los cursos*/
create table certificate(
     CertiId int auto_increment unique,
     CertiDate date,
     CertiMaster int,
     UsHGTAG int,
     CourseId int,
     CertiMedal int,
     primary key (CertiId),
     FOREIGN KEY (CertiMaster) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (UsHGTAG) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (CourseId) REFERENCES course(CourseId),
     FOREIGN KEY (CertiMedal) REFERENCES Avatar(AvatarId)
);
/*tabla de sessiones que se generan al usar las pc's*/
create table session(
     SessionId int auto_increment unique,
     SessionIni datetime,
     SessionFin datetime,
     UsHGTAG int,
     PcId int,
     primary key (SessionId),
     FOREIGN KEY (UsHGTAG) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (PcId) REFERENCES Pc(PcId)
);
/*tabla de las recargas de saldo realizadas por los usuarios*/
/* el campo RecAmmount solo puede ser positivo*/
create table recharge(
     RecNumero Int auto_increment unique,
     RecAmount Int NOT NUll,
     RecDate datetime,
     UsHGTAG int,
     RecBy int,
     RecCoins int,
     primary key (RecNumero),
     FOREIGN KEY (UsHGTAG) REFERENCES `user`(UsHGTAG)
);
/*tabla de equipos*/
create table equip(
     EquipId Int auto_increment unique,
     EquipName Varchar(12) unique NOT NUll,
     EquipCreator int unique NOT NUll,
     EquipMenber2 int unique,
     EquipMenber3 int unique,
     EquipMenber4 int unique,
     EquipMenber5 int unique,
     EquipMenber6 int unique,
     primary key (EquipId),
     FOREIGN KEY (EquipCreator) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (EquipMenber2) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (EquipMenber3) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (EquipMenber4) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (EquipMenber5) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (EquipMenber6) REFERENCES `user`(UsHGTAG)
);
/*tabla de invitaciones a los equipos*/
/*validar que en el InviMsg no se envien scripts*/
create table invitations(
     InvitNum int auto_increment unique,
     InviMsg Varchar(256),
     InviSend int,
     InviReceive int,
     InviStatus varchar(12),
     InviReply varchar(12),
     primary key (InvitNum),
     FOREIGN KEY (InviSend) REFERENCES `user`(UsHGTAG),
     FOREIGN KEY (InviReceive) REFERENCES `user`(UsHGTAG)
);
/*tabla donde se guarda la relacion y el nick de cada usuario con los respectivos juegos*/
create table GameReg(
     GameRegId int auto_increment unique,
     GameId int,
     UsHGTAG int,
     GameNick Varchar(32) not null,
     GameLevel Varchar(32),
     GameRange Varchar(32),
     GameSince date,
     primary key (GameRegId),
     FOREIGN KEY (GameId) REFERENCES game(GameId),
     FOREIGN KEY (UsHGTAG) REFERENCES `user`(UsHGTAG)
);
/*create table promotions(
     PromoId Int auto_increment unique,
     PromoName varchar(32),
);*/
