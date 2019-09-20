<?php include "fb.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>fb-test</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
     <label>Genetated Token :</label> <span style="color:red" id= "token"></span>
    </body>
    
        <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
            <script  src="https://www.gstatic.com/firebasejs/6.6.1/firebase-messaging.js"></script>
            <script>
                var firebaseConfig = {
                    apiKey: "AIzaSyA-HwUQW9DEwUWDAnK_f3ceLLR6Wrpvlo4",
                    authDomain: "fb-js-ae8db.firebaseapp.com",
                    databaseURL: "https://fb-js-ae8db.firebaseio.com",
                    projectId: "fb-js-ae8db",
                    storageBucket: "",
                    messagingSenderId: "1078410774912",
                    appId: "1:1078410774912:web:38c870eec399b711325965"
                };

                // Initialize Firebase app
                firebase.initializeApp(firebaseConfig);
                        const messaging = firebase.messaging(); // initiating the messaging instance
                        messaging.usePublicVapidKey('BKMt5lYrZ253jKEDQO57Ac1Q-NDTG9B-0kCzBl0hPp7-7f11jeu_600sdG_EjEcxh16F3lH0xBtHxJ950SSUsz0'); //checking for valid key
                        messaging.requestPermission().then( function(){   //checking for permission
                            messaging.getToken().then(function(currentToken){
                                //generate token here 
                                document.querySelector('#token').innerHTML = currentToken;
                            }).catch(function(err){
                                console.log('token error', err);
                            });
                        }).catch(function(err){
                            console.log('permission erroe', err);
                        });
                    
                        
                        messaging.onMessage(function(payload){
                            var obj = JSON.parse(payload.data.notification);
                            var notoification = new Notification(obj.title,{ 
                                icon: obj.icon,
                                body: obj.body
                            });
                        });
            </script>
</html>