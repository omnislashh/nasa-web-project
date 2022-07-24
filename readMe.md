## endpoints:  
https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=DEMO_KEY  

## repo
https://github.com/omnislashh/nasa-web-project.git

## todo
- affichage img full screen
- btn j'aime
- req SQL POST ds bdd index img like ds table pictures
- Table d'asso membres-pictures
- logique bouton j'aime : INSERT ds membres-pictures id membre/img like
- display img ds profil
- styling
- documentation

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
- try write in editionprofil

## to do more
footer presentation
delete logs unused

INSERT INTO nasapic (nasaPicNumber)
VALUE(12);

gérer le inner join to see the liked images by profile