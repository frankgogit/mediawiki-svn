<?php

/**
 * Internationalization file for the Push extension.
 *
 * @file Push.i18n.php
 * @ingroup Push
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'push-desc' => 'Lightweight extension to push content to other wikis',

	'right-push' => 'Authorization to use push functionality.',
	'right-bulkpush' => 'Authorization to use bulk push functionality (ie Special:Push).',
	'right-pushadmin' => 'Authorization to modify push targets and push settings.',

	'push-err-captacha' => 'Could not push to $1 due to captcha.',
	'push-err-captcha-page' => 'Could not push page $1 to all targets due to CAPTCHA.',
	'push-err-authentication' => 'Authentication at $1 failed. $2',

	// Tab
	'push-tab-text' => 'Push',
	'push-button-text' => 'Push',
	'push-tab-desc' => 'This tab allows you to push the current revision of this page to one or more other wikis.',
	'push-button-pushing' => 'Pushing',
	'push-button-pushing-files' => 'Pushing files',
	'push-button-completed' => 'Push completed',
	'push-button-failed' => 'Push failed',
	'push-tab-title' => 'Push $1',
	'push-targets' => 'Push targets',
	'push-add-target' => 'Add target',
	'push-import-revision-message' => 'Pushed from $1.',
	'push-tab-no-targets' => 'There are no targets to push to. Please add some to your LocalSettings.php file.',
	'push-tab-push-to' => 'Push to $1',
	'push-remote-pages' => 'Remote pages',
	'push-remote-page-link' => '$1 on $2',
	'push-remote-page-link-full' => 'View $1 on $2',
	'push-targets-total' => 'There are a total of $1 {{PLURAL:$1|target|targets}}.',
	'push-button-all' => 'Push all',
	'push-tab-last-edit' => 'Last edit by $1 on $2 at $3.',
	'push-tab-not-created' => 'This page does not exist yet.',
	'push-tab-push-options' => 'Push options:',
	'push-tab-inc-templates' => 'Include templates',
	'push-tab-used-templates' => '(Used {{PLURAL:$2|template|templates}}: $1)',
	'push-tab-no-used-templates' => '(No templates are used on this page.)',
	'push-tab-inc-files' => 'Include embedded files',
	'push-tab-err-fileinfo' => 'Could not obtain which files are used on this page. None have been pushed.',
	'push-tab-err-filepush-unknown' => 'File push failed for an unknown reason.', 
	'push-tab-err-filepush' => 'File push failed: $1',	
	'push-tab-embedded-files' => 'Embedded files:',
	'push-tab-no-embedded-files' => '(No files are embedded in this page.)',
	'push-tab-files-override' => 'These files already exist: $1',
	'push-tab-template-override' => 'These templates already exist: $1',
	'push-tab-err-uploaddisabled' => 'Uploads are not enabled. Make sure $wgEnableUploads and $wgAllowCopyUploads are set to true in LocalSettings.php of the target wiki.',

	// Special page
	'special-push' => 'Push pages',
	'push-special-description' => 'This page enables you to push content of one or more pages to one or more MediaWiki wikis.

To push pages, enter the titles in the text box below, one title per line and hit push all. This can take a while to complete.',
	'push-special-pushing-desc' => 'Pushing $2 {{PLURAL:$2|page|pages}} to $1...',
	'push-special-button-text' => 'Push pages',
	'push-special-target-is' => 'Target wiki: $1',
	'push-special-select-targets' => 'Target wikis:',
	'push-special-item-pushing' => '$1: Pushing',
	'push-special-item-completed' => '$1: Push completed',
	'push-special-item-failed' => '$1: Push failed: $2',
	'push-special-push-done' => 'Push completed',
	'push-special-err-token-failed' => 'Could not obtain an edit token on the target wiki.',
	'push-special-err-pageget-failed' => 'Could not obtain local page content.',
	'push-special-err-push-failed' => 'Target wiki refused the pushed page.',
	'push-special-inc-files' => 'Include embedded files',
	'push-special-err-imginfo-failed' => 'Could not determine if any files needed to be pushed.',
	'push-special-obtaining-fileinfo' => '$1: Obtaining file information...',
	'push-special-pushing-file' => '$1: Pushing file $2...',
	'push-special-return' => 'Push more pages',

	// API
	'push-api-err-nocurl' => 'cURL is not installed.
Set $egPushDirectFileUploads to false on public wikis, or install cURL for private wikis',
	'push-api-err-nofilesupport' => 'The local MediaWiki does not have support for posting files.
On public wikis, set $egPushDirectFileUploads to false.
On private wikis, apply the patch linkd from the Push documentation or update MediaWiki itself.',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Jeroen De Dauw
 * @author Nike
 * @author Purodha
 * @author Raymond
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'push-desc' => '{{desc}}',
	'right-push' => '{{doc-right|push}}',
	'right-bulkpush' => '{{doc-right|bulkpush}}',
	'right-pushadmin' => '{{doc-right|pushadmin}}',
	'push-err-authentication' => '$1: wiki name, $2: optional detailed error message',
	'push-remote-page-link' => '$1: page name, $2: wiki name',
	'push-remote-page-link-full' => '$1: page name, $2: wiki name',
	'push-tab-embedded-files' => '{{Identical|Embedded file}}',
	'push-tab-files-override' => 'JavaScript message, no PLURAL available',
	'push-tab-template-override' => 'JavaScript message, no PLURAL available',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'push-desc' => 'Невялікае пашырэньне для распаўсюджваньня зьместу ў іншыя вікі',
	'right-push' => 'выкарыстаньне распаўсюджваньня',
	'right-bulkpush' => 'выкарыстаньне групавога распаўсюджваньня',
	'right-pushadmin' => 'зьмена мэтаў і наладаў распаўсюджваньня',
	'push-err-captacha' => 'Немагчыма распаўсюдзіць у $1 з-за captcha.',
	'push-err-captcha-page' => 'Немагчыма распаўсюдзіць старонку $1 на ўсе мэты з-за captcha.',
	'push-err-authentication' => 'Немагчыма аўтэнтыфікаваць на $1. $2',
	'push-tab-text' => 'Распаўсюдзіць',
	'push-button-text' => 'Распаўсюдзіць',
	'push-tab-desc' => 'Гэтая закладка дазваляе Вам распаўсюджваць цяперашнюю вэрсію гэтай старонкі ў іншыя вікі.',
	'push-button-pushing' => 'Распаўсюджваньне',
	'push-button-pushing-files' => 'Распаўсюдзіць файлы',
	'push-button-completed' => 'Распаўсюджваньне скончанае',
	'push-button-failed' => 'Памылка распаўсюджваньня',
	'push-tab-title' => 'Распаўсюдзіць $1',
	'push-targets' => 'Мэты распаўсюджваньня',
	'push-add-target' => 'Дадаць мэту',
	'push-import-revision-message' => 'Распаўсюджаная з $1.',
	'push-tab-no-targets' => 'Няма мэтаў для распаўсюджаньня. Калі ласка, дадайце некаторыя ў Ваш файл LocalSettings.php.',
	'push-tab-push-to' => 'Распаўсюдзіць у $1',
	'push-remote-pages' => 'Аддаленыя старонкі',
	'push-remote-page-link' => '$1 на $2',
	'push-remote-page-link-full' => 'Паказаць $1 на $2',
	'push-targets-total' => 'Усяго $1 {{PLURAL:$1|мэта|мэты|мэтаў}}.',
	'push-button-all' => 'Распаўсюдзіць усе',
	'push-tab-last-edit' => 'Апошні раз рэдагавалася $1 $2 у $3.',
	'push-tab-not-created' => 'Гэтая старонка пакуль не існуе.',
	'push-tab-push-options' => 'Налады распаўсюджваньня:',
	'push-tab-inc-templates' => 'Уключыць шаблёны',
	'push-tab-used-templates' => '({{PLURAL:$2|Выкарыстаны шаблён|Выкарыстаныя шаблёны}}: $1)',
	'push-tab-no-used-templates' => '(На гэтай старонцы не выкарыстоўваюцца шаблёны.)',
	'push-tab-inc-files' => 'Уключыць убудаваныя файлы',
	'push-tab-err-fileinfo' => 'Немагчыма выявіць, якія файлы выкарыстоўваюцца на гэтай старонцы. Ні адзін ня быў распаўсюджаны.',
	'push-tab-err-filepush-unknown' => 'Немагчыма распаўсюдзіць файлы па невядомай прычыне.',
	'push-tab-err-filepush' => 'Немагчыма распаўсюдзіць файлы: $1',
	'push-tab-embedded-files' => 'Укладзеныя файлы:',
	'push-tab-no-embedded-files' => '(На гэтай старонцы няма укладзеных файлаў.)',
	'push-tab-files-override' => 'Гэтыя файлы ўжо існуюць: $1',
	'push-tab-template-override' => 'Гэтыя шаблёны ўжо існуюць: $1',
	'push-tab-err-uploaddisabled' => 'Загрузкі не дазволеныя. Упэўніцеся, што парамэтры $wgEnableUploads і $wgAllowCopyUploads маюць значэньне «true» у LocalSettings.php мэтавай вікі.',
	'special-push' => 'Распаўсюдзіць старонкі',
	'push-special-description' => 'Гэтая старонка дазваляе Вам распаўсюджваць зьмест адной ці болей старонак на адну ці некалькі іншых вікі, якія выкарыстоўваюць MediaWiki.

Для распаўсюджваньня старонак, увядзіце назвы ў тэкставым полі ніжэй, адну назву ў радок і націсьніце распаўсюдзіць усе. Гэта можа заняць некаторы час для выкананьня.',
	'push-special-pushing-desc' => 'Распаўсюджваньне $2 {{PLURAL:$2|старонкі|старонак|старонак}} у $1…',
	'push-special-button-text' => 'Распаўсюдзіць старонкі',
	'push-special-target-is' => 'Мэтавая вікі: $1',
	'push-special-select-targets' => 'Мэтавыя вікі:',
	'push-special-item-pushing' => '$1: Распаўсюджваньне',
	'push-special-item-completed' => '$1: Распаўсюджваньне скончанае',
	'push-special-item-failed' => '$1: Памылка распаўсюджваньня: $2',
	'push-special-push-done' => 'Распаўсюджваньне скончанае',
	'push-special-err-token-failed' => 'Немагчыма атрымаць ключ рэдагаваньня ў мэтавай вікі.',
	'push-special-err-pageget-failed' => 'Немагчыма атрымаць зьмест лякальнай старонкі.',
	'push-special-err-push-failed' => 'Мэтавая вікі адмовілася распаўсюджваць старонку.',
	'push-special-inc-files' => 'Уключыць убудаваныя файлы',
	'push-special-err-imginfo-failed' => 'Немагчыма вызначыць ці ёсьць файлы, якія патрабуюць распаўсюджваньня.',
	'push-special-obtaining-fileinfo' => '$1: Атрыманьне інфармацыі пра файл…',
	'push-special-pushing-file' => '$1: Распаўсюджваньне файла $2…',
	'push-special-return' => 'Распаўсюдзіць болей старонак',
	'push-api-err-nocurl' => 'cURL не ўсталяваны.
Устанавіце парамэтар $egPushDirectFileUploads у false ў публічнай вікі, ці ўсталюйце cURL на прыватнай вікі.',
	'push-api-err-nofilesupport' => 'Лякальная MediaWiki не падтрымлівае адпраўку файлаў.
Для публічных вікі ўстанавіце парамэтар $egPushDirectFileUploads у значэньне false.
У прыватных вікі трэба ўжыць выпраўленьне linkd з дакумэнтацыі Push, ці наўпрост абнавіць MediaWiki.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'push-add-target' => 'Добавяне на цел',
	'push-remote-pages' => 'Отдалечени страници',
	'push-tab-last-edit' => 'Последна редакция от $1 на $2 в $3.',
	'push-tab-not-created' => 'Тази страница все още не съществува.',
	'push-tab-inc-templates' => 'Включване на шаблоните',
	'push-tab-used-templates' => '({{PLURAL:$2|Използван шаблон|Използвани шаблони}}: $1)',
	'push-tab-no-used-templates' => '(На тази страница не са използвани шаблони.)',
	'push-tab-inc-files' => 'Включване на вградените файлове',
	'push-tab-no-embedded-files' => '(В тази страница не са включени файлове.)',
	'push-tab-files-override' => 'Следните файлове вече съществуват: $1',
	'push-tab-template-override' => 'Следните шаблони вече съществуват: $1',
	'push-special-target-is' => 'Целево уики: $1',
	'push-special-select-targets' => 'Целеви уикита:',
	'push-special-err-pageget-failed' => 'Не може да се извлече съдържанието на локалната страница.',
	'push-special-obtaining-fileinfo' => '$1: Получаване на информация за файла...',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'push-tab-text' => 'Bountañ',
	'push-button-text' => 'Bountañ',
	'push-remote-pages' => 'Pajennoù a-bell',
	'push-remote-page-link' => '$1 war $2',
	'push-remote-page-link-full' => 'Gwelet $1 war $2',
	'push-tab-not-created' => "N'eus ket eus ar bajenn-se c'hoazh.",
	'push-tab-inc-templates' => 'Lakaat ar patromoù e-barzh ivez',
	'push-tab-used-templates' => '({{PLURAL:$2|patrom|patromoù}}implijet : $1)',
	'push-tab-embedded-files' => 'Restr enframmet :',
	'push-tab-files-override' => 'Bez ez eus eus ar restroù-mañ dija : $1',
	'push-tab-template-override' => 'Bez ez eus eus ar patromoù-mañ dija : $1',
	'special-push' => 'Pajennoù da vountañ',
	'push-special-return' => "Bountañ muioc'h a bajennoù",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'push-err-authentication' => 'Autentificiranje na $1 nije uspjelo. $2',
	'push-tab-text' => 'Postavi',
	'push-button-text' => 'Postavi',
	'push-tab-desc' => 'Ovaj jezičak omogućava vam da postavite trenutno reviziju ove stranice na jednu ili više drugih wikija.',
	'push-targets' => 'Postavi ciljeve',
	'push-add-target' => 'Dodaj cilj',
	'push-remote-page-link' => '$1 na $2',
	'push-tab-inc-files' => 'Uključi umetnute datoteke',
	'push-tab-embedded-files' => 'Umetnute datoteke:',
	'push-special-target-is' => 'Ciljna wiki: $1',
	'push-special-select-targets' => 'Ciljne wiki:',
	'push-special-item-pushing' => '$1: Premještanje',
	'push-special-item-completed' => '$1: Premještanje završeno',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'push-desc' => 'Ermöglicht den einfachen Transfer von Inhalten eines Wikis in ein anderes',
	'right-push' => 'Seiten in andere Wikis transferieren',
	'right-bulkpush' => 'Seiten gesammelt in andere Wikis transferieren',
	'right-pushadmin' => 'Transfereinstellungen und -ziele ändern',
	'push-err-captacha' => 'Transfer nach $1 aufgrund eines CAPTCHAs nicht möglich.',
	'push-err-captcha-page' => 'Seite $1 konnte aufgrund von CAPTCHAs zu keinem der Ziele transferiert werden.',
	'push-err-authentication' => 'Authentifizierung auf $1 ist fehlgeschlagen. $2',
	'push-tab-text' => 'Transferieren',
	'push-button-text' => 'Transferieren',
	'push-tab-desc' => 'Dieser Reiter ermöglicht den Transfer des aktuellen Seiteninhalts in ein oder mehrere andere Wikis.',
	'push-button-pushing' => 'Transferiere',
	'push-button-pushing-files' => 'Transferiere Dateien',
	'push-button-completed' => 'Transfer abgeschlossen',
	'push-button-failed' => 'Transfer fehlgeschlagen',
	'push-tab-title' => 'Transferiere $1',
	'push-targets' => 'Transferziele',
	'push-add-target' => 'Transferziel hinzufügen',
	'push-import-revision-message' => 'Aus $1 transferiert.',
	'push-tab-no-targets' => 'Es sind keine Transferziele vorhanden. Es müssen welche in der Datei LocalSettings.php definiert werden.',
	'push-tab-push-to' => 'Transferiere nach $1',
	'push-remote-pages' => 'Entfernte Seiten',
	'push-remote-page-link' => 'Seite $1 auf Wiki $2',
	'push-remote-page-link-full' => 'Seite $1 auf Wiki $2 ansehen',
	'push-targets-total' => 'Es {{PLURAL:$1|ist|sind}} insgesamt $1 {{PLURAL:$1|Transferziel|Transferziele}} vorhanden.',
	'push-button-all' => 'Alle transferieren',
	'push-tab-last-edit' => 'Letzte Bearbeitung durch Benutzer $1 am $2 um $3 Uhr.',
	'push-tab-not-created' => 'Diese Seite ist nicht vorhanden.',
	'push-tab-push-options' => 'Transferoptionen:',
	'push-tab-inc-templates' => 'Vorlagen einbeziehen',
	'push-tab-used-templates' => '({{PLURAL:$2|Vorlage|Vorlagen}} eingesetzt: $1)',
	'push-tab-no-used-templates' => '(Auf dieser Seite werden keine Vorlagen eingesetzt.)',
	'push-tab-inc-files' => 'Eingebettete Dateien einbeziehen',
	'push-tab-err-fileinfo' => 'Es konnte nicht ermittelt werden, welche Dateien auf dieser Seite eingebunden sind. Es wurde keine transferiert.',
	'push-tab-err-filepush-unknown' => 'Dateitransfer ist aus unbekanntem Grund fehlgeschlagen.',
	'push-tab-err-filepush' => 'Dateitransfer fehlgeschlagen: $1',
	'push-tab-embedded-files' => 'Eingebettete Dateien:',
	'push-tab-no-embedded-files' => '(Auf dieser Seite gibt es keine eingebetteten Dateien.)',
	'push-tab-files-override' => 'Diese Dateien sind bereits vorhanden: $1',
	'push-tab-template-override' => 'Diese Vorlagen sind bereits vorhanden: $1',
	'push-tab-err-uploaddisabled' => 'Das Hochladen von Dateien ist nicht möglich. Die Parameter $wgEnableUploads und $wgAllowCopyUploads müssen in der Datei LocalSettings.php des Zielwikis auf „true“ gesetzt werden.',
	'special-push' => 'Seiten transferieren',
	'push-special-description' => 'Diese Spezialseite ermöglicht es den Inhalt einer oder mehrerer Seiten zu einem oder mehreren anderen Wikis zu transferieren.

Um Seiten zu transferieren, sind deren Titel im Eingabefeld unten anzugeben (ein Titel pro Zeile). Klicke danach auf „{{int:push-special-button-text}}“. Es kann etwas dauern, bis der Transfer abgeschlossen ist.',
	'push-special-pushing-desc' => 'Transferiere $2 {{PLURAL:$2|Seite|Seiten}} nach $1 …',
	'push-special-button-text' => 'Seiten transferieren',
	'push-special-target-is' => 'Zielwiki: $1',
	'push-special-select-targets' => 'Zielwikis:',
	'push-special-item-pushing' => '$1: Transferiere …',
	'push-special-item-completed' => '$1: Transfer abgeschlossen',
	'push-special-item-failed' => '$1: Transfer fehlgeschlagen. $2',
	'push-special-push-done' => 'Transfer abgeschlossen',
	'push-special-err-token-failed' => 'Auf dem Zielwiki konnte der Bearbeitungstoken nicht abgerufen werden.',
	'push-special-err-pageget-failed' => 'Auf diesem Wiki konnte der Seiteninhalt nicht abgerufen werden.',
	'push-special-err-push-failed' => 'Das Zielwiki hat die zu transferierende Seite zurückgewiesen.',
	'push-special-inc-files' => 'Eingebettete Dateien einbeziehen',
	'push-special-err-imginfo-failed' => 'Es konnte nicht ermittelt werden, ob auch Dateien transferiert werden müssen.',
	'push-special-obtaining-fileinfo' => '$1: Dateiinformationen werden abrufen …',
	'push-special-pushing-file' => '$1: Transferiere Datei $2 …',
	'push-special-return' => 'Weitere Seiten transferieren',
	'push-api-err-nocurl' => 'cURL ist nicht installiert.
Der Parameter $egPushDirectFileUploads muss daher für alle öffentlichen Wikis auf false gesetzt werden. Alternativ cURL für alle nichtöffentlichen Wikis installieren.',
	'push-api-err-nofilesupport' => 'Die lokale MediaWiki-Installation unterstützt nicht das Hochladen von Dateien.
Auf öffentlichen Wikis muss der Parameter $egPushDirectFileUploads auf false gesetzt werden.
Auf nichtöffentlichen Wikis muss der über die Dokumentationsseite zu dieser Softwareerweiterung erhältliche Patch angewendet oder die MediaWiki-Installation selbst aktualisiert werden.',
);

/** Finnish (Suomi)
 * @author Tofu II
 */
