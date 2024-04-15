-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

--1.  Select all employees from the 'Engineering' department.
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id
      FROM employees e
      JOIN departments d ON e.department_id = d.department_id
      WHERE d.department_name = 'Engineering';

--2.	Projection to display only the first names and salaries of all employees: 
      SELECT first_name, salary
      FROM employees;

--3.	Find employees who are managers: 
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id
      FROM employees e
      JOIN departments d ON e.emp_id = d.manager_id;

--4.	Retrieve employees earning a salary greater than ?60000: 
      SELECT *
      FROM employees
      WHERE salary > 60000;

--5.	Join employees with their respective departments: 
      SELECT *
      FROM employees
      JOIN departments ON employees.department_id = departments.department_id;

--6. 	Cartesian product between employees and projects:
      SELECT *
      FROM employees, projects;

--7.	Find employees who are not managers: 
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id
      FROM employees e
      LEFT JOIN departments d ON e.emp_id = d.manager_id
      WHERE d.manager_id IS NULL;

--8.	Natural join between departments and projects: 
      SELECT *
      FROM departments
      NATURAL JOIN projects;

--9.	Project the department names and locations from departments table: 
      SELECT department_name, location
      FROM departments;

--10.	Retrieve projects with budgets greater than ?100000: 
      SELECT *
      FROM projects
      WHERE budget > 100000;

--11.	Find employees who are managers in the 'Sales' department: 
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id
      FROM employees e
      JOIN departments d ON e.department_id = d.department_id
      WHERE d.department_name = 'Sales' AND e.emp_id = d.manager_id;

--12.	Union operation between two sets of employees from the 'Engineering' and 'Finance' departments: 
      SELECT emp_id, first_name, last_name, salary, department_id
      FROM employees
      WHERE department_id IN (SELECT department_id FROM departments WHERE department_name = 'Engineering')
      UNION
      SELECT emp_id, first_name, last_name, salary, department_id
      FROM employees
      WHERE department_id IN (SELECT department_id FROM departments WHERE department_name = 'Finance');

--13.	Find employees who are not assigned to any projects: 
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id
      FROM employees e
      WHERE e.emp_id NOT IN (SELECT emp_id FROM projects);

--14.	Join operation to display employees along with their project assignments: 
      SELECT e.emp_id, e.first_name, e.last_name, e.salary, e.department_id, p.project_id, p.project_name
      FROM employees e
      LEFT JOIN projects p ON e.emp_id = p.emp_id;

--15.	Find employees whose salaries are not within the range ?50000 to ?70000:
      SELECT emp_id, first_name, last_name, salary, department_id
      FROM employees
      WHERE salary < 50000 OR salary > 70000;