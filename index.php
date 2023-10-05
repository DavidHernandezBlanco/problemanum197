<!DOCTYPE html>
<html>
<head>
    <title>Reordenar Consonantes</title>
</head>
<body>
    <h1>Reordenar Consonantes</h1>
    <p>Introduce una frase:</p>
    <textarea id="inputText" rows="4" cols="50"></textarea>
    <br>
    <button onclick="reorderConsonants()">Reordenar</button>
    <br>
    <p>Resultado:</p>
    <div id="output"></div>

    <script>
        function reorderConsonants() {
            const inputText = document.getElementById("inputText").value;
            const resultado = reorderConsonantsJS(inputText);
            document.getElementById("output").innerText = resultado;
        }

        function reorderConsonantsJS(input) {
            let primeraEQ = input.split("");
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
    </script>
</body>
</html>
