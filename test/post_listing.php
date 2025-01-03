<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une Annonce - Test</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Publier une Annonce</h1>
    </header>
    <main>
        <form action="post_listing_process.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titre de l'annonce" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="number" name="price" placeholder="Prix par nuit" required>
            <input type="number" name="rooms" placeholder="Nombre de chambres" required>
            <input type="file" name="images[]" multiple>
            <button type="submit">Publier l'annonce</button>
        </form>
    </main>
</body>
</html>
