<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>

    <div id="reader" width="600px"></div>
    @if(isset($text))
        <p>Decoded text: </p>
        <p>{{ $text }}</p>
    @endif

    <script>
function onScanSuccess(decodedText, decodedResult) {
    console.log(decodedText);
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "/");

    var csrfInput = document.createElement("input");
    csrfInput.setAttribute("type", "hidden");
    csrfInput.setAttribute("name", "_token");
    csrfInput.setAttribute("value", csrfToken);

    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "decodedText");
    input.setAttribute("value", decodedText);

    form.appendChild(csrfInput);
    form.appendChild(input);

    document.body.appendChild(form);

    form.submit();
}

function onScanFailure(error) {
    console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: { width: 250, height: 250 } },
    /* verbose= */ false
);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    </script>

</body>
</html>
