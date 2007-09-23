<?php
/**
 * Internationalisation file for makevalidate extension.
 *
 * @package MediaWiki
 * @subpackage Extensions
*/

function efMakeValidateMessages() {
	$messages = array();
	
/* English (Aaron Schulz) */
$messages['en'] = array(
	'makevalidate'       => 'Promote/demote editors',
	'makevalidate-header'   => '<strong>This form is used by sysops and bureaucrats to promote users to article 
	validators.</strong><br> Type the name of the user in the box and press the button to set the user\'s rights. 
	Granting users reviewer status will automatically grant them editor status. Revoking editor status will
	automatically revoke reviewer status.',
	'makevalidate-username'  => 'Name of the user:',
	'makevalidate-search' => 'Go',
	'makevalidate-iseditor' => '[[User:$1|$1]] has editor status.',
	'makevalidate-noteditor' => '[[User:$1|$1]] does not have editor status.',
	'makevalidate-isvalidator' => '[[User:$1|$1]] has reviewer status.',
	'makevalidate-notvalidator' => '[[User:$1|$1]] does not have reviewer status.',
	'makevalidate-legend' => 'Change user rights:',
	'makevalidate-change-e' => 'Editor status:',
	'makevalidate-change-r' => 'Reviewer status:',
	'makevalidate-grant1' => 'Grant',
	'makevalidate-revoke1' => 'Revoke',
	'makevalidate-grant2' => 'Grant',
	'makevalidate-revoke2' => 'Revoke',
	'makevalidate-comment' => 'Comment:',
	'makevalidate-granted-e' => '[[User:$1|$1]] now has editor status.',
	'makevalidate-revoked-e' => '[[User:$1|$1]] no longer has editor status.',
	'makevalidate-granted-r' => '[[User:$1|$1]] now has reviewer status.',
	'makevalidate-revoked-r' => '[[User:$1|$1]] no longer has reviewer status.',
	'makevalidate-logpage' => 'Editor status log',
	'makevalidate-logpagetext' => 'This is a log of changes to users\' [[Help:Article validation|article validation]] status.',
	'makevalidate-logentrygrant-e' => 'granted editor status to [[$1]]',
	'makevalidate-logentryrevoke-e' => 'removed editor status from [[$1]]',
	'makevalidate-logentrygrant-r' => 'granted reviewer status to [[$1]]',
	'makevalidate-logentryrevoke-r' => 'removed reviewer status from [[$1]]',
	'makevalidate-autosum' => 'autopromoted',
    'rights-editor-grant'   => 'granted editor status to [[$1]]',
    'rights-editor-revoke'  => 'removed editor status from [[$1]]',
);

/* Arabic (Meno25) */
$messages['ar'] = array(
	'makevalidate'                  => 'ترقية/عزل المحررين',
	'makevalidate-header'           => '<strong>هذه الاستمارة تستخدم بواسطة مدراء النظام و البيروقراطيين لترقية المستخدمين لمصححي مقالات.</strong><br> اكتب اسم المستخدم في الصندوق و اضغط الزر لضبط صلاحيات المستخدم. 
	منح المستخدمين صلاحية مراجع سيؤدي لمنحهم صلاحية محرر تلقائيا. سحب صلاحية محرر
	سيؤدي إلى سحب صلاحية مراجع تلقائيا.',
	'makevalidate-username'         => 'اسم المستخدم:',
	'makevalidate-search'           => 'اذهب',
	'makevalidate-iseditor'         => '[[User:$1|$1]] لديه صلاحية محرر.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] ليس لديه صلاحية محرر.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] لديه صلاحية مراجع.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] ليس لديه صلاحية مراجع.',
	'makevalidate-legend'           => 'تغيير صلاحيات مستخدم:',
	'makevalidate-change-e'         => 'حالة المحرر:',
	'makevalidate-change-r'         => 'حالة المراجع:',
	'makevalidate-grant1'           => 'منح',
	'makevalidate-revoke1'          => 'سحب',
	'makevalidate-grant2'           => 'منح',
	'makevalidate-revoke2'          => 'سحب',
	'makevalidate-comment'          => 'تعليق:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] لدية الآن صلاحية محرر.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] لم يعد لديه صلاحية محرر.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] لديه الآن صلاحية مراجع.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] لم يعد لديه صلاحية مراجع.',
	'makevalidate-logpage'          => 'سجل صلاحية المحرر',
	'makevalidate-logpagetext'      => 'هذا سجل بالتغيير في صلاحيات [[Help:Article validation|تصحيح المقالات]].',
	'makevalidate-logentrygrant-e'  => 'منح صلاحية محرر إلى [[$1]]',
	'makevalidate-logentryrevoke-e' => 'سحب صلاحية محرر من [[$1]]',
	'makevalidate-logentrygrant-r'  => 'منح صلاحية مراجع إلى [[$1]]',
	'makevalidate-logentryrevoke-r' => 'سحب صلاحية مراجع من [[$1]]',
	'makevalidate-autosum'          => 'ترقية تلقائية',
	'rights-editor-grant'           => 'منح صلاحية محرر إلى [[$1]]',
	'rights-editor-revoke'          => 'أزال حالة محرر من [[$1]]',
);
$messages['bcl'] = array(
	'makevalidate-username'         => 'Pangaran kan parágamit:',
	'makevalidate-search'           => 'Dumanán',
	'makevalidate-legend'           => 'Ribayan an derechos kan parágamit:',
	'makevalidate-grant1'           => 'Otobón',
	'makevalidate-grant2'           => 'Otobón',
	'makevalidate-comment'          => 'Komento:',
);
$messages['ca'] = array(
	'makevalidate'                  => 'Promociona o degrada un usuari',
	'makevalidate-header'           => '<strong>Aquest formulari serveix perquè els administradors i buròcrates puguin promocionar els usuaris per a validar articles.</strong><br /> Escriviu el nom de l\'usuari en la casella i premeu el botó per adjudicar-li els nivells que cregueu necessaris. El fet de donar el nivell de supervisor a un usuari farà que automàticament rebi també el d\'editor, i treure el nivell d\'editor a un usuari provocarà que també perdi el de supervisor (si el té).',
	'makevalidate-username'         => 'Nom d\'usuari:',
	'makevalidate-search'           => 'Accepta',
	'makevalidate-iseditor'         => 'L\'usuari [[User:$1|$1]] té el nivell d\'editor.',
	'makevalidate-noteditor'        => 'L\'usuari [[User:$1|$1]] no té el nivell d\'editor.',
	'makevalidate-isvalidator'      => 'L\'usuari [[User:$1|$1]] té el nivell de supervisor.',
	'makevalidate-notvalidator'     => 'L\'usuari [[User:$1|$1]] no té el nivell de supervisor.',
	'makevalidate-legend'           => 'Canvia els drets d\'usuari',
	'makevalidate-change-e'         => 'Estatus d\'editor:',
	'makevalidate-change-r'         => 'Estatus de supervisor:',
	'makevalidate-grant1'           => 'Concedeix',
	'makevalidate-revoke1'          => 'Revoca',
	'makevalidate-grant2'           => 'Concedeix',
	'makevalidate-revoke2'          => 'Revoca',
	'makevalidate-comment'          => 'Comentari:',
	'makevalidate-granted-e'        => 'L\'usuari [[User:$1|$1]] ha obtingut el nivell d\'editor.',
	'makevalidate-revoked-e'        => 'L\'usuari [[User:$1|$1]] ja no té més el nivell d\'editor.',
	'makevalidate-granted-r'        => 'L\'usuari [[User:$1|$1]] ha obtingut el nivell de supervisor.',
	'makevalidate-revoked-r'        => 'L\'usuari [[User:$1|$1]] ja no té més el nivell de supervisor.',
	'makevalidate-logpage'          => 'Registre de nivells d\'edició',
	'makevalidate-logpagetext'      => 'Aquest registre informa dels canvis de nivell dels usuaris respecte la [[Help:Article validation|validació d\'articles]].',
	'makevalidate-logentrygrant-e'  => 'concedit el nivell d\'editor a [[$1]]',
	'makevalidate-logentryrevoke-e' => 'tret el nivell d\'editor a [[$1]]',
	'makevalidate-logentrygrant-r'  => 'concedit el nivell de supervisor a [[$1]]',
	'makevalidate-logentryrevoke-r' => 'tret el nivell de supervisor a [[$1]]',
	'makevalidate-autosum'          => 'autoconcedit',
	'rights-editor-grant'           => 'concedit el nivell d\'editor a [[$1]]',
	'rights-editor-revoke'          => 'tret el nivell d\'editor a [[$1]]',
);

$messages['cs'] = array(
	'makevalidate'                  => 'Přidat nebo odebrat editory',
	'makevalidate-header'           => '<strong>Tento formulář slouží správcům a byrokratům k povyšování uživatelů na editory s právem schvalovat články.</strong><br> Přidělením statusu posuzovatele se automaticky přidělí i status editora. Odebráním statusu editora se automaticky odebere i status posuzovatele.',
	'makevalidate-username'         => 'Jméno uživatele',
	'makevalidate-search'           => 'Hledat',
	'makevalidate-iseditor'         => '[[User:$1|$1]] má status editora.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] nemá status editora.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] má status posuzovatele.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] nemá status posuzovatele.',
	'makevalidate-legend'           => 'Změnit uživatelská práva:',
	'makevalidate-change-e'         => 'status editora:',
	'makevalidate-change-r'         => 'status posuzovatele:',
	'makevalidate-grant1'           => 'Přidělit',
	'makevalidate-revoke1'          => 'Odebrat',
	'makevalidate-grant2'           => 'Přidělit',
	'makevalidate-revoke2'          => 'Odebrat',
	'makevalidate-comment'          => 'Komentář:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] teď má status editora.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] již nemá status editora.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] teď má status posuzovatele.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] již nemá status posuzovatele.',
	'makevalidate-logpage'          => 'Kniha práv editorů',
	'makevalidate-logpagetext'      => 'Tato kniha zobrazuje změny statusu uživatelů pro [[Help:Article validation|schvalování článků]].',
	'makevalidate-logentrygrant-e'  => 'přiděluje status editora uživateli [[$1]]',
	'makevalidate-logentryrevoke-e' => 'odebírá status editora uživateli [[$1]]',
	'makevalidate-logentrygrant-r'  => 'přiděluje status posuzovatele uživateli [[$1]]',
	'makevalidate-logentryrevoke-r' => 'odebírá status posuzovatele uživateli [[$1]]',
	'makevalidate-autosum'          => 'automaticky povýšen',
	'rights-editor-grant'           => 'přiděluje status editora uživateli [[$1]]',
	'rights-editor-revoke'          => 'odebírá status editora uživateli [[$1]]',
);
/* German (Raimond Spekking) */
$messages['de'] = array(
	'makevalidate'       => 'Editor-Recht erteilen/entziehen',
	'makevalidate-header'   => '<strong>Mit diesem Formular können Administratoren und Bürokraten Benutzern das Recht zur Artikelprüfung erteilen.</strong><br />
	Geben Sie den Benutzernamen in das Feld ein und drücken Sie auf den Button um das Recht zu setzen.
	Durch Erteilung des Prüfrechts wird automatisch auch das Editor-Recht erteilt. Der Entzug des Editors-Rechts hat automatisch den Entzug des Prüfrechts zur Folge.',
	'makevalidate-username'  => 'Benutzername:',
	'makevalidate-search' => 'Ausführen',
	'makevalidate-iseditor' => '[[User:$1|$1]] hat das Editor-Recht.',
	'makevalidate-noteditor' => '[[User:$1|$1]] hat kein Editor-Recht.',
	'makevalidate-isvalidator' => '[[User:$1|$1]] hat das Prüfrecht.',
	'makevalidate-notvalidator' => '[[User:$1|$1]] hat kein Prüfrecht.',
	'makevalidate-legend' => 'Benutzerrechte ändern:',
	'makevalidate-change-e' => 'Editor-Recht:',
	'makevalidate-change-r' => 'Prüfrecht:',
	'makevalidate-grant1' => 'Erteile',
	'makevalidate-revoke1' => 'Entziehe',
	'makevalidate-grant2' => 'Erteile',
	'makevalidate-revoke2' => 'Entziehe',
	'makevalidate-comment' => 'Kommentar:',
	'makevalidate-granted-e' => '[[User:$1|$1]] hat nun das Editor-Recht.',
	'makevalidate-revoked-e' => '[[User:$1|$1]] wurde das Editor-Recht entzogen.',
	'makevalidate-granted-r' => '[[User:$1|$1]] hat nun das Prüfrecht.',
	'makevalidate-revoked-r' => '[[User:$1|$1]] wurde das Prüfrecht entzogen.',
	'makevalidate-logpage' => 'Editor-Rechte-Logbuch',
	'makevalidate-logpagetext' => 'Dies ist das Änderungs-Logbuch der Benutzer-[[Help:Article validation|Prüfrechte]].',
	'makevalidate-logentrygrant-e' => 'erteilte das Editor-Recht an [[$1]]',
	'makevalidate-logentryrevoke-e' => 'entzog das Editor-Recht von [[$1]]',
	'makevalidate-logentrygrant-r' => 'erteilte das Prüfrecht an [[$1]]',
	'makevalidate-logentryrevoke-r' => 'entzog das Prüfrecht von [[$1]]',
	'makevalidate-autosum' => 'automatische Rechtevergabe',
	'rights-editor-revoke'  => 'entzog das Editor-Recht von [[$1]]',
	'rights-editor-grant'   => 'erteilte das Editor-Recht an [[$1]]',
);

$messages['hsb'] = array(
	'makevalidate'                  => 'Wobdźěłowarjow zasadźić/wotsadźić',
	'makevalidate-header'           => '<strong>Z tutym formularom móža administratorojo a běrokraća wužiwarjam prawo pruwowanja dać.</strong><br />
	Zapisaj wužiwarske mjeno do pola a klikń na tłóčatko, zo by wužiwarske prawo                                                                   spožčił. Spožčenje statusa pruwowarja budźe so awtomatisce status wobdźěłowarja spožčeć.',
	'makevalidate-username'         => 'Wužiwarske mjeno:',
	'makevalidate-search'           => 'Pytać',
	'makevalidate-iseditor'         => '[[User:$1|$1]] ma prawo wobdźěłowarja.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] nima prawo wobdźěłowarja.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] ma prawo pruwowarja.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] nima prawo pruwowarja.',
	'makevalidate-legend'           => 'Wužiwarske prawa změnić',
	'makevalidate-change-e'         => 'Prawo wobdźěłowarja:',
	'makevalidate-change-r'         => 'Status pruwowarja:',
	'makevalidate-grant1'           => 'Dać',
	'makevalidate-revoke1'          => 'Zebrać',
	'makevalidate-grant2'           => 'Dać',
	'makevalidate-revoke2'          => 'Zebrać',
	'makevalidate-comment'          => 'Komentar:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] ma nětko status wobdźěłowarja.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] hižo status wobdźěłowarja nima.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] ma nětko status pruwowarja.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] hižo status pruwowarja nima.',
	'makevalidate-logpage'          => 'Protokol statusa wobdźěłowarja',
	'makevalidate-logpagetext'      => 'To je protokol změnow [[Help:Article validation|pruwowanskich prawow]] wužiwarja.',
	'makevalidate-logentrygrant-e'  => 'Status wobdźěłowarja bu [[$1]] daty.',
	'makevalidate-logentryrevoke-e' => 'Status wobdźěłowarja bu [[$1]] zebrany.',
	'makevalidate-logentrygrant-r'  => 'status pruwowarja bu [[$1]] daty.',
	'makevalidate-logentryrevoke-r' => 'status pruwowarja bu [[$1]] zebrany.',
	'makevalidate-autosum'          => 'Prawo awtomatisce spožčene',
	'rights-editor-grant'           => 'status wobdźěłowarja bu [[$1]] daty.',
	'rights-editor-revoke'          => 'status wobdźěłowarja bu [[$1]] zebrany.',
);

$messages['la'] = array(
	'makevalidate-username'         => 'Nomen usoris:',
	'makevalidate-search'           => 'Ire',
	'makevalidate-iseditor'         => '[[User:$1|$1]] statum recensorem habet.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] non habet statum recensorem.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] statum revisorem habet.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] non habet statum revisorem.',
	'makevalidate-change-e'         => 'Status recensor:',
	'makevalidate-change-r'         => 'Status revisor:',
	'makevalidate-grant1'           => 'Licere',
	'makevalidate-revoke1'          => 'Revocare',
	'makevalidate-grant2'           => 'Licere',
	'makevalidate-revoke2'          => 'Revocare',
	'makevalidate-comment'          => 'Sententia:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] nunc habet statum recensorem.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] non jam habet statum recensorem.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] nunc habet statum revisorem.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] non jam habet statum revisorem.',
	'makevalidate-logentrygrant-e'  => 'licuit statum recensorem pro [[$1]]',
	'makevalidate-logentryrevoke-e' => 'removit statum recensorem usoris [[$1]]',
	'makevalidate-logentrygrant-r'  => 'licuit statum revisorem pro [[$1]]',
	'makevalidate-logentryrevoke-r' => 'removit statum revisorem usoris [[$1]]',
	'rights-editor-grant'           => 'licuit statum recensorem pro [[$1]]',
	'rights-editor-revoke'          => 'removit statum recensorem usoris [[$1]]',
);

$messages['nl'] = array(
	'makevalidate'                  => 'Promotie/demotie redacteuren',
	'makevalidate-header'           => '<strong>Dit formulier wordt gebruikt door beheerders en bureaucraten om gebruikers aan te wijzen die pagina\'s kunnen valideren.</strong><br> Voer de naam van een gebruiker in het invoerveld in en klik op de knop om de gebruikersrechten in te stellen. Een gebruiker de status reviewer geven, maakt die gebruiker automatisch redacteur. Het intrekken van de status redacteur houdt het intrekken van de status reviewer in.',
	'makevalidate-username'         => 'Gebruiker:',
	'makevalidate-search'           => 'OK',
	'makevalidate-iseditor'         => '[[User:$1|$1]] heeft status redacteur.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] heeft niet de status redacteur.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] heeft de status reviewer.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] heeft niet de status reviewer.',
	'makevalidate-legend'           => 'Wijzig gebruikersrechten:',
	'makevalidate-change-e'         => 'Status redacteur:',
	'makevalidate-change-r'         => 'Status reviewer:',
	'makevalidate-grant1'           => 'Toekennen',
	'makevalidate-revoke1'          => 'Intrekken',
	'makevalidate-grant2'           => 'Toekennen',
	'makevalidate-revoke2'          => 'Intrekken',
	'makevalidate-comment'          => 'Opmerking:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] heeft nu de status redacteur.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] heeft niet langer de status redacteur.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] heeft nu de status reviewer.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] heeft niet langer de status reviewer.',
	'makevalidate-logpage'          => 'Logboek status redacteur',
	'makevalidate-logpagetext'      => 'Dit is een logboek met wijziging in de status voor [[Help:Article validation|paginavalidatie]] voor gebruikers.',
	'makevalidate-logentrygrant-e'  => 'heeft de status redacteur toegekend aan [[$1]]',
	'makevalidate-logentryrevoke-e' => 'heeft de status redacteur ingetrokken voor [[$1]]',
	'makevalidate-logentrygrant-r'  => 'heeft de status reviewer toegekend aan [[$1]]',
	'makevalidate-logentryrevoke-r' => 'heeft de status reviewer ingetrokken voor [[$1]]',
	'makevalidate-autosum'          => 'automatisch gepromoveerd',
	'rights-editor-grant'           => 'heeft de redacteurstatus gegeven aan [[$1]]',
	'rights-editor-revoke'  => 'verwijderde redacteurstatus van [[$1]]',
);

/* Norwegian (Jon Harald Søby) */
$messages['no'] = array(
	'makevalidate'                  => 'Forfrem eller degrader bidragsytere',
	'makevalidate-header'           => '<strong>Dette skjemaet brukes av administratorer og byråkrater for å forfremme brukere til artikkelgodkjennere.</strong><br />Skriv inn navnet på brukeren i boksen og trykk knappen for å sette brukerrettigheter. Å gi brukere godkjennerstatus vil automatisk gi dem redaktørstatus. Fjerning av redaktørstatus vil automatisk føre til fjerning av godkjennerstatus.',
	'makevalidate-username'         => 'Brukernavn:',
	'makevalidate-search'           => 'Gå',
	'makevalidate-iseditor'         => '[[User:$1|$1]] har redaktørstatus.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] har ikke redaktørstatus.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] har godkjennerstatus.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] har ikke godkjennerstatus.',
	'makevalidate-legend'           => 'Endre brukerrettigheter:',
	'makevalidate-change-e'         => 'Redaktørstatus:',
	'makevalidate-change-r'         => 'Godkjennerstatus:',
	'makevalidate-grant1'           => 'Gi',
	'makevalidate-revoke1'          => 'Fjern',
	'makevalidate-grant2'           => 'Gi',
	'makevalidate-revoke2'          => 'Fjern',
	'makevalidate-comment'          => 'Kommentar:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] har nå redaktørstatus.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] har ikke lenger redaktørstatus.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] har nå godkjennerstatus.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] har ikke lenger godkjennerstatus.',
	'makevalidate-logpage'          => 'Godkjennerstatuslogg',
	'makevalidate-logpagetext'      => 'Dette er en logg over endringer i brukeres [[Help:Article validation|artikkelvalderingsstatus]].',
	'makevalidate-logentrygrant-e'  => 'ga redaktørstatus til [[User:$1|$1]]',
	'makevalidate-logentryrevoke-e' => 'fjernet redaktørstatus fra [[User:$1|$1]]',
	'makevalidate-logentrygrant-r'  => 'ga godkjennerstatus til [[User:$1|$1]]',
	'makevalidate-logentryrevoke-r' => 'fjernet godkjennerstatus fra [[User:$1|$1]]',
	'makevalidate-autosum'          => 'autoforfremmet',
);

/* Piedmontese (Bèrto 'd Sèra) */
$messages['pms'] = array(
	'makevalidate'                  => 'Promeuv/dësbassa ij redator',
	'makevalidate-header'           => '<strong>Sta pàgina-sì a la dòvro aministrator e mangiapapé për buteje a j\'utent la qualìfica da convalidator
	dj\'artìcoj.</strong><br> Ch\'a scriva lë stranòm dl\'utent ant ël camp e peuj ch\'a-i bata dzora al boton për travajr ant sla qualìfica dl\'utent. 
	Ën butand-je la qualìfica da revisor a n\'utent a-j da n\'aotomàtica \'cò cola da redator. Ën gavand-je cola da redator a-j gava via n\'aotomàtich \'cò cola da revisor.',
	'makevalidate-username'         => 'Stranòm:',
	'makevalidate-search'           => 'Va',
	'makevalidate-iseditor'         => '[[User:$1|$1]] a l\'ha la qualìfica da redator.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] a l\'ha pa la qualìfica da redator.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] a l\'ha la qualìfica da revisor.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] a l\'ha pa la qualìfica da revisor.',
	'makevalidate-legend'           => 'Cambieje sò drit a n\'utent:',
	'makevalidate-change-e'         => 'Qualìfica ëd redator:',
	'makevalidate-change-r'         => 'Qualìfica ëd revisor:',
	'makevalidate-grant1'           => 'Buta',
	'makevalidate-revoke1'          => 'Gava',
	'makevalidate-grant2'           => 'Buta',
	'makevalidate-revoke2'          => 'Gava',
	'makevalidate-comment'          => 'Coment:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] adess a l\'ha la qualìfica da redator.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] a l\'ha pì nen la qualìfica da redator.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] adess a l\'ha la qualìfica da revisor.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] a l\'ha pì nen la qualìfica da revisor.',
	'makevalidate-logpage'          => 'Registr dle qualìfiche da editor',
	'makevalidate-logpagetext'      => 'Sòn a l\'é un registr dle modìfiche a le qualìfiche ch\'a toco la [[Help:Article validation|convàlida dj\'artìcoj]].',
	'makevalidate-logentrygrant-e'  => 'Butaje la qualìfica da redator a [[$1]]',
	'makevalidate-logentryrevoke-e' => 'Gavaje la qualìfica da redator a [[$1]]',
	'makevalidate-logentrygrant-r'  => 'Butaje la qualìfica da revisor a [[$1]]',
	'makevalidate-logentryrevoke-r' => 'Gavaje la qualìfica da revisor a [[$1]]',
	'makevalidate-autosum'          => 'promossion aotomàtica',
);

/* Portuguese (Lugusto) */
$messages['pt'] = array(
	'makevalidate'       => 'Promover/rebaixar editores',
	'makevalidate-header'   => '<strong>Este é um formulário utilizado por {{int:group-sysop}} e {{int:group-bureaucrat}} para promover usuários a validadores de páginas.</strong><br>Digite o nome de usuário no espaço indicado e clique no botão correspondente a alteração de privilégios desejada de ser feita. Conceder o estado de {{int:group-reviewer-member}} fará com que a pessoa se torne {{int:group-editor-member}} automaticamente. Revogar o status de {{int:group-editor-member}} automaticamente revogará também o estado de {{int:group-reviewer-member}}.',
	'makevalidate-username'  => 'Nome de usuário:',
	'makevalidate-search' => 'Ir',
	'makevalidate-iseditor' => '[[{{ns:user}}:$1|$1]] possui status de {{int:group-editor-member}}.',
	'makevalidate-noteditor' => '[[{{ns:user}}:$1|$1]] não possui status de {{int:group-editor-member}}.',
	'makevalidate-isvalidator' => '[[{{ns:user}}:$1|$1]] possui status de {{int:group-reviewer-member}}.',
	'makevalidate-notvalidator' => '[[{{ns:user}}:$1|$1]] não possui status de {{int:group-reviewer-member}}.',
	'makevalidate-legend' => 'Alterar direitos de usuário:',
	'makevalidate-change-e' => 'Status de {{int:group-editor-member}}:',
	'makevalidate-change-r' => 'Status de {{int:group-reviewer-member}}:',
	'makevalidate-grant1' => 'Conceder',
	'makevalidate-revoke1' => 'Revocar',
	'makevalidate-grant2' => 'Conceder',
	'makevalidate-revoke2' => 'Revocar',
	'makevalidate-comment' => 'Comentário:',
	'makevalidate-granted-e' => '[[{{ns:user}}:$1|$1]] agora possui status de {{int:group-editor-member}}.',
	'makevalidate-revoked-e' => '[[{{ns:user}}:$1|$1]] não mais possui status de {{int:group-editor-member}}.',
	'makevalidate-granted-r' => '[[{{ns:user}}:$1|$1]] agora possui status de {{int:group-reviewer-member}}.',
	'makevalidate-revoked-r' => '[[{{ns:user}}:$1|$1]] não mais possui status de {{int:group-reviewer-member}}.',
	'makevalidate-logpage' => 'Registo de status de editores',
	'makevalidate-logpagetext' => 'Este é um registo de alterações de status de [[{{ns:help}}:Validação de páginas|validadores de páginas]] ([[{{int:grouppage-editor}}|{{int:group-editor}}]] e [[{{int:grouppage-reviewer}}|{{int:group-reviewer}}]]).',
	'makevalidate-logentrygrant-e' => 'concedido status de {{int:group-editor-member}} para [[$1]]',
	'makevalidate-logentryrevoke-e' => 'removido status de {{int:group-editor-member}} de [[$1]]',
	'makevalidate-logentrygrant-r' => 'concedido status de {{int:group-reviewer-member}} para [[$1]]',
	'makevalidate-logentryrevoke-r' => 'removido status de {{int:group-reviewer-member}} para [[$1]]',
	'makevalidate-autosum' => 'promovido automaticamente',
);

// Slovak (Helix84)
$messages['sk'] = array(
	'makevalidate'                  => 'Povýšiť/degradovať používateľov',
	'makevalidate-header'           => '<strong>Tento formulár používajú správcovia a byrokrati pre povýšenie používateľov na overovateľov
	článkov.</strong><br> Napíšte meno používateľa do poľa a stlačte tlačidlo. Tým sa nastavia používateľovu práva.
	Udelenie používateľovi status kontrolóra in automaticky zabezpečí status redaktora. Odmietnutie statusu redaktora
	automaticky zamietne status kontrolóra.',
	'makevalidate-username'         => 'Meno používateľa:',
	'makevalidate-search'           => 'Choď',
	'makevalidate-iseditor'         => '[[User:$1|$1]] má status redaktora.',
	'makevalidate-noteditor'        => '[[User:$1|$1]] nemá status redaktora.',
	'makevalidate-isvalidator'      => '[[User:$1|$1]] má status kontrolóra.',
	'makevalidate-notvalidator'     => '[[User:$1|$1]] nemá status kontrolóra.',
	'makevalidate-legend'           => 'Zmeniť práva používateľa:',
	'makevalidate-change-e'         => 'Status redaktora:',
	'makevalidate-change-r'         => 'Status kontrolóra:',
	'makevalidate-grant1'           => 'Udeliť',
	'makevalidate-revoke1'          => 'Odobrať',
	'makevalidate-grant2'           => 'Udeliť',
	'makevalidate-revoke2'          => 'Odobrať',
	'makevalidate-comment'          => 'Komentár:',
	'makevalidate-granted-e'        => '[[User:$1|$1]] má teraz status redaktora.',
	'makevalidate-revoked-e'        => '[[User:$1|$1]] odteraz nemá status redaktora.',
	'makevalidate-granted-r'        => '[[User:$1|$1]] má teraz status kontrolóra.',
	'makevalidate-revoked-r'        => '[[User:$1|$1]] odteraz nemá status kontrolóra.',
	'makevalidate-logpage'          => 'Záznam stavu redaktorov',
	'makevalidate-logpagetext'      => 'Toto je záznam zmien stausu používateľov pre [[Help:Revízia článkov|kontrolu článkov]].',
	'makevalidate-logentrygrant-e'  => '[[User:$1|$1]] odteraz má status redaktor.',
	'makevalidate-logentryrevoke-e' => '[[User:$1|$1]] odteraz nemá status redaktor.',
	'makevalidate-logentrygrant-r'  => '[[User:$1|$1]] odteraz má status kontrolór.',
	'makevalidate-logentryrevoke-r' => '[[User:$1|$1]] odteraz nemá status kontrolór.',
	'makevalidate-autosum'          => 'samopovýšenie',
	'rights-editor-grant'           => '[[User:$1|$1]] odteraz má status redaktor.',
	'rights-editor-revoke'          => '[[User:$1|$1]] odteraz nemá status redaktor.',
);

return $messages;
}


