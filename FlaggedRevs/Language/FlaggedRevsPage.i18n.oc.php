<?php
/** Occitan (Occitan)
 * @author Cedric31
 * @author SPQRobin
 */
$messages = array(
	'editor'                      => 'Contributor',
	'group-editor'                => 'Contributors',
	'group-editor-member'         => 'Contributor',
	'grouppage-editor'            => '{{ns:project}}:Editor',
	'reviewer'                    => 'Revisor',
	'group-reviewer'              => 'Revisors',
	'group-reviewer-member'       => 'Revisor',
	'revreview-current'           => 'Esbòs',
	'tooltip-ca-current'          => "Veire l'esbòs corrent d'aquesta pagina",
	'revreview-edit'              => 'Esbòs de modificacion',
	'revreview-source'            => "Font de l'esbòs",
	'revreview-stable'            => 'Estable',
	'tooltip-ca-stable'           => "Veire la version establa d'aquesta pagina",
	'revreview-oldrating'         => 'Son puntatge :',
	'revreview-noflagged'         => "I a pas de version revisada d'aquesta pagina, sa [[{{MediaWiki:Makevalidate-page}}|qualitat]] es incèrtana.",
	'tooltip-ca-default'          => "Paramètres per l'assegurança-qualitat",
	'revreview-quick-none'        => "'''Correnta''' (pas de revisions evaluadas)",
	'revreview-quick-see-quality' => "'''Correnta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} veire revision establa]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|modificacion|modificacions}}])",
	'revreview-quick-see-basic'   => "'''Correnta'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=1}} veire versions establas]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|cambiament|cambiaments}}])",
	'revreview-quick-basic'       => "'''[[{{MediaWiki:Makevalidate-page}}|Vista]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire revision correnta]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|modificacion|modificacions}}])",
	'revreview-quick-quality'     => "'''[[{{MediaWiki:Makevalidate-page}}|Qualitat]]'''. [[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} veire version correnta]] ($2 [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{plural:$2|cambiament|cambiaments}}])",
	'revreview-newest-basic'      => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version vista] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|cambiament|cambiaments}}] {{plural:$3|demanda|demandan}} una revision.",
	'revreview-newest-quality'    => "La [{{fullurl:{{FULLPAGENAMEE}}|stable=1}} darrièra version de qualitat] ([{{fullurl:Special:Stableversions|page={{FULLPAGENAMEE}}}} las veire totas]) èra [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} $3 {{plural:$3|cambiament|cambiaments}}] {{plural:$3|demanda|demandan}} una revision.",
	'revreview-basic'             => "Es la darrièra [[{{MediaWiki:Makevalidate-page}}|version vista]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-quality'           => "Es la darrièra [[{{MediaWiki:Makevalidate-page}}|version de qualitat]], [{{fullurl:Special:Log|type=review&page={{FULLPAGENAMEE}}}} aprobada] lo ''$2''. L'[{{fullurl:{{FULLPAGENAMEE}}|stable=0}} esbòs] pòt èsser [{{fullurl:{{FULLPAGENAMEE}}|action=edit}} modificat]; [{{fullurl:{{FULLPAGENAMEE}}|oldid=$1&diff=cur&editreview=1}} {{PLURAL:$3|$3 cambiament espèra|$3 cambiaments espèran}}] una revision.",
	'revreview-static'            => "Es una [[{{MediaWiki:Makevalidate-page}}|version vista]] de '''[[:$3|$3]]''', [{{fullurl:Special:Log/review|page=$1}} aprobada] lo ''$2''.",
	'revreview-note'              => '[[User:$1]] a escrich aquestas nòtas de revision :',
	'revreview-update'            => 'Prec de tornar veire las modificacions fachas a partir de la darrièra version establa. Qualques imatges o modèls son meses a jorn :',
	'revreview-update-none'       => 'Prec de tornar veire las modificacions fachas a partir de la darrièra version establa.',
	'revreview-auto-w'            => "Modificatz una version establa, tota modificacion serà '''automaticament revisada'''. Demandatz una previsualizacion abans de salvagardar.",
	'revreview-auto-w-old'        => "Modificatz una version anciana, tota modificacion serà '''automaticament revisada'''. Demandatz una previsualizacion abans de salvagardar.",
	'hist-stable'                 => '[vista]',
	'hist-quality'                => '[qualitat]',
	'flaggedrevs'                 => 'Revisions marcadas',
	'review-logpage'              => "Jornal de las revisions de l'article",
	'review-logpagetext'          => "Es un jornal de las modificacions per [[{{MediaWiki:Makevalidate-page}}|l'aprobacion]] de las revisions.",
	'review-logentry-app'         => 'Revista [[$1]]',
	'review-logentry-dis'         => 'Version depreciada de [[$1]]',
	'review-logaction'            => 'Version ID $1',
	'stable-logpage'              => 'Jornal de las versions establas',
	'stable-logpagetext'          => 'Es lo jornal de las modificacions per las [[{{MediaWiki:Makevalidate-page}}|versions establas]] de las paginas.',
	'stable-logentry'             => 'Las versions establas de [[$1]] son parametradas.',
	'stable-logentry2'            => 'Tornar metre a zèro lo jornal de las versions establas de [[$1]]',
	'revisionreview'              => 'Tornar veire las versions',
	'revreview-main'              => 'Devètz causir una version precisa per revisar. Vejatz [[Special:Unreviewedpages|Version non revisadas]] per una lista de paginas.',
	'revreview-selected'          => "Version causida de '''$1 :'''",
	'revreview-text'              => 'Las versions establas son causidas per defaut, puslèu que las darrièras versions.',
	'revreview-toolow'            => 'Pels atributs çai jos, devètz donar un puntatge mai elevat que « non aprobat » per que la version sia considerada coma revista. Per depreciar una version, metetz totes los camps a « non aprobat ».',
	'revreview-flag'              => 'Evaluar aquesta version (#$1)',
	'revreview-legend'            => 'Evaluar lo contengut de la version',
	'revreview-notes'             => "Observacions e nòtas d'afichar :",
	'revreview-accuracy'          => 'Precision',
	'revreview-accuracy-0'        => 'Pas aprobada',
	'revreview-accuracy-1'        => 'Vista',
	'revreview-accuracy-2'        => 'Precis',
	'revreview-accuracy-3'        => 'Plan fontada',
	'revreview-accuracy-4'        => 'Remirable',
	'revreview-depth'             => 'Pregondor',
	'revreview-depth-0'           => 'Pas aprobada',
	'revreview-depth-1'           => 'De basa',
	'revreview-depth-2'           => 'Moderat',
	'revreview-depth-3'           => 'Elevada',
	'revreview-depth-4'           => 'Remirabla',
	'revreview-style'             => 'Lisibilitat',
	'revreview-style-0'           => 'Pas aprobada',
	'revreview-style-1'           => 'Acceptabla',
	'revreview-style-2'           => 'Bona',
	'revreview-style-3'           => 'Concisa',
	'revreview-style-4'           => 'Remirabla',
	'revreview-log'               => 'Comentari al jornal :',
	'revreview-submit'            => 'Salvagardar revista',
	'revreview-changed'           => "'''L'accion demandada a pas pogut èsser acomplida per aquesta version.''' Un modèl o un imatge pòt èsser estat demandat alara que cap de version precisa èra causida. Aquò pòt susvenir quand un modèl (o un imatge) remplaça dinamicament un autre modèl (o un autre imatge) segon una variabla que depen de la version de la pagina. Refrescar la pagina e revisar-la tornarmai pòt corregir aqueste problèma.",
	'stableversions'              => 'Versions establas',
	'stableversions-leg1'         => "Darrièras revisions revistas d'una pagina",
	'stableversions-page'         => 'Nom de la pagina :',
	'stableversions-none'         => 'La lista que seguís conten de versions de « [[:$1]] » que son estadas revisadas :',
	'stableversions-list'         => "Revisada lo ''$1'' per $2",
	'stableversions-review'       => 'Diferéncia amb la darrièra version establa',
	'review-diff2stable'          => 'Diferéncia amb la darrièra version',
	'review-diff2oldest'          => 'Paginas pas revistas',
	'unreviewedpages'             => 'Listar las paginas pas revisadas',
	'viewunreviewed'              => "Afichar las paginas qu'an de revisions fachas a una version establa.",
	'unreviewed-outdated'         => "Afichar las paginas qu'an de revisions fachas a una version establa.",
	'unreviewed-category'         => 'Categoria:',
	'unreviewed-diff'             => 'Cambiaments:',
	'unreviewed-list'             => "Aquesta pagina fa la lista dels articles que son pas estats revisats o qu'an de revisions pas vistas.",
	'revreview-visibility'        => 'Aquesta pagina conten una [[{{MediaWiki:Makevalidate-page}}|version establa]], que pòt èsser [{{fullurl:Special:Stabilization|page={{FULLPAGENAMEE}}}} configurada].',
	'stabilization'               => 'Estabilizacion de la pagina',
	'stabilization-text'          => "Cambiar los paramètres çai jos per ajustar l'afichatge e la seleccion de la version establa de [[:$1|$1]].",
	'stabilization-perm'          => 'Vòstre compte a pas los dreches per cambiar los paramètres de la version establa. Vaquí los paramètres corrents de [[:$1|$1]] :',
	'stabilization-page'          => 'Nom de la pagina :',
	'stabilization-leg'           => "Parametrar la version establa d'una pagina",
	'stabilization-select'        => 'Cossí la version establa es causida',
	'stabilization-select1'       => 'La darrièra version de qualitat, siquenon la darrièra version vista',
	'stabilization-select2'       => 'La darrièra revision vista',
	'stabilization-def'           => "Version afichada al moment de l'afichatge per defaut de la pagina",
	'stabilization-def1'          => 'La version establa, siquenon la version correnta',
	'stabilization-def2'          => 'La version correnta',
	'stabilization-submit'        => 'Confirmar',
	'stabilization-notexists'     => 'I a pas de pagina « [[:$1|$1]], pas de parametratge possible',
	'stabilization-notcontent'    => 'La pagina « [[:$1|$1]] » pòt pas èsser revisada, pas de parametratge possible',
	'stabilization-success'       => 'Los paramètres per la version establa de « [[:$1|$1]] » son dintrats.',
	'stabilization-sel-short'     => 'Prioritat',
	'stabilization-sel-short-0'   => 'Qualitat',
	'stabilization-sel-short-1'   => 'Nula',
	'stabilization-def-short'     => 'Defaut',
	'stabilization-def-short-0'   => 'Correnta',
	'stabilization-def-short-1'   => 'Establa',
	'reviewedpages'               => 'Pagina passadas en revista',

);
