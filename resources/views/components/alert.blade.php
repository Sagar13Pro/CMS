<div class="alert-box" style="margin: 1rem 5px 0 5px;">
    {{-- For Registration errors --}}
    @if ($type == 'mobile-error')
    @error('_mobile')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror
    @endif
    @if ($type == 'cpassword-error')
    @error('_password')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror
    @endif
    @if ($type == 'email-error')
    @error('_email')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror
    @endif

    {{-- For error with message or error --}}
    @if($type == 'ErrorMsg')
    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hurray!</strong> {{ session()->get('message') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!&#129325;</strong> {{ session()->get('error') }}
    </div>
    @endif
    @endif
    {{-- For Validation of New Complaints Field --}}
    @if($type = "ValidationError")
    @error('complaintNature')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror

    @error('pincode')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror

    @error('refNo')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror


    @error('complaintDetails')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror

    @error('document1')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror

    @error('document2')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>OPPS!</strong> {{ $message }}
    </div>
    @enderror

    @endif
</div>
<script>
    setTimeout(() => {
        if ($('.alert-box').length > 0) {
            $('.alert-box').remove();
        }
    }, 15000);

</script>
