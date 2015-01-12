<?php
namespace App\Repositories;

/**
 * Interface InquiryRepositoryInterface
 * @package App\Repositories
 */
interface InquiryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getInquiryAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getInquiry($id);

    /**
     * @param int $perPage
     * @return mixed
     */
    public function getInquiryPaginate($perPage = 20);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function addInquiry(array $attributes);

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updateInquiry($id, array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteInquiry($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function validate(array $attributes);

    /**
     * @return mixed
     */
    public function getErrors();
}