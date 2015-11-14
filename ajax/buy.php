<?php
session_start();
require('../config/classes.php');
$class = new user_panel();
$vnum = mysqli_real_escape_string($class->conexion(), $_GET['id']);

/// CAPTURAR IP DEL USUARIO
$ip= $_SERVER['REMOTE_ADDR'];
/////////////////////////////

/// CHECKEAR QUE EL ITEM ESTE DENTRO DE LA TABLA DE ITEMS EN VENTA
$check = mysqli_query($class->conexion(),"SELECT classid,prices,count,rebate from player.item_proto_shop WHERE vnum='".$vnum."'");
$rows = mysqli_fetch_array($check,MYSQLI_ASSOC);
	if($rows['classid']){
		$arr_pos=array(45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45,45);
		$exec=mysqli_query($class->conexion(),"SELECT pos,vnum from player.item WHERE owner_id='".$_SESSION['id']."' and window='MALL' order by pos asc");
		if($exec){
			while($rs=mysqli_fetch_array($exec,MYSQLI_ASSOC)){
			$fg=mysqli_query($class->conexion(),"SELECT size from player.item_proto where vnum='".$rs['vnum']."'");
			$size=mysqli_fetch_array($fg,MYSQLI_ASSOC);
			for($k=$size['size'];$k>0;$k--){
			$x=$rs["pos"]+($size['size']-$k)*5;
			$arr_pos[$x]=$x;
			}
			}
			$arr_i=0;
			$guj=mysqli_query($class->conexion(),"SELECT count(id) as count FROM player.item WHERE owner_id='".$_SESSION['id']."'");
			$rf=mysqli_fetch_array($guj,MYSQLI_ASSOC);
			if($rf['count']){
			$pos=45;
			}else{
			$pos=0;
			}
			for($arr_i=0;$arr_i<45;$arr_i++){
			if($arr_pos[$arr_i]>44){
			$pos=$arr_i;
			break;
			}
			} 
			$kil=mysqli_query($class->conexion(), "SELECT size from player.item_proto where vnum='".$vnum."'");
			$item_size=mysqli_fetch_array($kil,MYSQLI_ASSOC);
			if($pos>44 || $pos+($item_size['size']-1)*5 > 44){
				return false;
			}
				else {
					$exec=mysqli_query($class->conexion(), "SELECT pos FROM player.item where owner_id='".$_SESSION["id"]."' and window='MALL' order by pos asc");
					while($rs=mysqli_fetch_array($exec,MYSQLI_ASSOC)){
					$i+=1;
					}
					$exec=mysqli_query($class->conexion(),"SELECT id from player.item where LENGTH(id)=9 order by id desc limit 1");
					$rs=mysqli_fetch_array($exec,MYSQLI_ASSOC);
					if ($rs) {
					if($rs['id'] >= 400000200){
					$id=$rs['id'];
					}else{
					$id=400000200;
					}
					}else{
					$id=400000200;
					}
					$id++;
					$socket0 = 1;
					$socket1 = 1;
					switch ($vnum) {
					case 189:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					case 199:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					case 3169:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					case 1139:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					case 2179:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					case 5129:
					$attrtype0=72;
					$attrvalue0=1;
					$attrtype1=71;
					$attrvalue1=1;
					break;
					default:
					$attrtype0=0;
					$attrvalue0=0;
					$attrtype1=0;
					$attrvalue1=0;
					break;
					}
					$tot = $rows['prices'] - ($rows['prices']*$rows['rebate']/100);
					$precio_final = number_format($tot,0);
					if($class->get_coins($_SESSION['id']) >= $precio_final) {
					$insertar = mysqli_query($class->conexion(), "INSERT INTO player.item (id,vnum,owner_id,window,pos,socket0,socket1,socket2,count,attrtype0,attrvalue0,attrtype1,attrvalue1) values (".$id.",'".$vnum."','".$_SESSION["id"]."','MALL','".$pos."','".$socket0."','".$socket1."','".$socket1."','".$rows['count']."','".$attrtype0."','".$attrvalue0."','".$attrtype1."','".$attrvalue1."')") ;
					if($insertar){
					//// INSERTAR LOG DE LA COMPRA
					$log= mysqli_query($class->conexion(), "INSERT INTO player.logs (fecha,account_id,vnum,prices,ip) values ('".$date."','".$_SESSION["id"]."','".$vnum."','".$precio_final."','".$ip."')");
					/// DESCONTAR COINS 
					$desc = mysqli_query($class->conexion(),"UPDATE account.account set coins = coins - '".$precio_final."' where id='".$_SESSION["id"]."' limit 1");
					/// AUMENTAR JCOINS
					$aume = mysqli_query($class->conexion(),"UPDATE account.account set jcoins = jcoins + '".$precio_final."' where id='".$_SESSION["id"]."' limit 1");
					echo $class->get_coins_joins_json($_SESSION['id']);	
			  		}
			  	else {
			  	return false;
			  }
			}			
		  }
		}
	  }
else {
	return false;
}

////  FIN DEL CHECKEO /////
?>