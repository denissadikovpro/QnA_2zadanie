<?php
namespace App;

require_once 'Database.php';

use PDO;
use PDOException;

class QnA extends Database {

    public function getQuestionsAndAnswers() {
        try {
            $stmt = $this->pdo->query("SELECT question, answer FROM qna_databaza");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->handleError("Chyba pri načítaní otázok: " . $e->getMessage());
        }
    }

    public function insertUniqueQuestionAnswer($question, $answer) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM qna_databaza WHERE question = ? AND answer = ?");
            $stmt->execute([$question, $answer]);

            if ($stmt->fetchColumn() == 0) {
                $stmt = $this->pdo->prepare("INSERT INTO qna_databaza (question, answer) VALUES (?, ?)");
                $stmt->execute([$question, $answer]);
                return "Otázka a odpoveď boli pridané.";
            } else {
                return "Táto otázka a odpoveď už existujú.";
            }
        } catch (PDOException $e) {
            $this->handleError("Chyba pri vkladaní údajov: " . $e->getMessage());
        }
    }
}
?>
