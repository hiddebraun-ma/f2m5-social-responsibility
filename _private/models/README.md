# Models

Hier zet je alle PHP bestanden met functions die gegevens voor je ophalen uit de database (of uit andere plekken zoals een API, of tekstbestand)

Per soort data, kun je één bestand maken, bijvoorbeeld:
- Pagina's  = page.php
- People = people.php
- Agenda -= agenda.php 
- Foto's = photo.php

In de controller function laad je dan het juiste bestand in (met require) dat je nodig hebt om gegevens op te halen.

Je kunt ook het bestand models.php gebruiken en daar ALLE functions inzetten die gegevens ophalen. 
Ligt er aan wat het meest handig is voor jouw website of situatie.
