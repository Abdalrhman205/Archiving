<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
   <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
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
                                    <h3 class="c-grey pb-3">عرض الاقسام</h3>
                                </div>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-light">
                                                <tr>
                                                    <th scope="col">الاسم</th>
                                                    <th scope="col">تعديل</th>
                                                    <th scope="col">حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Sections as $Section)
                                                    <tr onclick="tableSection({{ $Section->id }})">
                                                        <td>{{ $Section->nameSection }}</td>
                                                        <td>
                                                            <a onclick="showEditAlertSection({{ $Section->id }})">
                                                                <i class="fas fa-edit" style="color: #007bff;"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a onclick="confirmDeleteSection({{ $Section->id }})">
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
                                                            <form id="delete-form-{{ $Section->id }}" action="{{ route('Sections.delete', $Section->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- href="{{ route('documents.edit',['id'=>$document->id]) }}" --}}
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
                                <form action="{{ route('Sections.store') }}" method="POST" enctype="multipart/form-data" class="t-right">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-3 col-md-4 col-sm-12 pt-3 pb-3">
                                            <input class="form-control @error('nameSection') is-invalid @enderror" type="text" name="nameSection" placeholder="اسم القسم" value="{{ old('nameSection') }}">
                                            @error('nameSection')
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
