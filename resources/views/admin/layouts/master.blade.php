<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modern Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f4f7fa;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 60px;
            /* navbar height */
            left: 0;
            width: 250px;
            height: calc(100vh - 60px);
            /* navbar বাদ দিয়ে height */
            background: linear-gradient(180deg, #00b4db, #0083b0);
            overflow-y: auto;
            /* স্ক্রল করার জন্য */
            padding-top: 10px;
            z-index: 1001;
            transition: transform 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            padding: 12px 20px;
            display: block;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            padding-left: 25px;
        }

        .navbar-custom {
            height: 60px;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1002;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .menu-toggle {
            font-size: 24px;
            background: none;
            border: none;
            color: #0083b0;
            cursor: pointer;
            margin-right: 15px;
            display: none;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #0083b0;
        }

        .main-content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .menu-toggle {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }
        }

        .btn-logout {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            font-weight: 500;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-logout:hover {
            background-color: #e60000;
        }
    </style>
</head>

<body>
    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Navbar -->
    @include('admin.layouts.navbar')

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    @yield('content')

    <!-- Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
        }
    </script>
</body>

</html>
