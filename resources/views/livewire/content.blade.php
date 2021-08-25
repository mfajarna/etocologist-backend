<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <x-poli-anak-svg />
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Poli Anak
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <ul class="list-group list-group-flush">
            <li class="list-group-item"> <x-imunisasi-svg /><a href="#" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Pelayanan Imunisasi</a></li>
            <li class="list-group-item"><x-bayi-sakit-svg /><a href="#" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Pelayanan Bayi</a></li>
            <li class="list-group-item"><x-tumbuh-kembang-svg /><a href="#" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Konsultasi Tumbuh Kembang</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <x-poli-ibu-svg />
        <button class="btn btn-link collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
          <a href="{{ url('poli-ibu') }}" class="">Poli Ibu</a>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <ul class="list-group list-group-flush">
            <li class="list-group-item"> <x-imunisasi-svg /><a href="{{ url('poli-ibu') }}" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Input Data Pasien Ibu</a></li>
            <li class="list-group-item"><x-bayi-sakit-svg /><a href="#" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Cek Kesehatan Pasien Ibu</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <x-poli-masas-svg />
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Poli Massas
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <x-poli-umum-svg />
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          Poli Umum
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <x-master-svg />
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
            Master
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><x-poli-gudang-svg /><a href="#" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Gudang</a></li>
            <li class="list-group-item"><x-poli-gudang-svg /><a href="{{ url('master/gudang-farmasi') }}" class="h5 ml-2 font-weight-normal text-decoration-none text-dark">Gudang Farmasi</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <x-poli-administrasi-svg />
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
          Administrasi
        </button>
      </h5>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
