<?php

/*
 * Remote Service Display module for ZPanelX and Sentora (uses XMWS)
 * Written by Bobby Allen, 05/04/2012. 
 * Edited by Ron-e [mail@auxio.eu]
 */
 
require_once 'conf.php';
require_once 'lib/servicestatus.inc.php';

if ($response_array['xmws']['content']['portstatus']['web'] == 1) { 
	$http = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">HTTP</div></div>';                       
}else{ 
    $http = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">HTTP</div></div>'; 
}

if ($response_array['xmws']['content']['portstatus']['ftp'] == 1) { 
	$ftp = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">FTP</div></div>';                       
}else{ 
    $ftp = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">FTP</div></div>'; 
}

if ($response_array['xmws']['content']['portstatus']['smtp'] == 1) { 
	$smtp = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">SMTP</div></div>';                       
}else{ 
    $smtp = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">SMTP</div></div>'; 
}

if ($response_array['xmws']['content']['portstatus']['pop3'] == 1) { 
	$pop3 = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">POP3</div></div>';                       
}else{ 
    $pop3 = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">POP3</div></div>'; 
}

if ($response_array['xmws']['content']['portstatus']['imap'] == 1) { 
	$imap = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">IMAP</div></div>';                       
}else{ 
    $imap = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">IMAP</div></div>'; 
}

if ($response_array['xmws']['content']['portstatus']['mysql'] == 1) { 
	$mysql = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">MySQL</div></div>';                       
}else{ 
    $mysql = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">MySQL</div></div>'; 
}

