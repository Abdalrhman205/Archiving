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
            <!-- start -->
            <!-- archives/show.blade.php -->
            <div class="main-content-inner">

                {{-- start Show picture --}}
                <div class="row mt-4 mb-4">
                    <div class="col-lg-12">
                        <div class="card d-block pt-3 pb-3">
                            <div class="card-body">
                                <h1 class="c-grey pb-5">تفاصيل الصور</h1>

                                <div class="row">
                                    @if (!empty($images))
                                        @foreach ($images as $image)
                                            @php
                                                // تحديد نوع الملف بناءً على الامتداد
                                                $fileExtension = pathinfo($image, PATHINFO_EXTENSION);
                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                            @endphp
                                
                                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                <!-- عرض الصورة -->
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="image d-flex mb-3 pe-5 ps-5 w-120 align-items-center pt-3 pb-3 rounded bg-grey">
                                                        <img src="{{ asset('uploads/' . $image) }}" alt="Image" width="360" height="360"
                                                        class="clickable-image" data-image="{{ $image }}">
                                                    
                                                        <!-- زر حذف الصورة -->
                                                        <a style="font-size: 40px"
                                                            onclick="confirmDeletePictureShow('{{ $Picture->id }}', '{{ $image }}')">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600 me-2"
                                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                                data-icon="trash-can" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                                data-fa-i2svg="" style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <!-- عرض أيقونة الملف -->
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="image flex-column align-items-center pt-3 pb-3 rounded bg-grey">
                                                        <a class="d-flex align-items-center flex-column" href="{{ asset('uploads/' . $image) }}" class="fas fa-file" style="color: #007bff; font-size: 100px;" title="ملف"></i>
                                                            <h2 class="pt-3">تحميل </h2>
                                                        </a>
                                                        <a style="font-size: 40px" onclick="confirmDeletePictureShow('{{ $Picture->id }}', '{{ $image }}')">
                                                            <svg class="svg-inline--fa fa-trash-can bg-red-600"
                                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                                data-icon="trash-can" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                                data-fa-i2svg="" style="color: red;">
                                                                <path fill="currentColor"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>لا توجد صور لعرضها.</p>
                                    @endif
                                </div>
                                

                                <form id="delete-form-{{ $Picture->id }}" action="{{ route('Picture.delete', $Picture->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </div>
                            <a href="{{ route('Picture.Pictures') }}" class="btn btn-secondary">العودة</a>
                        </div>
                    </div>
                </div>
                {{-- end Show picture --}}

                {{-- start Form --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="c-grey pb-3">اضافة الصور</h3>
                                <form action="{{ route('Picture.storeShow', ['id' => $Picture->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 pt-3 pb-3">
                                            <input class="form-control" type="file" name="selectfilePic[]" multiple>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <button class="btn" type="submit">اضافة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Form --}}

            </div>
            <!-- end -->
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
