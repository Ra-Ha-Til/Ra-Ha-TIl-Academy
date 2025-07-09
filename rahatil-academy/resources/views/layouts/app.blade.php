<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ra Ha Til Academy - @yield('title')</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-bg: #ffffff;
            --secondary-bg: #f8f9fa;
            --text-color: #212529;
            --border-color: #dee2e6;
            --hover-bg: #e9ecef;
            --active-bg: #dee2e6;
        }

        body {
            background-color: var(--secondary-bg);
            color: var(--text-color);
        }

        .sidebar {
            background-color: var(--primary-bg);
            border-right: 1px solid var(--border-color);
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            padding-top: 20px;
            z-index: 1000;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .nav-link {
            color: var(--text-color);
            border-radius: 5px;
            margin: 5px 0;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--hover-bg);
        }

        .card {
            background-color: var(--primary-bg);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card.active {
            background-color: var(--active-bg);
        }

        .table {
            background-color: var(--primary-bg);
        }

        .btn-outline-dark {
            border-color: var(--border-color);
            color: var(--text-color);
        }

        .btn-outline-dark:hover {
            background-color: var(--hover-bg);
        }
    </style>

    @yield('styles')
    @stack('styles')
</head>
<body>
    <div>
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card.clickable');
            cards.forEach(card => {
                card.addEventListener('click', function () {
                    cards.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
