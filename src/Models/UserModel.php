<?php

namespace App\Models;


class UserModel extends Model
{
    public function get(int $id)
    {
        $statement = "SELECT id, email FROM users WHERE id = ?;";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute([$id]);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getAll()
    {
        $statement = "SELECT id, email FROM users;";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function create(array $request)
    {
        if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email address is invalid.\n");
        }

        // TODO: add password hashing

        $statement = "INSERT INTO users (email, password) VALUES (:email, :password);";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute([
                'email' => $request['email'],
                'password'  => $request['password'],
            ]);
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM person WHERE id = :id;";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(['id' => $id]);
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}