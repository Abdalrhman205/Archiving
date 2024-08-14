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
            <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            @livewire('SearchBar')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            @livewire('search-files')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            @livewire('searchpictures')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body overflow-x-scroll">
                            @livewire('SearchVideo')
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
