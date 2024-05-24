<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            grid-gap: 20px; 
        }
        .card {
            width: 100%;
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
                <img src="images/amandemy-logo.png" alt="Amandemy Logo">
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
        <div class="container mb-4">
            <div class="card-container">
                @foreach ($products as $product)
                <div class="card">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Price: Rp. {{ $product->price }}</p>
                        <p class="card-text">Stock: {{ $product->stock }}</p>
                        <p class="card-text">Weight: {{ $product->weight }}</p>
                        <p class="card-text">Condition: {{ $product->condition }}</p>
                        <p class="card-text">Description: {{ $product->description }}</p>
                        <a href="{{ route('detail', ['id' => $product->id]) }}" class="btn btn-primary">Buy Now</a>
   
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
const logoutButton = document.querySelector('.logout-button');

logoutButton.addEventListener('mouseover', () => {
  const originalText = logoutButton.textContent;
  logoutButton.textContent = 'Logout';

  logoutButton.addEventListener('mouseout', () => {
  
    logoutButton.textContent = originalText;
  });
});
    </script>
</body>
</html>
