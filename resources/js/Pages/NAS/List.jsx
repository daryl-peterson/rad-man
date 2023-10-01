import Checkbox from '@/Components/Checkbox';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function NasList({ auth, list }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Nas List</h2>}
        >

            <Head title="NAS List" />

            <div className='flex flex-col px-4 sm:px-6 lg:p-8'>
                <div class="overflow-hidden">
                    <table class="dark min-w-full bg-white">
                        <thead
                            class="font-medium text-white">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">NAS</th>
                                <th scope="col" class="hidden lg:table-cell px-6 py-4">Short</th>
                                <th scope="col" class="hidden md:table-cell px-6 py-4">Secret</th>
                            </tr>
                        </thead>
                        <tbody>
                            {list.map((list) => (
                                <tr>
                                    <td class="px-6 py-4 font-medium">
                                        <Checkbox

                                            name={"delete_all[" + list.id + "]"}
                                            className="mr-3 text-logo"

                                        >

                                        </Checkbox>
                                        <a href={route('nas.edit', list.id)}>{list.id}</a>
                                    </td>
                                    <td class="px-6 py-4">{list.nasname}</td>
                                    <td class="hidden lg:table-cell px-6 py-4">{list.shortname}</td>
                                    <td class="hidden md:table-cell px-6 py-4">{list.secret}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>

        </AuthenticatedLayout >
    );
}
