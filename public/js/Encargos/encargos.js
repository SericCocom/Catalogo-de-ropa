function init(){
var route = document.querySelector("[name=route]").value;
var Url=route+ '/comentarios';
var UrlCancelar=route+'/cancelar'
var UrlPrepa=route+'/preparar'
var UrlDesP=route+'/despreparar'
var UrlEntre=route+'/entregar'

 
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
					var clave={codigo:id}
					var Confirmar=confirm('Esta seguro de cancelar su encargo?');
					if (Confirmar) {
							this.$http.post(UrlCancelar,clave).then(
						function(response){
						alert(response.data);
					});

						
					}
				},
				prepararEncargo:function(id,nombre){
					var clave={codigo:id}
					var Confirmar=confirm('Esta seguro de marcar como preparado el encargo de '+nombre+' ?');
					if (Confirmar) {
							this.$http.post(UrlPrepa,clave).then(
						function(response){
						alert(response.data);
						this.getEncargos();
					});

						
					}
				},
				desprepararEncargo:function(id,nombre){
					var clave={codigo:id}
					var Confirmar=confirm('Esta seguro de marcar como no preparado el encargo de '+nombre+' ?');
					if (Confirmar) {
							this.$http.post(UrlDesP,clave).then(
						function(response){
						alert(response.data);
						this.getEncargos();
					});

						
					}
				},
				entregarEncargo:function(id,nombre){
					var clave={codigo:id}
					var Confirmar=confirm('Esta seguro de marcar como entregado el encargo de '+nombre+' ?');
					if (Confirmar) {
							this.$http.post(UrlEntre,clave).then(
						function(response){
						alert(response.data);
						this.getEncargos();
					});

						
					}
				},


		}
});
}
window.onload=init;