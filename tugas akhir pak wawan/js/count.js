document.addEventListener("DOMContentLoaded", function () {
    const jumlahInput = document.getElementById("jumlah");
    const hargaInput = document.getElementById("harga");
    const totalHargaInput = document.getElementById("total_harga");

    function hitungTotal() {
        const jumlah = parseInt(jumlahInput.value) || 0;
        const harga = parseInt(hargaInput.value) || 0;
        const total = jumlah * harga;
        totalHargaInput.value = total;
    }

    jumlahInput.addEventListener("input", hitungTotal);
    hitungTotal();
});

