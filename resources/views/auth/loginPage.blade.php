<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/LOGO.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .background {
            background-image: url("{{ asset('background/bg.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="background min-h-screen flex justify-center items-center">
    <div class="flex flex-col bg-green-500 p-8 rounded-lg shadow-2xl">
        <form action="{{ route('loginPost') }}" method="POST" class="space-y-6">
            @csrf
            <div class="mt-4">
                <label for="email" class="block text-white font-semibold">Email</label>
                <input type="email" name="email" id="username"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
            </div>
            <div class="mt-4">
                <label for="password" class="block text-white font-semibold">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
            </div>
            <button type="submit"
                class="w-full bg-blue-300 text-white py-2 mt-4 rounded-lg hover:bg-blue-500 transition-colors duration-200 ease-in-out hover:scale-105">
                Login
            </button>
        </form>
        <div class="text-white text-center mt-4">
            Don't have an account? <a href="/register" class="text-blue-800">Register</a>
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="text-blue-700 hover:underline">Back To Home</a>
        </div>
    </div>
</body>

</html>
