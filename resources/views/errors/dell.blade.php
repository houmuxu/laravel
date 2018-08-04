@extends('common/uadmin')
@section('content')
<div calss =container >




<div class="bs-example">

      <div class="panel @if($data['info'] == 'error')
                        panel-danger
                        @else
                        panel-primary
                        @endif" style="width:200px; margin-left:40%;margin-top: 10%">
        <div class="panel-heading">
          <h3 class="panel-title" ></h3>
        </div>
        <div class="panel-body">
          {{$data['message']}}
        </div>
      </div>
</div>


    <script>
  function pload(){
    setTimeout("location.href='{{$data['url']}}'",2000);
  }
  pload();
</script>





















	
</div>
@endsection