<?php
    //memeriksa apakah metode permintaan adalah get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //mengambil nilai dari permintaan get
        $nama = $_GET["inama"];
        $jumlah = $_GET["ijumlah"];
        $tanggal = $_GET["itanggal"];
        $tujuan = $_GET["itujuan"];
        //memeriksa apakah 'member' diatur dan nilainya 'ya'
        $member = isset($_GET["member"]) && $_GET["member"] === 'ya';

        //menghitung total sesuai dengan tujuan yang dipilih
        switch ($tujuan) {
            case 'studi':
                $total = 15000 * $jumlah;
                break;
            case 'rekreasi':
                $total = 20000 * $jumlah;
                break;
            case 'riset':
                $total = 25000 * $jumlah;
                break;  
            default:
                $total = 0;
                break;
        }

        //jika member, mendapatkan diskon   
        if ($member) {
            $total *= 0.9;
        }

        //memformat data yang akan disimpan kedalam file
        $data =
        "====================================/n
        Nama : $nama\n
        Jumlah Pengunjung : $jumlah\n
        Tanggal Kunjungan : $tanggal\n
        Tujuan Kunjungan : $tujuang\n
        Member : $member\n
        Total : $total\n
        ====================================";

        //membuka file dalam mode append dan menulis data
        $file = 'DataPemesanan.txt';
        $myfile = fopen($file, "a");
        fwrite($myfile, $data);
        fclose($myfile);

        //menampilkan hasil kepada pengguna
        echo "<h3>Beli Tiket Berhasil</h3>";
        echo "Nama : " . htmlspecialchars($nama) . "<br>";
        echo "Jumlah Pengunjung : " . htmlspecialchars($jumlah) . "<br>";
        echo "Tanggal Kunjungan : " . htmlspecialchars($tanggal) . "<br>";
        echo "Tujuan Kunjungan : " . htmlspecialchars($tujuan) . "<br>";
        echo "Member : " . ($member ? "Ya" : "Tidak") . "<br>";
        echo "Total : Rp " . htmlspecialchars($total) . "<br>";
    }
?>