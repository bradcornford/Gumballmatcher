<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines for admin.
    |
    */

    'title' => 'Administration',

    'defaults' => [
        'dashboard' => 'Dashboard',
        'back' => 'Back',
        'list' => 'List',
        'view' => 'View',
        'create' => 'Create',
        'save' => 'Save',
        'edit' => 'Edit',
        'update' => 'Update',
        'delete' => 'Delete',
        'no-items' => 'None to display',
        'confirm' => 'Are you sure you want to delete this item?',
    ],

    'index' => [
        'title' => 'Dashboard',
    ],

    'roles' => [
        'title' => 'Roles',
        'fields' => [
            'id' => '#',
            'name' => 'Name',
            'key' => 'Key',
        ],
    ],

    'users' => [
        'title' => 'Users',
        'fields' => [
            'id' => '#',
            'name' => 'Name',
            'email' => 'Email Address',
            'username' => 'Game Username',
            'role' => 'Role',
            'alliance' => 'Alliance',
            'password' => 'Password',
        ],
    ],

    'alliances' => [
        'title' => 'Alliances',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'level' => 'Level',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'factions' => [
        'title' => 'Factions',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'gumballs' => [
        'title' => 'Gumballs',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'faction' => 'Faction',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'groups' => [
        'title' => 'Groups',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'fates' => [
        'title' => 'Fates',
        'fields' => [
            'id' => '#',
            'key' => 'Key',
            'name' => 'Name',
            'group' => 'Group',
            'description' => 'Description',
            'image' => 'Image',
            'gumball' => 'Gumball',
        ]
    ],

];
