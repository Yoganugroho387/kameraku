<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <title>KAMERAKU_ID</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <?php include 'temp/header.html'; ?>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          FORMULIR PENYEWAAN 
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_containe">
          <form action="proses_sewa.php" method="POST" enctype="multipart/form-data">
            
            <!-- Nama Pengguna -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- No. Telepon -->
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" required>
            </div>

            <!-- Kamera yang disewa -->
            <div class="mb-3">
                <label for="kamera" class="form-label">Pilih Kamera</label>
                <select class="form-select" id="kamera" name="kamera" required>
                    <option value="" disabled selected>Pilih Kamera</option>
                    <option value="EOS 5D Mark IV kit">EOS 5D Mark IV kit</option>
                    <option value="EOS R50">EOS R50</option>
                    <option value="EOS R100">EOS R100</option>
                    <option value="EOS R1">EOS R1</option>
                    <option value="EOS 200d">EOS 200d</option>
                    <option value="EOS 1500D">EOS 1500D</option>
                </select>
            </div>

            <!-- Tanggal Sewa -->
            <div class="mb-3">
                <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
            </div>

            <!-- Durasi Sewa -->
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Sewa (Hari)</label>
                <input type="number" class="form-control" id="durasi" name="durasi" min="1" required>
            </div>

            <!-- Pilihan Paket -->
            <div class="mb-3">
                <label class="form-label">Pilih Paket Sewa</label>
                <div>
                    <input type="radio" id="paket1" name="paket" value="Paket Standar" required>
                    <label for="paket1">Paket Basic</label><br>
                    <input type="radio" id="paket2" name="paket" value="Paket Premium">
                    <label for="paket2">Paket Pro</label><br>
                    <input type="radio" id="paket3" name="paket" value="Paket Ultra">
                    <label for="paket3">Paket Ultimate</label>
                </div>
            </div>

            <!-- Fitur Tambahan -->
            <div class="mb-3">
                <label class="form-label">Pilih Fitur Tambahan</label><br>
                <input type="checkbox" id="fitur1" name="fitur[]" value="Tripod">
                <label for="fitur1">Tripod</label><br>
                <input type="checkbox" id="fitur2" name="fitur[]" value="Memory Card">
                <label for="fitur2">Memory Card</label><br>
                <input type="checkbox" id="fitur3" name="fitur[]" value="Lensa Tambahan">
                <label for="fitur3">Lensa Tambahan</label><br>
            </div>
            <!-- Pesan tambahan -->
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan atau Permintaan Khusus</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" class="btn btn-primary">Kirim Permintaan Sewa</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->

  <?php include 'temp/info.html'; ?>

  <!-- end info section -->


  <!-- footer section -->
  <?php include 'temp/footer.html'; ?>
  <!-- footer section -->
  <script>
    document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Mencegah form melakukan submit default
        
        // Ambil data dari form
        const nama = document.getElementById("nama").value;
        const email = document.getElementById("email").value;
        const telepon = document.getElementById("telepon").value;
        const kamera = document.getElementById("kamera").value;
        const tanggalSewa = document.getElementById("tanggal_sewa").value;
        const durasi = document.getElementById("durasi").value;
        const paket = document.querySelector('input[name="paket"]:checked').value;
        const fiturNodes = document.querySelectorAll('input[name="fitur[]"]:checked');
        const fitur = Array.from(fiturNodes).map((node) => node.value).join(", ");
        const pesanTambahan = document.getElementById("pesan").value;

        // Susun pesan untuk WhatsApp
        const pesan = `Halo, saya ingin menyewa kamera di KAMERAKU_ID dengan rincian berikut:
- Nama: ${nama}
- Email: ${email}
- No. Telepon: ${telepon}
- Kamera yang Dipilih: ${kamera}
- Tanggal Sewa: ${tanggalSewa}
- Durasi Sewa: ${durasi} hari
- Paket yang Dipilih: ${paket}
- Fitur Tambahan: ${fitur || "Tidak ada"}
- Pesan Tambahan: ${pesanTambahan || "Tidak ada"}
        
Terima kasih!`;

        // Nomor WhatsApp tujuan (ganti dengan nomor Anda)
        const nomorWA = "6289685027530"; // Gunakan format internasional tanpa "+".

        // Redirect ke WhatsApp
        const urlWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
        window.open(urlWA, "_blank");
    });
</script>

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>