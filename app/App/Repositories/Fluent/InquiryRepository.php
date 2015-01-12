<?php
namespace App\Repositories\Fluent;

use App\Repositories\InquiryRepositoryInterface;

/**
 * Class InquiryRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class InquiryRepository extends AbstractFluent implements InquiryRepositoryInterface
{
    // validator rule
    use \App\Validators\InquiryRule;

    /** @var string  */
    protected $cacheKey = "inquiry:";

    /** @var string */
    protected $table = 'inquirys';

    /** @var  */
    protected $primary = 'inquiry_id';

    /**
     * @return mixed|\stdClass
     */
    public function getInquiryAll()
    {
        return $this->all();
    }

    /**
     * @param $id
     * @return \stdClass
     */
    public function getInquiry($id)
    {
        return $this->find($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function addInquiry(array $attributes)
    {
        return $this->add($attributes);
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Pagination\Paginator
     */
    public function getInquiryPaginate($perPage = 20)
    {
        return $this->getConnection()->paginate($perPage);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return int
     */
    public function updateInquiry($id, array $attributes)
    {
        return $this->update($id, $attributes);
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteInquiry($id)
    {
        return $this->delete($id);
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function validate(array $attributes)
    {
        $validate = \Validator::make($attributes, $this->inquiryRule);
        if ($validate->passes()) {
            return true;
        }
        $this->setErrors($validate->messages());
        return false;
    }

    /**
     * Set error messages
     * @var \Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}