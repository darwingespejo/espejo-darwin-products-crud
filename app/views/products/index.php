<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: dark; }
        body { font-family: 'Space Grotesk', sans-serif; background: #070b12; }
        .mono { font-family: 'IBM Plex Mono', monospace; }
        .grid-bg { background-image: linear-gradient(rgba(37, 99, 235, .08) 1px, transparent 1px), linear-gradient(90deg, rgba(37, 99, 235, .08) 1px, transparent 1px); background-size: 32px 32px; }
        .panel { background: rgba(13, 18, 29, .92); border: 1px solid #1f2b42; box-shadow: 0 24px 70px rgba(0, 0, 0, .32); }
        .table-row { border-top: 1px solid #1f2b42; transition: background-color .2s ease; }
        .table-row:hover { background: rgba(37, 99, 235, .08); }
    </style>
</head>
<body class="grid-bg min-h-screen p-4 text-slate-100 sm:p-8">
    <div class="panel mx-auto max-w-6xl overflow-hidden rounded-2xl">
        <div class="border-b border-blue-500/20 bg-slate-950/70 px-5 py-5 sm:px-8">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="mono mb-2 text-xs font-medium uppercase tracking-[.24em] text-blue-400">Inventory / Console</p>
                    <h1 class="text-3xl font-semibold tracking-tight text-white">Product catalog</h1>
                    <p class="mt-1 text-sm text-slate-400">Manage your active inventory from one place.</p>
                </div>
                <div class="flex items-center gap-3">
                    <?php if ($is_admin): ?>
                        <a href="<?= site_url('products/create'); ?>" class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-950/50 transition hover:bg-blue-500">+ Add product</a>
                    <?php endif; ?>
                    <a href="<?= site_url('auth/logout'); ?>" class="rounded-lg border border-slate-700 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:border-blue-500 hover:text-white">Log out</a>
                </div>
            </div>
        </div>
        <?php if (!empty($success)): ?>
            <div class="mx-5 mt-5 rounded-lg border border-blue-500/30 bg-blue-500/10 px-4 py-3 text-sm text-blue-200 sm:mx-8"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php elseif (!empty($error)): ?>
            <div class="mx-5 mt-5 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200 sm:mx-8"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <div class="overflow-x-auto p-5 sm:p-8">
        <table class="w-full min-w-[720px] border-collapse text-left">
            <thead class="mono text-[11px] uppercase tracking-[.18em] text-slate-500">
                <tr class="bg-gray-50">
                    <th class="rounded-l-lg bg-slate-950 p-4">ID</th>
                    <th class="bg-slate-950 p-4">Product</th>
                    <th class="bg-slate-950 p-4">Description</th>
                    <th class="bg-slate-950 p-4">Price</th>
                    <th class="bg-slate-950 p-4">Stock</th>
                    <th class="rounded-r-lg bg-slate-950 p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): foreach($products as $p): ?>
                <tr class="table-row">
                    <td class="mono p-4 text-xs text-slate-500">#<?= $p['id']; ?></td>
                    <td class="p-4 font-semibold text-white\"><?= htmlspecialchars($p['product_name']); ?></td>
                    <td class="max-w-xs truncate p-4 text-sm text-slate-400\"><?= htmlspecialchars($p['description']); ?></td>
                    <td class="mono p-4 text-sm text-blue-300">₱<?= number_format($p['price'], 2); ?></td>
                    <td class="p-4"><span class="rounded-full border border-blue-500/30 bg-blue-500/10 px-2.5 py-1 text-xs font-medium text-blue-300"><?= $p['quantity']; ?> units</span></td>
                    <td class="p-4 text-right text-sm">
                        <?php if ($is_admin): ?>
                            <a href="<?= site_url('products/edit/'.$p['id']); ?>" class="font-medium text-blue-400 transition hover:text-blue-300">Edit</a>
                            <a href="<?= site_url('products/delete/'.$p['id']); ?>" onclick="return confirm('Delete this product?')" class="ml-4 font-medium text-slate-500 transition hover:text-red-400">Delete</a>
                        <?php else: ?>
                            <span class="text-slate-600">Admin only</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6" class="p-12 text-center text-slate-500">No products found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>