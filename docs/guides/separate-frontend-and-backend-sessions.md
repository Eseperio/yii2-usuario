Separate Frontend and Backend Sessions
======================================

When using Yii2 advanced application template (or any application with separate frontend and backend), you may want to maintain independent sessions for each application. This prevents session conflicts and allows users to have different authentication states in frontend and backend simultaneously.

## Problem

By default, Yii2 uses the same session name across all applications, which means:
- Logging into backend will also log you into frontend (and vice versa)
- Logging out from one application will log you out from the other
- Session data conflicts between frontend and backend

## Solution

Configure different session names for frontend and backend applications.

### Configuration for Frontend

In your `frontend/config/main.php`:

```php
return [
    'components' => [
        'session' => [
            'name' => 'frontend-session',
            // Optional: Set different session cookie parameters
            'cookieParams' => [
                'httpOnly' => true,
                'path' => '/',
            ],
        ],
        'user' => [
            'identityClass' => 'Da\User\Model\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/user/security/login'],
            // Use a different identity cookie name
            'identityCookie' => [
                'name' => '_frontendUser',
                'httpOnly' => true,
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => Da\User\Module::class,
            // Other usuario configuration...
        ],
    ],
];
```

### Configuration for Backend

In your `backend/config/main.php`:

```php
return [
    'components' => [
        'session' => [
            'name' => 'backend-session',
            // Optional: Set different session cookie parameters
            'cookieParams' => [
                'httpOnly' => true,
                'path' => '/',
            ],
        ],
        'user' => [
            'identityClass' => 'Da\User\Model\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/user/security/login'],
            // Use a different identity cookie name
            'identityCookie' => [
                'name' => '_backendUser',
                'httpOnly' => true,
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => Da\User\Module::class,
            // Backend-specific usuario configuration...
            // For example, you might want to restrict registration:
            'enableRegistration' => false,
        ],
    ],
];
```

## Important Considerations

### 1. Session Storage

If you're using file-based sessions (default), both applications will store sessions in the same directory. Consider using different session paths:

```php
'session' => [
    'name' => 'backend-session',
    'savePath' => '@backend/runtime/sessions',
],
```

### 2. CSRF Tokens

With separate sessions, CSRF tokens will also be separate, which is the desired behavior for security.

### 3. Switch Identity Feature

If you use the switch identity feature in the admin panel, note that it uses the `switchIdentitySessionKey` configuration option. By default, this is `yuik_usuario`, which will be stored in the respective application's session.

### 4. Database Sessions

If you're using database sessions, the session component configuration would look like:

```php
'session' => [
    'class' => 'yii\web\DbSession',
    'name' => 'frontend-session',
    'sessionTable' => 'session', // Your session table name
],
```

### 5. Testing

After configuration, test the following scenarios:
- Log into backend - frontend should remain logged out
- Log into frontend - backend should remain logged out
- Log out from one application - the other should remain logged in
- Access RBAC protected pages in both applications independently

## Common Issues

### Sessions Still Shared

If sessions are still being shared after configuration:
1. Clear browser cookies
2. Clear session files/data
3. Verify different session names are being used
4. Check that identity cookie names are different

### Lost Sessions

If sessions are being lost unexpectedly:
1. Ensure session directories have proper permissions
2. Check PHP session garbage collection settings
3. Verify cookie domain and path settings match your application structure

## Additional Resources

- [Yii2 Guide - Sessions and Cookies](https://www.yiiframework.com/doc/guide/2.0/en/runtime-sessions-cookies)
- [Yii2 Guide - Authentication](https://www.yiiframework.com/doc/guide/2.0/en/security-authentication)


© [2amigos](http://www.2amigos.us/) 2013-2019
