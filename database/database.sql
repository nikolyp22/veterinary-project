CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name CHAR(40) NOT NULL, 
    lastName CHAR(50) NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    password VARCHAR(400) NOT NULL
);

