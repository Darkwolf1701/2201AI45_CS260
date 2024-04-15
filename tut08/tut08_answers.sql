-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 
-- 1. Create a trigger that automatically increases the salary by 10% for employees whose salary is below ?60000 when a new record is inserted into the employees table.
CREATE TRIGGER IncreaseSalaryTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    IF NEW.salary < 60000 THEN
        SET NEW.salary = NEW.salary * 1.10;
    END IF;
END;

-- 2. Create a trigger that prevents deleting records from the departments table if there are employees assigned to that department.
CREATE TRIGGER PreventDepartmentDeleteTrigger
BEFORE DELETE ON departments
FOR EACH ROW
BEGIN
    DECLARE employee_count INT;
    SELECT COUNT(*) INTO employee_count FROM employees WHERE department_id = OLD.department_id;
    IF employee_count > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot delete department with assigned employees';
    END IF;
END;

-- 3. Write a trigger that logs the details of any salary updates (old salary, new salary, employee name, and date) into a separate audit table.
CREATE TRIGGER SalaryUpdateAuditTrigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    INSERT INTO salary_audit (old_salary, new_salary, employee_name, updated_at)
    VALUES (OLD.salary, NEW.salary, CONCAT(NEW.first_name, ' ', NEW.last_name), NOW());
END;

-- 4. Create a trigger that automatically assigns a department to an employee based on their salary range (e.g., salary <= ?60000 -> department_id = 3).
CREATE TRIGGER AssignDepartmentTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    IF NEW.salary <= 60000 THEN
        SET NEW.department_id = 3;
    END IF;
END;

-- 5. Write a trigger that updates the salary of the manager (highest-paid employee) in each department whenever a new employee is hired in that department.
CREATE TRIGGER UpdateManagerSalaryTrigger
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    UPDATE employees
    SET salary = NEW.salary
    WHERE emp_id = (SELECT manager_id FROM departments WHERE department_id = NEW.department_id);
END;

-- 6. Create a trigger that prevents updating the department_id of an employee if they have worked on projects.
CREATE TRIGGER PreventDepartmentUpdateTrigger
BEFORE UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE project_count INT;
    SELECT COUNT(*) INTO project_count FROM works_on WHERE emp_id = NEW.emp_id;
    IF project_count > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot update department for employee with project assignments';
    END IF;
END;

-- 7. Write a trigger that calculates and updates the average salary for each department whenever a salary change occurs.
CREATE TRIGGER UpdateAverageSalaryTrigger
AFTER INSERT, UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE total_salary DECIMAL;
    DECLARE employee_count INT;
    SELECT SUM(salary), COUNT(*) INTO total_salary, employee_count FROM employees WHERE department_id = NEW.department_id;
    UPDATE departments SET average_salary = total_salary / employee_count WHERE department_id = NEW.department_id;
END;

-- 8. Create a trigger that automatically deletes all records from the works_on table for an employee when that employee is deleted from the employees table.
CREATE TRIGGER DeleteWorksOnTrigger
AFTER DELETE ON employees
FOR EACH ROW
BEGIN
    DELETE FROM works_on WHERE emp_id = OLD.emp_id;
END;

-- 9. Write a trigger that prevents inserting a new employee if their salary is less than the minimum salary set for their department.
CREATE TRIGGER PreventLowSalaryInsertTrigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    DECLARE min_salary DECIMAL;
    SELECT MIN_salary INTO min_salary FROM departments WHERE department_id = NEW.department_id;
    IF NEW.salary < min_salary THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Salary is below the minimum for the department';
    END IF;
END;

-- 10. Create a trigger that automatically updates the total salary budget for a department whenever an employee's salary is updated.
CREATE TRIGGER UpdateTotalBudgetTrigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE total_salary DECIMAL;
    SELECT SUM(salary) INTO total_salary FROM employees WHERE department_id = NEW.department_id;
    UPDATE departments SET total_salary_budget = total_salary WHERE department_id = NEW.department_id;
END;

-- 11. Write a trigger that sends an email notification to HR whenever a new employee is hired.
-- Assume an external procedure or function for sending emails.

-- 12. Create a trigger that prevents inserting a new department if the location is not specified.
CREATE TRIGGER PreventEmptyLocationInsertTrigger
BEFORE INSERT ON departments
FOR EACH ROW
BEGIN
    IF NEW.location IS NULL OR NEW.location = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Location must be specified for a new department';
    END IF;
END;

-- 13. Write a trigger that updates the department_name in the employees table when the corresponding department_name is updated in the departments table.
CREATE TRIGGER UpdateDepartmentNameTrigger
AFTER UPDATE ON departments
FOR EACH ROW
BEGIN
    UPDATE employees SET department_name = NEW.department_name WHERE department_id = NEW.department_id;
END;

-- 14. Create a trigger that logs all insert, update, and delete operations on the employees table into a separate audit table.
CREATE TRIGGER EmployeeAuditTrigger
AFTER INSERT, UPDATE, DELETE ON employees
FOR EACH ROW
BEGIN
    INSERT INTO employee_audit (action, emp_id, first_name, last_name, salary, department_id, action_time)
    VALUES (IFNULL(NEW.action, IF(OLD.emp_id IS NULL, 'INSERT', IF(NEW.emp_id IS NULL, 'DELETE', 'UPDATE'))),
            COALESCE(NEW.emp_id, OLD.emp_id),
            COALESCE(NEW.first_name, OLD.first_name),
            COALESCE(NEW.last_name, OLD.last_name),
            COALESCE(NEW.salary, OLD.salary),
            COALESCE(NEW.department_id, OLD.department_id),
            NOW());
END;

-- 15. Write a trigger that automatically generates an employee ID using a sequence whenever a new employee is hired.
-- Assuming that an auto-incrementing column or sequence is used for emp_id.
