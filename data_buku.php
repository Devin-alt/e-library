<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku - e-Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
      /* --- Variable Definitions --- */
      :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
        --glass-bg: rgba(255, 255, 255, 0.1);
        --glass-border: rgba(255, 255, 255, 0.2);
        --shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        --shadow-hover: 0 12px 40px rgba(0, 0, 0, 0.15);
        --text-light: rgba(255, 255, 255, 0.9);
        --text-muted: rgba(255, 255, 255, 0.7);
        --highlight-color: #ffd700; /* Gold-like color for highlights */
      }

      /* --- Global Resets & Body Styling --- */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        background: var(--primary-gradient);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: relative;
        overflow-x: hidden;
        color: var(--text-light); /* Set base text color */
      }

      body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        pointer-events: none;
        z-index: -1;
      }

      /* --- Navbar Styling --- */
      .navbar {
        background: var(--glass-bg) !important;
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--glass-border);
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
      }

      .navbar-brand {
        font-weight: 700;
        font-size: 1.8rem;
        color: white !important;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
      }

      .navbar-brand i {
        margin-right: 10px;
        color: var(--highlight-color);
      }

      .nav-link {
        color: var(--text-light) !important;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
      }

      .nav-link:hover {
        color: white !important;
        transform: translateY(-2px);
      }

      .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--highlight-color), #ffed4e);
        transition: all 0.3s ease;
        transform: translateX(-50%);
      }

      .nav-link:hover::after {
        width: 100%;
      }

      .dropdown-menu {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        box-shadow: var(--shadow);
        border-radius: 15px;
        overflow: hidden;
      }

      .dropdown-item {
        color: var(--text-light);
        transition: all 0.3s ease;
        padding: 12px 20px;
      }

      .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        transform: translateX(5px);
      }

      /* --- Main Content Area --- */
      .main-content {
        margin-top: 100px;
        padding: 2rem 0;
      }

      /* --- Page Header Styling --- */
      .page-header {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        box-shadow: var(--shadow);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
      }

      .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: float 20s linear infinite;
        opacity: 0.5;
      }

      @keyframes float {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
      }

      .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #fff, var(--highlight-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
      }

      .page-subtitle {
        color: var(--text-muted);
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
      }

      /* --- Glass Card Styling (General Card Look) --- */
      .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        box-shadow: var(--shadow);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
      }

      .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
      }

      /* --- Action Bar (Add Button and Search) --- */
      .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        gap: 1rem;
        flex-wrap: wrap;
      }

      /* --- Modern Button Styling (General Purpose Button) --- */
      .modern-btn {
        background: var(--primary-gradient); /* Consistent with body background for primary action */
        border: none;
        border-radius: 25px;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .modern-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
      }

      .modern-btn:hover::before {
        left: 100%;
      }

      .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        color: white;
        text-decoration: none;
      }

      /* --- Specific Button Overrides (Warning and Danger) --- */
      .btn-warning {
        background: var(--warning-gradient);
        border: none;
        border-radius: 20px;
        padding: 8px 20px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        color: white;
      }

      .btn-danger {
        background: var(--danger-gradient);
        border: none;
        border-radius: 20px;
        padding: 8px 20px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        color: white;
      }

      /* --- Search Form Styling --- */
      .search-form {
        display: flex;
        gap: 10px;
        align-items: center;
      }

      .search-input {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: 25px;
        padding: 10px 20px;
        color: white;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        min-width: 250px;
      }

      .search-input:focus {
        outline: none;
        border-color: var(--highlight-color);
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
        color: white;
        background: var(--glass-bg);
      }

      .search-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
      }

      /* --- Modern Table Styling --- */
      .modern-table {
        background: var(--glass-bg); /* This is the outer container background */
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
      }

      .modern-table table {
        margin: 0;
        /* Ensure the table itself has no solid background */
        background: transparent;
        width: 100%; /* Ensure table takes full width of its container */
      }

      .modern-table th {
        /* Header cells */
        background: rgba(255, 255, 255, 0.15); /* Slightly more opaque for headers */
        color: var(--highlight-color);
        font-weight: 700;
        text-align: center;
        padding: 1rem;
        border: none;
        border-bottom: 1px solid var(--glass-border);
      }

      .modern-table td {
        /* Data cells - THIS IS THE KEY FIX */
        background: rgba(255, 255, 255, 0.05); /* Very subtle translucent background */
        color: var(--text-light);
        padding: 1rem;
        text-align: center;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        vertical-align: middle; /* Align cell content vertically */
      }

      /* Ensure no border for the last row's cells */
      .modern-table tr:last-child td {
        border-bottom: none;
      }

      .modern-table tr:hover td {
        /* Hover effect for data cells */
        background: rgba(255, 255, 255, 0.1); /* Slightly more visible on hover */
        transform: scale(1.01); /* Subtle grow effect */
      }

      /* --- Modal Styling --- */
      .modal-content {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        box-shadow: var(--shadow);
      }

      .modal-header {
        background: rgba(255, 255, 255, 0.1);
        border-bottom: 1px solid var(--glass-border);
        border-radius: 20px 20px 0 0;
        color: white;
      }

      .modal-title {
        font-weight: 700;
        color: var(--highlight-color);
      }

      .modal-body {
        color: white;
      }

      .form-control {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: 15px;
        padding: 12px 20px;
        color: white;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
      }

      .form-control:focus {
        background: var(--glass-bg);
        border-color: var(--highlight-color);
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
        color: white;
      }

      .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
      }

      .form-label {
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 8px;
      }

      .btn-close { /* Targeting Bootstrap's close button for modal */
        filter: invert(1); /* Makes the X icon white */
        opacity: 0.8;
        transition: all 0.3s ease;
      }

      .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
      }

      /* --- Footer Styling --- */
      .footer {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border-top: 1px solid var(--glass-border);
        color: var(--text-light);
        text-align: center;
        padding: 2rem 0;
        margin-top: 4rem;
      }

      .footer-content {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
      }

      .footer-text {
        font-weight: 600;
        font-size: 1.1rem;
      }

      .footer-links {
        display: flex;
        gap: 1rem;
      }

      .footer-link {
        color: var(--text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        padding: 0.5rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .footer-link:hover {
        color: var(--highlight-color);
        transform: translateY(-3px);
        background: rgba(255, 215, 0, 0.2);
      }

      /* --- Stats Card Styling --- */
      .stats-card {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 215, 0, 0.05));
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 2rem;
        transition: all 0.3s ease; /* Added hover effect */
        box-shadow: var(--shadow);
      }

      .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
      }

      .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--highlight-color);
        margin-bottom: 0.5rem;
      }

      .stats-label {
        color: var(--text-muted);
        font-weight: 600;
      }

      /* --- Responsive Adjustments --- */
      @media (max-width: 768px) {
        .page-title {
          font-size: 2rem;
        }
        
        .action-bar {
          flex-direction: column;
          align-items: stretch;
        }
        
        .search-form {
          flex-direction: column;
          gap: 15px;
        }
        
        .search-input {
          min-width: 100%;
        }
        
        .modern-table {
          overflow-x: auto; /* Allows horizontal scrolling on small screens for tables */
        }

        .modern-table table {
          min-width: 700px; /* Ensures table columns don't get too squished */
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">
            <i class="fas fa-book-open"></i>e-Library
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="template.html">
                  <i class="fas fa-home me-2"></i>Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-bars me-2"></i>Menu
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="data_buku.php"><i class="fas fa-book me-2"></i>Buku</a></li>
                  <li><a class="dropdown-item" href="data_penulis.php"><i class="fas fa-pen me-2"></i>Penulis</a></li>
                  <li><a class="dropdown-item" href="data_penerbit.php"><i class="fas fa-building me-2"></i>Penerbit</a></li>
                  <li><a class="dropdown-item" href="data_kategori.php"><i class="fas fa-tags me-2"></i>Kategori</a></li>
                  <li><a class="dropdown-item" href="data_peminjaman.php"><i class="fas fa-hand-holding me-2"></i>Peminjaman</a></li>
                  <li><a class="dropdown-item" href="data_pengembalian.php"><i class="fas fa-undo me-2"></i>Pengembalian</a></li>
                  <li><a class="dropdown-item" href="data_mahasiswa.php"><i class="fas fa-user-graduate me-2"></i>Mahasiswa</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="data_admin.php">
                  <i class="fas fa-user-shield me-2"></i>Admin
                </a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="main-content">
      <div class="container">
        <div class="page-header">
          <h1 class="page-title">
            <i class="fas fa-book me-3"></i>Data Buku
          </h1>
          <p class="page-subtitle">Kelola dan pantau koleksi buku perpustakaan</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="stats-card">
              <div class="stats-number" id="totalBooks">147</div>
              <div class="stats-label">Total Buku Tersedia</div>
            </div>
          </div>
        </div>

        <div class="glass-card">
          <div class="action-bar">
            <div>
              <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="fas fa-plus"></i>
                Tambah Buku
              </button>
            </div>
            <div class="search-form">
              <input type="text" class="search-input" placeholder="Cari berdasarkan judul buku..." id="searchInput">
              <button class="modern-btn" onclick="searchBooks()">
                <i class="fas fa-search"></i>
                Cari
              </button>
            </div>
          </div>

          <div class="modern-table">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Buku</th>
                  <th>ISBN</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Kategori</th>
                  <th>Tahun</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="bookTableBody">
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">
              <i class="fas fa-plus me-2"></i>Tambah Data Buku
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="id_buku" class="form-label">ID Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" required placeholder="Masukkan ID buku">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required placeholder="Contoh: 978-0-123456-78-9">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required placeholder="Masukkan judul buku">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="id_penulis" class="form-label">Penulis</label>
                    <select class="form-control" id="id_penulis" name="id_penulis" required>
                      <option value="">Pilih Penulis</option>
                      <option value="1">John Doe</option>
                      <option value="2">Jane Smith</option>
                      <option value="3">Mike Johnson</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="id_penerbit" class="form-label">Penerbit</label>
                    <select class="form-control" id="id_penerbit" name="id_penerbit" required>
                      <option value="">Pilih Penerbit</option>
                      <option value="1">Tech Publisher</option>
                      <option value="2">Edu Press</option>
                      <option value="3">Data Books</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select class="form-control" id="id_kategori" name="id_kategori" required>
                      <option value="">Pilih Kategori</option>
                      <option value="1">Teknologi</option>
                      <option value="2">Komputer</option>
                      <option value="3">Database</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required placeholder="Contoh: 2023" min="1900" max="2025">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Stok</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="0" min="0">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times me-2"></i>Batal
              </button>
              <button type="submit" name="tambah" class="modern-btn">
                <i class="fas fa-save me-2"></i>Simpan Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-text">
            <i class="fas fa-book-open me-2"></i>e-Library © 2024
          </div>
          <div class="footer-links">
            <a href="#" class="footer-link" title="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="footer-link" title="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="footer-link" title="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="footer-link" title="LinkedIn">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
      // Sample data for demonstration
      const booksData = [
        {
          id: 1,
          id_buku: "BK001",
          isbn: "978-0-123456-78-9",
          judul: "Pemrograman Web Modern",
          penulis: "John Doe",
          penerbit: "Tech Publisher",
          kategori: "Teknologi",
          tahun_terbit: 2023,
          stok: 5,
        },
        {
          id: 2,
          id_buku: "BK002",
          isbn: "978-0-987654-32-1",
          judul: "Algoritma dan Struktur Data",
          penulis: "Jane Smith",
          penerbit: "Edu Press",
          kategori: "Komputer",
          tahun_terbit: 2022,
          stok: 3,
        },
        {
          id: 3,
          id_buku: "BK003",
          isbn: "978-0-456789-01-2",
          judul: "Database Design Fundamentals",
          penulis: "Mike Johnson",
          penerbit: "Data Books",
          kategori: "Database",
          tahun_terbit: 2023,
          stok: 7,
        },
        {
          id: 4,
          id_buku: "BK004",
          isbn: "978-1-234567-89-0",
          judul: "Sistem Operasi Lanjut",
          penulis: "Alice Wonderland",
          penerbit: "Logic Press",
          kategori: "Sistem",
          tahun_terbit: 2021,
          stok: 2,
        },
        {
          id: 5,
          id_buku: "BK005",
          isbn: "978-9-876543-21-0",
          judul: "Jaringan Komputer Essensial",
          penulis: "Bob Builder",
          penerbit: "NetWorks",
          kategori: "Jaringan",
          tahun_terbit: 2024,
          stok: 8,
        },
      ];

      function renderTable(data) {
        const tableBody = document.getElementById('bookTableBody');
        tableBody.innerHTML = ''; // Clear existing rows
        if (data.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="10" class="text-center py-4">Tidak ada data buku ditemukan.</td></tr>`;
        } else {
            data.forEach((book, index) => {
                const row = `
                    <tr>
                    <td>${index + 1}</td>
                    <td>${book.id_buku}</td>
                    <td>${book.isbn}</td>
                    <td>${book.judul}</td>
                    <td>${book.penulis}</td>
                    <td>${book.penerbit}</td>
                    <td>${book.kategori}</td>
                    <td>${book.tahun_terbit}</td>
                    <td>${book.stok}</td>
                    <td>
                        <button class="btn btn-warning btn-sm me-2" title="Edit Buku" onclick="editBook(${book.id})">
                        <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" title="Hapus Buku" onclick="deleteBook(${book.id})">
                        <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }
        document.getElementById('totalBooks').innerText = data.length; // Update total books count
      }

      function searchBooks() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const filteredBooks = booksData.filter(book => 
          book.judul.toLowerCase().includes(searchTerm) ||
          book.id_buku.toLowerCase().includes(searchTerm) ||
          book.isbn.toLowerCase().includes(searchTerm) ||
          book.penulis.toLowerCase().includes(searchTerm) ||
          book.penerbit.toLowerCase().includes(searchTerm) ||
          book.kategori.toLowerCase().includes(searchTerm)
        );
        renderTable(filteredBooks);
      }

      function editBook(bookId) {
        // In a real application, you'd fetch book data by ID and populate an edit modal
        alert('Edit book with ID: ' + bookId + '. (Fungsi ini belum terimplementasi penuh untuk demo.)');
        // Example: You would open a modal with the book's current data pre-filled
        // $('#editModal').modal('show');
      }

      function deleteBook(bookId) {
        if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
          // In a real application, you'd send an AJAX request to delete the book
          alert('Deleting book with ID: ' + bookId + '. (Fungsi ini belum terimplementasi penuh untuk demo.)');
          // For demonstration, let's remove it from the sample data
          const index = booksData.findIndex(book => book.id === bookId);
          if (index > -1) {
            booksData.splice(index, 1);
            renderTable(booksData); // Re-render table after deletion
          }
        }
      }

      // Initial render of the table when the page loads
      document.addEventListener('DOMContentLoaded', () => {
        renderTable(booksData);
      });
    </script>
  </body>
</html>