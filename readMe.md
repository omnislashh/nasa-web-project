This project is made to manipulate some php and work with an API - hope you like

## endpoints:  
https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY  

## repo
https://github.com/omnislashh/nasa-web-project.git

## responsive exemples
See Screencaptures in public folder

## additional todo features
- affichage img full screen onclick
- btn like/dislike
- Table d'asso membres-pictures
- logique bouton j'aime : INSERT ds membres-pictures id membre/img like
- display img ds profil
- styling
- documentation
- tables : table nasa pictures liked
- table d'association N-N membre-images

## amelioration secu 
- trim inputs
- req sql ds variables ou procédures stockées
- gestion droits schema : root

## add features 
- menu
- filtre par date
- plein ecran
- "Bienvenue, pseudo" dans Index
- formulaire de contact

## notes
- use INNER JOIN pour mempic
- try to write in editionprofil

## to do more
footer, presentation,
delete unused logs

INSERT INTO nasapic (nasaPicNumber)
VALUE(12);
inner join to see the liked images by profile
add details, separate profile from home index

## notes draft
- transparence du menu 
- UI mobile menu
- ajout like/dislike
- se renseigner pour modification de la bdd en N-N (liaison membres- images)
- réduire le logo du footer
- mieux aligner les menus
- ajouter dans le footer le lien vers le site officiel de la NASA
- renommer les documents
- gestion erreur php
- afficher l'image sur le clic
- faire des screenshot

