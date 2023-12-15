<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <form method="post" action="/" enctype="multipart/form-data" id="qrForm">
        @csrf
        <input type="file" name="qrcode_image_data" accept="image/*" capture="camera" onchange="submitForm()">
    </form>

    @if(isset($text))
        <p>{{ $text }}</p>
    @endif

    <script>
        function submitForm() {
            document.getElementById("qrForm").submit();
        }
    </script>

</body>
</html>
