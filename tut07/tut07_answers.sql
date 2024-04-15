-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- 1. Create a procedure to calculate the average salary of employees in a given department.
DELIMITER //
CREATE PROCEDURE CalculateAverageSalary (IN dept_id INT)
BEGIN
    SELECT AVG(salary) AS average_salary
    FROM employees
    WHERE department_id = dept_id;
END //
DELIMITER ;

-- 2. Write a procedure to update the salary of an employee by a specified percentage.
DELIMITER //
CREATE PROCEDURE UpdateEmployeeSalary (IN emp_id INT, IN percentage DECIMAL)
BEGIN
    UPDATE employees
    SET salary = salary * (1 + percentage/100)
    WHERE emp_id = emp_id;
END //
DELIMITER ;

-- 3. Create a procedure to list all employees in a given department.
DELIMITER //
CREATE PROCEDURE ListEmployeesInDepartment (IN dept_id INT)
BEGIN
    SELECT *
    FROM employees
    WHERE department_id = dept_id;
END //
DELIMITER ;

-- 4. Write a procedure to calculate the total budget allocated to a specific project.
DELIMITER //
CREATE PROCEDURE CalculateProjectBudget (IN proj_id INT, OUT total_budget DECIMAL)
BEGIN
    SELECT SUM(budget) INTO total_budget
    FROM projects
    WHERE project_id = proj_id;
END //
DELIMITER ;

-- 5. Create a procedure to find the employee with the highest salary in a given department.
DELIMITER //
CREATE PROCEDURE FindEmployeeWithHighestSalary (IN dept_id INT, OUT emp_name VARCHAR(255), OUT max_salary DECIMAL)
BEGIN
    SELECT CONCAT(first_name, ' ', last_name), MAX(salary) INTO emp_name, max_salary
    FROM employees
    WHERE department_id = dept_id;
END //
DELIMITER ;

-- 6. Write a procedure to list all projects that are due to end within a specified number of days.
DELIMITER //
CREATE PROCEDURE ListProjectsEndingSoon (IN num_days INT)
BEGIN
    SELECT *
    FROM projects
    WHERE end_date <= DATE_ADD(CURRENT_DATE(), INTERVAL num_days DAY);
END //
DELIMITER ;

-- 7. Create a procedure to calculate the total salary expenditure for a given department.
DELIMITER //
CREATE PROCEDURE CalculateDepartmentSalaryExpenditure (IN dept_id INT, OUT total_salary DECIMAL)
BEGIN
    SELECT SUM(salary) INTO total_salary
    FROM employees
    WHERE department_id = dept_id;
END //
DELIMITER ;

-- 8. Write a procedure to generate a report listing all employees along with their department and salary details.
DELIMITER //
CREATE PROCEDURE GenerateEmployeeReport ()
BEGIN
    SELECT e.first_name, e.last_name, d.department_name, e.salary
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id;
END //
DELIMITER ;

-- 9. Create a procedure to find the project with the highest budget.
DELIMITER //
CREATE PROCEDURE FindProjectWithHighestBudget (OUT proj_name VARCHAR(255), OUT max_budget DECIMAL)
BEGIN
    SELECT project_name, MAX(budget) INTO proj_name, max_budget
    FROM projects;
END //
DELIMITER ;

-- 10. Write a procedure to calculate the average salary of employees across all departments.
DELIMITER //
CREATE PROCEDURE CalculateOverallAverageSalary (OUT average_salary DECIMAL)
BEGIN
    SELECT AVG(salary) INTO average_salary
    FROM employees;
END //
DELIMITER ;

-- 11. Create a procedure to assign a new manager to a department and update the manager_id in the departments table.
DELIMITER //
CREATE PROCEDURE AssignNewManager (IN dept_id INT, IN new_manager_id INT)
BEGIN
    UPDATE departments
    SET manager_id = new_manager_id
    WHERE department_id = dept_id;
END //
DELIMITER ;

-- 12. Write a procedure to calculate the remaining budget for a specific project.
DELIMITER //
CREATE PROCEDURE CalculateRemainingBudget (IN proj_id INT, OUT remaining_budget DECIMAL)
BEGIN
    SELECT budget - (SELECT SUM(salary) FROM employees WHERE department_id IN (SELECT department_id FROM projects WHERE project_id = proj_id)) INTO remaining_budget
    FROM projects
    WHERE project_id = proj_id;
END //
DELIMITER ;

-- 13. Create a procedure to generate a report of employees who joined the company in a specific year.
DELIMITER //
CREATE PROCEDURE GenerateEmployeeJoinReport (IN join_year INT)
BEGIN
    SELECT *
    FROM employees
    WHERE YEAR(join_date) = join_year;
END //
DELIMITER ;

-- 14. Write a procedure to update the end date of a project based on its start date and duration.
DELIMITER //
CREATE PROCEDURE UpdateProjectEndDate (IN proj_id INT, IN duration INT)
BEGIN
    UPDATE projects
    SET end_date = DATE_ADD(start_date, INTERVAL duration DAY)
    WHERE project_id = proj_id;
END //
DELIMITER ;

-- 15. Create a procedure to calculate the total number of employees in each department.
DELIMITER //
CREATE PROCEDURE CalculateEmployeeCountPerDepartment ()
BEGIN
    SELECT d.department_name, COUNT(e.emp_id) AS num_employees
    FROM departments d
    LEFT JOIN employees e ON d.department_id = e.department_id
    GROUP BY d.department_id;
END //
DELIMITER ;
