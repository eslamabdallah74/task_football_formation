# Football Lineup Visualization App

## Introduction

Thank you for exploring our Football Lineup Visualization App! I appreciate your interest and hope you find the application fun.

## Installation

1. **Database Setup:**

    - Create a new database in your preferred database management system.
    - Copy the `.env.example` file to `.env` and update the database configuration in the `.env` file with your database credentials.

2. **Install Dependencies:**

    - Run the following commands to install PHP and JavaScript dependencies:

    ```bash
    composer install
    npm install
    ```

3. **Database Migration and Seeding:**

    - Run the following command to migrate and seed the database:

    ```bash
    php artisan migrate --seed
    ```

4. **Run the Application:**

    - Start the Laravel development server:

    ```bash
    php artisan serve
    ```

    - Compile and watch for changes in JavaScript and CSS:

    ```bash
    npm run dev
    ```

    - Visit `http://localhost:8000` in your web browser.

## Important Points

In the development of this application, I would like to highlight a few points:

1. **Styling and Code Organization:**

    - Due to time constraints, the styling and code organization might not meet the highest standards. I acknowledge the importance of these aspects and plan to enhance them in future updates.

2. **Code Stability and Testing:**

    - While I have strived for code stability, comprehensive testing was not possible within the given time frame.

3. **Design Patterns:**

    - The application currently lacks the implementation of design patterns, such as the repository pattern. I recognize the potential benefits of incorporating these patterns and plan to explore and integrate them in future iterations.

4. **Lineup CRUD Operations:**

    - While the basic concepts of Create, Read, Update, and Delete (CRUD) operations for lineups are not present, it's important to note that they are not fully implemented. The current functionality may not work as intended for scenarios like "4-1-4-1" or "4-2-2-2." We acknowledge this limitation due the lack of time.

5. **Backend vs. Frontend Proficiency:**
    - The development was primarily done by someone with a backend focus, and frontend development may not be as polished. I appreciate your understanding and welcome contributions to improve my skills.

## Conclusion

In summary, the development of this application was a result of time constraints and a focus on providing a basic lineup visualization. I value your feedback and contributions to help us enhance and grow the application over time.

Thank you for your understanding and support!
