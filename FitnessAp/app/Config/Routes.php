<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AdminLoginController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\Exercise\ExcerciseController;
use App\Controllers\Exercise\WorkoutController;
use App\Controllers\Exercise\CoachesController;
use App\Controllers\Exercise\ProgramController;
use App\Controllers\Settings\MenuCategoryController;
use App\Controllers\Settings\GroupProfileController;
use App\Controllers\Exercise\UsersController;
use App\Controllers\Exercise\MembershipController;
use App\Controllers\Exercise\AddExcerciseController;
use App\Controllers\ProfileController;
use App\Controllers\Settings\MenuListController;
use App\Controllers\Settings\UserAccountController;
use App\Controllers\Settings\GroupPrivilegeController;
// use App\Controllers\Registrations\StaffMemberController;

/**
 * @var RouteCollection $routes
 */


/************ PUBLIC ROUTES *************/

//LoginController
$routes->get('/', [LoginController::class, 'index']); // route : base_url/
$routes->post('login', [LoginController::class, 'login']); // route : base_url/login
$routes->get('logout', [LoginController::class, 'logout']); // route : base_url/logout
$routes->get('403', [LoginController::class, 'forbidden']); // route : base_url/forbidden


//DashboardController - route : base_url/dashboard
$routes->get('dashboard', [DashboardController::class, 'index']); // route : base_url/dashboard
$routes->get('my_profile', [ProfileController::class, 'index']); // route : base_url/my_profile
$routes->post('my_profile/change_password', [ProfileController::class, 'change_password']); // route : base_url/my_profile


