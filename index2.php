<!DOCTYPE html>
<html>
<head>
    <title>Encriptador de Texto</title>
</head>
<body>
    <h1>Encriptador de Texto</h1>

    <p>Introduce un texto:</p>
    <textarea id="inputText" rows="4" cols="50"></textarea>
    <br>
    <button onclick="encriptarTexto()">Encriptar</button>

    <script>
    function primeraCapaEncriptacionX(texto) {
    let primeraEQ = texto.split("");
    primeraEQ.push(".");
 
    let vocales = ["A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "."];
 
    let cont = 0;
    let original = [];
    let conso = [];
 
    for (let i = 0; i < primeraEQ.length; i++) {
      if (vocales.includes(primeraEQ[i])) {
        if (conso.length > 0) {
          conso.reverse().forEach((key) => original.push(key));
        }
 
        original.push(primeraEQ[i]);
        cont = 0;
        conso = [];
      } else {
        cont++;
 
        if (cont === 1) {
          if (vocales.includes(primeraEQ[i + 1])) {
            original.push(primeraEQ[i]);
          } else {
            conso.push(primeraEQ[i]);
          }
        } else {
          conso.push(primeraEQ[i]);
        }
      }
    }
 
    original.pop();

            return original.join("");
        }

        function segundaCapaEncriptacion(texto) {
            let caracteres = texto.split("");
    let resultado = [];
 
    for (let i = 0; i < caracteres.length; i++) {
      if (i % 2 === 0) {
        // Tomar sucesivamente el primer carácter de X
        resultado.push(caracteres[i]);
      } else {
        // Tomar sucesivamente el último carácter de X
        resultado.unshift(caracteres[i]);
      }
   
        }
        return resultado.join("");
    }

    function encriptarTexto() {
            const textoOriginal = document.getElementById("inputText").value;
            const encriptacionX = primeraCapaEncriptacionX(textoOriginal);
            const encriptacionFinal = segundaCapaEncriptacion(encriptacionX);

            alert("Texto Encriptado:\n\n" + encriptacionFinal);
        }
    </script>
</body>
</html>