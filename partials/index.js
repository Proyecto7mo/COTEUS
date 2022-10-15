// Jeremias Cuello 25/6/22
//
// Resumen: Este archivo permite cargar los archivos que el usuario desee subir al sistema.
//

// obteniendo datos de elementos HTML.
const UpLoadFile = document.querySelector(".UpLoadFile");
const title = UpLoadFile.querySelector(".UpLoadFile__LBLTitle");
const button = UpLoadFile.querySelector(".UpLoadFile__BTN-file");
const input = UpLoadFile.querySelector(".UpLoadFile__INPFile");
const send = document.querySelector(".UpLoadFile-container__BTN-send");
const link = document.querySelector(".UpLoadFile__LNKInstruction");
let files;

link.addEventListener("click", e => {
  button.click();
});

button.addEventListener("click", (e) => {
  input.click();
});

// cada vez que cambia el valor el input, se guardan los archivos
input.addEventListener("change", (e) => {
  
  //se guardan los archivos del input a files
  files = input.files;
  
  UpLoadFile.classList.add("active");
  ShowFiles(files);
  UpLoadFile.classList.remove("active");
});

UpLoadFile.addEventListener("dragover", (e) => {
  e.preventDefault();
  UpLoadFile.classList.add("active");
  title.textContent = "Suelta el archivo para subirlo.";
});

UpLoadFile.addEventListener("dragleave", (e) => {
  e.preventDefault();
  RemoverClaseActive();
});

UpLoadFile.addEventListener("drop", (e) => {
  e.preventDefault();
  files = e.dataTransfer.files;
  ShowFiles(files);
  RemoverClaseActive();
});

function RemoverClaseActive(){
  UpLoadFile.classList.remove("active");
  title.textContent = "Arrastra y suelta tus documentos";
}

function ShowFiles(files){
  if(files.length == undefined){
    processFile(files);
  }else{
    for(const file of files){
      processFile(file);
    }
  }
}

function processFile(file){
  
  console.log(file.type);
  
  const docType = file.type;
  const validExtensions = ['image/jpeg','image/jpg','image/png','image/pdf', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow'];
  
  if(validExtensions.includes(docType)){
    const fileReader = new FileReader();
    const id = `file-${Math.random().toString(32).substring(7)}`;

    fileReader.addEventListener('load', (e) => {
      const fileURL = fileReader.result;
      const image = `
      <div id="${id}" class="preview__file">
        <img src="${fileURL}" width="50">
        <div class="status">
          <span>${file.name}</span>
          <span class="preview__fileLoad">
            Cargando...
          </span>
        </div>
      </div>
      `;
      
      const preview = document.querySelector('.UpLoadFile-container__preview').innerHTML;
      document.querySelector('.UpLoadFile-container__preview').innerHTML = image + preview;
    });

    fileReader.readAsDataURL(file);
    
    SubirArchivo(file, id)
  
  }else{
    ArchivoInvalido(file);
  }
}

send.addEventListener("click", e => {
  SubirArchivo (file, id);
});

async function SubirArchivo (file, id) {
  const formData = new FormData();

  formData.append("file", file);

  try{
    const response = await fetch("http://localhost/COTEUS/partials/subirArchivos.php", {
      method: "POST",
      body: formData,
    });

    const responseText = await response.text();
    console.log(responseText);
    
    document.querySelector(`#${id} .preview__fileLoad`).innerHTML = `<span class="preview__fileUploaded"> Archivo Subido Correctamente... </span>`;
  } catch(error) {
    const responseText = await response.text();
    document.querySelector(`#${id} .preview__fileLoad`).innerHTML = `<span class="preview__fileFailed"> Error al subir el archivo... </span>`; 
  }
}

function ArchivoInvalido(file){
  let preview = document.querySelector('.UpLoadFile-container__preview');
  preview.innerHTML += `<p class="archivoInvalido"> <b>Error:</b> Archivo invalido ${file.name}. No se permite ese tipo de archivo. </p>`;  
}
