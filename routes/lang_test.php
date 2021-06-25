<?php

set_translated_route();

Route::prefix('locale_test/{locale?}')->group(function() {
    Route::get(translate_route('home'), function() {
        echo __('general.hello');
    });
});
