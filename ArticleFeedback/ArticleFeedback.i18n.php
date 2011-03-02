<?php
$messages = array();

/** English
 * @author Nimish Gautam
 * @author Sam Reed
 * @author Brandon Harris
 * @author Trevor Parscal
 */
$messages['en'] = array(
	'articlefeedback' => 'Article feedback',
	'articlefeedback-desc' => 'Article feedback',
	/* Survey Messages */
	'articlefeedback-survey-question-whyrated' => 'Please let us know why you rated this page today (check all that apply):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'I wanted to contribute to the overall rating of the page',
	'articlefeedback-survey-answer-whyrated-development' => 'I hope that my rating would positively affect the development of the page',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'I wanted to contribute to {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'I like sharing my opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => "I didn't provide ratings today, but wanted to give feedback on the feature",
	'articlefeedback-survey-answer-whyrated-other' => 'Other',
	'articlefeedback-survey-question-useful' => 'Do you believe the ratings provided are useful and clear?',
	'articlefeedback-survey-question-useful-iffalse' => 'Why?',
	'articlefeedback-survey-question-comments' => 'Do you have any additional comments?',
	'articlefeedback-survey-submit' => 'Submit',
	'articlefeedback-survey-title' => 'Please answer a few questions',
	'articlefeedback-survey-thanks' => 'Thanks for filling out the survey.',
	/* Beta Messages */
	'articlefeedback-error' => 'An error has occured. Please try again later.',
	'articlefeedback-form-switch-label' => 'Rate this page',
	'articlefeedback-form-panel-title' => 'Rate this page',
	'articlefeedback-form-panel-instructions' => 'Please take a moment to rate this page.',
	'articlefeedback-form-panel-clear' => 'Remove this rating',
	'articlefeedback-form-panel-expertise' => 'I have prior knowledge on this topic',
	'articlefeedback-form-panel-expertise-studies' => 'I have studied it in college/university',
	'articlefeedback-form-panel-expertise-profession' => 'It is part of my profession',
	'articlefeedback-form-panel-expertise-hobby' => 'It is related to my hobbies or interests',
	'articlefeedback-form-panel-expertise-other' => 'The source of my knowledge is not listed here',
	'articlefeedback-form-panel-submit' => 'Submit feedback',
	'articlefeedback-report-switch-label' => 'View page ratings',
	'articlefeedback-report-panel-title' => 'Page ratings',
	'articlefeedback-report-panel-description' => 'Current average ratings.',
	'articlefeedback-report-empty' => 'No ratings',
	'articlefeedback-report-ratings' => '$1 ratings',
	'articlefeedback-field-trustworthy-label' => 'Trustworthy',
	'articlefeedback-field-trustworthy-tip' => 'Do you feel this page has sufficient citations and that those citations come from trustworthy sources?',
	'articlefeedback-field-complete-label' => 'Complete',
	'articlefeedback-field-complete-tip' => 'Do you feel that this page covers the essential topic areas that it should?',
	'articlefeedback-field-objective-label' => 'Objective',
	'articlefeedback-field-objective-tip' => 'Do you feel that this page shows a fair representation of all perspectives on the issue?',
	'articlefeedback-field-wellwritten-label' => 'Well-written',
	'articlefeedback-field-wellwritten-tip' => 'Do you feel that this page is well-organized and well-written?',
	'articlefeedback-pitch-reject' => 'Maybe later',
	'articlefeedback-pitch-or' => 'or',
	'articlefeedback-pitch-thanks' => 'Thanks! Your ratings have been saved.',
	'articlefeedback-pitch-survey-message' => 'Please take a moment to complete a short survey.',
	'articlefeedback-pitch-survey-accept' => 'Start survey',
	'articlefeedback-pitch-join-message' => 'Did you know that you can create an account? An account will help you track your edits, get involved in discussions, and be a part of the community.',
	'articlefeedback-pitch-join-accept' => 'Create an account',
	'articlefeedback-pitch-join-login' => 'Log in',
	'articlefeedback-pitch-edit-message' => 'Did you know that you can edit this page?',
	'articlefeedback-pitch-edit-accept' => 'Edit this page',
	'articlefeedback-expert-assessment-question' => 'Do you have knowledge in this topic?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Competent',
	'articlefeedback-expert-assessment-level-3-label' => 'Expert',
	'articlefeedback-survey-message-success' => 'Thanks for filling out the survey.',
	'articlefeedback-survey-message-error' => 'An error has occurred.
Please try again later.',
);

/** Message documentation (Message documentation)
 * @author Brandon Harris
 * @author EugeneZelenko
 * @author Raymond
 * @author Sam Reed
 */
