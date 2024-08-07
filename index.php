<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>URL Shortener</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="bg-dark text-light">
    <div class="container">
      <h1 class="text-center fs-1 text-uppercase play-regular">
        url Shortener
      </h1>
      <div class="input-group">
        <input
          type="text"
          class="form-control"
          placeholder="Enter URL here..."
          aria-label="Recipient's username with two button addons"
        />
        <button class="btn btn-success" type="button">Shorten URL</button>
        <button class="btn btn-danger" type="button">Clear</button>
      </div>
      <div class="input-group my-3">
        <input
          type="text"
          class="form-control"
          placeholder="Your short URL"
          aria-label="Recipient's username"
          aria-describedby="button-addon2"
          disabled
        />
        <button
          class="btn btn-outline-secondary"
          type="button"
          id="button-addon2"
        >
          Copy
        </button>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Original URL</th>
              <th>Shortened URL</th>
              <th>Clicks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>https://www.example.com/article/12345</td>
              <td>short.ly/abc1</td>
              <td>15</td>
            </tr>
            <tr>
              <td>https://www.anotherexample.com/blog/post/678</td>
              <td>short.ly/def2</td>
              <td>23</td>
            </tr>
            <tr>
              <td>https://www.somewebsite.com/page/xyz</td>
              <td>short.ly/ghi3</td>
              <td>10</td>
            </tr>
            <tr>
              <td>https://www.yetanotherexample.com/news/2468</td>
              <td>short.ly/jkl4</td>
              <td>8</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
