var carrusel = [
    {
        nombre: '1',
        link: 'assets/img/2.jpg',
        descripcion: ''
    },
    {
        nombre: '2',
        link: 'assets/img/3.jpg',
        descripcion: ''
    },
    {
        nombre: '3',
        link: 'assets/img/4.jpg',
        descripcion: ''
    },
    {
        nombre: '4',
        link: 'assets/img/12.jpg',
        descripcion: ''
    }
]

function renderCarrusel(){
    return new Promise((resolve, reject)=>{
        plantillaCarrusel = ``;
        for(var x = 0; x<carrusel.length; x++){
            console.log('carrusel.link',carrusel[x].link);
            if(x !== 0){
                plantillaCarrusel += `<img src="${carrusel[x].link}" alt="${carrusel[x].descripcion}" style="opacity: 0">`;
            }
            else{
                plantillaCarrusel += `<img src="${carrusel[x].link}" alt="${carrusel[x].descripcion}" style="opacity: 1">`;
            }
        }
        resolve(plantillaCarrusel);
    });

}

function readyCarrusel(plantilla){
    document.getElementById("carousel").innerHTML = plantilla;
    
    var images = Array.from(document.getElementById('carousel').children);
    var currentImageIndex = 0;
    var totalImages = images.length;

    function changeImage() {
        console.log('changeImage');
        images[currentImageIndex].style.opacity = '0';
        currentImageIndex++;
        if (currentImageIndex === totalImages) {
            currentImageIndex = 0;
        }
        images[currentImageIndex].style.opacity = '1';
    }
    setInterval(changeImage, 2500);
}


async function traerServicios() {
    try {  
      const carruselResponse = await renderCarrusel();
      readyCarrusel(carruselResponse);
  
    } catch (error) {
      console.error(error);
      // Manejar el error de forma adecuada
    }
  }

traerServicios()

loader();