@servers(['web' => 'iyesoft@103.115.199.57'])

@task('deploy', ['on' => ['web']])
    php --ini
@endtask
