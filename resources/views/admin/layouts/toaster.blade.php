@if (Session::has('success'))
    {{-- <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div> --}}
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('success') }}", 'Success');
        });
    </script>
@endif
@if (Session::has('error'))
    {{-- <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div> --}}
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('error') }}", 'Error');
        });
    </script>
@endif
@if (Session::has('warning'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('warning') }}", 'Warning');
        });
    </script>
@endif
@if (Session::has('info'))
    <script>
        $(document).ready(function() {
            toastr.info("{{ Session::get('info') }}", 'Info');
        });
    </script>
@endif

<style>
    li {
        font-size: 18px;
        padding: 4px;
    }

    #toast-container>.toast {
        background-image: none !important;
    }

    .toast-success {
        background-color: rgb(16, 126, 1) !important;
    }

    .toast-error {
        background-color: rgb(216, 4, 4) !important;
    }

    .toast-warning {
        background-color: rgb(206, 151, 0) !important;
    }

    .toast-info {
        background-color: rgb(2, 125, 173) !important;
    }

    #toast-container>.toast:before {
        position: fixed;
        font-family: FontAwesome;
        font-size: 24px;
        line-height: 18px;
        float: left;
        color: #FFF;
        padding-right: 0.5em;
        margin: auto 0.5em auto -1.5em;
    }

    #toast-container>.toast-warning:before {
        content: "\f003";
        background-color: rgb(206, 151, 0) !important;
    }

    #toast-container>.toast-error:before {
        content: "\f001";
        background-color: rgb(216, 4, 4) !important;
    }

    #toast-container>.toast-info:before {
        content: "\f005";
        background-color: rgb(2, 125, 173) !important;
    }

    #toast-container>.toast-success:before {
        content: "\f002";
        background-color: rgb(16, 126, 1) !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</link>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
