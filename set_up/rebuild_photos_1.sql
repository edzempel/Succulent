use succulent_cms;

drop table if exists photos;

CREATE TABLE photos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	plant_id INT NOT NULL,
    photo varchar(255) DEFAULT NULL,
	dir varchar(255) DEFAULT NULL,
	size varchar(255) DEFAULT NULL,
	type varchar(255) DEFAULT NULL,
	created DATETIME,
	modified DATETIME,
	is_profile BOOLEAN DEFAULT FALSE,
	FOREIGN KEY plant_photo_key (plant_id) REFERENCES plants(id)

);

select * from photos;
select * from users;

select * from photons;