<?php

use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

//Menu::macro('fullsubmenuexample', function () {
//    return Menu::new()->prepend('<a href="#"><span> Multilevel PROVA </span> <i class="fa fa-angle-left pull-right"></i></a>')
//        ->addParentClass('treeview')
//        ->add(Link::to('/link1prova', 'Link1 prova'))->addClass('treeview-menu')
//        ->add(Link::to('/link2prova', 'Link2 prova'))->addClass('treeview-menu')
//        ->url('http://www.google.com', 'Google');
//});

Menu::macro('adminlteSubmenu', function ($submenuName) {
    return Menu::new()->prepend('<a href="#"><span> ' . $submenuName . '</span> <i class="fa fa-angle-left pull-right"></i></a>')
        ->addParentClass('treeview')->addClass('treeview-menu');
});
Menu::macro('adminlteMenu', function () {
    return Menu::new()
        ->addClass('sidebar-menu');
});
Menu::macro('adminlteSeparator', function ($title) {
    return Html::raw($title)->addParentClass('header');
});

Menu::macro('adminlteDefaultMenu', function ($content) {
    return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
});

Menu::macro('sidebar', function () {
    return Menu::adminlteMenu()
        ->add(Html::raw('Menú')->addParentClass('header'))
        
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>INICIO</span>')

        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-user-o"></i><span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('admin/users', 'Registrar'))->addClass('treeview-menu')
            ->add(Link::to('/usuario', 'Consultar'))
        )
            ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-thermometer-full"></i><span>GESTIÓN DIARIA</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('/diario/create', 'Registrar'))->addClass('treeview-menu')
            ->add(Link::to('/diario', 'Consultar'))
            ->add(Link::to('/reporte/gestiondiaria', 'Reportes'))
        )
        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-exclamation"></i><span>BITÁCORA</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to('/bitacora/create', 'Registrar'))->addClass('treeview-menu')
            ->add(Link::to('/bitacora', 'Certificar'))
            ->add(Link::to('/cor', 'Aprobar'))
            ->add(Link::to('/reporte/bitacora', 'Reportes'))
        )


        ->setActiveFromRequest();
});
