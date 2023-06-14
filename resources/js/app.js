import './bootstrap';

let channel = Echo.channel('test-channel')
    .subscribed(() => {
        console.log('subscribed');
    }).listen('.test-event', (e) => {
        console.log(e);
    });
