<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html">
                </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="{{ route('archives.index') }}"><i class="fa-solid fa-house"></i> <span>الرئيسية</span></a></li>
                    <li class="">
                        <a aria-expanded="true" href="{{ route('archives.index') }}"><i class="fas fa-folder-open"></i>
                            <span>الأرشيف</span>
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                            </svg>
                        </a>
                        <ul class="collapse">
                            <li class="nav-link">
                                <a href="{{ route('documents.documents') }}">
                                    <i class="fas fa-file-alt"></i> <span>المستندات</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('Files.Files') }}">
                                    <i class="fas fa-file"></i> <span>الملفات</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('Picture.Pictures') }}">
                                    <i class="fas fa-images"></i> <span>الصور</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ route('Videos.Videos') }}">
                                    <i class="fas fa-video"></i> <span>الفيديوهات</span>
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="">
                        <a href="{{ route('Search.Search') }}"><i class="fa-solid fa-magnifying-glass"></i> <span>البحث</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('Sections.Sections') }}"><i class="fa-solid fa-list"></i> <span>الاقسام</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('Entity.Entity') }}"><i class="fa-solid fa-building"></i> <span>الجهة</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
