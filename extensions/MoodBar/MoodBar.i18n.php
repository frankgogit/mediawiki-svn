<?php
/**
 * Internationalisation file for MoodBar extension.
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();
 
/** English
 * @author Andrew Garrett
 */

$messages['en'] = array(
	'moodbar-desc' => 'Allows specified users to provide feedback on their editing experience',
	// Portlet link
	'moodbar-trigger-feedback' => 'Feedback about editing',
	'moodbar-trigger-share' => 'Share your experience',
	'moodbar-trigger-editing' => 'Editing $1...',
	'tooltip-p-moodbar-trigger-feedback' => '',
	'tooltip-p-moodbar-trigger-share' => '',
	'tooltip-p-moodbar-trigger-editing' => '',
	// Overlay
	'moodbar-close' => '(close)',
	'moodbar-intro-feedback' => 'Editing $1 made me...',
	'moodbar-intro-share' => 'My experience on $1 made me...',
	'moodbar-intro-editing' => 'Editing $1 made me...',
	'moodbar-type-happy-title' => 'Happy',
	'moodbar-type-sad-title' => 'Sad',
	'moodbar-type-confused-title' => 'Confused',
	'tooltip-moodbar-what' => 'Learn more about this feature',
	'moodbar-what-target' => 'http://www.mediawiki.org/wiki/MoodBar',
	'moodbar-what-label' => 'What is this?',
	'moodbar-what-collapsed' => '▶', // Ignore, do not translate. &#x25BC;
	'moodbar-what-expanded' => '▼', // Ignore, do not translate. &#x25B6;
	'moodbar-what-content' => 'This feature is designed to help the community understand the experience of people editing the site.
For more information, please visit the $1.',
	'moodbar-what-link' => 'feature page',
	'moodbar-privacy' => 'By submitting, you agree to transparency under these $1.',
	'moodbar-privacy-link' => 'terms',
	'moodbar-disable-link' => "I'm not interested. Please disable this feature.",
	'moodbar-form-title' => 'Because...',
	'moodbar-form-note' => '140 character maximum',
	'moodbar-form-note-dynamic' => '$1 characters remaining',
	'moodbar-form-submit' => 'Share Feedback',
	'moodbar-form-policy-text' => 'By submitting, $1',
	'moodbar-form-policy-label' => 'our policy',
	'moodbar-loading-title' => 'Sharing...',
	'moodbar-success-title' => 'Thanks!',
	'moodbar-error-title' => 'Oops!',
	'moodbar-loading-subtitle' => 'We are sharing your feedback…',
	'moodbar-success-subtitle' => 'Sharing your editing experience helps us improve $1.',
	'moodbar-error-subtitle' => 'Something went wrong! Please try sharing your feedback again later.',
	// Special:MoodBar
	'right-moodbar-view' => 'View and export MoodBar feedback',
	'moodbar-admin-title' => 'MoodBar feedback',
	'moodbar-admin-intro' => 'This page allows you to view feedback submitted with the MoodBar.',
	'moodbar-admin-empty' => 'No results',
	'moodbar-header-id' => 'Feedback ID',
	'moodbar-header-timestamp' => 'Timestamp',
	'moodbar-header-type' => 'Type',
	'moodbar-header-page' => 'Page',
	'moodbar-header-usertype' => 'User type',
	'moodbar-header-user' => 'User',
	'moodbar-header-editmode' => 'Edit mode',
	'moodbar-header-bucket' => 'Testing bucket',
	'moodbar-header-system' => 'System type',
	'moodbar-header-locale' => 'Locale',
	'moodbar-header-useragent' => 'User-Agent',
	'moodbar-header-comment' => 'Comments',
	'moodbar-header-user-editcount' => 'User edit count',
	'moodbar-header-namespace' => 'Namespace',
	'moodbar-header-own-talk' => 'Own talk page',
	// Mood types
	'moodbar-type-happy' => 'Happy',
	'moodbar-type-sad' => 'Sad',
	'moodbar-type-confused' => 'Confused',
	// User types
	'moodbar-user-anonymized' => 'Anonymized',
	'moodbar-user-ip' => 'IP Address',
	'moodbar-user-user' => 'Registered user',
);
 
/** Message documentation (Message documentation)
 * @author Krinkle
 * @author SPQRobin
 */

$messages['qqq'] = array(
	'moodbar-desc' => 'This is a feature in development. See [[mw:MoodBar 0.1/Design]] for background information.',
	'moodbar-trigger-editing' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-editing' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-target' => 'Complete URL (including http://) or article name where more info can be found.',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
	'moodbar-form-policy-text' => 'Text displayed below the input area.

See also:
* {{msg|moodbar-form-policy-label}}',
	'moodbar-form-policy-label' => 'Label text for the link to the privacy policy,.

See also:
* {{msg|moodbar-form-policy-text}}',
	'moodbar-loading-title' => 'Title of the screen when the widget is loading.',
	'moodbar-success-title' => 'Title of the screen after the feedback was successfully submitted.',
	'moodbar-error-title' => 'Title of the screen when after an error occurred and submission aborted.',
	'moodbar-loading-subtitle' => 'Subtitle of Loading-screen. $1 is the SITENAME',
	'moodbar-success-subtitle' => 'Subtitle of screen when feedback was successfullyully submitted. $1 is the SITENAME',
	'moodbar-error-subtitle' => 'Subtitle of screen when an error occurred. $1 is the SITENAME',
);

/** Message documentation (Message documentation)
 * @author Purodha
 * @author Raymond
 * @author SPQRobin
 */
