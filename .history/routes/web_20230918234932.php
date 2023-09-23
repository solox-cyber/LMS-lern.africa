<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendingUserController;
use App\Http\Controllers\Auth\SalesRepController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcomepage');
// });
// routes/web.php

// Route::get('/subscribe', [HomeController::class, 'initializeSubscription']);

Route::get('/subscribe', [HomeController::class, 'showSubscriptionForm'])->name('subscribe');
Route::get('/subscribe', [HomeController::class, 'showSubscriptionForm'])->name('subscribe');
Route::post('/create-subscription', [HomeController::class, 'createSubscription'])->name('create-subscription');

Route::post('/update-sub-amount', [HomeController::class, 'updateSubAmount'])->name('update-sub-amount');


Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::get('/enroll', [RegisterController::class, 'showRegistrationFormenroll'])->name('enroll');

Route::get('/viewCourseDetails/{id}', [HomeController::class, 'viewCourse'])->name('viewcourse');

Route::get('/CourseList', [HomeController::class, 'allcourses'])->name('allcourses');


Route::get('/searchCourse', [HomeController::class, 'searchCourse'])->name('searchcourse');
Route::get('/contactUs', [HomeController::class, 'contact'])->name('contactUs');
Route::post('/contactUs', [HomeController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('registerInst', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('registerInst', [RegisterController::class, 'registerInst'])->name('registerInst');
Route::post('/save-user-data', [PendingUserController::class, 'saveUserData'])->name('save-user-data');
Route::get('payment/{user_id}', [PendingUserController::class, 'payment'])->name('payment');
Route::post('payregister', [RegisterController::class, 'payregister'])->name('payregister');
Route::get('register/{sales_id}/{contact_id}', [PendingUserController::class, 'salesrepregister'])->name('salesrepregister');
Route::post('/salesrep-save-user-data', [PendingUserController::class, 'salesrepsaveUserData'])->name('salesrep-save-user-data');
Route::get('contact_register/{sales_id}/{contact_id}', [RegisterController::class, 'contactregister'])->name('contactregister');
Route::post('/contacts-save-user-data', [RegisterController::class, 'contactssaveUserData'])->name('contacts-save-user-data');




// Route::get('/link', function () {
//     Artisan::call('storage:link');
// });

Route::get('/activate/{token}', [DashboardController::class, 'activated'])->name('activated');

Route::get('/activation/success', function () {
    return view('activation_success');
})->name('activation.success');




// Users routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/overview', [DashboardController::class, 'profile'])->name('overview');
    Route::get('/account', [DashboardController::class, 'setting'])->name('setting');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
    Route::get('/payout', [DashboardController::class, 'payout'])->name('payout');
    Route::post('/payout', [DashboardController::class, 'payoutGate'])->name('payment.payout');
    Route::get('/statement', [DashboardController::class, 'statement'])->name('statement');
    Route::get('/add-contact', [DashboardController::class, 'AddContact'])->name('add_contact');
    Route::get('/update-email', [DashboardController::class, 'showEmail'])->name('show_email');
    Route::post('/profile/setting', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/contact/add', [DashboardController::class, 'store'])->name('contact.add');
    Route::post('/contacts/add', [DashboardController::class, 'multistore'])->name('contacts.add');
    Route::get('/contacts/view', [DashboardController::class, 'allcontacts'])->name('allcontacts');
    Route::delete('/contacts/delete/{contactId}', [DashboardController::class, 'deleteContactUser'])->name('deleteContactUser');
    Route::post('/contact/search', [DashboardController::class, 'search'])->name('contact.search');
    Route::get('/contacts/{contact}/edit', [DashboardController::class, 'EditContact'])->name('edit_contact');
    Route::put('/contacts/{contact}', [ProfileController::class, 'UpdateContact'])->name('contacts.update');
    Route::get('/live-stream', [DashboardController::class, 'LiveStream'])->name('live.stream');
    Route::get('/live-stream/{courseid}', [DashboardController::class, 'LiveStreambyid'])->name('live.streamid');
    // Route::get('/add-contact', [DashboardController::class, 'contacts'])->name('contacts.index');
    Route::get('/contacts/{contact}', [DashboardController::class, 'ShowContact'])->name('contacts.show');
    Route::delete('contacts/{contact}', [DashboardController::class, 'ContactDestroy'])->name('contacts.destroy');
    Route::post('/update-email', [DashboardController::class, 'updateEmail'])->name('update_email');
    Route::post('/deactivate-account', [DashboardController::class, 'deactivateAccount'])->name('deactivate.account');
    Route::get('/dashboard/password/reset/{token}', [DashboardController::class, 'passwordReset'])->name('pass.reset');
    Route::post('/dashboard/password/reset', [DashboardController::class, 'passwordStore'])->name('pass.update');
    Route::get('/mycourses', [DashboardController::class, 'myCourses'])->name('myCourses');
    Route::get('/mycourses/details/{id}', [DashboardController::class, 'Coursedetails'])->name('course.details');
    Route::get('/courses', [DashboardController::class, 'allCourses'])->name('allCourses');
    Route::get('/users/search', [DashboardController::class, 'searchUsers'])->name('users.search');
    Route::get('/salesRep/search', [DashboardController::class, 'searchSales'])->name('searchSales');
    Route::get('/contact/search', [DashboardController::class, 'searchContact'])->name('searchContact');
    Route::get('/invitation/search', [DashboardController::class, 'searchInvite'])->name('searchInvite');
    Route::get('/UnpaidUsers/search', [DashboardController::class, 'searchUser'])->name('searchuser');
    Route::get('/success', [DashboardController::class, 'paymentsuccess'])->name('success');
    Route::post('/update-payment-status', [DashboardController::class, 'updateStatus']);
});


// Admin login routes
// Route::prefix('admin')->group(function () {
// Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/login', [AdminController::class, 'login']);
// Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// });


// salesrep dashboard routes
Route::middleware(['auth'])->prefix('sales')->group(function () {
    Route::get('/home', [DashboardController::class, 'adminDash'])->name('sales.dashboard');
    Route::get('/profile', [DashboardController::class, 'salesprofile'])->name('sales.profile');
    Route::get('/setting', [DashboardController::class, 'salessetting'])->name('sales.setting');
    Route::get('/payout', [DashboardController::class, 'salespayout'])->name('sales.payout');
    Route::get('/update-email', [DashboardController::class, 'salesShowEmail'])->name('sales_email');
    Route::post('/payout', [DashboardController::class, 'salesPayoutGate'])->name('salespayment.payout');
    Route::get('/invitation/contacts', [DashboardController::class, 'contactList'])->name('invites.index');
    Route::get('/statement', [DashboardController::class, 'salesstatement'])->name('salesstatement');
    Route::get('/invitation/search', [DashboardController::class, 'searchSalesInvite'])->name('searchsalesContact');
    Route::get('/invitation/show-contact/{id}', [DashboardController::class, 'showSalesContact'])->name('salescontact.show');
    Route::get('/invitation/convert-contact/{id}', [DashboardController::class, 'convertSalesContact'])->name('salescontact.convert');
    Route::post('/invitation/convert-contact/', [DashboardController::class, 'convert'])->name('contact.convert');
    Route::get('/unpaidusers', [DashboardController::class, 'pendinguserlists'])->name('pendinguserlists');
    Route::get('send-pendinguserview-email/{sales_id}/{contact_id}', [DashboardController::class, 'sendpendinguserviewemail'])->name('send.pendinguserview.email');
    Route::get('/users/search', [DashboardController::class, 'searchUsersList'])->name('searchUsersList');
    Route::get('send-contacts-email/{sales_id}/{contact_id}', [DashboardController::class, 'sendcontactsemail'])->name('send.contacts.email');
    Route::get('/salesadd-contact', [DashboardController::class, 'SalesAddContact'])->name('salesadd_contact');
    Route::get('/salescontacts/view', [DashboardController::class, 'salesallcontacts'])->name('salescontacts');
    Route::post('/salescontact/search', [DashboardController::class, 'salescontactsearch'])->name('salecontact.search');
    Route::get('/salescontacts/{contact}/edit', [DashboardController::class, 'SalesEditContact'])->name('salesedit_contact');
    Route::put('/salescontacts/{contact}', [ProfileController::class, 'SalesUpdateContact'])->name('salescontacts.update');
});

// Admin dashboard routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/home', [DashboardController::class, 'adminDash'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'adminprofile'])->name('admin.profile');
    Route::get('/setting', [DashboardController::class, 'adminsetting'])->name('admin.setting');
    Route::get('/admin/list', [DashboardController::class, 'adminlist'])->name('admin.list');
    Route::get('/admin/create', [DashboardController::class, 'admincreate'])->name('admin.create');
    Route::post('/admin', [DashboardController::class, 'adminstore'])->name('admin.store');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('admin.contact');
    Route::delete('/admin/{id}', [DashboardController::class, 'userdelete'])->name('admin.destroy');
    Route::get('/users', [DashboardController::class, 'userlist'])->name('userlist');
    Route::get('/Peculiar_users', [DashboardController::class, 'PCusers'])->name('pcusers');
    Route::get('/unpaidusers', [DashboardController::class, 'Puserlist'])->name('Puserlist');
    Route::get('/users/filter', [DashboardController::class, 'filterUsers'])->name('filter.userlist');
    Route::get('/contacts/filter', [DashboardController::class, 'filterContacts'])->name('filter.contactlist');
    Route::get('/users/search', [DashboardController::class, 'searchUsers'])->name('searchUsers');
    Route::get('/commissions', [DashboardController::class, 'commissions'])->name('admin.commissions');
    Route::get('/setcommission', [DashboardController::class, 'setcommissions'])->name('admin.setcommissions');
    Route::post('/commission/update', [DashboardController::class, 'updateCommissionPercentage'])->name('commission.update');
    Route::get('/salesrep/commissions', [DashboardController::class, 'salescommissions'])->name('sales.commissions');
    Route::get('/commission/{id}', [DashboardController::class, 'commission'])->name('approve.commissions');
    Route::get('/user/{id}', [DashboardController::class, 'userview'])->name('userview');
    Route::get('/pendinguser/{id}', [DashboardController::class, 'pendinguserview'])->name('pendinguserview');
    Route::delete('/users/{id}', [DashboardController::class, 'userdelete'])->name('users.destroy');
    Route::delete('/pendingusers/{id}', [DashboardController::class, 'pendinguserdelete'])->name('pendingusers.destroy');
    Route::get('/users/export', [DashboardController::class, 'exportUsers'])->name('users.export');
    Route::post('/users/import', [DashboardController::class, 'importUsers'])->name('users.import');
    Route::post('/commission/{id}/paid', [DashboardController::class, 'status_paid'])->name('paid');
    Route::post('/commission/{id}/progress', [DashboardController::class, 'status_inprogress'])->name('progress');
    Route::post('/commission/{id}/decline', [DashboardController::class, 'status_decline'])->name('decline');
    Route::post('/salesrep/commission/{id}/paid', [DashboardController::class, 'salesstatus_paid'])->name('salespaid');
    Route::post('/salesrep/commission/{id}/progress', [DashboardController::class, 'salesstatus_inprogress'])->name('salesprogress');
    Route::post('/salesrep/commission/{id}/decline', [DashboardController::class, 'salesstatus_decline'])->name('salesdecline');
    Route::get('/sales-rep/add', [DashboardController::class, 'salesAdd'])->name('admin.salesrep');
    Route::get('/peculiar-case/add', [DashboardController::class, 'PCadd'])->name('add_pcusers');
    Route::post('/users-peculiars/add', [DashboardController::class, 'userStore'])->name('users.store');
    Route::post('/sales-reps', [DashboardController::class, 'salesStore'])->name('salesreps.store');
    Route::get('/sales-reps/view', [DashboardController::class, 'salesView'])->name('view.salesrep');
    Route::get('/sales-reps/{id}', [DashboardController::class, 'salesShow'])->name('sales-reps.show');
    // Route::post('/salescontact/search', [DashboardController::class, 'salessearch'])->name('salescontact.search');
    // Route::get('/salescontact/search', [SalesContactController::class, 'search'])->name('salescontact.search');
    Route::post('/sales-reps/{salesRepId}/contacts/{contactId}/assign', [DashboardController::class, 'assignContact'])->name('sales-reps.contacts.assign');
    Route::delete('/sales-reps/{id}', [DashboardController::class, 'salesDestroy'])->name('sales-reps.destroy');
    Route::get('/invitation/contacts', [DashboardController::class, 'inviteList'])->name('invite.index');
    Route::post('/invitation/assign-contacts', [DashboardController::class, 'assignContacts'])->name('contacts.assign');
    Route::post('/invitation/assign-users', [DashboardController::class, 'assignUsers'])->name('users.assign');
    Route::delete('/invitation/delete-contacts/{id}', [DashboardController::class, 'deleteContacts'])->name('contact.destroy');
    Route::get('/invitation/show-contact/{id}', [DashboardController::class, 'showAdminContact'])->name('contact.show');
    Route::get('/course/create', [DashboardController::class, 'createCourse'])->name('course.create');
    Route::post('/courses', [DashboardController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/list', [DashboardController::class, 'listCourse'])->name('course.list');
    Route::get('/course/{id}', [DashboardController::class, 'courseShow'])->name('course.view');
    Route::delete('course/{contact}', [DashboardController::class, 'CourseDestroy'])->name('course.destroy');
    Route::post('/users/{id}/deactivate', [DashboardController::class, 'Deactivate'])->name('users.deactivate');
    Route::post('/users/{id}/activate', [DashboardController::class, 'Activate'])->name('users.activate');
    Route::post('/course/{id}', [DashboardController::class, 'courseUpdate'])->name('course.update');
    Route::get('/salesrep/commission/{id}', [DashboardController::class, 'salesViewCommission'])->name('viewcommissions');
    Route::get('syllabus-titles/create', [DashboardController::class, 'syllabusCreate'])->name('syllabus.create');
    Route::post('syllabus-titles', [DashboardController::class, 'syllabusStore'])->name('syllabusStore');
    Route::get('course-subtopics/create', [DashboardController::class, 'subtopicsCreate'])->name('subtopics.create');
    Route::post('course-subtopics-titles', [DashboardController::class, 'subtopicsStore'])->name('subtopics.store');
    Route::get('/fetch-syllabus-titles/{courseId}', [DashboardController::class, 'fetchByCourse'])->name('fetch.course');
    Route::get('/fetch-syllabus-titles/{courseId}', [DashboardController::class, 'fetchByCourse'])->name('fetch.subtitle');
    Route::get('/videos/create', [DashboardController::class, 'VideoCreate'])->name('videos.create');
    Route::post('/videos', [DashboardController::class, 'VideoStore'])->name('videos.store');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [DashboardController::class, 'adminDash'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'adminprofile'])->name('admin.profile');
    Route::get('/setting', [DashboardController::class, 'adminsetting'])->name('admin.setting');
    Route::get('/admin/list', [DashboardController::class, 'adminlist'])->name('admin.list');
    Route::get('/admin/create', [DashboardController::class, 'admincreate'])->name('admin.create');
    Route::post('/admin', [DashboardController::class, 'adminstore'])->name('admin.store');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('admin.contact');
    Route::delete('/admin/{id}', [DashboardController::class, 'userdelete'])->name('admin.destroy');
    Route::get('/contacts/filter', [DashboardController::class, 'filterContacts'])->name('filter.contactlist');
    Route::get('/users/search', [DashboardController::class, 'searchUsers'])->name('searchUsers');
    Route::get('/commissions', [DashboardController::class, 'commissions'])->name('admin.commissions');
    Route::get('/setcommission', [DashboardController::class, 'setcommissions'])->name('admin.setcommissions');
    Route::get('/salesrep/commissions', [DashboardController::class, 'salescommissions'])->name('sales.commissions');
    Route::delete('/pendingusers/{id}', [DashboardController::class, 'pendinguserdelete'])->name('pendingusers.destroy');
    Route::post('/salesrep/commission/{id}/paid', [DashboardController::class, 'salesstatus_paid'])->name('salespaid');
    Route::post('/salesrep/commission/{id}/progress', [DashboardController::class, 'salesstatus_inprogress'])->name('salesprogress');
    Route::post('/salesrep/commission/{id}/decline', [DashboardController::class, 'salesstatus_decline'])->name('salesdecline');
    Route::get('/sales-rep/add', [DashboardController::class, 'salesAdd'])->name('admin.salesrep');
    Route::post('/sales-reps', [DashboardController::class, 'salesStore'])->name('salesreps.store');
    Route::get('/sales-reps/view', [DashboardController::class, 'salesView'])->name('view.salesrep');
    Route::get('/sales-reps/{id}', [DashboardController::class, 'salesShow'])->name('sales-reps.show');
    Route::get('/salescontact/search', [SalesContactController::class, 'search'])->name('salescontact.search');
    Route::post('/sales-reps/{salesRepId}/contacts/{contactId}/assign', [DashboardController::class, 'assignContact'])->name('sales-reps.contacts.assign');
    Route::delete('/sales-reps/{id}', [DashboardController::class, 'salesDestroy'])->name('sales-reps.destroy');
    Route::get('/course/create', [DashboardController::class, 'createCourse'])->name('course.create');
    Route::post('/courses', [DashboardController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/list', [DashboardController::class, 'listCourse'])->name('course.list');
    Route::get('/course/{id}', [DashboardController::class, 'courseShow'])->name('course.view');
    Route::post('/deletecontact/{id}', [DashboardController::class, 'deletePeculiarContact'])->name('deletepeculiarcontact');
    Route::delete('course/{contact}', [DashboardController::class, 'CourseDestroy'])->name('course.destroy');
    Route::post('/users/{id}/deactivate', [DashboardController::class, 'Deactivate'])->name('users.deactivate');
    Route::post('/users/{id}/activate', [DashboardController::class, 'Activate'])->name('users.activate');
    Route::post('/course/{id}', [DashboardController::class, 'courseUpdate'])->name('course.update');
    Route::get('/salesrep/commission/{id}', [DashboardController::class, 'salesViewCommission'])->name('viewcommissions');
});

// Login routes
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Handle the login request
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

// Log the user out
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');




// Email Verification Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

// Display the password reset request form
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

// Send password reset email
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

// Display the password reset form
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

// Reset the password
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

// Add other authentication-related routes as needed
