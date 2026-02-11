<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Pendataan Kios & Kontrakan</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f5f7fa;
      display: flex;
    }

    /* SIDEBAR */
    .sidebar {
      width: 240px;
      background: #1e293b;
      color: #fff;
      height: 100vh;
      padding: 20px;
      position: fixed;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 18px;
      text-align: center;
    }

    .menu a {
      display: block;
      padding: 12px;
      margin-bottom: 8px;
      color: #cbd5e1;
      text-decoration: none;
      border-radius: 6px;
      transition: 0.2s;
    }

    .menu a:hover,
    .menu a.active {
      background: #2563eb;
      color: #fff;
    }

    /* MAIN */
    .main {
      margin-left: 240px;
      width: calc(100% - 240px);
    }

    /* TOPBAR */
    .topbar {
      background: #fff;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #e5e7eb;
    }

    .topbar h3 {
      font-size: 18px;
    }

    /* CONTENT */
    .content {
      padding: 25px;
    }

    /* CARDS */
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .card h4 {
      font-size: 14px;
      color: #64748b;
    }

    .card p {
      font-size: 22px;
      font-weight: bold;
      margin-top: 5px;
    }

    /* TABLE */
    .table-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #e5e7eb;
      text-align: left;
      font-size: 14px;
    }

    th {
      background: #f1f5f9;
    }

    .badge {
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 12px;
      color: #fff;
    }

    .success {
      background: #22c55e;
    }

    .secondary {
      background: #94a3b8;
    }

    .btn {
      padding: 6px 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 12px;
    }

    .edit {
      background: #2563eb;
      color: #fff;
    }

    .delete {
      background: #ef4444;
      color: #fff;
    }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <div class="menu">
      <a href="#" class="active">Dashboard</a>
      <a href="#">Unit</a>
      <a href="#">Penyewa</a>
      <a href="#">Sewa</a>
      <a href="#">Pembayaran</a>
      <a href="#">Pengeluaran</a>
      <a href="{{ route('logout') }}">Logout</a>
    </div>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
      <h3>Sistem Pendataan Kios & Kontrakan</h3>
      <span>Admin</span>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <!-- CARDS -->
      <div class="cards">
        <div class="card">
          <h4>Total Unit</h4>
          <p>20</p>
        </div>
        <div class="card">
          <h4>Disewa</h4>
          <p>14</p>
        </div>
        <div class="card">
          <h4>Kosong</h4>
          <p>6</p>
        </div>
        <div class="card">
          <h4>Pemasukan Bulan Ini</h4>
          <p>Rp 12 jt</p>
        </div>
      </div>

      <!-- TABLE -->
      <div class="table-box">
        <h4>Data Unit</h4>
        <table>
          <thead>
            <tr>
              <th>Nama Unit</th>
              <th>Tipe</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>A1</td>
              <td>Kios</td>
              <td>Rp 1.500.000</td>
              <td><span class="badge success">Disewa</span></td>
              <td>
                <button class="btn edit">Edit</button>
                <button class="btn delete" onclick="hapus()">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>B2</td>
              <td>Kontrakan</td>
              <td>Rp 1.000.000</td>
              <td><span class="badge secondary">Kosong</span></td>
              <td>
                <button class="btn edit">Edit</button>
                <button class="btn delete" onclick="hapus()">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <script>
    function hapus() {
      if (confirm("Yakin mau hapus data ini?")) {
        alert("Data dihapus (dummy)");
      }
    }
  </script>

</body>
</html>
