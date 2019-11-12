function init(){
var route = document.querySelector("[name=route]").value;

var Url= route + '/productos';

var UrlCat= route + '/categorias'; 
var UrlAl=  route + '/albums';
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
			
		},
		data:{
		}, 
		methods:{



				ShowModal:function(){
					
					$('#resumen').modal('show');
				},
				hideModaAl:function(){
					$('#resumen').modal('hide');
				}



		}
});
}
window.onload=init;