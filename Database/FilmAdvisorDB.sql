drop database if exists FilmAdvisor;
create database FilmAdvisor;
use FilmAdvisor;

create table utente(
    id_u int not null auto_increment primary key,
    username varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    datanascita date not null,
    sesso int not null,
    via varchar(255) not null,
    civico varchar(255) not null,
    citta varchar(255) not null,
    provincia varchar(255) not null,
    cap int not null,
    immagine varchar(255) not null
)engine innodb;

create table abbonamento(
    id_a int not null auto_increment primary key,
    tipo int not null,
    inzio date not null,
    scadenza date not null,
    importo decimal(7,2) not null,
    pagamento int not null,
    id_u int not null,
    foreign key(id_u) references utente(id_u)
)engine innodb;

create table film(
    id_f int not null auto_increment primary key,
    titolo varchar(255) not null,
    descrizione varchar(255) not null,
    locandina varchar(255) not null,
    copertina varchar(255) not null,
    URI varchar(255) not null,
    trailer_URI varchar(255) not null,
    durata int not null,
    regista varchar(255) not null
)engine innodb;

create table lista(
    id_u int not null,
    id_f int not null,
    foreign key(id_u) references utente(id_u),
    foreign key(id_f) references film(id_f)
)engine innodb;

create table feedback(
    id_u int not null,
    id_f int not null,
    valutazione int not null,
    foreign key(id_u) references utente(id_u),
    foreign key(id_f) references film(id_f)
)engine innodb;

create table genere(
    id_g int not null auto_increment primary key,
    nome varchar(255) not null
)engine innodb;

create table filmgenere(
    id_f int not null,
    id_g int not null,
    foreign key(id_g) references genere(id_g),
    foreign key(id_f) references film(id_f)
)engine innodb;


/*---------------------------------------------------------*/

insert into film(titolo, descrizione, locandina, copertina,URI,trailer_URI, durata, regista) values ("Inception", "Dom Cobb (Leonardo di Caprio) è il migliore nell'estrarre informazioni dal subconscio delle persone durante lo stato onirico, quando la mente è maggiormente vulnerabile.", "Images/locandine/inception.jpg","Images/copertine/inception.jpg","Movies/inception.mp4","Trailers/inception.mp4", 142, "Christopher Nolan");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Maze Runner", "Thomas è un adolescente che si ritrova al centro di un gigante labirinto. Come gli altri ragazzi che sono arrivati prima di lui, non ha alcuna memoria del proprio passato. Il giovane diventa presto parte del gruppo e dimostra di possedere una prospettiva unica ed originale che gli garantisce la promozione al livello di velocista.", "Images/locandine/mazerunner.jpg","Images/copertine/mazerunner.jpg","Movies/maze_runner.mp4","Trailers/maze_runner.mp4", 119, "Ethan Coen");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Avatar", "L'ex marine Jake Sully è stato reclutato per una missione sul pianeta Pandora con lo scopo di recuperare risorse naturali in esaurimento sulla Terra. Inaspettatamente si ritrova a voler proteggere il mondo magico al quale si sente stranamente legato.", "Images/locandine/avatar.jpg","Images/copertine/avatar.jpg","Movies/avatar.mp4","Trailers/avatar.mp4", 162, "James Cameron");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Il Grande Lebowski", "Drugo è un disoccupato giocatore di bowling rimasto legato agli anni Settanta, che si trova coinvolto in un doppio complotto per un puro caso di omonimia.", "Images/locandine/ilGrandeLebowski.jpg","Images/copertine/thebiglebowski.jpg","Movies/ilgrandelebowski.mp4","Trailers/ilgrandelebowski.mp4", 119, "Ethan Coen");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("I Pirati Dei Caraibi - La Vendetta di Salazar", "Il Capitano Salazar, insieme al suo equipaggio di marinai fantasma, riesce a uscire dal Triangolo del Diavolo. L'unica speranza di salvezza per Jack Sparrow è il Tridente di Poseidone, ma per recuperarlo è costretto a stringere un'insolita alleanza.", "Images/locandine/i_pirati_dei_caraibi_la_vendetta_di_salazar.jpg","Images/copertine/i_pirati_dei_caraibi_la_vendetta_di_salazar.jpg","Movies/i_pirati_dei_caraibi_la_vendetta_di_salazar.mp4","Trailers/i_pirati_dei_caraibi_la_vendetta_di_salazar.mp4", 153, "Espen Sandberg");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Pirati dei Caraibi - La maledizione del forziere fantasma", "Jack Sparrow ha contratto un debito con Davey Jones e la sua ciurma di marinai. Se non vuole servire per l'eternità il capitano della nave fantasma, Jack deve assolutamente trovare una soluzione.", "Images/locandine/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.jpg","Images/copertine/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.jpg","Movies/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.mp4","Trailers/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.mp4", 151, "Gore Verbinski");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Indiana Jones e il regno del teschio di cristallo", "Un giovane avventuriero di nome Mutt chiede aiuto al temerario archeologo per trovare il leggendario teschio di cristallo di Akator.", "Images/locandine/indiana_jones.jpg","Images/copertine/indiana_jones.jpg","Movies/indiana_jones.mp4","Trailers/indiana_jones.mp4", 124, "Steven Spielberg");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("E.T. l'extra-terrestre", "Un ragazzino californiano incontra e stringe un'amicizia con un simpatico alieno che non riesce a tornare a casa.", "Images/locandine/et.jpg","Images/copertine/et.jpg","Movies/et.mp4","Trailers/et.mp4", 121, "Steven Spielberg");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("C'era una volta a... Hollywood", "Rick Dalton, attore televisivo di telefilm western in declino, e la sua controfigura Cliff Booth cercano di ottenere ingaggi e fortuna nell'industria cinematografica al tramonto dell'età dell'oro di Hollywood.", "Images/locandine/c_era_una_volta_a_hollywood.jpg","Images/copertine/c_era_una_volta_a_hollywood.png","Movies/c_era_una_volta_a_hollywood.mp4","Trailers/c_era_una_volta_a_hollywood.mp4", 200, "Quentin Tarantino");

