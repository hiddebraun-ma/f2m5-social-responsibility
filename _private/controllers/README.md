# Controllers

In deze directory komen al je controllers te staan
Elke controller handelt een bepaald onderdeel of URL van je website af

Een ArticleController.php bevat bijvoorbeeld de class ArticleController (altijd dezelfde naam als bestand, zonder ".php" gebruiken)

Deze class heeft dan misschien de volgende functions (methods):  
- **index()** = haalt alle artikelen op via het model en laadt de articles view in om alle artikelen te tonene
- **show($id)** = haalt het artikel met id = $id op uit de database en geeft dit aan de artikel weergave view.

Zorg dat je bovenin het bestand altijd dit zet:   
```namespace Website\Controllers;``` 


