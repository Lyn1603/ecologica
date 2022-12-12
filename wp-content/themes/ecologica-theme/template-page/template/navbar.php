

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Headers - 10</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<div class="nav">
			<input type="checkbox" id="nav-check">
			<div class="nav-header">
				<div class="nav-title">
					<img src="https://cdn.discordapp.com/attachments/1030057813835251772/1051855310127644692/Ecologo.png" alt="" width="200" height="30">
				</div>
			</div>
			<div class="nav-links">
				<a href="http://localhost/ecologica/ecologica/" target="">Acceuil</a>
				<a href="http://localhost/ecologica/ecologica/ecologica" target="">Ecologica</a>
				<a href="http://localhost/ecologica/ecologica/les-formations" target="">Les Formations</a>
				<a href="http://localhost/ecologica/ecologica/candidater" target="">Candidater</a>
				<a href="http://localhost/ecologica/ecologica/contact" target="">Contact</a>
			</div>
			<div class = "candid">
				<a href= "http://localhost/ecologica/ecologica/candidater" ><p>Candidater</p></a>
			</div>
		</div>
		<style>
			*
			{
				box-sizing: border-box;
			}

			body
			{
				margin: 0px;
				font-family: 'segoe ui';
			}

			.nav
			{
				height: 100px;
				width: 100%;
				background-color : #293C4B;
				position: relative;
			}

			.nav > .nav-header
			{
				display: inline;
			}

			.nav > .nav-header > .nav-title
			{
				display: inline-block;
				font-size: 22px;
				color: #fff;
				padding: 10px 10px 10px 10px;
				margin-top : 20px;
				margin-left : 20px;
			}

			.nav > .nav-btn
			{
				display: none;
			}

			.nav > .nav-links
			{
				display: inline;
				margin-left: 250px;
				font-size: 18px;
			}

			.nav > .nav-links > a
			{
				display: inline-block;
				padding: 13px 10px 13px 10px;
				text-decoration: none;
				color: #efefef;
			}

			.nav > .nav-links > a:hover
			{
				background-color: rgba(0, 0, 0, 0.3);
			}

			.nav > #nav-check
			{
				display: none;
			}

			@media (max-width:600px)
			{
				.nav > .nav-btn
				{
					display: inline-block;
					position: absolute;
					right: 0px;
					top: 0px;
				}

				.nav > .nav-btn > label
				{
					display: inline-block;
					width: 50px;
					height: 50px;
					padding: 13px;
				}

				.nav > .nav-btn > label:hover,.nav  #nav-check:checked ~ .nav-btn > label
				{
					background-color: rgba(0, 0, 0, 0.3);
				}

				.nav > .nav-btn > label > span
				{
					display: block;
					width: 25px;
					height: 10px;
					border-top: 2px solid #eee;
				}

				.nav > .nav-links
				{
					position: absolute;
					display: block;
					width: 100%;
					background-color: #333;
					height: 0px;
					transition: all 0.3s ease-in;
					overflow-y: hidden;
					top: 50px;
					left: 0px;
				}

				.nav > .nav-links > a
				{
					display: block;
					width: 100%;
				}

				.nav > #nav-check:not(:checked) ~ .nav-links
				{
					height: 0px;
				}

				.nav > #nav-check:checked ~ .nav-links
				{
					height: calc(100vh - 50px);
					overflow-y: auto;
				}
			}

			.candid
			{
				float: right;
				margin-right : 250px;
				margin-top : 20px;
				background-color : #A5CBC6;
				color: white;
				border-radius: 10%;
				width: 100px;
				height : 50px;
				text-align : center;
			}

			.candid a
			{
				text-decoration: none;
				color: white;
				margin-bottom : -20px;
			}
		</style>
