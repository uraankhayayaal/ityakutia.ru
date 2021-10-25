Usage
-----

Be sure that you have lines in urlManager config:

```php
'urlManager' => [
    ******
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    ******
]
```

Migrate:

```
php yii migrate --migrationPath=@common/modules/multicity/migrations
```

Once the extension is installed, simply use it in your code by  :

```php
<?= \common\modules\multicity\widgets\city\Change::widget(); ?>
```

For backend add this URL

```php
<?= Url::toRoute(['/multicity/back-city/index']); ?>
```