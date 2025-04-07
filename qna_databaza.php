<?php
require_once 'QnA.php';

// Pripojenie k databaze
$qna = new QnA("localhost", "qna_databaza", "root", "");

// Nacitanie otazok
$questions = $qna->getQuestionsAndAnswers();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Otazky a odpovede</title>
</head>
<body>
    <h1>Casto kladene otazky</h1>
    <ul>
        <?php foreach ($questions as $q): ?>
            <li><strong><?= htmlspecialchars($q['question']) ?></strong>: <?= htmlspecialchars($q['answer']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
