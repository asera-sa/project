// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.5/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
    apiKey: "AIzaSyBDv7ggQLtei3hWFwIA-71YCv6ti7nCGMQ",
    authDomain: "project2020-bf07f.firebaseapp.com",
    projectId: "project2020-bf07f",
    storageBucket: "project2020-bf07f.appspot.com",
    messagingSenderId: "114894085298",
    appId: "1:114894085298:web:2b86d4005455a467cbfdab",
    measurementId: "G-C5XZYN3WK5"
});

const messagingSW = firebase.messaging();
messagingSW.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    const {title, body} = payload.notification;
    const notificationOptions = {
        body
    };

    return self.registration.showNotification(title, notificationOptions);
});
