function init(){
var route = document.querySelector("[name=route]").value;
var Url= route + '/empleados';

new Vue({
	http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},
		el:'#Empleado',
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
			contrase:'',
			empleados:[],
			editando:false,
			auxCurp:''
		},
		methods:{
				getMutuarios:function(){
					this.$http.get(Url).then(
					function(response){
						console.log(response);
						this.empleados=response.data;
					});
				},
				ShowModal:function(){
					this.editando=false;
					$('#add_mutuario').modal('show');
				},
				AgregarEmpleado:function(){

				var Empleado={curp:this.curp, nombre:this.nombre, apellidop:this.apellidop, 
					apellidom:this.apellidom, direccion:this.direccion, correo:this.email, 
					telefono:this.telefono,usuario:this.usuario,contrase:this.contrase };
					 
					  this.$http.post(Url,Empleado).then(function(response){
					  		this.getMutuarios();
					  	$('#add_mutuario').modal('hide');
					  	this.clearComponents();
					  }
					  
					  	)
				},
				EditarEmpleado:function(id){
					this.editando=true;
					$('#add_mutuario').modal('show');

					this.$http.get(Url + '/'+ id).then(
					function(response){
				this.curp= response.data.curp;
				this.nombre= response.data.nombre;
				this.apellidop= response.data.apellidop;
				this.apellidom= response.data.apellidom;
				this.direccion= response.data.direccion;
				this.email= response.data.correo;
				this.telefono= response.data.telefono;
				this.usuario=response.data.usuario;
				this.contrase=response.data.contrase;
				this.auxCurp=response.data.curp;
					});


				},
				ActualizarEmpleado:function(id){
						var Mutuario={curp:this.curp, nombre:this.nombre, apellidop:this.apellidop, 
					apellidom:this.apellidom, direccion:this.direccion, correo:this.email, telefono:this.telefono
					,usuario:this.usuario,contrase:this.contrase
					  }	;
					this.$http.patch(Url+ '/'+ id,Mutuario).then(function(response){
					  		this.getMutuarios();
					  	$('#add_mutuario').modal('hide');
					  	this.editando=false;
					  	this.clearComponents();
					  });
				},
				DespedirEmpleado:function(id){
					var Confirmar=confirm("¿Esta seguro de despedir al empleado "+id+ "?" );
					if (Confirmar) {
						alert('Aquí se hará');
					}
				}
				,
				clearComponents:function(){
					this.curp= '';
				this.nombre= '';
				this.apellidop= '';
				this.apellidom= '';
				this.direccion= '';
				this.email= '';
				this.telefono= '';
				this.auxCurp='';
				this.usuario='';
				this.contrase='';
				}



		}
});
}
window.onload=init;