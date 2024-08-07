<?php
$short_url = null;

require_once ("connect.php");

function base62_encode($number)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = strlen($characters);
    $encoded = '';

    while ($number > 0) {
        $remainder = $number % $base;
        $number = intval($number / $base);
        $encoded = $characters[$remainder] . $encoded;
    }

    return $encoded;
}

function base62_decode($encoded)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = strlen($characters);
    $decoded = 0;

    for ($i = 0; $i < strlen($encoded); $i++) {
        $decoded = $decoded * $base + strpos($characters, $encoded[$i]);
    }

    return $decoded;
}

// Extract the short code from the request URI
$request_uri = $_SERVER['REQUEST_URI'];
$short_code = ltrim($request_uri, '/');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['longUrl'])) {
    $long_url = $_POST['longUrl'];
    $stmt = $conn->prepare('INSERT INTO urls (long_url) VALUES (:long_url)');
    $stmt->bindParam(':long_url', $long_url);
    $stmt->execute();
    $last_inserted_id = $conn->lastInsertId();
    $short_code = base62_encode($last_inserted_id);
    $short_url = "http://localhost:8000/" . $short_code;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($short_code)) {
    $id = base62_decode($short_code);

    $stmt = $conn->prepare('SELECT long_url FROM urls WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $url = $stmt->fetchColumn();

    if ($url) {
        header("Location: $url");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>URL Shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="bg-dark text-light">
    <div class="container">
        <h1 class="text-center fs-1 text-uppercase play-regular">
            URL Shortener
        </h1>
        <form method="POST" action="index.php" target="_self">
            <div class="input-group">
                <input id="longUrl" type="url" name="longUrl" class="form-control" placeholder="Enter URL here..."
                    aria-label="Recipient's username with two button addons" required />
                <button class="btn btn-success" type="submit">Shorten URL</button>
                <button id="clearBtn" class="btn btn-danger" type="button">
                    Clear
                </button>
            </div>
            <div class="input-group my-3">
                <input type="url" id="shortUrl" class="form-control" placeholder="Your short URL"
                    value="<?php echo htmlspecialchars($short_url); ?>" disabled readonly>
                <button class="btn btn-outline-secondary" type="button" id="copyBtn">
                    Copy
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>