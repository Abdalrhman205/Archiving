<div id="SearchBar">
    <div class="search-box pull-right">
        <div class="up-card t-right">
            <h3 class="c-grey pb-3">البحث عن المستندات</h3>
        </div>
        <form class="d-flex" role="search">
            <input wire:model.live="searchDoc" class="form-control me-2" aria-label="Search" type="search" name="search" placeholder="Search..." required>
            <i class="ti-search"></i>
        </form>
        @if (!empty($documents) && count($documents) > 0)
        <div class="row mt-4 mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body overflow-x-scroll">
                        <div class="up-card t-right">
                            <h3 class="c-grey pb-3">عرض المستندات</h3>
                        </div>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-light">
                                        <tr>
                                            <th scope="col">المستند</th>
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
                                        @foreach ($documents as $document)
                                            <tr onclick="tableDoc({{ $document->id }})">
                                                <td>
                                                    @if ($document->selectfileDoc)
                                                        @php
                                                            $fileExtension = pathinfo($document->selectfileDoc, PATHINFO_EXTENSION);
                                                            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                        @endphp

                                                        @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                            <img src="{{ asset('images/' . $document->selectfileDoc) }}" alt="Image" width="100" height="100">
                                                        @else
                                                            <i class="fas fa-file" style="color: #007bff; font-size: 25px;" title="ملف"></i>
                                                        @endif
                                                    @else
                                                        <p>No File</p>
                                                    @endif
                                                </td>
                                                <td>{{ $document->nameDoc }}</td>
                                                <td>{{ $document->textKey }}</td>
                                                <td>{{ $document->dicraption }}</td>
                                                <td>{{ $document->conditionDoc }}</td>
                                                <td>{{ $document->sideDoc }}</td>
                                                <td>{{ $document->created_at }}</td>
                                                <td>
                                                    <a onclick="showEditAlertDoc({{ $document->id }})">
                                                        <i class="fas fa-edit" style="color: #007bff;"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a onclick="confirmDeleteDoc({{ $document->id }})">
                                                        <svg class="svg-inline--fa fa-trash-can bg-red-600" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="color: red;">
                                                            <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                                                        </svg>
                                                    </a>
                                                    <form id="delete-form-{{ $document->id }}" action="{{ route('documents.delete', $document->id) }}" method="POST" style="display: none;">
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
        @endif
    </div>
</div>