$messages['fi'] = array(
	'push-add-target' => 'Lisää kohde',
);

/** French (Français)
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'push-desc' => "Extension peu gourmande servant à pousser (''push'' en anglais) du contenu vers d'autres wikis",
	'right-push' => "Autorisation d'utiliser les fonctionnalités de ''Push''.",
	'right-bulkpush' => "Autorisation d'utiliser les fonctionnalités de ''Push'' en vrac (c'est-à-dire ''Special:Push'').",
	'right-pushadmin' => "Autorisation de modifier les cibles et les paramètres de ''Push''.",
	'push-err-captacha' => "Impossible de pousser vers $1 en raison d'un CAPTCHA.",
	'push-err-captcha-page' => 'Impossible de pousser la page $1 vers toutes les cibles en raison de CAPTCHA.',
	'push-err-authentication' => "Échec de l'authentification à $1. $2",
	'push-tab-text' => 'Pousser',
	'push-button-text' => 'Pousser',
	'push-tab-desc' => 'Cet onglet vous permet de pousser la révision actuelle de cette page vers un ou plusieurs autres wikis.',
	'push-button-pushing' => 'Poussée',
	'push-button-pushing-files' => 'Poussée des fichiers',
	'push-button-completed' => 'Poussée terminée',
	'push-button-failed' => 'Poussée échouée',
	'push-tab-title' => 'Pousser $1',
	'push-targets' => 'Cibles pour la poussée',
	'push-add-target' => "Ajout d'une cible",
	'push-import-revision-message' => 'Poussé depuis $1.',
	'push-tab-no-targets' => "Il n'y a pas de cible à pousser. S'il vous plaît ajoutez-en à votre fichier LocalSettings.php.",
	'push-tab-push-to' => 'Poussez vers $1',
	'push-remote-pages' => 'pages à distance',
	'push-remote-page-link' => '$1 sur $2',
	'push-remote-page-link-full' => 'Voir $1 sur $2',
	'push-targets-total' => 'Il ya un total de $1 {{PLURAL:$1|cible|cibles}}.',
	'push-button-all' => 'Pousser tout',
	'push-tab-last-edit' => 'Dernière modification par $1 sur $2 à $3.',
	'push-tab-not-created' => "Cette page n'existe pas encore.",
	'push-tab-push-options' => 'Paramètres de poussée:',
	'push-tab-inc-templates' => 'Inclure les modèles',
	'push-tab-used-templates' => '({{PLURAL:$2|modèle utilisé|modèles utilisés}}: $1)',
	'push-tab-no-used-templates' => '(Pas de modèle utilisé sur cette page.)',
	'push-tab-inc-files' => 'Inclure des fichiers joints',
	'push-tab-err-fileinfo' => "Pas pu obtenir quels fichiers sont utilisés sur cette page. Aucun n'été poussé.",
	'push-tab-err-filepush-unknown' => 'La poussée du fichier a échoué pour une raison inconnue.',
	'push-tab-err-filepush' => 'La poussée du fichier a échoué: $1',
	'push-tab-embedded-files' => 'Fichiers joints:',
	'push-tab-no-embedded-files' => '(Aucun fichier joint dans cette page.)',
	'push-tab-files-override' => 'Ces fichiers existent déjà: $1',
	'push-tab-template-override' => 'Ces modèles existent déjà: $1',
	'push-tab-err-uploaddisabled' => "Les téléchargements ne sont pas activés. Assurez-vous que \$wgEnableUploads et \$wgAllowCopyUploads sont mis à ''true'' dans le fichier LocalSettings.php du wiki cible.",
	'special-push' => 'Pages à pousser',
	'push-special-description' => "Cette page permet de pousser (''push'' en anglais) le contenu d'une ou plusieurs pages vers un ou plusieurs wikis de MediaWiki.

Pour pousser les pages, entrez les titres dans la zone de texte ci-dessous, un titre par ligne et cliquez sur ''Pousser tout''. Cela peut prendre un certain temps pour se terminer.",
	'push-special-pushing-desc' => 'Poussée de $2 {{PLURAL:$2|page|pages}} vers $1...',
	'push-special-button-text' => 'Pages à pousser',
	'push-special-target-is' => 'wiki cible: $1',
	'push-special-select-targets' => 'wikis cible:',
	'push-special-item-pushing' => '$1: poussée en cours',
	'push-special-item-completed' => '$1: Poussée terminée',
	'push-special-item-failed' => '$1: la poussée a échoué: $2',
	'push-special-push-done' => 'Poussée terminée',
	'push-special-err-token-failed' => "Pas pu obtenir un jeton d'édition sur le wiki cible.",
	'push-special-err-pageget-failed' => 'Pas pu obtenir le contenu de la page locale.',
	'push-special-err-push-failed' => 'Le wiki cible a refusé la page poussée.',
	'push-special-inc-files' => 'Inclure des fichiers joints',
	'push-special-err-imginfo-failed' => 'Impossible de déterminer si un fichier doit être poussé.',
	'push-special-obtaining-fileinfo' => "$1: Obtention d'informations sur le fichier...",
	'push-special-pushing-file' => '$1: pousser le fichier $2...',
	'push-special-return' => 'Pousser plus de pages',
	'push-api-err-nocurl' => 'cURL n\'est pas installé.
Mettre $​​egPushDirectFileUploads à <code>false</code> pour des wikis publics, ou installer cURL pour les wikis privés',
	'push-api-err-nofilesupport' => "Le MediaWiki local ne supporte pas le téléchargement de fichiers. 
Sur les wikis publics, mettre \$egPushDirectFileUploads à <code>false</code>.
Sur les wikis privés, appliquer le patch <code>linkd</code> tel qu'expliqué dans la documentation de ''Push'' ou mettre à jour MediaWiki.",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'push-desc' => 'Extensión lixeira para empurrar contidos ata outros wikis',
	'push-tab-text' => 'Empurrar',
	'push-button-text' => 'Empurrar',
	'push-button-pushing' => 'Empurrando',
	'push-button-pushing-files' => 'Empurrando os ficheiros',
	'push-button-completed' => 'Empuxe completado',
	'push-button-failed' => 'Erro no empuxe',
	'push-tab-title' => 'Empurrar "$1"',
	'push-targets' => 'Destinos para o empuxe',
	'push-add-target' => 'Engadir un destino',
	'push-import-revision-message' => 'Empurrado desde $1.',
	'push-tab-push-to' => 'Empurrar a $1',
	'push-remote-pages' => 'Páxinas remotas',
	'push-remote-page-link' => '"$1" en $2',
	'push-remote-page-link-full' => 'Ollar "$1" en $2',
	'push-button-all' => 'Empurrar todas',
	'push-tab-last-edit' => 'Última edición feita por $1 o $2 ás $3.',
	'push-tab-not-created' => 'Esta páxina aínda non existe.',
	'push-tab-push-options' => 'Opcións de empuxe:',
	'push-tab-inc-templates' => 'Incluír os modelos',
	'push-tab-used-templates' => '({{PLURAL:$2|Modelo empregado|Modelos empregados}}: $1)',
	'push-tab-no-used-templates' => '(Nesta páxina non se empregan modelos.)',
	'push-tab-inc-files' => 'Incluír ficheiros',
	'push-tab-embedded-files' => 'Ficheiros embelecidos:',
	'push-special-pushing-desc' => 'Empurrando $2 {{PLURAL:$2|páxina|páxinas}} a $1...',
	'push-special-button-text' => 'Empurrar as páxinas',
	'push-special-target-is' => 'Wiki de destino: $1',
	'push-special-select-targets' => 'Wikis de destino:',
	'push-special-item-pushing' => '$1: Empurrando',
	'push-special-item-completed' => '$1: Empuxe completado',
	'push-special-item-failed' => '$1: Erro no empuxe: $2',
	'push-special-push-done' => 'Empuxe completado',
	'push-special-obtaining-fileinfo' => '$1: Obtendo a información do ficheiro...',
	'push-special-pushing-file' => '$1: Empurrando o ficheiro "$2"...',
	'push-special-return' => 'Empurrar máis páxinas',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'push-desc' => 'Macht dr eifach Transfer vu Inhalt vun eme Wiki in e anders megli',
	'right-push' => 'Syten in anderi Wiki transferiere',
	'right-bulkpush' => 'Syte gsammlet in anderi Wiki transferiere',
	'right-pushadmin' => 'Transferyystellige un -ziil ändere',
	'push-err-captacha' => 'Transfer no $1 wäg eme CAPTCHA nit megli.',
	'push-err-captcha-page' => 'Syte $1 het wäge CAPTCHA zue keim vu dr Ziil chenne transferiert wäre.',
	'push-err-authentication' => 'Authentifizierig uf $1 isch fählgschlaa. $2',
	'push-tab-text' => 'Transferiere',
	'push-button-text' => 'Transferiere',
	'push-tab-desc' => 'Dää Ryter macht dr Transfer vum aktuälle Syteninhalt in ei oder mehreri  anderi Wiki megli.',
	'push-button-pushing' => 'Am Transferiere',
	'push-button-pushing-files' => 'Am Transferiere vu Dateie',
	'push-button-completed' => 'Transfer fertig',
	'push-button-failed' => 'Transfer fählgschlaa',
	'push-tab-title' => '$1 transferiere',
	'push-targets' => 'Transferziil',
	'push-add-target' => 'Transferziil zuefiege',
	'push-import-revision-message' => 'Us $1 transferiert.',
	'push-tab-no-targets' => 'S het no kei Transferziil. Tue zerscht e baar in dr Datei LocalSettings.php definiere.',
	'push-tab-push-to' => 'No $1 transferiere',
	'push-remote-pages' => 'Syten uuseneh',
	'push-remote-page-link' => '$1 uf $2',
	'push-remote-page-link-full' => '$1 uf $2 aaluege',
	'push-targets-total' => 'S git insgsamt $1 {{PLURAL:$1|Transferziil|Transferziil}}.',
	'push-button-all' => 'Alli transferiere',
	'push-tab-last-edit' => 'Letschti Bearbeitig dur dr Benutzer $1 am $2 am $3.',
	'push-tab-not-created' => 'Die Syte git s nit!',
	'push-tab-push-options' => 'Transferoptione:',
	'push-tab-inc-templates' => 'Vorlage mit yybinde',
	'push-tab-used-templates' => '({{PLURAL:$2|Vorlag|Vorlage}} yygsetzt: $1)',
	'push-tab-no-used-templates' => '(Uf däre Syte wäre kei Vorlagen yygsetzt.)',
	'push-tab-inc-files' => 'Yybetteti Dateie mit yybinde',
	'push-tab-err-fileinfo' => 'S het nit chenne ermittlet wäre, weli Dateien uf däre Syten yybunde sin. S sin keini transferiert wore.',
	'push-tab-err-filepush-unknown' => 'Dateitransfer isch us eme nit bekannte Grund fählgschlaa.',
	'push-tab-err-filepush' => 'Dateitransfer fählgschlaa: $1',
	'push-tab-embedded-files' => 'Yybetteti Dateie:',
	'push-tab-no-embedded-files' => '(Uf däre Syte git s kei yybetteti Dateie.)',
	'push-tab-files-override' => 'Die Dateie git s scho: $1',
	'push-tab-template-override' => 'Die Vorlage git s scho: $1',
	'push-tab-err-uploaddisabled' => 'S Uffelade vu Dateien isch nit megli. D Parameter $wgEnableUploads un $wgAllowCopyUploads mien in dr Datei LocalSettings.php vum Ziilwiki uf „true“ gsetzt wäre.',
	'special-push' => 'Syte transferiere',
	'push-special-description' => 'Die Spezialsyte macht s megli dr Inhalt vu eire oder mehrere Syte zue eim oder mehrere andere Wikis z transferiere.

Go Syte transferiere sin d Titel vun ene im Yygabefäld unten aazgee (ei Titel pro Zyyle). Klick derno uf „{{int:push-special-button-text}}“. S cha ne Wyyli goh, bis dr Transfer abgschlossen isch.',
	'push-special-pushing-desc' => 'Am Transferiere vu $2 {{PLURAL:$2|Syte|Syte}} no $1 …',
	'push-special-button-text' => 'Syte transferiere',
	'push-special-target-is' => 'Ziilwiki: $1',
	'push-special-select-targets' => 'Ziilwiki:',
	'push-special-item-pushing' => '$1: Am Transferiere …',
	'push-special-item-completed' => '$1: Transfer abgschlosse',
	'push-special-item-failed' => '$1: Transfer fählgschlaa. $2',
	'push-special-push-done' => 'Transfer abgschlosse',
	'push-special-err-token-failed' => 'Uf em Ziilwiki het dr Bearbeitigs-Token nit chenne abgruefe wäre.',
	'push-special-err-pageget-failed' => 'Uf däm Wiki het dr Syteninhalt nit chenne abgruefe wäre.',
	'push-special-err-push-failed' => 'S Ziilwiki het d Syte, wu soll tranferiert wäre, zruckgwise.',
	'push-special-inc-files' => 'Yybetteti Dateie mit yybinde',
	'push-special-err-imginfo-failed' => 'S het nit chenne ermittlet wäre, eb au Dateie mien transferiert wäre.',
	'push-special-obtaining-fileinfo' => '$1: Am Abruefe vu Dateiinformatione …',
	'push-special-pushing-file' => '$1: Am Transferiere vu dr Datei $2 …',
	'push-special-return' => 'Meh Syte transferiere',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'push-desc' => 'הרחבה קלילה לדחיפת תוכן לאתרי ויקי אחרים',
	'right-push' => 'לאשר שימוש בפעולת הדחיפה.',
	'right-bulkpush' => 'לאשר שימוש בדחיפת דפים מרובים (למשל Special:Push)',
	'right-pushadmin' => 'לאשר לשנות יעדי דחיפה ותצורת דחיפה.',
	'push-err-captacha' => 'דחיפה ל{{GRAMMAR:תחילית|$1}} לא הצליחה בכלל CAPTCHA',
	'push-err-captcha-page' => 'דחיפת הדף $1 לכל היעדים לא התאפשרה בגלל CAPTCHA.',
	'push-err-authentication' => 'אימות ב{{GRAMMAR:תחילית|$1}} נכשל. $2',
	'push-tab-text' => 'דחיפה',
	'push-button-text' => 'דחיפה',
	'push-tab-desc' => 'הלשונית הזאת מאפשרת לך לדחוף את הגרסה הנוכחית של הדף לאתר ויקי אחד או יותר.',
	'push-button-pushing' => 'דחיפה',
	'push-button-pushing-files' => 'דחיפת קבצים',
	'push-button-completed' => 'הדחיפה הושלמה',
	'push-button-failed' => 'הדחיפה נכשלה',
	'push-tab-title' => 'לדחוף את $1',
	'push-targets' => 'יעדי דחיפה',
	'push-add-target' => 'הוספת יעד',
	'push-import-revision-message' => 'נדחף מ{{GRAMMAR:תחילית|$1}}',
	'push-tab-no-targets' => 'אין יעדים לדחיפה. אנא הוסיפו כמה יעדים לקובץ LocalSettings.php שלכם.',
	'push-tab-push-to' => 'לדחוף ל{{GRAMMAR:תחילית|$1}}',
	'push-remote-pages' => 'דפים מרוחקים',
	'push-remote-page-link' => '$1 באתר $2',
	'push-remote-page-link-full' => 'להציג $1 באתר $2',
	'push-targets-total' => 'יש {{PLURAL:$1|יעד אחד|$1 יעדים}} בסך הכול.',
	'push-button-all' => 'לדחוף הכול',
	'push-tab-last-edit' => 'עריכה אחרונה מאת $1 באתר $2 ב־$3.',
	'push-tab-not-created' => 'הדף הזה עדיין לא קיים.',
	'push-tab-push-options' => 'אפשרויות דחיפה:',
	'push-tab-inc-templates' => 'לכלול תבניות',
	'push-tab-used-templates' => '(נעשה שימוש ב{{PLURAL:$2|תבנית|תבניות}}: $1)',
	'push-tab-no-used-templates' => '(אין שימוש בתבניות בדף הזה.)',
	'push-tab-inc-files' => 'לכלול קבצים מוטבעים',
	'push-tab-err-fileinfo' => 'לא ברור באילו קבצים משתמש הדף. לא נדחף שום קובץ.',
	'push-tab-err-filepush-unknown' => 'דחיפת קובץ נכשלה מסיבה לא ידועה.',
	'push-tab-err-filepush' => 'דחיפת קובץ נכשלה: $1',
	'push-tab-embedded-files' => 'קבצים מוטבעים:',
	'push-tab-no-embedded-files' => '(אין קבצים מוטבעים בדף הזה.)',
	'push-tab-files-override' => 'הקבצים האלה כבר קיימים: $1',
	'push-tab-template-override' => 'התבניות האלו כבר קיימות: $1',
	'push-tab-err-uploaddisabled' => 'העלאות אינן מופעלות. יש לוודא כי ערך המשתנים ‎$wgEnableUploads ו־‎$wgEnableUploads הוא true בוויקי היעד.',
	'special-push' => 'דחיפת דפים',
	'push-special-description' => 'הדף הזה מאפשר לכם לדחוף דף אחד או יותר לאתר ויקי אחד או יותר שמשתמש במדיה־ויקי.

כדי לדחוף דפים, הכניסו את כותרות הדפים לתיבת הטקסט להלן, כותרת אחת בכל שורה, ולחצו על הכפתור "לדחוף הכול". ביצוע הפעולה יכול לקחת זמן.',
	'push-special-pushing-desc' => 'דחיפה של {{PLURAL:$2|עמוד אחד|$2 עמודים}} ל{{GRAMMAR:תחילית|$1}}...',
	'push-special-button-text' => 'לדחוף דפים',
	'push-special-target-is' => 'אתר הוויקי המיועד: $1',
	'push-special-select-targets' => 'אתרי הוויקי המיועדים:',
	'push-special-item-pushing' => '$1: דחיפה',
	'push-special-item-completed' => '$1 דחיפה הושלמה',
	'push-special-item-failed' => '$1: דחיפה נכשלה: $2',
	'push-special-push-done' => 'הדחיפה הושלמה',
	'push-special-err-token-failed' => 'לא הצלחתי לקבל אסימון עריכה באתר הוויקי המיועד.',
	'push-special-err-pageget-failed' => 'כשל בקבלת תוכן הדף המקומי.',
	'push-special-err-push-failed' => 'אתר הוויקי המיועד סירב לקבל את הדף הנדחף.',
	'push-special-inc-files' => 'לכלול קבצים מוטבעים',
	'push-special-err-imginfo-failed' => 'לא ברור אם צריך לדחוף קבצים כלשהו.',
	'push-special-obtaining-fileinfo' => '$1: קבלת מידע על הקובץ...',
	'push-special-pushing-file' => '$1: דחיפת הקובץ $2...',
	'push-special-return' => 'לדחוף יותר דפים',
	'push-api-err-nocurl' => 'cURL לא מותקן.
הגדירו את המשתנה ‎$egPushDirectFileUploads כ־false באתרי ויקי ציבוריים, או התקינו את cURL באתרי ויקי פרטיים',
	'push-api-err-nofilesupport' => 'התקנת מדיה־ויקי מקומית לא תומכת בפעולת post על קבצים.
באתרי ויקי ציבוריים הגדירו את המשתנה ‎$egPushDirectFileUploads כ־false.
באתרי ויקי פרטיים התקינו את התיקון המקושר מהתיעוד של Push או שדרגו את תוכנת מדיה־ויקי עצמה.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'push-desc' => 'Jednore rozšěrjenje za přenošowanje wobsaha do druhich wikijow',
	'right-push' => 'Awtorizacija za wužiwanje přenošowanskeje funkcionalnosće.',
	'right-bulkpush' => 'Awtorizacija za wužiwanje přenošowanskeje funkcionalnosće z masami (t. j. Special:Push).',
	'right-pushadmin' => 'Awtorizacije za změnjenje přenošowanskich cilow a přenošowanskich nastajenjow.',
	'push-err-captacha' => 'Přenošowanje do $1 CAPTCHA dla njemóžno.',
	'push-err-captcha-page' => 'Strona $1 njeda so CAPTCHA dla do wšěch cilow přenjesć.',
	'push-err-authentication' => 'Awtentifikacija na $1 je so njeporadźiła. $2',
	'push-tab-text' => 'Přenjesć',
	'push-button-text' => 'Přenjesć',
	'push-tab-desc' => 'Tutón rajtark ći zmóžnja aktualnu wersiju tuteje strony do druhich wikijow přenjesć.',
	'push-button-pushing' => 'Přenošowanje',
	'push-button-pushing-files' => 'Dataje so přenošuja',
	'push-button-completed' => 'Přenjesenje zakónčene',
	'push-button-failed' => 'Přenjesenje je so njeporadźiło',
	'push-tab-title' => '$1 přenjesć',
	'push-targets' => 'Přenošowanske cile',
	'push-add-target' => 'Cil přidać',
	'push-import-revision-message' => 'Z $1 přenjeseny.',
	'push-tab-no-targets' => 'Njejsu žane přenošowanske cile. Prošu zapodaj je w dataji LocalSettings.php.',
	'push-tab-push-to' => 'Do $1 přenjesć',
	'push-remote-pages' => 'Zdalene strony',
	'push-remote-page-link' => '$1 w $2',
	'push-remote-page-link-full' => 'Stronu $1 na $2 sej wobhladać',
	'push-targets-total' => '{{PLURAL:$1|Je $1 strona|Stej $1 stronje|Su $1 strony|Je $1 stronow}}.',
	'push-button-all' => 'Wšě přenjesć',
	'push-tab-last-edit' => 'Poslednja změna wot wužiwarja $1, $2, $3.',
	'push-tab-not-created' => 'Tuta strona hišće njeeksistuje.',
	'push-tab-push-options' => 'Přenošowanske opcije:',
	'push-tab-inc-templates' => 'Předłohi zapřijeć',
	'push-tab-used-templates' => '({{PLURAL:$2|Wužita předłoha|Wužitej předłoze|Wužite předłohi|Wužite předłohi}}: $1)',
	'push-tab-no-used-templates' => '(Na tutej stronje so žane přełohi wužiwaja.)',
	'push-tab-inc-files' => 'Zasadźene dataje zapřijeć',
	'push-tab-err-fileinfo' => 'Njeda so zwěsćić, kotre dataje so na tutej stronje wužiwaja. Žana njeje so přenjesła.',
	'push-tab-err-filepush-unknown' => 'Přenjesenje dataje je so z njeznateje přičiny njeporadźiło.',
	'push-tab-err-filepush' => 'Přenjesenje dataje je so njeporadźiło: $1',
	'push-tab-embedded-files' => 'Zasadźene dataje:',
	'push-tab-no-embedded-files' => '(Žane zasadźene dataje na tutej stronje.)',
	'push-tab-files-override' => 'Tute dataje hižo eksistuja: $1',
	'push-tab-template-override' => 'Tute předłohi hižo eksistuja: $1',
	'push-tab-err-uploaddisabled' => 'Nahraća njejsu zmóžnjene, Staj $wgEnableUploads a $wgAllowCopyUploads w dataji LocalSettings.php ciloweho wikija na "true".',
	'special-push' => 'Strony přenjesć',
	'push-special-description' => 'Tuta strona ći zmóžnja wobsah stronow do druhich wikijow MediaWiki přenjesć.

Zo by strony přenjesł, zapodaj titule do slědowaceho tekstoweho pola, jedyn titul na linku a klikń potom na "Wšě přenjesć". Móže chwilku trać, doniž přenjesenje njeje zakónčene.',
	'push-special-pushing-desc' => '{{PLURAL:$2|Přenošuje so $2 strona|Přenošujetej so $2 stronje|Přenošuja so $2 strony|Přenošuje so $2 stronow}} do $1...',
	'push-special-button-text' => 'Strony přenjesć',
	'push-special-target-is' => 'Cilowy wiki: $1',
	'push-special-select-targets' => 'Cilowe wikije:',
	'push-special-item-pushing' => '$1: Přenošuje so',
	'push-special-item-completed' => '$1: Přenjesenje zakónčene',
	'push-special-item-failed' => '$1: Přenjesenje je so njeporadźiło: $2',
	'push-special-push-done' => 'Přenjesenje zakónčene',
	'push-special-err-token-failed' => 'Wobdźěłowanski token njeda so na cilowym wikiju wobstarać.',
	'push-special-err-pageget-failed' => 'Wobsah lokalneje strony njeda so wobstarać.',
	'push-special-err-push-failed' => 'Cilowy wiki je přenjesenu stronu wotpokazał.',
	'push-special-inc-files' => 'Zasadźene dataje zapřijeć',
	'push-special-err-imginfo-failed' => 'Njeda so zwěsćić, hač dataje dyrbja so přenjesć.',
	'push-special-obtaining-fileinfo' => '$1: Datajowe informacije so wobstaruja...',
	'push-special-pushing-file' => '$1: Dataja $2 so přenošuje...',
	'push-special-return' => 'Dalše strony přenjesć',
	'push-api-err-nocurl' => 'cURL njeje instalowany.
Staj $egPushDirectFileUploads na false na zjawnych wikijach abo instaluj cURL za priwatne wikije',
	'push-api-err-nofilesupport' => 'Lokalna instalacija MediaWiki njepodpěruje nahrawanje datajow.
Staj na zjawnych wikijach parameter $egPushDirectFileUploads na "false".
Na priwatnych wikijach nałož patch linkd z dokumentacije Push abo zaktualizuj MediaWiki.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'push-desc' => 'Extension simple pro transferer contento a altere wikis',
	'right-push' => 'Autorisation a usar le functionalitate de transferimento.',
	'right-bulkpush' => 'Autorisation a usar le functionalitate de transferimento in massa (i.e. Special:Push).',
	'right-pushadmin' => 'Autorisation a modificar destinationes e configurationes de transferimento.',
	'push-err-captacha' => 'Non poteva transferer a $1 a causa de un problema con le "captcha".',
	'push-err-captcha-page' => 'Non poteva transferer le pagina $1 a tote le destinationes proque un "captcha" esseva incontrate.',
	'push-err-authentication' => 'Authentication a $1 ha fallite. $2',
	'push-tab-text' => 'Transferer',
	'push-button-text' => 'Transferer',
	'push-tab-desc' => 'Iste scheda permitte transferer le version actual de iste pagina a un o plus altere wikis.',
	'push-button-pushing' => 'Transferimento in curso',
	'push-button-pushing-files' => 'Transfere files',
	'push-button-completed' => 'Transferimento complete',
	'push-button-failed' => 'Transferimento fallite',
	'push-tab-title' => 'Transferer $1',
	'push-targets' => 'Destinationes de transferimento',
	'push-add-target' => 'Adder destination',
	'push-import-revision-message' => 'Transferite ex $1.',
	'push-tab-no-targets' => 'Il non ha destinationes de transferimento. Per favor adde alcunes in tu file LocalSettings.php.',
	'push-tab-push-to' => 'Transferer a $1',
	'push-remote-pages' => 'Paginas remote',
	'push-remote-page-link' => '$1 in $2',
	'push-remote-page-link-full' => 'Vider $1 in $2',
	'push-targets-total' => 'Il ha un total de $1 {{PLURAL:$1|destination|destinationes}}.',
	'push-button-all' => 'Transferer totes',
	'push-tab-last-edit' => 'Ultime modification per $1 le $2 a $3.',
	'push-tab-not-created' => 'Iste pagina non existe ancora.',
	'push-tab-push-options' => 'Optiones de transferimento:',
	'push-tab-inc-templates' => 'Includer patronos',
	'push-tab-used-templates' => '({{PLURAL:$2|Patrono|Patronos}} usate: $1)',
	'push-tab-no-used-templates' => '(Nulle patrono es usate in iste pagina.)',
	'push-tab-inc-files' => 'Includer files incorporate',
	'push-tab-err-fileinfo' => 'Non poteva determinar qual files es usate in iste pagina. Nulle file ha essite transferite.',
	'push-tab-err-filepush-unknown' => 'Le transferimento ha fallite pro un ration incognite.',
	'push-tab-err-filepush' => 'Transferimento de file fallite: $1',
	'push-tab-embedded-files' => 'File incastrate',
	'push-tab-no-embedded-files' => '(Nulle file es incastrate in iste pagina.)',
	'push-tab-files-override' => 'Iste files ja existe: $1',
	'push-tab-template-override' => 'Iste patronos ja exite: $1',
	'push-tab-err-uploaddisabled' => 'Le incargamento non es activate. Assecura te que le variabiles $wgEnableUploads e $wgAllowCopyUploads sia specificate como "true" in le file LocalSettings.php del wiki de destination.',
	'special-push' => 'Transferer paginas',
	'push-special-description' => 'Iste pagina permitte transferer le contento de un o plus paginas a un o plus wikis MediaWiki.

Pro transferer paginas, entra le titulos in le quadro de texto hic infra, un titulo per linea, e preme "Transferer totes". Isto pote prender certe un tempore.',
	'push-special-pushing-desc' => 'Transfere $2 {{PLURAL:$2|pagina|paginas}} a $1...',
	'push-special-button-text' => 'Transferer paginas',
	'push-special-target-is' => 'Wiki de destination: $1',
	'push-special-select-targets' => 'Wikis de destination:',
	'push-special-item-pushing' => '$1: Transferimento in curso',
	'push-special-item-completed' => '$1: Transferimento complete',
	'push-special-item-failed' => '$1: Transferimento fallite: $2',
	'push-special-push-done' => 'Transferimento complete',
	'push-special-err-token-failed' => 'Non poteva obtener un indicio de modification in le wiki de destination.',
	'push-special-err-pageget-failed' => 'Non poteva obtener le contento del pagina local.',
	'push-special-err-push-failed' => 'Le wiki de destination refusava le pagina transferite.',
	'push-special-inc-files' => 'Includer files incastrate',
	'push-special-err-imginfo-failed' => 'Non poteva determinar si es necessari transferer files.',
	'push-special-obtaining-fileinfo' => '$1: Obtene informationes de file...',
	'push-special-pushing-file' => '$1: Transfere file $2...',
	'push-special-return' => 'Transferer plus paginas',
	'push-api-err-nocurl' => 'cURL non es installate.
Mitte $egPushDirectFileUploads a false in wikis public, o installa cURL pro wikis private',
	'push-api-err-nofilesupport' => 'Le MediaWiki local non ha supporto pro le incargamento de files.
In wikis public, mitte $egPushDirectFileUploads a false.
In wikis private, applica le patch ligate ab le documentation de Push o actualisa MediaWiki mesme.',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'push-desc' => 'Ekstensi ringan untuk mendorong konten ke wiki lainnya',
	'right-push' => 'Otorisasi untuk menggunakan fungsi dorong.',
	'right-bulkpush' => 'Otorisasi untuk menggunakan fungsi dorong massal (Special:Push).',
	'right-pushadmin' => 'Otorisasi untuk memodifikasi target dan pengaturan dorong.',
	'push-err-captacha' => 'Tidak dapat mendorong ke $1 karena captcha.',
	'push-err-captcha-page' => 'Tidak dapat mendorong halaman $1 ke semua target karena captcha.',
	'push-err-authentication' => 'Otentikasi pada $1 gagal. $2',
	'push-tab-text' => 'Dorong',
	'push-button-text' => 'Dorong',
	'push-tab-desc' => 'Tab ini mengizinkan Anda untuk mendorong revisi terbaru halaman ini ke satu atau lebih wiki lain.',
	'push-button-pushing' => 'Mendorong',
	'push-button-pushing-files' => 'Mendorong berkas',
	'push-button-completed' => 'Pendorongan selesai',
	'push-button-failed' => 'Pendorongan gagal',
	'push-tab-title' => 'Mendorong $1',
	'push-targets' => 'Target pendorongan',
	'push-add-target' => 'Tambahkan target',
	'push-import-revision-message' => 'Didorong dari $1.',
	'push-tab-no-targets' => 'Tidak ada target untuk pendorongan. Harap tambahkan beberapa berkas ke LocalSettings.php Anda.',
	'push-tab-push-to' => 'Dorong ke $1',
	'push-remote-pages' => 'Halaman luar',
	'push-remote-page-link' => '$1 pada $2',
	'push-remote-page-link-full' => 'Lihat $1 pada $2',
	'push-targets-total' => 'Total ada $1 {{PLURAL:$1|target|target}}.',
	'push-button-all' => 'Dorong semua',
	'push-tab-last-edit' => 'Suntingan terakhir oleh $1 pada $2 $3.',
	'push-tab-not-created' => 'Halaman ini belum ada.',
	'push-tab-push-options' => 'Pilihan dorongan:',
	'push-tab-inc-templates' => 'Sertakan templat',
	'push-tab-used-templates' => '({{PLURAL:$2|Templat|Templat}} yang digunakan: $1)',
	'push-tab-no-used-templates' => '(Tidak ada templat yang digunakan pada halaman ini.)',
	'push-tab-inc-files' => 'Sertakan berkas tersemat',
	'push-tab-err-fileinfo' => 'Tidak dapat mengetahui berkas mana yang digunakan pada halaman ini. Tidak ada yang didorong.',
	'push-tab-err-filepush-unknown' => 'Gagal mendorong berkas karena alasan yang tidak diketahui.',
	'push-tab-err-filepush' => 'Gagal mendorong berkas: $1',
	'push-tab-embedded-files' => 'Berkas tersemat:',
	'push-tab-no-embedded-files' => '(Tidak ada berkas yang tersemat pada halaman ini.)',
	'push-tab-files-override' => 'Berkas berikut telah ada: $1',
	'push-tab-template-override' => 'Templat berikut telah ada: $1',
	'push-tab-err-uploaddisabled' => 'Pengunggahan tidak aktif. Pastikan $wgEnableUploads dan $wgAllowCopyUploads disetel sebagai true dalam LocalSettings.php wiki target.',
	'special-push' => 'Dorong halaman',
	'push-special-description' => 'Halaman ini memungkinkan Anda untuk mendorong satu atau lebih halaman ke satu atau lebih wiki MediaWiki.

Untuk mendorong halaman, masukkan judul dalam kotak teks di bawah ini, satu judul per baris, dan tekan dorong semua. Proses ini dapat memakan waktu cukup lama.',
	'push-special-pushing-desc' => 'Mendorong $2 {{PLURAL:$2|halaman|halaman}} ke $1...',
	'push-special-button-text' => 'Dorong halaman',
	'push-special-target-is' => 'Wiki target: $1',
	'push-special-select-targets' => 'Wiki target:',
	'push-special-item-pushing' => '$1: Mendorong',
	'push-special-item-completed' => '$1: Pendorongan selesai',
	'push-special-item-failed' => '$1: Pendorongan gagal: $2',
	'push-special-push-done' => 'Pendorongan selesai',
	'push-special-err-token-failed' => 'Tidak dapat memperoleh token sunting pada wiki target.',
	'push-special-err-pageget-failed' => 'Tidak dapat memperoleh konten halaman lokal.',
	'push-special-err-push-failed' => 'Wiki target menolak laman yang didorong.',
	'push-special-inc-files' => 'Sertakan berkas tersemat',
	'push-special-err-imginfo-failed' => 'Tidak dapat menentukan apakah ada berkas yang perlu didorong.',
	'push-special-obtaining-fileinfo' => '$1: Mencari informasi berkas...',
	'push-special-pushing-file' => '$1: Mendorong berkas $2...',
	'push-special-return' => 'Dorong halaman lain',
	'push-api-err-nocurl' => 'cURL tidak diinstal.
Setel $egPushDirectFileUploads menjadi false pada wiki publik atau instal cURL untuk wiki pribadi',
	'push-api-err-nofilesupport' => 'MediaWiki lokal tidak memiliki dukungan untuk mengirim berkas.
Pada wiki publik, setel $egPushDirectFileUploads menjadi false.
Pada wiki pribadi, terapkan tambalan linkd dari dokumentasi Push atau perbarui MediaWiki itu sendiri.',
);

/** Japanese (日本語)
 * @author Ohgi
 */
