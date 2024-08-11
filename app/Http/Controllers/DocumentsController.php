<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentsRequest;
use App\Models\Documents;
use App\Models\Sections;
use App\Models\User;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function documents()
    {
        $documents = Documents::all();
        $Sections = Sections::all();
        return view('archives.documents',compact('documents','Sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentsRequest $request)
    {
        if ($request->hasFile('selectfileDoc')) {
            $imageName = time().'.'.$request->selectfileDoc->extension();  
            $request->selectfileDoc->move(public_path('images'), $imageName);
            $d = Documents::create([
                'nameDoc' => $request->nameDoc,
                'conditionDoc' => $request->conditionDoc,
                'textKey' => $request->textKey,
                'sideDoc' => $request->sideDoc,
                'selectfileDoc' => $imageName,
                'dicraption' => $request->dicraption,
            ]);
        }
        Notification::send(auth()->user(), new Archiving(auth()->user()->name, $d->nameDoc, 'مستند'));
        return redirect()->route('documents.documents');
    }
    

    public function getDocument($id)
{
    $document = Documents::findOrFail($id);
    return response()->json($document);
}

public function delete($id)
{
    $document = Documents::findOrFail($id);
    $document->delete();

    return redirect()->back();
}

public function update(Request $request)
{
    if ($request->hasFile('selectfileDoc')) {
        $imageName = time().'.'.$request->selectfileDoc->extension();  
        $request->selectfileDoc->move(public_path('images'), $imageName);

        Documents::where('id', $request->id)->update([
            'nameDoc' => $request->nameDoc,
            'conditionDoc' => $request->conditionDoc,
            'sideDoc' => $request->sideDoc,
            'textKey' => $request->textKey,
            'selectfileDoc' => $imageName,
            'dicraption' => $request->dicraption,
        ]);
    } else {
        Documents::where('id', $request->id)->update([
            'nameDoc' => $request->nameDoc,
            'conditionDoc' => $request->conditionDoc,
            'sideDoc' => $request->sideDoc,
            'textKey' => $request->textKey,
            'dicraption' => $request->dicraption,
        ]);
    }

    return response()->json(['success' => 'تم التعديل بنجاح']);
}

}