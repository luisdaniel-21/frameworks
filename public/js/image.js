let vista_preliminar = (event)=>{

    let leer_img = new FileReader();
    let id_img = document.getElementById('img'); 

    leer_img.onload = ()=>{
        if(leer_img.readyState == 2 ){
            id_img.src = leer_img.result

        } 
    }

    leer_img.readAsDataURL(event.target.files[0])
}
let vista_previa = (event)=>{

    let leer_file = new FileReader();
    let id_file = document.getElementById('pdf'); 

    leer_file.onload = ()=>{
        if(leer_file.readyState == 2 ){
            id_file.src = leer_file.result

        }
    }

    leer_file.readAsDataURL(event.target.files[0])
}