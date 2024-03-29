<nav
      class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">

    <link rel="stylesheet" type="text/css" href="../partials/HTML/nav/nav.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <div class="container-fluid">

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Home/" id="navtext">HOME</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Grupo/" id="navtext">GRUPO</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="../Gantt/" id="navtext">GANTT</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="../Cuenta/" id="navtext">CUENTA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../partials/logout.php" id="navtext">SALIR</a>
            </li>
          </ul>
        </div>
      </div>    

    <div class="BarraHerramientas">
		    <a class="ClcIcon" href="javascript:" onclick="Calculator()">
        <img class="toolICON" src="../img/tools_bar/Calculadora_Icon.svg"></a>
		    <!--<a class="ConfIcon" href="../Configuracion/">
        <img class="toolICON" id="Gear" src="../img/tools_bar/Configuracion_Icon.svg"></a>-->
        <a><img src="../img/tools_bar/null.svg"></a>

 <!-- Calculadora -->
  
 <div class="object">
  <link rel="stylesheet" type="text/css" href="../partials/HTML/nav/Calculadora.css">
    <div class="hd"></div>
      <div class="display">
        <div class="Result">
          <div id="valor-anterior">0</div>
          <div id="valor-actual"></div>
       </div>
      </div>
    <div class="bd">
          <button class="Esp" disabled="disabled" id="but1" name="Save" onclick="SendData()"><span class="BEText">Guardar</span></button>
          <button class="Cient" id="but3" name="Operador"><span>Rad</span></button>
          <button class="Cient" id="but4" name="Operador"><span>Deg</span></button>
          <button class="Cient" id="but5" name="Operador"><span>x!</span></button>
          <button class="Cient" id="but6" name="Operador"><span>%</span></button>
          <button class="Basic" id="but7" name="Operador"><span>(</span></button>
          <button class="Basic" id="but8" name="Operador"><span>)</span></button>
          <button class="Basic" id="but9" name="Operador" onclick="display.borrar()"><span>DEL</span></button>
          <button class="Basic" id="but10" name="Operador" onclick="display.borrarTodo()"><span>AC</span></button>
          <br>
          <button class="Cient" id="but11" name="Operador"><span>Inv</span></button>
          <button class="Cient" id="but12" name="Operador"><span>sin</span></button>
          <button class="Cient" id="but13" name="Operador"><span>In</span></button>
          <button class="Cient" id="but14" name="Operador"><span>&#177;</span></button>
          <button class="Cient" id="but15" name="Operador"><span>√</span></button>
          <button class="Cient" id="but16" name="Operador"><span>x^n</span></button>
          <button class="numero" id="but17" name="numero"><span>7</span></button>
          <button class="numero" id="but18" name="numero"><span>8</span></button>
          <button class="numero" id="but19" name="numero"><span>9</span></button>
          <button class="operador" id="but20" name="Operador" value="dividir"><span>÷</span></button>
          <br>
          <button class="Cient" id="but21" name="Operador"><span>&pi;</span></button>
          <button class="Cient" id="but22" name="Operador"><span>cos</span></button>
          <button class="Cient" id="but23" name="Operador"><span>log</span></button>
          <button class="Cient" id="but24" name="Operador"><span>sec</span></button>
          <button class="Cient" id="but25" name="Operador"><span>csc</span></button>
          <button class="Cient" id="but26" name="Operador"><span>cot</span></button>
          <button class="numero" id="but27" name="numero"><span>4</span></button>
          <button class="numero" id="but28" name="numero"><span>5</span></button>
          <button class="numero" id="but29" name="numero"><span>6</span></button>
          <button class="operador" id="but30" name="Operador" value="multiplicar"><span>X</span></button>
          <br>
          <button class="Cient" id="but31" name="numero"><span>e</span></button>
          <button class="Cient" id="but32" name="Operador"><span>tan</span></button>
          <button class="Cient" id="but33" name="Operador"><span>lim</span></button>
          <button class="Cient" id="but34" name="Operador"><span>|x|</span></button>
          <button class="Cient" id="but35" name="Operador"><span>└2┘</span></button>
          <button class="Cient" id="but36" name="Operador"><span>┌2┐</span></button>
          <button class="numero" id="but37" name="numero"><span>1</span></button>
          <button class="numero" id="but38" name="numero"><span>2</span></button>
          <button class="numero" id="but39" name="numero"><span>3</span></button>
          <button class="operador" id="but40" name="Operador" value="restar"><span>─</span></button>
          <br>
          <button class="Cient" id="but41" name="Operador"><span>Ans</span></button>
          <button class="Cient" id="but42" name="Operador"><span>EXP</span></button>
          <button class="Cient" id="but43" name="Operador"><span>hyp</span></button>
          <button class="Cient" id="but44" name="Operador"><span>rand</span></button>
          <button class="Cient" id="but45" name="Operador"><span>dms</span></button>
          <button class="Cient" id="but46" name="Operador"><span>deg</span></button>
          <button class="numero" id="but47" name="numero"><span>.</span></button>
          <button class="numero" id="but48" name="numero"><span>0</span></button>
          <button class="operador" id="but49" name="Operador"><span>=</span></button>
          <button class="operador" id="but50" name="Operador" value="sumar"><span>+</span></button>
    </div>

    <!--<div class="container">
        <div class="calculadora">
            <div class="display">
                <div id="valor-anterior"></div>
                <div id="valor-actual"></div>
            </div>
            <button class="col-2" onclick="display.borrarTodo()">C</button>
            <button onclick="display.borrar()">&larr;</button>
            <button class="operador" value="dividir">%</button>
            <button class="numero">7</button>
            <button class="numero">8</button>
            <button class="numero">9</button>
            <button class="operador" value="multiplicar">X</button>
            <button class="numero">4</button>
            <button class="numero">5</button>
            <button class="numero">6</button>
            <button class="operador" value="restar">-</button>
            <button class="numero">1</button>
            <button class="numero">2</button>
            <button class="numero">3</button>
            <button class="operador" value="sumar">+</button>
            <button class="col-2 numero">0</button>
            <button class="numero">.</button>
            <button class="operador" value="igual">=</button>
        </div>
    </div>-->

    <!-- head buttons -->
    
    <div class="close"><p class="xclic">X</p></div>

    <button class="explainforms" id="bform" onclick="FLiForms()"><p class="fclic">F&oacute;rmulas</p></button>
    
    <!-- Lista de fórmulas desplegable -->

    <div class="listforms">
    
      <div class="lfbody">

          <div class="formulas">
              <div class="FormName"></div>
              <div class="FormBody"></div>
          </div>        

      </div>

      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
    <div class="">   

      <select name="Tformulas" id="Tformulas" class="Tformulas">

      </select>
      <br>
      <button id="Deletefrmbtn" onclick="deleteF()">Eliminar</button>

      <!--<div class="container m-5">-->
        <div class="row" style="margin-top: 15px;">
          <div class="col">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    Agregar nueva fórmula
                  </button>
                </h2>

                <div
                  id="collapseOne"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <!-- formulario -->

                    <form method="post" id="form1" name="form1" onsubmit="return state();">
                      <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nombre_formula"
                          name="nombre_formula"
                          aria-describedby="emailHelp" placeholder="Ley de Ohm"
                        >
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Fórmula</label>
                        <input type="text" class="form-control" id="formula" name="formula" onchange="AñInputs()" placeholder="R=V/I">
                      </div>

                      <input type="hidden" name="valfor" value="GuardarF">

                      <button type="submit" class="btn btn-primary">
                        Guardar Fórmula
                      </button>
                    </form>

                    <!-- formulario -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
    <!--</div>-->

      <div class="row row-cols-1 row-cols-md-3 g-4" id="Inputs" style="margin-top: 10px; padding-top: 10px;">
        
      </div>

      <div id="resp" style="margin-bottom: 10px;">
        <label for=""></label>
      </div>
      
   <link rel="stylesheet" href="../partials/HTML/nav/forms.css">
     
    </div>

    <script src="../partials/HTML/nav/FormsSave.js"></script>
    <script src="../partials/HTML/nav/Display.js"></script>
    <script src="../partials/HTML/nav/Calculos.js"></script>
    <script src="../partials/HTML/nav/Calculadora.js"></script>
    <script src="../partials/HTML/nav/index.js" defer></script>
    
    </div>
        
	</div>
  
</nav>
