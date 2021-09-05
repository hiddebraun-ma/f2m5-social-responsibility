## MVC starter project

Gebruik dit voorbeeld project als uitfgangspunt voor het huidige project. Hiermee leer je werken volgens de MVC structuur (model view controller).
Dit project maakt gebruikt van een paar *third party* libraries. Dit is kant en klare *open-source* code van andere developers die je gratis mag gebruiken! Dat scheelt veel uren zelf code schrijven.

## LET OP: eerst dit doen!
Je moet PHP en composer op de command line werkend hebben. 
Heb je dat nog niet werkend, [kijk dan op deze pagina](http://bap.mediadeveloper.amsterdam/md1/periode-4/opdrachten/13-php-en-composer-installatie/) hoe je dat werkend krijgt en ga dan pas verder.

### Installeren van externe code via composer
Om die *third party* libraries te installeren heb je een werkende PHP op de command-line nodig en ook het programma *composer*.
Zorg dat je dat eerst hebt geïnstalleerd en voer in de hoofdmap van dit project dan dit commando uit:  

```composer install```

Dit commando installeert alle afhankelijkheden die je hebt ingesteld in het bestand ```composer.json```.
 
---

### Router (SimpleRouter)
Het *router* onderdeel in de MVC structuur beheert alle URL's (pagina's) van jouw website (die stel jij zelf in) 
Als je een URL intypt in je browser bepaalt de *router* naar welke controller dit moet gaan (aan de hand van jouw instellingen).
De *router* voert vervolgens de juiste code uit (die staat in een controller) 
Is de URL onbekend, dan wordt de *404 not found* pagina getoond.  

Lees de documentatie van de SimpleRouter : https://github.com/skipperbent/simple-php-router#getting-started

---

### Views / Template engine - Plates
Een template engine zorgt voor de *view* of ook wel de *weergave* van je website. Meestal is dit HTML + CSS + Javascript.
Een template engine maakt het makkelijk om stukjes HTML te hergebruiken en om de *gegevens* en *PHP code* te scheiden van de *weergave*.
Zo kun je makkelijker aanpassingen doen aan je website als deze ingewikkelder wordt of aangepast moet worden.
  
Lees de documentatie: [http://platesphp.com/](http://platesphp.com/)
 
 
 