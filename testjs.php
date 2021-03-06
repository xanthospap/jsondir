<?php
if (!empty($_GET['sumfile'])) { 
            $sumfile = $_GET['sumfile']; 
            $sumfile = basename($sumfile); 
//             $NETWORK = strtoupper($network);
       }
else {
        echo "<h1>Error.... no summary file selected</h1>";
}
// if (!empty($_GET['yeardoy'])) { 
//             $yeardoy = $_GET['yeardoy']; 
//             $yeardoy = basename($yeardoy); 
//        }
// else {
//         echo "Error.... select date!!";
// }
// if (!empty($_GET['soltype'])) { 
//             $soltype = $_GET['soltype']; 
//             $soltype = basename($soltype); 
//        }
// else {
//       	echo "Error.... select solution type!!";
// }

?>
<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
<script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
<script type="text/javascript" src="jquery.json2html/json2html.js"></script>
<script type="text/javascript" src="jquery.json2html/jquery.json2html.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="/beta2/css/main.css" /> -->
<link rel="stylesheet" type="text/css" href="/jsondir/sumjson.css" />
<link rel="stylesheet" type="text/css" href="/beta2/src/.login/jsondir/sumjson.css" />

<!--
<style>
table.tjson1{
	width:70%;
	height:15%;
	border-bottom:thin solid black;
	line-height:130%;
	font-size:100%;
	font-family:Georgia, Serif, "Times New Roman";
	margin-left:0%;
	margin-right:15%;
}
td.main{
width:30%;
valign:top; 
align:center;
text-align:center;
}

	.indent {margin-left:100px;}
	.pass {color:green;}
	.fail {color:red;}
	h2 {border-top:thin solid black;font-size:13pt;}
	h3 {border-top: thin dotted gray;font-size:11pt;}
</style>-->

<!--<script>
	function status(pass, obj)
	{
		if( pass ) {
			$(obj).html('Passed');
			$(obj).removeClass('fail');
			$(obj).addClass('pass');
		} else 
		{
			$(obj).html('Failed');
			$(obj).removeClass('pass');
			$(obj).addClass('fail');
		}
	}
</script>-->
<h1>Bernese automated scheme final Summary</h1>

<button onclick="javascript:$('.run').click();">Expand all cards</button>

<!------------------------------------ 1. command arguments -------------------------------------->
<h2>1. Command Arguments</h2>
<div class='indent'>
	<div id='command'>
		<h3>Command Arguments <span class='status'></span></h3> 
		<ul></ul>
	</div>
	<button id='runJSON1' class='run'>expand</button>
</div>

<!------------------------------------ 2. General Informations -------------------------------------->
<h2>2. General Informations </h2>
<div class='indent'>
	<div id='geninf'>
		<h3>Campaign informations <span class='status'></span></h3> 
		<ul></ul>
	</div>
	<div id='geninfpro'>
		<h3>Program Informations<span class='status'></span></h3> 
		<ul></ul>
	</div>
	<button id='runJSON2' class='run'>expand</button>
</div>

<!------------------------------------ 3. products -------------------------------------->
<h2>3. Products</h2>
<div class='indent'>
	<div id='products'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON3' class='run'>expand</button>
</div>

<!------------------------------------ 4. Solution Indetifiers -------------------------------------->
<h2>4. Solution Indetifiers</h2>
<div class='indent'>
	<div id='solind'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON4' class='run'>expand</button>
</div>

<!------------------------------------ 5. PCF Variables -------------------------------------->
<h2>5. PCF Variables</h2>
<div class='indent'>
	<div id='pcfvar'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON5' class='run'>expand</button>
</div>

<!------------------------------------ 6. Saved products -------------------------------------->
<h2>6. Saved products</h2>
<div class='indent'>
	<div id='saveproducts'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON6' class='run'>expand</button>
</div>

<!------------------------------------ 7. Warnings -------------------------------------->
<h2>7. Warnings</h2>
<div class='indent'>
	<div id='warnings'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON7' class='run'>expand</button>
</div>

<!------------------------------------ 8. Ambiguity Resolution SUmmary -------------------------------------->
<h2>8. Ambiguity Resolution SUmmary</h2>
<div class='indent'>
	<div id='ambsum'>
		<h3>Array of Objects <span class='status'></span></h3> 
		<ul></ul>
	</div>

	<button id='runJSON8' class='run'>expand</button>
