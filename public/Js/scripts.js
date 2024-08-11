(function ($) {
    "use strict";

    /*================================
    Preloader
    ==================================*/

    var preloader = $("#preloader");
    $(window).on("load", function () {
        setTimeout(function () {
            preloader.fadeOut("slow", function () {
                $(this).remove();
            });
        }, 300);
    });

    /*================================
    sidebar collapsing
    ==================================*/
    if (window.innerWidth <= 1364) {
        $(".page-container").addClass("sbar_collapsed");
    }
    $(".nav-btn").on("click", function () {
        $(".page-container").toggleClass("sbar_collapsed");
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function () {
        var e =
            (window.innerHeight > 0 ? window.innerHeight : this.screen.height) -
            5;
        (e -= 67) < 1 && (e = 1),
            e > 67 && $(".main-content").css("min-height", e + "px");
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $(".menu-inner").slimScroll({
        height: "auto",
    });
    $(".nofity-list").slimScroll({
        height: "435px",
    });
    $(".timeline-area").slimScroll({
        height: "500px",
    });
    $(".recent-activity").slimScroll({
        height: "calc(100vh - 114px)",
    });
    $(".settings-list").slimScroll({
        height: "calc(100vh - 158px)",
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop(),
            mainHeader = $("#sticky-header"),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover();

    /*------------- Start form Validation -------------*/
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false
                    );
                }
            );
        },
        false
    );

    /*================================
    datatable active
    ==================================*/
    if ($("#dataTable").length) {
        $("#dataTable").DataTable({
            responsive: true,
        });
    }
    if ($("#dataTable2").length) {
        $("#dataTable2").DataTable({
            responsive: true,
        });
    }
    if ($("#dataTable3").length) {
        $("#dataTable3").DataTable({
            responsive: true,
        });
    }

    /*================================
    Slicknav mobile menu
    ==================================*/
    $("ul#nav_menu").slicknav({
        prependTo: "#mobile_menu",
    });

    /*================================
    login form
    ==================================*/
    $(".form-gp input").on("focus", function () {
        $(this).parent(".form-gp").addClass("focused");
    });
    $(".form-gp input").on("focusout", function () {
        if ($(this).val().length === 0) {
            $(this).parent(".form-gp").removeClass("focused");
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $(".settings-btn, .offset-close").on("click", function () {
        $(".offset-area").toggleClass("show_hide");
        $(".settings-btn").toggleClass("active");
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $(".testimonial-carousel").owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                450: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
                1360: {
                    items: 1,
                },
                1600: {
                    items: 2,
                },
            },
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($("#full-view").length) {
        var requestFullscreen = function (ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log("Fullscreen API is not supported.");
            }
        };

        var exitFullscreen = function () {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log("Fullscreen API is not supported.");
            }
        };

        var fsDocButton = document.getElementById("full-view");
        var fsExitDocButton = document.getElementById("full-view-exit");

        fsDocButton.addEventListener("click", function (e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $("body").addClass("expanded");
        });

        fsExitDocButton.addEventListener("click", function (e) {
            e.preventDefault();
            exitFullscreen();
            $("body").removeClass("expanded");
        });
    }
})(jQuery);


// Edite Delete ShowTable for all page

// Docment


// Edite
function showEditAlertDoc(documentId) {
    event.stopPropagation();
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-document/" + documentId)
        .then((response) => {
            const document = response.data;

            Swal.fire({
                title: "تعديل المستند",
                html: `
                <div class="swal2-html-container pr-3 pl-3" id="swal2-html-container" style="overflow: hidden;">
                <input type="text" id="nameDoc" class="swal2-input form-control mb-3" value="${document.nameDoc}" placeholder="اسم المستند">
                <select id="conditionDoc" class="swal2-input form-control mb-3">
                    <option value="financial-reports" ${document.conditionDoc == "financial-reports" ? "selected" : ""}>تقارير مالية</option>
                    <option value="correspondence" ${document.conditionDoc == "correspondence" ? "selected" : ""}>مراسلات</option>
                    <option value="contracts" ${document.conditionDoc == "contracts" ? "selected" : ""}>عقود</option>
                </select>
                <select id="sideDoc" class="swal2-input form-control mb-3">
                    <option value="داخلية" ${document.sideDoc == "داخلية" ? "selected" : ""}>داخلية</option>
                    <option value="خارجية" ${document.sideDoc == "خارجية" ? "selected" : ""}>خارجية</option>
                </select>
                <input type="text" id="textKey" class="swal2-input form-control mb-3 m-0" value="${document.textKey}" placeholder="الكلمات المفتاحية">
                <input type="file" id="selectfileDoc" class="swal2-input form-control mb-3 m-0" placeholder=" ">
                <textarea id="dicraption" class="swal2-input form-control mb-3" placeholder="الوصف">${document.dicraption}</textarea>
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: "حفظ",
                cancelButtonText: "إلغاء",
                preConfirm: () => {
                    const fileInput = Swal.getPopup().querySelector("#selectfileDoc");
                    const formData = new FormData();
                    formData.append('id', document.id);
                    formData.append('nameDoc', Swal.getPopup().querySelector("#nameDoc").value);
                    formData.append('conditionDoc', Swal.getPopup().querySelector("#conditionDoc").value);
                    formData.append('sideDoc', Swal.getPopup().querySelector("#sideDoc").value);
                    formData.append('textKey', Swal.getPopup().querySelector("#textKey").value);
                    formData.append('dicraption', Swal.getPopup().querySelector("#dicraption").value);
                    if (fileInput.files[0]) {
                        formData.append('selectfileDoc', fileInput.files[0]);
                    }
                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // إرسال البيانات إلى الخادم
                    axios
                        .post("/update-document", result.value, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire("تم التعديل!", "", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("حدث خطأ!", "", "error");
                            }
                        })
                        .catch((error) => {
                            Swal.fire("حدث خطأ!", "", "error");
                        });
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching document data:", error);
            Swal.fire("حدث خطأ في جلب بيانات المستند!", "", "error");
        });
}
// Show
function tableDoc(documentId) {
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-document/" + documentId)
        .then((response) => {
            const document = response.data;
            // دالة للتحقق مما إذا كان الملف صورة
            function isImage(fileName) {
                const imageExtensions = ["jpg", "jpeg", "png", "gif"];
                const fileExtension = fileName.split(".").pop().toLowerCase();
                return imageExtensions.includes(fileExtension);
            }
            Swal.fire({
                title: " المستند",
                html: `<div class="container">
                            <div class="row">
                            <div class="col-lg-6 mb-3 mt-3">
                                    <div class="d-flex flex-column align-items-start  c-grey">
                                        <h1 class="mb-3"> الاسم : ${
                                            document.nameDoc
                                        }</h1>
                                        <h3 class="mb-3"> الجاهة التابعة : ${
                                            document.sideDoc
                                        }</h3>
                                        <h3 class="mb-3"> الوصف : ${
                                            document.dicraption
                                        }</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 mt-3 d-flex justify-content-center align-items-center">
                                    ${
                                        document.selectfileDoc
                                            ? isImage(document.selectfileDoc)
                                                ? `<img src="/images/${document.selectfileDoc}" alt="Image" width="560" height="560">`
                                                : `<a class="d-flex align-items-cente flex-column" href="/images/${document.selectfileDoc}" target="_blank"> <i class="fas fa-file"
                                                    style="color: #007bff; font-size: 100px;"
                                                    title="ملف"></i> <h2 class="pt-3">تحميل </h2></a>`
                                            : `<p>No File</p>`
                                    }
                                </div>
                            </div>
                        </div>`,
            });
        })
        .catch((error) => {
            console.error("Error fetching document:", error);
        });
}
// // delete
function confirmDeleteDoc(documentId) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + documentId).submit();
        }
    });
}

// File

// Edite
function showEditAlertFile(documentId) {
    event.stopPropagation();
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-File/" + documentId)
        .then((response) => {
            const document = response.data;
            Swal.fire({
                title: "تعديل الملف",
                html: `
                <div class="swal2-html-container pr-3 pl-3" id="swal2-html-container" style="overflow: hidden;">
                <input type="text" id="nameFile" class="swal2-input form-control mb-3" value="${document.nameFile}" placeholder="اسم الملف">
                <select id="conditionFile" class="swal2-input form-control mb-3">
                    <option value="financial-reports" ${document.conditionFile == "financial-reports" ? "selected" : ""}>تقارير مالية</option>
                    <option value="correspondence" ${document.conditionFile == "correspondence" ? "selected" : ""}>مراسلات</option>
                    <option value="contracts" ${document.conditionFile == "contracts" ? "selected" : ""}>عقود</option>
                </select>
                <select id="sideFile" class="swal2-input form-control mb-3">
                    <option value="داخلية" ${document.sideFile == "داخلية" ? "selected" : ""}>داخلية</option>
                    <option value="خارجية" ${document.sideFile == "خارجية" ? "selected" : ""}>خارجية</option>
                </select>
                <input type="text" id="textKey" class="swal2-input form-control mb-3 m-0" value="${document.textKey}" placeholder="الكلمات المفتاحية">
                <input type="file" id="selectfileFile" class="swal2-input form-control mb-3 m-0" placeholder=" ">
                <textarea id="dicraption" class="swal2-input form-control mb-3" placeholder="الوصف">${document.dicraption}</textarea>
                </div>
                `,
                showCancelButton: true,
                confirmButtonText: "حفظ",
                cancelButtonText: "إلغاء",
                preConfirm: () => {
                    const fileInput = Swal.getPopup().querySelector("#selectfileFile");
                    const formData = new FormData();
                    formData.append('id', document.id);
                    formData.append('nameFile', Swal.getPopup().querySelector("#nameFile").value);
                    formData.append('conditionFile', Swal.getPopup().querySelector("#conditionFile").value);
                    formData.append('sideFile', Swal.getPopup().querySelector("#sideFile").value);
                    formData.append('textKey', Swal.getPopup().querySelector("#textKey").value);
                    formData.append('dicraption', Swal.getPopup().querySelector("#dicraption").value);
                    if (fileInput.files[0]) {
                        formData.append('selectfileFile', fileInput.files[0]);
                    }
                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // إرسال البيانات إلى الخادم
                    axios
                        .post("/update-File", result.value, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire("تم التعديل!", "", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("حدث خطأ!", "", "error");
                            }
                        })
                        .catch((error) => {
                            Swal.fire("حدث خطأ!", "", "error");
                        });
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching File data:", error);
            Swal.fire("حدث خطأ في جلب بيانات المستند!", "", "error");
        });
}
// Showtable 
function tableFile(documentId) {
    axios
        .get("/get-File/" + documentId)
        .then((response) => {
            const document = response.data;
            function isImage(fileName) {
                const imageExtensions = ["jpg", "jpeg", "png", "gif"];
                const fileExtension = fileName.split(".").pop().toLowerCase();
                return imageExtensions.includes(fileExtension);
            }
            Swal.fire({
                title: " الملف",
                html: `<div class="container">
                            <div class="row">
                            <div class="col-lg-6 mb-3 mt-3">
                                    <div class="d-flex flex-column align-items-start c-grey">
                                        <h1 class="mb-3"> الاسم : ${document.nameFile}</h1>
                                        <h3 class="mb-3"> الجهة التابعة : ${document.sideFile}</h3>
                                        <h3 class="mb-3"> الوصف : ${document.dicraption}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 mt-3 d-flex justify-content-center align-items-center">
                                    ${document.selectfileFile ? isImage(document.selectfileFile) ? `<img src="/images/${document.selectfileFile}" alt="Image" width="560" height="560">` : `<a class="d-flex align-items-center flex-column" href="/images/${document.selectfileFile}" target="_blank"> <i class="fas fa-file" style="color: #007bff; font-size: 100px;" title="ملف"></i> <h2 class="pt-3">تحميل </h2></a>` : `<p>No File</p>`}
                                </div>
                            </div>
                        </div>`,
            });
        })
        .catch((error) => {
            console.error("Error fetching document:", error);
        });
}
// Delete
function confirmDeleteFile(documentId) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + documentId).submit();
        }
    });
}

// Picture


// // Edite
function showEditAlertPicture(documentId) {
    event.stopPropagation();
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-Picture/" + documentId)
        .then((response) => {
            const document = response.data;
            Swal.fire({
                title: "تعديل الصور",
                html: `
                <div class="swal2-html-container pr-3 pl-3" id="swal2-html-container" style="overflow: hidden;">
                <input type="text" id="namePic" class="swal2-input form-control mb-3" value="${document.namePic}" placeholder="اسم الملف">
                <select id="conditionPic" class="swal2-input form-control mb-3">
                    <option value="financial-reports" ${document.conditionPic == "financial-reports" ? "selected" : ""}>تقارير مالية</option>
                    <option value="correspondence" ${document.conditionPic == "correspondence" ? "selected" : ""}>مراسلات</option>
                    <option value="contracts" ${document.conditionPic == "contracts" ? "selected" : ""}>عقود</option>
                </select>
                <select id="sidePic" class="swal2-input form-control mb-3">
                    <option value="داخلية" ${document.sidePic == "داخلية" ? "selected" : ""}>داخلية</option>
                    <option value="خارجية" ${document.sidePic == "خارجية" ? "selected" : ""}>خارجية</option>
                </select>
                <input type="text" id="textKey" class="swal2-input form-control mb-3 m-0" value="${document.textKey}" placeholder="الكلمات المفتاحية">
                <textarea id="dicraption" class="swal2-input form-control mb-3" placeholder="الوصف">${document.dicraption}</textarea>
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: "حفظ",
                cancelButtonText: "إلغاء",
                preConfirm: () => {                   
                    const formData = new FormData();
                    formData.append('id', document.id);
                    formData.append('namePic', Swal.getPopup().querySelector("#namePic").value);
                    formData.append('conditionPic', Swal.getPopup().querySelector("#conditionPic").value);
                    formData.append('sidePic', Swal.getPopup().querySelector("#sidePic").value);
                    formData.append('textKey', Swal.getPopup().querySelector("#textKey").value);
                    formData.append('dicraption', Swal.getPopup().querySelector("#dicraption").value);
                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // إرسال البيانات إلى الخادم
                    axios
                        .post("/update-Picture", result.value, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire("تم التعديل!", "", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("حدث خطأ!", "", "error");
                            }
                        })
                        .catch((error) => {
                            Swal.fire("حدث خطأ!", "", "error");
                        });
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching pic data:", error);
            Swal.fire("حدث خطأ في جلب بيانات المستند!", "", "error");
        });
}
// Showtable picture
function confirmDeletePictureShow(pictureId, imageName) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            // إرسال طلب AJAX لحذف الصورة
            fetch(`/pictures/deleteShow/${pictureId}/${encodeURIComponent(imageName)}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    // إزالة العنصر DOM المقابل للصورة المحذوفة
                    document.querySelector(`[data-image="${imageName}"]`).closest('.col-lg-3').remove();
                    Swal.fire('تم', 'تم حذف الصورة بنجاح', 'success');
                } else {
                    Swal.fire('فشل', 'حدث خطأ أثناء حذف الصورة', 'error');
                }
            });
        }
    });
}
// Delete
function confirmDeletePicture(documentId) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + documentId).submit();
        }
    });
}


// Video

// // Edite
function showEditAlertVideo(documentId) {
    event.stopPropagation();
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-Video/" + documentId)
        .then((response) => {
            const document = response.data;
            Swal.fire({
                title: "تعديل الصور",
                html: `
                <div class="swal2-html-container pr-3 pl-3" id="swal2-html-container" style="overflow: hidden;">
                <input type="text" id="nameVid" class="swal2-input form-control mb-3" value="${document.nameVid}" placeholder="اسم الملف">
                <select id="conditionVid" class="swal2-input form-control mb-3">
                    <option value="financial-reports" ${document.conditionVid == "financial-reports" ? "selected" : ""}>تقارير مالية</option>
                    <option value="correspondence" ${document.conditionVid == "correspondence" ? "selected" : ""}>مراسلات</option>
                    <option value="contracts" ${document.conditionVid == "contracts" ? "selected" : ""}>عقود</option>
                </select>
                <select id="sideVid" class="swal2-input form-control mb-3">
                    <option value="داخلية" ${document.sideVid == "داخلية" ? "selected" : ""}>داخلية</option>
                    <option value="خارجية" ${document.sideVid == "خارجية" ? "selected" : ""}>خارجية</option>
                </select>
                <input type="text" id="textKey" class="swal2-input form-control mb-3 m-0" value="${document.textKey}" placeholder="الكلمات المفتاحية">
                <textarea id="dicraption" class="swal2-input form-control mb-3" placeholder="الوصف">${document.dicraption}</textarea>
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: "حفظ",
                cancelButtonText: "إلغاء",
                preConfirm: () => {
                    
                    const formData = new FormData();
                    formData.append('id', document.id);
                    formData.append('nameVid', Swal.getPopup().querySelector("#nameVid").value);
                    formData.append('conditionVid', Swal.getPopup().querySelector("#conditionVid").value);
                    formData.append('sideVid', Swal.getPopup().querySelector("#sideVid").value);
                    formData.append('textKey', Swal.getPopup().querySelector("#textKey").value);
                    formData.append('dicraption', Swal.getPopup().querySelector("#dicraption").value);
                    
                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // إرسال البيانات إلى الخادم
                    axios
                        .post("/update-Video", result.value, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire("تم التعديل!", "", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("حدث خطأ!", "", "error");
                            }
                        })
                        .catch((error) => {
                            Swal.fire("حدث خطأ!", "", "error");
                        });
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching Vid data:", error);
            Swal.fire("حدث خطأ في جلب بيانات المستند!", "", "error");
        });
}
// Show Video
function confirmDeleteVideoShow(VideoId, imageName) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            // إرسال طلب AJAX لحذف الصورة
            fetch(`/Videos/deleteShow/${VideoId}/${encodeURIComponent(imageName)}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    // إزالة العنصر DOM المقابل للصورة المحذوفة
                    let element = document.querySelector(`[data-image="${imageName}"]`).closest('.col-lg-3');
                    let parentElement = element.parentNode;
                    parentElement.removeChild(element);

                    // التحقق إذا كان العمود فارغًا بعد الحذف
                    if (parentElement.children.length === 0) {
                        // حذف الصف بأكمله
                        document.getElementById("delete-form-" + documentId).submit();
                    }

                    // التحقق إذا كان عدد الصور يساوي صفر
                    let remainingImages = document.querySelectorAll('.col-lg-3').length;
                    if (remainingImages === 0) {
                        // حذف الجدول بأكمله
                        document.getElementById("delete-form-" + documentId).submit();
                    }

                    Swal.fire('تم', 'تم حذف الملف بنجاح', 'success');
                } else {
                    Swal.fire('فشل', 'حدث خطأ أثناء حذف الملف', 'error');
                }
            });
        }
    });
}
// Delete
function confirmDeleteVideo(documentId) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + documentId).submit();
        }
    });
}


// Section

// // // // Edite

// Edite
function showEditAlertSection(SectionId) {
    event.stopPropagation();
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-Section/" + SectionId)
        .then((response) => {
            const document = response.data;
            Swal.fire({
                title: "تعديل القسم",
                html: `
                <div class="swal2-html-container pr-3 pl-3" id="swal2-html-container" style="overflow: hidden;">
                <input type="text" id="nameSection" class="swal2-input form-control mb-3" value="${document.nameSection}" placeholder="اسم القسم">
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: "حفظ",
                cancelButtonText: "إلغاء",
                preConfirm: () => {
                    const formData = new FormData();
                    formData.append('id', document.id);
                    formData.append('nameSection', Swal.getPopup().querySelector("#nameSection").value);

                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // إرسال البيانات إلى الخادم
                    axios
                        .post("/update-Section", result.value, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire("تم التعديل!", "", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("حدث خطأ!", "", "error");
                            }
                        })
                        .catch((error) => {
                            Swal.fire("حدث خطأ!", "", "error");
                        });
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching Section data:", error);
            Swal.fire("حدث خطأ في جلب بيانات المستند!", "", "error");
        });
}

function tableSection(SectionId) {
    // جلب البيانات باستخدام Ajax
    axios
        .get("/get-Section/" + SectionId)
        .then((response) => {
            const document = response.data;
            // دالة للتحقق مما إذا كان الملف صورة
            function isImage(fileName) {
                const imageExtensions = ["jpg", "jpeg", "png", "gif"];
                const fileExtension = fileName.split(".").pop().toLowerCase();
                return imageExtensions.includes(fileExtension);
            }
            Swal.fire({
                title: " القسم",
                html: `<div class="container">
                            <div class="row">
                            <div class="col-lg-6 mb-3 mt-3">
                                    <div class="d-flex flex-column align-items-start  c-grey">
                                        <h1 class="mb-3"> الاسم : ${
                                            document.nameSection
                                        }</h1>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>`,
            });
        })
        .catch((error) => {
            console.error("Error fetching Section:", error);
        });
}
// // delete
function confirmDeleteSection(SectionId) {
    event.stopPropagation();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من التراجع عن هذا!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم، احذف!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + documentId).submit();
        }
    });
}

