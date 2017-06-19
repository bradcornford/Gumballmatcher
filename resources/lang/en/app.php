<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines for application.
    |
    */

    'name' => 'Gumball Matcher',

    'defaults' => [
        'list' => 'List',
        'view' => 'View',
        'create' => 'Create',
        'save' => 'Save',
        'edit' => 'Edit',
        'update' => 'Update',
        'delete' => 'Delete',
        'no-items' => 'None to display',
        'reset' => 'Forgot Your Password?',
        'owned' => 'Toggle Owned',
        'checkbox' => 'Toggle Checkboxes',
        'linked' => 'Toggle Linked',
        'unavailable' => 'Toggle Unavailable',
        'login' => 'Login',
        'dashboard' => 'Dashboard',
        'rights' => 'All Rights Reserved',
        'version' => 'Version: %s',
        'user-gumball' => 'You have this gumball|You don\'t have this gumball',
        'alliance-user-fate' => 'Alliance user has matched fate|Alliance user hasn\'t matched fate',
        'alliance-fate' => 'Fate is available in alliance|Fate isn\'t available in alliance',
    ],

    'index' => [
        'title' => 'Dashboard',
    ],

    'login' => [
        'title' => 'Login',
        'fields' => [
            'email' => 'Email Address',
            'password' => 'Password',
            'remember' => 'Remember Me?',
        ],
        'actions' => [
            'store' => 'Login'
        ]
    ],

    'register' => [
        'title' => 'Register',
        'fields' => [
            'name' => 'Name',
            'email' => 'Email Address',
            'username' => 'Game Username',
            'alliance' => 'Alliance',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password',
        ],
        'actions' => [
            'store' => 'Register'
        ],
        'statuses' => [
            'store' => 'Your account has been created!'
        ]
    ],

    'reset' => [
        'title' => 'Reset Password',
        'fields' => [
            'email' => 'Email Address',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password',
        ],
        'actions' => [
            'store' => 'Send Password Reset Link',
            'update' => 'Update Password',
        ],
        'statuses' => [
            'store' => 'We have e-mailed your password reset link!',
            'update' => 'Your password has been reset!'
        ]
    ],

    'account' => [
        'change_details' => [
            'title' => 'Change Details',
            'fields' => [
                'name' => 'Name',
                'email' => 'Email Address',
                'username' => 'Game Username',
                'alliance' => 'Alliance',
            ],
            'actions' => [
                'store' => 'Update Details'
            ],
            'statuses' => [
                'patch' => 'Your account has been updated!'
            ]
        ],

        'change_password' => [
            'title' => 'Change Password',
            'fields' => [
                'current_password' => 'Current Password',
                'new_password' => 'New Password',
                'new_password_confirmation' => 'Confirm New Password',
            ],
            'actions' => [
                'store' => 'Update Password',
            ],
            'statuses' => [
                'patch' => 'Password changed successfully!'
            ]
        ],
    ],

    'logout' => [
        'title' => 'Logout',
    ],

    'alliance' => [
        'title' => 'Alliances',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'level' => 'Level',
            'users' => 'Users',
            'created' => 'Created',
        ],
    ],

    'user' => [
        'title' => 'Users',
        'fields' => [
            'id' => '#',
            'name' => 'Name',
            'username' => 'Game Username',
            'gumballs' => 'Gumballs',
            'fates' => 'Fates',
            'created' => 'Joined',
        ],
    ],

    'gumball' => [
        'title' => 'Gumballs',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'unlocked' => 'Unlocked',
            'owned' => 'Owned?',
        ],
        'actions' => [
            'store' => 'Update Gumballs'
        ],
        'statuses' => [
            'store' => 'Gumballs updated successfully!'
        ]
    ],

    'fate' => [
        'title' => 'Fates',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'gumballs' => 'Gumballs',
            'completed' => 'Completed',
            'linked' => 'Linked?',
        ],
        'actions' => [
            'store' => 'Update Fates'
        ],
        'statuses' => [
            'store' => 'Fates updated successfully!'
        ]
    ],

    'match' => [
        'title' => 'Matches',
        'fields' => [
            'id' => '#',
            'name' => 'Name',
            'gumballs' => 'Gumballs',
            'available' => 'Available',
            'matches' => 'Matches',
            'user' => 'Alliance User',
            'all' => 'All',
            'matched' => 'Matched?',
        ],
        'actions' => [
            'store' => 'Update Matches'
        ],
        'statuses' => [
            'store' => 'Matches stored successfully!'
        ]
    ],

];
