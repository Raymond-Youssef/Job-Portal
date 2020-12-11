## About Job Portal

This is the graduation project from Open Source track summer training provided by ITI:Information Technology Institute

The Project Name is Job Portal
This is a hiring web application that implements the Laravel PHP framework

# Users Can:
- Register/Login as a Job Applicant, a Company or an Admin but it's seeded internally".
- Forget or reset  passwords.
- Update password.
- Update profile (picture, contact, etc.).

# App Modules

## Job Applicant Module

- Applicants are able to login to the application with their credentials, and they will only have access to their own data.
- Applicants are able to maintain multiple resumes • One resume shall be marked as default.
- Applicants are able to maintain their cover letter.
- Applicants are able to watch a list of active jobs.
    - Job applications have the following filters: (job Title, Skills and Location).
- On every page there is a list of recommended jobs matching with the resume of the user.
- Applicants are able apply to a job.
    - On a click on apply button; a popup should prompt the user to upload a new resume or use existing resumes.
    - After confirmation, the resume is sent to the company that posted the job.
- Applicants are able to track their job application (Company will update the status; that will be shown to the applicants).
- An applicant receives notification on updates of status of their job applications.


## Company Module

- Company managers are able to login to the application with their credentials, and they will only have access to their own data.
- They are able to manage jobs.
- They are able to watch applications/submissions to a job and change their statuses.


## Website Admin Module

- Administrators are able to approve users.
    - A badge is assigned to users indicating verification.
- Administrators are able to remove/block any user, job or application.
- Administrators are able to reset passwords of the users.
- Admins are able to watch a list of all registered and unemployed applicants(specifically of an institute).


# Landing Page

Main page with simple text input
- Allows user to input the text or keyword, job to search for.
- View the listed result for the submitted search.

# General Points
- On top of this list, following stats must be shown:
1. Total number of institute graduates
2. Number of registered graduates
3. Number of graduates with job
4. Number of unemployed graduates
- Maintain in this document means Create, Read, Update and Delete (CRUD)


# How to Install

- Install the `Git Tool` from the official site
- Open your `Git Bash Terminal` in the folder where you want to set up the project 
and use the command  `git clone https://github.com/Omeganes/Job-Portal` to copy the Repo to your PC.
- Then the command `cd Job-Portal` to change to the project folder.
- Then the command `composer install` to install the dependencies.
- Then the command `npm install` to install the assets for the project.
- Configure the `.env` as it fits your working your env
    - Checkout the `DB_PORT`
    - Checkout the `DB_DATABASE`
    - Checkout the `DB_USERNAME` "default is root"
    - Checkout the `DB_PASSWORD` "default is empty"
- Don't forget to create Database named `job_portal`
    - to do so, run the SQL command `CREATE DATABASE job_portal` in the phpmyadmin panel.
- After you're done, run the command `php artisan migrate:fresh --seed`
-then the command `php artisan serve`
# Contribution Hints

- It's NECESSARY to follow the naming conventions!
    - database names follow the `underscore and the all lowercase` rule.
- All variables in PHP follow `camelcase rule`.
- Databases are ONLY created using migrations and not from phpmyadmin panel.
