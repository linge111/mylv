@extends("public.index")
@section("title","修改页")
@section("body")
<form action="/user/{{$arr -> id}}" method="post">
	账号：<input type="text" name="zh" value="{{$arr -> zh}}"><br> 
	密码：<input type="text" name="mm" value="{{$arr -> mm}}"><br> 
	图片：<input type="file" name="sj" value="{{$arr -> sj}}"><br>
	{{csrf_field()}}
	{{method_field("put")}}
	<input type="submit" value="修改"> 
	
</form>
@endsection