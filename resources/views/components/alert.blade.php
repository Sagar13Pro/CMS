<div class="alert-box">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Alerts!</strong> {{ $error }}
    </div>
    @endforeach
    @endif

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
</div>
