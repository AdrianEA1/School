//crea elemento
const video = document.createElement("video");

//nuestro canvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

//div donde llegara nuestro canvas
const btnScanQR = document.getElementById("btn-scan-qr");

//lectura desactivada
let scanning = false;

// Swal.fire({
//     icon: "success",
//     title: "Aqui se mostrará el mensaje de exito",
//     showConfirmButton: false,
//   });


  // Swal.fire({
  //   icon: "error",
  //   title: "Aqui se mostrara el error",
  //   showConfirmButton: false,
  // });

//funcion para encender la camara
const encenderCamara = () => {
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then(function (stream) {
      scanning = true;
      canvasElement.hidden = false;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.srcObject = stream;
      video.onloadeddata = () => {
            video.play();
            tick();
            scan();
        };
    });
};

//funciones para levantar las funiones de encendido de la camara
function tick() {
  canvasElement.height = video.videoHeight;
  canvasElement.width = video.videoWidth;
  canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
  scanning && requestAnimationFrame(tick);
}

function scan() {
  try {
    qrcode.decode();
  } catch (e) {

    console.log(e)
    setTimeout(scan, 200)
  }
}

//apagara la camara
const cerrarCamara = () => {
  video.srcObject.getTracks().forEach((track) => {
    track.stop();
  });
  canvasElement.hidden = true;
//   btnScanQR.hidden = false;
};

// const activarSonido = () => {
//   var audio = document.getElementById('audioScaner');
//   audio.play();
// }

//callback cuando termina de leer el codigo QR
qrcode.callback = (respuesta) => {
    // cerrarCamara();
  if (respuesta) {
    Swal.fire({
        title: "¡Su asistencia se ha registrado!",
        icon: "success",
        showConfirmButton: false,
        timer: 1300
      }).then(() => scan());
    // activarSonido();
    //encenderCamara();
    // cerrarCamara();
    // qrss(respuesta);
  }
};


function qrss(respuesta){
  console.log(respuesta)
  let accion = "insert"
  $.ajax({
    url: "class/classQR.php",
    type: "post",
    data: {accion: accion, respuesta: respuesta},
    success: function(html){
        areaTrabajo.innerHTML=html;
        Swal.fire("Logrado, se envio la info")
        // $("#title").html(respuesta)
    },
    error: function(e){
        console.log("error");
    }
});

}

//evento para mostrar la camara sin el boton
window.addEventListener('load', (e) => {
  encenderCamara();
})

