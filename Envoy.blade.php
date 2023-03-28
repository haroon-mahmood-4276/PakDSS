@servers(['web' => 'iyesoft@103.115.199.57'])

@task('deploy', ['on' => ['web']])
    cd /var/www/pakdss.com
    git branch

    @if ($checkout_branch)
        git checkout {{ $checkout_branch }}
    @endif

    @if ($pull_branch)
        git pull origin {{ $pull_branch }}
    @endif

    @if ($with_cu)
        composer update
    @endif

    @if ($with_ci)
        composer install
    @endif

    @if ($with_fm)
        php artisan migrate:fresh
    @endif

    @if ($with_rfm)
        php artisan migrate:refresh
    @endif

    @if ($with_fms)
        php artisan migrate:fresh --seed
    @endif

    @if ($with_rfms)
        php artisan migrate:refresh --seed
    @endif

    php artisan optimize:clear
    php artisan cache:clear
@endtask
