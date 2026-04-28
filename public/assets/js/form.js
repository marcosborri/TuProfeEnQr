
//FORM
function execCmd(command, element = null, value = null) {
    document.execCommand(command, false, value);
    
    //Hacer que el botón tenga la pseudo-clase active
    if (element) {
        element.classList.toggle('active');
    }
}


document.getElementById('main-form').addEventListener('submit', function(e) {
    const htmlIntermedio = document.getElementById('visual-editor').innerHTML;
    document.getElementById('hidden-content').value = htmlIntermedio;
}); 
