<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | GuruIDEA</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,600,700&display=swap">
  <link rel="stylesheet" href="{{ 'admin' }}/plugins/fontawesome-free/css/all.min.css">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Inter', Arial, sans-serif;
      background: linear-gradient(120deg, #6b120e 0%, #e39b37 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-container {
      display: flex;
      width: 900px;
      max-width: 98vw;
      min-height: 520px;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(107,18,14,0.18);
      overflow: hidden;
    }
    .login-illustration {
      flex: 1.2;
      background: linear-gradient(120deg, #6b120e 0%, #e39b37 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      min-width: 0;
    }
    .login-illustration .placeholder-illustration {
      width: 90%;
      max-width: 420px;
      height: 420px;
      background: white;
      border-radius: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 2rem;
      font-weight: 700;
      box-shadow: 0 4px 24px rgba(107,18,14,0.10);
      margin: auto;
      text-align: center;
    }
    .login-form-side {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 48px 40px;
      background: #fff;
    }
    .login-form-side h2 {
      color: #6b120e;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .login-form-side p {
      color: #a97a4a;
      margin-bottom: 32px;
      font-size: 1rem;
    }
    .login-form-side form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .login-form-side input[type="email"],
    .login-form-side input[type="password"] {
      padding: 14px 16px;
      border: 1.5px solid #e9c9a0;
      border-radius: 8px;
      font-size: 1rem;
      background: #f7f3ef;
      transition: border 0.2s;
      color: #6b120e;
    }
    .login-form-side input:focus {
      border-color: #e39b37;
      outline: none;
      background: #fff;
    }
    .login-form-side .form-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.95em;
      color: #a97a4a;
    }
    .login-form-side .form-row label {
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
    }
    .login-form-side .form-row a {
      color: #e39b37;
      text-decoration: none;
      font-weight: 500;
    }
    .login-form-side .form-row a:hover {
      text-decoration: underline;
    }
    .login-form-side button {
      background: linear-gradient(90deg, #e39b37 0%, #6b120e 100%);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 14px 0;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      margin-top: 8px;
      transition: background 0.2s;
      box-shadow: 0 2px 8px rgba(227,155,55,0.08);
    }
    .login-form-side button:hover {
      background: linear-gradient(90deg, #6b120e 0%, #e39b37 100%);
    }
    .login-form-side .create-account {
      margin-top: 18px;
      text-align: center;
      font-size: 0.98em;
    }
    .login-form-side .create-account a {
      color: #e39b37;
      text-decoration: none;
      font-weight: 500;
    }
    @media (max-width: 900px) {
      .login-container {
        flex-direction: column;
        width: 98vw;
        min-height: 0;
      }
      .login-illustration {
        min-height: 220px;
        max-height: 220px;
        justify-content: flex-start;
      }
      .login-illustration .placeholder-illustration {
        max-width: 100vw;
        max-height: 320px;
        font-size: 1.3rem;
      }
      .login-form-side {
        padding: 32px 16px;
      }
    }
    @media (max-width: 600px) {
      .login-container {
        width: 100vw;
        border-radius: 0;
        box-shadow: none;
      }
      .login-form-side {
        padding: 20px 6vw;
      }
      .login-illustration {
        display: none;
      }
    }
    @media (min-width: 600px) and (max-width: 1024px) {
      .login-container {
        width: 98vw;
        min-height: 0;
        border-radius: 12px;
        flex-direction: row;
      }
      .login-illustration {
        min-width: 260px;
        max-width: 380px;
        min-height: 320px;
        max-height: 420px;
        padding: 0;
        justify-content: center;
      }
      .login-illustration .placeholder-illustration {
        height: 320px;
        max-width: 320px;
        min-width: 200px;
        border-radius: 18px;
        padding: 0;
      }
      .login-form-side {
        padding: 32px 24px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-illustration">
      <!-- Placeholder ilustrasi, ganti src jika ada gambar -->
      <div class="placeholder-illustration">
          <img src="{{ asset('img/icon-quantum.png') }}" style="width: 70%; height: 75%; ">
      </div>
    </div>
    <div class="login-form-side">
      <h2>GuruIDEA</h2>
      <p>Selamat datang di GuruIDEA. Silakan login untuk melanjutkan.</p>
      <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email atau Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk &rarr;</button>
      </form>
      <div class="create-account">
        <span><a href="/">Kembali ke awal</a></span>
      </div>
    </div>
  </div>
</body>
</html>
