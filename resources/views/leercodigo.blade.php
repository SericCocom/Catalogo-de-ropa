<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="js/quagga.min.js"></script>
    <title> Ler Barcode </title>
</head>

<body>

    <p>Barcode: <span class="found"></span></p>
<div id="interactive" class="viewport"></div>

   

    <script>

        Quagga.init({
    inputStream: {
        name: "Live",
        type: "LiveStream",
        constraints: {
            width: 640,
            height: 480,
            facingMode: "environment"
        }
    },
    locator: {
        patchSize: "medium",
        halfSample: true
    },
    numOfWorkers: 4,
    locate: true,
    decoder : {
        readers: ["code_128_reader", "ean_reader"]
    }
}, function() {
    Quagga.start();
});

Quagga.onDetected(function(result) {
    var code = result.codeResult.code;
    document.querySelector(".found").innerHTML = code;
});

    </script>

</body>

</html>