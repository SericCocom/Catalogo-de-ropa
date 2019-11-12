 var MyDropzone = new Dropzone('.dropzone',{
        url:'images-save',
        acceptedFiles:'image/*',
        maxFilesize:2,
        paramName:'photo',
        dictDefaultMessage:'Arrastra las fotos aquí',


headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
});
      
MyDropzone.on('error',function (file,res) {
	$('.dz-error-message > span').text('Debe elegir una imagen y pesar menos de 2 megas');
});
//agrega el album a enviar mediante el id del componente
MyDropzone.on('sending', function(file, xhr, formData){ 
	var album= document.getElementById("album");
	var albumclave= album.options[album.selectedIndex].value;
	alert(albumclave);
	formData.append('album', albumclave); 
	album='';

}); 

Dropzone.autoDiscover=false;


