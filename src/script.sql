-- Crear tabla de usuarios
CREATE TABLE usuarios (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(128) NOT NULL,
    nombre VARCHAR(128) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    passwd VARCHAR(128) NOT NULL,
    fkAdmin BOOL
);

-- Crear tabla de carritos
CREATE TABLE carritos (
    idCarrito INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    total DECIMAL(10, 2),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

-- Crear tabla de servicios
CREATE TABLE servicios (
    idServicio INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128),
    descripcion TEXT,
    precio DECIMAL(10, 2)
);

-- Crear tabla de carritos_servicios (relación muchos a muchos)
CREATE TABLE carritos_servicios (
    idCarrito INT,
    idServicio INT,
    PRIMARY KEY (idCarrito, idServicio),
    FOREIGN KEY (idCarrito) REFERENCES carritos(idCarrito),
    FOREIGN KEY (idServicio) REFERENCES servicios(idServicio)
);

-- Crear tabla de pedidos
CREATE TABLE pedidos (
    idPedido INT PRIMARY KEY AUTO_INCREMENT,
    idCarrito INT,
    idUsuario INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idCarrito) REFERENCES carritos(idCarrito),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

-- Crear tabla de empresas
CREATE TABLE empresa (
    idEmpresa INT PRIMARY KEY AUTO_INCREMENT,
    idPedido INT,
    correo VARCHAR(128),
    direccion VARCHAR(255),
    FOREIGN KEY (idPedido) REFERENCES pedidos(idPedido)
);

-- Crear tabla de requests
CREATE TABLE requests (
    idRequest INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    asunto VARCHAR(255),
    nombreCompleto VARCHAR(255),
    descripcion TEXT,
    correo VARCHAR(255),
    FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
