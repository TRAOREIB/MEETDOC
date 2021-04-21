<?php return array (
  'jenssegers/date' => 
  array (
    'providers' => 
    array (
      0 => 'Jenssegers\\Date\\DateServiceProvider',
    ),
    'aliases' => 
    array (
      'Date' => 'Jenssegers\\Date\\Date',
    ),
  ),
  'krlove/eloquent-model-generator' => 
  array (
    'providers' => 
    array (
      0 => 'Krlove\\EloquentModelGenerator\\Provider\\GeneratorServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);