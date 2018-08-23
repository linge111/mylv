@extends("public.index")
@section("title","用户添加")
@section("body")
@if(count($errors) > 0)
	@foreach($errors -> all() as $error)
		{{$error}}
	@endforeach
@endif
<form action="/user" method="post" enctype="multipart/form-data">
	用户名：<input type="text" name="zh" value="{{Old('zh')}}"><br>
	  密码：<input type="text" name="mm" value="{{Old('mm')}}"><br>
	  图片：<input type="file" name="sj" ><br>
	  {{csrf_field()}}
	  <input type="submit" value="添加">
</form>
@endsection