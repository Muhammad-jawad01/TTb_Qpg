<?php

//use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvidhoer within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/link', function () {  

    
    
});


include 'frontend.php';
include 'backend.php';

Auth::routes();


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('dashboard1', function () {
        return view('dashboard.dashboard1');
    });
    Route::get('dashboard2', function () {
        return view('dashboard.dashboard2');
    });
    Route::get('dashboard3', function () {
        return view('dashboard.dashboard3');
    });
    Route::get('dashboard4', function () {
        return view('dashboard.dashboard4');
    });
    Route::get('dashboard5', function () {
        return view('dashboard.dashboard5');
    });
    Route::get('dashboard-social', function () {
        return view('dashboard.dashboard-social');
    });
});

Route::group(['prefix' => 'apps'], function () {
    Route::get('calendar', function () {
        return view('apps.calendar');
    });
    Route::get('chat', function () {
        return view('apps.chat');
    });
    Route::group(['prefix' => 'companies'], function () {
        Route::get('lists', function () {
            return view('apps.companies.lists');
        });
        Route::get('company-details', function () {
            return view('apps.companies.company-details');
        });
    });
    Route::get('contacts', function () {
        return view('apps.contacts');
    });
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('dashboard', function () {
            return view('apps.ecommerce.dashboard');
        });
        Route::get('products', function () {
            return view('apps.ecommerce.products');
        });
        Route::get('product-details', function () {
            return view('apps.ecommerce.product-details');
        });
        Route::get('add-product', function () {
            return view('apps.ecommerce.add-product');
        });
        Route::get('orders', function () {
            return view('apps.ecommerce.orders');
        });
        Route::get('order-details', function () {
            return view('apps.ecommerce.order-details');
        });
        Route::get('customers', function () {
            return view('apps.ecommerce.customers');
        });
        Route::get('sellers', function () {
            return view('apps.ecommerce.sellers');
        });
        Route::get('cart', function () {
            return view('apps.ecommerce.cart');
        });
        Route::get('checkout', function () {
            return view('apps.ecommerce.checkout');
        });
    });
    Route::group(['prefix' => 'email'], function () {
        Route::get('inbox', function () {
            return view('apps.email.inbox');
        });
        Route::get('details', function () {
            return view('apps.email.details');
        });
        Route::get('compose', function () {
            return view('apps.email.compose');
        });
    });
    Route::get('file-manager', function () {
        return view('apps.file-manager');
    });
    Route::get('invoice-list', function () {
        return view('apps.invoice-list');
    });
    Route::group(['prefix' => 'notes'], function () {
        Route::get('list', function () {
            return view('apps.notes.list');
        });
        Route::get('details', function () {
            return view('apps.notes.details');
        });
        Route::get('create', function () {
            return view('apps.notes.create');
        });
    });
    Route::get('social', function () {
        return view('apps.social');
    });
    Route::get('task-list', function () {
        return view('apps.task-list');
    });
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('list', function () {
            return view('apps.tickets.list');
        });
        Route::get('details', function () {
            return view('apps.tickets.details');
        });
    });
});

