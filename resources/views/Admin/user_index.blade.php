@extends("public.index")
@section("title","用户首页")
@section("body")
<form action="/user">
<input type="text" name="ss" id="" value="{{$res['ss'] or ''}}">
<input type="submit" value="搜索">
</form>

<table border="1px" align="center" width="100%">
		<tr>
			<td>id</td>
			<td>name</td>
			<td>pass</td>
			<td>操作</td>
		</tr>
		@foreach($arr as $w)
		<tr>
			<td>{{$w -> id}}</td>
			<td>{{$w -> zh}}</td>
			<td>{{$w -> mm}}</td>
			<td>
			<form action="/user/{{$w -> id}}" method="post">
				{{method_field("delete")}}
				{{csrf_field()}}
				<input type="submit" value="删除">			
			</form><a href="/user/{{$w -> id}}/edit">修改</a></td>
		</tr>
		@endforeach
	</table>	
	<div id="pages">
		{{$arr -> appends($res) -> render()}}
	</div>
	
@endsection