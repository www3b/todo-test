<template>
  <li class="flex justify-between gap-x-6 px-3 my-5 hover:bg-gray-100 cursor-pointer">
    <div class="flex min-w-0 gap-x-4">
      <input class="min-w-5" type="checkbox" />
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">Task title</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">description</p>
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Priority</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Deadline </p>
    </div>
  </li>
</template>