<?php
use Pecee\SimpleRouter\SimpleRouter;

// Door deze regel heb je toegang tot alle software met composer is geïnstalleerd
require_once './vendor/autoload.php';

// Handige functions die we nodig hebben
require_once __DIR__ . '/_private/includes/functions.php';

// Onze model functions (die gegevens opvragen)
require_once get_config('PRIVATE') . '/models/model.php';

// Alle routes (URL's) in een apart bestand
require_once get_config('PRIVATE') . '/routes.php';

/**
 * Hier wordt de opgevraagde URL gematched aan alle URL's die zijn ingesteld
 * Als de URL bestaat wordt de juiste code aangeroepen die er bij hoort (de controller)
 */
SimpleRouter::start();
