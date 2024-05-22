USE arcadia_db;
SET NAMES 'utf8mb4';

INSERT INTO feedbacks (id, pseudo, content, rating, status) VALUES
(1, 'User123', 'Excellent service, je suis très satisfait!', 5, 'PENDING'),
(2, 'Marie78', 'Livraison rapide et produit conforme.', 4, 'ACCEPTED'),
(3, 'PierreL', 'Problème avec ma commande, mais le support a été réactif.', 3, 'REFUSED'),
(4, 'SophieT', 'Très mauvaise expérience, je ne recommande pas.', 1, 'ACCEPTED'),
(5, 'JeanDupont', 'Bon rapport qualité-prix, je reviendrai.', 4, 'PENDING');

INSERT INTO roles (id, label) VALUES
(1,'ADMINISTRATOR'),
(2,'EMPLOYEE'),
(3,'VETERINARY');

INSERT INTO users (id, role_id, username, password, firtname, lastname) VALUES
(1,1,'m.jose.arcadia@yopmail.com',null,'jose','mendoza'),
(2,2,'l.josette.arcadia@yopmail.com',null,'josette','lamouette'),
(3,3,'l.arnaud.arcadia@yopmail.com',null,'arnaud','lagnot');


INSERT INTO services (id, label, content, url, options) VALUES
(1,'restauration','Bienvenue aux restaurants de notre zoo, où la gastronomie rencontre la nature !','img/uploads/services/restaurant.jpeg','{"Le Safari Café":"Plongez dans une atmosphère exotique au Safari Café","La Jungle Grill":"Pour une expérience de restauration en plein air","La Terrasse des Singes":"Vivez une expérience unique en prenant place à la Terrasse des Singes"}'),
(2,'Visite guidée','Bienvenue à la visite guidée de notre zoo !','img/uploads/services/guide_touristique.jpeg','{"Guides Experts":"Nos guides sont des passionnés de la nature et des experts dans leur domaine.","Itinéraire Captivant":"Notre visite guidée vous emmènera à travers les différentes zones de notre zoo"}'),
(3,'Petit train','Bienvenue à bord du service de petit train pour la visite de notre zoo !','img/uploads/services/petit_train.jpeg','{"Confort et Sécurité":"Notre petit train est équipé de sièges confortables et sécurisés"}');

INSERT INTO hours (id, day, opening_time, closing_time) VALUES
(1,'lundi','10:00:00','17:00:00'),
(2,'mardi','10:00:00','17:00:00'),
(3,'mercredi','09:00:00','18:00:00'),
(4,'jeudi','10:00:00','17:00:00'),
(5,'vendredi','10:00:00','17:00:00'),
(6,'samedi','09:00:00','18:00:00'),
(7,'dimanche','09:00:00','18:00:00');

INSERT INTO homes (id, label, content) VALUES
(1,'savane','Une savane est un type de biome caractérisé par des herbes hautes et des arbres dispersés.'),
(2,'jungle','Une jungle est un type de biome forestier dense, souvent situé dans les régions tropicales et subtropicales.'),
(3,'marais','Un marais est un type d écosystème terrestre humide caractérisé par des sols saturés d eau.');

INSERT INTO homes_comments (id, user_id, home_id, content) VALUES
(1,3,1,'habitat propre dans l ensemble'),
(2,3,2,'habitat a restaurer'),
(3,3,3,'besoin de plus d eau');


INSERT INTO homes_pictures (id, home_id, url) VALUES
(1,1,'img/uploads/homes/savane.jpeg'),
(2,2,'img/uploads/homes/jungle.jpeg'),
(3,3,'img/uploads/homes/savane.jpeg');

INSERT INTO animals (id, home_id, name, breed) VALUES
(1,1,'zebu','zebre'),
(2,1,'leo','lion'),
(3,1,'gladys','girafe'),
(4,1,'eliot','elephant'),
(5,1,'helene','hippopotame'),
(6,1,'pako','paresseux'),
(7,1,'erik','tamarin'),
(8,1,'alfy','ara rouge'),
(9,1,'odie','okapi'),
(10,1,'charly','chimpanze'),
(11,1,'basile','buffle d Afrique'),
(12,1,'ava','alligator'),
(13,1,'caty','caiman noir'),
(14,1,'chloe','couleuvre a collier'),
(15,1,'sarah','salamandre');


INSERT INTO pictures_animals (id, animal_id, url) VALUES
(1,1,'img/uploads/animals/zebre.jpeg'),
(2,2,'img/uploads/animals/lion.jpeg'),
(3,3,'img/uploads/animals/girafe.jpeg'),
(4,4,'img/uploads/animals/elephant.jpeg'),
(5,5,'img/uploads/animals/hippopotame.jpeg'),
(6,6,'img/uploads/animals/paresseux.jpeg'),
(7,7,'img/uploads/animals/tamarin.jpeg'),
(8,8,'img/uploads/animals/ara.jpeg'),
(9,9,'img/uploads/animals/okapi.jpeg'),
(10,10,'img/uploads/animals/chimpanze.jpeg'),
(11,11,'img/uploads/animals/buffle.jpeg'),
(12,12,'img/uploads/animals/aligator.jpeg'),
(13,13,'img/uploads/animals/caiman.jpeg'),
(14,14,'img/uploads/animals/couleuvre.jpeg'),
(15,15,'img/uploads/animals/salamandre.jpeg');




INSERT INTO veterinarians_reports (id, user_id, animal_id, animal_condition, food, food_quantity, details, visit_at) VALUES
(1,3,1,'bonne santé','fruits','100',null,NOW()),
(2,3,2,'grippe du lion','viande','1000',null,NOW()),
(3,3,15,'a perdu de sa couleur','insectes','20',null,NOW());


INSERT INTO animals_reports (id, user_id, animal_id, food, food_quantity, food_at) VALUES
(1,3,1,'fruits','100',NOW()),
(2,3,2,'viande','1000',NOW()),
(3,3,15,'insectes','20',NOW());
