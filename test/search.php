<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Test</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Recherche de Maisons</h1>
    </header>
    <main>
        <form action="search_results.php" method="GET">
            <input type="text" name="location" placeholder="Localisation" required>
            <input type="date" name="check_in" required>
            <input type="date" name="check_out" required>
            <input type="number" name="guests" placeholder="Nombre de personnes" required>
            <button type="submit">Rechercher</button>
        </form>
    </main>
</body>
</html>
