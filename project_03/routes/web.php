<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    //blogs
    Route::get('/user/blogs', [UserController::class, 'blogs'])->name('user.blogs');
    Route::get('/user/blogs/{blog}' , [UserController::class, 'singleBlog'])->name('user.single-blog');

    //tickets
    Route::post('/user/blogs/comment', [UserController::class, 'storeComment'])->name('user.comment-store');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    //users
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users-form', [AdminController::class, 'addUserForm'])->name('admin.users-form');
    Route::post('/admin/users-store', [AdminController::class, 'storeUser'])->name('admin.user-store');
    Route::get('/admin/edit/{userId}', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::put('/admin/update/{user}', [AdminController::class, 'update'])->name('admin.update-user');
    Route::delete('/admin/delete/{userId}', [AdminController::class, 'destroy'])->name('admin.user-delete');

    //blogs
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/admin/blogs-form', [BlogController::class, 'addBlogForm'])->name('admin.blogs-form');
    Route::post('/admin/blogs-store', [BlogController::class, 'storeBlog'])->name('admin.blog-store');
    Route::get('/admin/blog-edit/{blogId}', [BlogController::class,'editBlog'])->name('admin.blogs-edit');
    Route::put('/admin/update-blog/{blog}', [BlogController::class, 'updateBlog'])->name('admin.update-blog');
    Route::delete('/admin/blog-delete/{blog}', [BlogController::class, 'destroy'])->name('admin.blog-delete');

    //events
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');
    Route::get("/admin/events-form", [EventController::class, 'addEvent'])->name('admin.event-form');
    Route::post('/admin/events-store', [EventController::class, 'eventStore'])->name('admin.event-store');
    Route::get('/admin/event-edit/{eventId}', [EventController::class, 'editEvent'])->name('admin.event-edit');
    Route::delete('/admin/event-delete/{eventId}' ,[EventController::class, 'destroyEvent'])->name('admin.event-delete');
    Route::put('/admin/update-event/{event}', [EventController::class, 'updateEvent'])->name('admin.event-update');

    //conference
    Route::get('/admin/conferences', [ConferenceController::class, 'index'])->name('admin.conferences');
    Route::get("/admin/conference-form", [ConferenceController::class, 'addConference'])->name('admin.conference-form');
    Route::post('/admin/conference-store', [ConferenceController::class, 'storeConference'])->name('admin.conference-store');
    Route::get('/admin/conference-edit/{conferenceId}', [ConferenceController::class, 'editConference'])->name('admin.conference-edit');
    Route::put('/admin/conference-update/{conference}', [ConferenceController::class, 'updateConference'])->name('admin.conference-update');
    Route::delete('/admin/conference-delete/{conferenceId}' , [ConferenceController::class, 'destroyConference'])->name('admin.conference-delete');

    //agendas
    Route::get('/admin/agendas', [AgendaController::class ,'index'])->name('admin.agendas');
    Route::get('/admin/agenda-form', [AgendaController::class, 'addAgenda'])->name('admin.agenda-form');
    Route::get('/admin/agenda-edit/{agenda}', [AgendaController::class, 'editAgenda'])->name('admin.agenda-edit');
    Route::post('admin/agenda-store', [AgendaController::class, 'storeAgenda'])->name('admin.agenda-store');
    Route::put('/admin/agenda-update{agenda}', [AgendaController::class, 'updateAgenda'])->name('admin.agenda-update');
    Route::delete('/admin/agenda-delete/{agendaId}' , [AgendaController::class, 'destroyAgenda'])->name('admin.agenda-delete');

    //speakers
    Route::get('/admin/speakers' , [SpeakerController::class, 'index'])->name('admin.speakers');
    Route::get('/admin/speaker-form', [SpeakerController::class, 'addSpeaker'])->name('admin.speaker-form');
    Route::get('/admin/speaker-edit/{speaker}', [SpeakerController::class, 'editSpeaker'])->name('admin.speaker-edit');
    Route::post('/admin/speaker-store', [SpeakerController::class, 'storeSpeaker'])->name('admin.speaker-store');
    Route::put('/admin/speaker-update/{speaker}', [SpeakerController::class, 'updateSpeaker'])->name('admin.update-speaker');
    Route::delete('/admin/speaker-delete/{speakerId}', [SpeakerController::class, 'destroySpeaker'])->name('admin.speaker-delete');

    //ticket    
    Route::get('/admin/tickets', [TicketController::class, 'index'])->name('admin.tickets');
    Route::get('/admin/ticket-form', [TicketController::class,'form'])->name('admin.ticket-form');
    Route::get('/admin/ticket-edit/{ticket}' , [TicketController::class, 'edit'])->name('admin.ticket-edit');
    Route::post('/admin/ticket-store', [TicketController::class,'store'])->name('admin.ticket-store');
    Route::put('/admin/ticket-update/{ticket}' , [TicketController::class, 'update'])->name('admin.ticket-update');
    Route::delete('/admin/ticket-delete/{ticket}', [TicketController::class, 'delete'])->name('admin.ticket-delete');

    //general info about the company
    Route::get('/admin/company', [CompanyController::class, 'index'])->name('admin.company');
    Route::get('/admin/company-form', [CompanyController::class, 'addCompany'])->name('admin.company-form');
    Route::get('/admin/company-edit/{company}', [CompanyController::class, 'editCompany'])->name('admin.company-edit');
    Route::post('/admin/company-store', [CompanyController::class, 'storeCompany'])->name('admin.company-store');
    Route::put('/admin/company-update/{company}' , [CompanyController::class, 'updateCompany'])->name('admin.company-update');

    //employee
    Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('admin.employees');
    Route::get('/admin/employee-form', [EmployeeController::class, 'addEmployee'])->name('admin.employee-form');
    Route::get('/admin/employee-edit/{employee}', [EmployeeController::class, 'editEmployee'])->name('admin.employee-edit');
    Route::post('/admin/employee-store', [EmployeeController::class, 'storeEmployee'])->name('admin.employee-store');
    Route::put('/admin/employee-update/{employee}', [EmployeeController::class, 'updateEmployee'])->name('admin.employee-update');
    Route::delete('/admin/employee-delete/{employee}', [EmployeeController::class, 'destroyEmployee'])->name('admin.delete-employee');

    //comment
    Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments');
    Route::get('/admin/comment-form', [CommentController::class, 'addComment'])->name('admin.comment-form');
    Route::get('/admin/comment-edit/{comment}', [CommentController::class, 'editComment'])->name('admin.comment-edit');
    Route::post('/admin/comment-store', [CommentController::class, 'storeComment'])->name('admin.comment-store');
    Route::put('/admin/comment-update/{comment}', [CommentController::class, 'updateComment'])->name('admin.comment-update');
    Route::delete('/admin/comment-delete/{commentId}', [CommentController::class, 'deleteComment'])->name('admin.comment-delete');

    //baddges
    Route::get("/admin/badges", [BadgeController::class, 'index'])->name('admin.badges');
    Route::get('/admin/badge-form', [BadgeController::class, 'create'])->name('admin.badge-form');
    Route::get('/admin/badge-edit/{badge}', [BadgeController::class, 'edit'])->name('admin.badge-edit');
    Route::post('/admin/badge-store', [BadgeController::class, 'store'])->name('admin.badge-store');
    Route::put('/admin/badge-update/{badgeId}', [BadgeController::class, 'update'])->name('admin.badge-update');
    Route::delete('/admin/badge-delete/{badgeId}', [BadgeController::class, 'destroy'])->name('admin.badge-delete');

    //topics
    Route::get('/admin/topics', [TopicController::class, 'index'])->name('admin.topics');
    Route::get('/admin/topic-form', [TopicController::class, 'create'])->name('admin.topic-form');
    Route::get('/admin/topic-edit/{topic}', [TopicController::class, 'edit'])->name('admin.topic-edit');
    Route::post('/admin/topic-store', [TopicController::class, 'store'])->name('admin.topic-store');
    Route::put('/admin/topic-update/{topicId}', [TopicController::class, 'update'])->name('admin.topic-update');
    Route::delete('/admin/topic-delete/{topicId}', [TopicController::class, 'destroy'])->name('admin.topic-delete');

});