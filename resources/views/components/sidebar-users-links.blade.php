<li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseUtilities"
            aria-expanded="true"
            aria-controls="collapseUtilities"
          >
            <i class="fas fa-users"></i>
            <span>Użytkownicy</span>
          </a>
          <div
            id="collapseUtilities"
            class="collapse"
            aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Zarządzanie:</h6>
              <a class="collapse-item" href="{{route('users.index')}}">Lista wszystkich</a>
              <a class="collapse-item" href="utilities-border.html">Administratorzy</a>
              <a class="collapse-item" href="utilities-animation.html"
                >Przydziel role</a
              >
            </div>
          </div>
        </li>