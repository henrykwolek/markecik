<li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo"
          >
            <i class="fas fa-paste"></i>
            <span>Ogłoszenia</span>
          </a>
          <div
            id="collapseTwo"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Akcje:</h6>
              <a class="collapse-item" href="{{route('post.index')}}">Przeglądaj</a>
              <a class="collapse-item" href="{{route('post.create')}}">Nowe ogłoszenie</a>
            </div>
          </div>
        </li>