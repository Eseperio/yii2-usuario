Overriding Views
================

The module supports multiple view configurations with separate view directories for each. By default, the module uses framework-independent "basic" views that don't require any CSS framework. You can also select Bootstrap 3, Bootstrap 5, or provide completely custom views.

## Selecting a UI Framework

The simplest way to change the view framework is by setting the `uiFramework` property:

```php
'modules' => [
    'user' => [
        'class' => Da\User\Module::class,
        // Use basic framework-independent views (default)
        'uiFramework' => Da\User\Module::UI_BASIC,
        // or use Bootstrap 5 views
        'uiFramework' => Da\User\Module::UI_BOOTSTRAP5,
        // or use Bootstrap 3 views
        'uiFramework' => Da\User\Module::UI_BOOTSTRAP3,
    ],
],
```

**Available options**:
- `UI_BASIC` (default): Framework-independent views. No CSS framework dependencies required.
- `UI_BOOTSTRAP5`: Bootstrap 5 views
- `UI_BOOTSTRAP3`: Bootstrap 3 views

**Important**: For Bootstrap versions, make sure to install the corresponding composer dependencies:
- For Bootstrap 5: `yiisoft/yii2-bootstrap5` and `kartik-v/yii2-widget-select2`
- For Bootstrap 3: `yiisoft/yii2-bootstrap`

## Using Custom Views

If you need to override the default views (or use a completely different CSS framework like Tailwind), there are several options:

### Option 1: Using Theme Path Map (Recommended)

Yii2 provides a mechanism that is really easy to use:
 
```php
// ... other configuration here

'components' => [
    'view' => [
        'theme' => [
            'pathMap' => [
                '@Da/User/resources/views/basic' => '@app/views/user'
            ]
        ]
    ]
]

// ...
```

The above code tells Yii2 to search on `@app/view/user` for views prior to going to `@Da/User/resources/views/basic`. That is, if a view is found on `@app/view/user` that matches the required render, it will be displayed instead of the one on `@Da/User/resources/views/basic`.

You need to remember that the folder structure on your new location must match that of the module. For example, if we wish to override the `login.php` view using the above setting, we would have to create the following structure on our path: 

```
app  [ Your root ]
|
└─ views
    └─ user
        └─ security
             login.php
```

See how it follows the same structure as within the User's module `resources/views` path? Well, that's what you should do with any of the others in order to override them.

### Option 2: Using customViewPath Property

You can set the `customViewPath` attribute of the module to use a completely custom views directory:

```php
'modules' => [
    'user' => [
        'class' => Da\User\Module::class,
        'customViewPath' => '@app/views/user'
    ],
],
```

**Note**: This will force you to override **ALL** views from the module. The recommended way is using the `theme` property of the `view` component as previously mentioned.

## Email Views

Email views are independent of the UI framework and are stored in a separate directory (`@Da/User/resources/views/mail`). They are configured via the `mailViewPath` property and do not change when you switch UI frameworks.

© [2amigos](http://www.2amigos.us/) 2013-2019
