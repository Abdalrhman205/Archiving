<?php

namespace App\Livewire;

use App\Models\Documents;
use App\Models\File;
use App\Models\User;
use League\CommonMark\Node\Block\Document;
use Livewire\Component;

class SearchBar extends Component
{
    public $searchDoc = "";
    

public function render()
{
    $documents = [];

    if (strlen($this->searchDoc) >= 1) {
        $documents = Documents::where(function($query) {
            $query->where('nameDoc', 'like', '%' . $this->searchDoc . '%')
                  ->orWhere('textKey', 'like', '%' . $this->searchDoc . '%');
        })->limit(7)->get();
    }

    return view('livewire.search-bar', [
        'documents' => $documents
    ]);

}

}
