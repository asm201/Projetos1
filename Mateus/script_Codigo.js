function Preencher(el) {
    var display = document.getElementById(el).style.display;
    if (display == "none")
        document.getElementById(el).style.display = 'block';
}
function Sumir(el) {
    var display = document.getElementById(el).style.display;
    if (display != "none")
        document.getElementById(el).style.display = 'none';
}


function Requerido(el) {

    const element = document.getElementById(el);
    //console.log(element.tagName);
    if (element.tagName == "INPUT") {
        if (element.required) {
            element.value = null;
        }
    } else {
        const elements = element.querySelectorAll('input');
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if (element.required) {
                element.value = null;
            }
        }
    }
    var display = element.style.display;
    if (display == "none")
        element.style.display = 'block';
}


function Limpar(el) {
    const element = document.getElementById(el);
    //console.log(element.tagName);
    if (element.tagName == "INPUT") {
        if (element.required) {
            element.value = "N/A";
        }
    } else {
        const elements = element.querySelectorAll('input');
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if (element.required) {
                element.value = "N/A";
            }
        }
    }
    var display = element.style.display;
    if (display != "none")
        element.style.display = 'none';
}	