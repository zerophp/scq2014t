SELECT * FROM mydb.cities;

SELECT * FROM cities;
SELECT * FROm cities;
select * FROM cities;


SELECT * FROM cities WHERE idcity = 2;
SELECT * FROM cities WHERE name LIKE 'Vigo';
SELECT * FROM cities WHERE name LIKE '%o';
UPDATE cities SET name = 'VVigo' WHERE idcity=1;
UPDATE cities SET name = 'VVigo';
INSERT INTO cities (name) values ('Ferrol');
INSERT INTO users (username, name, lastname, email) VALUES
				  ('agustincl', 'asdh','', '', 2,3,'','');
INSERT INTO users SET name = 'Agustin',
					  username = 'agustincl',
					  password = 1234,
					  email = 'agustincl@gmail.com';
DELETE FROM cities WHERE idcity=4;					

SELECT users.name, 
	cities.name as city, 
	genders.name as gender
FROM users
INNER JOIN cities ON
cities.idcity = users.cities_idcity
INNER JOIN genders ON
genders.idgender = users.genders_idgender;

SELECT  pets.name, users.name
FROM users
LEFT OUTER JOIN users_has_pets ON
users.iduser = users_has_pets.users_iduser
RIGHT JOIN pets ON
users_has_pets.pets_idpet = pets.idpet;


SELECT users.name, 
	cities.name as city
FROM users
RIGHT OUTER JOIN cities ON
cities.idcity = users.cities_idcity;


SELECT users.name, 
GROUP_CONCAT(pets.name SEPARATOR '|') as pets
FROM users
INNER JOIN users_has_pets ON
users_has_pets.users_iduser = users.iduser
INNER JOIN pets ON
pets.idpet = users_has_pets.pets_idpet
WHERE users.iduser=1;


SELECT users.name, 
GROUP_CONCAT(languages.name SEPARATOR '|') as languages
FROM users
INNER JOIN users_has_languages ON
users_has_languages.users_iduser = users.iduser
INNER JOIN languages ON
languages.idlanguage = users_has_languages.languages_idlanguage
WHERE users.iduser=1;



