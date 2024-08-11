<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Entity;
use App\Models\File;
use App\Models\Picture;
use App\Models\Videos;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Entity()
    {
        $SideonFiles = File::where('sideFile', 'داخلية')->get();
        $SideoutFiles = File::where('sideFile', 'خارجية')->get();

        $SideonDocs = Documents::where('sideDoc', 'داخلية')->get();
        $SideoutDocs = Documents::where('sideDoc', 'خارجية')->get();

        $Pictureson = Picture::where('sidePic', 'داخلية')->get();
        $Picturesout = Picture::where('sidePic', 'خارجية')->get();

        $Videoson = Videos::where('sideVid', 'داخلية')->get();
        $Videosout = Videos::where('sideVid', 'خارجية')->get();

        return view('archives.Entity' ,compact(
            'SideonFiles','SideoutFiles',
            'SideonDocs','SideoutDocs',
            'Pictureson','Picturesout',
            'Videoson','Videosout',
        ));
    }

}
