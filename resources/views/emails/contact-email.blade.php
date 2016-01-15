<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
</head>
<body>
    <h1>Suce</h1>
        <ul>
            <li>Nom : {{ $data["userName"]  }}</li>
            <li>Email : {{ $data["userEmail"]  }}</li>
            <li>Mobile : {{ $data["userPhone"]  }}</li>
            <li>Sujet : {{ $data["userMsg"]  }}</li>
        </ul>
</body>
</html>