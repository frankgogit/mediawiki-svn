/*
Copyright © 2003,
Center for Intelligent Information Retrieval,
University of Massachusetts, Amherst.
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this
list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice,
this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.

3. The names "Center for Intelligent Information Retrieval" and
"University of Massachusetts" must not be used to endorse or promote products
derived from this software without prior written permission. To obtain
permission, contact info@ciir.cs.umass.edu.

THIS SOFTWARE IS PROVIDED BY UNIVERSITY OF MASSACHUSETTS AND OTHER CONTRIBUTORS
"AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS OR CONTRIBUTORS BE
LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
SUCH DAMAGE.
*/

/* This is a java version of Bob Krovetz' KStem.
 *
 * Java version by Sergio Guzman-Lara.
 * CIIR-UMass Amherst http://ciir.cs.umass.edu
 */
package org.apache.lucene.analysis;

/** A list of words used by Kstem
 */
public class KStemData1 {
    private KStemData1() {
    }
// KStemData1 ... KStemData8 are created from "head_word_list.txt"
   static String[] data = {
"aback","abacus","abandon","abandoned","abase",
"abash","abate","abattoir","abbess","abbey",
"abbot","abbreviate","abbreviation","abc","abdicate",
"abdomen","abduct","abed","aberrant","aberration",
"abet","abeyance","abhor","abhorrent","abide",
"abiding","abilities","ability","abject","abjure",
"ablative","ablaut","ablaze","able","ablution",
"ablutions","ably","abnegation","abnormal","abo",
"aboard","abode","abolish","abolition","abominable",
"abominate","abomination","aboriginal","aborigine","abort",
"abortion","abortionist","abortive","abound","about",
"above","aboveboard","abracadabra","abrade","abrasion",
"abrasive","abreast","abridge","abridgement","abridgment",
"abroad","abrogate","abrupt","abscess","abscond",
"absence","absent","absentee","absenteeism","absently",
"absinth","absinthe","absolute","absolutely","absolution",
"absolutism","absolve","absorb","absorbent","absorbing",
"absorption","abstain","abstemious","abstention","abstinence",
"abstract","abstracted","abstraction","abstruse","absurd",
"abundance","abundant","abuse","abusive","abut",
"abutment","abysmal","abyss","acacia","academic",
"academician","academy","accede","accelerate","acceleration",
"accelerator","accent","accentuate","accept","acceptable",
"acceptance","access","accessible","accession","accessory",
"accidence","accident","accidental","acclaim","acclamation",
"acclimatize","acclivity","accolade","accommodate","accommodating",
"accommodation","accommodations","accompaniment","accompanist","accompany",
"accomplice","accomplish","accomplished","accomplishment","accord",
"accordance","according","accordingly","accordion","accost",
"account","accountable","accountancy","accountant","accoutrements",
"accredit","accretion","accrue","accumulate","accumulation",
"accumulative","accumulator","accuracy","accurate","accursed",
"accusation","accusative","accuse","accused","accustom",
"accustomed","ace","acerbity","acetate","acetic",
"acetylene","ache","achieve","achievement","achoo",
"acid","acidify","acidity","acidulated","acidulous",
"acknowledge","acknowledgement","acknowledgment","acme","acne",
"acolyte","aconite","acorn","acoustic","acoustics",
"acquaint","acquaintance","acquaintanceship","acquiesce","acquiescent",
"acquire","acquisition","acquisitive","acquit","acquittal",
"acre","acreage","acrid","acrimony","acrobat",
"acrobatic","acrobatics","acronym","across","acrostic",
"act","acting","actinism","action","actionable",
"activate","active","activist","activity","actor",
"actress","acts","actual","actuality","actually",
"actuary","actuate","acuity","acumen","acupuncture",
"acute","adage","adagio","adam","adamant",
"adapt","adaptable","adaptation","adapter","adaptor",
"adc","add","addendum","adder","addict",
"addiction","addictive","addition","additional","additive",
"addle","address","addressee","adduce","adenoidal",
"adenoids","adept","adequate","adhere","adherence",
"adherent","adhesion","adhesive","adieu","adipose",
"adj","adjacent","adjective","adjoin","adjourn",
"adjudge","adjudicate","adjunct","adjure","adjust",
"adjutant","adman","admass","administer","administration",
"administrative","administrator","admirable","admiral","admiralty",
"admiration","admire","admirer","admissible","admission",
"admit","admittance","admitted","admittedly","admixture",
"admonish","admonition","admonitory","ado","adobe",
"adolescent","adopt","adoption","adoptive","adorable",
"adoration","adore","adorn","adornment","adrenalin",
"adrift","adroit","adulate","adulation","adult",
"adulterate","adulterer","adultery","adumbrate","adv",
"advance","advanced","advancement","advances","advantage",
"advantageous","advent","adventist","adventitious","adventure",
"adventurer","adventuress","adventurous","adverb","adverbial",
"adversary","adverse","adversity","advert","advertise",
"advertisement","advertising","advice","advisable","advise",
"advisedly","adviser","advisor","advisory","advocacy",
"advocate","adz","adze","aegis","aeon",
"aerate","aerial","aerie","aerobatic","aerobatics",
"aerodrome","aerodynamic","aerodynamics","aeronautics","aeroplane",
"aerosol","aerospace","aertex","aery","aesthete",
"aesthetic","aesthetics","aether","aethereal","aetiology",
"afar","affable","affair","affect","affectation",
"affected","affecting","affection","affectionate","affiance",
"affidavit","affiliate","affiliation","affinity","affirm",
"affirmative","affix","afflict","affliction","affluent",
"afford","afforest","affray","affricate","affront",
"aficionado","afield","afire","aflame","afloat",
"afoot","aforesaid","aforethought","afraid","afresh",
"afrikaans","afrikaner","afro","aft","after",
"afterbirth","aftercare","aftereffect","afterglow","afterlife",
"aftermath","afternoon","afternoons","afters","aftershave",
"aftertaste","afterthought","afterwards","again","against",
"agape","agate","age","ageing","ageless",
"agency","agenda","agent","agglomerate","agglutination",
"agglutinative","aggrandisement","aggrandizement","aggravate","aggravation",
"aggregate","aggregation","aggression","aggressive","aggressor",
"aggrieved","aggro","aghast","agile","agitate",
"agitation","agitator","aglow","agnostic","ago",
"agog","agonise","agonised","agonising","agonize",
"agonized","agonizing","agony","agoraphobia","agoraphobic",
"agrarian","agree","agreeable","agreeably","agreement",
"agriculture","agronomy","aground","ague","aha",
"ahead","ahem","ahoy","aid","ail",
"aileron","ailment","aim","aimless","air",
"airbase","airbed","airbladder","airborne","airbrake",
"airbrick","airbus","aircraft","aircraftman","aircrew",
"aircushion","airdrop","airedale","airfield","airflow",
"airforce","airgun","airhole","airhostess","airily",
"airing","airlane","airless","airletter","airlift",
"airline","airliner","airlock","airmail","airman",
"airplane","airpocket","airport","airs","airshaft",
"airship","airsick","airspace","airspeed","airstrip",
"airtight","airway","airwoman","airworthy","airy",
"aisle","aitch","ajar","akimbo","akin",
"alabaster","alack","alacrity","alarm","alarmist",
"alas","albatross","albeit","albino","album",
"albumen","alchemist","alchemy","alcohol","alcoholic",
"alcoholism","alcove","alder","alderman","ale",
"alehouse","alert","alfalfa","alfresco","algae",
"algebra","algorithm","alias","alibi","alien",
"alienate","alienation","alienist","alight","align",
"alignment","alike","alimentary","alimony","aline",
"alinement","alive","alkali","alkaline","all",
"allah","allay","allegation","allege","allegedly",
"allegiance","allegorical","allegory","allegretto","allegro",
"alleluia","allergic","allergy","alleviate","alley",
"alleyway","alliance","allied","alligator","alliteration",
"alliterative","allocate","allocation","allopathy","allot",
"allotment","allow","allowable","allowance","alloy",
"allspice","allude","allure","allurement","allusion",
"alluvial","alluvium","ally","almanac","almanack",
"almighty","almond","almoner","almost","alms",
"aloe","aloft","alone","along","alongside",
"aloof","alopecia","aloud","alpaca","alpenhorn",
"alpenstock","alpha","alphabet","alphabetical","alpine",
"already","alright","alsatian","also","altar",
"altarpiece","alter","alteration","altercation","alternate",
"alternative","alternator","although","altimeter","altitude",
"alto","altogether","altruism","altruist","alum",
"aluminium","alumna","alumnus","alveolar","always",
"alyssum","amalgam","amalgamate","amanuensis","amass",
"amateur","amateurish","amatory","amaze","amazing",
"amazon","ambassador","ambassadorial","amber","ambergris",
"ambidextrous","ambience","ambient","ambiguous","ambit",
"ambition","ambitious","ambivalent","amble","ambrosia",
"ambulance","ambush","ame","ameba","ameliorate",
"amen","amenable","amend","amendment","amends",
"amenity","americanise","americanism","americanize","amethyst",
"amiable","amicable","amid","amidships","amir",
"amiss","amity","ammeter","ammo","ammonia",
"ammonite","ammunition","amnesia","amnesty","amoeba",
"amoebic","amok","among","amoral","amorous",
"amorphous","amortise","amortize","amount","amour",
"amp","amperage","ampersand","amphetamine","amphibian",
"amphibious","amphitheater","amphitheatre","amphora","ample",
"amplifier","amplify","amplitude","ampoule","amputate",
"amputee","amuck","amulet","amuse","amusement",
"anachronism","anaconda","anaemia","anaemic","anaesthesia",
"anaesthetic","anaesthetist","anagram","anal","analgesia",
"analgesic","analog","analogize","analogous","analogue",
"analogy","analyse","analysis","analyst","analytic",
"anapaest","anarchic","anarchism","anarchist","anarchy",
"anathema","anathematize","anatomical","anatomist","anatomy",
"ancestor","ancestral","ancestry","anchor","anchorage",
"anchorite","anchovy","ancient","ancients","ancillary",
"and","andante","andiron","androgynous","anecdotal",
"anecdote","anemia","anemometer","anemone","anesthesia",
"anesthetise","anesthetize","anew","angel","angelica",
"angelus","anger","angle","anglican","anglicise",
"anglicism","anglicize","angling","anglophile","anglophilia",
"anglophobe","anglophobia","angora","angostura","angry",
"angst","anguish","anguished","angular","aniline",
"animadversion","animadvert","animal","animalcule","animalism",
"animate","animation","animism","animosity","animus",
"anis","anise","aniseed","ankle","anklet",
"annals","anneal","annex","annexation","annexe",
"annihilate","anniversary","annotate","annotation","announce",
"announcement","announcer","annoy","annoyance","annual",
"annuity","annul","annular","annunciation","anode",
"anodyne","anoint","anomalous","anomaly","anon",
"anonymity","anonymous","anopheles","anorak","anorexia",
"another","answer","answerable","ant","antacid",
"antagonism","antagonist","antagonize","antarctic","ante",
"anteater","antecedence","antecedent","antecedents","antechamber",
"antedate","antediluvian","antelope","antenatal","antenna",
"antepenultimate","anterior","anteroom","anthem","anther",
"anthill","anthology","anthracite","anthrax","anthropocentric",
"anthropoid","anthropologist","anthropology","anthropomorphic","anthropomorphism",
"anthropophagous","anthropophagy","antiaircraft","antibiotic","antibody",
"antic","anticipate","anticipation","anticipatory","anticlerical",
"anticlimax","anticlockwise","antics","anticyclone","antidote",
"antifreeze","antigen","antihero","antihistamine","antiknock",
"antilogarithm","antimacassar","antimatter","antimony","antipathetic",
"antipathy","antipersonnel","antipodal","antipodes","antiquarian",
"antiquary","antiquated","antique","antiquity","antirrhinum",
"antiseptic","antisocial","antithesis","antithetic","antitoxin",
"antler","antonym","anus","anvil","anxiety",
"anxious","any","anybody","anyhow","anyplace",
"anyroad","anything","anyway","anywhere","aorta",
"apace","apanage","apart","apartheid","apartment",
"apartments","apathetic","apathy","ape","aperient",
"aperitif","aperture","apex","aphasia","aphasic",
"aphid","aphorism","aphoristic","aphrodisiac","apiarist",
"apiary","apices","apiculture","apiece","apish",
"aplomb","apocalypse","apocalyptic","apocrypha","apocryphal",
"apogee","apologetic","apologetics","apologia","apologise",
"apologist","apologize","apology","apophthegm","apoplectic",
"apoplexy","apostasy","apostate","apostatise","apostatize",
"apostle","apostolic","apostrophe","apostrophize","apothecary",
"apothegm","apotheosis","appal","appall","appalling",
"appanage","apparatus","apparel","apparent","apparently",
"apparition","appeal","appealing","appear","appearance",
"appearances","appease","appeasement","appellant","appellate",
"appellation","append","appendage","appendectomy","appendicitis",
"appendix","appertain","appetite","appetizer","appetizing",
"applaud","applause","apple","applejack","appliance",
"applicable","applicant","application","applied","apply",
"appoint","appointment","appointments","apportion","apposite",
"apposition","appraisal","appraise","appreciable","appreciate",
"appreciation","appreciative","apprehend","apprehension","apprehensive",
"apprentice","apprenticeship","apprise","appro","approach",
"approachable","approbation","approbatory","appropriate","appropriation",
"approval","approve","approx","approximate","approximation",
"appurtenance","apricot","april","apron","apropos",
"apse","apt","aptitude","aqualung","aquamarine",
"aquaplane","aquarium","aquatic","aquatint","aqueduct",
"aqueous","aquiline","arab","arabesque","arabic",
"arable","arachnid","arak","arbiter","arbitrary",
"arbitrate","arbitration","arbitrator","arbor","arboreal",
"arboretum","arbour","arc","arcade","arcadia",
"arcane","arch","archaeology","archaic","archaism",
"archangel","archbishop","archbishopric","archdeacon","archdeaconry",
"archdiocese","archduke","archeology","archer","archery",
"archetype","archimandrite","archipelago","architect","architecture",
"archive","archway","arctic","ardent","ardor",
"ardour","arduous","are","area","areca",
"arena","argent","argon","argot","arguable",
"argue","argument","argumentative","aria","arid",
"aries","aright","arise","aristocracy","aristocrat",
"aristocratic","arithmetic","arithmetician","ark","arm",
"armada","armadillo","armament","armature","armband",
"armchair","armed","armful","armhole","armistice",
"armlet","armor","armorer","armorial","armory",
"armour","armoured","armourer","armoury","armpit",
"arms","army","aroma","aromatic","arose",
"around","arouse","arpeggio","arquebus","arrack",
"arraign","arrange","arrangement","arrant","arras",
"array","arrears","arrest","arrival","arrive",
"arrogance","arrogant","arrogate","arrow","arrowhead",
"arrowroot","arse","arsenal","arsenic","arson",
"art","artefact","arterial","arteriosclerosis","artery",
"artful","arthritis","artichoke","article","articles",
"articulate","articulated","articulateness","articulation","artifact",
"artifice","artificer","artificial","artillery","artisan",
"artist","artiste","artistic","artistry","artless",
"arts","arty","arum","asbestos","ascend",
"ascendancy","ascendant","ascendency","ascendent","ascension",
"ascent","ascertain","ascetic","ascribe","ascription",
"asepsis","aseptic","asexual","ash","ashamed",
"ashbin","ashcan","ashen","ashes","ashore",
"ashtray","ashy","aside","asinine","ask",
"askance","askew","aslant","asleep","asp",
"asparagus","aspect","aspectual","aspen","asperity",
"aspersion","asphalt","asphodel","asphyxia","asphyxiate",
"aspic","aspidistra","aspirant","aspirate","aspiration",
"aspire","aspirin","ass","assagai","assail",
"assailant","assassin","assassinate","assault","assay",
"assegai","assemblage","assemble","assembly","assemblyman",
"assent","assert","assertion","assertive","assess",
"assessment","assessor","asset","asseverate","assiduity",
"assiduous","assign","assignation","assignment","assimilate",
"assimilation","assist","assistance","assistant","assize",
"assizes","associate","association","assonance","assort",
"assorted","assortment","asst","assuage","assume",
"assumption","assurance","assure","assured","aster",
"asterisk","astern","asteroid","asthma","astigmatic",
"astigmatism","astir","astonish","astonishment","astound",
"astrakhan","astral","astray","astride","astringent",
"astrolabe","astrologer","astrology","astronaut","astronautics",
"astronomer","astronomical","astronomy","astrophysics","astute",
"asunder","asylum","asymmetric","atavism","atchoo",
"ate","atelier","atheism","atheist","athlete",
"athletic","athletics","athwart","atishoo","atlas",
"atmosphere","atmospheric","atmospherics","atoll","atom",
"atomic","atomise","atomize","atonal","atonality",
"atone","atop","atrocious","atrocity","atrophy",
"attach","attachment","attack","attain","attainder",
"attainment","attar","attempt","attend","attendance",
"attendant","attention","attentive","attenuate","attest",
"attestation","attested","attic","attire","attitude",
"attitudinise","attitudinize","attorney","attract","attraction",
"attractive","attributable","attribute","attribution","attributive",
"attrition","attune","atypical","aubergine","aubrietia",
"auburn","auction","auctioneer","audacious","audacity",
"audible","audience","audio","audiometer","audit",
"audition","auditor","auditorium","auditory","auger",
"aught","augment","augmentation","augur","augury",
"august","auk","aunt","aura","aural",
"aureole","auricle","auricular","auriferous","aurora",
"auscultation","auspices","auspicious","aussie","austere",
"austerity","australasian","autarchy","autarky","authentic",
"authenticate","authenticity","author","authoress","authorisation",
"authorise","authoritarian","authoritative","authority","authorization",
"authorize","authorship","autism","autistic","auto",
"autobahn","autobiographical","autobiography","autocracy","autocrat",
"autoeroticism","autograph","automat","automate","automatic",
"automation","automatism","automaton","automobile","autonomous",
"autonomy","autopsy","autostrada","autosuggestion","autumn",
"autumnal","auxiliary","avail","available","avalanche",
"avarice","avaricious","avatar","avaunt","avenge",
"avenue","aver","average","averse","aversion",
"aversive","avert","aviary","aviation","aviator",
"avid","avocado","avocation","avocet","avoid",
"avoidance","avoirdupois","avow","avowal","avowed",
"avuncular","await","awake","awaken","awakening",
"award","aware","awash","away","awe",
"awesome","awestruck","awful","awfully","awhile",
"awkward","awl","awning","awoke","awoken",
"awry","axe","axiom","axiomatic","axis",
"axle","axolotl","ayah","aye","azalea",
"azimuth","azure","baa","babble","babbler",
"babe","babel","baboo","baboon","babu",
"baby","babyhood","babyish","baccalaureate","baccara",
"baccarat","bacchanal","baccy","bachelor","bacillus",
"back","backache","backbench","backbite","backbone",
"backbreaking","backchat","backcloth","backcomb","backdate",
"backdrop","backer","backfire","backgammon","background",
"backhand","backhanded","backhander","backing","backlash",
"backlog","backmost","backpedal","backside","backslide",
"backspace","backstage","backstairs","backstay","backstroke",
"backtrack","backup","backward","backwards","backwash",
"backwater","backwoods","backwoodsman","backyard","bacon",
"bacteria","bacteriology","bactrian","bad","bade",
"badge","badger","badinage","badly","badminton",
"baffle","baffling","bag","bagatelle","bagful",
"baggage","baggy","bagpipes","bags","bah",
"bail","bailey","bailiff","bairn","bait",
"baize","bake","bakelite","baker","bakery",
"baksheesh","balaclava","balalaika","balance","balanced",
"balcony","bald","balderdash","balding","baldly",
"baldric","bale","baleful","balk","ball",
"ballad","ballade","ballast","ballcock","ballerina",
"ballet","ballistic","ballistics","ballocks","balloon",
"ballooning","balloonist","ballot","ballpoint","ballroom",
"balls","bally","ballyhoo","balm","balmy",
"baloney","balsa","balsam","balustrade","bamboo",
"bamboozle","ban","banal","banana","band",
"bandage","bandana","bandanna","bandbox","bandeau",
"bandit","banditry","bandmaster","bandoleer","bandolier",
"bandsman","bandstand","bandwagon","bandy","bane",
"baneful","bang","banger","bangle","banian",
"banish","banister","banjo","bank","bankbook",
"banker","banking","bankrupt","bankruptcy","banner",
"bannock","banns","banquet","banshee","bantam",
"bantamweight","banter","banyan","baobab","baptise",
"baptism","baptist","baptize","bar","barb",
"barbarian","barbaric","barbarise","barbarism","barbarize",
"barbarous","barbecue","barbed","barbel","barber",
"barbican","barbiturate","barcarole","barcarolle","bard",
"bare","bareback","barebacked","barefaced","barefoot",
"bareheaded","barelegged","barely","bargain","barge",
"bargee","baritone","barium","bark","barker",
"barley","barleycorn","barmaid","barman","barmy",
"barn","barnacle","barnstorm","barnyard","barograph",
"barometer","baron","baroness","baronet","baronetcy",
"baronial","barony","baroque","barque","barrack",
"barracks","barracuda","barrage","barred","barrel",
"barren","barricade","barricades","barrier","barring",
"barrister","barrow","bartender","barter","basalt",
"base","baseball","baseboard","baseless","baseline",
"basement","bases","bash","bashful","basic",
"basically","basics","basil","basilica","basilisk",
"basin","basis","bask","basket","basketball",
"basketful","basketry","basketwork","bass","basset",
"bassinet","bassoon","bast","bastard","bastardise",
"bastardize","bastardy","baste","bastinado","bastion",
"bat","batch","bated","bath","bathing",
"bathos","bathrobe","bathroom","baths","bathtub",
"bathysphere","batik","batiste","batman","baton",
"bats","batsman","battalion","batten","batter",
"battery","battle","battleax","battleaxe","battlefield",
"battlements","battleship","batty","bauble","baulk",
"bauxite","bawd","bawdy","bawl","bay",
"bayonet","bayou","bazaar","bazooka","bbc",
"beach","beachcomber","beachhead","beachwear","beacon",
"bead","beading","beadle","beady","beagle",
"beagling","beak","beaker","beam","bean",
"beanpole","beanstalk","bear","bearable","beard",
"bearded","bearer","bearing","bearings","bearish",
"bearskin","beast","beastly","beat","beaten",
"beater","beatific","beatification","beatify","beating",
"beatitude","beatitudes","beatnik","beau","beaujolais",
"beaut","beauteous","beautician","beautiful","beautify",
"beauty","beaver","bebop","becalmed","because",
"beck","beckon","become","becoming","bed",
"bedaub","bedbug","bedclothes","bedding","bedeck",
"bedevil","bedewed","bedfellow","bedimmed","bedlam",
"bedouin","bedpan","bedpost","bedraggled","bedridden",
"bedrock","bedroom","bedside","bedsore","bedspread",
"bedstead","bedtime","bee","beech","beef",
"beefcake","beefeater","beefsteak","beefy","beehive",
"beeline","been","beer","beery","beeswax",
"beet","beetle","beetling","beetroot","beeves",
"befall","befit","befitting","before","beforehand",
"befriend","befuddle","beg","beget","beggar",
"beggarly","beggary","begin","beginner","beginning",
"begone","begonia","begorra","begot","begotten",
"begrudge","beguile","begum","begun","behalf",
"behave","behavior","behaviorism","behaviour","behaviourism",
"behead","behemoth","behest","behind","behindhand",
"behold","beholden","behove","beige","being",
"belabor","belabour","belated","belay","belch",
"beleaguer","belfry","belie","belief","believable",
"believe","believer","belittle","bell","belladonna",
"bellboy","belle","bellflower","bellicose","belligerency",
"belligerent","bellow","bellows","belly","bellyache",
"bellyful","belong","belongings","beloved","below",
"belt","belted","belting","beltway","bemoan",
"bemused","ben","bench","bencher","bend",
"bended","bends","beneath","benedictine","benediction",
"benedictus","benefaction","benefactor","benefice","beneficent",
"beneficial","beneficiary","benefit","benevolence","benevolent",
"benighted","benign","benignity","bent","benumbed",
"benzedrine","benzene","benzine","bequeath","bequest",
"berate","bereave","bereaved","bereavement","bereft",
"beret","beriberi","berk","berry","berserk",
"berth","beryl","beseech","beseem","beset",
"besetting","beside","besides","besiege","besmear",
"besmirch","besom","besotted","besought","bespattered",
"bespeak","bespoke","best","bestial","bestiality",
"bestiary","bestir","bestow","bestrew","bestride",
"bet","beta","betake","betel","bethel",
"bethink","betide","betimes","betoken","betray",
"betrayal","betroth","betrothal","betrothed","better",
"betterment","betters","bettor","between","betwixt",
"bevel","beverage","bevy","bewail","beware",
"bewilder","bewitch","bey","beyond","bezique",
"bhang","bias","bib","bible","biblical",
"bibliographer","bibliography","bibliophile","bibulous","bicarb",
"bicarbonate","bicentenary","bicentennial","biceps","bicker",
"bicycle","bid","biddable","bidding","bide",
"bidet","biennial","bier","biff","bifocals",
"bifurcate","big","bigamist","bigamous","bigamy",
"bighead","bight","bigot","bigoted","bigotry",
"bigwig","bijou","bike","bikini","bilabial",
"bilateral","bilberry","bile","bilge","bilingual",
"bilious","bilk","bill","billboard","billet",
"billfold","billhook","billiard","billiards","billion",
"billow","billposter","billy","biltong","bimetallic",
"bimetallism","bimonthly","bin","binary","bind",
"binder","bindery","binding","bindweed","binge",
"bingo","binnacle","binocular","binoculars","binomial",
"biochemistry","biodegradable","biographer","biographical","biography",
"biological","biology","biomedical","bionic","biosphere",
"biotechnology","bipartisan","bipartite","biped","biplane",
"birch","bird","birdie","birdlime","birdseed",
"biretta","biro","birth","birthday","birthmark",
"birthplace","birthrate","birthright","biscuit","bisect",
"bisexual","bishop","bishopric","bismuth","bison",
"bisque","bistro","bit","bitch","bitchy",
"bite","biting","bitter","bittern","bitters",
"bittersweet","bitty","bitumen","bituminous","bivalve",
"bivouac","biweekly","bizarre","blab","blabber",
"blabbermouth","black","blackamoor","blackball","blackberry",
"blackbird","blackboard","blackcurrant","blacken","blackguard",
"blackhead","blacking","blackjack","blackleg","blacklist",
"blackly","blackmail","blackout","blackshirt","blacksmith",
"blackthorn","bladder","blade","blaeberry","blah",
"blame","blameless","blameworthy","blanch","blancmange",
"bland","blandishments","blank","blanket","blare",
"blarney","blaspheme","blasphemous","blasphemy","blast",
"blasted","blatant","blather","blaze","blazer",
"blazes","blazing","blazon","blazonry","bleach",
"bleachers","bleak","bleary","bleat","bleed",
"bleeder","bleeding","bleep","blemish","blench",
"blend","blender","bless","blessed","blessing",
"blether","blew","blight","blighter","blimey",
"blimp","blind","blinder","blinders","blindfold",
"blink","blinkered","blinkers","blinking","blip",
"bliss","blister","blistering","blithe","blithering",
"blitz","blizzard","bloated","bloater","blob",
"bloc","block","blockade","blockage","blockbuster",
"blockhead","blockhouse","bloke","blond","blood",
"bloodbath","bloodcurdling","bloodhound","bloodless","bloodletting",
"bloodshed","bloodshot","bloodstain","bloodstock","bloodstream",
"bloodsucker","bloodthirsty","bloody","bloom","bloomer",
"bloomers","blooming","blossom","blot","blotch",
"blotter","blotto","blouse","blow","blower",
"blowfly","blowgun","blowhard","blowhole","blowlamp",
"blown","blowout","blowpipe","blowsy","blowy",
"blowzy","blubber","bludgeon","blue","bluebag",
"bluebeard","bluebell","blueberry","bluebird","bluebottle",
"bluecoat","bluefish","bluejacket","blueprint","blues",
"bluestocking","bluff","blunder","blunderbuss","blunt",
"bluntly","blur","blurb","blurt","blush",
"bluster","blustery","boa","boar","board",
"boarder","boarding","boardinghouse","boardroom","boards",
"boardwalk","boast","boaster","boastful","boat",
"boater","boathouse","boatman","boatswain","bob",
"bobbin","bobby","bobcat","bobolink","bobsleigh",
"bobtail","bobtailed","bock","bod","bode",
"bodice","bodily","boding","bodkin","body",
"bodyguard","bodywork","boer","boffin","bog",
"bogey","boggle","boggy","bogie","bogus",
"bohemian","boil","boiler","boisterous","bold",
"boldface","boldfaced","bole","bolero","boll",
"bollard","bollocks","boloney","bolshevik","bolshevism",
"bolshy","bolster","bolt","bolthole","bomb",
"bombard","bombardier","bombardment","bombast","bomber",
"bombproof","bombshell","bombsight","bombsite","bonanza",
"bonbon","bond","bondage","bonded","bondholder",
"bonds","bone","boned","bonehead","boner",
"bonesetter","boneshaker","bonfire","bongo","bonhomie",
"bonito","bonkers","bonnet","bonny","bonsai",
"bonus","bony","bonzer","boo","boob",
"boobs","booby","boodle","boohoo","book",
"bookable","bookbindery","bookbinding","bookcase","bookend",
"booking","bookish","bookkeeping","booklet","bookmaker",
"bookmark","bookmobile","bookplate","books","bookseller",
"bookshop","bookstall","bookwork","bookworm","boom",
"boomerang","boon","boor","boost","booster",
"boot","bootblack","booted","bootee","booth",
"bootlace","bootleg","bootless","boots","bootstraps",
"booty","booze","boozer","boozy","bop",
"bopper","boracic","borage","borax","bordeaux",
"bordello","border","borderer","borderland","borderline",
"bore","borealis","borehole","borer","born",
"borne","boron","borough","borrow","borrowing",
"borscht","borshcht","borstal","borzoi","bosh",
"bosom","bosomy","boss","bossy","bosun",
"botanical","botanise","botanist","botanize","botany",
"botch","both","bother","botheration","bothersome",
"bottle","bottleful","bottleneck","bottom","bottomless",
"botulism","boudoir","bouffant","bougainvillaea","bougainvillea",
"bough","bought","bouillabaisse","bouillon","boulder",
"boulevard","bounce","bouncer","bouncing","bouncy",
"bound","boundary","bounden","bounder","boundless",
"bounds","bounteous","bountiful","bounty","bouquet",
"bourbon","bourgeois","bourgeoisie","bourn","bourne",
"bourse","bout","boutique","bouzouki","bovine",
"bovril","bovver","bow","bowdlerise","bowdlerize",
"bowed","bowel","bowels","bower","bowerbird",
"bowing","bowl","bowler","bowlful","bowline",
"bowling","bowls","bowman","bowser","bowshot",
"bowsprit","bowwow","box","boxer","boxful",
"boxing","boxwood","boy","boycott","boyfriend",
"boyhood","boyish","boys","bra","brace",
"bracelet","bracelets","braces","bracing","bracken",
"bracket","brackish","bract","bradawl","brae",
"brag","braggadocio","braggart","brahman","braid",
"braille","brain","brainchild","brainless","brainpan",
"brains","brainstorm","brainwash","brainwashing","brainwave",
"brainy","braise","brake","bramble","bran",
"branch","brand","brandish","brandy","brash",
"brass","brasserie","brassiere","brassy","brat",
"bravado","brave","bravo","bravura","brawl",
"brawn","brawny","bray","brazen","brazier",
"bre","breach","bread","breadbasket","breadboard",
"breadcrumb","breaded","breadfruit","breadline","breadth",
"breadthways","breadwinner","break","breakage","breakaway",
"breakdown","breaker","breakfast","breakneck","breakout",
"breakthrough","breakup","breakwater","bream","breast",
"breastbone","breastplate","breaststroke","breastwork","breath",
"breathalyse","breathalyser","breathe","breather","breathing",
"breathless","breathtaking","breathy","breech","breeches",
"breed","breeder","breeding","breeze","breezeblock",
"breezy","brethren","breve","brevet","breviary",
"brevity","brew","brewer","brewery","briar",
"bribe","bribery","brick","brickbat","brickfield",
"bricklayer","brickwork","bridal","bride","bridegroom",
"bridesmaid","bridge","bridgehead","bridgework","bridle",
"brie","brief","briefcase","briefing","briefs",
"brier","brig","brigade","brigadier","brigand",
"brigandage","brigantine","bright","brighten","brill",
"brilliancy","brilliant","brilliantine","brim","brimful",
"brimfull","brimstone","brindled","brine","bring",
"brink","brinkmanship","brioche","briquet","briquette",
"brisk","brisket","bristle","bristly","bristols",
"brit","britches","britisher","briton","brittle",
"broach","broad","broadcast","broadcasting","broadcloth",
"broaden","broadloom","broadminded","broadsheet","broadside",
"broadsword","broadways","brocade","broccoli","brochure",
"brogue","broil","broiler","broke","broken",
"broker","brolly","bromide","bromine","bronchial",
"bronchitis","bronco","brontosaurus","bronze","brooch",
"brood","broody","brook","broom","broomstick",
"broth","brothel","brother","brotherhood","brougham",
"brought","brouhaha","brow","browbeat","brown",
"brownie","brownstone","browse","brucellosis","bruin",
"bruise","bruiser","bruising","bruit","brunch",
"brunet","brunette","brunt","brush","brushwood",
"brushwork","brusque","brutal","brutalise","brutality",
"brutalize","brute","brutish","bubble","bubbly",
"buccaneer","buck","buckboard","bucked","bucket",
"buckle","buckler","buckram","buckshee","buckshot",
"buckskin","bucktooth","buckwheat","bucolic","bud",
"buddhism","budding","buddy","budge","budgerigar",
"budget","budgetary","buff","buffalo","buffer",
"buffet","buffoon","buffoonery","bug","bugaboo",
"bugbear","bugger","buggered","buggery","buggy",
"bughouse","bugle","bugrake","buhl","build",
"builder","building","buildup","bulb","bulbous",
"bulbul","bulge","bulk","bulkhead","bulky",
"bull","bulldog","bulldoze","bulldozer","bullet",
"bulletin","bulletproof","bullfight","bullfighting","bullfinch",
"bullfrog","bullheaded","bullion","bullnecked","bullock",
"bullring","bullshit","bully","bullyboy","bulrush",
"bulwark","bum","bumble","bumblebee","bumboat",
"bumf","bummer","bump","bumper","bumph",
"bumpkin","bumptious","bumpy","bun","bunch",
"bundle","bung","bungalow","bunghole","bungle",
"bunion","bunk","bunker","bunkered","bunkhouse",
"bunkum","bunny","bunting","buoy","buoyancy",
"bur","burberry","burble","burden","burdensome",
"burdock","bureau","bureaucracy","bureaucrat","bureaucratic",
"burg","burgeon","burgess","burgh","burgher",
"burglar","burglary","burgle","burgomaster","burgundy",
"burial","burlap","burlesque","burly","burn",
"burner","burning","burnish","burnous","burnouse",
"burnt","burp","burr","burro","burrow",
"bursar","bursary","burst","burthen","burton",
"bury","bus","busby","bush","bushbaby",
"bushed","bushel","bushwhack","bushy","business",
"businesslike","businessman","busk","busker","busman",
"bust","bustard","buster","bustle","busy",
"busybody","but","butane","butch","butcher",
"butchery","butler","butt","butter","buttercup",
"butterfingers","butterfly","buttermilk","butterscotch","buttery",
"buttock","buttocks","button","buttonhole","buttonhook",
"buttons","buttress","buxom","buy","buyer",
"buzz","buzzard","buzzer","bye","byelaw",
"bygone","bygones","bylaw","bypass","byplay",
"byre","bystander","byway","byways","byword",
"byzantine","cab","cabal","cabaret","cabbage",
"cabbie","cabby","cabdriver","caber","cabin",
"cabinet","cable","cablegram","caboodle","caboose",
"cabriolet","cacao","cache","cachet","cachou",
"cackle","cacophony","cactus","cad","cadaver",
"cadaverous","caddie","caddy","cadence","cadenza",
"cadet","cadge","cadi","cadmium","cadre",
"caerphilly","caesura","cafeteria","caffeine","caftan",
"cage","cagey","cahoots","caiman","caique",
"cairn","caisson","cajole","cake","calabash",
"calaboose","calamitous","calamity","calcify","calcination",
"calcine","calcium","calculable","calculate","calculating",
"calculation","calculator","calculus","caldron","calendar",
"calender","calends","calf","calfskin","caliber",
"calibrate","calibration","calibre","calico","caliper",
"calipers","caliph","caliphate","calisthenic","calisthenics",
"calk","call","calla","callboy","caller",
"calligraphy","calling","calliper","callipers","callisthenic",
"callisthenics","callous","callow","callus","calm",
"calomel","calorie","calorific","calumniate","calumny",
"calvary","calve","calves","calvinism","calypso",
"calyx","cam","camaraderie","camber","cambric",
"came","camel","camelhair","camellia","camembert",
"cameo","camera","cameraman","camisole","camomile",
"camouflage","camp","campaign","campanile","campanology",
"campanula","camper","campfire","campground","camphor",
"camphorated","campion","campsite","campus","camshaft",
"can","canal","canalise","canalize","canard",
"canary","canasta","cancan","cancel","cancellation",
"cancer","cancerous","candela","candelabrum","candid",
"candidate","candidature","candidly","candied","candle",
"candlelight","candlemas","candlepower","candlestick","candlewick",
"candor","candour","candy","candyfloss","candytuft",
"cane","canine","canis","canister","canker",
"canna","cannabis","canned","cannelloni","cannery",
"cannibal","cannibalise","cannibalism","cannibalize","cannon",
"cannonade","cannonball","cannot","canny","canoe",
"canon","canonical","canonicals","canonise","canonize",
"canoodle","canopy","canst","cant","cantab",
"cantabrigian","cantaloup","cantaloupe","cantankerous","cantata",
"canteen","canter","canticle","cantilever","canto",
"canton","cantonment","cantor","canvas","canvass",
"canyon","cap","capabilities","capability","capable",
"capacious","capacity","caparison","cape","caper",
"capillarity","capillary","capital","capitalisation","capitalise",
"capitalism","capitalist","capitalization","capitalize","capitals",
"capitation","capitol","capitulate","capitulation","capitulations",
"capon","capriccio","caprice","capricious","capricorn",
"capsicum","capsize","capstan","capsule","captain",
"caption","captious","captivate","captive","captivity",
"captor","capture","car","carafe","caramel",
"carapace","carat","caravan","caravanning","caravanserai",
"caraway","carbide","carbine","carbohydrate","carbolic",
"carbon","carbonated","carbonation","carboniferous","carbonise",
"carbonize","carborundum","carboy","carbuncle","carburetor",
"carburettor","carcase","carcass","carcinogen","card",
"cardamom","cardboard","cardiac","cardigan","cardinal",
"cardpunch","cards","cardsharp","care","careen",
"career","careerist","carefree","careful","careless",
"caress","caret","caretaker","careworn","cargo",
"caribou","caricature","caries","carillon","carious",
"carmelite","carmine","carnage","carnal","carnation",
"carnelian","carnival","carnivore","carnivorous","carob",
"carol","carotid","carousal","carouse","carousel",
"carp","carpal","carpenter","carpentry","carpet",
"carpetbag","carpetbagger","carpeting","carport","carpus",
"carriage","carriageway","carrier","carrion","carrot",
"carroty","carrousel","carry","carryall","carrycot",
"carryout","carsick","cart","cartage","cartel",
"carter","carthorse","cartilage","cartilaginous","cartographer",
"cartography","carton","cartoon","cartridge","cartwheel",
"carve","carver","carving","caryatid","cascade",
"cascara","case","casebook","casein","casework",
};
}
