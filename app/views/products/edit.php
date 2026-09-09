<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <?php if (!empty($error)): ?>
            <div class="mb-4 rounded border border-red-200 bg-red-50 px-4 py-3 text-red-800"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Product</h2>
        <form action="<?= site_url('products/edit/'.$product['id']); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" value="<?= $product['price']; ?>" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" value="<?= $product['quantity']; ?>" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-between items-center pt-2">
                <a href="<?= site_url('products'); ?>" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>