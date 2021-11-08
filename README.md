# phpLoginSystem
About
created two pages one for registration and another for login. Using the registration
page, a new user's credentials can be inserted into the database. While the login page asks for empID and passwd, and
if the correct credentials are provided then all the details of the employee will be available to read. Also, created one
profileupdate page. This page will ask for the empID and passwd again. If correct credentials are provided then user will
be able to update their mobile no and email only.

Database Details:
  Create an employee database and create an emp table with following attributes
    empID: varchar(10) primary key; 
    passwd: varchar(255); 
    empName: varchar(20); 
    DoJ: date; 
    salary: int; 
    department: varchar(20); 
    mobileNo: int; 
    email: varchar(30); 
