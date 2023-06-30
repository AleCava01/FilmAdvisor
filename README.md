# FilmAdvisor

<img align="right" src="https://user-images.githubusercontent.com/52034469/156814968-b311782b-5461-4e9c-a7ca-52bdffeef645.gif" width="500">

Progetto per l'esame di maturità 2020.
Interamente realizzato in PHP

Film Advisor aims to be a web platform for streaming movies. The platform will utilize machine learning algorithms capable of recommending the most relevant titles to each user based on their personal preferences.

Users will be able to rate each movie on a scale from 1 to 5 to express their liking.

In order to access the movies, users will need to subscribe to one of the following plans:

- Monthly
- Quarterly
- Annual
  


## Database design


### Contstraints

- Each movie must belong to at least one genre.
- Each artist must have participated in the creation of at least one movie.
- Each movie must have been created by at least one artist.

### E-R Diagram
<img src="https://user-images.githubusercontent.com/52034469/156815987-a8a67263-0556-4cbd-ad66-c87cf38a6e25.png" width="800">

### Associations

- PAGA | Utente -\&gt; Abbonamento | 1:N | diretta: parziale, inversa: totale| un utente può pagare uno o più abbonamenti, un abbonamento deve essere pagato da un utente. | Pagamento: attributo dell&#39;associazione che specifica la modalità di pagamento.

- VISUALIZZA | Utente -\&gt; Film | N:N | parziale in entrambi i versi | un utente può visualizzare più film, un film può essere visualizzato da più utenti.
- VALUTA |Utente -\&gt; Film | N:N | parziale in entrambi i versi | un utente può valutare più film, un film può essere valutato da più utenti. | Valutazione: attributo intero (da 1 a 5) che esprime la valutazione dell&#39;utente.
- APPARTIENE | Film -\&gt; Genere | N:N | totale in entrambi i versi | un film può appartenere a più generi, un genere può contenere diversi film.
- REALIZZA | Artista -\&gt; Film | N:N | totale in entrambi i versi | un artista può realizzare più film, un film può essere stato realizzato da più artisti.

### Logical schema

- UTENTE(ID\_u [PK],Username, Password Nome, Cognome, DataNascita, Sesso, Via, Civico, Citta, Provincia, CAP, Immagine)
- ABBONAMENTO(ID\_a [PK], Tipo, Inizio, Scadenza, Importo, ID\_u[FK], Pagamento)
- FILM(ID\_f [PK], Titolo, Descrizione, Locandina, Copertina, URI, Trailer\_URI, Durata)
- LISTA(ID\_u [FK], ID\_f[FK])
- FEEDBACK (ID\_u [FK], ID\_f [FK], valutazione)
- GENERE (ID\_g[PK], Nome)
- FLMGENERE(ID\_f [FK], ID\_g [FK])
- ARTISTA(ID\_ar, Ruolo, Nome, Cognome, Biografia, Immagine)
- FILMARTISTA(ID\_f, ID\_ar)

## Realization

### Registration process

Every field is validated. 
If the input is wrong, the user gets immediately noticed.
The registration is splitted into four sections: 
- "Account": where email, password and username can be set
- "Dati Anagrafici": where Name, Surname, Birth date and Sex can be specified
- "Indirizzo": to set the billing address
- "Registrati": to read the Term & Conditions and submit the registration form.
The user can scroll up and down from a section to the other with a smooth animation.

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/fdc02e5c-2efd-4f5b-9184-51c3176fd5bb" alt="Pasted image 20230630162451" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/01ae3912-9001-4dde-9b11-952cad71161f" alt="Pasted image 20230630162507" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/cad36fa6-9313-42e5-bcb4-124646eddbd4" alt="Pasted image 20230630162518" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/d184c4ae-e8e7-4c5d-bc97-635629e6a599" alt="Pasted image 20230630162535" width="800">

### Login
Very simple login page asking for username and password.
There is also a link to the registration form in case of need.

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/61c501a4-9ba7-45a0-96a2-530e7b8dc96c" alt="Pasted image 20230630163144" width="800">

### Homepage
The homepage is made up of two sections:
- **Suggested movies**: is the one that shows up immediately after login, there is a big auto scrolling carousel of suggested movies with respective title and description. If clicked, the movie starts in the current window.
- **All movies**: this section contains the movie covers that can be scrolled and filtered by genre. When a cover is hovered, more informations about the movie are shown: title, description, duration, release date, average rating (based on the reviews of other users), director and main actors. It's also possible to play a trailer or play the movie (if subscrition has been renewed). 
On top, the navigation bar shows the current section and contains a search box

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/7c29adaa-13dc-4906-a8e9-812c2f5e123a" alt="Pasted image 20230630163531" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/7c28a8b7-c64f-453d-8bb7-8ae654ec6660" alt="Pasted image 20230630163738" width="800">



### Review
When the movie is over, a review can be easily submitted before returning to the homepage.

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/9e1ec399-0251-45b1-8395-7b0eb138b121" alt="Pasted image 20230630165305" width="800">



### My list
This section shows all the seen movies, with our reviews

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/cae7a255-181c-4118-a907-facd2d429a34" alt="Pasted image 20230630165430" width="800">



### Settings
In this page all the personal information are shown.
It is possible to change the email, the password and the billing address. Password is always required to make any change.
It's also possible to see the subscription expiration date and renew it.

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/308a5d4e-d77b-4ba5-b86c-eb40787f08ea" alt="Pasted image 20230630165648" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/378b848f-e4fd-4f5b-9884-6b3ce5a4c75b" alt="Pasted image 20230630165827" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/fc773fb4-7584-413c-a85b-8b901d18f27c" alt="Pasted image 20230630170115" width="800">

<img src="https://github.com/AleCava01/FilmAdvisor/assets/52034469/0ddf76a6-ac8f-4e3e-9a44-785c29a0d32c" alt="Pasted image 20230630170130" width="800">

## Deployment
- [Download XAMPP](https://www.apachefriends.org/download.html) and install in in your computer
- [Download FilmAdvisor as a zip from GitHub ](https://github.com/AleCava01/FilmAdvisor/archive/refs/heads/master.zip)
- go to path_to_xampp\htdocs and extract FilmAdvisor-Master folder here. Rename it as FilmAdvisor
- go to path_to_xampp\htdocs\FilmAdvisor\Database and copy the content of FilmAdvisorDB.sql
- start XAMPP Apache server and mysql server
- open phpmyadmin at http://localhost/phpmyadmin/index.php
- create a new database and name it "filmadvisor"
- open the database page and go to SQL section, paste here the content from FilmAdvisorDB.sql, run the queries
- open FilmAdvisor in your browser: http://localhost/FilmAdvisor
