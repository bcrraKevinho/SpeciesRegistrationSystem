function nandGate(checkbox) {
    var estudiante = document.getElementById("estudiante");
    var investigador = document.getElementById('investigador');
    if (estudiante.checked && investigador.checked) {
        if (checkbox == estudiante) {
            investigador.checked = false;
            toggleInvestigador();
        } else {
            estudiante.checked = false;
            toggleEstudiante();
        }
    }
    if (checkbox == estudiante)
        toggleEstudiante();
    else
        toggleInvestigador();
}

function toggleEstudiante() {
    document.getElementById("collapseEstudiante").classList.toggle("d-none");
    document.getElementById("semestre").toggleAttribute("required");
    document.getElementById("semestre").value = "";
    document.getElementById("ingreso").toggleAttribute("required");
    document.getElementById("ingreso").value = "";
    document.getElementById("universidadE").toggleAttribute("required");
    document.getElementById("facultadE").toggleAttribute("required");
    document.getElementById("carreraE").toggleAttribute("required");
}

function toggleInvestigador() {
    document.getElementById("collapseInvestigador").classList.toggle("d-none");
    document.getElementById("cedula").toggleAttribute("required");
    document.getElementById("cedula").value = "";
    document.getElementById("egreso").toggleAttribute("required");
    document.getElementById("egreso").value = "";
    document.getElementById("universidadI").toggleAttribute("required");
    document.getElementById("facultadI").toggleAttribute("required");
    document.getElementById("carreraI").toggleAttribute("required");
}

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e1) {
                xmlhttp = false;
            }
        }
    }
    return xmlhttp;
}

function getLista(strURL, id) {
    if(id=="facultadIdiv"){
        var carreraI = document.getElementById("carreraI");
        carreraI.options[carreraI.selectedIndex].text = "Selecciona una";
        carreraI.disabled=true;
    }
    else if(id=="facultadEdiv"){
        var carreraE = document.getElementById("carreraE");
        carreraE.options[carreraE.selectedIndex].text = "Selecciona una";
        carreraE.disabled=true;
    }
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById(id).innerHTML = req.responseText;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        req.send(null);
    }
}