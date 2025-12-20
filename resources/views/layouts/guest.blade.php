<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Fitness Club'))</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#05C1F7',
                        'accent': '#00ff88',
                        'dark': '#0a0a0a',
                        'darker': '#050505',
                        'card': '#1b1b1b',
                        'border': '#3E3E3A',
                        'input': '#2d2d2d',
                        'light': '#EDEDEC',
                        'gray': '#A1A09A',
                    },
                    fontFamily: {
                        'oswald': ['Oswald', 'sans-serif'],
                    },
                    backgroundImage: {
                        'gradient-primary': 'linear-gradient(135deg, #05C1F7 0%, #00ff88 100%)',
                        'gradient-dark': 'linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%)',
                    },
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-oswald text-light min-h-screen flex items-center justify-center p-4 bg-dark">
    {{ $slot }}
</body>
</html>