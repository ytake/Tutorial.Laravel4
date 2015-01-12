<?php
namespace App\Validators;

trait InquiryRule
{
    /** @var array  inquiry rule */
    public $inquiryRule = [
        'inquiry_name' => 'required',
        'inquiry_email' => 'required|email',
        'inquiry_title' => 'required',
        'inquiry_body' => 'required',
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