function init(){

var Url='http://localhost/CasaEmp/public/comentarios'



new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#encargos',
		created:function(){
			this.getEncargos();
			
		},
		data:{
			encargos:[],
			curp:'',
			editando:false
		}, 
		methods:{
				getEncargos:function(){
					this.$http.get(Url).then(
					function(response){
						console.log(response);
						this.encargos=response.data;
					});
				},
				cancelarEncargo:function(id){
					alert(id);
				}



		}
});
}
window.onload=init;