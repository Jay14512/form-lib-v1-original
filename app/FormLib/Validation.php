<?php
namespace FormLib;

class Validation
{
    private array $data;
    private array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function required(string $field, ?string $message = null)
    {
        if (!isset($this->data[$field]) || trim($this->data[$field]) === '') {
            $this->errors[$field] = $message ?? "This field is required";
        }
    }

    public function email(string $field, ?string $message = null)
    {
        if (
            isset($this->data[$field]) && !filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)
        ) {
            $this->errors[$field] = $message ?? "Please enter a valid email address.";
        }
    }

    public function checkbox(string $field, ?string $message = null)
    {
        if (!isset($this->data[$field])) {
            $this->errors[$field] = $message ?? "This checkbox must be checked.";
        }
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}