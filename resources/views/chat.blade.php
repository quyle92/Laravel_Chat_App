<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.list-group{
			overflow-y: scroll;
			max-height: 200px
		}
	</style>
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class="offset-4 col-md-8 offset-sm-1 col-sm-10">
				<li class="list-group-item active">Chat room</li>
				
				<span class="badge badge-pill">@{{ typing }}</span>
				
				<ul class="list-group" v-chat-scroll>					
					<message 
					v-for="(value, index) in chat.message" 
					v-bind:key="value.index" 
					v-bind:color='["warning","success"]' 
					badge-color="danger" 
					:user='chat.user[index]' 
					:nguoi-gui='sender'
					:time = chat.time[index]
					>@{{value}}
					
					</message>
					<input type="text"  class="form-control" value="" v-model='message' @keyup.enter='send'>
				</ul>
			</div>
			

		</div>
	</div>


	  

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>