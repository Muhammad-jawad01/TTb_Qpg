<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('home');
    Route::Post('/upload-image', [CKEditorController::class, 'upload_image'])->name('upload_image');

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Resources Controller 
    Route::group(['prefix' => 'user-managment'], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('users/{id}/account-setting', [UserController::class, 'editpassword'])->name('users.change.password');
        Route::post('users/update/account-setting', [UserController::class, 'update_setting'])->name('users.update_setting');
    });
    Route::group(['prefix' => 'branch-managment'], function () {
        Route::resource('branch', BranchController::class);
    });
    Route::group(['prefix' => 'reports'], function () {
        Route::get('visitors', [ReportController::class, 'visitors'])->name('reports.visitors');
    });

    Route::group(['prefix' => 'Data-Bank'], function () {
        Route::resource('questions', QuestionController::class);
        Route::get('medit/{id}', 'QuestionController@bulkedit')->name('longQuestions.m.edit');
        Route::post('medit', 'QuestionController@bulkupdate')->name('longQuestions.m.update');
    });
    Route::group(['prefix' => 'Paper'], function () {

        Route::resource('papers', PaperController::class);
        Route::get('part/{id}', [PaperController::class, 'paperpart'])->name('papers.createpart');
        Route::get('paper-random/part/{id}', [PaperController::class, 'create_random_part'])->name('papers.createpartrand');

        // Route::get('random/part/{id}', [PaperController::class,'randompart'])->name('papers.randompart');
        Route::get('random/part/{id}', [PaperController::class, 'randompart'])->name('papers.randompart');

        Route::Post('store', [PaperController::class, 'paperpartStore'])->name('papers.store.part');
        Route::Post('random/store', [PaperController::class, 'paperpartrandom'])->name('papers.rand.store.part');
    });

    Route::group(['prefix' => 'General-Setting'], function () {
        Route::resource('chapters', ChapterController::class);
        Route::resource('classlevels', ClassLevelController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('terms', TermController::class);
    });
    // Route::get('pdf','PdfController@index');
    Route::get('pdf', [App\Http\Controllers\PdfController::class, 'index']);
    // Route::get('account-settings', [UserController::class, 'account_settings'])->name('user-account-settings');
    // Route::post('update-setting', [UserController::class, 'update_setting'])->name('user-update-setting');

    Route::group(['prefix' => 'General'], function () {
        Route::post('tremsupdate', [TermController::class, 'update'])->name('tremsupdate');
        Route::post('subjectupdate', [SubjectController::class, 'update'])->name('subjectupdate');
        Route::post('chapterupdate', [ChapterController::class, 'update'])->name('chapterupdate');
        Route::post('classlevelupdate', [ClassLevelController::class, 'update'])->name('classlevelupdate');
    });
    // Get All Drop Down Menu 
    Route::get('dropdown/{table}', [DropDownController::class, 'index']);
    Route::get('account-settings', [UserController::class, 'account_settings'])->name('user-account-settings');
    Route::post('update-setting', [UserController::class, 'update_setting'])->name('user-update-setting');
    // GPT routs 
    Route::group(['prefix' => 'AI'], function () {
        Route::get('/load-chat', [OpenAIController::class, 'loadChat']);
        Route::get('/index', [OpenAIController::class, 'index'])->name('ai.question.list');
        Route::get('/index/paper', [OpenAIController::class, 'index2'])->name('ai.question.paper');
        Route::get('/index/paper/start', [OpenAIController::class, 'start'])->name('ai.question.paper.start');
        // routes/web.php
        // Route::post('/save-answer', [OpenAIController::class, 'saveAnswer'])->name('save.answer');

        Route::get('/create', [OpenAIController::class, 'create'])->name('ai.question.create');
        Route::post('/Search', [OpenAIController::class, 'AIsearch'])->name('ai.question.search');
        Route::post('/store', [OpenAIController::class, 'store'])->name('save.ai.response');
        Route::resource('paper-answers', PaperAnswerController::class);
        Route::post('/paper-answers', [PaperAnswerController::class, 'store'])->name('Ai.save.answer');
    });
});
