<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amandemy Shopping</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #f0f0f0;
  padding: 20px 0;
  height: 100px; 
  padding-top: -10px;
}

.container {
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

.hero {
  background-color: #f5f5f5;
  padding: 80px 0;
  text-align: center;
}

.hero img {
  width: 100%; 
  margin-bottom: 20px;
}

.hero h2 {
  font-size: 32px; 
  margin-bottom: 20px;
}

.hero p {
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 40px;
}

.hero .btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border: none; 
  border-radius: 5px; 
}

.row {
  display: flex;
  align-items: flex-start; 
}

.col-md-6 {
  flex: 1; 
  margin-right: 20px; 
}

.col-md-6 img {
  max-width: 360px;
  height: auto;
  margin-top: 0; 
}

</style>
<body>
  <header>
    <div class="container">
      <div class="logo-heading">
        <img src="images/amandemy-logo.png" alt="Amandemy Logo">
      </div>
      <nav>
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="{{ route('products.index') }}">PRODUCTS</a></li>
          <li><a href="{{ route('login') }}" class="btn btn-primary">LOGIN</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="container" style="margin-top: 100px; margin-bottom:40px">
    <div class="row">
      <div class="col-md-6">
        <h1>Your ultimate destination for premium sneakers and football jerseys!</h1>
        <p>Step up your game with our exclusive collection of high-quality sneakers and authentic football jerseys. Whether you're hitting the streets or the stadium, our products are designed to elevate your style and performance. Experience unparalleled comfort and cutting-edge designs that reflect your passion for the sport. Embrace the spirit of the game. Embrace the excellence. Discover our latest arrivals today!</p>
        <a href="#" class="btn btn-primary">Buy Now</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/haha.jpg" class="img-fluid" alt="gambar" style="width: 360px; height: auto;">
      </div>
    </div>
  </div>
</body>
</html>
