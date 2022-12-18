<?php

use App\Http\Controllers\FreeIssue\FreeIssueController;
use Illuminate\Support\Facades\Route;

Route::get('Freeissuehome',[FreeIssueController::class,'home'])->name('free_issue_home');
Route::get('FreeissueCreate',[FreeIssueController::class,'create'])->name('free_issue_create');
Route::get('Freeissuepreview',[FreeIssueController::class,'preview'])->name('free_issue_preview');
Route::get('FreeissueEdit',[FreeIssueController::class,'edit'])->name('free_issue_edit');

Route::post('FreeissueStore',[FreeIssueController::class,'store'])->name('free_issue_store');
Route::post('FreeissueUpdate',[FreeIssueController::class,'update'])->name('free_issue_update');