$messages['qqq'] = array(
	'articlefeedback' => 'The title of the feature. It is about reader feedback.
	
Please visit http://prototype.wikimedia.org/articleassess/Main_Page for a prototype installation.',
	'articlefeedback-desc' => '{{desc}}',
	'articlefeedback-survey-question-whyrated' => 'This is a question in the survey with checkboxes for the answers. The user can check multiple answers.',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-development' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'This is a possible answer for the "Why did you rate this article today?" survey question.',
	'articlefeedback-survey-answer-whyrated-other' => 'This is a possible answer for the "Why did you rate this article today?" survey question. The user can check this to fill out an answer that wasn\'t provided as a checkbox.
{{Identical|Other}}',
	'articlefeedback-survey-question-useful' => 'This is a question in the survey with "yes" and "no" (prefswitch-survey-true and prefswitch-survey-false) as possible answers.',
	'articlefeedback-survey-question-useful-iffalse' => 'This question appears when the user checks "no" for the "Do you believe the ratings provided are useful and clear?" question. The user can enter their answer in a text box.',
	'articlefeedback-survey-question-comments' => 'This is a question in the survey with a text box that the user can enter their answer in.',
	'articlefeedback-survey-submit' => 'This is the caption for the button that submits the survey.
{{Identical|Submit}}',
	'articlefeedback-survey-title' => 'This text appears in the title bar of the survey dialog.',
	'articlefeedback-survey-thanks' => 'This text appears when the user has successfully submitted the survey.',
	'articlefeedback-pitch-or' => '{{Identical|Or}}',
	'articlefeedback-pitch-join-login' => '{{Identical|Log in}}',
	'articlefeedback-expert-assessment-question' => 'This question asks the user to self-identify as a subject matter expert',
	'articlefeedback-expert-assessment-level-1-label' => 'This is a term that indicates some degree of knowledge in the subject',
	'articlefeedback-expert-assessment-level-2-label' => 'This is a term that indicates an average level of knowledge in the subject',
	'articlefeedback-expert-assessment-level-3-label' => 'This is a term that indicates an above-average, expert level of knowledge in the subject',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'articlefeedback' => 'Bladsybeoordeling',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ek wil bydrae tot {{site name}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ek hou daarvan om my mening te deel',
	'articlefeedback-survey-answer-whyrated-other' => 'Ander',
	'articlefeedback-survey-question-useful-iffalse' => 'Hoekom?',
	'articlefeedback-survey-question-comments' => 'Het u enige addisionele kommentaar?',
	'articlefeedback-survey-submit' => 'Dien in',
	'articlefeedback-survey-title' => "Antwoord asseblief 'n paar vrae",
	'articlefeedback-survey-thanks' => 'Dankie dat u die opname ingevul het.',
	'articlefeedback-form-switch-label' => 'Verskaf terugvoer',
	'articlefeedback-form-panel-title' => 'U terugvoer',
	'articlefeedback-form-panel-instructions' => "Neem asseblief 'n oomblik om vir hierdie bladsy te stem.",
	'articlefeedback-form-panel-submit' => 'Stuur terugvoer',
	'articlefeedback-report-switch-label' => 'Wys resultate',
	'articlefeedback-pitch-reject' => 'Nee dankie',
);

/** Arabic (العربية)
 * @author Ciphers
 * @author Mido
 */
$messages['ar'] = array(
	'articlefeedback' => 'ملاحظات على المقال',
	'articlefeedback-desc' => 'ملاحظات على المقال',
	'articlefeedback-survey-question-whyrated' => 'الرجاء إخبارنا لماذا قمت بتقييم هذه الصفحة اليوم (ضع علامة أمام كل ما ينطبق):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'أردت أن أساهم في التقييم الكلي للصفحة',
	'articlefeedback-survey-answer-whyrated-development' => 'آمل أن التصويت الذي أدلي به سيؤثر إيجابا على تطوير الصفحة',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => ' أردت أن أساهم في {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'أود مشاركة رأيي',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'لم أقدم أي تقييمات اليوم، لكني أردت إعطاء ملاحظات عن هذه الأداة',
	'articlefeedback-survey-answer-whyrated-other' => 'ܐܚܪܢܐ',
	'articlefeedback-survey-question-useful' => 'هل تعتقد أن التقييم المقدم مفيد وواضح؟',
	'articlefeedback-survey-question-useful-iffalse' => 'ܠܡܢܐ?',
	'articlefeedback-survey-question-comments' => 'هل لديك أي تعليقات إضافية؟',
	'articlefeedback-survey-submit' => 'ܫܕܪ',
	'articlefeedback-survey-title' => 'الرجاء الإجابة على بعض الأسئلة',
	'articlefeedback-survey-thanks' => 'شكرا لملء الاستبيان.',
	'articlefeedback-form-switch-label' => 'تقديم استبيان',
	'articlefeedback-form-panel-title' => 'ملاحظاتك',
	'articlefeedback-form-panel-instructions' => 'الرجاء قضاء بعض وقت لتقييم هذه الصفحة.',
	'articlefeedback-form-panel-submit' => 'إرسال الملاحظات',
	'articlefeedback-report-switch-label' => 'عرض النتائج',
	'articlefeedback-report-panel-title' => 'نتائج الملاحظات',
	'articlefeedback-report-panel-description' => 'متوسط التقييمات الحالية.',
	'articlefeedback-report-empty' => 'لا توجد تقييمات',
	'articlefeedback-report-ratings' => 'تقييمات $1',
	'articlefeedback-field-trustworthy-label' => 'جدير بالثقة',
	'articlefeedback-field-trustworthy-tip' => 'هل تظن أن لهذه الصفحة استشهادات كافية وأن تلك الاستشهادات تأتي من مصادر جديرة بالثقة؟',
	'articlefeedback-field-complete-label' => 'مكتمل',
	'articlefeedback-field-complete-tip' => 'هل تشعر بأن هذه الصفحة تغطي مجالات الموضوع الأساسية كما ينبغي؟',
	'articlefeedback-field-objective-label' => 'غير متحيز',
	'articlefeedback-field-objective-tip' => 'هل تشعر أن تظهر هذه الصفحة هي تمثيل عادل لجميع وجهات النظر حول هذ الموضوع؟',
	'articlefeedback-field-wellwritten-label' => 'مكتوبة بشكل جيد',
	'articlefeedback-field-wellwritten-tip' => 'هل تشعر بأن هذه الصفحة منظمة تنظيماً جيدا ومكتوبة بشكل جيد؟',
	'articlefeedback-pitch-reject' => 'لا، شكراً',
	'articlefeedback-pitch-survey-accept' => 'بدء الاستقصاء',
	'articlefeedback-pitch-join-accept' => 'أنشئ حسابا',
	'articlefeedback-pitch-edit-accept' => 'بدء التحرير',
);

/** Aramaic (ܐܪܡܝܐ) */
$messages['arc'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'ܐܚܪܢܐ',
	'articlefeedback-survey-question-useful-iffalse' => 'ܠܡܢܐ?',
	'articlefeedback-survey-submit' => 'ܫܕܪ',
);

/** Bashkir (Башҡортса)
 * @author Assele
 */
$messages['ba'] = array(
	'articlefeedback' => 'Мәҡәләне баһалау',
	'articlefeedback-desc' => 'Мәҡәләне баһалау (һынау өсөн)',
	'articlefeedback-survey-question-whyrated' => 'Зинһар, ниңә һеҙ бөгөн был биткә баһа биреүегеҙҙе беҙгә белгертегеҙ (бөтә тап килгән яуаптарҙы билдәләгеҙ):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Минең был биттең дөйөм баһаһына өлөш индергем килде.',
	'articlefeedback-survey-answer-whyrated-development' => 'Минең баһам был биттең үҫешенә ыңғай йоғонто яһар, тип өмөт итәм.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Минең {{SITENAME}} проектына өлөш индергем килде.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мин үҙ фекерем менән бүлешергә ярятам',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Бин бөгөн баһа ҡуйманым, әммә был мөмкинлек тураһында үҙ фекеремде ҡалдырырға теләйем',
	'articlefeedback-survey-answer-whyrated-other' => 'Башҡа',
	'articlefeedback-survey-question-useful' => 'Ҡуйылған баһалар файҙалы һәм аңлайышлы, тип иҫәпләйһегеҙме?',
	'articlefeedback-survey-question-useful-iffalse' => 'Ниңә?',
	'articlefeedback-survey-question-comments' => 'Һеҙҙең берәй төрлө өҫтәмә иҫкәрмәләрегеҙ бармы?',
	'articlefeedback-survey-submit' => 'Ебәрергә',
	'articlefeedback-survey-title' => 'Зинһар, бер нисә һорауға яуап бирегеҙ',
	'articlefeedback-survey-thanks' => 'Һорауҙарға яуап биреүегеҙ өсөн рәхмәт.',
	'articlefeedback-form-switch-label' => 'Баһалама ебәреү',
	'articlefeedback-form-panel-title' => 'Һеҙҙең баһаламағыҙ',
	'articlefeedback-form-panel-instructions' => 'Зинһар, был битте баһалар өсөн ваҡытығыҙҙы бүлегеҙ.',
	'articlefeedback-form-panel-submit' => 'Баһалауҙы ебәрергә',
	'articlefeedback-report-switch-label' => 'Һөҙөмтәне күрһәтергә',
	'articlefeedback-report-panel-title' => 'Баһалау һөҙөмтәһе',
	'articlefeedback-report-panel-description' => 'Ағымдағы уртаса баһалар.',
	'articlefeedback-report-empty' => 'Баһаламалар юҡ',
	'articlefeedback-report-ratings' => '$1 баһалама',
	'articlefeedback-field-trustworthy-label' => 'Дөрөҫлөк',
	'articlefeedback-field-trustworthy-tip' => 'Һеҙ был биттә етәрлек сығанаҡтар бар һәм сығанаҡтар ышаныслы, тип һанайһығыҙмы?',
	'articlefeedback-field-complete-label' => 'Тулылыҡ',
	'articlefeedback-field-complete-tip' => 'Һеҙ был бит төп һорауҙарҙы етәрлек кимәлдә аса, тип һанайһығыҙмы?',
	'articlefeedback-field-objective-label' => 'Битарафлыҡ',
	'articlefeedback-field-objective-tip' => 'Һеҙ был бит ҡағылған һорау буйынса бөтә фекерҙәрҙе лә ғәҙел сағылдыра, тип һанайһығыҙмы?',
	'articlefeedback-field-wellwritten-label' => 'Уҡымлылыҡ',
	'articlefeedback-field-wellwritten-tip' => 'Һеҙ был бит яҡшы ойошторолған һәм яҡшы яҙылған, тип һанайһығыҙмы?',
	'articlefeedback-pitch-reject' => 'Юҡ, рәхмәт',
	'articlefeedback-pitch-survey-accept' => 'Башларға',
	'articlefeedback-pitch-join-accept' => 'Иҫәп яҙмаһын булдырырға',
	'articlefeedback-pitch-edit-accept' => 'Үҙгәртә башларға',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'articlefeedback' => 'Адзнака артыкулаў',
	'articlefeedback-desc' => 'Адзнака артыкулаў (пачатковая вэрсія)',
	'articlefeedback-survey-question-whyrated' => 'Калі ласка, паведаміце нам, чаму Вы адзначылі сёньня гэтую старонку (пазначце ўсе падыходзячыя варыянты):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я жадаю зрабіць унёсак у агульную адзнаку старонкі',
	'articlefeedback-survey-answer-whyrated-development' => 'Я спадзяюся, што мая адзнака пазытыўна паўплывае на разьвіцьцё старонкі',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я жадаю садзейнічаць разьвіцьцю {{GRAMMAR:родны|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Я жадаю падзяліцца маім пунктам гледжаньня',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не адзначыў сёньня, але хацеў даць водгук пра гэтую магчымасьць',
	'articlefeedback-survey-answer-whyrated-other' => 'Іншае',
	'articlefeedback-survey-question-useful' => 'Вы верыце, што пададзеныя адзнакі карысныя і зразумелыя?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чаму?',
	'articlefeedback-survey-question-comments' => 'Вы маеце якія-небудзь дадатковыя камэнтары?',
	'articlefeedback-survey-submit' => 'Даслаць',
	'articlefeedback-survey-title' => 'Калі ласка, адкажыце на некалькі пытаньняў',
	'articlefeedback-survey-thanks' => 'Дзякуй за адказы на пытаньні.',
	'articlefeedback-error' => 'Узьнікла памылка. Калі ласка, паспрабуйце потым',
	'articlefeedback-form-switch-label' => 'Адзначце гэтую старонку',
	'articlefeedback-form-panel-title' => 'Адзначце гэтую старонку',
	'articlefeedback-form-panel-instructions' => 'Калі ласка, знайдзіце час, каб адзначыць гэтую старонку.',
	'articlefeedback-form-panel-clear' => 'Выдаліць гэтую адзнаку',
	'articlefeedback-form-panel-expertise' => 'Я маю значныя веды па гэтай тэме',
	'articlefeedback-form-panel-expertise-studies' => 'Я яе вывучаў у каледжы/унівэрсытэце',
	'articlefeedback-form-panel-expertise-profession' => 'Гэта частка маёй прафэсіі',
	'articlefeedback-form-panel-expertise-hobby' => 'Яна зьвязаная з маімі захапленьнямі і інтарэсамі',
	'articlefeedback-form-panel-expertise-other' => 'Крыніцы маіх ведаў няма ў гэтым сьпісе',
	'articlefeedback-form-panel-submit' => 'Даслаць водгук',
	'articlefeedback-report-switch-label' => 'Паказаць адзнакі старонкі',
	'articlefeedback-report-panel-title' => 'Адзнакі старонкі',
	'articlefeedback-report-panel-description' => 'Цяперашнія сярэднія адзнакі.',
	'articlefeedback-report-empty' => 'Адзнакаў няма',
	'articlefeedback-report-ratings' => '$1 {{PLURAL:$1|адзнака|адзнакі|адзнакаў}}',
	'articlefeedback-field-trustworthy-label' => 'Надзейны',
	'articlefeedback-field-trustworthy-tip' => 'Вы лічыце, што гэтая старонка мае дастаткова цытатаў, і яны паходзяць з крыніц вартых даверу?',
	'articlefeedback-field-complete-label' => 'Скончанасьць',
	'articlefeedback-field-complete-tip' => 'Вы лічыце, што гэтая старонка раскрывае асноўныя пытаньні тэмы як сьлед?',
	'articlefeedback-field-objective-label' => "Аб'ектыўны",
	'articlefeedback-field-objective-tip' => 'Вы лічыце, што на гэтай старонцы адлюстраваныя усе пункты гледжаньня на пытаньне?',
	'articlefeedback-field-wellwritten-label' => 'Добра напісаны',
	'articlefeedback-field-wellwritten-tip' => 'Вы лічыце, што гэтая старонка добра арганізаваная і добра напісаная?',
	'articlefeedback-pitch-reject' => 'Можа потым',
	'articlefeedback-pitch-or' => 'ці',
	'articlefeedback-pitch-thanks' => 'Дзякуй! Вашая адзнака была захаваная.',
	'articlefeedback-pitch-survey-message' => 'Калі ласка, знайдзіце час каб прыняць удзел у невялікім апытаньні.',
	'articlefeedback-pitch-survey-accept' => 'Пачаць апытаньне',
	'articlefeedback-pitch-join-message' => 'Вы ведалі, што можаце стварыць рахунак? Рахунак дапаможа Вам сачыць за Вашымі рэдагаваньнямі, весьці абмеркаваньні і быць часткай суполкі.',
	'articlefeedback-pitch-join-accept' => 'Стварыць рахунак',
	'articlefeedback-pitch-join-login' => 'Увайсьці ў сыстэму',
	'articlefeedback-pitch-edit-message' => 'Вы ведалі, што можаце рэдагаваць гэтую старонку?',
	'articlefeedback-pitch-edit-accept' => 'Рэдагаваць гэтую старонку',
	'articlefeedback-expert-assessment-question' => 'Ці Вы маеце веды па гэтай тэме?',
	'articlefeedback-expert-assessment-level-1-label' => 'Нязначныя',
	'articlefeedback-expert-assessment-level-2-label' => 'Добрыя',
	'articlefeedback-expert-assessment-level-3-label' => 'Экспэртныя',
	'articlefeedback-survey-message-success' => 'Дзякуй за адказы на гэтае апытаньне.',
	'articlefeedback-survey-message-error' => 'Узьнікла памылка.
Калі ласка, паспрабуйце потым.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 * @author Turin
 */
$messages['bg'] = array(
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Исках да допринеса за общата оценка на страницата',
	'articlefeedback-survey-answer-whyrated-development' => 'Надявам се, че оценката ми ще се отрази положително върху развитието на страницата',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Исках да допринеса за {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Харесва ми да споделям мнението си',
	'articlefeedback-survey-answer-whyrated-other' => 'Друго',
	'articlefeedback-survey-question-useful-iffalse' => 'Защо?',
	'articlefeedback-survey-question-comments' => 'Имате ли някакви допълнителни коментари?',
	'articlefeedback-survey-submit' => 'Изпращане',
	'articlefeedback-survey-title' => 'Моля, отговорете на няколко въпроса',
	'articlefeedback-survey-thanks' => 'Благодарим ви, че попълнихте въпросника!',
	'articlefeedback-report-switch-label' => 'Показване на резултатите',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Gwendal
 * @author Y-M D
 */
$messages['br'] = array(
	'articlefeedback' => 'Priziadenn pennadoù',
	'articlefeedback-desc' => 'Priziadenn pennadoù (stumm stur)',
	'articlefeedback-survey-question-whyrated' => "Roit deomp an abeg d'ar perak ho peus priziet ar bajenn-mañ hiziv (kevaskit an abegoù gwirion) :",
	'articlefeedback-survey-answer-whyrated-contribute-rating' => "C'hoant em boa reiñ sikour evit priziañ d'un doare hollek ar bajenn",
	'articlefeedback-survey-answer-whyrated-development' => "Spi am eus e servijo d'un doare pozitivel ma friziadenn evit dioreiñ ar bajenn",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => "C'hoant em boa kenober da {{SITENAME}}",
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Plijout a ra din reiñ ma ali',
	'articlefeedback-survey-answer-whyrated-didntrate' => "N'am eus ket priziet ar bajenn hiziv, reiñ ma soñj diwar-benn an arc'hweladur an hini eo",
	'articlefeedback-survey-answer-whyrated-other' => 'All',
	'articlefeedback-survey-question-useful' => "Hag-eñ e soñjoc'h ez eo ar briziadennoù roet talvoudus ha sklaer ?",
	'articlefeedback-survey-question-useful-iffalse' => 'Perak ?',
	'articlefeedback-survey-question-comments' => 'Evezhiadennoù all ho pefe ?',
	'articlefeedback-survey-submit' => 'Kas',
	'articlefeedback-survey-title' => "Trugarez da respont d'un nebeut goulennoù",
	'articlefeedback-survey-thanks' => 'Trugarez da vezañ leuniet ar goulennaoueg.',
	'articlefeedback-error' => "C'hoarvezet ez eus ur fazi. Esaeit en-dro diwezhtaoc'h, mar plij.",
	'articlefeedback-form-switch-label' => "Reiñ un notenn d'ar bajenn-mañ",
	'articlefeedback-form-panel-title' => "Reiñ un notenn d'ar bajenn-mañ",
	'articlefeedback-form-panel-instructions' => 'Trugarez da gemer un tamm amzer da briziañ ar bajenn-mañ.',
	'articlefeedback-form-panel-clear' => 'Lemel an notenn-mañ',
	'articlefeedback-form-panel-expertise' => 'Anavezout a ran diouzh an danvez-se',
	'articlefeedback-form-panel-expertise-studies' => 'Studiet eo bet ganin er skol pe er skol-veur',
	'articlefeedback-form-panel-expertise-profession' => 'Ul lodenn eus ma micher eo',
	'articlefeedback-form-panel-expertise-hobby' => 'Dik on gant an danvez-se',
	'articlefeedback-form-panel-expertise-other' => "Orin ma anaouedegezh n'eo ket renablet aze",
	'articlefeedback-form-panel-submit' => 'Kas an evezhiadenn',
	'articlefeedback-report-switch-label' => 'Gwelet notennoù ar bajenn',
	'articlefeedback-report-panel-title' => 'Priziadennoù ar bajenn',
	'articlefeedback-report-panel-description' => 'Notennoù keitat evit ar mare.',
	'articlefeedback-report-empty' => 'Priziadenn ebet',
	'articlefeedback-report-ratings' => '$1 priziadenn',
	'articlefeedback-field-trustworthy-label' => 'A fiziañs',
	'articlefeedback-field-trustworthy-tip' => "Ha soñjal a ra deoc'h ez eus arroudennoù a-walc'h er bajenn-mañ ? Ha diwar mammennoù sirius e teuont ?",
	'articlefeedback-field-complete-label' => 'Graet',
	'articlefeedback-field-complete-tip' => "Ha soñjal a ra deoc'h e vez graet mat tro temoù pennañ ar sujed ?",
	'articlefeedback-field-objective-label' => 'Diuntu',
	'articlefeedback-field-objective-tip' => "Ha soñjal a ra deoc'h e vez kavet displeget er bajenn-mañ, en un doare reizh a-walc'h, holl tuioù ar sujed ?",
	'articlefeedback-field-wellwritten-label' => 'Skrivet brav',
	'articlefeedback-field-wellwritten-tip' => "Ha soñjal a ra deoc'h eo skrivet brav ha frammet mat ar bajenn-mañ ?",
	'articlefeedback-pitch-reject' => "Diwezhatoc'hik marteze",
	'articlefeedback-pitch-or' => 'pe',
	'articlefeedback-pitch-thanks' => 'Trugarez ! Enrollet eo bet ho priziadenn.',
	'articlefeedback-pitch-survey-message' => "Tapit un tammig amzer da respont d'ur sontadeg vihan.",
	'articlefeedback-pitch-survey-accept' => 'Kregiñ gant an enklask',
	'articlefeedback-pitch-join-message' => "Ha gouzout a rit e c'hallit krouiñ ur gont ? Gant ur gont e c'hallot heuliañ ar c'hemmoù degaset ganeoc'h, kemer perzh e kaozeadennoù, ha bezañ ezel eus ar gumuniezh.",
	'articlefeedback-pitch-join-accept' => 'Krouiñ ur gont',
	'articlefeedback-pitch-join-login' => 'Kevreañ',
	'articlefeedback-pitch-edit-message' => "Ha gouzout a rit e c'hallit degas kemmoù war ar bajenn-mañ ?",
	'articlefeedback-pitch-edit-accept' => 'Degas kemmoù war ar bajenn-mañ',
	'articlefeedback-expert-assessment-question' => 'Ha gouzout a rit diouzh ar sujed-mañ ?',
	'articlefeedback-expert-assessment-level-1-label' => 'Dister',
	'articlefeedback-expert-assessment-level-2-label' => 'Barrek',
	'articlefeedback-expert-assessment-level-3-label' => 'Mailh',
	'articlefeedback-survey-message-success' => 'Trugarez da vezañ leuniet ar goulennaoueg.',
	'articlefeedback-survey-message-error' => "Ur fazi zo bet.
Klaskit en-dro diwezhatoc'h.",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'articlefeedback' => 'Ocjenjivanje članaka',
	'articlefeedback-desc' => 'Ocjenjivanje članaka (probna verzija)',
	'articlefeedback-survey-question-whyrated' => 'Molimo recite nam zašto se ocijenili danas ovu stranicu (označite sve koje se može primijeniti):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želio sam da pridonesem sveukupnoj ocjeni stranice',
	'articlefeedback-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivan odjek na uređivanje stranice',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želim da pridonosim na projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio da dadnem povratne podatke o mogućnostima',
	'articlefeedback-survey-answer-whyrated-other' => 'Ostalo',
	'articlefeedback-survey-question-useful' => 'Da li vjerujete da su date ocjene korisne i jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zašto?',
	'articlefeedback-survey-question-comments' => 'Da li imate dodatnih komentara?',
	'articlefeedback-survey-submit' => 'Pošalji',
	'articlefeedback-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articlefeedback-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
	'articlefeedback-error' => 'Desila se greška. Molimo pokušajte kasnije.',
	'articlefeedback-form-switch-label' => 'Ocijeni ovu stranicu',
	'articlefeedback-form-panel-title' => 'Ocijeni ovu stranicu',
	'articlefeedback-form-panel-instructions' => 'Molimo odvojite trenutak vremena da ocijenite ovu stranicu.',
	'articlefeedback-form-panel-clear' => 'Ukloni ovu ocjenu',
	'articlefeedback-form-panel-expertise' => 'Imam ranije znanje o ovoj temi',
	'articlefeedback-form-panel-expertise-studies' => 'Ovo sam studirao na koledžu/fakultetu',
	'articlefeedback-form-panel-expertise-profession' => 'Ovo je dio moje struke',
	'articlefeedback-form-panel-expertise-hobby' => 'Ovo je vezano sa mojim hobijima ili zanimanjima',
	'articlefeedback-form-panel-expertise-other' => 'Izvor mog znanja nije prikazan ovdje',
	'articlefeedback-form-panel-submit' => 'Pošalji povratne informacije',
	'articlefeedback-report-switch-label' => 'Prikaži ocjene stranice',
	'articlefeedback-report-panel-title' => 'Ocjene stranice',
	'articlefeedback-report-panel-description' => 'Trenutni prosječni rejtinzi.',
	'articlefeedback-report-empty' => 'Bez ocjena',
	'articlefeedback-report-ratings' => '$1 ocjena',
	'articlefeedback-field-trustworthy-label' => 'Vjerodostojno',
	'articlefeedback-field-trustworthy-tip' => 'Da li smatrate da ova stranica ima dovoljno izvora i da su oni iz provjerljivih izvora?',
	'articlefeedback-field-complete-label' => 'Završeno',
	'articlefeedback-field-complete-tip' => 'Da li mislite da ova stranica pokriva osnovna područja teme koja bi trebala?',
	'articlefeedback-field-objective-label' => 'Nepristrano',
	'articlefeedback-field-objective-tip' => 'Da li smatrate da ova stranica prikazuje neutralni prikaz iz svih perspektiva o temi?',
	'articlefeedback-field-wellwritten-label' => 'Dobro napisano',
	'articlefeedback-field-wellwritten-tip' => 'Da li mislite da je ova stranica dobro organizirana i dobro napisana?',
	'articlefeedback-pitch-reject' => 'Možda kasnije',
	'articlefeedback-pitch-or' => 'ili',
	'articlefeedback-pitch-survey-accept' => 'Započni anketu',
	'articlefeedback-pitch-join-accept' => 'Napravi račun',
	'articlefeedback-pitch-join-login' => 'Prijavi se',
	'articlefeedback-pitch-edit-accept' => 'Uredite ovu stranicu',
	'articlefeedback-expert-assessment-question' => 'Da li imate znanja o ovoj temi?',
	'articlefeedback-expert-assessment-level-1-label' => 'Površno',
	'articlefeedback-expert-assessment-level-2-label' => 'Dostatno',
	'articlefeedback-expert-assessment-level-3-label' => 'Stručnjak',
	'articlefeedback-survey-message-success' => 'Hvala vam na popunjavanju ankete.',
	'articlefeedback-survey-message-error' => 'Desila se greška.
Molimo pokušajte kasnije.',
);

/** Catalan (Català)
 * @author El libre
 * @author Solde
 */
$messages['ca'] = array(
	'articlefeedback' => "Avaluació de l'article",
	'articlefeedback-desc' => "Avaluació de l'article",
	'articlefeedback-survey-question-whyrated' => "Per favor, diga'ns per què has valorat aquesta pàgina avui (marca totes les opcions que creguis convenient):",
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Vull contribuir a la qualificació global de la pàgina',
	'articlefeedback-survey-answer-whyrated-development' => 'Espero que la meva qualificació afecti positivament al desenvolupament de la pàgina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Volia contribuir a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Vull compartir la meva opinió',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'No he valorat res avui, però volia donar resposta a la característica',
	'articlefeedback-survey-answer-whyrated-other' => 'Altres',
	'articlefeedback-survey-question-useful' => 'Creus que les valoracions proporcionades són útils i clares?',
	'articlefeedback-survey-question-useful-iffalse' => 'Per què?',
	'articlefeedback-survey-question-comments' => 'Tens algun comentari addicional?',
	'articlefeedback-survey-submit' => 'Trametre',
	'articlefeedback-survey-title' => 'Si us plau, contesti algunes preguntes',
	'articlefeedback-survey-thanks' => "Gràcies per omplir l'enquesta.",
	'articlefeedback-form-switch-label' => 'Proporciona informació',
	'articlefeedback-form-panel-title' => 'Els teus comentaris',
	'articlefeedback-form-panel-instructions' => 'Si us plau dedica un moment per valorar aquesta pàgina.',
	'articlefeedback-form-panel-submit' => 'Envia comentaris',
	'articlefeedback-report-switch-label' => 'Mostra els resultats',
	'articlefeedback-report-panel-title' => 'Resultats dels comentaris',
	'articlefeedback-report-panel-description' => 'Actual mitjana de qualificacions.',
	'articlefeedback-report-empty' => 'No hi ha valoracions',
	'articlefeedback-report-ratings' => '$1 valoracions',
	'articlefeedback-field-trustworthy-label' => 'Digne de confiança',
	'articlefeedback-field-complete-label' => 'Complet',
	'articlefeedback-field-complete-tip' => 'Consideres que aquesta pàgina aborda els temes essencials que havien de ser coberts?',
	'articlefeedback-field-objective-label' => 'Imparcial',
	'articlefeedback-field-objective-tip' => "Creus que aquesta pàgina representa, de forma equilibrada, tots els punts de vista sobre l'assumpte?",
	'articlefeedback-field-wellwritten-label' => 'Ben escrit',
	'articlefeedback-pitch-reject' => 'No, gràcies',
	'articlefeedback-pitch-survey-accept' => "Comença l'enquesta",
	'articlefeedback-pitch-join-accept' => 'Crea un compte',
	'articlefeedback-pitch-edit-accept' => 'Comença a editar',
);

/** Chechen (Нохчийн)
 * @author Sasan700
 */
$messages['ce'] = array(
	'articlefeedback-form-panel-submit' => 'Дlадахьийта хетарг',
);

/** Czech (Česky)
 * @author Mormegil
 */
$messages['cs'] = array(
	'articlefeedback' => 'Hodnocení článku',
	'articlefeedback-desc' => 'Hodnocení článků (pilotní verze)',
	'articlefeedback-survey-question-whyrated' => 'Proč jste dnes hodnotili tuto stránku (zaškrtněte všechny platné možnosti)?',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chtěl jsem ovlivnit výsledné ohodnocení stránky',
	'articlefeedback-survey-answer-whyrated-development' => 'Doufám, že mé hodnocení pozitivně ovlivní budoucí vývoj stránky',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chtěl jsem pomoci {{grammar:3sg|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rád sděluji svůj názor',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Dnes jsem nehodnotil, ale chtěl jsem poskytnout svůj názor na tuto funkci',
	'articlefeedback-survey-answer-whyrated-other' => 'Jiný důvod',
	'articlefeedback-survey-question-useful' => 'Myslíte si, že poskytovaná hodnocení jsou užitečná a pochopitelná?',
	'articlefeedback-survey-question-useful-iffalse' => 'Proč?',
	'articlefeedback-survey-question-comments' => 'Máte nějaké další komentáře?',
	'articlefeedback-survey-submit' => 'Odeslat',
	'articlefeedback-survey-title' => 'Odpovězte prosím na několik otázek',
	'articlefeedback-survey-thanks' => 'Děkujeme za vyplnění průzkumu.',
	'articlefeedback-form-panel-instructions' => 'Věnujte prosím chvilku ohodnocení této stránky.',
	'articlefeedback-report-switch-label' => 'Zobrazit výsledky',
	'articlefeedback-field-trustworthy-tip' => 'Máte pocit, že tato stránka dostatečně odkazuje na zdroje a použité zdroje jsou důvěryhodné?',
	'articlefeedback-field-complete-label' => 'Úplnost',
	'articlefeedback-field-complete-tip' => 'Máte pocit, že tato stránka pokrývá všechny důležité části tématu?',
	'articlefeedback-field-objective-tip' => 'Máte pocit, že tato stránka spravedlivě pokrývá všechny pohledy na dané téma?',
	'articlefeedback-field-wellwritten-tip' => 'Máte pocit, že tato stránka je správně organizována a dobře napsána?',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'articlefeedback' => 'Seiteneinschätzung',
	'articlefeedback-desc' => 'Ermöglicht die Einschätzung von Seiten (Pilotversion)',
	'articlefeedback-survey-question-whyrated' => 'Bitte lasse uns wissen, warum du diese Seite heute eingeschätzt hast (Zutreffendes bitte ankreuzen):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ich wollte mich an der Einschätzung der Seite beteiligen',
	'articlefeedback-survey-answer-whyrated-development' => 'Ich hoffe, dass meine Einschätzung die künftige Entwicklung der Seite positiv beeinflusst',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ich wollte mich an {{SITENAME}} beteiligen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ich teile meine Einschätzung gerne mit',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ich habe heute keine Einschätzung vorgenommen, wollte allerdings eine Rückmeldung zu dieser Funktion zur Einschätzung der Seite geben',
	'articlefeedback-survey-answer-whyrated-other' => 'Anderes',
	'articlefeedback-survey-question-useful' => 'Glaubst du, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articlefeedback-survey-question-useful-iffalse' => 'Warum?',
	'articlefeedback-survey-question-comments' => 'Hast du noch weitere Anmerkungen?',
	'articlefeedback-survey-submit' => 'Speichern',
	'articlefeedback-survey-title' => 'Bitte beantworte uns ein paar Fragen',
	'articlefeedback-survey-thanks' => 'Vielen Dank für die Teilnahme an der Umfrage.',
	'articlefeedback-error' => 'Ein Fehler ist aufgetreten. Bitte versuche es später erneut.',
	'articlefeedback-form-switch-label' => 'Diese Seite einschätzen',
	'articlefeedback-form-panel-title' => 'Diese Seite einschätzen',
	'articlefeedback-form-panel-instructions' => 'Bitte nimm dir kurz Zeit, diese Seite einzuschätzen.',
	'articlefeedback-form-panel-clear' => 'Einschätzung entfernen',
	'articlefeedback-form-panel-expertise' => 'Ich habe Vorkenntnisse zu diesem Thema',
	'articlefeedback-form-panel-expertise-studies' => 'Ich habe es an einer Hochschule studiert',
	'articlefeedback-form-panel-expertise-profession' => 'Es ist ein Teil meines Berufes',
	'articlefeedback-form-panel-expertise-hobby' => 'Es hängt mit meinen Hobbies und Interesse zusammen',
	'articlefeedback-form-panel-expertise-other' => 'Die Grund für meine Kenntnisse ist hier nicht aufgeführt',
	'articlefeedback-form-panel-submit' => 'Einschätzung übermitteln',
	'articlefeedback-report-switch-label' => 'Einschätzungen zu dieser Seite ansehen',
	'articlefeedback-report-panel-title' => 'Einschätzungen zu dieser Seite',
	'articlefeedback-report-panel-description' => 'Aktuelle Durchschnittsergebnisse der Einschätzungen',
	'articlefeedback-report-empty' => 'Keine Einschätzungen',
	'articlefeedback-report-ratings' => '$1 Einschätzungen',
	'articlefeedback-field-trustworthy-label' => 'Vertrauenswürdig',
	'articlefeedback-field-trustworthy-tip' => 'Hast du den Eindruck, dass diese Seite über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articlefeedback-field-complete-label' => 'Vollständig',
	'articlefeedback-field-complete-tip' => 'Hast du den Eindruck, dass diese Seite alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articlefeedback-field-objective-label' => 'Unvoreingenommen',
	'articlefeedback-field-objective-tip' => 'Hast du den Eindruck, dass diese Seite eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articlefeedback-field-wellwritten-label' => 'Gut geschrieben',
	'articlefeedback-field-wellwritten-tip' => 'Hast du den Eindruck, dass diese Seite gut strukturiert sowie geschrieben wurde?',
	'articlefeedback-pitch-reject' => 'Vielleicht später',
	'articlefeedback-pitch-or' => 'oder',
	'articlefeedback-pitch-thanks' => 'Vielen Dank! Deine Einschätzung wurde gespeichert.',
	'articlefeedback-pitch-survey-message' => 'Bitte nehme dir einen Moment Zeit, um an einer kurzen Umfrage teilzunehmen.',
	'articlefeedback-pitch-survey-accept' => 'Umfrage starten',
	'articlefeedback-pitch-join-message' => 'Wusstest du, dass du auch ein Benutzerkonto anlegen kannst? Ein Benutzerkonto hilft dir deine Bearbeitungen nachzuvollziehen, dich einfacher an Diskussionen zu beteiligen sowie ein Teil der Wikipedia zu werden.',
	'articlefeedback-pitch-join-accept' => 'Benutzerkonto erstellen',
	'articlefeedback-pitch-join-login' => 'Anmelden',
	'articlefeedback-pitch-edit-message' => 'Wusstest du, dass du diesen Artikel bearbeiten kannst?',
	'articlefeedback-pitch-edit-accept' => 'Diesen Artikel bearbeiten',
	'articlefeedback-expert-assessment-question' => 'Besitzt du Kenntnisse bezüglich dieses Themas?',
	'articlefeedback-expert-assessment-level-1-label' => 'Kaum',
	'articlefeedback-expert-assessment-level-2-label' => 'Fortgeschritten',
	'articlefeedback-expert-assessment-level-3-label' => 'Umfassend',
	'articlefeedback-survey-message-success' => 'Vielen Dank für die Teilnahme an der Umfrage.',
	'articlefeedback-survey-message-error' => 'Ein Fehler ist aufgetreten.
Bitte später erneut versuchen.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Catrope
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'articlefeedback-survey-question-whyrated' => 'Bitte lassen Sie uns wissen, warum Sie diese Seite heute eingeschätzt haben (Zutreffendes bitte ankreuzen):',
	'articlefeedback-survey-question-useful' => 'Glauben Sie, dass die abgegebenen Einschätzungen nützlich und verständlich sind?',
	'articlefeedback-survey-question-comments' => 'Haben Sie noch weitere Anmerkungen?',
	'articlefeedback-survey-title' => 'Bitte beantworten Sie uns ein paar Fragen',
	'articlefeedback-survey-thanks' => 'Vielen Dank für Ihre Rückmeldung.',
	'articlefeedback-error' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.',
	'articlefeedback-form-panel-instructions' => 'Bitte nehmen Sie sich kurz Zeit, diesen Seite einzuschätzen.',
	'articlefeedback-field-trustworthy-tip' => 'Haben Sie den Eindruck, dass diese Seite über genügend Quellenangaben verfügt und diese zudem aus vertrauenswürdigen Quellen stammen?',
	'articlefeedback-field-complete-tip' => 'Haben Sie den Eindruck, dass diese Seite alle wichtigen Aspekte enthält, die mit dessen Inhalt zusammenhängen?',
	'articlefeedback-field-objective-tip' => 'Haben Sie den Eindruck, dass diese Seite eine ausgewogene Darstellung aller mit dessen Inhalt verbundenen Aspekte enthält?',
	'articlefeedback-field-wellwritten-tip' => 'Haben Sie den Eindruck, dass diese Seite gut strukturiert sowie geschrieben wurde?',
	'articlefeedback-pitch-thanks' => 'Vielen Dank! Ihre Einschätzung wurde gespeichert.',
	'articlefeedback-pitch-survey-message' => 'Bitte nehmen Sie sich einen Moment Zeit, um an einer kurzen Umfrage teilzunehmen.',
	'articlefeedback-pitch-join-message' => 'Wussten Sie, dass Sie auch ein Benutzerkonto anlegen können? Ein Benutzerkonto hilft Ihnen Ihre Bearbeitungen nachzuvollziehen, sich einfacher an Diskussionen zu beteiligen sowie ein Teil der Wikipedia zu werden.',
	'articlefeedback-pitch-edit-message' => 'Wussten Sie, dass Sie diesen Artikel bearbeiten können?',
	'articlefeedback-expert-assessment-question' => 'Besitzen Sie Kenntnisse bezüglich dieses Themas?',
	'articlefeedback-survey-message-error' => 'Ein Fehler ist aufgetreten.
Bitte versuchen Sie es später erneut.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Som kśěł k {{SITENAME}} pśinosowaś',
	'articlefeedback-survey-answer-whyrated-other' => 'Druge',
	'articlefeedback-survey-question-useful-iffalse' => 'Cogodla?',
	'articlefeedback-survey-question-comments' => 'Maš hyšći dalšne komentary?',
	'articlefeedback-survey-submit' => 'Wótpósłaś',
	'articlefeedback-survey-title' => 'Pšosym wótegroń na někotare pšašanja',
	'articlefeedback-error' => 'Zmólka jo nastała. Pšosym wopytaj pózdźej hyšći raz.',
	'articlefeedback-form-panel-expertise' => 'Mam pśedznaśa k toś tej temje',
	'articlefeedback-form-panel-expertise-studies' => 'Som na wušej šuli/uniwersiśe studěrował',
	'articlefeedback-form-panel-expertise-profession' => 'Jo źěl mójogo pówołanja',
	'articlefeedback-form-panel-expertise-hobby' => 'Zwisujo z mójimi hobbyjami abo zajmami',
	'articlefeedback-form-panel-expertise-other' => 'Žrědło mójich znajobnosćow njejo how pódane',
	'articlefeedback-report-switch-label' => 'Pogódnośenja boka pokazaś',
	'articlefeedback-report-empty' => 'Žedne pogódnośenja',
	'articlefeedback-report-ratings' => '$1 pogódnosénjow',
	'articlefeedback-field-trustworthy-label' => 'Dowěry gódny',
	'articlefeedback-field-complete-label' => 'Dopołny',
	'articlefeedback-field-wellwritten-label' => 'Derje napisany',
	'articlefeedback-pitch-reject' => 'Snaź pózdźej',
	'articlefeedback-pitch-or' => 'abo',
	'articlefeedback-pitch-join-accept' => 'Konto załožyś',
	'articlefeedback-pitch-join-login' => 'Pśizjawiś',
	'articlefeedback-pitch-edit-accept' => 'Toś ten nastawk wobźěłaś',
	'articlefeedback-expert-assessment-question' => 'Maš znajobnosći k toś tej temje?',
	'articlefeedback-survey-message-error' => 'Zmólka jo nastała. Pšosym wopytaj pózdźej hyšći raz.',
);

/** Greek (Ελληνικά)
 * @author Glavkos
 */
$messages['el'] = array(
	'articlefeedback' => 'Αξιολόγηση Άρθρου',
	'articlefeedback-desc' => 'Αξιολόγηση Άρθρου (πιλοτική έκδοση)',
	'articlefeedback-survey-question-whyrated' => 'Bonvolu informigi nin  kial vi taksis ĉi tiun paĝon hodiaŭ (marku ĉion taŭgan):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Mi volis kontribui al la suma taksado de la paĝo',
	'articlefeedback-survey-answer-whyrated-development' => 'Mi esperas ke mia takso pozitive influus la disvolvadon de la paĝo',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Mi volis kontribui al {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Plaĉas al mi doni mian opinion.',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Mi ne provizas taksojn hodiaŭ, se volis doni komentojn pri la ilo',
	'articlefeedback-survey-answer-whyrated-other' => 'Alia',
	'articlefeedback-survey-question-useful' => 'Ĉu vi konsideras ke la taksoj provizitaj estas utilaj kaj klara?',
	'articlefeedback-survey-question-useful-iffalse' => 'Kial?',
	'articlefeedback-survey-question-comments' => 'Ĉu vi havas iujn suplementajn komentojn?',
	'articlefeedback-survey-submit' => 'Enigi',
	'articlefeedback-survey-title' => 'Bonvolu respondi al kelkaj demandoj',
	'articlefeedback-survey-thanks' => 'Dankon pro plenumante la enketon.',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'articlefeedback' => 'Takso de artikolo',
	'articlefeedback-desc' => 'Artikola takso (testa versio)',
	'articlefeedback-survey-question-whyrated' => 'Bonvolu informigi nin  kial vi taksis ĉi tiun paĝon hodiaŭ (marku ĉion taŭgan):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Mi volis kontribui al la suma taksado de la paĝo',
	'articlefeedback-survey-answer-whyrated-development' => 'Mi esperas ke mia takso pozitive influus la disvolvadon de la paĝo',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Mi volis kontribui al {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Plaĉas al mi doni mian opinion.',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Mi ne provizas taksojn hodiaŭ, se volis doni komentojn pri la ilo',
	'articlefeedback-survey-answer-whyrated-other' => 'Alia',
	'articlefeedback-survey-question-useful' => 'Ĉu vi konsideras ke la taksoj provizitaj estas utilaj kaj klara?',
	'articlefeedback-survey-question-useful-iffalse' => 'Kial?',
	'articlefeedback-survey-question-comments' => 'Ĉu vi havas iujn suplementajn komentojn?',
	'articlefeedback-survey-submit' => 'Enigi',
	'articlefeedback-survey-title' => 'Bonvolu respondi al kelkaj demandoj',
	'articlefeedback-survey-thanks' => 'Dankon pro plenumante la enketon.',
	'articlefeedback-error' => 'Eraro okazis. Bonvolu reprovi baldaŭ.',
	'articlefeedback-form-switch-label' => 'Taksu ĉi tiun paĝon',
	'articlefeedback-form-panel-title' => 'Taksi ĉi tiun paĝon',
	'articlefeedback-form-panel-instructions' => 'Bonvolu pasigi momenton por taksi ĉi tiun paĝon.',
	'articlefeedback-form-panel-expertise-studies' => 'Mi studis ĝin en kolegio aŭ universitato',
	'articlefeedback-report-ratings' => '$1 taksoj',
	'articlefeedback-field-trustworthy-label' => 'Fidinda',
	'articlefeedback-field-trustworthy-tip' => 'Ĉu vi opinias ke ĉi tiu paĝo havas sufiĉajn citaĵojn kaj tiuj citaĵoj venas de fidindaj fontoj?',
	'articlefeedback-field-objective-tip' => 'Ĉu vi opinias ke ĉi tiu paĝo montras justan reprezentadon de ĉiuj perspektivoj pri la afero?',
	'articlefeedback-pitch-or' => 'aŭ',
	'articlefeedback-pitch-join-login' => 'Ensaluti',
);

/** Spanish (Español)
 * @author Dferg
 * @author Locos epraix
 * @author Sanbec
 * @author Translationista
 */
$messages['es'] = array(
	'articlefeedback' => 'Evaluación del artículo',
	'articlefeedback-desc' => 'Evaluación del artículo (versión de pruebas)',
	'articlefeedback-survey-question-whyrated' => 'Por favor, dinos por qué has valorado esta página hoy (marca todas las opciones que correspondan):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Quería contribuir a la calificación global de la página',
	'articlefeedback-survey-answer-whyrated-development' => 'Espero que mi calificación afecte positivamante el desarrollo de la página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Quería contribuir a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me gusta compartir mi opinión',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoy no evalué ninguna página. Sólo quise dejar mis comentarios sobre la funcionalidad.',
	'articlefeedback-survey-answer-whyrated-other' => 'Otro',
	'articlefeedback-survey-question-useful' => '¿Crees las valoraciones proporcionadas son útiles y claras?',
	'articlefeedback-survey-question-useful-iffalse' => '¿Por qué?',
	'articlefeedback-survey-question-comments' => '¿Tienes algún comentario adicional?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, contesta algunas preguntas',
	'articlefeedback-survey-thanks' => 'Gracias por completar la encuesta.',
	'articlefeedback-error' => 'Ha ocurrido un error. Por favor inténtalo de nuevo más tarde.',
	'articlefeedback-form-switch-label' => 'Evalúa esta página',
	'articlefeedback-form-panel-title' => 'Evalúa esta página',
	'articlefeedback-form-panel-instructions' => 'Por favor tómate un tiempo para evaluar esta página.',
	'articlefeedback-form-panel-clear' => 'Eliminar la evaluación',
	'articlefeedback-form-panel-expertise' => 'Tengo conocimientos previos sobre este tema',
	'articlefeedback-form-panel-expertise-studies' => 'Lo he estudiado en la universidad',
	'articlefeedback-form-panel-expertise-profession' => 'Es parte de mi profesión',
	'articlefeedback-form-panel-expertise-hobby' => 'Está relacionado con mis aficiones o intereses',
	'articlefeedback-form-panel-expertise-other' => 'La fuente de mi conocimiento no está en esta lista',
	'articlefeedback-form-panel-submit' => 'Enviar comentarios',
	'articlefeedback-report-switch-label' => 'Ver las calificaciones de la página',
	'articlefeedback-report-panel-title' => 'Evaluaciones de la página',
	'articlefeedback-report-panel-description' => 'Promedio actual de calificaciones.',
	'articlefeedback-report-empty' => 'No hay valoraciones',
	'articlefeedback-report-ratings' => '$1 valoraciones',
	'articlefeedback-field-trustworthy-label' => 'Confiable',
	'articlefeedback-field-trustworthy-tip' => '¿Posee esta página suficientes fuentes y éstas son fuentes de confianza?',
	'articlefeedback-field-complete-label' => 'Completa',
	'articlefeedback-field-complete-tip' => '¿Crees que esta página cubre las áreas esenciales del tópico que deberían estar cubiertas?',
	'articlefeedback-field-objective-label' => 'Objetivo',
);

/** Estonian (Eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'articlefeedback' => 'Artikli hindamine',
	'articlefeedback-desc' => 'Artikli hindamine (prooviversioon)',
	'articlefeedback-survey-question-whyrated' => 'Miks seda lehekülge täna hindasid (vali kõik sobivad):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Tahtsin leheküljele üldist hinnangut anda',
	'articlefeedback-survey-answer-whyrated-development' => 'Loodan, et minu hinnang aitab lehekülje arendamisele kaasa',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Tahtsin {{GRAMMAR:inessive|{{SITENAME}}}} kaastööd teha',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Mulle meeldib oma arvamust jagada',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ma ei hinnanud täna seda lehekülge, vaid tahtsin tagasisidet anda',
	'articlefeedback-survey-answer-whyrated-other' => 'Muu',
	'articlefeedback-survey-question-useful' => 'Kas pead antud hinnanguid kasulikuks ja selgeks?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miks?',
	'articlefeedback-survey-question-comments' => 'Kas sul on lisamärkusi?',
	'articlefeedback-survey-submit' => 'Saada',
	'articlefeedback-survey-title' => 'Palun vasta mõnele küsimusele.',
	'articlefeedback-survey-thanks' => 'Aitäh küsitlusele vastamast!',
);

/** Basque (Euskara)
 * @author Joxemai
 */
$messages['eu'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Beste bat',
	'articlefeedback-survey-question-useful-iffalse' => 'Zergatik?',
	'articlefeedback-survey-submit' => 'Bidali',
	'articlefeedback-form-panel-instructions' => 'Har ezazu mesedez une bat orri hau baloratzeko.',
	'articlefeedback-field-complete-label' => 'Osorik',
	'articlefeedback-pitch-edit-accept' => 'Hasi editatzen',
);

/** Persian (فارسی)
 * @author Huji
 * @author Mjbmr
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'articlefeedback' => 'ارزیابی مقاله‌ها',
	'articlefeedback-desc' => 'ارزیابی مقاله‌ها (نسخهٔ آزمایشی)',
	'articlefeedback-survey-question-whyrated' => 'لطفاً به ما اطلاع دهید که چرا شما امروز به این صفحه نمره دادید (تمام موارد مرتبط را انتخاب کنید):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'می‌خواستم در نمره کلی صفحه مشارکت کنم',
	'articlefeedback-survey-answer-whyrated-development' => 'امیدوارم که نمره‌ای که دادم اثر مثبتی روی پیشرفت صفحه داشته باشد',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'می‌خواستم به {{SITENAME}} کمک کنم',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'علاقه دارم نظر خودم را به اشتراک بگذارم',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'امروز نمره‌ای ندادم، اما می‌خواهم راجع به این ویژگی نظر بدهم',
	'articlefeedback-survey-answer-whyrated-other' => 'غیره',
	'articlefeedback-survey-question-useful' => 'آیا فکر می‌کنید نمره‌های ارائه شده مفید و واضح هستند؟',
	'articlefeedback-survey-question-useful-iffalse' => 'چرا؟',
	'articlefeedback-survey-question-comments' => 'آیا هر گونه نظر اضافی دارید؟',
	'articlefeedback-survey-submit' => 'ارسال',
	'articlefeedback-survey-title' => 'لطفاً به چند پرسش پاسخ دهید',
	'articlefeedback-survey-thanks' => 'از این که نظرسنجی را تکمیل کردید متشکریم.',
	'articlefeedback-report-switch-label' => 'مشاهدهٔ آرای صفحه',
	'articlefeedback-field-complete-label' => 'کامل بودن',
);

/** Finnish (Suomi)
 * @author Nike
 * @author Olli
 */
$messages['fi'] = array(
	'articlefeedback' => 'Artikkelin arviointi',
	'articlefeedback-desc' => 'Artikkelin arviointi (kokeiluversio)',
	'articlefeedback-survey-question-whyrated' => 'Kerro meille, miksi arvostelit tämän sivun tänään (lisää merkki kaikkiin, jotka pitävät paikkaansa):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Haluan vaikuttaa sivun kokonaisarvosanaan',
	'articlefeedback-survey-answer-whyrated-development' => 'Toivon, että arvosteluni vaikuttaisi positiivisesti sivun kehitykseen',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Haluan osallistua {{SITENAME}}-sivuston kehitykseen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Pidän mielipiteeni kertomisesta',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'En antanut arvosteluja tänään, mutta halusin antaa palautetta arvosteluominaisuudesta',
	'articlefeedback-survey-answer-whyrated-other' => 'Muu',
	'articlefeedback-survey-question-useful' => 'Ovatko annetut arvostelut mielestäsi hyödyllisiä ja todellisia?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miksi?',
	'articlefeedback-survey-question-comments' => 'Onko sinulla muita kommentteja?',
	'articlefeedback-survey-submit' => 'Lähetä',
	'articlefeedback-survey-title' => 'Vastaathan muutamiin kysymyksiin',
	'articlefeedback-survey-thanks' => 'Kiitos kyselyn täyttämisestä.',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 * @author Peter17
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'articlefeedback' => 'Évaluation d’article',
	'articlefeedback-desc' => 'Évaluation d’article (version pilote)',
	'articlefeedback-survey-question-whyrated' => 'Veuillez nous indiquer pourquoi vous avez évalué cette page aujourd’hui (cochez tout ce qui s’applique) :',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Je voulais contribuer à l’évaluation globale de la page',
	'articlefeedback-survey-answer-whyrated-development' => 'J’espère que mon évaluation aura une incidence positive sur le développement de la page',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Je voulais contribuer à {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'J’aime partager mon opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Je n’ai pas évalué la page, mais je voulais donner un retour sur cette fonctionnalité',
	'articlefeedback-survey-answer-whyrated-other' => 'Autre',
	'articlefeedback-survey-question-useful' => 'Pensez-vous que les évaluations fournies soient utiles et claires ?',
	'articlefeedback-survey-question-useful-iffalse' => 'Pourquoi ?',
	'articlefeedback-survey-question-comments' => 'Avez-vous d’autres commentaires ?',
	'articlefeedback-survey-submit' => 'Soumettre',
	'articlefeedback-survey-title' => 'Veuillez répondre à quelques questions',
	'articlefeedback-survey-thanks' => 'Merci d’avoir rempli le questionnaire.',
	'articlefeedback-error' => "Une erreur s'est produite. Veuillez réessayer plus tard.",
	'articlefeedback-form-switch-label' => 'Noter cette page',
	'articlefeedback-form-panel-title' => 'Noter cette page',
	'articlefeedback-form-panel-instructions' => 'Veuillez prendre un moment pour évaluer cette page.',
	'articlefeedback-form-panel-clear' => 'Supprimer cette évaluation',
	'articlefeedback-form-panel-expertise' => "J'ai des connaissances antérieures sur le sujet",
	'articlefeedback-form-panel-expertise-studies' => "Je l'ai étudié au collège ou à l'université",
	'articlefeedback-form-panel-expertise-profession' => 'Cela fait partie de ma profession',
	'articlefeedback-form-panel-expertise-hobby' => "C'est lié à mes passe-temps ou mes intérêts",
	'articlefeedback-form-panel-expertise-other' => "La source de ma connaissance n'est pas répertorié ici",
	'articlefeedback-form-panel-submit' => 'Envoyer le retour',
	'articlefeedback-report-switch-label' => 'Voir les notes des pages',
	'articlefeedback-report-panel-title' => 'Évaluation des pages',
	'articlefeedback-report-panel-description' => 'Notations moyennes actuelles.',
	'articlefeedback-report-empty' => 'Aucune évaluation',
	'articlefeedback-report-ratings' => 'Notations $1',
	'articlefeedback-field-trustworthy-label' => 'Digne de confiance',
	'articlefeedback-field-trustworthy-tip' => 'Pensez-vous que cette page a suffisamment de citations et que celles-ci proviennent de sources dignes de confiance.',
	'articlefeedback-field-complete-label' => 'Complet',
	'articlefeedback-field-complete-tip' => 'Pensez-vous que cette page couvre les thèmes essentiels du sujet ?',
	'articlefeedback-field-objective-label' => 'Impartial',
	'articlefeedback-field-objective-tip' => 'Pensez-vous que cette page fournit une présentation équitable de toutes les perspectives du sujet traité ?',
	'articlefeedback-field-wellwritten-label' => 'Bien écrit',
	'articlefeedback-field-wellwritten-tip' => 'Pensez-vous que cette page soit bien organisée et bien écrite ?',
	'articlefeedback-pitch-reject' => 'Peut-être plus tard',
	'articlefeedback-pitch-or' => 'ou',
	'articlefeedback-pitch-thanks' => 'Merci ! Votre évaluation a été enregistrée.',
	'articlefeedback-pitch-survey-message' => 'Veuillez prendre quelques instants pour remplir un court sondage.',
	'articlefeedback-pitch-survey-accept' => 'Démarrer l’enquête',
	'articlefeedback-pitch-join-message' => 'Saviez-vous que vous pouvez créer un compte ? Un compte vous aidera à suivre vos modifications, vous impliquer dans les discussions et faire partie de la communauté.',
	'articlefeedback-pitch-join-accept' => 'Créer un compte',
	'articlefeedback-pitch-join-login' => 'Se connecter',
	'articlefeedback-pitch-edit-message' => 'Saviez-vous que vous pouvez modifier cette page ?',
	'articlefeedback-pitch-edit-accept' => 'Modifier cette page',
	'articlefeedback-expert-assessment-question' => 'Avez-vous des connaissances dans ce domaine ?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Compétent',
	'articlefeedback-expert-assessment-level-3-label' => 'Expert',
	'articlefeedback-survey-message-success' => 'Merci d’avoir rempli le questionnaire.',
	'articlefeedback-survey-message-error' => 'Une erreur est survenue.
Veuillez ré-essayer plus tard.',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'articlefeedback' => 'Èstimacion d’articllo',
	'articlefeedback-desc' => 'Èstimacion d’articllo (vèrsion pilote)',
	'articlefeedback-survey-answer-whyrated-other' => 'Ôtra',
	'articlefeedback-survey-question-useful-iffalse' => 'Porquè ?',
	'articlefeedback-survey-submit' => 'Sometre',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'articlefeedback-survey-submit' => 'Invie',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'articlefeedback' => 'Avaliación do artigo',
	'articlefeedback-desc' => 'Versión piloto da avaliación dos artigos',
	'articlefeedback-survey-question-whyrated' => 'Díganos por que valorou esta páxina (marque todas as opcións que cumpran):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Quería colaborar na valoración da páxina',
	'articlefeedback-survey-answer-whyrated-development' => 'Agardo que a miña valoración afecte positivamente ao desenvolvemento da páxina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Quería colaborar con {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Gústame dar a miña opinión',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Non dei ningunha valoración, só quería deixar os meus comentarios sobre a característica',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Cre que as valoracións dadas son útiles e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Por que?',
	'articlefeedback-survey-question-comments' => 'Ten algún comentario adicional?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Responda algunhas preguntas',
	'articlefeedback-survey-thanks' => 'Grazas por encher a enquisa.',
	'articlefeedback-error' => 'Houbo un erro. Inténteo de novo máis tarde.',
	'articlefeedback-form-switch-label' => 'Avaliar esta páxina',
	'articlefeedback-form-panel-title' => 'Avaliar esta páxina',
	'articlefeedback-form-panel-instructions' => 'Por favor, tome uns intres para avaliar esta páxina.',
	'articlefeedback-form-panel-clear' => 'Eliminar a avaliación',
	'articlefeedback-form-panel-expertise' => 'Teño coñecementos previos sobre o tema',
	'articlefeedback-form-panel-expertise-studies' => 'Estudeino no instituto ou na universidade',
	'articlefeedback-form-panel-expertise-profession' => 'É parte da miña profesión',
	'articlefeedback-form-panel-expertise-hobby' => 'Está relacionado coas miñas afeccións ou intereses',
	'articlefeedback-form-panel-expertise-other' => 'A fonte do meu coñecemento non está nesta lista',
	'articlefeedback-form-panel-submit' => 'Enviar os comentarios',
	'articlefeedback-report-switch-label' => 'Ollar as avaliacións da páxina',
	'articlefeedback-report-panel-title' => 'Avaliacións da páxina',
	'articlefeedback-report-panel-description' => 'Avaliacións medias.',
	'articlefeedback-report-empty' => 'Sen avaliacións',
	'articlefeedback-report-ratings' => '$1 avaliacións',
	'articlefeedback-field-trustworthy-label' => 'Fidedigno',
	'articlefeedback-field-trustworthy-tip' => 'Cre que esta páxina ten citas suficientes e que estas son de fontes fiables?',
	'articlefeedback-field-complete-label' => 'Completo',
	'articlefeedback-field-complete-tip' => 'Cre que esta páxina aborda as áreas esenciais do tema que debería?',
	'articlefeedback-field-objective-label' => 'Imparcial',
	'articlefeedback-field-objective-tip' => 'Cre que esta páxina mostra unha representación xusta de todas as perspectivas do tema?',
	'articlefeedback-field-wellwritten-label' => 'Ben escrito',
	'articlefeedback-field-wellwritten-tip' => 'Cre que esta páxina está ben organizada e escrita?',
	'articlefeedback-pitch-reject' => 'Talvez logo',
	'articlefeedback-pitch-or' => 'ou',
	'articlefeedback-pitch-thanks' => 'Grazas! Gardáronse as súas valoracións.',
	'articlefeedback-pitch-survey-message' => 'Dedique un momento a encher esta pequena enquisa.',
	'articlefeedback-pitch-survey-accept' => 'Comezar a enquisa',
	'articlefeedback-pitch-join-message' => 'Sabía que pode crear unha conta? Unha conta axudará a seguir as súas edicións, participar en conversas e ser parte da comunidade.',
	'articlefeedback-pitch-join-accept' => 'Crear unha conta',
	'articlefeedback-pitch-join-login' => 'Rexistro',
	'articlefeedback-pitch-edit-message' => 'Sabía que pode editar esta páxina?',
	'articlefeedback-pitch-edit-accept' => 'Editar esta páxina',
	'articlefeedback-expert-assessment-question' => 'Ten coñecementos sobre o tema?',
	'articlefeedback-expert-assessment-level-1-label' => 'Pouco',
	'articlefeedback-expert-assessment-level-2-label' => 'Competente',
	'articlefeedback-expert-assessment-level-3-label' => 'Experto',
	'articlefeedback-survey-message-success' => 'Grazas por encher a enquisa.',
	'articlefeedback-survey-message-error' => 'Houbo un erro.
Inténteo de novo máis tarde.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'articlefeedback' => 'Artikelyyschetzig',
	'articlefeedback-desc' => 'Macht d Yyschetzig vu Artikel megli (Pilotversion)',
	'articlefeedback-survey-question-whyrated' => 'Bitte loss es is wisse, wurum Du dää Artikel hite yygschetzt hesch (bitte aachryzle, was zuetrifft):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ich haa welle mitmache bi dr Yyschetzig vu däm Artikel',
	'articlefeedback-survey-answer-whyrated-development' => 'Ich hoffe, ass myy Yyschetzig e positive Yyfluss het uf di chimftig Entwicklig vum Artikel',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ich haa welle mitmache bi {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ich tue gärn myy Meinig teile',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ich haa hite kei Yyschetzig vorgnuu, haa aber e Ruckmäldig zue däre Funktion welle gee',
	'articlefeedback-survey-answer-whyrated-other' => 'Anderi',
	'articlefeedback-survey-question-useful' => 'Glaubsch, ass d Yyschetzige, wu abgee wore sin, nitzli un verständli sin?',
	'articlefeedback-survey-question-useful-iffalse' => 'Wurum?',
	'articlefeedback-survey-question-comments' => 'Hesch no meh Aamerkige?',
	'articlefeedback-survey-submit' => 'Ibertrage',
	'articlefeedback-survey-title' => 'Bitte gib Antworte uf e paar Froge',
	'articlefeedback-survey-thanks' => 'Dankschen fir Dyy Ruckmäldig.',
	'articlefeedback-error' => 'S het e Fähler gee. Bitte versuech s speter nomol.',
	'articlefeedback-form-switch-label' => 'Die Syte yyschetze',
	'articlefeedback-form-panel-title' => 'Die Syte yyschetze',
	'articlefeedback-form-panel-instructions' => 'Bitte nimm Dir churz Zyt un tue dää Artikel yyschetze.',
	'articlefeedback-form-panel-clear' => 'Yyschetzig uuseneh',
	'articlefeedback-form-panel-expertise' => 'Ich haa Vorchänntnis zue däm Thema',
	'articlefeedback-form-panel-expertise-studies' => 'Ich haa s an ere Hochschuel studiert',
	'articlefeedback-form-panel-expertise-profession' => 'S isch Teil vu myym Beruef',
	'articlefeedback-form-panel-expertise-hobby' => 'S hangt zämme mit myyne Hobby un Inträsse',
	'articlefeedback-form-panel-expertise-other' => 'Dr Grund fir myy Chänntnis isch do nit ufgfiert',
	'articlefeedback-form-panel-submit' => 'Yyschetzig ibertrage',
	'articlefeedback-report-switch-label' => 'Yyschetzige zue däre Syte aaluege',
	'articlefeedback-report-panel-title' => 'Yyschetzige vu dr Syte',
	'articlefeedback-report-panel-description' => 'Aktuälli Durschnittsergebnis vu dr Yyschetzige',
	'articlefeedback-report-empty' => 'Kei Yyschetzige',
	'articlefeedback-report-ratings' => 'Yyschetzige',
	'articlefeedback-field-trustworthy-label' => 'Vertröueswirdig',
	'articlefeedback-field-trustworthy-tip' => 'Hesch Du dr Yydruck, ass es in däm Artikel gnue Quällenaagabe het un ass mer däne Quälle cha tröue?',
	'articlefeedback-field-complete-label' => 'Vollständig',
	'articlefeedback-field-complete-tip' => 'Hesch Du dr Yydruck, ass in däm Artikel aali Aschpäkt ufgfiert sin, wu mit däm Thema zämmehange?',
	'articlefeedback-field-objective-label' => 'Nit voryygnuu',
	'articlefeedback-field-objective-tip' => 'Hesch Du dr Yydruck, ass dää Artikel e uusgwogeni Darstellig isch vu allne Aschpäkt, wu mit däm Thema verbunde sin?',
	'articlefeedback-field-wellwritten-label' => 'Guet gschribe',
	'articlefeedback-field-wellwritten-tip' => 'Hesch Du dr Yydruck, ass dää Artikel guet strukturiert un gschribe isch?',
	'articlefeedback-pitch-reject' => 'Villicht speter',
	'articlefeedback-pitch-or' => 'oder',
	'articlefeedback-pitch-survey-accept' => 'Umfrog aafange',
	'articlefeedback-pitch-join-accept' => 'Benutzerkonto aalege',
	'articlefeedback-pitch-join-login' => 'Aamälde',
	'articlefeedback-pitch-edit-accept' => 'Bearbeite',
	'articlefeedback-expert-assessment-question' => 'Hesch Du Chänntnis zue däm Thema?',
	'articlefeedback-expert-assessment-level-1-label' => 'Chuum',
	'articlefeedback-expert-assessment-level-2-label' => 'Furtgschritte',
	'articlefeedback-expert-assessment-level-3-label' => 'Expert',
	'articlefeedback-survey-message-success' => 'Dankschen, ass Du bi däre Umfrog mitgmacht hesch.',
	'articlefeedback-survey-message-error' => 'E Fähler isch ufträtte.
Bitte versuech s speter nomol.',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author YaronSh
 */
$messages['he'] = array(
	'articlefeedback' => 'הערכת ערך',
	'articlefeedback-desc' => 'הערכת ערך (גרסה ניסיונית)',
	'articlefeedback-survey-question-whyrated' => 'נא ליידע אותנו מדובר דירגת דף זה היום (יש לסמן את כל העונים לשאלה):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'ברצוני לתרום לדירוג הכללי של הדף',
	'articlefeedback-survey-answer-whyrated-development' => 'כולי תקווה שהדירוג שלי ישפיע לטובה על פיתוח הדף',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'ברצוני לתרום ל{{grammar:תחילית|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'מוצא חן בעיני לשתף את דעתי ברבים',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'לא סיפקתי אף דירוגים היום, אך ברצוני לתת משוב על תכונה',
	'articlefeedback-survey-answer-whyrated-other' => 'אחר',
	'articlefeedback-survey-question-useful' => 'האם קיבלת את התחושה שהדירוגים שסיפקת שימושיים וברורים?',
	'articlefeedback-survey-question-useful-iffalse' => 'מדוע?',
	'articlefeedback-survey-question-comments' => 'האם יש לך הערות נוספות?',
	'articlefeedback-survey-submit' => 'שליחה',
	'articlefeedback-survey-title' => 'נא לענות על מספר שאלות',
	'articlefeedback-survey-thanks' => 'תודה לך על מילוי הסקר.',
	'articlefeedback-error' => 'אירעה שגיאה. נא לנסות שוב מאוחר יותר.',
	'articlefeedback-form-switch-label' => 'תנו הערכה לדף הזה',
	'articlefeedback-form-panel-title' => 'תנו הערכה לדף הזה',
	'articlefeedback-form-panel-instructions' => 'הקדישו רגע לדרג את הדף.',
	'articlefeedback-form-panel-clear' => 'הסר דירוג זה',
	'articlefeedback-form-panel-expertise' => 'יש לי ידע קודם על נושא זה',
	'articlefeedback-form-panel-expertise-studies' => 'למדתי את זה במכללה או באוניברסיטה',
	'articlefeedback-form-panel-expertise-profession' => 'זה חלק מהמקצוע שלי',
	'articlefeedback-form-panel-expertise-hobby' => 'זה קשור לתחביבים או לתחומי עניין שלי',
	'articlefeedback-form-panel-expertise-other' => 'מקור הידע שלי לא מופיע כאן',
	'articlefeedback-form-panel-submit' => 'לשלוח משוב',
	'articlefeedback-report-switch-label' => 'להציג את ההערכות שניתנו לדף',
	'articlefeedback-report-panel-title' => 'הערכות שניתנו לדף הזה',
	'articlefeedback-report-panel-description' => 'ממוצע הדירוגים הנוכחי.',
	'articlefeedback-report-empty' => 'אין דירוגים',
	'articlefeedback-report-ratings' => '$1 דירוגים',
	'articlefeedback-field-trustworthy-label' => 'אמין',
	'articlefeedback-field-trustworthy-tip' => 'האם אתם מרגישים שבדף הזה יש הפניות מספיקות למקורות ושהמקורות מהימנים?',
	'articlefeedback-field-complete-label' => 'להשלים',
	'articlefeedback-field-complete-tip' => 'האם אתם מרגישים שהדף הזה סוקר את התחומים החיוניים הנוגעים בנושא?',
	'articlefeedback-field-objective-label' => 'לא מוטה',
	'articlefeedback-field-objective-tip' => 'האם אתם מרגישים שהדף הזה מייצג באופן הולם את כל נקודות המבט על הנושא?',
	'articlefeedback-field-wellwritten-label' => 'כתוב היטב',
	'articlefeedback-field-wellwritten-tip' => 'האם אתם מרגישים שהדף הזה מאורגן וכתוב היטב?',
	'articlefeedback-pitch-reject' => 'אולי מאוחר יותר',
	'articlefeedback-pitch-or' => 'או',
	'articlefeedback-pitch-thanks' => 'תודה! הדירוגים שלכם נשמרו.',
	'articlefeedback-pitch-survey-message' => 'אנא הקדישו רגע למילוי שאלון קצר.',
	'articlefeedback-pitch-survey-accept' => 'להתחיל את הסקר',
	'articlefeedback-pitch-join-message' => 'הידעתם שאפשר ליצור כאן חשבון? החשבון יעזור לכם לעקוב אחר העריכות שלכם, להיות מעורבים בדיונים ולהיות חלק מהקהילה.',
	'articlefeedback-pitch-join-accept' => 'יצירת חשבון',
	'articlefeedback-pitch-join-login' => 'כניסה לחשבון',
	'articlefeedback-pitch-edit-message' => 'הידעתם שאתם יכולים לערוך את הדף הזה?',
	'articlefeedback-pitch-edit-accept' => 'לערוך את הדף הזה',
	'articlefeedback-expert-assessment-question' => 'יש לכם ידע מקצועי בנושא הזה?',
	'articlefeedback-expert-assessment-level-1-label' => 'יש לי ידע שולי בזה',
	'articlefeedback-expert-assessment-level-2-label' => 'יש לי ידע מקצועי בזה',
	'articlefeedback-expert-assessment-level-3-label' => 'יש לי מומחיות בזה',
	'articlefeedback-survey-message-success' => 'תודה על מילוי הסקר.',
	'articlefeedback-survey-message-error' => 'אירעה שגיאה. 
נא לנסות שוב מאוחר יותר.',
);

/** Croatian (Hrvatski)
 * @author Herr Mlinka
 * @author Roberta F.
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'articlefeedback' => 'Ocjenjivanje članaka',
	'articlefeedback-desc' => 'Ocjenjivanje članaka (probna inačica)',
	'articlefeedback-survey-question-whyrated' => 'Molimo recite nam zašto ste ocijenili danas ovu stranicu (označite sve što se može primijeniti):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želio sam pridonijeti sveukupnoj ocjeni stranice',
	'articlefeedback-survey-answer-whyrated-development' => 'Nadam se da će moja ocjena imati pozitivno uticati na razvoj stranice',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želim pridonijeti projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Volim dijeliti svoje mišljenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nisam dao ocjene danas, ali sam želio dati mišljenje o dogradnji',
	'articlefeedback-survey-answer-whyrated-other' => 'Ostalo',
	'articlefeedback-survey-question-useful' => 'Jesu li dane ocjene korisne i jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zašto?',
	'articlefeedback-survey-question-comments' => 'Imate li neki dodatni komentar?',
	'articlefeedback-survey-submit' => 'Pošalji',
	'articlefeedback-survey-title' => 'Molimo odgovorite na nekoliko pitanja',
	'articlefeedback-survey-thanks' => 'Hvala vam na popunjavanju ankete.',
	'articlefeedback-form-switch-label' => 'Pošaljite povratne informacije',
	'articlefeedback-form-panel-title' => 'Vaše povratne informacije',
	'articlefeedback-form-panel-instructions' => 'Molimo odvojite trenutak vremena da ocijenite ovu stranicu.',
	'articlefeedback-form-panel-submit' => 'Pošaljite povratnu informaciju',
	'articlefeedback-report-switch-label' => 'Prikaži rezultate',
	'articlefeedback-report-panel-title' => 'Rezultati povratnih informacija',
	'articlefeedback-report-panel-description' => 'Trenutačni prosjek ocjena.',
	'articlefeedback-report-empty' => 'Nema ocjena',
	'articlefeedback-report-ratings' => '$1 ocjena',
	'articlefeedback-field-trustworthy-label' => 'Vjerodostojno',
	'articlefeedback-field-trustworthy-tip' => 'Smatrate li da ova stranica ima dovoljno izvora i da su oni iz vjerodostojnih izvora?',
	'articlefeedback-field-complete-label' => 'Zaokružena cjelina teme',
	'articlefeedback-field-complete-tip' => 'Da li mislite da ova stranica pokriva osnovna područja teme koja bi trebala?',
	'articlefeedback-field-objective-label' => 'Nepristrano',
	'articlefeedback-field-objective-tip' => 'Da li smatrate da ova stranica prikazuje neutralni prikaz iz svih perspektiva o temi?',
	'articlefeedback-field-wellwritten-label' => 'Dobro napisano',
	'articlefeedback-field-wellwritten-tip' => 'Mislite li da je ova stranica dobro organizirana i dobro napisana?',
	'articlefeedback-pitch-reject' => 'Ne, hvala',
	'articlefeedback-pitch-survey-accept' => 'Počni anketu',
	'articlefeedback-pitch-join-accept' => 'Otvori novi suradnički račun',
	'articlefeedback-pitch-edit-accept' => 'Započni uređivanje',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'articlefeedback' => 'Pohódnoćenje nastawkow',
	'articlefeedback-desc' => 'Pohódnoćenje nastawkow (pilotowa wersija)',
	'articlefeedback-survey-question-whyrated' => 'Prošu zdźěl nam, čehodla sy tutu stronu dźensa posudźił (trjechace prošu nakřižować):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chcych so na cyłkownym pohódnoćenju strony wobdźělić',
	'articlefeedback-survey-answer-whyrated-development' => 'Nadźijam so, zo moje pohódnoćene by wuwiće strony pozitiwnje wobwliwowało',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chcych k {{SITENAME}} přinošować',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Bych rady moje měnjenje dźělił',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Dźensa njejsym žane pohódnoćenja přewjedł, ale chcych swoje měnjenje wo tutej funkciji wuprajić.',
	'articlefeedback-survey-answer-whyrated-other' => 'Druhe',
	'articlefeedback-survey-question-useful' => 'Wěriš, zo podate pohódnoćenja su wužite a jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Čehodla?',
	'articlefeedback-survey-question-comments' => 'Maš hišće dalše komentary?',
	'articlefeedback-survey-submit' => 'Wotpósłać',
	'articlefeedback-survey-title' => 'Prošu wotmołw na někotre prašenja',
	'articlefeedback-survey-thanks' => 'Dźakujemy so za twój posudk.',
	'articlefeedback-error' => 'Zmylk je wustupił.
Prošu spytaj pozdźišo hišće raz.',
	'articlefeedback-form-switch-label' => 'Tutu stronu pohódnoćić',
	'articlefeedback-form-panel-title' => 'Tutu stronu pohódnoćić',
	'articlefeedback-form-panel-instructions' => 'Prošu bjer sej trochu časa, zo by tutu stronu pohódnoćił.',
	'articlefeedback-form-panel-clear' => 'Tute pohódnoćenje wotstronić',
	'articlefeedback-form-panel-expertise' => 'Mam předznajomosće k tutej temje',
	'articlefeedback-form-panel-expertise-studies' => 'Sym na wyšej šuli/uniwersiće studował',
	'articlefeedback-form-panel-expertise-profession' => 'Je dźěl mojeho powołanja',
	'articlefeedback-form-panel-expertise-hobby' => 'Zwisuje z mojimi hobbyjemi abo zajimami',
	'articlefeedback-form-panel-expertise-other' => 'Žórło mojich znajomosćow njeje tu podate',
	'articlefeedback-form-panel-submit' => 'Posudk wotpósłać',
	'articlefeedback-report-switch-label' => 'Pohódnoćenja strony pokazać',
	'articlefeedback-report-panel-title' => 'Pohódnoćenja strony',
	'articlefeedback-report-panel-description' => 'Aktualne přerězkowe pohódnoćenja.',
	'articlefeedback-report-empty' => 'Žane pohódnoćenja',
	'articlefeedback-report-ratings' => '$1 {{PLURAL:$1|pohódnoćenje|pohódnoćeni|pohódnoćenja|pohódnoćenjow}}',
	'articlefeedback-field-trustworthy-label' => 'Dowěry hódny',
	'articlefeedback-field-trustworthy-tip' => 'Měniće, zo tuta strona ma dosć citatow a zo tute citaty su z dowěry hódnych žórłow?',
	'articlefeedback-field-complete-label' => 'Dospołny',
	'articlefeedback-field-complete-tip' => 'Měnicé, zo tuta strona wobkedźbuje wšitke bytostne temowe pola, kotrež měła wobsahować?',
	'articlefeedback-field-objective-label' => 'Wěcowny',
	'articlefeedback-field-objective-tip' => 'Měniš, zo tuta strona pokazuje wurunane předstajenje wšěch perspektiwow tutoho problema?',
	'articlefeedback-field-wellwritten-label' => 'Derje napisany',
	'articlefeedback-field-wellwritten-tip' => 'Měniš, zo tuta strona je derje zorganizowana a derje napisana?',
	'articlefeedback-pitch-reject' => 'Snano pozdźišo',
	'articlefeedback-pitch-or' => 'abo',
	'articlefeedback-pitch-survey-accept' => 'Pohódnoćenje započeć',
	'articlefeedback-pitch-join-accept' => 'Konto załožić',
	'articlefeedback-pitch-join-login' => 'Přizjewić',
	'articlefeedback-pitch-edit-message' => 'Sy wědźał, zo móžeš tutu stronu wobdźěłać?',
	'articlefeedback-pitch-edit-accept' => 'Tutu stronu wobdźěłać',
	'articlefeedback-expert-assessment-question' => 'Maš znajomosće k tutej temje?',
	'articlefeedback-expert-assessment-level-1-label' => 'Njewažne',
	'articlefeedback-expert-assessment-level-2-label' => 'Pokročene',
	'articlefeedback-expert-assessment-level-3-label' => 'Wurjadne',
	'articlefeedback-survey-message-success' => 'Dźakujemy so za wobdźělenje na naprašowanju.',
	'articlefeedback-survey-message-error' => 'Zmylk je wustupił.
Prošu spytaj pozdźišo hišće raz.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Misibacsi
 */
$messages['hu'] = array(
	'articlefeedback' => 'Szócikk értékelése',
	'articlefeedback-desc' => 'Cikk értékelése (kísérleti változat)',
	'articlefeedback-survey-question-whyrated' => 'Kérjük, mondd el nekünk, miért értékelted ezt az oldalt (jelöld meg a megfelelőket):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Azt akartam, hogy hozzájáruljak az oldal összesített értékeléséhez',
	'articlefeedback-survey-answer-whyrated-development' => 'Remélem, hogy az értékelésem pozitívan befolyásolja az oldal fejlődését',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Azt akartam, hogy hozzájáruljak ehhez: {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Szerettem volna megosztani a véleményemet',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ma még nem adtam értékelést, de szerettem volna visszajelzést adni erről a funkcióról',
	'articlefeedback-survey-answer-whyrated-other' => 'Egyéb',
	'articlefeedback-survey-question-useful' => 'Hiszel abban, hogy az értékelések hasznosak és világosak?',
	'articlefeedback-survey-question-useful-iffalse' => 'Miért?',
	'articlefeedback-survey-question-comments' => 'Van még további észrevételed?',
	'articlefeedback-survey-submit' => 'Értékelés küldése',
	'articlefeedback-survey-title' => 'Kérjük, válaszolj néhány kérdésre',
	'articlefeedback-survey-thanks' => 'Köszönjük a kérdőív kitöltését!',
);

/** Interlingua (Interlingua)
 * @author Catrope
 * @author McDutchie
 */
$messages['ia'] = array(
	'articlefeedback' => 'Evalutation de articulos',
	'articlefeedback-desc' => 'Evalutation de articulos (version pilota)',
	'articlefeedback-survey-question-whyrated' => 'Per favor dice nos proque tu ha evalutate iste pagina hodie (marca tote le optiones applicabile):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Io voleva contribuer al evalutation general del pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Io spera que mi evalutation ha un effecto positive sur le disveloppamento del pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Io voleva contribuer a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me place condivider mi opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Io non dava un evalutation hodie, ma io voleva dar mi opinion super le functionalitate',
	'articlefeedback-survey-answer-whyrated-other' => 'Altere',
	'articlefeedback-survey-question-useful' => 'Crede tu que le evalutationes providite es utile e clar?',
	'articlefeedback-survey-question-useful-iffalse' => 'Proque?',
	'articlefeedback-survey-question-comments' => 'Ha tu additional commentos?',
	'articlefeedback-survey-submit' => 'Submitter',
	'articlefeedback-survey-title' => 'Per favor responde a alcun questiones',
	'articlefeedback-survey-thanks' => 'Gratias pro completar le questionario.',
	'articlefeedback-error' => 'Un error ha occurrite. Per favor reproba plus tarde.',
	'articlefeedback-form-switch-label' => 'Evalutar iste pagina',
	'articlefeedback-form-panel-title' => 'Evalutar iste pagina',
	'articlefeedback-form-panel-instructions' => 'Per favor prende un momento pro evalutar iste pagina.',
	'articlefeedback-form-panel-clear' => 'Remover iste evalutation',
	'articlefeedback-form-panel-expertise' => 'Io ha cognoscentia prior de iste topico',
	'articlefeedback-form-panel-expertise-studies' => 'Io lo ha studiate in collegio/universitate',
	'articlefeedback-form-panel-expertise-profession' => 'Illo face parte de mi profession',
	'articlefeedback-form-panel-expertise-hobby' => 'Illo es connexe a mi passatempores o interesses',
	'articlefeedback-form-panel-expertise-other' => 'Le origine de mi cognoscentia non es listate hic',
	'articlefeedback-form-panel-submit' => 'Submitter opinion',
	'articlefeedback-report-switch-label' => 'Vider evalutationes del pagina',
	'articlefeedback-report-panel-title' => 'Evalutationes del pagina',
	'articlefeedback-report-panel-description' => 'Evalutationes medie actual.',
	'articlefeedback-report-empty' => 'Nulle evalutation',
	'articlefeedback-report-ratings' => '$1 evalutationes',
	'articlefeedback-field-trustworthy-label' => 'Digne de fide',
	'articlefeedback-field-trustworthy-tip' => 'Pensa tu que iste pagina ha sufficiente citationes e que iste citationes refere a fontes digne de fide?',
	'articlefeedback-field-complete-label' => 'Complete',
	'articlefeedback-field-complete-tip' => 'Pensa tu que iste pagina coperi le themas essential que illo deberea coperir?',
	'articlefeedback-field-objective-label' => 'Impartial',
	'articlefeedback-field-objective-tip' => 'Pensa tu que iste pagina monstra un representation juste de tote le perspectivas super le question?',
	'articlefeedback-field-wellwritten-label' => 'Ben scribite',
	'articlefeedback-field-wellwritten-tip' => 'Pensa tu que iste pagina es ben organisate e ben scribite?',
	'articlefeedback-pitch-reject' => 'Forsan plus tarde',
	'articlefeedback-pitch-or' => 'o',
	'articlefeedback-pitch-thanks' => 'Gratias! Tu evalutation ha essite salveguardate.',
	'articlefeedback-pitch-survey-message' => 'Per favor prende un momento pro completar un curte questionario.',
	'articlefeedback-pitch-survey-accept' => 'Comenciar sondage',
	'articlefeedback-pitch-join-message' => 'Sapeva tu que tu pote crear un conto? Un conto te adjuta a traciar tu modificationes, participar in discussiones e facer parte de Wikipedia.',
	'articlefeedback-pitch-join-accept' => 'Crear conto',
	'articlefeedback-pitch-join-login' => 'Aperir session',
	'articlefeedback-pitch-edit-message' => 'Sapeva tu que tu pote modificar iste articulo?',
	'articlefeedback-pitch-edit-accept' => 'Modificar iste articulo',
	'articlefeedback-expert-assessment-question' => 'Possede tu cognoscentia super iste thema?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Competente',
	'articlefeedback-expert-assessment-level-3-label' => 'Experte',
	'articlefeedback-survey-message-success' => 'Gratias pro haber respondite al inquesta.',
	'articlefeedback-survey-message-error' => 'Un error ha occurrite.
Per favor reproba plus tarde.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 * @author IvanLanin
 * @author Kenrick95
 */
$messages['id'] = array(
	'articlefeedback' => 'Penilaian artikel',
	'articlefeedback-desc' => 'Penilaian artikel (versi percobaan)',
	'articlefeedback-survey-question-whyrated' => 'Harap beritahu kami mengapa Anda menilai halaman ini hari ini (centang semua yang benar):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Saya ingin berkontribusi untuk peringkat keseluruhan halaman',
	'articlefeedback-survey-answer-whyrated-development' => 'Saya harap penilaian saya akan memberi dampak positif terhadap pengembangan halaman ini',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Saya ingin berkontribusi ke {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Saya ingin berbagi pendapat',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Saya tidak memberikan penilaian hari ini, tetapi ingin memberikan umpan balik pada fitur tersebut',
	'articlefeedback-survey-answer-whyrated-other' => 'Lainnya',
	'articlefeedback-survey-question-useful' => 'Apakah Anda yakin bahwa peringkat yang diberikan berguna dan jelas?',
	'articlefeedback-survey-question-useful-iffalse' => 'Mengapa?',
	'articlefeedback-survey-question-comments' => 'Apakah Anda memiliki komentar tambahan?',
	'articlefeedback-survey-submit' => 'Kirim',
	'articlefeedback-survey-title' => 'Silakan jawab beberapa pertanyaan',
	'articlefeedback-survey-thanks' => 'Terima kasih telah mengisi survei ini.',
	'articlefeedback-error' => 'Telah terjadi sebuah kesalahan. Silakan coba lagi nanti.',
	'articlefeedback-form-switch-label' => 'Berikan nilai halaman ini',
	'articlefeedback-form-panel-title' => 'Nilai halaman ini',
	'articlefeedback-form-panel-instructions' => 'Harap luangkan waktu untuk menilai halaman ini.',
	'articlefeedback-form-panel-clear' => 'Hapus penilaian ini',
	'articlefeedback-form-panel-expertise' => 'Saya sudah tahu sebelumnya tentang topik ini',
	'articlefeedback-form-panel-expertise-studies' => 'Saya sudah mempelajarinya di perguruan tinggi/universitas',
	'articlefeedback-form-panel-expertise-profession' => 'Itu bagian dari profesi saya',
	'articlefeedback-form-panel-expertise-hobby' => 'Itu berhubungan dengan hobi atau minat saya',
	'articlefeedback-form-panel-expertise-other' => 'Sumber pengetahuan saya tidak tercantum di sini',
	'articlefeedback-form-panel-submit' => 'Kirim umpan balik',
	'articlefeedback-report-switch-label' => 'Lihat penilaian halaman',
	'articlefeedback-report-panel-title' => 'Penilaian halaman',
	'articlefeedback-report-panel-description' => 'Peringkat rata-rata saat ini',
	'articlefeedback-report-empty' => 'Belum berperingkat',
	'articlefeedback-report-ratings' => 'peringkat',
	'articlefeedback-field-trustworthy-label' => 'Dapat dipercaya',
	'articlefeedback-field-trustworthy-tip' => 'Apakah Anda merasa bahwa halaman ini memiliki cukup kutipan dan bahwa kutipan tersebut berasal dari sumber tepercaya?',
	'articlefeedback-field-complete-label' => 'Lengkap',
	'articlefeedback-field-complete-tip' => 'Apakah Anda merasa bahwa halaman ini mencakup wilayah topik penting yang seharusnya?',
	'articlefeedback-field-objective-label' => 'Tidak bias',
	'articlefeedback-field-objective-tip' => 'Apakah Anda merasa bahwa halaman ini menunjukkan representasi yang adil dari semua perspektif tentang masalah ini?',
	'articlefeedback-field-wellwritten-label' => 'Ditulis dengan baik',
	'articlefeedback-field-wellwritten-tip' => 'Apakah Anda merasa bahwa halaman ini disusun dan ditulis dengan baik?',
	'articlefeedback-pitch-reject' => 'Mungkin nanti',
	'articlefeedback-pitch-or' => 'atau',
	'articlefeedback-pitch-survey-accept' => 'Mulai survei',
	'articlefeedback-pitch-join-accept' => 'Buat account',
	'articlefeedback-pitch-join-login' => 'Masuk log',
	'articlefeedback-pitch-edit-accept' => 'Mulai menyunting',
	'articlefeedback-expert-assessment-question' => 'Anda mengetahui sesuatu tentang topik ini?',
	'articlefeedback-expert-assessment-level-1-label' => 'Sedikit',
	'articlefeedback-expert-assessment-level-2-label' => 'Kompeten',
	'articlefeedback-expert-assessment-level-3-label' => 'Ahli',
	'articlefeedback-survey-message-success' => 'Terima kasih telah mengisi survei ini.',
	'articlefeedback-survey-message-error' => 'Kesalahan terjadi.
Silakan coba lagi.',
);

/** Italian (Italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'articlefeedback' => 'Valutazione pagina',
	'articlefeedback-desc' => 'Valutazione pagina (versione pilota)',
	'articlefeedback-survey-question-whyrated' => 'Esprimi il motivo per cui oggi hai valutato questa pagina (puoi selezionare più opzioni):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ho voluto contribuire alla valutazione complessiva della pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Spero che il mio giudizio influenzi positivamente lo sviluppo della pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ho voluto contribuire a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Mi piace condividere la mia opinione',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Non ho fornito valutazioni oggi, ma ho voluto lasciare un feedback sulla funzionalità',
	'articlefeedback-survey-answer-whyrated-other' => 'Altro',
	'articlefeedback-survey-question-useful' => 'Pensi che le valutazioni fornite siano utili e chiare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Perché?',
	'articlefeedback-survey-question-comments' => 'Hai altri commenti?',
	'articlefeedback-survey-submit' => 'Invia',
	'articlefeedback-survey-title' => 'Per favore, rispondi ad alcune domande',
	'articlefeedback-survey-thanks' => 'Grazie per aver compilato il questionario.',
	'articlefeedback-error' => 'Si è verificato un errore. 
Riprova più tardi.',
	'articlefeedback-form-panel-title' => 'La tua opinione',
	'articlefeedback-form-panel-instructions' => "Per favore, concedici un po' del tuo tempo per valutare questa pagina.",
	'articlefeedback-form-panel-expertise-studies' => "L'ho studiato a scuola/università.",
	'articlefeedback-form-panel-expertise-profession' => 'È parte della mia professione',
	'articlefeedback-form-panel-expertise-hobby' => 'È legato al mio hobby o interesse',
	'articlefeedback-form-panel-expertise-other' => 'La fonte della mia conoscenza non è elencata qui',
	'articlefeedback-report-switch-label' => 'Mostra i risultati',
	'articlefeedback-report-panel-title' => 'Giudizio pagina',
	'articlefeedback-report-panel-description' => 'Valutazione media attuale.',
	'articlefeedback-report-empty' => 'Nessuna valutazione',
	'articlefeedback-report-ratings' => '$1 valutazioni',
	'articlefeedback-field-trustworthy-tip' => 'Ritieni che questa pagina abbia citazioni sufficienti e che queste citazioni provengano da fonti attendibili?',
	'articlefeedback-field-complete-label' => 'Completa',
	'articlefeedback-field-complete-tip' => 'Ritieni che questa pagina copra le aree tematiche essenziali che dovrebbe?',
	'articlefeedback-field-objective-label' => 'Obiettivo',
	'articlefeedback-field-objective-tip' => 'Ritieni che questa pagina mostri una rappresentazione equa di tutti i punti di vista sul tema?',
	'articlefeedback-field-wellwritten-label' => 'Ben scritta',
	'articlefeedback-field-wellwritten-tip' => 'Ritieni che questa pagina sia ben organizzata e ben scritta?',
	'articlefeedback-pitch-reject' => 'Forse più tardi',
	'articlefeedback-pitch-or' => 'o',
	'articlefeedback-pitch-survey-accept' => 'Inizia sondaggio',
	'articlefeedback-pitch-join-accept' => 'Crea un nuovo utente',
	'articlefeedback-pitch-join-login' => 'Entra',
	'articlefeedback-expert-assessment-question' => 'Hai conoscenze su questo argomento?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginale',
	'articlefeedback-expert-assessment-level-2-label' => 'Competente',
	'articlefeedback-expert-assessment-level-3-label' => 'Esperto',
	'articlefeedback-survey-message-success' => 'Grazie per aver compilato il questionario.',
	'articlefeedback-survey-message-error' => 'Si è verificato un errore. 
Riprova più tardi.',
);

/** Japanese (日本語)
 * @author Marine-Blue
 * @author Ohgi
 * @author Whym
 * @author Yanajin66
 * @author 青子守歌
 */
$messages['ja'] = array(
	'articlefeedback' => '記事の評価',
	'articlefeedback-desc' => '記事の評価',
	'articlefeedback-survey-question-whyrated' => '今日、なぜこのページを評価したか教えてください（該当するものすべてにチェックを入れてください）：',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'ページの総合的評価を投稿したかった',
	'articlefeedback-survey-answer-whyrated-development' => '自分の評価が、このページの成長に良い影響を与えることを望んでいる',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}に貢献したい',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '意見を共有したい',
	'articlefeedback-survey-answer-whyrated-didntrate' => '今日は評価しなかったが、この機能に関するフィードバックをしたかった。',
	'articlefeedback-survey-answer-whyrated-other' => 'その他',
	'articlefeedback-survey-question-useful' => 'これらの評価は、分かりやすく、役に立つものだと思いますか？',
	'articlefeedback-survey-question-useful-iffalse' => 'なぜですか？',
	'articlefeedback-survey-question-comments' => '他に追加すべきコメントがありますか？',
	'articlefeedback-survey-submit' => '送信',
	'articlefeedback-survey-title' => '質問に少しお答えください',
	'articlefeedback-survey-thanks' => '調査に記入していただき、ありがとうございます。',
	'articlefeedback-error' => 'エラーが発生しました。後でもう一度試してください。',
	'articlefeedback-form-switch-label' => 'このページを評価',
	'articlefeedback-form-panel-title' => 'このページを評価',
	'articlefeedback-form-panel-instructions' => 'このページの評価を算出していますので、少しお待ちください。',
	'articlefeedback-form-panel-clear' => 'この評価を除去する',
	'articlefeedback-form-panel-expertise' => 'この話題について事前知識がある',
	'articlefeedback-form-panel-expertise-studies' => '大学で学んだ内容である',
	'articlefeedback-form-panel-expertise-profession' => '自分の職業の一部である',
	'articlefeedback-form-panel-expertise-hobby' => '自分の趣味や興味に関連している',
	'articlefeedback-form-panel-expertise-other' => '自分の知識源はこの中にない',
	'articlefeedback-form-panel-submit' => 'フィードバックを送信',
	'articlefeedback-report-switch-label' => 'ページの評価を見る',
	'articlefeedback-report-panel-title' => 'ページの評価',
	'articlefeedback-report-panel-description' => '現在の評価の平均。',
	'articlefeedback-report-empty' => '評価なし',
	'articlefeedback-report-ratings' => '$1 の評価',
	'articlefeedback-field-trustworthy-label' => '信頼できる',
	'articlefeedback-field-trustworthy-tip' => 'このページは、十分な出典があり、それらの出典は信頼できる情報源によるものですか？',
	'articlefeedback-field-complete-label' => '完成度',
	'articlefeedback-field-complete-tip' => 'この記事は、不可欠な話題を、説明していると思いますか？',
	'articlefeedback-field-objective-label' => '公平な',
	'articlefeedback-field-objective-tip' => 'このページは、ある問題に対する全ての観点を平等に説明していると思いますか？',
	'articlefeedback-field-wellwritten-label' => 'よく書けている',
	'articlefeedback-field-wellwritten-tip' => 'この記事は、良く整理され、良く書かれていると思いますか？',
	'articlefeedback-pitch-reject' => '後でやる',
	'articlefeedback-pitch-or' => 'または',
	'articlefeedback-pitch-survey-accept' => '調査を開始',
	'articlefeedback-pitch-join-accept' => 'アカウント作成',
	'articlefeedback-pitch-join-login' => 'ログイン',
	'articlefeedback-pitch-edit-accept' => 'このページを編集',
	'articlefeedback-expert-assessment-question' => 'この主題についてよく知っていますか？',
	'articlefeedback-expert-assessment-level-1-label' => '素人',
	'articlefeedback-expert-assessment-level-2-label' => 'ある程度',
	'articlefeedback-expert-assessment-level-3-label' => '玄人',
	'articlefeedback-survey-message-success' => 'アンケートに記入していただきありがとうございます。',
	'articlefeedback-survey-message-error' => 'エラーが発生しました。
後でもう一度試してください。',
);

/** Georgian (ქართული)
 * @author BRUTE
 * @author David1010
 * @author Dawid Deutschland
 */
$messages['ka'] = array(
	'articlefeedback' => 'სტატიის შეფასება',
	'articlefeedback-desc' => 'სტატიის შეფასება',
	'articlefeedback-survey-question-whyrated' => 'გთხოვთ შეგვატყობინეთ, თუ რატომ შეაფასეთ დღეს ეს სტატია (შეამოწმეთ სისწორე)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'მე ვისურვებდი სტატიის შეფასებაში მონაწილეობის მიღებას',
	'articlefeedback-survey-answer-whyrated-development' => 'ვიმედოვნებ, რომ ჩემი შეფასება დადებითად აისახება სტატიის მომავალ განვითარებაზე',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'მე ვისურვებდი {{SITENAME}}-ში მონაწილეობას',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'მე სიამოვნებით გაგიზიარებთ ჩემს აზრს',
	'articlefeedback-survey-answer-whyrated-other' => 'სხვა',
	'articlefeedback-survey-question-useful' => 'გჯერათ, რომ მოცემული შეფასებები გამოსაყენებელი და გასაგებია?',
	'articlefeedback-survey-question-useful-iffalse' => 'რატომ?',
	'articlefeedback-survey-question-comments' => 'კიდევ დაამატებთ რამეს?',
	'articlefeedback-survey-submit' => 'შენახვა',
	'articlefeedback-survey-title' => 'გთხოვთ, გვიპასუხეთ რამდენიმე შეკითხვაზე',
	'articlefeedback-survey-thanks' => 'გმადლობთ საპასუხო შეტყობინებისათვის',
	'articlefeedback-form-switch-label' => 'შეფასების გაცემა',
	'articlefeedback-form-panel-title' => 'თქვენი შეფასება',
	'articlefeedback-form-panel-instructions' => 'გთხოვთ, გამონახეთ დრო ამ გვერდის შეფასებისათვის.',
	'articlefeedback-form-panel-submit' => 'დაეთანხმე შეფასებას',
	'articlefeedback-report-switch-label' => 'შედეგების ჩვენება',
	'articlefeedback-report-panel-title' => 'შეფასების შედეგები',
	'articlefeedback-report-panel-description' => 'შეფასების ამჟამინდელი შედეგები',
	'articlefeedback-report-empty' => 'შეფასებები არაა',
	'articlefeedback-report-ratings' => '$1 შეფასება',
	'articlefeedback-field-trustworthy-label' => 'სანდო',
	'articlefeedback-field-trustworthy-tip' => 'ფიქრობთ, რომ ეს სტატია საკმარისი რაოდენობით შეიცავს სანდო წყაროებს?',
	'articlefeedback-field-complete-label' => 'დასრულებულია',
	'articlefeedback-field-complete-tip' => 'მიგაჩნიათ, რომ ეს სტატია შეიცავს მისივე შინაარსთან დაკავშირებულ ყველა მნიშვნელოვან ასპექტს?',
	'articlefeedback-field-objective-label' => 'მიუკერძოებელია',
	'articlefeedback-field-objective-tip' => 'მიგაჩნიათ, რომ ეს სტატია შეიცავს მისივე თემასთან დაკავშირებული წარმოდგენის შესახებ მიუკერძოებელ ინფორმაციას?',
	'articlefeedback-field-wellwritten-label' => 'კარგად დაწერილი',
	'articlefeedback-field-wellwritten-tip' => 'მიგაჩნიათ, რომ ეს სტატია კარგი სტრუქტურისაა და კარგადაა დაწერილი?',
	'articlefeedback-pitch-reject' => 'არა, გმადლობთ',
	'articlefeedback-pitch-or' => 'ან',
	'articlefeedback-pitch-survey-accept' => 'გამოკითხვის დაწყება',
	'articlefeedback-pitch-join-accept' => 'გახსენი ანგარიში',
	'articlefeedback-pitch-join-login' => 'შესვლა',
	'articlefeedback-pitch-edit-accept' => 'რედაქტირების დაწყება',
	'articlefeedback-survey-message-error' => 'წარმოიშვა რაღაც შეცდომა.
გთხოვთ სცადეთ მოგვიანებით.',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'articlefeedback' => '문서 평가',
	'articlefeedback-desc' => '문서 평가 (파일럿 버전)',
	'articlefeedback-survey-question-whyrated' => '오늘 이 문서를 왜 평가했는지 알려주십시오 (해당되는 모든 항목에 체크해주세요):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '이 문서에 대한 전체적인 평가에 기여하고 싶어서',
	'articlefeedback-survey-answer-whyrated-development' => '내가 한 평가가 문서 발전에 긍정적인 영향을 줄 수 있다고 생각해서',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}}에 기여하고 싶어서',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '내 의견을 공유하고 싶어서',
	'articlefeedback-survey-answer-whyrated-didntrate' => '오늘 평가를 하지는 않았지만 이 기능에 대해 피드백을 남기고 싶어서',
	'articlefeedback-survey-answer-whyrated-other' => '기타',
	'articlefeedback-survey-question-useful' => '당신은 평가한 것이 유용하고 명확할 것이라 생각하십니까?',
	'articlefeedback-survey-question-useful-iffalse' => '왜 그렇게 생각하십니까?',
	'articlefeedback-survey-question-comments' => '다른 의견이 있으십니까?',
	'articlefeedback-survey-submit' => '제출',
	'articlefeedback-survey-title' => '몇 가지 질문에 답해 주시기 바랍니다.',
	'articlefeedback-survey-thanks' => '설문에 응해 주셔서 감사합니다.',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'articlefeedback-expert-assessment-question' => 'Häs De Ahnung vun däm Theemekreis?',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'articlefeedback-survey-question-useful-iffalse' => 'Çima?',
	'articlefeedback-report-switch-label' => 'Encaman nîşan bide',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Catrope
 * @author Robby
 */
$messages['lb'] = array(
	'articlefeedback' => 'Artikelaschätzung',
	'articlefeedback-desc' => 'Artikelaschätzung Pilotversioun',
	'articlefeedback-survey-question-whyrated' => 'Sot eis w.e.g. firwat datt Dir dës säit bewäert hutt (klickt alles u wat zoutrëfft):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ech wollt zur allgemenger Bewäertung vun der Säit bedroen',
	'articlefeedback-survey-answer-whyrated-development' => "Ech hoffen datt meng Bewäertung d'Entwécklung vun der Säit positiv beaflosst",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ech wollt mech un {{SITENAME}} bedeelegen',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ech deele meng Meenung gäre mat',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Ech hunn haut keng Bewäertung ofginn, awer ech wollt mäi Feedback zu dëser Fonctionalitéit ginn',
	'articlefeedback-survey-answer-whyrated-other' => 'Anerer',
	'articlefeedback-survey-question-useful' => "Mengt Dir datt d'Bewäertungen hei nëtzlech a kloer sinn?",
	'articlefeedback-survey-question-useful-iffalse' => 'Firwat?',
	'articlefeedback-survey-question-comments' => 'Hutt Dir nach aner Bemierkungen?',
	'articlefeedback-survey-submit' => 'Späicheren',
	'articlefeedback-survey-title' => 'Beäntwert w.e.g. e puer Froen',
	'articlefeedback-survey-thanks' => 'Merci datt Dir eis Ëmfro ausgefëllt hutt.',
	'articlefeedback-error' => 'Et ass e Feeler geschitt. Probéiert w.e.g. méi spéit nach emol.',
	'articlefeedback-form-switch-label' => 'Dës Säit bewäerten',
	'articlefeedback-form-panel-title' => 'Dës Säit bewäerten',
	'articlefeedback-form-panel-instructions' => 'Huelt Iech w.e.g. een Ament fir d¨s Säit ze bewäerten.',
	'articlefeedback-form-panel-clear' => 'Dës Bewäertung ewechhuelen',
	'articlefeedback-form-panel-expertise' => 'Ech hu Sachkenntnisser zu dësem Thema',
	'articlefeedback-form-panel-expertise-studies' => 'Ech hunn et an der Schoul/op der Universitéit studéiert',
	'articlefeedback-form-panel-expertise-profession' => 'Et ass en Deel vu mengem Beruff',
	'articlefeedback-form-panel-expertise-hobby' => 'Et hänkt mat mengen Hobbyen an Interessien zesummen',
	'articlefeedback-form-panel-expertise-other' => "D'Quell vu mengem Wëssen ass hei net opgezielt",
	'articlefeedback-form-panel-submit' => 'Feedback iwwerdroen',
	'articlefeedback-report-switch-label' => 'Bewäertunge vun der Säit weisen',
	'articlefeedback-report-panel-title' => 'Bewäertunge vun der Säit',
	'articlefeedback-report-panel-description' => 'Aktuell duerchschnëttlech Bewäertung.',
	'articlefeedback-report-empty' => 'Keng Bewäertungen',
	'articlefeedback-report-ratings' => '$1 Bewäertungen',
	'articlefeedback-field-trustworthy-label' => 'Vertrauenswürdeg',
	'articlefeedback-field-trustworthy-tip' => 'Hutt Dir den Androck datt dës Säit genuch Zitater huet an datt dës Zitater aus vertrauenswierdege Quelle kommen?',
	'articlefeedback-field-complete-label' => 'Komplett',
	'articlefeedback-field-complete-tip' => 'Hutt dir den Androck datt dës Säit déi wesentlech Aspekter vun dësem Sujet behandelt déi solle beliicht ginn?',
	'articlefeedback-field-objective-label' => 'Net virageholl',
	'articlefeedback-field-objective-tip' => 'Hutt Dir den Androck datt dës Säit eng ausgeglache Presentatioun vun alle Perspektive vun dësem Thema weist?',
	'articlefeedback-field-wellwritten-label' => 'Gutt geschriwwen',
	'articlefeedback-field-wellwritten-tip' => 'Hutt Dir den Androck datt dës Säit gutt organiséiert a gutt geschriwwen ass?',
	'articlefeedback-pitch-reject' => 'Vläicht méi spéit',
	'articlefeedback-pitch-or' => 'oder',
	'articlefeedback-pitch-survey-accept' => 'Ëmfro ufänken',
	'articlefeedback-pitch-join-accept' => 'Benotzerkont opmaachen',
	'articlefeedback-pitch-join-login' => 'Aloggen',
	'articlefeedback-pitch-edit-accept' => 'Ufänke mat änneren',
	'articlefeedback-expert-assessment-question' => 'Hutt Dir Kenntnisser bäi dësem Thema?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Kompetent',
	'articlefeedback-expert-assessment-level-3-label' => 'Expert',
	'articlefeedback-survey-message-success' => "Merci datt Dir d'Ëmfro ausgefëllt hutt.",
	'articlefeedback-survey-message-error' => 'Et ass e Feeler geschitt.
Probéiert w.e.g. méi spéit nach emol.',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'articlefeedback' => 'Paginabeoordeiling',
	'articlefeedback-desc' => 'Paginabeoordeiling (tesversie)',
	'articlefeedback-survey-answer-whyrated-other' => 'Anges',
	'articlefeedback-survey-question-useful-iffalse' => 'Wróm?',
);

/** Latvian (Latviešu)
 * @author Papuass
 */
$messages['lv'] = array(
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Man patīk dalīties ar viedokli',
	'articlefeedback-survey-answer-whyrated-other' => 'Cits',
	'articlefeedback-survey-question-useful-iffalse' => 'Kāpēc?',
	'articlefeedback-survey-question-comments' => 'Vai tev ir kādi papildus komentāri?',
	'articlefeedback-survey-submit' => 'Iesniegt',
	'articlefeedback-survey-title' => 'Lūdzu, atbildi uz dažiem jautājumiem',
	'articlefeedback-survey-thanks' => 'Paldies par piedalīšanos aptaujā.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'articlefeedback' => 'Оценување на статија',
	'articlefeedback-desc' => 'Пилотна верзија на Оценување на статија',
	'articlefeedback-survey-question-whyrated' => 'Кажете ни зошто ја оценивте страницава денес (штиклирајте ги сите релевантни одговори)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Сакав да придонесам кон севкупната оцена на страницата',
	'articlefeedback-survey-answer-whyrated-development' => 'Се надевам дека мојата оценка ќе влијае позитивно на развојот на страницата',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Сакав да придонесам кон {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Сакам да го искажувам моето мислење',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Не оценував денес, туку сакав да искажам мое мислење за функцијата',
	'articlefeedback-survey-answer-whyrated-other' => 'Друго',
	'articlefeedback-survey-question-useful' => 'Дали сметате дека дадените оценки се полезни и јасни?',
	'articlefeedback-survey-question-useful-iffalse' => 'Зошто?',
	'articlefeedback-survey-question-comments' => 'Имате некои други забелешки?',
	'articlefeedback-survey-submit' => 'Поднеси',
	'articlefeedback-survey-title' => 'Ве молиме одговорете на неколку прашања',
	'articlefeedback-survey-thanks' => 'Ви благодариме што ја пополнивте анкетата.',
	'articlefeedback-error' => 'Се појави грешка. Обидете се повторно.',
	'articlefeedback-form-switch-label' => 'Оценете ја страницава',
	'articlefeedback-form-panel-title' => 'Оценете ја страницава',
	'articlefeedback-form-panel-instructions' => 'Одвојте момент за да ја оцените страницава.',
	'articlefeedback-form-panel-clear' => 'Отстрани ја оценкава',
	'articlefeedback-form-panel-expertise' => 'Имам претходни познавања на оваа тема',
	'articlefeedback-form-panel-expertise-studies' => 'Ова го имам изучувано во средно/на факултет',
	'articlefeedback-form-panel-expertise-profession' => 'Ова е во полето на мојата професија',
	'articlefeedback-form-panel-expertise-hobby' => 'Ова е поврзано со моето хоби или интереси',
	'articlefeedback-form-panel-expertise-other' => 'Изворот на моите сознанија не е наведен тука',
	'articlefeedback-form-panel-submit' => 'Поднеси мислење',
	'articlefeedback-report-switch-label' => 'Прикажи оценки за страницата',
	'articlefeedback-report-panel-title' => 'Оценки за страницата',
	'articlefeedback-report-panel-description' => 'Тековни просечи оценки.',
	'articlefeedback-report-empty' => 'Нема оценки',
	'articlefeedback-report-ratings' => '$1 оценки',
	'articlefeedback-field-trustworthy-label' => 'Веродостојност',
	'articlefeedback-field-trustworthy-tip' => 'Дали сметате дека страницава има доволно наводи и дека изворите се веродостојни?',
	'articlefeedback-field-complete-label' => 'Исцрпност',
	'articlefeedback-field-complete-tip' => 'Дали сметате дека статијава ги обработува најважните основни теми што треба да се обработат?',
	'articlefeedback-field-objective-label' => 'Непристрасност',
	'articlefeedback-field-objective-tip' => 'Дали сметате дека статијава на праведен начин ги застапува сите гледишта по оваа проблематика?',
	'articlefeedback-field-wellwritten-label' => 'Добро напишано',
	'articlefeedback-field-wellwritten-tip' => 'Дали сметате дека страницава е добро организирана и убаво напишана?',
	'articlefeedback-pitch-reject' => 'Можеби подоцна',
	'articlefeedback-pitch-or' => 'или',
	'articlefeedback-pitch-thanks' => 'Ви благодариме! Вашите оценки се зачувани.',
	'articlefeedback-pitch-survey-message' => 'Пополнете оваа кратка анкета.',
	'articlefeedback-pitch-survey-accept' => 'Почни',
	'articlefeedback-pitch-join-message' => 'Дали сте знаеле дека можете да создадете сметка? Со сметката ќе можете да ги следите вашите уредувања, да учествувате во дискусии и да бидете дел од заедницата.',
	'articlefeedback-pitch-join-accept' => 'Создај сметка',
	'articlefeedback-pitch-join-login' => 'Најавете се',
	'articlefeedback-pitch-edit-message' => 'Дали знаете дека можете да ја уредите страницава?',
	'articlefeedback-pitch-edit-accept' => 'Уреди ја страницава',
	'articlefeedback-expert-assessment-question' => 'Дали имате познавања на оваа тема?',
	'articlefeedback-expert-assessment-level-1-label' => 'Површни',
	'articlefeedback-expert-assessment-level-2-label' => 'Достатни',
	'articlefeedback-expert-assessment-level-3-label' => 'Стручни',
	'articlefeedback-survey-message-success' => 'Ви благодариме што ја пополнивте анкетата.',
	'articlefeedback-survey-message-error' => 'Се појави грешка.
Обидете се подоцна.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'articlefeedback' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം',
	'articlefeedback-desc' => 'ലേഖനത്തിന്റെ മൂല്യനിർണ്ണയം (പ്രാരംഭ പതിപ്പ്)',
	'articlefeedback-survey-question-whyrated' => 'ഈ താളിന് താങ്കൾ ഇന്ന് നിലവാരമിട്ടതെന്തുകൊണ്ടാണെന്ന് ദയവായി പറയാമോ (ബാധകമാകുന്ന എല്ലാം തിരഞ്ഞെടുക്കുക):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'താളിന്റെ ആകെ നിലവാരം നിർണ്ണയിക്കാൻ ഞാനാഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-development' => 'ഞാനിട്ട നിലവാരം താളിന്റെ വികസനത്തിൽ ക്രിയാത്മകമായ ഫലങ്ങൾ സൃഷ്ടിക്കുമെന്ന് കരുതുന്നു',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'ഞാൻ {{SITENAME}} സംരംഭത്തിൽ സംഭാവന ചെയ്യാൻ ആഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'എന്റെ അഭിപ്രായം പങ്ക് വെയ്ക്കുന്നതിൽ സന്തോഷമേയുള്ളു',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'ഞാനിന്ന് നിലവാരനിർണ്ണയം നടത്തിയിട്ടില്ല, പക്ഷേ ഈ സൗകര്യം സംബന്ധിച്ച അഭിപ്രായം അറിയിക്കാൻ ആഗ്രഹിക്കുന്നു',
	'articlefeedback-survey-answer-whyrated-other' => 'മറ്റുള്ളവ',
	'articlefeedback-survey-question-useful' => 'നൽകിയിരിക്കുന്ന നിലവാരം ഉപകാരപ്രദവും വ്യക്തവുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-survey-question-useful-iffalse' => 'എന്തുകൊണ്ട്?',
	'articlefeedback-survey-question-comments' => 'താങ്കൾക്ക് മറ്റെന്തെങ്കിലും അഭിപ്രായങ്ങൾ പങ്ക് വെയ്ക്കാനുണ്ടോ?',
	'articlefeedback-survey-submit' => 'സമർപ്പിക്കുക',
	'articlefeedback-survey-title' => 'ദയവായി ഏതാനം ചോദ്യങ്ങൾക്ക് ഉത്തരം നൽകുക',
	'articlefeedback-survey-thanks' => 'സർവേ പൂരിപ്പിച്ചതിനു നന്ദി',
	'articlefeedback-error' => 'എന്തോ പിഴവുണ്ടായിരിക്കുന്നു. ദയവായി പിന്നീട് വീണ്ടും ശ്രമിക്കുക.',
	'articlefeedback-form-switch-label' => 'ഈ താളിനു നിലവാരമിടുക',
	'articlefeedback-form-panel-title' => 'ഈ താളിനു നിലവാരമിടുക',
	'articlefeedback-form-panel-instructions' => 'താഴെ ഈ താളിന്റെ മൂല്യനിർണ്ണയം നടത്താൻ ഒരു നിമിഷം ചിലവാക്കുക.',
	'articlefeedback-form-panel-clear' => 'ഈ നിലവാരമിടൽ നീക്കം ചെയ്യുക',
	'articlefeedback-form-panel-expertise' => 'എനിക്ക് ഈ വിഷയത്തിൽ മുൻപേ അറിവുണ്ട്',
	'articlefeedback-form-panel-expertise-studies' => 'ഞാനിത് കലാലയത്തിൽ/യൂണിവേഴ്സിറ്റിയിൽ പഠിച്ചിട്ടുണ്ട്',
	'articlefeedback-form-panel-expertise-profession' => 'ഇതെന്റെ ജോലിയുടെ ഭാഗമാണ്',
	'articlefeedback-form-panel-expertise-hobby' => 'ഇതെനിക്ക് താത്പര്യമുള്ളവയിൽ പെടുന്നു',
	'articlefeedback-form-panel-expertise-other' => 'എന്റെ അറിവിന്റെ ഉറവിടം ഇവിടെ നൽകിയിട്ടില്ല',
	'articlefeedback-form-panel-submit' => 'അഭിപ്രായം സമർപ്പിക്കുക',
	'articlefeedback-report-switch-label' => 'ഈ താളിനു ലഭിച്ച നിലവാരം കാണുക',
	'articlefeedback-report-panel-title' => 'താളിന്റെ നിലവാരം',
	'articlefeedback-report-panel-description' => 'ഇപ്പോഴത്തെ നിലവാരമിടലുകളുടെ ശരാശരി.',
	'articlefeedback-report-empty' => 'നിലവാരമിടലുകൾ ഒന്നുമില്ല',
	'articlefeedback-report-ratings' => '$1 നിലവാരമിടലുകൾ',
	'articlefeedback-field-trustworthy-label' => 'വിശ്വാസയോഗ്യം',
	'articlefeedback-field-trustworthy-tip' => 'ഈ താളിൽ വിശ്വസനീയങ്ങളായ സ്രോതസ്സുകളെ ആശ്രയിക്കുന്ന ആവശ്യമായത്ര അവലംബങ്ങൾ ഉണ്ടെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-field-complete-label' => 'സമ്പൂർണ്ണം',
	'articlefeedback-field-complete-tip' => 'ഈ താൾ അത് ഉൾക്കൊള്ളേണ്ട എല്ലാ മേഖലകളും ഉൾക്കൊള്ളുന്നതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-field-objective-label' => 'പക്ഷപാതരഹിതം',
	'articlefeedback-field-objective-tip' => 'ഈ താളിൽ വിഷയത്തിന്റെ എല്ലാ വശത്തിനും അർഹമായ പ്രാതിനിധ്യം ലഭിച്ചതായി താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-field-wellwritten-label' => 'നന്നായി രചിച്ചത്',
	'articlefeedback-field-wellwritten-tip' => 'ഈ താൾ നന്നായി ക്രമീകരിക്കപ്പെട്ടതും നന്നായി എഴുതപ്പെട്ടതുമാണെന്ന് താങ്കൾ കരുതുന്നുണ്ടോ?',
	'articlefeedback-pitch-reject' => 'പിന്നീട് ആലോചിക്കാം',
	'articlefeedback-pitch-or' => 'അഥവാ',
	'articlefeedback-pitch-thanks' => 'നന്ദി! താങ്കൾ നടത്തിയ മൂല്യനിർണ്ണയം സേവ് ചെയ്തിരിക്കുന്നു.',
	'articlefeedback-pitch-survey-message' => 'ഈ ചെറിയ സർവ്വേ പൂർത്തിയാക്കാൻ ഒരു നിമിഷം ചിലവഴിക്കുക.',
	'articlefeedback-pitch-survey-accept' => 'സർവ്വേ തുടങ്ങുക',
	'articlefeedback-pitch-join-message' => 'താങ്കൾക്കും ഒരംഗത്വം എടുക്കാം എന്നറിയില്ലേ? തിരുത്തലുകൾ പിന്തുടരാനും ചർച്ചകളിൽ പങ്കെടുക്കാനും സമൂഹത്തിന്റെ ഭാഗമാകാനും അംഗത്വം സഹായമാവും.',
	'articlefeedback-pitch-join-accept' => 'അംഗത്വമെടുക്കുക',
	'articlefeedback-pitch-join-login' => 'പ്രവേശിക്കുക',
	'articlefeedback-pitch-edit-message' => 'ഈ താൾ തിരുത്താനാവും എന്ന് താങ്കൾക്കറിയാമോ?',
	'articlefeedback-pitch-edit-accept' => 'ഈ താൾ തിരുത്തുക',
	'articlefeedback-expert-assessment-question' => 'താങ്കൾക്ക് ഈ വിഷയത്തിൽ അറിവുണ്ടോ?',
	'articlefeedback-expert-assessment-level-1-label' => 'ഉണ്ടെന്ന് പറയാം',
	'articlefeedback-expert-assessment-level-2-label' => 'ഉണ്ടെന്നു കരുതുന്നു',
	'articlefeedback-expert-assessment-level-3-label' => 'വിദഗ്ദ്ധ(ൻ)',
	'articlefeedback-survey-message-success' => 'സർവേ പൂരിപ്പിച്ചതിനു നന്ദി',
	'articlefeedback-survey-message-error' => 'എന്തോ പിഴവുണ്ടായിരിക്കുന്നു.
ദയവായി വീണ്ടും ശ്രമിക്കുക.',
);

/** Mongolian (Монгол)
 * @author Chinneeb
 */
$messages['mn'] = array(
	'articlefeedback-survey-submit' => 'Явуулах',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'articlefeedback' => 'Pentaksiran rencana',
	'articlefeedback-desc' => 'Pentaksiran rencana (versi percubaan)',
	'articlefeedback-survey-answer-whyrated-other' => 'Лия',
	'articlefeedback-survey-question-useful-iffalse' => 'Мезекс?',
	'articlefeedback-survey-submit' => 'Максомс',
);

/** Erzya (Эрзянь) */
$messages['myv'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Лия',
	'articlefeedback-survey-question-useful-iffalse' => 'Мезекс?',
	'articlefeedback-survey-submit' => 'Максомс',
);

/** Dutch (Nederlands)
 * @author Catrope
 * @author McDutchie
 * @author Siebrand
 */
$messages['nl'] = array(
	'articlefeedback' => 'Paginabeoordeling',
	'articlefeedback-desc' => 'Paginabeoordeling (testversie)',
	'articlefeedback-survey-question-whyrated' => 'Laat ons weten waarom u deze pagina vandaag hebt beoordeeld (kies alle redenen die van toepassing zijn):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Ik wil bijdragen aan de beoordelingen van de pagina',
	'articlefeedback-survey-answer-whyrated-development' => 'Ik hoop dat mijn beoordeling een positief effect heeft op de ontwikkeling van de pagina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Ik wilde bijdragen aan {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Ik vind het fijn om mijn mening te delen',
	'articlefeedback-survey-answer-whyrated-didntrate' => "Ik heb vandaag geen pagina's beoordeeld, maar in de toekomst wil ik wel terugkoppeling geven",
	'articlefeedback-survey-answer-whyrated-other' => 'Anders',
	'articlefeedback-survey-question-useful' => 'Vindt u dat de beoordelingen bruikbaar en duidelijk zijn?',
	'articlefeedback-survey-question-useful-iffalse' => 'Waarom?',
	'articlefeedback-survey-question-comments' => 'Hebt u nog opmerkingen?',
	'articlefeedback-survey-submit' => 'Opslaan',
	'articlefeedback-survey-title' => 'Beantwoord alstublieft een paar vragen',
	'articlefeedback-survey-thanks' => 'Bedankt voor het beantwoorden van de vragen.',
	'articlefeedback-error' => 'Er is een fout opgetreden.
Probeer het later opnieuw.',
	'articlefeedback-form-switch-label' => 'Deze pagina waarderen',
	'articlefeedback-form-panel-title' => 'Deze pagina waarderen',
	'articlefeedback-form-panel-instructions' => 'Geef alstublieft een beoordeling van deze pagina.',
	'articlefeedback-form-panel-clear' => 'Deze beoordeling verwijderen',
	'articlefeedback-form-panel-expertise' => 'Ik ben bekend met dit onderwerp',
	'articlefeedback-form-panel-expertise-studies' => 'Ik heb een studie (HBO/WO) gevolgd waarin dit onderwerp relevant is',
	'articlefeedback-form-panel-expertise-profession' => 'Dit onderwerp is onderdeel van mijn beroep',
	'articlefeedback-form-panel-expertise-hobby' => "Dit onderwerp is gerelateerd aan mijn hooby's of interesses",
	'articlefeedback-form-panel-expertise-other' => 'De bron van mijn kennis is geen keuzeoptie',
	'articlefeedback-form-panel-submit' => 'Terugkoppeling opslaan',
	'articlefeedback-report-switch-label' => 'Paginawaarderingen weergeven',
	'articlefeedback-report-panel-title' => 'Paginawaarderingen',
	'articlefeedback-report-panel-description' => 'Huidige gemiddelde beoordelingen.',
	'articlefeedback-report-empty' => 'Geen beoordelingen',
	'articlefeedback-report-ratings' => '$1 beoordelingen',
	'articlefeedback-field-trustworthy-label' => 'Betrouwbaar',
	'articlefeedback-field-trustworthy-tip' => 'Vindt u dat deze pagina voldoende bronvermeldingen heeft en dat de bronvermeldingen betrouwbaar zijn?',
	'articlefeedback-field-complete-label' => 'Afgerond',
	'articlefeedback-field-complete-tip' => 'Vindt u dat deze pagina de essentie van dit onderwerp bestrijkt?',
	'articlefeedback-field-objective-label' => 'Onbevooroordeeld',
	'articlefeedback-field-objective-tip' => 'Vindt u dat deze pagina een eerlijke weergave is van alle invalshoeken voor dit onderwerp?',
	'articlefeedback-field-wellwritten-label' => 'Goed geschreven',
	'articlefeedback-field-wellwritten-tip' => 'Vindt u dat deze pagina een correcte opbouw heeft een goed is geschreven?',
	'articlefeedback-pitch-reject' => 'Nu niet',
	'articlefeedback-pitch-or' => 'of',
	'articlefeedback-pitch-thanks' => 'Bedankt!
Uw beoordeling is opgeslagen.',
	'articlefeedback-pitch-survey-message' => 'Neem alstublieft even de tijd om een korte vragenlijst in te vullen.',
	'articlefeedback-pitch-survey-accept' => 'Vragenlijst starten',
	'articlefeedback-pitch-join-message' => 'Wist u dat u een gebruiker kunt aanmaken? Door een gebruiker aan te maken kunt u uw bewerkingen beter in de gaten houden, deelnemen aan overleg en onderdeel zijn van deze gemeenschap.',
	'articlefeedback-pitch-join-accept' => 'Gebruiker aanmaken',
	'articlefeedback-pitch-join-login' => 'Aanmelden',
	'articlefeedback-pitch-edit-message' => 'Wist u dat u deze pagina kunt bewerken?',
	'articlefeedback-pitch-edit-accept' => 'Deze pagina bewerken',
	'articlefeedback-expert-assessment-question' => 'Hebt u kennis over dit onderwerp?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginaal',
	'articlefeedback-expert-assessment-level-2-label' => 'Competent',
	'articlefeedback-expert-assessment-level-3-label' => 'Expert',
	'articlefeedback-survey-message-success' => 'Bedankt voor het beantwoorden van de vragen.',
	'articlefeedback-survey-message-error' => 'Er is een fout opgetreden.
Probeer het later opnieuw.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Nghtwlkr
 */
$messages['nn'] = array(
	'articlefeedback-survey-question-useful-iffalse' => 'Kvifor?',
	'articlefeedback-survey-submit' => 'Send',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'articlefeedback' => 'Artikkelvurdering',
	'articlefeedback-desc' => 'Artikkelvurdering (pilotversjon)',
	'articlefeedback-survey-question-whyrated' => 'Gi oss beskjed om hvorfor du vurderte denne siden idag (huk av alle som passer):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Jeg ønsket å bidra til den generelle vurderingen av denne siden',
	'articlefeedback-survey-answer-whyrated-development' => 'Jeg håper at min vurdering vil påvirke utviklingen av siden positivt',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Jeg ønsket å bidra til {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Jeg liker å dele min mening',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Jeg ga ingen vurderinger idag, men ønsket å gi tilbakemelding på denne funksjonen',
	'articlefeedback-survey-answer-whyrated-other' => 'Annet',
	'articlefeedback-survey-question-useful' => 'Tror du at vurderingene som blir gitt er nyttige og klare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Hvorfor?',
	'articlefeedback-survey-question-comments' => 'Har du noen ytterligere kommentarer?',
	'articlefeedback-survey-submit' => 'Send',
	'articlefeedback-survey-title' => 'Svar på noen få spørsmål',
	'articlefeedback-survey-thanks' => 'Takk for at du fylte ut undersøkelsen.',
	'articlefeedback-form-switch-label' => 'Gi tilbakemelding',
	'articlefeedback-form-panel-title' => 'Din tilbakemelding',
	'articlefeedback-form-panel-instructions' => 'Ta deg tid til å vurdere denne siden.',
	'articlefeedback-form-panel-submit' => 'Send tilbakemelding',
	'articlefeedback-report-switch-label' => 'Vis resultat',
	'articlefeedback-report-panel-title' => 'Tilbakemeldingsresultat',
	'articlefeedback-report-panel-description' => 'Gjeldende gjennomsnittskarakter.',
	'articlefeedback-report-empty' => 'Ingen vurderinger',
	'articlefeedback-report-ratings' => '$1 vurderinger',
	'articlefeedback-field-trustworthy-label' => 'Pålitelig',
	'articlefeedback-field-trustworthy-tip' => 'Føler du at denne siden har tilstrekkelig med siteringer og at disse siteringene kommer fra pålitelige kilder?',
	'articlefeedback-field-complete-label' => 'Fullfør',
	'articlefeedback-field-complete-tip' => 'Føler du at denne siden dekker de vesentlige emneområdene som den burde?',
	'articlefeedback-field-objective-label' => 'Objektiv',
	'articlefeedback-field-objective-tip' => 'Føler du at denne siden viser en rettferdig representasjon av alle perspektiv på problemet?',
	'articlefeedback-field-wellwritten-label' => 'Velskrevet',
	'articlefeedback-field-wellwritten-tip' => 'Føler du at denne siden er godt organisert og godt skrevet?',
	'articlefeedback-pitch-reject' => 'Nei takk',
	'articlefeedback-pitch-survey-accept' => 'Start undersøkelsen',
	'articlefeedback-pitch-join-accept' => 'Opprett konto',
	'articlefeedback-pitch-edit-accept' => 'Start redigering',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'articlefeedback' => 'Ocena artykułu',
	'articlefeedback-desc' => 'Ocena artykułu (wersja pilotażowa)',
	'articlefeedback-survey-question-whyrated' => 'Dlaczego oceniłeś dziś tę stronę (zaznacz wszystkie pasujące):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chciałem mieć wpływ na ogólną ocenę strony',
	'articlefeedback-survey-answer-whyrated-development' => 'Mam nadzieję, że moja ocena pozytywnie wpłynie na rozwój strony',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chciałem mieć swój wkład w rozwój {{GRAMMAR:D.lp|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Lubię dzielić się swoją opinią',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nie oceniałem dziś, ale chcę podzielić się swoją opinią na temat tego rozszerzenia',
	'articlefeedback-survey-answer-whyrated-other' => 'Inny powód',
	'articlefeedback-survey-question-useful' => 'Czy uważasz, że taka metoda oceniania jest użyteczna i czytelna?',
	'articlefeedback-survey-question-useful-iffalse' => 'Dlaczego?',
	'articlefeedback-survey-question-comments' => 'Czy masz jakieś dodatkowe uwagi?',
	'articlefeedback-survey-submit' => 'Zapisz',
	'articlefeedback-survey-title' => 'Proszę udzielić odpowiedzi na kilka pytań',
	'articlefeedback-survey-thanks' => 'Dziękujemy za wypełnienie ankiety.',
	'articlefeedback-error' => 'Wystąpił błąd. Proszę spróbować ponownie później.',
	'articlefeedback-form-switch-label' => 'Oceń tę stronę',
	'articlefeedback-form-panel-title' => 'Oceń tę stronę',
	'articlefeedback-form-panel-instructions' => 'Poświeć chwilę, aby ocenić tę stronę.',
	'articlefeedback-form-panel-clear' => 'Usuń ranking',
	'articlefeedback-form-panel-expertise' => 'Posiadam lepszą wiedzę w tym temacie',
	'articlefeedback-form-panel-expertise-studies' => 'Uczyłem się tego w szkole lub na studiach',
	'articlefeedback-form-panel-expertise-profession' => 'To element mojego zawodu',
	'articlefeedback-form-panel-expertise-hobby' => 'Jest to związane z moimi hobby lub zainteresowaniami',
	'articlefeedback-form-panel-expertise-other' => 'Źródła mojej wiedzy nie ma na liście',
	'articlefeedback-form-panel-submit' => 'Prześlij opinię',
	'articlefeedback-report-switch-label' => 'Jak strona jest oceniana',
	'articlefeedback-report-panel-title' => 'Ocena strony',
	'articlefeedback-report-panel-description' => 'Aktualna średnia ocen.',
	'articlefeedback-report-empty' => 'Brak ocen',
	'articlefeedback-report-ratings' => '$1 {{PLURAL:$1|ocena|oceny|ocen}}',
	'articlefeedback-field-trustworthy-label' => 'Godny zaufania',
	'articlefeedback-field-trustworthy-tip' => 'Czy uważasz, że strona ma wystarczającą liczbę odnośników i że odnoszą się one do wiarygodnych źródeł?',
	'articlefeedback-field-complete-label' => 'Wyczerpanie tematu',
	'articlefeedback-field-complete-tip' => 'Czy uważasz, że strona porusza wszystkie istotne aspekty, które powinna?',
	'articlefeedback-field-objective-label' => 'Neutralny',
	'articlefeedback-field-objective-tip' => 'Czy uważasz, że strona prezentuje wszystkie punkty widzenia na to zagadnienie?',
	'articlefeedback-field-wellwritten-label' => 'Dobrze napisany',
	'articlefeedback-field-wellwritten-tip' => 'Czy uważasz, że strona jest właściwie sformatowana oraz zrozumiale napisana?',
	'articlefeedback-pitch-reject' => 'Może później',
	'articlefeedback-pitch-or' => 'lub',
	'articlefeedback-pitch-survey-accept' => 'Rozpocznij ankietę',
	'articlefeedback-pitch-join-accept' => 'Utwórz konto',
	'articlefeedback-pitch-join-login' => 'Zaloguj się',
	'articlefeedback-pitch-edit-accept' => 'Rozpocznij edycję',
	'articlefeedback-expert-assessment-question' => 'Czy posiadasz wiedzę w tym temacie?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginalną',
	'articlefeedback-expert-assessment-level-2-label' => 'Dobrą',
	'articlefeedback-expert-assessment-level-3-label' => 'Ekspercką',
	'articlefeedback-survey-message-success' => 'Dziękujemy za wypełnienie ankiety.',
	'articlefeedback-survey-message-error' => 'Wystąpił błąd.
Proszę spróbować ponownie później.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'articlefeedback' => "Valutassion ëd j'artìcoj",
	'articlefeedback-desc' => "Version pilòta dla valutassion ëd j'artìcoj",
	'articlefeedback-survey-question-whyrated' => "Për piasì, ch'an fasa savèj përchè a l'ha valutà costa pàgina ancheuj (ch'a marca tut lòn ch'a-i intra):",
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'I vorìa contribuì a la valutassion global ëd la pàgina',
	'articlefeedback-survey-answer-whyrated-development' => 'I spero che mia valutassion a peussa toché positivament ël dësvlup ëd la pàgina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'I veui contribuì a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Am pias condivide mia opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => "I l'heu pa dàit ëd valutassion ancheuj, ma i vorìa dé un coment an sla fonsionalità",
	'articlefeedback-survey-answer-whyrated-other' => 'Àutr',
	'articlefeedback-survey-question-useful' => 'Chërdës-to che le valutassion dàite a sio ùtij e ciàire?',
	'articlefeedback-survey-question-useful-iffalse' => 'Përchè?',
	'articlefeedback-survey-question-comments' => "Ha-lo d'àutri coment?",
	'articlefeedback-survey-submit' => 'Spediss',
	'articlefeedback-survey-title' => "Për piasì, ch'a risponda a chèich chestion",
	'articlefeedback-survey-thanks' => "Mersì d'avèj compilà ël questionari.",
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'articlefeedback' => 'Avaliação do artigo',
	'articlefeedback-desc' => 'Avaliação do artigo (versão de testes)',
	'articlefeedback-survey-question-whyrated' => 'Diga-nos porque é que avaliou esta página hoje (marque todas as opções verdadeiras):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Queria contribuir para a avaliação global da página',
	'articlefeedback-survey-answer-whyrated-development' => 'Espero que a minha avaliação afecte positivamente o desenvolvimento da página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Queria colaborar com a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Gosto de dar a minha opinião',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoje não avaliei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Acredita que as avaliações dadas são úteis e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Porquê?',
	'articlefeedback-survey-question-comments' => 'Tem mais comentários?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, responda a algumas perguntas',
	'articlefeedback-survey-thanks' => 'Obrigado por preencher o inquérito.',
	'articlefeedback-error' => 'Ocorreu um erro. Tente novamente mais tarde, por favor.',
	'articlefeedback-form-switch-label' => 'Avaliar esta página',
	'articlefeedback-form-panel-title' => 'Avaliar esta página',
	'articlefeedback-form-panel-instructions' => 'Dedique um momento a avaliar esta página abaixo, por favor.',
	'articlefeedback-form-panel-clear' => 'Remover essa avaliação',
	'articlefeedback-form-panel-expertise' => 'Tenho conhecimento prévio deste assunto',
	'articlefeedback-form-panel-expertise-studies' => 'Estudei o assunto no secundário/universidade',
	'articlefeedback-form-panel-expertise-profession' => 'Faz parte dos meus conhecimentos profissionais',
	'articlefeedback-form-panel-expertise-hobby' => 'Está relacionado com os meus passatempos ou interesses',
	'articlefeedback-form-panel-expertise-other' => 'A fonte dos meus conhecimentos, não está listada aqui',
	'articlefeedback-form-panel-submit' => 'Enviar comentários',
	'articlefeedback-report-switch-label' => 'Ver avaliações',
	'articlefeedback-report-panel-title' => 'Avaliações',
	'articlefeedback-report-panel-description' => 'Avaliações médias actuais.',
	'articlefeedback-report-empty' => 'Não existem avaliações',
	'articlefeedback-report-ratings' => '$1 avaliações',
	'articlefeedback-field-trustworthy-label' => 'De confiança',
	'articlefeedback-field-trustworthy-tip' => 'Considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articlefeedback-field-complete-label' => 'Completa',
	'articlefeedback-field-complete-tip' => 'Considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articlefeedback-field-objective-label' => 'Imparcial',
	'articlefeedback-field-objective-tip' => 'Acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articlefeedback-field-wellwritten-label' => 'Bem escrita',
	'articlefeedback-field-wellwritten-tip' => 'Acha que esta página está bem organizada e bem escrita?',
	'articlefeedback-pitch-reject' => 'Talvez mais tarde',
	'articlefeedback-pitch-or' => 'ou',
	'articlefeedback-pitch-thanks' => 'Obrigado! As suas avaliações foram gravadas.',
	'articlefeedback-pitch-survey-message' => 'Por favor, dedique um momento para responder a um pequeno inquérito.',
	'articlefeedback-pitch-survey-accept' => 'Começar inquérito',
	'articlefeedback-pitch-join-message' => 'Sabia que pode criar uma conta? Uma conta permitir-lhe-á manter um registo das suas edições, participar nos debates e fazer parte da comunidade.',
	'articlefeedback-pitch-join-accept' => 'Criar conta',
	'articlefeedback-pitch-join-login' => 'Autenticação',
	'articlefeedback-pitch-edit-message' => 'Sabia que pode editar esta página?',
	'articlefeedback-pitch-edit-accept' => 'Editar esta página',
	'articlefeedback-expert-assessment-question' => 'Como classifica o seu conhecimento desta matéria?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Conhecedor',
	'articlefeedback-expert-assessment-level-3-label' => 'Perito',
	'articlefeedback-survey-message-success' => 'Obrigado por preencher o inquérito.',
	'articlefeedback-survey-message-error' => 'Ocorreu um erro. 
Tente novamente mais tarde, por favor.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 * @author Raylton P. Sousa
 */
$messages['pt-br'] = array(
	'articlefeedback' => 'Avaliação do artigo',
	'articlefeedback-desc' => 'Avaliação do artigo (versão de testes)',
	'articlefeedback-survey-question-whyrated' => 'Diga-nos porque é que classificou esta página hoje, por favor (marque todas as opções as quais se aplicam):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Eu queria contribuir para a classificação global da página',
	'articlefeedback-survey-answer-whyrated-development' => 'Eu espero que a minha classificação afete positivamente o desenvolvimento da página',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Eu queria colaborar com a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Eu gosto de dar a minha opinião',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hoje não classifiquei páginas, mas queria deixar o meu comentário sobre a funcionalidade',
	'articlefeedback-survey-answer-whyrated-other' => 'Outra',
	'articlefeedback-survey-question-useful' => 'Você acredita que as classificações dadas são úteis e claras?',
	'articlefeedback-survey-question-useful-iffalse' => 'Por quê?',
	'articlefeedback-survey-question-comments' => 'Você tem mais algum comentário?',
	'articlefeedback-survey-submit' => 'Enviar',
	'articlefeedback-survey-title' => 'Por favor, responda a algumas perguntas',
	'articlefeedback-survey-thanks' => 'Obrigado por preencher o questionário.',
	'articlefeedback-error' => 'Ocorreu um erro. Por favor, tente novamente mais tarde.',
	'articlefeedback-form-switch-label' => 'Avaliar esta página',
	'articlefeedback-form-panel-title' => 'Avaliar esta página',
	'articlefeedback-form-panel-instructions' => 'Dedique um momento a avaliar esta página abaixo, por favor.',
	'articlefeedback-form-panel-clear' => 'Remover esta avaliação',
	'articlefeedback-form-panel-expertise' => 'Eu tenho conhecimento prévio deste assunto',
	'articlefeedback-form-panel-expertise-studies' => 'Eu estudei o assunto na faculdade/universidade',
	'articlefeedback-form-panel-expertise-profession' => 'Faz parte dos meus conhecimentos profissionais',
	'articlefeedback-form-panel-expertise-hobby' => 'Está relacionado com os meus passatempos ou interesses',
	'articlefeedback-form-panel-expertise-other' => 'A fonte dos meus conhecimentos, não está listada aqui',
	'articlefeedback-form-panel-submit' => 'Enviar comentários',
	'articlefeedback-report-switch-label' => 'Ver avaliações',
	'articlefeedback-report-panel-title' => 'Avaliações',
	'articlefeedback-report-panel-description' => 'Classificações médias atuais.',
	'articlefeedback-report-empty' => 'Não existem avaliações',
	'articlefeedback-report-ratings' => '$1 avaliações',
	'articlefeedback-field-trustworthy-label' => 'Confiável',
	'articlefeedback-field-trustworthy-tip' => 'Você considera que esta página tem citações suficientes e que essas citações provêm de fontes fiáveis?',
	'articlefeedback-field-complete-label' => 'Completa',
	'articlefeedback-field-complete-tip' => 'Você considera que esta página aborda os temas essenciais que deviam ser cobertos?',
	'articlefeedback-field-objective-label' => 'Imparcial',
	'articlefeedback-field-objective-tip' => 'Você acha que esta página representa, de forma equilibrada, todos os pontos de vista sobre o assunto?',
	'articlefeedback-field-wellwritten-label' => 'Bem escrito',
	'articlefeedback-field-wellwritten-tip' => 'Acha que esta página está bem organizada e bem escrita?',
	'articlefeedback-pitch-reject' => 'Talvez mais tarde',
	'articlefeedback-pitch-or' => 'ou',
	'articlefeedback-pitch-survey-accept' => 'Começar questionário',
	'articlefeedback-pitch-join-accept' => 'Criar conta',
	'articlefeedback-pitch-join-login' => 'Autenticação',
	'articlefeedback-pitch-edit-accept' => 'Começar a editar',
	'articlefeedback-expert-assessment-question' => 'Como você classifica o seu conhecimento deste assunto?',
	'articlefeedback-expert-assessment-level-1-label' => 'Marginal',
	'articlefeedback-expert-assessment-level-2-label' => 'Conhecedor',
	'articlefeedback-expert-assessment-level-3-label' => 'Perito',
	'articlefeedback-survey-message-success' => 'Obrigado por preencher o questionário.',
	'articlefeedback-survey-message-error' => 'Ocorreu um erro. 
Tente novamente mais tarde, por favor.',
);

/** Romanian (Română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 * @author Strainu
 */
$messages['ro'] = array(
	'articlefeedback' => 'Evaluare articol',
	'articlefeedback-desc' => 'Evaluare articol (versiunea pilot)',
	'articlefeedback-survey-question-whyrated' => 'Vă rugăm să ne spuneți de ce ați evaluat această pagină astăzi (bifați tot ce se aplică):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Am vrut să contribui la evaluarea paginii',
	'articlefeedback-survey-answer-whyrated-development' => 'Sper ca evaluarea mea să afecteze pozitiv dezvoltarea paginii',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Am vrut să contribui la {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Îmi place să îmi împărtășesc opinia',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Nu am furnizat evaluări astăzi, însă am dorit să ofer reacții pe viitor',
	'articlefeedback-survey-answer-whyrated-other' => 'Altul',
	'articlefeedback-survey-question-useful' => 'Considerați că evaluările furnizate sunt folositoare și clare?',
	'articlefeedback-survey-question-useful-iffalse' => 'De ce?',
	'articlefeedback-survey-question-comments' => 'Aveți comentarii suplimentare?',
	'articlefeedback-survey-submit' => 'Trimite',
	'articlefeedback-survey-title' => 'Vă rugăm să răspundeți la câteva întrebări',
	'articlefeedback-survey-thanks' => 'Vă mulțumim pentru completarea sondajului.',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 * @author Reder
 */
$messages['roa-tara'] = array(
	'articlefeedback' => 'Artichele de valutazione',
	'articlefeedback-desc' => 'Artichele de valutazione (versiune guidate)',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => "Ije amm'a condrebbuì a {{SITENAME}}",
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => "Me chiace dìcere 'u penziere mèje",
	'articlefeedback-survey-answer-whyrated-other' => 'Otre',
	'articlefeedback-survey-question-useful-iffalse' => 'Purcé?',
	'articlefeedback-survey-question-comments' => 'Tìne otre commende?',
	'articlefeedback-survey-submit' => 'Conferme',
	'articlefeedback-survey-title' => 'Se preghe de responnere a quacche dumanne',
	'articlefeedback-survey-thanks' => "Grazzie pè avè combilate 'u sondagge.",
	'articlefeedback-pitch-or' => 'o',
	'articlefeedback-expert-assessment-level-3-label' => 'Esperte',
);

/** Russian (Русский)
 * @author Assele
 * @author Catrope
 * @author MaxSem
 * @author Александр Сигачёв
 * @author Сrower
 */
$messages['ru'] = array(
	'articlefeedback' => 'Оценка статьи',
	'articlefeedback-desc' => 'Оценка статьи (экспериментальный вариант)',
	'articlefeedback-survey-question-whyrated' => 'Пожалуйста, дайте нам знать, почему вы сегодня дали оценку этой странице (отметьте все подходящие варианты):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я хотел повлиять на итоговый рейтинг этой страницы',
	'articlefeedback-survey-answer-whyrated-development' => 'Я надеюсь, что моя оценка положительно повлияет на развитие этой страницы',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я хочу содействовать развитию {{GRAMMAR:genitive|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мне нравится делиться своим мнением',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не поставил сегодня оценку, но хочу оставить отзыв о данной функции',
	'articlefeedback-survey-answer-whyrated-other' => 'Иное',
	'articlefeedback-survey-question-useful' => 'Считаете ли вы, что проставленные оценки являются полезными и понятными?',
	'articlefeedback-survey-question-useful-iffalse' => 'Почему?',
	'articlefeedback-survey-question-comments' => 'Есть ли у вас какие-либо дополнительные замечания?',
	'articlefeedback-survey-submit' => 'Отправить',
	'articlefeedback-survey-title' => 'Пожалуйста, ответьте на несколько вопросов',
	'articlefeedback-survey-thanks' => 'Спасибо за участие в опросе.',
	'articlefeedback-error' => 'Произошла ошибка. Пожалуйста, повторите попытку позже.',
	'articlefeedback-form-switch-label' => 'Оцените эту страницу',
	'articlefeedback-form-panel-title' => 'Оцените эту страницу',
	'articlefeedback-form-panel-instructions' => 'Пожалуйста, найдите время, чтобы оценить эту страницу.',
	'articlefeedback-form-panel-clear' => 'Удалить эту оценку',
	'articlefeedback-form-panel-expertise' => 'У меня есть предварительные знания по этой теме',
	'articlefeedback-form-panel-expertise-studies' => 'Я изучал это в колледже / университете',
	'articlefeedback-form-panel-expertise-profession' => 'Это часть моей профессии',
	'articlefeedback-form-panel-expertise-hobby' => 'Это связано с моими увлечениями, хобби',
	'articlefeedback-form-panel-expertise-other' => 'Источник моих знаний здесь не указан',
	'articlefeedback-form-panel-submit' => 'Отправить отзыв',
	'articlefeedback-report-switch-label' => 'Показать оценки страницы',
	'articlefeedback-report-panel-title' => 'Оценки страницы',
	'articlefeedback-report-panel-description' => 'Текущие средние оценки.',
	'articlefeedback-report-empty' => 'Нет оценок',
	'articlefeedback-report-ratings' => 'оценки',
	'articlefeedback-field-trustworthy-label' => 'Достоверность',
	'articlefeedback-field-trustworthy-tip' => 'Считаете ли вы, что на этой странице достаточно ссылок на источники, что источники являются достоверными?',
	'articlefeedback-field-complete-label' => 'Полнота',
	'articlefeedback-field-complete-tip' => 'Считаете ли вы, что эта страница в достаточной мере раскрывает основные вопросы темы?',
	'articlefeedback-field-objective-label' => 'Беспристрастность',
	'articlefeedback-field-objective-tip' => 'Считаете ли вы, что эта страница объективно отражает все точки зрения по данной теме?',
	'articlefeedback-field-wellwritten-label' => 'Стиль изложения',
	'articlefeedback-field-wellwritten-tip' => 'Считаете ли вы, что эта страница хорошо организована и хорошо написана?',
	'articlefeedback-pitch-reject' => 'Может быть, позже',
	'articlefeedback-pitch-or' => 'или',
	'articlefeedback-pitch-thanks' => 'Спасибо! Ваши оценки сохранены.',
	'articlefeedback-pitch-survey-message' => 'Пожалуйста, найдите время для выполнения краткой оценки.',
	'articlefeedback-pitch-survey-accept' => 'Начать опрос',
	'articlefeedback-pitch-join-message' => 'Знаете ли вы, что можно создать учётную запись? Она поможет вам отслеживать ваши правки, участвовать в обсуждениях, быть частью сообщества.',
	'articlefeedback-pitch-join-accept' => 'Создать учётную запись',
	'articlefeedback-pitch-join-login' => 'Представиться',
	'articlefeedback-pitch-edit-message' => 'Знаете ли вы, что эту страницу можно редактировать?',
	'articlefeedback-pitch-edit-accept' => 'Править эту страницу',
	'articlefeedback-expert-assessment-question' => 'Имеются ли у вас знания по этой теме?',
	'articlefeedback-expert-assessment-level-1-label' => 'Поверхностные',
	'articlefeedback-expert-assessment-level-2-label' => 'Достаточные',
	'articlefeedback-expert-assessment-level-3-label' => 'Экспертные',
	'articlefeedback-survey-message-success' => 'Спасибо за участие в опросе.',
	'articlefeedback-survey-message-error' => 'Произошла ошибка. 
Пожалуйста, повторите попытку позже.',
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'articlefeedback' => 'Оцінка статї',
	'articlefeedback-desc' => 'Оцінка статї (експеріменталный варіант)',
	'articlefeedback-survey-question-whyrated' => 'Чом сьте днесь оцінили тоту сторінку (зачаркните вшыткы платны можности):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Хотїв єм овпливнити цалкову оцінку сторінкы',
	'articlefeedback-survey-answer-whyrated-development' => 'Сподїваю ся, же мій рейтінґ буде позітівно впливати на вывой сторінкы',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Хотїв єм помочі {{grammar:3sg|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Люблю здїляти свій назор',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Днесь єм не оцінёвав, але хотїв єм додати свій назор на тоту функцію',
	'articlefeedback-survey-answer-whyrated-other' => 'Інше',
	'articlefeedback-survey-question-useful' => 'Думаєте собі, же доданы оцінкы суть хосновны і зрозумітельны?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чом?',
	'articlefeedback-survey-question-comments' => 'Маєте даякы додаточны коментарї?',
	'articlefeedback-survey-submit' => 'Одослати',
	'articlefeedback-survey-title' => 'Просиме, одповіджте на пару вопросів',
	'articlefeedback-survey-thanks' => 'Дякуєме за выповнїня звідованя.',
	'articlefeedback-form-panel-title' => 'Ваш назор',
	'articlefeedback-form-panel-instructions' => 'Просиме, найдьте собі час про оцінку той статї.',
	'articlefeedback-report-switch-label' => 'Указати резултаты',
	'articlefeedback-field-trustworthy-tip' => 'Маєте чутя, же тота сторінка достаточно одказує на жрідла і хоснованы жрідла суть способны довірованя?',
	'articlefeedback-field-complete-label' => 'Комплетность',
	'articlefeedback-field-complete-tip' => 'Маєте чутя, же тота сторінка покрывать вшыткы важны части темы?',
	'articlefeedback-field-objective-tip' => 'Маєте чутя, же тота сторінка справедливо покрывать вшыткы погляды на даны темы?',
	'articlefeedback-field-wellwritten-tip' => 'Маєте чутя, же тота сторінка є правилно орґанізована о добрї написана?',
	'articlefeedback-pitch-join-accept' => 'Вытворити конто',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'articlefeedback' => 'Ыстатыйаны сыаналааһын',
	'articlefeedback-desc' => 'Ыстатыйаны сыаналааһын (тургутуллар барыла)',
	'articlefeedback-survey-question-whyrated' => 'Бука диэн эт эрэ, тоҕо бүгүн бу сирэйи сыаналаатыҥ (туох баар сөп түбэһэр барыллары бэлиэтээ):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Бу сирэй түмүк рейтинин уларытаары',
	'articlefeedback-survey-answer-whyrated-development' => 'Сыанам бу сирэй тупсарыгар көмөлөһүө диэн санааттан',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{GRAMMAR:genitive|{{SITENAME}}}} сайдыытыгар көмөлөһүөхпүн баҕарабын',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Бэйэм санаабын дьоҥҥо биллэрэрбин сөбүлүүбүн',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Бүгүн сыана бирбэтим, ол эрээри бу функция туһунан суруйуохпун баҕарабын',
	'articlefeedback-survey-answer-whyrated-other' => 'Атын',
	'articlefeedback-survey-question-useful' => 'Баар сыанабыллар туһаланы аҕалыахтара дуо, өйдөнөллөр дуо?',
	'articlefeedback-survey-question-useful-iffalse' => 'Тоҕо?',
	'articlefeedback-survey-question-comments' => 'Ханнык эмит эбии этиилээххин дуо?',
	'articlefeedback-survey-submit' => 'Ыытарга',
	'articlefeedback-survey-title' => 'Бука диэн аҕыйах ыйытыыга хоруйдаа эрэ',
	'articlefeedback-survey-thanks' => 'Ыйытыыларга хоруйдаабыккар махтанабыт.',
	'articlefeedback-form-switch-label' => 'Бу сирэйи сыаналаа',
	'articlefeedback-form-panel-title' => 'Бу сирэйи сыаналаа',
	'articlefeedback-form-panel-instructions' => 'Бука диэн бу сирэйгэ сыанабылла туруор эрэ.',
	'articlefeedback-form-panel-clear' => 'Бу сыананы сот',
	'articlefeedback-form-panel-expertise' => 'Бу тиэмэни удумуҕалатабын',
	'articlefeedback-form-panel-expertise-studies' => 'Маны колледжка/университекка үөрэппитим',
	'articlefeedback-form-panel-expertise-profession' => 'Идэм сорҕото',
	'articlefeedback-form-panel-expertise-hobby' => 'Мин үлүһүйүүбэр, дьулҕаммар сыһыаннаах',
	'articlefeedback-form-panel-expertise-other' => 'Туох сыһыаннааҕым туһунан манна ыйыллыбатах',
	'articlefeedback-form-panel-submit' => 'Санаа этиитэ',
	'articlefeedback-report-switch-label' => 'Сирэй сыанабылларын көрдөр',
	'articlefeedback-report-panel-title' => 'Сирэйи сыаналааһын',
	'articlefeedback-report-panel-description' => 'Билиҥҥи орто сыанабыллар.',
	'articlefeedback-report-empty' => 'Сыанабыл суох',
	'articlefeedback-report-ratings' => '$1 сыанабыл',
	'articlefeedback-field-trustworthy-label' => 'Итэҕэтиилээҕэ',
	'articlefeedback-field-complete-label' => 'Толорута',
	'articlefeedback-field-complete-tip' => 'Бу сирэй тиэмэ сүрүн ис хоһоонун арыйар дуо?',
	'articlefeedback-field-objective-label' => 'Тутулуга суоҕа',
	'articlefeedback-field-objective-tip' => 'Бу сирэй араас көрүүлэри тэҥҥэ, тугу да күөмчүлээбэккэ көрдөрөр дии саныыгын дуо?',
	'articlefeedback-field-wellwritten-label' => 'Суруйуу истиилэ',
	'articlefeedback-field-wellwritten-tip' => 'Бу сирэй бэркэ сааһыланан суруллубут дии саныыгын дуо?',
	'articlefeedback-pitch-reject' => 'Баҕар кэлин',
	'articlefeedback-pitch-or' => 'эбэтэр',
	'articlefeedback-pitch-survey-accept' => 'Ыйытыгы саҕалыырга',
	'articlefeedback-pitch-join-accept' => 'Саҥа ааты бэлиэтииргэ',
	'articlefeedback-pitch-join-login' => 'Ааккын эт',
	'articlefeedback-pitch-edit-accept' => 'Бу сирэйи уларыт',
	'articlefeedback-expert-assessment-question' => 'Бу эйгэни билэҕин дуо?',
	'articlefeedback-expert-assessment-level-1-label' => 'Ону-маны',
	'articlefeedback-expert-assessment-level-2-label' => 'Син билэбин',
	'articlefeedback-expert-assessment-level-3-label' => 'Үчүгэйдик билэбин',
	'articlefeedback-survey-message-success' => 'Ыйытыыларга хоруйдаабыккар махтанабыт.',
	'articlefeedback-survey-message-error' => 'Алҕас таҕыста.
Бука диэн хойутуу хос боруобалаар.',
);

/** Sicilian (Sicilianu)
 * @author Aushulz
 */
$messages['scn'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Àutru',
	'articlefeedback-survey-question-useful-iffalse' => 'Picchì?',
	'articlefeedback-survey-question-comments' => 'Vò diri autri cosi?',
	'articlefeedback-survey-title' => "Arrispunni a 'na pocu di dumanni",
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'articlefeedback' => 'Hodnotenie článku',
	'articlefeedback-desc' => 'Hodnotenie článku (pilotná verzia)',
	'articlefeedback-survey-question-whyrated' => 'Prosím, dajte nám vedieť prečo ste dnes ohodnotili túto stránku (zaškrtnite všetky možnosti, ktoré považujete za pravdivé):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Chcel som prispieť k celkovému ohodnoteniu stránky',
	'articlefeedback-survey-answer-whyrated-development' => 'Dúfam, že moje hodnotenie pozitívne ovplyvní vývoj stránky',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Chcel som prispieť do {{GRAMMAR:genitív|{{SITENAME}}}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rád sa delím o svoj názor',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Dnes som neposkytol hodnotenie, ale chcel som okomentovať túto možnosť',
	'articlefeedback-survey-answer-whyrated-other' => 'Iné',
	'articlefeedback-survey-question-useful' => 'Veríte, že poskytnuté hodnotenia sú užitočné a jasné?',
	'articlefeedback-survey-question-useful-iffalse' => 'Prečo?',
	'articlefeedback-survey-question-comments' => 'Máte nejaké ďalšie komentáre?',
	'articlefeedback-survey-submit' => 'Odoslať',
	'articlefeedback-survey-title' => 'Prosím, zodpovedajte niekoľko otázok',
	'articlefeedback-survey-thanks' => 'Ďakujeme za vyplnenie dotazníka.',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'articlefeedback' => 'Ocenjevanje člankov',
	'articlefeedback-desc' => 'Ocenjevanje člankov (pilotska različica)',
	'articlefeedback-survey-question-whyrated' => 'Prosimo, povejte nam, zakaj ste danes ocenili to stran (izberite vse, kar ustreza):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Želel sem prispevati splošni oceni strani',
	'articlefeedback-survey-answer-whyrated-development' => 'Upam, da bo moja ocena dobro vplivala na razvoj strani',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Želel sem prispevati k projektu {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Rad delim svoje mnenje',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Danes nisem podal ocene, ampak sem želel podati povratno informacijo o funkciji',
	'articlefeedback-survey-answer-whyrated-other' => 'Drugo',
	'articlefeedback-survey-question-useful' => 'Ali verjamete, da so posredovane ocene uporabne in jasne?',
	'articlefeedback-survey-question-useful-iffalse' => 'Zakaj?',
	'articlefeedback-survey-question-comments' => 'Imate kakšne dodatne pripombe?',
	'articlefeedback-survey-submit' => 'Pošlji',
	'articlefeedback-survey-title' => 'Prosimo, odgovorite na nekaj vprašanj',
	'articlefeedback-survey-thanks' => 'Zahvaljujemo se vam za izpolnitev vprašalnika.',
	'articlefeedback-error' => 'Prišlo je do napake. Prosimo, poskusite znova pozneje.',
	'articlefeedback-form-switch-label' => 'Ocenite to stran',
	'articlefeedback-form-panel-title' => 'Ocenite to stran',
	'articlefeedback-form-panel-instructions' => 'Prosimo, vzemite si trenutek in ocenite to stran.',
	'articlefeedback-form-panel-clear' => 'Odstrani oceno',
	'articlefeedback-form-panel-expertise' => 'Imam predhodno znanje o tej temi',
	'articlefeedback-form-panel-expertise-studies' => 'Študiral sem jo na fakulteti/univerzi',
	'articlefeedback-form-panel-expertise-profession' => 'Je del mojega poklica',
	'articlefeedback-form-panel-expertise-hobby' => 'Povezano je z mojimi konjički in zanimanji',
	'articlefeedback-form-panel-expertise-other' => 'Vir mojega znanja tukaj ni naveden',
	'articlefeedback-form-panel-submit' => 'Pošlji povratno informacijo',
	'articlefeedback-report-switch-label' => 'Prikaži ocene strani',
	'articlefeedback-report-panel-title' => 'Ocene strani',
	'articlefeedback-report-panel-description' => 'Trenutne povprečne ocene.',
	'articlefeedback-report-empty' => 'Brez ocen',
	'articlefeedback-report-ratings' => '$1 ocen',
	'articlefeedback-field-trustworthy-label' => 'Zanesljivo',
	'articlefeedback-field-trustworthy-tip' => 'Menite, da ima ta stran dovolj navedkov in da ta navajanja prihajajo iz zanesljivih virov?',
	'articlefeedback-field-complete-label' => 'Celovito',
	'articlefeedback-field-complete-tip' => 'Menite, da ta stran zajema temeljna tematska področja, ki bi jih naj?',
	'articlefeedback-field-objective-label' => 'Nepristransko',
	'articlefeedback-field-objective-tip' => 'Menite, da ta stran prikazuje pravično zastopanost vseh pogledov na obravnavano temo?',
	'articlefeedback-field-wellwritten-label' => 'Dobro napisano',
	'articlefeedback-field-wellwritten-tip' => 'Menite, da je ta stran dobro organizirana in dobro napisana?',
	'articlefeedback-pitch-reject' => 'Morda kasneje',
	'articlefeedback-pitch-or' => 'ali',
	'articlefeedback-pitch-thanks' => 'Hvala! Vaše ocene so zabeležene.',
	'articlefeedback-pitch-survey-message' => 'Prosimo, vzemite si trenutek, da izpolnite kratko anketo.',
	'articlefeedback-pitch-survey-accept' => 'Začni z anketo',
	'articlefeedback-pitch-join-message' => 'Ali ste vedeli, da lahko ustvarite račun? Račun vam bo pomagal slediti vašim urejanjem, vključiti se v razprave in biti del Wikipedije.',
	'articlefeedback-pitch-join-accept' => 'Ustvari račun',
	'articlefeedback-pitch-join-login' => 'Prijavite se',
	'articlefeedback-pitch-edit-message' => 'Ali ste vedeli, da lahko uredite ta članek?',
	'articlefeedback-pitch-edit-accept' => 'Uredi ta članek',
	'articlefeedback-expert-assessment-question' => 'Kakšno znanje imate na tem področju?',
	'articlefeedback-expert-assessment-level-1-label' => 'Obrobno',
	'articlefeedback-expert-assessment-level-2-label' => 'Spodobno',
	'articlefeedback-expert-assessment-level-3-label' => 'Strokovno',
	'articlefeedback-survey-message-success' => 'Zahvaljujemo se vam za izpolnitev vprašalnika.',
	'articlefeedback-survey-message-error' => 'Prišlo je do napake.
Prosimo, poskusite znova pozneje.',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'articlefeedback-survey-answer-whyrated-other' => 'Остало',
	'articlefeedback-survey-question-useful-iffalse' => 'Зашто?',
	'articlefeedback-survey-question-comments' => 'Имате ли још коментара?',
	'articlefeedback-survey-submit' => 'Пошаљи',
	'articlefeedback-survey-title' => 'Молимо вас да одговорите на неколико питања',
	'articlefeedback-survey-thanks' => 'Хвала вам што сте попунили упитник.',
	'articlefeedback-error' => 'Дошло је до грешке. Покушајте поново.',
	'articlefeedback-form-switch-label' => 'Оцени ову страницу',
	'articlefeedback-form-panel-title' => 'Оцењивање странице',
	'articlefeedback-form-panel-instructions' => 'Издвојте тренутак да оцените ову страницу.',
	'articlefeedback-form-panel-clear' => 'Уклони ову оцену',
	'articlefeedback-form-panel-expertise-profession' => 'То је део моје струке',
	'articlefeedback-form-panel-expertise-hobby' => 'То је везано за моје хобије или занимања',
	'articlefeedback-form-panel-submit' => 'Пошаљи повратну информацију',
	'articlefeedback-report-empty' => 'Нема оцена.',
	'articlefeedback-field-trustworthy-label' => 'Поуздано',
	'articlefeedback-field-wellwritten-label' => 'Лепо написано',
	'articlefeedback-pitch-reject' => 'Можда касније',
	'articlefeedback-pitch-or' => 'или',
	'articlefeedback-pitch-survey-accept' => 'Почни упитник',
	'articlefeedback-pitch-join-accept' => 'Отвори налог',
	'articlefeedback-pitch-join-login' => 'Пријави ме',
	'articlefeedback-pitch-edit-accept' => 'Почните уређивање',
	'articlefeedback-expert-assessment-level-3-label' => 'Стручњак',
	'articlefeedback-survey-message-success' => 'Хвала вам што сте попунили упитник.',
	'articlefeedback-survey-message-error' => 'Дошло је до грешке.
Покушајте касније.',
);

/** Swedish (Svenska)
 * @author Ainali
 * @author Fluff
 * @author Tobulos1
 */
$messages['sv'] = array(
	'articlefeedback' => 'Artikelbedömning',
	'articlefeedback-desc' => 'Artikelbedömning (pilotversion)',
	'articlefeedback-survey-question-whyrated' => 'Låt oss gärna veta varför du bedömt denna sida i dag (markera alla som gäller):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Jag ville bidra till den övergripande bedömningen av sidan',
	'articlefeedback-survey-answer-whyrated-development' => 'Jag hoppas att min bedömning skulle påverka utvecklingen av sidan positivt',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Jag ville bidra till {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Jag gillar att ge min åsikt',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Jag har inte gjort en bedömning idag, men ville ge feedback på funktionen',
	'articlefeedback-survey-answer-whyrated-other' => 'Annat',
	'articlefeedback-survey-question-useful' => 'Tror du att bedömningarna är användbara och tydliga?',
	'articlefeedback-survey-question-useful-iffalse' => 'Varför?',
	'articlefeedback-survey-question-comments' => 'Har du några ytterligare kommentarer?',
	'articlefeedback-survey-submit' => 'Skicka in',
	'articlefeedback-survey-title' => 'Svara på några få frågor',
	'articlefeedback-survey-thanks' => 'Tack för att du fyllde i enkäten.',
	'articlefeedback-error' => 'Ett fel har uppstått. Försök igen senare.',
	'articlefeedback-form-switch-label' => 'Ge feedback',
	'articlefeedback-form-panel-title' => 'Din feedback',
	'articlefeedback-form-panel-instructions' => 'Vänligen betygsätt denna sida.',
	'articlefeedback-form-panel-clear' => 'Ta bort detta betyg',
	'articlefeedback-form-panel-expertise-studies' => 'Jag har studerat i högskola/universitet',
	'articlefeedback-form-panel-expertise-profession' => 'Det är en del av mitt yrke',
	'articlefeedback-form-panel-expertise-hobby' => 'Det är relaterat till mina hobbyer eller intressen',
	'articlefeedback-form-panel-expertise-other' => 'Källan till min kunskap inte är listade här',
	'articlefeedback-form-panel-submit' => 'Skicka in feedback',
	'articlefeedback-report-switch-label' => 'Visa resultat',
	'articlefeedback-report-panel-title' => 'Resultat av feedback',
	'articlefeedback-report-panel-description' => 'Nuvarande genomsnittliga betyg.',
	'articlefeedback-report-empty' => 'Inga betyg',
	'articlefeedback-report-ratings' => '$1 betyg',
	'articlefeedback-field-trustworthy-label' => 'Trovärdig',
	'articlefeedback-field-trustworthy-tip' => 'Känner du att denna sida har tillräckliga citat och att dessa citat kommer från pålitliga källor?',
	'articlefeedback-field-complete-label' => 'Heltäckande',
	'articlefeedback-field-complete-tip' => 'Känner du att den här sidan täcker de väsentliga ämnesområden som det ska?',
	'articlefeedback-field-objective-label' => 'Objektiv',
	'articlefeedback-field-objective-tip' => 'Känner du att den här sidan visar en rättvis representation av alla perspektiv på frågan?',
	'articlefeedback-field-wellwritten-label' => 'Välskrivet',
	'articlefeedback-field-wellwritten-tip' => 'Tycker du att den här sidan är väl organiserad och välskriven?',
	'articlefeedback-pitch-reject' => 'Kanske senare',
	'articlefeedback-pitch-or' => 'eller',
	'articlefeedback-pitch-survey-accept' => 'Starta undersökning',
	'articlefeedback-pitch-join-accept' => 'Skapa ett konto',
	'articlefeedback-pitch-join-login' => 'Logga in',
	'articlefeedback-pitch-edit-accept' => 'Börja redigera',
	'articlefeedback-expert-assessment-question' => 'Har du kunskaper om detta ämne?',
	'articlefeedback-survey-message-success' => 'Tack för att du fyllde i undersökningen.',
	'articlefeedback-survey-message-error' => 'Ett fel har uppstått. 
Försök igen senare.',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'இந்த தளத்திற்கு நான் பங்களிக்க வேண்டும் {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'நான் என்னுடைய கருத்துக்களை மற்றவர்களுடன் பகிர்ந்துகொள்ள விரும்புகிறேன்',
	'articlefeedback-survey-answer-whyrated-other' => 'மற்றவை',
	'articlefeedback-survey-question-useful-iffalse' => 'ஏன் ?',
	'articlefeedback-survey-question-comments' => 'தாங்கள் மேலும் அதிகமான கருத்துக்களை கூற விரும்புகிறீர்களா ?',
	'articlefeedback-survey-submit' => 'சமர்ப்பி',
	'articlefeedback-survey-title' => 'தயவு செய்து ஒரு சில கேள்விகளுக்கு பதில் அளியுங்கள்',
	'articlefeedback-survey-thanks' => 'ஆய்வுக்கான படிவத்தை பூர்த்தி செய்தமைக்கு நன்றி.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'articlefeedback' => 'వ్యాసపు మూల్యాంకన',
	'articlefeedback-survey-question-whyrated' => 'ఈ పుటని ఈరోజు మీరు ఎందుకు మూల్యాంకన చేసారో మాకు దయచేసి తెలియజేయండి (వర్తించే వాటినన్నీ ఎంచుకోండి):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'నేను ఈ పుట యొక్క స్థూల మూల్యాంకనకి తోడ్పాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-development' => 'నా మూల్యాంకన ఈ పుట యొక్క అభివృద్ధికి సానుకూలంగా ప్రభావితం చేస్తుందని ఆశిస్తున్నాను',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'నేను {{SITENAME}}కి తోడ్పడాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'నా అభిప్రాయాన్ని పంచుకోవడం నాకిష్టం',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'నేను ఈ రోజు మాల్యాంకన చేయలేదు, కానీ ఈ సౌలభ్యంపై నా ప్రతిస్పందనని తెలియజేయాలనుకున్నాను',
	'articlefeedback-survey-answer-whyrated-other' => 'ఇతర',
	'articlefeedback-survey-question-useful' => 'ఈ మూల్యాంకనలు ఉపయోగకరంగా మరియు స్పష్టంగా ఉన్నాయని మీరు నమ్ముతున్నారా?',
	'articlefeedback-survey-question-useful-iffalse' => 'ఎందుకు?',
	'articlefeedback-survey-question-comments' => 'అదనపు వ్యాఖ్యలు ఏమైనా ఉన్నాయా?',
	'articlefeedback-survey-submit' => 'దాఖలుచెయ్యి',
	'articlefeedback-survey-title' => 'దయచేసి కొన్ని ప్రశ్నలకి సమాధానమివ్వండి',
	'articlefeedback-survey-thanks' => 'ఈ సర్వేని పూరించినందుకు కృతజ్ఞతలు.',
	'articlefeedback-report-panel-title' => 'పుట మూల్యాంకన',
	'articlefeedback-report-ratings' => '$1 మూల్యాంకనలు',
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'articlefeedback' => 'Makala berlen baha',
	'articlefeedback-desc' => 'Makala berlen baha (synag warianty)',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Men sahypanyň umumy derejesine goşant goşmak isledim.',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '{{SITENAME}} saýtyna goşant goşmak isledim.',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Öz pikirimi paýlaşmagy halaýaryn.',
	'articlefeedback-survey-answer-whyrated-other' => 'Başga',
	'articlefeedback-survey-question-useful' => 'Berlen derejeleriň peýdalydygyna we düşnüklidigine ynanýarsyňyzmy?',
	'articlefeedback-survey-question-useful-iffalse' => 'Näme üçin?',
	'articlefeedback-survey-question-comments' => 'Goşmaça bellikleriňiz barmy?',
	'articlefeedback-survey-submit' => 'Tabşyr',
	'articlefeedback-survey-title' => 'Käbir soraglara jogap beriň',
	'articlefeedback-survey-thanks' => 'Soragnamany dolduranyňyz üçin sag boluň.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'articlefeedback' => 'Pagsusuri ng lathalain',
	'articlefeedback-desc' => 'Pagsusuri ng lathalain (paunang bersyon)',
	'articlefeedback-survey-question-whyrated' => 'Mangyari sabihin sa amin kung bakit mo inantasan ng ganito ang pahinang ito ngayon (lagyan ng tsek ang lahat ng maaari):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Nais kong umambag sa pangkalahatang kaantasan ng pahina',
	'articlefeedback-survey-answer-whyrated-development' => 'Umaasa ako na ang aking pag-aantas ay positibong makakaapekto sa pagpapaunlad ng pahina',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Nais kong makapag-ambag sa {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Nais ko ang pagpapamahagi ng aking opinyon',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Hindi ako nagbigay ng pag-aantas ngayon, subalit nais kong magbigay ng puna sa hinaharap',
	'articlefeedback-survey-answer-whyrated-other' => 'Iba pa',
	'articlefeedback-survey-question-useful' => 'Naniniwala ka ba na ang mga pag-aantas na ibinigay ay magagamit at malinaw?',
	'articlefeedback-survey-question-useful-iffalse' => 'Bakit?',
	'articlefeedback-survey-question-comments' => 'Mayroon ka pa bang karagdagang mga puna?',
	'articlefeedback-survey-submit' => 'Ipasa',
	'articlefeedback-survey-title' => 'Pakisagot ang ilang mga katanungan',
	'articlefeedback-survey-thanks' => 'Salamat sa pagsagot sa mga pagtatanong.',
);

/** Turkish (Türkçe)
 * @author 82-145
 * @author CnkALTDS
 * @author Emperyan
 * @author Joseph
 * @author Karduelis
 */
$messages['tr'] = array(
	'articlefeedback' => 'Madde değerlendirmesi',
	'articlefeedback-desc' => 'Madde Geridönütleri',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Fikirlerimi paylaşmayı seviyorum',
	'articlefeedback-survey-answer-whyrated-other' => 'Diğer',
	'articlefeedback-survey-question-useful-iffalse' => 'Neden?',
	'articlefeedback-survey-submit' => 'Gönder',
	'articlefeedback-survey-title' => 'Lütfen birkaç soruya yanıt verin',
	'articlefeedback-survey-thanks' => 'Anketi doldurduğunuz için teşekkür ederiz.',
	'articlefeedback-pitch-or' => 'veya',
	'articlefeedback-pitch-join-accept' => 'Yeni hesap edin',
	'articlefeedback-pitch-join-login' => 'Oturum aç',
	'articlefeedback-survey-message-success' => 'Anketi doldurduğunuz için teşekkür ederiz.',
);

/** Ukrainian (Українська)
 * @author Arturyatsko
 * @author Тест
 */
$messages['uk'] = array(
	'articlefeedback' => 'Оцінка статті',
	'articlefeedback-desc' => 'Оцінка статті (експериментальний варіант)',
	'articlefeedback-survey-question-whyrated' => 'Будь ласка, розкажіть нам, чому Ви оцінили цю сторінку сьогодні (позначте все, що відповідає):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Я хотів внести свій внесок у загальний рейтинг сторінки',
	'articlefeedback-survey-answer-whyrated-development' => 'Я сподіваюся, що мій рейтинг буде позитивно впливати на розвиток сторінки',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Я хотів внести свій внесок у {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Мені подобається ділитися своєю думкою',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Я не оцінив сторінку сьогодні, але хочу залишити відгук про цю функцію',
	'articlefeedback-survey-answer-whyrated-other' => 'Інше',
	'articlefeedback-survey-question-useful' => 'Чи вважаєте Ви поставлені оцінки корисними та зрозумілими?',
	'articlefeedback-survey-question-useful-iffalse' => 'Чому?',
	'articlefeedback-survey-question-comments' => 'Чи є у Вас якісь додаткові коментарі?',
	'articlefeedback-survey-submit' => 'Відправити',
	'articlefeedback-survey-title' => 'Будь ласка, дайте відповідь на кілька питань',
	'articlefeedback-survey-thanks' => 'Дякуємо за заповнення опитування.',
	'articlefeedback-error' => 'Сталася помилка. Будь ласка, повторіть спробу пізніше.',
	'articlefeedback-report-switch-label' => 'Показати оцінки сторінки',
	'articlefeedback-pitch-or' => 'або',
	'articlefeedback-pitch-join-accept' => 'Створити обліковий запис',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'articlefeedback' => 'Valutassion pagina',
	'articlefeedback-desc' => 'Valutassion pagina (version de prova)',
	'articlefeedback-survey-question-whyrated' => 'Dine el motivo par cui te ghè valutà sta pagina (te poli selessionar più opzioni):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Voléa contribuir a la valutassion conplessiva de la pagina',
	'articlefeedback-survey-answer-whyrated-development' => "Spero che el me giudissio l'influensa positivamente el svilupo de sta pagina",
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Go vossù contribuire a {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Me piase condivìdar la me opinion',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'No go dato valutassion uncuò, ma go volù lassar un comento su la funsionalità',
	'articlefeedback-survey-answer-whyrated-other' => 'Altro',
	'articlefeedback-survey-question-useful' => 'Pensito che le valutassion fornìe le sia utili e ciare?',
	'articlefeedback-survey-question-useful-iffalse' => 'Parché?',
	'articlefeedback-survey-question-comments' => 'Gheto altre robe da dir?',
	'articlefeedback-survey-submit' => 'Manda',
	'articlefeedback-survey-title' => 'Par piaser, rispondi a qualche domanda',
	'articlefeedback-survey-thanks' => 'Grassie de aver conpilà el questionario.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'articlefeedback' => 'Đánh giá bài',
	'articlefeedback-desc' => 'Đánh giá bài (phiên bản thử nghiệm)',
	'articlefeedback-survey-question-whyrated' => 'Xin hãy cho chúng tôi biết lý do tại sao bạn đánh giá trang này hôm nay (kiểm tra các hộp thích hợp):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => 'Tôi muốn có ảnh hưởng đến đánh giá tổng cộng của trang',
	'articlefeedback-survey-answer-whyrated-development' => 'Tôi hy vọng rằng đánh giá của tôi sẽ có ảnh hưởng tích cực đến sự phát triển của trang',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => 'Tôi muốn đóng góp vào {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => 'Tôi thích đưa ý kiến của tôi',
	'articlefeedback-survey-answer-whyrated-didntrate' => 'Tôi không đánh giá hôm nay, nhưng vẫn muốn phản hồi về tính năng',
	'articlefeedback-survey-answer-whyrated-other' => 'Khác',
	'articlefeedback-survey-question-useful' => 'Bạn có tin rằng các đánh giá được cung cấp là hữu ích và dễ hiểu?',
	'articlefeedback-survey-question-useful-iffalse' => 'Tạo sao?',
	'articlefeedback-survey-question-comments' => 'Bạn có ý kiến bổ sung?',
	'articlefeedback-survey-submit' => 'Gửi',
	'articlefeedback-survey-title' => 'Xin vui lòng trả lời một số câu hỏi',
	'articlefeedback-survey-thanks' => 'Cám ơn bạn đã điền khảo sát.',
	'articlefeedback-error' => 'Đã gặp lỗi. Xin vui lòng thử lại sau.',
	'articlefeedback-form-switch-label' => 'Đánh giá trang này',
	'articlefeedback-form-panel-title' => 'Đánh giá trang này',
	'articlefeedback-form-panel-instructions' => 'Xin hãy dành một chút thì giờ để đánh giá trang này.',
	'articlefeedback-form-panel-clear' => 'Hủy đánh giá này',
	'articlefeedback-form-panel-expertise' => 'Tôi đã có kiến thức về đề tài này',
	'articlefeedback-form-panel-expertise-studies' => 'Tôi đã học về nó tại trường cao đẳng / đại học',
	'articlefeedback-form-panel-expertise-profession' => 'Nó thuộc về nghề nghiệp của tôi',
	'articlefeedback-form-panel-expertise-hobby' => 'Nó có liên quan đến sở thích của tôi',
	'articlefeedback-form-panel-expertise-other' => 'Tôi hiểu về đề tài này vì lý do khác',
	'articlefeedback-form-panel-submit' => 'Gửi phản hồi',
	'articlefeedback-report-switch-label' => 'Xem các đánh giá của trang',
	'articlefeedback-report-panel-title' => 'Đánh giá của trang',
	'articlefeedback-report-panel-description' => 'Đánh giá trung bình hiện tại',
	'articlefeedback-report-empty' => 'Không có đánh giá',
	'articlefeedback-report-ratings' => '$1 đánh giá',
	'articlefeedback-field-trustworthy-label' => 'Đáng tin',
	'articlefeedback-field-trustworthy-tip' => 'Bạn có cảm thấy rằng bày này chú thích nguồn gốc đầy đủ và đáng tin các nguồn?',
	'articlefeedback-field-complete-label' => 'Đầy đủ',
	'articlefeedback-field-complete-tip' => 'Bạn có cảm thấy rằng bài này bao gồm các đề tài cần thiết?',
	'articlefeedback-field-objective-label' => 'Trung lập',
	'articlefeedback-field-objective-tip' => 'Bạn có cảm thấy rằng bài này đại diện công bằng cho tất cả các quan điểm về các vấn đề?',
	'articlefeedback-field-wellwritten-label' => 'Viết hay',
	'articlefeedback-field-wellwritten-tip' => 'Bạn có cảm thấy rằng bài này được sắp xếp đàng hoàng có văn bản hay?',
	'articlefeedback-pitch-reject' => 'Không bây giờ',
	'articlefeedback-pitch-or' => 'hoặc',
	'articlefeedback-pitch-thanks' => 'Cám ơn! Đánh giá của bạn đã được lưu.',
	'articlefeedback-pitch-survey-message' => 'Hãy dành một chút thời gian để phản hồi một cuộc khảo sát ngắn.',
	'articlefeedback-pitch-survey-accept' => 'Bắt đầu trả lời',
	'articlefeedback-pitch-join-message' => 'Bạn có biết rằng bạn có thể mở tài khoản tại đây? Một tài khoản sẽ giúp bạn theo dõi các trang mà bạn sửa đổi và tham gia các cuộc thảo luận và hoạt động của cộng đồng.',
	'articlefeedback-pitch-join-accept' => 'Mở tài khoản',
	'articlefeedback-pitch-join-login' => 'Đăng nhập',
	'articlefeedback-pitch-edit-message' => 'Bạn có biết rằng bạn có thể sửa đổi trang này?',
	'articlefeedback-pitch-edit-accept' => 'Sửa đổi trang này',
	'articlefeedback-expert-assessment-question' => 'Bạn có hiểu biết về đề tài này?',
	'articlefeedback-expert-assessment-level-1-label' => 'Sơ sơ',
	'articlefeedback-expert-assessment-level-2-label' => 'Khá',
	'articlefeedback-expert-assessment-level-3-label' => 'Chuyên gia',
	'articlefeedback-survey-message-success' => 'Cám ơn bạn đã điền khảo sát.',
	'articlefeedback-survey-message-error' => 'Đã gặp lỗi.
Xin hãy thử lại sau.',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'articlefeedback' => '条目评级',
	'articlefeedback-desc' => '条目评级（测试版）',
	'articlefeedback-survey-question-whyrated' => '请告诉我们今天你为何评价了此页面(选择所有符合的):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '我想对网页的总体评价作贡献',
	'articlefeedback-survey-answer-whyrated-development' => '我希望我的评价能给此网页带来正面的影响',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '我想对{{SITENAME}}做出贡献',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '我愿意共享我的观点',
	'articlefeedback-survey-answer-whyrated-didntrate' => '我今天没有进行评价，但我希望对特性进行反馈。',
	'articlefeedback-survey-answer-whyrated-other' => '其他',
	'articlefeedback-survey-question-useful' => '你认为提供的评价有用并清晰吗？',
	'articlefeedback-survey-question-useful-iffalse' => '为什么？',
	'articlefeedback-survey-question-comments' => '你还有什么想说的吗？',
	'articlefeedback-survey-submit' => '提交',
	'articlefeedback-survey-title' => '请回答几个问题',
	'articlefeedback-survey-thanks' => '谢谢您回答问卷。',
	'articlefeedback-form-switch-label' => '提供意见',
	'articlefeedback-form-panel-title' => '您的意见',
	'articlefeedback-form-panel-instructions' => '请花些时间为这个条目打分',
	'articlefeedback-form-panel-submit' => '上载意见',
	'articlefeedback-field-complete-label' => '完成',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Hydra
 */
$messages['zh-hans'] = array(
	'articlefeedback' => '条目评级',
	'articlefeedback-desc' => '条目评级（测试版）',
	'articlefeedback-survey-question-whyrated' => '请告诉我们今天你为何评价了此页面(选择所有符合的):',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '我想对网页的总体评价作贡献',
	'articlefeedback-survey-answer-whyrated-development' => '我希望我的评价能给此网页带来正面的影响',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '我想对{{SITENAME}}做出贡献',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '我愿意共享我的观点',
	'articlefeedback-survey-answer-whyrated-didntrate' => '我今天没有进行评价，但我希望对特性进行反馈。',
	'articlefeedback-survey-answer-whyrated-other' => '其他',
	'articlefeedback-survey-question-useful' => '你认为提供的评价有用并清晰吗？',
	'articlefeedback-survey-question-useful-iffalse' => '为什么？',
	'articlefeedback-survey-question-comments' => '你还有什么想说的吗？',
	'articlefeedback-survey-submit' => '提交',
	'articlefeedback-survey-title' => '请回答几个问题',
	'articlefeedback-survey-thanks' => '谢谢您回答问卷。',
	'articlefeedback-error' => '发生了一个错误。请稍后重试。',
	'articlefeedback-form-switch-label' => '评论此页',
	'articlefeedback-form-panel-title' => '评论此页',
	'articlefeedback-form-panel-instructions' => '请花些时间为这个条目打分',
	'articlefeedback-form-panel-clear' => '删除此分级',
	'articlefeedback-form-panel-expertise' => '我有关于这一主题的先验知识',
	'articlefeedback-form-panel-expertise-studies' => '我有在高中/大学读过它',
	'articlefeedback-form-panel-expertise-profession' => '这我的专业的一部分',
	'articlefeedback-form-panel-expertise-hobby' => '有关我的爱好或兴趣',
	'articlefeedback-form-panel-expertise-other' => '此处未列出我的知识的来源',
	'articlefeedback-form-panel-submit' => '上载意见',
	'articlefeedback-report-switch-label' => '视图页面评级',
	'articlefeedback-report-panel-title' => '页面评级',
	'articlefeedback-report-panel-description' => '目前平均评分',
	'articlefeedback-report-empty' => '没有评级',
	'articlefeedback-report-ratings' => '$1评级',
	'articlefeedback-field-trustworthy-label' => '值得信赖',
	'articlefeedback-field-trustworthy-tip' => '你觉得这页有足够的引文和这些引文来自可信来源吗？',
	'articlefeedback-field-complete-label' => '完成',
	'articlefeedback-field-complete-tip' => '您觉得此页有包括基本主题领域吗？',
	'articlefeedback-field-objective-label' => '无偏',
	'articlefeedback-field-objective-tip' => '你觉得此页所显示的所有观点的公平表示对这一问题吗？',
	'articlefeedback-field-wellwritten-label' => '写得很好',
	'articlefeedback-field-wellwritten-tip' => '你觉得此页是完善和写得很好吗？',
	'articlefeedback-pitch-reject' => '也许以后',
	'articlefeedback-pitch-or' => '或者',
	'articlefeedback-pitch-thanks' => '谢谢！已保存您的评级。',
	'articlefeedback-pitch-survey-message' => '请花些时间完成简短的调查。',
	'articlefeedback-pitch-survey-accept' => '开始调查',
	'articlefeedback-pitch-join-message' => '您可以创建一个帐户，你知道吗？帐户将帮助您跟踪您的编辑、 获得参与的讨论，并成为社会的一部分。',
	'articlefeedback-pitch-join-accept' => '创建帐户',
	'articlefeedback-pitch-join-login' => '登录',
	'articlefeedback-pitch-edit-message' => '您知道您可以编辑此页吗？',
	'articlefeedback-pitch-edit-accept' => '编辑此页',
	'articlefeedback-expert-assessment-question' => '您有本主题知识吗？',
	'articlefeedback-expert-assessment-level-1-label' => '边际',
	'articlefeedback-expert-assessment-level-2-label' => '主管',
	'articlefeedback-expert-assessment-level-3-label' => '专家',
	'articlefeedback-survey-message-success' => '谢谢您回答问卷。',
	'articlefeedback-survey-message-error' => '出现错误。
请稍后再试。',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Hydra
 * @author Mark85296341
 */
$messages['zh-hant'] = array(
	'articlefeedback' => '條目評級',
	'articlefeedback-desc' => '條目評級',
	'articlefeedback-survey-question-whyrated' => '請讓我們知道你為什麼額定此頁今日（檢查所有適用）：',
	'articlefeedback-survey-answer-whyrated-contribute-rating' => '我想有助於提升整體的額定頁',
	'articlefeedback-survey-answer-whyrated-development' => '我希望我的評分將積極影響發展的頁面',
	'articlefeedback-survey-answer-whyrated-contribute-wiki' => '我想幫助 {{SITENAME}}',
	'articlefeedback-survey-answer-whyrated-sharing-opinion' => '我喜歡分享我的意見',
	'articlefeedback-survey-answer-whyrated-didntrate' => '我沒有提供收視率的今天，但想給的反饋功能',
	'articlefeedback-survey-answer-whyrated-other' => '其他',
	'articlefeedback-survey-question-useful' => '你相信提供的收視率是有用的，清楚了嗎？',
	'articlefeedback-survey-question-useful-iffalse' => '為什麼？',
	'articlefeedback-survey-question-comments' => '你有什麼其他意見？',
	'articlefeedback-survey-submit' => '提交',
	'articlefeedback-survey-title' => '請回答幾個問題',
	'articlefeedback-survey-thanks' => '感謝您填寫調查表。',
	'articlefeedback-error' => '發生了錯誤。請稍後再試。',
	'articlefeedback-form-switch-label' => '評價這個網頁',
	'articlefeedback-form-panel-title' => '評價這個網頁',
	'articlefeedback-form-panel-instructions' => '請花一點時間來評價這個網頁。',
	'articlefeedback-form-panel-clear' => '刪除本次評級',
	'articlefeedback-form-panel-expertise' => '我有先驗知識對這個話題',
	'articlefeedback-form-panel-expertise-studies' => '我在大學已經研究',
	'articlefeedback-form-panel-expertise-profession' => '我的專業的一部分',
	'articlefeedback-form-panel-expertise-hobby' => '這是關係到我的愛好或興趣',
	'articlefeedback-form-panel-expertise-other' => '我的知識的來源不在此列',
	'articlefeedback-form-panel-submit' => '提交反饋',
	'articlefeedback-report-switch-label' => '查看網頁評級',
	'articlefeedback-report-panel-title' => '網頁評級',
	'articlefeedback-report-panel-description' => '目前的平均收視率。',
	'articlefeedback-report-empty' => '無評分',
	'articlefeedback-report-ratings' => '$1 評級',
	'articlefeedback-field-trustworthy-label' => '可靠',
	'articlefeedback-field-trustworthy-tip' => '你覺得這個頁面已經足夠引文和這些引文來自可靠來源？',
	'articlefeedback-field-complete-label' => '完成',
);

