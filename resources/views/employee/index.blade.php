<x-app-layout>
    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <h2 class="py-3 text-3xl font-bold">DATA PEGAWAI</h2>
            <div class=" overflowhidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <br /><br />
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">

                                <div class="py-3 ">
                                    <x-primary-button tag="a" href="#">Tambah Pegawai</x-primary-button>
                                </div>

                                <div class="border rounded-lg overflow-hidden border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-900">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    No</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Nama</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Email</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Cabang</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Jabatan</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Nomor Handphone</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Alamat</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-700">
                                            @foreach ($employees as $key => $employee)
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                        {{ $key + 1 }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                        {{ $employee->name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                        {{ $employee->email }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                        {{ $employee->branch_name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm text-gray-800">
                                                        {{ $employee->jabatan }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                        {{ $employee->phone_number }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                        {{ $employee->address }}</td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <button type="button"
                                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
