<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/chart.js/chart.min.js"></script>
<script src="/vendor/echarts/echarts.min.js"></script>
<script src="/vendor/quill/quill.min.js"></script>
<script src="/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/vendor/tinymce/tinymce.min.js"></script>
<script src="/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/js/main.js"></script>
<script src="/js/k1.js"></script>

{{-- <script>
    // Mendeteksi event onkeyup pada textbox id
    document.getElementById('No_Nominatif').onkeyup = function() {
        // Ambil nilai dari textbox id
        let id = this.value;

        // Kirim request GET ke route /check-id/{id} untuk melakukan validasi
        axios.get('/check-id/' + id)
            .then(function(response) {
                // Jika data sudah ada, tampilkan alert
                if (response.data.status === 'exist') {
                    alert('ID sudah ada');
                }
            });
    };
</script> --}}

<script>
    $(document).ready(function() {
        $("No_Nominatif").on("keyup", function() {
            var id = $(this).val();

            // Kirim permintaan AJAX
            $.ajax({
                url: "/check-id/" + id,
                type: "GET",
                success: function(response) {
                    // Jika ID sudah ada
                    if (response.data.status === 'exist') {
                        alert("ID sudah ada!");
                    }
                }
            });
        });
    });
</script>
