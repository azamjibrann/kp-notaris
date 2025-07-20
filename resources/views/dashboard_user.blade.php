<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Sederhana</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #f5f5f5;
    }

    .sidebar {
      width: 200px;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: white;
      transition: 0.3s;
    }

    .sidebar ul li a:hover {
      color: #1abc9c;
    }

    .main-content {
      flex: 1;
      padding: 20px;
    }

    .header {
      background-color: #ecf0f1;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logout-btn {
      padding: 8px 15px;
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      transition: background-color 0.3s;
      cursor: pointer;
    }

    .logout-btn:hover {
      background-color: #c0392b;
    }

    .content {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>MyDashboard</h2>
    <ul>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Laporan</a></li>
      <li><a href="#">Pengguna</a></li>
      <li><a href="#">Pengaturan</a></li>
    </ul>
  </div>

  <div class="main-content">
    <div class="header">
      <h1>Selamat Datang di Dashboard</h1>

      {{-- Form Logout (POST method) --}}
      <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>

    <div class="con
