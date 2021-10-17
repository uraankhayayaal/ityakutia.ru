Run fixtures:
```
php yii_test fixture Purchase --namespace='common\modules\payment\tests\fixtures'
```

Run tests:
```
vendor/bin/codecept run -- -c frontend -c common/modules/payment
```