// obteniendo datos de elementos HTML.
const upload_files = document.querySelector(".upload-files"); // form
const title = upload_files.querySelector(".upload-files__title");
const button = upload_files.querySelector(".upload-files__btn-files");
const input = upload_files.querySelector(".upload-files__inp-file");
const send = upload_files.querySelector(".upload-files-container__btn-send"); // submit
const link = upload_files.querySelector(".upload-files__link");
var files;

link.addEventListener("click", () => {
  button.click();
});
button.addEventListener("click", () => {
  //input.click();
});

// cada vez que cambia el valor el input, se guardan los archivos
input.addEventListener("change", () => {
  
  //se guardan los archivos del input a files.
  // files ← FileList;
  files = this.files;  // files es una propiedad del input por la Api File del DOM en HTML5
  
  ShowFiles(files);
  upload_files.classList.remove("dragleave_active");
});

// cuando sale arrastrando
upload_files.addEventListener("dragover", (e) => {
  e.preventDefault();
  upload_files.classList.add("dragleave_active");
  title.innerText = "Suelta el archivo para subirlo.";
});

// cuando entra arrastrando
upload_files.addEventListener("dragleave", (e) => {
  e.preventDefault();
  RemoverClaseActive();
});

 // cuando suelta
upload_files.addEventListener("drop", (e) => {
  e.preventDefault();
  input.files = (e.dataTransfer.files);
  ShowFiles(input.files);
  RemoverClaseActive();
});

function RemoverClaseActive(){
  upload_files.classList.remove("dragleave_active");
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
  
  const docType = file.type;
  const validExtensions = ['image/jpeg','image/jpg','image/png','image/pdf', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow'];
  
  if(validExtensions.includes(docType)){

    const id = `file-${Math.random().toString(32).substring(7)}`;
    const card = `
      <div id="${id}" class="preview__file">
        <div class="status">
          <span>${file.name}</span>
          <span class="preview__fileLoad"> Cargado. </span>
        </div>
      </div>
      `;
      
    const preview = document.querySelector('.upload-files-container__preview').innerHTML;
    document.querySelector('.upload-files-container__preview').innerHTML = card + preview;
  
  }else{
    ArchivoInvalido(file);
  }
}

function ArchivoInvalido(file){
  let preview = document.querySelector('.upload-files-container__preview');
  preview.innerHTML += `<p class="archivoInvalido"> <b>Error:</b> Archivo invalido ${file.name}. No se permite ese tipo de archivo. </p>`;  
}