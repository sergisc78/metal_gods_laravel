<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Metal Gods</title>

  <!-- JQUERY -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--DATATABLES CSS-->
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!--DATATABLES JS -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- BOOTSTRAP CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="{{url('/css/styles.css')}}">

<!-- GOOLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">




  <style>
    th {

      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;

    }

    table {
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;
    }

    #table_filter {
      margin-bottom: 30px;
    }

    #table_info {
      color: white;
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;
    }

    #table_length,
    #table_filter {
      color: black;
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;
    }

    .sorting {
      width: 160px;
    }
  .table-last-reviews{
    color: black;
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;
     
  }
  body{
     overflow: auto;
  }
  </style>


</head>

<body class=" overflow-scroll background-img">

  <!-- Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent" style="text-color:black">
    <div class="container">
      <!-- Logo-->
      <a class="navbar-brand fs-4 text-black" href="/">Metal Gods</a>
      <!-- Toogle Btn-->
      <button class="navbar-toggler shadow-none-border-0" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation"
        style="background-color: black">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--Sidebar-->
      <div class=" sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">

        <!-- Sidebar header-->
        <div class="offcanvas-header text-black border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Metal Gods</h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <!-- Sidebar body-->
        <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
          <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-body mx-2 text-decoration-none" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-body text-decoration-none" href="#">About Us</a>
            </li>

            <li class="nav-item mx-2">
              <a class="nav-body text-decoration-none" href="#">Contact Us</a>
            </li>
          </ul>
          <!-- Login and Sing up -->
          @if (Route::has('login'))
          <div class=" loginRegister d-flex justify-content-center flex-column flex-lg-row align-items-center gap-3">
            @auth
            <a href="{{ url('/dashboard') }}"
              class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-black text-decoration-none">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
              class="text-white text-decoration-none px-3 py-1 btn btn-primary rounded-4">Register</a>
            @endif
            @endauth

            @endif
          </div>

        </div>
      </div>
    </div>
  </nav>