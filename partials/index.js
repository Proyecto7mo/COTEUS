// Jeremias Cuello 25/6/22
//
// Resumen: Este archivo permite cargar los archivos que el usuario desee subir al sistema.
//

const UpLoadFile = document.querySelector(".UpLoadFile");
const dragText = UpLoadFile.querySelector("h2");
const button = UpLoadFile.querySelector(".UpLoadFile__BTN");
const input = UpLoadFile.querySelector("#INPFile");
const send = document.querySelector(".send");
const link = document.getElementById("link");
let files;

link.onclick = () => { button.click(); };

button.addEventListener("click", (e) => {
  input.click();
});

input.addEventListener("change", (e) => {
  files = input.files;
  UpLoadFile.classList.add("active");
  ShowFiles(files);
  UpLoadFile.classList.remove("active");
});

UpLoadFile.addEventListener("dragover", (e) => {
  e.preventDefault();
  UpLoadFile.classList.add("active");
  dragText.textContent = "Suelta el archivo para subirlo.";
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
  dragText.textContent = "Arrastra y suelta tus documentos";
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
      <div id="${id}" class="file-container">
        <img src="${fileURL}" width="50">
        <div class="status">
          <span>${file.name}</span>
          <span class="status-text">
            Cargando...
          </span>
        </div>
      </div>
      `;
      
      const preview = document.querySelector('.UpLoadFile-container__preview').innerHTML;
      document.querySelector('.UpLoadFile-container__preview').innerHTML = image + preview;
    });

    fileReader.readAsDataURL(file);
    // SubirArchivo(file, id)
  }else{
    ArchivoInvalido(file);
  }
}

send.addEventListener("click", e => {
  SubirArchivo (file, id);
});

/* async function SubirArchivo (file, id) {
  const formData = new FormData();

  formData.append("file", file);

  try{
    const response = await fetch("http://localhost/COTEUS/partials/subirArchivos.php", {
      method: "POST",
      body: formData,
    });

    const responseText = await response.text();
    console.log(responseText);
    
    document.querySelector(`#${id} .status-text`).innerHTML = `<span class="sucess"> Archivo Subido Correctamente... </span>`;
  } catch(error) {
    const responseText = await response.text();
    document.querySelector(`#${id} .status-text`).innerHTML = `<span class="failure"> Error al subir el archivo... </span>`; 
  }
} */

function ArchivoInvalido(file){
  let preview = document.querySelector('.UpLoadFile-container__preview');
  preview.innerHTML += `<p class="archivoInvalido"> <b>Error:</b> Archivo invalido ${file.name}. No se permite ese tipo de archivo. </p>`;  
}
