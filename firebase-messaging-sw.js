importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');


firebase.initializeApp({
    'messagingSenderId': '1078410774912'
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload){
    console.log('[firebasemessaging-sw.js] received background message ' , payload)

    var obj = JSON.parse(payload.data.notification);
    var notoificationTitle = obj.title;
    var notificationOptions = {
        body: obj.body,
        icon: obj.iocn
    };

    return self.registration.showNotification(notoificationTitle, notificationOptions);
})