Route::group(['prefix' => 'authentications'], function () {
    Route::group(['prefix' => 'style1'], function () {
        Route::get('login', function () {
            return view('authentications.style1.login');
        });
        Route::get('signup', function () {
            return view('authentications.style1.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style1.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style1.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style1.confirm-email');
        });
    });
    Route::group(['prefix' => 'style2'], function () {
        Route::get('login', function () {
            return view('authentications.style2.login');
        });
        Route::get('signup', function () {
            return view('authentications.style2.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style2.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style2.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style2.confirm-email');
        });
    });
    Route::group(['prefix' => 'style3'], function () {
        Route::get('login', function () {
            return view('authentications.style3.login');
        });
        Route::get('signup', function () {
            return view('authentications.style3.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style3.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style3.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style3.confirm-email');
        });
    });
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('coming-soon', function () {
        return view('pages.coming-soon');
    });
    Route::get('coming-soon2', function () {
        return view('pages.coming-soon2');
    });
    Route::get('contact-us', function () {
        return view('pages.contact-us');
    });
    Route::get('contact-us2', function () {
        return view('pages.contact-us2');
    });
    Route::group(['prefix' => 'error'], function () {
        Route::get('error404', function () {
            return view('pages.error.error404');
        });
        Route::get('error500', function () {
            return view('pages.error.error500');
        });
        Route::get('error503', function () {
            return view('pages.error.error503');
        });
        Route::get('maintenance', function () {
            return view('pages.error.maintenance');
        });
        Route::get('error404-two', function () {
            return view('pages.error.error404-two');
        });
        Route::get('error500-two', function () {
            return view('pages.error.error500-two');
        });
        Route::get('error503-two', function () {
            return view('pages.error.error503-two');
        });
        Route::get('maintenance-two', function () {
            return view('pages.error.maintenance-two');
        });
    });
    Route::get('faq', function () {
        return view('pages.faq');
    });
    Route::get('faq2', function () {
        return view('pages.faq2');
    });
    Route::get('faq3', function () {
        return view('pages.faq3');
    });
    Route::get('helpdesk', function () {
        return view('pages.helpdesk');
    });
    Route::get('notifications', function () {
        return view('pages.notifications');
    });
    Route::get('pricing', function () {
        return view('pages.pricing');
    });
    Route::get('pricing2', function () {
        return view('pages.pricing2');
    });
    Route::get('privacy-policy', function () {
        return view('pages.privacy-policy');
    });
    Route::get('profile', function () {
        return view('pages.profile');
    });
    Route::get('profile-edit', function () {
        return view('pages.profile-edit');
    });
    Route::get('search-result', function () {
        return view('pages.search-result');
    });
    Route::get('search-result2', function () {
        return view('pages.search-result2');
    });
    Route::get('sitemap', function () {
        return view('pages.sitemap');
    });
    Route::get('timeline', function () {
        return view('pages.timeline');
    });
});

Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('basic-ui.accordions');
    });
    Route::get('animation', function () {
        return view('basic-ui.animation');
    });
    Route::get('cards', function () {
        return view('basic-ui.cards');
    });
    Route::get('carousel', function () {
        return view('basic-ui.carousel');
    });
    Route::get('countdown', function () {
        return view('basic-ui.countdown');
    });
    Route::get('counter', function () {
        return view('basic-ui.counter');
    });
    Route::get('dragitems', function () {
        return view('basic-ui.dragitems');
    });
    Route::get('lightbox', function () {
        return view('basic-ui.lightbox');
    });
    Route::get('lightbox-sideopen', function () {
        return view('basic-ui.lightbox-sideopen');
    });
    Route::get('list-groups', function () {
        return view('basic-ui.list-groups');
    });
    Route::get('media-object', function () {
        return view('basic-ui.media-object');
    });
    Route::get('modals', function () {
        return view('basic-ui.modals');
    });
    Route::get('notifications', function () {
        return view('basic-ui.notifications');
    });
    Route::get('scrollspy', function () {
        return view('basic-ui.scrollspy');
    });
    Route::get('session-timeout', function () {
        return view('basic-ui.session-timeout');
    });
    Route::get('sweet-alerts', function () {
        return view('basic-ui.sweet-alerts');
    });
    Route::get('tabs', function () {
        return view('basic-ui.tabs');
    });
    Route::get('tour-tutorial', function () {
        return view('basic-ui.tour-tutorial');
    });
});

