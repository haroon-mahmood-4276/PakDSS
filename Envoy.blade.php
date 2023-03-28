@servers(['web' => 'iyesoft@103.115.199.57'])

@task('deploy', ['on' => ['web']])
    cd /var/www/pakdss.com
    git branch
    git checkout main
    git pull origin main
@endtask
