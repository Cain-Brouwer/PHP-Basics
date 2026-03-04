DROP DATABASE IF EXISTS MVC_Basics_2509AB;

CREATE DATABASE MVC_Basics_2509AB;

USE MVC_Basics_2509AB;

CREATE TABLE Smartphones
(
    Id                      SMALLINT                UNSIGNED            NOT NULL            AUTO_INCREMENT
    ,Merk                   VARCHAR(50)                                 NOT NULL
    ,Model                  VARCHAR(50)                                 NOT NULL
    ,Prijs                  DECIMAL(6,2)                                NOT NULL
    ,Geheugen               DECIMAL(4,0)                                NOT NULL
    ,BesturingsSysteem      VARCHAR(25)                                 NOT NULL
    ,SchermGrootte          DECIMAL(3,2)                                NOT NULL
    ,ReleaseDatum           DATE                                        NOT NULL
    ,MegaPixels             DECIMAL(3,0)                                NOT NULL
    ,IsActief               BIT                                         NOT NULL            DEFAULT 1
    ,Opmerking              VARCHAR(225)                                NULL                DEFAULT NULL
    ,DatumAangemaakt        DATETIME(6)                                 NOT NULL            DEFAULT NOW(6)
    ,DatumGewijzigd         DATETIME(6)                                 NOT NULL            DEFAULT NOW(6)
    ,CONSTRAINT             PK_Smartphones_Id       PRIMARY KEY                             (Id)
) ENGINE=InnoDB;

INSERT INTO Smartphones
(
    Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
('Apple', 'iPhone 16 Pro', 1256.56, 64, 'iOS 18', 6.7, '2025-01-19', 50),
('Samsung', 'Galaxy S25 Ultra', 1539, 128, 'Android 15', 6.1, '2025-02-01', 200),
('Google', 'Pixel 9 Pro', 890, 1024, 'Android 15', 6.3, '2024-12-20', 100),
('OnePlus', 'OnePlus 12', 899, 256, 'Android 14', 6.8, '2024-01-23', 120),
('Xiaomi', 'Xiaomi 14 Pro', 999, 512, 'Android 14', 6.7, '2024-02-15', 108),
('Motorola', 'Edge 50 Pro', 699, 256, 'Android 14', 6.7, '2024-04-10', 50),
('Sony', 'Xperia 1 VI', 1299, 512, 'Android 14', 6.5, '2024-06-15', 48),
('Nothing', 'Phone 2a', 349, 128, 'Android 14', 6.7, '2024-03-05', 50);

CREATE TABLE Sneakers
(
    Id                  SMALLINT        UNSIGNED    NOT NULL        AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Type               VARCHAR(50)                 NOT NULL
    ,Prijs              DECIMAL(6,2)                NOT NULL
    ,Materiaal          VARCHAR(50)                 NOT NULL
    ,Gewicht            DECIMAL(5,2)                NOT NULL
    ,Releasedatum       DATE                        NOT NULL
    ,IsActief           BIT                         NOT NULL        DEFAULT 1
    ,Opmerking          VARCHAR(255)                NULL            DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL        DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL        DEFAULT NOW(6)
    ,CONSTRAINT         PK_Sneakers_Id              PRIMARY KEY     (Id)
) ENGINE=InnoDB;


INSERT INTO Sneakers
(
    Merk
    ,Model
    ,Type
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
('Nike', 'Air Jordan 1', 'Hardloop', 159.99, 'Leer', 450.00, '2023-03-15'),
('Adidas', 'Yeezy Boost 350', 'Basketbal', 220.00, 'Synthetisch', 380.00, '2023-06-20'),
('New Balance', 'Pixel 9 Pro', 'Casual', 139.99, 'Mesh', 320.00, '2024-01-10'),
('Trico', 'New Age', 'Casual', 89.99, 'Leer', 400.00, '2023-09-05'),
('Overlord', 'Tristar 6', 'Hardloop', 119.99, 'Mesh', 290.00, '2024-02-01'),
('Puma', 'RS-X', 'Casual', 110.00, 'Synthetisch', 350.00, '2023-11-18'),
('Reebok', 'Classic Leather', 'Casual', 85.00, 'Leer', 420.00, '2023-08-22'),
('Asics', 'Gel-Kayano 29', 'Hardloop', 169.99, 'Mesh', 310.00, '2024-01-25');

CREATE TABLE Horloges
(
    Id                  SMALLINT        UNSIGNED    NOT NULL        AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Prijs              DECIMAL(8,2)                NOT NULL
    ,Materiaal          VARCHAR(50)                 NOT NULL
    ,Gewicht            DECIMAL(6,2)                NOT NULL
    ,Releasedatum       DATE                        NOT NULL
    ,Waterdichtheid     VARCHAR(20)                 NOT NULL
    ,Type               VARCHAR(50)                 NOT NULL
    ,UniekKenmerk       VARCHAR(255)                NOT NULL
    ,IsActief           BIT                         NOT NULL        DEFAULT 1
    ,Opmerking          VARCHAR(255)                NULL            DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL        DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL        DEFAULT NOW(6)
    ,CONSTRAINT         PK_Horloges_Id              PRIMARY KEY     (Id)
) ENGINE=InnoDB;


INSERT INTO Horloges
(
    Merk
    ,Model
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
    ,Waterdichtheid
    ,Type
    ,UniekKenmerk
)
VALUES
('Rolex', 'Daytona 126500LN', 19800.00, 'RVS', 145.00, '2016-03-01', '100m', 'Analoog', 'Chronograaf functie'),
('Omega', 'Speedmaster Moonwatch Professional', 8500.00, 'RVS', 155.00, '2021-01-15', '50m', 'Analoog', 'Eerste horloge op de maan'),
('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin', 98000.00, 'Goud', 168.00, '2018-09-20', '150m', 'Analoog', 'Ultra-dunne perpetual calendar'),
('Jaeger-LeCoultre', 'Reverso Tribute Duoface', 17000.00, 'RVS', 112.00, '2017-06-10', '30m', 'Analoog', 'Omkeerbare kast met tweede wijzerplaat');

