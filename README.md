### CRUD ECOMMERCE_APP ###

Semplice applicazione CRUD (Create,Read,Update,Delete)  in Laravel per gestire un catalogo di prodotti in un ecommerce. Puoi gestire i prodotti per le operazioni di base che comprendono anche il salvataggio di informazioni come nome, descrizione, quantità, prezzo, categoria. E' possibile anche allegare un immagine ad ogni prodotto.

Tramite questo applicativo è possibile:
-	Visualizzare uno o tutti i prodotti;
-	Aggiungere un prodotto;
-	Modificare un prodotto;
-	Rimuovere un prodotto.

Il sistema è predisposto per stampare in automatico tutte le risposte in formato JSON, ma si potrà facilmente configurare la visualizzazione tramite blade view.

Il database è popolato con dati di test, inseriti utilizzando Factory di Eloquent (https://laravel.com/docs/11.x/eloquent-factories). 

## Requisiti

- PHP (Versione 8.2 o superiore)
- Composer
- Laravel 11+
- XAMPP (o un altro ambiente di sviluppo che include MySQL e Apache)
- Bootstrap -> classi e stili per una base di frontend (es: table, table-hover, btn btn-primary,btn btn-danger..)

## Installazione
Questa guida è valida se hai già installato PHP e Laravel nel tuo sistema. Se hai ancora dubbi, prima di iniziare, dai un’occhiata ai link alla fine del file dove troverai le documentazioni ufficiali aggiornate.
Per l'hosting/motore di database e’ stato utilizzato XAMPP, per la sua flessibilità e per simulare un ambiente di sviluppo completo con Apache, MySQL e PHP. Puoi utilizzare altre configurazioni per il server ed il database, ricordando di aggiornare i file di configurazione (.env).

Puoi seguire questi passaggi per configurare il progetto sul tuo sistema.

1.	Clonare il Repository
>git clone https://your-repository-url.git

>cd nome-del-progetto

2.	Installare le Dipendenze
>composer install

Questo comando installerà tutte le dipendenze PHP richieste dal progetto, come definite nel file composer.json.
 
 ## Configurazione Ambiente
Dopo l'installazione delle dipendenze, copia il file .env.example in un nuovo file chiamato .env. Questo file contiene la configurazione specifica dell'ambiente e del database per il tuo progetto Laravel. Devi aver considerato la creazione di un database apposito nel tuo sistema di gestione database. Nel caso utilizzassi Xampp con MySql, puoi farlo utilizzando phpMyadmin o altri tools che gestiscono MySql. 
Assicurati che il nome del database, l'utente e la password siano corretti nel file .env.
Quindi, dovresti aggiornare le seguenti variabili nel file .env:
DB_DATABASE (nome del tuo database)
DB_USERNAME (il tuo username MySQL)
DB_PASSWORD (la tua password MySQL)

Prevendendo l'opzione di clonare e lanciare il progetto, è consigliabile generare una chiave dell'applicazione (Laravel richiede una chiave di applicazione unica per garantire la sicurezza delle sessioni e dei dati criptati).
>php artisan key:generate

Per creare le tabelle nel database, esegui le migrazioni:
>php artisan migrate

Per popolare il Database (attraverso il ProductSeeder e CategorySeeder), utilizza i dati di esempio generati dalla factory con il comando Artisan:
>php artisan db:seed

Avvia il Server di Sviluppo
>php artisan serve

Questo avvierà il server di sviluppo. Ora puoi accedere all'applicazione all'indirizzo http://localhost:8000.

------------------------------------------------------------------------------------------------
In caso di errori o la necessità di ripristinare la struttura del database, puoi utilizzare i seguenti comandi:

>php artisan migrate:reset: Fa il rollback di tutte le migrazioni.
>php artisan migrate:refresh: Fa il rollback e poi esegue nuovamente tutte le migrazioni. È utile  per ricreare rapidamente lo schema del database da zero.
>php artisan migrate:fresh: Elimina tutte le tabelle e poi esegue nuovamente le migrazioni. 
-------------------------------------------------------------------------------------------------

## Uso
- 	Homepage: localhost://8000/prodotti

Mostrare prodotto:
•	da endpoint ‘/mostra-prodotto/{id}’

Risposta : "Dati del prodotto corrispondente ad {$id}"
Formato: Json

---

Aggiungere prodotto :
•	endpoint ‘/prodotti’ -> bottone ‘Aggiungi un prodotto alla lista’ -> compila form -> Salva;
•	(diretto) da endpoint ‘/aggiungi-prodotto’ -> compila form di creazione prodotto -> l'endpoint successivo visualizzerà il prodotto aggiunto in formato json.

Risposta : "Messaggio informativo + dati prodotto aggiunto"
Formato: Json

---
Modificare prodotto : 
•	(UI)endpoint ‘/prodotti’ -> bottone ‘Modifica’ su riga interessata;
•	(diretto) da endpoint ‘/modifica-prodotto{id}’ -> compila form -> l'endpoint successivo stamperà il prodotto modificato in formato json.

Risposta : "Messaggio informativo + dati prodotto modificato" 
Formato: Json

---
Rimuovere prodotto :
•	endpoint ‘/prodotti’ -> bottone ‘Rimuovi’ su riga interessata;
•	endpoint ‘/rimuovi-prodotto/{id}’ – rimuove prodotto che corrisponde ad {id}.

Risposta : "Messaggio informativo + dati prodotto eliminato"
Formato: Json


ENDPOINTS AGGIUNTIVI: visualizza il singolo prodotto/tutti i prodotti ->
•	endpoint  ‘/api/mostra-prodotto/{id}’ - mostra prodotto{id} in formato JSON;
•	endpoint ‘/api/products’ – mostra tutti i prodotti in formato JSON;
•	endpoint ‘/prodotti’ – Pagina iniziale con la lista di tutti i prodotti (view blade).

**NB** 
Tutte le risposte agli endpoints sono state adattate inizialmente per stampare le risposte in formato JSON con i dati relativi alle operazioni CRUD effettuate. Si può comunque scegliere di visualizzare l'applicativo caricando le blade views, quindi con una gradevole UI. 
Ti basterà commentare e decommentare la linea di codice corrispondente nei metodi del controller.
Comunque nel file che gestisce le operazioni web ('ProductsWebController.php') troverai le istruzioni per effettuare lo "switch".


## Documentazione
-	LARAVEL - https://laravel.com/docs/11.x
-	BOOTSTRAP - https://getbootstrap.com/

## Licenza
Il framework Laravel è opensource sotto la licenza [MIT license](https://opensource.org/licenses/MIT).
