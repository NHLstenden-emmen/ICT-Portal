# Project

## Installatie website:

Download de bestanden en zet deze op de webserver. De webserver moet .htaccess-bestanden kunnen ondersteunen, dit in verband met URL-Rewrites. Contactformulier staat aan en zal werken wanneer naast een webserver ook een mailserver staat geconfigureerd.


## Installatie database:

Maak een database aan genaamd 'ictportal' en upload de sql die in de root folder van de website staat. Zorg daarnaast dat de MySQL server een maximale upload grootte van 15MB krijgt voor documenten en eventuele foto's (kan in my.ini worden veranderd). Minder kan problemen opleveren. Om connectie met de database te maken moet in inc/mysql.php een gebruikersnaam met wachtwoord opgegeven worden tussen de aanhalingstekens op regel 13 en 14.


## Inloggen:

Voorbeeld account:

* Gebruikersnaam: gerjanvoenen
* Wachtwoord: test

(wachtwoorden kunnen in de database worden gewijzigd door naar de tabel 'docenten' te gaan en in een rij van de gebruiker te wijzigen. Het wachtwoord kan worden ingevuld en als functie moet MD5 worden geselecteerd.


## Live demo:

https://ictportal.serverict.nl <br>
*Heeft geen mailserver actief 
