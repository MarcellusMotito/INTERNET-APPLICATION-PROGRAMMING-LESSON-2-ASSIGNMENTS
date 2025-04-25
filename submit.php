<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aspiration = trim($_POST['aspiration']);
    $hobby = trim($_POST['hobby']);
    $talents = trim($_POST['talents']);
    $school = trim($_POST['school']);
    $major_course = trim($_POST['major_course']);
    $user_id = $_SESSION['user_id'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO submissions (user_id, aspiration, hobby, talents, school, major_course) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $aspiration, $hobby, $talents, $school, $major_course]);
        
        
        $_SESSION['submission_success'] = true;
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error submitting profile: " . $e->getMessage();
    }
}