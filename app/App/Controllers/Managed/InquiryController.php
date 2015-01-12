<?php
namespace App\Controllers\Managed;

use App\Controllers\BaseController;
use App\Repositories\InquiryRepositoryInterface;

/**
 * Class InquiryController
 * @package App\Controllers\Managed
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
    public function getIndex()
    {
        $result = $this->inquiry->getInquiryPaginate(self::PER_PAGE);
        return \View::make('managed.inquiry.index')->with('list', $result);
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getForm($one = null)
    {
        \Session::put(self::SESSION_KEY, \Session::token());

        $result = $this->inquiry->getInquiry($one);
        return \View::make('managed.inquiry.form')
            ->with('inquiry', $result)->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postConfirm($one = null)
    {
        $input = \Input::only(['inquiry_title', 'inquiry_body']);

        if(!$this->inquiry->validate($input)) {
            return \Redirect::route('managed.inquiry.form')
                ->withErrors($this->inquiry->getErrors())->withInput();
        }
        return \View::make('managed.inquiry.confirm')
            ->with('hidden', $this->setHiddenVars($input))->with('id', $one);
    }

    /**
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postApply($one = null)
    {
        if(\Input::get('_return')) {
            return \Redirect::route('managed.inquiry.form', ['id' => $one])->withInput();
        }
        $input = \Input::only(['inquiry_title', 'inquiry_body']);
        $input['user_id'] = \Auth::getUser()->user_id;

        if(is_null($one)) {
            $this->inquiry->addInquiry($input);
        }else{
            $this->inquiry->updateInquiry($one, $input);
        }
        // session remove
        \Session::forget(self::SESSION_KEY);
        return \View::make('managed.inquiry.apply');
    }

    /**
     * @param null $one
     * @return \Illuminate\View\View
     */
    public function getShow($one)
    {
        $result = $this->inquiry->getInquiry($one);
        return \View::make('managed.inquiry.show')->with('inquiry', $result);
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