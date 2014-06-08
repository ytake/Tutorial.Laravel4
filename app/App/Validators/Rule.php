<?php
namespace App\Validators;

trait Rule
{
    /** @var array  article rule */
    public $articleRule = [
        'article_title' => 'required',
        'article_body' => 'required',
    ];

    /**
     * @param $rule
     * @return mixed
     */
    public function getRule($rule)
    {
        return $this->$rule;
    }
}