/*UTENTE PROVA - AleCava01:pollo*/
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("AleCava01", "$2y$10$UYQOVuamCwANOgaGHgzyOeGj81IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");

/*GENERI*/
/*1*/insert into genere(nome) values("Animazione");
/*2*/insert into genere(nome) values("Avventura");
/*3*/insert into genere(nome) values("Biografico");
/*4*/insert into genere(nome) values("Commedia");
/*5*/insert into genere(nome) values("Documentario");
/*6*/insert into genere(nome) values("Drammatico");
/*7*/insert into genere(nome) values("Fantascienza");
/*8*/insert into genere(nome) values("Fantasy");
/*9*/insert into genere(nome) values("Guerra");
/*10*/insert into genere(nome) values("Horror");
/*11*/insert into genere(nome) values("Musical");
/*12*/insert into genere(nome) values("Storico");
/*13*/insert into genere(nome) values("Thriller");
/*14*/insert into genere(nome) values("Western");
/*15*/insert into genere(nome) values("Comico");
/*16*/insert into genere(nome) values("Poliziesco");
/*17*/insert into genere(nome) values("Azione");

/*RACCORDO FILM GENERE*/
insert into filmgenere(id_f,id_g) values (1,13);
insert into filmgenere(id_f,id_g) values (1,7);
insert into filmgenere(id_f,id_g) values (1,17);
insert into filmgenere(id_f,id_g) values (2,7);
insert into filmgenere(id_f,id_g) values (2,17);
insert into filmgenere(id_f,id_g) values (3,7);
insert into filmgenere(id_f,id_g) values (3,17);
insert into filmgenere(id_f,id_g) values (4,4);
insert into filmgenere(id_f,id_g) values (5,8);
insert into filmgenere(id_f,id_g) values (5,2);
insert into filmgenere(id_f,id_g) values (6,8);
insert into filmgenere(id_f,id_g) values (6,2);
insert into filmgenere(id_f,id_g) values (7,2);
insert into filmgenere(id_f,id_g) values (7,17);
insert into filmgenere(id_f,id_g) values (8,7);
insert into filmgenere(id_f,id_g) values (9,4);
insert into filmgenere(id_f,id_g) values (9,6);




/* NON COPIARE - Abbonamento test*/ 
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (1,"2020/04/02","2020/07/02",18,2,1);
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (1,"2020/04/02","2020/05/04",18,2,1);
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (1,"2020/04/02","2020/05/12",18,2,1);


