# Credit Management System

A simple credit management system built with Laravel, allowing users to create, list, and manage credits and payments. This system calculates monthly payments based on a fixed annual interest rate and tracks remaining balances for each credit.

## Features

- **Credit Creation**: Form for adding new credits with borrower’s name, loan amount, and term (in months).
- **Credit Listing**: A table that displays all the credits, showing borrower’s name, loan amount, term, monthly payment, and the remaining balance.
- **Payment Handling**: Allows users to record payments towards any credit. The system ensures that overpayments are adjusted, and remaining balance is updated accordingly.
- **Interest Rate**: A fixed annual interest rate of 7.9% is applied for all credits.

## Requirements

- PHP >= 8.0
- Composer
- MySQL
- Laravel 10.x

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/ivanski2/credit-management-system.git
   
2.Navigate to the project directory:

    cd credit-management-system

3.Install dependencies:
 
    composer install

4.Set up your environment variables by copying the .env.example to .env:

    cp .env.example .env

5.Update the .env file with your database credentials.

6.Create the database:

    CREATE DATABASE credit_management;

7.Run the database migration:

    php artisan migrate

8.Run the database migration:

    php artisan db:seed

9.Start the development server:

    php artisan serve

Open your browser and navigate to http://localhost:8000 to view the application.