$messages['ja'] = array(
	'push-add-target' => '対象を追加',
	'push-tab-files-override' => 'これらのファイルはすでに存在しています： $1',
	'push-tab-template-override' => 'これらのテンプレートはすでに存在しています： $1',
	'push-special-target-is' => '対象のウィキ： $1',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'push-desc' => 'E eijfach Zohsazprojramm för Saache en ander Wikis erövver zo bränge.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'push-desc' => 'Erweiderung déi en einfachen Transfert (Push) vun Inhalt op aner Wikien erméiglecht',
	'right-push' => "Autorisatioun fir d'Push-Fonctionalitéit ze benotzen",
	'right-bulkpush' => 'Autorisatioun fir méi Säite mateneen per Push an aner Wikien ze transferéieren',
	'right-pushadmin' => "Autorisatioun fir d'Zil an d'Astellungen vun der Push-Fonctionalitéit z'änneren.",
	'push-err-captacha' => 'Push op $1 konnt wéint dem Captcha net gemaach ginn.',
	'push-tab-text' => 'Push',
	'push-button-text' => 'Push',
	'push-button-completed' => 'Push ofgeschloss',
	'push-tab-title' => '$1 pushen',
	'push-remote-page-link' => '$1 op $2',
	'push-remote-page-link-full' => '$1 op $2 weisen',
	'push-button-all' => 'All pushen',
	'push-tab-last-edit' => 'Lescht Ännerung vum $1 de(n) $2 ëm $3 Auer.',
	'push-tab-not-created' => 'Dës Säit gëtt et nach net',
	'push-tab-push-options' => 'Push-Optiounen',
	'push-tab-inc-templates' => 'Inklusiv Schablounen',
	'push-tab-used-templates' => '({{PLURAL:$2|Schabloun gëtt|Schabloune gi}} benotzt: $1)',
	'push-tab-no-used-templates' => '(Op dëser Säit gi keng Schabloune benotzt.)',
	'push-tab-inc-files' => 'Agebonne Fichieren abannen',
	'push-tab-embedded-files' => 'Agebonne Fichieren:',
	'push-tab-files-override' => 'Dës Fichiere gëtt et schonn: $1',
	'push-tab-template-override' => 'Dës Schabloune gëtt et schonn: $1',
	'special-push' => 'Säite pushen',
	'push-special-button-text' => 'Säite pushen',
	'push-special-select-targets' => 'Zielwikien:',
	'push-special-item-pushing' => '$1: Pushen',
	'push-special-item-completed' => '$1: Push ofgeschloss',
	'push-special-item-failed' => '$1: Push huet net fonctionnéiert: $2',
	'push-special-push-done' => 'Push ofgeschloss',
	'push-special-inc-files' => 'Agebonne Fichieren abannen',
	'push-special-return' => 'Méi Säite pushen',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'push-desc' => 'Мал додаток за пренесување на содржини од едно на други викија',
	'right-push' => 'Потврда на сметка за да работи функцијата за пренесување.',
	'right-bulkpush' => 'Потврда на сметка за да работи функцијата за групно пренесување (т.е. Special:Push).',
	'right-pushadmin' => 'Потврда на сметка за измена на одредниците и поставките за пренесување.',
	'push-err-captacha' => 'Не можев да го пренесам $1 поради Captcha.',
	'push-err-captcha-page' => 'Не можев да ја пренесам страницата $1 на сите одредници заради Captcha.',
	'push-err-authentication' => 'Потврдувањето на $1 не успеа. $2',
	'push-tab-text' => 'Пренеси',
	'push-button-text' => 'Пренеси',
	'push-tab-desc' => 'Ова јазиче ви овозможува да ја пренесете тековната ревизија на страницава на едно или повеќе викија',
	'push-button-pushing' => 'Пренесувам',
	'push-button-pushing-files' => 'Пренесувам податотеки',
	'push-button-completed' => 'Преносот заврши',
	'push-button-failed' => 'Преносот не успеа',
	'push-tab-title' => 'Пренеси - $1',
	'push-targets' => 'Одредници за преносот',
	'push-add-target' => 'Додај одредница',
	'push-import-revision-message' => 'Пренесено од $1.',
	'push-tab-no-targets' => 'Нема одредници во кои би се извршил преносот. Додајте места во вашата податотека LocalSettings.php.',
	'push-tab-push-to' => 'Пренеси во $1',
	'push-remote-pages' => 'Далечински страници',
	'push-remote-page-link' => '$1 на $2',
	'push-remote-page-link-full' => 'Преглед на $1 на $2',
	'push-targets-total' => 'Има вкупно $1 {{PLURAL:$1|одредница|одредници}}.',
	'push-button-all' => 'Пренеси сè',
	'push-tab-last-edit' => 'Последна измена од $1 на $2 во $3 ч.',
	'push-tab-not-created' => 'Оваа страница сè уште не постои.',
	'push-tab-push-options' => 'Поставки за преносот:',
	'push-tab-inc-templates' => 'Вклучи шаблони',
	'push-tab-used-templates' => '({{PLURAL:$2|Шаблон|Шаблони}} во употреба: $1)',
	'push-tab-no-used-templates' => '(На страницава не се користат шаблони.)',
	'push-tab-inc-files' => 'Вклучи вматнати податотеки',
	'push-tab-err-fileinfo' => 'Не можев да востановам кои податотеки се користат на страницава. Затоа не преместив ниедна.',
	'push-tab-err-filepush-unknown' => 'Пренесувањето на податотеката не успеа од непознати причини.',
	'push-tab-err-filepush' => 'Пренесувањето на податотеката не успеа: $1',
	'push-tab-embedded-files' => 'Вметнати податотеки:',
	'push-tab-no-embedded-files' => '(Во страницава нема вметнати податотеки.)',
	'push-tab-files-override' => 'Веќе постојат следниве податотеки: $1',
	'push-tab-template-override' => 'Веќе постојат следниве шаблони: $1',
	'push-tab-err-uploaddisabled' => 'Подигањето не е овозможено. Наместете ги $wgEnableUploads и $wgAllowCopyUploads на „true“ во LocalSettings.php на целното вики.',
	'special-push' => 'Пренесување страници',
	'push-special-description' => 'Оваа страница ви овозможува да пренесете содржини од една или повеќе страници од едно вики во едно или повеќе викија што работат на МедијаВики.

За да пренесете, внесете ги насловите во полето подолу, по едно во секој ред, па стиснете на „Пренеси сè“. Ова може да потрае.',
	'push-special-pushing-desc' => 'Пренесувам $2 {{PLURAL:$2|страница|страници}} во $1...',
	'push-special-button-text' => 'Пренеси',
	'push-special-target-is' => 'Целно вики: $1',
	'push-special-select-targets' => 'Целни викија:',
	'push-special-item-pushing' => '$1: Преместување',
	'push-special-item-completed' => '$1: Преносот заврши',
	'push-special-item-failed' => '$1: Преносот не успеа: $2',
	'push-special-push-done' => 'Преносот заврши',
	'push-special-err-token-failed' => 'Не можев да го добијам жетонот на уредувањето на целното вики.',
	'push-special-err-pageget-failed' => 'Не можев да ја добијам содржината на локалната страница.',
	'push-special-err-push-failed' => 'Целното вики ја одби пренесената страница.',
	'push-special-inc-files' => 'Вклучи вметнати податотеки',
	'push-special-err-imginfo-failed' => 'Не можев да утврдам дали треба да се пренесат податотеки.',
	'push-special-obtaining-fileinfo' => '$1: Преземам податотечни податоци...',
	'push-special-pushing-file' => '$1: Ја пренесувам податотеката $2...',
	'push-special-return' => 'Пренеси уште страници',
	'push-api-err-nocurl' => 'cURL не е инсталиран.
Наместете го $egPushDirectFileUploads на „false“ на јавните викија, или пак инсталирајте го cURL на приватните викија',
	'push-api-err-nofilesupport' => 'Локалниот МедијаВики нема поддршка за објавување на податотеки.
На јавни викија, наместете го $egPushDirectFileUploads на „false“.
На приватни викија, ставете ја поправката linkd од документацијата на Push или подновете го самиот МедијаВики.',
);

