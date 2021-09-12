<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand mr-4" href="#">
              <x-poli-umum-svg />
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
            <ul class="navbar-nav ml-auto align-items-baseline">
                <!-- Teams Dropdown -->
                <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            <x-infromasi-svg />
                            Informasi
                           <svg width="14pt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">

                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('inputpasien.rujukan') }}">
                                {{ __('Rujukan Apotek') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>


            </ul>
        </div>
    </div>
    </div>

</nav>

