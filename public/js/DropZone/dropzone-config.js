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

Dropzone.autoDiscover=false;
