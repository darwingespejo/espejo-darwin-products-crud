<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: dark; }
        body { font-family: 'Space Grotesk', sans-serif; background: #070b12; }
        .mono { font-family: 'IBM Plex Mono', monospace; }
        .grid-bg { background-image: linear-gradient(rgba(37, 99, 235, .08) 1px, transparent 1px), linear-gradient(90deg, rgba(37, 99, 235, .08) 1px, transparent 1px); background-size: 32px 32px; }
        .panel { background: rgba(13, 18, 29, .94); border: 1px solid #1f2b42; box-shadow: 0 24px 70px rgba(0, 0, 0, .32); }
        .field { background: #080d16; border: 1px solid #263653; color: #f8fafc; }
        .field:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, .16); outline: none; }
    </style>
</head>
<body class="grid-bg flex min-h-screen items-center justify-center p-4 text-slate-100 sm:p-8">
    <div class="panel w-full max-w-xl overflow-hidden rounded-2xl">
        <div class="border-b border-blue-500/20 bg-slate-950/70 px-6 py-6 sm:px-8">
            <p class="mono mb-2 text-xs font-medium uppercase tracking-[.24em] text-blue-400">Inventory / Update record</p>
            <h1 class="text-3xl font-semibold tracking-tight text-white">Edit product</h1>
            <p class="mt-1 text-sm text-slate-400">Update the details for this catalog item.</p>
        </div>
        <div class="p-6 sm:p-8">
        <?php if (!empty($error)): ?>
            <div class="mb-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <form action="<?= site_url('products/edit/'.$product['id']); ?>" method="POST" class="space-y-5">
            <div>
                <label class="mono block text-xs font-medium uppercase tracking-[.14em] text-slate-400">Product name</label>
                <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>" required class="field mt-2 w-full rounded-lg px-4 py-3 text-sm">
            </div>
            <div>
                <label class="mono block text-xs font-medium uppercase tracking-[.14em] text-slate-400">Description</label>
                <textarea name="description" rows="4" class="field mt-2 w-full resize-none rounded-lg px-4 py-3 text-sm"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="mono block text-xs font-medium uppercase tracking-[.14em] text-slate-400">Price</label>
                    <input type="number" step="0.01" name="price" value="<?= $product['price']; ?>" required class="field mt-2 w-full rounded-lg px-4 py-3 text-sm">
                </div>
                <div>
                    <label class="mono block text-xs font-medium uppercase tracking-[.14em] text-slate-400">Quantity</label>
                    <input type="number" name="quantity" value="<?= $product['quantity']; ?>" required class="field mt-2 w-full rounded-lg px-4 py-3 text-sm">
                </div>
            </div>
            <div class="flex items-center justify-between border-t border-slate-800 pt-5">
                <a href="<?= site_url('products'); ?>" class="text-sm font-medium text-slate-400 transition hover:text-white">Cancel</a>
                <button type="submit" class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-950/50 transition hover:bg-blue-500">Update product</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>