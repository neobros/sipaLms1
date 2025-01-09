<?php

use Illuminate\Support\Facades\Route;

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



//---------------------------------------------student--------------------------------------------------------

Route::get('/',                                           [App\Http\Controllers\student\HomeController::class, 'home']);
Route::get('/team',                                       [App\Http\Controllers\student\HomeController::class, 'team']);


Route::get('/login', function () {
    return view('student.login');
});

Route::get('/register', function () {
    return view('student.register');
});


Route::post('/login/student',                             [App\Http\Controllers\student\HomeController::class, 'login']);
Route::post('/logout/student',                            [App\Http\Controllers\student\HomeController::class, 'logout']);
Route::post('/register',                                  [App\Http\Controllers\student\HomeController::class, 'register']);
Route::get('/class/{id}',                                 [App\Http\Controllers\student\HomeController::class, 'class']);

Route::get('/studentChat/messages',                       [App\Http\Controllers\ChatController::class, 'studentGetMessages']);

Route::get('/teamView/{Teacher_ID}',                  [App\Http\Controllers\student\HomeController::class, 'teamView']);
Route::middleware('student')->group(function () {

    Route::get('/classView/{Class_ID}',                   [App\Http\Controllers\student\HomeController::class, 'classView']);
  
    Route::get('/reservation/{Class_ID}',                 [App\Http\Controllers\student\HomeController::class, 'reservation']);
    Route::post('/pay',                                   [App\Http\Controllers\student\HomeController::class, 'pay']);
    Route::get('/myClasses',                              [App\Http\Controllers\student\HomeController::class, 'myClasses']);
    Route::post('/addFeedback',                           [App\Http\Controllers\student\HomeController::class, 'addFeedback']);
    Route::get('/selfEvaluation',                         [App\Http\Controllers\student\SelfEvaluationController::class, 'selfEvaluation'])->name('student.selfEvaluation');;

    Route::get('/chat/messages',                          [App\Http\Controllers\ChatController::class, 'getMessages']);
    Route::post('/chat/send',                             [App\Http\Controllers\ChatController::class, 'sendMessage']);

    Route::post('/studentChat/send',                      [App\Http\Controllers\ChatController::class, 'studentSendMessage']);
    Route::get('/student/takeQuiz/{quiz}',                [App\Http\Controllers\student\SelfEvaluationController::class, 'takeQuiz'])->name('student.takeQuiz');
    Route::post('/student/submitQuiz/{quiz}',             [App\Http\Controllers\student\SelfEvaluationController::class, 'submitQuiz'])->name('student.submitQuiz');


    
   
});

//----------------------------------------------admin------------------------------------------------------- 
Route::get('/admin/login',                                [App\Http\Controllers\admin\AdminController::class, 'admin_login'])->name('/admin/login');
Route::post('/admin/login',                               [App\Http\Controllers\admin\AdminController::class, 'login']);
Route::post('/admin/logout',                              [App\Http\Controllers\admin\AdminController::class, 'logout']);

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard',                            [App\Http\Controllers\admin\AdminController::class, 'dashboard'])->name('/admin/dashboard');

    //SubjectController
    Route::get('/admin/subjectManagement/addSubjects',        [App\Http\Controllers\admin\SubjectController::class, 'addSubjects']);
    Route::post('/admin/storeSubjects',                       [App\Http\Controllers\admin\SubjectController::class, 'storeSubjects']);
    Route::get('/admin/subjectDelete/{id}',                   [App\Http\Controllers\admin\SubjectController::class, 'subjectDelete']);

    //SubjectController
    Route::get('/admin/studentManagement/studentList',        [App\Http\Controllers\admin\StudentController::class, 'studentList']);
    Route::get('/admin/studentDelete/{id}',                   [App\Http\Controllers\admin\StudentController::class, 'studentDelete']);

    //TeacherController
    Route::get('/admin/teachersManagement/newTeachersList',   [App\Http\Controllers\admin\TeacherController::class, 'newTeachersList']);
    Route::get('/admin/openTeacherCV/{id}',                   [App\Http\Controllers\admin\TeacherController::class, 'openTeacherCV']);
    Route::get('/admin/ApproveTeacher/{id}',                  [App\Http\Controllers\admin\TeacherController::class, 'ApproveTeacher']);
    Route::get('/admin/RejectTeacher/{id}',                   [App\Http\Controllers\admin\TeacherController::class, 'RejectTeacher']);
    Route::get('/admin/teachersManagement/teachersList',      [App\Http\Controllers\admin\TeacherController::class, 'teachersList']);
    Route::get('/admin/timeManagement/addTimeSlot',           [App\Http\Controllers\admin\TeacherController::class, 'addTimeSlot']);

    //ClassController
    Route::get('/admin/classManagement/classesList/{id}',     [App\Http\Controllers\admin\ClassController::class, 'classesList']);

    //ChatController
    Route::get('/admin/chat',                                 [App\Http\Controllers\ChatController::class, 'chatView']);
    Route::get('/admin/singlechatView/{stu_ID}',              [App\Http\Controllers\ChatController::class, 'singlechatView']);
    Route::get('/admin/chat/messages/{stu_ID}',               [App\Http\Controllers\ChatController::class, 'adminGetMessages']);
    Route::post('/admin/chat/send/{stu_ID}',                  [App\Http\Controllers\ChatController::class, 'adminSendMessage']);
    
    //AdvertisementController
    Route::get('/admin/advertisementManagement/newAdvertisement',[App\Http\Controllers\admin\AdvertisementController::class, 'newAdvertisement']);
    Route::get('/admin/ApproveAdvertisement/{id}',                  [App\Http\Controllers\admin\AdvertisementController::class, 'ApproveAdvertisement']);
    Route::get('/admin/RejectApproveAdvertisement/{id}',                  [App\Http\Controllers\admin\AdvertisementController::class, 'RejectApproveAdvertisement']);

    });


