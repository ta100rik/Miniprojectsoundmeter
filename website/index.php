<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script language="JavaScript">
		<!--
		//you can assign the initial color of the background here
		r=255;
		g=255;
		b=255;
		flag=0;
		t=new Array;
		o=new Array;
		d=new Array;
		function hex(a,c)
		{
		t[a]=Math.floor(c/16)
		o[a]=c%16
		switch (t[a])
		{
		case 10:
		t[a]='A';
		break;
		case 11:
		t[a]='B';
		break;
		case 12:
		t[a]='C';
		break;
		case 13:
		t[a]='D';
		break;
		case 14:
		t[a]='E';
		break;
		case 15:
		t[a]='F';
		break;
		default:
		break;
		}
		switch (o[a])
		{
		case 10:
		o[a]='A';
		break;
		case 11:
		o[a]='B';
		break;
		case 12:
		o[a]='C';
		break;
		case 13:
		o[a]='D';
		break;
		case 14:
		o[a]='E';
		break;
		case 15:
		o[a]='F';
		break;
		default:
		break;
		}
		}
		function ran(a,c)
		{
		if ((Math.random()>2/3||c==0)&&c<255)
		{
		c++
		d[a]=2;
		}
		else
		{
		if ((Math.random()<=1/2||c==255)&&c>0)
		{
		c--
		d[a]=1;
		}
		else d[a]=0;
		}
		return c
		}
		function do_it(a,c)
		{
		if ((d[a]==2&&c<255)||c==0)
		{
		c++
		d[a]=2
		}
		else
		if ((d[a]==1&&c>0)||c==255)
		{
		c--;
		d[a]=1;
		}
		if (a==3)
		{
		if (d[1]==0&&d[2]==0&&d[3]==0)
		flag=1
		}
		return c
		}
		function disco()
		{
		if (flag==0)
		{
		r=ran(1, r);
		g=ran(2, g);
		b=ran(3, b);
		hex(1,r)
		hex(2,g)
		hex(3,b)
		document.body.style.background="#"+t[1]+o[1]+t[2]+o[2]+t[3]+o[3]
		flag=50
		}
		else
		{
		r=do_it(1, r)
		g=do_it(2,g)
		b=do_it(3,b)
		hex(1,r)
		hex(2,g)
		hex(3,b)
		document.body.style.background="#"+t[1]+o[1]+t[2]+o[2]+t[3]+o[3]
		flag--
		}
		setTimeout('disco()',40)
		}
		//-->
		</script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<style type="text/css">
		.center {
		width: 400px;
		height: 400px;
		background-color: white;
		position: absolute;
		top:0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		padding-top: 20px;
		border-radius: 15px;
		font-style:Arial;
		-webkit-box-shadow: 14px 10px 62px 0px rgba(122,122,122,1);
-moz-box-shadow: 14px 10px 62px 0px rgba(122,122,122,1);
box-shadow: 14px 10px 62px 0px rgba(122,122,122,1);
		/*box-shadow: 2px 2px 2px 2px black;*/
		}
		.form{
			padding-top: 20px;
			padding-bottom: 120px;
			padding-right: 60px;
			padding-left: 60px;
		}

		</style>
	</head>
	<!-- <body> -->
	<body onload="disco()">
		<div class="center">
			<center>
				<h3>Feedbacklamp</h3>
				<sub>Login</sub>
			</center>
			<form class="form" action="api/auth.php" method="POST">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
					<small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" name="Password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</body>
</html>