/** Dutch (Nederlands)
 * @author Krinkle
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'push-desc' => "Lichtgewichtuitbreiding om inhoud naar andere wiki's te sturen",
	'right-push' => "Mag inhoud naar andere wiki's versturen.",
	'right-bulkpush' => "Mag en masse inhoud naar andere wiki's versturen.",
	'right-pushadmin' => "Mag doelwiki's en instellingen voor het versturen van inhoud aanpassen.",
	'push-err-captacha' => 'Het was niet mogelijk inhoud te verzenden naar $1 omdat de andere wiki een captchaoplossing heeft gevraagd.',
	'push-err-captcha-page' => "Het was niet mogelijk de pagina $1 naar alle doelwiki's te verzenden omdat er om een captchaoplossing is gevraagd.",
	'push-err-authentication' => 'Het aanmelden bij $1 is mislukt. $2',
	'push-tab-text' => 'Verzenden',
	'push-button-text' => 'Verzenden',
	'push-tab-desc' => "Via dit tabblad kunt u de inhoud van de huidige versie van deze pagina naar een of meer andere wiki's verzenden.",
	'push-button-pushing' => 'Bezig met verzenden',
	'push-button-pushing-files' => 'Bezig met het versturen van bestanden',
	'push-button-completed' => 'Het verzenden is voltooid',
	'push-button-failed' => 'Het verzenden is mislukt',
	'push-tab-title' => 'Bezig met het verzenden van $1',
	'push-targets' => "Doelwiki's",
	'push-add-target' => 'Doelwiki toevoegen',
	'push-import-revision-message' => 'Verzonden vanuit $1.',
	'push-tab-no-targets' => "Er zijn geen beschikbare doelwiki's. Voeg deze eerst toe aan uw LocalSettings.php-bestand.",
	'push-tab-push-to' => 'Verzenden naar $1',
	'push-remote-pages' => "Pagina's in andere wiki's",
	'push-remote-page-link' => '$1 op $2',
	'push-remote-page-link-full' => '$1 op $2 bekijken',
	'push-targets-total' => "Er {{PLURAL:$1|is één doelwiki|zijn $1 doelwiki's}}.",
	'push-button-all' => 'Alles verzenden',
	'push-tab-last-edit' => 'Laatste bewerking door $1 op $2 om $3.',
	'push-tab-not-created' => 'Deze pagina bestaat nog niet.',
	'push-tab-push-options' => 'Verzendinstellingen:',
	'push-tab-inc-templates' => 'Sjablonen ook verzenden',
	'push-tab-used-templates' => '{{PLURAL:$2|Gebruikt sjabloon|Gebruikte sjablonen}}: $1',
	'push-tab-no-used-templates' => 'Er worden geen sjablonen gebruikt op deze pagina.',
	'push-tab-inc-files' => 'Ingesloten bestanden bijsluiten',
	'push-tab-err-fileinfo' => 'Het was niet mogelijk vast te stellen welke bestanden op deze pagina gebruikt worden. Er zijn geen bestanden verstuurd.',
	'push-tab-err-filepush-unknown' => 'Het versturen van een bestand is om onbekende reden mislukt.',
	'push-tab-err-filepush' => 'Het versturen van een bestand is mislukt: $1',
	'push-tab-embedded-files' => 'Ingesloten bestanden:',
	'push-tab-no-embedded-files' => 'Er zijn geen ingesloten bestanden op deze pagina.',
	'push-tab-files-override' => 'Deze bestanden bestaan al: $1',
	'push-tab-template-override' => 'Deze sjablonen bestaan al: $1',
	'push-tab-err-uploaddisabled' => 'Uploaden is niet ingeschakeld. Zorg ervoor dat $wgEnableUploads en $wgAllowCopyUploads zijn ingesteld op "waar" in LocalSettings.php van de doelwiki.',
	'special-push' => "Pagina's verzenden",
	'push-special-description' => "Via deze pagina kunt u de inhoud van een of meer pagina's naar een of meer MediaWiki-wiki's verzenden.

Voer paginanamen in het onderstaande invoerveld in om pagina's te kunnen verzenden.
Voer iedere paginanaam in op een nieuwe regel en klik op \"Alles verzenden\".
Het verzenden kan enige tijd kosten.",
	'push-special-pushing-desc' => "Bezig met het verzenden van {{PLURAL:$2|één pagina|$2 pagina's}} naar $1...",
	'push-special-button-text' => "Pagina's verzenden",
	'push-special-target-is' => 'Doelwiki: $1',
	'push-special-select-targets' => "Doelwiki's:",
	'push-special-item-pushing' => '$1: bezig met verzenden',
	'push-special-item-completed' => '$1: het verzenden is voltooid',
	'push-special-item-failed' => '$1: het verzenden is mislukt: $2',
	'push-special-push-done' => 'Het verzenden is afgerond',
	'push-special-err-token-failed' => 'Het was niet mogelijk een bewerkingstoken te verkrijgen van de doelwiki.',
	'push-special-err-pageget-failed' => 'Het was niet mogelijk de inhoud van de lokale pagina te verkrijgen.',
	'push-special-err-push-failed' => 'De doelwiki heeft de verzonden pagina niet geaccepteerd.',
	'push-special-inc-files' => 'Ingesloten bestanden bijsluiten',
	'push-special-err-imginfo-failed' => 'Het was niet mogelijk vast te stellen of er bestanden meegestuurd moeten worden.',
	'push-special-obtaining-fileinfo' => '$1: bestandsgegevens aan het ophalen...',
	'push-special-pushing-file' => '$1: bestand $2 aan het verzenden...',
	'push-special-return' => "Meer pagina's verzenden",
	'push-api-err-nocurl' => 'cURL is niet geïnstalleerd.
Stel op publieke wiki\'s $egPushDirectFileUploads in op "false" of installeer cURL in een besloten wiki.',
	'push-api-err-nofilesupport' => 'De lokale MediaWiki heeft geen ondersteuning voor het doorsturen van bestanden. 
Stel op openbare wiki\'s $egPushDirectFileUploads in op "false".
Voer de patch waarnaar wordt verwezen in de documentatie van Push uit op besloten wiki\'s of werk MediaWiki zelf bij.',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'push-desc' => 'Uma extensão ligeira para replicação externa de conteúdos para outras wikis',
	'right-push' => 'Autorização para usar a funcionalidade de replicação externa.',
	'right-bulkpush' => 'Autorização para usar a funcionalidade de replicação externa em massa (isto é, a página Special:Push).',
	'right-pushadmin' => 'Autorização para modificar os destinos e a configuração da replicação externa.',
	'push-err-captacha' => 'Não foi possível fazer a replicação para $1 devido ao captcha.',
	'push-err-captcha-page' => 'Não foi possível replicar a página $1 para todos os destinos devido ao captcha.',
	'push-err-authentication' => 'A autenticação na $1 falhou. $2',
	'push-tab-text' => 'Replicação',
	'push-button-text' => 'Replicar',
	'push-tab-desc' => 'Este separador permite-lhe fazer a replicação externa da última versão desta página para uma ou mais wikis.',
	'push-button-pushing' => 'A replicar',
	'push-button-pushing-files' => 'A replicar ficheiros',
	'push-button-completed' => 'Replicação terminada',
	'push-button-failed' => 'A replicação falhou',
	'push-tab-title' => 'Replicar $1',
	'push-targets' => 'Destinos da replicação',
	'push-add-target' => 'Adicionar destino',
	'push-import-revision-message' => 'Replicada de $1.',
	'push-tab-no-targets' => 'Não existem destinos para a replicação. Acrescente-os ao ficheiro LocalSettings.php.',
	'push-tab-push-to' => 'Replicar para $1',
	'push-remote-pages' => 'Páginas remotas',
	'push-remote-page-link' => '$1 na $2',
	'push-remote-page-link-full' => 'Ver $1 na $2',
	'push-targets-total' => 'Há {{PLURAL:$1|$1 destino|um total de $1 destinos}}.',
	'push-button-all' => 'Replicar para todos',
	'push-tab-last-edit' => 'Última edição de $1 a $2 às $3.',
	'push-tab-not-created' => 'Esta página ainda não existe.',
	'push-tab-push-options' => 'Opções da replicação externa:',
	'push-tab-inc-templates' => 'Incluir predefinições',
	'push-tab-used-templates' => '({{PLURAL:$2|Predefinição usada|Predefinições usadas}}: $1)',
	'push-tab-no-used-templates' => '(Esta página não contém predefinições)',
	'push-tab-inc-files' => 'Incluir ficheiros incorporados',
	'push-tab-err-fileinfo' => 'Não foi possível determinar que ficheiros são usados nesta página. Não foi replicado nenhum ficheiro.',
	'push-tab-err-filepush-unknown' => 'A replicação externa do ficheiro falhou por uma razão desconhecida.',
	'push-tab-err-filepush' => 'A replicação externa do ficheiro falhou: $1',
	'push-tab-embedded-files' => 'Ficheiros incorporados:',
	'push-tab-no-embedded-files' => '(Não há nenhum ficheiro incorporado nesta página).',
	'push-tab-files-override' => 'Estes ficheiros já existem: $1',
	'push-tab-template-override' => 'Estas predefinições já existem: $1',
	'push-tab-err-uploaddisabled' => 'Os uploads não foram possibilitados. Certifique-se que $wgEnableUploads e $wgAllowCopyUploads estão definidas como "true" no ficheiro LocalSettings.php da wiki de destino.',
	'special-push' => 'Replicação externa de páginas',
	'push-special-description' => 'Esta página permite-lhe fazer a replicação externa de uma ou mais páginas, para uma ou mais wikis MediaWiki.

Para fazer a replicação externa de páginas, introduza os respectivos títulos na caixa de texto abaixo, um título por linha e clique "Replicar todas". A operação pode demorar algum tempo.',
	'push-special-pushing-desc' => 'A replicar $2 {{PLURAL:$2|página|páginas}} para a $1...',
	'push-special-button-text' => 'Replicar páginas',
	'push-special-target-is' => 'Wiki de destino: $1',
	'push-special-select-targets' => 'Wikis de destino:',
	'push-special-item-pushing' => '$1: A replicar',
	'push-special-item-completed' => '$1: Replicação terminada',
	'push-special-item-failed' => '$1: A replicação falhou: $2',
	'push-special-push-done' => 'Replicação terminada',
	'push-special-err-token-failed' => 'Não foi possível obter uma chave de edição na wiki de destino.',
	'push-special-err-pageget-failed' => 'Não foi possível obter o conteúdo da página local.',
	'push-special-err-push-failed' => 'A wiki de destino recusou a página.',
	'push-special-inc-files' => 'Incluir ficheiros incorporados',
	'push-special-err-imginfo-failed' => 'Não foi possível determinar se é necessário replicar algum ficheiro.',
	'push-special-obtaining-fileinfo' => '$1: A obter as informações do ficheiro...',
	'push-special-pushing-file' => '$1: A replicar o ficheiro $2...',
	'push-special-return' => 'Replicar mais páginas',
	'push-api-err-nocurl' => 'O cURL não está instalado.
Defina $egPushDirectFileUploads como "false" nas wikis públicas, ou instale o cURL para wikis privadas',
	'push-api-err-nofilesupport' => 'O MediaWiki local não tem suporte para a publicação de ficheiros.
Nas wikis públicas, defina $egPushDirectFileUploads como "false".
Nas wikis privadas, aplique o patch referido na documentação do Push, ou actualize o próprio MediaWiki.',
);

/** Russian (Русский)
 * @author DCamer
 * @author Lockal
 * @author MaxSem
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'push-desc' => 'Небольшое расширение для помещения содержимого в другие вики',
	'right-push' => 'Авторизуйтесь чтобы использовать эту функцию.',
	'right-bulkpush' => 'Авторизуйтесь чтобы использовать эту объёмную функцию (например, Служебная:Push)',
	'right-pushadmin' => 'Авторизуйтесь чтобы изменять настройки и направления размещения.',
	'push-err-captacha' => 'Не удалось разместить на $1 из-за капчи.',
	'push-err-captcha-page' => 'Невозможно разместить страницу $1 по всем целям из-за CAPTCHA.',
	'push-err-authentication' => 'Сбой аутентификации в $1. $2',
	'push-tab-text' => 'Разместить',
	'push-button-text' => 'Поместить',
	'push-tab-desc' => 'Эта вкладка позволяет разместить текущею версию этой страницы на одну или нескольких других вики.',
	'push-button-pushing' => 'Размещение',
	'push-button-pushing-files' => 'Размещаемые файлы',
	'push-button-completed' => 'Размещение завершено',
	'push-button-failed' => 'Размещение не удалось',
	'push-tab-title' => 'Размещение $1',
	'push-targets' => 'Направление размещения',
	'push-add-target' => 'Добавить направление',
	'push-import-revision-message' => 'Перенесено из $1.',
	'push-tab-no-targets' => 'Отсутствует направления размещения. Пожалуйста, добавьте их в файл LocalSettings.php.',
	'push-tab-push-to' => 'Размещение на $1',
	'push-remote-pages' => 'Удалённые страницы',
	'push-remote-page-link' => '$1 на $2',
	'push-remote-page-link-full' => 'Просмотреть $1 на $2',
	'push-targets-total' => 'Всего $1 {{PLURAL:$1|направление|направления}}.',
	'push-button-all' => 'Разместить все',
	'push-tab-last-edit' => 'Последняя правка $1 $2 в $3.',
	'push-tab-not-created' => 'Этой страницы ещё не существует.',
	'push-tab-push-options' => 'Настройки размещения:',
	'push-tab-inc-templates' => 'Включать шаблоны',
	'push-tab-used-templates' => '({{PLURAL:$2|Шаблон|Шаблоны}}: $1)',
	'push-tab-no-used-templates' => '(На этой странице нет шаблонов)',
	'push-tab-inc-files' => 'Включая встроенные файлы',
	'push-tab-err-fileinfo' => 'Не удалось установить какие файлы используются на этой странице. Ни один не был размещён.',
	'push-tab-err-filepush-unknown' => 'сбой размещения файлов по неизвестной причине.',
	'push-tab-err-filepush' => 'Сбой размещения файла. $1',
	'push-tab-embedded-files' => 'Встроенные файлы:',
	'push-tab-no-embedded-files' => '(На этой странице нет встроенных файлов.)',
	'push-tab-files-override' => 'Следующие файлы уже существуют: $1',
	'push-tab-template-override' => 'Следующие шаблоны уже существуют: $1',
	'push-tab-err-uploaddisabled' => 'Загрузки не включены. Убедитесь, что параметры $wgEnableUploads и $wgAllowCopyUploads в файле настроек LocalSettings.php установлены в true.',
	'special-push' => 'Разместить страницы',
	'push-special-description' => 'Эта страница позволяет разместить содержимое одной или нескольких страниц на одну или несколько других вики-сайтов на движке MediaWiki.

Для того, чтобы разместить страницы, введите названия в текстовом поле ниже, один заголовок на строку, и нажмите «Разместить все». Это может занять некоторое время.',
	'push-special-pushing-desc' => 'Размещение $2 {{PLURAL:$2|страницы|страниц}} на $1...',
	'push-special-button-text' => 'Разместить страницы',
	'push-special-target-is' => 'Целевой вики-сайт: $1',
	'push-special-select-targets' => 'Целевые вики-сайты:',
	'push-special-item-pushing' => '$1: Размещение',
	'push-special-item-completed' => '$1: Размещение завершено',
	'push-special-item-failed' => '$1: Размещение не удалось: $2',
	'push-special-push-done' => 'Размещение завершено',
	'push-special-err-token-failed' => 'Не удалось получить маркер редактирование на целевом вики-сайте.',
	'push-special-err-pageget-failed' => 'Не удалось получить локальное содержимое страницы.',
	'push-special-err-push-failed' => 'Целевой вики-сайт отказался разместить страницу.',
	'push-special-inc-files' => 'Включая встроенные файлы',
	'push-special-err-imginfo-failed' => 'Не удалось определить, есть ли файлы для размещения.',
	'push-special-obtaining-fileinfo' => '$1: Получение сведений о файлах…',
	'push-special-pushing-file' => '$1: Размещение файла $2…',
	'push-special-return' => 'Разместить другие страницы',
	'push-api-err-nocurl' => 'cURL не установлен.
На общедоступной вики установите параметр $egPushDirectFileUploads в значение false, или установите cURL на частной вики.',
	'push-api-err-nofilesupport' => 'Локальная MediaWiki не поддерживает отправку файлов. 
На общедоступной вики установите параметр $egPushDirectFileUploads в значение false.
На частной вики примените патч linkd из документации Push или обновите саму MediaWiki.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'push-special-target-is' => 'లక్ష్యిత వికీ: $1',
	'push-special-select-targets' => 'లక్ష్యిత వికీలు:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'push-desc' => 'Dugtong na magaang ang timbang upang maitulak ang nilalaman sa ibang mga wiki',
	'right-push' => 'Kapahintulutan upang magamit ang tungkulin ng pagtulak.',
	'right-bulkpush' => 'Kapahintulutan upang gamitin ang tungkulin ng pabunton na pagtutulak (iyon ay Natatangi:Itulak).',
	'right-pushadmin' => 'Kapahintulutan upang baguhin ang mga pinupukol ng pagtulak at mga katakdaan sa pagtulak.',
	'push-err-captacha' => 'Hindi maitulak sa $1 dahil sa captcha.',
	'push-err-captcha-page' => 'Hindi maitulak ang pahinang $1 papunta sa lahat ng mga pinupukol dahil sa CAPTCHA.',
	'push-err-authentication' => 'Nabigo ang pagpapatotoo doon sa $1. $2',
	'push-tab-text' => 'Itulak',
	'push-button-text' => 'Itulak',
	'push-tab-desc' => 'Ang laylay na ito ay nagpapahintulot sa iyong maitulak ang pangkasalukuyang rebisyon ng pahinang ito papunta sa isa o marami pang mga wiki.',
	'push-button-pushing' => 'Itinutulak',
	'push-button-pushing-files' => 'Itinutulak ang mga talaksan',
	'push-button-completed' => 'Nabuo na ang pagtulak',
	'push-button-failed' => 'Nabigo ang pagtulak',
	'push-tab-title' => 'Itulak ang $1',
	'push-targets' => 'Itulak ang mga pinupukol',
	'push-add-target' => 'Idagdag ang pinupukol',
	'push-import-revision-message' => 'Itinulak mula sa $1.',
	'push-tab-no-targets' => 'Walang mga pinupukol na mapagtutulakan. Mangyaring magdagdag ng ilan sa iyong talaksan ng LocalSettings.php.',
	'push-tab-push-to' => 'Itulak sa $1',
	'push-remote-pages' => 'Malalayong mga pahina',
	'push-remote-page-link' => '$1 na nasa $2',
	'push-remote-page-link-full' => 'Tingnan ang $1 na nasa $2',
	'push-targets-total' => 'May isang kabuuan ng $1 {{PLURAL:$1|pinupukol|mga pinupukol}}.',
	'push-button-all' => 'Itulak lahat',
	'push-tab-last-edit' => 'Huling pamamatnugot ni $1 sa $2 sa ganap na $3.',
	'push-tab-not-created' => 'Hindi pa umiiral ang pahinang ito.',
	'push-tab-push-options' => 'Mga mapagpipilian sa pagtutulak:',
	'push-tab-inc-templates' => 'Isama ang mga suleras',
	'push-tab-used-templates' => '(Ginagamit na {{PLURAL:$2|suleras|mga suleras}}: $1)',
	'push-tab-no-used-templates' => '(Walang ginagamit na mga suleras sa pahinang ito.)',
	'push-tab-inc-files' => 'Isama ang ibinaong mga talaksan',
	'push-tab-err-fileinfo' => 'Hindi makamtan kung anong mga talaksan ang ginagamit sa pahinang ito. Wala pang mga naitutulak.',
	'push-tab-err-filepush-unknown' => 'Nabigo ang pagtulak dahil sa hindi nalalamang dahilan.',
	'push-tab-err-filepush' => 'Nabigo ang pagtulak sa talaksan: $1',
	'push-tab-embedded-files' => 'Ibinaong mga talaksan:',
	'push-tab-no-embedded-files' => '(Walang nakabaong mga talaksan sa loob ng pahinang ito.)',
	'push-tab-files-override' => 'Umiiral na ang mga talaksang ito: $1',
	'push-tab-template-override' => 'Umiiral na ang mga suleras na ito: $1',
	'push-tab-err-uploaddisabled' => 'Hindi pinagagana ang mga pagkakargang papaitaas. Tiyaking nakatakda ang $wgEnableUploads at $wgAllowCopyUploads sa totoo sa loob ng LocalSettings.php ng pinupukol na wiki.',
	'special-push' => 'Itulak ang mga pahina',
	'push-special-description' => 'Nagbibigay-daan ang pahinang ito upang maitulak ang nilalaman ng isa o marami pang mga pahina papunta sa isa o marami pang mga wiki ng MediaWiki.

Upang makapagtulak ng mga pahina, ipasok ang mga pamagat sa loob ng kahon ng tekstong nasa ibaba, isang pamagat bawat guhit at sapulin ang itulak lahat. Maaaring maging matagal ito bago mabuo.',
	'push-special-pushing-desc' => 'Itinutulak ang $2 {{PLURAL:$2|pahina|mga pahina}} papunta sa $1...',
	'push-special-button-text' => 'Itulak ang mga pahina',
	'push-special-target-is' => 'Pinupukol na wiki: $1',
	'push-special-select-targets' => 'Pinupukol na mga wiki:',
	'push-special-item-pushing' => '$1: Itinutulak',
	'push-special-item-completed' => '$1: Nabuo ang pagtulak',
	'push-special-item-failed' => '$1: Nabigo ang pagtulak: $2',
	'push-special-push-done' => 'Nabuo na ang pagtulak',
	'push-special-err-token-failed' => 'Hindi makakuha ng isang kahalip ng pamamatnugot sa ibabaw ng pinupukol na wiki.',
	'push-special-err-pageget-failed' => 'Hindi makuha ang katutubong nilalaman ng pahina.',
	'push-special-err-push-failed' => 'Tinanggihan ng pinupukol na wiki ang itinulak na pahina.',
	'push-special-inc-files' => 'Isama ang ibinaong mga talaksan',
	'push-special-err-imginfo-failed' => 'Hindi matukoy kung may anumang mga talaksan na kailangang itulak.',
	'push-special-obtaining-fileinfo' => '$1: Kinukuha ang kabatiran ng talaksan...',
	'push-special-pushing-file' => '$1: Itinutulak ang talaksang $2...',
	'push-special-return' => 'Magtulak ng marami pang mga pahina',
	'push-api-err-nocurl' => 'Hindi naitalaga ang cURL.
Itakda ang $egPushDirectFileUploads upang maging mali sa pangmadlang mga wiki, o italaga ang cURL para sa pribadong mga wiki',
	'push-api-err-nofilesupport' => 'Ang katutubong MediaWiki ay walang pagtangkilik para sa pagpapaskil ng mga talaksan.
Sa pangmadlang mga wiki, itakda ang $egPushDirectFileUploads sa mali.
Sa pribadong mga wiki, ilapat ang pantapal na nakakawing mula sa dokumentasyon ng Itulak o isapanahon mismo ang MediaWiki.',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Mark85296341
 */
$messages['zh-hant'] = array(
	'push-add-target' => '新增目標',
	'push-tab-inc-templates' => '包含模板',
);

