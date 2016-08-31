<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>学生信息管理</title>
		<style type="text/css">
			ul.pagination{
				list-style-type:none;
			}
			ul >li {
				float:left;
				padding-left:100px;
			}

		</style>
	</head>
	<body>
		<center>
			@include("stu.menu")
			<h3>浏览学生信息</h3>
			<table width="500" border="1">
                <tr>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>班级</th>
                    <th>操作</th>
                </tr>
               @foreach ($list as $stu)
				<tr>
					<td>{{ $stu->id }}</td>
					<td>{{ $stu->name }}</td>
					<td>{{ $stu->sex }}</td>
					<td>{{ $stu->age }}</td>
					<td>{{ $stu->classid }}</td>
					<td>&nbsp;
						<a href="/stu/{{$stu->id}}/edit">编辑</a>&nbsp;|&nbsp;
						<a href="">删除</a>
					</td>
				</tr>	
			   @endforeach
            </table>
			{!!$list->render()!!}
		</center>
	</body>
</html>

