function init(){

var Url='http://localhost/CasaEmp/public/productos'

var UrlCat='http://localhost/CasaEmp/public/categorias'
var UrlAl='http://localhost/CasaEmp/public/albums'


new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#Productos',
		created:function(){
			this.getProductos();
		},
		data:{
			imagen:'',
			clave:'',
			talla:'',
			precioventa:'',
			preciocompra:'',
			id_album:'',
			categoria:'',
			productos:[],
			categorias:[],
			albums:[],
			editando:false,
			auxClave:'',
			encontrado:false
		},
		methods:{
			onFileChange(e){
				this.imagen = e.target.files[0];
				console.log(this.imagen);
			},

				getProductos:function(){
					this.$http.get(Url).then(
					function(response){
						console.log(response);
						this.productos=response.data;
					});
				},
				getCategorias:function(){
					this.$http.get(UrlCat).then(
					function(response){
						console.log(response);
						this.categorias=response.data;
					});
				},

				getAlbums:function(){
					this.$http.get(UrlAl).then(
					function(response){
						console.log(response);
						this.albums=response.data;
					});
				},



				ShowModal:function(){
					this.editando=false;
					this.getCategorias();
					this.getAlbums();
					$('#add_mutuario').modal('show');
				},

				addProducto:function(){
					this.validaClave(this.clave);
					let Producto = new FormData();
						Producto.append('clave',this.clave);
						Producto.append('talla',this.talla);
						Producto.append('precioventa',this.precioventa);
						Producto.append('preciocompra',this.preciocompra);
						Producto.append('categoria',this.categoria);
						Producto.append('photo',this.imagen);
						Producto.append('id_album',this.id_album);
						let config={
							header :{
								'Content-type' : 'image/jpg'
							}
						}

					if (this.encontrado==false) {
						this.$http.post(Url,Producto,config).then(function(response){
					  		this.getProductos();
					  	$('#add_mutuario').modal('hide');
					  	this.clearComponents();
					  }
					  
					  	).catch(function(response){
						console.log(response);
					});
					}else if (this.encontrado==true){
						var confirmar=confirm('La clave de producto ya está registrado,¿Desea cargar los datos guardados?');
						if (confirmar) {
							this.editProducto(this.clave);
						}else{
							$('#add_mutuario').modal('hide');
							this.clearComponents();
							this.editando=false;
							this.encontrado=false;
						}
					}


				},
				editProducto:function(id){
					this.getCategorias();
					this.getAlbums();
					this.editando=true;
					$('#add_mutuario').modal('show');

					this.$http.get(Url + '/'+ id).then(
					function(response){
				this.clave= response.data.clave;
				
				this.talla= response.data.talla;
				this.precioventa= response.data.precioventa;
				this.preciocompra= response.data.preciocompra;
				this.id_album= response.data.id_album;
				this.categoria= response.data.categoria;
				this.auxClave=response.data.clave;
				this.imagen=response.data.photo;
					});


				},
				validaClave:function(id){
					this.$http.get(Url + '/'+ id).then(
					function(response){
					this.encontrado=true;
					});
				},
				updateProductos:function(id){
				var Producto={
						clave:this.clave,talla:this.talla,precioventa:this.precioventa,
						preciocompra:this.preciocompra,id_album:this.id_album,categoria:this.categoria
					}

					this.$http.patch(Url+ '/'+ id,Producto).then(function(response){
					  		this.getProductos();
					  	$('#add_mutuario').modal('hide');
					  	this.editando=false;
					  	this.clearComponents();
					  });
				},





				clearComponents:function(){
					this.clave= '';
				this.nombre= '';
				this.talla= '';
				this.precioventa= '';
				this.preciocompra= '';
				this.id_album='';
				this.categoria= '';
				this.auxClave='';
				this.imagen='fotoportada.jpg'
				}



		}
});
}
window.onload=init;