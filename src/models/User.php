<?php
require_once __DIR__ . '/../config/database.php';

class User {

    public static function findAll() {
        $conn = getDbConnection();
        $sql = "SELECT id, name, email, created_at FROM users ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        
        $users = [];
        if ($result && mysqli_num_rows($result) > 0) {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        mysqli_close($conn);
        return $users;
    }

    public static function findById($id) {
        $conn = getDbConnection();
        $sql = "SELECT id, name, email FROM users WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $user;
    }

    public static function save($name, $email) {
        $conn = getDbConnection();
        
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        
        $success = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $success;
    }
    
    public static function update($id, $name, $email) {
        $conn = getDbConnection();
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

        $success = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $success;
    }

    public static function delete($id) {
        $conn = getDbConnection();
        $sql = "DELETE FROM users WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $success = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $success;
    }
}
