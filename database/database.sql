
CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name CHAR(40) NOT NULL, 
    lastName CHAR(50) NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    password VARCHAR(400) NOT NULL,
    role SET('usuario', 'moderador') NOT NULL DEFAULT 'usuario'
);

CREATE TABLE IF NOT EXISTS services(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name CHAR(60) NOT NULL,
    image VARCHAR(250) NULL,
    description VARCHAR(250) NOT NULL,
    value FLOAT NOT NULL 
);

CREATE TABLE IF NOT EXISTS pets(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name CHAR(20) NOT NULL,
    breed CHAR(30) NOT NULL,
    specie SET('mamiferos', 'aves', 'reptiles', 'anfibios') NOT NULL DEFAULT 'mamiferos',
    age INT NOT NULL,
    owner INT NULL
);

CREATE TABLE IF NOT EXISTS appointments(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status BOOLEAN NULL,
    pet INT NULL,
    service INT NULL,
    total_value FLOAT NOT NULL
);

ALTER TABLE pets ADD FOREIGN KEY(owner) REFERENCES users(id);
ALTER TABLE appointments ADD FOREIGN KEY(pet);
ALTER TABLE appointments ADD FOREIGN KEY(service) REFERENCES services(id);

INSERT INTO users(name, email, password, role) VALUES('Nikol', 'Patiño', 'nikol@mail.com', '$2y$10$xmyMvEyMZkortGwvygsMAeine9UJ3plU7fwrQ/CRq.LesiKCBbf0e', 'moderador');