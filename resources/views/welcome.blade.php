<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <h1>Welcome</h1>

    <a href="#" class="category-link" data-category="slug_1">Sport</a><br>
    <a href="#" class="category-link" data-category="category-2">Science</a><br>
    <!-- Tambahkan tautan untuk kategori lainnya -->

    <div id="category-content">
        @include('version2.frontend.layout.partials.category-content')
    </div>

    <script>
        $(document).ready(function() {
            // Menangani klik pada tautan kategori
            $('.category-link').click(function(e) {
                e.preventDefault(); // Mencegah tindakan standar dari tautan

                var category = $(this).data('category'); // Mendapatkan kategori dari atribut data-category

                // Mengirim permintaan AJAX untuk mengambil data kategori
                $.ajax({
                    url: '/partial/category/' + category,
                    type: 'GET',
                    success: function(response) {
                         // Hapus konten kategori yang sudah ada sebelum menambahkan konten baru
                        // $('#category-content').empty();
                        // Memperbarui konten kategori dengan data yang diterima dari server
                        $('#category-content').html(response);
                        // $('#category-content').html($(response).find('#category-content').html());
                    }
                });
            });
        });
    </script>

</body>
</html>
