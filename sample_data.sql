USE gym_management;

-- Default Users
INSERT INTO users (username, password, role) VALUES ('admin', 'admin123', 'admin');
INSERT INTO users (username, password, role) VALUES ('member1', 'mem123', 'member');

-- Plans
INSERT INTO plans (plan_name, duration_months, amount)
VALUES 
('Monthly', 1, 1000.00),
('Quarterly', 3, 2500.00),
('Yearly', 12, 9000.00);

-- Members (sample)
INSERT INTO members (name, age, plan) VALUES ('Ravi Kumar', 25, 'Monthly');
INSERT INTO members (name, age, plan) VALUES ('Ankit Sharma', 28, 'Quarterly');
