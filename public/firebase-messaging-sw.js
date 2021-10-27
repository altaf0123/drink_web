/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/

firebase.initializeApp({
  apiKey: "AIzaSyBM22gcJCxSQLNAQPFrjxE-rbffe8GiCro",
  authDomain: "drinkweb-b94ea.firebaseapp.com",
  projectId: "drinkweb-b94ea",
  storageBucket: "drinkweb-b94ea.appspot.com",
  messagingSenderId: "240265625888",
  appId: "1:240265625888:web:2433b96c3aa9eb7472d745",
  measurementId: "G-J4XVQED3C7"
});
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});