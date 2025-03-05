<x-dashboard-layout>
    <x-slot:title>Manage Role</x-slot:title>
    <!-- BREADCRUMB -->
    <x-portal::admin.breadcrumb title="Role List" page-to="Role" action-route="{{ route('role.create') }}" />
    @if (!empty($roles) || $roles->count() > 0)
        <div class="card overflow-hidden">
            <div class="overflow-x-auto">
                <table
                    class="table-auto w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium leading-none">
                    <thead class="text-primary-500">
                        <tr>
                            <th
                                class="px-3.5 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                {{ translate('Name') }}</th>
                            <th
                                class="px-3.5 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                {{ translate('Guard Name') }}</th>
                            <th
                                class="px-3.5 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right w-10">
                                {{ translate('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-3.5 py-4">
                                    {{ $role->name }}
                                </td>
                                <td class=" items-center gap-2 px-3.5 py-4">
                                    {{ $role->guard_name }}
                                </td>
                                <td class="px-3.5 py-4">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('role.edit', $role->id) }}"
                                            class="btn-icon btn-primary-icon-light size-8">
                                            <i class="ri-edit-2-line text-inherit text-base"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Start Pagination -->
            {{ $roles->links('portal::admin.pagination.paginate') }}
        </div>
    @else
        <x-portal::admin.empty-card title="Role" action="{{ route('role.create') }}" btnText="Add New" />
    @endif
</x-dashboard-layout>
