Overriding Views
================

The module supports multiple CSS frameworks (Bootstrap 3, Bootstrap 5) with separate view directories for each. You can select which framework to use or provide completely custom views.

## Selecting a UI Framework

The simplest way to change the CSS framework is by setting the `uiFramework` property:

```php
'modules' => [
    'user' => [
        'class' => Da\User\Module::class,
        'uiFramework' => Da\User\Module::UI_BOOTSTRAP3, // Use Bootstrap 3 views
        // or
        'uiFramework' => Da\User\Module::UI_BOOTSTRAP5, // Use Bootstrap 5 views (default)
    ],
],
```

**Important**: Make sure to install the corresponding composer dependencies:
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
                '@Da/User/resources/views/bootstrap5' => '@app/views/user'
            ]
        ]
    ]
]

// ...
```

The above code tells Yii2 to search on `@app/view/user` for views prior to going to `@Da/User/resources/views/bootstrap5`. That is, if a view is found on `@app/view/user` that matches the required render, it will be displayed instead of the one on `@Da/User/resources/views/bootstrap5`.

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
