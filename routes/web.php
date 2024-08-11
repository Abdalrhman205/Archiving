<?php

use App\Http\Controllers\ArchivesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\VideosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('archives', [ArchivesController::class, 'index'])->name('archives.index');
    Route::get('archives/showN{id}', [ArchivesController::class, 'showN'])->name('archives.showN');

    
    // Document
    Route::get('documents', [DocumentsController::class, 'documents'])->name('documents.documents');
    Route::post('documents/store', [DocumentsController::class, 'store'])->name('documents.store');
    Route::get('/get-document/{id}', [DocumentsController::class, 'getDocument'])->name('documents.get');
    Route::post('/update-document', [DocumentsController::class, 'update']);
    Route::delete('documents/delete/{id}', [DocumentsController::class, 'delete'])->name('documents.delete');
    
    // File
    Route::get('Files', [FileController::class, 'Files'])->name('Files.Files');
    Route::post('Files/store', [FileController::class, 'store'])->name('Files.store');
    Route::get('/get-File/{id}', [FileController::class, 'getFile'])->name('File.get');
    Route::post('/update-File', [FileController::class, 'update']);
    Route::delete('Files/delete/{id}', [FileController::class, 'delete'])->name('File.delete');
    
    // pictures
    Route::get('Picture', [PictureController::class, 'Pictures'])->name('Picture.Pictures');
    Route::get('Picture/show/{id}', [PictureController::class, 'show'])->name('Picture.show');
    Route::post('Picture/store', [PictureController::class, 'store'])->name('Picture.store');
    Route::get('/get-Picture/{id}', [PictureController::class, 'getPicture'])->name('Picture.get');
    Route::post('/update-Picture', [PictureController::class, 'update']);
    Route::delete('Picture/delete/{id}', [PictureController::class, 'delete'])->name('Picture.delete');
    Route::post('/pictures/storeShow/{id}', [PictureController::class, 'storeShow'])->name('Picture.storeShow');
    Route::get('/pictures/deleteShow/{pictureId}/{fileName}', [PictureController::class, 'deleteShow'])->name('Picture.deleteShow');
    
    // Search
    Route::get('Search', [SearchController::class, 'Search'])->name('Search.Search');
    
    // Video
    Route::get('Videos', [VideosController::class, 'Videos'])->name('Videos.Videos');
    Route::get('Videos/show/{id}', [VideosController::class, 'show'])->name('Videos.show');
    Route::post('Videos/store', [VideosController::class, 'store'])->name('Videos.store');
    Route::get('/get-Video/{id}', [VideosController::class, 'getVideos'])->name('Videos.get');
    Route::post('/update-Video', [VideosController::class, 'update']);
    Route::delete('Videos/delete/{id}', [VideosController::class, 'delete'])->name('Videos.delete');
    Route::post('/Videos/storeShow/{id}', [VideosController::class, 'storeShow'])->name('Videos.storeShow');
    Route::get('/Videos/deleteShow/{VideoId}/{fileName}', [VideosController::class, 'deleteShow'])->name('Videos.deleteShow');
    Route::delete('/Videos/delete-image', [VideosController::class, 'deleteImage'])->name('Videos.delete-image');
    
    // Section
    Route::get('Sections', [SectionsController::class, 'Sections'])->name('Sections.Sections');
    Route::post('Sections/store', [SectionsController::class, 'store'])->name('Sections.store');
    Route::get('/get-Section/{id}', [SectionsController::class, 'getSection'])->name('Sections.get');
    Route::post('/update-Section', [SectionsController::class, 'update']);
    Route::delete('Sections/delete/{id}', [SectionsController::class, 'delete'])->name('Sections.delete');
    Route::get('/Sections/{id}', [SectionsController::class, 'show']);

    // Entity
    Route::get('Entity', [EntityController::class, 'Entity'])->name('Entity.Entity');
});
