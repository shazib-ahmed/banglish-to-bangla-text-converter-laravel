<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Translation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 700px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Translation</h4>
            <a href="{{ route('translations.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
        </div>

        <form action="{{ route('translations.update', $translation->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Type in Banglish:</label>
                <textarea id="banglish_input" name="banglish_text" class="form-control" rows="4">{{ $translation->banglish_text }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Bangla Output:</label>
                <textarea id="bangla_output" name="bangla_text" class="form-control" rows="4">{{ $translation->bangla_text }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Arabic Text (Optional):</label>
                <textarea name="arabic_text" class="form-control" rows="2">{{ $translation->arabic_text }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Translation</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('banglish_input');
        const output = document.getElementById('bangla_output');

        input.addEventListener('input', function() {
            if (window.Avro) {
                output.value = window.Avro.parse(this.value);
            } else {
                console.error("Avro package not loaded yet!");
            }
        });
    });
</script>

</body>
</html>
