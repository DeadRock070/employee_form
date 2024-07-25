CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    PRIMARY KEY (id),
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    position VARCHAR(100) NOT NULL,
    profile_picture VARCHAR(255)
);
