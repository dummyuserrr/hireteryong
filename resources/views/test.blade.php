<!DOCTYPE html>
<html>
<head>
	<title>Learning VUE</title>
</head>
<body>
	<div id="app">
		<button v-on:click="show = !show">Show/Hide</button>
		<p v-if="show">I'm part-time visible</p>
		<p v-else>Am I visible?</p>
		<hr>
		<ul>
			<li v-for="person in persons">@{{ person.name }}</li>
		</ul>
	</div>

	<script type="text/javascript" src="vue/vue.min.js"></script>
	<script type="text/javascript" src="vue/myvue.js"></script>
</body>
</html>