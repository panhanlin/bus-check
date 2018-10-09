<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>线路或站点查询结果如下</title>
	<style>
		.page{
			width: 1000px;
			margin: 0 auto;
		}
		.jz{
			text-align: center;
		}
		.rd{
			color: red;
			font-weight: bold;
		}
		.bl{
			color: blue;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php 
	//获取交互页面中表单元素的值
	$lineName= $_GET["lineName"];//获取线路号码
	//$sbtLine= $_GET["sbtLine"];
	$stationName=$_GET["stationName"];
	//$sbtStation=$_GET["sbtStation"];
	$startStation =$_GET["startStation"];
	$endStation =$_GET["endStation"];
	//$sbtAllStation=$_GET["sbtAllStation"];

	include("db.php");
	$lineArray = explode("\r", $db); //将每条线路的信息转换成一维数组 
	$rs =array();//将要存放详细信息的二维数组，起始位空
	$flag =0;
	
	foreach ($lineArray as  $values) {
		$sationArray = explode("|", $values);//将每条线路的各信息转换成一维数组
		$cnt =count($rs);

		//按线路查询
		if ($lineName<>"" and isset($_GET["sbtLine"])) {
			if(strstr($sationArray[0],$lineName)){
			$flag =1;//当有符合查询数据的，设置flag=1;
			}
		}	
		//按站点名进行查询
		if($stationName<>"" and isset($_GET["sbtStation"])){
			if(strstr($sationArray[3],$stationName)){
					$flag=1;
			}
		}
		//按起始站点查询
		if($startStation<>"" and $endStation<>"" and isset($_GET["sbtAllStation"])){
			if(strstr($sationArray[3],$startStation) and strstr($sationArray[3],$endStation)){
				$flag=1;
			}
		}
			

			if($flag){
		//向二维数组中添加元素
		$rs[$cnt]["line"]=$sationArray[0];
		$rs[$cnt]["time"]=$sationArray[1];
		$rs[$cnt]["zone"]=$sationArray[2];
		$rs[$cnt]["detail"]=$sationArray[3];
		$flag=0;
	} 
}
	//print_r($rs);
	?>
	<div class="page">
		<table width="1000" border="1" cellspacing="0">
			<tr>
				<td colspan="4" class="jz">深圳市公交线路查询结果</td>
			</tr>
			<tr>
				<td width="5%">线路</td>
				<td width="65%">详细站点</td>
				<td width="15%">站点区间</td>
				<td width="15%">发车时间</td>
			</tr>
			<?php foreach ($rs as $value) {
				
			 ?>
			 <tr>
			 	<td class="jz"><?php echo $value["line"]; ?></td>
			 	<td>
			 		<?php 
			 		if (isset($_GET["sbtLine"])) {
			 			echo $value["detail"];
			 		}
			 		if(isset($_GET["sbtStation"])){
			 			$redStr =str_replace($stationName, "<span class='rd'>$stationName</span>", $value["detail"]); 
			 		echo $redStr; }
			 		if(isset($_GET["sbtAllStation"])){
			 			$allStr = str_replace($startStation, "<span class='rd'>$startStation</span>", $value["detail"]);
			 			$allStr = str_replace($endStation, "<span class='bl'>$endStation</span>", $allStr);
			 			echo $allStr;
			 		}
			 		?>
			 		</td>
			 	<td class="jz"><?php echo $value["zone"]; ?></td>
			 	<td class="jz"><?php echo $value["time"]; ?></td>
			 </tr>
			 <?php } ?>
		</table>
</div>
	
</body>
</html>