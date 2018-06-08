<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text', 'inc.form.text.blade.php',['name', 'value'=>null, 'attributes'=>[]]);
        Form::component('textarea', 'inc.form.textarea.blade.php',['name', 'value'=>null, 'attributes'=>[]]);
        Form::component('submit', 'inc.form.submit.blade.php',['value'=>'Submit', 'attributes'=>[]]);
        Form::component('file', 'inc.form.file.blade.php',['name', 'attributes'=>[]]);
        Form::component('hidden', 'inc.form.hidden.blade.php',['name', 'value'=>null, 'attributes'=>[]]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
