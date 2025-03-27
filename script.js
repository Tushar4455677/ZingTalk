document.addEventListener('DOMContentLoaded', () => {
    
    const notificationIcon = document.querySelector('.notification-icon');
    const notificationPopup = document.querySelector('.notification-popup');
    const closeBtn = document.querySelector('.close-btn');

    if (notificationIcon && notificationPopup && closeBtn) {
        notificationIcon.addEventListener('click', () => {
            notificationPopup.style.display = 'block';
        });
        closeBtn.addEventListener('click', () => {
            notificationPopup.style.display = 'none';
        });
        window.addEventListener('click', (e) => {
            if (!notificationPopup.contains(e.target) && e.target !== notificationIcon) {
                notificationPopup.style.display = 'none';
            }
        });
    } else {
        console.error('One or more elements are missing from the DOM!');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const userIcon = document.querySelector('.user-icon');
    const profilePopup = document.querySelector('.profile-popup');
    userIcon.addEventListener('click', (event) => {
        event.stopPropagation(); //
        profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
    });

    window.addEventListener('click', () => {
        profilePopup.style.display = 'none';
    });
    profilePopup.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const messagingIcon = document.querySelector('.messaging-icon');
    const messagingPopup = document.querySelector('.messaging-popup');
    const closePopupButton = document.querySelector('#close-popup');

    // Show popup on icon click
    messagingIcon.addEventListener('click', () => {
        messagingPopup.style.display = 'block';
    });

    // Close popup on close button click
    closePopupButton.addEventListener('click', () => {
        messagingPopup.style.display = 'none';
    });

    // Close popup on clicking outside of it
    window.addEventListener('click', (event) => {
        if (!messagingPopup.contains(event.target) && event.target !== messagingIcon) {
            messagingPopup.style.display = 'none';
        }
    });
});

document.getElementById('redirectDiv').addEventListener('click', function() {
    window.location.href = 'registration.html'; // Replace with your target URL
});

