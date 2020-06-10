drop database if exists FilmAdvisor;
create database FilmAdvisor;
use FilmAdvisor;

create table utente(
    id_u int not null auto_increment primary key,
    username text not null,
    password text not null,
    email text not null,
    nome text not null,
    cognome text not null,
    datanascita date not null,
    sesso int not null,
    via text not null,
    civico text not null,
    citta text not null,
    provincia text not null,
    cap int not null,
    immagine text not null
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
    titolo text not null,
    descrizione text not null,
    locandina text not null,
    copertina text not null,
    URI text not null,
    trailer_URI text not null,
    durata int not null,
    inserimento date not null,
    dataUscita date not null
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
    nome text not null
)engine innodb;

create table filmgenere(
    id_f int not null,
    id_g int not null,
    foreign key(id_g) references genere(id_g),
    foreign key(id_f) references film(id_f)
)engine innodb;

create table artista(
    id_ar int not null auto_increment primary key,
    ruolo text not null,
    nome text not null,
    cognome text not null,
    biografia text not null,
    immagine text not null
)engine innodb;

create table filmartista(
    id_ar int not null,
    id_f int not null,
    foreign key(id_ar) references artista(id_ar),
    foreign key(id_f) references film(id_f)
)engine innodb;


/*---------------------------------------------------------*/

insert into film(titolo, descrizione, locandina, copertina,URI,trailer_URI, durata, inserimento, dataUscita) values ("Inception", "o delle persone durante lo stato onirico, quando la mente è maggiormente vulnerabile.", "Images/locandine/inception.jpg","Images/copertine/inception.jpg","Movies/inception.mp4","Trailers/inception.mp4", 142, "2020/05/23", "2010/09/24");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Maze Runner", "ltri ragazzi che sono arrivati prima di lui, non ha alcuna memoria del proprio passato. Il giovane diventa presto parte del gruppo e dimostra di possedere una prospettiva unica ed originale che gli garantisce la promozione al livello di velocista.", "Images/locandine/mazerunner.jpg","Images/copertine/mazerunner.jpg","Movies/maze_runner.mp4","Trailers/maze_runner.mp4", 119, "2020/05/23", "2014/09/18");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Avatar", " scopo di recuperare risorse naturali in esaurimento sulla Terra. Inaspettatamente si ritrova a voler proteggere il mondo magico al quale si sente stranamente legato.", "Images/locandine/avatar.jpg","Images/copertine/avatar.jpg","Movies/avatar.mp4","Trailers/avatar.mp4", 162, "2020/05/23", "2010/01/15");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Il Grande Lebowski", "i trova coinvolto in un doppio complotto per un puro caso di omonimia.", "Images/locandine/ilGrandeLebowski.jpg","Images/copertine/thebiglebowski.jpg","Movies/ilgrandelebowski.mp4","Trailers/ilgrandelebowski.mp4", 119,"2020/05/23", "1998/05/1");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("I Pirati Dei Caraibi - La Vendetta di Salazar", "dal Triangolo del Diavolo. L'unica speranza di salvezza per Jack Sparrow è il Tridente di Poseidone, ma per recuperarlo è costretto a stringere un'insolita alleanza.", "Images/locandine/i_pirati_dei_caraibi_la_vendetta_di_salazar.jpg","Images/copertine/i_pirati_dei_caraibi_la_vendetta_di_salazar.jpg","Movies/i_pirati_dei_caraibi_la_vendetta_di_salazar.mp4","Trailers/i_pirati_dei_caraibi_la_vendetta_di_salazar.mp4", 153,"2020/05/23", "2017/05/24");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Pirati dei Caraibi - La maledizione del forziere fantasma", "on vuole servire per l'eternità il capitano della nave fantasma, Jack deve assolutamente trovare una soluzione.", "Images/locandine/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.jpg","Images/copertine/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.jpg","Movies/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.mp4","Trailers/i_pirati_dei_caraibi_la_maledizione_del_forziere_fantasma.mp4", 151, "2020/05/23", "2006/09/13");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Indiana Jones e il regno del teschio di cristallo", "e il leggendario teschio di cristallo di Akator.", "Images/locandine/indiana_jones.jpg","Images/copertine/indiana_jones.jpg","Movies/indiana_jones.mp4","Trailers/indiana_jones.mp4", 124,"2020/05/23", "2008/05/23");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("E.T. l'extra-terrestre", " non riesce a tornare a casa.", "Images/locandine/et.jpg","Images/copertine/et.jpg","Movies/et.mp4","Trailers/et.mp4", 121, "2020/05/23", "1982/10/7");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("C'era una volta a... Hollywood", " Cliff Booth cercano di ottenere ingaggi e fortuna nell'industria cinematografica al tramonto dell'età dell'oro di Hollywood.", "Images/locandine/c_era_una_volta_a_hollywood.jpg","Images/copertine/c_era_una_volta_a_hollywood.png","Movies/c_era_una_volta_a_hollywood.mp4","Trailers/c_era_una_volta_a_hollywood.mp4", 200, "2020/05/23", "2019/07/24");
insert into film(titolo, descrizione, locandina, copertina, URI,trailer_URI,durata, inserimento, dataUscita) values ("Interstellar", "gricoltura. Il granturco è l'unica coltivazione ancora in grado di crescere ed un gruppo di scienziati è intenzionato ad attraversare lo spazio per trovare nuovi luoghi adatti a coltivarlo.", "Images/locandine/interstellar.jpg","Images/copertine/interstellar.jpg","Movies/interstellar.mp4","Trailers/interstellar.mp4", 269, "2020/06/06", "2014/08/26");

