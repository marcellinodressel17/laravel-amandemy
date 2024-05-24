<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Product Detail Page</title>
</head>

<style>
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

.product-container {
    max-width: 600px; /* Sesuaikan dengan lebar yang diinginkan */
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
}
</style>

<body>
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
          <li>
          @auth
    <a href="{{ route('logout') }}" class="btn btn-primary logout-button">{{ Auth::user()->name }}</a>
  @else
    <a href="{{ route('login') }}" class="btn btn-primary">LOGIN</a>
  @endauth
                </li>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="product-container mt-4">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <h2>Rp. {{ $product->price }}</h2>
        <form action="{{ route('checkout', ['product_id' => $product->id]) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary btn-lg">Checkout</button>
        </form>
      </div>
    </div>
  </div>

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
