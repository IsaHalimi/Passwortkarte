<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rows = intval($_POST['rows']);
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9), str_split('!@#$%^&*()-_=+[]{};:,.<>?/|'));

    echo '<table id="passwordCard">';
    for ($i = 0; $i < $rows; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 26; $j++) {
            $random_character = $characters[array_rand($characters)];
            echo "<td>{$random_character}</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
