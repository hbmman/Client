<?php


namespace app\core\form;


use app\core\Model;

class TextareaField extends Field
{

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }
    public function renderInput()
    {
        return sprintf('
        <textarea class="form-control%s" name="%s">%s</textarea>',
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        $this->attribute,
        $this->model->{$this->attribute},
        );
    }
}
