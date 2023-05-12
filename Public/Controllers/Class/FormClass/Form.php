<?php
namespace App\Html;
class Form
{

public $type;
public $attributes;
public $name;

public function __construct()
    {
    }

public function Input($type,array $attributes)
    {
    $this->attributes=$attributes;
    $this->type=$type;
    if($this->type=='checkbox'):
        $this->name=$this->attributes['name'];
        $this->attributes['name']=$this->attributes['name'].'[]';;

    endif;
    return<<<HTML
        <div class="form-group">
            <input type="{$this->type}" name="{$this->name}" id="{$this->name}">
            <label for="{$this->name}">{$this->name}</label>
        </div>
HTML;
    }

public function TextArea()
    {
    return<<<HTML
        <div class="form-group">
            <label for="malick"></label>
            <textarea name="malick" id="malick" cols="30" rows="10"></textarea>
        </div>
HTML;
        
    }

public function Submit()
    {
        
    }
}

?>
