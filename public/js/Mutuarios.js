function init(){
var route = document.querySelector("[name=route]").value;
var Url=route+ '/mutuarios'
var UrlSoli= route+'/solicitudes'
new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#Mutuario',
		created:function(){
			this.getMutuarios();
		},
		data:{
			curp:'',
			nombre:'',
			apellidop:'',
			apellidom:'',
			direccion:'',
			email:'',
			telefono:'',
			usuario:'',
			password:'',
			mutuarios:[],
			solicitudes:[],
			editando:false,
			auxCurp:''
		},
		methods:{
				getMutuarios:function(){
					this.$http.get(Url).then(
					function(response){
						console.log(response);
						this.mutuarios=response.data;
					});
				},
					getSolicitudes:function(){
					this.$http.get(UrlSoli).then(
					function(response){
						console.log(response);
						this.solicitudes=response.data;
						$('#solicitudes').modal('show');
					});
				},
				ShowModal:function(){
					this.editando=false;
					$('#add_mutuario').modal('show');
				},
				AgregarMutuario:function(){
				var Mutuario={curp:this.curp, nombre:this.nombre, apellidop:this.apellidop, 
					apellidom:this.apellidom, direccion:this.direccion, correo:this.email, telefono:this.telefono,usuario:this.usuario,password:this.password
					  }	
					  this.$http.post(Url,Mutuario).then(function(response){
					  		this.getMutuarios();
					  	$('#add_mutuario').modal('hide');
					  	this.clearComponents();
					  }
					  
					  	)
				},
				EditarMutuario:function(id){
					this.editando=true;
					$('#add_mutuario').modal('show');

					this.$http.get(Url + '/'+ id).then(
					function(response){
				this.curp= response.data.curp;
				this.nombre= response.data.nombre;
				this.apellidop= response.data.apellidop;
				this.apellidom= response.data.apellidom;
				this.direccion= response.data.direccion;
				this.email= response.data.email;
				this.telefono= response.data.telefono;
				this.auxCurp=response.data.curp;
				this.usuario=response.data.usuario;
				this.password=response.data.password;
					});


				},
				ActualizarMutuario:function(id){
						var Mutuario={curp:this.curp, nombre:this.nombre, apellidop:this.apellidop, 
					apellidom:this.apellidom, direccion:this.direccion, email:this.email, telefono:this.telefono,usuario:this.usuario,password:this.password
					  }	;
					this.$http.patch(Url+ '/'+ id,Mutuario).then(function(response){
					  		this.getMutuarios();
					  	$('#add_mutuario').modal('hide');
					  	this.editando=false;
					  	this.clearComponents();
					  });
				},
				AutotizarSolicitud:function(id,nombre){
					
					var Confirmar=confirm('Desea aceptar la solicitud de ' + nombre +'?');
					if (Confirmar) {
						this.$http.patch(UrlSoli+ '/'+ id).then(function(response){
					  		this.getSolicitudes();
					  		this.getMutuarios();
					  });
					}
				},
				clearComponents:function(){
					this.curp= '';
				this.nombre= '';
				this.apellidop= '';
				this.apellidom= '';
				this.direccion= '';
				this.email= '';
				this.telefono= '';
				this.auxCurp='';
				this.password='';
				this.usuario='';
				}



		}
});
}
window.onload=init;