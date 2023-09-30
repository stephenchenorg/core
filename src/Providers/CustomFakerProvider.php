<?php

namespace Stephenchen\Core\Providers;

use Faker\Provider\Base;

final class CustomFakerProvider extends Base
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Generate a fake seo title.
     */
    public function seoTitle(): string
    {
        return 'seo title';
    }

    /**
     * Generate a fake seo description.
     */
    public function seoDescription(): string
    {
        return 'seo description';
    }

    /**
     * Generate a fake seo keywords.
     */
    public function seoKeywords(): string
    {
        return 'seo keywords';
    }

    /**
     * Generate a fake seo head.
     */
    public function seoHead(): string
    {
        return '<meta name="fake-seo-head" content="test header" />';
    }

    /**
     * Generate a fake seo body.
     */
    public function seoBody(): string
    {
        return '';
    }

    /**
     * Generate a fake og title.
     */
    public function ogTitle(): string
    {
        return 'og title';
    }

    /**
     * Generate a fake og description.
     */
    public function ogDescription(): string
    {
        return 'og description';
    }
}
