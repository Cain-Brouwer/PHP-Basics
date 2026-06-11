USE Breezedemo;

DROP PROCEDURE IF EXISTS Sp_UpdateUser;

DELIMITER $$

CREATE PROCEDURE Sp_UpdateUser(
    IN p_Id INTEGER,
    IN p_Rolename VARCHAR(20)
)
BEGIN

    UPDATE users
    SET rolename = p_Rolename
    WHERE Id = p_Id;

END$$

DELIMITER ;
