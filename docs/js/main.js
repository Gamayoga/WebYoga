function hitung() {
    //mengambil nilai dari input tujuan (itujuan)
    const itujuan = document.getElementById('itujuan').value;
    //mengambil nilai dari input jumlah (ijumlah) dan dikonversi menjadi integer
    const ijumlah = parseInt(document.getElementById('ijumlah').value);
    //membuat variabel total dengan nilai 0
    let total = 0;

    //menghitung total sesuai dengan tujuan yang dipilih
    switch (itujuan) {
        case 'studi':   
            //jika tujuan adalah studi, kalikan jumlah dengan 15000
            total = 15000 * ijumlah;
            break;
        case 'rekreasi':
            //jika tujuan adalah studi, kalikan jumlah dengan 20000
            total = 20000 * ijumlah;
            break;
        case 'riset':
            //jika tujuan adalah studi, kalikan jumlah dengan 25000
            total = 25000 * ijumlah;
            break;
        default:
            //jika tidak ada tujuan yang dipilih, total menjadi 0
            total = 0;
            break;
    }

    //memeriksa member
    const isMember = document.querySelector('input[name="imember"]:checked').value === 'ya';
    //jika member, mendapat diskon 10%
    if (isMember) {
        total *= 0.9;
    }

    //menampilkan total harga di elemen html dengan id 'totalharga'
    document.getElementById('totalharga').textContent = `Total Harga : Rp ${total}`;
}