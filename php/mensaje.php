<?php 

class Mensaje{ 

  
    
    static public function mostrarMensaje($titulo, $contenido, $icono){
       echo "<script>
                Swal.fire(
                  '".$titulo."',
                  '".$contenido."',
                  '".$icono."'
                )
            </script>"; 
    }


    static public function mostrarMensajeProgresivo($titulo, $contenido, $tiempo){
        echo "<script>let timerInterval
              Swal.fire({
                title: '".$titulo."!',
                html: '".$contenido." <b></b> Milisegundos.',
                timer: ".$tiempo.",
                timerProgressBar: true,
                onBeforeOpen: () => {
                  Swal.showLoading()
                  timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                      const b = content.querySelector('b')
                      if (b) {
                        b.textContent = Swal.getTimerLeft()
                      }
                    }
                  }, 100)
                },
                onClose: () => {
                  clearInterval(timerInterval)
                }
              }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
                }
              })</script>";
    }

    static public function mostrarMensajeProgresivoInferior($titulo,$icono, $tiempo){
        echo "<script>
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: ".$tiempo.",
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: '".$icono."',
                  title: '".$titulo."'
                })
            </script>";
    }

    static public function enlazar(){
      echo '<!DOCTYPE html>
            <html>
            <head>
              <title></title>
              <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css" rel="stylesheet">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

            </head>
            </html>';
    }

}

?>