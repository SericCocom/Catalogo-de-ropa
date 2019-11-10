function init(){
var route = document.querySelector("[name=route]").value;
var Url=route +'/listas'
var UrlComen=route +'/comentarios'
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
						
							this.$http.post(UrlComen,Comentario).then(
						function(response){
						alert(response.data);
						$('#modal1').modal('hide');
					});

						
					}
				}
		}
});
}
window.onload=init;