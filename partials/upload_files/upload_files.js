
// obteniendo datos de elementos HTML.
const upload_files = document.querySelector(".upload-files");
const title = upload_files.querySelector(".upload-files__title");
const button = upload_files.querySelector(".upload-files__btn-files");
const input = upload_files.querySelector(".upload-files__inp-file");
const send = upload_files.querySelector(".upload-files-container__btn-send");
const link = upload_files.querySelector(".upload-files__link");
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
  
  upload_files.classList.add("active");
  ShowFiles(files);
  upload_files.classList.remove("active");
});

upload_files.addEventListener("dragover", (e) => {
  e.preventDefault();
  upload_files.classList.add("active");
  title.textContent = "Suelta el archivo para subirlo.";
});

upload_files.addEventListener("dragleave", (e) => {
  e.preventDefault();
  RemoverClaseActive();
});

upload_files.addEventListener("drop", (e) => {
  e.preventDefault();
  files = e.dataTransfer.files;
  ShowFiles(files);
  RemoverClaseActive();
});

function RemoverClaseActive(){
  upload_files.classList.remove("active");
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
      
      const preview = document.querySelector('.upload-files-container__preview').innerHTML;
      document.querySelector('.upload-files-container__preview').innerHTML = image + preview;
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
  let preview = document.querySelector('.upload-files-container__preview');
  preview.innerHTML += `<p class="archivoInvalido"> <b>Error:</b> Archivo invalido ${file.name}. No se permite ese tipo de archivo. </p>`;  
}