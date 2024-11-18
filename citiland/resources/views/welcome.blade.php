<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV. Citiland Internusa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(45deg, #1a365d, #2563eb, #60a5fa);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            text-align: center;
            backdrop-filter: blur(10px);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .logo {
            width: 150px;
            height: 150px;
            margin-bottom: 2rem;
            border-radius: 20px;
            overflow: hidden;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: translateZ(0);
            transition: transform 0.5s ease;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .title {
            color: #1e3a8a;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle {
            color: #2563eb;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .description {
            color: #475569;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
        }

        .btn:hover {
            background: #1e40af;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.6);
        }

        @media (max-width: 768px) {
            .container {
                padding: 2rem;
            }
            .title {
                font-size: 2rem;
            }
            .subtitle {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('citilandLogo.png') }}" alt="CV. Citiland Internusa Logo">
        </div>
        <h1 class="title">CV. Citiland Internusa</h1>
        <h2 class="subtitle">Sistem Informasi Persediaan Bahan Baku Mebel</h2>
        <p class="description">
            Sistem manajemen inventaris modern untuk pengelolaan dan pemantauan persediaan bahan baku mebel. 
            Dirancang khusus untuk memastikan efisiensi dan akurasi dalam proses produksi.
        </p>
        <a href="{{ url('/admin') }}" class="btn">Masuk ke Panel Admin</a>
    </div>
</body>
</html>
