<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Adorn Ecommerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Helvetica Neue', sans-serif;
    }
    .welcome-section {
      background-color: #ffffff;
      padding: 60px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
      text-align: center;
    }
    .welcome-section h1 {
      font-size: 42px;
      font-weight: bold;
      color: #343a40;
      margin-bottom: 20px;
    }
    .welcome-section p {
      font-size: 18px;
      color: #6c757d;
      margin-bottom: 40px;
    }
    .welcome-section .btn-lg {
      padding: 12px 36px;
      font-size: 18px;
    }
    .auth-links {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .auth-links a {
      margin-left: 10px;
      text-decoration: none;
      color: #007bff;
      font-size: 16px;
    }
    .company-logo {
      max-width: 150px;
      margin-bottom: 20px;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      color: #6c757d;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="container">
   
    @if (Route::has('login'))
      <div class="auth-links">
        @auth
          <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
          <a href="{{ route('login') }}">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      </div>
    @endif

    <!-- Welcome Section -->
    <div class="welcome-section mx-auto">
      <!-- Company Logo -->
      <img src="{{ asset('backend/assets/images/cloudrevel.jpg') }}" alt="Company Logo" class="company-logo img-fluid">

      <h1>Welcome to cloudrevel</h1>
      

      <!-- Action Buttons -->
      <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
      <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Register</a>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>© {{ now()->year}} cloudrevel. All rights reserved.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
