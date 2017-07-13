new Vue({
	el: "#app",

	mounted(){
		axios.get('/wew').then(response => console.log(response));
	}
});