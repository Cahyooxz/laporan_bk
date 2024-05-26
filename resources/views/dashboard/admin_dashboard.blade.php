<div class="container-fluid" data-aos="fade-up">
  {{-- admin /guru --}}
  <div class="row px-3">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between" data-aos="fade-up">
        <h4 class="h4">Selamat Datang admin Di Dashboard SMKN 4 Tangerang</h4>
      </div>
      <div class="row mt-5 d-flex justify-content-start px-0 px-lg-3 px-xl-0 px-xl-1">
        <div class="col-6 col-sm-6 col-md-5 col-xl-4 col-lg-4 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <p class="fw-bold m-0 text-light">SP 1</p>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
            <p class="title-data fw-medium text-secondary">SP 1 </p>
            <h1 class="detail-data fw-bold text-primary-emphasis">{{ $sp1 }}</h1>
            <a href="" class="detail text-secondary">detail murid tekena SP1..</a>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-5 col-xl-4 col-lg-4 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <p class="fw-bold m-0 text-light">SP 2</p>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
            <p class="title-data fw-medium text-secondary">SP 2</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">{{ $sp2 }}</h1>
            <a href="" class="detail text-secondary">detail murid tekena SP2..</a>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-5 col-xl-4 col-lg-4 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <p class="fw-bold m-0 text-light">SP 3</p>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
            <p class="title-data fw-medium text-secondary">SP 3</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">{{ $sp3 }}</h1>
            <a href="" class="detail text-secondary">detail murid tekena SP3..</a>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        {{-- chart grafik data karir --}}
        <div class="col-12 col-md-7">
          <div class="card p-3">
            <h4 class="mb-5 mt-2">Presentase Data Siswa</h4>
            <div class="d-flex justify-content-center align-items-center">
              <canvas id="myChart" class="h-100 w-100"></canvas>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-5 mt-3 mt-md-0">
          <div class="card p-3">
          <h4 class="mb-5 mt-2">Presentase Data Siswa</h4>
          <div class="d-flex justify-content-center align-items-center">
            <div class="w-75">
              <canvas id="doughnut-chart"></canvas>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const ctx = document.getElementById('myChart');
  var sp1 = {{ $sp1 }} 
  var sp2 = {{ $sp2 }} 
  var sp3 = {{ $sp3 }} 
  var total = sp1 + sp2 + sp3;
  persen_sp1 = (sp1 / total *100).toFixed(2);
  persen_sp2 = (sp2 / total *100).toFixed(2);
  persen_sp3 = (sp3 / total *100).toFixed(2);

  new Chart(ctx, {
    type: 'bar',

    data: {
      
      labels: ['Terkena SP1 '+persen_sp1+'%', 'Terkena SP2 '+persen_sp2+'%', 'Terkena SP3 '+persen_sp3+'%' ],
      datasets: [{
        label: 'Presentase Surat Peringatan',
        data: [sp1, sp2,sp3],
        backgroundColor: [
          '#fff3cd',
          '#ffeac7',
          '#ffb3ba',
        ],
        borderColor: [
          '#ffe69c',
          '#ffeac7',
          '#ff6f69',
        ],
          borderWidth: 1,
        }]
    },
    options: {
      plugins: {
      },
      scales: {
        x: {
          title: {
            display: true, 
            text: 'Presentase Surat Peringatan'
          },
        },
        y: {
          title: {
            display: true,
            text: 'Jumlah Surat Peringatan'
          },
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
    new Chart(document.getElementById("doughnut-chart"), {
      type: 'doughnut',
      data: {
        labels: ['Terkena SP1 '+persen_sp1+'%', 'Terkena SP2 '+persen_sp2+'%', 'Terkena SP3 '+persen_sp3+'%' ],
        datasets: [
          {
            label: 'Presentase Surat Peringatan',
            data: [sp1, sp2,sp3],
            backgroundColor: [
            '#fff3cd',
            '#ffeac7',
            '#ffb3ba',
            ],
            borderColor: [
              '#ffe69c',
              '#ffeac7',
              '#ff6f69',
            ],
          borderWidth: 1,
        }]
      },
      options: {
        title: {
          display: true,
        }
      }
  });
</script>