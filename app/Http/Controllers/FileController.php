<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\Documents;
use App\Models\File;
use App\Models\Sections;
use App\Models\User;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Files()
    {
        $Files = File::all();
        $Sections = Sections::all();
        return view('archives.Files',compact('Files','Sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        if ($request->hasFile('selectfileFile')) {
            $imageName = time().'.'.$request->selectfileFile->extension();  
            $request->selectfileFile->move(public_path('images'), $imageName);
    
            $f = File::create([
                'nameFile' => $request->nameFile,
                'conditionFile' => $request->conditionFile,
                'textKey' => $request->textKey,
                'sideFile' => $request->sideFile,
                'selectfileFile' => $imageName,
                'dicraption' => $request->dicraption,
            ]);
        }
        Notification::send(auth()->user(), new Archiving(auth()->user()->name, $f->nameFile, 'ملف'));
        return redirect()->route('Files.Files');
    }
    
    public function getFile($id)
{
    $File = File::findOrFail($id);
    return response()->json($File);
}

public function delete($id)
{
    $File = File::findOrFail($id);
    $File->delete();

    return redirect()->back();
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        if ($request->hasFile('selectfileFile')) {
            $imageName = time().'.'.$request->selectfileFile->extension();  
            $request->selectfileFile->move(public_path('images'), $imageName);
    
            File::where('id', $request->id)->update([
                'nameFile' => $request->nameFile,
                'conditionFile' => $request->conditionFile,
                'sideFile' => $request->sideFile,
                'textKey' => $request->textKey,
                'selectfileFile' => $imageName,
                'dicraption' => $request->dicraption,
            ]);
        } else {
            File::where('id', $request->id)->update([
                'nameFile' => $request->nameFile,
                'conditionFile' => $request->conditionFile,
                'sideFile' => $request->sideFile,
                'textKey' => $request->textKey,
                'dicraption' => $request->dicraption,
            ]);
        }
        
    
        return response()->json(['success' => 'تم التعديل بنجاح']);
    }
    
}