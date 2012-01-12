<?php
/**
 * Internationalisation file for GeoData extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Max Semenik
 */
$messages['en'] = array(
	'geodata-desc' => 'Adds geographical coordinates storage and retrieval functionality.',
	'geodata-bad-input' => 'Invalid arguments have been passed to the <nowiki>{{#coordinates:}}</nowiki> function',
	'geodata-bad-latitude' => '<nowiki>{{#coordinates:}}</nowiki>: invalid latitude',
	'geodata-bad-longitude' => '<nowiki>{{#coordinates:}}</nowiki>: invalid longitude',
	'geodata-bad-region' => '<nowiki>{{#coordinates:}}</nowiki>: invalid region code format',
	'geodata-multiple-primary' => '<nowiki>{{#coordinates:}}</nowiki>: cannot have more than one primary tag per page',
	'geodata-limit-exceeded' => 'The limit of $1 <nowiki>{{#coordinates:}}</nowiki> {{PLURAL:$1|tag|tags}} per page has been exceeded',
	'geodata-broken-tags-category' => 'Pages with malformed coordinate tags',
	'geodata-primary-coordinate' => 'primary',
);

/** Message documentation (Message documentation)
 * @author Max Semenik
 */
$messages['qqq'] = array(
	'geodata-desc' => '{{desc}}',
	'geodata-limit-exceeded' => '$1 is a number',
	'geodata-broken-tags-category' => 'Name of the tracking category',
	'geodata-primary-coordinate' => 'Localised name of parameter that makes <nowiki>{{#coordinates:}}</nowiki> tag primary',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'geodata-desc' => 'Ergänzt Funktionen zum Speichern und Abrufen geografischer Koordinaten',
	'geodata-bad-input' => 'Es wurden ungültige Argumente an die Funktion <code><nowiki>{{#coordinates:}}</nowiki></code> übergeben.',
	'geodata-bad-latitude' => '<code><nowiki>{{#coordinates:}}</nowiki></code>: ungültige Längenangabe',
	'geodata-bad-longitude' => '<code><nowiki>{{#coordinates:}}</nowiki></code>: ungültige Breitenangabe',
	'geodata-bad-region' => '<code><nowiki>{{#coordinates:}}</nowiki></code>: ungültiges Regionscodeformat',
	'geodata-multiple-primary' => '<code><nowiki>{{#coordinates:}}</nowiki></code>: Es kann nicht mehr als eine primäre Auszeichnung angegeben werden.',
	'geodata-limit-exceeded' => 'Die Begrenzung zur Funktion <code><nowiki>{{#coordinates:}}</nowiki></code> von {{PLURAL:$1|einer Auszeichnung|$1 Auszeichnungen}} je Seite, wurde überschritten.',
	'geodata-broken-tags-category' => 'Seiten mit fehlerhaften Auszeichnungen zu Geokoordinaten',
	'geodata-primary-coordinate' => 'primäre',
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'geodata-desc' => "Ajoute la fonctionnalité de stockage et d'extraction des coordonnées géographiques.",
	'geodata-bad-input' => 'Des arguments non valides ont été transmis à la focntion <nowiki>{{#coordinates:}}</nowiki>',
	'geodata-bad-latitude' => '<nowiki>{{#coordinates:}}</nowiki>: latitude invalide',
	'geodata-bad-longitude' => '<nowiki>{{#coordinates:}}</nowiki>: longitude invalide',
	'geodata-bad-region' => '<nowiki>{{#coordinates:}}</nowiki>: format du code de région invalide',
	'geodata-multiple-primary' => "<nowiki>{{#coordinates:}}</nowiki>: impossible d'avoir plus d'une balise primaire par page",
	'geodata-limit-exceeded' => 'La limite de $1 {{PLURAL:$1|balise|balises}} <nowiki>{{#coordinates:}}</nowiki> par page a été dépassée',
	'geodata-broken-tags-category' => 'Pages avec des balises de coordonnées mal formées',
	'geodata-primary-coordinate' => 'primaire',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'geodata-desc' => 'Engade unha funcionalidade de almacenamento e de extracción de coordenadas xeográficas.',
	'geodata-bad-input' => 'Pasáronselle argumentos incorrectos á función <nowiki>{{#coordinates:}}</nowiki>',
	'geodata-bad-latitude' => '<nowiki>{{#coordinates:}}</nowiki>: Latitude incorrecta',
	'geodata-bad-longitude' => '<nowiki>{{#coordinates:}}</nowiki>: Lonxitude incorrecta',
	'geodata-bad-region' => '<nowiki>{{#coordinates:}}</nowiki>: Formato do código de rexión incorrecto',
	'geodata-multiple-primary' => '<nowiki>{{#coordinates:}}</nowiki>: Non pode haber máis dunha etiqueta primaria por páxina',
	'geodata-limit-exceeded' => 'Superouse o límite de $1 {{PLURAL:$1|etiqueta|etiquetas}} <nowiki>{{#coordinates:}}</nowiki> por páxina',
	'geodata-broken-tags-category' => 'Páxinas con etiquetas de coordenadas con formato incorrecto',
	'geodata-primary-coordinate' => 'primaria',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'geodata-desc' => 'Adde functionalitate pro immagazinage e recuperation de coordinatas geographic.',
	'geodata-bad-input' => 'Parametros invalide ha essite passate al function <nowiki>{{#coordinates:}}</nowiki>',
	'geodata-bad-latitude' => '<nowiki>{{#coordinates:}}</nowiki>: latitude invalide',
	'geodata-bad-longitude' => '<nowiki>{{#coordinates:}}</nowiki>: longitude invalide',
	'geodata-bad-region' => '<nowiki>{{#coordinates:}}</nowiki>: formato de codice de region invalide',
	'geodata-multiple-primary' => '<nowiki>{{#coordinates:}}</nowiki>: non pote haber plus de un etiquetta primari per pagina',
	'geodata-limit-exceeded' => 'Le limite de $1 <nowiki>{{#coordinates:}}</nowiki> {{PLURAL:$1|etiquetta|etiquettas}} per pagina ha essite excedite',
	'geodata-broken-tags-category' => 'Paginas con etiquettas mal formate de coordinatas',
	'geodata-primary-coordinate' => 'primari',
);

/** Russian (Русский)
 * @author Max Semenik
 */
$messages['ru'] = array(
	'geodata-multiple-primary' => '<nowiki>{{#coordinates:}}</nowiki>: нельзя иметь более одной первичной метки на странице',
);

