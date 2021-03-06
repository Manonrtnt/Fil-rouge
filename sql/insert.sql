-- Inserting data --
use fil_rouge;

insert into sensor 
	values 
		(null, "DHT11","Temperature sensor"),
        (null, "YL-69","Soil moisture sensor"),
        (null, "Photoresistor","Light exposure sensor"),
		(null, "DHT11","Humidity sensor");

insert into right_user 
	values
		(null, "Administrator"),
        (null, "Reader");

insert into record_data
	values
		(null, "2022-05-14", "00:00:00", 15, 1),
		(null, "2022-05-14", "00:00:00", 64, 4),
		(null, "2022-05-14", "06:00:00", 20, 1),
		(null, "2022-05-14", "06:00:00", 64, 4),
		(null, "2022-05-14", "12:00:00", 24, 1),
		(null, "2022-05-14", "12:00:00", 65, 4),
		(null, "2022-05-14", "18:00:00", 25, 1),
		(null, "2022-05-14", "18:00:00", 65, 4),

		(null, "2022-05-15", "00:00:00", 18, 1),
		(null, "2022-05-15", "00:00:00", 64, 4),
		(null, "2022-05-15", "06:00:00", 20, 1),
		(null, "2022-05-15", "06:00:00", 64, 4),
		(null, "2022-05-15", "12:00:00", 25, 1),
		(null, "2022-05-15", "12:00:00", 65, 4),
		(null, "2022-05-15", "18:00:00", 26, 1),
		(null, "2022-05-15", "18:00:00", 65, 4),

		(null, "2022-05-16", "00:00:00", 19, 1),
		(null, "2022-05-16", "00:00:00", 64, 4),
		(null, "2022-05-16", "06:00:00", 20, 1),
		(null, "2022-05-16", "06:00:00", 64, 4),
		(null, "2022-05-16", "12:00:00", 24, 1),
		(null, "2022-05-16", "12:00:00", 65, 4),
		(null, "2022-05-16", "18:00:00", 25, 1),
		(null, "2022-05-16", "18:00:00", 65, 4),

		(null, "2022-05-17", "00:00:00", 13, 1),
		(null, "2022-05-17", "00:00:00", 64, 4),
		(null, "2022-05-17", "06:00:00", 18, 1),
		(null, "2022-05-17", "06:00:00", 64, 4),
		(null, "2022-05-17", "12:00:00", 20, 1),
		(null, "2022-05-17", "12:00:00", 65, 4),
		(null, "2022-05-17", "18:00:00", 24, 1),
		(null, "2022-05-17", "18:00:00", 65, 4);
-- insertion de données fictives --