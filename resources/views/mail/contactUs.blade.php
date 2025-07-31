<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submitted</title>
</head>
<body>
<h1>New Contact Form Submission</h1>

<p><strong>Name:</strong>    {{ $contactUs->name }}</p>
<p><strong>Subject:</strong> {{ $contactUs->subject }}</p>
<p><strong>Message:</strong> {{ $contactUs->text }}</p>

</body>
</html>
