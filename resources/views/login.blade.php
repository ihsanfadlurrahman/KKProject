<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Kios & Kontrakan</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: #ffffff;
            width: 360px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #1e293b;
        }

        .login-box p {
            text-align: center;
            margin-bottom: 25px;
            font-size: 14px;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: #2563eb;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #1d4ed8;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>
    <p>Sistem Pendataan Kios & Kontrakan</p>

    <form>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password">
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="footer-text">
        © 2026 Sistem Internal
    </div>
</div>

</body>
</html>
