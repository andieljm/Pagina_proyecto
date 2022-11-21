ajax();

function ajax(){
    let http = new XMLHttpRequest();
    http.open("POST", "php/paquetes.php");
    http.send(null);

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
            cargarPaquetes(data);
        }
    }
}

function cargarPaquetes(paquetes) {
    productos.forEach(paquetes => {
	const codigoP = paquete.codigoP
        const img = paquete.img;
        const nombre = paquete.nombre;
    
        const imgPaquete = document.createElement("img");
        imgPaquete.src = "img/paquetes/" + img;
        imgPaquete.alt = "Paquete";

	const codigoPaquete = document.createElement("h5");
	codigoPaquete.textContent = codigoP;
    
        const nombrePaquete = document.createElement("h3");
        nombrePaquete.textContent = nombre;
    
        const paqueteDiv = document.createElement("div");
        productoDiv.classList.add("paquete");
        productoDiv.onclick = seleccionarPaquete;
	productoDiv.appendChild(codigoPaquete);
        productoDiv.appendChild(imgPaquete);
        productoDiv.appendChild(nombrePaquete);
    
        document.querySelector("#paquetes").appendChild(paqueteDiv);
    });
}

function seleccionarPaquete(e) {

    let paquete;

    if (e.target.tagName === "DIV") {
        paquete = e.target;
    } else {
        paquete = e.target.parentElement;
    }

    if (paquete.classList.contains("seleccionado")) {
        paquete.classList.remove('seleccionado')
    }else{
        paquete.classList.add('seleccionado')
    }

}

function eliminar() {
    const paquetesSeleccionados = document.querySelectorAll(".seleccionado")

    paquetesSeleccionados.forEach(paqueteSelec => {
        paqueteSelec.remove();
        // paqueteSelec.style.borderColor = "red";
    });
}