</div>

<!------------------------------------ 9. addneq summary -------------------------------------->
<h2>9. AddNEQ Summary</h2>
<div class='indent'>
	<div id='addneqsum1'>
		<h3>ECEF X,Y,Z <span class='status'></span></h3> 
		<ul></ul>
	</div>
	<div id='addneqsum2'>
		<h3>Geodetic coordinates <span class='status'></span></h3> 
		<ul></ul>
	</div>
	<div id='addneqsum3'>
		<h3>Topocentric corrections <span class='status'></span></h3> 
		<ul></ul>
	</div>
	<button id='runJSON9' class='run'>expand</button>
</div>
<script>
var transform1 = 
		{tag:'table',class:'tjson1',children:[
			{tag:'tr',children:[
				{tag:'td',class:'main',html:'${switch}'},
				{tag:'td',html:'${arg}'}
			]}
		]};
var trans1h = {"switch":"<b>Switch</b>", "arg": "<b>Argument</b>"}

var transform2 = 
		{tag:'table',class:'geninf', children:[
		{tag:'tr',children:[
			{tag:'td',html:'campaign:'},
			{tag:'td',html:'<b>${campaign}</b>'}]},
		{tag:'tr',children:[
			{tag:'td',html:'User:'},
			{tag:'td',html:'${user}'}]},
		{tag:'tr',children:[
			{tag:'td',html:'Host:'},
			{tag:'td',html:'${host}'}]}
		]};
var transform21 = 
		{tag:'table',class:'geninf', children:[
		{tag:'tr',children:[
			{tag:'td',html:'Program Name:'},
			{tag:'td',html:'${name}'}]},
		{tag:'tr',children:[
			{tag:'td',html:'Version:'},
			{tag:'td',html:'${version}'}]},
		{tag:'tr',children:[
			{tag:'td',html:'Revision:'},
			{tag:'td',html:'${revision}'}]},
		{tag:'tr',children:[
			{tag:'td',html:'Last Update:'},
			{tag:'td',html:'${last_upd}'}]}
		]};
var transform3 = 
		{tag:'table',class:'products', children:[
		{tag:'tr',children:[
			{tag:'td',width:'10%', html:'${info}'},
			{tag:'td',width:'10%',html:'${ac}'},
			{tag:'td',width:'10%',html:'${format}'},
			{tag:'td',width:'30%',html:'${filename}'},
			{tag:'td',width:'10%',html:'${satsys}'},
			{tag:'td',width:'10%',html:'${host}'},
			{tag:'td',width:'10%',html:'${type}'}
		]}
		]};
var trans3h = {"info": "<b>Product</b>", "ac": "<b>AC</b>", "format": "<b>Format</b>", "filename": "<b>filename</b>", "satsys": "<b>Satellite sys</b>", "host": "<b>hostname</b>", "type": "<b>Type</b>"};

var transform4 = 
		{tag:'tr',children:[
			{tag:'td',html:'${description}'},
			{tag:'td',html:'${id}'}
		]};
var transform5 = 
		{tag:'table',class:'tjson1',children:[
		{tag:'tr',children:[
			{tag:'td',class:'main',html:'${var_name}'},
			{tag:'td',html:'${description}'},
			{tag:'td',class:'main',html:'${value}'}
		]}]};
var trans5h = {"var_name":"<b>Variable Name</b>", "description": "<b>Description</b>", "value": "<b>Value</b>" };

var transform6 =
		{tag:'table',class:'sproducts',children:[
		{tag:'tr',children:[
			{tag:'td',width:'10%', html:'${prod_type}'},
			{tag:'td',width:'6%', html:'${extension}'},
			{tag:'td',width:'7%', html:'${local_dir}'},
			{tag:'td',width:'7%', html:'${sol_type}'},
			{tag:'td',width:'20%', html:'${filename}'},
			{tag:'td',width:'20%', html:'${savedas}'},
			{tag:'td',width:'15%', html:'${host}'},
			{tag:'td',width:'15%', html:'${host_dir}'}
		]}
		]};
