<?php
namespace FormLib;

class Radiobutton extends Input
{
    private $genders;

    /**
     * Constructor fills variables 
     *
     * @param string $name
     * @param string $id
     * @param string $label
     * @param string $type
     * @param array $genders
     */

    //calling the constructor 
    public function __construct(string $name, string $id, string $label, array $genders)
    {
        parent::__construct($name, $id, $label, 'radio');
        $this->genders = $genders;
    }

    public function render(): string
    {
        //1. Start: empty string 
        $out = "";

        //2. Add group label 
        $out .= "<p class='form-label'>{$this->label}</p>";

        //3. Start loop for radiobuttons 
        foreach ($this->genders as $gender) {
            $out .= "<div class='form-check'>
            <input type='radio' name='{$this->name}' id='{$this->id}_{$gender}' value='{$gender}' class='form-check-input'> 
            <label for='{$this->id}_{$gender}' class='form-check-label'>
            {$gender}
            </label>
            </div>";
        }


        return $out;
    }

}