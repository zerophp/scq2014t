SELECT * FROM mydb.cities;
SELECT * FROM cities;
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

SELECT users.*, cities.name, genders.name
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






