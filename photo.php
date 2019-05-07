<?php


define('NO_CACHE', true);
require_once ('_config.inc.php');


?>
<!DOCTYPE html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<title><? echo $_GET['title'];?></title>
</head>

<script language="JavaScript">
<!--
function loaded() {

    var x = document.myimg.width+10;
    var y = document.myimg.height+60;
    if (x > 1024) x = 1024;
    if (y > 730) y = 730;
    window.resizeTo(x,y);
}
//-->
</script>

<body bgcolor="#ffffff" leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
<?php


$img = (isset($_GET['img'])) ? $_GET['img'] : $img;
$type= (isset($_GET['type'])) ? $_GET['type'] : "";
$maxw= (isset($_GET['maxw'])) ? $_GET['maxw'] : "500";
$maxh= (isset($_GET['maxh'])) ? $_GET['maxh'] : "500";


?>
<center>
<a href="javascript:self.close();"><img name="myimg" src="image.php?i=<?=$img?>&maxw=<?=$maxw?>&maxh=<?=$maxh?>&type=<?=$type?>" border=0 
    onLoad="loaded();" alt=" " ></a>
</center>

</body>
</html>
