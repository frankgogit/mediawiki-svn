<?php
/**
 * Internationalization file for the UserGifts extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Wikia, Inc.
 * @author Purodha
 */
$messages['en'] = array(
	'giftmanager' => 'Gifts manager',
	'giftmanager-addgift' => '+ Add new gift',
	'giftmanager-access' => 'gift access',
	'giftmanager-description' => 'gift description',
	'giftmanager-giftimage' => 'gift image',
	'giftmanager-image' => 'add/replace image',
	'giftmanager-giftcreated' => 'The gift has been created',
	'giftmanager-giftsaved' => 'The gift has been saved',
	'giftmanager-public' => 'public',
	'giftmanager-private' => 'private',
	'giftmanager-view' => 'View gift list',
	'g-add-message' => 'Add a message',
	'g-back-edit-gift' => 'Back to edit this gift',
	'g-back-gift-list' => 'Back to gift list',
	'g-back-link' => '< Back to $1\'s page',
	'g-choose-file' => 'Choose file:',
	'g-cancel' => 'Cancel',
	'g-count' => '$1 has $2 {{PLURAL:$2|gift|gifts}}.',
	'g-create-gift' => 'Create gift',
	'g-created-by' => 'created by', # this message supports {{GENDER}}
	'g-current-image' => 'Current image',
	'g-delete-message' => 'Are you sure you want to delete the gift "$1"?
This will also delete it from users who may have received it.',
	'g-description-title' => '$1\'s gift "$2"', # This message supports {{GENDER}}
	'g-error-do-not-own' => 'You do not own this gift.',
	'g-error-message-blocked' => 'You are currently blocked and cannot give gifts',
	'g-error-message-invalid-link' => 'The link you have entered is invalid.',
	'g-error-message-login' => 'You must log-in to give gifts',
	'g-error-message-no-user' => 'The user you are trying to view does not exist.',
	'g-error-message-to-yourself' => 'You cannot give a gift to yourself.',
	'g-error-title' => 'Woops, you took a wrong turn!',
	'g-file-instructions' => 'Your image must be a jpeg, png or gif (no animated gifs), and must be less than 100kb in size.',
	'g-from' => 'from <a href="$1">$2</a>',
	'g-gift' => 'gift',
	'g-gift-name' => 'gift name',
	'g-give-gift' => 'Give gift',
	'g-give-all' => 'Want to give $1 a gift?
Just click one of the gifts below and click "Send gift".
It is that easy.',
	'g-give-all-message-title' => 'Add a message',
	'g-give-all-title' => 'Give a gift to $1',
	'g-give-enter-friend-title' => 'If you know the name of the user, type it in below',
	'g-given' => 'This gift has been given out $1 {{PLURAL:$1|time|times}}',
	'g-give-list-friends-title' => 'Select from your list of friends',
	'g-give-list-select' => 'select a friend',
	'g-give-separator' => 'or',
	'g-give-no-user-message' => 'Gifts and awards are a great way to acknowledge your friends!',
	'g-give-no-user-title' => 'Who would you like to give a gift to?',
	'g-give-to-user-title' => 'Send the gift "$1" to $2',
	'g-give-to-user-message' => 'Want to give $1 a <a href="$2">different gift</a>?',
	'g-go-back' => 'Go back',
	'g-imagesbelow' => 'Below are your images that will be used on the site',
	'g-large' => 'Large',
	'g-list-title' => '$1\'s gift list',
	'g-main-page' => 'Main page',
	'g-medium' => 'Medium',
	'g-mediumlarge' => 'Medium-large',
	'g-new' => 'new',
	'g-next' => 'Next',
	'g-previous' => 'Prev',
	'g-remove' => 'Remove',
	'g-remove-gift' => 'Remove this gift',
	'g-remove-message' => 'Are you sure you want to remove the gift "$1"?',
	'g-recent-recipients' => 'Other recent recipients of this gift',
	'g-remove-success-title' => 'You have successfully removed the gift "$1"',
	'g-remove-success-message' => 'The gift "$1" has been removed.',
	'g-remove-title' => 'Remove "$1"?',
	'g-send-gift' => 'Send gift',
	'g-select-a-friend' => 'select a friend',
	'g-sent-title' => 'You have sent a gift to $1',
	'g-sent-message' => 'You have sent the following gift to $1.',
	'g-small' => 'Small',
	'g-to-another' => 'Give to someone else',
	'g-uploadsuccess' => 'Upload successful',
	'g-viewgiftlist' => 'View gift list',
	'g-your-profile' => 'Your profile',
	'gift_received_subject' => '$1 has sent you the $2 gift on {{SITENAME}}!',
	'gift_received_body' => 'Hi $1.

$2 just sent you the $3 gift on {{SITENAME}}.

Want to read the note $2 left you and see your gift?   Click the link below:

$4

We hope you like it!

Thanks,


The {{SITENAME}} team

---

Hey, want to stop getting emails from us?

Click $5
and change your settings to disable email notifications.',
	// For Special:ListGroupRights
	'right-giftadmin' => 'Create new and edit existing gifts',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Purodha
 * @author Siebrand
 */
$messages['qqq'] = array(
	'giftmanager-private' => '{{Identical|Private}}',
	'g-cancel' => '{{Identical|Cancel}}',
	'g-count' => "* '''$1''' is a user name
* '''$2''' is his or her count of gifts",
	'g-created-by' => 'Complete contents of a cell in a table. The next cell (horizontally) contains the user name of the creator of a gift. {{gender}}
* (optional) $1 is a user name that is used in the next cell',
	'g-description-title' => '{{gender}}
* $1 is a user name
* $2 is the name of a gift',
	'g-large' => '{{Identical|Large}}',
	'g-main-page' => '{{Identical|Main page}}',
	'g-medium' => '{{Identical|Medium}}',
	'g-new' => '{{Identical|New}}',
	'g-next' => '{{Identical|Next}}',
	'g-previous' => '{{Identical|Prev}}',
	'g-small' => '{{Identical|Small}}',
	'gift_received_body' => "* $1 is a the (real) user name
* $2 is the giving user's name
* $3 is the gift name
* $4 is a link to the given gift
* $5 is a link to the user preferences",
);

/** Arabic (العربية)
 * @author Ciphers
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'giftmanager' => 'مدير الهدايا',
	'giftmanager-addgift' => '+ إضافة هدية جديدة',
	'giftmanager-access' => 'وصول الهدية',
	'giftmanager-description' => 'وصف الهدية',
	'giftmanager-giftimage' => 'صورة الهدية',
	'giftmanager-image' => 'أضف/استبدل الصورة',
	'giftmanager-giftcreated' => 'الهدية تم إنشاؤها',
	'giftmanager-giftsaved' => 'الهدية تم حفظها',
	'giftmanager-public' => 'علني',
	'giftmanager-private' => 'خاص',
	'giftmanager-view' => 'عرض قائمة الهدايا',
	'g-add-message' => 'أضف رسالة',
	'g-back-edit-gift' => 'رجوع لتعديل هذه الهدية',
	'g-back-gift-list' => 'رجوع لقائمة الهدايا',
	'g-back-link' => '< رجوع إلى صفحة $1',
	'g-choose-file' => 'اختر الملف:',
	'g-cancel' => 'إلغاء',
	'g-count' => 'لدى $1 {{PLURAL:$2||هدية واحدة|هديتان|$2 هدايا|$2 هدية}}.',
	'g-create-gift' => 'إنشاء الهدية',
	'g-created-by' => 'تم إنشاؤها بواسطة',
	'g-current-image' => 'الصورة الحالية',
	'g-delete-message' => 'هل أنت متأكد أنك تريد حذف الهدية "$1"؟ هذا سيحذفها أيضا من المستخدمين الذين ربما كانوا قد تلقوها.',
	'g-description-title' => 'الهدية "$2" الخاصة ب$1',
	'g-error-do-not-own' => 'أنت لا تمتلك هذه الهدية.',
	'g-error-message-blocked' => 'أنت حاليا ممنوع ولا يمكنك إعطاء هدايا',
	'g-error-message-invalid-link' => 'الوصلة التي أدخلتها غير صحيحة.',
	'g-error-message-login' => 'يجب عليك تسجيل الدخول لإعطاء هدايا',
	'g-error-message-no-user' => 'المستخدم الذي تحاول رؤيته غير موجود.',
	'g-error-message-to-yourself' => 'أنت لا يمكنك منح هدية لنفسك.',
	'g-error-title' => 'آه، أنت أخذت منحنى خاطئا!',
	'g-file-instructions' => 'صورتك يجب أن تكون jpeg، png أو gif (لا gif فيديو)، ويجب أن تكون أقل من 100 كيلوبت في الحجم.',
	'g-from' => 'من <a href="$1">$2</a>',
	'g-gift' => 'هدية',
	'g-gift-name' => 'اسم الهدية',
	'g-give-gift' => 'منح هدية',
	'g-give-all' => 'تريد إعطاء $1 هدية؟ فقط اضغط على واحد من الهدايا بالأسفل واضغط "إرسال الهدية." الموضوع بهذه السهولة.',
	'g-give-all-message-title' => 'إضافة رسالة',
	'g-give-all-title' => 'إعطاء هدية إلى $1',
	'g-give-enter-friend-title' => 'لو كنت تعرف اسم المستخدم، اكتبه بالأسفل',
	'g-given' => 'هذه الهدية تم إعطاؤها $1 {{PLURAL:$1|مرة|مرة}}',
	'g-give-list-friends-title' => 'اختر من قائمة أصدقائك',
	'g-give-list-select' => 'اختر صديقا',
	'g-give-separator' => 'أو',
	'g-give-no-user-message' => 'الهدايا والجوائز طريقة عظيمة لمعرفة أصدقائك!',
	'g-give-no-user-title' => 'من تريد إعطاء هدية له؟',
	'g-give-to-user-title' => 'أرسل الهدية "$1" إلى $2',
	'g-give-to-user-message' => 'تريد إعطاء $1 a <a href="$2">هدية مختلفة</a>؟',
	'g-go-back' => 'رجوع',
	'g-imagesbelow' => 'بالأسفل صورك التي سيتم استخدامها في الموقع',
	'g-large' => 'كبير',
	'g-list-title' => 'قائمة الهدايا الخاصة ب$1',
	'g-main-page' => 'الصفحة الرئيسية',
	'g-medium' => 'متوسط',
	'g-mediumlarge' => 'كبير-متوسط',
	'g-new' => 'جديد',
	'g-next' => 'تالي',
	'g-previous' => 'سابق',
	'g-remove' => 'إزالة',
	'g-remove-gift' => 'إزالة هذه الهدية',
	'g-remove-message' => 'هل أنت متأكد أنك تريد إزالة الهدية "$1"؟',
	'g-recent-recipients' => 'المتلقون الجدد الآخرون لهذه الهدية',
	'g-remove-success-title' => 'أنت أزلت بنجاح الهدية "$1"',
	'g-remove-success-message' => 'الهدية "$1" تمت إزالتها.',
	'g-remove-title' => 'إزالة "$1"؟',
	'g-send-gift' => 'إرسال الهدية',
	'g-select-a-friend' => 'اختر صديقا',
	'g-sent-title' => 'أنت أرسلت هدية إلى $1',
	'g-sent-message' => 'أنت أرسلت الهدية التالية إلى $1.',
	'g-small' => 'صغير',
	'g-to-another' => 'منح إلى شخص آخر',
	'g-uploadsuccess' => 'الرفع نجح',
	'g-viewgiftlist' => 'عرض قائمة الهدايا',
	'g-your-profile' => 'ملفك',
	'gift_received_subject' => '$1 أرسل لك الهدية $2 في {{SITENAME}}!',
	'gift_received_body' => 'مرحبا $1:

$2 أرسل حالا لك الهدية $3 في {{SITENAME}}.

تريد قراءة الملاحظة التي تركها $2 لك ورؤية هديتك؟  اضغط على الوصلة بالأسفل:

$4

نأمل أن تعجبك!

شكرا،


فريق {{SITENAME}}

---

ها، تريد التوقف عن تلقي رسائل بريد إلكتروني منا؟

اضغط $5
وغير إعداداتك لتعطيل إخطارات البريد الإلكتروني.',
	'right-giftadmin' => 'إنشاء هدايا جديدة وتعديل الموجودة',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'g-main-page' => 'ܦܐܬܐ ܪܫܝܬܐ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'giftmanager' => 'مدير الهدايا',
	'giftmanager-addgift' => '+ إضافة هدية جديدة',
	'giftmanager-access' => 'وصول الهدية',
	'giftmanager-description' => 'وصف الهدية',
	'giftmanager-giftimage' => 'صورة الهدية',
	'giftmanager-image' => 'أضف/استبدل الصورة',
	'giftmanager-giftcreated' => 'الهدية تم إنشاؤها',
	'giftmanager-giftsaved' => 'الهدية تم حفظها',
	'giftmanager-public' => 'علنى',
	'giftmanager-private' => 'خاص',
	'giftmanager-view' => 'عرض قائمة الهدايا',
	'g-add-message' => 'ضيف رساله',
	'g-back-edit-gift' => 'رجوع لتعديل هذه الهدية',
	'g-back-gift-list' => 'رجوع لقائمة الهدايا',
	'g-back-link' => '< رجوع إلى صفحة $1',
	'g-choose-file' => 'اختر الملف:',
	'g-cancel' => 'إلغاء',
	'g-count' => '$1 يمتلك $2 {{PLURAL:$2|هدية|هدية}}.',
	'g-create-gift' => 'إنشاء الهدية',
	'g-created-by' => 'تم إنشاؤها بواسطة',
	'g-current-image' => 'الصورة الحالية',
	'g-delete-message' => 'هل أنت متأكد أنك تريد حذف الهدية "$1"؟ هذا سيحذفها أيضا من المستخدمين الذين ربما كانوا قد تلقوها.',
	'g-description-title' => 'الهدية "$2" الخاصة ب$1',
	'g-error-do-not-own' => 'أنت لا تمتلك هذه الهدية.',
	'g-error-message-blocked' => 'أنت حاليا ممنوع ولا يمكنك إعطاء هدايا',
	'g-error-message-invalid-link' => 'الوصلة التى أدخلتها غير صحيحة.',
	'g-error-message-login' => 'يجب عليك تسجيل الدخول لإعطاء هدايا',
	'g-error-message-no-user' => 'المستخدم الذى تحاول رؤيته غير موجود.',
	'g-error-message-to-yourself' => 'أنت لا يمكنك منح هدية لنفسك.',
	'g-error-title' => 'آه، أنت أخذت منحنى خاطئا!',
	'g-file-instructions' => 'صورتك يجب أن تكون jpeg، png أو gif (لا gif فيديو)، ويجب أن تكون أقل من 100 كيلوبت فى الحجم.',
	'g-from' => 'من <a href="$1">$2</a>',
	'g-gift' => 'هدية',
	'g-gift-name' => 'اسم الهدية',
	'g-give-gift' => 'منح هدية',
	'g-give-all' => 'تريد إعطاء $1 هدية؟ فقط اضغط على واحد من الهدايا بالأسفل واضغط "إرسال الهدية." الموضوع بهذه السهولة.',
	'g-give-all-message-title' => 'إضافة رسالة',
	'g-give-all-title' => 'إعطاء هدية إلى $1',
	'g-give-enter-friend-title' => 'لو كنت تعرف اسم المستخدم، اكتبه بالأسفل',
	'g-given' => 'هذه الهدية تم إعطاؤها $1 {{PLURAL:$1|مرة|مرة}}',
	'g-give-list-friends-title' => 'اختر من قائمة أصدقائك',
	'g-give-list-select' => 'اختر صديقا',
	'g-give-separator' => 'أو',
	'g-give-no-user-message' => 'الهدايا والجوائز طريقة عظيمة لمعرفة أصدقائك!',
	'g-give-no-user-title' => 'من تريد إعطاء هدية له؟',
	'g-give-to-user-title' => 'أرسل الهدية "$1" إلى $2',
	'g-give-to-user-message' => 'تريد إعطاء $1 a <a href="$2">هدية مختلفة</a>؟',
	'g-go-back' => 'رجوع',
	'g-imagesbelow' => 'بالأسفل صورك التى سيتم استخدامها فى الموقع',
	'g-large' => 'كبير',
	'g-list-title' => 'قائمة الهدايا الخاصة ب$1',
	'g-main-page' => 'الصفحة الرئيسية',
	'g-medium' => 'متوسط',
	'g-mediumlarge' => 'كبير-متوسط',
	'g-new' => 'جديد',
	'g-next' => 'تالى',
	'g-previous' => 'سابق',
	'g-remove' => 'إزالة',
	'g-remove-gift' => 'إزالة هذه الهدية',
	'g-remove-message' => 'هل أنت متأكد أنك تريد إزالة الهدية "$1"؟',
	'g-recent-recipients' => 'المتلقون الجدد الآخرون لهذه الهدية',
	'g-remove-success-title' => 'أنت أزلت بنجاح الهدية "$1"',
	'g-remove-success-message' => 'الهدية "$1" تمت إزالتها.',
	'g-remove-title' => 'إزالة "$1"؟',
	'g-send-gift' => 'إرسال الهدية',
	'g-select-a-friend' => 'اختر صديقا',
	'g-sent-title' => 'أنت أرسلت هدية إلى $1',
	'g-sent-message' => 'أنت أرسلت الهدية التالية إلى $1.',
	'g-small' => 'صغير',
	'g-to-another' => 'منح إلى شخص آخر',
	'g-uploadsuccess' => 'الرفع نجح',
	'g-viewgiftlist' => 'عرض قائمة الهدايا',
	'g-your-profile' => 'ملفك',
	'gift_received_subject' => '$1 أرسل لك الهدية $2 فى {{SITENAME}}!',
	'gift_received_body' => 'مرحبا $1:

$2 أرسل حالا لك الهدية $3 فى {{SITENAME}}.

تريد قراءة الملاحظة التى تركها $2 لك ورؤية هديتك؟  اضغط على الوصلة بالأسفل:

$4

نأمل أن تعجبك!

شكرا،


فريق {{SITENAME}}

---

ها، تريد التوقف عن تلقى رسائل بريد إلكترونى منا؟

اضغط $5
وغير إعداداتك لتعطيل إخطارات البريد الإلكترونى.',
	'right-giftadmin' => 'إنشاء هدايا جديدة وتعديل الموجودة',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'giftmanager' => 'Кіраваньне падарункамі',
	'giftmanager-addgift' => '+ Дадаць новы падарунак',
	'giftmanager-access' => 'доступ да падарунка',
	'giftmanager-description' => 'апісаньне падарунка',
	'giftmanager-giftimage' => 'выява падарунка',
	'giftmanager-image' => 'дадаць/замяніць выяву',
	'giftmanager-giftcreated' => 'Падарунак быў створаны',
	'giftmanager-giftsaved' => 'Падарунак быў захаваны',
	'giftmanager-public' => 'публічны',
	'giftmanager-private' => 'прыватны',
	'giftmanager-view' => 'Паказаць сьпіс падарункаў',
	'g-add-message' => 'Дадаць паведамленьне',
	'g-back-edit-gift' => 'Вярнуцца да рэдагаваньня гэтага падарунка',
	'g-back-gift-list' => 'Вярнуцца да сьпісу падарункаў',
	'g-back-link' => '< Вярнуцца на старонку $1',
	'g-choose-file' => 'Выбраць файл:',
	'g-cancel' => 'Адмяніць',
	'g-count' => '$1 мае $2 {{PLURAL:$2|падарунак|падарункі|падарункаў}}.',
	'g-create-gift' => 'Стварыць падарунак',
	'g-created-by' => 'створаны',
	'g-current-image' => 'Цяперашняя выява',
	'g-delete-message' => 'Вы ўпэўненыя, што жадаеце выдаліць падарунак «$1»? Ён будзе выдалены і ва ўдзельнікаў, якія маглі яго атрымаць.',
	'g-description-title' => 'падарунак «$2» ад $1',
	'g-error-do-not-own' => 'Вы не валодаеце гэтым падарункам.',
	'g-error-message-blocked' => 'Цяпер Вы заблякаваныя і ня можаце дарыць падарункі',
	'g-error-message-invalid-link' => 'Вы ўвялі няслушную спасылку.',
	'g-error-message-login' => 'Вам неабходна ўвайсьці ў сыстэму, каб дарыць падарункі',
	'g-error-message-no-user' => 'Удзельніка, якога Вы спрабуеце паглядзець, не існуе.',
	'g-error-message-to-yourself' => 'Вы ня можаце дарыць падарункі сабе.',
	'g-error-title' => 'Ой! Вы выбралі няслушны кірунак!',
	'g-file-instructions' => 'Ваша выява павінна быць у фармаце jpeg, png альбо gif (анімаваныя выявы не дазволеныя) і мець памер меней за 100 кб.',
	'g-from' => 'ад <a href="$1">$2</a>',
	'g-gift' => 'падарунак',
	'g-gift-name' => 'назва падарунка',
	'g-give-gift' => 'Зрабіць падарунак',
	'g-give-all' => 'Жадаеце падарыць $1 падарунак? Проста націсьніце на падарункі, якія знаходзяцца ніжэй, я потым націсьніце «Даслаць падарунак». Гэта вельмі проста.',
	'g-give-all-message-title' => 'Дадаць паведамленьне',
	'g-give-all-title' => 'Зрабіць падарунак $1',
	'g-give-enter-friend-title' => 'Калі Вы ведаеце імя ўдзельніка, проста ўвядзіце яго ніжэй',
	'g-given' => 'Гэты падарунак быў падараваны $1 {{PLURAL:$1|раз|разы|разоў}}',
	'g-give-list-friends-title' => 'Выбраць з Вашага сьпісу сяброў',
	'g-give-list-select' => 'выбраць сябра',
	'g-give-separator' => 'ці',
	'g-give-no-user-message' => 'Падарункі і ўзнагароды — найлепшы шлях да выразу ўдзячнасьці Вашым сябрам!',
	'g-give-no-user-title' => 'Каму Вы жадаеце зрабіць падарунак?',
	'g-give-to-user-title' => 'Даслаць падарунак «$1» у адрас $2',
	'g-give-to-user-message' => 'Жадаеце падарыць $1 <a href="$2">іншы падарунак</a>?',
	'g-go-back' => 'Вярнуцца',
	'g-imagesbelow' => 'Ніжэй знаходзяцца Вашы выявы, якія будуць выкарыстоўваюцца на сайце',
	'g-large' => 'Вялікія',
	'g-list-title' => 'Сьпіс падарункаў $1',
	'g-main-page' => 'Галоўная старонка',
	'g-medium' => 'Сярэднія',
	'g-mediumlarge' => 'Сярэдне-вялікія',
	'g-new' => 'новыя',
	'g-next' => 'Наступны',
	'g-previous' => 'Папярэдні',
	'g-remove' => 'Выдаліць',
	'g-remove-gift' => 'Выдаліць гэты падарунак',
	'g-remove-message' => 'Вы ўпэўнены, што жадаеце выдаліць падарунак «$1»?',
	'g-recent-recipients' => 'Іншыя апошнія атрымальнікі гэтага падарунка',
	'g-remove-success-title' => 'Вы пасьпяхова выдалілі падарунак «$1»',
	'g-remove-success-message' => 'Падарунак «$1» быў выдалены.',
	'g-remove-title' => 'Выдаліць «$1»?',
	'g-send-gift' => 'Даслаць падарунак',
	'g-select-a-friend' => 'выбраць сябра',
	'g-sent-title' => 'Вы даслалі падарунак у адрас $1',
	'g-sent-message' => 'Вы даслалі наступныя падарункі ў адрас $1.',
	'g-small' => 'Маленькі',
	'g-to-another' => 'Падарыць каму-небудзь іншаму',
	'g-uploadsuccess' => 'Пасьпяхова загружаны',
	'g-viewgiftlist' => 'Паказаць сьпіс падарункаў',
	'g-your-profile' => 'Ваш профіль',
	'gift_received_subject' => '$1 даслаў Вам падарунак $2 у {{GRAMMAR:месны|{{SITENAME}}}}!',
	'gift_received_body' => 'Прывітаньне, $1.

$2 толькі што даслаў Вам падарунак $3 падарунак у {{GRAMMAR:месны|{{SITENAME}}}}.

Жадаеце прачытаць пажаданьні $2 далучаныя да падарунка і паглядзець сам падарунак? Націсьніце спасылку ніжэй:

$4

Мы спадзяемся, што ён Вам спадабаецца!

Дзякуй,


Каманда {{SITENAME}}

---

Вы болей не жадаеце атрымліваць лісты па электроннай пошце ад нас?

Націсьніце $5 і зьмяніце Вашыя ўстаноўкі, каб спыніць паведамленьні па электроннай пошце.',
	'right-giftadmin' => 'Стварыць новы падарунак альбо рэдагаваць існуючыя падарункі',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'giftmanager-addgift' => '+ Добавяне на нов подарък',
	'giftmanager-description' => 'описание на подаръка',
	'giftmanager-image' => 'добавяне/заменяне на картинката',
	'giftmanager-giftcreated' => 'Подаръкът беше създаден',
	'giftmanager-giftsaved' => 'Подаръкът беше съхранен',
	'giftmanager-view' => 'Преглеждане на списъка с подаръци',
	'g-add-message' => 'Добавяне на съобщение',
	'g-back-link' => '< Връщане към страницата на $1',
	'g-choose-file' => 'Избиране на файл:',
	'g-cancel' => 'Отмяна',
	'g-count' => '$1 има $2 {{PLURAL:$2|подарък|подаръка}}.',
	'g-created-by' => 'създаден от',
	'g-current-image' => 'Текуща картинка',
	'g-error-message-login' => 'За да давате подаръци е необходимо да влезете в системата',
	'g-from' => 'от <a href="$1">$2</a>',
	'g-gift' => 'подарък',
	'g-gift-name' => 'име на подаръка',
	'g-give-all-message-title' => 'Добавяне на съобщение',
	'g-give-list-select' => 'избиране на приятел',
	'g-give-separator' => 'или',
	'g-remove' => 'Премахване',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'giftmanager' => 'Upravljanje poklonima',
	'giftmanager-addgift' => '+ Dodaj novi poklon',
	'giftmanager-description' => 'opis poklona',
	'giftmanager-giftimage' => 'slika poklona',
	'giftmanager-image' => 'dodaj/zamijeni sliku',
	'giftmanager-giftcreated' => 'Poklon je napravljen',
	'giftmanager-giftsaved' => 'Poklon je sačuvan',
	'giftmanager-public' => 'javno',
	'giftmanager-private' => 'privatno',
	'giftmanager-view' => 'Pogledaj spisak poklona',
	'g-add-message' => 'Dodaj poruku',
	'g-back-edit-gift' => 'Nazad na uređivanje ovog poklona',
	'g-back-gift-list' => 'Nazad na spisak poklona',
	'g-back-link' => '< Nazad na stranicu korisnika $1',
	'g-choose-file' => 'Odaberite datoteku:',
	'g-cancel' => 'Odustani',
	'g-count' => 'Korisnik $1 ima $2 {{PLURAL:$2|poklon|poklona}}.',
	'g-create-gift' => 'Napravi poklon',
	'g-created-by' => 'napravljeno od strane',
	'g-current-image' => 'Trenutna slika',
	'g-description-title' => 'Poklon $2 korisnika $1',
	'g-error-do-not-own' => 'Vi ne posjedujete ovaj poklon.',
	'g-error-message-to-yourself' => 'Ne možete poslati poklon samom sebi.',
	'g-from' => 'iz <a href="$1">$2</a>',
	'g-gift' => 'poklon',
	'g-gift-name' => 'naziv poklona',
	'g-give-gift' => 'Pokloni poklon',
	'g-give-all-message-title' => 'Dodaj poruku',
	'g-give-all-title' => 'Pošalji poklon za $1',
	'g-give-list-select' => 'odaberi prijatelja',
	'g-give-separator' => 'ili',
	'g-go-back' => 'Idi nazad',
	'g-large' => 'Veliki',
	'g-list-title' => 'Spisak poklona korisnika $1',
	'g-main-page' => 'Početna stranica',
	'g-medium' => 'Srednje',
	'g-mediumlarge' => 'Srednje-veliki',
	'g-new' => 'novo',
	'g-next' => 'Slijedeći',
	'g-previous' => 'Preth',
	'g-remove' => 'Ukloni',
	'g-remove-gift' => 'Ukloni ovaj poklon',
	'g-remove-success-message' => 'Poklon "$1" je uklonjen.',
	'g-remove-title' => 'Ukloni "$1"?',
	'g-send-gift' => 'Pošalji poklon',
	'g-select-a-friend' => 'odaberite prijatelja',
	'g-small' => 'Malo',
	'g-uploadsuccess' => 'Postavljanje uspješno',
	'g-viewgiftlist' => 'Pogledaj spisak poklona',
	'g-your-profile' => 'Vaš profil',
	'right-giftadmin' => 'Pravljenje novih i uređivanje postojećih poklona',
);

/** Catalan (Català)
 * @author Solde
 */
$messages['ca'] = array(
	'g-gift' => 'regal',
	'g-give-list-select' => 'selecciona un amic',
	'g-give-separator' => 'o',
	'g-go-back' => 'Retorna',
	'g-main-page' => 'Pàgina principal',
	'g-medium' => 'Mitjà',
	'g-mediumlarge' => 'Mitjà-alt',
	'g-new' => 'nou',
	'g-next' => 'Següent',
	'g-previous' => 'Ant',
	'g-remove' => 'Elimina',
	'g-remove-gift' => 'Elimina aquest regal',
	'g-small' => 'Petit',
);

/** Sorani (Arabic script) (‫کوردی (عەرەبی)‬)
 * @author Marmzok
 */
$messages['ckb-arab'] = array(
	'g-go-back' => 'گەڕانەوە بۆ دواوە',
);

/** German (Deutsch)
 * @author Als-Holder
 * @author Jorges
 * @author Purodha
 * @author Umherirrender
 */
$messages['de'] = array(
	'giftmanager' => 'Geschenke-Verwaltung',
	'giftmanager-addgift' => '+ Neues Geschenk hinzufügen',
	'giftmanager-access' => 'Geschenkfortschritt',
	'giftmanager-description' => 'Geschenkbeschreibung',
	'giftmanager-giftimage' => 'Geschenkabbildung',
	'giftmanager-image' => 'Bild hinzufügen oder ersetzen',
	'giftmanager-giftcreated' => 'Das Geschenk wurde erstellt',
	'giftmanager-giftsaved' => 'Das Geschenk wurde gespeichert',
	'giftmanager-public' => 'öffentlich',
	'giftmanager-private' => 'privat',
	'giftmanager-view' => 'Geschenkeliste ansehen',
	'g-add-message' => 'Füge eine Nachricht hinzu',
	'g-back-edit-gift' => 'Zurück zur Geschenkbearbeitung',
	'g-back-gift-list' => 'Zurück zur Geschenkeliste',
	'g-back-link' => '< Zurück zum Profil von $1',
	'g-choose-file' => 'Wähle Datei:',
	'g-cancel' => 'Abbrechen',
	'g-count' => '$1 hat $2 {{PLURAL:$2|Geschenk|Geschenke}}.',
	'g-create-gift' => 'Geschenk erstellen',
	'g-created-by' => 'erstellt von',
	'g-current-image' => 'Aktuelles Bild',
	'g-delete-message' => 'Bist du dir sicher, das du das Geschenk „$1“ löschen möchest? Dies wird es auch bei Benutzern löschen, die es bereits empfangen haben.',
	'g-description-title' => 'Geschenk „$2“ von $1',
	'g-error-do-not-own' => 'Du besitzt dieses Geschenk nicht.',
	'g-error-message-blocked' => 'Du bist aktuell gesperrt und kannst keine Geschenke vergeben',
	'g-error-message-invalid-link' => 'Der eingegebende Link ist ungültig.',
	'g-error-message-login' => 'Du musst dich anmelden um Geschenke zu vergeben',
	'g-error-message-no-user' => 'Der Benutzer, den du anschauen möchtest, existiert nicht.',
	'g-error-message-to-yourself' => 'Du kannst dir selber keine Geschenke geben.',
	'g-error-title' => 'Ops, da ging etwas schief!',
	'g-file-instructions' => 'Das Bild muss ein „jpeg“, „png“, „gif“ (kein animiertes) sein, und eine Dateigröße kleiner als 100 kb haben.',
	'g-from' => 'von <a href="$1">$2</a>',
	'g-gift' => 'Geschenk',
	'g-gift-name' => 'Geschenkname',
	'g-give-gift' => 'Geschenk machen',
	'g-give-all' => 'Möchtest du $1 ein Geschenk geben? Suche eins der folgenden Geschenke aus und klicke „Geschenk senden“. Es ist ganz einfach.',
	'g-give-all-message-title' => 'Füge eine Nachricht hinzu',
	'g-give-all-title' => '$1 ein Geschenk machen',
	'g-give-enter-friend-title' => 'Falls du einen Benutzernamen weißt, trage ihn hier unten ein',
	'g-given' => 'Dieses Geschenk wurde {{PLURAL:$1|einmal|$1 mal}} ausgegeben',
	'g-give-list-friends-title' => 'Wähle aus deiner Freundesliste',
	'g-give-list-select' => 'wähle einen Freund aus',
	'g-give-separator' => 'oder',
	'g-give-no-user-message' => 'Geschenke und Auszeichnungen sind ein großartiger Weg um seine Freunde zu würdigen!',
	'g-give-no-user-title' => 'Wem möchtest du ein Geschenk geben?',
	'g-give-to-user-title' => 'Das Geschenk „$1“ an $2 geben',
	'g-give-to-user-message' => 'Möchest du $1 ein <a href="$2">anderes Geschenk geben</a>?',
	'g-go-back' => 'Gehe zurück',
	'g-imagesbelow' => 'Hier drunter folgen alle Bilder, die auf dieser Seite genutzt werden',
	'g-large' => 'Groß',
	'g-list-title' => 'Geschenkeliste von $1',
	'g-main-page' => 'Hauptseite',
	'g-medium' => 'Mittel',
	'g-mediumlarge' => 'Mittelgroß',
	'g-new' => 'neu',
	'g-next' => 'Nächste',
	'g-previous' => 'Vorherige',
	'g-remove' => 'Entfernen',
	'g-remove-gift' => 'Dieses Geschenk entfernen',
	'g-remove-message' => 'Bist du dir sicher, das Geschenk „$1“ zu entfernen?',
	'g-recent-recipients' => 'Andere aktuelle Empfänger dieses Geschenkes',
	'g-remove-success-title' => 'Du hast das Geschenk „$1“ erfolgreich entfernt.',
	'g-remove-success-message' => 'Das Geschenk „$1“ wurde entfernt.',
	'g-remove-title' => '„$1“ entfernen?',
	'g-send-gift' => 'Geschenk senden',
	'g-select-a-friend' => 'wähle einen Freund aus',
	'g-sent-title' => 'Du hast ein Geschenk an $1 gesendet',
	'g-sent-message' => 'Du hast die folgenden Geschenke an $1 gesendet.',
	'g-small' => 'Schmal',
	'g-to-another' => 'An jemand anders geben',
	'g-uploadsuccess' => 'Hochladen erfolgreich',
	'g-viewgiftlist' => 'Geschenkeliste ansehen',
	'g-your-profile' => 'Dein Profil',
	'gift_received_subject' => '$1 hat dir das $2-Geschenk auf {{SITENAME}} gesendet!',
	'gift_received_body' => 'Hallo $1,

$2 hat dir eben das $3-Geschenk auf {{SITENAME}} gesendet!

Möchtest du die Notiz von $2 lesen und dein Geschenk sehen? Klicke den folgenden Link:

$4

Wir hoffen, es gefällt dir!

Danke,

Das {{SITENAME}}-Team

---

Du möchtest keine E-Mails von uns erhalten?

Klicke $5
und ändere deine Einstellungen auf deaktivierte E-Mail-Benachrichtigung.',
	'right-giftadmin' => 'Neue erstellen und bestehende Geschenke bearbeiten',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'g-delete-message' => 'Sind Sie sich sicher, das Sie das Geschenk „$1“ löschen möchten? Dies wird es auch bei Benutzern löschen, die es bereits empfangen haben.',
	'g-error-do-not-own' => 'Sie besitzen dieses Geschenk nicht.',
	'g-error-message-blocked' => 'Sie sind aktuell gesperrt und können keine Geschenke vergeben',
	'g-error-message-login' => 'Sie müssen sich anmelden um Geschenke zu vergeben',
	'g-error-message-no-user' => 'Der Benutzer, den Sie anschauen möchten, existiert nicht.',
	'g-error-message-to-yourself' => 'Sie können sich selber keine Geschenke geben.',
	'g-give-all' => 'Möchten Sie $1 ein Geschenk geben? Suchen Sie eins der folgenden Geschenke aus und klicken Sie „Geschenk senden“. Es ist ganz einfach.',
	'g-give-enter-friend-title' => 'Falls Sie einen Benutzernamen wissen, tragen Sie ihn hier unten ein',
	'g-give-no-user-title' => 'Wem möchten Sie ein Geschenk geben?',
	'g-give-to-user-message' => 'Möchen Sie $1 ein <a href="$2">anderes Geschenk geben</a>?',
	'g-remove-message' => 'Sind Sie sich sicher, das Geschenk „$1“ zu entfernen?',
	'g-remove-success-title' => 'Sie haben das Geschenk „$1“ erfolgreich entfernt.',
	'g-sent-title' => 'Sie haben ein Geschenk an $1 gesendet',
	'g-sent-message' => 'Sie haben die folgenden Geschenke an $1 gesendet.',
	'g-your-profile' => 'Ihr Profil',
	'gift_received_subject' => '$1 hat Ihnen das $2-Geschenk auf {{SITENAME}} gesendet!',
	'gift_received_body' => 'Hallo $1,

$2 hat Ihnen eben das $3-Geschenk auf {{SITENAME}} gesendet!

Möchten Sie die Notiz von $2 lesen und Ihr Geschenk sehen? Klicken Sie den folgenden Link:

$4

Wir hoffen, es gefällt Ihnen!

Danke,

Das {{SITENAME}}-Team

---

Sie möchten keine E-Mails von uns erhalten?

Klicken Sie $5
und änderen Sie Ihre Einstellungen auf deaktivierte E-Mail-Benachrichtigung.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'giftmanager' => 'Zastojnik darow',
	'giftmanager-addgift' => '+ Nowy dar pśidaś',
	'giftmanager-access' => 'pśistup k daroju',
	'giftmanager-description' => 'wopisanje dara',
	'giftmanager-giftimage' => 'wobraz dara',
	'giftmanager-image' => 'wobraz pśidaś/wuměniś',
	'giftmanager-giftcreated' => 'Dar jo se napórał',
	'giftmanager-giftsaved' => 'Dar jo se składł',
	'giftmanager-public' => 'zjawny',
	'giftmanager-private' => 'priwatny',
	'giftmanager-view' => 'Lisćinu darow se woglědaś',
	'g-add-message' => 'Powěsć pśidaś',
	'g-back-edit-gift' => 'Slědk k wobźěłanjeju toś togo dara',
	'g-back-gift-list' => 'Slědk k lisćinje darow',
	'g-back-link' => '< Slědk k bokoju wužywarja $1',
	'g-choose-file' => 'Wubjeŕ dataju:',
	'g-cancel' => 'Pśetergnuś',
	'g-count' => '$1 ma $2 {{PLURAL:$2|dar|dara|dary|darow}}.',
	'g-create-gift' => 'Dar napóraś',
	'g-created-by' => 'napórany wót',
	'g-current-image' => 'Aktualny wobraz',
	'g-delete-message' => 'Coš dar "$1" napšawdu wulašowaś?
To wulašujo jen teke z wužywarjow, kótarež su jen dostali.',
	'g-description-title' => 'Dar "$2" wužywarja $1',
	'g-error-do-not-own' => 'Njewobsejźiš toś ten dar.',
	'g-error-message-blocked' => 'Sy tuchylu blokěrowany a njamóžoš nic dariś',
	'g-error-message-invalid-link' => 'Wótkaz, kótaryž sy zapódał, jo njepłaśiwy.',
	'g-error-message-login' => 'Musyš se pśizjawiś, aby něco darił',
	'g-error-message-no-user' => 'Wužywaŕ, kótaregož wopytujoš se woglědaś, njeeksistěrujo.',
	'g-error-message-to-yourself' => 'Njamóžoš sebje samemu nic dariś',
	'g-error-title' => 'Hopla, sy cynił něco wopaki!',
	'g-file-instructions' => 'Twój wobraz musy typ jpeg, png abo gif (žedne animěrowane gif) měś a mjeńšy ako 100 kb wjeliki byś.',
	'g-from' => 'z <a href="$1">$2</a>',
	'g-gift' => 'dar',
	'g-gift-name' => 'mě dara',
	'g-give-gift' => 'Dariś',
	'g-give-all' => 'Coš wužywarjeju $1 něco dariś?
Klikni jadnorje na jaden ze slědujucych darow a pón na "Dar pósłaś".
Jo cele lažko.',
	'g-give-all-message-title' => 'Powěsć pśidaś',
	'g-give-all-title' => 'Wužywarjeju $1 něco dariś',
	'g-give-enter-friend-title' => 'Jolic wěš mě wužywarja, zapiš jo dołojce',
	'g-given' => 'Dar jo se wudał {{PLURAL:$1|raz|dwójcy|$1 raze|$1 raz}}',
	'g-give-list-friends-title' => 'Z twójeje lisćiny pśijaśelow wubraś',
	'g-give-list-select' => 'pśijaśela wubraś',
	'g-give-separator' => 'abo',
	'g-give-no-user-message' => 'Dary a myta su wjelicny nałog twójim pśijaśelam pśipóznaśe wopokazaś!',
	'g-give-no-user-title' => 'Komu coš něco dariś?',
	'g-give-to-user-title' => 'Dar "$1" wužywarjeju $2 pósłaś',
	'g-give-to-user-message' => 'Coš wužywarjeju $1 <a href="$2">něco druge dariś</a>?',
	'g-go-back' => 'Źi slědk',
	'g-imagesbelow' => 'Dołojce slěduju wobraze, kótarež se wužywaju na toś tom sedle',
	'g-large' => 'Wjeliki',
	'g-list-title' => 'Lisćina darow wužywarja $1',
	'g-main-page' => 'Głowny bok',
	'g-medium' => 'Srědny',
	'g-mediumlarge' => 'Wósrědny',
	'g-new' => 'nowy',
	'g-next' => 'Pśiducy',
	'g-previous' => 'Pjerwjejšny',
	'g-remove' => 'Wotpóraś',
	'g-remove-gift' => 'Toś ten dar wótpóraś',
	'g-remove-message' => 'Coš dar "$1" napšawdu wótpóraś?',
	'g-recent-recipients' => 'Druge aktualne dostawarje toś togo dara',
	'g-remove-success-title' => 'Sy wuspěšnje wótpórał dar "$1"',
	'g-remove-success-message' => 'Dar "$1" jo se wótpórał.',
	'g-remove-title' => '"$1" wótpóraś?',
	'g-send-gift' => 'Dar pósłaś',
	'g-select-a-friend' => 'wubjeŕ pśijaśela',
	'g-sent-title' => 'Sy pósłał dar wužywarjeju $1',
	'g-sent-message' => 'Sy pósłał slědujucy dar wužywarjeju $1.',
	'g-small' => 'Mały',
	'g-to-another' => 'Někomu drugemu daś',
	'g-uploadsuccess' => 'Nagraśe wuspěšne',
	'g-viewgiftlist' => 'Lisćinu darow se woglědaś',
	'g-your-profile' => 'Twój profil',
	'gift_received_subject' => '$1 jo śi pósłał dar $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}}!',
	'gift_received_body' => 'Witaj $1.

$2 jo śi rowno pósłał dar $3 na {{GRAMMAR:lokatiw|{{SITENAME}}}}.

Coš powěźeńku cytaś, kótaruž $2 jo śi zawóstajił a swój dar wiźeś? Klikni na slědujucy wótkaz:

$4

Naźejamy se, až se śi spódoba!

Źěkujomy se,

team {{SITENAME}}

---

Hej, južo njocoš e-maile wót nas dostaś?

Klikni na $5
a změń swóje nastajenja, aby znjemóžnił e-mailowe zdźělenja.',
	'right-giftadmin' => 'Nowe dary napóraś a eksistěrujuce wobźěłaś',
);

/** Greek (Ελληνικά)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['el'] = array(
	'giftmanager-private' => 'ιδιωτικός',
	'g-cancel' => 'Ακύρωση',
	'g-large' => 'Μεγάλος',
	'g-medium' => 'Μέσος',
	'g-small' => 'Μικρός',
);

/** Spanish (Español)
 * @author Crazymadlover
 */
$messages['es'] = array(
	'giftmanager' => 'Administrador de regalos',
	'giftmanager-addgift' => '+ Agregar nuevo regalo',
	'giftmanager-access' => 'acceso a regalo',
	'giftmanager-description' => 'descripción de regalo',
	'giftmanager-giftimage' => 'imagen de regalo',
	'giftmanager-image' => 'agregar/reemplazar imagen',
	'giftmanager-giftcreated' => 'El regalo ha sido creado',
	'giftmanager-giftsaved' => 'El regalo ha sido grabado',
	'giftmanager-public' => 'público',
	'giftmanager-private' => 'privado',
	'giftmanager-view' => 'Ver lista de regalos',
	'g-add-message' => 'Agregar un mensaje',
	'g-back-edit-gift' => 'Regresar a editar este regalo',
	'g-back-gift-list' => 'Regresar a lista de regalos',
	'g-back-link' => '< Regresar a la página de $1',
	'g-choose-file' => 'Escoger archivo:',
	'g-cancel' => 'Cancelar',
	'g-count' => '$1 tiene $2 {{PLURAL:$2|regalo|regalos}}.',
	'g-create-gift' => 'Crear regalo',
	'g-created-by' => 'creado por',
	'g-current-image' => 'Imagen actual',
	'g-delete-message' => 'Estás seguro de desear borrar el regalo "$1"?
Esto también lo borrará de los usuarios quienes pueden haberlo recibido.',
	'g-description-title' => '"$2" Regalos de $1',
	'g-error-do-not-own' => 'No te pertenece este regalo',
	'g-error-message-blocked' => 'Estás actualmente bloqueado y no puedes dar regalos',
	'g-error-message-invalid-link' => 'El vínculo que usted han ingresado es inválido.',
	'g-error-message-login' => 'Tienes que iniciar sesión para dar regalos',
	'g-error-message-no-user' => 'El usuario que estás tratando de ver no existe.',
	'g-error-message-to-yourself' => 'No puede darse un regalo a sí mismo.',
	'g-error-title' => 'Woops, tomó un turno erróneo!',
	'g-file-instructions' => 'La imagen debe ser jpeg, png o gif (no gif animado), y debe tener menos de 100kb de tamaño.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'regalo',
	'g-gift-name' => 'nombre de regalo',
	'g-give-gift' => 'Dar regalo',
	'g-give-all' => 'Desea dar a $1 un regalo?
Solo haga click en uno de los regaLos de abajo y haga click en "enviar regalo".
Es fácil.',
	'g-give-all-message-title' => 'Agregar un mensaje',
	'g-give-all-title' => 'De un regalo a $1',
	'g-give-enter-friend-title' => 'Si usted sabe el nombre del usuario, escríbalo debajo',
	'g-given' => 'Este regalo ha sido enviado $1 {{PLURAL:$1|vez|veces}}',
	'g-give-list-friends-title' => 'Seleccione de su lista de amigos',
	'g-give-list-select' => 'seleccione un amigo',
	'g-give-separator' => 'o',
	'g-give-no-user-message' => 'Regalos y premios son una gran forma de reconocer a sus amigos!',
	'g-give-no-user-title' => 'A quién le gustaría dar un regalo?',
	'g-give-to-user-title' => 'Enviar el regalo "$1" a $2',
	'g-give-to-user-message' => 'Desea dar $1 un <a href="$2">regalo diferente</a>?',
	'g-go-back' => 'Regrese',
	'g-imagesbelow' => 'Debajo están sus imágenes que serán usadas en el sitio',
	'g-large' => 'Grande',
	'g-list-title' => 'Lista de regalos de $1',
	'g-main-page' => 'Página principal',
	'g-medium' => 'Medio',
	'g-mediumlarge' => 'Medio-grande',
	'g-new' => 'nuevo',
	'g-next' => 'Próximo',
	'g-previous' => 'Anterior',
	'g-remove' => 'Remover',
	'g-remove-gift' => 'Remover este regalo',
	'g-remove-message' => 'Está usted seguro de querer remover el regalo "$1"?',
	'g-recent-recipients' => 'Otros receptores recientes de este regalo',
	'g-remove-success-title' => 'Usted ha removido exitosamente el regalo "$1"',
	'g-remove-success-message' => 'El regalo "$1" ha sido removido.',
	'g-remove-title' => 'Remover "$1"?',
	'g-send-gift' => 'Enviar regalo',
	'g-select-a-friend' => 'seleccione un amigo',
	'g-sent-title' => 'Ha enviado un regalo a $1',
	'g-sent-message' => 'Ha enviado el siguiente regalo a $1.',
	'g-small' => 'Pequeño',
	'g-to-another' => 'Dar a alguien más',
	'g-uploadsuccess' => 'Carga exirosa',
	'g-viewgiftlist' => 'Ver lista de regalos',
	'g-your-profile' => 'Su perfil',
	'gift_received_subject' => '$1 le ha enviado el regalo $2 en {{SITENAME}}!',
	'gift_received_body' => 'Hola $1.

$2 acaba de enviarte el regalo $3 en {{SITENAME}}.

Deseas leer la nota $2 que te dejó y ver tu regalo?  Haz click en el vínculo de abajo:

$4

Esperamos que te guste!

Gracias,


El equipo {{SITENAME}}

---

Hey, Deseas no recibir más correos electrónicos de nosotros?

Haz click en $5
y cambia tus configuraciones para deshabilitar notificaciones por correo electrónico.',
	'right-giftadmin' => 'Crear nuevo y editar regalos existentes',
);

/** Estonian (Eesti)
 * @author Silvar
 */
$messages['et'] = array(
	'g-main-page' => 'Esileht',
);

/** Basque (Euskara)
 * @author Kobazulo
 */
$messages['eu'] = array(
	'giftmanager-addgift' => '+ Opari berria gehitu',
	'giftmanager-description' => 'opariaren deskribapena',
	'giftmanager-giftimage' => 'opariaren irudia',
	'giftmanager-image' => 'gehitu/ordeztu irudia',
	'giftmanager-public' => 'publikoa',
	'giftmanager-private' => 'pribatua',
	'giftmanager-view' => 'Ikusi oparien zerrenda',
	'g-add-message' => 'Mezu bat erantsi',
	'g-back-gift-list' => 'Itzuli oparien zerrendara',
	'g-back-link' => '< Itzuli $1(r)en orrialdera',
	'g-count' => '$1-(e)k {{PLURAL:$2|opari bat du|$2 opari ditu}}.',
	'g-create-gift' => 'Oparia sortu',
	'g-gift' => 'oparia',
	'g-give-gift' => 'Oparia eman',
	'g-give-list-select' => 'hautatu lagun bat',
	'g-give-separator' => 'edo',
	'g-new' => 'berria',
	'g-next' => 'Hurrengoa',
	'g-previous' => 'Aurrekoa',
	'g-remove' => 'Kendu',
	'g-remove-gift' => 'Opari hau kendu',
	'g-remove-message' => 'Ziur al zaude "$1" oparia kendu nahi duzula?',
	'g-remove-title' => '"$1" kendu?',
	'g-send-gift' => 'Oparia bidali',
	'g-select-a-friend' => 'lagun bat aukeratu',
	'g-small' => 'Txikia',
	'g-viewgiftlist' => 'Ikusi oparien zerrenda',
	'g-your-profile' => 'Zure profila',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Jack Phoenix
 */
$messages['fi'] = array(
	'giftmanager' => 'Lahjojen hallinta',
	'giftmanager-addgift' => '+ Lisää uusi lahja',
	'giftmanager-access' => 'lahjan tyyppi',
	'giftmanager-description' => 'lahjan kuvaus',
	'giftmanager-giftimage' => 'lahjan kuva',
	'giftmanager-image' => 'lisää/korvaa kuva',
	'giftmanager-giftcreated' => 'Lahja on luotu',
	'giftmanager-giftsaved' => 'Lahja on tallennettu',
	'giftmanager-public' => 'julkinen',
	'giftmanager-private' => 'yksityinen',
	'giftmanager-view' => 'Katso lahjalista',
	'g-add-message' => 'Lisää viesti',
	'g-back-edit-gift' => 'Takaisin tämän lahjan muokkaamiseen',
	'g-back-gift-list' => 'Takaisin lahjalistaan',
	'g-back-link' => '< Takaisin käyttäjän $1 sivulle',
	'g-choose-file' => 'Valitse tiedosto:',
	'g-cancel' => 'Peruuta',
	'g-count' => 'Käyttäjällä $1 on $2 {{PLURAL:$2|lahja|lahjaa}}.',
	'g-create-gift' => 'Luo lahja',
	'g-created-by' => 'luoja',
	'g-current-image' => 'Tämänhetkinen kuva',
	'g-delete-message' => 'Oletko varma, että haluat poistaa lahjan "$1"? Tämä poistaa sen myös käyttäjiltä, jotka ovat saattaneet saada sen.',
	'g-description-title' => 'Käyttäjän $1 lahja "$2"',
	'g-error-do-not-own' => 'Et omista tätä lahjaa.',
	'g-error-message-blocked' => 'Olet tällä hetkellä muokkauseston alaisena etkä voi antaa lahjoja',
	'g-error-message-invalid-link' => 'Antamasi linkki ei kelpaa.',
	'g-error-message-login' => 'Sinun tulee kirjautua sisään antaaksesi lahjoja',
	'g-error-message-no-user' => 'Käyttäjää, jota yrität katsoa, ei ole olemassa.',
	'g-error-message-to-yourself' => 'Et voi antaa lahjaa itsellesi.',
	'g-error-title' => 'Hups, astuit harhaan!',
	'g-file-instructions' => 'Kuvasi tulee olla jpeg, png tai gif-muotoinen (ei animoituja gif-kuvia) ja sen tulee olla kooltaan alle 100Kb.',
	'g-from' => 'käyttäjältä <a href="$1">$2</a>',
	'g-gift' => 'lahja',
	'g-gift-name' => 'lahjan nimi',
	'g-give-gift' => 'Anna lahja',
	'g-give-all' => 'Haluatko antaa käyttäjälle $1 lahjan? Napsauta vain yhtä lahjoista alempana ja napsauta "Lähetä lahja." Se on niin helppoa.',
	'g-give-all-message-title' => 'Lisää viesti',
	'g-give-all-title' => 'Anna lahja käyttäjälle $1',
	'g-give-enter-friend-title' => 'Jos tiedät käyttäjän nimen, kirjoita se alapuolelle',
	'g-given' => 'Tämä lahja on annettu $1 {{PLURAL:$1|kerran|kertaa}}',
	'g-give-list-friends-title' => 'Valitse ystävälistaltasi',
	'g-give-list-select' => 'valitse ystävä',
	'g-give-separator' => 'tai',
	'g-give-no-user-message' => 'Lahjat ja palkinnot ovat loistava tapa huomioida ystäviäsi!',
	'g-give-no-user-title' => 'Kenelle haluaisit antaa lahjan?',
	'g-give-to-user-title' => 'Lähetä lahja "$1" käyttäjälle $2',
	'g-give-to-user-message' => 'Haluatko antaa käyttäjälle $1 <a href="$2">erilaisen lahjan</a>?',
	'g-go-back' => 'Palaa takaisin',
	'g-imagesbelow' => 'Alapuolella ovat kuvasi, joita käytetään sivustolla',
	'g-large' => 'Suuri',
	'g-list-title' => 'Käyttäjän $1 lahjalista',
	'g-main-page' => 'Etusivu',
	'g-medium' => 'Keskikokoinen',
	'g-mediumlarge' => 'Keskikokoinen - suuri',
	'g-new' => 'uusi',
	'g-next' => 'Seuraava',
	'g-previous' => 'Edell.',
	'g-remove' => 'Poista',
	'g-remove-gift' => 'Poista tämä lahja',
	'g-remove-message' => 'Oletko varma, että haluat poistaa lahjan "$1"?',
	'g-recent-recipients' => 'Muut tämän lahjan tuoreet saajat',
	'g-remove-success-title' => 'Olet onnistuneesti poistanut lahjan "$1"',
	'g-remove-success-message' => 'Lahja ”$1” on poistettu.',
	'g-remove-title' => 'Poista "$1"?',
	'g-send-gift' => 'Lähetä lahja',
	'g-select-a-friend' => 'valitse ystävä',
	'g-sent-title' => 'Olet lähettänyt lahjan käyttäjälle $1',
	'g-sent-message' => 'Olet lähettänyt seuraavan lahjan käyttäjälle $1.',
	'g-small' => 'Pieni',
	'g-to-another' => 'Anna jollekulle muulle',
	'g-uploadsuccess' => 'Tallentaminen onnistui',
	'g-viewgiftlist' => 'Katso lahjalista',
	'g-your-profile' => 'Profiilisi',
	'gift_received_subject' => '$1 on lähettänyt sinulle $2-lahjan {{GRAMMAR:inessive|{{SITENAME}}}}!',
	'gift_received_body' => 'Hei $1:

$2 juuri lähetti sinulle $3-lahjan {{GRAMMAR:inessive|{{SITENAME}}}}.

Haluatko lukea viestin, jonka $2 jätti sinulle ja nähdä lahjasi?   Napsauta linkkiä alapuolella:

$4

Toivomme, että pidät siitä!

Kiittäen,


{{GRAMMAR:genitive|{{SITENAME}}}} tiimi

---

Hei, etkö halua enää saada sähköposteja meiltä?

Napsauta $5
ja muuta asetuksiasi poistaaksesi sähköpostitoiminnot käytöstä.',
	'right-giftadmin' => 'Luoda uusia ja muokata olemassaolevia lahjoja',
);

/** French (Français)
 * @author Crochet.david
 * @author IAlex
 * @author PieRRoMaN
 * @author Verdy p
 */
$messages['fr'] = array(
	'giftmanager' => 'Gestionnaire de cadeaux',
	'giftmanager-addgift' => '+ Ajouter un cadeau',
	'giftmanager-access' => 'accès au cadeau',
	'giftmanager-description' => 'description du cadeau',
	'giftmanager-giftimage' => 'image du cadeau',
	'giftmanager-image' => 'ajouter ou remplacer l’image',
	'giftmanager-giftcreated' => 'Le cadeau a été créé',
	'giftmanager-giftsaved' => 'Le cadeau a été sauvegardé',
	'giftmanager-public' => 'public',
	'giftmanager-private' => 'privé',
	'giftmanager-view' => 'Voir la liste des cadeaux',
	'g-add-message' => 'Ajouter un message',
	'g-back-edit-gift' => 'Revenir à la modification de ce cadeau',
	'g-back-gift-list' => 'Revenir à la liste des cadeaux',
	'g-back-link' => '< Revenir à la page de $1',
	'g-choose-file' => 'Choisir le fichier :',
	'g-cancel' => 'Annuler',
	'g-count' => '$1 a $2 cadeau{{PLURAL:$2||x}}.',
	'g-create-gift' => 'Créer un cadeau',
	'g-created-by' => 'créé par',
	'g-current-image' => 'Image actuelle',
	'g-delete-message' => 'Êtes-vous certain{{GENDER:||e|(e)}} de vouloir supprimer le cadeau « $1 » ? Ceci va également le supprimer des utilisateurs qui l’ont reçu.',
	'g-description-title' => 'Cadeau « $2 » de la part de $1',
	'g-error-do-not-own' => 'Vous ne possédez pas ce cadeau.',
	'g-error-message-blocked' => 'Vous êtes bloqué{{GENDER:||e|(e)}} et ne pouvez donc pas donner des cadeaux',
	'g-error-message-invalid-link' => 'Le lien que vous avez fourni est invalide.',
	'g-error-message-login' => 'Vous devez vous connecter pour donner des cadeaux',
	'g-error-message-no-user' => 'L’utilisateur que vous essayez de voir n’existe pas.',
	'g-error-message-to-yourself' => 'Vous ne pouvez pas vous donner un cadeau à vous-même.',
	'g-error-title' => 'Oups, vous avez pris un mauvais virage !',
	'g-file-instructions' => 'Votre image doit être au format jpeg, png ou gif (non animé) et sa taille ne doit pas dépasser 100 ko.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'cadeau',
	'g-gift-name' => 'nom du cadeau',
	'g-give-gift' => 'Donner le cadeau',
	'g-give-all' => 'Envie de donner un cadeau à $1 ? Cliquez sur un cadeau ci-dessous et cliquez ensuite sur « Envoyer le cadeau ». C’est facile.',
	'g-give-all-message-title' => 'Ajouter un message',
	'g-give-all-title' => 'Donner un cadeau à $1',
	'g-give-enter-friend-title' => 'Si vous connaissez le nom de l’utilisateur, entrez-le ci-dessous',
	'g-given' => 'Ce cadeau a été donné {{PLURAL:$1|une|$1}} fois',
	'g-give-list-friends-title' => 'Sélectionnez depuis la liste de vos amis',
	'g-give-list-select' => 'sélectionnez un ami',
	'g-give-separator' => 'ou',
	'g-give-no-user-message' => 'Les cadeaux et les prix sont bien pour faire connaitre vos amis !',
	'g-give-no-user-title' => 'À qui voulez-vous donner un cadeau ?',
	'g-give-to-user-title' => 'Envoyer le cadeau « $1 » à $2',
	'g-give-to-user-message' => 'Envie de donner <a href="$2">un cadeau différent</a> à $1 ?',
	'g-go-back' => 'Revenir',
	'g-imagesbelow' => 'Les images qui seront utilisées sur le site sont affichées ci-dessous',
	'g-large' => 'Grand',
	'g-list-title' => 'Liste des cadeaux de $1',
	'g-main-page' => 'Accueil',
	'g-medium' => 'Moyen',
	'g-mediumlarge' => 'Moyen-grand',
	'g-new' => 'nouveau',
	'g-next' => 'Prochain',
	'g-previous' => 'Précédent',
	'g-remove' => 'Enlever',
	'g-remove-gift' => 'Enlever ce cadeau',
	'g-remove-message' => 'Êtes-vous sûr(e) de vouloir enlever le cadeau « $1 » ?',
	'g-recent-recipients' => 'Autres bénéficiaires récents de ce cadeau',
	'g-remove-success-title' => 'Vous avez enlevé avec succès le cadeau « $1 »',
	'g-remove-success-message' => 'Le cadeau « $1 » a été enlevé.',
	'g-remove-title' => 'Enlever « $1 » ?',
	'g-send-gift' => 'Envoyer le cadeau',
	'g-select-a-friend' => 'sélectionnez un ami',
	'g-sent-title' => 'Vous avez envoyé le cadeau à $1',
	'g-sent-message' => 'Vous avez envoyé le cadeau suivant à $1.',
	'g-small' => 'Petit',
	'g-to-another' => 'Donner à quelqu’un d’autre',
	'g-uploadsuccess' => 'Téléversement effectué avec succès',
	'g-viewgiftlist' => 'Voir la liste des cadeaux',
	'g-your-profile' => 'Votre profil',
	'gift_received_subject' => '$1 vous a envoyé le cadeau $2 sur {{SITENAME}} !',
	'gift_received_body' => 'Bonjour $1,

$2 vient de vous envoyer le cadeau $3 sur {{SITENAME}}.

Pour lire la note $2 qui vous est adressée et voir votre cadeau, cliquez sur le lien ci-dessous :

$4

Nous espérons que vous l’apprécierez !

Merci,


L’équipe de {{SITENAME}}

---

Vous ne voulez plus recevoir de courriels de notre part ?

Cliquez $5
et modifiez vos préférences pour désactiver les notifications par courriel.',
	'right-giftadmin' => 'Créer ou modifier des cadeaux',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'giftmanager' => 'Xestor de agasallos',
	'giftmanager-addgift' => '+ Engadir un novo agasallo',
	'giftmanager-access' => 'acceso ao agasallo',
	'giftmanager-description' => 'descrición do agasallo',
	'giftmanager-giftimage' => 'imaxe do agasallo',
	'giftmanager-image' => 'engadir/substituír a imaxe',
	'giftmanager-giftcreated' => 'O agasallo foi creado',
	'giftmanager-giftsaved' => 'O agasallo foi gardado',
	'giftmanager-public' => 'público',
	'giftmanager-private' => 'privado',
	'giftmanager-view' => 'Ver a lista de agasallos',
	'g-add-message' => 'Engadir unha mensaxe',
	'g-back-edit-gift' => 'Voltar á edición deste agasallo',
	'g-back-gift-list' => 'Voltar á lista de agasallos',
	'g-back-link' => '< Voltar á páxina de $1',
	'g-choose-file' => 'Elixir o ficheiro:',
	'g-cancel' => 'Cancelar',
	'g-count' => '$1 ten {{PLURAL:$2|un agasallo|$2 agasallos}}.',
	'g-create-gift' => 'Crear un agasallo',
	'g-created-by' => 'creado por',
	'g-current-image' => 'Imaxe actual',
	'g-delete-message' => 'Está seguro de querer eliminar o agasallo "$1"? Isto tamén o borrará dos usuarios que o recibiron.',
	'g-description-title' => 'Agasallo "$2" de $1',
	'g-error-do-not-own' => 'Non é o dono deste agasallo.',
	'g-error-message-blocked' => 'Actualmente está bloqueado e non pode dar agasallos',
	'g-error-message-invalid-link' => 'A ligazón que inseriu é inválida.',
	'g-error-message-login' => 'Debe acceder ao sistema para agasallar',
	'g-error-message-no-user' => 'O usuario que intenta ver non existe.',
	'g-error-message-to-yourself' => 'Non se pode agasallar a si mesmo.',
	'g-error-title' => 'Vaites, tomou un xiro erróneo!',
	'g-file-instructions' => 'A súa imaxe debe ser jpeg, png ou gif (que non sexan animados), e debe ter un tamaño menor de 100kb.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'agasallo',
	'g-gift-name' => 'nome do agasallo',
	'g-give-gift' => 'Dar o agasallo',
	'g-give-all' => 'Quere agasallar a $1? Prema nun dos agasallos de embaixo e logo en "Enviar o agasallo". Así de sinxelo.',
	'g-give-all-message-title' => 'Engadir unha mensaxe',
	'g-give-all-title' => 'Darlle un agasallo a $1',
	'g-give-enter-friend-title' => 'Se sabe o nome do usuario, insírao embaixo',
	'g-given' => 'Este agasallo foi entregado {{PLURAL:$1|unha vez|$1 veces}}',
	'g-give-list-friends-title' => 'Seleccione da súa lista de amigos',
	'g-give-list-select' => 'seleccionar un amigo',
	'g-give-separator' => 'ou',
	'g-give-no-user-message' => 'Os agasallos e premios son un fantástico modo de recoñecer o labor dos seus amigos!',
	'g-give-no-user-title' => 'A quen quere agasallar?',
	'g-give-to-user-title' => 'Enviar o agasallo "$1" a $2',
	'g-give-to-user-message' => 'Quere darlle a $1 un <a href="$2">agasallo diferente</a>?',
	'g-go-back' => 'Voltar',
	'g-imagesbelow' => 'Embaixo están as súas imaxes, que serán usadas no sitio',
	'g-large' => 'Grande',
	'g-list-title' => 'Lista de agasallos de $1',
	'g-main-page' => 'Portada',
	'g-medium' => 'Mediano',
	'g-mediumlarge' => 'Mediano-Grande',
	'g-new' => 'novo',
	'g-next' => 'Seguinte',
	'g-previous' => 'Previo',
	'g-remove' => 'Eliminar',
	'g-remove-gift' => 'Eliminar este agasallo',
	'g-remove-message' => 'Está seguro de querer eliminar o agasallo "$1"?',
	'g-recent-recipients' => 'Outros receptores recentes deste agasallo',
	'g-remove-success-title' => 'Eliminou con éxito o agasallo "$1"',
	'g-remove-success-message' => 'O agasallo "$1" foi eliminado.',
	'g-remove-title' => 'Quere eliminar "$1"?',
	'g-send-gift' => 'Enviar o agasallo',
	'g-select-a-friend' => 'seleccionar un amigo',
	'g-sent-title' => 'Envioulle un agasallo a $1',
	'g-sent-message' => 'Envioulle o seguinte agasallo a $1.',
	'g-small' => 'Pequeno',
	'g-to-another' => 'Agasallar a alguén',
	'g-uploadsuccess' => 'Carga exitosa',
	'g-viewgiftlist' => 'Ver a lista de agasallos',
	'g-your-profile' => 'O seu perfil',
	'gift_received_subject' => '$1 envioulle o agasallo $2 en {{SITENAME}}!',
	'gift_received_body' => 'Ola $1:

$2 acaba de enviarlle o agasallo $3 en {{SITENAME}}.

Quere ler a nota $2 que lle deixaron e ver o seu agasallo?  Prema na ligazón de embaixo:

$4

Agardamos que lle guste!

Grazas,

O equipo de {{SITENAME}}

---

Quere deixar de recibir correos electrónicos nosos?

Faga clic $5
e troque as súas configuracións para desactivar as notificacións por correo electrónico.',
	'right-giftadmin' => 'Crear novos agasallos e editar os existentes',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'g-cancel' => 'Ἀκυροῦν',
	'g-gift' => 'δῶρον',
	'g-give-separator' => 'ἢ',
	'g-new' => 'Νέα',
	'g-next' => 'Ἑπόμεναι',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'giftmanager' => 'Gschänkverwaltig',
	'giftmanager-addgift' => '+ E nej Gschänk dezuefiege',
	'giftmanager-access' => 'Fortschritt',
	'giftmanager-description' => 'Gschänkbschryybig',
	'giftmanager-giftimage' => 'Bild vum Gschänk',
	'giftmanager-image' => 'Bild dryysetze /useneh',
	'giftmanager-giftcreated' => 'S Gschänk isch aagleit wore',
	'giftmanager-giftsaved' => 'S Gschänk isch gspycheret wore',
	'giftmanager-public' => 'effentli',
	'giftmanager-private' => 'privat',
	'giftmanager-view' => 'D Gschänklischt aaluege',
	'g-add-message' => 'Fieg e Nochricht dezue',
	'g-back-edit-gift' => 'Zrugg zum Bearbeite vu däm Gschänk',
	'g-back-gift-list' => 'Zrugg zue dr Gschänklischt',
	'g-back-link' => '< Zrugg zum Profil vu $1',
	'g-choose-file' => 'Wehl Datei:',
	'g-cancel' => 'Abbräche',
	'g-count' => '$1 het $2 {{PLURAL:$2|Gschänk|Gschänk}}.',
	'g-create-gift' => 'Gschänk aalege',
	'g-created-by' => 'aagleit vu',
	'g-current-image' => 'Aktuäll Bild',
	'g-delete-message' => 'Bisch sicher, ass Du s "$1" witt lesche? Derno wird s au bi Benutzer glescht, wu s villicht iberchu hän.',
	'g-description-title' => 'S Gschänk "$2" vu $1',
	'g-error-do-not-own' => 'Dir ghert des Gschänk nit.',
	'g-error-message-blocked' => 'Du bisch im Momänt gsperrt un chasch kei Gschänk mache',
	'g-error-message-invalid-link' => 'S Gleich, wu Du yygee hesch, isch nit giltig.',
	'g-error-message-login' => 'Du muesch aagmäldet syy go Gschänk mache',
	'g-error-message-no-user' => 'Dää Benutzer, wu Du witt aelueg, git s nit.',
	'g-error-message-to-yourself' => 'Du chasch Dir nit sälber e Gschänk mache.',
	'g-error-title' => 'Hoppla, do lauft ebis scheps!',
	'g-file-instructions' => 'S Bild muess e „jpeg“, „png“, „gif“ (kei animiert) syy, un e Dateigreßi haa, wu chleiner isch wie 100 kb.',
	'g-from' => 'vu <a href="$1">$2</a>',
	'g-gift' => 'Gschänk',
	'g-gift-name' => 'Gschänkname',
	'g-give-gift' => 'Schänke',
	'g-give-all' => 'Witt $1 e Gschänk mache? Nume uf eis vu dr Gschänk unte drucke und uf „Gschänk schicke” drucke. Eso eifach goht s!',
	'g-give-all-message-title' => 'E Nochricht zuefiege',
	'g-give-all-title' => 'Mach $1 e Gschänk',
	'g-give-enter-friend-title' => 'Wänn Du dr Benutzername vum Benutzer weisch, no trag en unten yy',
	'g-given' => 'Des Gschänk isch scho $1 {{PLURAL:$1|Mol|Mol}} verschänkt wore',
	'g-give-list-friends-title' => 'Wehl us Dyynere Fryndlischt',
	'g-give-list-select' => 'wehl e Frynd uus',
	'g-give-separator' => 'oder',
	'g-give-no-user-message' => 'Gschänk un Uuszeichnige sin e scheni Art Dyyne Frynd e Freid z mache!',
	'g-give-no-user-title' => 'Wäm wetsch ebis schänke?',
	'g-give-to-user-title' => 'Schick s Gschänk "$1" an $2',
	'g-give-to-user-message' => 'Wetsch $1 e <a href="$2">ander Gschänk</a> gee?',
	'g-go-back' => 'Gang zrugg',
	'g-imagesbelow' => 'Do unte chemme alli Bilder, wu uf däre Syte bruucht wäre',
	'g-large' => 'Groß',
	'g-list-title' => 'D Gschänklischt vu $1',
	'g-main-page' => 'Hauptsyte',
	'g-medium' => 'Mittel',
	'g-mediumlarge' => 'Mittelgroß',
	'g-new' => 'nej',
	'g-next' => 'Negscht',
	'g-previous' => 'Vorig',
	'g-remove' => 'Useneh',
	'g-remove-gift' => 'Des Gschänk useneh',
	'g-remove-message' => 'Bisch sicher, ass Du s Gschänk "$1" wetsch useneh?',
	'g-recent-recipients' => 'Andere Empfänger vu däm Gschänk',
	'g-remove-success-title' => 'Du hesch s Gschänk "$1" erfolgryych usegnuh',
	'g-remove-success-message' => 'S Gschänk "$1" isch usegnuh wore.',
	'g-remove-title' => '„$1“ useneh?',
	'g-send-gift' => 'Gschänk schicke',
	'g-select-a-friend' => 'wehl e Frynd uus',
	'g-sent-title' => 'Du hesch e Gschänk an $1 gschickt',
	'g-sent-message' => 'Du hesch des Gschänk an $1 gschickt:',
	'g-small' => 'Chlei',
	'g-to-another' => 'Eber anderem schänke',
	'g-uploadsuccess' => 'erfolgryych uffeglade',
	'g-viewgiftlist' => 'D Gschänklischt aaluege',
	'g-your-profile' => 'Dyy Profil',
	'gift_received_subject' => '$1 het Dir uf {{SITENAME}} $2 gschänkt!',
	'gift_received_body' => 'Sali $1:

$2 het Dir grad $3 gschänkt uf {{SITENAME}}.

Wetsch d Notiz läse, wu $2 Dir derzue gschribe het un, un Dyy Gschänk bschaue?  Druck s Gleich do unte:

$4

Mir hoffe, s gfallt Dir!

Dankschen,


D Lyt vum {{SITENAME}}
---

Ha, Du wetsch gar keini E-Mail meh iberchu vun is?

Druck $5
un ändere Dyyni Yystellige go d E-Mail-Benochrichtigunge verhindere.',
	'right-giftadmin' => 'Leg neji Gschänk aa un bearbeit sonigi, wu s scho het',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'giftmanager' => 'Zrjadowak darow',
	'giftmanager-addgift' => '+ Nowy dar přidać',
	'giftmanager-access' => 'přistup k darej',
	'giftmanager-description' => 'wopisanje dara',
	'giftmanager-giftimage' => 'wobraz dara',
	'giftmanager-image' => 'wobraz přidać/narunać',
	'giftmanager-giftcreated' => 'Dar bu wutworjeny',
	'giftmanager-giftsaved' => 'Dar bu składowany',
	'giftmanager-public' => 'zjawny',
	'giftmanager-private' => 'priwatny',
	'giftmanager-view' => 'Lisćinu darow sej wobhladać',
	'g-add-message' => 'Powěsć přidać',
	'g-back-edit-gift' => 'Wróćo k wobdźěłanju tutoho dara',
	'g-back-gift-list' => 'Wróćo k lisćinje darow',
	'g-back-link' => '< Wróćo k stronje wužiwarja $1',
	'g-choose-file' => 'Wubjer dataju:',
	'g-cancel' => 'Přetorhnyć',
	'g-count' => '$1 ma $2 {{PLURAL:$2|dar|daraj|dary|darow}}.',
	'g-create-gift' => 'Dar wutworić',
	'g-created-by' => 'wutworjeny wot',
	'g-current-image' => 'Aktualny wobraz',
	'g-delete-message' => 'Chceš woprawdźe dar "$1" wušmórnyć?
To wušmórnje jón tež z wužiwarjow, kotřiž su jón dostali.',
	'g-description-title' => 'Dar "$2" wužiwarja $1',
	'g-error-do-not-own' => 'Tutón dar njewobsedźiš.',
	'g-error-message-blocked' => 'Sy tuchwilu zablokowany a njemóžeš ničo darić',
	'g-error-message-invalid-link' => 'Wotkaz, kotryž sy zapodał, je njepłaćiwy.',
	'g-error-message-login' => 'Dyrbiš so přizjewić, zo by něšto darił',
	'g-error-message-no-user' => 'Wužiwar, kotrehož pospytuješ sej wobhladać, njeeksistuje.',
	'g-error-message-to-yourself' => 'Njemóžeš sej samomu ničo darić.',
	'g-error-title' => 'Hopla, sy něšto wopak činił!',
	'g-file-instructions' => 'Twój wobraz dyrbi typ jpeg, png abo gif (žane animěrowane gif) měć a dyrbi mjeńši hač 100 kb wulki być.',
	'g-from' => 'z <a href="$1">$2</a>',
	'g-gift' => 'dar',
	'g-gift-name' => 'mjeno dara',
	'g-give-gift' => 'Darić',
	'g-give-all' => 'Chceš wužiwarjej $1 něšsto darić?
Klikń prosće na jedyn ze slědowacych darow a na "Dar pósłać".
Je to cyle lochko.',
	'g-give-all-message-title' => 'Powěsć přidać',
	'g-give-all-title' => 'Wužiwarjej $1 něšto darić',
	'g-give-enter-friend-title' => 'Jeli wěš mjeno wužiwarja, zapisaj jo deleka',
	'g-given' => 'Tutón dar bu {{PLURAL:$1|jedyn raz|dwójce|$1 razy|$1 razow}} wudaty',
	'g-give-list-friends-title' => 'Z lisćiny twojich přećelow wubrać',
	'g-give-list-select' => 'přećela wubrać',
	'g-give-separator' => 'abo',
	'g-give-no-user-message' => 'Dary a myta su wulkotne wašnje, zo by swojim přećelam připóznaće wopokazał!',
	'g-give-no-user-title' => 'Komu chceš něšto darić?',
	'g-give-to-user-title' => 'Dar "$1" wužiwarjej $2 pósłać',
	'g-give-to-user-message' => 'Chceš wužiwarjej $1 <a href="$2">něšto druhe darić</a>?',
	'g-go-back' => 'Wróćo hić',
	'g-imagesbelow' => 'Deleka slěduja twoje wobrazy, kotrež budu so na tutym sydle wužiwać',
	'g-large' => 'Wulki',
	'g-list-title' => 'Lisćina darow wužiwarja $1',
	'g-main-page' => 'Hłowna strona',
	'g-medium' => 'Srěni',
	'g-mediumlarge' => 'Srěnjowulki',
	'g-new' => 'nowy',
	'g-next' => 'Přichodny',
	'g-previous' => 'Předchadny',
	'g-remove' => 'Wotstronić',
	'g-remove-gift' => 'Tutón dar wotstronić',
	'g-remove-message' => 'Chceš dar "$1" woprawdźe wotstronić?',
	'g-recent-recipients' => 'Druzy aktualni přijimowarjo tutoho dara',
	'g-remove-success-title' => 'Sy dar "$1" wuspěšnje wotstronił',
	'g-remove-success-message' => 'Dar "$1" bu wotstronjeny.',
	'g-remove-title' => '"$1" wotstronić?',
	'g-send-gift' => 'Dar pósłać',
	'g-select-a-friend' => 'přećela wubrać',
	'g-sent-title' => 'Sy wužiwarjej $1 dar pósłał',
	'g-sent-message' => 'Sy slědowacy dar wužiwarjej $1 pósłał.',
	'g-small' => 'Mały',
	'g-to-another' => 'Někomu druhemu dać',
	'g-uploadsuccess' => 'Nahraće wuspěšne',
	'g-viewgiftlist' => 'Lisćinu darow sej wobhladać',
	'g-your-profile' => 'Twój profil',
	'gift_received_subject' => '$1 je ći dar $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} pósłał.',
	'gift_received_body' => 'Witaj $1.

$2 je ći runje dar $3 na {{GRAMMAR:lokatiw|{{SITENAME}}}} pósłał.

Chceš zdźělenku čitać, kotruž $2 je ći zawostajił a swój dar widźeć? Klikń na slědowacy wotkaz:

$4

Nadźijamy so, zo so ći spodoba!

Dźakujemy so,

team {{SITENAME}}

---

Hej, hižo nochceš žane e-mejle wot nas dóstać?

Klikń na $5
a změń swoje nastajenja, zo by e-mejlowe zdźělenja znjemóžnił.',
	'right-giftadmin' => 'Nowe dary wutworić a eksistowace wobdźěłać',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'giftmanager' => 'Gestor de donos',
	'giftmanager-addgift' => '+ Adder un nove dono',
	'giftmanager-access' => 'accesso al dono',
	'giftmanager-description' => 'description del dono',
	'giftmanager-giftimage' => 'imagine del dono',
	'giftmanager-image' => 'adder/reimplaciar imagine',
	'giftmanager-giftcreated' => 'Le dono ha essite create',
	'giftmanager-giftsaved' => 'Le dono ha essite immagazinate',
	'giftmanager-public' => 'public',
	'giftmanager-private' => 'private',
	'giftmanager-view' => 'Vider lista de donos',
	'g-add-message' => 'Adder un message',
	'g-back-edit-gift' => 'Retornar verso Modificar iste dono',
	'g-back-gift-list' => 'Retornar al lista de donos',
	'g-back-link' => '< Retornar al pagina de $1',
	'g-choose-file' => 'Selige file:',
	'g-cancel' => 'Cancellar',
	'g-count' => '$1 ha $2 {{PLURAL:$2|dono|donos}}.',
	'g-create-gift' => 'Crear dono',
	'g-created-by' => 'create per',
	'g-current-image' => 'Imagine actual',
	'g-delete-message' => 'Es tu secur que tu vole deler le dono "$1"? Isto va equalmente deler lo de omne usator qui lo ha recipite.',
	'g-description-title' => 'dono "$2" de $1',
	'g-error-do-not-own' => 'Tu non possede iste dono.',
	'g-error-message-blocked' => 'Tu es blocate al momento e non pote dar donos',
	'g-error-message-invalid-link' => 'Le ligamine que tu ha entrate es invalide.',
	'g-error-message-login' => 'Tu debe aperir un session pro dar donos',
	'g-error-message-no-user' => 'Le usator que tu tenta vider non existe.',
	'g-error-message-to-yourself' => 'Tu non pote dar un dono a te mesme.',
	'g-error-title' => 'Ups, tu ha errate!',
	'g-file-instructions' => 'Tu imagine debe esser in formato jpeg, png o gif (non animate), e debe esser minus grande que 100kb.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'dono',
	'g-gift-name' => 'nomine del dono',
	'g-give-gift' => 'Dar dono',
	'g-give-all' => 'Vole dar un dono a $1? Simplemente clicca super un del donos infra e clicca "Inviar dono". Es facile.',
	'g-give-all-message-title' => 'Adder un message',
	'g-give-all-title' => 'Dar un dono a $1',
	'g-give-enter-friend-title' => 'Si tu cognosce le nomine de iste usator, entra lo infra',
	'g-given' => 'Iste dono ha essite date $1 {{PLURAL:$1|vice|vices}}',
	'g-give-list-friends-title' => 'Selige de tu lista de amicos',
	'g-give-list-select' => 'selige un amico',
	'g-give-separator' => 'o',
	'g-give-no-user-message' => 'Le donos e premios es un optime maniera de dar recognoscimento a tu amicos!',
	'g-give-no-user-title' => 'A qui vole tu dar un dono?',
	'g-give-to-user-title' => 'Inviar le dono "$1" a $2',
	'g-give-to-user-message' => 'Vole dar un <a href="$2">altere dono</a> a $1?',
	'g-go-back' => 'Retornar',
	'g-imagesbelow' => 'In basso es tu imagines que essera usate in iste sito',
	'g-large' => 'Grande',
	'g-list-title' => 'Lista de donos de $1',
	'g-main-page' => 'Pagina principal',
	'g-medium' => 'Medie',
	'g-mediumlarge' => 'Medie-grande',
	'g-new' => 'nove',
	'g-next' => 'Proxime',
	'g-previous' => 'Previe',
	'g-remove' => 'Remover',
	'g-remove-gift' => 'Remover iste dono',
	'g-remove-message' => 'Es tu secur que tu vole remover le dono "$1"?',
	'g-recent-recipients' => 'Altere beneficiarios recente de iste dono',
	'g-remove-success-title' => 'Tu ha removite le dono "$1" con successo',
	'g-remove-success-message' => 'Le dono "$1" ha essite removite.',
	'g-remove-title' => 'Remover "$1"?',
	'g-send-gift' => 'Inviar dono',
	'g-select-a-friend' => 'selige un amico',
	'g-sent-title' => 'Tu ha inviate un dono a $1',
	'g-sent-message' => 'Tu ha inviate le dono sequente a $1.',
	'g-small' => 'Parve',
	'g-to-another' => 'Dar a un altere persona',
	'g-uploadsuccess' => 'Cargamento succedite',
	'g-viewgiftlist' => 'Vider lista de donos',
	'g-your-profile' => 'Tu profilo',
	'gift_received_subject' => '$1 te ha inviate le dono $2 in {{SITENAME}}!',
	'gift_received_body' => 'Salute $1,

$2 justo te inviava le dono $3 in {{SITENAME}}.

Vole leger le nota que $2 te lassava e vider tu dono? Clicca super le ligamine sequente:

$4

Nos spera que illo te placera!

Gratias,


Le equipa de {{SITENAME}}

---

Tu non vole reciper plus e-mail de nos?

Clicca $5
e cambia tu configurationes pro disactivar le notificationes in e-mail.',
	'right-giftadmin' => 'Crear nove donos e modificar existentes',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 */
$messages['id'] = array(
	'giftmanager-private' => 'pribadi',
	'g-cancel' => 'Batalkan',
	'g-large' => 'Besar',
	'g-main-page' => 'Halaman utama',
	'g-medium' => 'Menengah',
	'g-new' => 'baru',
	'g-next' => 'Selanjutnya',
	'g-previous' => 'Sebelumnya',
	'g-small' => 'Kecil',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fievarsty
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'giftmanager' => '贈り物の管理',
	'giftmanager-addgift' => '+ 新しい贈り物の追加',
	'giftmanager-access' => '贈り物のアクセス',
	'giftmanager-description' => '贈り物の説明',
	'giftmanager-giftimage' => '贈り物用画像',
	'giftmanager-image' => '画像を追加/置き換え',
	'giftmanager-giftcreated' => '贈り物を作成しました',
	'giftmanager-giftsaved' => '贈り物を保存しました',
	'giftmanager-public' => '公開',
	'giftmanager-private' => '非公開',
	'giftmanager-view' => '贈り物の一覧を表示',
	'g-add-message' => 'メッセージを追加',
	'g-back-edit-gift' => '戻ってこの贈り物を編集する',
	'g-back-gift-list' => '贈り物一覧に戻る',
	'g-back-link' => '< $1のページに戻る',
	'g-choose-file' => 'ファイルを選ぶ:',
	'g-cancel' => '中止',
	'g-count' => '$1は$2個の{{PLURAL:$2|贈り物|贈り物}}を所有しています。',
	'g-create-gift' => '贈り物を作成',
	'g-created-by' => '作成者',
	'g-current-image' => '現在の画像',
	'g-delete-message' => '贈り物「$1」を本当に削除しますか？この操作を行うと送り先の手元からも削除されます。',
	'g-description-title' => '$1からの贈り物「$2」',
	'g-error-do-not-own' => 'あなたはこの贈り物を所持してません。',
	'g-error-message-blocked' => 'あなたは現在ブロックされているため贈り物を贈ることはできません',
	'g-error-message-invalid-link' => 'あなたの入力したリンクは無効です。',
	'g-error-message-login' => '贈り物を贈るにはログインする必要があります',
	'g-error-message-no-user' => 'あなたが閲覧しようとした利用者は存在しません。',
	'g-error-message-to-yourself' => '自分自身へ贈り物を贈ることはできません。',
	'g-error-title' => 'おっと、操作を間違えましたよ！',
	'g-file-instructions' => '画像はjpeg、pngまたはgif （アニメーションgifは不可）である必要があり、サイズは100キロバイトよりも小さくする必要があります。',
	'g-from' => '<a href="$1">$2</a>から',
	'g-gift' => '贈り物',
	'g-gift-name' => '贈り物名',
	'g-give-gift' => '贈り物を贈る',
	'g-give-all' => '$1に贈り物を贈りますか？下の贈り物のどれか1つをクリックし、「贈り物を送る」をクリックしてください。操作はたったそれだけです。',
	'g-give-all-message-title' => 'メッセージの追加',
	'g-give-all-title' => '$1に贈り物を贈る',
	'g-give-enter-friend-title' => '利用者の名前を知っているなら、以下に入力してください',
	'g-given' => 'この贈り物は$1{{PLURAL:$1|回}}贈られています',
	'g-give-list-friends-title' => '友達一覧から選択してください',
	'g-give-list-select' => '友達を選択',
	'g-give-separator' => 'または',
	'g-give-no-user-message' => '贈り物と賞は友人に対して感謝の気持ちを表すのにぴったりな方法です！',
	'g-give-no-user-title' => '誰に贈り物を贈りますか？',
	'g-give-to-user-title' => '贈り物「$1」を$2 へ送る',
	'g-give-to-user-message' => '$1 へ<a href="$2">別の贈り物</a>を贈りますか？',
	'g-go-back' => '戻る',
	'g-imagesbelow' => '以下はサイトで使用されるあなたの画像です',
	'g-large' => '大',
	'g-list-title' => '$1 の贈り物一覧',
	'g-main-page' => 'メインページ',
	'g-medium' => '中',
	'g-mediumlarge' => 'やや大',
	'g-new' => '新規',
	'g-next' => '次',
	'g-previous' => '前',
	'g-remove' => '削除',
	'g-remove-gift' => 'この贈り物を削除する',
	'g-remove-message' => '本当に贈り物「$1」を削除してよろしいですか？',
	'g-recent-recipients' => '最近この贈り物を受け取った他の人',
	'g-remove-success-title' => '贈り物「$1」の削除に成功しました',
	'g-remove-success-message' => '贈り物「$1」は削除されました。',
	'g-remove-title' => '「$1」を削除しますか？',
	'g-send-gift' => '贈り物を送る',
	'g-select-a-friend' => '友達を選択',
	'g-sent-title' => '$1に贈り物を送りました。',
	'g-sent-message' => '以下の贈り物を$1に送りました。',
	'g-small' => '小',
	'g-to-another' => '他の人に贈る',
	'g-uploadsuccess' => 'アップロード成功',
	'g-viewgiftlist' => '贈り物一覧を表示',
	'g-your-profile' => 'あなたのプロフィール',
	'gift_received_subject' => '{{SITENAME}}上に$1さんからの$2の贈り物が届いています！',
	'gift_received_body' => 'こんにちは、$1 さん。

{{SITENAME}}上に、$2さんからあなたへ$3の贈り物が届いています。

$2さんからのメッセージと贈り物を見るには以下のリンクをクリックしてください。

$4

贈り物が気に入れば幸いです。

{{SITENAME}}チーム

---
メール受信を停止したい場合は、
$5
をクリックして、メール通知を無効にするよう設定変更してください。',
	'right-giftadmin' => '現在の贈り物を編集または新しく作成',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'giftmanager' => 'Jeschenke Verwallde',
	'giftmanager-addgift' => '+ e neu Jeschenk dobei donn',
	'giftmanager-access' => 'Zohjang nohm Jeschengk',
	'giftmanager-description' => 'Jeschengk beschrieve',
	'giftmanager-giftimage' => 'Beld fum Jeschengk',
	'giftmanager-image' => 'e Beld dobei donn udder ußtuusche',
	'giftmanager-giftcreated' => 'Dat Jeschengk es aanjelaat',
	'giftmanager-giftsaved' => 'Dat Jeschengk es afjeshpeichert',
	'giftmanager-public' => 'öffentlesh',
	'giftmanager-private' => 'privaat',
	'giftmanager-view' => 'Less met Jeschengke beloore',
	'g-add-message' => 'En Nohresch dobei donn',
	'g-back-edit-gift' => 'Jangk retuur noh em Ändere för dat Jeschenk',
	'g-back-gift-list' => 'Jangk retuur op de Leß met de Jeschenke',
	'g-back-link' => '< Retuur noh dem $1 sing Sigg',
	'g-choose-file' => 'Donn de Datei ußwähle:',
	'g-cancel' => 'Stopp! Avbreche!',
	'g-count' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher}} $1 hät {{PLURAL:$2|ei Jeschengk|$2 Geschengke|kei Jeschengk}}.',
	'g-create-gift' => 'Jeschengk äschaffe',
	'g-created-by' => 'aanjelaat {{GENDER:$1|fum|fum|fum Metmaacher|fum|fun dä}}',
	'g-current-image' => 'Et aktoälle Beld',
	'g-delete-message' => 'Beß De Der sescher, dat de dat Jeschengk „$1“ fott maacher wells?
Domet verschwindt et och bei all de Metmaacher, di dat ald ens krääje han.',
	'g-description-title' => 'Däm $1 sing Jeschengk „$2“',
	'g-error-do-not-own' => 'Dat Jeschengk jehüert Der nit.',
	'g-error-message-blocked' => 'Do bes jraad jeshpert un kanns dröm kei Jeschengke maache.',
	'g-error-message-invalid-link' => 'Dä Lengk es unjöltesch, dä De do enjejovve häs.',
	'g-error-message-login' => 'Do moß ald enjelogg sin, öm Jeschengke maache eze künne',
	'g-error-message-no-user' => 'Dä Metmaacher, dä De aanloore wells, dä jidd_et jaa nit.',
	'g-error-message-to-yourself' => 'Do kanns Desch net sellevs beschengke.',
	'g-error-title' => 'Hoppla, Häzje, do bes De öhnzwi verkeht jejange!',
	'g-file-instructions' => 'Ding Beld moß em <code>jpeg</code>, <code>png</code> odder em <span class="plainlinks">gif</span> Fommaat sin, ävver kei bewääschlesch  <code>gif</code>, un der Ömfang darf nit mieh wie 100 Killo<i lang="en">byte</i> bedraare.',
	'g-from' => 'vun <a href="$1">$2</a>',
	'g-gift' => 'Jeschengk',
	'g-gift-name' => 'em Jeschengk singe Name',
	'g-give-gift' => 'einem e Jeschengk maache',
	'g-give-all' => 'Wells de {{GENDER:$1|dämm|dämm|dämm Metmaacher}} $1 e Jeschngk maache?
Dann don op ein fun dä Jeschengke hee dronger klecke,
un dann donn „{{int:G-send-gift}}“ klecke, esu eijfach es dat.',
	'g-give-all-message-title' => 'Donn en Nohreesch dobei',
	'g-give-all-title' => 'Mach däm $1 e Jeschengk',
	'g-give-enter-friend-title' => 'Wann de dä Metmaacher-Name weiß, da donn en unge entippe',
	'g-given' => 'Dat Jeschengk woodt {{PLURAL:$1|ald eimol|ald $1 Mohle|noch nie}} ußjejovve.',
	'g-give-list-friends-title' => 'Uß de Leß met Dinge Fründe ußsöke',
	'g-give-list-select' => 'Sök ene Fründ uß',
	'g-give-separator' => 'udder',
	'g-give-no-user-message' => 'Jeschengke un Ußzeishnunge sin en joode Saach, öm Dinge Fründe Ding Aanerkennung ußzedröcke un en Beshtäätejung ze jävve!',
	'g-give-no-user-title' => 'Wämm wööds De jään e Jeschengk maache?',
	'g-give-to-user-title' => 'Donn {{GENDER:$2:dämm|dämm|dämm|dä|dämm}} $2 dat Jeschengk „$1“ maache',
	'g-give-to-user-message' => 'Wells De {{GENDER:$1|dämm|dämm|dämm Metmaacher|dä|dämm}} $1 en <a href="$2">ander Jeschengk</a> maache?',
	'g-go-back' => 'Jangk retuur',
	'g-imagesbelow' => 'Hee dronger sin Ding Bellder, die hee en däm Wiki jebruch wäde.',
	'g-large' => 'Jruß',
	'g-list-title' => 'Däm $1 sing Leß met Jeschengke',
	'g-main-page' => '{{int:mainpage}}',
	'g-medium' => 'Meddel',
	'g-mediumlarge' => 'Meddeljruuß',
	'g-new' => 'neu',
	'g-next' => 'Nächsde',
	'g-previous' => 'Vörijje',
	'g-remove' => 'Fott nämme',
	'g-remove-gift' => 'Dat Jeschengk fott nämme',
	'g-remove-message' => 'Bes de Der sesher, dat De dat Jeschengk „$1“ fott nämme wells?',
	'g-recent-recipients' => 'Ander, di dat sellve Jeschengk köözlesch krääje han.',
	'g-remove-success-title' => 'Dat Jeschengk „$1“ es fott jenumme.',
	'g-remove-success-message' => 'Dat Jeschengk „$1“ es jetz widder fott.',
	'g-remove-title' => '„$1“ fott nämme?',
	'g-send-gift' => 'Dat Jeschengk maache!',
	'g-select-a-friend' => 'sök ene Fründ uß',
	'g-sent-title' => 'Do häs dämm $1 e Jeschengk jemaat',
	'g-sent-message' => 'Do häs dämm $1 dat Jeschengk hee jemaat.',
	'g-small' => 'Kleij',
	'g-to-another' => 'Donn dat enem andere jevve',
	'g-uploadsuccess' => 'Et Huhlaade hät jeflupp',
	'g-viewgiftlist' => 'Donn de Leß met Jeschengke aanloore',
	'g-your-profile' => 'Ding Profil',
	'gift_received_subject' => '{{GENDER:$1|Dä Metmaacher|De Metmaacheren|Dä Metmaacher|Dat Metmaacherin|-}}
$1 hät Der en de {{SITENAME}} dat Jeschengk $2 jemaat!',
	'gift_received_body' => 'Jooden Daach, $1,

$2 hät Der jrad op de {{SITENAME}} dat Jeschengk $3 jejovve

Wells De lesse, wat dä $2 Der met dämm Jeschengk för en Nohreesch hät zohkumme lohße? Donn op dä Link klekke:

$4

Mer hoffe, Do maachs_et!

Schööne Dank,


De Lück vun de {{SITENAME}}

---

Wells De kei e-mail mieh vun uns krijje?

Dann donn op $5 klekke,
un donn Ding Enshtellunge ändere, öm kei Meffeilunge meih övver e-mail ze krijje.',
	'right-giftadmin' => 'E neu jeschengk äscahffe, un all de Jeschengke ändere, di ad doo sin.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'giftmanager' => "Cadeau's-Verwaltung",
	'giftmanager-addgift' => '+ En neie Cadeau derbäisetzen',
	'giftmanager-description' => 'Beschreiwung vum Cadeau',
	'giftmanager-giftimage' => 'Bild vum Cadeau',
	'giftmanager-image' => 'Bild derbäisetzen/ersetzen',
	'giftmanager-giftcreated' => 'De Cadeau gouf ugeluecht.',
	'giftmanager-giftsaved' => 'De Cadeau ouf gespäichert',
	'giftmanager-public' => 'ëffentlech',
	'giftmanager-private' => 'privat',
	'giftmanager-view' => 'Lëscht vun de Cadeaue kucken',
	'g-add-message' => 'Eng Noriicht derbäisetzen',
	'g-back-edit-gift' => "Zréck fir dëse Cadeau z'änneren",
	'g-back-gift-list' => "Zréck op d'Lëscht vun de Cadeauen",
	'g-back-link' => '< Zréck op dem $1 seng Säit',
	'g-choose-file' => 'Fichier wielen:',
	'g-cancel' => 'Ofbriechen',
	'g-create-gift' => 'Cadeau uleeën',
	'g-created-by' => 'ugeluecht vum',
	'g-current-image' => 'Aktuellt Bild',
	'g-delete-message' => 'Sidd dir sécher datt dir de Cadeau $1 läsche wëllt?
Et gëtt dann och bäi de Benotzer geläscht déi e kritt hunn.',
	'g-description-title' => 'Cadeau "$2" vum $1',
	'g-error-do-not-own' => 'Dëse Cadeau gehéiert Iech net.',
	'g-error-message-blocked' => 'Dir sidd den Ament gespaart a kënnt keng Cadeaue maachen',
	'g-error-message-invalid-link' => 'De Link deen Dir uginn hutt ass net valabel.',
	'g-error-message-login' => 'Dir musst Iech aloggen fir Cadeauen ze maachen',
	'g-error-message-no-user' => 'De Benotzer deen Dir versicht ze kucken gëtt et net.',
	'g-error-message-to-yourself' => 'Dir kënnt Iech net selwer e Cadeau maachen.',
	'g-error-title' => 'Oups, do ass eppes schief gaang!',
	'g-file-instructions' => 'Ärt Bild muss e jpeg, png oder gif (keng animéiert Gifen) sinn, a muss manner wéi 100KB grouss sinn.',
	'g-from' => 'vum <a href="$1">$2</a>',
	'g-gift' => 'Cadeau',
	'g-gift-name' => 'Numm vum Cadeau',
	'g-give-gift' => 'E Cadeau maachen',
	'g-give-all' => 'Wëllt Dir dem $1 e Cadeau maachen?
Klickt just op e vun de Cadeauen ënnedrënner a klickt op "Cadeau schécken".
Et ass esou einfach.',
	'g-give-all-message-title' => 'Eng Noriicht derbäisetzen',
	'g-give-all-title' => 'Dem $1 e Cadeau maachen',
	'g-give-enter-friend-title' => 'Wann Dir den Numm vum Benotzer wësst, dann tippt en ënndrënner an.',
	'g-given' => 'Dëse Cadeau gouf $1 {{PLURAL:$1|mol|mol}} gemaach',
	'g-give-list-friends-title' => 'Aus Ärer Lëscht vu Frënn auswielen',
	'g-give-list-select' => 'e Frënd auswielen',
	'g-give-separator' => 'oder',
	'g-give-no-user-message' => 'Cadeauen an Auszeechnunge sinn eng groussarteg Manéier fir senge Frënn Unerkennung auszedrécken!',
	'g-give-no-user-title' => 'Wiem wëllt Dir e Cadeau maachen?',
	'g-give-to-user-title' => 'Dem $2 de Cadeau "$1" maachen',
	'g-give-to-user-message' => 'Wëllt Dir dem $1 en <a href="$2">anere Cadeau</a> maachen?',
	'g-go-back' => 'Zréck goen',
	'g-imagesbelow' => 'Ënndrënner sinn Är Biller déi op dësem Site benotzt gi werten',
	'g-large' => 'Grouss',
	'g-list-title' => 'Lëscht vun de Cadeaue vum $1',
	'g-main-page' => 'Haaptsäit',
	'g-medium' => 'Mëttel',
	'g-mediumlarge' => 'Mëttelgrouss',
	'g-new' => 'nei',
	'g-next' => 'Nächst',
	'g-previous' => 'Vireg',
	'g-remove' => 'Ewechhuelen',
	'g-remove-gift' => 'Dëse Cadeau ewechhuelen',
	'g-remove-message' => 'Sidd Dir sécher datt Dir de Cadeau "$1" ewechhuele wëllt?',
	'g-recent-recipients' => 'Anerer déi dëse Cadeau viru kuerzem kritt hunn',
	'g-remove-success-title' => 'Dir hutt de Cadeau "$1" ewechgeholl',
	'g-remove-success-message' => 'De Cadeau "$1" gouf ewechgeholl.',
	'g-remove-title' => '"$1" ewechhuelen?',
	'g-send-gift' => 'Cadeau schécken',
	'g-select-a-friend' => 'a Frënd auswielen',
	'g-sent-title' => 'Dir hutt dem $1 e Cadeau geschéckt',
	'g-sent-message' => 'Dir hutt dem $1 dëse Cadeau geschéckt.',
	'g-small' => 'Kleng',
	'g-to-another' => 'Engem Anere ginn',
	'g-uploadsuccess' => 'Eroplueden ofgeschloss',
	'g-viewgiftlist' => 'Lëscht vun de Cadeaue kucken',
	'g-your-profile' => 'Äre Profil',
	'gift_received_subject' => 'De Benotzer $1 huet Iech de Cadeau $2 op {{SITENAME}} gemaach!',
	'right-giftadmin' => 'Nei Cadeauen uleeën a bestoender änneren',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'g-created-by' => 'aangemaak door',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author Tvdm
 */
$messages['nl'] = array(
	'giftmanager' => 'Giftenbeheer',
	'giftmanager-addgift' => '+ Nieuwe gift toevoegen',
	'giftmanager-access' => 'gifttoegang',
	'giftmanager-description' => 'giftomschrijving',
	'giftmanager-giftimage' => 'giftafbeelding',
	'giftmanager-image' => 'afbeelding toevoegen/vervangen',
	'giftmanager-giftcreated' => 'De gift is aangemaakt',
	'giftmanager-giftsaved' => 'De gift is opgeslagen',
	'giftmanager-public' => 'publiek',
	'giftmanager-private' => 'privé',
	'giftmanager-view' => 'Giftenlijst weergeven',
	'g-add-message' => 'Een bericht toevoegen',
	'g-back-edit-gift' => 'Terug naar gift bewerken',
	'g-back-gift-list' => 'Terug naar giftenlijst',
	'g-back-link' => '< Terug naar de pagina van $1',
	'g-choose-file' => 'Bestand kiezen:',
	'g-cancel' => 'Annuleren',
	'g-count' => '$1 heeft $2 {{PLURAL:$2|gift|giften}}.',
	'g-create-gift' => 'Gift aanmaken',
	'g-created-by' => 'aangemaakt door',
	'g-current-image' => 'Huidige afbeelding',
	'g-delete-message' => 'Weet u zeker dat u de gift "$1" wilt verwijderen? Dit zal hem ook verwijderen van gebruikers die hem ontvangen hebben.',
	'g-description-title' => 'De gift "$2" van $1',
	'g-error-do-not-own' => 'U bezit deze gift niet.',
	'g-error-message-blocked' => 'U bent momenteel geblokkeerd en u kunt geen giften geven',
	'g-error-message-invalid-link' => 'De verwijzing die u hebt ingevoerd is ongeldig.',
	'g-error-message-login' => 'U dient in te loggen om giften te kunnen geven',
	'g-error-message-no-user' => 'De gebruiker die u wilt weergeven bestaat niet.',
	'g-error-message-to-yourself' => 'U kunt geen gift aan uzelf geven.',
	'g-error-title' => 'Oeps, er ging iets fout!',
	'g-file-instructions' => 'Uw afbeelding dient een JPEG-, PNG- of GIF-bestand (niet geanimeerd) te zijn en moet minder dan 100 KB in grootte zijn.',
	'g-from' => 'van <a href="$1">$2</a>',
	'g-gift' => 'gift',
	'g-gift-name' => 'giftnaam',
	'g-give-gift' => 'Gift geven',
	'g-give-all' => 'Wilt u $1 een gift geven? Klik dan op één van de onderstaande giften en klik vervolgens op "Gift verzenden". Het is erg gemakkelijk.',
	'g-give-all-message-title' => 'Een bericht toevoegen',
	'g-give-all-title' => 'Een gift aan $1 geven',
	'g-give-enter-friend-title' => 'Indien u de gebruikersnaam weet, voert u die hieronder in',
	'g-given' => 'Deze gift is $1 {{PLURAL:$1|keer|keren}} gegeven',
	'g-give-list-friends-title' => 'Selecteren uit uw vriendenlijst',
	'g-give-list-select' => 'selecteer een vriend',
	'g-give-separator' => 'of',
	'g-give-no-user-message' => 'Giften en prijzen zijn een goede manier om waardering te tonen voor de verdiensten van uw vrienden!',
	'g-give-no-user-title' => 'Aan wie wilt u een gift geven?',
	'g-give-to-user-title' => 'De gift "$1" naar $2 sturen',
	'g-give-to-user-message' => 'Wilt u $1 een <a href="$2">andere gift geven</a>?',
	'g-go-back' => 'Teruggaan',
	'g-imagesbelow' => 'Hieronder volgen uw afbeeldingen die op de site gebruikt zullen worden',
	'g-large' => 'Groot',
	'g-list-title' => 'Giftenlijst van $1',
	'g-main-page' => 'Hoofdpagina',
	'g-medium' => 'Middelmatig',
	'g-mediumlarge' => 'Middelgroot',
	'g-new' => 'nieuw',
	'g-next' => 'Volgende',
	'g-previous' => 'Vorige',
	'g-remove' => 'Verwijderen',
	'g-remove-gift' => 'Deze gift verwijderen',
	'g-remove-message' => 'Weet u zeker dat u de gift "$1" wilt verwijderen?',
	'g-recent-recipients' => 'Andere recente ontvangers van deze gift',
	'g-remove-success-title' => 'U hebt de gift "$1" succesvol verwijderd',
	'g-remove-success-message' => 'De gift "$1" is verwijderd.',
	'g-remove-title' => '"$1" verwijderen?',
	'g-send-gift' => 'Gift verzenden',
	'g-select-a-friend' => 'selecteer een vriend',
	'g-sent-title' => 'U hebt een gift verzonden aan $1',
	'g-sent-message' => 'U hebt de volgende gift aan $1 gestuurd.',
	'g-small' => 'Klein',
	'g-to-another' => 'Aan iemand anders geven',
	'g-uploadsuccess' => 'Uploaden voltooid',
	'g-viewgiftlist' => 'Giftenlijst weergeven',
	'g-your-profile' => 'Uw profiel',
	'gift_received_subject' => '$1 hebt u de $2-gift gezonden op {{SITENAME}}!',
	'gift_received_body' => 'Hallo $1,

$2 heeft u zojuist de $3-gift gestuurd op {{SITENAME}}.

Wilt u het bericht lezen dat $2 voor u gemaakt hebt en uw gift weergeven? Klik dan op de onderstaande verwijzing:

$4

We hopen dat u er blij mee bent!

Bedankt,


Het {{SITENAME}}-team

---

Wilt u geen e-mails meer van ons ontvangen?

Klik op $5 en wijzig uw instellingen om e-mailwaarschuwingen uit te schakelen.',
	'right-giftadmin' => 'Een nieuwe gift aanmaken en bestaande giften bewerken',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'giftmanager' => 'Gåvehandsamar',
	'giftmanager-addgift' => '+ legg til ei ny gåva',
	'giftmanager-access' => 'gåvetilgjenge',
	'giftmanager-description' => 'skildring av gåva',
	'giftmanager-giftimage' => 'gåvebilete',
	'giftmanager-image' => 'legg til/erstatt bilete',
	'giftmanager-giftcreated' => 'Gåva har vorten oppretta',
	'giftmanager-giftsaved' => 'Gåva har vorten lagra',
	'giftmanager-public' => 'offentleg',
	'giftmanager-private' => 'privat',
	'giftmanager-view' => 'Sjå gåvelista',
	'g-add-message' => 'Legg til ei melding',
	'g-back-edit-gift' => 'Attende til endring av gåva',
	'g-back-gift-list' => 'Attende til gåvelista',
	'g-back-link' => '< attende til sida til $1',
	'g-choose-file' => 'Vel fil:',
	'g-cancel' => 'Avrbyt',
	'g-count' => '$1 har $2 {{PLURAL:$2|éi gåva|gåver}}.',
	'g-create-gift' => 'Opprett gåva',
	'g-created-by' => 'oppretta av',
	'g-current-image' => 'Noverande bilete',
	'g-delete-message' => 'Er du sikker på at du vil sletta gåva «$1»? Dette vil òg sletta ho frå brukaren som kanskje har fått ho.',
	'g-description-title' => 'gåva «$2» til $1',
	'g-error-do-not-own' => 'Du eig ikkje denne gåva.',
	'g-error-message-blocked' => 'Du er på noverande tidspunkt blokkert og kan ikkje senda gåver.',
	'g-error-message-invalid-link' => 'Lenkja du oppgav er ugyldig.',
	'g-error-message-login' => 'Du lyt vera innlogga for å kunna gje gåver.',
	'g-error-message-no-user' => 'Brukaren du ynskjer å sjå finst ikkje.',
	'g-error-message-to-yourself' => 'Du kan ikkje gje ei gåva til deg sjølv.',
	'g-error-title' => 'Oi, du svingte feil!',
	'g-file-instructions' => 'Biletet ditt lyt vera eit jpeg, png eller gif (ingen animerte gif-filer) og ha ein storleik på mindre enn 100 kb.',
	'g-from' => 'frå <a href="$1">$2</a>',
	'g-gift' => 'gåva',
	'g-gift-name' => 'gåvenamn',
	'g-give-gift' => 'Gje ei gåva',
	'g-give-all' => 'Ynskjer du å gje $1 ei gåva? Trykk på ei av gåvene nedanfor og trykk so på «Send gåva». So enkelt er det.',
	'g-give-all-message-title' => 'Legg til ei melding',
	'g-give-all-title' => 'Gje ei gåva til $1',
	'g-give-enter-friend-title' => 'Viss du kjenner namnet på brukaren, skriv det inn under.',
	'g-given' => 'Denne gåva har vorten gjeven {{PLURAL:$1|éin gong|$1 gonger}}',
	'g-give-list-friends-title' => 'Vel frå lista di over venner',
	'g-give-list-select' => 'vel ein venn',
	'g-give-separator' => 'eller',
	'g-give-no-user-message' => 'Gåver og utmerkingar er ein flott måte å visa at du set pris på vennene dine.',
	'g-give-no-user-title' => 'Kven ynskjer du å gje ei gåva til?',
	'g-give-to-user-title' => 'Send gåva «$1» til $2',
	'g-give-to-user-message' => 'Ynskjer du å gje $1 ei <a href="$2">anna gåva</a>?',
	'g-go-back' => 'Attende',
	'g-imagesbelow' => 'Nedanfor er bileta dine som vil verta nytta på sida',
	'g-large' => 'Stort',
	'g-list-title' => 'gåvelista til $1',
	'g-main-page' => 'Hovudsida',
	'g-medium' => 'Medels',
	'g-mediumlarge' => 'Medelsstort',
	'g-new' => 'ny',
	'g-next' => 'Neste',
	'g-previous' => 'Førre',
	'g-remove' => 'Fjern',
	'g-remove-gift' => 'Fjern denne gåva',
	'g-remove-message' => 'Er du sikker på at du ynskjer å fjerna gåva «$1»?',
	'g-recent-recipients' => 'Andre som nyleg mottok denne gåva',
	'g-remove-success-title' => 'Gåva «$1» vart fjerna av deg',
	'g-remove-success-message' => 'Gåva «$1» vart fjerna.',
	'g-remove-title' => 'Fjerna «$1»?',
	'g-send-gift' => 'Send gåva',
	'g-select-a-friend' => 'vel ein venn',
	'g-sent-title' => 'Du har sendt ei gåva til $1',
	'g-sent-message' => 'Du har sendt den følgjande gåva til $1.',
	'g-small' => 'Lite',
	'g-to-another' => 'Gje til nokon andre',
	'g-uploadsuccess' => 'Opplasting lukkast',
	'g-viewgiftlist' => 'Sjå gåvelista',
	'g-your-profile' => 'Profilen din',
	'gift_received_subject' => '$1 har sendt deg gåva «$2» på {{SITENAME}}!',
	'gift_received_body' => 'Hei $1:

$2 sendte deg nett $3-gåva på {{SITENAME}}.

Ynskjer du å sjå merknaden $2 lét att til deg, og å sjå gåva?  Trykk på lenkja nedanfor:

$4

Me håpar du vil lika ho!

Takk,


{{SITENAME}}-laget

----

Vil du ikkje lenger motta e-postar frå oss?

Trykk $5
og endra innstillingane dine for å slå av e-postmeldingar.',
	'right-giftadmin' => 'Opprett nye og endra eksisterande gåver',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'g-add-message' => 'Legg til en melding',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'giftmanager' => 'Gestionari de presents',
	'giftmanager-addgift' => '+ Apondre un present novèl',
	'giftmanager-access' => 'accès al present',
	'giftmanager-description' => 'descripcion del present',
	'giftmanager-giftimage' => 'imatge del present',
	'giftmanager-image' => "apondre / remplaçar l'imatge",
	'giftmanager-giftcreated' => 'Lo present es estat creat',
	'giftmanager-giftsaved' => 'Lo present es estat salvat',
	'giftmanager-public' => 'public',
	'giftmanager-private' => 'privat',
	'giftmanager-view' => 'Veire la lista dels presents',
	'g-add-message' => 'Apondre un messatge',
	'g-back-edit-gift' => "Tornar a la modificacion d'aqueste present",
	'g-back-gift-list' => 'Tornar a la lista dels presents',
	'g-back-link' => '< Tornar a la pagina de $1',
	'g-choose-file' => 'Causir lo fichièr :',
	'g-cancel' => 'Anullar',
	'g-count' => '$1 a $2 {{PLURAL:$2|present|presents}}.',
	'g-create-gift' => 'Crear un present',
	'g-created-by' => 'creat per',
	'g-current-image' => 'Imatge actual',
	'g-delete-message' => "Sètz segur(a) que volètz suprimir lo present « $1 » ? Aquò o suprimirà tanben als utilizaires que l'an recebut.",
	'g-description-title' => 'Present « $2 » de $1',
	'g-error-do-not-own' => 'Possedètz pas aqueste present.',
	'g-error-message-blocked' => 'Sètz blocat(ada) e doncas, podètz pas donar de presents',
	'g-error-message-invalid-link' => "Lo ligam qu'avètz provesit es invalid.",
	'g-error-message-login' => 'Vos cal vos connectar per donar de presents',
	'g-error-message-no-user' => "L'utilizaire qu'ensajatz de veire existís pas.",
	'g-error-message-to-yourself' => 'Podètz pas vos donar un present a vos meteis.',
	'g-error-title' => 'Ops, avètz pres un marrit torn !',
	'g-file-instructions' => 'Vòstre imatge deu èsser jpeg, png o gif (mas pas animada) e deu èsser mai pichona que 100 Ko.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'present',
	'g-gift-name' => 'nom del present',
	'g-give-gift' => 'Donar lo present',
	'g-give-all' => 'Enveja de donar un present a $1 ? Clicatz sus un present çaijós e clicatz enseguida sus « Mandar lo present ». Es aisit.',
	'g-give-all-message-title' => 'Apondre un messatge',
	'g-give-all-title' => 'Donar un present a $1',
	'g-give-enter-friend-title' => "Se coneissètz lo nom de l'utilizaire, picatz-o çaijós",
	'g-given' => 'Lo present es estat donat $1 {{PLURAL:$1|còp|còps}}',
	'g-give-list-friends-title' => 'Seleccionatz dempuèi la lista de vòstres amics',
	'g-give-list-select' => 'seleccionatz un amic',
	'g-give-separator' => 'o',
	'g-give-no-user-message' => 'Los presents e prèmis son plan per far conéisser vòstres amics !',
	'g-give-no-user-title' => 'A qui volètz donar un present ?',
	'g-give-to-user-title' => 'Mandar lo present « $1 » a $2',
	'g-give-to-user-message' => 'Enveja de donar un present diferent <a href="$2">un present diferent</a> a $1 ?',
	'g-go-back' => 'Tornar',
	'g-imagesbelow' => 'Los imatges que seràn utilizats sul sit son afichats çaijós',
	'g-large' => 'Grand',
	'g-list-title' => 'Lista dels presents de $1',
	'g-main-page' => 'Acuèlh',
	'g-medium' => 'Mejan',
	'g-mediumlarge' => 'Mejan-Grand',
	'g-new' => 'novèl',
	'g-next' => 'Seguent',
	'g-previous' => 'Precedent',
	'g-remove' => 'Levar',
	'g-remove-gift' => 'Levar aqueste present',
	'g-remove-message' => 'Sètz segur(a) que volètz levar lo present « $1 » ?',
	'g-recent-recipients' => "Autres beneficiaris recents d'aqueste present",
	'g-remove-success-title' => 'Avètz levat lo present « $1 » amb succès',
	'g-remove-success-message' => 'Lo present « $1 » es estat levat.',
	'g-remove-title' => 'Levar « $1 » ?',
	'g-send-gift' => 'Mandar lo present',
	'g-select-a-friend' => 'seleccionatz un amic',
	'g-sent-title' => 'Avètz mandat lo present a $1',
	'g-sent-message' => 'Avètz mandat lo present seguent a $1.',
	'g-small' => 'Pichon',
	'g-to-another' => "Donar a qualqu'un mai",
	'g-uploadsuccess' => 'Telecargament efectuat amb succès',
	'g-viewgiftlist' => 'Veire la lista dels presents',
	'g-your-profile' => 'Vòstre perfil',
	'gift_received_subject' => '$1 vos a mandat lo present $2 sus {{SITENAME}} !',
	'gift_received_body' => "Bonjorn $1,

$2 vos ven de mandar lo present $3 sus {{SITENAME}}.

Volètz veire la nòta $2 que vos es adreçada e veire vòstre present ? Clicatz sul ligam çaijós :

$4

Esperam que vos agradarà !

Mercés,


L'equipa de {{SITENAME}}

---

Volètz pas recebre mai de corrièrs electronics de nòstra part ?

Clicatz $5
e modificatz vòstras preferéncias per desactivar las notificacions per corrièr electronic.",
	'right-giftadmin' => "Crear de presents novèls e modificar los qu'existisson",
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'g-cancel' => 'Нæ бæззы',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'g-main-page' => 'Haaptblatt',
	'g-next' => 'Neegscht',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'giftmanager' => 'Zarządzanie prezentami',
	'giftmanager-addgift' => '+ Dodaj nowy prezent',
	'giftmanager-access' => 'dostęp do prezentu',
	'giftmanager-description' => 'opis prezentu',
	'giftmanager-giftimage' => 'obrazu prezentu',
	'giftmanager-image' => 'Dodaj lub zastąp grafikę',
	'giftmanager-giftcreated' => 'Prezent został utworzony',
	'giftmanager-giftsaved' => 'Prezent został zapisany',
	'giftmanager-public' => 'publiczny',
	'giftmanager-private' => 'prywatny',
	'giftmanager-view' => 'Zobacz listę prezentów',
	'g-add-message' => 'Dodaj wiadomość',
	'g-back-edit-gift' => 'Powrót do edycji tego prezentu',
	'g-back-gift-list' => 'Powrót do listy prezentów',
	'g-back-link' => '< Powrót do strony $1',
	'g-choose-file' => 'Wybierz plik',
	'g-cancel' => 'Anuluj',
	'g-count' => '$1 otrzymał $2 {{PLURAL:$2|prezent|prezenty|prezentów}}.',
	'g-create-gift' => 'Tworzenie prezentu',
	'g-created-by' => 'utworzony przez',
	'g-current-image' => 'Aktualna grafika',
	'g-delete-message' => 'Czy jesteś pewien, że chcesz usunąć prezent „$1”?
Spowoduje to również usunięcie go u użytkowników, którzy go otrzymali.',
	'g-description-title' => 'Prezent „$2” od $1',
	'g-error-do-not-own' => 'Nie masz tego prezentu.',
	'g-error-message-blocked' => 'Jesteś obecnie zablokowany i nie możesz dawać prezentów',
	'g-error-message-invalid-link' => 'Link który wprowadziłeś jest nieprawidłowy.',
	'g-error-message-login' => 'Należy zalogować się aby dawać prezenty',
	'g-error-message-no-user' => 'Użytkownik, którego próbujesz wyświetlić nie istnieje.',
	'g-error-message-to-yourself' => 'Nie można dać prezentu samemu siebie.',
	'g-error-title' => 'Ojej. Nie można tego zrobić!',
	'g-file-instructions' => 'Obrazek musi być w formacie jpeg, png lub gif (gif bez animacji) oraz musi być mniejszy niż 100kb.',
	'g-from' => 'od <a href="$1">$2</a>',
	'g-gift' => 'prezent',
	'g-gift-name' => 'nazwa prezentu',
	'g-give-gift' => 'Daj prezent',
	'g-give-all' => 'Chcesz ofiarować $1 prezent?
Wystarczy kliknąć jeden z prezentów poniżej, a następnie przycisk „Wyślij prezent”.
To bardzo łatwe.',
	'g-give-all-message-title' => 'Dodaj wiadomość',
	'g-give-all-title' => 'Prezent dla $1',
	'g-give-enter-friend-title' => 'Jeśli znasz nazwę użytkownika, wpisz ją poniżej',
	'g-given' => 'Ten prezent został podarowany $1 {{PLURAL:$1|raz|razy}}',
	'g-give-list-friends-title' => 'Wybierz z listy przyjaciół',
	'g-give-list-select' => 'wybierz znajomego',
	'g-give-separator' => 'lub',
	'g-give-no-user-message' => 'Prezenty i nagrody to świetny sposób aby okazać swoją przyjaźń!',
	'g-give-no-user-title' => 'Komu chciałbyś dać prezent?',
	'g-give-to-user-title' => 'Wyślij prezent „$1” do $2',
	'g-give-to-user-message' => 'Czy chcesz dać $1 <a href="$2">inny prezent</a>?',
	'g-go-back' => 'Wróć',
	'g-imagesbelow' => 'Poniżej znajdują się Twoje grafiki, które zostaną wykorzystane na stronie',
	'g-large' => 'Duży',
	'g-list-title' => 'lista prezentów $1',
	'g-main-page' => 'Strona główna',
	'g-medium' => 'Średni',
	'g-mediumlarge' => 'Średnio–duży',
	'g-new' => 'nowy',
	'g-next' => 'Następny',
	'g-previous' => 'Poprzedni',
	'g-remove' => 'Usuń',
	'g-remove-gift' => 'Usuń ten prezent',
	'g-remove-message' => 'Czy na pewno chcesz usunąć prezent „$1”?',
	'g-recent-recipients' => 'Pozostali ostatnio obdarowani tym darem',
	'g-remove-success-title' => 'Usunąłeś prezent „$1”',
	'g-remove-success-message' => 'Prezent „$1” został usunięty.',
	'g-remove-title' => 'Usunąć „$1”?',
	'g-send-gift' => 'Wyślij prezent',
	'g-select-a-friend' => 'wybierz znajomego',
	'g-sent-title' => 'Wysłałeś prezent do $1',
	'g-sent-message' => 'Wysłałeś następujący prezent do $1.',
	'g-small' => 'Mały',
	'g-to-another' => 'Daj komuś innemu',
	'g-uploadsuccess' => 'Przesłano',
	'g-viewgiftlist' => 'Zobacz listę prezentów',
	'g-your-profile' => 'Twój profil',
	'gift_received_subject' => '$1 dał Ci prezent $2 na {{GRAMMAR:MS.lp|{{SITENAME}}}}!',
	'right-giftadmin' => 'Tworzenie nowych oraz edytowanie istniejących prezentów',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Vanessa Sabino
 * @author Waldir
 */
$messages['pt'] = array(
	'giftmanager' => 'Gerenciador de Presentes',
	'giftmanager-addgift' => '+ Adicionar Novo Presente',
	'giftmanager-access' => 'acesso ao presente',
	'giftmanager-description' => 'descrição do presente',
	'giftmanager-giftimage' => 'imagem do presente',
	'giftmanager-image' => 'adicionar/substituir imagem',
	'giftmanager-giftcreated' => 'O presente foi criado',
	'giftmanager-giftsaved' => 'O presente foi salvo',
	'giftmanager-public' => 'público',
	'giftmanager-private' => 'privado',
	'giftmanager-view' => 'Ver Lista de Presentes',
	'g-add-message' => 'Adicionar Mensagem',
	'g-back-edit-gift' => 'Volar para Editar Este Presente',
	'g-back-gift-list' => 'Voltar para Lista de Presentes',
	'g-back-link' => '< Voltar para página de $1',
	'g-choose-file' => 'Escolher Arquivo:',
	'g-cancel' => 'Cancelar',
	'g-count' => '$1 tem $2 {{PLURAL:$2|presente|presentes}}.',
	'g-create-gift' => 'Presente criado',
	'g-created-by' => 'criado por',
	'g-current-image' => 'Imagem Atual',
	'g-delete-message' => 'Você tem certeza de que quer excluir o presente "$1"? Isto também irá excluí-lo que usuários que podem tê-lo recebido.',
	'g-description-title' => 'presente "$2" de $1',
	'g-error-do-not-own' => 'Você não possui este presente.',
	'g-error-message-blocked' => 'Você está bloqueado atualmente e não pode dar presentes',
	'g-error-message-invalid-link' => 'O link que você entrou é inválido.',
	'g-error-message-login' => 'Você precisa estar logado para enviar presentes',
	'g-error-message-no-user' => 'O utilizador que você está tentando ver não existe.',
	'g-error-message-to-yourself' => 'Você não pode dar um presente a si mesmo',
	'g-error-title' => 'Ops, você entrou no lugar errado!',
	'g-file-instructions' => 'Sua imagem precisa ser um jpeg, png or gif (sem gifs animados), e precisa ter tamanho menor que 100kb.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'presente',
	'g-gift-name' => 'nome do presente',
	'g-give-gift' => 'Dar Presente',
	'g-give-all' => 'Quer dar um presente para $1? Apenas clique em um dos presentes abaixo e clique em "Enviar Presente". É fácil assim.',
	'g-give-all-message-title' => 'Adicionar Mensagem',
	'g-give-all-title' => 'Dar um Presente para $1',
	'g-give-enter-friend-title' => 'Se você sabe o nome do utilizador, escreva-o abaixo',
	'g-given' => 'Este presente foi dado $1 {{PLURAL:$1|vez|vezes}}',
	'g-give-list-friends-title' => 'Selecione da sua lista de amigos',
	'g-give-list-select' => 'selecione um amigo',
	'g-give-separator' => 'ou',
	'g-give-no-user-message' => 'Presentes e prêmios são uma ótima maneira de dar reconhecimento aos seus amigos!',
	'g-give-no-user-title' => 'Para quem você gostaria de dar um presente?',
	'g-give-to-user-title' => 'Enviar presente "$1" para $2',
	'g-give-to-user-message' => 'Quer dar a $1 um <a href="$2">presente diferente</a>?',
	'g-go-back' => 'Voltar',
	'g-imagesbelow' => 'Abaixo estão as imagens que serão usadas no site',
	'g-large' => 'Grande',
	'g-list-title' => 'Lista de Presentes de$1',
	'g-main-page' => 'Página Principal',
	'g-medium' => 'Médio',
	'g-mediumlarge' => 'Médio-Grande',
	'g-new' => 'novo',
	'g-next' => 'Próximo',
	'g-previous' => 'Anterior',
	'g-remove' => 'Remover',
	'g-remove-gift' => 'Remover este Presente',
	'g-remove-message' => 'Tem certeza de que deseja remover o presente "$1"?',
	'g-recent-recipients' => 'Outros ganhadores deste presente',
	'g-remove-success-title' => 'Você removeu com sucesso o presente "$1"',
	'g-remove-success-message' => 'O presente "$1" foi removido.',
	'g-remove-title' => 'Remover "$1"?',
	'g-send-gift' => 'Enviar Presente',
	'g-select-a-friend' => 'selecionar um amigo',
	'g-sent-title' => 'Você enviou um presente para $1',
	'g-sent-message' => 'Você enviou o presente seguinte para $1.',
	'g-small' => 'Pequeno',
	'g-to-another' => 'Dar para Outra Pessoa',
	'g-uploadsuccess' => 'Upload bem sucedido',
	'g-viewgiftlist' => 'Ver Lista de Presentes',
	'g-your-profile' => 'Seu Perfil',
	'gift_received_subject' => '$1 enviou para você o Presente $2 Gift em {{SITENAME}}!',
	'gift_received_body' => 'Oi $1:

$2 acabou de enviar o presente $3 em {{SITENAME}}.

Quer ler o recado que $2 deixou e ver seu presente? Clique no link abaixo:

$4

Esperamos que tenha gostado!

Obrigado,


O Time de {{SITENAME}}

---

Ei, quer parer de receber e-mails de nós?

Clique $5
e altere suas preferências para desabilitar e-mails de notificação.',
	'right-giftadmin' => 'Crie novas e edite ofertas existentes',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'giftmanager' => 'Gerenciador de Presentes',
	'giftmanager-addgift' => '+ Adicionar Novo Presente',
	'giftmanager-access' => 'acesso ao presente',
	'giftmanager-description' => 'descrição do presente',
	'giftmanager-giftimage' => 'imagem do presente',
	'giftmanager-image' => 'adicionar/substituir imagem',
	'giftmanager-giftcreated' => 'O presente foi criado',
	'giftmanager-giftsaved' => 'O presente foi salvo',
	'giftmanager-public' => 'público',
	'giftmanager-private' => 'privado',
	'giftmanager-view' => 'Ver Lista de Presentes',
	'g-add-message' => 'Adicionar Mensagem',
	'g-back-edit-gift' => 'Voltar para Editar Este Presente',
	'g-back-gift-list' => 'Voltar para Lista de Presentes',
	'g-back-link' => '< Voltar para página de $1',
	'g-choose-file' => 'Escolher Arquivo:',
	'g-cancel' => 'Cancelar',
	'g-count' => '$1 tem $2 {{PLURAL:$2|presente|presentes}}.',
	'g-create-gift' => 'Criar Presente',
	'g-created-by' => 'criado por',
	'g-current-image' => 'Imagem Atual',
	'g-delete-message' => 'Você tem certeza de que quer excluir o presente "$1"? Isto também irá excluí-lo de usuários que podem tê-lo recebido.',
	'g-description-title' => 'presente "$2" de $1',
	'g-error-do-not-own' => 'Você não possui este presente.',
	'g-error-message-blocked' => 'Você está bloqueado atualmente e não pode dar presentes',
	'g-error-message-invalid-link' => 'A ligação em que você entrou é inválida.',
	'g-error-message-login' => 'Você precisa estar autenticado para enviar presentes',
	'g-error-message-no-user' => 'O utilizador que você está tentando ver não existe.',
	'g-error-message-to-yourself' => 'Você não pode dar um presente a si mesmo',
	'g-error-title' => 'Ops, você entrou no lugar errado!',
	'g-file-instructions' => 'Sua imagem precisa ser um jpeg, png or gif (sem gifs animados), e precisa ter tamanho menor que 100kb.',
	'g-from' => 'de <a href="$1">$2</a>',
	'g-gift' => 'presente',
	'g-gift-name' => 'nome do presente',
	'g-give-gift' => 'Dar Presente',
	'g-give-all' => 'Quer dar um presente para $1?
Apenas clique em um dos presentes abaixo e clique em "Enviar Presente".
É fácil assim.',
	'g-give-all-message-title' => 'Adicionar Mensagem',
	'g-give-all-title' => 'Dar um Presente para $1',
	'g-give-enter-friend-title' => 'Se você sabe o nome do utilizador, escreva-o abaixo',
	'g-given' => 'Este presente foi dado $1 {{PLURAL:$1|vez|vezes}}',
	'g-give-list-friends-title' => 'Selecione da sua lista de amigos',
	'g-give-list-select' => 'selecione um amigo',
	'g-give-separator' => 'ou',
	'g-give-no-user-message' => 'Presentes e prêmios são uma ótima maneira de dar reconhecimento aos seus amigos!',
	'g-give-no-user-title' => 'Para quem você gostaria de dar um presente?',
	'g-give-to-user-title' => 'Enviar presente "$1" para $2',
	'g-give-to-user-message' => 'Quer dar a $1 um <a href="$2">presente diferente</a>?',
	'g-go-back' => 'Voltar',
	'g-imagesbelow' => 'Abaixo estão as imagens que serão usadas no site',
	'g-large' => 'Grande',
	'g-list-title' => 'Lista de Presentes de $1',
	'g-main-page' => 'Página Principal',
	'g-medium' => 'Médio',
	'g-mediumlarge' => 'Médio-Grande',
	'g-new' => 'novo',
	'g-next' => 'Próximo',
	'g-previous' => 'Anterior',
	'g-remove' => 'Remover',
	'g-remove-gift' => 'Remover este Presente',
	'g-remove-message' => 'Tem certeza de que deseja remover o presente "$1"?',
	'g-recent-recipients' => 'Outros ganhadores deste presente',
	'g-remove-success-title' => 'Você removeu com sucesso o presente "$1"',
	'g-remove-success-message' => 'O presente "$1" foi removido.',
	'g-remove-title' => 'Remover "$1"?',
	'g-send-gift' => 'Enviar Presente',
	'g-select-a-friend' => 'selecionar um amigo',
	'g-sent-title' => 'Você enviou um presente para $1',
	'g-sent-message' => 'Você enviou o seguinte presente para $1.',
	'g-small' => 'Pequeno',
	'g-to-another' => 'Dar para Outra Pessoa',
	'g-uploadsuccess' => 'Carregamento bem sucedido',
	'g-viewgiftlist' => 'Ver Lista de Presentes',
	'g-your-profile' => 'Seu Perfil',
	'gift_received_subject' => '$1 enviou para você o Presente $2 Gift em {{SITENAME}}!',
	'gift_received_body' => 'Oi $1:

$2 acabou de enviar o presente $3 em {{SITENAME}}.

Quer ler o recado que $2 deixou e ver seu presente? Clique na ligação abaixo:

$4

Esperamos que tenha gostado!

Obrigado,


O Time de {{SITENAME}}

---

Ei, quer parer de receber e-mails de nós?

Clique $5
e altere suas preferências para desabilitar e-mails de notificação.',
	'right-giftadmin' => 'Crie novos e edite presentes existentes',
);

/** Romanian (Română)
 * @author Mihai
 */
$messages['ro'] = array(
	'g-next' => 'Următorul',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'giftmanager' => 'Gestore de le riale',
	'giftmanager-addgift' => "+ Aggiunge 'nu riale nuève",
	'giftmanager-access' => 'accede a le riale',
	'giftmanager-description' => "descrizione d'u riale",
	'giftmanager-giftimage' => "immagine d'u riale",
	'giftmanager-image' => "aggiunge/cange 'n'immaggine",
	'giftmanager-giftcreated' => "'U riale ha state ccrejate",
	'giftmanager-giftsaved' => "'U riale ha state reggistrate",
	'giftmanager-public' => 'pubbliche',
	'giftmanager-private' => 'private',
	'giftmanager-view' => "Vide 'a liste de le riale",
	'g-add-message' => "Aggiunge 'nu messagge",
	'g-gift' => 'riale',
	'g-gift-name' => "nome d'u riale",
	'g-give-gift' => "Fà 'u riale",
	'g-give-separator' => 'o',
	'g-go-back' => 'Tuèrne rrete',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Innv
 * @author Rubin
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'giftmanager' => 'Управление подарками',
	'giftmanager-addgift' => '+ Добавить новый подарок',
	'giftmanager-access' => 'доступ подарка',
	'giftmanager-description' => 'описание подарка',
	'giftmanager-giftimage' => 'изображение подарка',
	'giftmanager-image' => 'добавить/заменить изображение',
	'giftmanager-giftcreated' => 'Подарок был создан',
	'giftmanager-giftsaved' => 'Подарок был сохранён',
	'giftmanager-public' => 'публичные',
	'giftmanager-private' => 'частные',
	'giftmanager-view' => 'Просмотр списка подарков',
	'g-add-message' => 'Добавить сообщение',
	'g-back-edit-gift' => 'Вернуться к редактированию этого подарка',
	'g-back-gift-list' => 'Вернуться к списку подарков',
	'g-back-link' => '< Вернуться к странице $1',
	'g-choose-file' => 'Выберите файл:',
	'g-cancel' => 'Отмена',
	'g-count' => '$1 имеет $2 {{PLURAL:$2|подарок|подарка|подарков}}',
	'g-create-gift' => 'Создать подарок',
	'g-created-by' => 'создан',
	'g-current-image' => 'Текущее изображение',
	'g-delete-message' => 'Вы уверены, что хотите удалить подарок «$1»?
Это также удалит его у всех участников, которым он был передан.',
	'g-description-title' => 'Подарок $1 «$2»',
	'g-error-do-not-own' => 'Вы не владеете этим подарком.',
	'g-error-message-blocked' => 'Вы сейчас заблокированы и не можете дарить подарки',
	'g-error-message-invalid-link' => 'Введённая вами ссылка ошибочна.',
	'g-error-message-login' => 'Вы должны представиться системе, чтобы дарить подарки',
	'g-error-message-no-user' => 'Участник, которого вы хотите просмотреть, не существует',
	'g-error-message-to-yourself' => 'Вы не можете дарить подарки сами себе.',
	'g-error-title' => 'Опа, вы ввели неправильное название!',
	'g-file-instructions' => 'Ваше изображение должно быть в формате jpeg, png или gif (неанимированный gif), и быть меньше 100 КБ.',
	'g-from' => 'от <a href="$1">$2</a>',
	'g-gift' => 'подарок',
	'g-gift-name' => 'название подарка',
	'g-give-gift' => 'Подарить подарок',
	'g-give-all' => 'Хотите передать $1 подарок?
Выберите один из подарков ниже и нажмите «Отправить подарок».
Это просто.',
	'g-give-all-message-title' => 'Добавить сообщение',
	'g-give-all-title' => 'Подарить подарок для $1',
	'g-give-enter-friend-title' => 'Если вы знаете имя участника, введите его ниже',
	'g-given' => 'Этот подарок был подарен $1 {{PLURAL:$1|раз|раза|раза}}',
	'g-give-list-friends-title' => 'Выбор из вашего списка друзей',
	'g-give-list-select' => 'выбрать друга',
	'g-give-separator' => 'или',
	'g-give-no-user-message' => 'Подарки и награды — хороший способ отметить ваших друзей!',
	'g-give-no-user-title' => 'Кому бы вы хотели подарить подарок?',
	'g-give-to-user-title' => 'Отправить подарок «$1» к $2',
	'g-give-to-user-message' => 'Хотите подарить $1 <a href="$2">другой подарок</a>?',
	'g-go-back' => 'Назад',
	'g-imagesbelow' => 'Ниже находятся ваши изображения, которые будут использоваться на сайте',
	'g-large' => 'Большой',
	'g-list-title' => 'Список подарков $1',
	'g-main-page' => 'Заглавная страница',
	'g-medium' => 'Средний',
	'g-mediumlarge' => 'Средний-большой',
	'g-new' => 'новый',
	'g-next' => 'Следующий',
	'g-previous' => 'Предыдущий',
	'g-remove' => 'Удалить',
	'g-remove-gift' => 'Удалить этот подарок',
	'g-remove-message' => 'Вы действительно хотите удалить подарок «$1»?',
	'g-recent-recipients' => 'Другие недавние получатели этого подарка',
	'g-remove-success-title' => 'Вы успешно удалили подарок «$1»',
	'g-remove-success-message' => 'Подарок «$1» был удалён.',
	'g-remove-title' => 'Удалить «$1» ?',
	'g-send-gift' => 'Отправить подарок',
	'g-select-a-friend' => 'выберите из друзей',
	'g-sent-title' => 'Вы отправили подарок к $1',
	'g-sent-message' => 'Вы отправили следующий подарок к $1.',
	'g-small' => 'Маленький',
	'g-to-another' => 'Подарить кому-нибудь ещё',
	'g-uploadsuccess' => 'Загрузка успешно завершена',
	'g-viewgiftlist' => 'Просмотр списка подарков',
	'g-your-profile' => 'Ваш профиль',
	'gift_received_subject' => '$1 отправил вам подарок $2 на {{SITENAME}}!',
	'gift_received_body' => 'Здравствуйте, $1.

$2 только что отправил вам подарок $3 на {{SITENAME}}.

Хотите прочитать примечание $2, отправленное вам, и просмотреть ваш подарок? Нажмите ниже:

$4

Мы надеемся, что вам понравится!

Спасибо,


Команда {{SITENAME}}

---

Хотите остановить отправку вам электронной почты?

Нажмите $5
и измените ваши настройки, отключив отправку уведомлений по электронной почте.',
	'right-giftadmin' => 'создание новых и правка существующих подарков',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'giftmanager' => 'Správca darčekov',
	'giftmanager-addgift' => '+ Pridať nový darček',
	'giftmanager-access' => 'prístup k darčeku',
	'giftmanager-description' => 'popis darčeka',
	'giftmanager-giftimage' => 'obrázok darčeka',
	'giftmanager-image' => 'pridať/nahradiť obrázok',
	'giftmanager-giftcreated' => 'Darček bol vytvorený',
	'giftmanager-giftsaved' => 'Darček bol uložený',
	'giftmanager-public' => 'verejný',
	'giftmanager-private' => 'súkromný',
	'giftmanager-view' => 'Zobraziť zoznam darčekov',
	'g-add-message' => 'Pridať správu',
	'g-back-edit-gift' => 'Späť na Upraviť tento darček',
	'g-back-gift-list' => 'Späť na Zoznam darčekov',
	'g-back-link' => '< Späť na stránku $1',
	'g-choose-file' => 'Vybrať súbor:',
	'g-cancel' => 'Zrušiť',
	'g-count' => '$1 má $2 {{PLURAL:$2|darček|darčeky|darčekov}}.',
	'g-create-gift' => 'Vytvoriť darček',
	'g-created-by' => 'vytvoril',
	'g-current-image' => 'Aktuálny obrázok',
	'g-delete-message' => 'Ste si istý, že chcete vymazať darček „$1“? Tým ho vymažete aj používateľom, ktorí ho dostali.',
	'g-description-title' => 'darček „$2“, vytvoril $1',
	'g-error-do-not-own' => 'Nevlastníte tento darček',
	'g-error-message-blocked' => 'Momentálne ste zablokovaný a nemôžete dávať darčeky',
	'g-error-message-invalid-link' => 'Odkaz, ktorý ste zadali je neplatný.',
	'g-error-message-login' => 'Musíte sa prihlásiť, aby ste mohli dávať darčeky.',
	'g-error-message-no-user' => 'Používateľ, ktorého sa snažíte zobraziť, neexistuje.',
	'g-error-message-to-yourself' => 'Nemôžete darovať darček sebe.',
	'g-error-title' => 'Ops, niečo ste spravili zle!',
	'g-file-instructions' => 'Váš obrázok musí byť jpeg, png alebo gif (nie animovaný gif) a musí mať veľkosť menšiu ako 100 kb.',
	'g-from' => 'od <a href="$1">$2</a>',
	'g-gift' => 'darček',
	'g-gift-name' => 'názov darčeka',
	'g-give-gift' => 'Dať darček',
	'g-give-all' => 'Chcete dať používateľovi $1 darček? Stačí kliknúť na jeden z darčekov dolu a kliknúť na „Poslať darček“. Je to také jednoduché.',
	'g-give-all-message-title' => 'Pridať správu',
	'g-give-all-title' => 'Dať darček používateľovi $1',
	'g-give-enter-friend-title' => 'Ak poznáte meno používateľa, napíšte ho dolu',
	'g-given' => 'Tento darček bol darovaný {{PLURAL:$1|jedenkrát|$1-krát}}',
	'g-give-list-friends-title' => 'Vybrať z vášho zoznamu priateľov',
	'g-give-list-select' => 'vybrať priateľa',
	'g-give-separator' => 'alebo',
	'g-give-no-user-message' => 'Darčeky a ocenenia sú skvelým spôsobom ako oceniť vašich priateľov!',
	'g-give-no-user-title' => 'Komu by ste chceli darovať darček?',
	'g-give-to-user-title' => 'Poslať darček „$1“ používateľovi $2',
	'g-give-to-user-message' => 'Chcete dať používateľovi $1 <a href="$2">iný darček?</a>.',
	'g-go-back' => 'Vrátiť sa späť',
	'g-imagesbelow' => 'Dolu sú vaše obrázky, ktoré sa použijú na stránke',
	'g-large' => 'Veľký',
	'g-list-title' => 'Zoznam darčekov používateľa $1',
	'g-main-page' => 'Hlavná stránka',
	'g-medium' => 'Stredný',
	'g-mediumlarge' => 'Stredne veľký',
	'g-new' => 'nový',
	'g-next' => 'Ďalší',
	'g-previous' => 'Predošlý',
	'g-remove' => 'Odstrániť',
	'g-remove-gift' => 'Odstrániť tento Darček',
	'g-remove-message' => 'Ste si istý, že chcete odstrániť darček „$1“?',
	'g-recent-recipients' => 'Iní, ktorí nedávno dostali tento darček',
	'g-remove-success-title' => 'Úspešne ste odstránili darček „$1“',
	'g-remove-success-message' => 'Na vašu žiadosť bol odstránený darček „$1“.',
	'g-remove-title' => 'Odstrániť „$1“?',
	'g-send-gift' => 'Poslať darček',
	'g-select-a-friend' => 'vybrať priateľa',
	'g-sent-title' => 'Poslali ste darček používateľovi $1',
	'g-sent-message' => 'Poslali ste nasledovný darček používateľovi $1.',
	'g-small' => 'Malý',
	'g-to-another' => 'Dať niekomu inému',
	'g-uploadsuccess' => 'Nahrávanie prebehlo úspešne',
	'g-viewgiftlist' => 'Zobraziť zoznam darčekov',
	'g-your-profile' => 'Váš profil',
	'gift_received_subject' => '$1 vám poslal darček $2 na {{GRAMMAR:lokál|{{SITENAME}}}}',
	'gift_received_body' => 'Ahoj $1:

$1 vám práve poslal darček $3 na {{GRAMMAR:lokál|{{SITENAME}}}}

Chcete si prečítať komentár, ktorý vám $2 nechal a pozrieť si svoj darček? Kliknite na nasledovný odkaz:

$4

Dúfame, že sa vám bude páčiť!

Vďaka,


Tím {{GRAMMAR:genitív|{{SITENAME}}}}

---

Neželáte si od nás dostávať emaily?

Kliknite na $5
a zmeňte svoje nastavenia týkajúce sa upozornení emailom.',
	'right-giftadmin' => 'Vytvoriť nový alebo upraviť existujúce darčeky',
);

/** Slovenian (Slovenščina)
 * @author Smihael
 */
$messages['sl'] = array(
	'g-created-by' => 'ustvaril',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'giftmanager' => 'Менаџер за поклоне',
	'giftmanager-addgift' => '+ Пошаљи нови поклон',
	'giftmanager-access' => 'приступ поклонима',
	'giftmanager-description' => 'опис покона',
	'giftmanager-giftimage' => 'слика поклона',
	'giftmanager-image' => 'додај/замени слику',
	'giftmanager-giftcreated' => 'Поклон је направљен',
	'giftmanager-giftsaved' => 'Поклон је снимљен',
	'giftmanager-public' => 'јавно',
	'giftmanager-private' => 'приватно',
	'giftmanager-view' => 'Погледај списак поклона',
	'g-add-message' => 'Додај поруку',
	'g-back-edit-gift' => 'Повратак на измене овог поклона',
	'g-back-gift-list' => 'Повратак на списак поклона',
	'g-back-link' => '< Повратак на страну $1',
	'g-choose-file' => 'Изаберите фајл:',
	'g-cancel' => 'Поништи',
	'g-count' => '$1 има $2 {{PLURAL:$2|поклон|поклона}}.',
	'g-create-gift' => 'Направите поклон',
	'g-created-by' => 'направио/ла',
	'g-current-image' => 'Тренутна слика',
	'g-delete-message' => 'Да ли сте сигурни да желите да обришете поклон "$1"?
Ово ће га такође обрисати од корисника којима сте га поклонили.',
	'g-description-title' => 'Поклон "$2", од $1',
	'g-error-do-not-own' => 'Ви не поседујете овај поклон.',
	'g-error-message-blocked' => 'Тренутно сте блокирани и не можете слати поклоне',
	'g-error-message-invalid-link' => 'Линк који сте навели је неисправан.',
	'g-error-message-login' => 'Морате да се улогујете да бисте слали поклоне',
	'g-error-message-no-user' => 'Корисник кога покушавате да видите не постоји.',
	'g-error-message-to-yourself' => 'Не можете слати поклоне себи.',
	'g-file-instructions' => 'Ваша слика мора бити у jpeg/jpg, png или gif (неанимираном) формату, и мора бити мања од 100kB.',
	'g-from' => 'од <a href="$1">$2</a>',
	'g-gift' => 'поклон',
	'g-gift-name' => 'име поклона',
	'g-give-gift' => 'Пошаљите поклон',
	'g-give-all' => 'Желите ли да пошаљете $1 поклон?
Само изаберите неки од поклона испод и кликните "Слање поклона".
И већ ће бити послат.',
	'g-give-all-message-title' => 'Додај поруку',
	'g-give-all-title' => 'Пошаљи поклон $1',
	'g-give-enter-friend-title' => 'Ако знате име корисника, откуцајте га испод',
	'g-given' => 'Овај поклон је био послат $1 {{PLURAL:$1|пут|пута}}',
	'g-give-list-friends-title' => 'Изаберите са Вашег списка пријатеља',
	'g-give-list-select' => 'изаберите пријатеља',
	'g-give-separator' => 'или',
	'g-give-no-user-title' => 'Коме бисте волели да пошаљете поклон?',
	'g-give-to-user-title' => 'Слање поклона "$1" кориснику $2',
	'g-give-to-user-message' => 'Да ли желите да кориснику $1 пошаљете <a href="$2">неки други поклон</a>?',
	'g-go-back' => 'Повратак',
	'g-imagesbelow' => 'Испод се налазе ваше слике које ће бити коришћене на сајту',
	'g-large' => 'Велико',
	'g-list-title' => 'списак поклона од $1',
	'g-main-page' => 'Главна страна',
	'g-medium' => 'Средње',
	'g-mediumlarge' => 'Средње-велико',
	'g-new' => 'ново',
	'g-next' => 'Следеће',
	'g-previous' => 'Претходно',
	'g-remove' => 'Обриши',
	'g-remove-gift' => 'Обриши овај поклон',
	'g-remove-message' => 'Да ли сте сигурни да желите да обришете поклон "$1"?',
	'g-recent-recipients' => 'Други примаоци овог поклона',
	'g-remove-success-title' => 'Успешно сте обрисали поклон "$1"',
	'g-remove-success-message' => 'Поклон "$1" је обрисан.',
	'g-remove-title' => 'Обрисати "$1"?',
	'g-send-gift' => 'Слање поклона',
	'g-select-a-friend' => 'изабери пријатеља',
	'g-sent-title' => 'Послали сте поклон кориснику $1',
	'g-sent-message' => 'Послали сте следећи поклон корисинку $1.',
	'g-small' => 'Мало',
	'g-to-another' => 'Пошаљите поклон неком другом',
	'g-uploadsuccess' => 'Слање успешно',
	'g-viewgiftlist' => 'Погледајте списак поклона',
	'g-your-profile' => 'Ваш профил',
	'gift_received_subject' => '$1 Вам је послао/ла поклон $2 на {{SITENAME}}!',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'giftmanager-description' => 'బహుమతి వివరణ',
	'g-count' => '$1 కి $2 {{PLURAL:$2|బహుమతి ఉంది|బహుమతులు ఉన్నాయి}}.',
	'g-gift' => 'బహుమతి',
	'g-gift-name' => 'బహుమతి పేరు',
	'g-give-separator' => 'లేదా',
	'g-go-back' => 'వెనక్కి వెళ్ళు',
	'g-previous' => 'గత',
	'g-remove' => 'తొలగించు',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'giftmanager' => 'Tagapamahala ng mga Handog',
	'giftmanager-addgift' => '+ Magdagdag ng Bagong Handog',
	'giftmanager-access' => 'antas ng pagpunta sa handog',
	'giftmanager-description' => 'paglalarawan ng handog',
	'giftmanager-giftimage' => 'larawan ng handog',
	'giftmanager-image' => 'idagdag/palitan ang larawan',
	'giftmanager-giftcreated' => 'Nalikha na ang handog',
	'giftmanager-giftsaved' => 'Nasagip na ang handog',
	'giftmanager-public' => 'pangmadla',
	'giftmanager-private' => 'pansarili',
	'giftmanager-view' => 'Tingnan ang Talaan ng Handog',
	'g-add-message' => 'Magdagdag ng isang Mensahe',
	'g-back-edit-gift' => 'Bumalik sa Baguhin ang Handog na Ito',
	'g-back-gift-list' => 'Bumalik sa Talaan ng Handog',
	'g-back-link' => '< Bumalik sa Pahina ni $1',
	'g-choose-file' => 'Piliin ang Talaksan:',
	'g-cancel' => 'Huwag ituloy',
	'g-count' => 'Si $1 ay may $2 {{PLURAL:$2|handog|mga handog}}.',
	'g-create-gift' => 'Likhain ang handog',
	'g-created-by' => 'nilikha ni',
	'g-current-image' => 'Kasalukuyang Larawan',
	'g-delete-message' => 'Nakatitiyak ka bang nais mong burahin ang handog na "$1"? Mabubura rin ito mula sa mga tagagamit na maaaring nakatanggap nito.',
	'g-description-title' => 'Handog na "$2" ni $1',
	'g-error-do-not-own' => 'Hindi mo pag-aari ang handog na ito.',
	'g-error-message-blocked' => 'Pangkasalukuyan kang hinahadlangan at hindi makapagbibigay ng mga handog',
	'g-error-message-invalid-link' => 'Hindi tanggap ang ipinasok mong kawing.',
	'g-error-message-login' => 'Dapat kang lumagda muna upang makapagbigay ng mga handog',
	'g-error-message-no-user' => 'Hindi umiiral ang tagagamit na sinusubukan mong tingnan.',
	'g-error-message-to-yourself' => 'Hindi ka makapagbibigay ng handog sa sarili mo.',
	'g-error-title' => "Ay 'sus, nagkamali ka sa pagliko!",
	'g-file-instructions' => 'Dapat na jpeg, png o gif (walang gumagalaw na mga gif) ang larawan mo, at dapat na mas mababa kaysa 100 mga kb ang sukat.',
	'g-from' => 'mula sa <a href="$1">$2</a>',
	'g-gift' => 'handog',
	'g-gift-name' => 'pangalan ng handog',
	'g-give-gift' => 'Ibigay ang Handog',
	'g-give-all' => 'Nais mong bigyan si $1 ng isang handog? Pindutin lamang ang isa sa mga handog na nasa ibaba at pindutin ang "Ipadala ang Handog." Ganyan lang kadali.',
	'g-give-all-message-title' => 'Magdagdag ng isang Mensahe',
	'g-give-all-title' => 'Magbigay ng isang handog kay $1',
	'g-give-enter-friend-title' => 'Kung alam mo ang pangalan ng tagagamit, makinilyahin mo ito sa ibaba',
	'g-given' => 'Naipamigay na ng $1 {{PLURAL:$1|ulit|mga ulit}} ang handog na ito',
	'g-give-list-friends-title' => 'Pumili mula sa talaan ng mga kaibigan mo',
	'g-give-list-select' => 'pumili ng isang kaibigan',
	'g-give-separator' => 'o',
	'g-give-no-user-message' => 'Ang mga handog at mga gantimpala ay isang napakainam na paraan para kilalanin ang mga kaibigan mo!',
	'g-give-no-user-title' => 'Sino ba ang nais mong bigyan ng isang handog?',
	'g-give-to-user-title' => 'Ipadala ang handog na "$1" kay $2',
	'g-give-to-user-message' => 'Nais mo bang bigyan si $1 ng isang <a href="$2">ibang handog</a>?',
	'g-go-back' => 'Bumalik',
	'g-imagesbelow' => 'Nasa ibaba ang mga larawang gagamitin sa sityo',
	'g-large' => 'Malaki',
	'g-list-title' => 'Talaan ng Handog ni $1',
	'g-main-page' => 'Unang Pahina',
	'g-medium' => 'Gitnang Sukat',
	'g-mediumlarge' => 'Gitnans Sukat-Malaki',
	'g-new' => 'bago',
	'g-next' => 'Susunod',
	'g-previous' => 'Dati',
	'g-remove' => 'Tanggalin',
	'g-remove-gift' => 'Tanggalin ang Handog na Ito',
	'g-remove-message' => 'Nakatitiyak ka bang nais mong tanggalin ang handog na "$1"?',
	'g-recent-recipients' => 'Iba pang kamakailangang mga nakatanggap ng handog na ito',
	'g-remove-success-title' => 'Matagumpay mong natanggal ang handog na "$1"',
	'g-remove-success-message' => 'Natanggal na ang handog na "$1".',
	'g-remove-title' => 'Tatanggalin ba ang "$1"?',
	'g-send-gift' => 'Ipadala ang Handog',
	'g-select-a-friend' => 'pumili ng isang kaibigan',
	'g-sent-title' => 'Nagpadala ka ng isang handog kay $1',
	'g-sent-message' => 'Ipinadala mo ang sumusunod na handog kay $1.',
	'g-small' => 'Maliit',
	'g-to-another' => 'Ibigay sa Ibang Tao',
	'g-uploadsuccess' => 'Matagumpay ang Pagkarga',
	'g-viewgiftlist' => 'Tingnan ang Talaan ng Handog',
	'g-your-profile' => 'Talaan ng Katangian Mo',
	'gift_received_subject' => 'Ipinadala sa iyo ni $1 ang Handog na $2 sa {{SITENAME}}!',
	'gift_received_body' => 'Kumusta ka $1:

Kapapadala pa lang sa iyo ni $2 ng gantimpalang $3 sa {{SITENAME}}!

Nais mo bang basahin ang pagtatalang iniwan ni $2 at tingnan din ang handog niya para sa iyo?  Pindutin ang kawing na nasa ibaba:

$4

Sana ay magustuhan mo ito!

Salamat,


Ang Pangkat ng {{SITENAME}}

---

Hoy, nais mo bang huminto na ang pagtanggap ng mga e-liham mula sa amin?

Pindutin ang $5
at baguhin ang mga pagtatakda mo upang huwag nang paganahin ang mga pagpapabatid sa pamamagitan ng e-liham.',
	'right-giftadmin' => 'Lumikha ng bago at baguhin ang umiiral na mga handog',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'g-large' => 'Büyük',
	'g-main-page' => 'Ana sayfa',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'g-gift' => 'lahj',
	'g-gift-name' => 'lahjan nimi',
	'g-give-gift' => 'Anda lahj',
	'g-large' => "Sur'",
	'g-list-title' => '$1-kävutajan lahjoiden nimikirjutez',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'g-cancel' => 'Hủy bỏ',
);

