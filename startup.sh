chmod -R 777 /app/server/frontend/web/images

# Start to check private repositories path `backend/runtime/exts`
declare -a iy_repo_names=("yii2-gallery" "yii2-rbac" "yii2-navigation" "yii2-setting" "yii2-poll" "yii2-blog" "yii2-partner" "yii2-fileuploader" "yii2-materializecomponents" "yii2-redactor" "yii2-sortable" "yii2-page" "yii2-collective" "yii2-banner") # 
repos_path="backend/runtime/exts/"
ua_repo_url="https://github.com/uraankhayayaal/"
iy_repo_url="https://github.com/IT-Yakutia/"

# Check `exts` folder for exists
if [ ! -d $repos_path ]; then
    # If folder is not exist, mkdir it
    mkdir $repos_path
fi

for iy_repo_name in "${iy_repo_names[@]}"
do
    echo "PHP private REPO: $iy_repo_name"
    # Check folder that it contains repos
    if [ -d $repos_path$iy_repo_name ]; then
        # If folder exists, update repo
        cd $repos_path$iy_repo_name && \
        git pull
        cd ../../../../
    else
        # If there no repo path, clone it
        git clone $iy_repo_url$iy_repo_name.git $repos_path$iy_repo_name
    fi
done
# End of checking private repositories path

# Check FILE for PHP_PLUGINS_DEV
if [ -f PHP_PLUGIN_DEV.env ]; then
    COMPOSER=composer-dev.json composer install --prefer-dist
else
    composer install --prefer-dist
fi

php init --env=Development --overwrite=All
php yii migrate --interactive=0
php yii faker/add-admin uraankhayayaal@gmail.com
# php yii fixture PageMenuItem --namespace='uraankhayayaal\page\tests\fixtures' --interactive=0
# php yii fixture PageBlockChart --namespace='uraankhayayaal\page\tests\fixtures' --interactive=0
# php yii fixture PageBlock --namespace='uraankhayayaal\page\tests\fixtures' --interactive=0
# php yii fixture ArticleCategorySet --namespace='ityakutia\blog\tests\fixtures' --interactive=0
# php yii fixture Partner --namespace='ityakutia\partner\tests\fixtures' --interactive=0
# php yii fixture PollVote --namespace='ityakutia\poll\tests\fixtures' --interactive=0
# php yii fixture Banner --namespace='ityakutia\banner\tests\fixtures' --interactive=0
php-fpm