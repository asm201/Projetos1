function Preencher(el) {
	var display = document.getElementById(el).style.display;
		if(display == "none")
		document.getElementById(el).style.display = 'block';
	}
function Sumir(el){
    var display = document.getElementById(el).style.display;
		if(display != "none")
		document.getElementById(el).style.display = 'none';
    }	


function Requerido(el) {
    const elements = document.getElementById(el).querySelectorAll('input');
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        if (element.required) {
            element.value = null;
        }
    }
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
    }

    
function Limpar(el){
    const elements = document.getElementById(el).querySelectorAll('input');
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        if (element.required) {
            element.value = "N/A";
        }
    }
        var display = document.getElementById(el).style.display;
        if(display != "none")
            document.getElementById(el).style.display = 'none';
}	