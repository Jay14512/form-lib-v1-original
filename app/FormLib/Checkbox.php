<?php
namespace FormLib;

class Checkbox extends Input
{
    /**
     * Constructor fills variables 
     *
     * @param string $name
     * @param string $id
     * @param string $label
     */

    // constructing the new class

    public function __construct(string $name, string $id, string $label)
    {
        parent::__construct($name, $id, $label);
    }

    public function render(): string
    {
        //1. Start: empty String
        $out = <<<OUTPUT
        <div  class="form-check">
       <input type='checkbox' name='{$this->name}' id='{$this->id}' class='form-check-input'>

       <label for='{$this->id}' class='form-check-label'>{$this->label}</label>
       </div>

    OUTPUT;
        return $out;
    }

}
