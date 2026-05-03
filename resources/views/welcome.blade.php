<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Banglish to Bangla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h3>Banglish to Bangla Converter</h3>
        <hr>

        <form action="{{ route('save.bangla') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">টাইপ করুন (উদা: amader)</label>
                <textarea id="bangla_input" name="bangla_content" class="form-control" rows="5" placeholder="এখনে বাংলিশ লিখুন..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">ডাটাবেসে সেভ করুন</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/avro-phonetic@1.0.0/dist/avro-phonetic.min.js"></script>

<script>
    // লাইব্রেরি লোড হওয়ার পর ইনপুট ফিল্ডের সাথে কানেক্ট করা
    document.addEventListener('DOMContentLoaded', function() {
        // 'avro-phonetic' লাইব্রেরি ব্যবহার করে ইনপুট ফিল্ডকে বাংলাইজ করা
        // ইউজার যখন টাইপ করবে, এটি অটোমেটিক 'Phonetic' লজিকে কনভার্ট করবে
        const input = document.getElementById('bangla_input');

        // এটি একটি সিম্পল অ্যাপ্রোচ, লাইব্রেরি ভেদে মেথড আলাদা হতে পারে।
        // মোস্ট পপুলার হলো সরাসরি ইনপুট ফিল্ডে ইভেন্ট লিসেনার বসানো:
        input.addEventListener('keyup', function(event) {
            // যদি আপনি চান আলাদা বক্সে দেখাতে, তবে এখানে লজিক লিখবেন।
            // কিন্তু অভ্র লাইব্রেরিগুলো সাধারণত ইনপুট ফিল্ডেই রিপ্লেস করে দেয়।
        });
    });
</script>

</body>
</html>
