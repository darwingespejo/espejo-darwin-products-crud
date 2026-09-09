<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$exception_file = $exception->getFile();
$exception_line = $exception->getLine();
$exception_trace = $exception->getTraceAsString();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Exception</title>
    <style>
        body { font-family: sans-serif; background: #f8f9fa; padding: 20px; }
        .error-box { max-width: 960px; margin: 0 auto; background: #fff; border-left: 4px solid #dc3545; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        pre { overflow-x: auto; white-space: pre-wrap; word-break: break-word; background: #f1f3f5; padding: 12px; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>An exception occurred</h1>
        <p><strong>Message:</strong> <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Filename:</strong> <?php echo htmlspecialchars($exception_file, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Line Number:</strong> <?php echo (int) $exception_line; ?></p>
        <strong>Stack Trace:</strong>
        <pre><?php echo htmlspecialchars($exception_trace, ENT_QUOTES, 'UTF-8'); ?></pre>
    </div>
</body>
</html>
