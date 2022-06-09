use fil_rouge;

-- USERS --
-- Afficher utilisateur (nom, prenom, email, mot de passe) --
SELECT 
	name_user as "Nom", 
    first_name_user as "Prénom", 
    login_user as "Login",
    email_user as "Email", 
    password_user as "Mot de passe", 
    name_right as "Droit"
FROM users
JOIN right_user
	ON right_user.id_right = users.id_right;

-- DATA --
-- Select where name_sensor --
SELECT 
	date_record as Date,
    time_record as Time,
	data_record as Data, 
    name_sensor as NomCapteur, 
    function_sensor as Fonction 
FROM record_data
JOIN sensor
    ON sensor.id_sensor = record_data.id_sensor
WHERE function_sensor = 'Temperature sensor';




SELECT * FROM record_data;
Select * from users;
UPDATE users SET  login_user = "root" WHERE login_user = "manon";



-- Afficher les données en fonction des capteurs utilisés -- 
SELECT 
	fonction_capteur as "Capteurs", 
	date_releve as "Dates et horaires", 
    donnee_releve as "Données"  
from releve_donnee
	join recolter on recolter.id_releve_donnee = releve_donnee.id_releve_donnee
	join capteur on capteur.id_capteur = recolter.id_capteur;
    
-- Afficher les données maximum relevées par chaque capteurs --

-- Afficher les données minium relevées par chaque capteurs -- 

-- Afficher les moyennes de chaque capteurs --  

-- SEUILS ALERTE -- 
-- Afficher le seuil max et min pour humidité --
-- Afficher le seuil max et min pour température --
-- Afficher le seuil max et min pour exposition lumineuse --