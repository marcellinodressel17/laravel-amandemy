<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Dashboard</title>
</head>

<style>

.centered-container {
    margin-top:40px;
    display: flex;
    justify-content: center;
    align-items: center; /* Center vertically if needed */
  }


.dashboard-card {
    background-color: #fff;
    border: 1px solid #343a40;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: inline-block; 
}

.dashboard-card h3 {
    color: #343a40;
    margin-bottom: 20px;
    text-align: center;
}

.dashboard-card .user-info {
      display: flex;
      justify-content: space-between;
    }


.dashboard-card .user-info .labels p,
.dashboard-card .user-info .values p {
    margin: 5px 0;
}

.dashboard-card .user-info .labels {
    font-weight: bold;
    color: #495057;
}

.dashboard-card .user-info .values {
    color: #6c757d;
}

.dashboard-card .logout-button {
      text-align: center;
      margin-top: 20px;
    }


.dashboard-card .logout-button button {
    background-color: #dc3545;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

.dashboard-card .logout-button button:hover {
    background-color: #c82333;
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
                @if (Auth::check() && Auth::user()->hasRole('superadmin'))
        <li><a href="{{ route('products.admin') }}">MANAGE PRODUCT</a></li> @endif
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
<div class="centered-container">
<div class="container">
    <div class="col-md-4 offset-md-4 dashboard-card">
        <h3 class="fw-bold mb-3 mt-3" style="text-align: center">Hello User {{ $user->id }}</h3>
        <div class="user-info">
            <div class="labels">
                <p>Nama Akun</p>
                <p>Email</p>
                <p>Gender</p>
                <p>Umur</p>
                <p>Tanggal Lahir</p>
                <p>Alamat</p>
            </div>
            <div class="values">
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->gender }}</p>
                <p>{{ $user->age }} tahun</p>
                <p>{{ $user->birth }}</p>
                <p>{{ $user->address }}</p>
            </div>
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