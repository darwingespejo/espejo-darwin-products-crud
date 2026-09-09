<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Error</title>
    <style>
        body { font-family: sans-serif; background: #f8f9fa; padding: 20px; }
        .error-box { max-width: 960px; margin: 0 auto; background: #fff; border-left: 4px solid #dc3545; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        pre { overflow-x: auto; white-space: pre-wrap; word-break: break-word; background: #f1f3f5; padding: 12px; }
        h1 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>Database Error</h1>
        <p><strong>Message:</strong> <?= $escape($exception_message); ?></p>
        <p><strong>Filename:</strong> <?= $escape($file); ?></p>
        <p><strong>Line Number:</strong> <?= $escape($line); ?></p>
        <p><strong>Query:</strong></p>
        <pre><?= $escape($query); ?></pre>
        <p><strong>Bindings:</strong></p>
        <pre><?= $escape($bindings_data); ?></pre>
        <p><strong>Stack Trace:</strong></p>
        <pre><?= $escape($trace); ?></pre>
    </div>
</body>
</html>
