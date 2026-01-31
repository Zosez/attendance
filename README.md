#Employee Attendance & Leave Management System

##Project Description

This is a PHP and MySQL based web application designed to manage employee records, track daily attendance, and handle leave requests. The system supports secure login, CRUD operations, search functionality, and Ajax-based live updates.

##Login Credentials

###Admin Account

Username: admin
Password: admin123

###Employee Account

Username: user
Password: user123

##Setup Instructions

Follow these steps to run the project
- open browser and visit: 
- login using above credentials

##Features Implemented
###Core Features

- Session-based authentication (Login & Logout)
- Employee management (Create, Read, Update, Delete)
- Attendance marking with date and time
- Leave request submission by employee and approval system by admin
- Role-based access (Admin & Employee)


###Attendance Features

- View employees present by selected date
- Date-based attendance filtering
- Attendance records stored with timestamp
- Prevents duplicate attendance entries

###Search & Filter

- Search attendance by date
- Filter employees by department or role
- Leave search by employee and leave type

###Ajax Features

-Live attendance, leave updates based on filter selection (without page reload)
-Live leave request submission (without page reload)
-Live status change by admin (without page reload)
-Dynamic data fetching using REST API 

###Security Features

-Prepared statements to prevent SQL Injection
-Output escaping using htmlspecialchars() to prevent XSS
-Session-based authentication to protect restricted pages
-CSRF token implementation on login authentication to prevent forged requests

###Known Issues / Limitations

-Attendance calendar monthly view is not implemented (date-wise view is used instead)
-UI is optimized for desktop view only
-No email notifications for leave approval
-No password reset functionality

###Optional Enhancements (Future Scope)

-Monthly attendance calendar view
-Email notifications for leave status
-Mobile responsive UI
-Export attendance reports (PDF/Excel)
