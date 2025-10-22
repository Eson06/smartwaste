<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Segregation Guidelines')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Segregation Guidelines</li>
    </ol>

    <div class="container my-5">
      <h1 class="text-center text-success mb-4">
        <i class="fas fa-recycle me-2"></i> Waste Segregation Guidelines
      </h1>
      <p class="text-muted text-center mb-5">
        Proper waste segregation helps keep the environment clean, reduces pollution, and promotes recycling. 
        Follow these guidelines to properly separate and dispose of your waste.
      </p>
    
      <div class="row g-4">
        <!-- Biodegradable -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-success shadow-sm h-100 rounded-4">
            <div class="card-body">
              <h4 class="text-success">
                <i class="fas fa-leaf me-2"></i>Biodegradable Waste (Green Bin)
              </h4>
              <p>These wastes decompose naturally and can be turned into compost.</p>
              <ul>
                <li>Fruit and vegetable peels</li>
                <li>Leftover food</li>
                <li>Paper, cardboard, and tissue</li>
                <li>Leaves, grass, and garden clippings</li>
              </ul>
            </div>
          </div>
        </div>
    
        <!-- Non-Biodegradable -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-dark shadow-sm h-100 rounded-4">
            <div class="card-body">
              <h4 class="text-dark">
                <i class="fas fa-trash-alt me-2"></i>Non-Biodegradable Waste (Black Bin)
              </h4>
              <p>These wastes do not decompose easily and can harm the environment.</p>
              <ul>
                <li>Plastic bags and wrappers</li>
                <li>Styrofoam containers</li>
                <li>Broken glass and ceramics</li>
                <li>Metal scraps</li>
              </ul>
            </div>
          </div>
        </div>
    
        <!-- Recyclable -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-primary shadow-sm h-100 rounded-4">
            <div class="card-body">
              <h4 class="text-primary">
                <i class="fas fa-sync-alt me-2"></i>Recyclable Waste (Blue Bin)
              </h4>
              <p>These materials can be collected and processed to create new products.</p>
              <ul>
                <li>Plastic bottles</li>
                <li>Aluminum cans</li>
                <li>Old newspapers</li>
                <li>Cardboard boxes</li>
              </ul>
            </div>
          </div>
        </div>
    
        <!-- Residual -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-secondary shadow-sm h-100 rounded-4">
            <div class="card-body">
              <h4 class="text-secondary">
                <i class="fas fa-ban me-2"></i>Residual Waste (Gray Bin)
              </h4>
              <p>These wastes cannot be reused, recycled, or composted.</p>
              <ul>
                <li>Used diapers and sanitary napkins</li>
                <li>Used tissue papers</li>
                <li>Cigarette butts</li>
                <li>Dirty or contaminated plastics</li>
              </ul>
            </div>
          </div>
        </div>
    
        <!-- Hazardous -->
        <div class="col-md-6 col-lg-4">
          <div class="card border-danger shadow-sm h-100 rounded-4">
            <div class="card-body">
              <h4 class="text-danger">
                <i class="fas fa-biohazard me-2"></i>Hazardous Waste (Red Bin)
              </h4>
              <p>These are harmful wastes that must be handled carefully.</p>
              <ul>
                <li>Batteries</li>
                <li>Old medicines and medical waste</li>
                <li>Chemical containers</li>
                <li>Paints, thinners, and cleaning agents</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Tips -->
      <div class="card shadow-lg border-0 rounded-4 mt-5">
        <div class="card-body p-4">
          <h4 class="text-info"><i class="fas fa-lightbulb me-2"></i>Segregation Tips</h4>
          <ul>
            <li>Label your bins clearly with colors or signs.</li>
            <li>Keep recyclable items clean and dry before disposal.</li>
            <li>Do not mix hazardous waste with other types of waste.</li>
            <li>Compost biodegradable waste if possible.</li>
            <li>Encourage family and community members to practice segregation daily.</li>
          </ul>
          <div class="alert alert-success mt-3 text-center">
            <strong>Remember:</strong> Proper waste segregation starts at home. Small actions lead to a cleaner, healthier environment for everyone.
          </div>
        </div>
      </div>
    </div>
    
    <!-- Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    

</div>
