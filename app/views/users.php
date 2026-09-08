<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        :root { color-scheme: dark; font-family: Arial, sans-serif; }
        body { margin: 0; padding: 2rem; background: #111827; color: #f9fafb; }
        main { max-width: 960px; margin: 0 auto; }
        h1 { margin-bottom: .35rem; }
        p { color: #9ca3af; }
        .table-wrap { overflow-x: auto; margin-top: 2rem; border: 1px solid #374151; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; min-width: 640px; }
        th, td { padding: .9rem 1rem; text-align: left; border-bottom: 1px solid #374151; }
        th { background: #1f2937; color: #d1d5db; }
        tr:last-child td { border-bottom: 0; }
        a { color: #f97316; }
    </style>
</head>
<body>
    <main>
        <a href="<?= base_url() ?>">Back to home</a>
        <h1>User Management</h1>
        <p>Users retrieved from the <code>users</code> table through <code>UsersModel::all()</code>.</p>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5">No users found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= html_escape($user['id']) ?></td>
                                <td><?= html_escape($user['firstname']) ?></td>
                                <td><?= html_escape($user['lastname']) ?></td>
                                <td><?= html_escape($user['email']) ?></td>
                                <td><?= html_escape($user['username']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>