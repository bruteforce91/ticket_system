# Ticket System

1.       Un'azienda informatica ha degli impiegati

2.       Ogni impiegato ha un ruolo (CEO, PM, DEV)

3.       Ogni impiegato tranne il CEO è associato ad un team

4.       * Ogni impiegato ha un badge che usa per entrare / uscire dall'ufficio e registra i tempi di lavoro

5.       L'azienda lavora su progetti che il CEO assegna ad un PM

6.       Il PM per il progetto crea dei task che hanno una descrizione, uno status e una deadline (data entro la quale il task deve essere chiuso)

7.       Un task può essere assegnato ad uno o più sviluppatori (impiegato con ruolo DEV)

8.       * Un task può avere dei commit (messaggi o note) che sono fatti da uno sviluppatore

9.       Il CEO può assumere impiegati PM o DEV

Creare un'interfaccia (Web o CLI) per:
(NOTA: non è necessario sviluppare anche la parte di interfaccia utente)

1.       Assegnare un task ad uno sviluppatore

2.       Rimuovere un task da uno sviluppatore

3.       Mostrare tutti i task "in elaborazione" di uno sviluppatore

4.       Mostrare i progetti cross-team (un progetto è cross team se ha sviluppatori di almeno 2 team diversi che lavorano ai suoi task)

5.       *- Creare un nuovo DEV e assegnarlo ad un team

6.       Mostrare il PM di riferimento di un DEV

7.       *- Mostrare i task che hanno sforato la deadline con i DEV che ci hanno lavorato e i loro relativi commits



Parole chiave:

-          ORM

-          Database migration

-          Data seeding

-          Dependency Injection

 ---
 
## Installazione
dopo aver clonato, aprire terminale
1. $composer install
2. configurare il file .env (inserendo il db)
3. $php artisan key:generate
4. $composer dump-autoload 
5. $php artisan config:cache
6. creazione migrate: $php artisan migrate
7. creazione seeders: $php artisan db:seed
8. run app: $php artisan serve

## Configurazione iniziale
Nel progetto è installato una libreria per l'Auth.
A causa di questo non riconosce il login dai dati presi dal db.

Quindi occorre creare tramite registrazione nella piattaforma almeno 3 utenti per poter eseguire tutte le query.
Consiglio di seguire quest'ordine di creazione in modo da trovarsi alla fine dal CEO così da poter usare le prime features.
1-DEV
2-PM
3-CEO

Il CEO è in grado di:
- assegnare i progetti solo ai PM
- assegnare PM/DEV ad un team
- visualizza projects, i project cross Team e i Teams.

Il PM è in grado di:
- assegnare/rimuovere task ai developers
- visualizza i personal projects, task per i personal projects e tasks assegnate.

Il DEV:
 -visualizza il PM di riferimento (solo se viene assegnato dal CEO nello stesso team )
- visualizza le tasks personali
- visualizza le task in status "to do"
