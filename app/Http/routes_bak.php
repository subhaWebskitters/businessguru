<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {    
        Route::any('/',                         array('as'=>'register',                 'uses'=>'RegisterController@index'));
        Route::any('save_invester_step',        array('as'=>'save_invester_step',       'uses'=>'InvesterController@signup_basic'));
        Route::any('invester_email_unique',     array('as'=>'invester_email_unique',    'uses'=>'InvesterController@business_email_unique'));
        Route::any('send_otp/',                 array('as'=>'send_otp',                 'uses'=>'InvesterController@send_otp'));
        Route::any('verify_otp/',               array('as'=>'verify_otp',               'uses'=>'InvesterController@verify_otp'));
        Route::any('sign_up/',                  array('as'=>'sign_up',                  'uses'=>'InvesterController@signup'));
        Route::any('sign_in/',                  array('as'=>'sign_in',                  'uses'=>'InvesterController@signin'));
        Route::any('investor_dashboard/',       array('as'=>'investor_dashboard',       'uses'=>'InvesterController@investor_dashboard'));
        Route::any('logout/',                   array('as'=>'logout',                   'uses'=>'InvesterController@logout'));
        
        Route::any('save_business_step',        array('as'=>'save_business_step'        ,'uses'=>'BusinessController@signup'));
        Route::any('buss_send_otp/',            array('as'=>'buss_send_otp'             ,'uses'=>'BusinessController@send_otp'));
        Route::any('buss_verify_otp/',          array('as'=>'buss_verify_otp'           ,'uses'=>'BusinessController@verify_otp'));
        Route::any('business_email_unique',     array('as'=>'business_email_unique'     ,'uses'=>'BusinessController@business_email_unique'));
        Route::any('business_evaluation_email',     array('as'=>'business_evaluation_email'     ,'uses'=>'BusinessController@business_evaluation_email'));
        Route::any('business_image_upload',     array('as'=>'business_image_upload'     ,'uses'=>'BusinessController@do_image_upload'));
        Route::any('/download_file/{file}/',    array('as'=>'download_file'             ,'uses'=>'BusinessController@download_file'));
        
        
        
        Route::group(array('prefix'=>'admin','namespace'=>'admin'), function () {
        Route::get('/',                array('as' => 'admin', 'uses'=>'HomeController@index' ));
        Route::post('/',               array('as' => 'admin', 'uses'=>'HomeController@index' ));
    });

Route::group(array('prefix'=>'admin','namespace'=>'admin','middleware' => 'admin'), function () {
        Route::get('/dashboard',                        array('as' => 'admin_dashboard', 'uses'=>'HomeController@dashboard' ));
        Route::get('/admin_logout',                     array('as' => 'admin_logout', 'uses'=>'HomeController@admin_logout' ));
        Route::get('/edit-profile',                     array('as' => 'edit_profile', 'uses'=>'HomeController@edit' ));
        Route::post('/update_profile',                  array('as' => 'update_profile', 'uses'=>'HomeController@update' ));
        
        Route::get('/company',                          array('as' => 'admin_company', 'uses'=>'CompanyController@index' ));
        Route::get('/company/create',                   array('as' => 'admin_company_create', 'uses'=>'CompanyController@create' ));
        Route::post('/company/create-action',           array('as' => 'admin_company_create_action', 'uses'=>'CompanyController@store' ));
        Route::get('/company/edit/{id}',                array('as' => 'admin_company_edit', 'uses'=>'CompanyController@edit' ));
        Route::post('/company/update-action',           array('as' => 'admin_company_update_action', 'uses'=>'CompanyController@update' ));
        Route::get('/company/delete/{id}',              array('as' => 'admin_company_delete', 'uses'=>'CompanyController@delete' ));
        Route::post('/company/set-status',              array('as' => 'admin_company_set_status', 'uses'=>'CompanyController@set_status' ));
        
        Route::post('/candidate/set-status',            array('as' => 'admin_candidate_set_status', 'uses'=>'CandidateController@set_status' ));
        
        Route::get('/countries',                    array('as' => 'admin_countries', 'uses'=>'CountryController@index' ));
        Route::get('/country/create',               array('as' => 'admin_countries_create', 'uses'=>'CountryController@create'));
        Route::post('/country/create-action',       array('as' => 'admin_countries_create_action', 'uses'=>'CountryController@store' ));
        Route::get('/country/edit/{id}',            array('as' => 'admin_countries_edit', 'uses'=>'CountryController@edit'));
        Route::post('/country/update-action/{id}',  array('as' => 'admin_countries_update_action', 'uses'=>'CountryController@update' ));
        Route::get('/country/delete/{id}',          array('as' => 'admin_countries_delete', 'uses'=>'CountryController@delete' ));
        
        Route::get('/state',                    array('as' => 'admin_emirates', 'uses'=>'StateController@index' ));
        Route::get('/state/create',             array('as' => 'admin_emirates_create', 'uses'=>'StateController@create'));
        Route::post('/state/create-action',     array('as' => 'admin_emirates_create_action', 'uses'=>'StateController@store' ));
        Route::get('/state/edit/{id}',          array('as' => 'admin_emirates_edit', 'uses'=>'StateController@edit'));
        Route::post('/state/update-action/{id}',array('as' => 'admin_emirates_update_action', 'uses'=>'StateController@update' ));
        Route::get('/state/delete/{id}',        array('as' => 'admin_emirates_delete', 'uses'=>'StateController@delete' ));
        
        Route::get('/cities',                           array('as' => 'admin_cities', 'uses'=>'CityController@index' ));
        Route::get('/cities/create',                    array('as' => 'admin_cities_create', 'uses'=>'CityController@create'));
        Route::post('/cities/create-action',            array('as' => 'admin_cities_create_action', 'uses'=>'CityController@store' ));
        Route::get('/cities/edit/{id}',                 array('as' => 'admin_cities_edit', 'uses'=>'CityController@edit'));
        Route::post('/cities/update-action/{id}',       array('as' => 'admin_cities_update_action', 'uses'=>'CityController@update' ));
        Route::get('/cities/delete/{id}',               array('as' => 'admin_cities_delete', 'uses'=>'CityController@delete' ));
        
        Route::get('/educations',                          array('as' => 'admin_education', 'uses'=>'EducationController@index' ));
        Route::get('/education/create',                    array('as' => 'admin_education_create', 'uses'=>'EducationController@create'));
        Route::post('/education/create-action',            array('as' => 'admin_education_create_action', 'uses'=>'EducationController@store' ));
        Route::get('/education/edit/{id}',                 array('as' => 'admin_education_edit', 'uses'=>'EducationController@edit'));
        Route::post('/education/update-action/{id}',       array('as' => 'admin_education_update_action', 'uses'=>'EducationController@update' ));
        Route::get('/education/delete/{id}',               array('as' => 'admin_education_delete', 'uses'=>'EducationController@delete' ));
        
        Route::get('/salary',                           array('as' => 'admin_salary', 'uses'=>'SalaryController@index' ));
        Route::get('/salary/create',                    array('as' => 'admin_salary_create', 'uses'=>'SalaryController@create'));
        Route::post('/salary/create-action',            array('as' => 'admin_salary_create_action', 'uses'=>'SalaryController@store' ));
        Route::get('/salary/edit/{id}',                 array('as' => 'admin_salary_edit', 'uses'=>'SalaryController@edit'));
        Route::post('/salary/update-action/{id}',       array('as' => 'admin_salary_update_action', 'uses'=>'SalaryController@update' ));
        Route::get('/salary/delete/{id}',               array('as' => 'admin_salary_delete', 'uses'=>'SalaryController@delete' ));
        
        Route::get('/experience',                           array('as' => 'admin_experience', 'uses'=>'ExperienceController@index' ));
        Route::get('/experience/create',                    array('as' => 'admin_experience_create', 'uses'=>'ExperienceController@create'));
        Route::post('/experience/create-action',            array('as' => 'admin_experience_create_action', 'uses'=>'ExperienceController@store' ));
        Route::get('/experience/edit/{id}',                 array('as' => 'admin_experience_edit', 'uses'=>'ExperienceController@edit'));
        Route::post('/experience/update-action/{id}',       array('as' => 'admin_experience_update_action', 'uses'=>'ExperienceController@update' ));
        Route::get('/experience/delete/{id}',               array('as' => 'admin_experience_delete', 'uses'=>'ExperienceController@delete' ));
        
        Route::get('/testimonial',                           array('as' => 'admin_testimonial', 'uses'=>'TestimonialController@index' ));
        Route::get('/testimonial/create',                    array('as' => 'admin_testimonial_create', 'uses'=>'TestimonialController@create'));
        Route::post('/testimonial/create-action',            array('as' => 'admin_testimonial_create_action', 'uses'=>'TestimonialController@store' ));
        Route::get('/testimonial/edit/{id}',                 array('as' => 'admin_testimonial_edit', 'uses'=>'TestimonialController@edit'));
        Route::post('/testimonial/update-action/{id}',       array('as' => 'admin_testimonial_update_action', 'uses'=>'TestimonialController@update' ));
        Route::get('/testimonial/delete/{id}',               array('as' => 'admin_testimonial_delete', 'uses'=>'TestimonialController@delete' ));
        
        Route::get('/cms',                           array('as' => 'admin_cms', 'uses'=>'CmsController@index' ));
        Route::get('/cms/create',                    array('as' => 'admin_cms_create', 'uses'=>'CmsController@create'));
        Route::post('/cms/create-action',            array('as' => 'admin_cms_create_action', 'uses'=>'CmsController@store' ));
        Route::get('/cms/edit/{id}',                 array('as' => 'admin_cms_edit', 'uses'=>'CmsController@edit'));
        Route::post('/cms/update-action/{id}',       array('as' => 'admin_cms_update_action', 'uses'=>'CmsController@update' ));
        Route::get('/cms/delete/{id}',               array('as' => 'admin_cms_delete', 'uses'=>'CmsController@delete' ));
        
        Route::get('/sitesettings',                           array('as' => 'admin_sitesettings', 'uses'=>'SitesettingsController@index' ));
        Route::get('/sitesettings/edit/{id}',                 array('as' => 'admin_sitesettings_edit', 'uses'=>'SitesettingsController@edit'));
        Route::post('/sitesettings/update-action/{id}',       array('as' => 'admin_sitesettings_update_action', 'uses'=>'SitesettingsController@update' ));
        
        Route::get('/newsarticales',                           array('as' => 'admin_newsarticales', 'uses'=>'NewsarticalesController@index' ));
        Route::get('/newsarticales/create',                    array('as' => 'admin_newsarticales_create', 'uses'=>'NewsarticalesController@create'));
        Route::post('/newsarticales/create-action',            array('as' => 'admin_newsarticales_create_action', 'uses'=>'NewsarticalesController@store' ));
        Route::get('/newsarticales/edit/{id}',                 array('as' => 'admin_newsarticales_edit', 'uses'=>'NewsarticalesController@edit'));
        Route::post('/newsarticales/update-action/{id}',       array('as' => 'admin_newsarticales_update_action', 'uses'=>'NewsarticalesController@update' ));
        Route::get('/newsarticales/delete/{id}',               array('as' => 'admin_newsarticales_delete', 'uses'=>'NewsarticalesController@delete' ));
        
        Route::get('/newssubscripotions',                       array('as' => 'newssubscripotions', 'uses'=>'NewssubscriptionController@index' ));
        Route::get('/subscriber_delete/{id}',                   array('as' => 'news_subscription_delete', 'uses'=>'NewssubscriptionController@delete' ));
        Route::get('/subscriber_status_change/{id}',            array('as' => 'subscriber_status_change', 'uses'=>'NewssubscriptionController@status' ));
        Route::get('/newssubscripotions-employee',              array('as' => 'employee_subscriber', 'uses'=>'NewssubscriptionController@employee_subscriber' ));
        Route::get('/employee-subscriber-delete/{id}',          array('as' => 'employee_news_subscription_delete', 'uses'=>'NewssubscriptionController@employee_delete' ));
        Route::get('/employee-subscriber-status-change/{id}',   array('as' => 'employee_subscriber_status_change', 'uses'=>'NewssubscriptionController@employee_status' ));
        
        
        Route::get('/email-template',                           array('as' => 'admin_emailtemplate', 'uses'=>'EmailtemplateController@index' ));
        Route::get('/email-template/create',                    array('as' => 'admin_emailtemplate_create', 'uses'=>'EmailtemplateController@create' ));
        Route::post('/email-template/create-action',            array('as' => 'admin_emailtemplate_create_action', 'uses'=>'EmailtemplateController@store' ));
        Route::get('/email-template/edit/{id}',                 array('as' => 'admin_emailtemplate_edit', 'uses'=>'EmailtemplateController@edit'));
        Route::post('/email-template/update-action/{id}',       array('as' => 'admin_emailtemplate_update_action', 'uses'=>'EmailtemplateController@update' ));
        
        
        Route::get('/menu-listing',                           array('as' => 'admin_menu_listing', 'uses'=>'MenuController@index' ));
        Route::get('/menu-edit/{id}',                         array('as' => 'admin_menu_edit', 'uses'=>'MenuController@edit' ));
        Route::post('/menu-update',                           array('as' => 'admin_menu_update', 'uses'=>'MenuController@update' ));
    
    
        Route::get('/agent',                            array('as' => 'admin_agent', 'uses'=>'AgentController@index' ));
        Route::get('/agent/create',                     array('as' => 'admin_agent_create', 'uses'=>'AgentController@create' ));
        Route::post('/agent/create-action',             array('as' => 'admin_agent_create_action', 'uses'=>'AgentController@store' ));
        Route::get('/agent/edit/{id}',                  array('as' => 'admin_agent_edit', 'uses'=>'AgentController@edit' ));
        Route::post('/agent/update-action',             array('as' => 'admin_agent_update_action', 'uses'=>'AgentController@update' ));
        Route::get('/agent/delete/{id}',                array('as' => 'admin_agent_delete', 'uses'=>'AgentController@delete' ));
        Route::post('/agent/set-status',                array('as' => 'admin_agent_set_status', 'uses'=>'AgentController@set_status' ));
        
        
        Route::any('/role',                          array('as' => 'admin_role',        'uses'=>'RolemanagentController@index' ));
        Route::get('/role/create',                   array('as' => 'admin_role_create', 'uses'=>'RolemanagentController@create' ));
        Route::post('/role/store',                   array('as' => 'admin_role_store',  'uses'=>'RolemanagentController@store' ));
        Route::get('/role/edit/{id}',                array('as' => 'admin_role_edit',   'uses'=>'RolemanagentController@edit' ));
        Route::post('/role/update',                  array('as' => 'admin_role_update', 'uses'=>'RolemanagentController@update' ));
        Route::any('/role/delete/{id}',              array('as' => 'admin_role_delete', 'uses'=>'RolemanagentController@delete' ));
        Route::get('/role/permission_role_assign',         array('as' => 'permission_role_assign', 'uses'=>'RolemanagentController@permission_role_assign' ));
        Route::post('/role/permission_user_assign_store', array('as' => 'permission_user_assign_store', 'uses'=>'RolemanagentController@permission_user_assign_store' ));

        Route::any('/permission',                          array('as' => 'admin_permission',        'uses'=>'PermissionController@index' ));
        Route::get('/permission/create',                   array('as' => 'admin_permission_create', 'uses'=>'PermissionController@create' ));
        Route::post('/permission/store',                   array('as' => 'admin_permission_store',  'uses'=>'PermissionController@store' ));
        Route::get('/permission/edit/{id}',                array('as' => 'admin_permission_edit',   'uses'=>'PermissionController@edit' ));
        Route::post('/permission/update',                  array('as' => 'admin_permission_update', 'uses'=>'PermissionController@update' ));
        Route::any('/permission/delete/{id}',              array('as' => 'admin_permission_delete', 'uses'=>'PermissionController@delete' ));
            
       
        Route::get('/currency',                    array('as' => 'admin_currency', 'uses'=>'CurrencyController@index' ));
        Route::get('/currency/create',             array('as' => 'admin_currency_create', 'uses'=>'CurrencyController@create'));
        Route::post('/currency/create-action',     array('as' => 'admin_currency_create_action', 'uses'=>'CurrencyController@store' ));
        Route::get('/currency/edit/{id}',          array('as' => 'admin_currency_edit', 'uses'=>'CurrencyController@edit'));
        Route::post('/currency/update-action/{id}',array('as' => 'admin_currency_update_action', 'uses'=>'CurrencyController@update' ));
        Route::get('/currency/delete/{id}',        array('as' => 'admin_currency_delete', 'uses'=>'CurrencyController@delete' ));
        
        Route::any('/company-payment',                    array('as' => 'admin_company_payment', 'uses'=>'CompanyPaymentController@index' ));
        Route::any('/candidate-payment',                  array('as' => 'admin_candidate_payment', 'uses'=>'CandidatePaymentController@index' ));
        
        Route::post('/get_city',                     array('as' => 'admin_get_city', 'uses'=>'StateController@get_city' ));
        Route::post('/get_state',                    array('as' => 'admin_get_state', 'uses'=>'StateController@get_state' ));
    });
});

   