var trans6h = {"prod_type":"<b>Product Type</b>","extension":"<b>extension</b>","local_dir":"<b>local dir</b>","sol_type":"<b>solution type</b>","filename":"<b>filename</b>","savedas":"<b>saved as</b>","host":"<b>hostname</b>","host_dir":"<b>host directory</b>"};
		
var transform7 = 
		{tag:'tr',children:[
			{tag:'td',html:'${info}'},
			{tag:'td',html:'${id}'},
			{tag:'td',html:'${routine}'},
			{tag:'td',html:'${message}'}
		]};
var transform8 = 
		{tag:'table',class:'ambsum', children:[
		{tag:'tr',children:[
			{tag:'td', width:'10%', html:'${baseline}'},
			{tag:'td', width:'10%', html:'${station1}'},
			{tag:'td', width:'10%', html:'${station2}'},
			{tag:'td', width:'10%', html:'${length}'},
			{tag:'td', width:'10%', html:'${method}'},
			{tag:'td', width:'10%', html:'${num_of_ambs}'},
			{tag:'td', width:'10%', html:'${percent}'},
			{tag:'td', width:'10%', html:'${satsys}'}
		]}
		]};
var trans8h = {"baseline":"<b>Baseline</b>", "station1":"<b>sta1</b>", "station2":"<b>sta2</b>", "length": "<b>length (km)</b>", "method": "<b>Method</b>", "num_of_ambs": "<b>N. of Amb.</b>", "percent": "<b>Percentance</b>", "satsys": "<b>Satellite system</b>" };
		
var transform91= 
		{tag:'table',class:'addneqsum', children:[
		{tag:'tr',children:[
			{tag:'td',width:'10%',html:'${name}'},
			{tag:'td',width:'10%',html:'${xest}'},
			{tag:'td',width:'10%',html:'${yest}'},
			{tag:'td',width:'10%',html:'${zest}'},
			{tag:'td',width:'8%',html:'${xcor}'},
			{tag:'td',width:'8%',html:'${ycor}'},
			{tag:'td',width:'8%',html:'${zcor}'},
			{tag:'td',width:'8%',html:'${xrms}'},
			{tag:'td',width:'8%',html:'${yrms}'},
			{tag:'td',width:'8%',html:'${zrms}'},
			{tag:'td',width:'10%',html:'${adj}'}
		]}
		]};
var trans91h = {"name":"<b>code</b>","xest":"<b>xest</b>","yest":"<b>yest</b>","zest":"<b>zest</b>","xcor":"<b>xcor</b>","ycor":"<b>ycor</b>","zcor":"<b>zcor</b>","xrms":"<b>xrms</b>","yrms":"<b>yrms</b>","zrms":"<b>zrms</b>","adj":"<b>Adjust</b>"};

var transform92= 
		{tag:'table',class:'addneqsum', children:[
		{tag:'tr',children:[
			{tag:'td',width:'10%',html:'${name}'},
			{tag:'td',width:'10%',html:'${latest}'},
			{tag:'td',width:'10%',html:'${lonest}'},
			{tag:'td',width:'10%',html:'${hgtest}'},
			{tag:'td',width:'8%',html:'${latcor}'},
			{tag:'td',width:'8%',html:'${loncor}'},
			{tag:'td',width:'8%',html:'${hgtcor}'},
			{tag:'td',width:'8%',html:'${latrms}'},
			{tag:'td',width:'8%',html:'${lonrms}'},
			{tag:'td',width:'8%',html:'${hgtrms}'},
			{tag:'td',width:'10%',html:'${adj}'}
		]}
		]};
var trans92h = {"name":"<b>code</b>","latest":"<b>latest</b>","lonest":"<b>lonest</b>","hgtest":"<b>hgtest</b>","latcor":"<b>latcor</b>","loncor":"<b>loncor</b>","hgtcor":"<b>hgtcor</b>","latrms":"<b>latrms</b>","lonrms":"<b>lonrms</b>","hgtrms":"<b>hgtrms</b>","adj":"<b>Adjust</b>"};

