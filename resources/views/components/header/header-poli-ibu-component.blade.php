<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand mr-4" href="#">
              <x-poli-ibu-svg />
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
                            <x-jet-dropdown-link href="{{ route('proseskehamilan.index') }}">
                                {{ __('Proses Kehamilan Pasien') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>


                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            <svg viewBox="-32 0 432 432" width="13pt" xmlns="http://www.w3.org/2000/svg">
                                <path d="m368.015625 186.351562c-.183594.144532-.421875.273438-.609375.417969-1.8125 1.335938-3.726562 2.636719-5.789062 3.910157-.328126.199218-.6875.390624-1.015626.59375-1.867187 1.101562-3.832031 2.183593-5.882812 3.238281l-1.671875.863281c-2.359375 1.167969-4.800781 2.304688-7.390625 3.410156l-1.527344.621094c-2.273437.945312-4.617187 1.859375-7.03125 2.746094l-1.976562.726562c-2.828125 1.003906-5.742188 1.972656-8.746094 2.914063l-2.023438.605469c-2.617187.800781-5.28125 1.546874-8 2.289062-.71875.191406-1.421874.390625-2.144531.578125-3.199219.847656-6.496093 1.644531-9.894531 2.398437-.800781.183594-1.601562.351563-2.402344.527344-2.941406.65625-5.933594 1.285156-8.972656 1.886719l-2.128906.425781c-3.542969.683594-7.144532 1.324219-10.808594 1.929688-.886719.152344-1.792969.285156-2.6875.429687-3.199219.519531-6.488281 1.015625-9.792969 1.480469l-1.976562.28125c-3.789063.53125-7.621094 1.007812-11.488281 1.429688l-2.910157.320312c-3.542969.386719-7.105469.742188-10.695312 1.074219l-1.457031.136719c-4 .351562-8 .644531-12 .917968l-2.976563.222656c-3.808594.242188-7.621094.449219-11.441406.625l-.949219.046876c-4.082031.175781-8.164062.3125-12.25.402343l-2.992188.0625c-4.117187.082031-8.238281.136719-12.351562.136719-4.109375 0-8.230469-.054688-12.351562-.136719l-2.992188-.0625c-4.089844-.097656-8.171875-.230469-12.246094-.402343l-.953125-.046876c-3.824219-.175781-7.636719-.382812-11.441406-.625l-2.992187-.199218c-4-.269532-8-.566406-12-.917969l-1.453126-.136719c-3.589843-.324218-7.15625-.683594-10.699218-1.074218l-2.910156-.320313c-3.863282-.445313-7.691407-.921875-11.488282-1.429687l-2.007812-.25c-3.304688-.460938-6.558594-.957032-9.792969-1.476563-.894531-.144531-1.800781-.28125-2.6875-.433594-3.660156-.609375-7.261719-1.25-10.808594-1.929687l-2.128906-.421875c-3.039063-.601563-6.03125-1.234375-8.972656-1.890625-.800781-.175782-1.601563-.34375-2.402344-.527344-3.375-.765625-6.671875-1.566406-9.894531-2.398438-.71875-.183593-1.425782-.382812-2.144532-.578124-2.734374-.742188-5.398437-1.503907-8-2.285157l-2.023437-.609375c-3.007813-.9375-5.921875-1.910156-8.746094-2.910156l-1.972656-.730469c-2.417969-.882812-4.761719-1.800781-7.035156-2.742187l-1.527344-.625c-2.574219-1.105469-5.03125-2.238282-7.390625-3.40625l-1.671875-.867188c-2.050781-1.054687-4-2.132812-5.882813-3.238281-.324218-.199219-.6875-.390625-1.015624-.59375-2.0625-1.269531-4-2.574219-5.789063-3.910156-.183594-.144531-.425781-.273438-.609375-.417969v85.59375c0 20.039062 70 48 184 48s184-27.960938 184-48zm0 0"/><path d="m368.015625 298.351562c-.183594.144532-.421875.273438-.609375.417969-1.8125 1.335938-3.726562 2.636719-5.789062 3.910157-.328126.199218-.6875.390624-1.015626.59375-1.867187 1.101562-3.832031 2.183593-5.882812 3.238281l-1.671875.863281c-2.359375 1.167969-4.800781 2.304688-7.390625 3.410156l-1.527344.621094c-2.273437.945312-4.617187 1.859375-7.03125 2.746094l-1.976562.726562c-2.828125 1.003906-5.742188 1.972656-8.746094 2.914063l-2.023438.605469c-2.617187.800781-5.28125 1.546874-8 2.289062-.71875.191406-1.421874.390625-2.144531.578125-3.199219.847656-6.496093 1.644531-9.894531 2.398437-.800781.183594-1.601562.351563-2.402344.527344-2.941406.65625-5.933594 1.285156-8.972656 1.886719l-2.128906.425781c-3.542969.675782-7.144532 1.320313-10.808594 1.929688-.886719.152344-1.792969.285156-2.6875.429687-3.199219.519531-6.488281 1.015625-9.792969 1.480469l-1.976562.28125c-3.789063.53125-7.621094 1.007812-11.488281 1.429688l-2.910157.320312c-3.542969.386719-7.105469.742188-10.695312 1.074219l-1.457031.136719c-4 .351562-8 .644531-12 .917968l-2.976563.222656c-3.808594.242188-7.621094.449219-11.441406.625l-.949219.046876c-4.082031.175781-8.164062.3125-12.25.402343l-2.992188.0625c-4.117187.082031-8.238281.136719-12.351562.136719-4.109375 0-8.230469-.054688-12.351562-.136719l-2.992188-.0625c-4.089844-.097656-8.171875-.230469-12.246094-.402343l-.953125-.046876c-3.824219-.175781-7.636719-.382812-11.441406-.625l-2.992187-.199218c-4-.269532-8-.566406-12-.917969l-1.453126-.136719c-3.589843-.324218-7.15625-.683594-10.699218-1.074218l-2.910156-.320313c-3.863282-.445313-7.691407-.921875-11.488282-1.429687l-2.007812-.25c-3.304688-.460938-6.558594-.957032-9.792969-1.476563-.894531-.144531-1.800781-.28125-2.6875-.433594-3.660156-.609375-7.261719-1.25-10.808594-1.929687l-2.128906-.421875c-3.039063-.597657-6.03125-1.226563-8.972656-1.890625-.800781-.175782-1.601563-.34375-2.402344-.527344-3.375-.765625-6.671875-1.566406-9.894531-2.398438-.71875-.183593-1.425782-.382812-2.144532-.578124-2.734374-.742188-5.398437-1.503907-8-2.285157l-2.023437-.609375c-3.007813-.933594-5.921875-1.902344-8.746094-2.910156l-1.972656-.730469c-2.417969-.882812-4.761719-1.800781-7.035156-2.742187l-1.527344-.625c-2.574219-1.105469-5.03125-2.238282-7.390625-3.40625l-1.671875-.867188c-2.050781-1.054687-4-2.132812-5.882813-3.238281-.324218-.199219-.6875-.390625-1.015624-.59375-2.0625-1.269531-4-2.574219-5.789063-3.910156-.183594-.144531-.425781-.273438-.609375-.417969v85.59375c0 20.039062 70 48 184 48s184-27.960938 184-48zm0 0"/><path d="m368.015625 74.351562c-.183594.144532-.421875.273438-.609375.417969-1.8125 1.335938-3.726562 2.636719-5.789062 3.910157-.328126.199218-.6875.390624-1.015626.59375-1.867187 1.101562-3.832031 2.183593-5.882812 3.199218l-1.671875.863282c-2.359375 1.167968-4.800781 2.304687-7.390625 3.40625l-1.527344.625c-2.273437.945312-4.617187 1.859374-7.03125 2.746093l-1.976562.726563c-2.828125 1.003906-5.742188 1.972656-8.746094 2.914062l-2.023438.605469c-2.617187.800781-5.28125 1.542969-8 2.289063-.71875.191406-1.421874.390624-2.144531.574218-3.199219.847656-6.496093 1.648438-9.894531 2.402344-.800781.183594-1.601562.351562-2.402344.527344-2.941406.65625-5.933594 1.285156-8.972656 1.886718l-2.128906.425782c-3.542969.683594-7.144532 1.324218-10.808594 1.925781-.886719.152344-1.792969.289063-2.6875.433594-3.199219.519531-6.488281 1.015625-9.792969 1.480469l-1.976562.28125c-3.789063.53125-7.621094 1.007812-11.488281 1.429687l-2.910157.320313c-3.542969.382812-7.105469.742187-10.695312 1.070312l-1.457031.136719c-4 .351562-8 .648437-12 .921875l-2.976563.261718c-3.808594.242188-7.621094.449219-11.441406.625l-.949219.046876c-4.082031.175781-8.164062.3125-12.25.402343l-2.992188.0625c-4.117187.082031-8.238281.136719-12.351562.136719-4.109375 0-8.230469-.054688-12.351562-.136719l-2.992188-.0625c-4.089844-.097656-8.171875-.230469-12.246094-.402343l-.953125-.046876c-3.824219-.175781-7.636719-.382812-11.441406-.625l-2.992187-.199218c-4-.269532-8-.566406-12-.917969l-1.453126-.136719c-3.589843-.324218-7.15625-.683594-10.699218-1.074218l-2.910156-.320313c-3.863282-.445313-7.691407-.921875-11.488282-1.429687l-2.007812-.25c-3.304688-.460938-6.558594-.957032-9.792969-1.476563-.894531-.144531-1.800781-.28125-2.6875-.433594-3.660156-.609375-7.261719-1.25-10.808594-1.929687l-2.128906-.421875c-3.039063-.601563-6.03125-1.234375-8.972656-1.890625-.800781-.175782-1.601563-.34375-2.402344-.527344-3.375-.765625-6.671875-1.566406-9.894531-2.398438-.71875-.183593-1.425782-.382812-2.144532-.578124-2.734374-.742188-5.398437-1.503907-8-2.285157l-2.023437-.609375c-3.007813-.9375-5.921875-1.910156-8.746094-2.910156l-1.972656-.730469c-2.417969-.882812-4.761719-1.800781-7.035156-2.742187l-1.527344-.625c-2.574219-1.105469-5.03125-2.238282-7.390625-3.40625l-1.671875-.867188c-2.050781-1.054687-4-2.132812-5.882813-3.199218-.324218-.199219-.6875-.390626-1.015624-.589844-2.0625-1.273438-4-2.578125-5.789063-3.914063-.183594-.144531-.425781-.269531-.609375-.414062v85.550781c0 20 70 48 184 48s184-28 184-48zm0 0"/><path d="m368.015625 48c0-26.507812-82.378906-48-184-48s-184 21.492188-184 48 82.378906 48 184 48 184-21.492188 184-48zm0 0"/>
                            </svg>
                            Kartu Ibu
                           <svg width="14pt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">

                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('inputpasien.index') }}">
                                {{ __('Input Data Pasien') }}
                            </x-jet-dropdown-link>

                            <hr class="dropdown-divider">
                            <x-jet-dropdown-link href="{{ route('riwayatkehamilan.index') }}">
                                {{ __('Riwayat Kehamilan') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            <svg height="14pt" viewBox="0 0 512 512" width="14pt" xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4">
                                <path d="m76 240c12.101562 0 23.054688-4.855469 31.148438-12.652344l44.402343 22.199219c-.222656 1.808594-.550781 3.585937-.550781 5.453125 0 24.8125 20.1875 45 45 45s45-20.1875 45-45c0-6.925781-1.703125-13.410156-4.511719-19.277344l60.234375-60.234375c5.867188 2.808594 12.351563 4.511719 19.277344 4.511719 24.8125 0 45-20.1875 45-45 0-4.671875-.917969-9.089844-2.246094-13.328125l52.335938-39.242187c7.140625 4.769531 15.699218 7.570312 24.910156 7.570312 24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45c0 4.671875.917969 9.089844 2.246094 13.328125l-52.335938 39.242187c-7.140625-4.769531-15.699218-7.570312-24.910156-7.570312-24.8125 0-45 20.1875-45 45 0 6.925781 1.703125 13.410156 4.511719 19.277344l-60.234375 60.234375c-5.867188-2.808594-12.351563-4.511719-19.277344-4.511719-12.101562 0-23.054688 4.855469-31.148438 12.652344l-44.402343-22.199219c.222656-1.808594.550781-3.585937.550781-5.453125 0-24.8125-20.1875-45-45-45s-45 20.1875-45 45 20.1875 45 45 45zm0 0"/><path d="m497 482h-16v-317c0-8.289062-6.710938-15-15-15h-60c-8.289062 0-15 6.710938-15 15v317h-30v-227c0-8.289062-6.710938-15-15-15h-60c-8.289062 0-15 6.710938-15 15v227h-30v-107c0-8.289062-6.710938-15-15-15h-60c-8.289062 0-15 6.710938-15 15v107h-30v-167c0-8.289062-6.710938-15-15-15h-60c-8.289062 0-15 6.710938-15 15v167h-16c-8.289062 0-15 6.710938-15 15s6.710938 15 15 15h482c8.289062 0 15-6.710938 15-15s-6.710938-15-15-15zm0 0"/>
                            </svg>
                            Grafik
                             <svg width="14pt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('pemantauan-kehamilan.index') }}">
                                {{ __('Pemantauan Kehamilan') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
            </ul>
        </div>
    </div>
    </div>

</nav>

