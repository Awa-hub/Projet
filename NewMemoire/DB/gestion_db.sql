--
-- Base de données : `gestion`
--
DROP DATABASE IF EXISTS `gestion`;
CREATE DATABASE IF NOT EXISTS `gestion`;

Use `gestion`;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--
CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL UNIQUE,
  `montant_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`libelle`, `montant_total`) VALUES
('1ère année', 225000),
('2ème année', 225000),
('3ème année', 225000),
('4ème année', 225000),
('5ème année', 225000),
('6ème année', 225000);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `n_matricule` varchar(255) NOT NULL UNIQUE,
  `prenom` varchar(25) NOT NULL,
  `date_naiss` date NOT NULL,
  `lieu_naiss` varchar(25) NOT NULL,
  `adresse` varchar(25) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `annee` varchar(25) NOT NULL,
  `pere` varchar(25) NOT NULL,
  `mere` varchar(25) NOT NULL,
  `contact` int NOT NULL,
  `date_ins` date NOT NULL,
  `frais_inscription` float NOT NULL,
  `id_classe` int(11) NOT NULL,
  FOREIGN KEY (`id_classe`) REFERENCES `classe`(`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_eleve` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  FOREIGN KEY (`id_eleve`) REFERENCES `eleve`(`id_eleve`),
  FOREIGN KEY (`id_classe`) REFERENCES `classe`(`id_classe`)
);

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `id_annee` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `annee_scolaire` varchar(50) NOT NULL
);

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`annee_scolaire`) VALUES
('2021-2022'),
('2022-2023'),
('2023-2024'),
('2024-2025');

-- --------------------------------------------------------

--
-- Structure de la table `eleve_annee`
--

CREATE TABLE `eleve_annee` (
  `id_eleve` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  FOREIGN KEY (`id_eleve`) REFERENCES `eleve`(`id_eleve`),
  FOREIGN KEY (`id_annee`) REFERENCES `annee`(`id_annee`)
);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_paiement` varchar(25) NOT NULL,
  `nature_paiement` varchar(25) NOT NULL,
  `n_recu` int(11) NOT NULL UNIQUE,
  `date_paiement` date NOT NULL,
  `montant_fixe` float NOT NULL,
  `montant_payer` float NOT NULL,
  `reduction` float NOT NULL,
  `solde_restant_a_payer` float NOT NULL,
  `id_annee` int(11) NOT NULL,
  FOREIGN KEY (`id_annee`) REFERENCES `annee`(`id_annee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL UNIQUE,
  `genre` varchar(25) NOT NULL,
  `utilisateur_password` varchar(25) NOT NULL,
  `statut` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `username`, `genre`, `utilisateur_password`, `statut`) VALUES
('KEITA', 'Awa', 'awak', 'Femme', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleve_paiement`
--

CREATE TABLE `eleve_paiement` (
  `id_eleve_paiement` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_eleve` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_paiement` int(11) NOT NULL,
  FOREIGN KEY (`id_eleve`) REFERENCES `eleve`(`id_eleve`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur`(`id_utilisateur`),
  FOREIGN KEY (`id_paiement`) REFERENCES `paiement`(`id_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
