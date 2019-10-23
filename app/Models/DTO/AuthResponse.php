<?php namespace Models;

class AuthResponse {
    public $firstName;
    public $lastName;
    public $email;
    public $token;
    public $roleSettings;

    public function getFirstName() {
        return($this->firstName);
    }

    public function getLastName() {
        return($this->lastName);
    }

    public function getEmail() {
        return($this->email);
    }

    public function getToken() {
        return($this->token);
    }

    public function getRoleSettings() {
        return($this->roleSettings);
    }

    public function setFirstName($mValue) {
        $this->firstName = $mValue;
    }

    public function setLastName($mValue) {
        $this->lastName = $mValue;
    }

    public function setEmail($mValue) {
        $this->email = $mValue;
    }

    public function setToken($mValue) {
        $this->token = $mValue;
    }

    public function setRoleSettings($mValue) {
        $this->roleSettings = $mValue;
    }

}
