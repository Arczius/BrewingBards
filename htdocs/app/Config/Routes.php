<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');


$routes->get('/signin', 'SigninController::index');
$routes->add('/profile', 'ProfileController::index');

$routes->get('/Home', 'Home::homepage');
$routes->get('/back', 'ProfileController::index');
$routes->get('logout', 'SigninController::logout');

$routes->get('/AdminHome','AdminController::index');
$routes->get('/ModHome', 'ModController::index');
$routes->get('/UserHome','UserController::index');

$routes->get('/StudentCreate/(:alphanum)', 'StudentCreateController::index/$1');
$routes->get('/ClassCreate', 'ClassCreateController::index');
$routes->match(['get', 'post'], 'StudentCreateController/CreateUsers', 'StudentCreateController::CreateUsers');
$routes->match(['get', 'post'], 'ClassCreateController/CreateClass', 'ClassCreateController::CreateClass');

$routes->get('/createModPage', 'AdminController::createModPage');
$routes->post('/createModAccount', 'AdminController::createModerator');

$routes->get('/AddSingleStudent/(:alphanum)','AddSingleStudentController::index/$1');
$routes->match(['get', 'post'], 'AddSingleStudentController/CreateUser', 'AddSingleStudentController::CreateUser');

$routes->get('/DeleteClass/(:alphanum)','DeleteClassController::Delete/$1');

$routes->get('/deleteModerator/(:alphanum)', 'AdminController::deleteModerator/$1');


$routes->get('/classes/(:alphanum)','ClassViewController::index/$1');
$routes->get('/StudentEdit/(:alphanum)','StudentEditController::index/$1');
$routes->match(['get', 'post'], 'StudentEditController/UpdateUser', 'StudentEditController::CreateClass');



$routes->get('/editModerator/(:alphanum)', 'AdminController::EditModeratorPage/$1');
$routes->match(['get', 'post'], '/updateModAccount', 'AdminController::updateModAccount');

$routes->get('/SwitchClass/(:alphanum)','SwitchClassController::index/$1');
$routes->match(['get', 'post'], 'SwitchClassController/SwitchStudent', 'SwitchClassController::SwitchStudent');


$routes->get('/AddSingleStudent/(:alphanum)','AddSingleStudentController::index/$1');
$routes->match(['get', 'post'], 'AddSingleStudentController/CreateUser', 'AddSingleStudentController::CreateUser');

$routes->get('/DeleteClass/(:alphanum)','DeleteClassController::Delete/$1');

$routes->get('/deleteModerator/(:alphanum)', 'AdminController::deleteModerator/$1');

$routes->get('/editModerator/(:alphanum)', 'AdminController::EditModeratorPage/$1');
$routes->match(['get', 'post'], '/updateModAccount', 'AdminController::updateModAccount');

$routes->get('/SwitchClass/(:alphanum)','SwitchClassController::index/$1');
$routes->match(['get', 'post'], 'SwitchClassController/SwitchStudent', 'SwitchClassController::SwitchStudent');


$routes->get('/ClassesEdit/(:alphanum)', 'UpdateClassController::index/$1');
$routes->match(['get', 'post'], 'UpdateClassController/UpdateClass', 'UpdateClassController::UpdateClass');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
