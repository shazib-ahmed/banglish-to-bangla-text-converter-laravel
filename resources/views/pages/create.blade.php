<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Translation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 700px;">
        <form action="{{ route('translations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Type in Banglish:</label>
                <textarea id="banglish_input" name="banglish_text" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Bangla Output:</label>
                <textarea id="bangla_output" name="bangla_text" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Arabic Text (Optional):</label>
                <textarea name="arabic_text" class="form-control" rows="2"></textarea>
            </div>

            <button type="submit" class="btn btn-success w-100">Save</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('banglish_input');
        const output = document.getElementById('bangla_output');

        input.addEventListener('input', function() {
            // Check if window.Avro is loaded from compiled app.js
            if (window.Avro) {
                // Using the specific method of nodejs-avro-phonetic package
                output.value = window.Avro.parse(this.value);
            } else {
                console.error("Avro package not loaded yet!");
            }
        });
    });
</script>

</body>
</html>
