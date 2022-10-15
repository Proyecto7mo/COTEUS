    function Calculator(){
    var object = document.querySelector('.object');
    var hd = document.querySelector('.hd');
    var bd = document.querySelector('.bd');

    // Arrastra después de presionar el mouse
    hd.addEventListener('mousedown', function (e) {
      // Obtener las coordenadas del mouse en el cuadro después de presionar el mouse y permanecer sin cambios durante el movimiento
      var x = e.pageX - object.offsetLeft;
      var y = e.pageY - object.offsetTop;

      // Cambia los valores izquierdo y superior de inicio de sesión
      function move(e) {
        object.style.left = e.pageX - x + 'px';
        object.style.top = e.pageY - y + 'px';
      }

      // Agrega un evento de movimiento del mouse al documento, que se puede arrastrar por la página en lugar de hd
      document.addEventListener('mousemove', move);

      // Después de soltar el mouse, ya no es posible arrastrar, cancele el evento
      document.addEventListener('mouseup', function () {
        document.removeEventListener('mousemove', move);
      });
    });
    

    bd.addEventListener('mousedown', function (e) {
      // Obtener las coordenadas del mouse en el cuadro después de presionar el mouse y permanecer sin cambios durante el movimiento
      var x = e.pageX - object.offsetLeft;
      var y = e.pageY - object.offsetTop;

      // Cambia los valores izquierdo y superior de inicio de sesión
      function move(e) {
        object.style.left = e.pageX - x + 'px';
        object.style.top = e.pageY - y + 'px';
      }

      // Agrega un evento de movimiento del mouse al documento, que se puede arrastrar por la página en lugar de hd
      document.addEventListener('mousemove', move);

      // Después de soltar el mouse, ya no es posible arrastrar, cancele el evento
      document.addEventListener('mouseup', function () {
        document.removeEventListener('mousemove', move);
      });
    });

    // Mostrar y cerrar el cuadro de inicio de sesión
    var a =document.querySelector('.ClcIcon');
    var close = document.querySelector('.close');

    a.addEventListener('click',function() {
      object.style.display= 'block';
      cover.style.display= 'block';
    });

    close.addEventListener('click',function() {
      object.style.display= 'none';
      cover.style.display= 'none';
      // Restaurar la posición del cuadro de inicio de sesión
      object.style.left='50%';
      object.style.top= '50%';
    });
}

// Lista de fórmulas desplegable
        
        var todo = document.querySelector('.listforms');
        var body = document.querySelector('.lfbody');
        var State = false;
        var button = document.getElementById ('.bform');
        var bAF = document.getElementById('.bAgForms');
        var Formula = document.querySelector('.formulas');
        var XBDLF = todo.offsetTop;

    function FLiForms(){
        if (State == false) {
        document.getElementById('bform').style.color = "#10227C";
        document.getElementById('bform').style.background = "#9ec1ff";
        todo.style.display= 'block';
        State = true;
    }
    else{
        document.getElementById('bform').style.color = "#9ec1ff";
        document.getElementById('bform').style.background = "#9921FD";
        todo.style.display = 'none';
        State = false;
    }
    }

    function AgregarForm(){
        bAF.style.top = XBDLF + 20 + '%';
    }
