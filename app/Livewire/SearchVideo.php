<?php

namespace App\Livewire;

use App\Models\Videos;
use Livewire\Component;

class SearchVideo extends Component
{
    public $searchVid = "";
    

    public function render()
    {
        $Video = [];
    
        if (strlen($this->searchVid) >= 1) {
            $Video = Videos::where(function($query) {
                $query->where('nameVid', 'like', '%' . $this->searchVid . '%')
                      ->orWhere('dicraption', 'like', '%' . $this->searchVid . '%');
            })->limit(7)->get();
        }
    
        return view('livewire.search-video', [
            'Video' => $Video
        ]);
    
    }
}
