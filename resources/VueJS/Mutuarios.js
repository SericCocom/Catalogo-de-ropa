
function init()
{

var url= 'http://localhost/CasaEmp/public/mutuarios';
//var urlReproIndividual = route + '/reproPorAlumno/'

new Vue({

	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },

	el: '#Mutuario',

	created:function()
	{
		alert('Carga Vue');
		this.getMutuarios();
	},
	data:{
	mutuarios:[],
	curp:,
    nombre:,
    apellidop:,
    apellidom:,
    direccion:,
    correo:,
    telefono:,


	},

	methods:{

			getMutuarios:function(){
				this.$http.get(url).then
				(function(response){
					console.log(response);
					this.mutuarios=response.data;
				});
			}
		},



	},
	// Fin de metodos

	computed:{

    	}
	
});

}
window.onload = init;

