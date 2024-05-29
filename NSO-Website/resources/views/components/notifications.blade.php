<?php
  $userUnreadNotifs = $user->unreadNotifications;
  $userNotifs = $user->notifications;
?>

<button onclick="markAsRead({{json_encode(auth()->user())}}, {{$userUnreadNotifs->pluck('id')->toJson()}})" id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="mr-5 relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-black dark:text-gray-400" type="button">
  <svg class="w-5 h-5 notification-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
  <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
  </svg>
  
  @if (count($userUnreadNotifs) > 0) 
    <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900" id="redDot"></div>
  @endif
</button>
    
<!-- Dropdown menu -->
<div id="dropdownNotification" class="border-2 border-black z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-white dark:divide-black" aria-labelledby="dropdownNotificationButton">
  <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-black dark:text-white">
      Notifications
  </div>
  <div class="divide-y divide-gray-100 dark:divide-gray-700">
      @foreach ($userNotifs as $notification) 
      <a href="{{$notification->data['link']}}" class="flex px-4 py-3  hover:bg-gray-100 dark:hover:bg-gray-700 text-black">
        <div class="flex-shrink-0">
        </div>
        <div class="w-full ps-3 ">
          <div class="font-sans text-lg font-bold">{{$notification->data['message']}}</div>
            <div class="text-blue-500 text-sm mt-1.5 dark:text-blue-400">Click here to view</div>
        </div>
      </a>
      @endforeach
  </div>
</div>

<script>
function markAsRead(user) {
  document.getElementById("redDot").style.display="none";
  const xml = new XMLHttpRequest();

  xml.open("GET", `/readNotifications/${user.id}`);
  xml.send();
}
</script>