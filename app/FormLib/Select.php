<?php
namespace FormLib;

class Select extends Input
{

    // Adding the attribute that Select needs
    private $options;

    /**
     * Constructor fills variables 
     *
     * @param string $name
     * @param string $id
     * @param string $label
     * @param array $options
     */

    // constructing the new class

    public function __construct(string $name, string $id, string $label, array $options)
    {
        parent::__construct($name, $id, $label, 'select');
        $this->options = $options;
    }

    public function render(): string
    {
        //1. Start: empty String
        $out = "";

        //2. Add Label
        $out .= "<label for='{$this->id}' class='form-label'>{$this->label}</label>";

        //3. add opening select 
        $out .= "<select name='{$this->name}' id='{$this->id}' class='form-control'>";

        //4. render options 
        foreach ($this->options as $option) {
            $out .= "<option value='{$option}'>{$option}</option>";
        }

        //5. close select 
        $out .= "</select>";

        //6. return completed HTML String        
        return $out;
    }

}