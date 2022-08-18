/* eslint-disable no-param-reassign */
const notifications = document.querySelectorAll('.air-notification');
notifications.forEach((notification) => {
  const { notificationId } = notification.dataset;
  if (localStorage.getItem(notificationId) !== 'true') {
    notification.style.display = 'flex';
  }

  const button = notification.querySelector('button');
  button.addEventListener('click', () => {
    localStorage.setItem(button.dataset.notificationId, true);
    notification.style.display = 'none';
  });
});
