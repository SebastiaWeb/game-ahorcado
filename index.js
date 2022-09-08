var vidas = 6;
var imgCount = 2;
// Variables globales
var sizeArray = Object.keys(window.globalPalabra).length;
var numeroPalabra = Math.floor((Math.random() * ((sizeArray - 1) - 0 + 1)) + 0);
var palabra = window.globalPalabra[numeroPalabra];
var palabraSize = palabra.palabra.length;
var caracterStruct = "__";
var struct = "__";
var categorias = window.categoria;

var categoria = window.categoria[parseInt(palabra.idCategoria)-1];
var key = false;

// ELEMENTOS DOM
var vida = document.getElementById('vida');
var mostrarPalabra = document.getElementById('text_complete');
var btnAgregar = document.getElementById('btnAgregar');
var img = document.getElementById('imgError');
var mostrarCategoria = document.getElementById('mostrarCategoria');


vida.innerText = 'Vidas: ' + vidas;
mostrarCategoria.innerText = "Categoria: " + categoria.categoria;

structura();

function structura(){
    for (let i = 1; i < palabraSize; i++) {
        struct += " " + caracterStruct;
    }
}

mostrarPalabra.innerText = struct;

// EXPRESION REGULAR VALIDAR INPUT
const pattern = new RegExp('^[A-Za-z]+$', 'i');


btnAgregar.addEventListener('click', (e) => {


    let letra = document.getElementById('inputLetra').value;
    

    if (pattern.test(letra)) {

        var palabraJuego = encontrarLetra(palabra.palabra, letra, palabraSize, struct);

        if (palabraJuego != null) {
            struct = palabraJuego;
            mostrarPalabra.innerText = palabraJuego.toUpperCase();
            
            if (palabraJuego.split(' ').indexOf("__") == -1) {
                alert('Has ganado el juego');
                
                // REINICIAMOS EL JUEGO 
    
                numeroPalabra = Math.floor((Math.random() * ((sizeArray - 1) - 0 + 1)) + 0);
                palabra = window.globalPalabra[numeroPalabra];
                palabraSize = palabra.palabra.length;
                categoria = categorias[parseInt(palabra.idCategoria)-1];
                vidas = 6;
                struct = "__";
    
                structura()
                if(!key){
                    mostrarPalabra.innerText = struct;
                    vida.innerText = 'Vidas: ' + vidas;
                    mostrarCategoria.innerText = "Categoria: " + categoria.categoria;
                    key = true;
                    img.src = './asset/1.jpg';
                }
            }else{
                key = false;
            } 
        }

        
    } else {
        alert('caracter no valido')
    }

    inputLetra.value = "";
});

// var palabraJuego = encontrarLetra(palabra.palabra, 'a', palabraSize, struct);


function encontrarLetra(palabras, letra, size, structura) {
    let posiciones = [];
    let x = 0;
    let arrayPalabra = palabras.toLowerCase().split("");
    for (let i = 0; i < size; i++) {
        if (arrayPalabra[i] == letra.toLowerCase()) {
            posiciones[x] = i;
            x++;
        }

    }
    if (posiciones.length > 0) {

        var arrayStruct = structura.split(" ");
        for (let i = 0; i < posiciones.length; i++) {
            arrayStruct[posiciones[i]] = letra;
        }
        inputLetra.innerText = "";
        return arrayStruct.join(' ');
    } else {
        if (vidas > 0) {
            vidas -= 1;
            img.src = './asset/' + imgCount + '.jpg';
            imgCount += 1;
            
        }else{
            inputLetra.disabled = true;
            alert('Has perdido')
            mostrarPalabra.innerText = palabras.toUpperCase();
        }
    }
    alert('Letra equivocada');
    vida.innerText = 'Vidas: ' + vidas;

}