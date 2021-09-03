<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand mr-4" href="#">
              <x-poli-gudang-svg />
        </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <x-jet-nav-link href="#" class="font-weight-bold h5 mt-1">
                    {{ $slot }}
                </x-jet-nav-link>
            </ul>

            <!-- Right Side Of Navbar -->

        </div>
    </div>
    </div>

</nav>

