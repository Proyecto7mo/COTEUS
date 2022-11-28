<nav
      class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">

    <link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/COTEUS/partials/HTML/nav/nav.css">

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
            <!--<li class="nav-item">
              <a class="nav-link" href="../Cuenta/" id="navtext">CUENTA</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="../partials/logout.php" id="navtext">SALIR</a>
            </li>
          </ul>
        </div>
      </div>    

    <div class="BarraHerramientas">
		    <a class="ClcIcon" href="javascript:" onclick="Calculator()">
        <img class="toolICON" src="../img/tools_bar/Calculadora_Icon.svg"></a>
		    <a class="ConfIcon" href="../Configuracion/">
        <img class="toolICON" id="Gear" src="../img/tools_bar/Configuracion_Icon.svg"></a>
        <a><img src="../img/tools_bar/null.svg"></a>

 <!-- Calculadora -->
  
 <div class="object">
  <link rel="stylesheet" type="text/css" href="../partials/HTML/nav/Calculadora.css">
    <div class="hd"></div>
      <div class="display">
        <div class="Result">
          <div id="ResulAnt"></div>
          <div id="ResultAct"></div>
       </div>
    </div>
    <div class="bd">
          <button class="Esp"   id="but1" name="Save" onclick="SendData()"><span class="BEText">Guardar</span></button>
          <button class="Cient" id="but3" name="Operador"><span>Rad</span></button>
          <button class="Cient" id="but4" name="Operador"><span>Deg</span></button>
          <button class="Cient" id="but5" name="Operador"><span>x!</span></button>
          <button class="Cient" id="but6" name="Operador"><span>%</span></button>
          <button class="Basic" id="but7" name="Operador"><span>(</span></button>
          <button class="Basic" id="but8" name="Operador"><span>)</span></button>
          <button class="Basic" id="but9" name="Operador" onclick="Display.DEL()"><span>DEL</span></button>
          <button class="Basic" id="but10" name="Operador" onclick="Display.AC()"><span>AC</span></button>
          <br>
          <button class="Cient" id="but11" name="Operador"><span>Inv</span></button>
          <button class="Cient" id="but12" name="Operador"><span>sin</span></button>
          <button class="Cient" id="but13" name="Operador"><span>In</span></button>
          <button class="Cient" id="but14" name="Operador"><span>&#177;</span></button>
          <button class="Cient" id="but15" name="Operador"><span>√</span></button>
          <button class="Cient" id="but16" name="Operador"><span>x^n</span></button>
          <button class="Basic" id="but17" name="numero"><span>7</span></button>
          <button class="Basic" id="but18" name="numero"><span>8</span></button>
          <button class="Basic" id="but19" name="numero"><span>9</span></button>
          <button class="Basic" id="but20" name="Operador" value="dividir"><span>÷</span></button>
          <br>
          <button class="Cient" id="but21" name="Operador"><span>&pi;</span></button>
          <button class="Cient" id="but22" name="Operador"><span>cos</span></button>
          <button class="Cient" id="but23" name="Operador"><span>log</span></button>
          <button class="Cient" id="but24" name="Operador"><span>sec</span></button>
          <button class="Cient" id="but25" name="Operador"><span>csc</span></button>
          <button class="Cient" id="but26" name="Operador"><span>cot</span></button>
          <button class="Basic" id="but27" name="numero"><span>4</span></button>
          <button class="Basic" id="but28" name="numero"><span>5</span></button>
          <button class="Basic" id="but29" name="numero"><span>6</span></button>
          <button class="Basic" id="but30" name="Operador" value="multiplicar"><span>X</span></button>
          <br>
          <button class="Cient" id="but31" name="numero"><span>e</span></button>
          <button class="Cient" id="but32" name="Operador"><span>tan</span></button>
          <button class="Cient" id="but33" name="Operador"><span>lim</span></button>
          <button class="Cient" id="but34" name="Operador"><span>|x|</span></button>
          <button class="Cient" id="but35" name="Operador"><span>└2┘</span></button>
          <button class="Cient" id="but36" name="Operador"><span>┌2┐</span></button>
          <button class="Basic" id="but37" name="numero"><span>1</span></button>
          <button class="Basic" id="but38" name="numero"><span>2</span></button>
          <button class="Basic" id="but39" name="numero"><span>3</span></button>
          <button class="Basic" id="but40" name="Operador" value="restar"><span>─</span></button>
          <br>
          <button class="Cient" id="but41" name="Operador"><span>Ans</span></button>
          <button class="Cient" id="but42" name="Operador"><span>EXP</span></button>
          <button class="Cient" id="but43" name="Operador"><span>hyp</span></button>
          <button class="Cient" id="but44" name="Operador"><span>rand</span></button>
          <button class="Cient" id="but45" name="Operador"><span>dms</span></button>
          <button class="Cient" id="but46" name="Operador"><span>deg</span></button>
          <button class="Basic" id="but47" name="numero"><span>.</span></button>
          <button class="Basic" id="but48" name="numero"><span>0</span></button>
          <button class="Basic" id="but49" name="Operador"><span>=</span></button>
          <button class="Basic" id="but50" name="Operador" value="sumar"><span>+</span></button>
    </div>

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

          <button class="AgForms" id="bAgForms" onclick="AgregarForm()"><p class="AgFormsText">+</p></button>

      </div>

      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
    <div class="">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                select
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">action</a></li>
                <li><a class="dropdown-item" href="#">action</a></li>
              </ul>
              <input
                type="text"
                class="form-control"
                aria-label="Text input with dropdown button"
              />
            </div>
          </div>
        </div>
      </div>

      <!--<div class="container m-5">-->
        <div class="row">
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
                    Agregar nueva fromula
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
                          aria-describedby="emailHelp"
                        >
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Formula</label>
                        <input type="text" class="form-control" id="formula" name="formula">
                      </div>

                      <button type="submit" class="btn btn-primary">
                        Guardar Formula
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

      <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 p-5">
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="" id="" style="width: 40px;">
            <!--<div class="card-img-top icon-card">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
              </svg>
            </div>-->
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="" id="" style="width: 40px;">
            <!--<div class="card-img-top icon-card">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
              </svg>
            </div>-->
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="" id="" style="width: 40px;">
            <!--<div class="card-img-top icon-card">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
              </svg>
            </div>-->
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
            <!--<div class="card-img-top icon-card">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
              </svg>
            </div>-->
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
        <div class="col" id="" style="margin-top: 0px;">
            <p>A</p>
            <input type="text" name="h" id="j" style="width: 40px;">
        </div>
      </div>

      <!--<script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"
    ></script>-->

    </div>
    


    <script src="../partials/HTML/nav/FormsSave.js"></script>
    <script src="../partials/HTML/nav/Display.js"></script>
    <script src="../partials/HTML/nav/Calculos.js"></script>
    <script src="../partials/HTML/nav/Calculadora.js"></script>
    
    </div>
        
	</div>
  
    </nav>
