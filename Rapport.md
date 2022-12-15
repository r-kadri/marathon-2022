# Rapport Marathon-Web


### Membres du groupe côté informatique : 
1. Lucas Broda
2. Ryan Kadri
3. Clément Mahieux


## Partie de Lucas 

Je me suis tout d'abord occupé de fork le projet de base, d'inviter tous les membres de mon groupe, ainsi d'expliquer aux MMI le fonctionnement de GIT et les commandes de base nécessaires pour mener le projet à bien.

J'ai ensuite fait en sorte de lier notre dépôt à la machine marathon pour les lier.

Ensuite, j'ai réalisé les tickets 11 à 13, c'est à dire :

1. Ajouter une oeuvre
2. Valider une oeuvre d'un utilisateur
3. Afficher uniquement les oeuvres réalisées


Pour ajouter une oeuvre à une salle, j'ai tout d'abord créé dans mon ExpositionController deux méthodes : 
1. Une méthode create()
2. Une méthode store()


Ainsi qu'une vue create.blade.php.

La méthode create permet à un utilisateur connecté de créer une oeuvre dans une salle précise, une fois l'oeuvre créée, une redirection automatique s'effectue et nous renvoie sur la vue index.blade.

La méthode store permet de stocker dans notre base de données les nouvelles données rentrées lors de la création de notre oeuvre.
Ici, on spécifie tous les attributs obligatoires pour créer une nouvelle oeuvre (ex:nom de l'oeuvre, id de la salle dans laquelle on veut créer notre oeuvre, auteur etc ...)
Puis, on va créer une nouvelle entité de Oeuvre, dans laquelle on va stocker toutes les valeurs qui sont rentrées, une fois cela finit, on fait un appel de la méthode save sur notre entité pour sauvegarder cette nouvelle entité dans la base de données.
Une redirection vers l'index est également effectuée après la sauvegarde de la nouvelle entité.


Pour finir, on crée une vue create.blade, dans laquelle se trouve un formulaire permettant de rentrer tous les attributs nécessaires pour la création de l'oeuvre.
La vue contient la route vers la méthode store, ainsi, les données rentrées dans le formulaire sont enregistrées après la soumission des données.
La vue possède également un bouton pour revenir vers la vue index.


Pour ce qui est de valider une oeuvre d'un utilisateur, cela consiste à faire en sorte qu'un administrateur puisse valider ou non une oeuvre quelconque.

Tout d'abord, on apporte une légère modification à la méthode store, avant de sauvegarder notre entité, on met en place un if vérifiant si l'utilisateur connecté est un administrateur, si c'est un administrateur, on lui donne le droit d'accèder à la fonction valide qui permet de valider une oeuvre ou non.
On crée ensuite une autre méthode valideOeuvre(), qui permet d'analyser la requête, et de voir si l'admin a décidé d'accepter ou non l'oeuvre, si elle est acceptée, on la sauvegarde, si ce n'est pas le cas, on supprime donc la requête de création de l'oeuvre.

Ensuite, dans notre index, on ajoute également un if permettant de voir si l'utilisateur connecté est un administrateur, si c'est un administrateur, il aura accès à deux boutons qui permettant de soit refuser, ou accepter la requête de création de l'oeuvre.

Je me suis également occupé avec Ryan de fixer quelques bugs que nous avions, comme par exemple pour l'affichage des images