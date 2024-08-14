<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- page container area start -->
    <div class="page-container">
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area page title area start -->
            @include('layout.header-titel')
            <!-- header area page title area end -->
            {{-- start --}}
            <div class="main-content-inner">
                {{-- start tableShow --}}
                <div class="row mt-4 mb-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body overflow-x-scroll">
                                <div class="up-card t-right">
                                    
                                    <h3 class="c-grey pb-3">عرض الملفات</h3>
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
                                                @foreach ($Files as $File)
                                                    <tr onclick="tableFile({{ $File->id }})">
                                                        <td>
                                                            @if ($File->selectfileFile)
                                                                @php
                                                                    // تحديد امتداد الملف
                                                                    $fileExtension = pathinfo(
                                                                        $File->selectfileFile,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                    // قائمة بالامتدادات التي تعتبر صوراً
                                                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                                @endphp

                                                                @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                                    <!-- إذا كان الملف صورة -->
                                                                    <img src="{{ asset('images/' . $File->selectfileFile) }}"
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
                                                        <td>{{ $File->nameFile }}</td>
                                                        <td>{{ $File->textKey }}</td>
                                                        <td>{{ $File->dicraption }}</td>
                                                        <td>{{ $File->conditionFile }}</td>
                                                        <td>{{ $File->sideFile }}</td>
                                                        <td>{{ $File->created_at }}</td>
                                                        <td>
                                                            <a onclick="showEditAlertFile({{ $File->id }})">
                                                                <i class="fas fa-edit" style="color: #007bff;"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            
                                                            <a onclick="confirmDeleteFile({{ $File->id }})">
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
                                                            <form id="delete-form-{{ $File->id }}" action="{{ route('File.delete', $File->id) }}" method="POST" style="display: none;">
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
                {{-- end tableShow --}}

                {{-- start Form --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Files.store') }}" method="POST" enctype="multipart/form-data" class="t-right">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <input class="form-control @error('nameFile') is-invalid @enderror" type="text" name="nameFile" placeholder="اسم الملف" value="{{ old('nameFile') }}">
                                            @error('nameFile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <select class="form-control @error('conditionFile') is-invalid @enderror" name="conditionFile">
                                                <option selected value="لم يتم التحديد"> .. يتبع الي </option>
                                                @foreach ($Sections as $Section)
                                                    <option value="{{ $Section->nameSection }}">{{ $Section->nameSection }}</option>
                                                @endforeach
                                            </select>
                                            @error('conditionFile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <select class="form-control @error('sideFile') is-invalid @enderror" name="sideFile">
                                                <option selected value="لم يتم التحديد"> .. الجهة  </option>
                                                <option value="داخلية"> داخلية</option>
                                                <option value="خارجية">خارجية</option>
                                            </select>
                                            @error('sideFile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>                            
                                
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <input class="form-control @error('textKey') is-invalid @enderror" type="text" name="textKey" placeholder="الكلمات المفتاحية" value="{{ old('textKey') }}">
                                            @error('textKey')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <input class="form-control @error('selectfileFile') is-invalid @enderror" type="file" name="selectfileFile">
                                            @error('selectfileFile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="form-group col-lg-12 pt-3 pb-3">
                                            <textarea class="form-control @error('dicraption') is-invalid @enderror" name="dicraption" placeholder="الوصف" rows="3">{{ old('dicraption') }}</textarea>
                                            @error('dicraption')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn w-100" type="submit">حفظ</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Form --}}
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
