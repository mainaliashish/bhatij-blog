@if($errors)
@foreach ($errors->all() as $error )
<ul class="list-group" style="padding: 12px;">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error:</strong> {{ $error  }}
    </div>
</ul>
@endforeach
@endif