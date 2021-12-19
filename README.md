# Gilded Rose Refactoring Kata

## Binôme :
Quentin MARQUE
Kévin OLIVA

## Langage choisi
PHP

## Stratégie à adopter pour le refactorer
- Comprendre le code
- Fixer le code
- Duplication de la class GildedRose et des tests pour refactorer le code
- Refactorer le code
- Création d'une classe pour chaque item
- Refactorer chaque classe
- Fixer le code

--> A chaque modification, vérifier les tests (vérifier si la classe GildedRoseRefactor que nous avons créée propose le même résultat que la présente classe GildedRose déjà fonctionnelle).


## Améliorations possibles (listées par priorité et par ordre de facilité)
Mise en place d'un switch/case
Création de classes pour chaque item comprenant une fonction updateQuality qui permet de mettre en place les contraintes données dans le ReadMe.md

Pour l'item Sulfuras, nous n'avons pas fait de fonction update car la qualité ne bouge pas. On ne touche donc pas à la qualité donnée qui est de 80.
