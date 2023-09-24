<?php

  use App\Models\GeneralSetting;

  function activeTemplate($asset = false){
    $template = '';
    if (session()->has('active_template')) {
        $template = session('active_template');
    } else {
        $gs = GeneralSetting::first(['active_template']);
        $template = $gs->active_template;
        session()->put(['active_template' => $template]);
    }
    if ($asset) return 'assets/templates/' . $template . '/';
    return 'templates.' . $template . '.';
  }
