<?php
namespace FormLib;

class Submit extends Input {
	public function render() : string
	{
		$out = <<<OUTPUT
<input type="{$this->type}" id="{$this->id}" class="btn btn-primary" value="{$this->label}">
OUTPUT;

		return $out;
	}
}