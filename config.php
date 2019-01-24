<?php

return [
    'baseUrl' => 'https://docs.delaford.com',
    'production' => false,
    'siteName' => 'Delaford',
    'siteDescription' => 'Online 2D JavaScript RPG',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'active' => function ($page, $path) {
        $pages = collect(array_wrap($page));

        return $pages->contains(function ($page) use ($path) {
            return str_contains($page->getPath(), $path);
        });
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
