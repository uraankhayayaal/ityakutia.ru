<?php

namespace console\models\sitemap;

use Yii;
use yii\helpers\Url;
use demi\sitemap\interfaces\Basic;
use demi\sitemap\interfaces\GoogleImage;
use ityakutia\blog\models\Article;

class SitemapBlog extends Article implements Basic, GoogleImage
{
    /**
     * Handle materials by selecting batch of elements.
     * Increase this value and got more handling speed but more memory usage.
     *
     * @var int
     */
    public $sitemapBatchSize = 10;
    /**
     * List of available site languages
     *
     * @var array [langId => langCode]
     */
    // public $sitemapLanguages = [
    //     'en',
    //     'ru-RU',
    // ];
    /**
     * If TRUE - Yii::$app->language will be switched for each sitemapLanguages and restored after.
     *
     * @var bool
     */
    // public $sitemapSwithLanguages = true;

    /* BEGIN OF Basic INTERFACE */

    /**
     * @inheritdoc
     */
    public function getSitemapItems($lang = null)
    {
        // Add to sitemap.xml links to regular pages
        return [
            // site/index
            [
                'loc' => Url::to(['/'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_10,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // site/about
            [
                'loc' => Url::to(['/site/about'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_7,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // site/contact
            [
                'loc' => Url::to(['/site/contact'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_8,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // site/goods
            [
                'loc' => Url::to(['/site/goods'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_9,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // site/portfolio
            [
                'loc' => Url::to(['/site/portfolio'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_8,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // site/sale
            [
                'loc' => Url::to(['/site/sale'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_9,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/site/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/site/index', 'lang' => 'ru']),
                // ],
            ],
            // article/index
            [
                'loc' => Url::to(['/blog/front/index'/*, 'lang' => $lang*/]),
                'lastmod' => time(),
                'changefreq' => static::CHANGEFREQ_DAILY,
                'priority' => static::PRIORITY_9,
                // 'alternateLinks' => [
                //     'en' => Url::to(['/article/index', 'lang' => 'en']),
                //     'ru' => Url::to(['/article/index', 'lang' => 'ru']),
                // ],
            ],
            // ... you can add more regular pages if needed, but I recommend
            // separate pages related only for current model class
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSitemapItemsQuery($lang = null)
    {
        // Base select query for current model
        return $this->find()
            ->select(['id', 'title', 'photo', 'created_at', 'updated_at'])
            ->where(['is_publish' => true])
            ->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapLoc($lang = null)
    {
        // Return absolute url to article model view page
        return Url::to(['/blog/front/view', 'id' => $this->id], true);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapLastmod($lang = null)
    {
        return $this->updated_at;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapChangefreq($lang = null)
    {
        return static::CHANGEFREQ_MONTHLY;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapPriority($lang = null)
    {
        return static::PRIORITY_8;
    }

    /* END OF Basic INTERFACE */
    /* BEGIN OF GoogleImage INTERFACE */

    /**
     * @inheritdoc
     *
     * @param self $material
     */
    public function getSitemapMaterialImages($material, $lang = null)
    {
        // List of article related images without scheme (article logo eg.)
        $images = [];
        // "/uploads/article/1.jpg"
        if($this->photo != null) $images[] = $this->photo;
        // You can add more images (if article have a photo gallery etc.)

        // !important! You can return array of any elements(Objects eg. $this->images relation), because its elements
        // will be foreached and become as $image argument for $this->getSitemapImageLoc($image)

        return $images;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapImageLoc($image, $lang = null)
    {
        // Return absolute url to each article image
        // @see $image argument becomes from $this->getSitemapMaterialImages()
        if(strpos($image, 'http://') !== false || strpos($image, 'https://') !== false)
            return $image;
        return Yii::$app->urlManager->baseUrl . \htmlspecialchars($image);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapImageGeoLocation($image, $lang = null)
    {
        // Location name string, for example: "Limerick, Ireland"
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapImageCaption($image, $lang = null)
    {
        // Image caption, simply use article title
        return \htmlspecialchars($this->title);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapImageTitle($image, $lang = null)
    {
        // Image title, simply use article title
        return \htmlspecialchars($this->title);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapImageLicense($image, $lang = null)
    {
        return null;
    }

    /* END OF GoogleImage INTERFACE */
    /* BEGIN OF GoogleAlternateLang INTERFACE */

    /**
     * @inheritdoc
     */
    // public function getSitemapAlternateLinks()
    // {
    //     // Generate altername links for all site language versions for this article
    //     $buffer = [];

    //     foreach ($this->sitemapLanguages as $langCode) {
    //         $buffer[$langCode] = $this->getSitemapLoc($langCode);
    //         // or eg.: $buffer[$langCode] = Url::to(['article/view', 'id' => $this->id, 'lang' => $langCode]);
    //     }

    //     return $buffer;
    // }

    /* END OF GoogleAlternateLang INTERFACE */
}