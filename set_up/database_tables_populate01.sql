USE succulent_cms;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       username VARCHAR (10) NOT NULL,
                       created DATETIME,
                       modified DATETIME
);

CREATE TABLE plants (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        user_id INT NOT NULL,
                        scientific_name VARCHAR(255),
                        common_name VARCHAR(255),
                        slug VARCHAR(191) NOT NULL,
                        notes TEXT,
                        created DATETIME,
                        modified DATETIME,
                        UNIQUE KEY (slug),
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
                        created DATETIME,
                        modified DATETIME,
                        is_profile BOOLEAN DEFAULT FALSE,
                        FOREIGN KEY plant_photo_key (plant_id) REFERENCES plants(id)

);

INSERT INTO users (email, password, username, created, modified)
VALUES
('cakephp@example.com', 'secret', 'cake_admin',NOW(), NOW());
