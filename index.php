<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>深圳公交线路查询系统</title>
	<style>
	*{
		text-align: center;
	}
		.ipt{
			width: 300px;
		}
		.ipt1{
			width: 138px;
		}
	</style>
</head>
<body>
	<table width="440" border="1" bordercolor="green" cellspacing="0">
		<form action="bus1.php" method="get">
			<tr>
				<td colspan="2">深圳公交线路查询系统</td>
			</tr>
			<tr>
				<td>线路号码:</td>
				<td><input type="text" name="lineName" id="lineName" value="请输入线路名称" class="ipt">
					<input type="submit" value="查询" name="sbtLine">
				</td>
			</tr>
			<tr>
				<td>公交站名:</td>
				<td>
					<input type="text" name="stationName" id="stationName" value="请输入站点名称" class="ipt">
					<input type="submit" value="查询" name="sbtStation">
				</td>
			</tr>
			<tr>
				<td>起始站点</td>
				<td>
					<input type="text" name="startStation" id="startStation" value="起始站点" class="ipt1">到
					<input type="text" name="endStation" id="endStation" value="结束站点" class="ipt1">
					<input type="submit" value="查询" name="sbtAllStation">
				</td>
			</tr>
		</form>
	</table>
</body>
</html>