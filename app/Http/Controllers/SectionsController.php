<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Sections;
use App\Models\User;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SectionsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function Sections()

    {
        $Sections = Sections::all();
        return view('archives.Sections',compact('Sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
            $s=Sections::create([
                'nameSection' => $request->nameSection,
            ]);
            Notification::send(auth()->user(), new Archiving(auth()->user()->name, $s->nameSection, 'قسم'));
        return redirect()->route('Sections.Sections');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Section = Sections::with(['Doc'])->findOrFail($id);
        return view('archives.Sections', compact('Section'));
    }


    public function getSection($id)
{
    $document = Sections::findOrFail($id);
    return response()->json($document);
}

public function delete($id)
{
    $document = Sections::findOrFail($id);
    $document->delete();
    return redirect()->back();
}

public function update(Request $request)
{
        Sections::where('id', $request->id)->update([
            'nameSection' => $request->nameSection,
        ]);
    return response()->json(['success' => 'تم التعديل بنجاح']);
}

}
