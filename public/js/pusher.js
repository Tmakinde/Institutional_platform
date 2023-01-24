import Echo from "laravel-echo"
import EchoLibrary from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'f2379de901fa1516cefd'
});

Echo.channel('Admin-Message')
    .listen('AdminMessageEvent', (e) =>{
        console.log(e.admin, e.message);
});