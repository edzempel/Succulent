USE succulent_cms;

-- drop table if exists photos;
-- drop table if exists pots;
-- drop table if exists waters;
-- drop table if exists plants;
-- drop table if exists users;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       username VARCHAR (35) NOT NULL,
                       createddate DATETIME,
                       modifieddate DATETIME
);

CREATE TABLE plants (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        user_id INT NOT NULL,
                        scientific_name VARCHAR(255),
                        common_name VARCHAR(255) NOT NULL,
                        avg_water_days INT,
                        notes TEXT,
                        createddate DATETIME,
                        modifieddate DATETIME,
                        FOREIGN KEY user_key (user_id) REFERENCES users(id)
);

CREATE TABLE waters (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        plant_id INT NOT NULL,
                        water_date DATETIME,
                        FOREIGN KEY plant_water_key (plant_id) REFERENCES plants(id)
);


CREATE TABLE pots (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      plant_id INT NOT NULL,
                      pot_date DATETIME,
                      FOREIGN KEY plant_pot_key (plant_id) REFERENCES plants(id)
);

CREATE TABLE photos (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        plant_id INT NOT NULL,
                        url VARCHAR(255) NOT NULL,
                        createddate DATETIME,
                        modifieddate DATETIME,
                        is_profile BOOLEAN DEFAULT FALSE,
                        FOREIGN KEY plant_photo_key (plant_id) REFERENCES plants(id)

);