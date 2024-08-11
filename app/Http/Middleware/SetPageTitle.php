<?php

namespace App\Http\Middleware;

use Closure;

class SetPageTitle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = $request->route()->getName();
        
        // تحديد عنوان الصفحة بناءً على اسم الروت
        // يمكنك تخصيص هذه الترجمات حسب الحاجة
        $titles = [
            'archives.index' => 'الرئيسية',
            'documents.documents' => 'المستندات',
            'documents.store' => 'تخزين المستند',
            'documents.get' => 'عرض المستند',
            'documents.delete' => 'حذف المستند',
            'Files.Files' => 'الملفات',
            'Files.store' => 'تخزين الملفات',
            'Files.get' => 'عرض الملف',
            'Files.delete' => 'حذف الملف',
            'Picture.Pictures' => 'الصور',
            'Picture.store' => 'تخزين الصور',
            'Picture.get' => 'عرض الصور',
            'Picture.delete' => 'حذف الصور',
            'Picture.show' =>'عرض الصور',
            'Videos.Videos' => 'الفيديو',
            'Videos.store' => 'تخزين الفيديو',
            'Videos.get' => 'عرض الفيديو',
            'Videos.delete' => 'حذف الفيديو',
            'Videos.show' =>'عرض الفيديو',
            'Sections.Sections' => 'الاقسام',
            'Sections.store' => 'تخزين الاقسام',
            'Sections.get' => 'عرض الاقسام',
            'Sections.delete' => 'حذف الاقسام',
            'Sections.show' =>'عرض الاقسام',
            'Search.Search' =>' البحث',
            'Entity.Entity' =>' الجهة',
        ];
        
        // تعيين العنوان بناءً على اسم الروت
        $title = $titles[$routeName] ?? 'الصفحة';

        // تمرير العنوان إلى العرض
        view()->share('pageTitle', $title);

        return $next($request);
    }
}
