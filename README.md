Yii 2 Usuario Extension
=======================

[![Documentation Status](https://readthedocs.org/projects/yii2-usuario/badge/?version=latest)](http://yii2-usuario.readthedocs.io/en/latest/?badge=latest)
[![Join the chat at https://gitter.im/2amigos/yii2-usuario](https://badges.gitter.im/2amigos/yii2-usuario.svg)](https://gitter.im/2amigos/yii2-usuario?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Packagist Version](https://img.shields.io/packagist/v/2amigos/yii2-usuario.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-usuario)
[![Latest Stable Version](https://poser.pugx.org/2amigos/yii2-usuario/version)](https://packagist.org/packages/2amigos/yii2-usuario)
[![Total Downloads](https://poser.pugx.org/2amigos/yii2-usuario/downloads)](https://packagist.org/packages/2amigos/yii2-usuario)
[![Build Status](https://github.com/2amigos/yii2-usuario/actions/workflows/php.yml/badge.svg)](https://github.com/2amigos/yii2-usuario/actions/)
[![Latest Unstable Version](https://poser.pugx.org/2amigos/yii2-usuario/v/unstable)](//packagist.org/packages/2amigos/yii2-usuario)  
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/2amigos/yii2-usuario/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/2amigos/yii2-usuario/?branch=master)

Yii 2 usuario is a highly customizable and extensible user management, RBAC management, authentication, 
and authorization Yii2 module extension. 

It works extensively with Yii's Container making it really easy to override absolutely anything within its core. The 
module is built to work out of the box with some minor config tweaks and it comes with the following features: 
 
- Backend user/profile/account management
- Backend RBAC management 
- Login via username/email + password process
- Login via social network process
- Password recovery process
- Two-Factor authentication process 
- Google reCaptcha

We considered that RBAC was essential to be included into any user management module, even if you simply use one user 
with `admin` role, its much better to actually work with RBAC just in case your application scales in the future.

## UI Framework Support

Usuario is UI framework agnostic and includes default views for:
- Bootstrap 3
- Bootstrap 4
- Bootstrap 5
- Tailwind CSS
- Basic (no framework)

You can configure your preferred UI framework in the module configuration using the `uiFramework` option.

## Documentation

For comprehensive documentation, see [docs/readme.md](docs/readme.md).

## Quick Start

### Installation

```bash
composer require 2amigos/yii2-usuario
```

### Configuration

Add the module to your application configuration:

```php
'modules' => [
    'user' => [
        'class' => Da\User\Module::class,
        'administrators' => ['admin'], // required for accessing administrative actions
        'uiFramework' => 'bootstrap5', // Options: bootstrap3, bootstrap4, bootstrap5, tailwind, basic
    ]
]
```

### Database Setup

Run migrations:

```bash
./yii migrate --migrationNamespaces=Da\\User\\Migration
./yii migrate --migrationPath=@yii/rbac/migrations
```

### Usage Examples

#### Checking User Permissions

```php
// Check if user has permission
if (Yii::$app->user->can('createPost')) {
    // User can create posts
}

// Check in views
<?php if (Yii::$app->user->can('admin')): ?>
    <!-- Admin only content -->
<?php endif; ?>
```

#### Managing Users Programmatically

```php
// Get user service
$userService = Yii::$container->get(Da\User\Service\UserCreateService::class);

// Create a new user
$user = $userService->create([
    'email' => 'user@example.com',
    'username' => 'newuser',
    'password' => 'securepassword',
]);

// Assign role to user
$auth = Yii::$app->authManager;
$role = $auth->getRole('editor');
$auth->assign($role, $user->id);
```

#### Accessing User Information

```php
// Get current user
$user = Yii::$app->user->identity;

// Access user profile
$profile = $user->profile;
echo $profile->name;
echo $profile->gravatar_email;

// Check if user is confirmed
if ($user->isConfirmed) {
    // User has confirmed their email
}
```

#### Using Events

```php
// In your configuration file
use Da\User\Event\FormEvent;
use Da\User\Event\UserEvent;

Yii::$app->on(
    UserEvent::EVENT_AFTER_REGISTER,
    function (UserEvent $event) {
        // Send welcome email or perform other actions
        $user = $event->user;
        // Your custom logic here
    }
);
```

## Need Help? 

If you have issues, please use the Gitter room of this repository [https://gitter.im/2amigos/yii2-usuario](https://gitter.im/2amigos/yii2-usuario). 
Please, remember that we may not be online all the time. We expect that we can build a community around the users of 
 this module 

## Contributing 

Please, read our [CONTRIBUTION guidelines](CONTRIBUTING.md). 
 
## Credits

This module is highly inspired by the excellent work of [Dektrium](https://dektrium.com/) on both of its modules: 

- [Yii 2 User](https://github.com/dektrium/yii2-user)
- [Yii 2 RBAC](https://github.com/dektrium/yii2-rbac)

In fact, we have used some of its processes, commands, views, and some of its attribute names to somehow standardize the 
modules and make it easier for our developers to swap from [Dektrium's](https://dektrium.com) modules to our own.

> [![2amigOS!](https://s.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0?s=80)](http://www.2amigos.us)  
> <i>Beyond Software</i>  
> [www.2amigos.us](http://www.2amigos.us)

