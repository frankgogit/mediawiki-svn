<?

# The names of the namespaces can be set here, but the numbers
# are magical, so don't change or move them!  The Namespace class
# encapsulates some of the magic-ness.
#
/* private */ $wgNamespaceNamesPl = array(
	-1	=> "Specjalna",
	0	=> "",
	1	=> "Dyskusja",
	2	=> "Wikipedysta",
	3	=> "Wikipedysta_dyskusja",
	4	=> "Wikipedia",
	5	=> "Wikipedia_dyskusja",
	6	=> "Plik",
	7	=> "Plik_dyskusja"
);

/* private */ $wgQuickbarSettingsPl = array(
	"Brak", "Stały, z lewej", "Stały, z prawej", "Unoszący się, z lewej"
);

/* private */ $wgSkinNamesPl = array(
	"Standard", "Nostalgia", "Cologne Blue"
);

/* private */ $wgUserTogglesPl = array(
	"hover"		=> "Pokazuj okienko podpowiedzi ponad linkami",
	"underline" => "Podkreślenie linków",
	"highlightbroken" => "Podświetl linki pustych stron",
	"justify"	=> "Wyrównuj tekst artykułu w kolumnie",
	"hideminor" => "Ukryj drobne zmiany w \"Ostatnich zmianach\"",
	"numberheadings" => "Automatyczna numeracja nagłówków",
	"rememberpassword" => "Pamiętaj hasło między sesjami"
);

/* private */ $wgLanguageNamesPl = array(
	"ab"	=> "Abchazka",
	"aa"	=> "Afar",
	"af"	=> "afrikaans",
	"sq"	=> "albańska",
	"am"	=> "amharska",
	"ar"	=> "arabska",
	"hy"	=> "armeńska",
	"as"	=> "Assamese",
	"ay"	=> "Aymara",
	"az"	=> "azerbejdżańska",
	"ba"	=> "baszkirska",
	"eu"	=> "baskijska",
	"be"	=> "białoruska",
	"bn"	=> "bengalska",
	"dz"	=> "Dzongkha",
	"bh"	=> "Bihara",
	"bi"	=> "Bislama",
	"my"	=> "birmańska",
	"km"	=> "kambodżańska",
	"ca"	=> "katalońska",
	"zh"	=> "chińska",
	"co"	=> "Corsican",
	"hr"	=> "chorwacka",
	"cs"	=> "czeska",
	"da"	=> "duńska", # Note two different subdomains. 
	"dk"	=> "duńska", # 'da' is correct for the language.
	"nl"	=> "niderlandzka",
	"en"	=> "angielska",
	"w"	=> "angielska", # Should this be in list this?
	"simple" => "uproszczona angielska",
	"eo"	=> "esperanto",
	"et"	=> "estońska",
	"fo"	=> "Faeroese",
	"fj"	=> "Fijian",
	"fi"	=> "fińska",
	"fr"	=> "francuska",
	"fy"	=> "fryzyjska",
	"gl"	=> "galicyjska",
	"ka"	=> "gruzińska",
	"de"	=> "niemiecka",
	"el"	=> "grecka",
	"kl"	=> "grenlandzka",
	"gn"	=> "Guarani",
	"gu"	=> "gudżarati",
	"ha"	=> "hausa",
	"he"	=> "hebrajska",
	"hi"	=> "hindi",
	"hu"	=> "węgierska",
	"is"	=> "islandzka",
	"id"	=> "indonezyjska",
	"ia"	=> "interlingua",
	"iu"	=> "Inuktitut",
	"ik"	=> "Inupiak",
	"ga"	=> "irlandzka",
	"it"	=> "włoska",
	"ja"	=> "japońska",
	"jv"	=> "jawajska",
	"kn"	=> "kannada",
	"ks"	=> "kaszmirska",
	"kk"	=> "kazachska",
	"rw"	=> "Kinyarwanda",
	"ky"	=> "kirgizka",
	"rn"	=> "Kirundi",
	"ko"	=> "koreańska",
	"lo"	=> "laotańska",
	"la"	=> "w łacinie",
	"lv"	=> "łotewska",
	"ln"	=> "lingala",
	"lt"	=> "litewska",
	"mk"	=> "macedońska",
	"mg"	=> "malagaska",
	"ms"	=> "malajska",
	"ml"	=> "malajalam",
	"mi"	=> "maoryjska",
	"mr"	=> "marathi",
	"mo"	=> "mołdawska",
	"mn"	=> "mongolska",
	"na"	=> "Nauru",
	"ne"	=> "nepalska",
	"no"	=> "norweska",
	"oc"	=> "Occitan",
	"or"	=> "orija",
	"om"	=> "oromo",
	"ps"	=> "paszto",
	"fa"	=> "perska",
	"pl"	=> "polska",
	"pt"	=> "portugalska",
	"pa"	=> "pendżabska",
	"qu"	=> "keczua",
	"rm"	=> "retoromańska",
	"ro"	=> "rumuńska",
	"ru"	=> "rosyjska",
	"sm"	=> "samoańska",
	"sg"	=> "Sangro",
	"sa"	=> "w sanskrycie",
	"sr"	=> "serbska",
	"sh"	=> "serbochorwacka",
	"st"	=> "Sesotho",
	"tn"	=> "Setswana",
	"sn"	=> "szona",
	"sd"	=> "sindhi",
	"si"	=> "Sinhalese",
	"ss"	=> "Siswati",
	"sk"	=> "słowacka",
	"sl"	=> "słoweńska",
	"so"	=> "w somali",
	"es"	=> "hiszpańska",
	"su"	=> "Sudanese",
	"sw"	=> "suahili",
	"sv"	=> "szwedzka",
	"tl"	=> "tagalog",
	"tg"	=> "tadżycka",
	"ta"	=> "tamilska",
	"tt"	=> "tatarska",
	"te"	=> "telugu",
	"th"	=> "tajska",
	"bo"	=> "tybetańska",
	"ti"	=> "Tigrinya",
	"to"	=> "Tonga",
	"ts"	=> "Tsonga",
	"tr"	=> "turecka",
	"tk"	=> "turkmeńska",
	"tw"	=> "Twi",
	"ug"	=> "ujgurska",
	"uk"	=> "ukraińska",
	"ur"	=> "w urdu",
	"uz"	=> "uzbecka",
	"vi"	=> "wietnamska",
	"vo"	=> "Volapuk",
	"cy"	=> "walijska",
	"wo"	=> "Wolof",
	"xh"	=> "Xhosa",
	"yi"	=> "jidisz",
	"yo"	=> "Yoruba",
 	"za"	=> "Zhuang",
	"zu"	=> "Zulu"
);