$messages['qqq'] = array(
	'moodbar-desc' => '{{desc}}
This is a feature in development. See [[mw:MoodBar 0.1/Design]] for background information.',
	'moodbar-trigger-feedback' => 'Link text of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-trigger-editing' => "Link text of the MoodBar overlay trigger. \$1 is the SITENAME. The implied sentence is ''\"Using [Sitename] made me happy/sad/...\"''. See [[mw:MoodBar 0.1/Design]] for background development information.",
	'moodbar-close' => 'Link text of the close-button. Make sure to include parentheses.

See also:
* {{msg|parentheses}}',
	'moodbar-intro-feedback' => 'Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'moodbar-intro-editing' => '[[File:MoodBar-Step-1.png|right|200px]]
Intro title of the MoodBar overlay trigger. $1 is the SITENAME.',
	'tooltip-moodbar-what' => 'Tooltip displayed when hovering the What-link.

See also:
* {{msg|moodbar-what-label}}',
	'moodbar-what-label' => 'Link text for the page where more info abut MoodBar can be found.',
	'moodbar-what-content' => '$1 is the message {{msg-mw|moodbar-what-link}} which links to the page [[mw:MoodBar|MoodBar]] on MediaWiki.org.',
	'moodbar-what-link' => 'This is the link embedded as parameter $1 in {{msg-mw|moodbar-what-content}}.',
	'moodbar-privacy' => 'Parameters:
*$1 - a link having the anchor text {{msg-mw|moodbar-privacy-link}}',
	'moodbar-privacy-link' => 'This is the anchor text being used in the link replacing $1 in the message {{msg-mw|moodbar-privacy}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'moodbar-desc' => 'Laat spesifieke gebruikers toe om hulle gemoedstoestand aan die webwerf se operateur terug te stuur',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'moodbar-desc' => 'Дазваляе вызначаным удзельнікам дасылаць іх «настрой» апэратару сайта',
	'moodbar-trigger-feedback' => 'Водгук',
	'moodbar-trigger-editing' => 'Выкарыстоўваючы $1…',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Purodha
 */
$messages['de'] = array(
	'moodbar-desc' => 'Ermöglicht es bestimmten Benutzern eine Rückmeldung bezüglich des Bearbeitens von Seiten zu geben',
	'moodbar-trigger-feedback' => 'Rückmeldung zum Bearbeiten',
	'moodbar-trigger-share' => 'Teile uns deinen Eindruck mit',
	'moodbar-trigger-editing' => 'Bearbeite $1 …',
	'moodbar-close' => '(schließen)',
	'moodbar-intro-feedback' => '$1 zu bearbeiten macht mich …',
	'moodbar-intro-share' => 'Meine Erfahrung auf $1 macht mich …',
	'moodbar-intro-editing' => '$1 zu bearbeiten macht mich …',
	'moodbar-type-happy-title' => 'glücklich',
	'moodbar-type-sad-title' => 'traurig',
	'moodbar-type-confused-title' => 'verwirrt',
	'tooltip-moodbar-what' => 'Mehr zu dieser Funktion in Erfahrung bringen',
	'moodbar-what-label' => 'Worum handelt es sich?',
	'moodbar-what-content' => 'Diese Funktion wurde entwickelt, damit man eine Rückmeldung geben kann, wie man sich beim Bearbeiten von Seiten dieser Website fühlt.
Weitere Informationen hierzu sind an der folgenden Stelle zu finden: $1.',
	'moodbar-what-link' => 'Seite zu den Funktionen',
	'moodbar-privacy' => 'Mit dem Speichern erklärst du dich mit diesen $1 einverstanden.',
	'moodbar-privacy-link' => 'Bedingungen',
	'moodbar-disable-link' => 'Ich bin nicht interessiert. Bitte diese Funktion deaktivieren.',
	'moodbar-form-title' => 'Weil …',
	'moodbar-form-note' => 'Maximal 140 Zeichen',
	'moodbar-form-note-dynamic' => '$1 Zeichen verbleibend',
	'moodbar-form-submit' => 'Rückmeldung senden',
	'moodbar-form-policy-text' => 'Mit dem Senden, $1',
	'moodbar-form-policy-label' => 'unserer Richtlinie',
	'moodbar-loading-title' => 'Am senden ...',
	'moodbar-success-title' => 'Vielen Dank!',
	'moodbar-error-title' => 'Hoppla!',
	'moodbar-success-subtitle' => 'Uns deine Stimmung mitzuteilen hilft uns dabei $1 weiter zu verbessern.',
	'moodbar-error-subtitle' => 'Etwas ist schief gelaufen. Bitte versuche es später noch einmal uns deine Rückmeldung mitzuteilen.',
	'right-moodbar-view' => 'Rückmeldung zur Stimmung ansehen und exportieren',
	'moodbar-admin-title' => 'Rückmeldung zur Stimmung',
	'moodbar-admin-intro' => 'Auf dieser Seite können die Rückmeldungen zur Stimmung angesehen werden',
	'moodbar-admin-empty' => 'Keine Ergebnisse',
	'moodbar-header-id' => 'Rückmeldungskennung',
	'moodbar-header-timestamp' => 'Zeitstempel',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Seite',
	'moodbar-header-usertype' => 'Benutzerart',
	'moodbar-header-user' => 'Benutzer',
	'moodbar-header-editmode' => 'Bearbeitungsmodus',
	'moodbar-header-bucket' => 'Testumgebung',
	'moodbar-header-system' => 'Systemtyp',
	'moodbar-header-locale' => 'Gebietsschema',
	'moodbar-header-useragent' => 'Browser',
	'moodbar-header-comment' => 'Kommentare',
	'moodbar-header-user-editcount' => 'Bearbeitungszähler',
	'moodbar-header-namespace' => 'Namensraum',
	'moodbar-header-own-talk' => 'Eigene Diskussionsseite',
	'moodbar-type-happy' => 'glücklich',
	'moodbar-type-sad' => 'traurig',
	'moodbar-type-confused' => 'verwirrt',
	'moodbar-user-anonymized' => 'Anonymisiert',
	'moodbar-user-ip' => 'IP-Adresse',
	'moodbar-user-user' => 'Registrierter Benutzer',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'moodbar-trigger-share' => 'Teilen Sie uns Ihren Eindruck mit',
	'moodbar-privacy' => 'Mit dem Speichern erklären Sie sich mit diesen $1 einverstanden.',
	'moodbar-success-subtitle' => 'Uns Ihre Stimmung mitzuteilen hilft uns dabei $1 weiter zu verbessern.',
	'moodbar-error-subtitle' => 'Etwas ist schief gelaufen. Bitte versuchen Sie es später noch einmal uns Ihre Rückmeldung mitzuteilen.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Fitoschido
 */
$messages['es'] = array(
	'moodbar-desc' => 'Permite a usuarios específicos enviar comentarios sobre su experiencia de edición',
);

/** French (Français)
 * @author Crochet.david
 * @author Tpt
 */
$messages['fr'] = array(
	'moodbar-desc' => 'Permet aux utilisateurs spécifiés d’envoyer leur retour d’« humeur » à l’exploitant du site',
	'moodbar-trigger-feedback' => 'Vos commentaires sur la modification',
	'moodbar-trigger-share' => 'Partagez votre expérience',
	'moodbar-close' => '(fermer)',
	'moodbar-type-happy-title' => 'Heureux',
	'moodbar-type-sad-title' => 'Triste',
	'tooltip-moodbar-what' => 'En savoir plus sur cette fonctionnalité',
	'moodbar-what-label' => "Qu'est-ce que c'est?",
	'moodbar-what-content' => "Cette fonction est conçue pour aider la communauté Wikipédia à comprendre le ressenti des personnes éditant l'encyclopédie.
Pour plus d'informations consulter la $1 .",
	'moodbar-what-link' => 'page décrivant la fonction',
	'moodbar-success-title' => 'Merci !',
	'moodbar-error-title' => 'Oups !',
	'moodbar-admin-empty' => 'Aucun résultat',
	'moodbar-header-page' => 'Page',
	'moodbar-header-user' => 'Utilisateur',
	'moodbar-header-user-editcount' => "Compteur d'édition",
	'moodbar-type-happy' => 'Heureux',
	'moodbar-type-sad' => 'Triste',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'moodbar-trigger-editing' => 'Changement de $1...',
	'moodbar-close' => '(cllôre)',
	'moodbar-type-happy-title' => 'Herox',
	'moodbar-type-sad-title' => 'Tristo',
	'moodbar-type-confused-title' => 'Confondu',
	'moodbar-success-title' => 'Grant-marci !',
	'moodbar-error-title' => 'Crenom !',
	'moodbar-header-timestamp' => 'Dâta et hora',
	'moodbar-header-type' => 'Tipo',
	'moodbar-header-page' => 'Pâge',
	'moodbar-header-user' => 'Utilisator',
	'moodbar-header-useragent' => 'Agent utilisator',
	'moodbar-header-comment' => 'Comentèros',
	'moodbar-header-namespace' => 'Èspâço de noms',
	'moodbar-header-own-talk' => 'Pâge de discussion a sè',
	'moodbar-type-happy' => 'Herox',
	'moodbar-type-sad' => 'Tristo',
	'moodbar-type-confused' => 'Confondu',
	'moodbar-user-anonymized' => 'Anonimisâ',
	'moodbar-user-ip' => 'Adrèce IP',
	'moodbar-user-user' => 'Utilisator encartâ',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'moodbar-desc' => 'Permite que os usuarios especificados dean a súa opinión sobre a súa experiencia de edición',
	'moodbar-trigger-feedback' => 'Comentarios sobre a edición',
	'moodbar-trigger-share' => 'Comparta a súa experiencia',
	'moodbar-trigger-editing' => 'Usando $1...',
	'moodbar-close' => '(pechar)',
	'moodbar-intro-feedback' => 'Editar $1 fixo que agora estea...',
	'moodbar-intro-share' => 'A miña experiencia en $1 fixo que agora estea...',
	'moodbar-intro-editing' => 'Editar $1 fixo que agora estea...',
	'moodbar-type-happy-title' => 'Contento',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuso',
	'tooltip-moodbar-what' => 'Máis información sobre esta característica',
	'moodbar-what-label' => 'Que é isto?',
	'moodbar-what-content' => 'Esta característica está deseñada para axudar á comunidade a entender a experiencia da xente á hora de editar o sitio.
Para obter máis información, bótelle unha ollada á $1 .',
	'moodbar-what-link' => 'páxina da característica',
	'moodbar-privacy-link' => 'termos',
	'moodbar-disable-link' => 'Non estou interesado. Desactivar esta característica.',
	'moodbar-form-title' => 'Porque...',
	'moodbar-form-note' => '140 caracteres como máximo',
	'moodbar-form-note-dynamic' => '$1 caracteres restantes',
	'moodbar-form-policy-label' => 'a nosa política',
	'moodbar-loading-title' => 'Compartindo...',
	'moodbar-success-title' => 'Grazas!',
	'moodbar-error-title' => 'Vaites!',
	'moodbar-admin-empty' => 'Sen resultados',
	'moodbar-header-id' => 'ID do comentario',
	'moodbar-header-timestamp' => 'Data e hora',
	'moodbar-header-type' => 'Tipo',
	'moodbar-header-page' => 'Páxina',
	'moodbar-header-usertype' => 'Tipo de usuario',
	'moodbar-header-user' => 'Usuario',
	'moodbar-header-editmode' => 'Modo de edición',
	'moodbar-header-bucket' => 'Zona de probas',
	'moodbar-header-system' => 'Tipo de sistema',
	'moodbar-header-locale' => 'Local',
	'moodbar-header-useragent' => 'Axente de usuario',
	'moodbar-header-comment' => 'Comentarios',
	'moodbar-header-user-editcount' => 'Número de edición do usuario',
	'moodbar-header-namespace' => 'Espazo de nomes',
	'moodbar-header-own-talk' => 'Páxina de conversa propia',
	'moodbar-type-happy' => 'Contento',
	'moodbar-type-sad' => 'Triste',
	'moodbar-type-confused' => 'Confuso',
	'moodbar-user-anonymized' => 'Anónimo',
	'moodbar-user-ip' => 'Enderezo IP',
	'moodbar-user-user' => 'Usuario rexistrado',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'moodbar-desc' => 'מתן אפשרות למשתמשם לשלוח את "מצב הרוח" שלהם למפעיל האתר',
	'moodbar-trigger-feedback' => 'משוב על עריכה',
	'moodbar-trigger-editing' => 'עריכה $1...',
	'moodbar-close' => '(סגירה)',
	'moodbar-intro-feedback' => 'עריכת $1 גרמה לי ...',
	'moodbar-intro-editing' => 'עריכת $1 גרמה לי ...',
	'moodbar-type-happy-title' => 'שמחה',
	'moodbar-type-sad-title' => 'עצב',
	'moodbar-type-confused-title' => 'בלבול',
	'tooltip-moodbar-what' => 'מידע נוסף על התכונה הזאת',
	'moodbar-what-label' => 'מה זה?',
	'right-moodbar-view' => 'הצגה וייצוא של של משוב מסרגל מצב הרוח',
	'moodbar-admin-title' => 'משוב על סרגל מצב הרוח',
	'moodbar-admin-intro' => 'הדף הזה מאפשר לך לראות משוב שנשלח באמצעות סרגל מצב הרוח',
	'moodbar-header-id' => 'מזהה משוב',
	'moodbar-header-timestamp' => 'חותם זמן',
	'moodbar-header-type' => 'סוג',
	'moodbar-header-page' => 'דף',
	'moodbar-header-usertype' => 'סוג משתמש',
	'moodbar-header-user' => 'משתמש',
	'moodbar-header-editmode' => 'מצב עריכה',
	'moodbar-header-bucket' => 'דלי ניסוי',
	'moodbar-header-system' => 'סוג מערכת',
	'moodbar-header-locale' => 'אזור',
	'moodbar-header-useragent' => 'User-Agent (דפדפן)',
	'moodbar-header-comment' => 'תגובות',
	'moodbar-header-user-editcount' => 'מספר עריכות',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'moodbar-desc' => 'Permitte al usatores specificate de fornir retroaction super lor experientia durante le modification',
	'moodbar-trigger-feedback' => 'Commentos super le modification',
	'moodbar-trigger-share' => 'Divider tu experientia',
	'moodbar-trigger-editing' => 'Modificar $1...',
	'moodbar-close' => '(clauder)',
	'moodbar-intro-feedback' => 'Modificar $1 me rendeva…',
	'moodbar-intro-share' => 'Mi experientia in $1 me rendeva…',
	'moodbar-intro-editing' => 'Le uso de $1 me rendeva...',
	'moodbar-type-happy-title' => 'Felice',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuse',
	'tooltip-moodbar-what' => 'Lege plus a proposito de iste function',
	'moodbar-what-label' => 'Que es isto?',
	'moodbar-what-content' => 'Iste function es concipite pro adjutar le communitate a comprender le experientia del personas qui modifica le sito.
Pro ulterior information, per favor visita le $1.',
	'moodbar-what-link' => 'pagina de function',
	'moodbar-privacy' => 'Per submitter, tu te declara de accordo que tu contribution sia public in concordantia con iste $1.',
	'moodbar-privacy-link' => 'conditiones',
	'moodbar-disable-link' => 'Isto non me interessa. Per favor disactiva iste function.',
	'moodbar-form-title' => 'Perque...',
	'moodbar-form-note' => 'maximo 140 characteres',
	'moodbar-form-note-dynamic' => 'resta $1 characteres',
	'moodbar-form-submit' => 'Inviar commento',
	'moodbar-form-policy-text' => 'Per submitter, $1',
	'moodbar-form-policy-label' => 'nostre politica',
	'moodbar-loading-title' => 'Invio in curso...',
	'moodbar-success-title' => 'Gratias!',
	'moodbar-error-title' => 'Ups!',
	'moodbar-success-subtitle' => 'Per specificar tu experientia durante le modification, tu nos adjuta a meliorar $1.',
	'moodbar-error-subtitle' => 'Un problema ha occurrite! Per favor tenta specificar tu retroaction de novo plus tarde.',
	'right-moodbar-view' => 'Vider e exportar reactiones del Barra de Humor',
	'moodbar-admin-title' => 'Reactiones del Barra de Humor',
	'moodbar-admin-intro' => 'Iste pagina permitte vider reactiones submittite con le Barra de Humor',
	'moodbar-admin-empty' => 'Nulle resultato',
	'moodbar-header-id' => 'ID del reaction',
	'moodbar-header-timestamp' => 'Data e hora',
	'moodbar-header-type' => 'Typo',
	'moodbar-header-page' => 'Pagina',
	'moodbar-header-usertype' => 'Typo de usator',
	'moodbar-header-user' => 'Usator',
	'moodbar-header-editmode' => 'Modo de modification',
	'moodbar-header-bucket' => 'Situla de test',
	'moodbar-header-system' => 'Typo de systema',
	'moodbar-header-locale' => 'Region',
	'moodbar-header-useragent' => 'Agente usator',
	'moodbar-header-comment' => 'Commentos',
	'moodbar-header-user-editcount' => 'Numero de modificationes del usator',
	'moodbar-header-namespace' => 'Spatio de nomines',
	'moodbar-header-own-talk' => 'Pagina de discussion proprie',
	'moodbar-type-happy' => 'Felice',
	'moodbar-type-sad' => 'Triste',
	'moodbar-type-confused' => 'Confuse',
	'moodbar-user-anonymized' => 'Anonymisate',
	'moodbar-user-ip' => 'Adresse IP',
	'moodbar-user-user' => 'Usator registrate',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'moodbar-close' => '(zohmaache)',
	'moodbar-privacy' => 'Wä heh jät enjitt, moß met dä $1 enverschtande sen, söns moß mer et sennlohße.',
	'moodbar-privacy-link' => 'Begengonge',
	'moodbar-success-title' => 'Mer bedanke uns.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'moodbar-desc' => 'Erméiglecht et spezifesche Benotzer fir dem Responsabele vum Site hir Erfarunge beim Änneren ze schécken',
	'moodbar-trigger-feedback' => "Feedback iwwert d'Änneren",
	'moodbar-trigger-share' => 'Deelt Är Erfahrungen',
	'moodbar-trigger-editing' => 'Ännert $1...',
	'moodbar-close' => '(zoumaachen)',
	'moodbar-intro-feedback' => '$1 ännere mécht mech ...',
	'moodbar-intro-share' => 'Meng Erfarung op $1 mécht mech...',
	'moodbar-intro-editing' => '$1 ännere mécht mech ...',
	'moodbar-type-happy-title' => 'Glécklech',
	'moodbar-type-sad-title' => 'Traureg',
	'moodbar-type-confused-title' => 'Duercherneen',
	'tooltip-moodbar-what' => 'Fir méi ze wëssen iwwer dës Fonctioun',
	'moodbar-what-label' => 'Wat ass dat?',
	'moodbar-what-link' => 'Säit vun de Fonctiounen',
	'moodbar-privacy-link' => 'Bedingungen',
	'moodbar-disable-link' => 'Ech sinn net interesséiert. Schalt dës Fonctioun w.e.g. aus.',
	'moodbar-form-title' => 'Well...',
	'moodbar-form-note' => 'Maximal 140 Zeechen',
	'moodbar-form-note-dynamic' => 'Et bleiwen $1 Zeechen',
	'moodbar-form-policy-label' => 'eis Richtlinnen',
	'moodbar-success-title' => 'Merci!',
	'moodbar-error-title' => 'Ups!',
	'moodbar-admin-empty' => 'Keng Resultater',
	'moodbar-header-timestamp' => 'Zäitstempel',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Säit',
	'moodbar-header-usertype' => 'Benotzer-Typ',
	'moodbar-header-user' => 'Benotzer',
	'moodbar-header-editmode' => 'Ännerungsmodus',
	'moodbar-header-comment' => 'Bemierkungen',
	'moodbar-header-user-editcount' => 'Compteur vun den Ännerunge pro Benotzer',
	'moodbar-header-namespace' => 'Nummraum',
	'moodbar-header-own-talk' => 'Eegen Diskussiounssäit',
	'moodbar-type-happy' => 'Glécklech',
	'moodbar-type-sad' => 'Traureg',
	'moodbar-type-confused' => 'Duercherneen',
	'moodbar-user-anonymized' => 'Anonymiséiert',
	'moodbar-user-ip' => 'IP-Adress',
	'moodbar-user-user' => 'Registréierte Benotzer',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'moodbar-desc' => '!Им овозможува на одредени корисници да даваат мислење за уредувањето',
	'moodbar-trigger-feedback' => 'Мислења за уредувањето',
	'moodbar-trigger-share' => 'Споделете го вашето искуство',
	'moodbar-trigger-editing' => 'Уредување на $1...',
	'moodbar-close' => '(затвори)',
	'moodbar-intro-feedback' => 'Уредувањето на $1 ме...',
	'moodbar-intro-share' => 'Она што се случуваше на $1 ме...',
	'moodbar-intro-editing' => 'Уредувањето на $1 ме...',
	'moodbar-type-happy-title' => 'усреќи',
	'moodbar-type-sad-title' => 'натажи',
	'moodbar-type-confused-title' => 'збуни',
	'tooltip-moodbar-what' => 'Дознајте повеќе за оваа функција',
	'moodbar-what-label' => 'Што е ова?',
	'moodbar-what-content' => 'Оваа функција е предвидена да ѝ овозможува на заедницата да го осознае искуството на луѓето што го уредуваат мрежното место.
Повеќе информации ќе добиете на $1.',
	'moodbar-what-link' => 'страница за функцијата',
	'moodbar-privacy' => 'Поднесувајќи го ова, се согласувате на транспарентност под следниве $1.',
	'moodbar-privacy-link' => 'услови',
	'moodbar-disable-link' => 'Не сум заинтересиран. Оневозможи ја функцијава.',
	'moodbar-form-title' => 'Бидејќи...',
	'moodbar-form-note' => 'највеќе 140 знаци',
	'moodbar-form-note-dynamic' => 'Преостануваат $1 знаци',
	'moodbar-form-submit' => 'Сподели ▶',
	'moodbar-form-policy-text' => 'Поднесувајќи го ова, $1',
	'moodbar-form-policy-label' => 'нашите правила',
	'moodbar-loading-title' => 'Споделувам...',
	'moodbar-success-title' => 'Благодариме!',
	'moodbar-error-title' => 'Упс!',
	'moodbar-success-subtitle' => 'Споделувајќи го вашето уредувачко искуство ни помагате да ја подобриме $1.',
	'moodbar-error-subtitle' => 'Нешто не е во ред! Обидете се да го споделите вашето мислење подоцна.',
	'right-moodbar-view' => 'Преглед и извоз на мислења од MoodBar',
	'moodbar-admin-title' => 'Мислења со MoodBar',
	'moodbar-admin-intro' => 'Оваа страница служи за преглед на мислења поднесени со MoodBar',
	'moodbar-admin-empty' => 'Нема резултати',
	'moodbar-header-id' => 'Назнака (ID) на мислењето',
	'moodbar-header-timestamp' => 'Време и датум',
	'moodbar-header-type' => 'Вид',
	'moodbar-header-page' => 'Страница',
	'moodbar-header-usertype' => 'Вид на корисник',
	'moodbar-header-user' => 'Корисник',
	'moodbar-header-editmode' => 'Уреднички режим',
	'moodbar-header-bucket' => 'Испробување',
	'moodbar-header-system' => 'Вид на систем',
	'moodbar-header-locale' => 'Место',
	'moodbar-header-useragent' => 'Корисник-вршител',
	'moodbar-header-comment' => 'Коментари',
	'moodbar-header-user-editcount' => 'Бр. на кориснички уредувања',
	'moodbar-header-namespace' => 'Именски простор',
	'moodbar-header-own-talk' => 'Сопствена страница за разговор',
	'moodbar-type-happy' => 'Среќен',
	'moodbar-type-sad' => 'Тажен',
	'moodbar-type-confused' => 'Збунет',
	'moodbar-user-anonymized' => 'Анонимизирано',
	'moodbar-user-ip' => 'IP-адреса',
	'moodbar-user-user' => 'Регистриран корисник',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'moodbar-trigger-share' => 'താങ്കളുടെ അനുഭവം പങ്ക്‌വെയ്ക്കുക',
	'moodbar-trigger-editing' => '$1 തിരുത്തുമ്പോൾ...',
	'moodbar-close' => '(അടയ്ക്കുക)',
	'moodbar-intro-feedback' => '$1 തിരുത്തിയപ്പോൾ എനിക്ക്...',
	'moodbar-intro-share' => '$1 സംരംഭത്തിലെ എന്റെ അനുഭവം എന്നെ...',
	'moodbar-intro-editing' => '$1 തിരുത്തിയപ്പോൾ എനിക്ക്...',
	'moodbar-type-happy-title' => 'സന്തോഷമായി',
	'moodbar-type-sad-title' => 'ദുഃഖമായി',
	'moodbar-type-confused-title' => 'ആശയക്കുഴപ്പമായി',
	'tooltip-moodbar-what' => 'ഈ വിശേഷഗുണത്തെക്കുറിച്ച് കൂടുതൽ അറിയുക',
	'moodbar-what-label' => 'എന്താണിത്?',
	'moodbar-what-content' => 'വിജ്ഞാനകോശം തിരുത്തുന്നവരുടെ അനുഭവങ്ങൾ വിക്കിപീഡിയ സമൂഹത്തിനു മനസ്സിലാക്കാനായാണ് ഈ സൗകര്യം രൂപകല്പന ചെയ്തിരിക്കുന്നത്.
കൂടുതൽ വിവരങ്ങൾക്ക് ദയവായി $1 സന്ദർശിക്കുക.',
	'moodbar-what-link' => 'സവിശേഷതാ താൾ',
	'moodbar-privacy-link' => 'നിബന്ധനകൾ',
	'moodbar-disable-link' => 'എനിക്കു താത്പര്യമില്ല. ദയവായി ഈ സൗകര്യം വേണ്ട.',
	'moodbar-form-title' => 'കാരണം...',
	'moodbar-form-note' => 'പരമാവധി 140 അക്ഷരങ്ങൾ',
	'moodbar-form-note-dynamic' => '$1 അക്ഷരങ്ങൾകൂടിയുണ്ട്',
	'moodbar-form-submit' => 'അഭിപ്രായങ്ങൾ പങ്ക്‌വെയ്ക്കുക',
	'moodbar-form-policy-text' => 'സമർപ്പിക്കുമ്പോൾ, $1',
	'moodbar-form-policy-label' => 'ഞങ്ങളുടെ നയം',
	'moodbar-loading-title' => 'പങ്ക്‌വെയ്ക്കുന്നു...',
	'moodbar-success-title' => 'നന്ദി!',
	'moodbar-error-title' => 'അയ്യോ!',
	'moodbar-success-subtitle' => 'താങ്കളുടെ തിരുത്തൽ അനുഭവങ്ങൾ പങ്ക് വെയ്ക്കുന്നതു $1 മെച്ചപ്പെടുത്താൻ സഹായകമാകും.',
	'moodbar-error-subtitle' => 'എന്തോ കുഴപ്പമുണ്ടായി! ദയവായി താങ്കളുടെ അനുഭവം അല്പസമയത്തിനു ശേഷം പങ്ക് വെയ്ക്കുക.',
	'moodbar-admin-empty' => 'ഫലങ്ങൾ ഒന്നുമില്ല',
	'moodbar-header-timestamp' => 'സമയമുദ്ര',
	'moodbar-header-type' => 'തരം',
	'moodbar-header-page' => 'താൾ',
	'moodbar-header-usertype' => 'ഉപയോക്തൃതരം',
	'moodbar-header-user' => 'ഉപയോക്താവ്',
	'moodbar-header-system' => 'സിസ്റ്റം തരം',
	'moodbar-header-comment' => 'അഭിപ്രായങ്ങൾ',
	'moodbar-header-user-editcount' => 'ഉപയോക്തൃ തിരുത്തലുകളുടെ എണ്ണം',
	'moodbar-header-namespace' => 'നാമമേഖല',
	'moodbar-header-own-talk' => 'സ്വന്തം സം‌വാദം താൾ',
	'moodbar-type-happy' => 'സന്തോഷം',
	'moodbar-type-sad' => 'ദുഃഖം',
	'moodbar-type-confused' => 'ആശയക്കുഴപ്പം',
	'moodbar-user-anonymized' => 'അജ്ഞാതവത്കരിച്ചു',
	'moodbar-user-ip' => 'ഐ.പി. വിലാസം',
	'moodbar-user-user' => 'അംഗത്വമെടുത്ത ഉപയോക്താവ്',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'moodbar-desc' => 'Membolehkan pengguna tertentu menghantar maklum balas mereka kepada pengendali tapak',
	'moodbar-trigger-feedback' => 'Maklum balas tentang penyuntingan',
	'moodbar-trigger-share' => 'Kongsi pengalaman anda',
	'moodbar-trigger-editing' => 'Menyunting $1...',
	'moodbar-close' => '(tutup)',
	'moodbar-intro-feedback' => 'Menyunting $1 membuat saya...',
	'moodbar-intro-share' => 'Pengalaman saya di $1 membuat saya...',
	'moodbar-intro-editing' => 'Menyunting $1 membuat saya...',
	'moodbar-type-happy-title' => 'Gembira',
	'moodbar-type-sad-title' => 'Sedih',
	'moodbar-type-confused-title' => 'Keliru',
	'tooltip-moodbar-what' => 'Ketahui lebih lanjut mengenai ciri ini',
	'moodbar-what-label' => 'Apakah ini?',
	'moodbar-what-content' => 'Ciri ini direka untuk membantu komuniti memahami pengalaman sesiapa yang menyunting ensiklopedia ini.
Untuk maklumat lanjut, sila layari $1.',
	'moodbar-what-link' => 'laman ciri',
	'moodbar-privacy' => 'Dengan penyerahan ini, anda bersetuju dengan ketelusan di bawah $1 ini.',
	'moodbar-privacy-link' => 'syarat-syarat',
	'moodbar-disable-link' => 'Saya tak minat. Sila matikan ciri ini.',
	'moodbar-form-title' => 'Kerana...',
	'moodbar-form-note' => 'maksimum 140 aksara',
	'moodbar-form-note-dynamic' => '$1 aksara lagi',
	'moodbar-form-submit' => 'Kongsi Maklum Balas',
	'moodbar-form-policy-text' => 'Dengan penyerahan ini, $1',
	'moodbar-form-policy-label' => 'dasar kami',
	'moodbar-loading-title' => 'Berkongsi...',
	'moodbar-success-title' => 'Terima kasih!',
	'moodbar-error-title' => 'Alamak!',
	'moodbar-success-subtitle' => 'Berkongsi pengalaman menyunting anda membantu kami meningkatkan $1.',
	'moodbar-error-subtitle' => 'Ada yang tak kena! Sila cuba berkongsi maklum balas anda kemudian.',
	'right-moodbar-view' => 'Lihat dan eksport maklum balas MoodBar',
	'moodbar-admin-title' => 'Maklum balas MoodBar',
	'moodbar-admin-intro' => 'Laman ini membolehkan anda melihat maklum balas yang dihantar bersama MoodBar.',
	'moodbar-admin-empty' => 'Tiada hasil',
	'moodbar-header-id' => 'ID maklum balas',
	'moodbar-header-timestamp' => 'Cop masa',
	'moodbar-header-type' => 'Jenis',
	'moodbar-header-page' => 'Laman',
	'moodbar-header-usertype' => 'Jenis pengguna',
	'moodbar-header-user' => 'Pengguna',
	'moodbar-header-editmode' => 'Mod sunting',
	'moodbar-header-bucket' => 'Timba ujian',
	'moodbar-header-system' => 'Jenis sistem',
	'moodbar-header-locale' => 'Lokal',
	'moodbar-header-useragent' => 'Ejen Pengguna',
	'moodbar-header-comment' => 'Komen',
	'moodbar-header-user-editcount' => 'Kiraan suntingan pengguna',
	'moodbar-header-namespace' => 'Ruang nama',
	'moodbar-header-own-talk' => 'Laman perbincangan sendiri',
	'moodbar-type-happy' => 'Gembira',
	'moodbar-type-sad' => 'Sedih',
	'moodbar-type-confused' => 'Keliru',
	'moodbar-user-anonymized' => 'Rahsia',
	'moodbar-user-ip' => 'Alamat IP',
	'moodbar-user-user' => 'Pengguna berdaftar',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'moodbar-desc' => 'Maakt het voor bepaalde gebruikers mogelijk terugkoppeling te geven over hun ervaringen tijdens het bewerken',
	'moodbar-trigger-feedback' => 'Terugkoppeling over het bewerken',
	'moodbar-trigger-share' => 'Deel uw ervaring',
	'moodbar-trigger-editing' => 'Het bewerken van $1...',
	'moodbar-close' => '(sluiten)',
	'moodbar-intro-feedback' => 'Het bewerken van $1 maakte mij...',
	'moodbar-intro-share' => 'Mijn ervaring op $1 maakte mij...',
	'moodbar-intro-editing' => '$1 bewerken maakte mij...',
	'moodbar-type-happy-title' => 'Blij',
	'moodbar-type-sad-title' => 'Triest',
	'moodbar-type-confused-title' => 'Verward',
	'tooltip-moodbar-what' => 'Meer informatie over deze functie',
	'moodbar-what-label' => 'Wat is dit?',
	'moodbar-what-content' => 'Deze functie is ontworpen om de gemeenschap de ervaring van mensen die de site bewerken, te helpen begrijpen.
Ga naar de $1 voor mee informatie.',
	'moodbar-what-link' => 'pagina over deze functie',
	'moodbar-privacy' => 'Door te delen gaat u akkoord met transparantie onder deze $1.',
	'moodbar-privacy-link' => 'voorwaarden',
	'moodbar-disable-link' => 'Ik ben niet geïnteresseerd. Schakel deze functie uit.',
	'moodbar-form-title' => 'Omdat...',
	'moodbar-form-note' => 'Maximaal 140 tekens',
	'moodbar-form-note-dynamic' => '$1 tekens resterend',
	'moodbar-form-submit' => 'Feedback delen ▶',
	'moodbar-form-policy-text' => 'Door te delen, $1',
	'moodbar-form-policy-label' => 'ons beleid',
	'moodbar-loading-title' => 'Bezig met delen...',
	'moodbar-success-title' => 'Bedankt!',
	'moodbar-error-title' => 'Oeps!',
	'moodbar-success-subtitle' => 'Door het delen van uw ervaringen bij het bewerken, helpt u mee $1 te verbeteren.',
	'moodbar-error-subtitle' => 'Er is iets misgegaan! Probeer later opnieuw uw terugkoppeling te delen.',
	'right-moodbar-view' => 'MoodBar-terugkoppeling bekijken en exporteren',
	'moodbar-admin-title' => 'MoodBar-terugkoppeling',
	'moodbar-admin-intro' => 'Deze pagina laat u toe om terugkoppeling die met de MoodBar is verzonden, te bekijken',
	'moodbar-admin-empty' => 'Geen resultaten',
	'moodbar-header-id' => 'Nummer van de terugkoppeling',
	'moodbar-header-timestamp' => 'Tijdstip',
	'moodbar-header-type' => 'Type',
	'moodbar-header-page' => 'Pagina',
	'moodbar-header-usertype' => 'Gebruikerstype',
	'moodbar-header-user' => 'Gebruiker',
	'moodbar-header-editmode' => 'Bewerkingsmodus',
	'moodbar-header-bucket' => 'Testgroep',
	'moodbar-header-system' => 'Systeemtype',
	'moodbar-header-locale' => 'Taalinstelling',
	'moodbar-header-useragent' => 'User-agent',
	'moodbar-header-comment' => 'Opmerkingen',
	'moodbar-header-user-editcount' => 'Aantal bewerkingen van de gebruiker',
	'moodbar-header-namespace' => 'Naamruimte',
	'moodbar-header-own-talk' => 'Eigen overlegpagina',
	'moodbar-type-happy' => 'Blij',
	'moodbar-type-sad' => 'Triest',
	'moodbar-type-confused' => 'Verward',
	'moodbar-user-anonymized' => 'Geanonimiseerd',
	'moodbar-user-ip' => 'IP-adres',
	'moodbar-user-user' => 'Geregistreerde gebruiker',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Event
 */
$messages['no'] = array(
	'moodbar-header-user' => 'Bruker',
	'moodbar-header-editmode' => 'Redigeringsmodus',
	'moodbar-header-bucket' => 'Testebøtte',
	'moodbar-header-system' => 'Systemtype',
	'moodbar-header-comment' => 'Kommentarer',
	'moodbar-header-user-editcount' => 'Brukerens antall redigeringer',
	'moodbar-header-namespace' => 'Navnerom',
	'moodbar-header-own-talk' => 'Egen diskusjonsside',
	'moodbar-type-happy' => 'Glad',
	'moodbar-type-sad' => 'Trist',
	'moodbar-type-confused' => 'Forvirret',
	'moodbar-user-anonymized' => 'Anonymisert',
	'moodbar-user-ip' => 'IP-adresse',
	'moodbar-user-user' => 'Registrert bruker',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'moodbar-desc' => 'Pozwala określonym użytkownikom na wyrażenie opinii o posiadanym doświadczeniu w edytowaniu',
	'moodbar-trigger-feedback' => 'Opinia na temat edytowania',
	'moodbar-trigger-share' => 'Podziel się swoim doświadczeniem',
	'moodbar-trigger-editing' => 'Edytowanie {{GRAMMAR:D.lp|$1}}...',
	'moodbar-close' => '(zamknij)',
	'moodbar-intro-feedback' => 'Edytowanie {{GRAMMAR:D.lp|$1}} przyniosło mi...',
	'moodbar-intro-share' => 'Moje doświadczenie w {{GRAMMAR:MS.lp|$1}} przyniosło mi...',
	'moodbar-intro-editing' => 'Edytowanie {{GRAMMAR:D.lp|$1}} przyniosło mi...',
	'moodbar-type-happy-title' => 'zadowolenie',
	'moodbar-type-sad-title' => 'rozczarowanie',
	'moodbar-type-confused-title' => 'mieszane uczucia',
	'tooltip-moodbar-what' => 'Więcej informacji na temat tej funkcji',
	'moodbar-what-label' => 'O co tu chodzi?',
	'moodbar-what-content' => 'Ten dodatek pomaga społeczności zrozumieć doświadczenia osób edytujących projekt.
Więcej informacji uzyskasz na $1.',
	'moodbar-what-link' => 'tej stronie',
	'moodbar-privacy' => 'Przesyłając, wyrażasz zgodę na udostępnienie na następujących $1.',
	'moodbar-privacy-link' => 'warunkach',
	'moodbar-disable-link' => 'Nie jestem zainteresowany. Proszę wyłączyć tę funkcję.',
	'moodbar-form-title' => 'Ponieważ...',
	'moodbar-form-note' => 'maksymalnie 140 znaków',
	'moodbar-form-note-dynamic' => 'pozostało $1 znaków',
	'moodbar-form-submit' => 'Udostępnij opinię',
	'moodbar-form-policy-text' => 'Przesyłając, $1',
	'moodbar-form-policy-label' => 'naszej polityki',
	'moodbar-loading-title' => 'Udostępnianie...',
	'moodbar-success-title' => 'Dziękujemy!',
	'moodbar-error-title' => 'Oj!',
	'moodbar-success-subtitle' => 'Wymiana doświadczeń w edytowaniu pomaga udoskonalać {{GRAMMAR:MS.lp|$1}}.',
	'moodbar-error-subtitle' => 'Coś poszło źle! Spróbuj udostępnić swoją opinię ponownie za jakiś czas.',
	'right-moodbar-view' => 'Widok i eksport opinii MoodBar',
	'moodbar-admin-title' => 'Opinie MoodBar',
	'moodbar-admin-intro' => 'Strona umożliwia przeglądanie opinii zapisanych przy pomocy MoodBar.',
	'moodbar-admin-empty' => 'Brak wyników',
	'moodbar-header-id' => 'Identyfikator opinii',
	'moodbar-header-timestamp' => 'Sygnatura czasowa',
	'moodbar-header-type' => 'Typ',
	'moodbar-header-page' => 'Strona',
	'moodbar-header-usertype' => 'Typ użytkownika',
	'moodbar-header-user' => 'Użytkownik',
	'moodbar-header-editmode' => 'Tryb edycji',
	'moodbar-header-system' => 'Typ systemu',
	'moodbar-header-locale' => 'Preferencje językowe',
	'moodbar-header-useragent' => 'Aplikacja klienta',
	'moodbar-header-comment' => 'Komentarze',
	'moodbar-header-user-editcount' => 'Licznik edycji użytkownika',
	'moodbar-header-namespace' => 'Przestrzeń nazw',
	'moodbar-header-own-talk' => 'Własna strona dyskusji',
	'moodbar-type-happy' => 'Szczęśliwy',
	'moodbar-type-sad' => 'Smutny',
	'moodbar-type-confused' => 'Zmieszany',
	'moodbar-user-anonymized' => 'Anonimowo',
	'moodbar-user-ip' => 'Adres IP',
	'moodbar-user-user' => 'Zarejestrowany użytkownik',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'moodbar-desc' => 'Permite que os utilizadores especificados enviem ao operador do site uma indicação da sua experiência de edição',
	'moodbar-trigger-feedback' => 'Comentários sobre edição',
	'moodbar-trigger-share' => 'Partilhe a sua experiência',
	'moodbar-trigger-editing' => 'A editar $1...',
	'moodbar-close' => '(fechar)',
	'moodbar-intro-feedback' => 'Editar a $1 fez-me sentir...',
	'moodbar-intro-share' => 'Visitar a $1 fez-me sentir...',
	'moodbar-intro-editing' => 'Usar a $1 tornou-me...',
	'moodbar-type-happy-title' => 'Feliz',
	'moodbar-type-sad-title' => 'Triste',
	'moodbar-type-confused-title' => 'Confuso',
	'tooltip-moodbar-what' => 'Saiba mais sobre esta funcionalidade',
	'moodbar-what-label' => 'O que é isto?',
	'moodbar-what-content' => 'Esta funcionalidade foi concebida para ajudar a comunidade a compreender a experiência das pessoas que editam o site.
Para mais informações, visite $1.',
	'moodbar-what-link' => 'a página da funcionalidade',
	'moodbar-privacy' => 'Ao gravar, concorda que os seus comentários podem ser tornados públicos tal como explicado $1.',
	'moodbar-privacy-link' => 'nas normas',
	'moodbar-disable-link' => 'Não estou interessado. Desactivar esta funcionalidade, por favor.',
	'moodbar-form-title' => 'Porque...',
	'moodbar-form-note' => 'máx. 140 caracteres',
	'moodbar-form-note-dynamic' => 'restam $1 caracteres',
	'moodbar-form-submit' => 'Partilhar Comentários',
	'moodbar-form-policy-text' => 'Ao gravar, $1',
	'moodbar-form-policy-label' => 'as nossas normas',
	'moodbar-loading-title' => 'A partilhar...',
	'moodbar-success-title' => 'Obrigado!',
	'moodbar-error-title' => 'Erro!',
	'moodbar-success-subtitle' => 'Partilhar connosco o seu estado de espírito ajuda-nos a melhorar a $1.',
	'moodbar-error-subtitle' => 'Algo correu mal! Tente enviar os seus comentários novamente mais tarde, por favor.',
	'right-moodbar-view' => 'Ver e exportar os comentários da MoodBar',
	'moodbar-admin-title' => 'Comentários da MoodBar',
	'moodbar-admin-intro' => 'Esta página permite-lhe ver os comentários enviados com a MoodBar',
	'moodbar-admin-empty' => 'Não foram encontrados resultados',
	'moodbar-header-id' => 'ID do comentário',
	'moodbar-header-timestamp' => 'Data e hora',
	'moodbar-header-type' => 'Tipo',
	'moodbar-header-page' => 'Página',
	'moodbar-header-usertype' => 'Tipo de utilizador',
	'moodbar-header-user' => 'Utilizador',
	'moodbar-header-editmode' => 'Modo de edição',
	'moodbar-header-bucket' => 'Zona de testes',
	'moodbar-header-system' => 'Tipo de sistema',
	'moodbar-header-locale' => 'Local',
	'moodbar-header-useragent' => 'User-Agent',
	'moodbar-header-comment' => 'Comentários',
	'moodbar-header-user-editcount' => 'Contagem de edições do utilizador',
	'moodbar-header-namespace' => 'Espaço nominal',
	'moodbar-header-own-talk' => 'Página de discussão própria',
	'moodbar-type-happy' => 'Feliz',
	'moodbar-type-sad' => 'Triste',
	'moodbar-type-confused' => 'Confuso',
	'moodbar-user-anonymized' => 'Tornado anónimo',
	'moodbar-user-ip' => 'Endereço IP',
	'moodbar-user-user' => 'Utilizador registado',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'moodbar-desc' => 'Позволяет определенным участникам отправлять свои «настроения» обратно на сайт оператора',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'moodbar-desc' => 'Omogoča določenim uporabnikom pošiljanje povratne informacije o svoji urejevalski izkušnji',
	'moodbar-trigger-feedback' => 'Povratne informacije o urejanju',
	'moodbar-trigger-share' => 'Delite svoje izkušnje',
	'moodbar-trigger-editing' => 'Urejanje $1 ...',
	'moodbar-close' => '(zapri)',
	'moodbar-intro-feedback' => 'Urejanje $1 me je naredilo ...',
	'moodbar-intro-share' => 'Moja izkušnja na $1 me je naredila ...',
	'moodbar-intro-editing' => 'Urejanje $1 me je naredilo ...',
	'moodbar-type-happy-title' => 'Vesel',
	'moodbar-type-sad-title' => 'Žalosten',
	'moodbar-type-confused-title' => 'Zmeden',
	'tooltip-moodbar-what' => 'Več informacij o tej funkciji',
	'moodbar-what-label' => 'Kaj je to?',
	'moodbar-what-content' => 'Funkcija je oblikovana kot pomoč skupnosti pri razumevanju izkušnje ljudi, ki urejajo stran.
Za več informacij obiščite $1.',
	'moodbar-what-link' => 'stran z opisom',
	'moodbar-privacy' => 'S potrditvijo se strinjate s preglednostjo pod naslednjimi $1.',
	'moodbar-privacy-link' => 'pogoji',
	'moodbar-disable-link' => 'Me ne zanima.  Prosim, onemogoči to funkcijo.',
	'moodbar-form-title' => 'Ker ...',
	'moodbar-form-note' => 'največ 140 znakov',
	'moodbar-form-note-dynamic' => 'preostalo je $1 znakov',
	'moodbar-form-submit' => 'Deli povratne informacije',
	'moodbar-form-policy-text' => 'S potrditvijo $1',
	'moodbar-form-policy-label' => 'naša politika',
	'moodbar-loading-title' => 'Deljenje ...',
	'moodbar-success-title' => 'Hvala!',
	'moodbar-error-title' => 'Ups!',
	'moodbar-success-subtitle' => 'Deljenje vaše urejevalne izkušnje nam pomaga izboljšati $1.',
	'moodbar-error-subtitle' => 'Nekaj je šlo narobe! Prosimo, poskusite znova deliti svojo povratno informacijo pozneje.',
	'right-moodbar-view' => 'Ogled in izvoz povratnih informacij MoodBar',
	'moodbar-admin-title' => 'Povratne informacije MoodBar',
	'moodbar-admin-intro' => 'Ta stran vam omogoča ogled povratnih informacij, poslanih z MoodBar.',
	'moodbar-admin-empty' => 'Ni zadetkov',
	'moodbar-header-id' => 'ID povratne informacije',
	'moodbar-header-timestamp' => 'Časovni žig',
	'moodbar-header-type' => 'Vrsta',
	'moodbar-header-page' => 'Stran',
	'moodbar-header-usertype' => 'Vrsta uporabnika',
	'moodbar-header-user' => 'Uporabnik',
	'moodbar-header-editmode' => 'Način urejanja',
	'moodbar-header-bucket' => 'Preizkusno vedro',
	'moodbar-header-system' => 'Vrsta sistema',
	'moodbar-header-locale' => 'Jezik',
	'moodbar-header-useragent' => 'Uporabniški agent',
	'moodbar-header-comment' => 'Pripombe',
	'moodbar-header-user-editcount' => 'Števec urejanj uporabnika',
	'moodbar-header-namespace' => 'Imenski prostor',
	'moodbar-header-own-talk' => 'Lastna pogovorna stran',
	'moodbar-type-happy' => 'Veselega',
	'moodbar-type-sad' => 'Žalostnega',
	'moodbar-type-confused' => 'Zmedenega',
	'moodbar-user-anonymized' => 'Brezimen',
	'moodbar-user-ip' => 'IP-naslov',
	'moodbar-user-user' => 'Registriran uporabnik',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'moodbar-desc' => 'Cho phép những người dùng được chỉ định gửi “tâm trạng” của họ lại cho nhà điều hành trang',
	'moodbar-trigger-feedback' => 'Phản hồi về sửa đổi',
	'moodbar-trigger-share' => 'Chia sẻ ấn tượng của bạn',
	'moodbar-trigger-editing' => 'Việc sửa đổi $1…',
	'moodbar-close' => '(đóng)',
	'moodbar-intro-feedback' => 'Việc sửa đổi $1 làm cho tôi có vẻ…',
	'moodbar-intro-share' => 'Việc sử dụng $1 làm cho tôi có vẻ…',
	'moodbar-intro-editing' => 'Việc sửa đổi $1 làm cho tôi có vẻ…',
	'moodbar-type-happy-title' => 'Hài lòng',
	'moodbar-type-sad-title' => 'Bực mình',
	'moodbar-type-confused-title' => 'Bối rối',
	'tooltip-moodbar-what' => 'Tìm hiểu thêm về tính năng này',
	'moodbar-what-label' => 'Này là gì?',
	'moodbar-what-content' => 'Tính năng này có mục đích giúp cộng đồng Wikipedia hiểu biết những ấn tượng của người xây dựng bách khoa toàn thư.
Để biết thêm chi tiết, xin ghé vào $1.',
	'moodbar-what-link' => 'trang tính năng',
	'moodbar-privacy' => 'Bằng cách gửi thông tin, bạn đồng ý phát hành thông tin này công khai theo các $1 này.',
	'moodbar-privacy-link' => 'điều khoản',
	'moodbar-disable-link' => 'Thôi, xin tắt tính năng này.',
	'moodbar-form-title' => 'Bởi vì…',
	'moodbar-form-note' => 'tối đa 150 ký tự nữa',
	'moodbar-form-note-dynamic' => 'còn $1 ký tự',
	'moodbar-form-submit' => 'Chia sẻ phản hồi',
	'moodbar-form-policy-text' => 'Bằng cách gửi thông tin, $1',
	'moodbar-form-policy-label' => 'chính sách của chúng ta',
	'moodbar-loading-title' => 'Đang chia sẻ…',
	'moodbar-success-title' => 'Cám ơn!',
	'moodbar-error-title' => 'Oái!',
	'moodbar-success-subtitle' => 'Việc chia sẻ những ấn tượng về quá trình sửa đổi giúp chúng tôi cải thiện $1.',
	'moodbar-error-subtitle' => 'Oái, đã bị trục trặc! Xin vui lòng chia sẻ tâm trạng của bạn lát nữa.',
	'right-moodbar-view' => 'Xem và xuất phản hồi MoodBar',
	'moodbar-admin-title' => 'Phản hồi về MoodBar',
	'moodbar-admin-intro' => 'Trang này cho phép đọc các phản hồi được gửi dùng MoodBar.',
	'moodbar-admin-empty' => 'Không có kết quả',
	'moodbar-header-id' => 'ID của bài phản hồi',
	'moodbar-header-timestamp' => 'Thời gian',
	'moodbar-header-type' => 'Kiểu',
	'moodbar-header-page' => 'Trang',
	'moodbar-header-usertype' => 'Kiểu người dùng',
	'moodbar-header-user' => 'Người dùng',
	'moodbar-header-editmode' => 'Chế độ sửa đổi',
	'moodbar-header-bucket' => 'Phiên bản thử nghiệm',
	'moodbar-header-system' => 'Loại hệ thống',
	'moodbar-header-locale' => 'Địa phương',
	'moodbar-header-useragent' => 'Trình duyệt',
	'moodbar-header-comment' => 'Bình luận',
	'moodbar-header-user-editcount' => 'Số lần sửa đổi của người dùng',
	'moodbar-header-namespace' => 'Không gian tên',
	'moodbar-header-own-talk' => 'Trang thảo luận của chính mình',
	'moodbar-type-happy' => 'Hài lòng',
	'moodbar-type-sad' => 'Bực mình',
	'moodbar-type-confused' => 'Bối rối',
	'moodbar-user-anonymized' => 'Ẩn danh',
	'moodbar-user-ip' => 'Địa chỉ IP',
	'moodbar-user-user' => 'Người dùng đăng ký',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author PhiLiP
 */
$messages['zh-hans'] = array(
	'moodbar-desc' => '允许指定的用户提供他们的编辑体验反馈',
	'moodbar-trigger-feedback' => '有关编辑的反馈',
	'moodbar-trigger-share' => '分享你的经验',
	'moodbar-trigger-editing' => '编辑$1……',
	'moodbar-close' => '（关闭）',
	'moodbar-intro-feedback' => '编辑$1让我……',
	'moodbar-type-happy-title' => '开心',
	'moodbar-type-sad-title' => '不快',
	'moodbar-type-confused-title' => '困惑',
	'tooltip-moodbar-what' => '了解有关此功能的详细信息',
	'moodbar-what-label' => '这是什么？',
	'moodbar-what-content' => '此功能可以帮助社区了解人们在编辑此网站时的体验。详细信息请访问$1。',
	'moodbar-what-link' => '功能页面',
	'moodbar-privacy' => '提交后，您将同意在$1下的透明度。',
	'moodbar-privacy-link' => '条款',
	'moodbar-disable-link' => '我不感兴趣，请禁用此功能。',
	'moodbar-form-title' => '因为……',
	'moodbar-form-note' => '最多140字',
	'moodbar-form-note-dynamic' => '剩余$1字',
	'moodbar-form-submit' => '分享反馈',
	'moodbar-form-policy-text' => '提交后，$1',
	'moodbar-form-policy-label' => '我们的政策',
	'moodbar-loading-title' => '分享中……',
	'moodbar-success-title' => '感谢！',
	'moodbar-error-title' => '糟糕！',
	'moodbar-success-subtitle' => '分享您的编辑体验，帮助我们改善$1。',
	'moodbar-error-subtitle' => '出错啦！请重试分享您的反馈意见。',
	'right-moodbar-view' => '查看和导出MoodBar反馈',
	'moodbar-admin-title' => 'MoodBar反馈',
	'moodbar-admin-intro' => '此页面允许你查看通过MoodBar提交的反馈。',
	'moodbar-admin-empty' => '没有结果',
	'moodbar-header-id' => '反馈ID',
	'moodbar-header-timestamp' => '时间戳',
	'moodbar-header-type' => '类型',
	'moodbar-header-page' => '页面',
	'moodbar-header-usertype' => '用户类型',
	'moodbar-header-user' => '用户',
	'moodbar-header-editmode' => '编辑模式',
	'moodbar-header-bucket' => '分桶测试',
	'moodbar-header-system' => '系统类型',
	'moodbar-header-locale' => '地区',
	'moodbar-header-useragent' => '用户客户端',
	'moodbar-header-comment' => '评论',
	'moodbar-header-user-editcount' => '用户编辑次数',
	'moodbar-header-namespace' => '名字空间',
	'moodbar-header-own-talk' => '自己的讨论页',
);

