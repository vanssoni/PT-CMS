@if (\Session::has('success') || \Session::has('error'))
    {{-- <link rel="stylesheet" type="text/css" href="/assets/css/sweetalert.css">
  
    <script src="/assets/js/sweetalert.js"></script> --}}

    <style>
        button.swal2-close {
            display: block !important;
        }

        .swal2-content {
            display: none;
        }
        button.swal2-close {
            padding-bottom: 25px !important;
        }
    </style>
@endif
@if (Session::has('success'))
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 300000
        });

        Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}'
        })
    </script>
@endif

@if (\Session::has('error'))

    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 300000
        });

        Toast.fire({
            icon: 'error',
            title: '{{ \Session::get('error') }}'
        })
    </script>
@endif
@if($errors->any())
    <script type="text/javascript">
        var errors = "{{json_encode($errors->getMessages())}}";
        errors = JSON.parse(errors.replace(/&quot;/g,'"'));
        // console.log(errors);
        jQuery.each(errors, function(key, value) {
            jQuery(`<span class="text-danger" role="alert">
                <strong>`+value[0]+`</strong>
            </span>`).insertAfter("input[name='"+key+"']");
            jQuery(`<span class="text-danger" role="alert">
                <strong>`+value[0]+`</strong>
            </span>`).insertAfter("select[name='"+key+"']");
        });

    </script>
@endif
@if(! empty(old()))
    <script type="text/javascript">
        var oldValues = "{{json_encode(old())}}";
        oldValues = JSON.parse(oldValues.replace(/&quot;/g,'"'));
         console.log(oldValues);
        jQuery.each(oldValues, function(key, value) {
            jQuery("input[name='"+key+"']").val(value);
        });

    </script>
@endif