# Jspreadsheet Spreadsheet

## Database Integration

This guide explains how to persist jspreadsheet data using postgresql.

### Step 1: Clone the Project

Download the project to your local machine. Ensure that [Docker](https://www.docker.com/) is installed and running.

### Step 2: Start Docker Containers

Navigate to the project’s root folder and run the following command to start the necessary Docker containers:

```bash
docker-compose up
```

### Step 3: Access the PHP Container

Open a new terminal, navigate to the project’s root folder, and access the PHP container by running:

```bash
docker-compose exec php bash
```

### Step 4: Install Dependencies

Inside the PHP container terminal, install the required PHP dependencies using [Composer](https://getcomposer.org/):

```bash
composer install
```

### Step 5: Access the PostgreSQL Container

In a new terminal, navigate to the root folder and access the PostgreSQL container:

```bash
docker-compose exec postgresql bash
```

#### Step 5.1: Create Database and Table

Once inside the PostgreSQL container, follow these steps to create a `users` table:

1. Access PostgreSQL and create the `test` database:
    ```bash
    psql -U postgres
    ```

2. Create a new database:
    ```sql
    CREATE DATABASE test;
    ```

3. Connect to the `test` database:
    ```sql
    \c test
    ```

4. Create the `users` table:
    ```sql
    CREATE TABLE users (
        user_id SERIAL PRIMARY KEY,
        username VARCHAR(50),
        email VARCHAR(100)
    );
    ```

### Step 6: Update PHP Configuration

Verify that the table name in your `public/index.php` matches the database table you created. In this example, the table is `users`:

```php
$jss = new \Jspreadsheetdb($database, 'users');
```

### Step 7: Access the Spreadsheet

Open your browser and navigate to [http://localhost:8009](http://localhost:8009). Any updates made in the spreadsheet will now persist in the database table.

---

### Notes:
- You can further customize the database structure depending on your needs.
- Ensure that your Docker containers are running before attempting to access the site.
