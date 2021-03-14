<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf
{
    public static $classMap = array (
        'About' => __DIR__ . '/../..' . '/views/welcome/about/about.class.php',
        'Celebrity' => __DIR__ . '/../..' . '/models/celebrity.class.php',
        'CelebrityAdd' => __DIR__ . '/../..' . '/views/celebrity/add/celebrity_add.class.php',
        'CelebrityController' => __DIR__ . '/../..' . '/controllers/celebrity_controller.class.php',
        'CelebrityDetails' => __DIR__ . '/../..' . '/views/celebrity/details/celebrity_details.class.php',
        'CelebrityEdit' => __DIR__ . '/../..' . '/views/celebrity/edit/celebrity_edit.class.php',
        'CelebrityError' => __DIR__ . '/../..' . '/views/celebrity/error/celebrity_error.class.php',
        'CelebrityFilter' => __DIR__ . '/../..' . '/views/celebrity/filter/celebrity_filter.class.php',
        'CelebrityIndex' => __DIR__ . '/../..' . '/views/celebrity/index/celebrity_index.class.php',
        'CelebrityIndexView' => __DIR__ . '/../..' . '/views/celebrity/celebrity_index_view.class.php',
        'CelebrityModel' => __DIR__ . '/../..' . '/models/celebrity_model.class.php',
        'CelebritySearch' => __DIR__ . '/../..' . '/views/celebrity/search/celebrity_search.class.php',
        'Compare' => __DIR__ . '/../..' . '/models/compare.class.php',
        'CompareController' => __DIR__ . '/../..' . '/controllers/compare_controller.class.php',
        'CompareDetail' => __DIR__ . '/../..' . '/views/compare/detail/compare_detail.class.php',
        'CompareError' => __DIR__ . '/../..' . '/views/compare/error/compare_error.class.php',
        'CompareIndex' => __DIR__ . '/../..' . '/views/compare/index/compare_index.class.php',
        'CompareModel' => __DIR__ . '/../..' . '/models/compare_model.class.php',
        'ComposerAutoloaderInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'EmailSymbolExceptions' => __DIR__ . '/../..' . '/exceptions/email_symbol_exceptions.class.php',
        'Home' => __DIR__ . '/../..' . '/views/welcome/home/home.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'NewUser' => __DIR__ . '/../..' . '/views/user/register/new_user.class.php',
        'NumericValueExceptions' => __DIR__ . '/../..' . '/exceptions/numeric_value_exceptions.class.php',
        'PostDataExceptions' => __DIR__ . '/../..' . '/exceptions/post_data_exceptions.class.php',
        'QueryFalseExceptions' => __DIR__ . '/../..' . '/exceptions/query_false_exceptions.class.php',
        'Register' => __DIR__ . '/../..' . '/views/user/register/register.class.php',
        'Reset' => __DIR__ . '/../..' . '/views/user/reset/reset.class.php',
        'ResetConfirm' => __DIR__ . '/../..' . '/views/user/reset/reset_confirm.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserIndex' => __DIR__ . '/../..' . '/views/user/index/user_index.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'VerifyUser' => __DIR__ . '/../..' . '/views/user/index/verify_user.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf::$classMap;

        }, null, ClassLoader::class);
    }
}