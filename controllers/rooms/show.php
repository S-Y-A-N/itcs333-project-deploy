<?php

authorize(isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$room_id = (int) $_GET['id'];

// zainab
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
  $email = $_SESSION['email']; // User email
  $comment = htmlspecialchars(trim($_POST['comment']), ENT_QUOTES, 'UTF-8');

  if (!empty($comment)) {
      // Insert the comment in database
      $stmt = $db->prepare('INSERT INTO comments (room_id, user_email, comment) VALUES (:room_id, :email, :comment)');
      $stmt->bindParam(':room_id', $room_id);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':comment', $comment);

      if ($stmt->execute()) {
          header("Location: show.php?id=$room_id");
          exit;
      } else {
          echo "Error submitting comment.";
      }
  } else {
      echo "Comment cannot be empty.";
  }
}


$roomQuery = $db->query('SELECT * FROM rooms WHERE room_id = :id', [
  'id' => $room_id
]);

$room = $roomQuery->fetch();

$commentsQuery = $db->query('SELECT * FROM comments WHERE room_id = :room_id ORDER BY created_at DESC', [
  'room_id' => $room_id
]);
$comments = $commentsQuery->fetchAll();
//zainab

view("rooms/show.view.php", [
  'h1' => "S40-{$room_id}",
  'p' => "Room Details",
  'room' => $room,
  'comments' => $comments
]);