/* private */ $wgWeekdayNamesPl = array(
	"Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek",
	"Piątek", "Sobota"
);

/* private */ $wgMonthNamesPl = array(
	"Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
	"Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad",
	"Grudzień"
);

/* private */ $wgMonthAbbreviationsPl = array(
	"sty", "lut", "mar", "kwi", "maj", "cze", "lip", "sie",
	"wrz", "paź", "lis", "gru"
);

# All special pages have to be listed here: a description of ""
# will make them not show up on the "Special Pages" page, which
# is the right thing for some of them (such as the "targeted" ones).
#
/* private */ $wgValidSpecialPagesPl = array(
	"Userlogin"		=> "",
	"Userlogout"	=> "",
	"Preferences"	=> "Zmiana moich preferencji",
	"Watchlist"		=> "Obserwowane",
	"Recentchanges" => "Ostatnio zmienione",
	"Upload"		=> "Przesyłanie plików",
	"Imagelist"		=> "Lista obrazków i multimediów",
	"Listusers"		=> "Zarejestrowani użytkownicy",
	"Statistics"	=> "Statystyka",
	"Randompage"	=> "Losowa strona",

	"Lonelypages"	=> "Porzucone artykuły",
	"Unusedimages"	=> "Porzucone pliki",
	"Popularpages"	=> "Najpopularniejsze",
	"Wantedpages"	=> "Najbardziej potrzebne",
	"Shortpages"	=> "Najkrótsze",
	"Longpages"		=> "Najdłuższe",
	"Newpages"		=> "Nowoutworzone",
	"Allpages"		=> "Wszystkie",

	"Ipblocklist"	=> "Zablokowane adresy IP",
	"Specialpages"  => "",
	"Contributions" => "",
	"Emailuser"		=> "",
	"Whatlinkshere" => "",
	"Recentchangeslinked" => "",
	"Movepage"		=> "",
	"Booksources"	=> "Źródła książkowe"
);

/* private */ $wgSysopSpecialPagesPl = array(
	"Blockip"		=> "Zablokuj adres IP",
	"Asksql"		=> "Zapytanie SQL"
);

/* private */ $wgDeveloperSpecialPagesPl = array(
	"Lockdb"		=> "Zablokuj zapis do bazy danych",
	"Unlockdb"		=> "Odblokuj zapis do bazy danych",
	"Debug"			=> "Odpluskwianie"
);

