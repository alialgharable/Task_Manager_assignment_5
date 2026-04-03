# Task Management System

## Course and Assignment
- COSC 434 – Advanced Web Programming
- Lab Assignment 5

## Description
This Laravel application implements a secure personal task management system with authenticated user access, protected task CRUD features, optimized task list queries, and database-backed background job processing.

## Setup Steps
1. Open a terminal in `task-manager`
2. Run `composer install`
3. Copy `.env.example` to `.env` if needed
4. Run `php artisan key:generate`
5. Ensure `DB_CONNECTION=sqlite` and `DB_DATABASE=database/database.sqlite` are configured in `.env`
6. Create the SQLite database file if it is missing:
   - `touch database/database.sqlite`
7. Run `php artisan migrate`
8. Optionally install Node assets for Vite:
   - `npm install`
   - `npm run dev`

## Database Setup
- `users` table includes `full_name`, `email`, and secure hashed password.
- `categories` table includes preset category values.
- `tasks` table includes `title`, `description`, `due_date`, `status`, `priority`, `category_id`, and `user_id`.
- `jobs` table is created by the queue migration for background processing.

## Running the Project
1. Start the development server:
   - `php artisan serve`
2. Visit `http://127.0.0.1:8000`
3. Register a new user and manage tasks after login.

## Running the Queue Worker
1. Start the queue worker:
   - `php artisan queue:work`
2. When a task is created, the `ProcessNewTaskAlert` job is dispatched to the database queue.

## N+1 Query Optimization
- Lazy loading can execute one query for tasks and additional queries for each task's category and user.
- This creates an `N + 1` problem when rendering a list of tasks.
- The app uses eager loading in `TaskController@index`:
  - `Task::with(['category', 'user'])->where('user_id', Auth::id())->get();`
- Eager loading reduces query count and improves performance by loading related models in a single query.

## Background Job Explanation
- `ProcessNewTaskAlert` is a queued job dispatched after a new task is created.
- The job logs a message indicating the new task and its owner.
- The queue connection uses the database driver configured in `.env`.

## Reflection
- The app enforces protected task management with Laravel `auth` middleware.
- Users can only view and manage their own tasks; tasks from other users are inaccessible.
- The queue system demonstrates async processing and improves scalability for post-creation actions.
