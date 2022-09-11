<?php

use App\Http\Controllers\API\Device\AppSettingsController;
use App\Http\Controllers\API\Device\AuthController;
use App\Http\Controllers\API\Device\FloatingButtonController;
use App\Http\Controllers\API\Device\LeftHeaderIconController;
use App\Http\Controllers\API\Device\MenuController;
use App\Http\Controllers\API\Device\PagesController;
use App\Http\Controllers\API\Device\RightHeaderIconController;
use App\Http\Controllers\API\Device\TabsController;
use App\Http\Controllers\API\Device\UserAgentController;
use App\Http\Controllers\API\Device\UserController;
use App\Http\Controllers\API\Device\UsersController;
use App\Http\Controllers\API\Device\WalkthroughController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
});

Route::get('pages', [PagesController::class, 'index'])
    ->name('pages.index');
Route::get('pages/{pages}', [PagesController::class, 'show'])
    ->name('pages.show');
Route::post('pages', [PagesController::class, 'store'])
    ->name('pages.store');
Route::put('pages/{pages}', [PagesController::class, 'update'])
    ->name('pages.update');
Route::delete('pages/{pages}', [PagesController::class, 'delete'])
    ->name('pages.delete');
Route::post('pages/bulk-create', [PagesController::class, 'bulkStore'])
    ->name('pages.store.bulk');
Route::post('pages/bulk-update', [PagesController::class, 'bulkUpdate'])
    ->name('pages.update.bulk');
Route::get('tabs', [TabsController::class, 'index'])
    ->name('tabs.index');
Route::get('tabs/{tabs}', [TabsController::class, 'show'])
    ->name('tabs.show');
Route::post('tabs', [TabsController::class, 'store'])
    ->name('tabs.store');
Route::put('tabs/{tabs}', [TabsController::class, 'update'])
    ->name('tabs.update');
Route::delete('tabs/{tabs}', [TabsController::class, 'delete'])
    ->name('tabs.delete');
Route::post('tabs/bulk-create', [TabsController::class, 'bulkStore'])
    ->name('tabs.store.bulk');
Route::post('tabs/bulk-update', [TabsController::class, 'bulkUpdate'])
    ->name('tabs.update.bulk');
Route::get('user-agents', [UserAgentController::class, 'index'])
    ->name('user-agents.index');
Route::get('user-agents/{userAgent}', [UserAgentController::class, 'show'])
    ->name('userAgent.show');
Route::post('user-agents', [UserAgentController::class, 'store'])
    ->name('userAgent.store');
Route::put('user-agents/{userAgent}', [UserAgentController::class, 'update'])
    ->name('userAgent.update');
Route::delete('user-agents/{userAgent}', [UserAgentController::class, 'delete'])
    ->name('userAgent.delete');
Route::post('user-agents/bulk-create', [UserAgentController::class, 'bulkStore'])
    ->name('userAgent.store.bulk');
Route::post('user-agents/bulk-update', [UserAgentController::class, 'bulkUpdate'])
    ->name('userAgent.update.bulk');
Route::get('floating-buttons', [FloatingButtonController::class, 'index'])
    ->name('floating-buttons.index');
Route::get('floating-buttons/{floatingButton}', [FloatingButtonController::class, 'show'])
    ->name('floatingButton.show');
Route::post('floating-buttons', [FloatingButtonController::class, 'store'])
    ->name('floatingButton.store');
Route::put('floating-buttons/{floatingButton}', [FloatingButtonController::class, 'update'])
    ->name('floatingButton.update');
Route::delete('floating-buttons/{floatingButton}', [FloatingButtonController::class, 'delete'])
    ->name('floatingButton.delete');
Route::post('floating-buttons/bulk-create', [FloatingButtonController::class, 'bulkStore'])
    ->name('floatingButton.store.bulk');
Route::post('floating-buttons/bulk-update', [FloatingButtonController::class, 'bulkUpdate'])
    ->name('floatingButton.update.bulk');
Route::get('walkthroughs', [WalkthroughController::class, 'index'])
    ->name('walkthroughs.index');
Route::get('walkthroughs/{walkthrough}', [WalkthroughController::class, 'show'])
    ->name('walkthrough.show');
Route::post('walkthroughs', [WalkthroughController::class, 'store'])
    ->name('walkthrough.store');
Route::put('walkthroughs/{walkthrough}', [WalkthroughController::class, 'update'])
    ->name('walkthrough.update');
Route::delete('walkthroughs/{walkthrough}', [WalkthroughController::class, 'delete'])
    ->name('walkthrough.delete');
Route::post('walkthroughs/bulk-create', [WalkthroughController::class, 'bulkStore'])
    ->name('walkthrough.store.bulk');
