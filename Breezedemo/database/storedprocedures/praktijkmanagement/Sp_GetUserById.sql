USE Breezedemo;

DROP PROCEDURE IF EXISTS Sp_GetUserById;

DELIMITER $$

CREATE PROCEDURE Sp_GetUserById(
    IN p_Id INTEGER
)
BEGIN

    SELECT Id
          ,name
          ,email
          ,rolename
    FROM users
    WHERE Id = p_Id;

END$$

DELIMITER ;
