function init(){

var Url='http://localhost/CasaEmp/public/mutuarios'

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