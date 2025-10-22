<div>
  @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')

  <ol class="breadcrumb fs-4 mb-4 bg-transparent p-0" aria-label="breadcrumbs">
      <li class="breadcrumb-item text-muted active" aria-current="page">
          <i class="fas fa-tachometer-alt me-2"></i>Dashboard
      </li>
  </ol>

  <div class="row justify-content-center">
      <!-- Drivers per Barangay -->
      <div class="col-sm-6 col-md-5 col-lg-4 mb-4">
          <div class="card border-0 shadow-lg rounded-4 h-100 hover-shadow transition">
              <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                  <div>
                      <div class="d-flex align-items-center justify-content-center mb-3">
                          <div class="icon bg-primary text-white rounded-circle p-3 shadow-sm">
                              <i class="fas fa-user-shield fs-3"></i>
                          </div>
                      </div>
                      <h5 class="card-title fw-bold text-dark mb-3">Drivers per Barangay</h5>
                  </div>
                  <div class="chart-container mx-auto" style="position: relative; height: 350px; width: 100%;">
                      <canvas id="barangaydriver"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="row justify-content-center">
      <!-- Sorted Garbage per Barangay (Stacked by Type) -->
      <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
          <div class="card border-0 shadow-lg rounded-4 h-100 hover-shadow transition">
              <div class="card-body text-center p-4">
                  <h5 class="card-title fw-bold text-dark mb-3">Sorted Garbage per Barangay (by Type)</h5>
                  <div class="chart-container mx-auto" style="position: relative; height: 400px; width: 100%;">
                      <canvas id="sortedbarangaygarbage"></canvas>
                  </div>
              </div>
          </div>
      </div>

      <!-- Total Sorted Garbage per Barangay -->
      <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
          <div class="card border-0 shadow-lg rounded-4 h-100 hover-shadow transition">
              <div class="card-body text-center p-4">
                  <h5 class="card-title fw-bold text-dark mb-3">Total Sorted Garbage per Barangay</h5>
                  <div class="chart-container mx-auto" style="position: relative; height: 400px; width: 100%;">
                      <canvas id="sortedbarangaygarbage_total"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
  <script src="https://kit.fontawesome.com/a2e0b2d5a1.js" crossorigin="anonymous"></script>

  <script>
      // === Drivers per Barangay (Pie Chart) ===
      const barangayLabels = @json($barangays);
      const driverCounts = @json($totals);
      const colors = [
          "#1E88E5", "#43A047", "#FB8C00", "#E53935", "#8E24AA",
          "#00ACC1", "#FDD835", "#7CB342", "#5E35B1", "#D81B60"
      ];

      const labeledBarangays = barangayLabels.map((label, i) => `${label} (${driverCounts[i]})`);

      new Chart(document.getElementById('barangaydriver'), {
          type: "pie",
          data: {
              labels: labeledBarangays,
              datasets: [{
                  backgroundColor: colors,
                  data: driverCounts,
                  borderWidth: 2,
                  borderColor: "#fff"
              }]
          },
          options: {
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      position: "bottom",
                      labels: { color: "#333", font: { size: 14 } }
                  },
                  title: {
                      display: true,
                      text: "Number of Drivers per Barangay",
                      color: "#111",
                      font: { size: 16, weight: 'bold' }
                  }
              }
          }
      });


      // === Sorted Garbage per Barangay (Stacked by Type) ===
      const sortedLabels = @json($sortedBarangays);
      const sortedDatasets = @json($sortedDatasets);

      new Chart(document.getElementById('sortedbarangaygarbage'), {
          type: 'bar',
          data: { labels: sortedLabels, datasets: sortedDatasets },
          options: {
              maintainAspectRatio:false,
              responsive:true,
              scales: {
                  y: { beginAtZero:true, stacked: true },
                  x: { stacked: true }
              },
              plugins: {
                  legend: { position: 'bottom' },
                  title: { display: true, text: 'Sorted Garbage (kg) per Barangay by Type' }
              }
          },
          plugins: [ChartDataLabels]
      });

      // === Total Sorted Garbage per Barangay (Single Total) ===
      const sortedTotals = @json($sortedTotals);

      new Chart(document.getElementById('sortedbarangaygarbage_total'), {
        type: 'bar',
        data: {
          labels: sortedLabels,
          datasets: [{
            label: 'Total Sorted Garbage (kg)',
            data: sortedTotals,
            backgroundColor: '#1E88E5',
            borderRadius: 10,
            borderSkipped: false
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: { y: { beginAtZero: true } },
          plugins: {
            legend: { position: 'bottom' },
            title: {
              display: true,
              text: 'Total Sorted Garbage per Barangay'
            }
          }
        },
        plugins: [ChartDataLabels]
      });
  </script>

  <style>
      .hover-shadow:hover {
          transform: translateY(-5px);
          box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
      }
      .transition {
          transition: all 0.3s ease-in-out;
      }
  </style>
  @endpush
</div>