/* private */ $wgAllMessagesPl = array(

# Bits of text used by many pages:
#
"mainpage"		=> "Strona główna",
"about"			=> "O Wikipedii",
"aboutwikipedia" => "O Wikipedii",
"aboutpage"		=> "Wikipedia:O_Wikipedii",
"help"			=> "Pomoc",
"helppage"		=> "Wikipedia:Pomoc",
"wikititlesuffix" => "Wikipedia",
"bugreports"	=> "Raport o błędach",
"bugreportspage" => "Wikipedia:Bug_reports",
"faq"			=> "FAQ",
"faqpage"		=> "Wikipedia:FAQ",
"edithelp"		=> "Pomoc w edycji",
"edithelppage"	=> "Wikipedia:Jak_edytować_stronę",
"cancel"		=> "Anuluj",
"qbfind"		=> "Znajdź",
"qbbrowse"		=> "Przeglądanie",
"qbedit"		=> "Edycja",
"qbpageoptions" => "Opcje strony",
"qbpageinfo"	=> "O stronie",
"qbmyoptions"	=> "Moje opcje",
"mypage"		=> "Moja strona",
"mytalk"		=> "Moja dyskusja",
"currentevents" => "Bieżące wydarzenia",
"errorpagetitle" => "Błąd",
"returnto"		=> "Wróć do $1.",
"fromwikipedia"	=> "Z Wikipedii, wolnej encyklopedii.",
"whatlinkshere"	=> "Strony, które odwołują się do tej",
"help"			=> "Pomoc",
"search"		=> "Szukaj",
"history"		=> "Historia strony",
"printableversion" => "Wersja do druku",
"editthispage"	=> "Edytuj",
"deletethispage" => "Usuń",
"protectthispage" => "Zabezpiecz",
"unprotectthispage" => "Odbezpiecz",
"talkpage"		=> "Dyskusja",
"subjectpage"	=> "Strona dyskutowana",
"otherlanguages" => "Wersja",
"redirectedfrom" => "(Przekierowano z $1)",
"lastmodified"	=> "Ostatnio zmodyfikowano o $1.",
"viewcount"		=> "Tą stronę obejrzano $1 razy.",
"printsubtitle" => "(z http://pl.wikipedia.org)",
"protectedpage" => "Strona zabezpieczona",
"administrators" => "Wikipedia:Administratorzy",
"sysoptitle"	=> "Wymagane prawa dostępu administratora",
"sysoptext"		=> "Ta operacja może być wykonana tylko przez
użytkowania o statusie \"administrator\".
Zobacz $1.",
"developertitle" => "Wymagane prawa dostępu Programisty",
"developertext"	=> "Ta operacja może być wykonana tylko przez
użytkownika o prawach \"Programisty\".
Zobacz $1.",
"nbytes"		=> "$1 bajtów",
"go"			=> "Go",
"ok"			=> "OK",
"sitetitle"		=> "Wikipedia",
"sitesubtitle"	=> "Wolna Encyklopedia",
"retrievedfrom" => "Źródło: \"$1\"",

# Main script and global functions
#
"nosuchaction"	=> "Nie ma takiej operacji",
"nosuchactiontext" => "Oprogramowanie Wikipedii nie rozpoznaje
operacji takiej jak podana w URL",
"nosuchspecialpage" => "Nie ma takiej strony specjalnej",
"nospecialpagetext" => "Oprogramowanie Wikipedii nie rozpozaje takiej
specjalnej strony.",

# General errors
#
"error"			=> "Błąd",
"databaseerror" => "Błąd bazy danych",
"dberrortext"	=> "Wystąpił błąd składni w zapytaniu do bazy danych.
Mogło to być spowodowane przez złe sformułowanie zapytania (zobacz $1)
albo przez błąd w oprogramowaniu.
Ostatnie, nieudane zapytanie to:
<blockquote><tt>$1</tt></blockquote>
wysłane przez funkcję \"<tt>$2</tt>\".
MySQL zgłosił błąd \"<tt>$3: $4</tt>\".",
"noconnect"		=> "Poprzez $1 nie można połączyc się z systemem zarządzającym bazą danych",
"nodb"			=> "Nie można odnaleźć bazy danych $1",
"readonly"		=> "Baza danych jest zablokowana",
"enterlockreason" => "Podaj powód zablokowania bazy oraz szacunkowy czas
jej odblokowania",
"readonlytext"	=> "Baza danych Wikipedii jest w tej chwili zablokowana
- nie można wprowadzać nowych artykułów ani modyfikować istniejących. Powodem
są prawdopodobnie czynności administracyjne. Po ich zakończeniu przywrócona
zostanie pełna funkcjonalność bazy.
Administrator, który zablokował bazę, podał następujące wyjaśnienie:
<p>$1",
"missingarticle" => "System bazy danych nie odnalazł tekstu strony,
która powinna się znajdować w bazie, tzn. strony \"$1\".
Nie jest to błąd bazy danych, ale najprawdopodobniej błąd w oprogramowaniu.
Zgłoś, proszę, ten fakt administratorowi podając także, o który URL chodzi.",
"internalerror" => "Błąd wewnętrzny",
"filecopyerror" => "Nie można skopiowac pliku \"$1\" do \"$2\".",
"filerenameerror" => "Nie można zmienić nazwy pliku \"$1\" na \"$2\".",
"filedeleteerror" => "Nie można skasować pliku \"$1\".",
"filenotfound"	=> "Nie można znaleźć pliku \"$1\".",
"unexpected"	=> "Niespodziewana wartość: \"$1\"=\"$2\".",
"formerror"		=> "Błąd: nie można wysłać formularza",	
"badarticleerror" => "Dla tej strony ta operacja nie może być wykonana.",
"cannotdelete"	=> "Nie można skasować podanej strony lub obrazka.",

# Login and logout pages
#
"logouttitle"	=> "Wylogowanie użytkownika",
"logouttext"	=> "Wylogowano Cię.
Możesz kontynuować pracę z Wikipedią jako niezarejestrowany użytkownik
albo zalogować się ponownie jako ten sam lub inny użytkownik.\n",

"welcomecreation" => "<h2>Witaj, $1!</h2><p>Właśnie utworzyliśmy dla Ciebie konto.
Nie zapomnij dostosować <i>preferencji</i>.",

"loginpagetitle" => "User login",
"yourname"		=> "Twój login",
"yourpassword"	=> "Twoje hasło",
"yourpasswordagain" => "Powtórz hasło",
"newusersonly"	=> " (tylko nowi użytkownicy)",
"remembermypassword" => "Pamiętaj moje hasło między sesjami.",
"loginproblem"	=> "<b>Są problemy z Twoim logowaniem.</b><br>Spróbuj ponownie!",
"alreadyloggedin" => "<font color=red><b>$1, jesteś już zalogowany!</b></font><br>\n",

"areyounew"		=> "Jeśli jesteś po raz pierwszy na Wikipedii i chcesz mieć
własne konto użytkownika, wprowadź swój pseudonim (login), a następnie wpisz
dwukrotnie wybrane hasło. Podanie adresu e-mailowego jest opcjonalne - jeśli
zapomnisz hasła możesz poprosić o przesłanie go na ów adres.<br>\n",

"login"			=> "Zaloguj mnie",
"userlogin"		=> "Logowanie",
"logout"		=> "Wyloguj mnie",
"userlogout"	=> "Wylogowanie",
"createaccount"	=> "Załóż nowe konto",
"badretype"		=> "Wprowadzone hasła różnią się między soba.",
"userexists"	=> "Wybrana przez Ciebie nazwa użytkownika jest już zajęta. Wybierz, proszę, inną.",
"youremail"		=> "Twój e-mail",
"yournick"		=> "Twój podpis",
"emailforlost"	=> "Jeśli zapomnisz hasła, możesz poprosić o przesłanie nowego na adres podany w Twoich preferencjach.",
"loginerror"	=> "Błąd logowania",
"noname"		=> "To nie jest poprawna nazwa użytkownika.",
"loginsuccesstitle" => "Udane logowanie",
"loginsuccess"	=> "Zalogowano Cię do Wikipedia jako \"$1\".",
"nosuchuser"	=> "Nie ma użytkowniku nazywającego się \"$1\".
Sprawdź pisownię lub użyj poniższego formularza by utworzyć nowe konto.",
"wrongpassword"	=> "Podane przez Ciebie hasło jest nieprawidłowe. Spróbuj jeszcze raz.",
"mailmypassword" => "Wyślij mi nowe hasło",
"passwordremindertitle" => "Wikipedia przypomina o haśle",
"passwordremindertext" => "Ktoś (prawdopodobnie Ty, spod adresu $1)
poprosił od nas o wysłanie nowego hasła dostępu do Wikipedii.
Aktualne hasło dla użytkownika \"$2\" to \"$3\". 
Najlepiej będzie jak zalogujesz się teraz i od razu zmienisz hasło.",
"noemail"		=> "W bazie nie ma adresu e-mailowego dla użytkownika \"$1\".",
"passwordsent"	=> "Nowe hasło zostało wysłane na adres e-mailowy użytkownika \"$1\"
Po otrzymaniu go zaloguj się ponownie.",

# Edit pages
#
"summary"		=> "Opis zmian",
"minoredit"		=> "To jest drobna zmiana.",
"savearticle"	=> "Zapisz",
"preview"		=> "Podgląd",
"showpreview"	=> "Podgląd",
"blockedtitle"	=> "Użytkownik jest zablokowany",
"blockedtext"	=> "Twoje konto lub adres IP zostały zablokowane przez $1.
Podany powód to:<br>$2<p>Możesz się skontaktować z administratorem by
wyjaśnić sprawę zablokowania.",
"newarticle"	=> "(Nowy)",
"newarticletext" => "Tutaj wpisz tekst artykułu.",
"noarticletext" => "(Ta strona obecnie nie zawiera tekstu)",
"updated"		=> "(Zmodyfikowano)",
"note"			=> "<strong>Uwaga:</strong> ",
"previewnote"	=> "To jest tylko podgląd - artykuł nie został jeszcze zapisany!",
"previewconflict" => "Wersja podglądana odnosi się do tekstu
z górnego pola edycji. Tak będzie wyglądać strona jeśli zdecydujesz się ją zapisać.",
"editing"		=> "Edytujesz \"$1\"",
"editconflict"	=> "Konflikt edycji: $1",
"explainconflict" => "Ktoś zdążył wprowadzić swoją wersję artykułu
w trakcie Twojej edycji.
Górne pole edycji zawiera tekst strony aktualnie zapisany w bazie danych.
Twoje zmiany znajdują się w dolnym polu edycji.
By wprowadzić swoje zmiany musisz zmodyfikować tekst z górnego pola.
<b>Tylko</b> tekst z górnego pola będzie zapisany w bazie gdy wciśniesz
\"Zapisz\".\n<p>",
"yourtext"		=> "Twój tekst",
"storedversion" => "Zapisana wersja",
"editingold"	=> "<strong>OSTRZEŻENIE: Edytujesz inną niż bieżąca wersję tej strony.
Jeśli zapiszesz ją wszystkie późniejsze wersje zostaną skasowne.</strong>\n",
"yourdiff"		=> "Różnice",
"copyrightwarning" => "Proszę pamiętać o tym, że przyjmuje się,
iż wszelki wkład do Wikipedii jest
udostępniany na zasadach GNU Free Documentation License (szczegóły w $1).
Jeśli nie chcesz, żeby
Twoje dzieło było bezlitośnie edytowane i rozpowszechniane bez ograniczeń,
nie umieszczaj go w Wikipedii.<br>
Niniejszym jednocześnie oświadczasz, że wkład jest Twoim
dziełem lub pochodzi z materiałów dostępnych na zasadach public domain albo
licencji GNU Free Documentation License lub kompatybilnej.
<strong>PROSZĘ NIE UŻYWAĆ BEZ POZWOLENIA MATERIAŁÓW OBJĘTYCH PRAWEM
AUTORSKIM!</strong>",


# History pages
#
"revhistory"	=> "Historia modyfikacji",
"nohistory"		=> "Ta strona nie ma swojej historii edycji.",
"revnotfound"	=> "Wersja nie została odnaleziona",
"revnotfoundtext" => "Ta (starsza) wersja strony nie może zostać odnaleziona.
Sprawdź proszę URL użyty przez Ciebie by uzyskać dostęp do tej strony.\n",
"loadhist"		=> "Pobieranie historii tej strony",
"currentrev"	=> "Aktualna wersja",
"revisionasof"	=> "Wersja z dnia $1",
"cur"			=> "bież",
"next"			=> "następna",
"last"			=> "poprz",
"orig"			=> "oryginał",
"histlegend"	=> "Legenda: (bież) = różnice z wersją bieżącą,
(poprz) = różnice z wersją poprzedzającą, M = drobne zmiany",

# Diffs
#
"difference"	=> "(Różnice między wersjami)",
"loadingrev"	=> "pobieranie wersji w celu porównania",
"lineno"		=> "Linia $1:",
"editcurrent"	=> "Edytuj bieżącą wersję tej strony",

# Search results
#
"searchresults" => "Wyniki wyszukiwania",
"searchhelppage" => "Wikipedia:Searching",
"searchingwikipedia" => "Przeszukiwanie Wikipedii",
"searchresulttext" => "Aby dowiedzieć się więcej o przeszukiwaniu Wikipedii, zobacz $1.",
"searchquery"	=> "Dla zapytania \"$1\"",
"badquery"		=> "Źle sformułowane zapytanie",
"badquerytext"	=> "Nie można zrealizować Twojego zapytania.
Prawdopodobna przyczyna to obecność słowa krótszego niż trzyliterowe.
Inną przyczyną mogła być pomyłka w szukanym wyrażeniu,
np. \"Jan Jan Kochanowski\".
Spróbuj, proszę, innego zapytania.",
"matchtotals"	=> "Zapytanie \"$1\", liczba znalezionych tytułów: $2,
liczba znalezionych artykułów: $3.",
"titlematches"	=> "Znaleziono w tytułach:",
"notitlematches" => "Nie znaleziono w tytułach",
"textmatches"	=> "Znaleziono w artykułach:",
"notextmatches"	=> "Nie znaleziono w artykułach",
"prevn"			=> "poprzednie $1",
"nextn"			=> "następne $1",
"viewprevnext"	=> "Zobacz ($1) ($2) ($3).",
"showingresults" => "Oto lista <b>$1</b> pozycji, poczynając od numeru <b>$2</b>.",
"nonefound"		=> "<strong>Uwaga</strong>: brak rezultatów wyszukiwania
spowodowany jest bardzo często szukaniem najpopularniejszych słów, takich jak
\"jest\" czy \"nie\", które nie są indeksowane, albo z powodu podania w
zapytaniu więcej niż jednego słowa (na liście odnalezionych stron znajdą się
tylko te, które zawierają wszystkie podane słowa).",

# Preferences page
#
"preferences"	=> "Preferencje",
"prefsnologin" => "Brak logowania",
  //en wfLocalUrl( "Special:Userlogin" ) . "\">logged in</a>
"prefsnologintext"	=> "Musisz się <a href=\"" .
  wfLocalUrl( "Specjalna:Userlogin" ) . "\">zalogować</a>
przez zmianą swoich preferencji.",
"prefsreset"	=> "Preferences have been reset from storage.",
"qbsettings"	=> "Pasek szybkiego dostępu", 
"changepassword" => "Zmiana hasła",
"skin"			=> "Skórka",
"saveprefs"		=> "Zapisz preferencje",
"resetprefs"	=> "Preferencje domyślne",
"oldpassword"	=> "Stare hasło",
"newpassword"	=> "Nowe hasło",
"retypenew"		=> "Powtórz nowe hasło",
"textboxsize"	=> "Wymiary pola edycji",
"rows"			=> "Wiersze",
"columns"		=> "Kolumny",
"searchresultshead" => "Ustawienia wyszukiwarki",
"resultsperpage" => "Liczba wyników na stronie",
"contextlines"	=> "Pierwsze wiersze artykułu",
"contextchars"	=> "Litery kontekstu w linijce",
"recentchangescount" => "Liczba pozycji na liście ostatnich zmian",
"savedprefs"	=> "Twoje preferencje zostały zapisane.",
"timezonetext"	=> "Podaj liczbę godzin różnicy między Twoim czasem
a czasem serwera (UTC). Np. dla Polski jest to liczba \"2\".",
"localtime"	=> "Twój czas",
"timezoneoffset" => "Różnica",
"emailflag"		=> "Nie chcę otrzymywać e-maili od innych użytkowników",

# Recent changes
#
"recentchanges" => "Ostatnie zmiany",
"recentchangestext" => "Na tej stronie odnajdziesz historię ostatnich zmian na Wikipedii.

[[Wikipedia:Welcome,_newcomers|Witaj]]! Jeśli jesteś tu po raz pierwszy,
zapoznaj się, proszę, z tymi stronami: [[wikipedia:FAQ|Wikipedia FAQ]],
[[Wikipedia:Policies and guidelines|polityka Wikipedii]]
(a zwłaszcza [[wikipedia:Naming conventions|konwencje nazywania stron]],
[[wikipedia:Neutral point of view|neutralny punkt widzenia]])
oraz [[wikipedia:Most common Wikipedia faux pas|najczęstsze nieporozumienia]].

Jeśli chcesz przyczynić się do sukcesu Wikipedii, nie dodawaj materiałów
zastrzeżonych prawami autorskimi. Konsekwencje prawne złamania tej zasady
mogłyby Wikipedii bardzo zaszkodzić.
Zobacz także [http://meta.wikipedia.com/wiki.phtml?title=Special:RecentChanges ostatnie metadyskusje (po angielsku)].",
"rcloaderr"		=> "Ładuję ostatnie zmiany",
"rcnote"		=> "To ostatnie <strong>$1</strong> zmian dokonanych na Wikipedii w ciągu ostatnich <strong>$2</strong> dni.",
# "rclinks"		=> "Show last $1 changes in last $2 hours / last $3 days",
"rclinks"		=> "Wyświetl ostatnie $1 zmian w ciągu ostatnich $2 dni.",
"rchide"		=> "in $4 form; $1 drobne zmiany; $2 inne przestrzenie nazw; $3 wielokrotna edycja.",
"diff"			=> "różn",
"hist"			=> "hist",
"hide"			=> "schowaj",
"show"			=> "pokaż",
"tableform"		=> "tabelka",
"listform"		=> "lista",
"nchanges"		=> "$1 zmian",

# Upload
#
"upload"		=> "Prześlij plik",
"uploadbtn"		=> "Prześlij plik",
"uploadlink"	=> "Prześlij obrazki",
"reupload"		=> "Prześlij ponownie",
"reuploaddesc"	=> "Wróć do formularza wysyłki.",
"uploadnologin" => "Brak logowania",
"uploadnologintext"	=> "Musisz się <a href=\"" .
  wfLocalUrl( "Specjalna:Userlogin" ) . "\">zalogować</a>
przed przesłaniem pików.",
"uploadfile"	=> "Prześlij plik",
"uploaderror"	=> "Błąd przesyłki",
"uploadtext"	=> "<strong>STOP!</strong> Zanim prześlesz plik,
przeczytaj <a href=\"" . wfLocalUrlE( "Wikipedia:Image_use_policy" ) .
"\">zasady użycia obrazków</a> i upewnij się przesyłając pozostaniesz z
nimi w zgodzie.
<p>Jeśli chcesz przejrzeć lub przeszukać dotychczas przesłane pliki,
przejdź do <a href=\"" . wfLocalUrlE( "Specjalna:Imagelist" ) .
"\">listy przesłanych plików</a>.
Przesyłki i skasowania są rejestrowane w <a href=\"" .
wfLocalUrlE( "Wikipedia:Upload_log" ) . "\">rejestrze</a>.
<p>By przesłać nowy plik mający zilustrować Twój artykuł skorzystaj
z poniższego formularza.
W przypadku większości przeglądarek zobaczysz przycisk <i>Browse...</i>
albo <i>Przeglądaj...</i>, który umożliwi Ci otworzenie standardowego
okienka wyboru pliku. Wybranie pliku spowoduje umieszczenie jego nazwy
w polu tekstowym obok przycisku.
Musisz także zaznaczając odpowiednie pole, potwierdzić, że przesyłając
plik nie naruszasz niczyich praw autorskich.
Przesyłka rozpocznie się po naciśnięciu <i>Prześlij plik</i>.
Może zająć kilka chwil, zwłaszcza jeśli masz wolne połączenie z internetem.
<p>Preferowane formaty to JPEG dla zdjęć fotograficznych, PNG dla rysunków
i obrazków o charakterze ikon oraz OGG dla dźwięków.
Aby uniknąć nieporozumień nadawaj plikom nazwy związane z zawartością.
Aby umieścić obrazek w artykule, użyj linku w postaci
<b>[[image:obrazek.jpg]]</b> lub <b>[[grafika:obrazek.png|opcjonalny tekst]]</b>.
Dla plików dźwiękowych link będzie miał postać <b>[[media:file.ogg]]</b>.
<p>Pamiętaj, proszę, że tak jak w przypadku zwykłych stron Wikipedii,
inni użytkownicy mogą edytować lub kasować przesłane przez Ciebie pliki,
jeśli stwierdzą, że to będzie lepiej służyć całemu projektowi.
Twoje prawo do przesyłania może zostać Ci odebrane jeśli nadużyjesz systemu.",
"uploadlog"		=> "rejestr przesyłek",
"uploadlogpage" => "Upload_log",
"uploadlogpagetext" => "Oto lista ostatnio przesłanych plików.
Wszystkie czasy odnoszą się do strefy czasowej w serwera (UTC).
<ul>
</ul>
",
"filename"		=> "Plik",
"filedesc"		=> "Opis",
"affirmation"	=> "Potwierdzam, że właściciel praw autorskich do tego pliku
zgadza się udzielić licencji zgodnie z $1.",
"copyrightpage" => "Wikipedia:Prawa_autorskie",
"copyrightpagename" => "Wikipedia copyright",
"uploadedfiles"	=> "Przesłane pliki",
"noaffirmation" => "Musisz potwierdzić, że Twoja przesyłka nie narusza żadnych
praw autorskich.",
"ignorewarning"	=> "Zignoruj ostrzeżenie i prześlij plik.",
"minlength"		=> "Nazwa obrazku musi mieć co najmniej trzy litery.",
"badfilename"	=> "Nazwę obrazku zmieniona na \"$1\".",
"badfiletype"	=> "\".$1\" nie jest zalecanym formatem pliku.",
"largefile"		=> "Zalecane jest aby rozmiar pliku z obrazkiem nie był większy niż 100 kilobajtów.",
"successfulupload" => "Wysyłka powiodła się",
"fileuploaded"	=> "Plik \"$1\" został pomyślnie przesłany.
Przejdź, proszę, do strony opisu pliku ($2) i podaj dotyczące go informacje
takie jak: pochodzenie pliku, kiedy i przez kogo został utworzony
i cokolwiek co wiesz o pliku, a wydaje Ci się ważne.",
"uploadwarning" => "Ostrzeżenie o przesyłce",
"savefile"		=> "Zapisz plik",
"uploadedimage" => "przesłano \"$1\"",

# Image list
#
"imagelist"		=> "Lista plików",
"imagelisttext"	=> "To jest lista $1 plików posortowanych $2.",
"getimagelist"	=> "pobieranie listy plików",
"ilshowmatch"	=> "Pokaż wszystkie pliki o takiej samej nazwie",
"ilsubmit"		=> "Szukaj",
"showlast"		=> "Pokaż ostatnie $1 plików posortowane $2.",
"all"			=> "wszystkie",
"byname"		=> "według nazwy",
"bydate"		=> "według daty",
"bysize"		=> "według rozmiaru",
"imgdelete"		=> "usuń",
"imgdesc"		=> "opisz",
"imglegend"		=> "Legenda: (opisz) = pokaż/edytuj opis pliku.",
"imghistory"	=> "Historia pliku",
"revertimg"		=> "przywróć",
"deleteimg"		=> "usuń",
"imghistlegend" => "Legenda: (bież) = to jest obecny plik, (usuń) = usuń
tą starszą wersję, (przywróć) = przywróć tą starszą wersję.
<br><i>Kliknij na datę aby zobaczyć jakie pliki przesłano tego dnia</i>.",
"imagelinks"	=> "Linki do pliku",
"linkstoimage"	=> "Oto strony odwołujące się do tego pliku:",
"nolinkstoimage" => "Żadna strona nie odwołuje się do tego pliku.",

# Statistics
#
"statistics"	=> "Statystyka",
"sitestats"		=> "Statystyka artykułów",
"userstats"		=> "Statystyka użytkowników",
"sitestatstext" => "W bazie danych jest w sumie <b>$1</b> stron.
Ta liczba uwzględnia strony <i>Dyskusji</i>, strony na temat samej Wikipedii,
strony typu <i>stub</i> (prowizoryczne), strony przekierowujące, oraz inne, które trudno
uznać za artykuły. Wyłączając powyższe, jest prawdopodobnie <b>$2</b> stron, które można uznać
za artykuły.<p>
Było w sumie <b>$3</b> odwiedzin oraz <b>$4</b> edycji od kiedy dokonano
upgrade'u oprogramowania (1 styczeń 2004 ;-).
Daje to średnio <b>$5</b> edycji na jedną stronę i <b>$6</b> odwiedzin na jedną edycję.",
"userstatstext" => "Jest <b>$1</b> zarejestrowanych użytkowników.
Spośród nich <b>$2</b> ma status administratora (zobacz $3).",

# Miscellaneous special pages
#
"orphans"		=> "Porzucone strone",
"lonelypages"	=> "Porzucone strony",
"unusedimages"	=> "Nie używane pliki",
"popularpages"	=> "Najpopularniejsze strony",
"nviews"		=> "$1 odwiedzin",
"wantedpages"	=> "Najpotrzebniejsze strony",
"nlinks"		=> "$1 linków",
"allpages"		=> "Wszystkie strony",
"randompage"	=> "Losuj stronę",
"shortpages"	=> "Najkrótsze strony",
"longpages"		=> "Najdłuższe strony",
"listusers"		=> "Lista użytkowników",
"specialpages"	=> "Strony specjalne",
"spheading"		=> "Strony specjalne",
"sysopspheading" => "Strony specjalne tylko dla użytkowników z prawami Administratora",
"developerspheading" => "Strony specjalne tylko dla użytkowników z prawami Programisty",
"protectpage"	=> "Zabezpiecz stronę",
"recentchangeslinked" => "Dolinkowane",
"rclsub"		=> "(dla stron dolinkowanych do \"$1\")",
"debug"			=> "Odpluskwianie",
"newpages"		=> "Nowe strony",
"movethispage"	=> "Przenieś",
"unusedimagestext" => "<p>Pamiętaj, proszę, że inne witryny,
np. Wikipedie w innych językach, mogą odwoływać się do tych plików
używając bezpośrednio URL. Dlatego też niektóre z plików mogą się znajdować
na tej liście mimo, że żadna strona tej Wikipedii nie odwołuje się do nich.",
"booksources"	=> "Źródła książkowe",
"booksourcetext" => "Oto lista linków do innych witryn,
które pośredniczą w sprzedaży nowych i używanych książek i mogą podać
informacje o książkach, których szukasz.
Wikipedia nie jest stowarzyszona z żadnym ze sprzedawców,
a ta lista nie powinna być interpretowana jako świadectwo udziału w zyskach.",

# Email this user
#
"mailnologin"	=> "Brak adresu",
"mailnologintext" => "Musisz się <a href=\"" .
  wfLocalUrl( "Specjalna:Userlogin" ) . "\">zalogować</a>
i mieć wpisany aktualny adres e-mailowy w swoich <a href=\"" .
  wfLocalUrl( "Specjalna:Preferencje" ) . "\">preferencjach</a>,
aby móc wysłać e-mail do innych użytkowaników.",
"emailuser"		=> "Wyślij e-mail do tego użytkownika",
"emailpage"		=> "Wyślij e-mail do użytkownika",
"emailpagetext"	=> "Jeśli ten użytkownik wpisał poprawny adres e-mailowy
w swoich preferencjach, to poniższy formularz umożliwi Ci wysłanie jednej wiadomości.
Adres e-mailowy, który został przez Ciebie wprowadzony w Twoich preferencjach
pojawi się w polu \"Od\"; dzięki temu odbiorca będzie mógł Ci odpowiedzieć.",
"noemailtitle"	=> "Brak adresu e-mailowego",
"noemailtext"	=> "Ten użytkownik nie podał poprawnego adresu e-mailowego,
albo zadecydował, że nie chce otrzymywać e-maili od innych użytkowników.",
"emailfrom"		=> "Od",
"emailto"		=> "Do",
"emailsubject"	=> "Temat",
"emailmessage"	=> "Wiadomość",
"emailsend"		=> "Wyślij",
"emailsent"		=> "Wiadomość została wsyłana",
"emailsenttext" => "Twoja wiadomość została wysłana.",

# Watchlist
#
"watchlist"		=> "Obserwowane",
"watchlistsub"	=> "(dla użytkownika \"$1\")",
"nowatchlist"	=> "Nie ma żadnych pozycji na liście obserwowanych przez Ciebie stron.",
"watchnologin"	=> "Brak logowania",
"watchnologintext"	=> "Musisz się <a href=\"" .
  wfLocalUrl( "Specjalna:Userlogin" ) . "\">zalogować</a>
przed modyfikacją listy obserwowanych artykułów.",
"addedwatch"	=> "Dodana do listy obserwowanych",
"addedwatchtext" => "Strona \"$1\" została dodana do Twojej <a href=\"" .
  wfLocalUrl( "Specjalna:Watchlist" ) . "\">listy obserwowanych</a>.
Na tej liście znajdzie się rejestr przyszłych zmian tej strony i stowarzyszonej z nią strony Dyskusji,
a nazwa samej strony zostanie <b>wytłuszczona</b> na <a href=\"" .
  wfLocalUrl( "Specjalna:Recentchanges" ) . "\">liście ostatnich zmian</a> aby
łatwiej było Ci sam fakt zmiany zauważyć.</p>

<p>Jeśli chcesz usunąć stronę ze swojej listy obserwowanych, kliknij na
\"Przestań obserwować\".",
"removedwatch"	=> "Usunięto z listy obserwowanych",
"removedwatchtext" => "Strona \"$1\" została usunięta z Twojej listy obserwowanych.",
"watchthispage"	=> "Obserwuj",
"unwatchthispage" => "Przestań obserwować",
"notanarticle"	=> "To nie artykuł",

# Delete/protect/revert
#
"deletepage"	=> "Usuń stronę",
"confirm"		=> "Potwierdź",
"confirmdelete" => "Potwierdź usunięcie",
"deletesub"		=> "(Usuwanie \"$1\")",
"confirmdeletetext" => "Zamierzasz trwale usunąć stronę
lub plik z bazy danych razem z dotyczącą ich historią.
Potwierdź, proszę, swoje zamiary, tzn., że rozumiesz konsekwencje,
i że robisz to w zgodzie z
[[Wikipedia:Policy]].",
"confirmcheck"	=> "Tak, naprawdę chcę usunąć.",
"actioncomplete" => "Operacja wykonana",
"deletedtext"	=> "Usunięto \"$1\".
Rejestr ostatnio dokonaych kasowań możesz obejrzeć tutaj: $2.",
"deletedarticle" => "Usunięto \"$1\"",
"dellogpage"	=> "Deletion_log",
"dellogpagetext" => "To jest lista ostatnio wykonanych kasowań.
Podane czasy odnoszą się do strefy czasowej serwera (UTC).
<ul>
</ul>
",
"deletionlog"	=> "rejestr usunięć",
"reverted"		=> "Przywrócono starszą wersję",
"deletecomment"	=> "Powód usunięcia",
"imagereverted" => "Przywrócenie wcześniejszej wersji powiodło się.",

# Contributions
#
"contributions"	=> "Wkład użytkownika",
"contribsub"	=> "Dla $1",
"nocontribs"	=> "Brak zmian odpowiadających tym kryteriom.",
"ucnote"		=> "Oto lista ostatnich <b>$1</b> zmian dokonanych przez
użytkownika w ciągu ostatnich <b>$2</b> dni.",
"uclinks"		=> "Zobacz ostatnie $1 zmian; zobacz ostatnie $2 dni.",

# What links here
#
"whatlinkshere"	=> "Linkujące",
"notargettitle" => "Wskazywana strona nie istnieje",
"notargettext"	=> "Nie podano strony albo użytkownika, dla których
ta operacja ma być wykonana.",
"linklistsub"	=> "(Lista linków)",
"linkshere"		=> "Do tej strony odwołują się następujące inne strony:",
"nolinkshere"	=> "Do tej strony nie odwołuje się do żadna inna.",
"isredirect"	=> "strona przekierowująca",

# Block/unblock IP
#
"blockip"		=> "Zablokuj adres IP",
"blockiptext"	=> "Użyj poniższego formularza aby zablokować prawo
zapisu spod określonego adresu IP.
Powinno się to robić jedynie by zapobiec wandalizmowi, a zarazem
w zgodzie z [[Wikipedia:Policy|polityką Wikipedii]].
Podaj powód (np. umieszczając nazwy stron, na których dopuszczono
się wandalizmu).",
"ipaddress"		=> "Adres IP",
"ipbreason"		=> "Powód",
"ipbsubmit"		=> "Zablokuj ten adres",
"badipaddress"	=> "Adres IP jest źle utworzony.",
"noblockreason" => "Musisz podać powód blokady.",
"blockipsuccesssub" => "Zablokowanie powiodło się",
"blockipsuccesstext" => "Adres IP \"$1\" został zablokowany.
<br>Przejdź do [[Specjalna:Ipblocklist|Listy zablokowanych adresów]] by przejrzeć blokady.",
"unblockip"		=> "Odblokuj adres IP",
"unblockiptext"	=> "Użyj poniższego formularza by przywrócić prawa zapisu
dla poprzednio zablokowanego adresu IP.",
"ipusubmit"		=> "Odblokuj ten adress",
"ipusuccess"	=> "Adress IP \"$1\" został odblokowany",
"ipblocklist"	=> "Lista zablokowanych adresów IP",
"blocklistline"	=> "$1, $2 zablokował $3",
"blocklink"		=> "zablokuj",
"unblocklink"	=> "odblokuj",
"contribslink"	=> "wkład",

# Developer tools
#
"lockdb"		=> "Zablokuj bazę danych",
"unlockdb"		=> "Odblokuj bazę danych",
"lockdbtext"	=> "Zablokowanie bazy danych uniemożliwi wszystkim użytkownikom
edycję stron, zmianę preferencji, edycję list obserwowanych artykułów oraz inne
czynności wymagające dostępu do bazy danych.
Potwierdź, proszę, że to jest zgodne z Twoimi zamiarami, i że odblokujesz
bazę danych, gdy tylko zakończysz zadania administracyjne.",
"unlockdbtext"	=> "Odblokowanie bazy danych umożliwi wszystkim użytkownikom
edycję stron, zmianę preferencji, edycję list
obserwowanych artykułów oraz inne czynności związane ze zmianami w bazie danych.
Potwierdź, proszę, że to jest zgodne z Twoimi zamiarami.",
"lockconfirm"	=> "Tak, naprawdę chcę zablokować bazę danych.",
"unlockconfirm"	=> "Tak, naprawdę chcę odblokowac bazę danych.",
"lockbtn"		=> "Zablokuj bazę danych",
"unlockbtn"		=> "Odblokuj bazę danych",
"locknoconfirm" => "Nie zaznaczyłeś pola potwierdzenia.",
"lockdbsuccesssub" => "Baza danych została pomyślnie zablokowana",
"unlockdbsuccesssub" => "Blokada bazy danych usunięta",
"lockdbsuccesstext" => "Baza danych Wikipedii została zablokowana.
<br>Pamiętaj usunąć blokadę po zakończeniu spraw administracyjnych.",
"unlockdbsuccesstext" => "Baza danych Wikipedii została odblokowana.",

# SQL query
#
"asksql"		=> "Zapytanie SQL",
"asksqltext"	=> "Użyj poniższego formularza by wysłać bezpośrednie zapytanie
do bazy danych Wikipedii.
Do ograniczania literałów łańcuchowych używaj pojedynczych cudzysłowów ('tak jak tu').
Twoje zapytanie może poważnie obciążyć serwer, więc używaj tej możliwości
z rozwagą.",
"sqlquery"		=> "Podaj zapytanie",
"querybtn"		=> "Wyślij zapytanie",
"selectonly"	=> "Zapytania inne niż \"SELECT\" są zastrzeżone tylko dla
użytkowników o statusie Programisty.",
"querysuccessful" => "Zapytanie zakończone sukcesem",

# Move page
#
"movepage"		=> "Przenieś stronę",
"movepagetext"	=> "Za pomocą poniższego formularza zmienisz nazwę strony,
przenosząc jednocześnie jej historę.
Pod starym tytułem zostanie umieszczona strona przekierowująca.
Linki do starego tytułu pozostaną niezmienione, a strona dyskusji,
jeśli istnieje, nie zostanie przeniesiona.<br>
<b>UWAGA!</b>
Może to być drastyczna lub nieprzewidywalna zmiana w przypadku popularnych stron;
upewnij się co do konsekwencji tej operacji zanim się na nią zdecydujesz.",
"movearticle"	=> "Przenieś stronę",
"movenologin"	=> "Brak logowania",
  //en wfLocalUrl( "Special:Userlogin" ) . "\">logged in</a>
"movenologintext" => "Musisz być zarejestrowanym i <a href=\"" .
  wfLocalUrl( "Specjalna:Userlogin" ) . "\">zalogowanym</a>
użytkownikiem aby móc przenieść stronę.",
"newtitle"		=> "Nowy tytuł",
"movepagebtn"	=> "Przenieś stronę",
"pagemovedsub"	=> "Przeniesienie powiodło się",
"pagemovedtext" => "Strona \"[[$1]]\" została przeniesiona do \"[[$2]]\".",
"articleexists" => "Strona o podanej nazwie już istnieje albo
wybrana przez Ciebie nazwa nie jest poprawna.
Wybierz, proszę, nową nazwę.",
"movedto"		=> "przeniesiono do",
"movetalk"		=> "Przenieś także stronę <i>Dyskusji</i>, jeśli to możliwe.",
"talkpagemoved" => "Odpowiednia strona z <i>Dyskusją</i> także została przeniesiona.",
"talkpagenotmoved" => "Odpowiednia strona z <i>Dyskusją</i> <strong>nie</strong> została przeniesiona.",

);

class LanguagePl extends Language {

	function getNamespaces() {
		global $wgNamespaceNamesPl;
		return $wgNamespaceNamesPl;
	}

	function getNsText( $index ) {
		global $wgNamespaceNamesPl;
		return $wgNamespaceNamesPl[$index];
	}

	function getNsIndex( $text ) {
		global $wgNamespaceNamesPl;

		foreach ( $wgNamespaceNamesPl as $i => $n ) {
			if ( 0 == strcasecmp( $n, $text ) ) { return $i; }
		}
		return false;
	}

	function specialPage( $name ) {
		return $this->getNsText( Namespace::getSpecial() ) . ":" . $name;
	}

	function getQuickbarSettings() {
		global $wgQuickbarSettingsPl;
		return $wgQuickbarSettingsPl;
	}

	function getSkinNames() {
		global $wgSkinNamesPl;
		return $wgSkinNamesPl;
	}

	function getUserToggles() {
		global $wgUserTogglesPl;
		return $wgUserTogglesPl;
	}

	function getLanguageName( $code ) {
		global $wgLanguageNamesPl;
		if ( ! array_key_exists( $code, $wgLanguageNamesPl ) ) {
			return "";
		}
		return $wgLanguageNamesPl[$code];
	}

	function getMonthName( $key )
	{
		global $wgMonthNamesPl;
		return $wgMonthNamesPl[$key-1];
	}

	function getMonthAbbreviation( $key )
	{
		global $wgMonthAbbreviationsPl;
		return $wgMonthAbbreviationsPl[$key-1];
	}

	function getWeekdayName( $key )
	{
		global $wgWeekdayNamesPl;
		return $wgWeekdayNamesPl[$key-1];
	}

	function userAdjust( $ts )
	{
		global $wgUser;

		$diff = $wgUser->getOption( "timecorrection" );
		if ( ! $diff ) { $diff = 0; }
		if ( 0 == $diff ) { return $ts; }

		$t = mktime( ( (int)substr( $ts, 8, 2) ) + $diff,
		  (int)substr( $ts, 10, 2 ), (int)substr( $ts, 12, 2 ),
		  (int)substr( $ts, 4, 2 ), (int)substr( $ts, 6, 2 ),
		  (int)substr( $ts, 0, 4 ) );
		return date( "YmdHis", $t );
	}
 
	function date( $ts, $adj = false )
	{
		if ( $adj ) { $ts = $this->userAdjust( $ts ); }

		$d = (0 + substr( $ts, 6, 2 )) . 
		  " " . $this->getMonthAbbreviation( substr( $ts, 4, 2 ) ) .
		  " " . substr( $ts, 0, 4 );
		return $d;
	}

	function time( $ts, $adj = false )
	{
		if ( $adj ) { $ts = $this->userAdjust( $ts ); }

		$t = substr( $ts, 8, 2 ) . ":" . substr( $ts, 10, 2 );
		return $t;
	}

	function timeanddate( $ts, $adj = false )
	{
		return $this->time( $ts, $adj ) . ", " . $this->date( $ts, $adj );
	}

	function rfc1123( $ts )
	{
		return date( "D, d M Y H:i:s T", $ts );
	}

	function getValidSpecialPages()
	{
		global $wgValidSpecialPagesPl;
		return $wgValidSpecialPagesPl;
	}

	function getSysopSpecialPages()
	{
		global $wgSysopSpecialPagesPl;
		return $wgSysopSpecialPagesPl;
	}

	function getDeveloperSpecialPages()
	{
		global $wgDeveloperSpecialPagesPl;
		return $wgDeveloperSpecialPagesPl;
	}

	function getMessage( $key )
	{
		global $wgAllMessagesPl;
        if(array_key_exists($key, $wgAllMessagesPl))
			return $wgAllMessagesPl[$key];
		else
			return Language::getMessage($key);
	}

    function ucfirst( $string ) {
		# For most languages, this is a wrapper for ucfirst()
		# But that doesn't work right in a UTF-8 locale
		include("utf8Case.php");
        return preg_replace (
        	"/^([\\x00-\\x7f]|[\\xc0-\\xff][\\x80-\\xbf]*)/e",
        	"strtr ( \"\$1\" , \$wikiUpperChars )",
        	$string );
	}

}

?>