if ($dnsresponse_array['xmws']['content']['portstatus']['status'] == 1) { 
	$dns = '<div class="grid online"><div class="grid-top">Online</div><div class="grid-bottom">DNS</div></div>';                       
}else{ 
    $dns = '<div class="grid offline"><div class="grid-top">Offline</div><div class="grid-bottom">DNS</div></div>'; 
}

                    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Server Status</title>
		<style type="text/css">
			body{
				background: #efefef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAADmCAMAAAD2tAmJAAAAIVBMVEXr6+vo6Ojl5eXj4+Pt7e3g4ODn5+fh4eHq6urk5OTe3t7YvvZYAAAN+klEQVR42uWd6ZLkuA2EkzeJ939gf1nhPw5tWOtYj9SNmpk+RkWRQCIBgocoqZTaOl9jrl3GnqfF0ailtKirreih2eqMoV2qjvpeJWaZJVrsOsfUDK011Rsf6pTeVttDrQ+NiF5aOb2PMaLGiXPUTozTZu29zEbTi/ZinjlnUHLMuvpus426ab2WuRp/V43eaK4t9TNmNNoJZJwFgTX5zy7Ra3ETUUarrZW1qe9UzSXtXvasVM8d7VQ+X2hO5Yeba53UV2PTxKq1nD1bQbIRKn226DPO2GM1JEMLUUfstfca4wSfU3guatjoupFtt7H7HkBHU51faRb5+p6rUICKogpMumWrZ/baphTrrCHf30FYe2uCAvoVabezQpN6zukapdW9ThldrQhV+dX24/feEPHsVupCrd17HS7GFXCq/ayJKCi+um3S+zp1nnNGPwGeFYiCNtdpSCIDDcCjz92oqEME4OCu0mmno7ziCCKoAxcShQ4fqH7aMBHQs2hKpSl2Q6o+pwCpcvNoO/o+kMymDVqHdo3rQY1cLOoTuwM8fOQKtAn/bmywy5KNOzEIgrZtGDrA0wAMorHgzgMwXEFbixLAOs6MWiOmqxk9gGcv8FkfQ8OHUToFeykDcS18QZ4l8O+nLcjaYM6wOiBpCJD3tKbVQNDWioGRBXmr2mgF4/v+WYD1cCFiBWV39eczrEnoQw4kP2ZDqzF2s/7+HQMgMMyG/RW8NBV9tba7ygZPTZCO6TbAb1ABwrc2QBjBS7U5EXd2MICrgB/YnNYRkpqwAjYoa2Kt08HRDmJRAn35CtoYdqW1WhluqwFPoKB07IAEjFqoF9HtU63bSlGB3tW3OubcG8yL+diLELsF2nXbYm24rl/iXGOApdQhNhxetR2QLeFwgdp8tYnQRUGjAokAVNg1/h1h9b8wPIScuKyjJ1BCGvTqIFKxk3ah6cMv3cSYZks9YAAwyGt6wezYqIT/T6HVUNgRhlZEUDGyxumTO86Eh1hnIb8pgW6jo1KBzXYZYXZ9GkB439vXQCSHWqt0RKMBNSvSU8ES/xb48NE5i4pjcPnYVdQpYwVmfMIy1lANi3gqjMH7sLS4UGigwh2jasIU23R1rsDaaVs4ILVjdM3wsiqEabNvY1zsIxUx+x8MEzKfjmh0wuoqWkJF+2ystUIC2GF3jYYHg3DY+xeks6gGRA4gs067dp0IWrXwbFeCfyHvdPTGUfw/WAGKmDcOrN8Fpk7ar0fE4VmH+uEWUZ4C3OcQYAs1VTyCHwefxiQ4I85G07AOLg6MA+vhIuj3czWdauyTv+9UYJqwK4UwKB+GjBfFoSaqRuAhFjF6oV3UBi9L4RB3tqEqEyOIYgf8w9ADhwCA2jo0WXYiaBt2peaUCJgmXIcgkDRceBm9KnAKhalBa/Ae9gZInLBmHdN0Ki9y7Cmd+5AKNeB/rGhCVMg4DHftvgOtJtZDeeA1/Gi8YQqh/xCMEI0gAAJVlfssI4SVKiaHOOCNMlxzVmd+WaYRzf822rn3waExD7r55r4EAJTfKFrC/uz7iGaxjeQSnw05DGCT2gfU5PpxxJGol2oaxoOdy8QZddkzhbhB1N1HZkbbRci9cQR4a/lOd+ZCU/rvuSDwBd9Mz1qqa1lLW+BX+Y4dobylipgDMAmxo3YtYh4NgHDIYRjIYJiii7sizExgaKad+VKjYqd5HIMVSE+j2MvG3sUQ2Dns0mMCBBpugK1IXkezu7mTgZ6CLjrFnnlOOIa0tWMgDOr//q5/hbh8E0oLRg1H4IOmaIYZEHKobAe6LQoCNNhNUanpjZ9WM8qxssbvyKL0wpjpBT/RE1nI+4RR/kzPGGsObpvgvJuVKf2Y7y0GKtRw0KuHosVB7/eOTfWzunELQ0VEAydps2uPMffYM0BijdlpPqCpcz28vEyIj8jbxUZdC8uJG8cx0gjbTTkcWo91XJoT+gqbgrdUwykTH6shFR6wF1yGetrdfKAOiLoKDoU21M0fSAvygukTjLhuuxdsQahDMxgqY0bVo6DPKqjovKMfXeJfyjxBi3KOgZu2YDuawmoqrnbiotabyQoUZ7oSZAbybelMZTg9w1dRxem9fZeyxcjvvS1I0GajJPLZAfCVs1SRPgZmNDPXjIH6ILlQN1AjkNkRihYmQp71sVAfHU837wHvYFpb2pDA38X/EH5izVapv85QjQb2gbhdtzCnYLXKGYiLzKbuOZYD+RyeltQAbDT3DwTgDVkBGMssag8gCPdArnJVJ/tE5J86ENAPGQn/4UkMwUiISburzRF8Ff6Fe3NPaERFvRUNmi9osGg+wnZCaegPQu1X0EFlcKezHdAexeJrHDDwR21oDsvh/GB0MAvEchKCug7goYPgNFKx6HL/NbVC6EUzdnsHoXEAa7qTFQq1Ncfz0Opm/iPJ9KbsxSBH25i9dpo4e5j+A+pjsTFsQAnk23RjBW3C/rIcLYEbvIUSk8pNnlEWXBRCdSSFGdZ94STNBNtN6/SJPWkUDhzzY8AyIHJnEs4bJ0T8/yahugyXUqYLcj/LD1wH4RqliLhoFbadCUpLQXtIBFObAzvXAlz4g0inoIvt2n90nvEtS0WX7CjlxK0uPp9y4Kn/GJaZZlieAqoHbYd7YEU/4KVTkEZY3hlXePjZUAOmgjXw4HxU0kEHQEyuhS8D0RaK8c/Arw1yK2gRB8XsFB5jl2HcZseOC5UHTcwaFg/MAOKchljG+gN14wdIKNCl2STHfB1g42Bp+/Vm7nfKBvcFAOoSzVNaVjeLPklSXf0zMgxKoO4Q6FNPOG+ejmQIjBgIQYSmkQqWfMUI20GG9JTzXGryNSEowMkgczWimxPdOX9rNA6ZKkBNYKmO41RK1TCqLLOl0hA4O0XwdxtZgYmBiM8kpwaLipH30+9vRbPtN2iGVjMcDk4rAFTAbnfAzluL+wZC60wKqWjInZBmQMBz6tjbzN+gg8dNQD5wcwIfuPUBZtb0UGhTvZqeXel4a9EYnoK/A4EdTMtDnzFki26+dxwceKTp8aGHTFwSIMHGvdUWdK8LMseeOJhMIsr5xg81sHy3LrjhmfAGasEWfNLkKf0xKumJEcf7rq8n9l29v1ahDJM99ztW9ETO9X43q8uQI+VciZ7YtPT+gFUJ+v7pWu1y/JRaFyYFKrVdAsxMQj2xjPH+QF2d9gfx1fA4MznWcWabIVKGpb37NSe1oI2gwEAy/jgyR6XBTw8PhATDTyeHaAhnrSW0A2DqV4HrG/24PdrPncHXb1hY/+czODKF80ehFOS8X17SE8Z5P7HSm8Pl56bbnnuG4NWntDS+YmOQHkkpifzogtvS+oTpW9WUdvdVq6MEysxwWe0/kpfpD65E/aDMQ08g/n4mrAwLQfeTEvqRu5qvqf8/TP1TZK33dHv7+ZAVM4bpgzDHMesMWBVhPXfDdOf/Ml+ujE/XXNHTZa4/5bKRMs4aXNMsXUaTKQcsumQtKedLdCmact+p2jlfsPan+7wtw2KSnli8eX8MrgzUvN+RohSnydyPIR4U4MVMRBmOk7nf1qAMSc59xHxpm8TTa+R6as753S2eenfM/NQes0e68/e7Ko3Op0jrsBAfQHC8TzDpB0MmObJEN5vCkhwSoCce538fDd3wKskz9HpC7vcnex/bKvju8F03gTzJaSy6rEGlPBdAGbZA38d3ZThe5R5/PbEu8n6GrIw7Da7r3jLb868v6InA8X5iCOfWFzzbqL+dZN0kWT/7SV490Y2/7+O6eeAhyb4oZXgC474TkzON/Ccn6pNnp3dQza/YSqIL1inXGpRxB9u1v9WLA6Qn88wMu2XvI6j2V+wb1iUlT/mwtb7iEIupJ/aSvb9BTJePUp5lr8sOwZRWVbodFX+5B02XadScWcJXvHgqlOGU+vvXGuiJ+Y33d1ALS+VfsP6G10o4VivjdN6V7sr4hqIry5VxR/S1C1PGjV1XS3/L1sRLOEz5lgl9xRuZjm5GNFkGo19xYlnV5amllPvalGGcdT881c97nu1PMEPfsDe6ShlSuXsveeYk3ffns28m5pK85PnC55wv49T9ZESGDVLKsAn6fipdGXK5+9kb3bhSktPe1b9iK4m+Ye4AdmU8puM6ulWGOef7SZYUC0H32YluEMlyZGSGHfv3dFKG477vcyv9AcB/oP8qo/WumbEyrn9dB1a6zoxlDEoyYPm3DivDmUf3KRSQfcMmC02kyZ++62Ybbpbloy84Hxsw9Q1vQ0G1y8pLyqMidU3cMk5pKsPi3j3F9B279nTZrZ6y+9RNgE6y0V83omax8l+t8OY7bUY3kwRJ+ppveQt5xs1OV+voxqGSTJ8o41mt1+GdUmyjuF/7vSSnKd1UT6y3vr/BSpe5rJQnRV5Oxc05manLqTQpjwbQpQdIOcGnjG95uY6XlOL1b/edn+IbTna/DCRybu7Xb96f9/cJoSdWHt93c33Fm/OHLvNGOV/6h82/4PkpZXhz831CrfzTXe6l+PYNT3Aqw4b9+1VzZcgB7pNCZXzb3TVu6dXBx2O9mZ54zO19VijD5N3905HKEE/vdyHpie3J78/ap9zCfzWZHD7ydyp6ddvBY5tL9MQY9/0uSV9xYtnUZRCVcqpPTzyc+X6+oSfkeP9UCKV/erwZNt30TlnWPu9ayHGkmTJuIblOTSjFQsL9kD3/XtplHS4sSzkBpvYVubvu34CUYa+JLpMAKeOuvuNU5WumlfKUZf2zOZzfciqALv1yyuMTdXleIOVWhJTrttcpB13qSPnYzb8A0Sr9OzjLqVsAAAAASUVORK5CYII=) repeat;
				font-family: Tahoma, Geneva, sans-serif;
			}
			#wrapper {
				width: 546px;
				margin-right: auto;
				margin-left: auto;
				margin-top: 100px;
			}
			#top {
				background-color: #585858;
				background-image: -webkit-gradient(linear, left top, left bottom, from(#585858), to(#3d3d3d));
				background-image: -webkit-linear-gradient(top, #585858, #3d3d3d);
				background-image: -moz-linear-gradient(top, #585858, #3d3d3d);
				background-image: -ms-linear-gradient(top, #585858, #3d3d3d);
				background-image: -o-linear-gradient(top, #585858, #3d3d3d);
				background-image: linear-gradient(top, #585858, #3d3d3d);
				-webkit-border-radius: 4px 4px 4px 4px;
				-moz-border-radius: 4px 4px 4px 4px;
				border-radius: 4px 4px 4px 4px;
				clear: both;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#585858, endColorstr=#3d3d3d);
				height: 45px;
				margin: 0 15px 15px 15px;
				text-align: center;
				font-size: 16px;
				color: #FFF;
			}
			#top-status   {
				color: #FFF;
				font-size: 18px;
				height: 20px;
				width: 300px;
				margin-right: auto;
				margin-left: auto;
				padding-top: 12px;
			}
			.grid {
				background-color: #999;
				height: 100px;
				width: 150px;
				-webkit-border-radius: 6px;
				-moz-border-radius: 6px;
				border: 1px solid #d6d6d6;
				border-radius: 6px;
				background-color: #f9f9f9;
				font-size: 13px;
				float: left;
				margin: 15px;
			}
			.grid2 {
				background-color: #999;
				height: 100px;
				width: 330px;
				-webkit-border-radius: 6px;
				-moz-border-radius: 6px;
				border: 1px solid #d6d6d6;
				border-radius: 6px;
				background-color: #f9f9f9;
				font-size: 13px;
				float: left;
				margin: 15px;
			}
			.online {
				background-color: #DFFFDF;
			}
			.offline {
				background-color: #FFE6E6;
			}
			.grid-top {
				height: 50px;
				width: 150px;
				-webkit-border-radius: 6px 6px 0px 0px;
				-moz-border-radius: 6px 6px 0px 0px;
				border-radius: 6px 6px 0px 0px;
				font-size: 36px;
				text-align: center;
				margin-top: 15px;
			}
			.grid-bottom {
				height: 29px;
				width: 150px;
				background-color: #585858;
				background-image: -webkit-gradient(linear, left top, left bottom, from(#585858), to(#3d3d3d));
				background-image: -webkit-linear-gradient(top, #585858, #3d3d3d);
				background-image: -moz-linear-gradient(top, #585858, #3d3d3d);
				background-image: -ms-linear-gradient(top, #585858, #3d3d3d);
				background-image: -o-linear-gradient(top, #585858, #3d3d3d);
				background-image: linear-gradient(top, #585858, #3d3d3d);
				-webkit-border-radius: 0px 0px 6px 6px;
				-moz-border-radius: 0px 0px 6px 6px;
				border-radius: 0px 0px 6px 6px;
				text-align: center;
				padding-top: 6px;
				color: #FFF;
				font-size: 18px;
			}
			.grid2-top {
				height: 40px;
				width: 330px;
				-webkit-border-radius: 6px 6px 0px 0px;
				-moz-border-radius: 6px 6px 0px 0px;
				border-radius: 6px 6px 0px 0px;
				font-size: 20px;
				text-align: center;
				margin-top: 25px;
			}
			.grid2-bottom {
				height: 29px;
				width: 330px;
				background-color: #585858;
				background-image: -webkit-gradient(linear, left top, left bottom, from(#585858), to(#3d3d3d));
				background-image: -webkit-linear-gradient(top, #585858, #3d3d3d);
				background-image: -moz-linear-gradient(top, #585858, #3d3d3d);
				background-image: -ms-linear-gradient(top, #585858, #3d3d3d);
				background-image: -o-linear-gradient(top, #585858, #3d3d3d);
				background-image: linear-gradient(top, #585858, #3d3d3d);
				-webkit-border-radius: 0px 0px 6px 6px;
				-moz-border-radius: 0px 0px 6px 6px;
				border-radius: 0px 0px 6px 6px;
				text-align: center;
				padding-top: 6px;
				color: #FFF;
				font-size: 18px;
			}
			#footer {
				margin-right: 15px;
				margin-left: 15px;
				margin-top: 15px;
				clear: both;
				text-align: right;
				color: #000;
				text-decoration: none;
				font-size: 12px;
			}
			#footer a {
				color: #000;
				font-size: 12px;
			}
			#footer a:hover {
				font-weight: 400;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="top">
				<div id="top-status">Server Status</div>
			</div>
			<?php echo $http; ?>
			<?php echo $ftp; ?>
			<?php echo $mysql; ?>
			<?php echo $smtp; ?>
			<?php echo $pop3; ?>
			<?php echo $imap; ?>
			<?php echo $dns; ?>
			<div class="grid2">
				<div class="grid2-top"><?php echo $response_array['xmws']['content']['serveruptime']; ?></div>
				<div class="grid2-bottom">Uptime</div>
			</div>
			<div id="footer">Download this thing at <a href="https://github.com/auxio/RemoteServiceStatus" target="_blank">Github</a> - Powered by <a href="http://auxio.eu/" target="_blank">Auxio</a></div>
		</div>
	</body>
</html>
