<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Sections;
use App\Models\User;
use App\Models\Videos;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VideosController extends Controller
{
    public function Videos()
    {
        $Video = Videos::all(); 
        $Sections = Sections::all();
        return view('archives.videos', compact('Video','Sections')); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest  $request)
{
    $videoNames = [];
    // معالجة كل صورة
    if ($request->hasFile('selectfileVid')) {
        foreach ($request->file('selectfileVid') as $file) {
            $videoName = time() . '-' . $file->getClientOriginalName();
            
            $file->move(public_path('uploads'), $videoName); // تخزين الصورة في public/uploads
            $videoNames[] = $videoName;
        }
    }
    
    $v=Videos::create([
        'nameVid' => $request->nameVid,
        'conditionVid' => $request->conditionVid,
        'textKey' => $request->textKey,
        'sideVid' => $request->sideVid,
        'selectfileVid' => implode(',', $videoNames), // سيتم تحويل المصفوفة إلى سلسلة نصية بواسطة النموذج
        'dicraption' => $request->dicraption,
    ]);
    Notification::send(auth()->user(), new Archiving(auth()->user()->name, $v->nameVid, 'فيديو'));
    return redirect()->route('Videos.Videos')->with('success', 'videos uploaded successfully.');
}

    public function show($id)
    {
        $Video = Videos::findOrFail($id);
        $images = explode(',', $Video->selectfileVid); // تحويل السلسلة إلى مصفوفة
        return view('archives.showVid', compact('Video', 'images'));
    }

public function getVideos($id)
{
    $Video = Videos::findOrFail($id);
    return response()->json($Video);
}

public function delete($id)
{
    $Video = Videos::findOrFail($id);
    $Video->delete();
    return redirect()->back();
}
public function deleteShow($videoId, $videoName)
{
    // العثور على السجل الذي يحتوي على الفيديوهات
    $video = Videos::findOrFail($videoId);

    // الحصول على قائمة الأسماء الحالية للفيديوهات
    $videoNames = explode(',', $video->selectfileVid);
    
    // إزالة الفيديو المحدد من القائمة
    $updatedVideoNames = array_filter($videoNames, function ($name) use ($videoName) {
        return $name !== $videoName;
    });

    // حذف الفيديو من التخزين
    $path = public_path('uploads/' . $videoName); // تعديل المسار إلى public/uploads/videos
    if (file_exists($path)) {
        unlink($path);
    }

    // تحديث قائمة الفيديوهات في قاعدة البيانات
    $video->selectfileVid = implode(',', $updatedVideoNames);
    $video->save();

    return response()->json(['success' => true]);
}
public function deleteImage(Request $request)
{
    $documentId = $request->input('document_id');
    $image = $request->input('image');

    $document = Videos::find($documentId);

    if ($document) {
        // الحصول على الفيديوهات الحالية
        $videos = json_decode($document->files, true);

        // إزالة الفيديو المحدد
        if (($key = array_search($image, $videos)) !== false) {
            unset($videos[$key]);
        }

        // إذا لم يتبق أي فيديوهات، قم بحذف الصف
        if (empty($videos)) {
            $document->delete();
        } else {
            // تحديث قائمة الفيديوهات في قاعدة البيانات
            $document->files = json_encode($videos);
            $document->save();
        }

        return response()->json(['status' => 'success', 'message' => 'تم حذف الفيديو بنجاح.']);
    }
    return response()->json(['status' => 'error', 'message' => 'لم يتم العثور على الوثيقة.']);
}
public function storeShow(Request $request, $id)
{
    $videoNames = [];

    // معالجة كل فيديو
    if ($request->hasFile('selectfileVid')) {
        foreach ($request->file('selectfileVid') as $file) {
            $videoName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $videoName); // تعديل المسار إلى public/uploads/videos
            $videoNames[] = $videoName;
        }
    }

    // العثور على السجل المحدد
    $video = Videos::findOrFail($id);

    // الحصول على الفيديوهات الحالية
    $existingVideos = explode(',', $video->selectfileVid);

    // دمج الفيديوهات الحالية مع الفيديوهات الجديدة
    $allVideos = array_merge($existingVideos, $videoNames);

    // تحديث السجل في قاعدة البيانات
    $video->update([
        'selectfileVid' => implode(',', $allVideos), // تحويل المصفوفة إلى سلسلة نصية
    ]);

    return redirect()->route('Videos.Videos')->with('success', 'Videos uploaded successfully.');
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
            Videos::where('id', $request->id)->update([
                'nameVid' => $request->nameVid,
                'conditionVid' => $request->conditionVid,
                'sideVid' => $request->sideVid,
                'textKey' => $request->textKey,
                'dicraption' => $request->dicraption,
            ]);
        return response()->json(['success' => 'تم التعديل بنجاح']);
    }
}