<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            display: flex;
            justify-content: center;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #f0f0f0;
            padding: 20px 0;
            height: 100px; 
            align-items: center;
        }
        
        
        .container-header {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center; 
        }
        .logo-heading img {
            max-width: 180px; 
            height: auto; 
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
        }

        nav a {
            text-decoration: none;
            color: #333;
            padding: 10px;
        }

        .logout-button {
            width: 100px; 
            height: 40px; 
            padding: 10px; 
            line-height: 20px; 
        }
    </style>
</head>
<body class="bg-light">
<header>
    <div class="container-header">
        <div class="logo-heading">
            <img src="/images/amandemy-logo.png" alt="Amandemy Logo">
        </div>
        <nav>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{ route('products.index') }}">PRODUCTS</a></li>
                <li>
                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-primary logout-button">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">LOGIN</a>
                    @endauth
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="container mt-4">
    <div class="col-md-12">
        <div class="d-inline-block">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
        </div>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Weight</th>
                        <th>Condition</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp.{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->condition }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const logoutButton = document.querySelector('.logout-button');
    if (logoutButton) {
        logoutButton.addEventListener('mouseover', () => {
            // Store the original button text (username)
            const originalText = logoutButton.textContent;

            // Change button text to 'Logout' on hover
            logoutButton.textContent = 'Logout';

            // Add an event listener for mouseout to revert text
            logoutButton.addEventListener('mouseout', () => {
                // Revert button text to original text (username)
                logoutButton.textContent = originalText;
            });
        });
    }
});
</script>
</body>
</html>
