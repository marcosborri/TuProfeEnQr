function execCmd(command, value = null) {
    document.execCommand(command, false, value);
}


document.getElementById('main-form').addEventListener('submit', function(e) {
    const htmlIntermedio = document.getElementById('visual-editor').innerHTML;
    document.getElementById('hidden-content').value = htmlIntermedio;
});