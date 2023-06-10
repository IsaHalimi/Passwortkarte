<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Passwortkarte Generator</title>
    <script>
        function printCard() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Passwortkarte Generator</h1>
    <br>
    <br>
    <form action="index.php" method="POST">
        <label for="rows">Zeilenanzahl (1-30): </label>
        <input type="number" id="rows" name="rows" min="1" max="30" required>
        <button type="submit">Karte erstellen</button>
    </form>
    <br>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rows = intval($_POST['rows']);
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9), str_split('!@#$%^&*()-_=+[]{};:,.<>?/|'));

        $html = '<table id="passwordCard">';
        $html .= '<tr><td></td>';
        for ($i = 0; $i < 26; $i++) {
            $html .= "<td>" . chr(65 + $i) . "</td>";
        }
        $html .= '</tr>';

        for ($i = 0; $i < $rows; $i++) {
            $html .= "<tr><td>" . ($i + 1) . "</td>";
            for ($j = 0; $j < 26; $j++) {
                $random_character = $characters[array_rand($characters)];
                $html .= "<td>{$random_character}</td>";
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        echo $html;
    }
    ?>
    <br>
    <br>
    <br>
    <button onclick="printCard()">Passwortkarte drucken</button>
</body>
</html>
