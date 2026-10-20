
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kepegawaian</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f1f3f5;
            color: #263238;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 32px;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
            font-size: 24px;
        }

        .subtitle {
            margin: 0 0 28px;
            color: #6c757d;
            text-align: center;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus {
            outline: 2px solid #b6c8e6;
            border-color: #345995;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #345995;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #274575;
        }

        .error, .success {
            padding: 11px;
            margin-bottom: 18px;
            border-radius: 6px;
            font-size: 14px;
        }

        .error {
            background: #fce8e8;
            color: #a12626;
        }

        .success {
            background: #e7f5eb;
            color: #216e39;
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>Login</h1>
        <p class="subtitle">Sistem Informasi Kepegawaian</p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>
