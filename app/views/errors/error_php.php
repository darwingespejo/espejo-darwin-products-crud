<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Error</title>
    <style>
        body { font-family: sans-serif; background: #f8f9fa; padding: 20px; }
        .error-box { background: #fff; border-left: 4px solid #dc3545; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="error-box">
        <h4>A PHP Error occurred</h4>
        <p>Severity: <?php echo $severity; ?></p>
        <p>Message: <?php echo $message; ?></p>
        <p>Filename: <?php echo $filepath; ?></p>
        <p>Line Number: <?php echo $line; ?></p>
    </div>
</body>
</html>