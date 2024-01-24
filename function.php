<?php
  require 'db.php';

  /**
   * sanitize
   * Sanitizes data from a form submission
   * @param array $data
   * @return array
   */
  function sanitize ($data) {
    foreach ($data as $key => $value) {
      if ($key === 'phone') {
        $value = preg_replace('/[^0-9]/', '', $value);
      } 

      $data[$key] = htmlspecialchars(stripslashes(trim($value)));
    }

    return $data;
  }


  /**
   * validate
   * Validates data from a form submission
   * @param array $data
   * @return array $errors
   */
  function validate ($data) {
    $fields = ['title', 'email', 'date'];
    $errors = [];

    foreach ($fields as $field) {
        switch ($field) {
            case 'title':
                if (empty($data[$field])) {
                    $errors[$field] = 'Title is required';
                } elseif (strlen($data[$field]) < 5 || strlen($data[$field]) > 50) {
                    $errors[$field] = 'Title must be between 5 and 50 characters';
                }
                break;
            
            case 'email':
                if (empty($data[$field])) {
                    $errors[$field] = 'Email is required';
                } elseif (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'Email is invalid';
                }
                break;
            
            case 'date':
                if (empty($data[$field])) {
                    $errors[$field] = 'Date is required';
                } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data[$field])) {
                    $errors[$field] = 'Date format should be YYYY-MM-DD';
                }
                break;
        }
    }

    return $errors;
}




  /**
   * getEvents
   * Gets all events from the database
   * @return array
   */
  function getEvents () {
    global $db;
    $sql = "SELECT * FROM events";
    $result = $db->query($sql);
    $events = $result->fetchAll(PDO::FETCH_ASSOC);

    return $events;
    // return [
    //   "id" => 1,
    //   "title" => "Event 1",
    //   "email" => "test@example.com",
    //   "date" => "2023-10-10"
    // ];
  }

  
  /**
   * createEvent
   * Creates an event in the database
   * @param array $data
   * @return int
   */
  
  function createEvent($data) {
    global $db;

    $sql = "INSERT INTO events (title, email, date) VALUES (:title, :email, :date)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'title' => $data['title'],
        'email' => $data['email'],
        'date' => $data['date'],
    ]);

    return $db->lastInsertId();
  }
  

  /**
   * deleteEvent
   * Deletes an event from the database
   * @param int $id
   * @return int
   */
  function deleteEvent ($id) {
    global $db;
    $sql = "DELETE FROM events WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
  
    return true;
  }


