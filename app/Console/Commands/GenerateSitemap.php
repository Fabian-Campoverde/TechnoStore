<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Category; // Modelo para las categorías
use App\Models\Brand; // Modelo para las marcas
use App\Models\Product; // Modelo para los productos

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home.page'))->setPriority(1.0))
            ->add(Url::create(route('categories'))->setPriority(0.8))
            ->add(Url::create(route('brands'))->setPriority(0.8))
            ->add(Url::create(route('novedades'))->setPriority(0.7))
            ->add(Url::create(route('nosotros'))->setPriority(0.6))
            ->add(Url::create(route('envio'))->setPriority(0.6))
            ->add(Url::create(route('reclamos'))->setPriority(0.6))
            ->add(Url::create(route('faqs'))->setPriority(0.6))
            ->add(Url::create(route('contacto'))->setPriority(0.6))
            ->add(Url::create(route('terminos'))->setPriority(0.5))
            ->add(Url::create(route('politica'))->setPriority(0.5));

        
        // Guardar el sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}