<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://www.example.com/path-to-your-image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h1 {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
        }

        .form-control {
            border-radius: 20px;
            border: 2px solid #007bff;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            width: 100%;
            transition: background 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #003580);
        }

        .btn-secondary {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
            width: 100%;
            margin-top: 10px;
            transition: background 0.3s ease-in-out;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #495057, #343a40);
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 20px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 15px;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .register-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <h1>Login</h1>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="sesi/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <form action="sesi/admin-login" method="POST">
            @csrf
            <div class="form-group">
                <button name="admin-login" type="submit" class="btn btn-secondary">Login as Admin</button>
            </div>
        </form>
        <a href="{{ route('register') }}" class="register-link">Don't have an account? Register here</a>
    </div>
</body>
</html>
