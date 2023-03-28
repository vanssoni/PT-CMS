$(document).ready(function() {
    $('#datatable').DataTable({language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}});
    $('.datatable').DataTable({language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}});
    $('body').on("click", ".delete",function(e) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'ml-2',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
        if (result.value) {
            console.log($(this).parent('form'));
            $(this).parent('form').submit();
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
              'Cancelled',
              '',
              'error'
          )
        }
        })
        return false;
    });
    $('.multiselect').select2({
        placeholder: "Select Below Options",
        allowClear: true
    });
    function searchForUsers(search){
        $.ajax({
            url: "/users/search",
            type: "GET",
            data: {
                search: search
            },
            success: function (data) {
                $('#search-dropdown').html(data.html);
            }
        });
    }
    $('#top-search').on('keyup', function () {
        var search = $(this).val();
        searchForUsers(search);
    });
   
});