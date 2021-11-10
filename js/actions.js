function searchIdE(newCarnet) {

    txtCarnetMsg = document.getElementById("carnetMsg");
    txtNewCarnet = document.getElementById("carnet");
    btnSaveE = document.getElementById("sendEData");

    if (newCarnet.length == 0) {
        txtNewCarnet.innerHTML = "";
        txtCarnetMsg.innerHTML = "";
        btnSaveE.disabled = true;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(this.responseText);

                if (response.success) {
                    txtCarnetMsg.classList.add("warning");
                    txtCarnetMsg.classList.remove("success");
                    btnSaveE.disabled = true;
                } else {
                    txtCarnetMsg.classList.add("success");
                    txtCarnetMsg.classList.remove("warning");
                    btnSaveE.disabled = false;
                }
                txtCarnetMsg.innerHTML = response.message;
            }
        };
        xmlhttp.open("GET", "backend/searchNewId.php?newId=" + newCarnet, true);
        xmlhttp.send();
    }

}

function sendDataE() {
    newCarnet = document.getElementById("carnet").value;
    nombre = document.getElementById("nombre").value;
    fecha = document.getElementById("fecha").value;
    contrasena = document.getElementById("contrasena").value;

    var data = {carnet: newCarnet, nombre: nombre, fecha: fecha, contrasena: contrasena};

    mdlMessage = document.getElementById("messageModal");

    /*txtmdlMessage = document.getElementById("mdlMessage");
    txtmdlSuccess = document.getElementById("mdlSuccess");*/

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "process.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(JSON.stringify(data));
}

