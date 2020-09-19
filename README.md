## About Job Portal

This is the graduation project from Open Source track summer training provided by ITI:Information Technology Institute

The Project Name is Job Portal
This is a hiring web application that implements the Laravel PHP framework

# Users can:
- Register/Login as a Student or Company "as well as admins but it's seeded internally".
- Forget password and reset passowrd.
- Update password.
- Update profile (picture, contact, etc.).

# App Modules

## Student Module

- Students are able to login to the application with his credentials and he will only have access to his own data.
- Student are able to maintain multiple resumes • One resume shall be marked as default.
- Student are able to maintain his cover letter.
- Student are able to watch list of active jobs.
    - Your application must have following filters for job Title, Skills, Location.
- On every page there is a list of recommended jobs.
    - Recommended jobs must be jobs matching with the resume of the user
- Student must are able to a job
    - On click of apply button; a popup should confirm if the user wants to upload a new resume or use existing resumes.
    - After confirmation the resume must be sent to the company that posted the job.
- Student are able to track his job application (Company will update the status; that will be show to the student)
- Students must receive a notification whenever status of any of their job applications update.


## Company module

- Company manager are able to login to the application with his credentials and he will only have access to his own data.
- They are able to manage jobs.
- They are able to watch applications/submissions against a job and change their statuses.


## Admin module

- Administrators are able to approve their students.
    - A badge is assigned to their students indicating a verified student of their institute.
- Administrator are able to remove/block any user, job or application.
- Administrator are able to reset password of any of the users.
- Admin must are able to watch the list of all registered and unemployed students(specifically of their institute).

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
- Open your `Git Bash Terminal` in the folder where you want to setup the project 
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

# Contribution Hints

- Please Please please Follow the naming conventions.
    - database names follow the `underscore and the all lowercase` rule.
- All variables in PHP follow `camelcase rule`.
- Databases are ONLY created using migrations.
