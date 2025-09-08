self.addEventListener("push", (event) => {
    const notification = event.data.json();

    event.waitUntil(
        self.ServiceWorkerRegistration.showNotification(notification.title, {
            body: notification.body,
            icon: "./assets/img/kaiadmin/icon.png",
            data: {
                url: notification.url,
            },
        })
    );
});

self.addEventListener("notificationclick", (event) => {
    event.waitUntil(clients.openWindow(event.notification.data.url));
});
