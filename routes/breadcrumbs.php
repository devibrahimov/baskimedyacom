<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Ana Sayfa', route('site.index'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('Hakkımızda', route('site.about'));
});


// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('İletişim', route('site.contact'));
});


// Home > Contact
Breadcrumbs::for('galery', function ($trail) {
    $trail->parent('home');
    $trail->push('Galeri', route('site.galery'));
});


// Home > Services
Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Hizmetlerimiz', route('site.services'));
});


// Home > Products
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push('Ürünler', route('site.products'));
});








// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
