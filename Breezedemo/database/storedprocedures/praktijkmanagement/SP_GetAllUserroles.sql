USE Breezedemo;

DROP PROCEDURE IF EXISTS SP_GetAllUserroles;

DELIMITER $$

CREATE PROCEDURE SP_GetAllUserroles()
BEGIN

    SELECT DISTINCT rolename
    FROM users
    ORDER BY rolename;

END$$

DELIMITER ;
