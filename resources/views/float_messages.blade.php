@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ $message }}</strong>
</div>

<script>
  $(".alert").alert();
</script>

@endif



@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ $message }}</strong>
  </div>

  <script>
    $(".alert").alert();
  </script>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show rounded-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ $message }}</strong>
  </div>

  <script>
    $(".alert").alert();
  </script>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show rounded-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ $message }}</strong>
  </div>

  <script>
    $(".alert").alert();
  </script>

@endif



@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Please check the form below for errors</strong>
  </div>

  <script>
    $(".alert").alert();
  </script>


@endif
