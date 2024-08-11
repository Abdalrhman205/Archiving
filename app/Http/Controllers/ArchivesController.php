<?php

namespace App\Http\Controllers;

use App\Models\archives;
use App\Models\Documents;
use App\Models\File;
use App\Models\notifications;
use App\Models\Picture;
use App\Models\Sections;
use App\Models\User;
use App\Models\Videos;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use League\CommonMark\Node\Block\Document;

class ArchivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Document = Documents::count();
        $File = File::count();
        $Picture = Picture::count();
        $Videos = Videos::count();
        $Sections = Sections::count();
        return view('archives.index',compact(
            'Document',
            'File',
            'Picture',
            'Videos',
            'Sections',
));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showN($id)
    {
        notifications::where('id',$id)->delete();
        return redirect()->back();
    }

}
