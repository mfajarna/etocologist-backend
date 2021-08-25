<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Content extends Component
{
    public $modalFormVisible = false;
    public $modalFormVisible2 = false;
    public $modalFormVisibleMaster = false;

    /**
     * createShowModal
     *
     * @return void
     */

    public function createShowModalPoliAnak()
    {
        $this->modalFormVisible = true;
    }

    public function createShowModalPoliIbu()
    {
        $this->modalFormVisible2 = true;
    }

    public function createShowModalMaster()
    {
        $this->modalFormVisibleMaster = true;
    }

      /**
         * Show Render
         *
         * @return void
     */

    public function render()
    {
        return view('livewire.content');
    }
}
