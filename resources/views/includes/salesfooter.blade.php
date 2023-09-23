                   <!--begin::Footer-->
                   <div id="kt_app_footer" class="app-footer ">
                       <!--begin::Footer container-->
                       <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                           <!--begin::Copyright-->
                           <div class="text-dark order-2 order-md-1">
                               <span class="text-muted fw-semibold me-1">2023&copy;</span>
                               <a href="" target="_blank" class="text-gray-800 text-hover-primary">Lern.Africa</a>
                           </div>
                           <!--end::Copyright-->


                       </div>
                       <!--end::Footer container-->
                   </div>
                   <!--end::Footer-->
                   </div>
                   <!--end:::Main-->


                   </div>
                   <!--end::Wrapper-->


                   </div>
                   <!--end::Page-->
                   </div>
                   <!--end::App-->

                   <!--begin::Scrolltop-->
                   <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                       <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
                   </div>
                   <!--end::Scrolltop-->

                   <!--begin::Modals-->




                   <!--begin::Javascript-->



                   <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                   <script src="{{ asset('plugins/global/plugins.bundle.js')}}"></script>
                   <script src="{{ asset('js/scripts.bundle.js')}}"></script>
                   <!--end::Global Javascript Bundle-->

                   <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
                   <script>
    CKEDITOR.replace('other_information');
    CKEDITOR.replace('instructor_bio');
    CKEDITOR.replace('course_syllabus');
    CKEDITOR.replace('about_course');
</script>


<script>
                       function addFormField() {
                           var formFieldsContainer = $('#formFields');
                           var newField = $('<div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4">');
                           newField.html(
                               '<div class="col">' +
                               '<div class="fv-row mb-7">' +
                               '<label class="fs-6 fw-semibold form-label mt-3">' +
                               '<span class="required">Name</span>' +
                               '<span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact\'s email.">' +
                               '<i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>' +
                               '</span>' +
                               '</label>' +
                               '<input type="name" class="form-control form-control-solid" name="name[]" value="" />' +
                               '</div>' +
                               '</div>' +
                               '<div class="col">' +
                               '<div class="fv-row mb-7">' +
                               '<label class="fs-6 fw-semibold form-label mt-3">' +
                               '<span class="">Nickname</span>' +
                               '<span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact\'s nick name (optional).">' +
                               '<i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>' +
                               '</span>' +
                               '</label>' +
                               '<input type="text" class="form-control form-control-solid" name="nick_name[]" value="" />' +
                               '</div>' +
                               '</div>' +
                               '<div class="col">' +
                               '<div class="fv-row mb-7">' +
                               '<label class="fs-6 fw-semibold form-label mt-3">' +
                               '<span class="required">Phone</span>' +
                               '<span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact\'s phone number (optional).">' +
                               '<i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>' +
                               '</span>' +
                               '</label>' +
                               '<input type="text" class="form-control form-control-solid" name="phone_number[]" value="" required/>' +
                               '</div>' +
                               '</div>' +
                               '<div class="col">' +
                               '<div class="fv-row mt-11 mb-2">' +
                               '<button type="submit" name="submit" class="btn btn-primary">' +
                               '<span class="indicator-label">' +
                               'Save' +
                               '</span>' +
                               '</button>' +
                               '</div>' +
                               '</div>' +
                               '</div>'
                           );
                           formFieldsContainer.append(newField);
                       }
                   </script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->

<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchKeyword = $(this).val().toLowerCase();

            $.ajax({
                url: '{{ route('salecontact.search') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Add CSRF token for Laravel
                    search: searchKeyword
                },
                success: function (response) {
                    // Clear previous search results
                    $('#kt_contacts_list_body').empty();

                    if (response.length > 0) {
                        // Iterate over the search results and append them to the list
                        $.each(response, function (index, contact) {
                            var contactHtml = '<div class="d-flex flex-stack py-4">' +
                                '<div class="d-flex align-items-center w-100">' +
                                '<div class="ms-4 d-flex align-items-center flex-fill">' +
                                '<a href="' + contact.link + '" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2 me-2 flex-fill">' + contact.name + '</a>' +
                                '<div class="fw-semibold fs-7 text-muted flex-shrink-0">' +
                                '<a href="' + contact.editLink + '" class="btn btn-sm btn-primary me-2">Edit</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            $('#kt_contacts_list_body').append(contactHtml);
                        });
                    } else {
                        // Display "No contacts found" message
                        $('#kt_contacts_list_body').html('<p>No contacts found.</p>');
                    }
                }
            });
        });
    });
</script>

<!-- sales contact search -->
<script>
$(document).ready(function () {
    $('#ssearchInput').on('input', function () {
        var searchKeywords = $(this).val().toLowerCase();

        $.ajax({
            url: '{{ route('salescontact.search') }}',
            method: 'GET',
            data: {
                search: searchKeywords
            },
            success: function (response) {
                // Clear previous search results
                $('#kt_contacts_list_body').empty();

                if (response.length > 0) {
                    // Iterate over the search results and append them to the list
                    $.each(response, function (index, contact) {
                        var contactHtml = '<div class="d-flex flex-stack py-4">' +
                            '<div class="d-flex align-items-center w-100">' +
                            '<div class="ms-4 d-flex align-items-center flex-fill">' +
                            '<a href="' + contact.link + '" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2 me-2 flex-fill">' + contact.name + '</a>' +
                            '<div class="fw-semibold fs-7 text-muted flex-shrink-0">' +
                            '<a href="' + contact.editLink + '" class="btn btn-sm btn-primary me-2">Edit</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#kt_contacts_list_body').append(contactHtml);
                    });
                } else {
                    // Display "No contacts found" message
                    $('#kt_contacts_list_body').html('<p>No contacts found.</p>');
                }
            }
        });
    });
});

</script>
                   <!--begin::Vendors Javascript(used for this page only)-->
                   <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/index.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/xy.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/percent.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/radar.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/themes/Animated.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/map.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
                   <script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
                   <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
                   <!--end::Vendors Javascript-->

                   <!--begin::Custom Javascript(used for this page only)-->
                   <script src="{{ asset('js/widgets.bundle.js')}}"></script>
                   <script src="{{ asset('js/custom/apps/chat/chat.js')}}"></script>
                   <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js')}}"></script>
                   <script src="{{ asset('js/custom/utilities/modals/create-campaign.js')}}"></script>
                   <script src="{{ asset('js/custom/utilities/modals/users-search.js')}}"></script>
                   <!--end::Custom Javascript-->
                   <!--end::Javascript-->

                   </body>

                   </html>
