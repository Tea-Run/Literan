document.getElementById('imagen').addEventListener('change', function(){
    const file = this.files[0];

    const nombre = file ? file.name : 'Ningún archivo seleccionado';
    document.getElementById('nombreArchivo').textContent = nombre;

    const preview = document.getElementById('preview');

    if(file){
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
});