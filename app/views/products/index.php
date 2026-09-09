<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Product List</h1>
            <div>
                <a href="<?= site_url('products/create'); ?>" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mr-2">Add Product</a>
                <a href="<?= site_url('auth/logout'); ?>" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Logout</a>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-200 p-2 text-left">ID</th>
                    <th class="border border-gray-200 p-2 text-left">Name</th>
                    <th class="border border-gray-200 p-2 text-left">Description</th>
                    <th class="border border-gray-200 p-2 text-left">Price</th>
                    <th class="border border-gray-200 p-2 text-left">Quantity</th>
                    <th class="border border-gray-200 p-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): foreach($products as $p): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 p-2"><?= $p['id']; ?></td>
                    <td class="border border-gray-200 p-2 font-medium"><?= htmlspecialchars($p['product_name']); ?></td>
                    <td class="border border-gray-200 p-2"><?= htmlspecialchars($p['description']); ?></td>
                    <td class="border border-gray-200 p-2">₱<?= number_format($p['price'], 2); ?></td>
                    <td class="border border-gray-200 p-2"><?= $p['quantity']; ?></td>
                    <td class="border border-gray-200 p-2 text-center space-x-2">
                        <a href="<?= site_url('products/edit/'.$p['id']); ?>" class="text-blue-600 hover:underline">Edit</a>
                        <a href="<?= site_url('products/delete/'.$p['id']); ?>" onclick="return confirm('Delete this product?')" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">No products found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>