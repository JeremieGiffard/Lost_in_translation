-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : mer. 22 sep. 2021 à 13:12
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeremiegif_lost_in_translation`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 'HALF LIFE', 'half-life', 'banner.jpg', '\r\n\r\nBook 2 of the Russell\'s Attic series â€” the sequel to Zero Sum Game\r\n\r\nCas Russell is back â€” and so is her deadly supermath.\r\n\r\nCas may be an antisocial mercenary who uses her instant calculating skills to mow down enemies, but sheâ€™s trying hard to build up a handful of morals. So when sheâ€™s hired by an anguished father to rescue his kid from an evil tech conglomerate, it seems like the perfect job to use for ethics practice.\r\n\r\nThen she finds her clientâ€™s daughter . . . who is a robot.\r\n\r\nThe researchers who own the â€™bot will stop at nothing to get it back, but the kidâ€™s just real enough for Cas to want to protect her â€” even though she knows sheâ€™s risking everything for a collection of metal and wires. But when the case blows up in her face, it plunges Cas into the crossfire of a massive, decades-long corporate espionage war.\r\n\r\nCas knows logically that she isnâ€™t saving a child. Sheâ€™s stealing a piece of technology, one expensive and high-stakes enough that spiriting it away is going to get innocent people killed. But she has a distraught father on one hand and a robot programmed to act like a distraught daughter on the other, and sheâ€™s never been able to sit by when a kid is in trouble â€” even a fake one.\r\n\r\nScrew morals and ethics. All Cas wants to do is save one little girl.\r\n\r\nThis work is a sequel of Zero Sum Game.\r\n\r\nRoot of Unity is a sequel of this work.\r\n', '2021-07-22 02:58:02', '2021-09-21 21:10:24'),
(2, 2, 'Root of Unity', 'root-of-unity', 'banner.jpg', 'Back for book three . . .\r\n\r\nCas Russell has always used her superpowered mathematical skills to dodge snipers or take down enemies. Oh, yeah, and make as much money as possible on whatever unsavory gigs people will hire her for. But then one of her few friends asks a favor: help him track down a stolen math proof. One that, in the wrong hands, could crumble encryption protocols worldwide and utterly collapse global commerce.\r\n\r\nCas is immediately ducking car bombs and men with AKs â€” this is the type of math people are willing to kill for, and the U.S. government wants it as much as the bad guys do. But all that pales compared to what Cas learns from delving into the proof. Because the more she works on the case, the more she realizes something is very, very wrong . . . with her.\r\n\r\nFor the first time, Cas questions her own bizarre mathematical abilities. How far they reach. How they tie into the pieces of herself that are broken â€” or missing.\r\n\r\nHow the new proof might knit her brain back together . . . while making her more powerful than sheâ€™s ever imagined.\r\n\r\nDesperate to fix her fractured self, Cas dives into the tangled layers of higher mathematics, frantic for numerical power that might not even be possible â€” and willing to do anything, betray anyone, to get it.\r\n\r\nThis work is a sequel of Half Life. https://unglue.it/work/168054/\r\n', '2021-07-23 06:40:14', '2021-09-21 21:13:03'),
(4, 1, 'Monte Cristo', 'monte-cristo', 'Monte-Cristo.jpg', 'Le Comte de Monte-Cristo est un roman dâ€™Alexandre Dumas, Ã©crit avec la collaboration dâ€™Auguste Maquet et dont la publication commence durant l\'Ã©tÃ© 1844. Il est partiellement inspirÃ© de faits rÃ©els, empruntÃ©s Ã  la vie de Pierre Picaud1.\r\n\r\nLe livre raconte comment, au dÃ©but du rÃ¨gne de Louis XVIII, le 24 fÃ©vrier 1815, jour oÃ¹ NapolÃ©on quitte l\'Ã®le d\'Elbe, Edmond DantÃ¨s, jeune marin de dix-neuf ans2, second du navire Le Pharaon, dÃ©barque Ã  Marseille pour s\'y fiancer le lendemain avec la belle Catalane MercÃ©dÃ¨s. Trahi par des Â« amis Â» jaloux, il est dÃ©noncÃ© comme conspirateur bonapartiste et enfermÃ© dans une geÃ´le du chÃ¢teau d\'If, au large de Marseille. AprÃ¨s quatorze annÃ©es, d\'abord rÃ©duit Ã  la solitude et au dÃ©sespoir puis rÃ©gÃ©nÃ©rÃ© et instruit en secret par un compagnon de captivitÃ©, l\'abbÃ© Faria, il rÃ©ussit Ã  sâ€™Ã©vader et prend possession d\'un trÃ©sor cachÃ© dans lâ€™Ã®le de Montecristo dont l\'abbÃ©, avant de mourir, lui avait signalÃ© l\'existence. Rendu riche et puissant, DantÃ¨s se fait passer pour divers personnages, dont le comte de Monte-Cristo. Il entreprend de garantir le bonheur et la libertÃ© aux rares qui lui sont restÃ©s fidÃ¨les et de se venger mÃ©thodiquement de ceux qui lâ€™ont accusÃ© Ã  tort et fait emprisonner.\r\n\r\nCe roman est, avec Les Trois Mousquetaires, lâ€™une des Å“uvres les plus connues de lâ€™Ã©crivain tant en France quâ€™Ã  lâ€™Ã©tranger. Il a dâ€™abord Ã©tÃ© publiÃ© en feuilleton dans le Journal des dÃ©bats du 28 aoÃ»t au 19 octobre 1844 (1re partie), du 31 octobre au 26 novembre 1844 (2e partie), puis finalement du 20 juin 1845 au 15 janvier 1846 (3e partie). \r\n', '2021-08-13 13:01:32', '2021-09-21 22:10:31'),
(5, NULL, 'grognon ', 'grognon-', 'cyberpunk.jpg', '<p><a href=\"https://www.patreon.com/studio11508\" target=\"_blank\">Support Cat Ipsum</a> | <a href=\"http://catipsum.com/submit.php\" target=\"_self\">Submit a Cat Ipsum</a></p>\r\n\r\n<p>Purr when give birth mew. Sleep over your phone and make cute snoring noises eat prawns daintily with a claw then lick paws clean wash down prawns with a lap of carnation milk then retire to the warmest spot on the couch to claw at the fabric before taking a catnap. Lick the other cats run around the house at 4 in the morning, disappear for four days and return home with an expensive injury; bite the vet kitty pounce, trip, faceplant you didn&#39;t see that no you didn&#39;t definitely didn&#39;t lick, lick, lick, and preen away the embarrassment slap kitten brother with paw yet drink from the toilet. Inspect anything brought into the house thug cat or my cat stared at me he was sipping his tea, too bathe private parts with tongue then lick owner&#39;s face, if it smells like fish eat as much as you wish but licks your face get scared by doggo also cucumerro . Eat the fat cats food mewl for food at 4am meow go back to sleep owner brings food and water tries to pet on head, so scratch get sprayed by water because bad cat meow in empty rooms so your pillow is now my pet bed mess up all the toilet paper. Need to check on human, have not seen in an hour might be dead oh look, human is alive, hiss at human, feed me hide head under blanket so no one can see. Wake up human for food at 4am eat plants, meow, and throw up because i ate plants instead of drinking water from the cat bowl, make sure to steal water from the toilet roll on the floor purring your whiskers off paw at beetle and eat it before it gets away but meoooow for rub my belly hiss. Human give me attention meow human is in bath tub, emergency! drowning! meooowww! or paw your face to wake you up in the morning, murr i hate humans they are so annoying catch mouse and gave it as a present. Find empty spot in cupboard and sleep all day touch my tail, i shred your hand purrrr, or plan steps for world domination and milk the cow chew foot, and cat snacks don&#39;t nosh on the birds. I will ruin the couch with my claws carefully drink from water glass and then spill it everywhere and proceed to lick the puddle yet whenever a door is opened, rush in before the human but fat baby cat best buddy little guy meow and walk away groom yourself 4 hours - checked, have your beauty sleep 18 hours - checked, be fabulous for the rest of the day - checked. Naughty running cat. Find something else more interesting. Pet me pet me don&#39;t pet me cereal boxes make for five star accommodation or tickle my belly at your own peril i will pester for food when you&#39;re in the kitchen even if it&#39;s salad so cuddle no cuddle cuddle love scratch scratch. Sleep chew master&#39;s slippers but flee in terror at cucumber discovered on floor sniff sniff meow to be let in kitty kitty pussy cat doll run outside as soon as door open. Pretend not to be evil. Sun bathe when owners are asleep, cry for no apparent reason. Sees bird in air, breaks into cage and attacks creature sniff all the things yet climb into cupboard and lick the salt off rice cakes roll over and sun my belly cat cat moo moo lick ears lick paws. What a cat-ass-trophy! kitty loves pigs so dream about hunting birds. Vommit food and eat it again sit by the fire but groom forever, stretch tongue and leave it slightly out, blep. Nyaa nyaa am in trouble, roll over, too cute for human to get mad yet that box? i can fit in that box, yet fall over dead (not really but gets sypathy) yet nyan nyan goes the cat, scraaaaape scraaaape goes the walls when the cat murders them with its claws yet scamper. Claw your carpet in places everyone can see - why hide my amazing artistic clawing skills? slap the dog because cats rule. Fat baby cat best buddy little guy purr like an angel intently stare at the same spot swat at dog. I&#39;m bored inside, let me out i&#39;m lonely outside, let me in i can&#39;t make up my mind whether to go in or out, guess i&#39;ll just stand partway in and partway out, contemplating the universe for half an hour how dare you nudge me with your foot?!?! leap into the air in greatest offense! snuggles up to shoulders or knees and purrs you to sleep, for lie on your belly and purr when you are asleep meow meow we are 3 small kittens sleeping most of our time, we are around 15 weeks old i think, i don&rsquo;t know i can&rsquo;t count lick human with sandpaper tongue who&#39;s the baby, and play riveting piece on synthesizer keyboard. Somehow manage to catch a bird but have no idea what to do next, so play with it until it dies of shock.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-08-13 13:08:07', '2021-08-27 14:31:37'),
(8, 2, 'A history of ipsum', 'a-history-of-ipsum', 'history-of-ipsum.jpg', ' The most famous latin phrases in design world.\r\n\r\nIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content (also called greeking). Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced.\r\n\r\nThe lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.\r\n\r\nA variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets. It was introduced to the information age in the mid-1980s by Aldus Corporation, which employed it in graphics and word-processing templates for its desktop publishing program PageMaker. Many popular word processors use this format as a placeholder. Some examples are Pages or Microsoft Word. ', '2021-08-17 14:32:09', '2021-09-21 22:16:37'),
(15, 11, 'Captain Quark and the Time Cheaters', 'captain-quark-and-the-time-cheaters', 'captain-Quark.jpg', '      Universes are colliding. Characters from a tangle of universesâ€”Star Trek, Marvel Comics, Star Wars, Harry Potter, DC Comics, Middle Earth and moreâ€”are colliding in a reality that has simply gone mad.\r\n\r\n        The evil, orange-skinned usurper, Uranus Blowhard, has hypnotized Amerricans with this mind-numbing MAGA chant. Blowhard is determined to collect the five Time Cheaters that will make him the most powerful roach motel tycoon in the Infiniverse. The only thing standing in Blowhardâ€™s way is Captain Quark and his crack team of superheroes, The Funtastic Five.\r\n\r\n        Will Quark and the FF thwart Blowhard\'s scheme to conquer the Infiniverse? The only place to find out is in the brain-tingling pages of CAPTAIN QUARK AND THE TIME CHEATERS!!\r\n        Read on MacDuff! https://unglue.it/free/kw.Superheroes/', '2021-08-28 09:51:15', '2021-09-21 22:18:10'),
(17, 16, 'Life and Adventures of Jack Engle:', 'life-and-adventures-of-jack-engle-', 'autumn-1080x1920-forest-mountain-5k-16242.jpg', '\r\n\r\nIn 1852, young Walt Whitmanâ€”a down-on-his-luck housebuilder in Brooklynâ€”was hard at work writing two books. One would become one of the most famous volumes of poetry in American history, a free-verse revelation beloved the world over, Leaves of Grass. The other, a novel, would be published under a pseudonym and serialized in a newspaper. A short, rollicking story of orphanhood, avarice, and adventure in New York City, Life and Adventures of Jack Engle appeared to little fanfare.\r\n\r\nThen it disappeared.\r\n\r\nNo one laid eyes on it until 2016, when literary scholar Zachary Turpin, University of Houston, followed a paper trail deep into the Library of Congress, where the sole surviving copy of Jack Engle has lain waiting for generations. Now, after more than 160 years, the University of Iowa Press is honored to reprint this lost work, restoring a missing piece of American literature by one of the worldâ€™s greatest authors, written as he verged on immortality.\r\n\r\nOpen Access PDF edition from the The Walt Whitman Quarterly Review in Iowa Research Online. Print and Ebook editions with an introduction by Zachary Turpin are available from University of Iowa Press\r\n\r\nhttps://unglue.it/work/204866/', '2021-09-02 17:32:33', '2021-09-21 22:13:33'),
(18, 14, 'refuge', 'refuge', 'refuge.jpg', '\r\n\r\nIt is 2029, twelve years on from a global plague. John Suter believes himself the sole survivor. He has gradually come to terms with his fate and has settled into a steady and self-reliant daily routine.\r\n\r\nOne morning he finds a mutilated body in the river near his house. In his terror, Suter knows he has no choice but to investigate.\r\n\r\nWhat he discovers upstream stretches his endurance to its limits and forces him to reassess not only his own humanity, but also his place within the human family he had once believed extinct.\r\n\r\nPurchase options on the author\'s website.\r\nhttps://unglue.it/work/203169/\r\n', '2021-09-07 08:52:45', '2021-09-21 22:20:21'),
(19, 14, 'Metagestures', 'metagestures', 'Metagestures.jpg', '\r\n\"What kinds of knowledge and understandings of the world can be generated â€“ and shared â€“ when we use para-academic techniques and sensibilities to decode or respond to relatively orthodox intellectual objects?\r\n\r\nAnd what worlds might be possible if we practiced scholarly work from a place of collaboration and pleasure, as joyful fellow explorers? \r\nIn Metagestures, presented in a playful tÃªte-bÃªche format, historian Carla Nappi and cultural theorist Dominic Pettman explore the use of fiction as a tool to write and think with works of theory. \r\n\r\nTaking VilÃ©m Flusserâ€™s Gestures as its point of inspiration and departure, Metagestures collects 16 pairs of short stories in which Pettman and Nappi make fictional worlds that animate and enliven each of the major gestures in Flusserâ€™s book. \r\nNappi and Pettman focus on Flusserâ€™s mediations on the gestures of filming, planting, loving, smoking a pipe, turning a mask around, and much more, with their own creative explorations of each theme, in a gathering of short fictions that test, expand, and further the social scientific claims of the original text with new scenarios and occasions. \r\n\r\nHere, Flusserâ€™s reflections on physical gesture serve as an inspiration for new ways of conceiving and conducting theory, and for thoughtful creative scholarly imagining, with and alongside one another.\"\r\n\r\nThis book is included in DOAB.\r\nhttps://unglue.it/work/400550/\r\n', '2021-09-07 09:00:06', '2021-09-21 22:26:08'),
(21, 14, 'grim', 'grim', 'autumn-1080x1920-forest-mountain-5k-16242.jpg', '\r\n\r\n    Once a Grimm, always a Grimm, or so one would think. Or at least Bellatrix would like to think so. But someone obviously disagreed with her.\r\n\r\n    Otherwise how did she come to inhabit the body of a little boy?\r\n\r\n    Bellatrix SI into Viserys Targaryen\r\n', '2021-09-07 10:26:20', '2021-09-07 12:26:20'),
(22, 14, 'Nietzsche ', 'nietzsche-', 'Nietzsche.png', 'â€œThere is always some madness in love. But there is also always some reason in madness.â€\r\nâ€• Friedrich Nietzsche \r\n\r\n\r\nâ€œI\'m not upset that you lied to me, I\'m upset that from now on I can\'t believe you.â€\r\nâ€• Friedrich Nietzsche \r\n\r\n\r\n\r\nâ€œI\'m not upset that you lied to me, I\'m upset that from now on I can\'t believe you.â€\r\nâ€• Friedrich Nietzsche', '2021-09-09 19:17:27', '2021-09-22 12:20:46'),
(23, 18, 'dune summary', 'dune-summary', 'dune-summary.png', 'Dune is a science fiction novel written by Frank Herbert and published in 1965. A winner of the Hugo Award and Nebula Award for outstanding science fiction, Dune is popularly considered one of the greatest science fiction novels of all time, and is frequently cited as the best-selling science fiction novel in history. Dune spawned five sequels written by Herbert, and inspired a film adaptation by David Lynch, two mini-series made by the United States-based Sci-Fi Channel, computer games, as well as a series of prequels, interquels, and sequels co-written by Brian Herbert, the author\'s son, and Kevin J. Anderson.\r\n\r\n\r\nDune is set far in the future, amidst a sprawling feudal intergalactic empire, where planetary fiefdoms are controlled by noble Houses that owe allegiance to the Imperial House Corrino. The novel tells the story of young Paul Atreides, heir apparent to Duke Leto Atreides and scion of House Atreides, as he and his family relocate to the planet Arrakis, the universe\'s only source of the spice melange. In a story that explores the complex interactions of politics, religion, ecology, technology, and human emotion, the fate of Paul, his family, his new planet and its native inhabitants, as well as the Padishah Emperor, the powerful Spacing Guild, and the secretive female order of the Bene Gesserit, are all drawn together into a confrontation that will change the course of humanity. ', '2021-09-21 16:45:49', '2021-09-22 12:20:50'),
(24, 23, 'The Fall of the Gods', 'the-fall-of-the-gods', 'fall-of-god.jpg', '\r\n\r\nWhen new graduate Yuki Kashizawa moves to London for her PhD, she is certainly not expecting to be dragged into a mystery. At the Deverex Tower, an ultra-modern skyscraper and her new home, Yuki bumps into the extravagant Rupert Howards. He involves her in his personal investigation on the buildingâ€™s former owner, Edwin Deverex, a brilliant scientist who vanished into thin air years before. The prime suspect, Ayleen Marker, hides more than one secret, and the connection between the enigmatic past told in her dreams and Deverexâ€™s disappearance is unlike anything Yuki and Rupert could ever imagine. The investigation takes an alarming turn when Rupert discovers that the Deverex Towerâ€™s hidden technological wonders have fallen into the wrong handsâ€¦\r\n\r\nThe Fall of the Gods is the first instalment in the science fiction series The Elynx Saga. It paves the way for a long, convoluted story that will intrigue you and take you as far as your imagination can go. Spiced up with superhero and classical sci-fi elements, The Elynx Saga is a hunt for a hidden truth, beginning with a curious, unsolved case of missing person. This is, however, only the tip of the icebergâ€¦\r\n\r\nAdditional versions available from the author\'s website.\r\n\r\nThis work is a translation of La Caduta degli DÃ¨i. https://unglue.it/work/209399/\r\n', '2021-09-21 18:28:38', '2021-09-21 22:22:09'),
(25, 2, 'ZERO SUM GAME', 'zero-sum-game', 'ZERO-SUM-GAME.jpg', 'Cas Russell is good at math. Scary good.\r\n\r\nThe vector calculus blazing through her head lets her smash through armed men twice her size and dodge every bullet in a gunfight. She can take any job for the right price and shoot anyone who gets in her way.\r\n\r\nAs far as she knows, sheâ€™s the only person around with a superpower . . . but then Cas discovers someone with a power even more dangerous than her own. Someone who can reach directly into peopleâ€™s minds and twist their brains into Moebius strips. Someone intent on becoming the worldâ€™s puppet master.\r\n\r\nSomeone whoâ€™s already warped Casâ€™s thoughts once before, with her none the wiser.\r\n\r\nCas should run. Going up against a psychic with a god complex isnâ€™t exactly a rational move, and saving the world from a power-hungry telepath isnâ€™t her responsibility. But she isnâ€™t about to let anyone get away with violating her brain â€” and besides, sheâ€™s got a small arsenal and some deadly mathematics on her side. Thereâ€™s only one problem . . .\r\n\r\nShe doesnâ€™t know which of her thoughts are her own anymore.\r\n\r\nZERO SUM GAME is a speculative fiction thriller by an MIT math graduate.', '2021-09-21 19:05:39', '2021-09-22 12:20:55'),
(26, NULL, 'The Joy of Cryptography', 'the-joy-of-cryptography', 'The-Joy-of-Cryptography.jpg', 'The Joy of Cryptography is a textbook written for CS427, Oregon State\'s undergraduate course in cryptography.\r\n\r\nThe pedagogical approach is anchored in formal definitions/proof of security, but in a way more accessible than what is &quot;traditional&quot; in crypto. All security definitions are written in a unified and simplified &quot;game-based&quot; style. For an example of what security definitions look like in this style, see the index of security definitions (which will make more sense after reading chapters 2 &amp; 4). \r\n\r\nIt contains over 120 exercises.\r\n\r\n&quot;The Joy of Cryptography&quot; is a silly title, but all the sensible titles were already taken. It was at least better than &quot;You Can\'t Spell Cryptography without Cry&quot;. Anyway, actual joy not guaranteed.\r\n\r\nhttps://unglue.it/work/470161/', '2021-09-22 08:30:06', '2021-09-22 12:21:10'),
(27, 26, 'The Story of the Mince Pie', 'the-story-of-the-mince-pie', 'the-story-of-the-mince-pie.jpg', '\r\n\r\nYou have heard of many kinds of pie, but did you ever hear of a Doll pie?\r\n\r\nNo one ever did, I am sure, and no one knew the pie was full of dolls; everybody supposed it was just a plain mince pie; the kind that makes your eyes twinkle, and makes you smack your lips when you sniff it baking.\r\n\r\nI have always thought it was the kind Jack Horner had when he sat in the corner and pulled out a plum, but never did I dream that he might have pulled out a doll!\r\n\r\nI found it out in such an extremely funny and unexpected way that I must tell you all about it.\r\n\r\nIt was Christmas Eve. Jackâ€™s father was away but coming home on the morrow in time for all the Christmas doings.\r\n\r\nWe had locked up the house and were just going upstairs to bed when Jack exclaimed:\r\n\r\nâ€œMother, you know the mince pie you baked to-day? We must take it up to bed with us!â€\r\n\r\nâ€œA pie, a mince pie to bed with us?â€ I cried in amazement, as I thought of the spicy delicious thing safely stowed away on the pantry shelf.\r\n\r\nâ€œYes, Mother, you know there is a mouse. It ate up my gingerbread doll; didnâ€™t leave even a crumb. How would we feel if it ate up our mince pie!â€\r\n\r\nThat was true. There had been a mouse3 spying about of late, and so I said all right, we would.\r\n\r\nI carried it up very carefully, and we stood in the middle of the room looking about for a good place to put it.\r\n\r\nIt was a bitter night. The maid had built a grand fire of logs, and they crackled and snapped a Christmas greeting as we stood seeking a resting place for the pie.\r\n\r\nâ€œI see a fine spot!â€ cried Jack, as he ran to the big grandfather clock, and sure enough it was. A shelf just under the pendulum that seemed made on purpose for a pie. We placed it there and covered it carefully with a napkin.\r\n\r\nâ€œThe pie is going to bed, too,â€ I said, as I snuggled it up under its cover.\r\n\r\nThis book is included in Project Gutenberg.\r\nhttps://unglue.it/work/324539/', '2021-09-22 10:17:50', '2021-09-22 12:17:50');

-- --------------------------------------------------------

--
-- Structure de la table `post_topic`
--

CREATE TABLE `post_topic` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post_topic`
--

