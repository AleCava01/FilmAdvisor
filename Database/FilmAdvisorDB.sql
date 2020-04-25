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
    civico int not null,
    citta varchar(255) not null,
    provincia varchar(255) not null,
    cap int not null,
    immagine varchar(255) not null
)engine innodb;

create table abbonamento(
    id_a int not null auto_increment primary key,
    tipo int not null,
    inzio datetime not null,
    scadenza datetime not null,
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

insert into film(titolo, descrizione, locandina, copertina,URI,trailer_URI, durata, regista) values ("Inception", "Dom Cobb (Leonardo di Caprio) è il migliore nell'estrarre informazioni dal subconscio delle persone durante lo stato onirico, quando la mente è maggiormente vulnerabile.", "Images/locandine/inception.jpg","Images/copertine/inception.jpg","/inception.jpg","/inception.jpg", 142, "Christopher Nolan");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, regista) values ("Il Grande Lebowski", "Drugo è un disoccupato giocatore di bowling rimasto legato agli anni Settanta, che si trova coinvolto in un doppio complotto per un puro caso di omonimia.", "Images/locandine/ilGrandeLebowski.jpg","Images/copertine/inception.jpg","/inception.jpg","/inception.jpg", 119, "Ethan Coen");
