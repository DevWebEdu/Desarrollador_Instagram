import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu aquí imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif, .svg, .webp, .avif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
});