Route::group(['prefix' => 'ui-elements'], function () {
    Route::get('alerts', function () {
        return view('ui-elements.alerts');
    });
    Route::get('avatar', function () {
        return view('ui-elements.avatar');
    });
    Route::get('badges', function () {
        return view('ui-elements.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('ui-elements.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('ui-elements.buttons');
    });
    Route::get('colors', function () {
        return view('ui-elements.colors');
    });
    Route::get('dropdown', function () {
        return view('ui-elements.dropdown');
    });
    Route::get('grid', function () {
        return view('ui-elements.grid');
    });
    Route::get('jumbotron', function () {
        return view('ui-elements.jumbotron');
    });
    Route::get('list-group', function () {
        return view('ui-elements.list-group');
    });
    Route::get('loading-spinners', function () {
        return view('ui-elements.loading-spinners');
    });
    Route::get('paging', function () {
        return view('ui-elements.paging');
    });
    Route::get('popovers', function () {
        return view('ui-elements.popovers');
    });
    Route::get('progress-bar', function () {
        return view('ui-elements.progress-bar');
    });
    Route::get('ribbons', function () {
        return view('ui-elements.ribbons');
    });
    Route::get('tooltips', function () {
        return view('ui-elements.tooltips');
    });
    Route::get('typography', function () {
        return view('ui-elements.typography');
    });
    Route::get('video', function () {
        return view('ui-elements.video');
    });
});

Route::get('widgets', function () {
    return view('widgets');
});

Route::get('tables', function () {
    return view('tables');
});

Route::get('data-tables', function () {
    return view('data-tables');
});

Route::group(['prefix' => 'forms'], function () {
    Route::group(['prefix' => 'controls'], function () {
        Route::get('base-inputs', function () {
            return view('forms.controls.base-inputs');
        });
        Route::get('input-groups', function () {
            return view('forms.controls.input-groups');
        });
        Route::get('checkbox', function () {
            return view('forms.controls.checkbox');
        });
        Route::get('radio', function () {
            return view('forms.controls.radio');
        });
        Route::get('switch', function () {
            return view('forms.controls.switch');
        });
    });
    Route::group(['prefix' => 'widgets'], function () {
        Route::get('picker', function () {
            return view('forms.widgets.picker');
        });
        Route::get('tagify', function () {
            return view('forms.widgets.tagify');
        });
        Route::get('touch-spin', function () {
            return view('forms.widgets.touch-spin');
        });
        Route::get('maxlength', function () {
            return view('forms.widgets.maxlength');
        });
        Route::get('switch', function () {
            return view('forms.widgets.switch');
        });
        Route::get('select-splitter', function () {
            return view('forms.widgets.select-splitter');
        });
        Route::get('bootstrap-select', function () {
            return view('forms.widgets.bootstrap-select');
        });
        Route::get('select2', function () {
            return view('forms.widgets.select2');
        });
        Route::get('input-masks', function () {
            return view('forms.widgets.input-masks');
        });
        Route::get('autogrow', function () {
            return view('forms.widgets.autogrow');
        });
        Route::get('range-slider', function () {
            return view('forms.widgets.range-slider');
        });
        Route::get('clipboard', function () {
            return view('forms.widgets.clipboard');
        });
        Route::get('typeahead', function () {
            return view('forms.widgets.typeahead');
        });
        Route::get('captcha', function () {
            return view('forms.widgets.captcha');
        });
    });
    Route::get('validation', function () {
        return view('forms.validation');
    });
    Route::get('layouts', function () {
        return view('forms.layouts');
    });
    Route::get('text-editor', function () {
        return view('forms.text-editor');
    });
    Route::get('file-upload', function () {
        return view('forms.file-upload');
    });
    Route::get('multiple-step', function () {
        return view('forms.multiple-step');
    });
});

Route::group(['prefix' => 'maps'], function () {
    Route::get('leaflet-map', function () {
        return view('maps.leaflet-map');
    });
    Route::get('vector-map', function () {
        return view('maps.vector-map');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('apex-chart', function () {
        return view('charts.apex-chart');
    });
    Route::get('chartlist-chart', function () {
        return view('charts.chartlist-chart');
    });
    Route::get('chartjs', function () {
        return view('charts.chartjs');
    });
    Route::get('morris-chart', function () {
        return view('charts.morris-chart');
    });
});

Route::group(['prefix' => 'starter'], function () {
    Route::get('blank-page', function () {
        return view('starter.blank-page');
    });
    Route::get('breadcrumbs', function () {
        return view('starter.breadcrumbs');
    });
});

// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('error-404');
})->where('page', '.*');