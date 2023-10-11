<x-app-layout>
    <x-slot name="header">
        {{ __('Fire Records') }}
    </x-slot>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Time Sent
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Arrival
                </th>
                <th scope="col" class="px-6 py-3">
                    Time Fire End
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="px-6 py-4">
                    Jhon Patrick Tiu
                </td>
                <td class="px-6 py-4">
                    2:00 PM
                </td>
                <td class="px-6 py-4">
                    Warehouse
                </td>
                <td class="px-6 py-4">
                    Macasandig CDO
                </td>
                <td class="px-6 py-4">
                    2:03 PM
                </td>
                <td class="px-6 py-4">
                    2:30 PM
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    2
                </th>
                <td class="px-6 py-4">
                    James Simene
                </td>
                <td class="px-6 py-4">
                    2:00 PM
                </td>
                <td class="px-6 py-4">
                    Residential
                </td>
                <td class="px-6 py-4">
                    Ocean Gate CDO
                </td>
                <td class="px-6 py-4">
                    2:03 PM
                </td>
                <td class="px-6 py-4">
                    2:30 PM
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</x-app-layout>