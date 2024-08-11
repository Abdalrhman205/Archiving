<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
    <!-- page container area start -->
<div class="page-container">
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area page title area start -->
        @include('layout.header-titel')
        <!-- header area page title area end -->
        {{-- start --}}
        <div class="main-content-inner">
             {{-- start tableShow File --}}
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">
                                
                                <h3 class="c-grey pb-3">عرض الملفات الداخلية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        
                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الملف</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($SideonFiles as $SideonFile)
                                                <tr onclick="tableFile({{ $SideonFile->id }})">
                                                    <td>
                                                        @if ($SideonFile->selectfileFile)
                                                            @php
                                                                // تحديد امتداد الملف
                                                                $fileExtension = pathinfo(
                                                                    $SideonFile->selectfileFile,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                                // قائمة بالامتدادات التي تعتبر صوراً
                                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                            @endphp

                                                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                                <!-- إذا كان الملف صورة -->
                                                                <img src="{{ asset('images/' . $SideonFile->selectfileFile) }}"
                                                                    alt="Image" width="100" height="100">
                                                            @else
                                                                <!-- إذا لم يكن الملف صورة -->
                                                                <i class="fas fa-file"
                                                                    style="color: #007bff; font-size: 25px;"
                                                                    title="ملف"></i>
                                                            @endif
                                                        @else
                                                            <p>No File</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ $SideonFile->nameFile }}</td>
                                                    <td>{{ $SideonFile->textKey }}</td>
                                                    <td>{{ $SideonFile->dicraption }}</td>
                                                    <td>{{ $SideonFile->conditionFile }}</td>
                                                    <td>{{ $SideonFile->sideFile }}</td>
                                                    <td>{{ $SideonFile->created_at }}</td>
                                                    <td>
                                                        <a onclick="showEditAlertFile({{ $SideonFile->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        
                                                        <a onclick="confirmDeleteFile({{ $SideonFile->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $SideonFile->id }}" action="{{ route('File.delete', $SideonFile->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- href="{{ route('Fileuments.edit',['id'=>$Fileument->id]) }}" --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">
                                
                                <h3 class="c-grey pb-3">عرض الملفات الخارجية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        
                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الملف</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($SideoutFiles as $SideoutFile)
                                                <tr onclick="tableFile({{ $SideoutFile->id }})">
                                                    <td>
                                                        @if ($SideoutFile->selectfileFile)
                                                            @php
                                                                // تحديد امتداد الملف
                                                                $fileExtension = pathinfo(
                                                                    $SideoutFile->selectfileFile,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                                // قائمة بالامتدادات التي تعتبر صوراً
                                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                            @endphp

                                                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                                <!-- إذا كان الملف صورة -->
                                                                <img src="{{ asset('images/' . $SideoutFile->selectfileFile) }}"
                                                                    alt="Image" width="100" height="100">
                                                            @else
                                                                <!-- إذا لم يكن الملف صورة -->
                                                                <i class="fas fa-file"
                                                                    style="color: #007bff; font-size: 25px;"
                                                                    title="ملف"></i>
                                                            @endif
                                                        @else
                                                            <p>No File</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ $SideoutFile->nameFile }}</td>
                                                    <td>{{ $SideoutFile->textKey }}</td>
                                                    <td>{{ $SideoutFile->dicraption }}</td>
                                                    <td>{{ $SideoutFile->conditionFile }}</td>
                                                    <td>{{ $SideoutFile->sideFile }}</td>
                                                    <td>{{ $SideoutFile->created_at }}</td>
                                                    <td>
                                                        <a onclick="showEditAlertFile({{ $SideoutFile->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        
                                                        <a onclick="confirmDeleteFile({{ $SideoutFile->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $SideoutFile->id }}" action="{{ route('File.delete', $SideoutFile->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- href="{{ route('Fileuments.edit',['id'=>$Fileument->id]) }}" --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tableShow File --}}
             {{-- start tableShow Doc --}}
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">
                                
                                <h3 class="c-grey pb-3">عرض المستنذات الداخلية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        
                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الملف</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($SideonDocs as $SideonDoc)
                                                <tr onclick="tableFile({{ $SideonDoc->id }})">
                                                    <td>
                                                        @if ($SideonDoc->selectfileDoc)
                                                            @php
                                                                // تحديد امتداد الملف
                                                                $fileExtension = pathinfo(
                                                                    $SideonDoc->selectfileDoc,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                                // قائمة بالامتدادات التي تعتبر صوراً
                                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                            @endphp

                                                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                                <!-- إذا كان الملف صورة -->
                                                                <img src="{{ asset('images/' . $SideonDoc->selectfileDoc) }}"
                                                                    alt="Image" width="100" height="100">
                                                            @else
                                                                <!-- إذا لم يكن الملف صورة -->
                                                                <i class="fas fa-file"
                                                                    style="color: #007bff; font-size: 25px;"
                                                                    title="ملف"></i>
                                                            @endif
                                                        @else
                                                            <p>No File</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ $SideonDoc->nameDoc }}</td>
                                                    <td>{{ $SideonDoc->textKey }}</td>
                                                    <td>{{ $SideonDoc->dicraption }}</td>
                                                    <td>{{ $SideonDoc->conditionDoc }}</td>
                                                    <td>{{ $SideonDoc->sideDoc }}</td>
                                                    <td>{{ $SideonDoc->created_at }}</td>
                                                    <td>
                                                        <a onclick="showEditAlertDoc({{ $SideonDoc->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeleteDoc({{ $SideonDoc->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $SideonDoc->id }}" action="{{ route('documents.delete', $SideonDoc->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- href="{{ route('Fileuments.edit',['id'=>$Fileument->id]) }}" --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">
                                
                                <h3 class="c-grey pb-3">عرض المستندات الخارجية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        
                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الملف</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($SideoutDocs as $SideoutDoc)
                                                <tr onclick="tableFile({{ $SideoutDoc->id }})">
                                                    <td>
                                                        @if ($SideoutDoc->selectfileDoc)
                                                            @php
                                                                // تحديد امتداد الملف
                                                                $fileExtension = pathinfo(
                                                                    $SideoutDoc->selectfileDoc,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                                // قائمة بالامتدادات التي تعتبر صوراً
                                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                            @endphp

                                                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                                <!-- إذا كان الملف صورة -->
                                                                <img src="{{ asset('images/' . $SideoutDoc->selectfileDoc) }}"
                                                                    alt="Image" width="100" height="100">
                                                            @else
                                                                <!-- إذا لم يكن الملف صورة -->
                                                                <i class="fas fa-file"
                                                                    style="color: #007bff; font-size: 25px;"
                                                                    title="ملف"></i>
                                                            @endif
                                                        @else
                                                            <p>No File</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ $SideoutDoc->nameDoc }}</td>
                                                    <td>{{ $SideoutDoc->textKey }}</td>
                                                    <td>{{ $SideoutDoc->dicraption }}</td>
                                                    <td>{{ $SideoutDoc->conditionDoc }}</td>
                                                    <td>{{ $SideoutDoc->sideDoc }}</td>
                                                    <td>{{ $SideoutDoc->created_at }}</td>
                                                    <td>
                                                        <a onclick="showEditAlertDoc({{ $SideoutDoc->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeleteDoc({{ $SideoutDoc->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $SideoutDoc->id }}" action="{{ route('documents.delete', $SideoutDoc->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- href="{{ route('Fileuments.edit',['id'=>$Fileument->id]) }}" --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tableShow Doc --}}
             {{-- start tableShow Pic --}}
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">

                                <h3 class="c-grey pb-3">عرض الصور داخلية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">

                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الصور</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col"> عرض الصور </th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($Pictureson as $Pictureon)
                                                <tr>
                                                    <td>{{ count(explode(',', $Pictureon->selectfilePic)) }}</td>
                                                    <!-- عرض عدد الصور -->
                                                    <td>{{ $Pictureon->namePic }}</td>
                                                    <td>{{ $Pictureon->textKey }}</td>
                                                    <td>{{ $Pictureon->dicraption }}</td>
                                                    <td>{{ $Pictureon->conditionPic }}</td>
                                                    <td>{{ $Pictureon->sidePic }}</td>
                                                    <td>{{ $Pictureon->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Picture.show', $Pictureon->id) }}"
                                                            class="color"> <i class="fa-regular fa-eye"></i></a>
                                                    </td>
                                                    <td>
                                                        <a onclick="showEditAlertPicture({{ $Pictureon->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeletePicture({{ $Pictureon->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $Pictureon->id }}"
                                                            action="{{ route('Picture.delete', $Pictureon->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">

                                <h3 class="c-grey pb-3">عرض الصور الخارجية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">

                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الصور</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col"> عرض الصور </th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($Picturesout as $Pictureout)
                                                <tr>
                                                    <td>{{ count(explode(',', $Pictureout->selectfilePic)) }}</td>
                                                    <!-- عرض عدد الصور -->
                                                    <td>{{ $Pictureout->namePic }}</td>
                                                    <td>{{ $Pictureout->textKey }}</td>
                                                    <td>{{ $Pictureout->dicraption }}</td>
                                                    <td>{{ $Pictureout->conditionPic }}</td>
                                                    <td>{{ $Pictureout->sidePic }}</td>
                                                    <td>{{ $Pictureout->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Picture.show', $Pictureout->id) }}"
                                                            class="color"> <i class="fa-regular fa-eye"></i></a>
                                                    </td>
                                                    <td>
                                                        <a onclick="showEditAlertPicture({{ $Pictureout->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeletePicture({{ $Pictureout->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="far" data-icon="trash-can"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg=""
                                                                style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $Pictureout->id }}"
                                                            action="{{ route('Picture.delete', $Pictureout->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tableShow Pic --}}
             {{-- start tableShow Vid --}}
             <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">

                                <h3 class="c-grey pb-3">عرض الفيديوهات داخلية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">

                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الفيديوهات</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col"> عرض الفيديوهات </th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Videoson as $Videoon)
                                                <tr>
                                                    <td>{{ count(explode(',', $Videoon->selectfileVid)) }}</td>
                                                    <td>{{ $Videoon->nameVid }}</td>
                                                    <td>{{ $Videoon->textKey }}</td>
                                                    <td>{{ $Videoon->dicraption }}</td>
                                                    <td>{{ $Videoon->conditionVid }}</td>
                                                    <td>{{ $Videoon->sideVid }}</td>
                                                    <td>{{ $Videoon->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Videos.show', $Videoon->id) }}" class="color">
                                                            <i class="fa-regular fa-eye"></i> 
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="showEditAlertVideo({{ $Videoon->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeleteVideo({{ $Videoon->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600" 
                                                                 aria-hidden="true" focusable="false" data-prefix="far" 
                                                                 data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" 
                                                                 viewBox="0 0 448 512" data-fa-i2svg="" style="color: red;">
                                                                <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $Videoon->id }}" action="{{ route('Videos.delete', $Video->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE') 
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            <div class="up-card t-right">

                                <h3 class="c-grey pb-3">عرض الفيديوهات الخارجية</h3>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">

                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">الفيديوهات</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">كلمات المفتاحية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">القسم </th>
                                                <th scope="col">الجهة </th>
                                                <th scope="col">تاريخ الحفظ</th>
                                                <th scope="col"> عرض الفيديوهات </th>
                                                <th scope="col">تعديل</th>
                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Videosout as $Videoout)
                                                <tr>
                                                    <td>{{ count(explode(',', $Videoout->selectfileVid)) }}</td>
                                                    <td>{{ $Videoout->nameVid }}</td>
                                                    <td>{{ $Videoout->textKey }}</td>
                                                    <td>{{ $Videoout->dicraption }}</td>
                                                    <td>{{ $Videoout->conditionVid }}</td>
                                                    <td>{{ $Videoout->sideVid }}</td>
                                                    <td>{{ $Videoout->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Videos.show', $Videoout->id) }}" class="color">
                                                            <i class="fa-regular fa-eye"></i> 
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="showEditAlertVideo({{ $Videoout->id }})">
                                                            <i class="fas fa-edit" style="color: #007bff;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="confirmDeleteVideo({{ $Videoout->id }})">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600" 
                                                                 aria-hidden="true" focusable="false" data-prefix="far" 
                                                                 data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" 
                                                                 viewBox="0 0 448 512" data-fa-i2svg="" style="color: red;">
                                                                <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form id="delete-form-{{ $Videoout->id }}" action="{{ route('Videos.delete', $Videoout->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE') 
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tableShow Vid --}}
            
        </div>
        {{-- end --}}
    </div>
    <!-- main content area end -->
    <!-- sidebar menu area start -->
    @include('layout.sidebar')
    <!-- sidebar menu area end -->
    
    <!-- footer area start-->
    @include('layout.footer')
    <!-- footer area end-->
</div>
<!-- page container area end -->
@include('layout.scripts')
</body>
</html>