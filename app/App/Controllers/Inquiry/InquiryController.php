<?php
namespace App\Controllers\Inquiry;

use App\Controllers\BaseController;
use App\Repositories\InquiryRepositoryInterface;

/**
 * Class InquiryController
 * @package App\Controllers\Inquiry
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class InquiryController extends BaseController
{
    // constants
    const PER_PAGE = 10;

    const SESSION_KEY = 'add_inquiry';

    /** @var InquiryRepositoryInterface */
    protected $inquiry;

    /**
     * @param InquiryRepositoryInterface $inquiry
     */
    public function __construct(InquiryRepositoryInterface $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * index / paginate
     * @return \Illuminate\View\View
     */
    /*
    public function getIndex()
    {
        $result = $this->inquiry->getInquiryPaginate(self::PER_PAGE);
        return \View::make('inquiry.index')->with('list', $result);
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getIndex($one = null)
    {
        \Session::put(self::SESSION_KEY, \Session::token());

        $result = $this->inquiry->getInquiry($one);
        return \View::make('inquiry.form')
            ->with('inquiry', $result)->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postConfirm($one = null)
    {
        $input = \Input::only(['inquiry_name','inquiry_email','inquiry_title', 'inquiry_body']);

        if(!$this->inquiry->validate($input)) {
            return \Redirect::route('inquiry.form')
                ->withErrors($this->inquiry->getErrors())->withInput();
        }
        return \View::make('inquiry.confirm')
            ->with('hidden', $this->setHiddenVars($input))->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postApply($one = null)
    {
        if(\Input::get('_return')) {
            return \Redirect::route('inquiry.form', ['id' => $one])->withInput();
        }
        $input = \Input::only(['inquiry_name','inquiry_email','inquiry_title', 'inquiry_body']);

        if(is_null($one)) {
            $this->inquiry->addInquiry($input);
        }else{
            $this->inquiry->updateInquiry($one, $input);
        }

        // メール送信
        $result = \Mail::send('mails.inquiry', $input, function ($e) use($input) {
            $e->to(\Config::get('mail.from.address'), \Config::get('mail.from.name'))
                ->replyTo($input['inquiry_email'], 'Inquiry')
                ->subject('【お問い合わせ】'.$input['inquiry_title'])
                ->setCharset('UTF-8');
        });

        #var_dump($result);exit;

        // session remove
        \Session::forget(self::SESSION_KEY);
        return \View::make('inquiry.apply');
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getShow($one)
    {
        $result = $this->inquiry->getInquiry($one);
        return \View::make('inquiry.show')->with('inquiry', $result);
    }

    /**
     * @access private
     * @param array $array
     * @return array
     */
    private function setHiddenVars(array $array)
    {
        $attributes = [];
        foreach($array as $key => $value) {
            $attributes[] = \Form::hidden($key, $value);
        }
        return implode("\n", $attributes);
    }

}