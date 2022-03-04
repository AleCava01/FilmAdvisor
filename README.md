# FilmAdvisor
Progetto per l'esame di maturità 2020.
Interamente realizzato in PHP

![ezgif com-gif-maker](https://user-images.githubusercontent.com/52034469/156814968-b311782b-5461-4e9c-a7ca-52bdffeef645.gif)

**ANALISI**

Film advisor vuole essere una piattaforma web per la visione di film in streaming. La piattaforma utilizzerà algoritmi di machine learning in grado di consigliare, per ogni utente, i titoli più pertinenti ai suoi gusti personali.

Gli utenti potranno esprimere il proprio gradimento di ogni film, esprimendolo in una scala da 1 a 5.

Per poter visualizzare i film gli utenti dovranno sostenere un abbonamento che potrà essere:

- Mensile
- Trimestrale
- Annuale

**VINCOLI**

- Ogni film deve appartenere ad almeno un genere
- Ogni artista deve aver realizzato almeno un film
- Ogni film deve essere stato realizzato da almeno un artista

**DIAGRAMMA E-R**

![image](https://user-images.githubusercontent.com/52034469/156815987-a8a67263-0556-4cbd-ad66-c87cf38a6e25.png)
**ASSOCIAZIONI**

- PAGA | Utente -\&gt; Abbonamento | 1:N | diretta: parziale, inversa: totale| un utente può pagare uno o più abbonamenti, un abbonamento deve essere pagato da un utente. | Pagamento: attributo dell&#39;associazione che specifica la modalità di pagamento.

- VISUALIZZA | Utente -\&gt; Film | N:N | parziale in entrambi i versi | un utente può visualizzare più film, un film può essere visualizzato da più utenti.
- VALUTA |Utente -\&gt; Film | N:N | parziale in entrambi i versi | un utente può valutare più film, un film può essere valutato da più utenti. | Valutazione: attributo intero (da 1 a 5) che esprime la valutazione dell&#39;utente.
- APPARTIENE | Film -\&gt; Genere | N:N | totale in entrambi i versi | un film può appartenere a più generi, un genere può contenere diversi film.
- REALIZZA | Artista -\&gt; Film | N:N | totale in entrambi i versi | un artista può realizzare più film, un film può essere stato realizzato da più artisti.

**SCHEMA LOGICO**

- UTENTE(ID\_u [PK],Username, Password Nome, Cognome, DataNascita, Sesso, Via, Civico, Citta, Provincia, CAP, Immagine)
- ABBONAMENTO(ID\_a [PK], Tipo, Inizio, Scadenza, Importo, ID\_u[FK], Pagamento)
- FILM(ID\_f [PK], Titolo, Descrizione, Locandina, Copertina, URI, Trailer\_URI, Durata)
- LISTA(ID\_u [FK], ID\_f[FK])
- FEEDBACK (ID\_u [FK], ID\_f [FK], valutazione)
- GENERE (ID\_g[PK], Nome)
- FLMGENERE(ID\_f [FK], ID\_g [FK])
- ARTISTA(ID\_ar, Ruolo, Nome, Cognome, Biografia, Immagine)
- FILMARTISTA(ID\_f, ID\_ar)
