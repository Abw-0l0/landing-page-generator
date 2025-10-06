<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')

    <style>
        body {
            background-color: #f9fafb;
        }

        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e5e7eb;
        }

        .sidebar-item {
            transition: background-color 0.2s, color 0.2s;
        }

        .sidebar-item:hover {
            background-color: #f3f4f6;
            color: #007CBE;
        }

        .sidebar-item.active {
            background-color: #007CBE;
            color: #ffffff;
        }

        .prompt-input {
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            transition: border-color 0.2s;
        }

        .prompt-input:focus {
            outline: none;
            border-color: #007CBE;
        }

        .action-button {
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            transition: all 0.2s;
        }

        .action-button:hover {
            background-color: #f9fafb;
            border-color: #007CBE;
        }

        .template-card {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            transition: all 0.2s;
        }

        .template-card:hover {
            border-color: #007CBE;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .new-project-btn {
            background: linear-gradient(135deg, #007CBE 0%, #005a8d 100%);
        }

        .new-project-btn:hover {
            background: linear-gradient(135deg, #0090dd 0%, #007CBE 100%);
        }
    </style>
</head>
<body class="font-syne antialiased">
    <!-- Header -->
    @include('partials.header')

    <div class="flex h-[calc(100vh-73px)]">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
