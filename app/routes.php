<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/AddApplicant/{a}/{b}/{c}/{d}/{e}/{f}/{g}/{h}/{i}/{j}', 'LikhakathonController@AddApplicant');

Route::get('/UpdateApplicant/{a}/{b}/{c}', 'LikhakathonController@UpdateApplicant');

Route::get('/AddApplicantSkill/{a}/{b}', 'LikhakathonController@AddApplicantSkill');

Route::get('/AddSkillSet/{a}', 'LikhakathonController@AddSkillSet');

Route::get('/UpdateSkillSet/{a}/{b}', 'LikhakathonController@UpdateSkillSet');

Route::get('/AddApplicantInteraction/{a}/{b}/{c}', 'LikhakathonController@AddApplicantInteraction');

Route::get('/UpdateApplicantInteraction/{a}/{b}', 'LikhakathonController@UpdateApplicantInteraction');

Route::get('/AddInteraction/{a}', 'LikhakathonController@AddInteraction');

Route::get('/UpdateInteraction/{a}/{b}', 'LikhakathonController@UpdateInteraction');

Route::get('/GetApplicantTotal', 'LikhakathonController@GetApplicantTotal');

Route::get('/GetApplicantStat/{a}', 'LikhakathonController@GetApplicantStat');

Route::get('/GetSkillsetStat/{a}', 'LikhakathonController@GetSkillsetStat');

// ------------------------------

Route::get('/GetApplicantLog/{a}', 'LikhakathonController@GetApplicantLog');

Route::get('/GetInteractions/{a}', 'LikhakathonController@GetInteractions');

Route::get('/GetApplicantSkills/{a}', 'LikhakathonController@GetApplicantSkills');

*/

Route::get('AddApplicant', 'LikhakathonController@AddApplicant');

Route::get('/UpdateApplicant/{a}/{b}/{c}', 'LikhakathonController@UpdateApplicant');

Route::get('/AddApplicantSkill/{a}/{b}', 'LikhakathonController@AddApplicantSkill');

Route::get('/AddSkillSet/{a}', 'LikhakathonController@AddSkillSet');

Route::get('/UpdateSkillSet/{a}/{b}', 'LikhakathonController@UpdateSkillSet');

Route::get('/AddApplicantInteraction/{a}/{b}/{c}', 'LikhakathonController@AddApplicantInteraction');

Route::get('/UpdateApplicantInteraction/{a}/{b}', 'LikhakathonController@UpdateApplicantInteraction');

Route::get('/AddInteraction/{a}', 'LikhakathonController@AddInteraction');

Route::get('/UpdateInteraction/{a}/{b}', 'LikhakathonController@UpdateInteraction');

Route::get('/GetApplicantTotal', 'LikhakathonController@GetApplicantTotal');

Route::get('/GetApplicantStat/{a}', 'LikhakathonController@GetApplicantStat');

Route::get('/GetSkillsetStat/{a}', 'LikhakathonController@GetSkillsetStat');

// ------------------------------

Route::get('/GetApplicantLog/{a}', 'LikhakathonController@GetApplicantLog');

Route::get('/GetInteractions/{a}', 'LikhakathonController@GetInteractions');

Route::get('/GetApplicantSkills/{a}', 'LikhakathonController@GetApplicantSkills');