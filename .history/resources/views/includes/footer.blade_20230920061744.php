

<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/countdown.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

<script src="{{js/video-player.js')}}"></script>

<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>


<script>
$(function () {

   $('.timer').countdown('2021/6/31', function(event) {
      var $this = $(this).html(event.strftime(''
        // + '<span>%w</span> weeks '
        + '<div class="time-count"><span class="text-time">%d</span> <span class="text-day">Day</span></div> '
        + '<div class="time-count"><span class="text-time">%H</span> <span class="text-day">Hours</span> </div> '
        + '<div class="time-count"><span class="text-time">%M</span> <span class="text-day">Min</span> </div> '
        + '<div class="time-count"><span class="text-time">%S</span> <span class="text-day">Sec</span> </div> '));
    });
});
</script>



                   <!--begin::Javascript-->






                   <script>
                       function addFormField() {
                           var formFieldsContainer = $('#formFields');
                           var newField = $('<div class="row">');
                           newField.html(
                               '<div class="col-lg-3 mb-3">' +
                               '<div class="form-group">' +
                               '<label class="mont-font fw-600 font-xsss">Name' +
                               '</label>' +
                               '<input type="text" class="form-control" name="name[]" value="" />' +
                               '</div>' +
                               '</div>' +
                               '<div class="col-lg-3 mb-3">' +
                               '<div class="form-group">' +
                               '<label class="mont-font fw-600 font-xsss">Nick Name' +
                               '</label>' +
                               '<input type="text" class="form-control" name="nick_name[]" value="" />' +
                               '</div>' +
                               '</div>' +
                               '<div class="col-lg-3 mb-3">' +
                               '<div class="form-group">' +
                               '<label class="mont-font fw-600 font-xsss"> Phone Number' +
                               '</label>' +
                               '<input type="text" class="form-control" name="phone_number[]" value="" />' +
                               '</div>' +
                               '</div>' +
                               '<div class="col-lg-3 mb-3" style="margin-top:22px!important">' +
                               '<button type="submit" name="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w170 rounded-lg d-inline-block" style="border: none;">Save</button>' +
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
                url: '{{ route('contact.search') }}',
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



                   <!--end::Javascript-->
</body>


</html>


