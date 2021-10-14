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

ALTER TABLE pets ADD FOREIGN KEY(owner) REFERENCES users(id);