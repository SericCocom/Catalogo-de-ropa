function init(){
var route = document.querySelector("[name=route]").value;
var Url= route + '/productos';
var UrlCat= route + '/categorias'; 
var UrlAl=  route + '/albums';
var UrlAlbumPublicado=route+'/albumpub'
var UrlAlbumNOublicado=route+'/albumnopub'
var UrlPub=route +'/publicar'
var UrlCancel=route +'/baja'
new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#Productos',
		created:function(){
			this.getProductos();
			this.imagen='fotoportada.jpg';
		},
		data:{
			album:'',
			imagen:'',
			clave:'',
			talla:'',
			precioventa:'',
			preciocompra:'',
			id_album:'',
			auxAlbum:'',
			categoria:'',
			productos:[],
			categorias:[],
			auxCategoria:'',


			//area albums
			albums:[],
			nomAlbum:'',
			fechapub:'',






			editando:false,
			auxClave:'',
			encontrado:false,
			editandoCategoria:false,
			editandoAlbum:false,
			descripcion:''
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
						Producto.append('descripcion',this.descripcion);
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
							this.encontrado=false;
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
				this.descripcion=response.data.descripcion;
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
						preciocompra:this.preciocompra,id_album:this.id_album,categoria:this.categoria,descripcion:this.descripcion
					}

					this.$http.patch(Url+ '/'+ id,Producto).then(function(response){
					  		this.getProductos();
					  	$('#add_mutuario').modal('hide');
					  	this.editando=false;
					  	this.clearComponents();
					  });
				},
				ShowModalCat:function(){
					$('#add_categoria').modal('show');
					this.getCategorias();
				},
				editCategoria:function(id){
					this.editandoCategoria=true;
					this.$http.get(UrlCat + '/'+ id).then(
					function(response){
					this.categoria=response.data.categoria;
					this.auxCategoria=response.data.categoria;
					});
				},
				updateCategoria:function(id){
					var Categoria={
						categoria:this.categoria
					}
					this.$http.patch(UrlCat+ '/'+ id,Categoria).then(function(response){
					  	this.getCategorias();
					  	
					  	this.editandoCategoria=false;
					  	this.categoria='';
					  });
				},
				addCategoria:function(){
					var Categoria={
						categoria:this.categoria
					}


					this.$http.post(UrlCat,Categoria).then(function(response){
					  		this.getCategorias();
					  	this.clearComponents();
					  	this.categoria='';
					  })

				},
				ShowModalAlbum:function(){
					$('#album').modal('show');
					this.getAlbums();
				},
				addAlbum:function(){
					
					var Album={
						id_album:this.id_album,album:this.album,fecha:this.fechapub
					}

					this.$http.post(UrlAl,Album).then(function(response){
					  		this.getAlbums();
					  		this.album='';
					  		this.id_album='';
					  		$('#add_album').modal('hide');
					  })
					
				},
					
				editAlbum:function(id){
							this.editandoAlbum=true;
							$('#add_album').modal('show');
					this.$http.get(UrlAl + '/'+ id).then(
					function(response){
					this.id_album=response.data.id_album;
					this.album=response.data.album;
					this.fechapub=response.data.fecha_publica;
					this.auxAlbum=response.data.id_album;
					});

				},
				showModalAl:function(){
				
				$('#add_album').modal('show');
			},
				hideModaAl:function(){
					$('#add_album').modal('hide');
				},
				updateAlbum:function(id){
					var Album={
						id_album:this.id_album,album:this.album
					}

					this.$http.patch(UrlAl+ '/'+ id,Album).then(function(response){
					  	this.getAlbums();
					  	this.editandoAlbum=false;
					  	this.album='';
					  	this.id_album='';
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
				this.imagen='fotoportada.jpg';
				this.descripcion='';
				},
				//area para albumes
				publicarAlbum:function(id,nombre){
					var clave={id_album:id}
					var Confirmar=confirm('Esta seguro de publicar el album '+ nombre+'?');
					if (Confirmar) {
							this.$http.post(UrlPub,clave).then(
						function(response){
						alert(response.data);
						this.getAlbums();
					});

						
					}
				},
				//descartar un album		
				cancelarAlbum:function(id,nombre){
					var clave={id_album:id}
					var Confirmar=confirm('Esta seguro de descartar el album '+ nombre+'?, Esta accion no se puede revertir');
					if (Confirmar) {
							this.$http.post(UrlCancel,clave).then(
						function(response){
						alert(response.data);
						this.getAlbums();
					});

						
					}
				},
				//obtiene todos los albumes publicados
				getAlbumsPublicado:function(){
					this.$http.get(UrlAlbumPublicado).then(
					function(response){
						console.log(response);
						this.albums=response.data;
					});

				},
				//obtiene todos los albumes no publicados
				getAlbumsNopublicado:function(){
					this.$http.get(UrlAlbumNOublicado).then(
					function(response){
						console.log(response);
						this.albums=response.data;
					});
				}





		}
});
}
window.onload=init;