<?php
namespace FormLib;

class Textarea extends Input
{
	private $cols;
	private $rows;

	/**
	 * Die Klasse wurde um zwei weitere Attribute, cols und rows, ergänzt. Daher benötigen wir
	 * einen neuen Konstruktor. Dieser ruft zuerst wieder den parent Konstruktor auf. Dann
	 * initialisieren wir unsere neuen Attribute.
	 *
	 * @param string $name
	 * @param string $id
	 * @param string $label
	 * @param string $type
	 * @param integer $cols
	 * @param integer $rows
	 */
	public function __construct(string $name, string $id, string $label, string $type = "text", int $cols = 30, $rows = 5)
	{
		parent::__construct($name, $id, $label, $type);
		$this->cols = $cols;
		$this->rows = $rows;
	}

	public function render(): string
	{
		$out = <<<OUTPUT
<label for="{$this->id}" class="form-label">{$this->label}</label>
<textarea name="{$this->name}" id="{$this->id}" class="form-control" rows="$this->rows" cols="$this->cols"></textarea>
OUTPUT;
		return $out;
	}
}