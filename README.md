Épreuve Laravel
===============

Mise en contexte
----------------
Nous avons perdu la dernière version du projet `mamusique`. À partir d'une version antérieure et de fichiers d'exemples, vous devez recréer la version fonctionnelle du projet. Dans le dossier `_exemples`, vous trouverez : 
- Un fichier d'exemples en format html
- La dernière version de la base de données
- Des pochettes d'albums


L'installation
--------------
- La __migration__ des albums doit être refaite avant d'exécuter l'installation de la bd.

    |Nom du champ|Type de champ|Notes
    |------------|-------------|-----
    |auteur      |text         |
    |titre       |text         |
    |annee       |integer      |
    |image       |integer      |->default(false)
    |md5         |text         |->unique()

    (N'oubliez pas d'exécuter l'installation de la bd)

    __Note__: Si vous ne parvenez pas à recréer la migration, vous pouvez utiliser la bd qui se trouve dans le dossier `_exemples`. Vous n'avez qu'à la copier dans le dossier `database`.

La page maîtresse
-----------------
- Recréez la page maîtresse (`layout.index` avec `layout.header`, `layout.nav`, `layout.footer`) à partir du fichier `_exemples/exemple.html`

La page `album.index`
-------------------
- Recréez la page qui liste les albums (`album.index`) à partir également du fichier `_exemples/exemple.html`
- Créer une view `album.cart`e qui contiendra le lien `a.carte` et utilisez cette view dans `album.index`.

Le formulaire de création
-------------------------
- Il y a des données bidon dans le formulaire de création. Faites en sorte que le formulaire soit vide __sauf__ le champ `md5`. __Note__: Il faut quand même que le formulaire de modification contiennent des informations.

La création
-----------
- Faites en sorte que la création d'un album fonctionne. __Note__: Pour le traitement des images, ajoutez l'instruction suivante dans votre code.
    ```php
    $this->traiterImage($request, $album);
    ```

Remise
------
- Compte pour 10% de la note finale
- Renommez votre dossier NOMP1234567_mamusique AVANT de le zipper.
- Remettez votre projet dans https://remise.cstj.qc.ca dans le projet `epreuve_laravel`