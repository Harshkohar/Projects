<div class="bg-secondary p-0" style="width:20%;">

      <!-- Brands -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-dark">
          <a href="" class="nav-link text-light">
            <h5>Delivery Brands</h5>
          </a>
        </li>

        <?php
          fetch_brands();
        ?>
      </ul>

      <!-- Categories -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-dark">
          <a href="" class="nav-link text-light">
            <h5>Categories</h5>
          </a>
          <?php
            fetch_categories();
          ?>
      </ul>
    </div>