/*UTENTE PROVA - AleCava01:pollo*/
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("AleCava01", "$2y$10$UYQOVuamCwANOgaGHgzyOeGj81IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro1","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("pollo", "$2y$10$UYQOVuamCwANOgaGHgzyj81IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro2","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("giovannino", "$2y$10$UYQOVuamCwANOgaOeGj81IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro3","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("marcello", "$2y$10$UYQOVuamCwANOgaGHgz1IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro4","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("giancarlo", "$2y$10$UYQOVuamCwANOgj81IWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro5","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");
insert into utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) values("cecco", "$2y$10$UYQOVuamCwANOgaGHgzyOeIWq.SrR0J3EDmKCEWVpql7PGrqC","alessandro.cavalieri5@gmail.com","Alessandro6","Cavalieri","2001/05/10",1,"via campo gallo","49","Arese","MI",20020,"Images/profile/default.png");

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
insert into filmgenere(id_f,id_g) values (1,2);
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
insert into filmgenere(id_f,id_g) values (10,6);
insert into filmgenere(id_f,id_g) values (10,7);
insert into filmgenere(id_f,id_g) values (10,2);
insert into filmgenere(id_f,id_g) values (10,13);

/*ARTISTI*/
/*1*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Quentin", "Tarantino", "ni si trasferisce con la mamma divorziata a Los Angeles e dintorni. La passione per il cinema lo possiede già da bambino, alimentata da sua madre e dai successivi compagni di lei, che gli lasciano vedere qualsiasi cosa e lo accompagnano di frequente al cinema. A 14 anni scrive la sua prima sceneggiatura, a 15 ruba in un supermercato un romanzo di Elmore Leonard. Comincia a frequentare corsi di recitazione per il teatro e molla il liceo a 16 anni, alla fine degli anni Settanta, dedicandosi a diversi lavori: maschera di un cinema porno (mentendo sugli anni che ha), comparsate in serie tv (Cuori senza età!!!) e soprattutto gestendo un videonoleggio per cinque anni, dove si rivela una fonte di competenza somma per ogni cliente. Siamo negli anni Ottanta, e la svolta arriva quando Quentin incontra il produttore Lawrence Bender a un party: nel 1987 Tarantino termina di dirigere un film comico in 16mm, scritto con l'amico Craig Hamann, girato in quattro anni, dal titolo My Best Friend's Birthday, del quale sopravvivono solo una trentin.", "Images/Artisti/tarantino.jpg");
/*2*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Brad", "Pitt", "ibaThelma e Loudffffssssssnte", "Images/Artisti/pitt.jpg");
/*3*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Leonardo", "DiCaprio", "edesca che fa la segretaria in uno studio legale, divorziano quando lui compie un anno. Il futuro idolo delle adolescenti di tutto il mondo inizia già da bambino a lavorare in televisione, interpretando decine di telefilm e spot pubblicitari e conquistando un discreto successo grazie al serial TV 'Genitori in blue jeans', nel quale compare per più di un anno nel ruolo fisso di Luke, un ragazzino ribelle e scatenato. Dopo aver terminato gli studi alla John Marshall High School, Leonardo esordisce sul grande schermo con Critters 3 (1992) di Kristine Peterson, un modesto horror di serie B destinato al mercato dell'home video, e poi appare brevemente nel thriller La mia peggiore amica di Katt Shea Ruben. Nel 1993 DiCaprio diventa uno degli attori più apprezzati dell’epoca grazie al ruolo di Toby nel drammatico Voglia di ricominciare di Michael Caton-Jones, dove tiene testa egregiamente al patrigno interpretato da Robert De Niro. Talento confermato dalla interpretazione del ragazzo disabile di Buon compleanno, Mr. Grape di Lasse Hal", "Images/Artisti/dicaprio.jpg");
/*4*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Margot", "Robbie", "lege di Gold Coast nel 2007 e subito dopo si trasferisce a Melbourne. Il suo sogno è quello di diventare attrice e il fatto che sia molto attraente è certamente un vantaggio. Impara il mestiere sul set di due thriller a basso budget, Vigilante e I.C.U., che la traghettano verso alcune apparizioni televisive, tra serie TV e spot commerciali. Ottiene una grande visibilità in patria entrando nel cast della storica soap opera Neighbours, in onda dal 1985, per la quale riceve due candidature ai Logie Awards, i maggiori riconoscimenti della televisione australiana. Nel 2011 fa il salto di qualità con la serie TV americana Pan Am, nella quale recita in tutti i 14 episodi dell’unica stagione prodotta. L’anno successivo è scritturata per un ruolo secondario nel film romantico Questione di tempo, ma è Martin Scorsese a regalarle una vetrina straordinaria con la parte della moglie di Leonardo DiCaprio in The Wolf of Wall Street. A soli 23 anni la sua carriera decolla e inizia a fare scalo su ruoli da protagonista femminile. Non teme confronti con Kristin Scott Thomas e Michelle Williams recitando insieme a Jane nel Tarzan di David Yates e una giornalista nella commedia Fun House, ma è il suo ingresso nella Suicide Squad nel ruolo di Harley Quinn che renderà il suo nome particolarmente ricercato sul web. ", "Images/Artisti/robbie_margot.jpg");
/*5*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Christopher", "Nolan", "del 1970, Nolan ha conquistato la celebrità internazionale per aver diretto sul grande schermo la saga di Batman (cominciata con 'Batman begins' e continuata con i sequel 'Il cavaliere oscuro' e 'Il cavaliere oscuro - Il ritorno'), anche se probabilmente la sua pellicola più apprezzata da critica e pubblico è 'Inception'. Nel corso della sua carriera, è stato candidato per ben tre volte ai Premi Oscar: per la migliore sceneggiatura originale di 'Memento', e per la migliore sceneggiatura originale e il miglior film con 'Inception'. Particolarmente fruttuose sono alcune collaborazioni che segnano la sua vita lavorativa: dagli attori Michael Caine e Christian Bale (che impersona Batman) alla produttrice Emma Thomas (sua moglie), fino allo sceneggiatore Jonathan Nolan (suo fratello). Insomma, la famiglia Nolan è una piccola azienda a conduzione familiare, in grado di realizzare film da centinaia di milioni di euro. ", "Images/Artisti/nolan.jpg");
/*6*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Cillian", "Murphy", "ma frequenta l'università per un anno, prima di abbandonare e iniziare a suonare la chitarra e forma una band ispirata a Frank Zappa. Si unisce quindi alla Corcadorca Theater Company, con cui inizia a recitare in numerose pièce. A fine anni Novanta debutta al cinema ricoprendo vari ruoli in film come The Tale of Sweety Barrett, Sunburn e nel war movie sulla prima guerra mondiale The Trench, con Daniel Craig e Ben Whishaw. Nel 2001 interpreta il film drammatico Come Harry divenne un albero di Goran Paskaljevic e l'adattamento cinematografico di Disco Pigs, che aveva già recitato con successo a teatro cinque anni prima in un ruolo creato apposta per lui. Dopo la miniserie The Way We Live Now arriva il ruolo che lo impone all'attenzione del pubblico internazionale, quello di Jim, il ragazzo che si risveglia in ospedale in una Londra deserta e apocalittica nell'horror di Danny Boyle 28 giorni dopo. Ottiene in seguito una serie di ruoli da coprotagonista in film importanti come Ritorno a Cold Mountain e La ragazza con l'orecchino di perl", "Images/Artisti/murphy.jpg");
/*7*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Ellen", "Page", " è a 11 anni nel film tv 'Pit Pony', trasformato poi in una serie in cui Ellen viene riconfermata. Così le sue prime esperienze sono tutte televisive perchè partecipa a diversi show e serie fino all'età di 15 anni, quando ottiene una parte nel film 'Marion Bridge', inedito in Italia. Nel 2005 arriva il film in cui può mostrare tutto il suo talento, il controverso 'Hard Candy' di David Slade, in cui è la protagonista. A 19 anni Ellen entra nel cast di 'X-Men: conflitto finale', ultimo capitolo della saga tratta dall'omonimo fumetto, in cui interpreta la mutante Shadowcat che ha il potere di attraversare qualsiasi cosa. Nel 2007 è la protagonista del film di Jason Reitman 'Juno', in cui interpreta una non-convenzionale giovane sedicenne che accetta una gravidanza indesiderata. Questo ruolo fa di Ellen la quarta più giovane star ad essere candidata all'Oscar per la migliore attrice protagonista.", "Images/Artisti/ellen_page.jpg");
/*8*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Joseph", "Gordon-Levitt", "e: il nonno materno, Michael Gordon, fu un noto regista negli anni Quaranta: ha diretto tra gli altri la commedia con Doris Day e Rock Hudson Il letto racconta. Forse per via di questa vena artistica il piccolo Joseph inizia a recitare dalla tenera età di 4 anni (è lo Spaventapassari in una produzione del Mago di Oz) e a nemmeno 40 anni può vantare una filmografia ricchissima. A sei anni è protagonista nel doppio ruolo di David e Daniel Collins della serie tv Dark Shadows. Al cinema appare nel 1992 in In mezzo scorre il fiume. Tra i suoi titoli giovanili più importanti ci sono anche la partecipazione alla serie tv Pappa e ciccia (1993-1995) e al cinema Il giurato (1996) e Halloween 20 anni dopo (1998). Nel 1999 interpreta 10 cose cose che odio di te. Si prende poi una pausa dalla recitazione per iscriversi alla Columbia University di New York. Studia storia, letteratura e poesia francese (è un francofilo e conosce bene la lingua). Tra il 1996 e il 2001 è Tommy nella serie Una famiglia del terzo tipo. Al cinema interpreta tra gli altri Mys.", "Images/Artisti/gordon-levitt.jpg");
/*9*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Wes", "Ball", "nematografici dei romanzi di James Dashner.", "Images/Artisti/wes_ball.jpg");
/*10*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Thomas", "Brodie-Sangster", "a voce di Ferb nello spettacolo Disney animato Phineas e Ferb.", "Images/Artisti/thomas-brodie.jpg");
/*11*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Will", "Poulter", "ione (2018), Detroit (2017), War Machine (2017), Revenant - Redivivo (2015), Maze Runner - Il labirinto (2014), Come ti spaccio la famiglia (2013), Le cronache di Narnia: il viaggio del veliero (2010), Son of Rambow (2007), Tra le sue serie tv come interprete, ricordiamo: Black Mirror (2011)", "Images/Artisti/will_poulter.jpg");
/*12*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","James", "Cameron", "a California. Per mantenersi lavora come camionista e contemporaneamente si dedica al cinema. Nel 1978 sposa Sharon Williams e viene assunto alla New World Films dove si occupa della direzione degli effetti speciali e, durante i due anni trascorsi lì, partecipa ad alcune produzioni tra cui '1997, Fuga da New York' di John Carpenter. Esordisce alla regia con 'Piraña Paura' (1981), sequel di ' Piraña' di Joe Dante, ma più interessante è la prova successiva, 'Terminator' (1984) di cui è anche autore del soggetto e della sceneggiatura assieme a Gale Anne Hurd. Gale Anne, che ha già una bambina, Lolita, nata dal precedente matrimonio con Brian De Palma, diviene sua moglie nel 1985. Il film è un successo al botteghino e lancia l'attore Arnold Schwarzenegger. Nel 1986 gira 'Aliens - Scontro finale' seguito di 'Alien' (1979) di Ridley Scott, cui segue 'Abyss' (1989), che vince l'Oscar per gli effetti speciali. Lo stesso anno sposa Kathryn Bigelow, regista di 'Point Break' (1991), di cui Cameron è produttore. Il matrimonio dura tre anni. Nel 1991 gira 'Termi.", "Images/Artisti/cameron.jpg");
/*13*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Zoe", "Saldana", " statunitense.", "Images/Artisti/saldana.jpg");
/*14*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Steve", "Buscemi", " prima volta col teatro durante le recite scolastiche, specializzandosi poi al Lee Strasberg Institute. Durante gli anni di studio non si tu in Charley Thompson (2017), dove interpreta un attempato allenatore di cavalli.", "Images/Artisti/buscemi.jpg");
/*15*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Jeff", "Bridges", "nno vissuto insieme per oltre cinquant'anni e hanno avuto altri due figli: Beau, nato nel 1941, e Cindy, un anno più giovane di Jeff. All'inizio degli anni Cinquanta, Lloyd Bridges finì nella lista nera della commissione McCarthy, e l'FBI indagò sulla sua presunta appartenenza al Partito comunista. Come tutti quelli della lista nera, anche lui ebbe grosse difficoltà a lavorare. Fortunatamente, qualche anno dopo la caccia alle streghe finì e il padre di Jeff potè riprendere il suo posto nel mondo dello spettacolo. Quanto a Jeff, ha fatto il suo debutto davanti alla macchina da presa all'età di quattro mesi, nel film N.N. vigilata speciale (1950), e a otto anni è apparso insieme al padre nella serie televisiva 'Sea Hunt'. All'inizio degli anni Sessanta, ha partecipato insieme al fratello Beau ad alcune puntate del varietà 'The Lloyd Bridges Show'. Dopo il servizio militare nella guardia costiera, Jeff ha studiato recitazione alla Herbert Berghof School, e nel 1971 è stato Duane Jackson nel film di Peter Bogdanovich L'ultimo spett.", "Images/Artisti/jeff_bridges.jpg");
/*16*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Ethan Jesse", "Coen", "in filosofia, con una tesi su Wittgenstein. Lui e il fratello Joel debuttano come assistenti al montaggio per La casa (1981) di Sam Raimi, che diventa il loro mentore per il debutto alla regia, Blood Simple (1984). La collaborazione con Raimi prosegue per un suo film, che i fratelli scrivono, I due criminali più pazzi del mondo (1985). Il secondo film da autori dei Coen è Arizona Junior (1987) con Nicolas Cage, primo di una serie di cult. Crocevia della morte (1990), uno degli omaggi più sperticati al noir che abbiano mai firmato, conclude la fase autoriale pre-consacrazione. Il 1990 è anche l'anno nel quale Ethan sposa la montatrice Tricia Cooke. Il trionfo è dell'anno successivo: il visionario e cupo Barton Fink – E' successo a Hollywood (1991) con John Turturro e John Goodman ottiene tre nomination all'Oscar, una al Golden Globe e la Palma d'Oro a Cannes, con premi anche a regia (ufficialmente solo per Joel) e al miglior attore, Turturro. Nasce il mito dei fratelli Coen, non esattamente alimentato dal successivo Mr. Hula Hoo", "Images/Artisti/ethan_coen.jpg");
/*17*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Joel", "Coen", "udiare cinema. Nel 1980 collabora al montaggio de La casa di Sam Raimi, e nel 1984 esordisce al cinema con Blood Simple, noir con venature horror ambientato in Texas. Frances McDormand - che sposa lo stesso anno e con cui adotta il figlio Pedro - fa il suo debutto con questo film, che vince il Gran premio della Giuria al Sundance Film Festival e l’Independent Spirit Award. Fino al 2004, quando le regole della categoria permetteranno a entrambi i fratelli di essere riconosciuti coautori delle loro opere, è Joel a firmare la regia e ritirare i premi, mentre come montatori continueranno ad usare il nome fittizio di Roderick Jaynes. Nel 1984 è coautore della sceneggiatura de I due criminali più pazzi del mondo di Sam Raimi e nel 1987 scrive e dirige Arizona Junior con Nicolas Cage e Holly Hunter, un film bizzaro e molto divertente dove appare per la prima volta uno dei molti attori feticcio di casa Coen, John Goodman. Nel 1990 è la volta del gangster movie Crocevia della morte, pieno di riferimenti ai libri di Dashiell Hammett e all'estetica del noir ", "Images/Artisti/joel_coen.jpg");
/*18*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Keira", "Knightley", "isive a partire dal 1993: la sua partecipazione a un Oliver Twist dell'emittente ITV la lega già alle opere in costume, una costante della sua carriera. La sua professionalità comincia veramente a lievitare però solo nei primi anni Duemila, dopo che nel 1999 è stata l'ancella Sabè, sosia della regina Amidala-Natalie Portman in Star Wars Episodio I - La minaccia fantasma. Nel 2001 infatti è la figlia di Robin Hood, protagonista di un film per la tv disneyano, Gwyn - Principessa dei ladri. Un 2001 fruttuoso, perché la vediamo anche nel cast corale del particolare cult movie The Hole di Nick Hamm. L'anno successivo guarda di nuovo alla tradizione letteraria, come Lara Antipova nel Dottor Zivago televisivo diretto da Giacomo Campiotti. Ma quando Keira l'attrice diventa Keira Knightley la star? Il fascino iconico sboccia già quando è spalla della protagonista nella commedia etnica Sognando Beckham (2002), ma è la sua intraprendente Elizabeth Swann nella trilogia dei Pirati dei Caraibi (2003-2007) a donarle i rotocalchi e i cuori di quegli spettatori maschili affascinati dalla sua sro sfiorato Golden Globe. Il rumore di queste uscite fa passare in secondo piano due altri curiosi ingaggi nel 2005: uno da mattatrice del visionario, sanguigno e personalissimo Domino del compianto Tony Scott, e un tentativo (a quanto dicono gli anglofoni fallito) di spacciarsi per americana nel thriller The Jacket, al fianco di Adrien Brody. La carriera di Keira prosegue, sempre prediligendo parti di grandi donne del passato. Si vedano La duchessa (2008), in cui è Georgiana Cavendish, antenata di Lady Diana, o A Dangerous Method (2011) di David Cronenberg, dove incarna Sabina Spielrein, paziente e amante di Jung. In questo momento reincontra sulla sua strada anche Joe Wright, che la coinvolge nel suo metalinguistico adattamento di Anna Karenina (2012). Tali lungometraggi funzionano presso il grande pubblico più dei suoi excursus in epoca contemporanea, come dimostrano le meteore London Boulevard, Last Night, Non lasciarmi e Cercasi amore per la fine del mondo, dove genera sullo schermo una coppia ben strana al fianco di Steve Carell, o ancora Tutto può cambiare (Begin Again), dove il suo partner è Mark Ruffalo. Mentre torna all'azione con Everest, storia vera di una tragica spedizione sul monte, ottiene la sua terza nomination ai Golden Globe ancora guardacaso immersa nei suoi amati film in costume, stavolta negli anni della II Guerra Mondiale: in The Imitation Game è sullo schermo con Benedict Cumberbatch, come lei alfiere di un sempreverde British touch.", "Images/Artisti/keira_knightley.jpg");
/*19*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Johnny", "Depp", "l 1970. Fin da piccolo Johnny coltiva la passione per la musica e suona in varie garage band. Per tentare l'avventura musicale non finisce nemmeno il liceo. Suona con una band chiamata The Kids, con cui va a Los Angeles in cerca di successo. Cambiano poi nome in Six Gun Method ma si sciolgono prima di aver inciso un solo disco. Gli va meglio coi Rock City Angel con cui incide l'album Young Man's Blues. A 20 anni, Depp si sposa con Lori Anne Allison, cantante e sorella del bassista della band (il matrimonio dura solo due anni). Si mantiene con una serie di lavoretti finché non conosce Nicolas Cage, che gli consiglia di tentare la via del cinema. Il debutto avviene nel 1984 con l'horror Nightmare - Dal profondo della notte di Wes Craven, dove è vittima di Freddy Krueger in uno dei suoi omicidi più spettacolari. Nel 1986 ha un ruolo in Platoon e l'anno successivo inizia l'avventura tv con la serie 21 Jump Street, dove per tre anni è il popolarissimo agente Tom Hanson. Nel 1990 è protagonista di Cry-Ba", "Images/Artisti/johnny_depp.jpg");
/*20*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Joachim", "Rønning", "f Roenberg (a portmanteau of their surnames). They co-own one of Scandinavia's largest production companies for commercials called Motion Blur. Rønning now develops and directs film and television as a solo director.", "Images/Artisti/ronning.jpg");
/*21*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Espen", "Sandberg", "a Roenberg. Il duo ha diretto anche lo spot di Budweiser per il Super Bowl del 2000. Nel 2006, insieme al suo socio, ha diretto la commedia western francese Bandidas, in Messico interpretata da Salma Hayek e Penélope Cruz. In Norvegia Rønning e Sandberg si sono fatti conoscere ulteriormente girando, nel 2008, Max Manus: Man of War con Aksel Hennie nel ruolo di protagonista. Nel 2012, Espen e Joachim si interessarono ad una nuova grande pellicola: Kon-Tiki. Lo sviluppo di questo nuovo film fu mostrato ad una esposizione al Kon-Tiki Museum ad Oslo. Il film è stato pubblicato nel 2012 riscontrando delle buone recensioni è fu nominato come miglior film straniero all'85th Academy Awards.[1] Nel 2013 Sandberg e Rønning sono stati scelti per dirigere il quinto capitolo della saga dei Pirati dei Caraibi, le cui riprese sono iniziate nei primi mesi del 2015. La pellicola è uscita il 24 maggio 2017.[3][2] Nel 2017 il duo si scioglie ed Espen Sandberg torna a lavorare in Norvegia dove lavora allo spettacolo teatrale Amundsen che ha esordito nel 2018. Nel 2019 ha diretto il film Amundsen, uscito nelle sale il 15 febbraio, che narra la vita dell'esploratore norvegese.", "Images/Artisti/sandberg.jpg");
/*22*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Gore", "Verbinski", "quali sono tra i film con maggiori incassi nella storia del cinema. Noto per la sua abilità nello spaziare tra diversi generi cinematografici, nel 2012 ha vinto l'Oscar al miglior film d'animazione per il western animato Rango.", "Images/Artisti/verbinski.jpg");
/*23*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("attore","Harrison", "Ford", "à dei rettili!). Al liceo si diverte a prestare la sua voce per la radio della scuola e per alcune radiocronache sportive, scoprendo allo stesso tempo che le lezioni di recitazione gli permettono di superare la timidezza. Finisce il liceo nel 1960 e, dopo lavori saltuari, si trasferisce nel 1964 in California. Vuole proprio diventare un attore. Firma un contratto con la Columbia per piccoli ruoli, apparendo per la prima volta, non accreditato, come fattorino in Alle donne piace ladro (1966) e come automobilista nervoso che picchia Jack Lemmon in Luv vuole dire amore?, nel 1967. Nello stesso anno viene per la prima volta accreditato nel western Assalto finale con Glenn Ford (nessuna parentela). Ma non va bene: il suo sarcasmo ha offeso uno dei dirigenti della Columbia, cosicché si accontenta di apparizioni in Zabriskie Point (1970) di Antonioni, o di particine televisive. Vuole mantenere la famiglia (Mary Marquardt, moglie fino al 1979, e i due figli) e non vuole accettare qualsiasi ruolo per tirare", "Images/Artisti/harrison_ford.jpg");
/*24*/insert into artista(ruolo,nome,cognome,biografia,immagine) values ("regista","Steven", "Spielberg", "e foto consegnando un filmino in 8mm di nove minuti, una specie di western intitolato The Last Gunfight. Nonostante avesse girato prima altre piccole cose, Steven ritiene quell'episodio la scintilla della sua passione. L'anno dopo ritenta con un film amatoriale bellico di 40 minuti, Escape to Nowhere, e a sedici anni, nel 1963, convince il babbo a dargli 500$ per realizzare un'opera di fantascienza di ben 140 minuti, Firelight, che riesce a proiettare una sola sera in un cinema vicino casa, a Phoenix in Arizona. Termina il liceo nel 1965, quando la famiglia si è già trasferita in California. Cerca di entrare alla scuola di cinema della University of Southern California, ma viene respinto per la sua media non brillante avuta al liceo. Si iscrive allora a lettere a Long Beach, mentre si propone come stagista di montaggio presso gli Universal Studios. Nel 1968 riesce a recuperare i fondi per realizzare un cortometraggio in 35mm di 26 minuti: è Amblin', nome col quale poi battezzerà anni dopo la sua casa di produzione. Lo sforzo ha pagato, il corto è notato dal vicepresidente della Universal, Sidney ", "Images/Artisti/spielberg.jpg");


/*RACCORDO FILM ARTISTA*/
insert into filmartista(id_ar,id_f) values (3,1);
insert into filmartista(id_ar,id_f) values (5,1);
insert into filmartista(id_ar,id_f) values (6,1);
insert into filmartista(id_ar,id_f) values (7,1);
insert into filmartista(id_ar,id_f) values (8,1);

insert into filmartista(id_ar,id_f) values (9,2);
insert into filmartista(id_ar,id_f) values (10,2);
insert into filmartista(id_ar,id_f) values (11,2);

insert into filmartista(id_ar,id_f) values (12,3);
insert into filmartista(id_ar,id_f) values (13,3);

insert into filmartista(id_ar,id_f) values (14,4);
insert into filmartista(id_ar,id_f) values (15,4);
insert into filmartista(id_ar,id_f) values (16,4);
insert into filmartista(id_ar,id_f) values (17,4);

insert into filmartista(id_ar,id_f) values (18,5);
insert into filmartista(id_ar,id_f) values (19,5);
insert into filmartista(id_ar,id_f) values (20,5);
insert into filmartista(id_ar,id_f) values (21,5);

insert into filmartista(id_ar,id_f) values (18,6);
insert into filmartista(id_ar,id_f) values (19,6);
insert into filmartista(id_ar,id_f) values (22,6);

insert into filmartista(id_ar,id_f) values (23,7);
insert into filmartista(id_ar,id_f) values (24,7);

insert into filmartista(id_ar,id_f) values (24,8);

insert into filmartista(id_ar,id_f) values (1,9);
insert into filmartista(id_ar,id_f) values (2,9);
insert into filmartista(id_ar,id_f) values (3,9);
insert into filmartista(id_ar,id_f) values (4,9);

insert into filmartista(id_ar,id_f) values (5,10);



/* NON COPIARE - Abbonamento test*/ 
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (1,"2020/04/02","2020/07/02",18,2,1);
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (2,"2020/04/02","2020/07/12",18,2,2);
insert into abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) values (2,"2020/04/02","2020/06/08",18,2,3);


/*LISTA*/
insert into lista values (1,1);
insert into lista values (2,1);
insert into lista values (5,5);
insert into lista values (1,5);
insert into lista values (2,5);
insert into lista values (4,1);
insert into lista values (1,6);
insert into lista values (4,5);

/*FEEDBACK*/
insert into feedback values (1,1,4);
insert into feedback values (2,1,2);
insert into feedback values (3,1,5);
insert into feedback values (4,1,1);
insert into feedback values (5,1,4);
insert into feedback values (1,10,4);
insert into feedback values (2,10,2);
insert into feedback values (3,10,3);
insert into feedback values (4,10,1);
insert into feedback values (5,10,1);
insert into feedback values (6,10,5);


/*QUERY*/


SELECT Film.Titolo FROM Film, Genere, FilmGenere WHERE Film.ID_f = FilmGenere.ID_f AND Genere.ID_g = FilmGenere.ID_g AND Genere.Nome LIKE “Thriller” AND Film.Durata>120 AND Film.ID_f IN (SELECT Film.ID_f FROM Film, Feedback WHERE Film.ID_f = Feedback.ID_f GROUP BY(Film.ID_f) HAVING AVG(Valutazione)>3); 