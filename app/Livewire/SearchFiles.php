<?php

namespace App\Livewire;

use App\Models\File;
use Livewire\Component;

class SearchFiles extends Component
{
    public $searchFile = "";
    

    public function render()
    {
        $file = [];
    
        if (strlen($this->searchFile) >= 1) {
            $file = File::where(function($query) {
                $query->where('nameFile', 'like', '%' . $this->searchFile . '%')
                      ->orWhere('textKey', 'like', '%' . $this->searchFile . '%');
            })->limit(7)->get();
        }
    
        return view('livewire.search-files', [
            'files' => $file
        ]);
    
    }
}
