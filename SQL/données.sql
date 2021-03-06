INSERT INTO `roles` (`idRole`, `libelleRole`) VALUES
(1, 'admin'),
(2, 'visiteur');

INSERT INTO `unites` (`idUnite`, `libelleUnite`) VALUES
(1, 'ml'),
(2, 'g');

INSERT INTO `users` (`idUser`, `pseudoUser`, `mdpUser`, `idRole`) VALUES
(1, 'nils', '1234', 2),
(2, 'moh', '1234', 2),
(3, 'kol', '0000', 1),
(4, 'am', '0000', 1);

INSERT INTO `recettes` (`idRecette`, `titreRecette`, `tempRecette`, `niveauDifRecette`, `imageRecette`, `preparationRecette`, `idUser`) VALUES
(1, 'patte', '00:00:10', 2, 'aaa', 'bonjour', 1),
(2, 'thon', '00:00:20', 2, 'uu', 'fffff', 2);

INSERT INTO `ingredients` (`idIngredient`, `libelleIngredient`, `idUnite`) VALUES
(1, 'poivre', 1),
(2, 'sel', 1),
(3, 'farine', 2);

INSERT INTO `contenus` (`idContenu`, `idIngredient`, `idRecette`, `quantite`) VALUES
(1, 1, 2, 300),
(2, 2, 2, 20),
(3, 1, 1, 10);