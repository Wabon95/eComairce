-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 nov. 2021 à 12:47
-- Version du serveur : 8.0.21
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecomairce`
--
CREATE DATABASE IF NOT EXISTS `ecomairce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecomairce`;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`) VALUES
(87, 1, 4, 1),
(88, 1, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Quebec Ipsum', 'quebec-ipsum', 'Bâtard de torrieux de boswell de calvinouche de cimonaque de torvisse de gériboire de Jésus de plâtre de bout d\'crisse de calvaire de charrue de sacréfice de tabarouette de crisse d\'ostifie de maudite marde de tabarnouche de calvince.', '50', '2021-09-14 23:36:05', NULL),
(3, 'The Devil\'s Advocate', 'the-devil-s-advocate', 'La culpabilité, c’est un énorme sac plein de briques, tout ce que tu as à faire, c’est le poser. Pour qui tu le portes ton sac de briques ? Dis-moi Kevin. Dieu ? C’est ça ? Dieu ? Tu sais quoi ? J’vais te dévoiler une petite info exclusive au sujet de Dieu : Dieu aime regarder. C’est un farceur. Réfléchis : il accorde à l’homme les instincts, il vous fait ce cadeau extraordinaire et ensuite, qu’est-ce qu’il s’empresse de faire ? Et ça j’peux te l’jurer, pour son propre divertissement, sa propre distraction cosmique, personnelle, il établit des règles en oppositions. C’est d’un mauvais goût épouvantable... Regarde, mais surtout ne touche pas. Touche, mais surtout ne goûte pas ! Goûte, n’avale surtout pas ! Ha ha ha ! Et pendant que vous êtes tous là à sautiller d’un pied sur l’autre, lui qu’est-ce qu’il fait ? Il se fend la pêche à s’en cogner son vieux cul de cinglé au plafond. C’est un refoulé ! C’est un sadique ! C’est un proprio qu’habite même pas l’immeuble ! Vénérer un truc pareil ? Jamais !', '120', '2021-09-14 23:36:45', NULL),
(4, 'Pulp Fiction', 'pulp-fiction', 'La marche des vertueux est semée d’obstacles qui sont les entreprises égoïstes que fait sans fin, surgir l’œuvre du malin. Béni soit-il l’homme de bonne volonté qui, au nom de la charité se fait le berger des faibles qu’il guide dans la vallée d’ombre de la mort et des larmes, car il est le gardien de son frère et la providence des enfants égarés. J’abattrai alors le bras d’une terrible colère, d’une vengeance furieuse et effrayante sur les hordes impies qui pourchassent et réduisent à néant les brebis de Dieu. Et tu connaîtras pourquoi mon nom est l’éternel quand sur toi, s’abattra la vengeance du Tout-Puissant !', '80', '2021-09-14 23:37:05', NULL),
(5, 'The Green Mile', 'the-green-mile', 'Je suis fatigué patron, fatigué de devoir courir les routes et d’être seul comme un moineau sous la pluie... Fatigué d’avoir jamais un ami pour parler, pour me dire où on va, d’où on vient et pourquoi... Mais surtout je suis fatigué de voir les hommes se battre les uns contre les autres, je suis fatigué de toute la peine et la souffrance que je sens dans le monde...', '40', '2021-09-14 23:37:25', NULL),
(6, 'Django Unchained', 'django-unchained', 'T\'as dis qu\'en 76 ans dans cette plantation t\'avais vu des tas de manières de torturer les nègres, mais t\'en a oublié une, le coup d\'pistolet dans le genou ! 76 ans Steven... Alors tu pense que tu as vu défiler combien d\'esclave ? 7000 négros ? 8000 négros ? 9000 ? 9999 ? Calvin Candy à vomi un sacré paquet de saloperies et un flot de foutaises faut bien le reconnaître, mais il ne se trompait pas sur une chose: Tu vois c\'est bien moi le nègre sur 10.000 !', '60', '2021-09-14 23:37:43', NULL),
(7, 'Asterix & Obelix', 'asterix-obelix', 'Mais, vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres, des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée… Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face, je dirais, le miroir qui vous aide à avancer. Alors ce n’est pas mon cas, comme je le disais là, puisque moi au contraire, j’ai pu ; et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie… Je ne suis qu’amour ! Et finalement, quand beaucoup de gens aujourd’hui me disent : « Mais comment fais-tu pour avoir cette humanité ? » Eh bien je leur réponds très simplement, je leur dis que c’est ce goût de l’amour, ce goût donc qui m’a poussé aujourd’hui à entreprendre une construction mécanique, mais demain, qui sait, peut-être simplement à me mettre au service de la communauté, à faire le don, le don de soi…', '40', '2021-09-14 23:38:01', NULL),
(8, 'Star Wars', 'star-wars', 'Est-ce que tu connais l’histoire tragique de Dark Plagueis le Sage ? Ce n’est pas le genre d’histoires que racontent les Jedi. C’est une légende Sith. Dark Plagueis était un Seigneur Noir des Sith tellement puissant et tellement sage qu’il pouvait utiliser la Force pour influer sur les midi-chloriens et pouvait créer la vie. En outre, sa connaissance du Côté Obscur était telle qu’il arrivait aussi à empêcher ceux dont l’existence lui importait de mourir. Il était devenu tellement puissant que la seule chose qui lui faisait encore peur était de perdre son pouvoir, ce qui, arriva un jour. Il fit l’erreur d’enseigner à son jeune apprenti son savoir, et tous ses secrets. Et cet apprenti le tua pendant qu’il dormait. Quelle ironie ! Il avait vaincu la mort pour les autres, mais la sienne il n’a pas su l’éviter.', '66', '2021-09-15 00:01:36', NULL),
(9, 'Forrest Gump', 'forrest-gump', 'Enfin, comme je te le disais, la crevette c’est le fruit de la mer. On la fait au barbecue, bouillie, grillée, rôtie, sautée. T’as la crevette kebab, la crevette créole, le gombo de crevettes ; à la planche, à la vapeur, en sauce ; tu fais l’avocat crevettes, la crevette citron, la crevette à l’ail, la crevette au poivre ; soupe de crevettes, ragoût de crevettes, la salade de crevettes, cocktail de crevettes, le hamburger de crevettes, le sandwich crevettes. Ah… C’est à peu près tout.', '80', '2021-09-15 00:02:44', NULL),
(10, 'Le Loup De Wall Street', 'le-loup-de-wall-street', 'Je m’appelle Jordan Belfort. Je faisais autrefois parti de la classe moyenne, élevé par deux comptables dans un petit appartement dans le Queens. L’année de mes vingt-six ans, à la tête de ma boîte de courtage, je me suis fait quarante-neuf millions de dollars. Ce qui m\'a carrément fait chier parce-qu\'à trois près ça faisait un million par semaine.', '49', '2021-09-15 00:08:26', NULL),
(11, 'Blade Runner', 'blade-runner', 'J’ai vu tant de choses, que vous, humains, ne pourriez pas croire… De grands navires en feu surgissant de l’épaule d’Orion, j’ai vu des rayons fabuleux, des rayons C, briller dans l’ombre de la Porte de Tannhaüser. Tous ces moments se perdront dans l’oubli, comme les larmes dans la pluie. Il est temps de mourir.', '80', '2021-09-15 00:14:35', NULL),
(12, 'Will Hunting', 'will-hunting', 'Pourquoi je travaillerai pas pour la NSA ? Ça c’est une colle ! Je vais essayer d’y répondre.\r\nDisons que je travaille à la NSA et qu’on dépose un code sur mon bureau, un code réputé inviolable, mettons que je tente ma chance, mettons que j’le déchiffre, là j’suis très content de moi parce que j’ai bien fait mon boulot, mais c’était peut-être le code de l’emplacement d’une armée rebelle en moyen orient ou en Afrique du nord, et une fois qu’on a repéré le lieu, on bombarde le village où les rebelles se cachent, et quinze cents personnes que j’ai jamais vu, qui ne m’ont jamais rien fait, sont tuées.\r\nEt les politiciens, ils disent : « envoyez les marines assurer la sécurité », parce qu’ils en ont rein à foutre, c’est pas leurs gosses qu’ils envoient se faire descendre, comme eux ils sont jamais allés au feu, parce qu’ils étaient tous planqués dans la garde nationale ; c’est un pauvre môme de Boston sud qui se prend un shrapnel dans les fesses, et il revient pour apprendre que l’usine où il travaillait s’est exportée dans le pays d’où il vient d’arriver et le mec qui lui a filé le shrapnel dans le cul c’est lui qui a son job, parce qu’il bosse pour 15 cents par jour sans pose pipi ; et maintenant il comprend que la seule raison qu’il y avait de l’envoyer là-bas, c’était de mettre en place un gouvernement qui nous vendrait le pétrole pour pas cher, et bien sûr les compagnies pétrolières exploitent le conflit qu’il y a eu pour faire monter les prix, et se faire du même coup un beau p’tit bénef, mais ça aide pas mon pote qui travaille pour des clous.\r\nIl se traîne un max à livrer le pétrole bien sûr, peut-être même qu’ils vont employer un alcoolique comme capitaine, un buveur de martini, qui s’amuse à faire du slalom entre les icebergs, jusqu’au jour où il en frappe un. Le pétrole se déverse et ça tue toute vie dans l’Atlantique nord.\r\nAlors là, mon pote est chômeur, il peut pas se payer de voiture et c’est à pied qu’il se cherche des jobs, ce qui est pas marrant parce que le shrapnel qu’il a eu dans le cul, lui a filé des hémorroïdes, et puis en plus il crève de faim parce qu’à la soupe populaire on lui propose comme plat du jour, de la morue de l’Atlantique nord avec de l’huile de moteur.\r\nAlors qu’est-ce que j’en pense ? J’vais attendre une offre meilleure. J’me dis, putain je ferai peut-être aussi bien de descendre mon pote, prendre son job, le filer à son pire ennemi, faire monter les prix, bombarder, tuer des bébés phoques, fumer de l’herbe, m’engager dans la garde nationale. Et puis j’serai peut-être élu Président ?', '90', '2021-09-15 00:17:59', NULL),
(13, 'Gladiator', 'gladiator', 'Mon nom est Maximus Desimus Meridius, commandant en chef des armées du nord, général des légions Félix, fidèle serviteur du vrai empereur Marc Aurel. Père d’un fils assassiné, époux d’une femme assassinée, et j’aurai ma vengeance dans cette vie ou dans l’autre.', '70', '2021-09-15 00:33:02', NULL),
(14, 'A Knight’s Tale', 'a-knight-s-tale', 'Ma très chère Joceline, il est étrange de penser que je ne vous ai pas vu depuis un mois. J’ai vu la nouvelle lune mais pas vous. J’ai vu des couchés et des levés de soleil mais je n’ai pas vu votre beau visage. […] Mon cœur est brisé en si menu morceaux qu’il passerait à travers le chat d’une aiguille. […] Vous me manquez comme la fleur manque au soleil. Comme la fleur manque au soleil au plus profond de l’hiver. Au lieu de diriger sa lumière vers la beauté, le cœur se durcit comme l’univers glacé où votre absence m’a si cruellement jeté. Mon prochain combat aura lieu à Paris, où je ne trouverais que vide et hiver si vous n’y êtes pas. […] L’espoir guide mes pas, c’est l’espoir qui me permet de traverser le jour et plus encore la nuit. L’espoir que si vous disparaissez à mes yeux, ce ne soit pas la dernière fois que je vous contemple. Et pour finir, avec tout l’amour qui est en moi, […] je demeure tout à vous. Le chevalier de votre cœur.', '50', '2021-09-15 00:38:01', NULL),
(15, 'Contact', 'contact', 'Ellie, je sais que tu dois penser que tout ça est une injustice, mais c’est encore en dessous de la vérité. Je veux que tu saches que je suis d’accord avec toi. J’aimerais bien que le monde soit l’endroit où la justice est le principe de base, où le genre d’idéalisme que tu as montré soit récompensé, et non utilisé contre toi. Malheureusement, nous ne vivons pas dans ce monde.', '80', '2021-09-15 00:39:15', NULL),
(16, 'From Dusk till Dawn', 'from-dusk-till-dawn', 'Tout baigne dans l’huile Kate ! J’suis en plein nirvana !\r\nÀ part le fait que… Que j’viens d’enfoncer un pieux dans le cœur de mon frère parce qu’il s’était transformé en vampire… Bien que je ne crois pas aux vampires. À part ça, ce malencontreux épisode, tout est aux p’tits oignons.', '90', '2021-09-15 00:51:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `avatar`, `type`, `created_at`, `updated_at`) VALUES
(1, 'dbonaglia95@protonmail.com', '$2y$10$QC/Gk6Yla4zfUEjHU1HqwuLhosxhLkeVEhIo0so7ubf1c9fj7M2Aa', NULL, 1, '2021-09-13 15:26:57', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