var transform93= 
		{tag:'table',class:'addneqsum', children:[
		{tag:'tr',children:[
			{tag:'td',width:'10%',html:'${name}'},
			{tag:'td',width:'10%',html:'${latest}'},
			{tag:'td',width:'10%',html:'${lonest}'},
			{tag:'td',width:'10%',html:'${hgtest}'},
			{tag:'td',width:'8%',html:'${north}'},
			{tag:'td',width:'8%',html:'${east}'},
			{tag:'td',width:'8%',html:'${up}'},
			{tag:'td',width:'10%',html:'${adj}'}
		]}
		]};
var trans93h = {"name":"<b>code</b>","latest":"<b>latest</b>","lonest":"<b>lonest</b>","hgtest":"<b>hgtest</b>","north":"<b>north</b>","east":"<b>east</b>","up":"<b>up</b>","adj":"<b>Adjust</b>"};

	$(document).ready(function(){
		$.getJSON('<?php echo $sumfile ?>', function(data) {
		var command = data.command;
		var geninf = data.general_info;
		var geninfpro = data.general_info.program;
		var products = data.products;
			var p_dcb = data.products.dcb;
			var p_sp3 = data.products.sp3;
			var p_erp = data.products.erp;
			var p_ion = data.products.ion;
			var p_vmf1 = data.products.vmf1;
		var solution_identifiers = data.solution_identifiers;
		var pcf_variables = data.pcf_variables;
		var saved_products = data.saved_products;
		var amb_res_summary = data.amb_res_summary;
		var warnings = data.warnings;
		var warningsmes = JSON.stringify(data.warnings.message);
		var addneq_summary = data.addneq_summary;
/*
		for (var i = 0; i < 5; i++) {
		var info = data.warnings.info[i],
			id= data.warnings.id[i],
			routine = data.warnings.routine[i],
			message = {
			for (var j = 0; j < 5; j++) {
			" + "data.warnings.message[j]" + "
			};
		
		};*/
		$('#runJSON1').click(function() {
			$('#command ul').html('');
			$('#command ul').json2html(trans1h, transform1);
			$('#command ul').json2html(command, transform1);

		});
		$('#runJSON2').click(function() {

			$('#geninf ul').html('');
			$('#geninf ul').json2html(geninf, transform2);
			
			$('#geninfpro ul').html('');
			$('#geninfpro ul').json2html(geninfpro, transform21);
		});
		$('#runJSON3').click(function() {
			$('#products ul').html('');
			$('#products ul').json2html(trans3h, transform3);
			$('#products ul').json2html(p_dcb, transform3);
			$('#products ul').json2html(p_sp3, transform3);
			$('#products ul').json2html(p_erp, transform3);
			$('#products ul').json2html(p_ion, transform3);
			$('#products ul').json2html(p_vmf1, transform3);
		});
		$('#runJSON4').click(function() {
			$('#solind ul').html('');
			$('#solind ul').json2html(solution_identifiers, transform4);
		});
		$('#runJSON5').click(function() {
			$('#pcfvar ul').html('');
				  $('#pcfvar ul').json2html(trans5h, transform5);
			$('#pcfvar ul').json2html(pcf_variables, transform5);
		});
		$('#runJSON6').click(function() {
			$('#saveproducts ul').html('');
			$('#saveproducts ul').json2html(trans6h, transform6);
			$('#saveproducts ul').json2html(saved_products, transform6);
		});
		$('#runJSON7').click(function() {
			$('#warnings ul').html('');
			$('#warnings ul').json2html(warnings, transform7);
		});
		$('#runJSON8').click(function() {
			$('#ambsum ul').html('');
			$('#ambsum ul').json2html(trans8h, transform8);
			$('#ambsum ul').json2html(amb_res_summary, transform8);
		});
		$('#runJSON9').click(function() {
			$('#addneqsum1 ul').html('');
			$('#addneqsum1 ul').json2html(trans91h, transform91);
			$('#addneqsum1 ul').json2html(addneq_summary, transform91);
			$('#addneqsum2 ul').html('');
			$('#addneqsum2 ul').json2html(trans92h, transform92);
			$('#addneqsum2 ul').json2html(addneq_summary, transform92);
			$('#addneqsum3 ul').html('');
			$('#addneqsum3 ul').json2html(trans93h, transform93);
			$('#addneqsum3 ul').json2html(addneq_summary, transform93);

		});
		
		
	});
});
</script>
