USE gym_management;

DELIMITER //

-- Add Member Procedure
CREATE PROCEDURE add_member(
    IN p_name VARCHAR(100),
    IN p_age INT,
    IN p_plan VARCHAR(50)
)
BEGIN
    INSERT INTO members (name, age, plan)
    VALUES (p_name, p_age, p_plan);
END //

-- Add Payment Procedure
CREATE PROCEDURE make_payment(
    IN p_member_id INT,
    IN p_amount DECIMAL(10,2)
)
BEGIN
    INSERT INTO payments (member_id, amount_paid)
    VALUES (p_member_id, p_amount);
END //

DELIMITER ;
