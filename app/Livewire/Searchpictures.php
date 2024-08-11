<?php

namespace App\Livewire;

use App\Models\Picture;
use Livewire\Component;

class Searchpictures extends Component
{
    public $searchPic = "";
    

    public function render()
    {
        $Pic = [];
    
        if (strlen($this->searchPic) >= 1) {
            $Pic = Picture::where(function($query) {
                $query->where('namePic', 'like', '%' . $this->searchPic . '%')
                      ->orWhere('textKey', 'like', '%' . $this->searchPic . '%');
            })->limit(7)->get();
        }
    
        return view('livewire.searchpictures', [
            'Pics' => $Pic
        ]);
    
    }
}