//-------------------------------------------teacher------------------------------------------------
Route::get('/teacher/TobeTeacher',                             [App\Http\Controllers\teacher\HomeController::class, 'tobeTeacher'])->name('/teacher/TobeTeacher');
Route::post('/teacher/login',                                  [App\Http\Controllers\teacher\HomeController::class, 'login']);
Route::post('/teacher/logout',                                 [App\Http\Controllers\teacher\HomeController::class, 'logout']);
Route::get('/teacher/register',                                [App\Http\Controllers\teacher\HomeController::class, 'registerTeacher']);
Route::post('/teacher/register',                               [App\Http\Controllers\teacher\HomeController::class, 'register']);
Route::get('/teacher/getSubCategories',                        [App\Http\Controllers\teacher\HomeController::class, 'getSubCategories']);

Route::middleware('teacher')->group(function () {

    Route::get('/teacher/dashboard',                           [App\Http\Controllers\teacher\HomeController::class, 'dashboard'])->name('/teacher/dashboard');
    Route::get('/teacher/classManagement/addClasses',          [App\Http\Controllers\teacher\ClassController::class, 'addClasses']);
    Route::post('/teacher/addClass',                           [App\Http\Controllers\teacher\ClassController::class, 'storeClass']);
    Route::get('/teacher/classManagement/classesList',         [App\Http\Controllers\teacher\ClassController::class, 'classesList']);
    Route::get('/teacher/classManagement/checkStudent/{id}',   [App\Http\Controllers\teacher\ClassController::class, 'checkStudent']);

    Route::get('/teacher/classManagement/addQuiz/{classId}',   [App\Http\Controllers\teacher\ClassController::class, 'showAddQuizForm'])->name('quiz.addForm');
    Route::post('/teacher/classManagement/addQuiz/{classId}',  [App\Http\Controllers\teacher\ClassController::class, 'storeQuiz'])->name('quiz.store');



    //advertisementManagement
    Route::get('/teacher/advertisementManagement/addAdvertisement',[App\Http\Controllers\teacher\AdvertisementController::class, 'addAdvertisement']);
    Route::get('/teacher/advertisementManagement/advertisementList',[App\Http\Controllers\teacher\AdvertisementController::class, 'advertisementList']);
    Route::post('/teacher/addAdvertisement',                       [App\Http\Controllers\teacher\AdvertisementController::class, 'storeAdvertisement']);
    Route::post('/teacher/advertisementPay',                       [App\Http\Controllers\teacher\AdvertisementController::class, 'advertisementPay']);
    Route::get('/teacher/advertisementManagement/payment',     [App\Http\Controllers\teacher\AdvertisementController::class, 'payment']);
    Route::get('/advertisementVisible/{type}/{id}',            [App\Http\Controllers\teacher\AdvertisementController::class, 'advertisementVisible']);

    //FeedbackController
    Route::get('/teacher/feedbackManagement/feedbacks',        [App\Http\Controllers\teacher\FeedbackController::class, 'feedbacks']);
    Route::get('/feedbackDelete/{id}',                         [App\Http\Controllers\teacher\FeedbackController::class, 'feedbackDelete']);
});