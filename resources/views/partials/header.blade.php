<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Feedback System</title>
        <link rel="stylesheet" href={{url('css/styles.css')}}>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container">
                  <a class="navbar-brand" href="/">SFS</a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="navbar-collapse collapse" id="menu">
                    @php
                        $hasUser = false;
                    @endphp
                    
                    @isset($user)
                      @php
                          $hasUser = true;
                      @endphp
                    @endisset
                    <ul class="navbar-nav ms-auto">
                      @if ($hasUser)
                        @if ($user["accType"] === "admin")
                          <li class="nav-item">
                            <a class="nav-link" href="/admin-dashboard">Dashboard</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/usersList">Users list</a>
                          </li>
                        @else
                          <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                          </li>
                        @endif
                        <li class="nav-item">
                          <a class="nav-link" href="/logout">Logout</a>
                        </li>
                      @else
                        <li class="nav-item">
                          <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Account
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/account?type=student">Student</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/account?type=teacher">Teacher</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/admin">Admin</a></li>
                          </ul>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </nav>
        </header>