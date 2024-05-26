@if(session('success'))
<script>
Swal.fire({
title: "Berhasil!",
imageUrl: 'img/success.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
imageHeight: 250, // Lebar gambar dalam piksel
text: "{{ session('success') }}!",
});
</script>
@endif

@if(session('fail'))
  <script>
  Swal.fire({
  title: "Gagal!",
  // icon: "success"
  imageUrl: 'img/no-input.png', // Ganti 'link_ke_gambar.jpg' dengan URL gambar yang ingin Anda tampilkan
  imageHeight: 250, // Lebar gambar dalam piksel
  text: "{{ session('fail') }}!",
  });
  </script>
@endif


{{-- <div class="position-absolute notif">
  <div class="alert alert-success alert-dismissible" role="alert">
      <div><i class="fa-solid fa-check me-2"></i><strong>Berhasil </strong>{!! session('success') !!}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div> --}}