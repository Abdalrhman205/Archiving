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
            <div class="row mt-3 mb-3">
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mb-3">
                    <div class="card  ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center ">

                                <h2 class="c-grey" ><i class="fas fa-file-alt ms-3"></i><a class="c-grey" href="{{ route('documents.documents') }}">عرض المستندات</a></h2>
                                <p class="bg counter">{{ $Document }}</p>
                                
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mb-3">
                    <div class="card  ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center ">

                                <h2 class="c-grey" ><i class="fas fa-file ms-3"></i><a class="c-grey" href="{{ route('Files.Files') }}">عرض الملفات</a></h2>
                                <p class="bg counter">{{ $File }}</p>
                                
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mb-3">
                    <div class="card  ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h2 class="c-grey" ><i class="fas fa-images ms-3"></i><a class="c-grey" href="{{ route('Picture.Pictures') }}">عرض الصور</a></h2>
                                <p class="bg counter">{{ $Picture }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mb-3">
                    <div class="card  ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h2 class="c-grey" ><i class="fas fa-video ms-3"></i><a class="c-grey" href="{{ route('Videos.Videos') }}">عرض الفيديوهات</a></h2>
                                <p class="bg counter">{{ $Videos }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 mb-3">
                    <div class="card  ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h2 class="c-grey" ><i class="fa-solid fa-list ms-3"></i><a class="c-grey" href="{{ route('Sections.Sections') }}">عرض الاقسام</a></h2>
                                <p class="bg counter">{{ $Sections }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
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