INSERT INTO `post_topic` (`id`, `post_id`, `topic_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(4, 4, 6),
(5, 5, 2),
(16, 17, 2),
(17, 18, 6),
(18, 19, 1),
(25, 21, 2),
(26, 22, 1),
(27, 23, 1),
(28, 24, 2),
(29, 25, 1),
(30, 26, 2),
(31, 27, 6);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'science fiction', 'science-fiction'),
(2, 'fanfiction', 'fanfiction'),
(6, 'fantasy', 'fantasy');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(225) NOT NULL,
  `role` enum('Author','Admin') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `status`, `created_at`, `updated_at`, `password`, `role`) VALUES
(1, 'Steph', 'steph@gmail.com', 1, '2021-08-18 08:05:00', '2021-08-18 08:05:00', 'bloblobla', 'Author'),
(2, 'SL Huang ', 'SL_Huang@gmail.com', 1, '2021-08-19 12:05:18', '2021-08-19 12:05:18', '$2y$10$9WZFNf8FKmxlwW2ZkdQOReZKnZLTV8uDIy0sKA0hLK5tXKEgKq1LO', 'Author'),
(4, 'Max', 'stephenilori678@gmail.com', 1, '2021-08-22 14:20:10', '2021-08-22 14:30:01', '$2y$10$jNDWlIOgPdB46VnXDZfgIuafjbmVoF./TYQX.XwccYODoi5bSgiTO', 'Author'),
(11, 'John', 'jonilori458@gmail.com', 1, '2021-08-24 12:53:26', '2021-08-24 12:53:26', '$2y$10$oevj6bX4PTHLkcvjrX455OGm1w6RpRxvzVlqn0lM1YfJ2q31zZC2q', 'Author'),
(13, 'jeremie', 'jfk@gmail.com', 1, '2021-08-26 12:53:26', '2021-08-26 12:53:26', '$2y$10$m2ridYV4uHY6qiB8Qk/P9ea89pmzJyr8pzUkosbZqEJ0UmzqzTBYm', 'Author'),
(14, 'bloblo', 'blo@gmail.com', 1, '2021-08-30 06:47:11', '2021-09-21 18:56:19', '$2y$10$pV./cloXnyODjmIat4lKgOaH76RdUuUGRhhy/OI31nLxmw9qPYQD2', 'Admin'),
(16, 'blabla', 'bla@gmail.com', 1, '2021-08-31 11:41:47', '2021-09-02 17:31:06', '$2y$10$OJvWVkwNOZ9TiBi2Us4qQuhfraFW3Dxnu4lgYOU1eZj3CxYJmKtOS', 'Author'),
(17, 'blibli', 'bli@gmail.com', 1, '2021-09-01 11:32:18', '2021-09-01 11:32:18', '$2y$10$JFKltYSPVITKV6cV3RjDu.GpT9t6f/qY4zhjcdyo3vxNuw564D1oG', 'Author'),
(18, 'grouik', 'grouik@gmail.com', 1, '2021-09-21 14:41:07', '2021-09-21 16:44:12', '$2y$10$ZzNYtkyagnpR1jGdyAbt1e5S7L0shkWJDutYUNaeqMv1JXs/Z6jqW', 'Author'),
(23, 'user_test', 'user_test@gmail.com', 1, '2021-09-21 16:14:41', '2021-09-21 18:53:23', '$2y$10$hZe5aAmRebCLCyc9qLJjC.rAXNPAyzAiGzrBPSp2OpeI16SbkbWVG', 'Author'),
(26, 'mypassword', 'mypassword@gmail.com', 1, '2021-09-22 06:44:43', '2021-09-22 10:16:13', '$2y$10$RuyQ9Gr8NUjg7B8WH6XV0.2A2zCv.VRBPMuze06fRCfcHpETuTVPe', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `post_topic`
--
ALTER TABLE `post_topic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD KEY `post_topic_ibfk_2` (`topic_id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `post_topic`
--
ALTER TABLE `post_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post_topic`
--
ALTER TABLE `post_topic`
  ADD CONSTRAINT `post_topic_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_topic_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
