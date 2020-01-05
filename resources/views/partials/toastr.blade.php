<script src="{{ asset('back/js/toastr.js') }}" ></script>
<script type="text/javascript">
   @if(Session::has('success'))
   toastr.success("{{Session::get('success')}}")
   @else if(Session::has('error'))
    toastr.error("{{Session::get('success')}}")
   @endif
</script>