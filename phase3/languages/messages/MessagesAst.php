<?php
/** Asturian (Asturianu)
 *
 * @addtogroup Language
 *
 * @author Esbardu
 * @author Helix84
 * @author Mikel
 * @author SPQRobin
 * @author לערי ריינהארט
 */

$namespaceNames = array(
	NS_MEDIA            => 'Media',
	NS_SPECIAL          => 'Especial',
	NS_MAIN             => '',
	NS_TALK             => 'Discusión',
	NS_USER             => 'Usuariu',
	NS_USER_TALK        => 'Usuariu_discusión',
	# NS_PROJECT set by $wgMetaNamespace
	NS_PROJECT_TALK     => '$1_discusión',
	NS_IMAGE            => 'Imaxen',
	NS_IMAGE_TALK       => 'Imaxen_discusión',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_discusión',
	NS_TEMPLATE         => 'Plantilla',
	NS_TEMPLATE_TALK    => 'Plantilla_discusión',
	NS_HELP             => 'Ayuda',
	NS_HELP_TALK        => 'Ayuda_discusión',
	NS_CATEGORY         => 'Categoría',
	NS_CATEGORY_TALK    => 'Categoría_discusión',
);

$messages = array(
# User preference toggles
'tog-underline'               => 'Sorrayar enllaces:',
'tog-highlightbroken'         => 'Da-y formatu a los enllaces rotos <a href="" class="new">como esti</a> (caxella desactivada: como esti<a href="" class="internal">?</a>).',
'tog-justify'                 => 'Xustificar parágrafos',
'tog-hideminor'               => 'Esconder ediciones menores nos cambeos recientes',
'tog-extendwatchlist'         => "Espander la llista de vixilancia p'amosar tolos cambeos aplicables",
'tog-usenewrc'                => 'Cambeos recientes ameyoraos (JavaScript)',
'tog-numberheadings'          => 'Autonumberar los encabezaos',
'tog-showtoolbar'             => "Amosar la barra de ferramientes d'edición (JavaScript)",
'tog-editondblclick'          => 'Editar páxines con doble clic (JavaScript)',
'tog-editsection'             => "Activar la edición de seiciones per aciu d'enllaces [editar]",
'tog-editsectiononrightclick' => 'Activar la edición de seiciones calcando col botón<br /> drechu enriba los títulos de seición (JavaScript)',
'tog-showtoc'                 => 'Amosar índiz (pa páxines con más de 3 encabezaos)',
'tog-rememberpassword'        => 'Recordar la clave ente sesiones',
'tog-editwidth'               => "La caxa d'edición tien el tamañu máximu",
'tog-watchcreations'          => 'Añader les páxines que creo a la mio llista de vixilancia',
'tog-watchdefault'            => "Añader les páxines qu'edito a la mio llista de vixilancia",
'tog-watchmoves'              => 'Añader les páxines que muevo a la mio llista de vixilancia',
'tog-watchdeletion'           => 'Añader les páxines que borro a la mio llista de vixilancia',
'tog-minordefault'            => 'Marcar toles ediciones como menores por defeutu',
'tog-previewontop'            => "Amosar previsualización enantes de la caxa d'edición",
'tog-previewonfirst'          => 'Amosar previsualización na primer edición',
'tog-nocache'                 => 'Desactivar la caché de les páxines',
'tog-enotifwatchlistpages'    => 'Mandame un corréu cuando cambie una páxina que toi vixilando',
'tog-enotifusertalkpages'     => 'Mandame un corréu cuando cambie la mio páxina de discusión',
'tog-enotifminoredits'        => 'Mandame tamién un corréu pa les ediciones menores',
'tog-enotifrevealaddr'        => 'Amosar el mio corréu electrónicu nos correos de notificación',
'tog-shownumberswatching'     => "Amosar el númberu d'usuarios que la tán vixilando",
'tog-fancysig'                => 'Firma ensin enllaz automáticu',
'tog-externaleditor'          => 'Usar un editor esternu por defeutu',
'tog-externaldiff'            => "Usar ''diff'' esternu por defeutu",
'tog-showjumplinks'           => 'Activar los enllaces d\'accesibilidá "saltar a"',
'tog-uselivepreview'          => 'Usar vista previa en direutu (JavaScript) (en pruebes)',
'tog-watchlisthideown'        => 'Esconder les mios ediciones na llista de vixilancia',
'tog-watchlisthidebots'       => 'Esconder les ediciones de bots na llista de vixilancia',
'tog-watchlisthideminor'      => 'Esconder les ediciones menores na llista de vixilancia',
'tog-ccmeonemails'            => 'Mandame copies de los correos que mando a otros usuarios',

'underline-always'  => 'Siempre',
'underline-never'   => 'Nunca',
'underline-default' => 'Valor por defeutu del navegador',

'skinpreview' => '(Previsualizar)',

# Dates
'sunday'        => 'domingu',
'monday'        => 'llunes',
'tuesday'       => 'martes',
'wednesday'     => 'miércoles',
'thursday'      => 'xueves',
'friday'        => 'vienres',
'saturday'      => 'sábadu',
'sun'           => 'dom',
'mon'           => 'llu',
'tue'           => 'mar',
'wed'           => 'mié',
'thu'           => 'xue',
'fri'           => 'vie',
'sat'           => 'sáb',
'january'       => 'xineru',
'february'      => 'febreru',
'march'         => 'marzu',
'april'         => 'abril',
'may_long'      => 'mayu',
'june'          => 'xunu',
'july'          => 'xunetu',
'august'        => 'agostu',
'september'     => 'setiembre',
'october'       => 'ochobre',
'november'      => 'payares',
'december'      => 'avientu',
'january-gen'   => 'xineru',
'february-gen'  => 'febreru',
'march-gen'     => 'marzu',
'april-gen'     => 'abril',
'may-gen'       => 'mayu',
'june-gen'      => 'xunu',
'july-gen'      => 'xunetu',
'august-gen'    => 'agostu',
'september-gen' => 'setiembre',
'october-gen'   => 'ochobre',
'november-gen'  => 'payares',
'december-gen'  => 'avientu',
'jan'           => 'xin',
'feb'           => 'feb',
'mar'           => 'mar',
'apr'           => 'abr',
'may'           => 'may',
'jun'           => 'xun',
'jul'           => 'xnt',
'aug'           => 'ago',
'sep'           => 'set',
'oct'           => 'och',
'nov'           => 'pay',
'dec'           => 'avi',

# Bits of text used by many pages
'categories'            => 'Categoríes',
'pagecategories'        => '{{PLURAL:$1|Categoría|Categoríes}}',
'category_header'       => 'Páxines na categoría "$1"',
'subcategories'         => 'Subcategoríes',
'category-media-header' => 'Ficheros multimedia na categoría "$1"',
'category-empty'        => "''Esta categoría nun tien anguaño nengún artículu o ficheru multimedia.''",

'mainpagetext'      => "<big>'''MediaWiki instalóse correchamente.'''</big>",
'mainpagedocfooter' => "Visita la [http://meta.wikimedia.org/wiki/Help:Contents Guía d'usuariu] pa saber cómo usar esti software wiki.

== Empecipiando ==

* [http://www.mediawiki.org/wiki/Manual:Configuration_settings Llista de les opciones de configuración]
* [http://www.mediawiki.org/wiki/Manual:FAQ FAQ de MediaWiki]
* [http://lists.wikimedia.org/mailman/listinfo/mediawiki-announce Llista de corréu de les ediciones de MediaWiki]",

'about'          => 'Tocante a',
'article'        => 'Conteníu de la páxina',
'newwindow'      => '(abriráse nuna ventana nueva)',
'cancel'         => 'Cancelar',
'qbfind'         => 'Alcontrar',
'qbedit'         => 'Editar',
'qbpageoptions'  => 'Esta páxina',
'qbpageinfo'     => 'Contestu',
'qbmyoptions'    => 'Les mios páxines',
'qbspecialpages' => 'Páxines especiales',
'moredotdotdot'  => 'Más...',
'mypage'         => 'La mio páxina',
'mytalk'         => 'La mio páxina de discusión',
'anontalk'       => 'Discusión pa esta IP',
'navigation'     => 'Navegación',

'errorpagetitle'    => 'Error',
'returnto'          => 'Vuelve a $1.',
'tagline'           => 'De {{SITENAME}}',
'help'              => 'Ayuda',
'search'            => 'Buscar',
'searchbutton'      => 'Buscar',
'go'                => 'Dir',
'searcharticle'     => 'Dir',
'history'           => 'Historial de la páxina',
'history_short'     => 'Historial',
'updatedmarker'     => 'actualizáu dende la mio última visita',
'info_short'        => 'Información',
'printableversion'  => 'Versión pa imprentar',
'permalink'         => 'Enllaz permanente',
'print'             => 'Imprentar',
'edit'              => 'Editar',
'editthispage'      => 'Editar esta páxina',
'delete'            => 'Borrar',
'deletethispage'    => 'Borrar esta páxina',
'protect'           => 'Protexer',
'protectthispage'   => 'Protexer esta páxina',
'unprotect'         => 'Desprotexer',
'unprotectthispage' => 'Desprotexer esta páxina',
'newpage'           => 'Páxina nueva',
'talkpage'          => 'Discutir esta páxina',
'talkpagelinktext'  => 'discusión',
'specialpage'       => 'Páxina especial',
'personaltools'     => 'Ferramientes personales',
'postcomment'       => 'Escribir un comentariu',
'articlepage'       => 'Ver conteníu de la páxina',
'talk'              => 'Discusión',
'views'             => 'Vistes',
'toolbox'           => 'Ferramientes',
'userpage'          => "Ver páxina d'usuariu",
'categorypage'      => 'Ver páxina de categoríes',
'viewtalkpage'      => 'Ver discusión',
'otherlanguages'    => 'Otres llingües',
'redirectedfrom'    => '(Redirixío dende $1)',
'redirectpagesub'   => 'Páxina de redirección',
'lastmodifiedat'    => "Esta páxina foi modificada per postrer vegada'l $1 a les $2.", # $1 date, $2 time
'viewcount'         => 'Esta páxina foi vista {{PLURAL:$1|una vegada|$1 vegaes}}.',
'protectedpage'     => 'Páxina protexida',
'jumptonavigation'  => 'navegación',
'jumptosearch'      => 'busca',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'         => 'Tocante a {{SITENAME}}',
'aboutpage'         => 'Project:Tocante a',
'bugreports'        => "Informes d'errores",
'bugreportspage'    => "Project:Informes d'errores",
'copyright'         => 'Esti conteníu ta disponible baxo los términos de la  $1.',
'copyrightpagename' => "Drechos d'autor de {{SITENAME}}",
'copyrightpage'     => "{{ns:project}}:Derechos d'autor",
'currentevents'     => 'Fechos actuales',
'currentevents-url' => 'Project:Fechos actuales',
'disclaimers'       => 'Avisu llegal',
'disclaimerpage'    => 'Project:Llimitación xeneral de responsabilidá',
'edithelp'          => "Aida d'edición",
'edithelppage'      => 'Help:Edición de páxines',
'faqpage'           => 'Project:Entrugues más frecuentes',
'helppage'          => 'Help:Conteníos',
'mainpage'          => 'Portada',
'portal'            => 'Portal de la comunidá',
'portal-url'        => 'Project:Portal de la comunidá',
'privacy'           => 'Politica de privacidá',
'privacypage'       => 'Project:Política de privacidá',
'sitesupport'       => 'Donativos',
'sitesupport-url'   => 'Project:Donativos',

'badaccess'        => 'Error de permisos',
'badaccess-group0' => "Nun tienes permisu pa executar l'aición solicitada.",
'badaccess-group1' => "L'aición solicitada ta llimitada a usuarios del grupu $1.",
'badaccess-group2' => "L'aición solicitada ta llimitada a usuarios d'ún de los grupos $1.",
'badaccess-groups' => "L'aición solicitada ta llimitada a usuarios d'ún de los grupos $1.",

'retrievedfrom'           => 'Obtenío de "$1"',
'youhavenewmessages'      => 'Tienes $1 ($2).',
'newmessageslink'         => 'mensaxes nuevos',
'newmessagesdifflink'     => 'últimu cambéu',
'youhavenewmessagesmulti' => 'Tienes mensaxes nuevos en $1',
'editsection'             => 'editar',
'editold'                 => 'editar',
'editsectionhint'         => 'Editar seición: $1',
'toc'                     => 'Tabla de conteníos',
'showtoc'                 => 'amosar',
'hidetoc'                 => 'esconder',
'thisisdeleted'           => '¿Ver o restaurar $1?',
'viewdeleted'             => '¿Ver $1?',
'restorelink'             => '{{PLURAL:$1|una edición borrada|$1 ediciones borraes}}',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Páxina',
'nstab-user'      => "Páxina d'usuariu",
'nstab-special'   => 'Especial',
'nstab-project'   => 'Páxina de proyeutu',
'nstab-image'     => 'Imaxe',
'nstab-mediawiki' => 'Mensaxe',
'nstab-template'  => 'Plantía',
'nstab-help'      => 'Aida',
'nstab-category'  => 'Categoría',

# Main script and global functions
'nosuchaction'      => 'Nun esiste esa aición',
'nosuchspecialpage' => 'Nun esiste esa páxina especial',
'nospecialpagetext' => "<big>'''Pidisti una páxina especial non válida.'''</big>

Pues consultar la llista de les páxines especiales válides en [[Special:Specialpages]].",

# General errors
'databaseerror'        => 'Error na base de datos',
'dberrortext'          => 'Hebo un error de sintaxis nuna consulta de la base de datos.
Esti error pue debese a un fallu del software.
La postrer consulta que s\'intentó foi:
<blockquote><tt>$1</tt></blockquote>
dende la función "<tt>$2</tt>".
MySQL retornó l\'error "<tt>$3: $4</tt>".',
'dberrortextcl'        => 'Hebo un error de sintaxis nuna consulta a la base de datos.
La postrer consulta que s\'intentó foi:
"$1"
dende la función "$2".
MySQL retornó l\'error "$3: $4"',
'noconnect'            => '¡Sentímoslo muncho! La wiki ta sufriendo delles dificultaes téuniques y nun pue contautar col servidor de la base de datos. <br />
$1',
'cachederror'          => 'Esta ye una copia sacada del caché de la páxina solicitada y pue nun tar actualizada.',
'laggedslavemode'      => 'Avisu: Esta páxina pue que nun tenga actualizaciones recientes.',
'enterlockreason'      => 'Introduz una razón pa la proteición, amiestando una estimación de cuándo va ser llevantada esta',
'internalerror'        => 'Error internu',
'internalerror_info'   => 'Error internu: $1',
'filecopyerror'        => 'Nun se pudo copiar l\'archivu "$1" como "$2".',
'filerenameerror'      => 'Nun se pudo renomar l\'archivu "$1" como "$2".',
'filedeleteerror'      => 'Nun se pudo borrar l\'archivu "$1".',
'directorycreateerror' => 'Nun se pudo crear el direutoriu "$1".',
'filenotfound'         => 'Nun se pudo atopar l\'archivu "$1".',
'badarticleerror'      => 'Esta aición nun pue facese nesta páxina',
'cannotdelete'         => 'Nun se pudo borrar la páxina o imaxe seleicionada (seique daquién yá la borrara).',
'badtitle'             => 'Títulu incorreutu',
'badtitletext'         => 'El títulu de páxina solicitáu nun ye válidu, ta vaciu o tien enllaces inter-llingua o inter-wiki incorreutos. Pue que contenga ún o más carauteres que nun puen ser usaos nos títulos.',
'perfcached'           => 'Los siguientes datos tán na caché y pue que nun tean completamente actualizaos.',
'perfcachedts'         => "Los siguientes datos tán na caché y actualizáronse la última vegada'l $1.",
'viewsource'           => 'Ver códigu fonte',
'viewsourcetext'       => "Pues ver y copiar el códigu fonte d'esta páxina:",
'protectedinterface'   => "Esta páxina proporciona testu d'interfaz a l'aplicación y ta protexida pa evitar el so abusu.",
'editinginterface'     => "'''Avisu:''' Tas editando una páxina usada pa proporcionar testu d'interfaz a l'aplicación. Los cambeos nesta páxina va afeuta-yos l'apariencia de la interfaz a otros usuarios.",
'cascadeprotected'     => 'Esta páxina ta protexida d\'ediciones porque ta enxerta {{PLURAL:$1|na siguiente páxina|nes siguientes páxines}}, que {{PLURAL:$1|ta protexida|tán protexíes}} cola opción "en cascada":',
'customcssjsprotected' => "Nun tienes permisu pa editar esta páxina porque contién preferencies personales d'otru usuariu.",

# Login and logout pages
'logouttext'                 => "<strong>Yá tas desconectáu.</strong><br />
Pues siguir usando {{SITENAME}} de forma anónima, o pues volver a entrar como'l mesmu o como otru usuariu.
Ten en cuenta que dalgunes páxines van continuar saliendo como si tovía tuvieres coneutáu, hasta que llimpies la caché del navegador.",
'welcomecreation'            => "== Bienveníu, $1! ==

La to cuenta ta creada. Nun t'escaezas d'escoyer les tos preferencies de {{SITENAME}}.",
'loginpagetitle'             => "Identificación d'usuariu",
'yourname'                   => "Nome d'usuariu:",
'yourpassword'               => 'Clave:',
'yourpasswordagain'          => 'Reescribi la to clave:',
'remembermypassword'         => 'Recordar la mio identificación nesti ordenador',
'yourdomainname'             => 'El to dominiu:',
'login'                      => 'Entrar',
'loginprompt'                => "Has tener les ''cookies'' activaes pa entrar en {{SITENAME}}.",
'userlogin'                  => 'Entrar / Crear cuenta',
'logout'                     => 'Salir',
'userlogout'                 => 'Salir',
'notloggedin'                => 'Non identificáu',
'nologin'                    => '¿Nun tienes una cuenta? $1.',
'nologinlink'                => '¡Fai una!',
'createaccount'              => 'Crear una nueva cuenta',
'gotaccount'                 => '¿Ya tienes una cuenta? $1.',
'gotaccountlink'             => '¡Identifícate!',
'createaccountmail'          => 'per e-mail',
'badretype'                  => "Les claves qu'escribisti nun concuayen.",
'youremail'                  => 'Corréu electrónicu:',
'username'                   => "Nome d'usuariu:",
'uid'                        => "Númberu d'usuariu:",
'yourrealname'               => 'Nome real:',
'yourlanguage'               => 'Idioma de los menús:',
'yournick'                   => 'Nomatu:',
'badsig'                     => 'Firma cruda non válida; comprueba les etiquetes HTML.',
'badsiglength'               => 'Nomatu demasiao llargu; ha tener menos de $1 carauteres.',
'email'                      => 'Corréu',
'prefs-help-email'           => "La direición de corréu ye opcional, pero permite a los demás contautar contigo al traviés de la to páxina d'usuariu ensin necesidá de revelar la to identidá.",
'noname'                     => "Nun punxisti un nome d'usuariu válidu.",
'loginsuccesstitle'          => 'Identificación correuta',
'loginsuccess'               => "'''Quedasti identificáu en {{SITENAME}} como \"\$1\".'''",
'nosuchuser'                 => 'Nun hai nengún usuariu col nome "$1". Corrixi la escritura o crea una nueva cuenta d\'usuariu.',
'nosuchusershort'            => 'Nun hai nengún usuariu col nome "$1". Mira que tea bien escritu.',
'nouserspecified'            => "Has especificar un nome d'usuariu.",
'wrongpassword'              => 'Clave errónea.  Inténtalo otra vuelta.',
'wrongpasswordempty'         => 'La clave taba en blanco. Inténtalo otra vuelta.',
'passwordtooshort'           => "La to clave nun ye válida o ye demasiao curtia. Ha tener a lo menos $1 carauteres y ser distinta del to nome d'usuariu.",
'mailmypassword'             => 'Unviame per corréu la clave',
'noemail'                    => 'L\'usuariu "$1" nun tien puesta dirección de corréu.',
'blocked-mailpassword'       => 'La edición ta bloquiada dende la to direición IP, y por tanto
nun se pue usar la función de recuperación de clave pa evitar abusos.',
'eauthentsent'               => "Unvióse una confirmación de corréu electrónicu a la direición indicada.
Enantes de que s'unvie nengún otru corréu a la cuenta, has siguir les instrucciones del corréu electrónicu, pa confirmar que la cuenta ye de to.",
'acct_creation_throttle_hit' => 'Yá creasti $1 cuentes. Nun pues abrir más.',
'emailauthenticated'         => 'La to dirección de corréu confirmóse a les $1.',
'emailnotauthenticated'      => 'La to dirección de corréu nun ta comprobada. Hasta que se faiga, les siguientes funciones nun tarán disponibles.',
'emailconfirmlink'           => 'Confirmar la dirección de corréu',
'accountcreated'             => 'Cuenta creada',
'accountcreatedtext'         => "La cuenta d'usuariu de $1 ta creada.",
'loginlanguagelabel'         => 'Llingua: $1',

# Edit page toolbar
'bold_sample'     => 'Testu en negrina',
'bold_tip'        => 'Testu en negrina',
'italic_sample'   => 'Testu en cursiva',
'italic_tip'      => 'Testu en cursiva',
'link_tip'        => 'Enllaz internu',
'extlink_sample'  => 'http://www.exemplu.com títulu del enllaz',
'extlink_tip'     => "Enllaz esternu (recuerda'l prefixu http://)",
'headline_sample' => 'Testu de cabecera',
'headline_tip'    => 'Testu cabecera nivel 2',
'math_sample'     => 'Inxertar fórmula equí',
'math_tip'        => 'Fórmula matemática',
'image_sample'    => 'Exemplu.jpg',
'image_tip'       => 'Inxertar imaxe',
'media_sample'    => 'Exemplu.ogg',
'hr_tip'          => 'Llinia horizontal (úsala con moderación)',

# Edit pages
'summary'                  => 'Resume',
'subject'                  => 'Asuntu/títulu',
'minoredit'                => 'Esta ye una edición menor',
'watchthis'                => 'Vixilar esta páxina',
'savearticle'              => 'Grabar páxina',
'preview'                  => 'Previsualizar',
'showpreview'              => 'Amosar previsualización',
'showdiff'                 => 'Amosar cambeos',
'anoneditwarning'          => "'''Avisu:''' Nun tas identificáu. La to IP va quedar grabada nel historial d'edición d'esta páxina.",
'blockedtitle'             => "L'usuariu ta bloquiáu",
'blockednoreason'          => 'nun se dio razón dala',
'blockedoriginalsource'    => "El códigu fonte de '''$1''' amuésase equí:",
'blockededitsource'        => "El testu de '''les tos ediciones''' en '''$1''' amuésense equí:",
'whitelistedittitle'       => 'Ye necesario tar identificáu pa poder editar',
'whitelistedittext'        => 'Tienes que $1 pa editar páxines.',
'whitelistacctitle'        => 'Nun tienes permisu pa crear una cuenta',
'confirmedittitle'         => 'Requerida la confirmación de corréu electrónicu pa editar',
'confirmedittext'          => "Has confirmar la to direición de corréu electrónicu enantes d'editar páxines. Por favor, configúrala y valídala nes tos [[Special:Preferences|preferencies d'usuariu]].",
'accmailtitle'             => 'Clave unviada.',
'accmailtext'              => 'La clave de "$1" foi unviada a $2.',
'newarticle'               => '(Nuevu)',
'newarticletext'           => 'Siguisti un enllaz a un artículu qu\'inda nun esiste. Pa crealu, empecipia a escribir na caxa d\'equí embaxo. Si llegasti equí por enquivocu, namás tienes que calcar nel botón "atrás" del to navegador.',
'anontalkpagetext'         => "----''Esta ye la páxina de discusión pa un usuariu anónimu qu'inda nun creó una cuenta o que nun la usa. Pola mor d'ello ha usase la direición numérica IP pa identificalu/la. Tala IP pue ser compartida por varios usuarios. Si yes un usuariu anónimu y notes qu'hai comentarios irrelevantes empobinaos pa ti, por favor [[Special:Userlogin|crea una cuenta o rexístrate]] pa evitar futures confusiones con otros usuarios anónimos.''",
'noarticletext'            => "Nestos momentos nun hai testu nesta páxina. Pues [[Special:Search/{{PAGENAME}}|buscar esti títulu]] n'otres páxines, o [{{fullurl:{{FULLPAGENAME}}|action=edit}} editar ésta equí].",
'clearyourcache'           => "'''Nota:''' Llueu de salvar, seique tengas que llimpiar la caché del navegador pa ver los cambeos.
*'''Mozilla / Firefox / Safari:''' caltién ''Shift'' mentes calques en ''Reload'', o calca ''Ctrl-Shift-R'' (''Cmd-Shift-R'' en Apple Mac)
*'''IE:''' caltién ''Ctrl'' mentes calques ''Refresh'', o calca ''Ctrl-F5''
*'''Konqueror:''' calca nel botón ''Reload'', o calca ''F5''
*'''Opera:''' los usuarios d'Opera seique necesiten borrar dafechu'l caché en ''Tools→Preferences''",
'note'                     => '<strong>Nota:</strong>',
'previewnote'              => "<strong>¡Alcuérdate de qu'esto ye sólo una previsualización y los cambeos entá nun se grabaron!</strong>",
'session_fail_preview'     => "<strong>¡Sentímoslo muncho! Nun se pudo procesar la to edición porque hebo una perda de datos de la sesión.
Inténtalo otra vuelta. Si nun se t'arregla, intenta salir y volver a rexistrate.</strong>",
'editing'                  => 'Editando $1',
'editinguser'              => "Editando l'usuariu <b>$1</b>",
'editingsection'           => 'Editando $1 (seición)',
'editingcomment'           => 'Editando $1 (comentariu)',
'editconflict'             => "Conflictu d'edición: $1",
'yourtext'                 => 'El to testu',
'editingold'               => "<strong>AVISU: Tas editando una versión vieya d'esta páxina. Si la grabes, los cambeos que se ficieron dende esa versión van perdese.</strong>",
'yourdiff'                 => 'Diferencies',
'longpagewarning'          => '<strong>AVISU: Esta páxina tien más de $1 quilobytes; dellos navegadores puen tener problemes editando páxines de 32 ó más kb. Habríes dixebrar la páxina en seiciones más pequeñes.</strong>',
'readonlywarning'          => '<strong>AVISU: La base de datos ta protexida por mantenimientu,
polo que nun vas poder grabar les tos ediciones nestos momentos. Seique habríes copiar
el testu nun archivu de testu y grabalu pa intentalo lluéu. </strong>',
'protectedpagewarning'     => '<strong>AVISU: Esta páxina ta protexida pa que sólo los alministradores puean editala.</strong>',
'semiprotectedpagewarning' => "'''Nota:''' Esta páxina foi protexida pa que nun puean editala namái que los usuarios rexistraos.",
'cascadeprotectedwarning'  => "'''Avisu:''' Esta páxina ta protexida pa que namái los alministradores la puean editar porque ta enxerta {{PLURAL:$1|na siguiente páxina protexida|nes siguientes páxines protexíes}} en cascada:",
'templatesused'            => 'Plantíes usaes nesta páxina:',
'templatesusedpreview'     => 'Plantíes usaes nesta previsualización:',
'template-protected'       => '(protexida)',
'template-semiprotected'   => '(semi-protexida)',
'nocreatetitle'            => 'Creación de páxines limitada',
'recreate-deleted-warn'    => "'''Avisu: Tas volviendo a crear una páxina que foi borrada anteriormente.'''

Habríes considerar si ye afechisco siguir editando esta páxina.
Equí tienes el rexistru de borraos d'esta páxina:",

# Account creation failure
'cantcreateaccounttitle' => 'Nun se pue crear la cuenta',
'cantcreateaccount-text' => "La creación de cuentes dende esta direición IP (<b>$1</b>) foi bloquiada por [[Usuariu:$3|$3]].

La razón dada por $3 ye ''$2''",

# History pages
'viewpagelogs'        => "Ver rexistros d'esta páxina",
'nohistory'           => "Nun hay historial d'ediciones pa esta páxina.",
'currentrev'          => 'Revisión actual',
'revisionasof'        => 'Revisión de $1',
'previousrevision'    => '←Revisión anterior',
'nextrevision'        => 'Revisión siguiente→',
'currentrevisionlink' => 'Revisión actual',
'cur'                 => 'act',
'next'                => 'próximu',
'last'                => 'cab',
'page_first'          => 'primera',
'page_last'           => 'cabera',
'histlegend'          => "Seleición de diferencies: marca los botones de les versiones que quies comparar y da-y al <i>enter</i> o al botón d'abaxo.<br />
Lleenda: '''(act)''' = diferencies cola versión actual,
'''(cab)''' = diferencies cola versión anterior, '''m''' = edición menor.",
'deletedrev'          => '[borráu]',
'histfirst'           => 'Primera',
'histlast'            => 'Cabera',

# Diffs
'difference'              => '(Diferencia ente revisiones)',
'lineno'                  => 'Llinia $1:',
'compareselectedversions' => 'Comparar les versiones seleicionaes',
'editundo'                => 'esfacer',
'diff-multi'              => '(Non {{PLURAL:$1|amosada una revisión intermedia|amosaes $1 revisiones intermedies}}.)',

# Search results
'searchresults'         => 'Resultaos de la busca',
'searchsubtitle'        => "Buscasti '''[[:$1]]'''",
'searchsubtitleinvalid' => "Buscasti '''$1'''",
'noexactmatch'          => "'''Nun esiste la páxina \"\$1\".''' Pues [[:\$1|crear esta páxina]].",
'prevn'                 => 'previos $1',
'nextn'                 => 'siguientes $1',
'viewprevnext'          => 'Ver ($1) ($2) ($3)',
'showingresults'        => "Ver abaxo {{PLURAL:$3|'''un''' resultáu|'''$3''' resultaos}} entamando col #'''$2'''.",
'showingresultsnum'     => "Ver abaxo {{PLURAL:$3|'''un''' resultáu|'''$3''' resultaos}} entamando con #'''$2'''.",
'powersearch'           => 'Buscar',
'powersearchtext'       => 'Buscar nel espaciu de nomes:<br />$1<br />$2 Llistar redireiciones<br />Buscar $3 $9',

# Preferences page
'preferences'           => 'Preferencies',
'mypreferences'         => 'Les mios preferencies',
'prefs-edits'           => "Númberu d'ediciones:",
'prefsnologintext'      => 'Necesites tar [[Special:Userlogin|identificáu]] pa poder camudar les preferencies.',
'changepassword'        => 'Camudar clave',
'skin'                  => 'Apariencia',
'math'                  => 'Fórmules matemátiques',
'dateformat'            => 'Formatu de fecha',
'datedefault'           => 'Ensin preferencia',
'datetime'              => 'Fecha y hora',
'math_unknown_error'    => 'error desconocíu',
'math_unknown_function' => 'función desconocida',
'math_syntax_error'     => 'error de sintaxis',
'prefs-personal'        => 'Datos personales',
'prefs-rc'              => 'Cambeos recientes',
'prefs-watchlist'       => 'Llista de vixilancia',
'prefs-watchlist-days'  => "Númberu de díes qu'amosar na llista de vixilancia:",
'prefs-watchlist-edits' => "Númberu d'ediciones qu'amosar na llista de vixilancia espandida:",
'prefs-misc'            => 'Varios',
'saveprefs'             => 'Guardar preferencies',
'resetprefs'            => 'Volver a les preferencies por defeutu',
'oldpassword'           => 'Clave vieya:',
'newpassword'           => 'Clave nueva:',
'retypenew'             => 'Repiti la nueva clave:',
'textboxsize'           => 'Edición',
'rows'                  => 'Files:',
'columns'               => 'Columnes:',
'searchresultshead'     => 'Busques',
'resultsperpage'        => "Resultaos p'amosar per páxina:",
'contextlines'          => "Llinies p'amosar per resultáu:",
'contextchars'          => 'Carauteres de testu per llinia:',
'recentchangescount'    => "Númberu d'ediciones amosaes en cambeos recientes:",
'savedprefs'            => 'Les tos preferencies quedaron grabaes.',
'timezonelegend'        => 'Zona horaria',
'timezonetext'          => 'Diferencia horaria ente la UTC y la to hora llocal.',
'localtime'             => 'Hora llocal',
'timezoneoffset'        => 'Diferencia¹',
'servertime'            => 'Hora del servidor',
'guesstimezone'         => 'Obtener del navegador',
'allowemail'            => 'Dexar a los otros usuarios mandate correos',
'defaultns'             => 'Buscar por defeutu nestos espacios de nome:',
'default'               => 'por defeutu',
'files'                 => 'Archivos',

# User rights
'editusergroup' => "Modificar grupos d'usuarios",

# Groups
'group'            => 'Grupu:',
'group-sysop'      => 'Alministradores',
'group-bureaucrat' => 'Burócrates',
'group-all'        => '(toos)',

'group-sysop-member'      => 'Alministrador',
'group-bureaucrat-member' => 'Burócrata',

'grouppage-bot'        => '{{ns:project}}:Bots',
'grouppage-sysop'      => '{{ns:project}}:Alministradores',
'grouppage-bureaucrat' => '{{ns:project}}:Burócrates',

# User rights log
'rightslog'     => "Rexistru de perfil d'usuariu",
'rightslogtext' => "Esti ye un rexistru de los cambeos de los perfiles d'usuariu.",

# Recent changes
'nchanges'        => '{{PLURAL:$1|un cambéu|$1 cambeos}}',
'recentchanges'   => 'Cambeos recientes',
'rcnotefrom'      => 'Abaxo tán los cambeos dende <b>$2</b> (hasta <b>$1</b>).',
'rclistfrom'      => 'Amosar los cambeos recientes dende $1',
'rcshowhideminor' => '$1 ediciones menores',
'rcshowhideliu'   => '$1 usuarios rexistraos',
'rcshowhideanons' => '$1 usuarios anónimos',
'rcshowhidemine'  => '$1 les mios ediciones',
'rclinks'         => 'Amosar los caberos $1 cambeos nos caberos $2 díes <br />$3',
'diff'            => 'dif',
'hist'            => 'hist',
'hide'            => 'Esconder',
'show'            => 'Amosar',
'minoreditletter' => 'm',
'newpageletter'   => 'N',
'boteditletter'   => 'b',

# Recent changes linked
'recentchangeslinked' => 'Cambeos rellacionaos',

# Upload
'upload'            => 'Xubir imaxe',
'uploadbtn'         => 'Xubir',
'uploadnologin'     => 'Nun tas identificáu',
'uploadnologintext' => 'Tienes que tar [[Special:Userlogin|identificáu]] pa poder xubir archivos.',
'uploaderror'       => 'Error de xubida',
'uploadlog'         => 'rexistru de xubíes',
'uploadlogpage'     => 'Rexistru de xubíes',
'filedesc'          => 'Resume',
'fileuploadsummary' => 'Resume:',
'filesource'        => 'Fonte',
'uploadedfiles'     => 'Archivos xubíos',
'badfilename'       => 'Nome de la imaxe camudáu a "$1".',
'largefileserver'   => 'Esti archivu ye mayor de lo que permite la configuración del servidor.',
'emptyfile'         => "L'archivu que xubisti paez tar vaciu. Esto podría ser pola mor d'un enquivocu nel nome l'archivu. Por favor, camienta si daveres quies xubir esti archivu.",
'successfulupload'  => 'Xubida correuta',
'uploadedimage'     => 'Xubíu "[[$1]]"',
'sourcefilename'    => "Nome d'orixe",
'destfilename'      => 'Nome de destín',
'watchthisupload'   => 'Vixilar esta páxina',

'nolicense' => 'Nenguna seleicionada',

# Image list
'imagelist'                 => "Llista d'imáxenes",
'imagelisttext'             => "Embaxo ta la llista {{PLURAL:$1|d'un archivu ordenáu|de '''$1''' archivos ordenaos}} $2.",
'ilsubmit'                  => 'Buscar',
'showlast'                  => 'Amosar los últimos $1 archivos ordenaos $2.',
'byname'                    => 'por nome',
'bydate'                    => 'por fecha',
'bysize'                    => 'por tamañu',
'filehist-datetime'         => 'Fecha/Hora',
'filehist-user'             => 'Usuariu',
'filehist-dimensions'       => 'Dimensiones',
'filehist-filesize'         => 'Tamañu del archivu',
'imagelinks'                => 'Enllaces a esta imaxe',
'linkstoimage'              => 'Les páxines siguientes enllacien a esti archivu:',
'nolinkstoimage'            => "Nun hai páxines qu'enllacien a esti archivu.",
'noimage'                   => 'Nun esiste archivu dalu con esi nome, pues $1.',
'noimage-linktext'          => 'xubilu',
'uploadnewversion-linktext' => "Xubir una nueva versión d'esta imaxe",
'imagelist_date'            => 'Fecha',
'imagelist_name'            => 'Nome',
'imagelist_description'     => 'Descripción',

# MIME search
'mimesearch' => 'Busca MIME',
'download'   => 'descargar',

# Unwatched pages
'unwatchedpages' => 'Páxines ensin vixilar',

# List redirects
'listredirects' => 'Llista de redireiciones',

# Unused templates
'unusedtemplates' => 'Plantíes ensin usu',

# Random page
'randompage' => 'Páxina al debalu',

# Random redirect
'randomredirect' => 'Redireición al debalu',

# Statistics
'statistics'    => 'Estadístiques',
'sitestats'     => 'Estadístiques de {{SITENAME}}',
'userstats'     => "Estadístiques d'usuariu",
'sitestatstext' => "Hai un total {{PLURAL:\$1|d''''una''' páxina|de '''\$1''' páxines}} na base de datos.
Inclúi páxines de \"discusión\" , páxines sobre {{SITENAME}}, \"entamos\" mínimos,
redireiciones y otres que nun puen cuntar como páxines.  Ensin estes, hai {{PLURAL:\$2|'''una''' páxina|'''\$2''' páxines}} que son artículos llexítimos.

Hai {{PLURAL:\$8|xubida '''una''' imaxe|xubíes '''\$8''' imáxenes}}.

Hebo un total {{PLURAL:\$3|d''''una''' páxina visitada|de '''\$3''' páxines visitaes}}, y {{PLURAL:\$4|'''una''' edición|'''\$4''' ediciones}} dende qu'entamó {{SITENAME}}.
Esto fai una media de '''\$5''' ediciones per páxina, y '''\$6''' visites per edición.

La [http://meta.wikimedia.org/wiki/Help:Job_queue cola de xeres] ye de '''\$7'''.",

'disambiguations'      => 'Páxines de dixebra',
'disambiguationspage'  => 'Template:dixebra',
'disambiguations-text' => "Les siguientes páxines enllacien a una '''páxina de dixebra'''. En cuenta d'ello habríen enllaciar al artículu apropiáu.<br />Una páxina considérase de dixebra si usa una plantilla que tea enllaciada dende [[MediaWiki:disambiguationspage]].",

'doubleredirects'     => 'Redireiciones dobles',
'doubleredirectstext' => 'Esta páxina llista páxines que redireicionen a otres páxines de redireición. Cada filera contién enllaces a la primer y segunda redireición, asina como al oxetivu de la segunda redireición, que normalmente ye la páxina oxetivu "real", aonde la primer redireición habría empobinar.',

'brokenredirects'        => 'Redireiciones rotes',
'brokenredirectstext'    => 'Les siguientes redireiciones enllacien a páxines que nun esisten:',
'brokenredirects-edit'   => '(editar)',
'brokenredirects-delete' => '(borrar)',

'withoutinterwiki' => 'Páxines ensin interwikis',

'fewestrevisions' => "Páxines col menor númberu d'ediciones",

# Miscellaneous special pages
'nbytes'                  => '$1 {{PLURAL:$1|byte|bytes}}',
'ncategories'             => '$1 {{PLURAL:$1|categoría|categoríes}}',
'nlinks'                  => '$1 {{PLURAL:$1|enllaz|enllaces}}',
'nmembers'                => '$1 {{PLURAL:$1|miembru|miembros}}',
'nrevisions'              => '$1 {{PLURAL:$1|revisión|revisiones}}',
'lonelypages'             => 'Páxines güérfanes',
'uncategorizedpages'      => 'Páxines non categorizaes',
'uncategorizedcategories' => 'Categoríes non categorizaes',
'uncategorizedimages'     => 'Imáxenes non categorizaes',
'uncategorizedtemplates'  => 'Plantíes non categorizaes',
'unusedcategories'        => 'Categoríes non usaes',
'unusedimages'            => 'Imáxenes non usaes',
'wantedcategories'        => 'Categoríes buscaes',
'wantedpages'             => 'Páxines buscaes',
'mostlinked'              => 'Páxines más enllaciaes',
'mostlinkedcategories'    => 'Categoríes más enllaciaes',
'mostcategories'          => 'Páxines con más categoríes',
'mostimages'              => 'Imáxenes más enllaciaes',
'mostrevisions'           => 'Páxines con más revisiones',
'allpages'                => 'Toles páxines',
'prefixindex'             => 'Páxines por prefixu',
'shortpages'              => 'Páxines curties',
'longpages'               => 'Páxines llargues',
'deadendpages'            => 'Páxines ensin salida',
'deadendpagestext'        => "Les páxines siguientes nun enllacien a páxina dala d'esta wiki.",
'protectedpages'          => 'Páxines protexíes',
'listusers'               => "Llista d'usuarios",
'specialpages'            => 'Páxines especiales',
'spheading'               => 'Páxines especiales pa tolos usuarios',
'restrictedpheading'      => 'Páxines especiales restrinxíes',
'rclsub'                  => '(a páxines enllaciaes dende "$1")',
'newpages'                => 'Páxines nueves',
'newpages-username'       => "Nome d'usuariu:",
'ancientpages'            => 'Páxines más vieyes',
'intl'                    => 'Interwikis',
'move'                    => 'Treslladar',
'movethispage'            => 'Treslladar esta páxina',
'unusedcategoriestext'    => "Les siguientes categoríes esisten magar que nengún artículu o categoría faiga usu d'elles.",

# Book sources
'booksources'               => 'Fontes de llibros',
'booksources-search-legend' => 'Busca de fontes de llibros',
'booksources-go'            => 'Dir',
'booksources-text'          => "Esta ye una llista d'enllaces a otros sitios que vienden llibros nuevos y usaos, y que puen tener más información sobre llibros que pueas tar guetando:",

'categoriespagetext' => 'Les categoríes que vienen darréu esisten na wiki.',
'data'               => 'Datos',
'alphaindexline'     => '$1 a $2',
'version'            => 'Versión',

# Special:Log
'specialloguserlabel'  => 'Usuariu:',
'speciallogtitlelabel' => 'Títulu:',
'log'                  => 'Rexistros',
'all-logs-page'        => 'Tolos rexistros',
'log-search-submit'    => 'Dir',
'alllogstext'          => "Visualización combinada de tolos rexistros disponibles de {{SITENAME}}. Pues filtrar la visualización seleicionando una mena de rexistru, el nome d'usuariu o la páxina afectada.",
'logempty'             => 'Nun hai coincidencies nel rexistru.',

# Special:Allpages
'nextpage'          => 'Páxina siguiente ($1)',
'allpagesfrom'      => "Amosar páxines qu'entamen por:",
'allarticles'       => 'Toles páxines',
'allinnamespace'    => 'Toles páxines (espaciu de nomes $1)',
'allnotinnamespace' => 'Toles páxines (sacantes les del espaciu de nomes $1)',
'allpagesprev'      => 'Anteriores',
'allpagesnext'      => 'Siguientes',
'allpagessubmit'    => 'Dir',
'allpagesprefix'    => 'Amosar páxines col prefixu:',
'allpagesbadtitle'  => "El títulu dau a esta páxina nun yera válidu o tenía un prefixu d'enllaz interllingua o interwiki. Pue contener ún o más carauteres que nun se puen usar nos títulos.",
'allpages-bad-ns'   => '{{SITENAME}} nun tien l\'espaciu de nomes "$1".',

# Special:Listusers
'listusersfrom' => 'Amosar usuarios emprimando dende:',

# E-mail user
'emailuser'       => 'Manda-y un email a esti usuariu',
'emailpage'       => "Corréu d'usuariu",
'emailpagetext'   => "Si esti usuariu metió una direición de corréu electrónicu válida nes sos preferencies d'usuariu, el formulariu d'embaxo va unviar un mensaxe simple. La direición de corréu electrónicu que metisti nes tos preferencies d'usuariu va apaecer como la direición \"Dende\" del corréu, pa que'l que lo recibe seya quien a responder.",
'defemailsubject' => 'Corréu electrónicu de {{SITENAME}}',
'noemailtitle'    => 'Ensin direición de corréu',
'noemailtext'     => "Esti usuariu nun punxo una dirección de corréu válida,
o nun quier recibir correos d'otros usuarios.",
'emailfrom'       => 'De',
'emailto'         => 'A',
'emailsubject'    => 'Asuntu',
'emailmessage'    => 'Mensaxe',
'emailsend'       => 'Unviar',
'emailsent'       => 'Corréu unviáu',
'emailsenttext'   => 'El to corréu foi unviáu.',

# Watchlist
'watchlist'            => 'La mio páxina de vixilancia',
'mywatchlist'          => 'La mio páxina de vixilancia',
'watchlistfor'         => "(pa '''$1''')",
'nowatchlist'          => 'La to llista de vixilancia ta vacia.',
'watchnologin'         => 'Non identificáu',
'watchnologintext'     => 'Tienes que tar [[Special:Userlogin|identificáu]] pa poder camudar la to llista de vixilancia.',
'addedwatch'           => 'Añadida a la llista de vixilancia',
'addedwatchtext'       => 'Añadióse la páxina "[[:$1]]" a la to [[Special:Watchlist|llista de vixilancia]]. Los cambeos nesta páxina y la so páxina de discusión asociada van salite en negrina na llista de [[Special:Recentchanges|cambeos recientes]] pa que seya más fácil de vela.

Si más tarde quies quitala de la llista de vixilancia calca en "Dexar de vixilar" nel menú llateral.',
'removedwatch'         => 'Eliminada de la llista de vixilancia',
'removedwatchtext'     => 'Quitóse la páxina "[[:$1]]" de la to llista de vixilancia.',
'watch'                => 'Vixilar',
'watchthispage'        => 'Vixilar esta páxina',
'unwatch'              => 'Dexar de vixilar',
'notanarticle'         => 'Nun ye un artículu',
'watchnochange'        => 'Nenguna de les tos páxines vixilaes foi editada nel periodu escoyíu.',
'watchlist-details'    => '{{PLURAL:$1|$1 páxina|$1 páxines}} vixilaes ensin cuntar les páxines de discusión.',
'watchlistcontains'    => 'La to llista de vixilancia tien $1 {{PLURAL:$1|páxina|páxines}}.',
'wlshowlast'           => 'Amosar les últimes $1 hores $2 díes $3',
'watchlist-hide-bots'  => 'Esconder ediciones de bots',
'watchlist-hide-own'   => 'Esconder les mios ediciones',
'watchlist-hide-minor' => 'Esconder ediciones menores',

# Displayed when you click the "watch" button and it's in the process of watching
'watching'   => 'Vixilando...',
'unwatching' => 'Dexando de vixilar...',

'enotif_reset'       => 'Marcar toles páxines visitaes',
'enotif_newpagetext' => 'Esta ye una páxina nueva.',
'changed'            => 'camudada',
'created'            => 'creada',

# Delete/protect/revert
'deletepage'                  => 'Borrar páxina',
'confirm'                     => 'Confirmar',
'excontent'                   => "el conteníu yera: '$1'",
'excontentauthor'             => "el conteníu yera: '$1' (y l'únicu autor yera '[[Special:Contributions/$2|$2]]')",
'exbeforeblank'               => "el conteníu enantes de dexar en blanco yera: '$1'",
'exblank'                     => 'la páxina taba vacia',
'confirmdelete'               => 'Confirmar el borráu',
'deletesub'                   => '(Borrando "$1")',
'historywarning'              => 'Avisu: La páxina que vas borrar tien historial:',
'confirmdeletetext'           => "Tas a piques de borrar dafechu una páxina
o imaxe arriendes del so historial. Por favor,
confirma que ye lo que quies facer, qu'entiendes
les consecuencies, y que lo tas faciendo acordies
coles [[{{MediaWiki:Policy-url}}|polítiques]].",
'actioncomplete'              => 'Aición completada',
'deletedtext'                 => 'Borróse "$1".
Mira en $2 la llista de les últimes páxines borraes.',
'deletedarticle'              => 'borró "[[$1]]"',
'dellogpage'                  => 'Rexistru de borraos',
'dellogpagetext'              => 'Abaxo tán los artículos borraos más recién.',
'deletionlog'                 => 'rexistru de borraos',
'deletecomment'               => 'Razón pa borrar',
'rollback_short'              => 'Revertir',
'rollbacklink'                => 'revertir',
'cantrollback'                => "Nun se pue revertir la edición; el postrer collaborador ye l'únicu autor d'esta páxina.",
'alreadyrolled'               => 'Nun se pue revertir la postrer edición de [[:$1]]
fecha por [[User:$2|$2]] ([[User talk:$2|discusión]]); daquién más yá editó o revirtió la páxina.

La postrer edición foi fecha por [[User:$3|$3]] ([[User talk:$3|discusión]]).',
'editcomment'                 => 'El comentariu de la edición yera: "<i>$1</i>".', # only shown if there is an edit comment
'revertpage'                  => 'Revertíes les ediciones de [[Special:Contributions/$2|$2]] ([[User talk:$2|discusión]]) hasta la versión de [[User:$1|$1]]',
'sessionfailure'              => 'Paez qu\'hai un problema cola to sesión; por precaución
cancelóse l\'aición que pidisti. Da-y al botón "Atrás" del
navegador pa cargar otra vuelta la páxina y vuelve a intentalo.',
'protectlogpage'              => 'Rexistru de proteiciones',
'protectlogtext'              => 'Esti ye un rexistru de les páxines protexíes y desprotexíes. Consulta la [[Special:Protectedpages|llista de páxines protexíes]] pa ver les proteiciones actives nestos momentos.',
'protectedarticle'            => 'protexó $1',
'unprotectedarticle'          => 'desprotexó "[[$1]]"',
'protectsub'                  => '(Protexendo "$1")',
'confirmprotect'              => 'Confirmar proteición',
'protectcomment'              => 'Comentariu:',
'unprotectsub'                => '(Desprotexendo "$1")',
'protect-unchain'             => 'Camudar los permisos pa tresllaos',
'protect-text'                => 'Equí pues ver y camudar el nivel de proteición de la páxina <strong>$1</strong>.',
'protect-default'             => '(por defeutu)',
'protect-level-autoconfirmed' => 'Bloquiar usuarios non rexistraos',
'protect-level-sysop'         => 'Namái alministradores',

# Restrictions (nouns)
'restriction-edit' => 'Editar',
'restriction-move' => 'Treslladar',

# Undelete
'undelete'                 => 'Ver páxines borraes',
'undeletepage'             => 'Ver y restaurar páxines borraes',
'undeletepagetext'         => "Les siguientes páxines foron borraes pero tovía tán nel archivu y puen
ser restauraes. L'archivu pue ser purgáu periódicamente.",
'undeleteextrahelp'        => "Pa restaurar tola páxina, deseleiciona toles caxelles y calca en
'''''Restaurar'''''. Pa realizar una restauración selectiva, seleiciona les caxelles de la revisión
que quies restaurar y calca en '''''Restaurar'''''. Calcando en '''''Llimpiar''''' quedarán vacios
el campu de comentarios y toles caxelles.",
'undeleterevisions'        => '$1 {{PLURAL:$1|revisión archivada|revisiones archivaes}}',
'undeletehistory'          => 'Si restaures la páxina, restauraránse toles revisiones al historial.
Si se creó una páxina col mesmu nome dende que foi borrada, les revisiones
restauraes van apaecer nel historial anterior. Date cuenta tamién de que les restricciones del archivu de revisiones
perderánse depués de la restauración',
'undeletehistorynoadmin'   => "Esta páxina foi borrada. La razón del borráu amuésase
nel resumen d'embaxo, amás de detalles de los usuarios qu'editaron esta páxina enantes
de ser borrada. El testu actual d'estes revisiones borraes ta disponible namái pa los alministradores.",
'undeletebtn'              => 'Restaurar',
'undeletereset'            => 'Llimpiar',
'undeletecomment'          => 'Comentariu:',
'undeletedarticle'         => 'restauróse "[[$1]]"',
'undeletedrevisions'       => '{{PLURAL:$1|1 revisión restaurada|$1 revisiones restauraes}}',
'undeletedrevisions-files' => '{{PLURAL:$1|1 revisión|$1 revisiones}} y {{PLURAL:$2|1 archivu|$2 archivos}} restauraos',
'undeletedfiles'           => '{{PLURAL:$1|1 archivu restauráu|$1 archivos restauraos}}',
'cannotundelete'           => 'Falló la restauración; seique daquién yá restaurara la páxina enantes.',

# Namespace form on various pages
'namespace'      => 'Espaciu de nomes:',
'invert'         => 'Invertir seleición',
'blanknamespace' => '(Principal)',

# Contributions
'contributions' => 'Contribuciones del usuariu',
'mycontris'     => 'Les mios contribuciones',
'contribsub2'   => 'De $1 ($2)',
'nocontribs'    => "Nun s'atoparon cambeos que coincidan con esi criteriu.",
'uclinks'       => 'Ver los caberos $1 cambeos; ver los caberos $2 díes.',
'uctop'         => ' (últimu cambéu)',

'sp-contributions-blocklog' => 'Rexistru de bloqueos',
'sp-contributions-username' => "Direición IP o nome d'usuariu:",

# What links here
'whatlinkshere'       => "Lo qu'enllaza equí",
'whatlinkshere-title' => "Páxines qu'enllacien a $1",
'linklistsub'         => "(Llista d'enllaces)",
'linkshere'           => "Les páxines siguientes enllacien a '''[[:$1]]''':",
'nolinkshere'         => "Nenguna páxina enllaza a '''[[:$1]]'''.",
'isredirect'          => 'páxina redirixida',
'whatlinkshere-prev'  => '{{PLURAL:$1|anterior|anteriores $1}}',
'whatlinkshere-next'  => '{{PLURAL:$1|siguiente|siguientes $1}}',
'whatlinkshere-links' => '← enllaces',

# Block/unblock
'blockip'                     => 'Bloquiar usuariu',
'blockiptext'                 => "Usa'l siguiente formulariu pa bloquiar el permisu d'escritura a una IP o a un usuariu concretu.
Esto debería facese sólo pa prevenir vandalismu como indiquen les [[{{MediaWiki:Policy-url}}|polítiques]]. Da una razón específica (como por exemplu citar páxines que fueron vandalizaes).",
'ipaddress'                   => 'Dirección IP:',
'ipadressorusername'          => "Dirección IP o nome d'usuariu:",
'ipbexpiry'                   => 'Caducidá:',
'ipbreason'                   => 'Razón:',
'ipbreasonotherlist'          => 'Otra razón',
'ipbreason-dropdown'          => "*Razones comunes de bloquéu
** Enxertamientu d'información falso
** Dexar les páxines en blanco
** Enllaces spam a páxines esternes
** Enxertamientu de babayaes/enguedeyos nes páxines
** Comportamientu intimidatoriu o d'acosu
** Abusu de cuentes múltiples
** Nome d'usuariu inaceutable",
'ipbanononly'                 => 'Bloquiar namái usuarios anónimos',
'ipbcreateaccount'            => 'Evitar creación de cuentes',
'ipbenableautoblock'          => "Bloquiar automáticamente la cabera direición IP usada por esti usuariu y toles IP posteriores dende les qu'intente editar",
'ipbsubmit'                   => 'Bloquiar esti usuariu',
'ipbother'                    => 'Otru periodu:',
'ipboptions'                  => '2 hores:2 hours,1 día:1 day,3 díes:3 days,1 selmana:1 week,2 selmanes:2 weeks,1 mes:1 month,3 meses:3 months,6 meses:6 months,1 añu:1 year,pa siempre:infinite',
'ipbotheroption'              => 'otru',
'ipbotherreason'              => 'Otra razón/razón adicional:',
'badipaddress'                => 'IP non válida',
'blockipsuccesssub'           => 'Bloquéu fechu correctamente',
'blockipsuccesstext'          => "Bloquióse al usuariu [[Special:Contributions/$1|$1]].
<br />Mira na [[Special:Ipblocklist|llista d'IPs bloquiaes]] pa revisar los bloqueos.",
'unblockip'                   => 'Desbloquiar usuariu',
'ipusubmit'                   => 'Desbloquiar esta direición',
'unblocked'                   => '[[User:$1|$1]] foi desbloquiáu',
'ipblocklist'                 => "Llista de direiciones IP y nomes d'usuarios bloquiaos",
'blocklistline'               => '$1, $2 bloquió a $3 ($4)',
'infiniteblock'               => 'pa siempre',
'expiringblock'               => "caduca'l $1",
'anononlyblock'               => 'namái anón.',
'noautoblockblock'            => 'bloquéu automáticu desactiváu',
'createaccountblock'          => 'bloquiada la creación de cuentes',
'emailblock'                  => 'corréu electrónicu bloquiáu',
'blocklink'                   => 'bloquiar',
'unblocklink'                 => 'desbloquiar',
'contribslink'                => 'contribuciones',
'autoblocker'                 => 'Bloquiáu automáticamente porque la to direición IP foi usada recién por "[[Usuariu:$1|$1]]". La razón del bloquéu de $1 ye: "$2"',
'blocklogpage'                => 'Rexistru de bloqueos',
'blocklogentry'               => 'bloquiáu [[$1]] con una caducidá de $2 $3',
'blocklogtext'                => "Esti ye un rexistru de los bloqueos y desbloqueos d'usuarios. Les direcciones IP
bloquiaes automáticamente nun salen equí. Pa ver los bloqueos qu'hai agora mesmo, 
mira na [[Special:Ipblocklist|llista d'IP bloquiaes]].",
'unblocklogentry'             => 'desbloquió $1',
'block-log-flags-anononly'    => 'namái usuarios anónimos',
'block-log-flags-nocreate'    => 'creación de cuentes deshabilitada',
'block-log-flags-noautoblock' => 'bloquéu automáticu deshabilitáu',
'block-log-flags-noemail'     => 'corréu electrónicu bloquiáu',
'ipb_expiry_invalid'          => 'Tiempu incorrectu.',
'ipb_already_blocked'         => '"$1" yá ta bloqueáu',
'ip_range_invalid'            => 'Rangu IP non válidu.',
'blockme'                     => 'Blóquiame',
'sorbsreason'                 => 'La to direición IP sal na llista de proxys abiertos en DNSBL usada nesti sitiu.',
'sorbs_create_account_reason' => 'La to direición IP sal na llista de proxys abiertos en DNSBL usada nesti sitiu. Nun pues crear una cuenta',

# Developer tools
'lockconfirm'       => 'Si, quiero protexer daveres la base de datos.',
'lockbtn'           => 'Protexer la base de datos',
'databasenotlocked' => 'La base de datos nun ta bloquiada.',

# Move page
'movepage'                => 'Treslladar páxina',
'movepagetext'            => "Usando'l siguiente formulariu vas renomar una páxina, treslladando'l
so historial al nuevu nome. El nome vieyu va convertise nuna
redireición al nuevu. Los enllaces qu'hubiera al nome vieyu nun van
camudase; asegúrate de que nun dexes redireiciones dobles o rotes.
Tu yes el responsable de facer que los enllaces queden apuntando aonde
se supón qu'han apuntar.

Recuerda que la páxina '''nun''' va movese si yá hai una páxina col
nuevu títulu, a nun ser que tea vacia o seya una redireición que nun tenga
historial. Esto significa que pues volver a renomar una páxina col nome
orixinal si t'enquivoques, y que nun pues sobreescribir una páxina
yá esistente.

<b>¡AVISU!</b>
Esti pue ser un cambéu importante y inesperáu pa una páxina popular;
por favor, asegúrate d'entender les consecuencies de lo que vas facer
enantes de siguir.",
'movepagetalktext'        => "La páxina de discusión asociada va ser treslladada automáticamente '''a nun ser que:'''
*Yá esista una páxina de discusión non vacia col nuevu nome, o
*Desactives la caxella d'equí baxo.

Nestos casos vas tener que treslladar o fusionar la páxina manualmente.",
'movearticle'             => 'Treslladar la páxina:',
'movenologin'             => 'Non identificáu',
'movenologintext'         => 'Tienes que ser un usuariu rexistráu y tar [[Special:Userlogin|identificáu]] pa treslladar una páxina.',
'newtitle'                => 'Al títulu nuevu:',
'move-watch'              => 'Vixilar esta páxina',
'movepagebtn'             => 'Treslladar la páxina',
'pagemovedsub'            => 'Treslláu correctu',
'movepage-moved'          => '<big>\'\'\'"$1" treslladóse a "$2"\'\'\'</big>', # The two titles are passed in plain text as $3 and $4 to allow additional goodies in the message.
'articleexists'           => "Yá hai una páxina con esi nome, o'l nome qu'escoyisti nun ye válidu. Por favor, escueyi otru nome.",
'movedto'                 => 'treslladáu a',
'movetalk'                => 'Mover la páxina de discusión asociada',
'talkpagemoved'           => 'La páxina de discusión correspondiente tamién foi treslladada.',
'talkpagenotmoved'        => 'La páxina de discusión correspondiente <strong>nun</strong> foi treslladada.',
'1movedto2'               => '[[$1]] treslladáu a [[$2]]',
'1movedto2_redir'         => '[[$1]] treslladáu a [[$2]] sobre una redireición',
'movelogpage'             => 'Rexistru de tresllaos',
'movelogpagetext'         => 'Esta ye la llista de páxines treslladaes.',
'movereason'              => 'Razón:',
'revertmove'              => 'revertir',
'delete_and_move'         => 'Borrar y treslladar',
'delete_and_move_text'    => '==Necesítase borrar==

La páxina de destín "[[$1]]" yá esiste. ¿Quies borrala pa dexar sitiu pal treslláu?',
'delete_and_move_confirm' => 'Sí, borrar la páxina',
'delete_and_move_reason'  => 'Borrada pa facer sitiu pal treslláu',
'selfmove'                => "Los nomes d'orixe y destín son los mesmos, nun se pue treslladar una páxina sobre ella mesma.",
'immobile_namespace'      => "El nome d'orixe o'l de destín ye d'una triba especial; nun se puen mover páxines dende nin a esti espaciu de nomes.",

# Export
'export'        => 'Esportar páxines',
'exporttext'    => "Pues esportar el testu y l'historial d'ediciones d'una páxina en particular o d'una
riestra páxines endolcaes nun documentu XML. Esti pue ser importáu depués n'otra wiki
qu'use MediaWiki al traviés de la páxina [[Special:Importar|importar]].

Pa esportar páxines, pon los títulos na caxa de testu d'embaxo, un títulu per llinia,
y seleiciona si quies la versión actual xunto con toles versiones antigües, xunto col
so historial, o namái la versión actual cola información de la postrer edición.

Por último, tamién pues usar un enllaz: p.e. [[{{ns:special}}:Export/{{MediaWiki:Mainpage}}]] pa la páxina \"[[{{MediaWiki:Mainpage}}]]\".",
'exportcuronly' => 'Amestar namái la revisión actual, non tol historial',
'export-submit' => 'Esportar',

# Namespace 8 related
'allmessages'               => 'Tolos mensaxes del sistema',
'allmessagesname'           => 'Nome',
'allmessagesdefault'        => 'Testu por defeutu',
'allmessagescurrent'        => 'Testu actual',
'allmessagestext'           => 'Esta ye una llista de tolos mensaxes disponibles nel espaciu de nomes de MediaWiki.',
'allmessagesnotsupportedDB' => "Nun pue usase '''{{ns:special}}:Allmessages''' porque '''\$wgUseDatabaseMessages''' ta deshabilitáu.",
'allmessagesfilter'         => 'Filtru pal nome del mensax:',
'allmessagesmodified'       => 'Amosar solo modificaos',

# Thumbnails
'thumbnail-more'  => 'Agrandar',
'missingimage'    => '<b>Falta la imaxe</b><br /><i>$1</i>',
'djvu_page_error' => 'Páxina DjVu fuera de llímites',
'djvu_no_xml'     => 'Nun se pudo obtener el XML pal archivu DjVu',

# Special:Import
'import' => 'Importar páxines',

# Import log
'importlogpage' => "Rexistru d'importaciones",

# Tooltip help for the actions
'tooltip-pt-userpage'       => "La mio páxina d'usuariu",
'tooltip-pt-mytalk'         => 'La mio páxina de discusión',
'tooltip-pt-preferences'    => 'Les mios preferencies',
'tooltip-pt-mycontris'      => 'Llista de les mios contribuciones',
'tooltip-pt-login'          => 'Encamentámoste a identificate, anque nun ye obligatorio',
'tooltip-ca-talk'           => 'Discusión tocante al conteníu de la páxina',
'tooltip-ca-edit'           => "Pues editar esta páxina. Por favor usa'l botón de previsualización enantes de guardar los cambeos.",
'tooltip-ca-addsection'     => 'Añade un comentariu a esta discusión.',
'tooltip-ca-viewsource'     => 'Esta páxina ta protexida. Pues ver el so códigu fonte.',
'tooltip-ca-protect'        => 'Protexe esta páxina',
'tooltip-ca-delete'         => 'Borra esta páxina',
'tooltip-ca-move'           => 'Tresllada esta páxina',
'tooltip-ca-watch'          => 'Añade esta páxina a la to llista de vixilancia',
'tooltip-ca-unwatch'        => 'Elimina esta páxina de la to llista de vixilancia',
'tooltip-search'            => 'Busca en {{SITENAME}}',
'tooltip-n-mainpage'        => 'Visita a la Portada',
'tooltip-n-portal'          => 'Tocante al proyeutu, qué facer, ú atopar coses',
'tooltip-n-recentchanges'   => 'Llista de los cambeos recientes de la wiki.',
'tooltip-n-randompage'      => 'Carga una páxina al debalu',
'tooltip-n-help'            => 'El llugar pa deprender',
'tooltip-t-whatlinkshere'   => "Llista de toles páxines wiki qu'enllacien equí",
'tooltip-t-contributions'   => "Amuesa la llista de contribuciones d'esti usuariu",
'tooltip-t-emailuser'       => 'Unvia un corréu a esti usuariu',
'tooltip-t-upload'          => 'Xube imáxenes o archivos multimedia',
'tooltip-t-specialpages'    => 'Llista de toles páxines especiales',
'tooltip-ca-nstab-user'     => "Amuesa la páxina d'usuariu",
'tooltip-ca-nstab-template' => 'Amuesa la plantía',
'tooltip-ca-nstab-help'     => "Amuesa la páxina d'aida",
'tooltip-minoredit'         => 'Marca esti cambéu como una edición menor',
'tooltip-save'              => 'Guarda los tos cambeos',
'tooltip-preview'           => 'Previsualiza los tos cambeos. ¡Por favor, úsalo enantes de grabar!',
'tooltip-diff'              => 'Amuesa los cambeos que fixisti nel testu.',
'tooltip-watch'             => 'Amiesta esta páxina na to llista de vixilancia',

# Attribution
'anonymous'        => 'Usuariu/os anónimu/os de {{SITENAME}}',
'siteuser'         => '{{SITENAME}} usuariu $1',
'lastmodifiedatby' => "Esta páxina foi modificada per postrer vegada'l $1 a les $2 por $3.", # $1 date, $2 time, $3 user
'and'              => 'y',
'others'           => 'otros',
'siteusers'        => '{{SITENAME}} usuariu/os $1',
'creditspage'      => 'Páxina de creitos',
'nocredits'        => 'Nun hai disponible información de creitos pa esta páxina.',

# Spam protection
'subcategorycount'     => 'Hai {{PLURAL:$1|una subcategoría|$1 subcategoríes}} nesta categoría.',
'categoryarticlecount' => 'Hai {{PLURAL:$1|una páxina|$1 páxines}} nesta categoría.',
'category-media-count' => 'Hai {{PLURAL:$1|un archivu|$1 archivos}} nesta categoría.',

# Info page
'numedits' => "Númberu d'ediciones (páxina): $1",

# Math options
'mw_math_png'    => 'Renderizar siempre PNG',
'mw_math_simple' => 'HTML si ye mui simple, o si non PNG',
'mw_math_html'   => 'HTML si ye posible, o si non PNG',
'mw_math_source' => 'Dexalo como TeX (pa navegadores de testu)',
'mw_math_modern' => 'Recomendao pa navegadores modernos',
'mw_math_mathml' => 'MathML si ye posible (esperimental)',

# Patrol log
'patrol-log-page' => 'Rexistru de supervisión',

# Image deletion
'deletedrevision' => 'Borrada versión vieya $1',

# Browsing diffs
'previousdiff' => '← Diferencia anterior',
'nextdiff'     => 'Diferencia siguiente →',

# Media information
'imagemaxsize'         => 'Llendar les imáxenes nes páxines de descripción a:',
'thumbsize'            => 'Tamañu de la muestra:',
'file-info'            => "(tamañu d'archivu: $1, triba MIME: $2)",
'file-info-size'       => "($1 × $2 píxeles, tamañu d'archivu: $3, triba MIME: $4)",
'file-nohires'         => '<small>Nun ta disponible con mayor resolución.</small>',
'svg-long-desc'        => "(archivu SVG, $1 × $2 píxeles nominales, tamañu d'archivu: $3)",
'show-big-image'       => 'Resolución completa',
'show-big-image-thumb' => "<small>Tamañu d'esta previsualización: $1 × $2 píxeles</small>",

# Special:Newimages
'newimages' => "Galería d'imáxenes nueves",

# Bad image list
'bad_image_list' => "El formatu ye'l que sigue:

Namái se tienen en cuenta les llinies qu'emprimen por un *. El primer enllaz d'una llinia ha ser ún qu'enllacie a una imaxe non válida.
Los demás enllaces de la mesma llinia considérense esceiciones, p.ex. páxines nes que la imaxe ha apaecer.",

# Metadata
'metadata' => 'Metadatos',

# EXIF tags
'exif-artist'                 => 'Autor',
'exif-compressedbitsperpixel' => "Mou de compresión d'imaxe",
'exif-brightnessvalue'        => 'Brillu',
'exif-cfapattern'             => 'patrón CFA',
'exif-contrast'               => 'Contraste',

# EXIF attributes
'exif-compression-1' => 'Non comprimida',

'exif-componentsconfiguration-0' => 'nun esiste',

# External editor support
'edit-externally'      => 'Editar esti ficheru usando una aplicación externa',
'edit-externally-help' => 'Pa más información echa un güeyu a les [http://meta.wikimedia.org/wiki/Help:External_editors instrucciones de configuración].',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'toos',
'namespacesall'    => 'toos',
'monthsall'        => 'toos',

# E-mail address confirmation
'confirmemail'            => 'Confirmar direición de corréu',
'confirmemail_noemail'    => "Nun tienes una direición de corréu válida nes tos [[Special:Preferences|preferencies d'usuariu]].",
'confirmemail_text'       => "Esta wiki requier que valides la to direición de corréu enantes d'usar les
funcionalidaes de mensaxes. Da-y al botón que tienes equí embaxo pa unviar un avisu de
confirmación a la to direición. Esti avisu va incluyir un enllaz con un códigu; carga
l'enllaz nel to navegador pa confirmar la to direición de corréu electrónicu.",
'confirmemail_pending'    => '<div class="error">
Yá s\'unvió un códigu de confirmación a la to direición de corréu; si creasti hai poco la to cuenta, pues esperar dellos minutos a que-y de tiempu a llegar enantes de pidir otru códigu nuevu.
</div>',
'confirmemail_send'       => 'Unviar códigu de confirmación',
'confirmemail_sent'       => 'Corréu de confirmación unviáu.',
'confirmemail_oncreate'   => "Unvióse un códigu de confirmación a la to direición de corréu.
Esti códigu nun se necesita pa identificase, pero tendrás que lu conseñar enantes
d'activar cualesquier funcionalidá de la wiki que tea rellacionada col corréu.",
'confirmemail_sendfailed' => 'Nun se pudo unviar el corréu de confirmación. Revisa que nun punxeras carauteres non válidos na dirección de corréu.

El servidor de corréu devolvió: $1',
'confirmemail_invalid'    => 'Códigu de confirmación non válidu. El códigu seique tenga caducao.',
'confirmemail_needlogin'  => 'Tienes que $1 pa confirmar el to corréu.',
'confirmemail_success'    => 'El to corréu quedó confimáu. Agora yá pues identificate y collaborar na wiki.',
'confirmemail_loggedin'   => 'Quedó confirmada la to direición de corréu.',
'confirmemail_error'      => 'Hebo un problema al guardar la to confirmación.',
'confirmemail_subject'    => 'Confirmación de la dirección de corréu de {{SITENAME}}',
'confirmemail_body'       => 'Daquién, seique tu dende la IP $1, rexistró la cuenta "$2" con
esta direición de corréu en {{SITENAME}}.

Pa confirmar qu\'esta cuenta ye tuya daveres y asina activar les funcionalidaes
de corréu en {{SITENAME}}, abri esti enllaz nel to navegador:

$3

Si esti *nun* yes tú, nun abras l\'enllaz. Esti códigu de confirmación caduca en $4.',

# Delete conflict
'deletedwhileediting' => "Avisu: ¡Esta páxina foi borrada depués de qu'entamaras a editala!",
'confirmrecreate'     => "L'usuariu [[User:$1|$1]] ([[User talk:$1|discusión]]) borró esta páxina depués de qu'empecipiaras a editala pola siguiente razón:
: ''$2''
Por favor confirma que daveres quies volver a crear esta páxina.",

# action=purge
'confirm_purge'        => "¿Llimpiar la caché d'esta páxina?

$1",
'confirm_purge_button' => 'Aceutar',

# AJAX search
'articletitles' => "Páxines qu'emprimen por ''$1''",

# Table pager
'table_pager_first' => 'Primer páxina',
'table_pager_last'  => 'Postrer páxina',

# Auto-summaries
'autosumm-blank'   => "Eliminando'l conteníu de la páxina",
'autosumm-replace' => "Sustituyendo la páxina por '$1'",
'autoredircomment' => 'Redirixendo a [[$1]]',
'autosumm-new'     => 'Páxina nueva: $1',

# Watchlist editing tools
'watchlisttools-edit' => 'Ver y editar la llista de vixilancia',

);