Route::post('walkthroughs/bulk-update', [WalkthroughController::class, 'bulkUpdate'])
    ->name('walkthrough.update.bulk');
Route::get('users', [UsersController::class, 'index'])
    ->name('users.index');
Route::get('users/{users}', [UsersController::class, 'show'])
    ->name('users.show');
Route::post('users', [UsersController::class, 'store'])
    ->name('users.store');
Route::put('users/{users}', [UsersController::class, 'update'])
    ->name('users.update');
Route::delete('users/{users}', [UsersController::class, 'delete'])
    ->name('users.delete');
Route::post('users/bulk-create', [UsersController::class, 'bulkStore'])
    ->name('users.store.bulk');
Route::post('users/bulk-update', [UsersController::class, 'bulkUpdate'])
    ->name('users.update.bulk');
Route::get('right-header-icons', [RightHeaderIconController::class, 'index'])
    ->name('right-header-icons.index');
Route::get('right-header-icons/{rightHeaderIcon}', [RightHeaderIconController::class, 'show'])
    ->name('rightHeaderIcon.show');
Route::post('right-header-icons', [RightHeaderIconController::class, 'store'])
    ->name('rightHeaderIcon.store');
Route::put('right-header-icons/{rightHeaderIcon}', [RightHeaderIconController::class, 'update'])
    ->name('rightHeaderIcon.update');
Route::delete('right-header-icons/{rightHeaderIcon}', [RightHeaderIconController::class, 'delete'])
    ->name('rightHeaderIcon.delete');
Route::post('right-header-icons/bulk-create', [RightHeaderIconController::class, 'bulkStore'])
    ->name('rightHeaderIcon.store.bulk');
Route::post('right-header-icons/bulk-update', [RightHeaderIconController::class, 'bulkUpdate'])
    ->name('rightHeaderIcon.update.bulk');
Route::get('menus', [MenuController::class, 'index'])
    ->name('menus.index');
Route::get('menus/{menu}', [MenuController::class, 'show'])
    ->name('menu.show');
Route::post('menus', [MenuController::class, 'store'])
    ->name('menu.store');
Route::put('menus/{menu}', [MenuController::class, 'update'])
    ->name('menu.update');
Route::delete('menus/{menu}', [MenuController::class, 'delete'])
    ->name('menu.delete');
Route::post('menus/bulk-create', [MenuController::class, 'bulkStore'])
    ->name('menu.store.bulk');
Route::post('menus/bulk-update', [MenuController::class, 'bulkUpdate'])
    ->name('menu.update.bulk');
Route::get('left-header-icons', [LeftHeaderIconController::class, 'index'])
    ->name('left-header-icons.index');
Route::get('left-header-icons/{leftHeaderIcon}', [LeftHeaderIconController::class, 'show'])
    ->name('leftHeaderIcon.show');
Route::post('left-header-icons', [LeftHeaderIconController::class, 'store'])
    ->name('leftHeaderIcon.store');
Route::put('left-header-icons/{leftHeaderIcon}', [LeftHeaderIconController::class, 'update'])
    ->name('leftHeaderIcon.update');
Route::delete('left-header-icons/{leftHeaderIcon}', [LeftHeaderIconController::class, 'delete'])
    ->name('leftHeaderIcon.delete');
Route::post('left-header-icons/bulk-create', [LeftHeaderIconController::class, 'bulkStore'])
    ->name('leftHeaderIcon.store.bulk');
Route::post('left-header-icons/bulk-update', [LeftHeaderIconController::class, 'bulkUpdate'])
    ->name('leftHeaderIcon.update.bulk');
Route::get('app-settings', [AppSettingsController::class, 'index'])
    ->name('app-settings.index');
Route::get('app-settings/{appSettings}', [AppSettingsController::class, 'show'])
    ->name('appSettings.show');
Route::post('app-settings', [AppSettingsController::class, 'store'])
    ->name('appSettings.store');
Route::put('app-settings/{appSettings}', [AppSettingsController::class, 'update'])
    ->name('appSettings.update');
Route::delete('app-settings/{appSettings}', [AppSettingsController::class, 'delete'])
    ->name('appSettings.delete');
Route::post('app-settings/bulk-create', [AppSettingsController::class, 'bulkStore'])
    ->name('appSettings.store.bulk');
Route::post('app-settings/bulk-update', [AppSettingsController::class, 'bulkUpdate'])
    ->name('appSettings.update.bulk');
Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])
    ->name('user.show');
Route::post('users', [UserController::class, 'store'])
    ->name('user.store');
Route::put('users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('users/{user}', [UserController::class, 'delete'])
    ->name('user.delete');
Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
    ->name('user.store.bulk');
Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
    ->name('user.update.bulk');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');
