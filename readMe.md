## endpoints:  
https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY  

## repo
https://github.com/omnislashh/nasa-web-project.git

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

## features 
- menu
- filtre par date
- plein ecran
- "Bienvenue, pseudo" dans Index
- formulaire de contact

## notes
- use INNER JOIN pour mempic
- try to write in editionprofil

## to do more
footer presentation
delete logs unused

INSERT INTO nasapic (nasaPicNumber)
VALUE(12);
inner join to see the liked images by profile
add details, separate profile from home index