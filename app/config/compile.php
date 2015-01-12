<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Additional Compiled Classes
    |--------------------------------------------------------------------------
    |
    | Here you may specify additional classes to include in the compiled file
    | generated by the `artisan optimize` command. These should be classes
    | that are included on basically every request into the application.
    |
    */
    // compile 追記例
    app_path() . '/App/Controllers/BaseController.php',
    app_path() . '/App/Controllers/HomeController.php',
    app_path() . '/App/Controllers/Managed/HomeController.php',
    app_path() . '/App/Controllers/Managed/AuthenticateController.php',
    app_path() . '/App/Controllers/Managed/ArticleController.php',
    app_path() . '/App/Controllers/Managed/InquiryController.php',
    app_path() . '/App/Controllers/Api/ArticleController.php',
    app_path() . '/App/Controllers/Inquiry/InquiryController.php',
    app_path() . '/App/Controllers/Inquiry/HomeController.php',
    app_path() . '/App/Repositories/ArticleRepositoryInterface.php',
    app_path() . '/App/Repositories/InquiryRepositoryInterface.php',
];