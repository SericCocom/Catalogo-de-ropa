function init(){

var Url='http://localhost/CasaEmp/public/listas'
var UrlComen='http://localhost/CasaEmp/public/comentarios'
new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#productos',
		created:function(){
		},
		data:{
			
			album:'',
			imagen:'',
			clave:'',
			talla:'',
			precioventa:'',
			id_album:'',
			albums:[],
			descripcion:'',
			categoria:'',
			encontrado:false,
			comentarios:[]
		}, 
		methods:{

			editProducto:function(id){
					
					this.$http.get(Url + '/'+ id).then(
					function(response){
					this.clave= response.data.clave;
					this.talla= response.data.talla;
					this.precioventa= response.data.precioventa;
					this.id_album= response.data.id_album;
					this.categoria= response.data.categoria;
					this.imagen=response.data.photo;
					this.descripcion=response.data.descripcion;
					});
					$('#modal1').modal('show');
					
				},
				addComent:function(){
					var Comentario={
						clave:this.clave
					}
					var Confirmar=confirm('Esta seguro de encargar esta prenda?');
					if (Confirmar) {
						this.validarComent();
						if (this.encontrado==false) {
							this.$http.post(UrlComen,Comentario).then(
						function(response){
						console.log(response);
					});

						}
					}
				},
				validarComent:function(){
					this.$http.get(UrlComen + '/').then(
						function(response){
						console.log(response);
						this.comentarios=response.data;
						alert(response.length);
						for (var i = this.comentarios.length - 1; i >= 0; i--) {
							alert(this.come.prenda);
							if (response[i].data.prenda==this.clave) {
								this.encontrado=true;
								alert('Usted ya encargó esta prenda');
							}
						}


					});
				}
		}
});
}
window.onload=init;