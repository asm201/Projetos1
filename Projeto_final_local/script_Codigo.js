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

function Validar(event, elements) {
    const etapas = ['etapa1','etapa2','etapa3','etapa4','etapa5', 'etapa6'];
    for (let i = 0; i < elements.length; i++) {
        const inputs = document.getElementById(elements[i]).querySelectorAll('input');
        for (let j = 0; j < inputs.length; j++) {
            if (!inputs[j].reportValidity()) {
                event.preventDefault();
                Swal.fire('Erro', 'Preencha a(s) etapa(s) anterior(es) completamente.', 'error').then(() => {
                    inputs[j].reportValidity();
                });
                document.getElementById(etapas[i]).style.color = "red";
                throw "Invalid";
            }else{
                document.getElementById(etapas[i]).style.color = "green";
            }
        }
    }
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
    } else if(element.tagName == "TEXTAREA") {
        if (element.required) {
            element.value = "N/A";
        }
    }else {
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

function RemoverOBG(el) {
    let element = document.getElementById(el);
    //console.log(element.tagName);
    if (element.tagName == "INPUT") {
        element.required = false;
        element.value = null;
    } else {
        const elements = element.querySelectorAll('input');
        for (let i = 0; i < elements.length; i++) {
            let element = elements[i];
            element.required = false;
            element.value = null;
        }
    }
    var display = element.style.display;
    if (display != "none")
        element.style.display = 'none';

}
function ColocarOBG(el) {
    let element = document.getElementById(el);
    //console.log(element.tagName);
    if (element.tagName == "INPUT") {
        element.required = true;
    } else {
        let elements = element.querySelectorAll('input');
        for (let i = 0; i < elements.length; i++) {
            let element = elements[i];
            element.required = true;
        }
    }
    var display = element.style.display;
    if (display == "none")
        element.style.display = 'block';

}


function limparDatas() {
    document.getElementById("Data_Chegada_Pessoa").value = '000-00-00';
    document.getElementById("Data_Reconhecido_Pessoa").value = '000-00-00';
  }

function getDataSaida() {
    document.getElementById("Data_Chegada_Pessoa").setAttribute("min", document.getElementById("Data_Saida_Pessoa").value);
  }

function getDataEntrada() {
    document.getElementById("Data_Reconhecido_Pessoa").setAttribute("min", document.getElementById("Data_Chegada_Pessoa").value);
}

function validateFileType(){
    var fileName = document.getElementById("fileName").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="pdf"){
        //TO DO
    }else{
        alert("Apenas aquivos .PNG/.JPG/.PDF podem ser enviados!");
        document.getElementById("fileName").value = "";

    }   
}