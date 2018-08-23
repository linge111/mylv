<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{csrf_token()}}">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <title>Ajax</title>
</head>
<body>
    <h1><button class="b1">获取</button></h1>
    <h1><button class="b2">获取</button></h1>
   
</body>
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")
	}
});

$("button[class='b1']").click(function()
	{
		$.get("/3",{},function(data)
			{
				alert(data);
			});
	});

$("button[class='b2']").click(function()
	{
		$.post("/4",{},function(data)
		{
			alert(data);
		});
	});
</script>

</html>