//ExcerciseController
$routes->get('exercise', [ExcerciseController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/
$routes->post('createExercise', [ExcerciseController::class, 'create']); // route : base_url/login
$routes->get('getprogram/(:num)', [ExcerciseController::class, 'getprogram']);//route : base_url/getprogram/(:num)
$routes->get('getworkout/(:num)/(:num)', [ExcerciseController::class, 'getworkout']);//route : base_url/getworkout/(:num)/(:num)
$routes->get('editExercise/(:num)', [ExcerciseController::class, 'editExercise']);
// $routes->get('logout', [ExerciseController::class, 'logout']); // route : base_url/logout
// $routes->get('403', [ExerciseController::class, 'forbidden']); // route : base_url/forbidden


//ExcerciseController
$routes->get('addExercise', [AddExcerciseController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/
$routes->post('createNewExercise', [AddExcerciseController::class, 'createNewExercise']); // route : base_url/login
$routes->get('getprogram/(:num)', [AddExcerciseController::class, 'getprogram']);//route : base_url/getprogram/(:num)
$routes->get('getworkout/(:num)/(:num)', [AddExcerciseController::class, 'getworkout']);//route : base_url/getworkout/(:num)/(:num)
$routes->post('itemSearch', [AddExcerciseController::class, 'itemSearch']);//route : base_url/getworkout/(:num)/(:num)
$routes->get('getExerciseDetails/(:num)', [AddExcerciseController::class, 'getExerciseDetails']);
$routes->delete('deleteExercise/(:num)',  [AddExcerciseController::class, 'delete']);




//WorkoutController
$routes->get('workout/(:num)/(:num)', [WorkoutController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); 
$routes->post('createWorkout', [WorkoutController::class, 'create']);
$routes->get('getWorkoutDetails/(:num)', [WorkoutController::class, 'getWorkoutDetails']);
$routes->delete('deleteWorkout/(:num)',  [WorkoutController::class, 'delete']);


//MembershipController
$routes->get('membership/(:num)', [MembershipController::class, 'index']); 
$routes->post('createMembership', [MembershipController::class, 'create']); 
$routes->get('getMembershipDetails/(:num)', [MembershipController::class, 'getMembershipDetails']);
$routes->delete('deleteMembership/(:num)',  [MembershipController::class, 'delete']);


//CochesController
$routes->get('coaches', [CoachesController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/
$routes->post('createCoach', [CoachesController::class, 'create']);
$routes->get('editCoach/(:num)', [CoachesController::class, 'edit']);
$routes->delete('deleteCoach/(:num)', [CoachesController::class, 'delete']);
$routes->post('updateCoach', [CoachesController::class, 'update']);


//ProgramController
$routes->get('program/(:num)/(:num)', [ProgramController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/
$routes->post('createProgram', [ProgramController::class, 'create']);
$routes->get('getProgramDetails/(:num)', [ProgramController::class, 'getProgramDetails']);//route : base_url/getprogram/(:num) 
$routes->delete('deleteProgram/(:num)',  [ProgramController::class, 'delete']); // route : base_url/settings/menu_category/delete/$1

//UsersController
$routes->get('users', [UsersController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/
$routes->post('createUser', [UsersController::class, 'create']);
$routes->get('editUser/(:alphanum)', [UsersController::class, 'edit']); // route : base_url/edit_user/(:num)
$routes->post('updateUser', [UsersController::class, 'update']); // route : base_url/update_user



// Settings Routes - route : base_url/settings
$routes->group('settings', static function ($routes) {
    //MenuCategoryController - route : base_url/settings/menu_category
    $routes->group('menu_category', static function ($routes) {
        // $routes->get('/',  [MenuCategoryController::class, 'index'], ['filter' => ['UserPermissionFilter']]); // route : base_url/settings/menu_category
        $routes->get('/',  [MenuCategoryController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/settings/menu_category
        $routes->post('create',  [MenuCategoryController::class, 'create']); // route : base_url/settings/menu_category/create
        $routes->get('show/(:num)',  [MenuCategoryController::class, 'show']); // route : base_url/settings/menu_category/show/$1
        $routes->put('update/(:num)',  [MenuCategoryController::class, 'update']); // route : base_url/settings/menu_category/update/$1
        $routes->delete('delete/(:num)',  [MenuCategoryController::class, 'delete']); // route : base_url/settings/menu_category/delete/$1
    });

    //MenuListController - route : base_url/settings/menu_list
    $routes->group('menu_list', static function ($routes) {
        $routes->get('/',  [MenuListController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/settings/menu_list
        $routes->post('create',  [MenuListController::class, 'create']); // route : base_url/settings/menu_list/create
        $routes->get('show/(:num)',  [MenuListController::class, 'show']); // route : base_url/settings/menu_list/show/$1
        $routes->put('update/(:num)',  [MenuListController::class, 'update']); // route : base_url/settings/menu_list/update/$1
        $routes->delete('delete/(:num)',  [MenuListController::class, 'delete']); // route : base_url/settings/menu_list/delete/$1
    });

    //GroupProfileController - route : base_url/settings/group_profiles
    $routes->group('group_profile', static function ($routes) {
        $routes->get('/',  [GroupProfileController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/settings/group_profiles
        $routes->post('create',  [GroupProfileController::class, 'create']); // route : base_url/settings/group_profiles/create
        $routes->get('show/(:num)',  [GroupProfileController::class, 'show']); // route : base_url/settings/group_profiles/show/$1
        $routes->put('update/(:num)',  [GroupProfileController::class, 'update']); // route : base_url/settings/group_profiles/update/$1
        $routes->delete('delete/(:num)',  [GroupProfileController::class, 'delete']); // route : base_url/settings/group_profiles/delete/$1
    });

    //UserAccountController - route : base_url/settings/user_account
    $routes->group('user_account', static function ($routes) {
        // $routes->get('/',  [UserAccountController::class, 'index'], ['filter' => ['UserPermissionFilter']]); // route : base_url/settings/user_account
        $routes->get('/',  [UserAccountController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]); // route : base_url/settings/user_account
        $routes->post('create',  [UserAccountController::class, 'create']); // route : base_url/settings/user_account/create
        $routes->get('show/(:num)',  [UserAccountController::class, 'show']); // route : base_url/settings/user_account/show/$1
        $routes->put('update/(:num)',  [UserAccountController::class, 'update']); // route : base_url/settings/user_account/update/$1
        $routes->delete('delete/(:num)',  [UserAccountController::class, 'delete']); // route : base_url/settings/user_account/delete/$1
    });

    //GroupPrivilegeController - route : base_url/settings/group_privilege
    $routes->group('group_privilege', static function ($routes) {
        // $routes->get('(:num)',  [GroupPrivilegeController::class, 'index'], ['filter' => ['UserPermissionFilter']]); // route : base_url/settings/group_privilege/$1
        $routes->get('(:num)',  [GroupPrivilegeController::class, 'index'],['filter' => ['UserSessionFilter', 'UserPermissionFilter']]);// route : base_url/settings/group_privilege/$1
        $routes->get('add/(:num)/(:num)',  [GroupPrivilegeController::class, 'add']); // route : base_url/settings/group_privilege/add/$group_id/$menu_id
        $routes->get('remove/(:num)',  [GroupPrivilegeController::class, 'remove']); // route : base_url/settings/group_privilege/remove/$id
    });
});


