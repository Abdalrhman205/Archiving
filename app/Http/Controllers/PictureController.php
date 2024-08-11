<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePictureRequest;
use App\Models\Documents;
use App\Models\File;
use App\Models\picture;
use App\Models\Sections;
use App\Models\User;
use App\Notifications\Archiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Pictures()
    {
        $Pictures = picture::all();
        $Sections = Sections::all();
        return view('archives.pictures',compact('Pictures','Sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {
        $imageNames = [];
    
        // التحقق من وجود ملفات تم تحميلها
        if ($request->hasFile('selectfilePic')) {
            foreach ($request->file('selectfilePic') as $file) {
                $imageName = time() . '-' . $file->getClientOriginalName(); // تسمية الصورة
                $file->move(public_path('uploads'), $imageName); // تخزين الصورة في public/uploads
                $imageNames[] = $imageName; // إضافة اسم الصورة إلى المصفوفة
            }
        }
    
        // حفظ المعلومات في قاعدة البيانات
        $p = Picture::create([
            'namePic' => $request->namePic,
            'conditionPic' => $request->conditionPic,
            'textKey' => $request->textKey,
            'sidePic' => $request->sidePic,
            'selectfilePic' => implode(',', $imageNames), // حفظ أسماء الصور كمصفوفة مفصولة بفواصل
            'dicraption' => $request->dicraption,
        ]);
    
        // إرسال إشعار
        Notification::send(auth()->user(), new Archiving(auth()->user()->name, $p->namePic, 'صورة')); 
    
        // إعادة التوجيه بعد الحفظ بنجاح
        return redirect()->route('Picture.Pictures')->with('success', 'Images uploaded successfully.');
    }
    
    
        public function show($id)
        {
            $Picture = Picture::findOrFail($id);
            $images = explode(',', $Picture->selectfilePic); // تحويل السلسلة إلى مصفوفة
        
            return view('archives.show', compact('Picture', 'images'));
        }
        
    
    public function getPicture($id)
    {
        $picture = Picture::findOrFail($id);
        return response()->json($picture);
    }
    
public function delete($id)
{
    $Picture = picture::findOrFail($id);
    $Picture->delete();

    return redirect()->back();
}

public function deleteShow($pictureId, $imageName)
{
    $picture = Picture::findOrFail($pictureId);

    $imageNames = explode(',', $picture->selectfilePic);
    
    $updatedImageNames = array_filter($imageNames, function ($name) use ($imageName) {
        return $name !== $imageName;
    });

    // حذف الصورة من التخزين
    $path = public_path('uploads/' . $imageName); // تعديل المسار إلى public/uploads
    if (file_exists($path)) {
        unlink($path);
    }
    
    // تحديث قائمة الصور في قاعدة البيانات
    $picture->selectfilePic = implode(',', $updatedImageNames);
    $picture->save();

    return redirect()->route('Picture.show', ['id' => $pictureId]);
}

public function storeShow(Request $request, $id)
{
    $imageNames = [];

    // معالجة كل صورة
    if ($request->hasFile('selectfilePic')) {
        foreach ($request->file('selectfilePic') as $file) {
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName); // تعديل المسار إلى public/uploads
            $imageNames[] = $imageName;
        }
    }

    // العثور على السجل المحدد
    $picture = Picture::findOrFail($id);

    // الحصول على الصور الحالية
    $existingImages = explode(',', $picture->selectfilePic);

    // دمج الصور الحالية مع الصور الجديدة
    $allImages = array_merge($existingImages, $imageNames);

    // تحديث السجل في قاعدة البيانات
    $picture->update([
        'selectfilePic' => implode(',', $allImages), // تحويل المصفوفة إلى سلسلة نصية
    ]);

    return redirect()->route('Picture.Pictures')->with('success', 'Images uploaded successfully.');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $picture = Picture::findOrFail($request->id);
    $picture->update([
        'namePic' => $request->namePic,
        'conditionPic' => $request->conditionPic,
        'sidePic' => $request->sidePic,
        'textKey' => $request->textKey,
        'dicraption' => $request->dicraption,
    ]);
    return response()->json(['success' => 'تم التعديل بنجاح']);
}
}