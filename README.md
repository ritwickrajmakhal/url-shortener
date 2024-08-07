# URL Shortener

A simple URL shortener application built with PHP and MySQL.

## Features

- Shorten long URLs
- Redirect to the original URL using the shortened URL
- Simple and clean UI

## Requirements

- PHP 7.0 or higher
- MySQL
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/ritwickrajmakhal/url-shortener.git
   cd url-shortener
   ```

2. Set up the database:

   - Create a MySQL database:
     ```sql
     CREATE DATABASE url_shortener;
     ```
   - Import the `url_shortener.sql` file to create the necessary tables.
     ```bash
     mysql -u username -p url_shortener < url_shortener.sql
     ```

3. Configure the environment variables:

   - Rename `.env.example` to `.env`.
   - Update the `.env` file with your database credentials.

4. Start your web server and navigate to the project directory.
   ```bash
   php -S localhost:8000
   ```

## Usage

1. Open your web browser and go to `http://localhost:8000/`.
2. Enter a long URL in the input field and click "Shorten URL".
3. Copy the generated short URL and use it to redirect to the original URL.
